<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";

class TablaCategorias{

  /*=============================================
  MOSTRAR LA TABLA DE CATEGORÍAS
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item = null;
 	$valor = null;

 	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);	

 	if(count($categorias) == 0){

      $datosJson = '{ "data":[]}';

      echo $datosJson;

      return;

    }

 //	$datosJson = '{
		 
 //		  "data": [ ';
    $data= Array();

	for($i = 0; $i < count($categorias); $i++){
	
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 

			if( $categorias[$i]["estado"] == 0){
				
				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoCategoria = 1;

			}else{

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoCategoria = 0;

			}

		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoCategoria='".$estadoCategoria."' idCategoria='".$categorias[$i]["id"]."'>".$textoEstado."</button>";

		 	/*$estado = '<button class="btn '.$colorEstado.' btn-xs btnActivar" estadoCategoria="'.$estadoCategoria.'" idCategoria="'.$categorias[$i]['id'].'">'.$textoEstado.'</button>';*/


		 	/*=============================================
			REVISAR IMAGEN PORTADA
			=============================================*/ 

			$item = "ruta";
			$valor = $categorias[$i]["ruta"];

			$cabeceras = ControladorCabeceras::ctrMostrarCabeceras($item, $valor);

			if($cabeceras["portada"] != ""){

				 $imgPortada = "<img class='img-thumbnail imgPortadaCategorias' src='".$cabeceras["portada"]."' width='100px'>";

			}else{

				$imgPortada = "<img class='img-thumbnail imgPortadaCategorias' src='vistas/img/cabeceras/default/default.jpg' width='100px'>";
			}

			/*=============================================
			REVISAR OFERTAS
			=============================================*/

			if($categorias[$i]["oferta"] != 0){

				if($categorias[$i]["precioOferta"] != 0){

					$tipoOferta = "PRECIO";
					$valorOferta = "$ ".number_format($categorias[$i]["precioOferta"],2);

				}else{

					$tipoOferta = "DESCUENTO";
					$valorOferta = $categorias[$i]["descuentoOferta"]." %";

				}


			}else{

				$tipoOferta = "No tiene oferta";
				$valorOferta = 0;

			}

			if($categorias[$i]["imgOferta"] != ""){

				 $imgOfertas = "<img class='img-thumbnail imgOfertaCategorias' src='".$categorias[$i]["imgOferta"]."' width='100px'>";

			}else{

				$imgOfertas = "<img class='img-thumbnail imgOfertaCategorias' src='vistas/img/ofertas/default/default.jpg' width='100px'>";

			}

			/*=============================================
  			CREAR LvAS ACCIONES
  			=============================================*/
	    
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='".$categorias[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='".$categorias[$i]["id"]."' imgPortada='".$cabeceras["portada"]."'  rutaCabecera='".$categorias[$i]["ruta"]."' imgOferta='".$categorias[$i]["imgOferta"]."'><i class='fa fa-times'></i></button></div>";
				    
			$data[]=array(
				"0"=>'hola',
				"1"=>$categorias[$i]["categoria"],
				"2"=>$categorias[$i]["ruta"],
				"3"=>$estado,
				"4"=>$categorias[$i]["categoria"],
				"5"=>$categorias[$i]["fecha"],
				"6"=>$imgPortada,
				"7"=>$tipoOferta,
				"8"=>$valorOferta,
				"9"=>$imgOfertas,
				"10"=>$categorias[$i]["finOferta"],
				"11"=>$acciones
			);



	}//fin del for

	
	$results = array(
	 			"sEcho"=>1, //Información para el datatables
	 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
	 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	 			"aaData"=>$data);
	 		echo json_encode($results);

 	}//fin del metodo


}//fin de la clase

/*=============================================
ACTIVAR TABLA DE CATEGORÍAS
=============================================*/ 
$activar = new TablaCategorias();
$activar -> mostrarTabla();