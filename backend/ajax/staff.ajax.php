<?php

require_once "../controladores/staff.controlador.php";
require_once "../modelos/staff.modelo.php";

class AjaxStaff{
 /*=============================================
  ACTIVAR CATEGORIA
  =============================================*/	

  public $activarStaff;
  public $activarId;

    public function ajaxActivarStaff(){

    	$respuesta = ModeloStaff::mdlActualizarStaff("staff", "estado", $this->activarStaff, "id", $this->activarId);
    	echo $respuesta;

    }

  /*=============================================
  EDITAR STAFF
  =============================================*/ 

  public $idStaff;

  public function ajaxEditarStaff(){

    $item = "id";
    $valor = $this->idStaff;

    $respuesta = ControladorStaff::ctrMostrarStaff($item, $valor);

    echo json_encode($respuesta);//con json_encode convertimos a formato jason

  }



}//fin de la clase



//inicia los metodos

/*=============================================
METODO ACTIVAR CATEGORIA
=============================================*/

if(isset($_POST["activarStaff"])){

	$activarStaffd = new AjaxStaff();
	$activarStaffd -> activarStaff = $_POST["activarStaff"];
	$activarStaffd -> activarId = $_POST["activarId"];
	$activarStaffd -> ajaxActivarStaff();

}


/*=============================================
METODO EDITAR SUBCATEGORIA
=============================================*/
if(isset($_POST["idStaff"])){

  $editarStaffd = new AjaxStaff();
  $editarStaffd -> idStaff = $_POST["idStaff"];
  $editarStaffd -> ajaxEditarStaff();

}

