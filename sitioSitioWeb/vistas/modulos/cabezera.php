<?php
$url = Ruta::ctrRuta();
/*=============================================
INICIO DE SESIÓN USUARIO
=============================================*/
if(isset($_SESSION["validarSesion"])){

	if($_SESSION["validarSesion"] == "ok"){

		echo '<script>
		
			localStorage.setItem("usuario","'.$_SESSION["id"].'");

		</script>';

	}

}
?>

<!--header-->
	<header>
		<div class=" barraSuperior" id="top" style="background-color: #ad0943fa;">
			<div class="container">
				<div class="row">
					<div class="registro">
						<ul>
						<?php
							if(isset($_SESSION["validarSesion"])){
								if($_SESSION["validarSesion"] == "ok"){
									/*MODO DIRECTO*/
									if($_SESSION["modo"] == "directo"){
										if($_SESSION["foto"] != ""){
											echo '<li>
												<img class="img-circle" src="'.$url.$_SESSION["foto"].'" width="4%">
												</li>';
										}else{
											echo '<li>
													<img class="img-circle" src="'.$url.'vistas/img/usuarios/default/anonymous.png" width="5%">
												</li>';
										}
										echo '<li>|</li>
										  <li><a href="'.$url.'perfil">Ver Perfil</a></li>
										  <li>|</li>
										  <li><a href="'.$url.'salir">Salir</a></li>';
									}
									/*MODO FACEBOOK*/
									if($_SESSION["modo"] == "facebook"){

										echo '<li>

												<img class="img-circle" src="'.$_SESSION["foto"].'" width="4%">

											   </li>
											   <li>|</li>
									 		   <li><a href="'.$url.'perfil">Ver Perfil</a></li>
									 		   <li>|</li>
									 		   <li><a href="'.$url.'salir" class="salir">Salir</a></li>';
									}

									/*MODO GOOGLE*/

									if($_SESSION["modo"] == "google"){

										echo '<li>

												<img class="img-circle" src="'.$_SESSION["foto"].'" width="10%">

											   </li>
											   <li>|</li>
									 		   <li><a href="'.$url.'perfil">Ver Perfil</a></li>
									 		   <li>|</li>
									 		   <li><a href="'.$url.'salir">Salir</a></li>';

								}

							}

				}else{

					echo'<li><a href="./vistas/modulos/cabezera/#modalIngreso" data-toggle="modal">Ingresar</a></li>
						<li>|</li>
						<li><a  data-toggle="modal" href="./sitioSitioWeb/vistas/modulos/cabezera/#modalRegistroUsuarios">Crear una cuenta</a></li>';

				}

				?>
							
						</ul>
					</div>	
				</div>	
			</div>
		</div>
	<div class="banner row" id="banner">
		<div class="parallax text-center" style="background-image: url(vistas/img/fondo19.jpg);">

			<div class="parallax-pattern-overlay">
				<div class="container text-center" style="height:580px;padding-top:10%;">
					<a href="#"><img id="site-title" class=" wow fadeInDown" wow-data-delay="0.0s" wow-data-duration="0.9s" src="vistas/img/logo2.png" alt="logo"/></a>
					<h2 class="intro wow zoomIn" wow-data-delay="0.4s" wow-data-duration="0.9s">Bienvenidos</h2>
                    
                    <a href="catalogo.php?ruta=productos" target="_blank"><b>VER CATALOGO</b></a>

				</div>
			</div>
		</div>
	</div>
		
	<div class="menu" style="width: 100%;">
		<div class="navbar-wrapper">
			<div class="container">
				<div class="navwrapper">
					<div class="navbar navbar-inverse navbar-static-top">
						<div class="container">
							<div class="navArea">
								<div class="navbar-collapse collapse">
									<ul class="nav navbar-nav">
										<li class="menuItem active"><a href="#wrapper">Home</a></li>
										<li class="menuItem"><a href="#aboutus">Sobre Nosotros</a></li>
										<li class="menuItem"><a href="#contact">Contactanos</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	</header>

<!--=====================================
VENTANA MODAL PARA EL REGISTRO
======================================-->

<div class="modal fade modalFormulario" id="modalRegistroUsuarios" role="dialog">

    <div class="modal-content modal-dialog">        
        <!-- Modal body -->
        <div class="modal-body modalTitulo">
         	<h3 class="backColor">REGISTRARSE</h3>
          	<button type="button" class="close" data-dismiss="modal">×</button>

          	<!--=====================================
			REGISTRO FACEBOOK
			======================================-->

			<div class="col-sm-6 col-xs-12 facebook">
				
				<p>
				  <i class="fa fa-facebook"></i>
					Registro con Facebook
				</p>

			</div>

			<!--=====================================
			REGISTRO GOOGLE
			======================================-->
			<a href="">

				<div class="col-sm-6 col-xs-12 google">
					
					<p>
					  <i class="fa fa-google"></i>
						Registro con Google
					</p>

				</div>
			</a>

        </div>

        <!--=====================================
			REGISTRO DIRECTO
		======================================-->

			<form method="post"  enctype="multipart/form-data" onsubmit="return registroUsuario()">
				
			<hr>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-user"></i>
						
						</span>

						<input type="text" class="form-control text-uppercase" id="regUsuario" name="regUsuario" placeholder="Nombre Completo" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>

						<input type="email" class="form-control" id="regEmail" name="regEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>
				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-picture"></i>
						
						</span>

						<input type="file" class="form-control" id="regPhoto" name="regPhoto" placeholder="Foto" >

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>
						
						</span>

						<input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="Contraseña" required>

					</div>

				</div>

				<!--=====================================
				https://www.iubenda.com/ CONDICIONES DE USO Y POLÍTICAS DE PRIVACIDAD
				======================================-->

				<div class="checkBox">
					
					<label>
						
						<input id="regPoliticas" type="checkbox">
					
							<small>
								
								Al registrarse, usted acepta nuestras condiciones de uso y políticas de privacidad

								<br>
								<a href="https://www.iubenda.com/privacy-policy/63142690" class="iubenda-white iubenda-embed "title="Política de privacidad"> leer mas </a>
								<script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
							

							</small>

					</label>

				</div>

				<?php

					$registro = new ControladorSitio();
					$registro -> ctrRegistroUsuario();

				?>
				
				
				<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">	

			</form>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         ¿Ya tienes una cuenta registrada? | <strong><a id="modal_url" href="#modalIngreso" data-dismiss="modal" data-toggle="modal">Ingresar</a></strong>
        </div>
      
    </div>

</div>

<!--=====================================
VENTANA MODAL PARA EL INGRESO
======================================-->

<div class="modal fade modalFormulario" id="modalIngreso" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">INGRESAR</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        	
			<!--=====================================
			INGRESO FACEBOOK
			======================================-->

			<div class="col-sm-6 col-xs-12 facebook">
				
				<p>
				  <i class="fa fa-facebook"></i>
					Ingreso con Facebook
				</p>

			</div>

			<!--=====================================
			INGRESO GOOGLE
			======================================-->
			<a href="<?php echo $rutaGoogle; ?>">
			
				<div class="col-sm-6 col-xs-12 google">
					
					<p>
					  <i class="fa fa-google"></i>
						Ingreso con Google
					</p>

				</div>

			</a>

			<!--=====================================
			INGRESO DIRECTO
			======================================-->

			<form method="post">
				
			<hr>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>

						<input type="email" class="form-control" id="ingEmail" name="ingEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>
						
						</span>

						<input type="password" class="form-control" id="ingPassword" name="ingPassword" placeholder="Contraseña" required>

					</div>

				</div>

				

				<?php

					$ingreso = new ControladorSitio();
					$ingreso -> ctrIngresoUsuario();

				?>
				
				<input type="submit" class="btn btn-default backColor btn-block btnIngreso" value="ENVIAR">	

				<br>

				<center>
					
					<a href="#modalPassword" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>

				</center>

			</form>

        </div>

        <div class="modal-footer">
          
			¿No tienes una cuenta registrada? | <strong><a href="./sitioSitioWeb/vistas/modulos/cabezera/#modalRegistroUsuarios" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>
      
    </div>

</div>

