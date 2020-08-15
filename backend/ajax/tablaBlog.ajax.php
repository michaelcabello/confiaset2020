<?php

require_once "../controladores/blog.controlador.php";
require_once "../modelos/blog.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";

class TablaBlog{

	public function mostrarTablablog(){	
	 	
	 	$item = null;
	 	$valor = null;

	 	$rspta = ControladorBlog::ctrMostrarBlog($item, $valor);	

			//$rspta=$categoria->listar();
	 		//Vamos a declarar un array
	 		$data= Array();

	 		//while ($reg=$rspta->fetch_object()){
	 		//while($resul = $rspta->fetch()){ }


	 	for($i = 0; $i < count($rspta); $i++){	
	 			$data[]=array(
	 				"0"=>$rspta[$i]["id"],
	 				"1"=>$rspta[$i]["id_categoriablog"],
	 				"2"=>$rspta[$i]["id_subcategoriablog"],
	 				"3"=>$rspta[$i]["id_usuario"],
	 				"4"=>$rspta[$i]["ruta"],
	 				"5"=>$rspta[$i]["titulo"],
	 				"6"=>$rspta[$i]["titulo"],
	 				"7"=>$rspta[$i]["descripcioncorta"],
	 				"8"=>$rspta[$i]["keywords"],
	 				"9"=>$rspta[$i]["imagen"],
	 				"10"=>$rspta[$i]["fecha"],
	 				"11"=>"<div class='btn-group'>
	 				
	 				<button blogeditar class='btn btn-warning btnEditarBlog' onclick='mostrar()' idBlog='".$rspta[$i]["id"]."'><a href='blogeditar'><i class='fa fa-pencil'></i></a></button>
	 				<button class='btn btn-danger btnEliminarBlog' idBlog='".$rspta[$i]["id"]."' imgPortada='".$rspta[$i]["imagen"]."'  rutaCabecera='".$rspta[$i]["ruta"]."' imgOferta='".$rspta[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>"
	 				);
	 		}
	 		$results = array(
	 			"sEcho"=>1, //Información para el datatables
	 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
	 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	 			"aaData"=>$data);
	 		echo json_encode($results);

	}


}

/*=============================================
ACTIVAR TABLA DE CATEGORÍAS
=============================================*/ 
$activar = new TablaBlog();
$activar -> mostrarTablablog();