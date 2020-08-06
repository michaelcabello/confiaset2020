<?php

require_once "../controladores/seo.controlador.php";
require_once "../modelos/seo.modelo.php";


class TablaSeo{

  /*=============================================
  MOSTRAR LA TABLA DE CATEGORÍAS
  =============================================*/ 

 	public function mostrarTablaseo(){	

 	$item = null;
 	$valor = null;

 	$seo = ControladorSeo::ctrMostrarSeo($item, $valor);


 	if(count($seo) == 0){

      $datosJson = '{ "data":[]}';

      echo $datosJson;

      return;

    }

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($seo); $i++){
		
			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
	    
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarSeo' idSeo='".$seo[$i]["id"]."' data-toggle='modal' data-target='#modalEditarSeo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarSeo' idSeo='".$seo[$i]["id"]."'><i class='fa fa-times'></i></button></div>";
				    
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$seo[$i]["ruta"].'",
				      "'.$seo[$i]["titulo"].'",
				      "'.$seo[$i]["descripcion"].'",
				      "'.$seo[$i]["palabrasClaves"].'",
				      "'.$seo[$i]["fecha"].'",
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
$activar = new TablaSeo();
$activar -> mostrarTablaseo();