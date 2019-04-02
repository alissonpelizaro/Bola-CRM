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
              <h4 class="card-title">Relatório de cultos</h4>
              <p class="card-category">Meus cultos</p>
            </div>
            <div class="card-body pt-5">
              <form>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Data inicial</label>
                      <input type="dates" class="date-mask form-control" placeholder="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Data final</label>
                      <input type="dates" class="date-mask form-control" placeholder="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Título da palavra</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label style="margin: 0px; padding: 0;font-size: 12px;">Responsável</label>
                    <div class="form-group mt-0 pt-0">
                      <select style="margin-top: -5px;" class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label style="margin: 0px; padding: 0;font-size: 12px;">Pastor</label>
                    <div class="form-group mt-0 pt-0">
                      <select style="margin-top: -5px;"  class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12 text-right">
                    <button type="submit" class="btn btn-bdn">Filtrar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
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
