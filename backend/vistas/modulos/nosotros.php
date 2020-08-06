
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          General Form Elements
          <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="inicio"><i class="fa fa-dashboard"></i> inicio</a></li>
          <li class="active">Configuraciones</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <!-- left column primera columna -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                    <!--=====================================
                    LOGOTIPO
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
                        
                        <img src="<?php  echo $plantilla["logo"]; ?>" class="img-thumbnail previsualizarLogo" width="200px">

                      </p>

                      <input type="file" id="subirLogo">

                      <p class="help-block">Tamaño recomendado 500px * 100px</p>  

                    </div>  

                  </div>

                  <div class="box-footer">
                    
                    <button type="button" id="guardarLogo" class="btn btn-primary pull-right">Guardar Logotipo</button>

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
                        
                        <img src="<?php  echo $plantilla["icono"]; ?>" class="img-thumbnail previsualizarIcono" width="50px">

                      </p>

                      <input type="file" id="subirIcono">

                      <p class="help-block">Tamaño recomendado 100px * 100px</p>  

                    </div>  

                  </div>

                  <div class="box-footer">
                    
                    <button type="button" id="guardarIcono" class="btn btn-primary pull-right">Guardar Icono</button>

                  </div>

             
            </div>
            <!-- /.box -->

            <!-- Form Element sizes -->
   
            <!-- /.inicia telefono-->

            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Teléfono - Celular</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-3">
                    <input type="text" class="form-control" placeholder="telf 1">
                  </div>
                  <div class="col-xs-3">
                    <input type="text" class="form-control" placeholder="telf 2">
                  </div>
                  <div class="col-xs-3">
                    <input type="text" class="form-control" placeholder="cel 1">
                  </div>
                  <div class="col-xs-3">
                    <input type="text" class="form-control" placeholder="cel 2">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
        
                <button type="button" id="guardarColores" class="btn btn-primary pull-right">Guardar Telefonos</button>
      
              </div>
            </div>
            <!-- /.termina telefono -->


            <!-- Input addon -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Actualización de Correos y Redes Sociales</h3>
              </div>
        
              <div class="box-body">
             
                <h4>Email</h4>

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg" placeholder="Email 1">
                </div>
                <br>

                <div class="input-group">
                  <span class="input-group-addon "><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg" placeholder="Email 2">
                </div>
                <br>

         


                <h4>Facebook, Youtube, Twitter, ...</h4>

                <div class="row">
                  <div class="col-lg-10">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox">
                          </span>
                      <input type="text" class="form-control input-lg">
                      <span class="input-group-addon"><i class="fa fa-facebook redSocial"></i></span>
                    </div>
                    <br>

                     <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox">
                          </span>
                      <input type="text" class="form-control input-lg">
                      <span class="input-group-addon"><i class="fa fa-facebook redSocial"></i></span>
                    </div>
                     <br>

                     <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox">
                          </span>
                      <input type="text" class="form-control input-lg">
                      <span class="input-group-addon"><i class="fa fa-facebook redSocial"></i></span>
                    </div>
                     <br>

                     <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox">
                          </span>
                      <input type="text" class="form-control input-lg">
                      <span class="input-group-addon"><i class="fa fa-facebook redSocial"></i></span>
                    </div>
                     <br>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->

                  <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->



                <!-- /input-group -->

                <!-- /input-group -->


               
                <!-- /input-group -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
        
                <button type="button" id="guardarColores" class="btn btn-primary pull-right">Guardar Correos y Redes</button>
      
               </div>
            </div>
            <!-- /.box -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!-- derecha segunda columna-->

          <div class="col-md-6">
            <!-- Horizontal Form -->

            <!-- /.box -->
            <!-- general form elements disabled -->
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
                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                  

                  <div class="form-group">
                     <label>Bienvenida</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>

              </div>

                  <div class="box-footer">
                     <button type="button" id="guardarRedesSociales" class="btn btn-primary pull-right">Guardar Números</button>
                  </div>
              </div>
            </div>

         

                   <div class="box box-danger">
                      <div class="box-header with-border">
                        <h3 class="box-title">Slogan, Dirección</h3>
                      </div>
                      <div class="box-body">
                        <div class="row">
                          
                          <div class="col-xs-12 form-group">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Slogan</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                           
                          </div>
                          <br>

                          <div class="col-xs-12 form-group">
                            <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Direccion 1
                            </label>
                            <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
                          </div>
                          <br>

                          <div class="col-xs-12 form-group">
                            <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Direccion 2
                            </label>
                            <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
                          </div>

                          

                        </div>
                      </div>
                      <div class="box-footer">
                            <button type="button" id="guardarRedesSociales" class="btn btn-primary pull-right">Guardar</button>
                      </div>

                  </div>
        


                  <div class="box box-danger">
                      <div class="box-header with-border">
                        <h3 class="box-title">Números</h3>
                      </div>
                      <div class="box-body">
                        <div class="row">
                          <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder="num 1">
                          </div>
                          <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder="num 2">
                          </div>
                          <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder="num 3">
                          </div>
                          <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder="num 4">
                          </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" id="guardarRedesSociales" class="btn btn-primary pull-right">Guardar Números</button>
                        </div>
                      </div>
                  </div>


                  <!-- select -->
        

                  <!-- Select multiple-->
            <!-- /.box -->
          </div>




          <!--/.col (right) -->


        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
