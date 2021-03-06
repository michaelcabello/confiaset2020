<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Gestor de Contenidos
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor de Contenidos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSubCategoria">
          
          Agregar subcategoría

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaSubCategoriasd" width="100%">
      <!-- a  tablaSubCategoriasd se le plica la propiedad datatable-->
        <thead>
         
           <tr>
             
               <th style="width:10px">#</th>
               <th>Subcategoria</th>
               <th>Categoria</th>
               <th>Ruta</th>
               <th>Estado</th>
               <th>Orden</th>
               <th>Palabras claves</th>
               <th>Portada</th>
               <th>titulo1</th>
               <th>Imagen1</th>
               <th>titulo2</th>
               <th>titulo3</th>
               <th>titulo4</th>
               <th>Acciones</th>

           </tr> 

        </thead>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR SUBCATEGORÍA
======================================-->

<div id="modalAgregarSubCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Contenidos subcategoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--=====================================
            ENTRADA PARA EL NOMBRE DE LA SUBCATEGORÍA
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg validarSubCategoriad tituloSubCategoriad" name="tituloSubCategoriad" placeholder="Ingresar la subcategoría" required>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DE LA SUBCATEGORÍA
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                <input type="text" class="form-control input-lg rutaSubCategoriad" name="rutaSubCategoriad" placeholder="Ruta url de la subcategoría" readonly required>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA SELECCIONAR LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg seleccionarCategoriad" name="seleccionarCategoriad" required>
                  
                  <option value="">Seleccionar categoría</option>

                  <?php

                    $item = null;
                    $valor = null;

                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                    foreach ($categorias as $key => $value) {
                      
                      echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                    }

                  ?>
  
                </select>

              </div>

            </div>
             <!--=====================================
            ENTRADA PARA LAS PALABRAS CLAVES
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg tagsInput" data-role="tagsinput"  name="pClavesSubCategoriad" placeholder="Ingresar palabras claves" required>

              </div>

            </div>


            <!--=====================================
            ENTRADA PARA EL ORDEN
            ======================================-->
            
            <div class="form-group">
              
                  <div class="col-md-12 col-xs-12">
  
                      <div class="panel">ORDEN DE MUESTRA</div>
                
                      <div class="input-group">
                    
                        <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span> 

                        <input type="number" class="form-control input-lg orden" name="orden" min="0" value="0">

                      </div>

                  </div>

             </div>


<br><br><br>
            <!--=====================================
            ENTRADA PARA SUBIR LA FOTO DE PORTADA
            ======================================-->

            <div class="form-group">
             
              <br> <br> <br>
                <div class="panel">SUBIR FOTO DE BANER</div>

                    <input type="file" class="fotoPortadad" name="fotoPortadad">

                     <p class="help-block">Tamaño recomendado 1610px * 250px <br> Peso máximo de la foto 2MB</p>

                     <img src="vistas/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortadad" width="100%">     
            </div>


             <!--=====================================
            ENTRADA PARA EL TITULO 1
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg validarTitulo1 titulo1" name="titulo1" placeholder="Ingresar titulo1" required>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA DESCRIPCION
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" class="form-control input-lg"  name="descripcionTitulo1" rows="5" placeholder="Ingresar descripción de titulo1" required></textarea>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA SUBIR LA FOTO DE titulo 1
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO DE TITULO 1</div>

              <input type="file" class="fotoTitulo1" name="fotoTitulo1">

              <p class="help-block">Tamaño recomendado 900px * 800px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/servicios/titulo1/default/default.jpg" class="img-thumbnail previsualizarTitulo1">


            </div>

           

            <!--=====================================
            ENTRADA PARA EL TITULO 2
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg validarTitulo2 titulo2" name="titulo2" placeholder="Ingresar titulo2" required>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA DESCRIPCION 2
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" class="form-control input-lg"  name="descripcionTitulo2" rows="5" placeholder="Ingresar descripción de titulo2" required></textarea>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA SUBIR LA FOTO DE titulo 2
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO DE TITULO 2</div>

              <input type="file" class="fotoTitulo2" name="fotoTitulo2">

              <p class="help-block">Tamaño recomendado 900px * 800px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/servicios/titulo2/default/default.jpg" class="img-thumbnail previsualizarTitulo2">


            </div>


           <!--=====================================
            ENTRADA PARA EL TITULO 3
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg validarTitulo3 titulo3" name="titulo3" placeholder="Ingresar titulo3" required>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA DESCRIPCION 3
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" class="form-control input-lg"  name="descripcionTitulo3" rows="5" placeholder="Ingresar descripción de titulo3" required></textarea>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA SUBIR LA FOTO DE titulo 3
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO DE TITULO 3</div>

              <input type="file" class="fotoTitulo3" name="fotoTitulo3">

              <p class="help-block">Tamaño recomendado 900px * 800px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/servicios/titulo3/default/default.jpg" class="img-thumbnail previsualizarTitulo3">


            </div>


            <!--=====================================
            ENTRADA PARA EL TITULO 4
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg validarTitulo4 titulo4" name="titulo4" placeholder="Ingresar titulo4" required>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA DESCRIPCION 4
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" class="form-control input-lg"  name="descripcionTitulo4" rows="5" placeholder="Ingresar descripción de titulo4" required></textarea>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA SUBIR LA FOTO DE titulo 4
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO DE TITULO 4</div>

              <input type="file" class="fotoTitulo4" name="fotoTitulo4">

              <p class="help-block">Tamaño recomendado 900px * 800px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/servicios/titulo4/default/default.jpg" class="img-thumbnail previsualizarTitulo4">


            </div>
            
           

  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar subcategoría</button>

        </div>

         <?php

            $crearSubCategoriad = new ControladorSubCategoriasd();
            $crearSubCategoriad -> ctrCrearSubCategoria();

         ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR SUBCATEGORÍA
======================================-->

<div id="modalEditarSubCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar subcategoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODALs
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--=====================================
            ENTRADA PARA EDITAR EL TITULO DE LA SUBCATEGORÍA
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg validarSubCategoriad tituloSubCategoriad"  name="editarTituloSubCategoriad" required>
                 <!-- editarTituloSubCategoriad se usa para verificar que lleno los datos en modificacion, verifica que no este en blanco lo hace en el controlador-->
                 
                <input type="hidden" class="editarIdSubCategoriad" name="editarIdSubCategoriad">
                <!-- en editarIdSubCategoriad se GUARDA el id de la subcategoria -->
                <input type="hidden" class="editarIdCabecerad" name="editarIdCabecerad">

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA EDITAR LA RUTA DE LA SUBCATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                <input type="text" class="form-control input-lg rutaSubCategoriad" name="rutaSubCategoriad" readonly required>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA EDITAR LA SELECCIÓN DE LA CATEGORÍA
            ======================================-->
            <div class="form-group">            
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg seleccionarCategoriad" name="seleccionarCategoriad" required>
                  
                  <option class="optionEditarCategoria"></option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

           

            <!--=====================================
            ENTRADA PARA EDITAR LAS PALABRAS CLAVES
            ======================================-->          
            <div class="form-group editarPalabrasClavesd">
                      
            

            </div>



            <!--=====================================
            ENTRADA PARA EL ORDEN
            ======================================-->
            
            <div class="form-group">
              
                  <div class="col-md-12 col-xs-12">
  
                      <div class="panel">ORDEN DE MUESTRA</div>
                
                      <div class="input-group">
                    
                        <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span> 

                        <input type="number" class="form-control input-lg orden" name="orden" min="0" >

                      </div>

                  </div>

             </div>

            <!--=====================================
            ENTRADA PARA EDITAR LA FOTO DE BANER
            ======================================-->
<br><br>

            <div class="form-group">
              <div class="panel">SUBIR FOTO PORTADA</div>

              <input type="file" class="fotoPortadad" name="fotoPortadad">
              <input type="hidden" class="antiguaFotoPortadad" name="antiguaFotoPortadad">

              <p class="help-block">Tamaño recomendado 1610px * 250px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortadad" width="100%">

            </div>

             


            <!--=====================================
            Editar ENTRADA PARA EL TITULO 1
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg validarTitulo1 titulo1" name="titulo1" placeholder="Ingresar titulo1" required>

              </div>

            </div>

            <!--=====================================
            Editar ENTRADA PARA LA DESCRIPCION1
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" class="form-control input-lg descripcionTitulo1"  name="descripcionTitulo1" rows="5" placeholder="Ingresar descripción de titulo1" required></textarea>

              </div>

            </div>

            <!--=====================================
            Editar ENTRADA PARA SUBIR LA FOTO DE titulo 1
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO DE TITULO 1</div>

              <input type="file" class="fotoTitulo1" name="fotoTitulo1">
              <input type="hidden" class="antiguaFotoTitulo1" name="antiguaFotoTitulo1">

              <p class="help-block">Tamaño recomendado 900px * 800px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/servicios/titulo1/default/default.jpg" class="img-thumbnail previsualizarTitulo1">


            </div>



            <!--=====================================
            ENTRADA PARA EL TITULO 2
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg validarTitulo2 titulo2" name="titulo2" placeholder="Ingresar titulo2" required>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA DESCRIPCION 2
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" class="form-control input-lg descripcionTitulo2"  name="descripcionTitulo2" rows="5" placeholder="Ingresar descripción de titulo2" required></textarea>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA SUBIR LA FOTO DE titulo 2
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO DE TITULO 2</div>

              <input type="file" class="fotoTitulo2" name="fotoTitulo2">
              <input type="hidden" class="antiguaFotoTitulo2" name="antiguaFotoTitulo2">

              <p class="help-block">Tamaño recomendado 900px * 800px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/servicios/titulo2/default/default.jpg" class="img-thumbnail previsualizarTitulo2">


            </div>


           <!--=====================================
            ENTRADA PARA EL TITULO 3
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg validarTitulo3 titulo3" name="titulo3" placeholder="Ingresar titulo3" required>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA DESCRIPCION 3
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" class="form-control input-lg descripcionTitulo3"  name="descripcionTitulo3" rows="5" placeholder="Ingresar descripción de titulo3" required></textarea>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA SUBIR LA FOTO DE titulo 3
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO DE TITULO 3</div>

              <input type="file" class="fotoTitulo3" name="fotoTitulo3">
              <input type="hidden" class="antiguaFotoTitulo3" name="antiguaFotoTitulo3">

              <p class="help-block">Tamaño recomendado 900px * 800px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/servicios/titulo3/default/default.jpg" class="img-thumbnail previsualizarTitulo3">


            </div>


            <!--=====================================
            ENTRADA PARA EL TITULO 4
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg validarTitulo4 titulo4" name="titulo4" placeholder="Ingresar titulo4" required>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA DESCRIPCION 4
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" class="form-control input-lg descripcionTitulo4"  name="descripcionTitulo4" rows="5" placeholder="Ingresar descripción de titulo4" required></textarea>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA SUBIR LA FOTO DE titulo 4
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO DE TITULO 4</div>

              <input type="file" class="fotoTitulo4" name="fotoTitulo4">
              <input type="hidden" class="antiguaFotoTitulo4" name="antiguaFotoTitulo4">

              <p class="help-block">Tamaño recomendado 900px * 800px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/servicios/titulo4/default/default.jpg" class="img-thumbnail previsualizarTitulo4">


            </div>






       
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

         <?php

            $EditarSubCategoria = new ControladorSubCategoriasd();
            $EditarSubCategoria -> ctrEditarSubCategoria();


        ?>

      </form>

    </div>

  </div>

</div>

<?php

  $eliminarCategoria = new ControladorSubCategorias();
  $eliminarCategoria -> ctrEliminarSubCategoria();

?>

<script>
  
$(document).keydown(function(e){
  
  if(e.keyCode == 13){

    e.preventDefault();

  }

})

</script>
