<?php

require_once "../controladores/staff.controlador.php";
require_once "../modelos/staff.modelo.php";


class TablaStaff{
  /*=============================================
  MOSTRAR LA TABLA DE SUBCATEGORÍAS
  =============================================*/ 

  public function mostrarTablaStaff(){
  	$item = null;
  	$valor = null;

  	$staffs = ControladorStaff::ctrMostrarStaff($item, $valor);

    //si esta vacio
    if(count($staffs) == 0){
    	
      $datosJson = '{ "data":[]}';	

    	echo $datosJson;
    	return;
    }
    //si tiene valores
    $datosJson = '{ 

    	"data": [ ';

   			for($i = 0; $i < count($staffs); $i++){

   			
	   			/*=============================================
	  			REVISAR ESTADO
	  			=============================================*/
	  			if( $staffs[$i]["estado"] == 0){

	  				$colorEstado = "btn-danger";
	  				$textoEstado = "Desactivado";
	  				$estadoStaff = 1;
	  			}else{

	  				$colorEstado = "btn-success";
	  				$textoEstado = "Activado";
	  				$estadoStaff = 0;
	  			}
			   	$estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idStaff='". $staffs[$i]["id"]."' estadoStaff='".$estadoStaff."'>".$textoEstado."</button>";


        /*=============================================
        REVISAR IMAGEN PORTADA
        =============================================*/

       //   $item2 = "ruta";
       //  $valor2 = $staffs[$i]["ruta"];

    //  $cabeceras = ControladorCabeceras::ctrMostrarCabeceras($item2, $valor2);

      

        /*=============================================
        REVISAR IMAGEN O FOTO DEL DOCTOR
        =============================================*/
        if($staffs[$i]["foto"] != ""){
          $foto = "<img src='".$staffs[$i]["foto"]."' class='img-thumbnail imgPortadaFoto' width='100px'>";
        }else{
          $foto = "<img src='vistas/img/servicios/staff/default/default.jpg' class='img-thumbnail imgPortadaFoto' width='100px'>";
        }

	  		/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarStaff' idStaff='".$staffs[$i]["id"]."' data-toggle='modal' data-target='#modalEditarStaff'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarStaff' idStaff='".$staffs[$i]["id"]."'><i class='fa fa-times'></i></button></div>";

        
        //no tenia trabajado $cabeceras["portada"], y el datatable me generaba error 10campos

  				$datosJson .=  '
				[
  				"'.($i+1).'",
  				"'.$staffs[$i]["nombres"].'",
  				"'.$staffs[$i]["titulo"].'",
  				"'.$estado.'",
  				"'.$staffs[$i]["cmp"].'",
          "'.$staffs[$i]["rne"].'",
  				"'.$staffs[$i]["celular"].'",
  				"'.$foto.'", 
  				"'.$staffs[$i]["orden"].'",
  				"'.$staffs[$i]["especialidades"].'",
  				"'.$acciones.'"
				],';

   			}//fin del for

   			$datosJson =  substr($datosJson, 0, -1);
   			$datosJson .= '

   		]
   	}';


 echo $datosJson; 



  }//fin del metodo mostrarTablaStaff
}//fin de la clase Tablastaffsd

/*=============================================
ACTIVAR TABLA DE STAFF
=============================================*/ 
$activarStaff = new TablaStaff();
$activarStaff -> mostrarTablaStaff();