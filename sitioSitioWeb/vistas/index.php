<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>

<meta charset="UTF-8"/>

<title>Pasteleria Doña Lupe</title>
<?php

		session_start();
		$url = Ruta::ctrRuta();

?>

<meta name="description" content="Pasteleria">

<meta name="author" content="">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="vistas/img/logoIco.ico" />
<link rel="stylesheet" type="text/css" media="screen" href="vistas/css/bootstrap.css">
<link rel="stylesheet" href="vistas/css/font-awesome.css">
<link rel="stylesheet" href="vistas/css/animate.css">
<link rel="stylesheet" href="vistas/css/theme.css">
<link rel="stylesheet" href="vistas/css/plugins/sweetalert.css">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

</head>
<body style="background-image: url(vistas/img/f5.jpg); background-repeat:repeat; background-size: 100% auto" >
<!--wrapper start-->
<div class="wrapper" id="wrapper">

	
	<!--header-->
	<?php
    
          include "modulos/cabezera.php";

	?>
		
	<!--sobreNosotros-->
	<?php
    
          include "modulos/sobreNosotros.php";

	?>
	
	<!--contacto-->
	<?php
    
          include "modulos/contacto.php";

	?>

<?php
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

	if( $rutas[0] == "salir" ){

		include "modulos/".$rutas[0].".php";

	}else{

		include "modulos/error404.php";

	}

}else{

	include "modulos/slide.php";

	include "modulos/destacados.php";

}

?>

	<!--footer-->
	<section class="footer" id="footer">
		<div class="container">
			<p> SofwareGym</p>
		</div>
	</section>
	
</div><!--wrapper end-->

<!--Javascripts-->
<script src="vistas/js/jquery.js"></script>
<script src="vistas/js/modernizr.js"></script>
<script src="vistas/js/bootstrap.js"></script>
<script src="vistas/js/menustick.js"></script>
<script src="vistas/js/parallax.js"></script>
<script src="vistas/js/easing.js"></script>
<script src="vistas/js/wow.js"></script>
<script src="vistas/js/smoothscroll.js"></script>
<script src="vistas/js/masonry.js"></script>
<script src="vistas/js/imgloaded.js"></script>
<script src="vistas/js/classie.js"></script>
<script src="vistas/js/colorfinder.js"></script>
<script src="vistas/js/gridscroll.js"></script>
<script src="vistas/js/contact.js"></script>
<script src="vistas/js/common.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="ajax/usuarios.ajax.php"></script>
<script src="vistas/js/registroFacebook.js"></script>
<script src="vistas/js/plugins/sweetalert.min.js"></script>
<script src="vistas/js/plugins/jquery.easing.js"></script>
<script src="vistas/js/plugins/jquery.scrollUp.js"></script>
<script src="vistas/js/plugins/jquery.flexslider.js"></script>



<script type="text/javascript">
jQuery(function($) {
$(document).ready( function() {
  //enabling stickUp on the '.navbar-wrapper' class
	$('.navbar-wrapper').stickUp({
		parts: {
		  0: 'banner',
		  1: 'aboutus',
		  2: 'contact'
		},
		itemClass: 'menuItem',
		itemHover: 'active',
		topMargin: 'auto'
		});
	});
});
</script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '660791084288623',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>