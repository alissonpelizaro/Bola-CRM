<?php include 'public/inc/head.php'; ?>
<?php include 'public/inc/sidebar.php'; ?>

<div class="main-panel">
  <?php include 'public/inc/navbar.php'; ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">book</i>
              </div>
              <p class="card-category">Meus cultos</p>
              <h3 class="card-title">2/53
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">list</i>
                <a href="#pablo">Ver todos</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Meus murais</p>
              <h3 class="card-title">3</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">notification_important</i>
                Leia sempre suas mensagens no mural!
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add_alert</i>
              </div>
              <p class="card-category">Avisos pendentes</p>
              <h3 class="card-title">3</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">notification_important</i>
                Sempre verifique os avisos pendentes
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-bdn">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <h4 class="card-title">Meus lembretes
                    <a href="#" class="pull-right m-0" style="font-size: 28px;" data-toggle="modal" data-target="#exampleModal"><b>+</b></a>
                  </h4>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <div class="row">
				  <?php 
				  foreach ($lembretes as $lembrete){
				  ?>
					<div class="col-xl-4 col-md-12">
                      <div class="card mb-2 mt-2 bg-<?php echo $lembrete->cor; ?>">
                        <div class="card-body">
                          <h4><?php echo $lembrete->titulo; ?></h4>
                          <p><?php echo $lembrete->conteudo; ?></p>
                        </div>
                      </div>
                    </div>
				  <?php
				  }
				  ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-bdn">
              <h4 class="card-title">Mural de avisos</h4>
            </div>
            <div class="card-body table-responsive">
              <div class="row">
                <div class="col-12">
                  <div class="card mt-2 mb-2 bg-danger">
                    <div class="card-body">
                      <h5 class="card-category card-category-social">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        Titulo do mural
                      </h5>
                      <h4 class="card-title">
                        <span>Texto do mural</span>
                      </h4>
                      <div class="card-stats">
                        <div class="author">
                          <a href="#pablo">
                            <span>Alisson Pelizaro</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="card mt-2 mb-2 bg-info">
                    <div class="card-body">
                      <h5 class="card-category card-category-social">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        Titulo do mural
                      </h5>
                      <h4 class="card-title">
                        <span>Texto do mural</span>
                      </h4>
                      <div class="card-stats">
                        <div class="author">
                          <a href="#pablo">
                            <span>Alisson Pelizaro</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="card mt-2 mb-2 bg-success">
                    <div class="card-body">
                      <h5 class="card-category card-category-social">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        Titulo do mural
                      </h5>
                      <h4 class="card-title">
                        <span>Texto do mural</span>
                      </h4>
                      <div class="card-stats">
                        <div class="author">
                          <a href="#pablo">
                            <span>Alisson Pelizaro</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Novo lembrete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url() ?>lembretes/novoLembrete" method="post">
		  <input type="hidden" name="origin" value="home">
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Título (opcional):</label>
                  <input type="text" name="titulo" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Conteúdo do lembrete:</label>
                    <textarea class="form-control" required name="conteudo" rows="3"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <label for="checkPostitNotify">Cor do postit:</label><br>
                <span class="postitColorItem card m-0 bg-bdn" onclick="setPostitColor(this, 'bdn')"></span>
                <span class="postitColorItem card m-0 bg-warning" onclick="setPostitColor(this, 'warning')"></span>
                <span class="postitColorItem card m-0 bg-danger" onclick="setPostitColor(this, 'danger')"></span>
                <span class="postitColorItem card m-0 bg-rose" onclick="setPostitColor(this, 'rose')"></span>
                <span class="postitColorItem card m-0 bg-primary" onclick="setPostitColor(this, 'primary ')"></span>
                <span class="postitColorItem card m-0 bg-info" onclick="setPostitColor(this, 'info')"></span>
                <span class="postitColorItem card m-0 bg-success" onclick="setPostitColor(this, 'success')"></span>
                <input type="hidden" name="color" id="postitColorInput" value="bdn">
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group bmd-form-group mt-0">
                  <label for="checkPostitNotify">Ativar alerta?</label><br>
                  <input type="checkbox" id="checkPostitNotify" value="1" class="form-control">
                </div>
              </div>
              <div class="col-md-9 mt-2 hide" id="postitNotifyContent">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Data do alerta:</label>
                  <input type="dates" name="alerta" class="date-mask form-control dateRangerTime" placeholder="">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include 'public/inc/footer.php'; ?>
</div>
<?php include 'public/inc/scripts.php'; ?>
<script>

$('#checkPostitNotify').change(function(){
  if($(this).is(':checked')){
    $("#postitNotifyContent").removeClass('hide');
  } else {
    $("#postitNotifyContent").addClass('hide');
  }
});

function setPostitColor(element, color){
  $(".postitColorItem").css('opacity', 0.5);
  $(element).css('opacity', 1);
  $("#postitColorInput").val(color);
}

</script>
</body>

</html>
