<?php

class ControladorContactos{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/
                           
	static public function ctrMostrarContactos($item, $valor){

		$tabla = "contactenos";

		$respuesta = ModeloContactos::mdlMostrarContactos($tabla, $item, $valor);

		return $respuesta;

	}


}//fin de la clase