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
SELECCIONAR SUBCATEGORÍA
=============================================*/

$(".seleccionarCategoriablog").change(function(){

	var categoria = $(this).val();

	$(".seleccionarSubCategoria").html("");

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