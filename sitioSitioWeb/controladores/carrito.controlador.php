<?php

class ControladorCarrito{

	/*=============================================
	NUEVAS COMPRAS
	=============================================*/

	static public function ctrNuevasCompras($datos){

		$tituloArray=$datos["tituloArray"];
		$cantidadArray=$datos["cantidadArray"];
		$cantidadArray=$datos["fechaArray"];
		$valorItemArray=$datos["valorItemArray"];
		$idProductoArray=$datos["idProductoArray"];

		for($i = 0; $i < count($tituloArray); $i ++){

			$datosDetalle= array(
						"tituloArray"=>$tituloArray[$i],
						"cantidadArray"=>$cantidadArray[$i],
						"valorItemArray"=>$valorItemArray[$i],
						"idProductoArray"=>$idProductoArray[$i],
						"fechaArray"=>$fechaArray[$i],
					);

			$tabla = "compras";

			$respuesta = ModeloCarrito::mdlDetalleCompra($tabla, $datosDetalle);

		}

		if($respuesta == "ok"){
			$datosCabezera= array(
				"total"=>$datos["total"],
			);

			$tabla = "compras";

			$respuesta = ModeloCarrito::mdlNuevasCompras($tabla, $datosCabezera);
		}

		if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Su pedido ha sido registrado exitosamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "carrito";

							}
						})

					</script>';

			}else{
              
              echo'<script>

					swal({
						  type: "error",
						  title: "Hemos tenido problemas",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  
						})

					</script>';

			}

		return $respuesta;

	}

}