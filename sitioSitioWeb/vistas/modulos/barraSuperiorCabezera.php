<?php
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
<div class=" barraSuperior" id="top" style="background-color: #ad0943fa;">
				<div class="row">
					<div class="registro">
						<ul>
							<div class="col-lg-1 col-md-2 col-sm-2 col-xs-8" id="carrito">
				
							<a href="<?php echo $url;?>">
								<button class="btn btn-default pull-left backColor"> 
									<i class="fa fa-home" aria-hidden="true"></i>
								</button>
							</a>	
							</div>
						
							<div class="col-lg-1 col-md-2 col-sm-2 col-xs-8" id="carrito">
				
							<a href="<?php echo $url;?>catalogo">
								<button class="btn btn-default pull-left backColor"> 
									<i class="fa fa-list" aria-hidden="true"></i>
								</button>
							</a>	
							</div>
						
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-8" id="carrito">
				
							<a href="<?php echo $url;?>carrito">
								<button class="btn btn-default pull-left backColor"> 
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</button>
							</a>	

							<p>TU CESTA <span class="cantidadCesta"></span> <br> $ <span class="sumaCesta"></span></p>	
							</div>
						</ul>
						<ul>
						<?php
						$enlace_actual = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
							if(isset($_SESSION["validarSesion"])){
								if($_SESSION["validarSesion"] == "ok"){
									/*MODO DIRECTO*/
									if($_SESSION["modo"] == "directo"){
										if($_SESSION["foto"] != ""){
											echo '<li>
												<img class="img-circle" src="'.$enlace_actual.$_SESSION["foto"].'" width="4%">
												</li>';
										}else{
											echo '<li>
													<img class="img-circle" src="'.$enlace_actual.'vistas/img/usuarios/default/anonymous.png" width="5%">
												</li>';
										}
										echo '<li>|</li>
										  <li><a href="/perfil">Ver Perfil</a></li>
										  <li>|</li>
										  <li><a href="./salir">Salir</a></li>';
									}
									/*MODO FACEBOOK*/
									if($_SESSION["modo"] == "facebook"){

										echo '<li>

												<img class="img-circle" src="'.$_SESSION["foto"].'" width="4%">

											   </li>
											   <li>|</li>
									 		   <li><a href="/perfil">Ver Perfil</a></li>
									 		   <li>|</li>
									 		   <li><a href="./salir" class="salir">Salir</a></li>';
									}


							}

				}else{
					echo'<li><a href="#" data-target="#modalIngreso" data-toggle="modal">Ingresar</a></li>
						<li>|</li>
						<li><a href="#" data-target="#modalRegistroUsuarios" data-toggle="modal">Crear una cuenta</a></li>';

				}

				?>
							
						</ul>
					</div>	
				</div>	
			</div>
		</div>


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
         ¿Ya tienes una cuenta registrada? | <strong><a id="modal_url" href="#" data-target="#modalIngreso" data-dismiss="modal" data-toggle="modal">Ingresar</a></strong>
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
          
			¿No tienes una cuenta registrada? | <strong><a href="#" data-target="#modalRegistroUsuarios" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>
      
    </div>

</div>
