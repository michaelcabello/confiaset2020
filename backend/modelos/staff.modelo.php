<?php

require_once "conexion.php";

class ModeloStaff{

	/*=============================================
	MOSTRAR SATAFF
	=============================================*/

	static public function mdlMostrarStaff($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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
	ACTIVAR STAF
	=============================================*/

	static public function mdlActualizarStaff($tabla, $item1, $valor1, $item2, $valor2){

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

/*id, nombres, ruta, titulo, descripcion, cmp, rne, especialidades, correo, celular, foto, facebook, google, instagram, twitter, orden, estado */


    static public function mdlIngresarStaff($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombres, ruta, titulo, descripcion, cmp, rne, especialidades, correo, celular, foto, fotop, facebook, google, instagram, twitter, orden, estado) VALUES (:nombres, :ruta, :titulo, :descripcion, :cmp, :rne, :especialidades, :correo, :celular, :foto, :fotop, :facebook, :google, :instagram, :twitter, :orden, :estado)");


		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":cmp", $datos["cmp"], PDO::PARAM_STR);
		$stmt->bindParam(":rne", $datos["rne"], PDO::PARAM_STR);
		$stmt->bindParam(":especialidades", $datos["especialidades"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":fotop", $datos["fotop"], PDO::PARAM_STR);
		$stmt->bindParam(":facebook", $datos["facebook"], PDO::PARAM_STR);
		$stmt->bindParam(":google", $datos["google"], PDO::PARAM_STR);
		$stmt->bindParam(":instagram", $datos["instagram"], PDO::PARAM_STR);
		$stmt->bindParam(":twitter", $datos["twitter"], PDO::PARAM_STR);
		$stmt->bindParam(":orden", $datos["orden"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }

	/****************************/
	/*=============================================
	EDITAR STAFF
	=============================================*/
	/*id, nombres, ruta, titulo, descripcion, cmp, rne, especialidades, correo, celular, foto, facebook, google, instagram, twitter, orden, estado */

	static public function mdlEditarStaff($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres = :nombres, ruta = :ruta, titulo = :titulo, descripcion = :descripcion, cmp = :cmp, rne = :rne, especialidades = :especialidades, correo = :correo, celular = :celular, foto = :foto, fotop = :fotop, facebook = :facebook, google = :google, instagram = :instagram, twitter = :twitter, orden = :orden, estado = :estado WHERE id = :id");

		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":cmp", $datos["cmp"], PDO::PARAM_STR);
		$stmt->bindParam(":rne", $datos["rne"], PDO::PARAM_STR);
		$stmt->bindParam(":especialidades", $datos["especialidades"], PDO::PARAM_STR);	
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":fotop", $datos["fotop"], PDO::PARAM_STR);
		$stmt->bindParam(":facebook", $datos["facebook"], PDO::PARAM_STR);
		$stmt->bindParam(":google", $datos["google"], PDO::PARAM_STR);
		$stmt->bindParam(":instagram", $datos["instagram"], PDO::PARAM_STR);
		$stmt->bindParam(":twitter", $datos["twitter"], PDO::PARAM_STR);
		$stmt->bindParam(":orden", $datos["orden"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);





		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }






}//fin de la clase
