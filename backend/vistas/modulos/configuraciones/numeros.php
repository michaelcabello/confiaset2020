                <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Números</h3>
                    </div>

                    <div class="box-body">
                      <div class="row">
                        <div class="col-xs-3">
                          <input type="text" class="form-control cambioNumero" id="numero1" value="<?php echo $configuraciones["numero1"]; ?>" placeholder="num 1">
                        </div>
                        <div class="col-xs-3">
                          <input type="text" class="form-control cambioNumero" id="numero2" value="<?php echo $configuraciones["numero2"]; ?>" placeholder="num 2">
                        </div>
                        <div class="col-xs-3">
                          <input type="text" class="form-control cambioNumero" id="numero3" value="<?php echo $configuraciones["numero3"]; ?>" placeholder="num 3">
                        </div>
                        <div class="col-xs-3">
                          <input type="text" class="form-control cambioNumero" id="numero4" value="<?php echo $configuraciones["numero4"]; ?>" placeholder="num 4">
                        </div>
                      </div>

                      <div class="box-footer">
                          <button type="button" id="guardarNumeros" class="btn btn-primary pull-right">Guardar Números</button>
                      </div>
                    </div>
                </div>