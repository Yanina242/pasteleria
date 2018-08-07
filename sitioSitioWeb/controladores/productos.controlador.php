<?php

class ControladorProductos{

	/*=============================================
	MOSTRAR CATEGORÍAS
	=============================================*/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductosCategorias($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductosCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR INFOPRODUCTO
	=============================================*/

	static public function ctrMostrarInfoProducto($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarInfoProducto($tabla, $item, $valor);

		return $respuesta;

	}


}