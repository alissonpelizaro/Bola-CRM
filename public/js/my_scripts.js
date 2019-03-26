function sendAlert(mensagem, color = 'info'){

//Cores: 'info', 'danger', 'success', 'warning', 'rose', 'primary'

  $.notify({
    icon: "add_alert",
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
