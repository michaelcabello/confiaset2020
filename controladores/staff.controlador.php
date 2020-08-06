<?php

class ControladorStaffs{


	/*=============================================
	MOSTRAR CATEGORÍAS
	=============================================*/

	static public function ctrMostrarStaff($item, $valor){

		$tabla = "staff";

		$respuesta = ModeloStaffs::mdlMostrarStaffs($tabla, $item, $valor);

		return $respuesta;

	}


	/*=============================================
	MOSTRAR INFODOCTOR
	=============================================*/

	static public function ctrMostrarInfoStaff($item, $valor){
		
		$tabla = "staff";
		$respuesta = ModeloStaffs::mdlMostrarInfoStaff($tabla, $item, $valor);
		return $respuesta;


	}




}