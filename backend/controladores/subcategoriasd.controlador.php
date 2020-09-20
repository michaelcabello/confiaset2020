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
				VALIDAR IMAGEN TITULO2
				=============================================*/
				$rutatitulo2 = "vistas/img/servicios/titulo2/default/default.jpg";

				if(isset($_FILES["fotoTitulo2"]["tmp_name"]) && !empty($_FILES["fotoTitulo2"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoTitulo2"]["tmp_name"]);	

					$nuevoAncho = 900;
					$nuevoAlto = 800;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoTitulo2"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutatitulo2 = "vistas/img/servicios/titulo2/".$_POST["rutaSubCategoriad"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoTitulo2"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutatitulo2);

					}

					if($_FILES["fotoTitulo2"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutatitulo2 = "vistas/img/servicios/titulo2/".$_POST["rutaSubCategoriad"].".png";

						$origen = imagecreatefrompng($_FILES["fotoTitulo2"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutatitulo2);

					}

				}


				/*=============================================
				VALIDAR IMAGEN TITULO3
				=============================================*/
				$rutatitulo3 = "vistas/img/servicios/titulo3/default/default.jpg";

				if(isset($_FILES["fotoTitulo3"]["tmp_name"]) && !empty($_FILES["fotoTitulo3"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoTitulo3"]["tmp_name"]);	

					$nuevoAncho = 900;
					$nuevoAlto = 800;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoTitulo3"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutatitulo3 = "vistas/img/servicios/titulo3/".$_POST["rutaSubCategoriad"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoTitulo3"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutatitulo3);

					}

					if($_FILES["fotoTitulo3"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutatitulo3 = "vistas/img/servicios/titulo3/".$_POST["rutaSubCategoriad"].".png";

						$origen = imagecreatefrompng($_FILES["fotoTitulo3"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutatitulo3);

					}

				}


				/*=============================================
				VALIDAR IMAGEN TITULO4
				=============================================*/
				$rutatitulo4 = "vistas/img/servicios/titulo4/default/default.jpg";

				if(isset($_FILES["fotoTitulo4"]["tmp_name"]) && !empty($_FILES["fotoTitulo4"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoTitulo4"]["tmp_name"]);	

					$nuevoAncho = 900;
					$nuevoAlto = 800;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoTitulo4"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutatitulo4 = "vistas/img/servicios/titulo4/".$_POST["rutaSubCategoriad"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoTitulo4"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutatitulo4);

					}

					if($_FILES["fotoTitulo4"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutatitulo4 = "vistas/img/servicios/titulo4/".$_POST["rutaSubCategoriad"].".png";

						$origen = imagecreatefrompng($_FILES["fotoTitulo4"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutatitulo4);

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
								   "orden"=> $_POST["orden"],
								   "imagen1"=>$rutatitulo1,

								   "titulo2"=>$_POST["titulo2"],
								   "descripcion2"=> $_POST["descripcionTitulo2"],
								   "imagen2"=>$rutatitulo2,
								   "titulo3"=>$_POST["titulo3"],
								   "descripcion3"=> $_POST["descripcionTitulo3"],
								   "imagen3"=>$rutatitulo3,
								   "titulo4"=>$_POST["titulo4"],
								   "descripcion4"=> $_POST["descripcionTitulo4"],
								   "imagen4"=>$rutatitulo4
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

				$rutaPortada = $_POST["antiguaFotoPortadad"];

				if(isset($_FILES["fotoPortadad"]["tmp_name"]) && !empty($_FILES["fotoPortadad"]["tmp_name"])){
			
					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					unlink($_POST["antiguaFotoPortadad"]);

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

						$aleatorio = mt_rand(100,999);

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

						$aleatorio = mt_rand(100,999);

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

						imagejpeg($destino, $rutatitulo1);

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
				VALIDAR IMAGEN TITULO2
				=============================================*/

				$rutatitulo2 = $_POST["antiguaFotoTitulo2"];
						
				if(isset($_FILES["fotoTitulo2"]["tmp_name"]) && !empty($_FILES["fotoTitulo2"]["tmp_name"])){
			
					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					unlink($_POST["antiguaFotoTitulo2"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoTitulo2"]["tmp_name"]);	

					$nuevoAncho = 900;
					$nuevoAlto = 800;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoTitulo2"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$rutatitulo2 = "vistas/img/servicios/titulo2/".$_POST["rutaSubCategoriad"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoTitulo2"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutatitulo2);

					}

					if($_FILES["fotoTitulo2"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutatitulo1 = "vistas/img/servicios/titulo2/".$_POST["rutaSubCategoriad"].".png";

						$origen = imagecreatefrompng($_FILES["fotoTitulo2"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutatitulo2);

					}

				}

				

				/*=============================================
				VALIDAR IMAGEN TITULO3
				=============================================*/

				$rutatitulo3 = $_POST["antiguaFotoTitulo3"];
						
				if(isset($_FILES["fotoTitulo3"]["tmp_name"]) && !empty($_FILES["fotoTitulo3"]["tmp_name"])){
			
					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					unlink($_POST["antiguaFotoTitulo3"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoTitulo3"]["tmp_name"]);	

					$nuevoAncho = 900;
					$nuevoAlto = 800;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoTitulo3"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$rutatitulo3 = "vistas/img/servicios/titulo3/".$_POST["rutaSubCategoriad"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoTitulo3"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutatitulo3);

					}

					if($_FILES["fotoTitulo3"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutatitulo1 = "vistas/img/servicios/titulo3/".$_POST["rutaSubCategoriad"].".png";

						$origen = imagecreatefrompng($_FILES["fotoTitulo3"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutatitulo3);

					}

				}



				/*=============================================
				VALIDAR IMAGEN TITULO4
				=============================================*/

				$rutatitulo4 = $_POST["antiguaFotoTitulo4"];
						
				if(isset($_FILES["fotoTitulo4"]["tmp_name"]) && !empty($_FILES["fotoTitulo4"]["tmp_name"])){
			
					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					unlink($_POST["antiguaFotoTitulo4"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoTitulo4"]["tmp_name"]);	

					$nuevoAncho = 900;
					$nuevoAlto = 800;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoTitulo4"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$rutatitulo4 = "vistas/img/servicios/titulo4/".$_POST["rutaSubCategoriad"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoTitulo4"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutatitulo4);

					}

					if($_FILES["fotoTitulo4"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutatitulo1 = "vistas/img/servicios/titulo4/".$_POST["rutaSubCategoriad"].".png";

						$origen = imagecreatefrompng($_FILES["fotoTitulo4"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutatitulo4);

					}

				}




				/*=============================================
				juntamos datos a guardar
				=============================================*/

					$datos = array("id"=>$_POST["editarIdSubCategoriad"],//$_POST["editarIdSubCategoriad"] contiene el id de la subcategoria a modificar ver gestorSubCategoriasd.js
								   "id_categoria"=>$_POST["seleccionarCategoriad"],
								   "titulo"=>$_POST["editarTituloSubCategoriad"],//subcategoria
								   "imgPortada"=>$rutaPortada,//imagenbaner
								   "ruta"=>$_POST["rutaSubCategoriad"],
								   "orden"=>$_POST["orden"],//$_POST["rutaSubCategoriad"],	
								   "estado"=> 1,
								   "idCabecera"=>$_POST["editarIdCabecerad"],
								   "titulo1"=>$_POST["titulo1"],
								   "descripcion1"=> $_POST["descripcionTitulo1"],//descripcion1
								   "palabrasClaves"=> $_POST["pClavesSubCategoriad"], // esto esta en gestorsubcategoriasd.js  
								   "imagen1"=>$rutatitulo1,
								   "titulo2"=>$_POST["titulo2"],
								   "descripcion2"=> $_POST["descripcionTitulo2"],
								   "imagen2"=>$rutatitulo2,
								   "titulo3"=>$_POST["titulo3"],
								   "descripcion3"=> $_POST["descripcionTitulo3"],
								   "imagen3"=>$rutatitulo3,
								   "titulo4"=>$_POST["titulo4"],
								   "descripcion4"=> $_POST["descripcionTitulo4"],
								   "imagen4"=>$rutatitulo4
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