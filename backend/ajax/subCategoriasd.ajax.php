<?php


require_once "../controladores/subcategoriasd.controlador.php";
require_once "../modelos/subcategoriasd.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxSubCategoriasd{

	/*=============================================
  	ACTIVAR SUBCATEGORIA
 	=============================================*/	

	public $activarSubCategoria;
	public $activarId;

	public function ajaxActivarSubCategoria(){

		$tabla = "subcategoriad";

		$item1 = "estado";
		$valor1 = $this->activarSubCategoria;

		$item2 = "id";
		$valor2 = $this->activarId;	

		//ModeloProductos::mdlActualizarProductos("productos", $item1, $valor1, "id_subcategoria", $valor2);

		$respuesta = ModeloSubCategoriasd::mdlActualizarSubCategorias($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}


	/*=============================================
	VALIDAR NO REPETIR SUBCATEGORÍA
	=============================================*/	

	public $validarSubCategoria;

	public function ajaxValidarSubCategoria(){

		$item = "subcategoria";
		$valor = $this->validarSubCategoria;

		$respuesta = ControladorSubCategoriasd::ctrMostrarSubCategorias($item, $valor);

		echo json_encode($respuesta);

	}


	public $idSubCategoria;

	public function ajaxEditarSubCategoria(){

		$item = "id";
		$valor = $this->idSubCategoria;

		$respuesta = ControladorSubCategoriasd::ctrMostrarSubCategorias($item, $valor);

		echo json_encode($respuesta);

	}






}//fin de la clase


/*=============================================
ACTIVAR SUBCATEGORIA
=============================================*/	

if(isset($_POST["activarSubCategoria"])){

	$activarSubCategoriad = new AjaxSubCategoriasd();
	$activarSubCategoriad -> activarSubCategoria = $_POST["activarSubCategoria"];
	$activarSubCategoriad -> activarId = $_POST["activarId"];
	$activarSubCategoriad -> ajaxActivarSubCategoria();

}


/*=============================================
VALIDAR NO REPETIR SUBCATEGORÍA
=============================================*/

if(isset( $_POST["validarSubCategoria"])){

	$valSubCategoriad = new AjaxSubCategoriasd();
	$valSubCategoriad -> validarSubCategoria = $_POST["validarSubCategoria"];
	$valSubCategoriad -> ajaxValidarSubCategoria();

}


/*=============================================
EDITAR SUBCATEGORIA
=============================================*/
if(isset($_POST["idSubCategoria"])){

	$editarSubCategoriad = new AjaxSubCategoriasd();
	$editarSubCategoriad -> idSubCategoria = $_POST["idSubCategoria"];
	$editarSubCategoriad -> ajaxEditarSubCategoria();

}


	