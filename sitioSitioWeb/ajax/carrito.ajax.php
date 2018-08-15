<?php

require_once "../controladores/carrito.controlador.php";
require_once "../modelos/carrito.modelo.php";

class AjaxCarrito{

	public $total;
	public $tituloArray;
	public $cantidadArray;
	public $valorItemArray;
	public $idProductoArray;
	public $fechaArray;

	public function ajaxCargarCompra(){

		if(md5($this->total) == $this->totalEncriptado){

				$datos = array(
						"total"=>$this->total,
						"tituloArray"=>$this->tituloArray,
						"cantidadArray"=>$this->cantidadArray,
						"valorItemArray"=>$this->valorItemArray,
						"idProductoArray"=>$this->idProductoArray,
						"fechaArray"=>$this->cantidadArray,
					);

				$respuesta = ControladorCarrito::ctrNuevasCompras($datos);

				echo $respuesta;

		}
	}

}

if(isset($_POST["metodoPago"]){

	$payu = new AjaxCarrito();
	$payu -> ajaxCargarCompra();


}