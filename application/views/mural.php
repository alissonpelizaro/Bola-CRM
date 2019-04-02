<?php include 'public/inc/head.php'; ?>
<?php include 'public/inc/sidebar.php'; ?>

<div class="main-panel">
  <?php include 'public/inc/navbar.php'; ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-bdn">
                <h4 class="card-title">Mural <button class="btn btn-sm btn-secondary pull-right">Novo mural</button></h4>
              <p class="card-category">Cadastro de mensagens de mural para responsávels de escala</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="tableResult">
                  <thead class=" text-primary">
                    <th style="width: 60px;">#</th>
                    <th>Data</th>
                    <th>Palavra</th>
                    <th>Pastor</th>
                    <th>Responsável</th>
                    <th style="width: 60px;"></th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>01/01/2019</td>
                      <td>Nome da palavra</td>
                      <td>Nome do pastor</td>
                      <td>Nome do responsável</td>
                      <td><button type="button" class="btn btn-sm btn-info">Ver</button> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'public/inc/footer.php'; ?>
</div>
<?php include 'public/inc/scripts.php'; ?>
<script>
$(document).ready( function (){
  $('#tableResult').DataTable();
  $('input[type="dates"]').daterangepicker({
    singleDatePicker: true,
    locale: {
      format: 'DD/MM/YYYY',
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
});
</script>
</body>

</html>
