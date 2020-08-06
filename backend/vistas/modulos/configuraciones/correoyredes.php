         
          <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Actualización de Correos y Redes Sociales</h3>
              </div>
        
              <div class="box-body">
             
                <h4>Email</h4>

                <div class="input-group">
                  <span class="input-group-addon "><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg cambioCorreoRedes" id="email1" value="<?php echo $configuraciones["email1"]; ?>" placeholder="Email 1">
                </div>

                <br>

                <div class="input-group">
                  <span class="input-group-addon "><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg cambioCorreoRedes" id="email2" value="<?php echo $configuraciones["email2"]; ?>" placeholder="Email 2">
                </div>

                <br>


                <h4>Facebook, Youtube, Twitter, ...</h4>

                <div class="row">
                  <div class="col-lg-10">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox">
                          </span>
                      <input type="text" class="form-control input-lg cambioCorreoRedes" id="facebook" value="<?php echo $configuraciones["facebook"]; ?>">
                      <span class="input-group-addon"><i class="fa fa-facebook redSocial"></i></span>
                    </div>
                    <br>

                     <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox">
                          </span>
                      <input type="text" class="form-control input-lg cambioCorreoRedes" id="youtube" value="<?php echo $configuraciones["youtube"]; ?>">
                      <span class="input-group-addon"><i class="fa fa-facebook redSocial"></i></span>
                    </div>
                     <br>

                     <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox">
                          </span>
                      <input type="text" class="form-control input-lg cambioCorreoRedes" id="twitter" value="<?php echo $configuraciones["twitter"]; ?>">
                      <span class="input-group-addon"><i class="fa fa-facebook redSocial"></i></span>
                    </div>
                     <br>

                     <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox">
                          </span>
                      <input type="text" class="form-control input-lg cambioCorreoRedes" id="instagram" value="<?php echo $configuraciones["instagram"]; ?>">
                      <span class="input-group-addon"><i class="fa fa-facebook redSocial"></i></span>
                    </div>
                     <br>
                    <!-- /input-group -->
                  </div>

                </div>
                <!-- /.row -->
               

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
        
                 <button type="button" id="guardarCorreoRedes" class="btn btn-primary pull-right">Guardar Correos y Redes</button>
      
               </div>
          </div>