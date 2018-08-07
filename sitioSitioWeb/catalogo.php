<?php
require_once "controladores/productos.controlador.php";
require_once "modelos/producto.modelo.php";


?>
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

<meta name="description" content="Pasteleria">

<meta name="author" content="">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="vistas/img/logoIco.ico" />
<link rel="stylesheet" type="text/css" media="screen" href="vistas/css/bootstrap.css">
<link rel="stylesheet" href="vistas/css/font-awesome.css">
<link rel="stylesheet" href="vistas/css/animate.css">
<link rel="stylesheet" href="vistas/css/theme.css">
<link rel="stylesheet" href="vistas/css/plantilla.css">

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

</head>
<body style="background-image: url(vistas/img/fondo1.png); background-repeat:repeat; background-size: 100% auto" >
<!--wrapper start-->
<div class="wrapper" id="wrapper">
	

<!--productos-->
	<section class="catalogo" id="catalogo">
	<div class="container">
		<div class="heading text-center">
			
			<h2>Nuestros productos</h2>
			<!--<img class="dividerline" src="../img/sep2.jpeg" alt="">-->
		</div>

		<!-- CATEGORIAS-->
		 <div class="row">

		 <?php
		                        $item = null;
		 	                    $valor = null;
		                        $categorias = ControladorProductos::ctrMostrarCategorias($item,$valor);
		                        
		                        if (!$categorias){
		                           echo '<div class="col-xs-12 error404 text-center">

								           <h1><small>¡Oops!</small></h1>

								           <h2>Aún no hay categorias</h2>

							             </div>';
		                        }else{		
                                
                                  foreach ($categorias as $key => $value) {

					                 if($value["estado_categoria"] != "inactivo"){
										 
										 echo '<div class="prueba">
											<a href="catalogo.php?ruta='.$value["ruta_categoria"].'&id='.$value["id_categoria"].'">
												<div class="categorias"><img src="../sitioAdmin/'.$value["imagen_categoria"].'"></div>
												<span class="txt text-center">
												  <h5>'.$value["nombre_categoria"].'</h5>
										       </span>
										     </a>
										  </div>';
									}
								}
							}
							?>
											
         </div>
         <br>
		<div class="row">

		   <?php
                   
                   if($_GET["ruta"]=="productos"){

						$item= null;
                         $valor=null;
                         $productos = ControladorProductos::ctrMostrarProductosCategorias($item,$valor);

                     }else if($_GET["ruta"]!="infoproducto"){
                         
                         $item ="id_categoria";
						 $valor = $_GET["id"];
			             $productos = ControladorProductos::ctrMostrarProductosCategorias($item,$valor);
                         

                     }
				     
                   if($_GET["ruta"]!="infoproducto"){

		             if (!$productos){
		                           echo '<div class="col-xs-12 error404 text-center">

								           <h1><small>¡Oops!</small></h1>

								           <h2>Aún no hay productos</h2>

							             </div>';
		                        }else{		

		                        	echo '<ul class="productos">';
                                
                                  foreach ($productos as $key => $value) {

					                 if($value["estado"] != "inactivo"){
											
									    echo '
				                                      <li class="color">
					
                                                        <article>
                                                         
                                                       	   <a href="catalogo.php?ruta=infoproducto'.'&id='.$value["id"].'">
			                                                  <span class="thumb-wrap">

									                              <span class="thumb" style="background-image:url(../sitioAdmin/'.$value["imagen"].');">
				    		        
						                                           </span>
					
				
			                                                  </span>
															<span class="txt">
															  <div class="row">
															   
															   <h5>$'.$value["precio"].' - '.$value["nombre"].'</h5>
															  
															  </div>
																
															</span>
													  </a>


                                                        </article>
                                                      </li>';
                                              

				                              

									}
								}
								echo '</ul>';
							}
						}else{

					echo '

			<div class="col-md-12">
				<div class="papers text-center">
					<div class="row">';
					
					    $item =  "id";
				$valor = $_GET["id"];
				$infoproducto = ControladorProductos::ctrMostrarInfoProducto($item, $valor);

        				
        				echo '<div class="col-md-7">
								<img src="../sitioAdmin/'.$infoproducto["imagen"].'" width="100%"><br/>
							</div>';


       					 echo '<div  class="col-md-5">
								<h3 class="notopmarg nobotmarg">'.$infoproducto["nombre"].'</h3>
								<hr>
								<h4 class="notopmarg nobotmarg">$'.$infoproducto["precio"].' - Stock: '.$infoproducto["stock"].'</h4>
								<p> '.$infoproducto["descripcion"].'</p>
								
			    			 </div>   
					
						
					</div>	
				</div>
			</div>';}
					
			?>
					
			
		</div>
	</div>

	</section>
<!--footer-->
	<section class="footer" id="footer">
	<p class="text-center">
		<a href="#wrapper" class="gototop"><i class="fa fa-angle-double-up fa-2x"></i></a>
	</p>
	<div class="container">
		<p>
			&copy; 2015 Copyright Your Website<br>
			 Theme by <a href="http://www.wowthemes.net">WowThemes.Net</a>
		</p>
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

</body>
</html>