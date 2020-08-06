<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();
$social = ControladorPlantilla::ctrEstiloPlantilla();

?>
<!--
<div class="animationload">
    <div class="loader">CONFIA INSTITUTO OFTALMOLÓGICO ...</div>
</div>
-->
<div class="topbar">
        <div class="container" >
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="callout">
                <span class="topbar-email" style="font-size: 13px">
                    <i class="fa fa-envelope"></i><a href="mailto:informes@oftalmoconfia.com"> informes@oftalmoconfia.com</a></span>
                <span class="topbar-phone" style="font-size: 13px">
                    <i class="fa fa-phone"></i> 475-3320 / 475-3385 / 983-274603</span>
                </div><!-- end callout -->
                </div><!-- end col -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="topbar_social pull-right">
                        <span class="facebook">
                        <a href="https://www.facebook.com/oftalmoconfia" title="Facebook" target="_blank" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-facebook"></i></a>
                        </span>
                        <!-- REDES SOCIALES
                        <span class="google-plus"><a data-toggle="tooltip" data-placement="bottom" title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a></span>
                        <span class="twitter"><a data-toggle="tooltip" data-placement="bottom" title="Twitter" href="#"><i class="fa fa-twitter"></i></a></span>
                        <span class="linkedin"><a data-toggle="tooltip" data-placement="bottom" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a></span>
                        <span class="skype"><a data-toggle="tooltip" data-placement="bottom" title="Skype" href="#"><i class="fa fa-skype"></i></a></span>-->
                        
                    </div><!-- end social icons -->
                    <div class="topbar_social pull-right">
                        <a href="<?php echo $url.'contactenos'; ?>" target="_self">
                        <button type="button" class="btn btn-success btn-xs">Contáctenos</button>
                    </a>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
</div><!-- end topbar -->
    
    <header class="header">
        <div class="container c1172">
            <nav class="navbar yamm navbar-default">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand"><img class="navbar-brand-img" src="<?php echo $servidor.$social["logo"]; ?>" alt="CONFIA INSTITUTO OFTALMOLOGICO"></a>
                </div><!-- end navbar-header -->
                
                <div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Inicio</a></li>
                        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Nosotros</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo $url.'nosotros'; ?>">Historia</a></li>
                                <li><a href="<?php echo $url.'infraestructura'; ?>">Infraestructura</a></li>
                              
                            </ul><!-- end dropdown-menu -->
                        </li><!-- end standard drop down -->
                        <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Enfermedades</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                           <?php
                                                $item = "id_categoria";
                                                $valor = 7;
                                                $i=0;
                                                $subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
                                                foreach ($subcategorias as $key => $value) {
                                                    if($value["estado"] != 0){
                                                        if($i % 6 == 0){
                                                                echo '<ul class="col-sm-3">';
                                                        }
                                                        $i++;
                                                            
                                                            // http://localhost/confia2020/index.php                                                   
                                                        echo '<li><a href="'.$url.$value["ruta"].'">'.$value["subcategoria"].'</a></li>';

                                                            if($i % 6 == 0){
                                                                echo '</ul>';
                                                             }

                                                        }
                                                }
                                            ?>
                                        </div><!-- end row -->
                                        
                                    </div><!-- end yamm-content -->
                                </li>
                            </ul><!-- end drop down menu -->
                        </li><!-- end drop down -->
                        <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Exámenes</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                           <?php
                                                $item = "id_categoria";
                                                $valor = 8;
                                                $i=0;
                                                $subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
                                                foreach ($subcategorias as $key => $value) {
                                                    if($value["estado"] != 0){
                                                        if($i % 6 == 0){
                                                                echo '<ul class="col-sm-3">';
                                                        }
                                                        $i++;
                                                            
                                                            // http://localhost/confia2020/index.php                                                   
                                                        echo '<li><a href="'.$url.$value["ruta"].'">'.$value["subcategoria"].'</a></li>';

                                                            if($i % 6 == 0){
                                                                echo '</ul>';
                                                             }

                                                        }
                                                }
                                            ?>
                                        </div><!-- end row -->
                                        
                                    </div><!-- end yamm-content -->
                                </li>
                            </ul><!-- end drop down menu -->
                        </li><!-- end drop down -->
                        <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Cirugía</a>
                              <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                           <?php
                                                $item = "id_categoria";
                                                $valor = 9;
                                                $i=0;
                                                $subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
                                                foreach ($subcategorias as $key => $value) {
                                                    if($value["estado"] != 0){
                                                        if($i % 6 == 0){
                                                                echo '<ul class="col-sm-3">';
                                                        }
                                                        $i++;
                                                            
                                                            // http://localhost/confia2020/index.php                                                   
                                                        echo '<li><a href="'.$url.$value["ruta"].'">'.$value["subcategoria"].'</a></li>';

                                                            if($i % 6 == 0){
                                                                echo '</ul>';
                                                             }

                                                        }
                                                }
                                            ?>
                                        </div><!-- end row -->
                                        
                                    </div><!-- end yamm-content -->
                                </li>
                            </ul><!-- end drop down menu -->
                        </li><!-- end drop down -->

                        <li><a href="staff">Staff</a></li>
                        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Servicios</a>
                            <ul class="dropdown-menu" role="menu">

                                <?php
                                    $item = "id_categoria";
                                    $valor = 10;
                                                $i=0;
                                                $subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
                                                foreach ($subcategorias as $key => $value) {
                                                    if($value["estado"] != 0){
                                                        echo '<li><a href="'.$url.$value["ruta"].'">'.$value["subcategoria"].'</a></li>';                        
                                                    }
                                                }
                                ?> 
                             
                               <!-- <li><a href="optica-confia.php" target="_self">Óptica</a></li>
                                <li><a href="farmacia-confia.php" target="_self">Farmacia</a></li>
                                <li><a href="oftalmologiaocupacional-confia.php">Oftalmología Ocupacional</a></li> -->
                            </ul><!-- end dropdown-menu -->
                        </li><!-- end standard drop down -->
                        <!-- <li><a href="#">Novedades</a></li> -->
                    </ul><!-- end navbar-nav -->
                </div><!-- #navbar-collapse-1 -->
            </nav><!-- end navbar yamm navbar-default -->
        </div><!-- end container -->
    </header><!-- end header -->