<!--body style="background-image: url(vistas/img/fondo1.png) !important; background-repeat:repeat; background-size: 100% auto" -->

<!--wrapper start-->
<!--<div class="wrapper" id="wrapper" style="background-image: url(vistas/img/fondo1.png) !important; background-repeat:repeat; background-size: 100% auto">-->
	
<!--productos-->
	<section class="catalogo" id="catalogo">
	<div class="container">
		<div class="heading text-center">
			
			<h2>Nuestros productos</h2>
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
						<a href="./index.php?ruta=catalogo&url='.$value["ruta_categoria"].'&id='.$value["id_categoria"].'">
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

		   		if (isset($_GET["url"])){
                   
                   if($_GET["url"]=="catalogo"){

						$item= null;
                         $valor=null;
                         $productos = ControladorProductos::ctrMostrarProductosCategorias($item,$valor);

                     }else if($_GET["url"]!="infoproducto"){
                         
                         $item ="id_categoria";
						 $valor = $_GET["id"];
			             $productos = ControladorProductos::ctrMostrarProductosCategorias($item,$valor);
                         

                     }

                 }else{
                 		 $item= null;
                         $valor=null;
                         $productos = ControladorProductos::ctrMostrarProductosCategorias($item,$valor);
                 }
				 
			if (isset($_GET["url"])){    //miro que exista la ruta para poder mostrar
				 
	            if($_GET["url"]=="infoproducto"){

						echo '<div class="col-md-12">
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
									<h4 class="notopmarg nobotmarg">$'.$infoproducto["precio"].'</h4>
									<p> '.$infoproducto["descripcion"].'</p>
									
				    			 	</div>  
				    			 	<button class="agregarCarrito" idProducto="'.$infoproducto["id"].'" imagen="'.$infoproducto["imagen"].'" precio="'.$infoproducto["precio"].'" nombre="'.$infoproducto["nombre"].'" title="Agregar al carrito"><i class="fa fa-shopping-cart"></i></button> 
								</div>	
							</div>
						</div>';
					}else{
							//pegar todo el else una ves solucionado los estilos
            		}
					
			}else{
					//desde aqui
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
                                 
                               	<a href="./index.php?ruta=catalogo&url=infoproducto'.'&id='.$value["id"].'">
                                      <span class="thumb-wrap">
			                              <span class="thumb" style="background-image:url(../sitioAdmin/'.$value["imagen"].');">
                                     		</span>
                                      </span>
                                 </a>
                                 
									<span class="txt">
									  <div class="row">
									   
									   <h5>'.$value["nombre"].' - $'.$value["precio"].'</h5>
									   <button class="agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$value["imagen"].'" precio="'.$value["precio"].'" nombre="'.$value["nombre"].'" title="Agregar al carrito"><i class="fa fa-shopping-cart"></i></button>
									  
									  </div>
										
									</span>
								
                                </article>
                              </li>';
            

							}
						}
						echo '</ul>';
					}//hasta aqui
			}

			?>
					
			
		</div>
	</div>

	</section>
	
<!--</div><wrapper end-->

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