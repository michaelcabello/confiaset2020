
<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

$ruta = $rutas[0];

//echo $ruta;
$item = null;//campo a buscar
$valor = null;
$staff = ControladorStaffs::ctrMostrarStaff($item, $valor);
$numstaf = count($staff);

//echo $numstaf;
//echo "hola";

if ($numstaf %2 == 0){
  $filai = $numstaf / 2;
  $filad = $numstaf / 2;
}else{
  $filai = intdiv($numstaf, 2) +1 ;
  //$filai = $numstaf / 2;
  $filad = $numstaf - $filai ;
}

//echo  $filai;
//echo  $filad;

?>



  <div class="shadow"></div>

  <div class="clearfix" style="background-image: url(vistas/imgconfia/oftalmoconfia-tratamientodelosojos-baner.jpg); bottom: 0; left: 0;
    right: 0; top: 0; z-index: 0; margin-bottom: 0; padding:90px 0; position: relative; text-align: left">

    <div class="container">
      <div class="col-lg-12">
          <h2 style="color: #FFFFFF; padding: 0px !important">Staff Medico</h2>
      </div>
    </div>
  </div><!-- end post-wrapper-top -->     
	
<!-- fin del baner chiquito -->

	<div class="white-wrapper">
    	<div class="container">
        	<div class="general_row">
            
                <div class="general-title text-center">
                	<h3>STAFF MEDICO</h3>

                    <p class="lead">Los mejores especialistas en Oftalmología</p>
                </div>
                
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					   <div class="team_widget doctor-details">
                    	<ul>
                      
                      <?php

                        for($i = 0; $i < $filai ; $i++){

                          echo '<li>
                                  	 <a href="'.$url.$staff[$i]["ruta"].'"><img src="'.$servidor.$staff[$i]["fotop"].'" class="img-responsive img-circle alignleft" width="100px" alt=""> 
                                    	<h3><span>'.$staff[$i]["nombres"].'</span></h3>
                                      <h4>'.$staff[$i]["titulo"].'</h4>
                                      <p><span>Especialidades :</span> '.$staff[$i]["especialidades"].'</p>
                                      <p><span>C.M.P :</span> '.$staff[$i]["cmp"].'</p>
                                        </a>
                                </li>';
                        }
                      ?>
                                            
                    	</ul>
             </div><!-- end team_widget -->   
          </div><!-- end col -->

          <?php 
          if ($filad != 0)
          {

          ?>

          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					   <div class="team_widget">
                    	<ul>
                      <?php

                        for($i = $filai; $i < $numstaf ; $i++){
                    	  
                   echo 	  '<li> <a href="'.$url.$staff[$i]["ruta"].'">
                                  <img src="'.$servidor.$staff[$i]["fotop"].'" class="img-responsive img-circle alignleft" width="100px" alt=""> 
                                      <h3><span>'.$staff[$i]["nombres"].'</span></h3>
                                      <h4>'.$staff[$i]["titulo"].'</h4>
                                      <p><span>Especialidades :</span> '.$staff[$i]["especialidades"].'</p>
                                      <p><span>C.M.P :</span> '.$staff[$i]["cmp"].'</p>
                                        </a>
                              </li>';   
                         }   
                            
                        ?>
                            
                                           
                   	  </ul>
                </div><!-- end team_widget -->   
            </div><!-- end col -->
          <?php 
          
          }

          ?>
                
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end white-wrapper --><!-- end white-wrapper -->
    
   
  