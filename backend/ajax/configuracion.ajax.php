<?php

require_once "../controladores/configuraciones.controlador.php";
require_once "../modelos/configuraciones.modelo.php";

class AjaxConfiguracion{

	public $googleanalitics;
	public $bienvenida;

	public function ajaxCambiarScript(){

		$datos = array("googleanalitics"=>$this->googleanalitics,
					   "bienvenida"=>$this->bienvenida);

		$respuesta = ControladorConfiguraciones::ctrActualizarScript($datos);

		echo $respuesta;

	}


	/*=============================================
	CAMBIAR LOGOTIPO
	=============================================*/	

	public $imagenLogo;

	public function ajaxCambiarLogotipo(){

		$item = "logo";
		$valor = $this->imagenLogo;

		$respuesta = ControladorConfiguraciones::ctrActualizarLogoIcono($item, $valor);

		echo $respuesta;


	}


		/*=============================================
	CAMBIAR ICONO
	=============================================*/

	public $imagenIcono;	

	public function ajaxCambiarIcono(){

		$item = "icono";
		$valor = $this->imagenIcono;

		$respuesta = ControladorConfiguraciones::ctrActualizarLogoIcono($item, $valor);

		echo $respuesta;

	}


	/*=============================================
	CAMBIAR TELEFONO
	=============================================*/
	public $telefono1;
	public $telefono2;
	public $celular1;
	public $celular2;

	public function ajaxCambiarTelefono(){

		$datos = array("telefono1"=>$this->telefono1,
					   "telefono2"=>$this->telefono2,
					   "celular1"=>$this->celular1,
					   "celular2"=>$this->celular2);

		$respuesta = ControladorConfiguraciones::ctrActualizarTelefono($datos);

		echo $respuesta;

	}



	/*=============================================
	CAMBIAR CORREO Y REDES SOCIALES
	=============================================*/
	public $email1;
	public $email2;
	public $facebook;
	public $youtube;
	public $twitter;
	public $instagram;


	public function ajaxCambiarCorreoyRedes(){

		$datos = array("email1"=>$this->email1,
					   "email2"=>$this->email2,
					   "facebook"=>$this->facebook,
					   "youtube"=>$this->youtube,
					   "twitter"=>$this->twitter,
					   "instagram"=>$this->instagram);

		$respuesta = ControladorConfiguraciones::ctrActualizarCorreoRedes($datos);

		echo $respuesta;

	}

	/*=============================================
	CAMBIAR SLOGAN Y DIRECCION
	=============================================*/
	public $slogan;
	public $direccion1;
	public $direccion2;

	public function ajaxCambiarSloganDireccion(){

		$datos = array("slogan"=>$this->slogan,
					   "direccion1"=>$this->direccion1,
					   "direccion2"=>$this->direccion2);

		$respuesta = ControladorConfiguraciones::ctrActualizarSloganDireccion($datos);

		echo $respuesta;

	}


	/*=============================================
	CAMBIAR NUMEROS
	=============================================*/
	public $numero1;
	public $numero2;
	public $numero3;
	public $numero4;

	public function ajaxCambiarNumero(){

		$datos = array("numero1"=>$this->numero1,
					   "numero2"=>$this->numero2,
					   "numero3"=>$this->numero3,
					   "numero4"=>$this->numero4);

		$respuesta = ControladorConfiguraciones::ctrActualizarNumero($datos);

		echo $respuesta;

	}



}//fin de la clase




/*=============================================
CAMBIAR SCRIPT
=============================================*/	

if(isset($_POST["googleanalitics"])){

	$script = new AjaxConfiguracion();
	$script -> googleanalitics = $_POST["googleanalitics"];
	$script -> bienvenida = $_POST["bienvenida"];
	$script -> ajaxCambiarScript();

}

/*=============================================
CAMBIAR LOGOTIPO
=============================================*/	
if(isset($_FILES["imagenLogo"])){

	$logotipo = new AjaxConfiguracion();
	$logotipo -> imagenLogo = $_FILES["imagenLogo"];
	$logotipo -> ajaxCambiarLogotipo();

}

/*=============================================
CAMBIAR ICONO
=============================================*/	
if(isset($_FILES["imagenIcono"])){

	$icono = new AjaxConfiguracion();
	$icono -> imagenIcono = $_FILES["imagenIcono"];
	$icono -> ajaxCambiarIcono();

}

/*=============================================
CAMBIAR TELEFONOS
=============================================*/	

if(isset($_POST["telefono1"])){

	$script = new AjaxConfiguracion();
	$script -> telefono1 = $_POST["telefono1"];
	$script -> telefono2 = $_POST["telefono2"];
	$script -> celular1 = $_POST["celular1"];
	$script -> celular2 = $_POST["celular2"];

	$script -> ajaxCambiarTelefono();

}


/*=============================================
CAMBIAR CORREO Y REDES SOCIALES
=============================================*/	

if(isset($_POST["email1"])){

	$correoyredes = new AjaxConfiguracion();
	$correoyredes -> email1 = $_POST["email1"];
	$correoyredes -> email2 = $_POST["email2"];
	$correoyredes -> facebook = $_POST["facebook"];
	$correoyredes -> youtube = $_POST["youtube"];
	$correoyredes -> twitter = $_POST["twitter"];
	$correoyredes -> instagram = $_POST["instagram"];

	$correoyredes -> ajaxCambiarCorreoyRedes();

}


/*=============================================
CAMBIAR SLOGAN DIRECCION
=============================================*/	

if(isset($_POST["slogan"])){

	$sloganydireccion = new AjaxConfiguracion();
	$sloganydireccion -> slogan = $_POST["slogan"];
	$sloganydireccion -> direccion1 = $_POST["direccion1"];
	$sloganydireccion -> direccion2 = $_POST["direccion2"];

	$sloganydireccion -> ajaxCambiarSloganDireccion();

}

/*=============================================
CAMBIAR NUMERO
=============================================*/	

if(isset($_POST["numero1"])){

	$numeros = new AjaxConfiguracion();
	$numeros -> numero1 = $_POST["numero1"];
	$numeros -> numero2 = $_POST["numero2"];
	$numeros -> numero3 = $_POST["numero3"];
	$numeros -> numero4 = $_POST["numero4"];


	$numeros -> ajaxCambiarNumero();

}