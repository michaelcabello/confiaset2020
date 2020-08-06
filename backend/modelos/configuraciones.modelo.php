<?php

require_once "conexion.php";

class ModeloConfiguraciones{

	/*=============================================
	SELECCIONAR PLANTILLA
	=============================================*/

	static public function mdlSeleccionarConfiguraciones($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR SCRIPT
	=============================================*/

	static public function mdlActualizarScript($tabla, $id, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET googleanalitics = :googleanalitics, bienvenida = :bienvenida WHERE id = :id");

		$stmt->bindParam(":googleanalitics", $datos["googleanalitics"], PDO::PARAM_STR);
		$stmt->bindParam(":bienvenida", $datos["bienvenida"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ACTUALIZAR LOGO O ICONO
	=============================================*/

	static public function mdlActualizarLogoIcono($tabla, $id, $item, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ACTUALIZAR TELEFONO
	=============================================*/

	static public function mdlActualizarTelefono($tabla, $id, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET telefono1 = :telefono1, telefono2 = :telefono2, celular1 = :celular1, celular2 = :celular2 WHERE id = :id");

		$stmt->bindParam(":telefono1", $datos["telefono1"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono2", $datos["telefono2"], PDO::PARAM_STR);
		$stmt->bindParam(":celular1", $datos["celular1"], PDO::PARAM_STR);
		$stmt->bindParam(":celular2", $datos["celular2"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ACTUALIZAR CORREO Y REDES
	=============================================*/

	static public function mdlActualizarCorreoRedes($tabla, $id, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET email1 = :email1, email2 = :email2, facebook = :facebook, youtube = :youtube, twitter = :twitter, instagram = :instagram WHERE id = :id");

		$stmt->bindParam(":email1", $datos["email1"], PDO::PARAM_STR);
		$stmt->bindParam(":email2", $datos["email2"], PDO::PARAM_STR);
		$stmt->bindParam(":facebook", $datos["facebook"], PDO::PARAM_STR);
		$stmt->bindParam(":youtube", $datos["youtube"], PDO::PARAM_STR);
		$stmt->bindParam(":twitter", $datos["twitter"], PDO::PARAM_STR);
		$stmt->bindParam(":instagram", $datos["instagram"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ACTUALIZAR SLOGAN Y DIRECCION
	=============================================*/
	static public function mdlActualizarSloganDireccion($tabla, $id, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET slogan = :slogan, direccion1 = :direccion1, direccion2 = :direccion2 WHERE id = :id");

		$stmt->bindParam(":slogan", $datos["slogan"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion1", $datos["direccion1"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion2", $datos["direccion2"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR NUMEROS
	=============================================*/
	static public function mdlActualizarNumero($tabla, $id, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numero1 = :numero1, numero2 = :numero2, numero3 = :numero3, numero4 = :numero4 WHERE id = :id");

		$stmt->bindParam(":numero1", $datos["numero1"], PDO::PARAM_STR);
		$stmt->bindParam(":numero2", $datos["numero2"], PDO::PARAM_STR);
		$stmt->bindParam(":numero3", $datos["numero3"], PDO::PARAM_STR);
		$stmt->bindParam(":numero4", $datos["numero4"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	
}//fin de la clase