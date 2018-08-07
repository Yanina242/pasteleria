<section class="aboutus" id="aboutus"  >
	<div class="container">
		<div class="heading text-center">
			<img class="dividerline" src="vistas/img/sep2.jpeg" alt="">
			<h2> Sobre Nosotros</h2>
			<img class="dividerline" src="vistas/img/sep2.jpeg" alt="">
		</div>			
		<div class="row">
			<div class="col-md-12">
				<div class="papers text-center">
					<div class="row">
					 <?php
        				$info = ControladorSitio::ctrMostrarSobreNosotros();
        				echo '<div class="col-md-5">
								<img src="'.$info["img"].'" alt="100%" width="100%"><br/>
							</div>';


       					 echo '<div  class="col-md-7">
								<h3 class="notopmarg nobotmarg">Doña Lupe</h3>
								<h5> '.$info["descripcion"].'</h5>
								<p>Ultima modificación: '.date('d/m/Y',strtotime($info["fecha"])).'</p>
			    			 </div>';    
					?>
						
					</div>	
				</div>
			</div>
		</div>	
	</div>
</section>


	