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
              <h4 class="card-title">
                Mural
                <a href="#" class="pull-right m-0" style="font-size: 28px;" data-toggle="modal" data-target="#muralModal"><b>+</b></a>
              </h4>
              <p class="card-category">Cadastro de mensagens no mural para todos do seu ministério</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="tableResult">
                  <thead class=" text-primary">
                    <th style="width: 60px;">#</th>
                    <th>Titulo</th>
                    <th>Criticidade</th>
                    <th>Período</th>
                    <th>Responsável</th>
                    <th>Aceites</th>
                    <th style="width: 85px;"></th>
                  </thead>
                  <tbody id="MuralLista">
                  </tbody>
                </table>
              </div>
              <div class="row" id="MuralLoading">
                <div class='col-sm-12'>
                  <div class="loading-spinner">
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
  <div class="modal fade" id="viewMuralModal" tabindex="-1" role="dialog" aria-labelledby="viewMuralModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detalhes do mural</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <div class="jumbotron">
                <blockquote class="blockquote mn">
                  <div class="row">
                    <div class="col">

                      <h3 class="mn text-danger">
                        Titulo do mural
                        <small class="material-icons">arrow_upward</small>
                        <span class="btn btn-success btn-sm pull-right c-default" data-toggle="tooltip" title="Período: ">
                          Em exibição
                        </span>
                      </h3>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <footer class="blockquote-footer">Conteudo</footer>
                    </div>
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Aceites:</h4>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                          <span> - Alisson Rodrigo Pelizaro</span><br>
                        </div>
                      </div>
                    </div>
                  </div>
                </blockquote>
                <div class="progress">
                  <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 100%;">
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
  <div class="modal fade" id="muralModal" tabindex="-1" role="dialog" aria-labelledby="muralModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="muralModalLabel">Nova mensagem de mural</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="mn">
          <input type="hidden" name="origin" value="home">
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Título:</label>
                  <input type="text" id="muralTitulo" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Conteúdo:</label>
                    <textarea class="form-control" id="muralConteudo" rows="3"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating" for="inicioMural">Início da exibição:</label>
                  <input type="dates" id="inicioMural" autocomplete="off" class="block-keyboard form-control date">

                </div>
              </div>
              <div class="col">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating" for="fimMural">Fim da exibição:</label>
                  <input type="dates" id="fimMural" autocomplete="off" class="form-control date">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col text-center mt">
                <label for="criticidadeMural">Criticidade:</label></br>
                <button type="button" id="btnCriticidadeBaixa" class="btnSetCriticidade btn btn-sm btn-success">Baixa</button>
                <button type="button" id="btnCriticidadeMedia" class="btnSetCriticidade btn btn-sm btn-warning">Média</button>
                <button type="button" id="btnCriticidadeAlta" class="btnSetCriticidade btn btn-sm btn-danger">Alta</button>
                <input type="hidden" name="criticidadeMural" id="criticidadeMural" value="baixa">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" id="SalvaMural" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="muralConfirmacaoModal" tabindex="-1" role="dialog" aria-labelledby="muralConfirmacaoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-delete">
        <div class="modal-header">
          <h5 class="modal-title">
            <span class="material-icons main-icon">warning</span>
            <p><small>Você tem certeza?</small></p>
          </h5>
        </div>
        <div class="modal-body">
          <p>Deseja realmente excluir definitivamente esse mural?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success mr" data-dismiss="modal">Cancelar</button>
          <button type="button" id="RemoveMural" class="btn btn-danger">Sim, excluir!</button>
        </div>
      </div>
    </div>
  </div>


  <?php include 'public/inc/footer.php'; ?>
</div>
<?php include 'public/inc/scripts.php'; ?>
<script>
  Mural.init();
</script>
</body>

</html>