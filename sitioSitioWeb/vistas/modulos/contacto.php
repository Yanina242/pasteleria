	<!--feedback-->
	<section class="contact" id="contact" >
		<div class="container w960" >
			<div class="heading">
				<img class="dividerline" src="vistas/img/sep2.jpeg" alt="" >
				<h2>Contactanos</h2>
				<img class="dividerline" src="vistas/img/sep2.jpeg" alt="" >
			</div>

			<div class="form_wrap">
				<div class="cantact_info">
           			<div class="info_title">
                		<h2>INFORMACION<br>DE CONTACTO</h2>
           			</div>
            		<div class="info_items">
		            	<?php
		        			$info = ControladorSitio::ctrMostrarContacto();	
		        			echo'<p><span class="fa fa-home"></span>'.$info["direccion"].'<br>'.$info["localidad"].', '.$info["provincia"].'</p>';
							echo'<p><span class="fa fa-mobile"></span>'.$info["telefono"].' </p>'
						?>	
						<div class="text-center">
							<?php
								$info = ControladorSitio::ctrMostrarRedesSociales();	
								foreach ($info as $redSocial) 
								{
									if (strcmp($redSocial['estado'], 'activo') === 0)
									{
										echo'<a href="'.$redSocial['cuenta'].'"> <img  src="vistas/img/'.$redSocial['nombre'].'.png" alt="30px" width="30px"></a>';	
									}	
								}
							?>
						</div>
					</div>
        		</div>

		        <form action="vistas/modulos/enviarCorreo.php" method="post" class="form_contact">
		            <h2>Envia un mensaje</h2>
		            <div class="user_info">
		                <label for="names">Nombres *</label>
		                <input type="text" id="names" name="name" required>

		                <label for="email">Correo electronico *</label>
		                <input type="text" id="email" name="email" required>

		                <label for="mensaje">Mensaje *</label>
		                <textarea id="mensaje" name="comment" required></textarea>

		                <input type="submit" value="Enviar Mensaje" id="btnSend" formtarget='_blank'>
		            </div>
		        </form>
			</div>
		</div>
   </section>

	 