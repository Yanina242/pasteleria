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

<link rel="shortcut icon" href="<?php echo $url; ?>vistas/img/logoIco.ico" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>vistas/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/animate.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/carrito.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/theme.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

</head>
<body style="background-image: url(<?php echo $url; ?>vistas/img/f5.jpg); background-repeat:repeat; background-size: 100% auto" >
<!--wrapper start-->
<div class="wrapper" id="wrapper">

<?php
    
          include "modulos/barraSuperiorCabezera.php";

/*=============================================
CONTENIDO DINÁMICO
=============================================*/
$rutas = array();
$ruta = null;
$infoProducto = null;

if(isset($_GET["ruta"])){

	$rutas = explode("/", $_GET["ruta"]);
	$ruta=strval($rutas[0]);
	if(  $ruta == "salir" 
	  || $ruta == "catalogo"
	  || $ruta == 'verificar'
	  || $ruta == 'enviarCorreo'
	  || $ruta == "carrito"
	){
		include "modulos/".$ruta.".php";
	}else{
		//include "modulos/error404.php";
	}

}else{
	include "modulos/cuerpo.php";
}

?>

	<!--footer-->
	<!--<section class="footer" id="footer">
		<div class="container">
			<p> SofwareGym</p>
		</div>
	</section>-->
	<?php
    
          include "modulos/footer.php";

	?>
</div><!--wrapper end-->

<!--Javascripts-->
<input type="hidden" value="<?php echo Ruta::ctrRutaServidor(); ?>" id="urlOculta">
<input type="hidden" value="<?php echo $url.'index.php?ruta='; ?>" id="rutaOculta">

<script src="<?php echo $url; ?>vistas/js/jquery.js"></script>
<script src="<?php echo $url; ?>vistas/js/modernizr.js"></script>
<script src="<?php echo $url; ?>vistas/js/bootstrap.js"></script>
<script src="<?php echo $url; ?>vistas/js/menustick.js"></script>
<script src="<?php echo $url; ?>vistas/js/parallax.js"></script>
<script src="<?php echo $url; ?>vistas/js/easing.js"></script>
<script src="<?php echo $url; ?>vistas/js/wow.js"></script>
<script src="<?php echo $url; ?>vistas/js/smoothscroll.js"></script>
<script src="<?php echo $url; ?>vistas/js/masonry.js"></script>
<script src="<?php echo $url; ?>vistas/js/imgloaded.js"></script>
<script src="<?php echo $url; ?>vistas/js/classie.js"></script>
<script src="<?php echo $url; ?>vistas/js/colorfinder.js"></script>
<script src="<?php echo $url; ?>vistas/js/gridscroll.js"></script>
<script src="<?php echo $url; ?>vistas/js/contact.js"></script>
<script src="<?php echo $url; ?>vistas/js/common.js"></script>
<script src="<?php echo $url; ?>vistas/js/usuarios.js"></script>
<script src="<?php echo $url; ?>ajax/usuarios.ajax.php"></script>
<script src="<?php echo $url; ?>vistas/js/carrito.js"></script>
<script src="<?php echo $url; ?>vistas/js/registroFacebook.js"></script>
<script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>
<script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>
<script src="<?php echo $url; ?>vistas/js/plugins/jquery.scrollUp.js"></script>
<script src="<?php echo $url; ?>vistas/js/plugins/jquery.flexslider.js"></script>

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