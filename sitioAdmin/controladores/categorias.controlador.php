<?php

class ControladorCategorias{

    /*=============================================
	MOSTRAR INFO
	=============================================*/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategoria::mdlMostrarCategorias($tabla,$item, $valor);

		return $respuesta;

	}
    

   /*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearCategoria(){

		if(isset($_POST["tituloCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloCategoria"])){

				if(isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])){            
					
					$ruta_fichero_origen = $_FILES['foto']['tmp_name'];
					$rutaFoto =  'vistas/img/categorias/' . $_FILES['foto']['name'];

					move_uploaded_file ( $ruta_fichero_origen, $rutaFoto);

				} 

					$datos = array("categoria"=>strtoupper($_POST["tituloCategoria"]),
						           "ruta"=>$_POST["rutaCategoria"],
								   "foto" => $rutaFoto,
						           "fecha"=>date('Y-m-d'),
						           "estado"=>"activo");


				}

				$respuesta = ModeloCategoria::mdlIngresarCategoria("categorias", $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

					</script>';

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}

		}

   }


   /*=============================================
	EDITAR CATEGORIAS
	=============================================*/

	static public function ctrEditarCategoria(){ 

		if(isset($_POST["idCategoria"])){

				$rutaFoto = $_POST["antiguaFoto"];

				if(isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])){

						/*=============================================
						BORRAMOS ANTIGUA FOTO
						=============================================*/

						//unlink($_POST["antiguaFoto"]);

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$ruta_fichero_origen = $_FILES['foto']['tmp_name'];
						$rutaFoto =  'vistas/img/categorias/' . $_FILES['foto']['name'];

						move_uploaded_file($ruta_fichero_origen, $rutaFoto);

				}

					$datos = array("id"=>$_POST["idCategoria"],
								   "foto" => $rutaFoto,
						           "estado"=>$_POST["estadoCategoria"]);


		$respuesta = ModeloCategoria::mdlEditarCategoria("categorias", $datos);

		if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido modificada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

					</script>';

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}

		}
	}

}