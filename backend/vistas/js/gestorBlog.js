$(".tablaBlog").DataTable({
	 "ajax": "ajax/tablaBlog.ajax.php",
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
SUBIENDO LA FOTO DEL BLOG
=============================================*/

$(".fotoBlog").change(function(){

	var imagen = this.files[0];

	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		$(".fotoBlog").val("");

		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else if(imagen["size"] > 2000000){

  		$(".fotoBlog").val("");

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
		
  			var rutaImagen = event.target.result;

  			$(".previsualizarFotoBlog").attr("src", rutaImagen);
  			    

		})
  	}

})

/*=============================================
SELECCIONAR SUBCATEGORÍA
=============================================*/

$(".seleccionarCategoriablog").change(function(){

	var categoria = $(this).val();

	$(".seleccionarSubCategoriablog").html("");

	//$(".seleccionarSubCategoria").html("");

	var datos = new FormData();
	datos.append("idCategoriablog", categoria);

	 $.ajax({
	    url:"ajax/subCategoriasblog.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	  	  success:function(respuesta){
	    	
	    	// console.log("respuesta", respuesta);

	    	//$(".entradaSubcategoria").show();

	    		respuesta.forEach(funcionForEach);

		        function funcionForEach(item, index){

		        	$(".seleccionarSubCategoriablog").append(
		        		
	    				'<option value="'+item["id"]+'">'+item["subcategoriablog"]+'</option>'

	    			)

		        }

	  	  }

	 })

})

/*=============================================
RUTA POSTt
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

$(".tituloPost").change(function(){

	$(".rutaPost").val(

		limpiarUrlm($(".tituloPost").val())

	);

})


/*=============================================
REVISARr SI EL TITULO DEL POST YA EXISTE
=============================================*/

$(".validarPost").change(function(){

	$(".alert").remove();

	var titulo = $(this).val();

	var datos = new FormData();
	datos.append("validarTitulo", titulo);

	 $.ajax({
	    url:"ajax/blog.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){

    		if(respuesta.length != 0){

    			$(".validarPost").parent().after('<div class="alert alert-warning">Este título del Post ya existe en el Blog</div>');

	    		$(".validarPost").val("");

    		}

	    }

   	})

})








$(".guardarBlog").click(function(){

	if($(".tituloPost").val() != ""){

		var titulo = $(".tituloPost").val();
		//var descripcionlarga = $(".editor1").val();
		var descripcionlarga = $_POST["editor1"];


		var datosBlog = new FormData();
		datosBlog.append("titulo", titulo);
		datosBlog.append("descripcionlarga", descripcionlarga);

		$.ajax({
				url:"ajax/blog.ajax.php",
				method: "POST",
				data: datosBlog,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					
					// console.log("respuesta", respuesta);

					if(respuesta == "ok"){

						swal({
						  type: "success",
						  title: "El Post ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "blog";

							}
						})
					}

				}

		})/*fin del acjax*/

	}else{

	    swal({
	      title: "Llenar todos los campos obligatorios",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

	}




})

/*=============================================
EDITAR SUBCATEGORÍAa
=============================================*/

$(".tablaSubCategorias tbody").on("click", ".btnEditarBlog", function(){

	var idSubCategoria = $(this).attr("idSubCategoria");
	
	var datos = new FormData();
	datos.append("idSubCategoria", idSubCategoria);

	$.ajax({

		url:"ajax/subCategorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
					
			$("#modalEditarSubCategoria .editarIdSubCategoria").val(respuesta[0]["id"]);
			$("#modalEditarSubCategoria .tituloSubCategoria").val(respuesta[0]["subcategoria"]);
			$("#modalEditarSubCategoria .rutaSubCategoria").val(respuesta[0]["ruta"]);

			/*=============================================
			EDITAR NOMBRE SUBCATEGORÍA Y RUTA
			=============================================*/

			$("#modalEditarSubCategoria .tituloSubCategoria").change(function(){

				$("#modalEditarSubCategoria .rutaSubCategoria").val(limpiarUrl($("#modalEditarSubCategoria .tituloSubCategoria").val()));

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

							$("#modalEditarSubCategoria .seleccionarCategoria").val(respuesta["id"]);
							$("#modalEditarSubCategoria .optionEditarCategoria").html(respuesta["categoria"]);
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

						$("#modalEditarSubCategoria .editarIdCabecera").val(respuesta["id"]);

						/*=============================================
						CARGAMOS LA DESCRIPCION
						=============================================*/

						$("#modalEditarSubCategoria .descripcionSubCategoria").val(respuesta["descripcion"]);

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

						$("#modalEditarSubCategoria .previsualizarPortada").attr("src", respuesta["portada"]);
						$("#modalEditarSubCategoria .antiguaFotoPortada").val(respuesta["portada"]);
					}

			});

			/*=============================================
			PREGUNTAMOS SI EXITE OFERTA
			=============================================*/

			if(respuesta[0]["oferta"] != 0){

				$("#modalEditarSubCategoria .selActivarOferta").val("oferta");

				$("#modalEditarSubCategoria .datosOferta").show();
				$("#modalEditarSubCategoria .valorOferta").prop("required",true);

				$("#modalEditarSubCategoria #precioOferta").val(respuesta[0]["precioOferta"]);
				$("#modalEditarSubCategoria #descuentoOferta").val(respuesta[0]["descuentoOferta"]);

				if(respuesta[0]["precioOferta"] != 0){

					$("#modalEditarSubCategoria #precioOferta").prop("readonly",true);
					$("#modalEditarSubCategoria #descuentoOferta").prop("readonly",false);

				}

				if(respuesta[0]["descuentoOferta"] != 0){

					$("#modalEditarSubCategoria #descuentoOferta").prop("readonly",true);
					$("#modalEditarSubCategoria #precioOferta").prop("readonly",false);

				}
	
				$("#modalEditarSubCategoria .previsualizarOferta").attr("src", respuesta[0]["imgOferta"]);

				$("#modalEditarSubCategoria .antiguaFotoOferta").val(respuesta[0]["imgOferta"]);
				
				$("#modalEditarSubCategoria .finOferta").val(respuesta[0]["finOferta"]);						

			}else{

				$("#modalEditarSubCategoria .selActivarOferta").val("");
				$("#modalEditarSubCategoria .datosOferta").hide();
				$("#modalEditarSubCategoria .valorOferta").prop("required",false);
				$("#modalEditarSubCategoria .previsualizarOferta").attr("src", "vistas/img/ofertas/default/default.jpg");
				$("#modalEditarSubCategoria .antiguaFotoOferta").val(respuesta[0]["imgOferta"]);

			}

			/*=============================================
			CREAR NUEVA OFERTA AL EDITAR
			=============================================*/

			$("#modalEditarSubCategoria .selActivarOferta").change(function(){

				activarOferta($(this).val())

			})

			$("#modalEditarSubCategoria .valorOferta").change(function(){

				if($(this).attr("id") == "precioOferta"){

					$("#modalEditarSubCategoria #precioOferta").prop("readonly",true);
					$("#modalEditarSubCategoria #descuentoOferta").prop("readonly",false);
					$("#modalEditarSubCategoria #descuentoOferta").val(0);

				}

				if($(this).attr("id") == "descuentoOferta"){

					$("#modalEditarSubCategoria #descuentoOferta").prop("readonly",true);
					$("#modalEditarSubCategoria #precioOferta").prop("readonly",false);
					$("#modalEditarSubCategoria #precioOferta").val(0);

				}		

			})

		}

	});

})