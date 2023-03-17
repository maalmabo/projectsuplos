<?php
Class ModeloAdmin{
	/*=====================================
	Ver Modulos
	=====================================*/
	static public function mdlVerModulo($id, $estado, $funcion){		
		if($id == null){
			$stmt = Conexion::conectar()->prepare("SELECT id,descripcion,icono,ruta FROM modulos WHERE estado = :estado");
			$stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT id,descripcion,icono,ruta FROM modulos WHERE id = :id AND estado = :estado");
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);
			$stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
		}
		

		$stmt->execute();
		
		if ($stmt->execute()) {
			if ($funcion == 'conteo') {
				return $stmt -> rowCount();
			}else if ($funcion == 'ver') {
				return $stmt -> fetchAll();
			}else if ($funcion == 'verUno') {
				return $stmt -> fetch();
			}
						
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}		

		$stmt->close();

		$stmt = null;
	}
	
	/*=====================================
	Ver Moneda
	=====================================*/
	static public function mdlVerMoneda($id, $estado, $funcion){		
		if($id == null){
			$stmt = Conexion::conectar()->prepare("SELECT id,nombre FROM tipoMoneda WHERE estado = :estado");
			$stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT id,nombre FROM modulos WHERE id = :id AND estado = :estado");
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);
			$stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
		}
		

		$stmt->execute();
		
		if ($stmt->execute()) {
			if ($funcion == 'conteo') {
				return $stmt -> rowCount();
			}else if ($funcion == 'ver') {
				return $stmt -> fetchAll();
			}else if ($funcion == 'verUno') {
				return $stmt -> fetch();
			}
						
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}		

		$stmt->close();

		$stmt = null;
	}
	
	/*=====================================
	Ver Clase
	=====================================*/
	static public function mdlVerclase($id, $estado, $funcion){		
		if($id == null){
			$stmt = Conexion::conectar()->prepare("SELECT id,codigo,nombre FROM clase");
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT id,codigo,nombre FROM clase WHERE id = :id");
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);
		}
		

		$stmt->execute();
		
		if ($stmt->execute()) {
			if ($funcion == 'conteo') {
				return $stmt -> rowCount();
			}else if ($funcion == 'ver') {
				return $stmt -> fetchAll();
			}else if ($funcion == 'verUno') {
				return $stmt -> fetch();
			}
						
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}		

		$stmt->close();

		$stmt = null;
	}
	
	/*=====================================
	Ver Producto
	=====================================*/
	static public function mdlVerProducto($idClase, $funcion){		
		if($idClase == null){
			$stmt = Conexion::conectar()->prepare("SELECT id,codigo,nombre FROM producto");
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT id,codigo,nombre FROM producto WHERE codClase = :codClase");
			$stmt->bindParam(":idClase", $idClase, PDO::PARAM_STR);
		}
		

		$stmt->execute();
		
		if ($stmt->execute()) {
			if ($funcion == 'conteo') {
				return $stmt -> rowCount();
			}else if ($funcion == 'ver') {
				return $stmt -> fetchAll();
			}else if ($funcion == 'verUno') {
				return $stmt -> fetch();
			}
						
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}		

		$stmt->close();

		$stmt = null;
	}
	//Para LIKE $stmt->bindValue(':anioMes', $anioMes.'-%');
}