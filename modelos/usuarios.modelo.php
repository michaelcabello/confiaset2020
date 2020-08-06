<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	CREAR CABECERAS
	=============================================*/

	static public function mdlIngresarUsuarios($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nomape, correo, celular, mensaje, estado) VALUES (:nomape, :correo, :celular, :mensaje, :estado)");

		$stmt->bindParam(":nomape", $datos["nomape"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":mensaje", $datos["mensaje"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;


	}


}//fin de la clase