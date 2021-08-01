let localeTimeFormat = {
    "format": 'DD/MM/YYYY HH:mm',
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
}

let localeFormat = localeTimeFormat;
localeFormat.format = 'DD/MM/YYYY'

$('.dateRangerTime').daterangepicker({
    singleDatePicker: true,
    timePicker: true,
    timePicker24Hour: true,
    locale: localeTimeFormat
});

$('.date').daterangepicker({
    singleDatePicker: true,
    locale: localeFormat,
});