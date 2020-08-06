<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><!-- xyz --> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
  <!--<meta http-equiv="content-type" content="text/html; charset=UTF-8"> -->

<?php

        $servidor = Ruta::ctrRutaServidor();

        $plantilla = ControladorPlantilla::ctrEstiloPlantilla();

        echo '<link rel="icon" href="'.$servidor.$plantilla["icono"].'">';

        /*=============================================
        MANTENER LA RUTA FIJA DEL PROYECTO
        =============================================*/
        
        $url = Ruta::ctrRuta();

        /*=============================================
        MARCADO DE CABECERA
        =============================================*/

        $rutas = array();

        if(isset($_GET["ruta"])){

            $rutas = explode("/", $_GET["ruta"]);

            $ruta = $rutas[0];

        }else{

            $ruta = "inicio";

        }

        $cabeceras = ControladorPlantilla::ctrTraerCabeceras($ruta);
        
        if(!$cabeceras["ruta"]){

            $ruta = "inicio";

            $cabeceras = ControladorPlantilla::ctrTraerCabeceras($ruta);

        }

?>

    <!--=====================================
    Marcado HTML5
    ======================================-->
    <meta name="title" content="<?php echo  $cabeceras['titulo']; ?>">
    <meta name="description" content="<?php echo  $cabeceras['descripcion']; ?>">
    <meta name="keyword" content="<?php echo  $cabeceras['palabrasClaves']; ?>">
    <title><?php echo  $cabeceras['titulo']; ?></title>

  <!--  <link rel="icon" href="vistas/imgconfia/favicon.ico" type="image/x-icon"> -->

  <!-- Bootstrap Styles -->

  <link href="vistas/css/bootstrap.css" rel="stylesheet">
  <!-- Awesome Icons -->
  <link rel="stylesheet" href="vistas/css/font-awesome.css">
  <!-- Flexslider -->
  <link href="vistas/css/flexslider.css" rel="stylesheet">
  <!-- Carousel -->
  <link href="vistas/css/owl-carousel.css" rel="stylesheet">
  <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
  <link rel="stylesheet" type="text/css" href="vistas/rs-plugin/css/settings.css" media="screen" />
  <!-- Styles -->
  <link href="vistas/style.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic,900' rel='stylesheet' type='text/css'>


    <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">

  <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/flexslider.css">

  <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">

  <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/dscountdown.css">


    <!--=====================================
  HOJAS DE ESTILO PERSONALIZADAS
  ======================================-->

  <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">

  <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/cabezote.css">

  <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/slide.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <script src="<?php echo $url; ?>vistas/js/plugins/jquery.flexslider.js"></script>

  <script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>
  
  <!-- Support for HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Enable media queries on older bgeneral_rowsers -->
  <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>  <![endif]-->

</head>
<body>

<?php
/*=============================================
CABEZOTE
=============================================*/
include "modulos/cabezote.php";
/*=============================================
CONTENIDO DINÁMICO
=============================================*/

$rutas = array();
$ruta = null;
$infoDoctor = null;

if(isset($_GET["ruta"])){

    $rutas = explode("/", $_GET["ruta"]);

    $item = "ruta";
    $valor =  $rutas[0];

   
    /*=============================================
    URL'S AMIGABLES DE CATEGORÍAS
    =============================================*/
    /*
    $rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

    if($rutas[0] == $rutaCategorias["ruta"] && $rutaCategorias["estado"] == 1){

        $ruta = $rutas[0];

    }*/
    /*=============================================
    URL'S AMIGABLES DE SUBCATEGORÍAS
    =============================================*/
    
    $rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

    foreach ($rutaSubCategorias as $key => $value) {
        
        if($rutas[0] == $value["ruta"] && $value["estado"] == 1){

            $ruta = $rutas[0];

        }

    }
    

    /*=============================================
    URL'S AMIGABLES DE PRODUCTOS
    =============================================*/
    
    $rutaDoctores = ControladorStaffs::ctrMostrarInfoStaff($item, $valor);
    
    if($rutas[0] == $rutaDoctores["ruta"] && $rutaDoctores["estado"] == 1){

        $infoDoctor = $rutas[0];

    }
    

    /*=============================================
    LISTA BLANCA DE URL'S AMIGABLES
    =============================================*/



    if($ruta != null){

        include "modulos/servicios.php";

    }else if($infoDoctor != null){

        include "modulos/infodoctor.php";

    }else if($rutas[0] == "nosotros" || $rutas[0] == "staff"){

        include "modulos/".$rutas[0].".php";

    }else if($rutas[0] == "inicio"){

        include "modulos/slide.php"; 
        include "modulos/saludo.php";
        include "modulos/tratamiento.php";
        include "modulos/staff-.php"; 
        include "modulos/testimonios.php"; 
        include "modulos/seguros.php"; 


    }else{

        include "modulos/error404.php";

    }

}else{

        include "modulos/slide.php"; 
        include "modulos/saludo.php";
        include "modulos/tratamiento.php";
        include "modulos/staff-.php"; 
        include "modulos/testimonios.php"; 
        include "modulos/seguros.php";

}


include "modulos/footer.php";



?>

<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">


  

    <div class="dmtop">Scroll to Top</div>
    
	<!-- Main Scripts-->
	<script src="vistas/js/jquery.js"></script>
	<script src="vistas/js/bootstrap.min.js"></script>
    <script src="vistas/js/bootstrap-datetimepicker.js"></script>
	<script src="vistas/js/menu.js"></script>
	<script src="vistas/js/retina-1.1.0.js"></script>
	<script src="vistas/js/custom.js"></script>

	<!-- CALENDAR WIDGET -->
	<script type="text/javascript">
		(function($) {
		  "use strict";
			$('.form_datetime').datetimepicker({
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				forceParse: 0,
				showMeridian: 1
			});
		})(jQuery);
	</script>

	<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
	
  
  <script type="text/javascript" src="vistas/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="vistas/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript">
  (function($) {
		  "use strict";
			var revapi;
			jQuery(document).ready(function() {
				revapi = jQuery('.tp-banner').revolution(
				{
					delay:9000,
					startwidth:1170,
					startheight:560,
					hideThumbs:10,
					fullWidth:"on",
					forceFullWidth:"on"
				});
			});	//ready
		})(jQuery);
	</script>
    
	<!-- CAROUSEL WIDGET -->
    
    <script src="vistas/js/owl.carousel.min.js"></script>
	<script>
		(function($) {
		  "use strict";
			// OWL Carousel
			$("#owl-testimonial").owlCarousel({
				items : 1,
				lazyLoad : true,
				navigation : false,
				pagination : true,
				autoPlay: true
			});
			$("#owl-blog").owlCarousel({
				items : 3,
				lazyLoad : true,
				navigation : true,
				pagination : false,
				autoPlay: false
			});
		})(jQuery);
	</script>
	<script src="vistas/js/owl.carousel.min.js"></script>
	<script>
		(function($) {
		  "use strict";
			// OWL Carousel
			$("#owl-testimonial-widget").owlCarousel({
				items : 2,
				lazyLoad : true,
				navigation : true,
				pagination : false,
				autoPlay: false
			});

			// OWL Carousel
			$("#owl-blog").owlCarousel({
				items : 4,
				lazyLoad : true,
				navigation : true,
				pagination : false,
				autoPlay: false
			});
		})(jQuery);
	</script>
    
</body>
</html>