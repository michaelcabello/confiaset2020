<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor categorías del Blog
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor categorías del Blog</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
         
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoriablog">

            Agregar categoría del Blog

          </button>

      </div>

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaCategoriasblog" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">#</th>
              <th>Categoría</th>
              <th>Ruta</th>
              <th>Estado</th>
              <th>Descripción</th>
              <th>Palabras Claves</th>
              <th>Imagen</th>
              <th>Acciones</th>

            </tr>

          </thead>

        </table> 

      </div>
        
    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoriablog" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar Categoría para el Blog</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">

            <!--=====================================
            ENTRADA DEL TITULO DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg validarCategoriablog tituloCategoriablog" placeholder="Ingresar Categoria del blog" name="tituloCategoriablog" required> 

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-link"></i></span>

                <input type="text" class="form-control input-lg rutaCategoriablog" placeholder="Ruta url para la categoría blog" name="rutaCategoriablog" readonly required> 

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LA DESCRIPCIÓN DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                <textarea class="form-control input-lg" name="descripcionCategoriablog"  rows="5" placeholder="Ingresar descripción categoría" required></textarea>

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA EL DESCRIPTION DESCRIPCION RESUMIDA SE GUARDARA EN CABECERA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                <textarea maxlength="180" class="form-control input-lg" name="descriptionCategoriablog"  rows="3" placeholder="Ingresar descriptión categoría" required></textarea>

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LAS PALABRAS CLAVES DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg pClavesCategoriablog tagsInput" data-role="tagsinput" placeholder="Ingresar palabras claves" name="pClavesCategoriablog" required> 

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA SUBIR FOTO DE PORTADA
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO PORTADA PARA CATEGORIA DEL BLOG</div>

               <input type="file" class="fotoPortadablog" name="fotoPortadablog">

               <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

                <img src="vistas/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortadablog" width="100%">

            </div>
            <!--=====================================
            ENTRADA PARA SUBIR FOTO DE PORTADA
            ======================================-->


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar categoría</button>

        </div>


       </form>

      <?php

        
          $crearCategoriablog = new ControladorCategoriasblog();
          $crearCategoriablog -> ctrCrearCategoriablog();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoriablog" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Modificar Categoría para el Blog</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">

            <!--=====================================
            ENTRADA DEL TITULO DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg validarCategoriablog tituloCategoriablog" placeholder="Ingresar Categoria del blog" name="editarTituloCategoriablog" required> 

                <input type="hidden" class="editarIdCategoriablog" name="editarIdCategoriablog">
                <input type="hidden" class="editarIdCabecerablog" name="editarIdCabecerablog">


              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-link"></i></span>

                <input type="text" class="form-control input-lg rutaCategoriablog" placeholder="Ruta url para la categoría blog" name="rutaCategoriablog" readonly required> 

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LA DESCRIPCIÓN DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                <textarea class="form-control input-lg" name="descripcionCategoriablog"  rows="5" placeholder="Ingresar descripción categoría" required></textarea>

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA EL DESCRIPTION DESCRIPCION RESUMIDA SE GUARDARA EN CABECERA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                <textarea maxlength="180" class="form-control input-lg" name="descriptionCategoriablog"  rows="3" placeholder="Ingresar descriptión categoría" required></textarea>

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LAS PALABRAS CLAVES DE LA CATEGORÍA
            ======================================-->
            <div class="form-group editarPalabrasClaves">
               

            </div>


            <!--=====================================
            ENTRADA PARA SUBIR FOTO DE PORTADA
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO PORTADA PARA CATEGORIA DEL BLOG</div>
                 <input type="file" class="fotoPortada" name="fotoPortada">
                 <input type="hidden" class="antiguaFotoPortada" name="antiguaFotoPortada">

               <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

                <img src="vistas/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortadablog" width="100%">

            </div>
            <!--=====================================
            ENTRADA PARA SUBIR FOTO DE PORTADA
            ======================================-->


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cambios categoría</button>

        </div>


       </form>

      <?php

        
          $crearCategoriablog = new ControladorCategoriasblog();
          $crearCategoriablog -> ctrEditarCategoriablog();

      ?>

    </div>

  </div>

</div>


 <?php

        
    $eliminarCategoriablog = new ControladorCategoriasblog();
    $eliminarCategoriablog -> ctrEliminarCategoriablog();

  ?>


<!--=====================================
BLOQUEO DE LA TECLA ENTER
======================================-->

<script>
  
$(document).keydown(function(e){

  if(e.keyCode == 13){

    e.preventDefault();

  }

})


</script>


