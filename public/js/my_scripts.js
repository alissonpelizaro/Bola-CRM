function sendAlert(mensagem, color = 'info'){

//Cores: 'info', 'danger', 'success', 'warning', 'rose', 'primary'

  $.notify({
    icon: "error_outline",
    message: mensagem
  }, {
    type: color,
    timer: 5000,
    placement: {
      from: 'bottom',
      align: 'left'
    }
  });

}

$.switcher('input[type=checkbox]');
$.switcher('input[type=radio]');

$('.dateRangerTime').daterangepicker({
  singleDatePicker: true,
  timePicker: true,
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
