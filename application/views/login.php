<?php include 'public/inc/head.php'; ?>

    <div style="margin-top: calc(15vh);">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 offset-lg-4 col-md-12">
              <div class="card">
                <div class="card-header card-header-bdn">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title text-center"><p>
                        <img src="<?php echo base_url() ?>public/img/logo_white.png" alt="Bola de Neve" height="200px">
                      </p>
                    </span>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <form class="" action="index.html" method="post">
                      <div class="row">
                        <div class="col-12 text-center">
                          <p class="h4 mt-3">Bem vindo! Entre com suas credenciais:</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Username</label>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Email address</label>
                            <input type="email" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-8 offset-2 mt-5">
                          <button class="btn btn-primary btn-block">Entrar</button>
                        </div>
                      </div>
                    </form>
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
  </script>
</body>

</html>
