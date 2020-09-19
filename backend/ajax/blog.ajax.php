<?php
session_start();
require_once "../controladores/blog.controlador.php";
require_once "../modelos/blog.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";

class AjaxBlog{


	public $titulo;
	public $descripcionlarga;
	
	public function  ajaxCrearBlog(){

		$datos = array(
			"titulo"=>$this->titulo,
			"descripcionlarga"=>$this->descripcionlarga
			);

		$respuesta = ControladorBlog::ctrCrearBlog($datos);

		echo $respuesta;

	}



	/*=============================================
	VALIDAR NO REPETIR POST
	=============================================*/	

	public $validarTitulo;

	public function ajaxValidarTitulo(){

		$item = "titulo";
		$valor = $this->validarTitulo;

		$respuesta = ControladorBlog::ctrMostrarBlog($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	EDITAR BLOG
	=============================================*/	

	public $idBlog;

	public function ajaxEditarBlog(){

		$item = "id";
		$valor = $this->idBlog;

		$respuesta = ControladorBlog::ctrMostrarBlog($item, $valor);
		//$_SESSION['deslarga'] = $respuesta[0]["descripcionlarga"];
		echo json_encode($respuesta);

	}

	public $id;
	//public $titulo; se debe declarar una sola vez , arriba ya existe esta variable
	public $ruta;
	
	public function ajaxEditarBlogd(){

		$datos = array(
			"id"=>$this->id,
			"titulo"=>$this->titulo,
			"ruta"=>$this->ruta
			);

		$respuesta = ControladorBlog::ctrEditarBlog($datos);

	
		echo $respuesta;

	}



}//fin de la clase



if(isset($_POST["titulo"])){

	$blog = new AjaxBlog();
	$blog -> titulo = $_POST["titulo"];
	$blog -> descripcionlarga = $_POST["descripcionlarga"];
	$blog -> ajaxCrearBlog();

}


/*=============================================
VALIDAR NO REPETIR TITULO DE POST
=============================================*/

if(isset($_POST["validarTitulo"])){

	$valTitulo = new AjaxBlog();
	$valTitulo -> validarTitulo = $_POST["validarTitulo"];
	$valTitulo -> ajaxValidarTitulo();

}

/*=============================================
EDITAR BLOG
=============================================*/
if(isset($_POST["idBlog"])){

	$editarBlog = new AjaxBlog();
	$editarBlog -> idBlog = $_POST["idBlog"];
	$editarBlog -> ajaxEditarBlog();

}


if(isset($_POST["id"])){

	$editarBlogd = new AjaxBlog();
	$editarBlogd -> id = $_POST["id"];
	$editarBlogd -> titulo = $_POST["titulo"];
	$editarBlogd -> ruta = $_POST["ruta"];
	$editarBlogd -> ajaxEditarBlogd();


}

