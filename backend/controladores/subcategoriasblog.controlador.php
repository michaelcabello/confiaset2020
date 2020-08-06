<?php

class ControladorSubCategoriasblog{

	/*=============================================
	MOSTRAR SUBCATEGORIAS BLOG
	=============================================*/

	static public function ctrMostrarSubCategoriasblog($item, $valor){

		$tabla = "subcategoriablog";

		$respuesta = ModeloSubCategoriasblog::mdlMostrarSubCategoriasblog($tabla, $item, $valor);

		return $respuesta;
	
	}

}
