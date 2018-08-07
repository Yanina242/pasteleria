<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categoria.modelo.php";


class TablaCategorias{

  /*=============================================
  MOSTRAR LA TABLA DE CATEGORÍAS
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item = null;
 	$valor = null;
    //traigo el total de categorias existentes
 	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);	

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($categorias); $i++){
	
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 

			if( $categorias[$i]["estado_categoria"] == "inactivo"){
				
				$colorEstado = "btn-danger";
				$textoEstado = "Inactivo";
				$estadoCategoria = "activo";

			}else{

				$colorEstado = "btn-success";
				$textoEstado = "Activo";
				$estadoCategoria = "inactivo";

			}

		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoCategoria='".$estadoCategoria."' idCategoria='".$categorias[$i]["id_categoria"]."'>".$textoEstado."</button>";

		 	$imagen="<img src='".$categorias[$i]["imagen_categoria"]."' width='50' heihth='50' >";

		 	$acciones="<button class='btn btn-warning btnEditarCategoria' idCategoria='".$categorias[$i]['id_categoria']."' data-toggle='modal' data-target='#modalEditarCategoria'><Span class = 'glyphicon glyphicon-pencil'> </ span></button>";

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$categorias[$i]["nombre_categoria"].'",
				      "'.$imagen.'",
				      "'. $estado.'",
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
$activar = new TablaCategorias();
$activar -> mostrarTabla();