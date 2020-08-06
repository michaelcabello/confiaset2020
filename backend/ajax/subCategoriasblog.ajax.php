<?php


require_once "../controladores/subcategoriasblog.controlador.php";
require_once "../modelos/subcategoriasblog.modelo.php";

require_once "../controladores/categoriasblog.controlador.php";
require_once "../modelos/categoriasblog.modelo.php";

require_once "../controladores/blog.controlador.php";
require_once "../modelos/blog.modelo.php";

class AjaxSubCategoriasblog{

	/*=============================================
	TRAER SUBCATEGORIAS DE ACUERDO A LA CATEGORÍA
	=============================================*/	

	public $idCategoriablog;

	public function ajaxTraerSubCategoriablog(){

		$item = "id_categoriablog";
		$valor = $this->idCategoriablog;

		$respuesta = ControladorSubCategoriasblog::ctrMostrarSubCategoriasblog($item, $valor);

		echo json_encode($respuesta);

	}

}//fin de la clase



/*=============================================
TRAER SUBCATEGORIAS DE ACUERDO A LA CATEGORÍA
=============================================*/
if(isset($_POST["idCategoriablog"])){

	$traerSubCategoriablog = new AjaxSubCategoriasblog();
	$traerSubCategoriablog -> idCategoriablog = $_POST["idCategoriablog"];
	$traerSubCategoriablog -> ajaxTraerSubCategoriablog();

}