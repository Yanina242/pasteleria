<?php
require_once "conexion.php";

class ModeloSitio{
	

static public function mdlMostrarSobreNosotros($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = 1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}



static public function mdlMostrarContacto($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = 1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

static public function mdlMostrarRedesSociales($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		
		$stmt -> execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

		$stmt -> close();

		$stmt = null;

	}


/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlRegistroUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, contraseña, email, foto, modo, verificacion, emailEncriptado) VALUES (:nombre, :password, :email, :foto, :modo, :verificacion, :emailEncriptado)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":modo", $datos["modo"], PDO::PARAM_STR);
		$stmt->bindParam(":verificacion", $datos["verificacion"], PDO::PARAM_INT);
		$stmt->bindParam(":emailEncriptado", $datos["emailEncriptado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function mdlMostrarUsuario($tabla, $item, $valor){
		 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();
		return $stmt -> fetch(PDO::FETCH_ASSOC);

		$stmt-> close();

		$stmt = null;

	}

}