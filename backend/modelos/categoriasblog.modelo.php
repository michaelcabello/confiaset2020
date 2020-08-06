<?php

require_once "conexion.php";

class ModeloCategoriasblog{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarCategoriasblog($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	ACTIVAR CATEGORIA
	=============================================*/

	static public function mdlActualizarCategoriablog($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarCategoriablog($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria, ruta, descripcion, estado, imagen) VALUES (:categoria, :ruta, :descripcion, :estado, :imagen)");

		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);	
		$stmt->bindParam(":imagen", $datos["imgPortada"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria, ruta = :ruta, estado = :estado, oferta = :oferta, precioOferta = :precioOferta, descuentoOferta = :descuentoOferta, imgOferta = :imgOferta, finOferta = :finOferta WHERE id = :id");

		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":oferta", $datos["oferta"], PDO::PARAM_STR);
		$stmt->bindParam(":precioOferta", $datos["precioOferta"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoOferta", $datos["descuentoOferta"], PDO::PARAM_STR);
		$stmt->bindParam(":imgOferta", $datos["imgOferta"], PDO::PARAM_STR);
		$stmt->bindParam(":finOferta", $datos["finOferta"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR CATEGORIA
	=============================================*/

	static public function mdlEliminarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}



}