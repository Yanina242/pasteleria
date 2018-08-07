<?php

require_once "conexion.php";

class ModeloProducto{

  /*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor){

		if($item != null){
			//solicito un producto

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else { //solicito todas los productos

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		
		$stmt = null;
	
	}


	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function mdlIngresarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,id_categoria,descripcion,precio,stock,imagen,fecha,estado) VALUES (:producto,:categoria,:descripcion,:precio,:stock,:imagen,:fecha, :estado)");
        
        $stmt->bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["idCategoria"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
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

	static public function mdlEditarProducto($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:producto,id_categoria=:categoria,descripcion=:descripcion,precio=:precio,stock=:stock,imagen=:imagen,estado=:estado WHERE id=:id");
        
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $stmt->bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["idCategoria"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
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
