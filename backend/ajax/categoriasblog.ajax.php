<?php

require_once "../controladores/categoriasblog.controlador.php";
require_once "../modelos/categoriasblog.modelo.php";

// require_once "../controladores/subcategorias.controlador.php";
require_once "../modelos/subcategorias.modelo.php";

class AjaxCategoriasblog{

  /*=============================================
  ACTIVAR CATEGORIA
  =============================================*/	

  public $activarCategoriablog;
  public $activarIdblog;

  public function ajaxActivarCategoriablog(){


	    //ModeloSubCategorias::mdlActualizarSubCategorias("subcategorias", "estado", $this->activarCategoria, "id_categoria", $this->activarId);

	   // ModeloProductos::mdlActualizarProductos("productos", "estado", $this->activarCategoria, "id_categoria", $this->activarId);

	  	$respuesta = ModeloCategoriasblog::mdlActualizarCategoriablog("categoriablog", "estado", $this->activarCategoriablog, "id", $this->activarIdblog);

	  	echo $respuesta;
  	}//fin del metodo ajaxActivarCategoriablog


  /*=============================================
  VALIDAR NO REPETIR CATEGORÍA
  =============================================*/ 

  public $validarCategoriablog;

  public function ajaxValidarCategoriablog(){

    $item = "categoria";
    $valor = $this->validarCategoriablog;

    $respuesta = ControladorCategoriasblog::ctrMostrarCategoriasblog($item, $valor);

    echo json_encode($respuesta);

  }

 /*=============================================
  EDITAR CATEGORIABLOG
  =============================================*/ 

  public $idCategoriablog;

  public function ajaxEditarCategoriablog(){

    $item = "id";
    $valor = $this->idCategoriablog;

    $respuesta = ControladorCategoriasblog::ctrMostrarCategoriasblog($item, $valor);

    echo json_encode($respuesta);

  }





}//fin de la clase

//////////////////////////////////////////////////////////////////////

/*=============================================
ACTIVAR CATEGORIA
=============================================*/

if(isset($_POST["activarCategoriablog"])){

	$activarCategoriablog = new AjaxCategoriasblog();
	$activarCategoriablog -> activarCategoriablog = $_POST["activarCategoriablog"];
	$activarCategoriablog -> activarIdblog = $_POST["activarIdblog"];
	$activarCategoriablog -> ajaxActivarCategoriablog();

}

/*=============================================
VALIDAR NO REPETIR CATEGORÍAf
=============================================*/

if(isset( $_POST["validarCategoriablog"])){

  $valCategoriablog = new AjaxCategoriasblog();
  $valCategoriablog -> validarCategoriablog = $_POST["validarCategoriablog"];
  $valCategoriablog -> ajaxValidarCategoriablog();

}

/*=============================================
EDITAR CATEGORIA BLOG
=============================================*/
if(isset($_POST["idCategoriablog"])){

  $editar = new AjaxCategoriasblog();
  $editar -> idCategoriablog = $_POST["idCategoriablog"];
  $editar -> ajaxEditarCategoriablog();

}

