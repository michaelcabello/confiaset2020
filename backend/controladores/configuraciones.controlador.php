<?php

class ControladorConfiguraciones{
	
	static public function ctrSeleccionarConfiguracion(){

		$tabla = "configuraciones";

		$respuesta = ModeloConfiguraciones::mdlSeleccionarConfiguraciones($tabla);

		return $respuesta;

	}


		/*=============================================
	ACTUALIZAR SCRIPT
	=============================================*/

	static public function ctrActualizarScript($datos){

		$tabla = "configuraciones";
		$id = 1;

		$respuesta = ModeloConfiguraciones::mdlActualizarScript($tabla, $id, $datos);

		return $respuesta;


	}


	/*=============================================
	ACTUALIZAR TELEFONO
	=============================================*/

	static public function ctrActualizarTelefono($datos){

		$tabla = "configuraciones";
		$id = 1;

		$respuesta = ModeloConfiguraciones::mdlActualizarTelefono($tabla, $id, $datos);

		return $respuesta;


	}


	/*=============================================
	ACTUALIZAR CORREO Y REDES
	=============================================*/

	static public function ctrActualizarCorreoRedes($datos){

		$tabla = "configuraciones";
		$id = 1;

		$respuesta = ModeloConfiguraciones::mdlActualizarCorreoRedes($tabla, $id, $datos);

		return $respuesta;


	}

	/*=============================================
	ACTUALIZAR SLOGAN DIRECCION
	=============================================*/

	static public function ctrActualizarSloganDireccion($datos){

		$tabla = "configuraciones";
		$id = 1;

		$respuesta = ModeloConfiguraciones::mdlActualizarSloganDireccion($tabla, $id, $datos);

		return $respuesta;


	}

	/*=============================================
	ACTUALIZAR NUMEROS
	=============================================*/

	static public function ctrActualizarNumero($datos){

		$tabla = "configuraciones";
		$id = 1;

		$respuesta = ModeloConfiguraciones::mdlActualizarNumero($tabla, $id, $datos);

		return $respuesta;


	}



	
	/*=============================================
	ACTUALIZAR LOGO O ICONO
	=============================================*/

	static public function ctrActualizarLogoIcono($item, $valor){

		$tabla = "configuraciones";
		$id = 1;

		$configuraciones = ModeloConfiguraciones::mdlSeleccionarConfiguraciones($tabla);

		/*=============================================
		CAMBIANDO LOGOTIPO O ICONO
		=============================================*/	

		$valorNuevo = $valor;

		if(isset($valor["tmp_name"])){

			list($ancho, $alto) = getimagesize($valor["tmp_name"]);

			/*=============================================
			CAMBIANDO LOGOTIPO
			=============================================*/	

			if($item == "logo"){

				unlink("../".$configuraciones["logo"]);

				$nuevoAncho = 300;
				$nuevoAlto = 100;

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				if($valor["type"] == "image/jpeg"){

					$ruta = "../vistas/img/plantilla/logo.jpg";

					$origen = imagecreatefromjpeg($valor["tmp_name"]);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);

				}

				if($valor["type"] == "image/png"){

					$ruta = "../vistas/img/plantilla/logo.png";

					$origen = imagecreatefrompng($valor["tmp_name"]);

					imagealphablending($destino, FALSE);

					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

			}

			/*=============================================
			CAMBIANDO ICONO
			=============================================*/	

			if($item == "icono"){

				unlink("../".$configuraciones["icono"]);

				$nuevoAncho = 100;
				$nuevoAlto = 100;

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				if($valor["type"] == "image/jpeg"){

					$ruta = "../vistas/img/plantilla/icono.jpg";

					$origen = imagecreatefromjpeg($valor["tmp_name"]);					

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);
			
				}

				if($valor["type"] == "image/png"){

					$ruta = "../vistas/img/plantilla/icono.png";

					$origen = imagecreatefrompng($valor["tmp_name"]);

					imagealphablending($destino, FALSE);
        			
        			imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);
			
				}

			}

			$valorNuevo = substr($ruta, 3);

		}

		$respuesta = ModeloConfiguraciones::mdlActualizarLogoIcono($tabla, $id, $item, $valorNuevo);

		return $respuesta;

	}


}//fin de la clase