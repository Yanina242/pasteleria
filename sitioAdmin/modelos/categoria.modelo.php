<?php

require_once "conexion.php";

class ModeloCategoria{

  /*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

		if($item != null){
			//solicito una categoria

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else { //solicito todas las categorias

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_categoria DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		
		$stmt = null;
	
	}


	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_categoria,ruta_categoria,imagen_categoria,fecha_categoria,estado_categoria) VALUES (:categoria,:ruta, :foto, :fecha, :estado)");

		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET imagen_categoria=:foto,estado_categoria=:estado WHERE id_categoria=:id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

 }
