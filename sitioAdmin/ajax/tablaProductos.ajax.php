<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/producto.modelo.php";


class TablaProductos{

  /*=============================================
  MOSTRAR LA TABLA DE CATEGORÍAS
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item = null;
 	$valor = null;
    //traigo el total de Productos existentes
 	$productos = ControladorProductos::ctrMostrarProductos($item, $valor);	

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($productos); $i++){
	
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 

			if( $productos[$i]["estado"] == "inactivo"){
				
				$colorEstado = "btn-danger";
				$textoEstado = "Inactivo";
				$estadoProducto = "activo";

			}else{

				$colorEstado = "btn-success";
				$textoEstado = "Activo";
				$estadoProducto = "inactivo";

			}

		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoProducto='".$estadoProducto."' idProducto='".$productos[$i]["id"]."'>".$textoEstado."</button>";

		 	$imagen="<img src='".$productos[$i]["imagen"]."' width='50' heihth='50' >";

		 	$acciones="<button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]['id']."' data-toggle='modal' data-target='#modalEditarProducto'><Span class = 'glyphicon glyphicon-pencil'> </ span></button>";
				    
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$productos[$i]["nombre"].'",
				      "'.$productos[$i]["descripcion"].'",
				      "$'.$productos[$i]["precio"].'",
				      "'.$productos[$i]["stock"].'",
				      "'.$imagen.'",
				      "'.$estado.'",
				      "'.$productos[$i]["fecha"].'" ,
				      "'.$acciones.'"
				    ],';

	}

	$datosJson = substr($datosJson, 0, -1); //quita el ultimo caracter; la coma al final

	$datosJson.=  ']
		  
	}'; 

	echo $datosJson;


 	}


}

/*=============================================
ACTIVAR TABLA DE CATEGORÍAS
=============================================*/ 
$activar = new TablaProductos();
$activar -> mostrarTabla();