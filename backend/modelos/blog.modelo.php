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

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoriablog, id_subcategoriablog, num_visitas, estrellas, fecha, title, description, keywords, descripcioncorta, titulo, ruta, estado, descripcionlarga, imagen, video) VALUES (:id_categoriablog, :id_subcategoriablog, :num_visitas, :estrellas, :fecha, :title, :description, :keywords, :descripcioncorta, :titulo, :ruta, :estado, :descripcionlarga, :imagen, :video)");

		$stmt->bindParam(":id_categoriablog", $datos["id_categoriablog"], PDO::PARAM_STR);
		$stmt->bindParam(":id_subcategoriablog", $datos["id_subcategoriablog"], PDO::PARAM_STR);
		$stmt->bindParam(":num_visitas", $datos["num_visitas"], PDO::PARAM_STR);
		$stmt->bindParam(":estrellas", $datos["estrellas"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":title", $datos["title"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $datos["description"], PDO::PARAM_STR);
		$stmt->bindParam(":keywords", $datos["keywords"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcioncorta", $datos["descripcioncorta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionlarga", $datos["descripcionlarga"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":video", $datos["video"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	static public function mdlEditarBlog($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, ruta = :ruta WHERE id = :id");

		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}








}/*fin de la clase*/