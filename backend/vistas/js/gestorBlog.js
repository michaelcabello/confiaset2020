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
MOSTRAR Y OCULATAR BLOG
=============================================*/

function mostrar(){
	//location.href = "blogeditar";
	$(".listablog").hide();
	$(".editarblog").show();

}


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
EDITAR BLOG
=============================================*/

$(".tablaBlog tbody").on("click", ".btnEditarBlog", function(){//inicia funcion btnEditarBlog

	var idBlog = $(this).attr("idBlog");

	//alert(idBlog);

	var datos = new FormData();
	datos.append("idBlog", idBlog);

	$.ajax({//inicio de ajax para encontrar el producto
		url:"ajax/blog.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			//console.log("idBlog", idBlog)
			//console.log("respuesta", respuesta);
			$(".idBlog").val(respuesta[0]["id"]);	//asigno valor al hiden que guarda el id del blog	
			//alert("aqui vamos");
			$(" .tituloPost").val(respuesta[0]["titulo"]);
			$(" .rutaPost").val(respuesta[0]["ruta"]);

			/*=============================================
			TRAEMOS LA CATEGORIAa
			=============================================*/

			if(respuesta[0]["id_categoriablog"] != 0){
			
				var datosCategoriablog = new FormData();
				datosCategoriablog.append("idCategoriablog", respuesta[0]["id_categoriablog"]);
				

				$.ajax({

						url:"ajax/categoriasblog.ajax.php",
						method: "POST",
						data: datosCategoriablog,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(respuesta){

							$(".seleccionarCategoriablog").val(respuesta["id"]);
							$(".optionEditarCategoriablog").html(respuesta["categoria"]);

							
						}

					})

			}else{

				
				$(".optionEditarCategoriablog").html("SIN CATEGORÍA");

			}

			/*=============================================
			TRAEMOS LA SUBCATEGORIA
			=============================================*/

			if(respuesta[0]["id_subcategoriablog"] != 0){
					
				var datosSubCategoriablog = new FormData();
				datosSubCategoriablog.append("idSubCategoriablog", respuesta[0]["id_subcategoriablog"]);

				$.ajax({

						url:"ajax/subcategoriasblog.ajax.php",
						method: "POST",
						data: datosSubCategoriablog,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(respuesta){

							$(".seleccionarSubCategoriablog").val(respuesta[0]["id"]);
							$(".optionEditarSubCategoriablog").html(respuesta[0]["subcategoriablog"]);


							//para listar las demas subcategoris de la categoria seleccionada	
							var datosCategoriablog = new FormData();
							datosCategoriablog.append("idCategoriablog", respuesta[0]["id_categoriablog"]);	

							$.ajax({

								url:"ajax/subcategoriasblog.ajax.php",
								method: "POST",
								data: datosCategoriablog,
								cache: false,
								contentType: false,
								processData: false,
								dataType: "json",
								success: function(respuesta){

									respuesta.forEach(funcionForEach);

							        function funcionForEach(item, index){

						    			$(".seleccionarSubCategoriablog").append(

						    				'<option value="'+item["id"]+'">'+item["subcategoriablog"]+'</option>'

						    			)

						    		}

								}

							})	


						}

					})

			}else{
				
				$(".optionEditarSubCategoriablog").html("SIN CATEGORÍA");

			}


			$(" .numvisitas").val(respuesta[0]["num_visitas"]);
			$(" .numestrellas").val(respuesta[0]["estrellas"]);
			$(" .fecha").val(respuesta[0]["fecha"]);
			$(" .titlePost").val(respuesta[0]["title"]);
			$(" .descriptionPost").val(respuesta[0]["description"]);
			$(" .keywordsPost").val(respuesta[0]["keywords"]);
			
			//$(" #descripcioncortaa").val(respuesta[0]["descripcioncorta"]);
			//$(" #editor1").val(respuesta[0]["descripcionlarga"]);
			$(" #descripcionCorta").val(respuesta[0]["descripcioncorta"]);
			//$_POST["descripcioncorta"] = respuesta[0]["descripcioncorta"];
			$(" .descripcionLarga").val(respuesta[0]["descripcionlarga"]);
			$(" .videoPost").val(respuesta[0]["video"]);
		    $(" .previsualizarFotoBlog").attr("src", respuesta[0]["imagen"]);
			$(" .antiguaFotoBlog").val(respuesta[0]["imagen"]);
			//$_POST["editor1"] = respuesta[0]["descripcionlarga"];
			//var data = respuesta[0]["descripcionlarga"];
			//var html = editor.dataProcessor.toHtml( data );

			//alert("hola");
			//$(" #editor1").value(respuesta[0]["descripcionlarga"]);
			//editor.dataProcessor.toHtml( data );

			//$(" #editor1 ").val(respuesta[0]["descripcionlarga"]);
			//$_POST["editor1"];
			
			


		}//fin del success

	})//fin de inicio de ajax para encontrar el producto

})//finn de inicia funcion btnEditarBlog




$(".guardarCambiosBlog").click(function(){
    //alert("hola");

    if($(".tituloPost").val() != "" && $(".rutaPost").val() != "" ){


    	var id = $(".idBlog").val();
	    var titulo = $(".tituloPost").val();
	    var ruta = $(".rutaPost").val();

	    var datosBlog = new FormData();

	    datosBlog.append("id", id);
	    datosBlog.append("titulo", titulo);
	    datosBlog.append("ruta", ruta);


	    	$.ajax({
			url:"ajax/blog.ajax.php",
			method: "POST",
			data: datosBlog,
			cache: false,
			contentType: false,
			processData: false,
				beforeSend: function(){


					swal({
						  type: "success",
						  title: "El producto ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "inicio";

							}
						})

				},
				success: function(respuesta){
										
					if(respuesta == "ok"){
						//aqui activaria mi java script	
						swal({
						  type: "success",
						  title: "El producto ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "inicio";

							}
						})
					}		

				},

			})

    }


})

