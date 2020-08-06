
<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Gestor de Staff Médico
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Staff Médico</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarStaff">
          
          Agregar un Doctor

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaStaff" width="100%">
      <!-- a  tablaStaff se le plica la propiedad datatable-->
        <thead>
         
           <tr>
             
               <th style="width:10px">#</th>
               <th>Nombres y Apellidos</th>
               <th>Título</th>
               <th>Estado</th>
               <th>CMP</th>
               <th>RNE</th>
               <th>Celular</th>
               <th>Foto</th>
               <th>orden</th>
               <th>Especialidades</th>
               <th>Acciones</th>

           </tr> 

        </thead>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR STAFF
======================================-->

<div id="modalAgregarStaff" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">


      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar un Doctor al Staff</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--=====================================
            ENTRADA PARA EL NOMBRE DEL DOCTOR
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg validarNombre nombres" name="nombres" placeholder="Ingresar  Nombres y Apellidos" >

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DEL DOCTOR
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                <input type="text" class="form-control input-lg ruta" name="ruta" placeholder="Ruta url del Doctor" readonly required>

              </div>

            </div>


		   <!--=====================================
            ENTRADA PARA EL TITULO 
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg titulo" name="titulo" placeholder="Ingresar titulo" >

              </div>

            </div>

              <!--=====================================
            ENTRADA PARA LA DESCRIPCION
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" class="form-control input-lg"  name="descripcion" rows="3" placeholder="Ingresar descripción o curriculum"></textarea>

              </div>

            </div>

          


             <!--=====================================
            AGREGAR CMP, RNE, CELULAR
            ======================================-->

            <div class="form-group row">
               
              <!-- CMP -->

              <div class="col-md-4 col-xs-12">
  
          
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <input type="text" class="form-control input-lg cmp" name="cmp" placeholder="CMP">

                </div>

              </div>

              <!-- RNE -->

              <div class="col-md-4 col-xs-12">
  
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <input type="text" class="form-control input-lg rne" name="rne" placeholder="RNE" >

                </div>

              </div>

              <!-- CELULAR -->

               <div class="col-md-4 col-xs-12">
  
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <input type="text" class="form-control input-lg celular" name="celular" placeholder="Celular" >

                </div>

              </div>




            </div>
          

            <!--=====================================
            ENTRADA PARA ESPECIALIDADES
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg especialidades" name="especialidades" placeholder="Ingresar Especialidades" >

              </div>

            </div>

           
			
             <!--=====================================
            ENTRADA PARA CORREO
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg correo" name="correo" placeholder="Ingresar Correo">

              </div>

            </div>


		  


            <!--=====================================
            ENTRADA PARA SUBIR LA FOTO DEL DOCTOR
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO GRANDE </div>

              <input type="file" class="foto" name="foto">

              <p class="help-block">Tamaño recomendado 553px * 406px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/servicios/staff/default/default.jpg" class="img-thumbnail previsualizarFoto" width="100%">

            </div>


            <!--=====================================
            ENTRADA PARA SUBIR LA FOTO DE PEQUEÑA
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO PEQUEÑA</div>

              <input type="file" class="fotop" name="fotop">

              <p class="help-block">Tamaño recomendado 134 px * 141 px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/servicios/staff/fotop/default/default.jpg" class="img-thumbnail previsualizarFotope" width="134px">

            </div>

             <!--=====================================
            ENTRADA PARA FACEBOOK
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg facebook" name="facebook" placeholder="Ingresar Facebook Personal" >

              </div>

            </div>


             <!--=====================================
            ENTRADA PARA GOOGLE
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg google" name="google" placeholder="Ingresar G+ Personal" >

              </div>

            </div>


             <!--=====================================
            ENTRADA PARA INSTAGRAM
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg instagram" name="instagram" placeholder="Ingresar Instagram Personal" >

              </div>

            </div>

             <!--=====================================
            ENTRADA PARA TWITTER
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg twitter" name="twitter" placeholder="Ingresar Twitter Personal" >

              </div>

            </div>


             <!--=====================================
            ENTRADA PARA orden
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
    
                  <input type="number" class="form-control input-lg orden" name="orden" min="0" step="any" placeholder="Ingresar el orden de Ubicacion del Doctor" >

              </div>

            </div>
            <!--=====================================
            ENTRADA PARA LAS PALABRAS CLAVES
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg tagsInput" data-role="tagsinput"  name="pClavesStaff" placeholder="Ingresar palabras claves" >

              </div>

            </div>
          
          	
             <!--=====================================
           
            ======================================-->
           

  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Doctor</button>

        </div>

         <?php

            $crearStaff = new ControladorStaff();
            $crearStaff -> ctrCrearStaff();

         ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR STAFF
======================================-->

<div id="modalEditarStaff" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Staff</h4>

          </div>

        <!--=====================================
        CUERPO DEL MODALs
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          <!--=====================================
            ENTRADA PARA EL NOMBRE DEL DOCTOR
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg validarNombre editarnombres" name="editarnombres" required >
                <input type="hidden" class="editarIdStaff" name="editarIdStaff">
                <!-- en editarIdStaff se GUARDA el id de la editarIdStaff -->
                <input type="hidden" class="editarIdCabecerad" name="editarIdCabecerad">

              </div>

             </div>




          <!--=====================================
            ENTRADA PARA LA RUTA DEL DOCTOR
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                <input type="text" class="form-control input-lg ruta" name="ruta" readonly required>

              </div>

             </div>


           <!--=====================================
            ENTRADA PARA EL TITULO 
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg titulo" name="titulo">

              </div>

            </div>

              <!--=====================================
            ENTRADA PARA LA DESCRIPCION
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" class="form-control input-lg descripcion"  name="descripcion" rows="3" placeholder="Ingresar descripción o curriculum"></textarea>

              </div>

            </div>

          


             <!--=====================================
            AGREGAR CMP, RNE, CELULAR
            ======================================-->

            <div class="form-group row">
               
              <!-- CMP -->

              <div class="col-md-4 col-xs-12">
  
          
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <input type="text" class="form-control input-lg cmp" name="cmp">

                </div>

              </div>

              <!-- RNE -->

              <div class="col-md-4 col-xs-12">
  
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <input type="text" class="form-control input-lg rne" name="rne">

                </div>

              </div>

              <!-- CELULAR -->

               <div class="col-md-4 col-xs-12">
  
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <input type="text" class="form-control input-lg celular" name="celular">

                </div>

              </div>




            </div>
          

            <!--=====================================
            ENTRADA PARA ESPECIALIDADES
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg especialidades" name="especialidades">

              </div>

            </div>

           
      
             <!--=====================================
            ENTRADA PARA CORREO
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg correo" name="correo">

              </div>

            </div>

     
             <!--=====================================
            ENTRADA PARA EDITAR LA FOTO DE PORTADA
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO GRANDE</div>

              <input type="file" class="foto" name="foto">
              <input type="hidden" class="antiguaFoto" name="antiguaFoto">

              <p class="help-block">Tamaño recomendado 553px * 406px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/servicios/staff/default/default.jpg" class="img-thumbnail previsualizarFoto" width="100%">

            </div>


             <!--=====================================
            ENTRADA PARA EDITAR LA FOTO PEQUEÑA
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO PEQUEÑA </div>

              <input type="file" class="fotop" name="fotop">
              <input type="hidden" class="antiguaFotope" name="antiguaFotope">

              <p class="help-block">Tamaño recomendado 134 px * 141 px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/servicios/staff/fotop/default/default.jpg" class="img-thumbnail previsualizarFotope" width="134px">

            </div>
            
             <!--=====================================
            ENTRADA PARA FACEBOOK
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg facebook" name="facebook">

              </div>

            </div>


             <!--=====================================
            ENTRADA PARA GOOGLE
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg google" name="google">

              </div>

            </div>


             <!--=====================================
            ENTRADA PARA INSTAGRAM
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg instagram" name="instagram">

              </div>

            </div>

             <!--=====================================
            ENTRADA PARA TWITTER
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg twitter" name="twitter">

              </div>

            </div>


             <!--=====================================
            ENTRADA PARA orden
            ======================================-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
    
                  <input type="number" class="form-control input-lg orden" name="orden" min="0" step="any">

              </div>

            </div>
           

            <!--=====================================
            ENTRADA PARA EDITAR LAS PALABRAS CLAVES
            ======================================-->          
            <div class="form-group editarPalabrasClaves">
            

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

           $EditarStaffx = new ControladorStaff();
           $EditarStaffx -> ctrEditarStaff();


        ?>

      </form>

    </div>

  </div>

</div>

 <?php

        
   // $eliminarCategoria = new ControladorCategorias();
  //  $eliminarCategoria -> ctrEliminarCategoria();

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
