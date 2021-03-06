<?php

require_once "conexion.php";

class ModeloSubCategoriasd{


	/*=============================================
	MOSTRAR SUBCATEGORIASd
	=============================================*/

	static public function mdlMostrarSubCategorias($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY orden ASC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY orden ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CREAR SUBCATEGORIA
	=============================================*/
/*
id_categoria
subcategoria
imagenbaner
ruta
estado
titulo1
subtitulo1
descripcion1
imagen1
titulo2
subtitulo2
descripcion2
imagen2
titulo3
subtitulo3
descripcion3
imagen3
titulo4
subtitulo4
descripcion4
imagen4
*/


		/*$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(subcategoria, id_categoria, ruta, estado, oferta, precioOferta, descuentoOferta, imgOferta, finOferta) VALUES (:subcategoria, :id_categoria, :ruta, :estado, :oferta, :precioOferta, :descuentoOferta, :imgOferta, :finOferta)");*/

	static public function mdlIngresarSubCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, subcategoria, imagenbaner, ruta, orden, estado, titulo1, descripcion1, imagen1, titulo2, descripcion2, imagen2, titulo3, descripcion3, imagen3, titulo4, descripcion4, imagen4) VALUES (:id_categoria, :subcategoria, :imagenbaner, :ruta, :orden, :estado, :titulo1, :descripcion1, :imagen1, :titulo2, :descripcion2, :imagen2, :titulo3, :descripcion3, :imagen3, :titulo4, :descripcion4, :imagen4)");



		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":subcategoria", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":imagenbaner", $datos["imgPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":orden", $datos["orden"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo1", $datos["titulo1"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion1", $datos["descripcion"], PDO::PARAM_STR);	
		$stmt->bindParam(":imagen1", $datos["imagen1"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo2", $datos["titulo2"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion2", $datos["descripcion2"], PDO::PARAM_STR);	
		$stmt->bindParam(":imagen2", $datos["imagen2"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo3", $datos["titulo3"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion3", $datos["descripcion3"], PDO::PARAM_STR);	
		$stmt->bindParam(":imagen3", $datos["imagen3"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo4", $datos["titulo4"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion4", $datos["descripcion4"], PDO::PARAM_STR);	
		$stmt->bindParam(":imagen4", $datos["imagen4"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


/*=============================================
	ACTUALIZAR SUBCATEGORIAS
	=============================================*/

	static public function mdlActualizarSubCategorias($tabla, $item1, $valor1, $item2, $valor2){

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
	EDITAR SUBCATEGORIA
	=============================================*/

	static public function mdlEditarSubCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET subcategoria = :subcategoria, id_categoria = :id_categoria, imagenbaner = :imagenbaner, ruta = :ruta, orden = :orden, estado = :estado, titulo1 = :titulo1, descripcion1 = :descripcion1, imagen1 = :imagen1, titulo2 = :titulo2, descripcion2 = :descripcion2, imagen2 = :imagen2, titulo3 = :titulo3, descripcion3 = :descripcion3, imagen3 = :imagen3, titulo4 = :titulo4, descripcion4 = :descripcion4, imagen4 = :imagen4 WHERE id = :id");


		$stmt->bindParam(":subcategoria", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":imagenbaner", $datos["imgPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":orden", $datos["orden"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo1", $datos["titulo1"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion1", $datos["descripcion1"], PDO::PARAM_STR);	
		$stmt->bindParam(":imagen1", $datos["imagen1"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo2", $datos["titulo2"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion2", $datos["descripcion2"], PDO::PARAM_STR);	
		$stmt->bindParam(":imagen2", $datos["imagen2"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo3", $datos["titulo3"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion3", $datos["descripcion3"], PDO::PARAM_STR);	
		$stmt->bindParam(":imagen3", $datos["imagen3"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo4", $datos["titulo4"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion4", $datos["descripcion4"], PDO::PARAM_STR);	
		$stmt->bindParam(":imagen4", $datos["imagen4"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}




	



}//fin de la clase