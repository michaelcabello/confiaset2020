<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

$item =  "ruta";
$valor = $rutas[0];
$infodoctor = ControladorStaffs::ctrMostrarInfoStaff($item, $valor);
//var_dump($infodoctor);
//echo implode(" ",$infodoctor);
//echo $infodoctor;

?>

    <div class="white-wrapper">
        <div class="container">
            <div class="general_row">

        <?php   
          echo '<div class="general-title text-center">
                <h3>'.$infodoctor["nombres"].'</h3>
                <p class="lead">'.$infodoctor["titulo"].'</p>
                </div>
                <br>

                <div class="row">
                    <div class="clearfix">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <div class="media-element clearfix">
                                <img src="'.$servidor.$infodoctor["foto"].'" alt="'.$infodoctor["nombres"].'" width="550" class="img-responsive">
                            </div><!-- end slider -->
                        </div><!-- end col-lg-6 -->

                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <div class="big_team_widget">
                                <h3><span>'.$infodoctor["nombres"].'</span></h3>
                                                               
                                <p>'.$infodoctor["descripcion"].'</p>
                                
                                <div class="doctor-details">
                                    <ul>
                                        <li><span>C.M.P :</span> '.$infodoctor["cmp"].'</li>
                                        <li><span>R.N.E :</span> '.$infodoctor["rne"].'</li>
                                        <li><span>Especialidad :</span> '.$infodoctor["especialidades"].'</li>
                                        <li><span>Celular :</span> '.$infodoctor["celular"].'</li>
                                        <li><span>Email :</span> '.$infodoctor["correo"].'</li>
                                    </ul>
                                </div>
                                
                                <div class="social-icons">
                                    <span class="facebook"><a data-toggle="tooltip" data-placement="bottom" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></span>
                                    <span class="google-plus"><a data-toggle="tooltip" data-placement="bottom" title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a></span>
                                    <span class="twitter"><a data-toggle="tooltip" data-placement="bottom" title="Twitter" href="#"><i class="fa fa-twitter"></i></a></span>
                                    <span class="linkedin"><a data-toggle="tooltip" data-placement="bottom" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a></span>
                                </div><!-- end social icons -->
                            </div><!-- end big_team_widget -->
                        </div><!-- end col-lg-6 -->
                    </div><!-- end fullwidth -->
                </div><!-- end row -->'

             ?>

                
                <div class="row makepadding">
                    
                </div>

            </div><!-- end general_row -->
        </div><!-- end container -->
    </div><!-- end white-wrapper -->