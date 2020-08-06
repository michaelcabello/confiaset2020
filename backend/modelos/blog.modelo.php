<?php

require_once "conexion.php";

class ModeloBlog{


	
	/*=============================================
	MOSTRAR POST DEL BLOG
	=============================================*/

	static public function mdlMostrarBlog($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;


	}

	/*=============================================
	CREAR BLOG
	=============================================*/

	static public function mdlIngresarBlog($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo, estado, descripcionlarga) VALUES (:titulo, :estado, :descripcionlarga)");

		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionlarga", $datos["descripcionlarga"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}





}/*fin de la clase*/