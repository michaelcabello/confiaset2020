          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Teléfono - Celular</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-3">
                  <input type="text" class="form-control cambioTelefono" id="telefono1" value="<?php echo $configuraciones["telefono1"]; ?>" placeholder="telf 1">
                </div>
                <div class="col-xs-3">
                  <input type="text" class="form-control cambioTelefono" id="telefono2" value="<?php echo $configuraciones["telefono2"]; ?>" placeholder="telf 2">
                </div>
                <div class="col-xs-3">
                  <input type="text" class="form-control cambioTelefono" id="celular1" value="<?php echo $configuraciones["celular1"]; ?>" placeholder="cel 1">
                </div>
                <div class="col-xs-3">
                  <input type="text" class="form-control cambioTelefono" id="celular2" value="<?php echo $configuraciones["celular2"]; ?>" placeholder="cel 2">
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
      
              <button type="button" id="guardarTelefono" class="btn btn-primary pull-right">Guardar Telefonos</button>
    
            </div>
          </div>