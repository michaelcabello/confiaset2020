<?php

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
