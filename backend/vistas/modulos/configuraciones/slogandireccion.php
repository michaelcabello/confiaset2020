

                 <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Slogan, Dirección</h3>
                    </div>
                    <div class="box-body">
                      <div class="row">
                        
                        <div class="col-xs-12 form-group">
                          <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Slogan</label>
                          <input type="text" class="form-control cambioSloganDireccion" id="slogan" value="<?php echo $configuraciones["slogan"]; ?>" placeholder="slogan...">
                         
                        </div>
                        <br>

                        <div class="col-xs-12 form-group">
                          <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Direccion 1
                          </label>
                          <input type="text" class="form-control cambioSloganDireccion" id="direccion1" value="<?php echo $configuraciones["direccion1"]; ?>" placeholder="Dirección  ...">
                        </div>
                        <br>

                        <div class="col-xs-12 form-group">
                          <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Direccion 2
                          </label>
                          <input type="text" class="form-control cambioSloganDireccion" id="direccion2" value="<?php echo $configuraciones["direccion2"]; ?>" placeholder="Dirección ...">
                        </div>

                        

                      </div>
                    </div>
                    <div class="box-footer">
                          <button type="button" id="guardarSloganDireccion" class="btn btn-primary pull-right">Guardar</button>
                    </div>

                </div>
      