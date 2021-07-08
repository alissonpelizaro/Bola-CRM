<?php include 'public/inc/head.php'; ?>
<?php include 'public/inc/sidebar.php'; ?>

<div class="main-panel">
  <?php include 'public/inc/navbar.php'; ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-bdn">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <h4 class="card-title">Meus lembretes
                    <a href="#" class="pull-right m-0" style="font-size: 28px;" data-toggle="modal" data-target="#lembretesModal"><b>+</b></a>
                  </h4>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <div class="row" id="LembretesLoading">
                    <div class='col-sm-12'>
                      <div class="loading-spinner">
                      </div>
                    </div>
                  </div>
                  <div class="row" id="LembretesLista">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'public/inc/components/lembretes_edicao_modal.php'; ?>
  <?php include 'public/inc/footer.php'; ?>
</div>
<?php include 'public/inc/scripts.php'; ?>
<script>
  Lembretes.init();
</script>
</body>

</html>