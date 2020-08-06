<?php

require_once "../controladores/categoriasblog.controlador.php";
require_once "../modelos/categoriasblog.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";

class TablaCategoriasblog{

  /*=============================================
  MOSTRAR LA TABLA DE CATEGORÍAS
  =============================================*/ 

 	public function mostrarTablablog(){	

 	$item = null;
 	$valor = null;

 	$categoriasblog = ControladorCategoriasblog::ctrMostrarCategoriasblog($item, $valor);	

 	if(count($categoriasblog) == 0){

      $datosJson = '{ "data":[]}';

      echo $datosJson;

      return;

    }

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($categoriasblog); $i++){
	
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 

			if( $categoriasblog[$i]["estado"] == 0){
				
				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoCategoria = 1;

			}else{

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoCategoria = 0;

			}

		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoCategoriablog='".$estadoCategoria."' idCategoriablog='".$categoriasblog[$i]["id"]."'>".$textoEstado."</button>";

		 	/*=============================================
			REVISAR IMAGEN PORTADA
			=============================================*/ 

			$item = "ruta";
			$valor = $categoriasblog[$i]["ruta"];

			$cabeceras = ControladorCabeceras::ctrMostrarCabeceras($item, $valor);

			if($cabeceras["portada"] != ""){

				 $imgPortada = "<img class='img-thumbnail imgPortadaCategoriasblog' src='".$cabeceras["portada"]."' width='100px'>";

			}else{

				$imgPortada = "<img class='img-thumbnail imgPortadaCategoriasblog' src='vistas/img/cabeceras/default/default.jpg' width='100px'>";
			}





			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
	    
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoriablog='".$categoriasblog[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCategoriablog'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoriablog' idCategoriablog='".$categoriasblog[$i]["id"]."' imgPortada='".$cabeceras["portada"]."'  rutaCabecera='".$categoriasblog[$i]["ruta"]."'><i class='fa fa-times'></i></button></div>";
				    
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$categoriasblog[$i]["categoria"].'",
				      "'.$categoriasblog[$i]["ruta"].'",
				      "'. $estado.'",
				      "'.$cabeceras["descripcion"].'",
				      "'.$cabeceras["palabrasClaves"].'",
				      "'.$imgPortada.'",
				      "'.$acciones.'"		    
				    ],';

	}

	$datosJson = substr($datosJson, 0, -1);

	$datosJson.=  ']
		  
	}'; 

	echo $datosJson;


 	}


}

/*=============================================
ACTIVAR TABLA DE CATEGORÍAS
=============================================*/ 
$activar = new TablaCategoriasblog();
$activar -> mostrarTablablog();