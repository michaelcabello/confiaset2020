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

	public $idSubCategoriablog;

	public function ajaxTraerSubCategoriablog(){

		$item = "id";
		$valor = $this->idSubCategoriablog;

		$respuesta = ControladorSubCategoriasblog::ctrMostrarSubCategoriasblog($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	TRAER SUBCATEGORIAS DE ACUERDO A LA CATEGORÍA
	=============================================*/	

	public $idCategoriablog;

	public function ajaxTraerSubCategoria(){

		$item = "id_categoriablog";
		$valor = $this->idCategoriablog;

		$respuesta = ControladorSubCategoriasblog::ctrMostrarSubCategoriasblog($item, $valor);

		echo json_encode($respuesta);

	}


}//fin de la clase



/*=============================================
TRAER SUBCATEGORIAS 
=============================================*/
if(isset($_POST["idSubCategoriablog"])){

	$traerSubCategoriablog = new AjaxSubCategoriasblog();
	$traerSubCategoriablog -> idSubCategoriablog = $_POST["idSubCategoriablog"];
	$traerSubCategoriablog -> ajaxTraerSubCategoriablog();

}

/*=============================================
TRAER SUBCATEGORIAS DE ACUERDO A LA CATEGORÍA
=============================================*/
if(isset($_POST["idCategoriablog"])){

	$traerSubCategoria = new AjaxSubCategoriasblog();
	$traerSubCategoria -> idCategoriablog = $_POST["idCategoriablog"];
	$traerSubCategoria -> ajaxTraerSubCategoria();

}