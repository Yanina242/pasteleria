<?php

session_destroy();

$url = Ruta::ctrRuta();
//redirecciona a la pagina de inicio
echo '<script>

	window.location = "'.$url.'";

</script>';