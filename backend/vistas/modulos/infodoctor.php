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
                <p class="lead">Médico Oftalmólogo  -  Cirujano</p>
                </div>
				<br>

            	<div class="row">
                	<div class="clearfix">
                    	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                			<div class="media-element clearfix">
								<img src="especialistas_oftalmologia/dr_nicanor_tinajeros_arroyo_2.jpg" alt="" width="550" class="img-responsive">
							</div><!-- end slider -->
                        </div><!-- end col-lg-6 -->

                    	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
							<div class="big_team_widget">
                              	<h3><span>Dr. Nicanor Tinageros Arroyo</span></h3>
                                <h4>Médico Oftalmólogo  -  Cirujano</h4>
								<p>Especializado en  Oftalmología</p>
                                <p>Post Grado: Pan American Fellowship
                                  New England Glaucoma Research
                                  Foundation, Boston, Massachusetts.  USA.
                                  Especialista en Polo Anterior, Posterior y Glaucoma
                                  C.M.P    9314          R.N.E.   3322</p>
                                
                                <div class="doctor-details">
                                	<ul>
                                    	<li><span>Especialidad</span> - Médico Oftalmólogo</li>
                                    	<li><span>Dirección</span>- Av. José Gálvez Barrenechea 356, Urbanización Córpac San Isisdro - Lima - Perú</li>
										<li><span>Teléfono:</span> - 475-3320</li>
                                    	<li><span>Email</span> - informes@oftalmoconfia.com</li>
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