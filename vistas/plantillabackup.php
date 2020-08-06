<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="title" content="<?php echo  $cabeceras['titulo']; ?>">

	<meta name="description" content="<?php echo  $cabeceras['descripcion']; ?>">

	<meta name="keyword" content="<?php echo  $cabeceras['palabrasClaves']; ?>">

	<title><?php echo  $cabeceras['titulo']; ?></title>


  <!-- Bootstrap Styles -->
  <link href="<?php echo $url; ?>vistas/css/bootstrap.css" rel="stylesheet">
  <!-- Awesome Icons -->
  <link rel="<?php echo $url; ?>vistas/css/font-awesome.css">
  <!-- Carousel -->
  <link href="<?php echo $url; ?>vistas/css/owl-carousel.css" rel="stylesheet">
  <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
  <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/rs-plugin/css/settings.css" media="screen" />
  <!-- Styles -->
  <link href="<?php echo $url; ?>vistas/css/style.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic,900' rel='stylesheet' type='text/css'>
  
  
</head>
<body>

include "modulos/cabezote.php";
<!--
<div class="animationload">
<div class="loader">CONFIA INSTITUTO OFTALMOLÓGICO ...</div>
</div>
-->

<?php include "modulos/cabecera.php"; ?>
       <div class="shadow"></div>

<?php

$rutas = array();
$ruta = null;
$infoProducto = null;

if(isset($_GET["ruta"])){

    $rutas = explode("/", $_GET["ruta"]);

    $item = "ruta";
    $valor =  $rutas[0];

    /*=============================================
    URL'S AMIGABLES DE CATEGORÍAS
    =============================================*/

    $rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

    if($rutas[0] == $rutaCategorias["ruta"] && $rutaCategorias["estado"] == 1){

        $ruta = $rutas[0];
    }

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

    $rutaProductos = ControladorProductos::ctrMostrarInfoProducto($item, $valor);
    
    if($rutas[0] == $rutaProductos["ruta"] && $rutaProductos["estado"] == 1){

        $infoProducto = $rutas[0];

    }


   /*=============================================
    LISTA BLANCA DE URL'S AMIGABLES
    =============================================*/

    if($ruta != null){

        include "modulos/productos.php";

    }else if($infoProducto != null){

        include "modulos/infoproducto.php";

    }else if($rutas[0] == "inicio"){

        include "modulos/slider.php";

       // include "modulos/destacados.php";

    }else{

        include "modulos/error404.php";

    }

}else{

    include "modulos/slider.php";

     include "modulos/saludo.php";  
    include "modulos/tratamientoindex.php"; 
    include "modulos/doctoresindex.php"; 
    include "modulos/testimoniosyseguros.php"; 

}


?>

 
<?php require_once("modulos/pie.php")?>
<div class="dmtop">Scroll to Top</div>
    
	<!-- Main Scripts-->
	<script src="<?php echo $url; ?>vistas/js/jquery.js"></script>
	<script src="<?php echo $url; ?>vistas/js/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>vistas/js/bootstrap-datetimepicker.js"></script>
	<script src="<?php echo $url; ?>vistas/js/menu.js"></script>
	<script src="<?php echo $url; ?>vistas/js/retina-1.1.0.js"></script>
	<script src="<?php echo $url; ?>vistas/js/custom.js"></script>

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
	<script type="text/javascript" src="<?php echo $url; ?>vistas/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="<?php echo $url; ?>vistas/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
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
    
    <script src="<?php echo $url; ?>vistas/js/owl.carousel.min.js"></script>
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
	<script src="<?php echo $url; ?>vistas/js/owl.carousel.min.js"></script>
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

    <?php echo $plantilla["googleAnalytics"]; ?>
    
</body>
</html>











<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

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

	<!--=====================================
	Marcado de Open Graph FACEBOOK
	======================================-->

	<meta property="og:title"   content="<?php echo $cabeceras['titulo'];?>">
	<meta property="og:url" content="<?php echo $url.$cabeceras['ruta'];?>">
	<meta property="og:description" content="<?php echo $cabeceras['descripcion'];?>">
	<meta property="og:image"  content="<?php echo $servidor.$cabeceras['portada'];?>">
	<meta property="og:type"  content="website">	
	<meta property="og:site_name" content="Tu logo">
	<meta property="og:locale" content="es_CO">

	<!--=====================================
	Marcado para DATOS ESTRUCTURADOS GOOGLE
	======================================-->
	
	<meta itemprop="name" content="<?php echo $cabeceras['titulo'];?>">
	<meta itemprop="url" content="<?php echo $url.$cabeceras['ruta'];?>">
	<meta itemprop="description" content="<?php echo $cabeceras['descripcion'];?>">
	<meta itemprop="image" content="<?php echo $servidor.$cabeceras['portada'];?>">

	<!--=====================================
	Marcado de TWITTER
	======================================-->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="<?php echo $cabeceras['titulo'];?>">
	<meta name="twitter:url" content="<?php echo $url.$cabeceras['ruta'];?>">
	<meta name="twitter:description" content="<?php echo $cabeceras['descripcion'];?>">
	<meta name="twitter:image" content="<?php echo $servidor.$cabeceras['portada'];?>">
	<meta name="twitter:site" content="@tu-usuario">


	<!--=====================================
	PLUGINS DE CSS
	======================================-->

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/flexslider.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/dscountdown.css">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">

	<!--=====================================
	HOJAS DE ESTILO PERSONALIZADAS
	======================================-->

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/cabezote.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/slide.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/productos.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/infoproducto.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/perfil.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/carrito-de-compras.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/ofertas.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/footer.css">

	<!--=====================================
	PLUGINS DE JAVASCRIPT
	======================================-->

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.scrollUp.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.flexslider.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/md5-min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/dscountdown.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/knob.jquery.js"></script>

	<script src="https://apis.google.com/js/platform.js" async defer></script>

	<!--=====================================
	CAPTCHA
	======================================-->

	<script src='https://www.google.com/recaptcha/api.js'></script>

	<!--=====================================
	Pixel de Facebook
	======================================-->

	<?php echo $plantilla["pixelFacebook"]; ?>

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
$infoProducto = null;

if(isset($_GET["ruta"])){

	$rutas = explode("/", $_GET["ruta"]);

	$item = "ruta";
	$valor =  $rutas[0];

	/*=============================================
	URL'S AMIGABLES DE CATEGORÍAS
	=============================================*/

	$rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

	if($rutas[0] == $rutaCategorias["ruta"] && $rutaCategorias["estado"] == 1){

		$ruta = $rutas[0];

	}

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

	$rutaProductos = ControladorProductos::ctrMostrarInfoProducto($item, $valor);
	
	if($rutas[0] == $rutaProductos["ruta"] && $rutaProductos["estado"] == 1){

		$infoProducto = $rutas[0];

	}

	/*=============================================
	LISTA BLANCA DE URL'S AMIGABLES
	=============================================*/

	if($ruta != null || $rutas[0] == "articulos-gratis" || $rutas[0] == "lo-mas-vendido" || $rutas[0] == "lo-mas-visto"){

		include "modulos/productos.php";

	}else if($infoProducto != null){

		include "modulos/infoproducto.php";

	}else if($rutas[0] == "buscador" || $rutas[0] == "verificar" || $rutas[0] == "salir" || $rutas[0] == "perfil" || $rutas[0] == "carrito-de-compras" || $rutas[0] == "error" || $rutas[0] == "finalizar-compra" || $rutas[0] == "finalizar-compra-payu" || $rutas[0] == "curso" || $rutas[0] == "ofertas"){

		include "modulos/".$rutas[0].".php";

	}else if($rutas[0] == "inicio"){

		include "modulos/slide.php";

		include "modulos/destacados.php";

	}else{

		include "modulos/error404.php";

	}

}else{

	include "modulos/slide.php";

	include "modulos/destacados.php";

	include "modulos/visitas.php";

}


include "modulos/footer.php";

?>


<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
<!--=====================================
JAVASCRIPT PERSONALIZADO
======================================-->

<script src="<?php echo $url; ?>vistas/js/cabezote.js"></script>
<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
<script src="<?php echo $url; ?>vistas/js/slide.js"></script>
<script src="<?php echo $url; ?>vistas/js/buscador.js"></script>
<script src="<?php echo $url; ?>vistas/js/infoproducto.js"></script>
<script src="<?php echo $url; ?>vistas/js/usuarios.js"></script>
<script src="<?php echo $url; ?>vistas/js/registroFacebook.js"></script>
<script src="<?php echo $url; ?>vistas/js/carrito-de-compras.js"></script>
<script src="<?php echo $url; ?>vistas/js/visitas.js"></script>

<!--=====================================
https://developers.facebook.com/
======================================-->

<?php echo $plantilla["apiFacebook"]; ?>

<script>

  /*=============================================
	COMPARTIR EN FACEBOOK
	https://developers.facebook.com/docs/      
	=============================================*/
	
	$(".btnFacebook").click(function(){

		FB.ui({

			method: 'share',
			display: 'popup',
			href: '<?php  echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  ?>',
		}, function(response){});

	})

	/*=============================================
	COMPARTIR EN GOOGLE
	https://developers.google.com/+/web/share/     
	=============================================*/

	$(".btnGoogle").click(function(){

		window.open(

			'https://plus.google.com/share?url=<?php  echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  ?>',
			'',
			'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=400'
		);

		return false;

	})

</script>

	<!--=====================================
	GOOGLE ANALYTICS
	======================================-->

	<?php echo $plantilla["googleAnalytics"]; ?>



</body>
</html>