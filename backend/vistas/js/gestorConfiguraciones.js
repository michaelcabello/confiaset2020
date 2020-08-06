/*=============================================
SUBIR LOGOTIPOO DE CONFIGURACIONES
=============================================*/

$("#subirLogodeconf").change(function(){

	var imagenLogo = this.files[0];

	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenLogo["type"] != "image/jpeg" && imagenLogo["type"] != "image/png"){

  		$("#subirLogodeconf").val("");

  		swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	/*=============================================
  	VALIDAMOS EL TAMAÑO DE LA IMAGEN
  	=============================================*/

  	}else if(imagenLogo["size"] > 2000000){

  		$("#subirLogodeconf").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	/*=============================================
  	PREVISUALIZAMOS LA IMAGEN
  	=============================================*/

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagenLogo);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarLogodeconf").attr("src", rutaImagen);

  		})

  	}


 	/*=============================================
  	GUARDAR EL LOGOTIPO DE CONF
  	=============================================*/

  	$("#guardarLogodeconf").click(function(){

  		var datos = new FormData();
  		datos.append("imagenLogo", imagenLogo);

  		$.ajax({

			url:"ajax/configuracion.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){

				if(respuesta == "ok"){

					swal({
				      title: "Cambios guardados",
				      text: "¡La plantilla ha sido actualizada correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
			
				}

				
			}

		})


  	})


})


/*=============================================
SUBIR ICONO
=============================================*/

$("#subirIconodeconf").change(function(){

	var imagenIcono = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenIcono["type"] != "image/jpeg" && imagenIcono["type"] != "image/png"){

  		$("#subirIconodeconf").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	/*=============================================
  	VALIDAMOS EL TAMAÑO DE LA IMAGEN
  	=============================================*/

  	}else if(imagenIcono["size"] > 2000000){

  		$("#subirIconodeconf").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

	/*=============================================
  	PREVISUALIZAMOS LA IMAGEN
  	=============================================*/

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagenIcono);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarIconodeconf").attr("src", rutaImagen);

  		})

  	}

  	/*=============================================
  	GUARDAR EL ICONO
  	=============================================*/

  	$("#guardarIconodeconf").click(function(){

		var datos = new FormData();
		datos.append("imagenIcono", imagenIcono);

		$.ajax({

			url:"ajax/configuracion.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					swal({
				      title: "Cambios guardados",
				      text: "¡La plantilla ha sido actualizada correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
			
				}
		
			}

		});

	})

})


/*=============================================
CAMBIAR CÓDIGOS
=============================================*/

$(".cambioScript").change(function(){
	var googleanalitics = $("#googleanalitics").val();

	var bienvenida = $("#bienvenida").val();

	$("#guardarScript").click(function(){

			var datos = new FormData();
			datos.append("googleanalitics", googleanalitics);
			datos.append("bienvenida", bienvenida);
		

			$.ajax({

				url:"ajax/configuracion.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					
					if(respuesta == "ok"){

						swal({
					      title: "Cambios guardados",
					      text: "¡La plantilla ha sido actualizada correctamente!",
					      type: "success",
					      confirmButtonText: "¡Cerrar!"
					    });
				
					}/*fin del if*/
					
				}/*fin del success*/

			})/*fin del ajax*/			

	})
	

})

/*=============================================
CAMBIAR TELEFONO Y CELULAR
=============================================*/

$(".cambioTelefono").change(function(){

	var telefono1 = $("#telefono1").val();
	var telefono2 = $("#telefono2").val();
	var celular1 = $("#celular1").val();
	var celular2 = $("#celular2").val();

	
	$("#guardarTelefono").click(function(){


		var datos = new FormData();
		datos.append("telefono1", telefono1);
		datos.append("telefono2", telefono2);
		datos.append("celular1", celular1);
		datos.append("celular2", celular2);
	

		$.ajax({

			url:"ajax/configuracion.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					swal({
				      title: "Cambios guardados",
				      text: "¡Los Teléfonos han sido actualizados correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
			
				}
				
			}

		})

	})

})

/*=============================================
CAMBIAR CORREO Y REDES
=============================================*/

$(".cambioCorreoRedes").change(function(){

	var email1 = $("#email1").val();
	var email2 = $("#email2").val();
	var facebook = $("#facebook").val();
	var youtube = $("#youtube").val();
	var twitter = $("#twitter").val();
	var instagram = $("#instagram").val();
	
	$("#guardarCorreoRedes").click(function(){


		var datos = new FormData();
		datos.append("email1", email1);
		datos.append("email2", email2);
		datos.append("facebook", facebook);
		datos.append("youtube", youtube);
		datos.append("twitter", twitter);
		datos.append("instagram", instagram);
	

		$.ajax({

			url:"ajax/configuracion.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					swal({
				      title: "Cambios guardados",
				      text: "¡Los Teléfonos han sido actualizados correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
			
				}
				
			}

		})

	})

})


/*=============================================
CAMBIAR SLOGAN Y DIRECCIONS
=============================================*/

$(".cambioSloganDireccion").change(function(){

	var slogan = $("#slogan").val();
	var direccion1 = $("#direccion1").val();
	var direccion2 = $("#direccion2").val();
		
	$("#guardarSloganDireccion").click(function(){


		var datos = new FormData();
		datos.append("slogan", slogan);
		datos.append("direccion1", direccion1);
		datos.append("direccion2", direccion2);
		
		$.ajax({

			url:"ajax/configuracion.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					swal({
				      title: "Cambios guardados",
				      text: "¡Los Datos han sido actualizados correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
			
				}
				
			}

		})

	})

})

/*=============================================
CAMBIAR NUMEROS
=============================================*/

$(".cambioNumero").change(function(){

	var numero1 = $("#numero1").val();
	var numero2 = $("#numero2").val();
	var numero3 = $("#numero3").val();
	var numero4 = $("#numero4").val();
		
	$("#guardarNumeros").click(function(){


		var datos = new FormData();
		datos.append("numero1", numero1);
		datos.append("numero2", numero2);
		datos.append("numero3", numero3);
		datos.append("numero4", numero4);
		
		$.ajax({

			url:"ajax/configuracion.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					swal({
				      title: "Cambios guardados",
				      text: "¡Los Datos han sido actualizados correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
			
				}
				
			}

		})

	})

})