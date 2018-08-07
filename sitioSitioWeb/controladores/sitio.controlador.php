<?php

class ControladorSitio{

 	public function index(){

		require "vistas/index.php";
	}

	static public function ctrMostrarSobreNosotros(){

		$tabla = "informacion";

		$respuesta = ModeloSitio::mdlMostrarSobreNosotros($tabla);

		return $respuesta;
	}

	static public function ctrMostrarContacto(){

		$tabla = "contacto";

		$respuesta = ModeloSitio::mdlMostrarContacto($tabla);

		return $respuesta;
	}

	static public function ctrMostrarRedesSociales(){

		$tabla = "redessociales";

		$respuesta = ModeloSitio::mdlMostrarRedesSociales($tabla);

		return $respuesta;

	}


	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	public function ctrRegistroUsuario(){

		$rutaFoto='';
		if(isset($_POST["regUsuario"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUsuario"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])){
				var_dump($_FILES["regPhoto"]["tmp_name"]);

			   	if(isset($_FILES["regPhoto"]["tmp_name"]) && !empty($_FILES["regPhoto"]["tmp_name"])){            
					var_dump('llego dentro del if');
					$ruta_fichero_origen = $_FILES['regPhoto']['tmp_name'];
					$rutaFoto =  'vistas/img/usuarios/' . $_FILES['regPhoto']['name'];

					move_uploaded_file ( $ruta_fichero_origen, $rutaFoto);

				} 


			   	$encriptar = crypt($_POST["regPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');/*encriptar contraseña con tipo blowfish*/

			   	$encriptarEmail = md5($_POST["regEmail"]);

				$datos = array("nombre"=>$_POST["regUsuario"],
							   "password"=> $encriptar,
							   "email"=> $_POST["regEmail"],
							   "foto"=>$rutaFoto,
							   "modo"=> "directo",
							   "verificacion"=> 0,
							   "emailEncriptado"=>$encriptarEmail);

				$tabla = "usuarios";

				$respuesta = ModeloSitio::mdlRegistroUsuario($tabla, $datos);
			}
			

					
		}

	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuario($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloSitio::mdlMostrarUsuario($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	REGISTRO CON REDES SOCIALES
	=============================================*/

	static public function ctrRegistroRedesSociales($datos){
		$tabla = "usuarios";
		$item = "email";
		$valor = $datos["email"];
		$emailRepetido = false;

		$respuesta0 = ModeloSitio::mdlMostrarUsuario($tabla, $item, $valor);
		if($respuesta0){

			if($respuesta0["modo"] != $datos["modo"]){

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡El correo electrónico '.$datos["email"].', ya está registrado en el sistema con un método diferente a Google!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

				$emailRepetido = false;

			}

			$emailRepetido = true;

		}else{

			$respuesta1 = ModeloSitio::mdlRegistroUsuario($tabla, $datos);

		}

		if($emailRepetido || $respuesta1 == "ok"){

			$respuesta2 = ModeloSitio::mdlMostrarUsuario($tabla, $item, $valor);

			if($respuesta2["modo"] == "facebook"){

				session_start();

				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $respuesta2["id"];
				$_SESSION["nombre"] = $respuesta2["nombre"];
				$_SESSION["foto"] = $respuesta2["foto"];
				$_SESSION["email"] = $respuesta2["email"];
				$_SESSION["password"] = $respuesta2["contraseña"];
				$_SESSION["modo"] = $respuesta2["modo"];

				echo "ok";

			}else if($respuesta2["modo"] == "google"){

				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $respuesta2["id"];
				$_SESSION["nombre"] = $respuesta2["nombre"];
				$_SESSION["foto"] = $respuesta2["foto"];
				$_SESSION["email"] = $respuesta2["email"];
				$_SESSION["password"] = $respuesta2["password"];
				$_SESSION["modo"] = $respuesta2["modo"];

				echo "<span style='color:white'>ok</span>";

			}

			else{

				echo "";
			}

		}
	}



	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	public function ctrIngresoUsuario(){

		if(isset($_POST["ingEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";
				$item = "email";
				$valor = $_POST["ingEmail"];

				$respuesta = ModeloSitio::mdlMostrarUsuario($tabla, $item, $valor);
				if($respuesta["email"] == $_POST["ingEmail"] && $respuesta["contraseña"] == $encriptar){
					if($respuesta["verificacion"] == 1){

						echo'<script>

							swal({
								  title: "¡NO HA VERIFICADO SU CORREO ELECTRÓNICO!",
								  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo para verififcar la dirección de correo electrónico '.$respuesta["email"].'!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    history.back();
									  } 
							});

							</script>';

					}else{

						$_SESSION["validarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["password"] = $respuesta["contraseña"];
						$_SESSION["modo"] = $respuesta["modo"];

						echo '<script>
							
							window.location = localStorage.getItem("rutaActual");

						</script>';

					}

				}else{

					echo'<script>

							swal({
								  title: "¡ERROR AL INGRESAR!",
								  text: "¡Por favor revise que el email exista o la contraseña coincida con la registrada!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = localStorage.getItem("rutaActual");
									  } 
							});

							</script>';

				}

			}else{

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al ingresar al sistema, no se permiten caracteres especiales!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

			}

		}

	}

	
}

