/*=============================================
CARGAR LA TABLA DINÁMICA DE SUBCATEGORÍAS
=============================================*/

/* $.ajax({

 	url:"ajax/tablaSubCategoriasd.ajax.php",
 	success:function(respuesta){
		
 		console.log("respuesta", respuesta);

 	}


 })
*/

var tablaSubCategoriasd = $('.tablaSubCategoriasd').DataTable({

	"ajax":"ajax/tablaSubCategoriasd.ajax.php",
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
ACTIVAR SUBCATEGORÍA
=============================================*/

$('.tablaSubCategoriasd tbody').on("click", ".btnActivar", function(){

	var idSubCategoria = $(this).attr("idSubCategoria");
	var estadoSubCategoria = $(this).attr("estadoSubCategoria");

	var datos = new FormData();
 	datos.append("activarId", idSubCategoria);
  	datos.append("activarSubCategoria", estadoSubCategoria);

  	$.ajax({

	  url:"ajax/subCategoriasd.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){    
          // console.log("respuesta", respuesta);

      }

  	})

  	if(estadoSubCategoria == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoSubCategoria',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoSubCategoria',0);

  	}

})


/*=============================================
RUTA SUBCATEGORÍA
=============================================*/

function limpiarUrl(texto){
      var texto = texto.toLowerCase(); 
      texto = texto.replace(/[á]/, 'a');
      texto = texto.replace(/[é]/, 'e');
      texto = texto.replace(/[í]/, 'i');
      texto = texto.replace(/[ó]/, 'o');
      texto = texto.replace(/[ú]/, 'u');
      texto = texto.replace(/[ñ]/, 'n');
      texto = texto.replace(/ /g, "-")
      return texto;
   }

$(".tituloSubCategoriad").change(function(){

	$(".rutaSubCategoriad").val(

		limpiarUrl($(".tituloSubCategoriad").val())

	);

})



/*=============================================
SUBIENDO LA FOTO DE PORTADA BANER
=============================================*/

$(".fotoPortadad").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".fotoPortadad").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".fotoPortadad").val("");

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

  			$(".previsualizarPortadad").attr("src", rutaImagen);

  		})

  	}
})



/*=============================================
SUBIENDO LA FOTO DE TITULO 1
=============================================*/

$(".fotoTitulo1").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".fotoTitulo1").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".fotoTitulo1").val("");

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

  			$(".previsualizarTitulo1").attr("src", rutaImagen);

  		})

  	}
})


/*=============================================
REVISAR SI LA SUBCATEGORÍA YA EXISTE
=============================================*/

$(".validarSubCategoriad").change(function(){

	$(".alert").remove();

	var subCategoria = $(this).val();

	var datos = new FormData();
	datos.append("validarSubCategoria", subCategoria);

	 $.ajax({
	    url:"ajax/subCategoriasd.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	// console.log("respuesta", respuesta);
	    	
	    	if(respuesta.length != 0){

	    		$(".validarSubCategoriad").parent().after('<div class="alert alert-warning">Esta Subcategoría ya existe en la base de datos</div>');

	    		$(".validarSubCategoriad").val("");

	    	}

	    }

	})
})

/*=============================================
EDITAR SUBCATEGORÍA
=============================================*/

$(".tablaSubCategoriasd tbody").on("click", ".btnEditarSubCategoria", function(){

	var idSubCategoria = $(this).attr("idSubCategoria");
	
	var datos = new FormData();
	datos.append("idSubCategoria", idSubCategoria);

	$.ajax({

		url:"ajax/subCategoriasd.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#modalEditarSubCategoria .editarIdSubCategoriad").val(respuesta[0]["id"]);//aqui se usa el campo hiden(editarIdSubCategoriad) name="editarIdSubCategoriad" para guardar el id a modificar, se llena atravez de su clase editarIdSubCategoriad
		
			$("#modalEditarSubCategoria .tituloSubCategoriad").val(respuesta[0]["subcategoria"]);//llena la caja de texto de name="editarTituloSubCategoriad" para llenar usa la clase .tituloSubCategoriad
			$("#modalEditarSubCategoria .rutaSubCategoriad").val(respuesta[0]["ruta"]);

			/*=============================================
			EDITAR NOMBRE SUBCATEGORÍA Y RUTA
			=============================================*/

			$("#modalEditarSubCategoria .tituloSubCategoriad").change(function(){

				$("#modalEditarSubCategoria .rutaSubCategoriad").val(limpiarUrl($("#modalEditarSubCategoria .tituloSubCategoriad").val()));

			})

			/*=============================================
			TRAEMOS LA CATEGORIA
			=============================================*/

			if(respuesta[0]["id_categoria"] != 0){
			
				var datosCategoria = new FormData();
				datosCategoria.append("idCategoria", respuesta[0]["id_categoria"]);
				

				$.ajax({

						url:"ajax/categorias.ajax.php",
						method: "POST",
						data: datosCategoria,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(respuesta){

							$("#modalEditarSubCategoria .seleccionarCategoriad").val(respuesta["id"]);
							$("#modalEditarSubCategoria .optionEditarCategoriad").html(respuesta["categoria"]);
						}

					})

			}else{

				$("#modalEditarSubCategoria .optionEditarCategoria").html("SIN CATEGORÍA");

			}

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

						$("#modalEditarSubCategoria .editarIdCabecerad").val(respuesta["id"]);

						/*=============================================
						CARGAMOS LA DESCRIPCION
						=============================================*/

						//$("#modalEditarSubCategoria .descripcionSubCategoria").val(respuesta["descripcion"]);

						/*=============================================
						CARGAMOS LAS PALABRAS CLAVES
						=============================================*/	
						
						if(respuesta["palabrasClaves"] != null){

							$(".editarPalabrasClaves").html('<div class="input-group">'+
	              
	                		'<span class="input-group-addon"><i class="fa fa-key"></i></span>'+ 

							'<input type="text" class="form-control input-lg tagsInput pClavesSubCategoria" value="'+respuesta["palabrasClaves"]+'" data-role="tagsinput" name="pClavesSubCategoria">'+

							'</div>');

							$("#modalEditarSubCategoria .pClavesSubCategoria").tagsinput('items');

							$(".bootstrap-tagsinput").css({"padding":"11px",
							   						   "width":"100%",
 							   						   "border-radius":"1px"})

						}else{

							$(".editarPalabrasClaves").html('<div class="input-group">'+
	              
	                		'<span class="input-group-addon"><i class="fa fa-key"></i></span>'+ 

							'<input type="text" class="form-control input-lg tagsInput pClavesSubCategoria" value="" data-role="tagsinput" name="pClavesSubCategoria">'+

							'</div>');

							$("#modalEditarSubCategoria .pClavesSubCategoria").tagsinput('items');

							$(".bootstrap-tagsinput").css({"padding":"11px",
							   						   "width":"100%",
 							   						   "border-radius":"1px"})

						}

						/*=============================================
						CARGAMOS LA IMAGEN DE PORTADA
						=============================================*/

						//$("#modalEditarSubCategoria .previsualizarPortada").attr("src", respuesta["portada"]);
						//$("#modalEditarSubCategoria .antiguaFotoPortada").val(respuesta["portada"]);
					}

			});

			
			/*=============================================
			
			=============================================*/
            $("#modalEditarSubCategoria .previsualizarPortadad").attr("src", respuesta[0]["imagenbaner"]);
            $("#modalEditarSubCategoria .previsualizarTitulo1").attr("src", respuesta[0]["imagen1"]);
			$("#modalEditarSubCategoria .titulo1").val(respuesta[0]["titulo1"]);
			$("#modalEditarSubCategoria .descripcionTitulo1").val(respuesta[0]["descripcion1"]);


		}

	});

})

