<?php

class ControladorStaff{

	/*=============================================
	MOSTRAR STAFF
	=============================================*/

	static public function ctrMostrarStaff($item, $valor){

		$tabla = "staff";

		$respuesta = ModeloStaff::mdlMostrarStaff($tabla, $item, $valor);

		return $respuesta;
	
	}

	
	/*=============================================
	CREAR SUBCATEGORIA o CONTENIDO
	=============================================*/

	static public function ctrCrearStaff(){

		if(isset($_POST["nombres"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nombres"])){

				

				/*=============================================
				VALIDAR IMAGEN FOTO DOCTOR
				=============================================*/
				$rutafoto = "vistas/img/servicios/staff/default/default.jpg";

				if(isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["foto"]["tmp_name"]);	

					$nuevoAncho = 553;
					$nuevoAlto = 406;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["foto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutafoto = "vistas/img/servicios/staff/".$_POST["ruta"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutafoto);

					}

					if($_FILES["foto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutafoto = "vistas/img/servicios/staff/".$_POST["ruta"].".png";

						$origen = imagecreatefrompng($_FILES["foto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutafoto);

					}

				}

				/*=============================================*/
				/*=============================================
				VALIDAR IMAGEN PEQUEÑA DOCTOR
				=============================================*/
				$rutafotop = "vistas/img/servicios/staff/fotop/default/default.jpg";

				if(isset($_FILES["fotop"]["tmp_name"]) && !empty($_FILES["fotop"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotop"]["tmp_name"]);	

					$nuevoAncho = 134;
					$nuevoAlto = 141;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotop"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutafotop = "vistas/img/servicios/staff/fotop/".$_POST["ruta"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotop"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutafotop);

					}

					if($_FILES["fotop"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutafotop = "vistas/img/servicios/staff/fotop/".$_POST["ruta"].".png";

						$origen = imagecreatefrompng($_FILES["fotop"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutafotop);

					}

				}




				/*=============================================
				juntamos datos a guardar
				=============================================
				nombres, ruta, titulo, descripcion, cmp, rne, especialidades, correo, celular, foto, facebook, google, instagram, twitter, orden, estado */

					$datos = array("nombres"=>$_POST["nombres"],
								   "ruta"=>$_POST["ruta"],
								   "titulo"=>$_POST["titulo"],//subcategoria
								   "descripcion"=>$_POST["descripcion"],
								   "cmp"=>$_POST["cmp"],
								   "rne"=>$_POST["rne"],
								   "especialidades"=>$_POST["especialidades"],
								   "correo"=>$_POST["correo"],
								   "celular"=>$_POST["celular"],
								   "foto"=>$rutafoto,
								   "fotop"=>$rutafotop,
								   "facebook"=>$_POST["facebook"],
								   "google"=>$_POST["google"],
								   "instagram"=>$_POST["instagram"],
								   "twitter"=>$_POST["twitter"],
								   "orden"=>$_POST["orden"],
								   "estado"=>1,
								   "imgPortada"=>$rutafoto,
								   "palabrasClaves"=>$_POST["pClavesStaff"]
									);

				 				
			 ModeloCabeceras::mdlIngresarCabecera("cabeceras", $datos);
			//ruta, titulo, descripcion, palabrasClaves, portada

			$respuesta = ModeloStaff::mdlIngresarStaff("staff", $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Doctor ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "staff";

									}
								})

					</script>';

				}


		}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacíooo o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "staff";

							}
						})

			  	</script>';

			}

		}

	}

	/******/
	/******/



	/*=============================================
	EDITAR STAFF
	=============================================*/

	static public function ctrEditarStaff(){

		if(isset($_POST["editarnombres"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarnombres"])){

				/*=============================================
				VALIDAR IMAGEN FOTO DEL DOCTOR
				=============================================*/

				$rutafoto = $_POST["antiguaFoto"];//antigua foto tiene la foto actual, antigua foto es un hiden y se lleno en gestorStaff.js

				if(isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])){
			
					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					unlink($_POST["antiguaFoto"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["foto"]["tmp_name"]);	

					$nuevoAncho = 553;
					$nuevoAlto = 406;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["foto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutafoto = "vistas/img/servicios/staff/".$_POST["ruta"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutafoto);

					}

					if($_FILES["foto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutafoto = "vistas/img/servicios/staff/".$_POST["ruta"].".png";

						$origen = imagecreatefrompng($_FILES["foto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutafoto);

					}

				} //fin de este if (isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])){
				



				/*=============================================
				VALIDAR IMAGEN PEQUEÑO DEL DOCTOR
				=============================================*/

				$rutafotope = $_POST["antiguaFotope"];//antigua foto tiene la foto actual, antigua foto es un hiden y se lleno en gestorStaff.js

				if(isset($_FILES["fotop"]["tmp_name"]) && !empty($_FILES["fotop"]["tmp_name"])){
			
					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					unlink($_POST["antiguaFotope"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotop"]["tmp_name"]);	

					$nuevoAncho = 134;
					$nuevoAlto = 141;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotop"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutafotope = "vistas/img/servicios/staff/fotop/".$_POST["ruta"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotop"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutafotope);

					}

					if($_FILES["fotop"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutafotope = "vistas/img/servicios/staff/fotop/".$_POST["ruta"].".png";

						$origen = imagecreatefrompng($_FILES["fotop"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutafotope);

					}

				} //fin de este if (isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])){




				/*=============================================
				juntamos datos a modificar
				=============================================*/
				//$_POST["editarIdStaff"] contiene el id de la subcategoria a modificar ver gestorStaff.js

					$datos = array("id"=>$_POST["editarIdStaff"],
						           "idCabecera"=>$_POST["editarIdCabecerad"],
								   "nombres"=>$_POST["editarnombres"],
								   "ruta"=>$_POST["ruta"],
								   "titulo"=>$_POST["titulo"],//subcategoria
								   "descripcion"=>$_POST["descripcion"],
								   "cmp"=>$_POST["cmp"],
								   "rne"=>$_POST["rne"],
								   "especialidades"=>$_POST["especialidades"],
								   "correo"=>$_POST["correo"],
								   "celular"=>$_POST["celular"],
								   "foto"=>$rutafoto,
								   "fotop"=>$rutafotope,
								   "facebook"=>$_POST["facebook"],
								   "google"=>$_POST["google"],
								   "instagram"=>$_POST["instagram"],
								   "twitter"=>$_POST["twitter"],
								   "orden"=>$_POST["orden"],
								   "estado"=>1,
								   "imgPortada"=>$rutafoto,
								   "palabrasClaves"=>$_POST["pClavesStaff"]
									);


				//var_dump($datos);
	
				ModeloCabeceras::mdlEditarCabecera("cabeceras", $datos);
			
				$respuesta = ModeloStaff::mdlEditarStaff("staff", $datos);
				//echo $respuesta;

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Staff ha sido editado YYY correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "staff";

									}
								})

					</script>';

			    }


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Staff no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "staff;

							}
						})

			  	</script>';

			}//fin de (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nombres"])){


		}//fin de ($_POST["nombres"]))

	}//fin de ctrEditarStaff()









}//fin de la clase
