Lembretes = {

    lembreteAtivo: null,
    listField: "#LembretesLista",
    loadingComponent: "#LembretesLoading",
    submitButton: "#SalvaLembrete",
    deleteButton: "#RemoveLembrete",

    init : function() {
        this.functions.loadListeners();
        this.List();
    },
    functions : {
        loadListeners : function(){
            $('#checkPostitNotify').change(function () {
                if ($(this).is(':checked')) {
                    $("#postitNotifyContent").removeClass('hide');
                } else {
                    $("#postitNotifyContent").addClass('hide');
                }
            });
            $('#lembretesModal, #lembreteConfirmacaoModal').on('hidden.bs.modal', function (e) {
                Lembretes.functions.setActive();
            })
            $(Lembretes.submitButton).click(function(){
                Lembretes.Save()
            });
            $(Lembretes.deleteButton).click(function () {
                Lembretes.Delete()
            });
        },
        setPostitColor: function (element, color) {
            $(".postitColorItem").css('opacity', 0.5);
            $(element).css('opacity', 1);
            $("#postitColorInput").val(color);
        },
        renderizaLista : function(dados){
            lista = '';

            dados.forEach(lembrete => {
                lista += '<div class="col-xl-6 col-md-12">'
                    + '<div class="card card-lembrete mb-2 mt-2 bg-'+lembrete.cor+'">'
                        + '<div class="card-body">';
                if (lembrete.alerta && lembrete.alerta != "0000-00-00 00:00:00"){
                    lista += '<span class="lembrete-alert-icon c-default" data-toggle="tooltip" title="Alerta em: ' + dateSqlToHtml(lembrete.alerta)+'">'
                        +'<i class="material-icons">alarm</i>'
                    +'</span>';
                };

                if (lembrete.titulo != ""){
                    lista += '<h4 class="mn">'+lembrete.titulo+'</h4>';
                }
                
                lista += '<p class="mn">'+lembrete.conteudo+'</p>'
                    + '</div>'
                        + '<div class="lembretes-actions">'
                            + '<span class="material-icons c-pointer" onclick="Lembretes.functions.setActive(\''+lembrete.id+'\')" data-toggle="modal" data-target="#lembretesModal">edit</span>'
                            + '<span class="material-icons c-pointer" onclick="Lembretes.functions.confirmDelete(\'' + lembrete.id +'\')">delete_outline</span>'
                        + '</div>'
                    + '</div>'
                + '</div>';                
            });

            return lista ? lista : '<div class="col text-center">Nenhum lembrete cadastrado</div>';
        },
        validateForm: function(data){
            if(data.conteudo == ""){
                sendAlert("Defina o conteúdo do lembrete!", 'warning');
                return false;
            }
            return true;
        },
        setActive: function(idLembrete = false){
            if (idLembrete != false){
                Lembretes.lembreteAtivo = idLembrete;
                $("#lembretesModalLabel").html("Editar lembrete");
                $.ajax({
                    url: base_url + "lembretes/obtem/"+idLembrete,
                    success: function (data) {
                        $("#lembreteTitulo").val(data.titulo).change();
                        $("#lembreteConteudo").val(data.conteudo).change();

                        Lembretes.functions.setPostitColor($("#potItItemColor-" + data.cor), data.cor);

                        if (data.alerta != "0000-00-00 00:00:00"){
                            $("#checkPostitNotify").click();
                            $("#dataAlerta").val(dateSqlToHtml(data.alerta)).change();
                        }
                    }
                });
            } else {
                $("#lembretesModalLabel").html("Novo lembrete");
                Lembretes.lembreteAtivo = null;
                $("#lembreteTitulo").val('');
                $("#lembreteConteudo").val('');
                $("#postitColorInput").val('bdn');
                $(".postitColorItem").css('opacity', 1);
                $("#dataAlerta").val('');
                if ($("#checkPostitNotify").is(':checked')){
                    $("#checkPostitNotify").click();
                }
            }
        },
        confirmDelete: function(idLembrete){
            if (idLembrete != false) {
                Lembretes.lembreteAtivo = idLembrete;
                $("#lembreteConfirmacaoModal").modal('show');
            }
        }
    },

    // CRUD
    List : function(){
        $.ajax({
            url: base_url+"lembretes/lista",
            beforeSend: function () {
                $(Lembretes.listField).html('');
                $(Lembretes.loadingComponent).show();
            },
            success: function (data){
                $(Lembretes.loadingComponent).hide();
                listaLembretes = Lembretes.functions.renderizaLista(data)
                $(Lembretes.listField).html(listaLembretes);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    },
    Save : function(){
        let data = {
            idLembrete: Lembretes.lembreteAtivo,
            titulo: $("#lembreteTitulo").val(),
            conteudo: $("#lembreteConteudo").val(),
            cor: $("#postitColorInput").val(),
            alerta: $("#checkPostitNotify").is(':checked'),
            dataAlerta: $("#dataAlerta").val()
        }

        if (Lembretes.functions.validateForm(data)){
            $.ajax({
                method: "POST",
                url: base_url + "lembretes/salva",
                data: data,
                beforeSend: function () {
                    $(Lembretes.submitButton).attr('disabled', true);
                    $(Lembretes.loadingComponent).show();
                },
                success: function (data) {
                    if (data == 'created'){
                        $('#lembretesModal').modal('hide')
                        sendAlert("Lembrete salvo com sucesso!", 'success');
                        Lembretes.functions.setActive();
                        Lembretes.List();
                    } else {
                        sendAlert("Erro ao salvar o lembrete!", 'danger');
                    }
                    $(Lembretes.submitButton).attr('disabled', false);
                }
            });
        }
    },
    Delete : function(){
        if (Lembretes.lembreteAtivo){
            $.ajax({
                method: "POST",
                url: base_url + "lembretes/delete/"+Lembretes.lembreteAtivo,
                beforeSend: function () {
                    $('#lembreteConfirmacaoModal').modal('hide')
                },
                success: function (data) {
                    if (data == 'deleted') {
                        sendAlert("Lembrete removido com sucesso!", 'success');
                        Lembretes.List();
                    } else {
                        sendAlert("Erro ao remover o lembrete!", 'danger');
                    }
                }
            });
        }
    }
}
