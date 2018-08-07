<!--=====================================
USUARIOS
======================================-->	

<!-- user-menu -->
<li class="dropdown user user-menu">

	<!-- dropdown-toggle -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">

	   <?php

	        $item="id";
            $valor=$_SESSION["id"];

            $usuario = ControladorAdministradores::ctrMostrarAdministradores($item,$valor);
	
		echo '<img src="'.$usuario["foto"].'" class="user-image" alt="User Image">'?>
		
		<span class="hidden-xs"><?php echo $usuario["nombre"]; ?></span>
	    
	</a>
	<!-- dropdown-toggle -->

	<!-- dropdown-menu -->
	<ul class="dropdown-menu">

		<li class="user-header">
		   <?php
			echo '<img src="'.$usuario["foto"].'" class="img-circle" alt="User Image">'
           ?>
			<p>
			<?php echo $usuario["nombre"]; ?>
			</p>

		
		</li>

		<li class="user-footer">
		
			<div class="pull-left">
				
				<a href="index.php?ruta=perfil" class="btn btn-default btn-flat">Perfil</a>
			
			</div>
			
			<div class="pull-right">
			
				<a href="salir" class="btn btn-default btn-flat">Salir</a>
			
			</div>
		</li>

	</ul>
	<!-- dropdown-menu -->

</li>
<!-- user-menu -->