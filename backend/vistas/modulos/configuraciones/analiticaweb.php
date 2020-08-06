          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Analitica Web de Google</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <!-- text input -->
                 <!-- textarea -->
                <div class="form-group">
                  <label>Google Analitics</label>
                  <textarea class="form-control cambioScript" id="googleanalitics" rows="3" placeholder="Enter ..."> <?php echo $configuraciones["googleanalitics"]; ?> </textarea>
                </div>
                

                <div class="form-group">
                   <label>Bienvenida</label>
                <textarea class="form-control cambioScript" id="bienvenida"  rows="3" placeholder="Enter ..."> <?php echo $configuraciones["bienvenida"]; ?></textarea>

            </div>

                <div class="box-footer">
                   <button type="button" id="guardarScript" class="btn btn-primary pull-right">Guardar Números</button>
                </div>
            </div>
          </div>