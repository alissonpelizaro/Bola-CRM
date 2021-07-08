function sendAlert(mensagem, color = 'info', delay = 2000){
  //Cores: 'info', 'danger', 'success', 'warning', 'rose', 'primary'
  $.notify({
    icon: "error_outline",
    message: mensagem
  }, {
    type: color,
    delay: delay,
    placement: {
      from: 'top',
      align: 'center'
    }
  });
}

function loadGet(){
  let preParams = window.location.search.replace('?', '').split('&');
  let params = [];

  $.each(preParams, function (key, value) {
    if (value != ""){
      paramData = value.split('=');
      paramValue = paramData.length == 2 ? paramData[1] : "";
      params[paramData[0]] = decodeURI(paramValue);
    }
  });
  return params;
}
var URLParams = loadGet();


$.switcher('input[type=checkbox]');
$.switcher('input[type=radio]');
$('[data-toggle="tooltip"]').tooltip();
$(".block-keyboard").keydown(function (event) {
  return false;
});

$('.dateRangerTime').daterangepicker({
  singleDatePicker: true,
  timePicker: true,
  timePicker24Hour: true,
 
  locale: {
    format: 'DD/MM/YYYY HH:mm',
    "applyLabel": "Aplicar",
    "cancelLabel": "Cancelar",
    "fromLabel": "De",
    "toLabel": "Para",
    "customRangeLabel": "Custom",
    "weekLabel": "W",
    "daysOfWeek": [
      "Do",
      "Se",
      "Te",
      "Qu",
      "Qu",
      "Se",
      "Sa"
    ],
    "monthNames": [
      "Janeiro",
      "Fevereiro",
      "Março",
      "Abril",
      "Maio",
      "Junho",
      "Julho",
      "Agosto",
      "Setembro",
      "Outubro",
      "Novembro",
      "Dezembro"
    ],
    "firstDay": 1
  },
});


function dateSqlToHtml(date){
  if (date == ''){
    return date;
  }

  date = date.split(' ');
  if (date.length > 1){
    hora = " "+date[1]
  } else { hora = ""; }
  date = date[0].split('-');

  return date[2]+"/"+date[1]+"/"+date[0]+hora;
}

function showLembreteAlert(lembrete){
  let titulo = lembrete.titulo ? lembrete.titulo : 'Alerta de lembrete!';
  $("#AlertaLembreteTitulo").html(titulo);
  $("#AlertaLembreteConteudo").html(lembrete.conteudo);
  $("#LembreteAlerta").removeClass('bg-bdn bg-warning bg-danger bg-rose bg-primary bg-info bg-success')
  $("#LembreteAlerta").addClass('bg-'+lembrete.cor);
  $("#LembreteAlerta").show();
  lembreteShowing = lembrete;
}