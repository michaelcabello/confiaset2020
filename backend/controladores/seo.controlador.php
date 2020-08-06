<?php

class ControladorSeo{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/
                           
	static public function ctrMostrarSeo($item, $valor){

		$tabla = "cabeceras";

		$respuesta = ModeloSeo::mdlMostrarSeo($tabla, $item, $valor);

		return $respuesta;

	}


}//fin de la clase