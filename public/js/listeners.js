// Lembretes
lembreteShowing = null;

function checaLembretes(){
    $.ajax({
        url: base_url + "lembretes/alerta",
        success: function (data) {
            if (data.length){
                showLembreteAlert(data[0])
            } else {
                $("#LembreteAlerta").hide();
            }
            setTimeout(checaLembretes, 60000)
        }
    });
}
checaLembretes();

$("#AlertaSilenciarLembrete").click(function(){
    $("#LembreteAlerta").hide();
    $.ajax({
        method: "POST",
        url: base_url + "lembretes/salva",
        data: {
            idLembrete: lembreteShowing.id,
            titulo: lembreteShowing.titulo,
            conteudo: lembreteShowing.conteudo,
            cor: lembreteShowing.cor,
            alerta: false
        },
        success: function (data) {
            if (typeof Lembretes != 'undefined') {
                Lembretes.List();
            }
        }
    });
});
$("#AlertaExcluirLembrete").click(function(){
    $("#LembreteAlerta").hide();
    $.ajax({
        method: "POST",
        url: base_url + "lembretes/delete/" + lembreteShowing.id,
        success: function (data) {
            if (typeof Lembretes != 'undefined') {
                Lembretes.List();
            }
        }
    });
});





