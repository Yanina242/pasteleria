<?php

class ControladorProductos{

   static public function ctrMostrarProductos($item,$valor){

        $tabla="productos";

        $respuesta=ModeloProducto::mdlMostrarProductos($tabla,$item,$valor);

        return $respuesta;
   }


   static public function ctrCrearProducto(){

   	 if(isset($_POST["tituloProducto"])){

   	 	      /*=============================================
				VALIDAR IMAGEN 
				=============================================*/


				if(isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])){            
					
					$ruta_fichero_origen = $_FILES['foto']['tmp_name'];
					$rutaFoto =  'vistas/img/productos/' . $_FILES['foto']['name'];

					move_uploaded_file ( $ruta_fichero_origen, $rutaFoto);

				} 


   	 	$datos = array("producto"=>strtoupper($_POST["tituloProducto"]),
   	 		     "idCategoria"=>$_POST["seleccionarCategoria"],
   	 		     "descripcion"=>$_POST["descripcionProducto"],
   	 		     "precio"=>$_POST["precio"],
   	 		     "stock"=>$_POST["stock"],
   	 		     "imagen"=>$rutaFoto,
   	 		     "fecha"=>date('Y-m-d'),
   	 		     "estado"=>"activo"

   	 		);

   	 	$respuesta = ModeloProducto::mdlIngresarProducto("productos", $datos);

			if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El producto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

					</script>';

			}else{
              
              echo'<script>

					swal({
						  type: "error",
						  title: "El producto no se pudo guardar",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  
						})

					</script>';

			}
   	 }



   }


   static public function ctrEditarProducto() {

   if(isset($_POST["tituloProductoEditado"])){
		/*=============================================
		VALIDAR IMAGEN 
		=============================================*/

		$rutaFoto = $_POST["antiguaFoto"];
		

		if(isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])){

			/*=============================================
			BORRAMOS ANTIGUA FOTO
			=============================================*/

			unlink($_POST["antiguaFoto"]);

			/*=============================================
			GUARDAMOS LA IMAGEN EN EL DIRECTORIO
			=============================================*/

			$ruta_fichero_origen = $_FILES['foto']['tmp_name'];
			$rutaFoto =  'vistas/img/productos/' . $_FILES['foto']['name'];

			move_uploaded_file($ruta_fichero_origen, $rutaFoto);

		}

		/*=============================================
		Datos
		=============================================*/
   	 	$datos = array("id"=>$_POST["idProducto"],
   	 			 "producto"=>strtoupper($_POST["tituloProductoEditado"]),
   	 		     "idCategoria"=>$_POST["seleccionarCategoria"],
   	 		     "descripcion"=>$_POST["descripcionProducto"],
   	 		     "precio"=>$_POST["precio"],
   	 		     "stock"=>$_POST["stock"],
   	 		     "imagen"=>$rutaFoto,
   	 		     "estado"=>$_POST["estadoProducto"]

   	 		);					

			$respuesta = ModeloProducto::mdlEditarProducto("productos", $datos);

			if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El producto ha sido modificado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

					</script>';

			}else{
              
              echo'<script>

					swal({
						  type: "error",
						  title: "El producto no se pudo modificar",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  
						})

					</script>';

			}

	  }

	}

}