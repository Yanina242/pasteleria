<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/producto.modelo.php";

class AjaxProductos{

	/*=============================================
	VALIDAR NO REPETIR PRODUCTO
	=============================================*/	

	public $validarProducto;

	public function ajaxValidarProducto(){

		$item = "nombre";
		$valor = $this->validarProducto;

		$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

		echo json_encode($respuesta);

	}

	/*==============================
	EDITAR PRODUCTO
	================================*/

	public $idProducto;

	public function ajaxEditarProducto(){
		
		$item = "id";
		$valor = $this->idProducto;

		$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

		echo json_encode($respuesta);
	}

}

/*=============================================
VALIDAR NO REPETIR PRODUCTO
=============================================*/

if(isset($_POST["validarProducto"])){

	$valProducto = new AjaxProductos();
	$valProducto -> validarProducto = $_POST["validarProducto"];
	$valProducto -> ajaxValidarProducto();

}

if(isset($_POST["idProducto"])){

	$ediProducto = new AjaxProductos();
	$ediProducto -> idProducto = $_POST["idProducto"];
	$ediProducto -> ajaxEditarProducto();

}





