  <!-- Modal -->
  <div class="modal fade" id="lembretesModal" tabindex="-1" role="dialog" aria-labelledby="lembretesModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="lembretesModalLabel">Novo lembrete</h5>
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
                                  <label class="bmd-label-floating">Título (opcional):</label>
                                  <input type="text" id="lembreteTitulo" class="form-control">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <div class="form-group bmd-form-group">
                                      <label class="bmd-label-floating">Conteúdo do lembrete:</label>
                                      <textarea class="form-control" id="lembreteConteudo" rows="3"></textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-12">
                              <label for="checkPostitNotify">Cor do postit:</label><br>
                              <span id="potItItemColor-bdn" class="postitColorItem card m-0 bg-bdn" onclick="Lembretes.functions.setPostitColor(this, 'bdn')"></span>
                              <span id="potItItemColor-warning" class="postitColorItem card m-0 bg-warning" onclick="Lembretes.functions.setPostitColor(this, 'warning')"></span>
                              <span id="potItItemColor-danger" class="postitColorItem card m-0 bg-danger" onclick="Lembretes.functions.setPostitColor(this, 'danger')"></span>
                              <span id="potItItemColor-rose" class="postitColorItem card m-0 bg-rose" onclick="Lembretes.functions.setPostitColor(this, 'rose')"></span>
                              <span id="potItItemColor-primary" class="postitColorItem card m-0 bg-primary" onclick="Lembretes.functions.setPostitColor(this, 'primary ')"></span>
                              <span id="potItItemColor-info" class="postitColorItem card m-0 bg-info" onclick="Lembretes.functions.setPostitColor(this, 'info')"></span>
                              <span id="potItItemColor-success" class="postitColorItem card m-0 bg-success" onclick="Lembretes.functions.setPostitColor(this, 'success')"></span>
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
                                  <input type="dates" id="dataAlerta" autocomplete="off" class="block-keyboard form-control dateRangerTime">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> -->
                      <button type="button" id="SalvaLembrete" class="btn btn-primary">Salvar</button>
                  </div>
              </form>
          </div>
      </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="lembreteConfirmacaoModal" tabindex="-1" role="dialog" aria-labelledby="lembretesConfirmacaoModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content modal-delete">
              <div class="modal-header">
                  <h5 class="modal-title">
                      <span class="material-icons main-icon">warning</span>
                      <p><small>Você tem certeza?</small></p>
                  </h5>
              </div>
              <div class="modal-body">
                  <p>Deseja realmente excluir definitivamente esse lembrete?</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-success mr" data-dismiss="modal">Cancelar</button>
                  <button type="button" id="RemoveLembrete" class="btn btn-danger">Sim, excluir!</button>
              </div>
          </div>
      </div>
  </div>