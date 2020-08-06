   
         <div class="box box-primary">
                  <!--=====================================
                  LOGOTIPOO
                  ======================================-->

                <div class="box-header with-border">

                  <h3 class="box-title">LOGOTIPO</h3>

                  <div class="box-tools pull-right">
                    
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">

                      <i class="fa fa-minus"></i>

                    </button>

                  </div>
                
                </div>


                <div class="box-body">
                
                  <div class="form-group">
                    
                    <label>Cambiar logotipo</label>

                    <p class="pull-right">
                      
                      <img src="<?php  echo $configuraciones["logo"]; ?>" class="img-thumbnail previsualizarLogodeconf" width="200px">

                    </p>

                    <input type="file" id="subirLogodeconf">

                      <p class="help-block">Tamaño recomendado 500px * 100px</p>  

                  </div>  

                </div>
                


                <div class="box-footer">
                  
                  <button type="button" id="guardarLogodeconf" class="btn btn-primary pull-right">Guardar Logotipo</button>

                </div>

                <!--=====================================
                  ICONO
                  ======================================-->

                <div class="box-header with-border">

                  <h3 class="box-title">ICONO</h3>
                
                </div>

                <div class="box-body">
                
                  <div class="form-group">
                    
                    <label>Cambiar icono</label>

                    <p class="pull-right">
                      
                      <img src="<?php  echo $configuraciones["icono"]; ?>" class="img-thumbnail previsualizarIconodeconf" width="50px">

                    </p>

                    <input type="file" id="subirIconodeconf">

                    <p class="help-block">Tamaño recomendado 100px * 100px</p>  

                  </div>  

                </div>

                <div class="box-footer">
                  
                  <button type="button" id="guardarIconodeconf" class="btn btn-primary pull-right">Guardar Icono</button>

                </div>

           
          </div>