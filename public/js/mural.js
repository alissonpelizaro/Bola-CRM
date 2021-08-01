Mural = {

    muralAtivo: null,
    listField: "#MuralLista",
    loadingComponent: "#MuralLoading",
    submitButton: "#SalvaMural",
    deleteButton: "#RemoveMural",
    preDeleteButton: ".btnDelete",
    preEditButton: ".btnEdit",
    viewMuralButton: ".viewLineMural",

    init: function () {
        this.functions.loadListeners();
        this.List();
    },
    functions: {
        loadListeners: function () {
            $('#muralModal, #muralConfirmacaoModal').on('hidden.bs.modal', function (e) {
                Mural.functions.setActive();
            })
            $(Mural.submitButton).click(function () {
                Mural.Save()
            });
            $(Mural.deleteButton).click(function () {
                Mural.Delete()
            });
            $("#btnCriticidadeBaixa").click(function() {
                Mural.functions.setCriticidade(this, 'baixa')
            });                                    
            $("#btnCriticidadeMedia").click(function() {
                Mural.functions.setCriticidade(this, 'media')
            });
            $("#btnCriticidadeAlta").click(function() {
                Mural.functions.setCriticidade(this, 'alta')
            });
        },
        loadListListeners: function(){
            $(Mural.preEditButton).click(function () {
                $("#muralModal").modal('show');
            });
            $(Mural.preDeleteButton).click(function () {
                $("#muralConfirmacaoModal").modal('show');
            });
            $(Mural.viewMuralButton).click(function () {
                Mural.functions.loadMuralView(this);
            });

            $('#tableResult').DataTable();
        },
        setCriticidade: function (element, criticidade) {
            $(".btnSetCriticidade").css('opacity', 0.5);
            $(element).css('opacity', 1);
            $("#criticidadeMural").val(criticidade);
        },
        loadMuralView: function(lineElement) {
            
            let idMural = $(lineElement).parent().data('id');
            $.ajax({
                url: base_url + "mural/obtem/" + idMural,
                success: function (data) {
                    $.ajax({
                        url: base_url + "usuarios/obtemLista/" + data.aceites,
                        success: function (data) {
                            console.log(data);
                        }
                    });
                }
            });

            $("#viewMuralModal").modal('show');            
        },
        renderizaLista: function (dados) {
            lista = '';
            count = 1;
            dados.forEach(mural => {
                var criticidadeCor = 'success';
                var criticidadeIcone = 'arrow_downward';

                var aceitesTotal = 0;
                mural.aceites = mural.aceites.replace(/\s/g, '');
                if (mural.aceites != "" && mural.aceites != ","){
                    aceitesTotal = mural.aceites.split(',').length;
                }

                if (mural.criticidade == 'media') { criticidadeCor = 'warning'; criticidadeIcone = 'remove'; }
                else if (mural.criticidade == 'alta') { criticidadeCor = 'danger'; criticidadeIcone = 'arrow_upward'; }
                lista += '<tr data-id="' + mural.id +'">'
                    + '<td class="viewLineMural">' + count +'</td>'
                    + '<td class="viewLineMural">' + mural.titulo + '</td>'
                      +'<td class="viewLineMural">'
                        + '<button type="button" class="btn btn-sm btn-' + criticidadeCor + '">'
                            + '<small class="material-icons">' + criticidadeIcone + '</small> '
                            + mural.criticidade
                        +'</button>'
                      +'</td>'
                    + '<td class="viewLineMural">' + dateSqlToHtml(mural.data_inicio) + ' - ' + dateSqlToHtml(mural.data_fim)+'</td>'
                    + '<td class="viewLineMural">' + mural.nome + ' ' + mural.sobrenome+'</td>'
                      +'<td class="viewLineMural"><button type="button" class="btn btn-sm btn-info">' + aceitesTotal +'</button></td>'
                      +'<td>'
                        +'<button type="button" class="btn btn-sm btn-outline-warning p-small btnEdit">'
                          +'<span class="material-icons">mode_edit</span>'
                        +'</button>'
                        +'<button type="button" class="btn btn-sm btn-outline-danger p-small btnDelete">'
                          +'<span class="material-icons">delete_outline</span>'
                        +'</button>'
                      +'</td>'
                    +'</tr>';
                count++;
            });

            return lista ? lista : '<tr><td class="text-center">Nenhum mural cadastrado</td></tr>';
        },
        validateForm: function (data) {
            if (data.titulo == "") {
                sendAlert("Defina o titulo do mural!", 'warning');
                return false;
            }
            if (data.conteudo == "") {
                sendAlert("Defina o conteúdo do mural!", 'warning');
                return false;
            }
            return true;
        },
        setActive: function (idMural = false) {
            if (idMural != false) {
                Mural.muralAtivo = idMural;
                $("#muralModalLabel").html("Editar mensagem de mural");
                $.ajax({
                    url: base_url + "mural/obtem/" + idMural,
                    success: function (data) {
                        $("#lembreteTitulo").val(data.titulo).change();
                        $("#lembreteConteudo").val(data.conteudo).change();

                        Mural.functions.setPostitColor($("#potItItemColor-" + data.cor), data.cor);

                        if (data.alerta != "0000-00-00 00:00:00") {
                            $("#checkPostitNotify").click();
                            $("#dataAlerta").val(dateSqlToHtml(data.alerta)).change();
                        }
                    }
                });
            } else {
                $("#muralModalLabel").html("Nova mensagem de mural");
                Mural.muralAtivo = null;
                $("#muralTitulo").val('');
                $("#muralConteudo").val('');
                $("#inicioMural").val('');
                $("#fimMural").val('');
                $("#criticidadeMural").val('baixa');
                $(".btnSetCriticidade").css('opacity', 1);
            }
        },
        confirmDelete: function (idMural) {
            if (idMural != false) {
                Mural.muralAtivo = idMural;
                $("#muralConfirmacaoModal").modal('show');
            }
        }
    },

    // CRUD
    List: function () {
        $.ajax({
            url: base_url + "mural/lista",
            beforeSend: function () {
                $(Mural.listField).html('');
                $(Mural.loadingComponent).show();
            },
            success: function (data) {
                $(Mural.loadingComponent).hide();
                listaMural = Mural.functions.renderizaLista(data)
                $(Mural.listField).html(listaMural);
                $('[data-toggle="tooltip"]').tooltip();
                Mural.functions.loadListListeners();
            }
        });
    },
    Save: function () {
        let data = {
            idMural: Mural.muralAtivo,
            titulo: $("#muralTitulo").val(),
            conteudo: $("#muralConteudo").val(),
            inicio: $("#inicioMural").val(),
            fim: $("#fimMural").val(),
            criticidade: $("#criticidadeMural").val()
        }

        if (Mural.functions.validateForm(data)) {
            $.ajax({
                method: "POST",
                url: base_url + "mural/salva",
                data: data,
                beforeSend: function () {
                    $(Mural.submitButton).attr('disabled', true);
                    $(Mural.loadingComponent).show();
                },
                success: function (data) {
                    if (data == 'created') {
                        $('#muralModal').modal('hide')
                        sendAlert("Mural salvo com sucesso!", 'success');
                        Mural.functions.setActive();
                        Mural.List();
                    } else {
                        sendAlert("Erro ao salvar o mural!", 'danger');
                    }
                    $(Mural.submitButton).attr('disabled', false);
                }
            });
        }
    },
    Delete: function () {
        if (Mural.lembreteAtivo) {
            $.ajax({
                method: "POST",
                url: base_url + "mural/delete/" + Mural.lembreteAtivo,
                beforeSend: function () {
                    $('#muralConfirmacaoModal').modal('hide');
                },
                success: function (data) {
                    if (data == 'deleted') {
                        sendAlert("Mural removido com sucesso!", 'success');
                        Mural.List();
                    } else {
                        sendAlert("Erro ao remover o mural!", 'danger');
                    }
                }
            });
        }
    }
}
