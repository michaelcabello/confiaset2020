/*=============================================
CARGAR LA TABLA DINÁMICA DE CATEGORÍAS
=============================================*/

// $.ajax({

// 	url:"ajax/tablaCategorias.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })

$(".tablaCategoriasblog").DataTable({
	 "ajax": "ajax/tablaCategoriasblog.ajax.php",
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
ACTIVAR CATEGORÍA
=============================================*/

$(".tablaCategoriasblog tbody").on("click", ".btnActivar", function(){

	var idCategoriablog = $(this).attr("idCategoriablog");
	var estadoCategoriablog = $(this).attr("estadoCategoriablog");

	var datos = new FormData();
 	datos.append("activarIdblog", idCategoriablog);
  	datos.append("activarCategoriablog", estadoCategoriablog);

  	$.ajax({

  		url:"ajax/categoriasblog.ajax.php",
  		method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	    
      	    // console.log("respuesta", respuesta);

      	} 	 

  	});

  	if(estadoCategoriablog == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoCategoriablog',1);
  	
  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoCategoriablog',0);

  	}

})

/*=============================================
REVISAR SI LA CATEGORÍA YA EXISTE
=============================================*/

$(".validarCategoriablog").change(function(){

	$(".alert").remove();

	var categoriablog = $(this).val();
	// console.log("categoria", categoria);

	var datos = new FormData();
	datos.append("validarCategoriablog", categoriablog);

	$.ajax({
	    url:"ajax/categoriasblog.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	// console.log("respuesta", respuesta);

	    	if(respuesta){

	    		$(".validarCategoriablog").parent().after('<div class="alert alert-warning">Esta categoría ya existe en la base de datos</div>')
	    		$(".validarCategoriablog").val("");
	    	}   

	    }

	  })
});


/*=============================================
RUTA CATEGORÍA
=============================================*/

function limpiarUrl(texto){

	var texto = texto.toLowerCase();
	texto = texto.replace(/[á]/, 'a');
	texto = texto.replace(/[é]/, 'e');
	texto = texto.replace(/[í]/, 'i');
	texto = texto.replace(/[ó]/, 'o');
	texto = texto.replace(/[ú]/, 'u');
	texto = texto.replace(/[ñ]/, 'n');
	texto = texto.replace(/ /g, '-');
	return texto;

}


$(".tituloCategoriablog").change(function(){

	$(".rutaCategoriablog").val(

		limpiarUrl($(".tituloCategoriablog").val())

	);

})




/*=============================================
SUBIENDO LA FOTO DE PORTADA
=============================================*/

$(".fotoPortadablog").change(function(){

	var imagen = this.files[0];

	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		$(".fotoPortadablog").val("");

		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else if(imagen["size"] > 2000000){

  		$(".fotoPortadablog").val("");

		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen no debe pesar más de 2MB!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){
		
  			var rutaImagenblog = event.target.result;

  			$(".previsualizarPortadablog").attr("src", rutaImagenblog);

		})
  	}

})






/*=============================================
EDITAR CATEGORÍA
=============================================*/

$(".tablaCategoriasblog tbody").on("click", ".btnEditarCategoria", function(){

	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({

		url:"ajax/categorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#modalEditarCategoria .editarIdCategoria").val(respuesta["id"]);
			
			$("#modalEditarCategoria .tituloCategoria").val(respuesta["categoria"]);
			$("#modalEditarCategoria .rutaCategoria").val(respuesta["ruta"]);

			/*=============================================
			EDITAR NOMBRE CATEGORÍA Y RUTA
			=============================================*/

			$("#modalEditarCategoria .tituloCategoria").change(function(){

				$("#modalEditarCategoria .rutaCategoria").val(limpiarUrl($("#modalEditarCategoria .tituloCategoria").val()));

			})

			/*=============================================
			TRAEMOS DATOS DE CABECERA
			=============================================*/
					
			var datosCabecera = new FormData();
			datosCabecera.append("ruta", respuesta["ruta"]);

			$.ajax({

				url:"ajax/cabeceras.ajax.php",
				method: "POST",
				data: datosCabecera,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta){

					$("#modalEditarCategoria .editarIdCabecera").val(respuesta["id"]);
					
					/*=============================================
					CARGAMOS LA DESCRIPCION
					=============================================*/

					$("#modalEditarCategoria .descripcionCategoria").val(respuesta["descripcion"]);

					/*=============================================
					CARGAMOS LAS PALABRAS CLAVES
					=============================================*/

					if(respuesta["palabrasClaves"] != null){

						$(".editarPalabrasClaves").html(

							'<div class="input-group">'+
                
			                '<span class="input-group-addon"><i class="fa fa-key"></i></span>'+

			                '<input type="text" class="form-control input-lg pClavesCategoria tagsInput" data-role="tagsinput" value="'+respuesta["palabrasClaves"]+'" name="pClavesCategoria" required>'+

			              '</div>'

						);

						$("#modalEditarCategoria .pClavesCategoria").tagsinput('items');

						$(".bootstrap-tagsinput").css({"padding":"11px",
							   						   "width":"100%",
 							   						   "border-radius":"1px"})

					}else{

						$(".editarPalabrasClaves").html(

							'<div class="input-group">'+
                
			                '<span class="input-group-addon"><i class="fa fa-key"></i></span>'+

			                '<input type="text" class="form-control input-lg pClavesCategoria tagsInput" data-role="tagsinput" value="" placeholder="Ingresar palabras claves"  name="pClavesCategoria" required>'+

			              '</div>'

						);

						$("#modalEditarCategoria .pClavesCategoria").tagsinput('items');

						$(".bootstrap-tagsinput").css({"padding":"11px",
							   						   "width":"100%",
 							   						   "border-radius":"1px"})


					}

					/*=============================================
					CARGAMOS LA IMAGEN DE PORTADA
					=============================================*/

					$("#modalEditarCategoria .previsualizarPortada").attr("src", respuesta["portada"]);
					$("#modalEditarCategoria .antiguaFotoPortada").val(respuesta["portada"]);

				}

			})

			/*=============================================
			PREGUNTAMOS SI EXITE OFERTA
			=============================================*/

			if(respuesta["oferta"] != 0){

				$("#modalEditarCategoria .selActivarOferta").val("oferta");

				$("#modalEditarCategoria .datosOferta").show();

				$("#modalEditarCategoria .valorOferta").prop("required",true);

				$("#modalEditarCategoria #precioOferta").val(respuesta["precioOferta"]);
				$("#modalEditarCategoria #descuentoOferta").val(respuesta["descuentoOferta"]);

				if(respuesta["precioOferta"] != 0){

					$("#modalEditarCategoria #precioOferta").prop("readonly",true);
					$("#modalEditarCategoria #descuentoOferta").prop("readonly",false);

				}

				if(respuesta["descuentoOferta"] != 0){

					$("#modalEditarCategoria #precioOferta").prop("readonly",false);
					$("#modalEditarCategoria #descuentoOferta").prop("readonly",true);

				}

				$("#modalEditarCategoria .previsualizarOferta").attr("src", respuesta["imgOferta"]);

				$("#modalEditarCategoria .antiguaFotoOferta").val(respuesta["imgOferta"]);

				$("#modalEditarCategoria .finOferta").val(respuesta["finOferta"]);		

			}else{

				$("#modalEditarCategoria .selActivarOferta").val("");
				$("#modalEditarCategoria .datosOferta").hide();
				$("#modalEditarCategoria .valorOferta").prop("required",false);
				$("#modalEditarCategoria .previsualizarOferta").attr("src", "vistas/img/ofertas/default/default.jpg");
				$("#modalEditarCategoria .antiguaFotoOferta").val(respuesta["imgOferta"]);

			}

			/*=============================================
			CREAR NUEVA OFERTA AL EDITAR
			=============================================*/

			$("#modalEditarCategoria .selActivarOferta").change(function(){

				activarOferta($(this).val());

			})

			$("#modalEditarCategoria .valorOferta").change(function(){

				if($(this).attr("id") == "precioOferta"){

					$("#modalEditarCategoria #precioOferta").prop("readonly",true);
					$("#modalEditarCategoria #descuentoOferta").prop("readonly",false);
					$("#modalEditarCategoria #descuentoOferta").val(0);

				}

				if($(this).attr("id") == "descuentoOferta"){

					$("#modalEditarCategoria #descuentoOferta").prop("readonly",true);
					$("#modalEditarCategoria #precioOferta").prop("readonly",false);
					$("#modalEditarCategoria #precioOferta").val(0);

				}

			})

		}

	})

})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablaCategoriasblog tbody").on("click", ".btnEliminarCategoria", function(){

	var idCategoria = $(this).attr("idCategoria");
  	var imgOferta = $(this).attr("imgOferta");
  	var rutaCabecera = $(this).attr("rutaCabecera");
  	var imgPortada = $(this).attr("imgPortada");

  	swal({
    	title: '¿Está seguro de borrar la categoría?',
    	text: "¡Si no lo está puede cancelar la accíón!",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	cancelButtonText: 'Cancelar',
      	confirmButtonText: 'Si, borrar categoría!'
	 }).then(function(result){

    	if(result.value){

      	window.location = "index.php?ruta=categorias&idCategoria="+idCategoria+"&imgOferta="+imgOferta+"&rutaCabecera="+rutaCabecera+"&imgPortada="+imgPortada;

    	}

  	})

})

