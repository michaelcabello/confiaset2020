<?php

require_once "../controladores/subcategoriasd.controlador.php";
require_once "../modelos/subcategoriasd.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";

class TablaSubCategoriasd{
  /*=============================================
  MOSTRAR LA TABLA DE SUBCATEGORÍAS
  =============================================*/ 

  public function mostrarTablaSubCategoria(){
  	$item = null;
  	$valor = null;

  	$subcategorias = ControladorSubCategoriasd::ctrMostrarSubCategorias($item, $valor);

    //si esta vacio
    if(count($subcategorias) == 0){
    	
      $datosJson = '{ "data":[]}';	

    	echo $datosJson;
    	return;
    }
    //si tiene valores
    $datosJson = '{ 

    	"data": [ ';

   			for($i = 0; $i < count($subcategorias); $i++){

   				$item = "id";
   				$valor = $subcategorias[$i]["id_categoria"];

   				$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
   				if($categorias["categoria"] == ""){
   					$categoria = "SIN CATEGORÍA";
   				}else{
   					$categoria = $categorias["categoria"];
   				}

	   			/*=============================================
	  			REVISAR ESTADO
	  			=============================================*/
	  			if( $subcategorias[$i]["estado"] == 0){

	  				$colorEstado = "btn-danger";
	  				$textoEstado = "Desactivado";
	  				$estadoSubCategoria = 1;
	  			}else{

	  				$colorEstado = "btn-success";
	  				$textoEstado = "Activado";
	  				$estadoSubCategoria = 0;
	  			}
				$estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idSubCategoria='". $subcategorias[$i]["id"]."' estadoSubCategoria='".$estadoSubCategoria."'>".$textoEstado."</button>";


        /*=============================================
        REVISAR IMAGEN PORTADA
        =============================================*/

      $item2 = "ruta";
      $valor2 = $subcategorias[$i]["ruta"];

      $cabeceras = ControladorCabeceras::ctrMostrarCabeceras($item2, $valor2);

      /*  if($cabeceras["portada"] != ""){

          $imagenPortada = "<img src='".$cabeceras["portada"]."' class='img-thumbnail imgPortadaSubCategorias' width='100px'>";

        }else{

          $imagenPortada = "<img src='vistas/img/cabeceras/default/default.jpg' class='img-thumbnail imgPortadaSubCategorias' width='100px'>";
        }
      */


  			/*=============================================
  			REVISAR IMAGEN PORTADA
  			=============================================*/
  			if($subcategorias[$i]["imagenbaner"] != ""){
  				$imagenPortada = "<img src='".$subcategorias[$i]["imagenbaner"]."' class='img-thumbnail imgPortadaSubCategorias' width='100px'>";
  			}else{
  				$imagenPortada = "<img src='vistas/img/cabeceras/default/default.jpg' class='img-thumbnail imgPortadaSubCategorias' width='100px'>";
  			}

        /*=============================================
        REVISAR IMAGEN titulo 1
        =============================================*/
        if($subcategorias[$i]["imagen1"] != ""){
          $imagen1 = "<img src='".$subcategorias[$i]["imagen1"]."' class='img-thumbnail imgPortadaSubCategorias' width='100px'>";
        }else{
          $imagen1 = "<img src='vistas/img/servicios/titulo1/default/default.jpg' class='img-thumbnail imgPortadaSubCategorias' width='100px'>";
        }

	  		/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
        
  			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarSubCategoria' idSubCategoria='".$subcategorias[$i]["id"]."' data-toggle='modal' data-target='#modalEditarSubCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarSubCategoria' idSubCategoria='".$subcategorias[$i]["id"]."' rutaCabecera='".$subcategorias[$i]["ruta"]."' imgPortada='".$cabeceras["portada"]."'><i class='fa fa-times'></i></button></div>";
        
        //no tenia trabajado $cabeceras["portada"], y el datatable me generaba error

  				$datosJson .=  '
				[
  				"'.($i+1).'",
  				"'.$subcategorias[$i]["subcategoria"].'",
  				"'.$categoria.'",
  				"'.$subcategorias[$i]["ruta"].'",
  				"'.$estado.'",
  				"'.$cabeceras["palabrasClaves"].'",
  				"'.$imagenPortada.'",
  				"'.$subcategorias[$i]["titulo1"].'",
  				"'.$imagen1.'",
  				"'.$subcategorias[$i]["titulo2"].'",
  				"'.$subcategorias[$i]["titulo3"].'",
          "'.$subcategorias[$i]["titulo4"].'",
  				"'.$acciones.'"
				],';

   			}//fin del for

   			$datosJson =  substr($datosJson, 0, -1);
   			$datosJson .= '

   		]
   	}';


 echo $datosJson; 



  }//fin del metodo mostrarTablaSubCategoria
}//fin de la clase TablaSubCategoriasd

/*=============================================
ACTIVAR TABLA DE SUBCATEGORÍAS
=============================================*/ 
$activarSubcategoria = new TablaSubCategoriasd();
$activarSubcategoria -> mostrarTablaSubCategoria();