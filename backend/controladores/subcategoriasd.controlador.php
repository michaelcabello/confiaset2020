<?php

class ControladorSubCategoriasd{

	/*=============================================
	MOSTRAR SUBCATEGORIASf
	=============================================*/

	static public function ctrMostrarSubCategorias($item, $valor){

		$tabla = "subcategoriad";

		$respuesta = ModeloSubCategoriasd::mdlMostrarSubCategorias($tabla, $item, $valor);

		return $respuesta;
	
	}


	/*=============================================
	CREAR SUBCATEGORIA o CONTENIDO
	=============================================*/

	static public function ctrCrearSubCategoria(){

		if(isset($_POST["tituloSubCategoriad"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloSubCategoriad"])){

				/*=============================================
				VALIDAR IMAGEN BANER
				=============================================*/

				$rutaPortada = "vistas/img/cabeceras/default/default.jpg";

				if(isset($_FILES["fotoPortadad"]["tmp_name"]) && !empty($_FILES["fotoPortadad"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/
					list($ancho, $alto) = getimagesize($_FILES["fotoPortadad"]["tmp_name"]);	

					$nuevoAncho = 1610;
					$nuevoAlto = 250;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoPortadad"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/cabeceras/".$_POST["rutaSubCategoriad"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoPortadad"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);

					}

					if($_FILES["fotoPortadad"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/cabeceras/".$_POST["rutaSubCategoriad"].".png";

						$origen = imagecreatefrompng($_FILES["fotoPortadad"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);

					}

				}

				/*=============================================
				VALIDAR IMAGEN TITULO1
				=============================================*/
				$rutatitulo1 = "vistas/img/servicios/titulo1/default/default.jpg";

				if(isset($_FILES["fotoTitulo1"]["tmp_name"]) && !empty($_FILES["fotoTitulo1"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoTitulo1"]["tmp_name"]);	

					$nuevoAncho = 900;
					$nuevoAlto = 800;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoTitulo1"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutatitulo1 = "vistas/img/servicios/titulo1/".$_POST["rutaSubCategoriad"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoTitulo1"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutatitulo1);

					}

					if($_FILES["fotoTitulo1"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutatitulo1 = "vistas/img/servicios/titulo1/".$_POST["rutaSubCategoriad"].".png";

						$origen = imagecreatefrompng($_FILES["fotoTitulo1"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutatitulo1);

					}

				}
				

				/*=============================================
				juntamos datos a guardar
				=============================================*/

					$datos = array("id_categoria"=>$_POST["seleccionarCategoriad"],
								   "titulo"=>$_POST["tituloSubCategoriad"],//subcategoria
								   "imgPortada"=>$rutaPortada,//imagenbaner
								   "ruta"=>$_POST["rutaSubCategoriad"],//$_POST["rutaSubCategoriad"],	
								   "estado"=> 1,
								   "titulo1"=>$_POST["titulo1"],
								   "descripcion"=> $_POST["descripcionTitulo1"],//descripcion1
								   "palabrasClaves"=> $_POST["pClavesSubCategoriad"],   
								   "imagen1"=>$rutatitulo1
									);

						 				
				ModeloCabeceras::mdlIngresarCabecera("cabeceras", $datos);
				//ruta, titulo, descripcion, palabrasClaves, portada

				$respuesta = ModeloSubCategoriasd::mdlIngresarSubCategoria("subcategoriad", $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La subcategoría ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "subcategoriasd";

									}
								})

					</script>';

				}


		}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La subcategoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "subcategoriasd";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	EDITAR SUBCATEGORIA
	=============================================*/

	static public function ctrEditarSubCategoria(){

		if(isset($_POST["editarTituloSubCategoriad"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloSubCategoriad"])){

				/*=============================================
				VALIDAR IMAGEN PORTADA BANNER
				=============================================*/

				$rutaPortada = $_POST["antiguaFotoPortada"];

				if(isset($_FILES["fotoPortadad"]["tmp_name"]) && !empty($_FILES["fotoPortadad"]["tmp_name"])){
			
					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					unlink($_POST["antiguaFotoPortada"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoPortada"]["tmp_name"]);	

					$nuevoAncho = 1610;
					$nuevoAlto = 250;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoPortada"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaPortada = "vistas/img/cabeceras/".$_POST["rutaSubCategoriad"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);

					}

					if($_FILES["fotoPortada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaPortada = "vistas/img/cabeceras/".$_POST["rutaSubCategoriad"].".png";

						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);

					}

				}


				/*=============================================
				VALIDAR IMAGEN TITULO1
				=============================================*/

				$rutatitulo1 = $_POST["antiguaFotoTitulo1"];

				if(isset($_FILES["fotoTitulo1"]["tmp_name"]) && !empty($_FILES["fotoTitulo1"]["tmp_name"])){
			
					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					unlink($_POST["antiguaFotoTitulo1"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoTitulo1"]["tmp_name"]);	

					$nuevoAncho = 900;
					$nuevoAlto = 800;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoTitulo1"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$rutatitulo1 = "vistas/img/servicios/titulo1/".$_POST["rutaSubCategoriad"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoTitulo1"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);

					}

					if($_FILES["fotoTitulo1"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutatitulo1 = "vistas/img/servicios/titulo1/".$_POST["rutaSubCategoriad"].".png";

						$origen = imagecreatefrompng($_FILES["fotoTitulo1"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutatitulo1);

					}

				}


				

				/*=============================================
				juntamos datos a guardar
				=============================================*/

					$datos = array("id"=>$_POST["editarIdSubCategoriad"],//$_POST["editarIdSubCategoriad"] contiene el id de la subcategoria a modificar ver gestorSubCategoriasd.js
								   "id_categoria"=>$_POST["seleccionarCategoriad"],
								   "titulo"=>$_POST["editarTituloSubCategoriad"],//subcategoria
								   "imgPortada"=>$rutaPortada,//imagenbaner
								   "ruta"=>$_POST["rutaSubCategoriad"],//$_POST["rutaSubCategoriad"],	
								   "estado"=> 1,
								   "idCabecera"=>$_POST["editarIdCabecera"],
								   "titulo1"=>$_POST["titulo1"],
								   "descripcion1"=> $_POST["descripcionTitulo1"],//descripcion1
								   "palabrasClaves"=> $_POST["pClavesSubCategoria"], // esto esta en gestorsubcategoriasd.js  
								   "imagen1"=>$rutatitulo1
									);

				//var_dump($datos);

			
				ModeloCabeceras::mdlEditarCabecera("cabeceras", $datos);
			
				$respuesta = ModeloSubCategoriasd::mdlEditarSubCategoria("subcategoriad", $datos);
				//echo $respuesta;

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La subcategoría ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "subcategoriasd";

									}
								})

					</script>';

				}else{

						echo'<script>

					swal({
						  type: "error",
						  title: "¡Huvo erro al guardar en la BD!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "subcategoriasd";

							}
						})

			  	</script>';



				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La subcategoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "subcategoriasd";

							}
						})

			  	</script>';

			}


		}

	}






}//fin de la clase