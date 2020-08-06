<div class="content-wrapper" id="listadoregistros" style="display: none;">

  <section class="content-header">

   <h1>
      Adminsitrador del Blog
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrador del Blog</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">
       
      <div class="box-header with-border">        
        <button class="btn btn-primary" onclick="location.href = 'blognuevo' ">
          Agregar un Post para el Blog
        </button>
      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaBlog" width="100%">
        
          <thead>
         
            <tr>
             
               <th style="width:10px">#</th>
               <th>Categoria</th>
               <th>Subcategoria</th>
               <th>Usuario</th>
               <th>Ruta</th>
               <th>Titulo</th>
               <th>Estado</th>
               <th>Descripcion Resumen</th>
               <th>Palabras claves</th>
               <th>Imagen</th>
               <th>Fecha</th>
               <th>Acciones</th>

            </tr> 

          </thead>   
     
        </table>
          
      </div>





    </div>

  </section>

</div>

<!--=====================================
AGREGAR PRODUCTO
======================================-->

<div class="content-wrapper" id="formularioregistros">
    <!-- Content Header (Page header) -->



    <section class="content-header">
      <h1>
        Ingreso de Post
        <small>Contenidos del blog</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> inicio</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Blog</li>
      </ol>
    </section>

    <form method="post" enctype="multipart/form-data">
        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">contenidos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">

                <div class="col-md-6"><!-- primera columna -->
                    <!--=====================================
                    ENTRADA PARA EL TÍTULO DEL POST
                    ======================================-->
                      <div class="form-group">
                      
                        <div class="input-group">
                      
                          <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                          <input type="text" class="form-control input-lg validarPost tituloPost" name="tituloPost" placeholder="Ingresar título del post">

                        </div>

                      </div>
                      <!--=====================================
                      ENTRADA PARA LA RUTA DEL PPOST
                      ======================================-->

                      <div class="form-group">
                        
                          <div class="input-group">
                        
                            <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                            <input type="text" class="form-control input-lg rutaPost" placeholder="Ruta url del post" readonly>

                          </div>

                      </div>

                    <!--=====================================
                    AGREGAR CATEGORÍA
                    ======================================-->

                    <div class="form-group col-md-6">
                      
                       <div class="input-group">
                      
                          <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                          <select class="form-control input-lg seleccionarCategoriablog">

                              <option value="">Selecionar categoría del Blog</option>

                              <?php

                              $item = null;
                              $valor = null;

                              $categorias = ControladorCategoriasblog::ctrMostrarCategoriasblog($item, $valor);

                              foreach ($categorias as $key => $value) {
                                
                                echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                              }

                              ?>        

                          </select>

                        </div>

                    </div>

                    <!--=====================================
                    AGREGAR subCATEGORÍA
                    ======================================-->

                    <div class="form-group  entradaSubcategoriablog col-md-6">
                      
                       <div class="input-group">
                      
                          <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                          <select class="form-control input-lg seleccionarSubCategoriablog">

                          </select>

                        </div>

                    </div>


                    <!--=====================================
                    ENTRADA PARA NUMERO DE VISITAS
                    ======================================-->
                      <div class="form-group col-md-4">
                      
                        <div class="input-group">
                      
                          <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                          <input type="text" class="form-control input-lg tituloPost"  placeholder="numero de visitas">

                        </div>

                      </div>


                    <!--=====================================
                    ENTRADA PARA ESTRELLAS
                    ======================================-->
                      <div class="form-group col-md-4">
                      
                        <div class="input-group">
                      
                          <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                          <input type="text" class="form-control input-lg tituloPost"  placeholder="Ingresar estrellas">

                        </div>

                      </div>


                    <!--=====================================
                    ENTRADA PARA FECHAS
                    ======================================-->
                      <div class="form-group col-md-4">
                      
                        <div class="input-group">
                      
                          <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                          <input type="text" class="form-control input-lg tituloPost"  placeholder="Ingresar fecha">

                        </div>

                      </div>

                    <!--=====================================
                    ENTRADA PARA EL TITLE
                    ======================================-->
                      <div class="form-group">
                      
                        <div class="input-group">
                      
                          <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                          <input type="text" class="form-control input-lg tituloPost"  placeholder="Ingresar title">

                        </div>

                      </div>


                    <!--=====================================
                    ENTRADA PARA DESCRIPTION
                    ======================================-->
                      <div class="form-group">
                      
                        <div class="input-group">
                      
                          <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                          <input type="text" class="form-control input-lg tituloPost"  placeholder="Ingresar descriptiont">

                        </div>

                      </div>

                    <!--=====================================
                    ENTRADA PARA KEYWORDS
                    ======================================-->
                      <div class="form-group">
                      
                        <div class="input-group">
                      
                          <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                          <input type="text" class="form-control input-lg tituloPost"  placeholder="Ingresar palabras claves">

                        </div>

                      </div>

                      <!--=====================================
                      AGREGAR DESCRIPCIÓN CORTA
                      ======================================-->

                      <div class="form-group">
                        
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                          <textarea type="text" maxlength="320" rows="3" class="form-control input-lg descripcionCorta" placeholder="Ingresar descripción corta del post" name="descripcionCorta"></textarea>

                        </div>

                      </div>



                </div><!-- fin primera columna -->


                <div class="col-md-6"><!-- segunda columna -->

                     <!--=====================================
                      ENTRADA PARA VIDEO
                      ======================================-->
                        <div class="form-group">
                        
                          <div class="input-group">
                        
                            <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                            <input type="text" class="form-control input-lg tituloPost"  placeholder="Ingresar ruta de viedo youtube">

                          </div>

                        </div>


                      <!--=====================================
                      AGREGAR FOTO DE PORTADA
                      ======================================-->

                      <div class="form-group">
                        
                        <div class="panel">SUBIR FOTO PORTADA</div>

                        <input type="file" class="fotoPortada">

                        <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

                        <img src="vistas/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

                      </div>

                </div><!-- segunda columna -->

            </div>
            <!-- /.box-body -->
          
          </div>
          <!-- /.box -->

          
          <!-- /.row -->

        </section>
        <!-- /.content -->

        <section class="content">
          <div class="row">
            <div class="col-md-12">
              
              <div class="box box-info">

                <div class="box-header">
                  <h3 class="box-title">Descripción 
                    <small>Contenido completo del post</small>
                  </h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                  <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                   <!-- quitamos el form -->
                      
                        <textarea id="editor1" class ="editor1" name="editor1" rows="10" cols="80">
                              This is my textarea to be replaced with CKEditor.
                        </textarea>
                    
                    <!-- quitamos el form -->

                </div>
                
              </div>
              <!-- /.box -->

           
            </div>
            <!-- /.col-->
          </div>
          <!-- ./row -->
        </section>


            <div class="modal-footer">
              
              <button type="button" class="btn btn-primary">Salir</button>

              <button type="submit" class="btn btn-primary">Guardar Post</button>

            </div>

    </form>

  <?php

          
  $crearBlog = new ControladorBlog();
  $crearBlog -> ctrCrearBlog();

  ?>
</div>


<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->



