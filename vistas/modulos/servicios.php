<!--=====================================
BANNER
======================================-->

<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

$ruta = $rutas[0];

//echo $ruta;

?>


<?php
     $item = "ruta";//campo a buscar
     $valor = $ruta;

     $subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
if ($subcategorias)
{
    	//echo $subcategorias[0]["titulo1"];
    	//echo $subcategorias[0]["descripcion1"];
    
     /*foreach ($subcategorias as $key => $value) {
        if($value["estado"] != 0){
            if($i % 6 == 0){
                echo '<ul class="col-sm-3">';
            }
        $i++;
        echo '<li><a href="'.$url.$value["ruta"].'">'.$value["subcategoria"].'</a></li>';
            if($i % 6 == 0){
                echo '</ul>';
             }
     	}
     }*/

          if($subcategorias[0]["imagenbaner"] != "")
          {
            $imagenb = $servidor.$subcategorias[0]["imagenbaner"];
          }
          else{
             $imagenb = $servidor."vistas/img/cabeceras/default/default.jpg";
          }



echo '<div class="shadow"></div>

  <div class="clearfix" style="background-image: url('.$imagenb.'); bottom: 0; left: 0;
    right: 0; top: 0; z-index: 0; margin-bottom: 0; padding:90px 0; position: relative; text-align: left">

    <div class="container">
      <div class="col-lg-12">
          <h2 style="color: #FFFFFF; padding: 0px !important">'.$subcategorias[0]["subcategoria"].'</h2>
      </div>
    </div>
  </div>  




<div class="white-wrapper">
   	<div class="container">
        <div class="general_row">
        	  <div class="custom_tab_2 row">';

				if(($subcategorias[0]["titulo1"] != "") or ($subcategorias[0]["descripcion1"] != "" ))
				{
        	    echo '<div class="col-md-12">
	        	      <div class="tab-content">
	        	        
			        	    <div class="tab-pane active contenido1" id="tabbed_3">';
                    if($subcategorias[0]["imagen1"] != "")
                     {
                        $imagen = $servidor.$subcategorias[0]["imagen1"];
                     }
                    else{
                        $imagen = $servidor."vistas/img/servicios/titulo1/default/default.jpg";
                    }


								 echo '<img src="'.$imagen.'" alt="'.$subcategorias[0]["titulo1"].'" width="380" class="img-responsive img-responsive-2 alignright derecha">
									
								  <h5 class="tituloazul" style="width: 100%">'.$subcategorias[0]["titulo1"].'</h5>

			        	          <p>'.$subcategorias[0]["descripcion1"].'</p>		  
			                      
								  <div class="big-title clearfix"></div>
		       	            </div>

      	               </div>
      	        </div>';
      	        }

      			if(($subcategorias[0]["titulo2"] != "") or ($subcategorias[0]["descripcion2"] != "" ))
				{

        	    echo '<div class="col-md-12">
        	     	 <div class="tab-content">
        	      		  <div class="tab-pane active contenido1" id="tabbed_4">';

								  if($subcategorias[0]["imagen2"] != "")
                     {
                        $imagen2 = $servidor.$subcategorias[0]["imagen2"];
                     }
                    else{
                        $imagen2 = $servidor."vistas/img/servicios/titulo2/default/default.jpg";
                    }



                  echo '<img src="'.$imagen2.'" alt="'.$subcategorias[0]["titulo2"].'" width="380" class="img-responsive img-responsive-2 alignleft">

        	         			 <h5 class="titulos" style="padding: 20px 0px 0px 25px; margin-top: 0px; width: 100%">'.$subcategorias[0]["titulo2"].'</h5>

        	       				  <p>'.$subcategorias[0]["descripcion2"].'</p>
        	       
        	          			<div class="big-title clearfix"></div>
        	        
      	           		  </div>
      	         	 </div>
      	        </div>';
      	        }

      	        if(($subcategorias[0]["titulo3"] != "") or ($subcategorias[0]["descripcion3"] != "" ))
				{
        	    echo '<div class="col-md-12">
	        	      <div class="tab-content">
	        	        
			        	    <div class="tab-pane active contenido1" id="tabbed_3">';
                     if($subcategorias[0]["imagen3"] != "")
                     {
                        $imagen3 = $servidor.$subcategorias[0]["imagen3"];
                     }
                    else{
                        $imagen3 = $servidor."vistas/img/servicios/titulo3/default/default.jpg";
                    }
								  echo '<img src="'.$imagen3.'" alt="'.$subcategorias[0]["titulo3"].'" width="380" class="img-responsive img-responsive-2 alignright derecha">
									
								  <h5 class="tituloazul" style="width: 100%">'.$subcategorias[0]["titulo3"].'</h5>

			        	          <p>'.$subcategorias[0]["descripcion3"].'</p>		  
			                      
								  <div class="big-title clearfix"></div>
		       	            </div>

      	               </div>
      	        </div>';
      	        }

      			if(($subcategorias[0]["titulo4"] != "") or ($subcategorias[0]["descripcion4"] != "" ))
				{

        	    echo '<div class="col-md-12">
        	     	 <div class="tab-content">
        	      		  <div class="tab-pane active contenido1" id="tabbed_4"> ';
                     if($subcategorias[0]["imagen4"] != "")
                     {
                        $imagen4 = $servidor.$subcategorias[0]["imagen4"];
                     }
                    else{
                        $imagen4 = $servidor."vistas/img/servicios/titulo4/default/default.jpg";
                    }


						echo'<img src="'.$imagen4.'" alt="'.$subcategorias[0]["titulo3"].'" width="380" class="img-responsive img-responsive-2 alignleft">

        	         			 <h5 class="titulos" style="padding: 20px 0px 0px 25px; margin-top: 0px; width: 100%">'.$subcategorias[0]["titulo4"].'</h5>

        	       				  <p>'.$subcategorias[0]["descripcion4"].'</p>
        	       
        	          			<div class="big-title clearfix"></div>
        	        
      	           		  </div>
      	         	 </div>
      	        </div>';
      	        }


        	   
        	 
        	 echo'</div>
        </div>
    </div>
</div>';

}	

?>