<?php

require_once "../controladores/contactos.controlador.php";
require_once "../modelos/contactos.modelo.php";


class TablaContactos{

  /*=============================================
  MOSTRAR LA TABLA DE CATEGORÍAS
  =============================================*/ 

 	public function mostrarTablacontacto(){	

 	$item = null;
 	$valor = null;

 	$contactos = ControladorContactos::ctrMostrarContactos($item, $valor);	

 	if(count($contactos) == 0){

      $datosJson = '{ "data":[]}';

      echo $datosJson;

      return;

    }

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($contactos); $i++){
	
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 

			if( $contactos[$i]["estado"] == 0){
				
				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoContacto = 1;

			}else{

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoContacto = 0;

			}

		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoContacto='".$estadoContacto."' idContacto='".$contactos[$i]["id"]."'>".$textoEstado."</button>";
		

			
			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
	    
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarContacto' idContacto='".$contactos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarContacto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarContacto' idContacto='".$contactos[$i]["id"]."'><i class='fa fa-times'></i></button></div>";
				    
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$contactos[$i]["empresa"].'",
				      "'.$contactos[$i]["nomape"].'",
				      "'. $estado.'",
				      "'.$contactos[$i]["correo"].'",
				      "'.$contactos[$i]["celular"].'",
				      "'.$contactos[$i]["mensaje"].'",
				      "'.$contactos[$i]["fecha"].'",
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
$activar = new TablaContactos();
$activar -> mostrarTablacontacto();