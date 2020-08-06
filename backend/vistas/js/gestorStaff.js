
var tablaStaff = $('.tablaStaff').DataTable({

	"ajax":"ajax/tablaStaff.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
    "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

});


/*=============================================
ACTIVAR O DESACTIVAR DOCTOR
=============================================*/

$(".tablaStaff tbody").on("click", ".btnActivar", function(){

	var idStaff = $(this).attr("idStaff");
	var estadoStaff = $(this).attr("estadoStaff");

	var datos = new FormData();
 	datos.append("activarId", idStaff);
  	datos.append("activarStaff", estadoStaff);

  	$.ajax({

  		url:"ajax/staff.ajax.php",
  		method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	    
      	    // console.log("respuesta", respuesta);

      	} 	 

  	});

  	if(estadoStaff == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoStaff',1);
  	
  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoStaff',0);

  	}

})

/*=============================================
RUTA SUBCATEGORÍA
=============================================*/

function limpiarUrlm(texto){
      var texto = texto.toLowerCase(); 
      texto = texto.replace(/[á]/, 'a');
      texto = texto.replace(/[é]/, 'e');
      texto = texto.replace(/[í]/, 'i');
      texto = texto.replace(/[ó]/, 'o');
      texto = texto.replace(/[ú]/, 'u');
      texto = texto.replace(/[ñ]/, 'n');
      //texto = texto.replace(/[a]/, 'x'); estabamos probando
      //texto = texto.replace(/[.]/, 'a');//quiero eliminar el punto u no funciona
      texto = texto.replace(/[.]/g, ''); //g significa global reemplaza en todo el texto
      //texto = texto.replace(/[.]/gi, 'y');//g es global i no es sensible a mayusculas
    //  texto = texto.replace(/\\./g, 'a');
      texto = texto.replace(/ /g, "-");
    //  texto = texto.replace(".", "m");//reemplaza solo al primero
    //  texto = texto.split('.').join(' ');

      return texto;
   }

$(".nombres").change(function(){

	$(".ruta").val(

		limpiarUrlm($(".nombres").val())

	);

})


/*=============================================
SUBIENDO LA FOTO DEL DOCTOR
=============================================*/

$(".foto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".foto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".foto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarFoto").attr("src", rutaImagen);

  		})

  	}
})


/*=============================================
SUBIENDO LA FOTO PEQUEÑA DEL DOCTOR
=============================================*/

$(".fotop").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".fotop").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".fotop").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagenp = new FileReader;
  		datosImagenp.readAsDataURL(imagen);

  		$(datosImagenp).on("load", function(event){

  			var rutaImagenp = event.target.result;

  			$(".previsualizarFotope").attr("src", rutaImagenp);

  		})

  	}
})


/*=============================================
EDITAR STAFF
=============================================*/

$(".tablaStaff tbody").on("click", ".btnEditarStaff", function(){

	var idStaff = $(this).attr("idStaff");
	
	var datos = new FormData();
	datos.append("idStaff", idStaff);

	$.ajax({

		url:"ajax/staff.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#modalEditarStaff .editarIdStaff").val(respuesta[0]["id"]);//aqui se usa el campo hiden(editarIdStaff) name="editarIdStaff" para guardar el id a modificar, se llena atravez de su clase editarIdStaff
		
			$("#modalEditarStaff .editarnombres").val(respuesta[0]["nombres"]);//llena la caja de texto de name="nombres" para llenar usa la clase .nombres
			$("#modalEditarStaff .ruta").val(respuesta[0]["ruta"]);

			/*=============================================
			EDITAR NOMBRE SUBCATEGORÍA Y RUTA
			=============================================*/

			$("#modalEditarStaff .editarnombres").change(function(){

				$("#modalEditarStaff .ruta").val(limpiarUrl($("#modalEditarStaff .editarnombres").val()));

			})



			/*=============================================
			TRAEMOS DATOS DE CABECERA
			=============================================*/

			var datosCabecera = new FormData();
			datosCabecera.append("ruta", respuesta[0]["ruta"]);

			$.ajax({

					url:"ajax/cabeceras.ajax.php",
					method: "POST",
					data: datosCabecera,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json",
					success: function(respuesta){
						// console.log("respuesta", respuesta);

						/*=============================================
						CARGAMOS EL ID DE LA CABECERA
						=============================================*/

						$("#modalEditarStaff .editarIdCabecerad").val(respuesta["id"]);//se guarda el codigo de la cabecera el id, se guarda en editarIdcabecerad

						/*=============================================
						CARGAMOS LA DESCRIPCION
						=============================================*/

						//$("#modalEditarStaff .descripcionSubCategoria").val(respuesta["descripcion"]);

						/*=============================================
						CARGAMOS LAS PALABRAS CLAVES
						=============================================*/	
						
						if(respuesta["palabrasClaves"] != null){

							$(".editarPalabrasClaves").html('<div class="input-group">'+
	              
	                		'<span class="input-group-addon"><i class="fa fa-key"></i></span>'+ 

							'<input type="text" class="form-control input-lg tagsInput pClavesStaff" value="'+respuesta["palabrasClaves"]+'" data-role="tagsinput" name="pClavesStaff">'+

							'</div>');

							$("#modalEditarStaff .pClavesStaff").tagsinput('items');

							$(".bootstrap-tagsinput").css({"padding":"11px",
							   						   "width":"100%",
 							   						   "border-radius":"1px"})

						}else{

							$(".editarPalabrasClaves").html('<div class="input-group">'+
	              
	                		'<span class="input-group-addon"><i class="fa fa-key"></i></span>'+ 

							'<input type="text" class="form-control input-lg tagsInput pClavesStaff" value="" data-role="tagsinput" name="pClavesStaff">'+

							'</div>');

							$("#modalEditarStaff .pClavesStaff").tagsinput('items');

							$(".bootstrap-tagsinput").css({"padding":"11px",
							   						   "width":"100%",
 							   						   "border-radius":"1px"})

						}

						/*=============================================
						CARGAMOS LA IMAGEN DE PORTADA
						=============================================*/

						//$("#modalEditarStaff .previsualizarPortada").attr("src", respuesta["portada"]);
						//$("#modalEditarStaff .antiguaFotoPortada").val(respuesta["portada"]);
					}

			});

			
			/*=============================================
			
			=============================================*/
            $("#modalEditarStaff .titulo").val(respuesta[0]["titulo"]);
			$("#modalEditarStaff .descripcion").val(respuesta[0]["descripcion"]);
			$("#modalEditarStaff .cmp").val(respuesta[0]["cmp"]);
			$("#modalEditarStaff .rne").val(respuesta[0]["rne"]);
			$("#modalEditarStaff .celular").val(respuesta[0]["celular"]);
			$("#modalEditarStaff .especialidades").val(respuesta[0]["especialidades"]);
			$("#modalEditarStaff .correo").val(respuesta[0]["correo"]);
			
			$("#modalEditarStaff .previsualizarFoto").attr("src", respuesta[0]["foto"]);//muestra la foto actual de lo contrario muestra el default
			$("#modalEditarStaff .antiguaFoto").val(respuesta[0]["foto"]);//esto es un hiden y se guarda la foto antigua para reemplazar por la nueva

			$("#modalEditarStaff .previsualizarFotope").attr("src", respuesta[0]["fotop"]);//muestra la foto actual de lo contrario muestra el default
			$("#modalEditarStaff .antiguaFotope").val(respuesta[0]["fotop"]);//esto es un hiden y se guarda la foto antigua para reemplazar por la nueva
								  
			$("#modalEditarStaff .facebook").val(respuesta[0]["facebook"]);
			$("#modalEditarStaff .google").val(respuesta[0]["google"]);
			$("#modalEditarStaff .instagram").val(respuesta[0]["instagram"]);
			$("#modalEditarStaff .twitter").val(respuesta[0]["twitter"]);
			$("#modalEditarStaff .orden").val(respuesta[0]["orden"]);


		}

	});

})