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
	static public function mdlVerProducto($nombre, $funcion){		
		if($nombre == null){
			$stmt = Conexion::conectar()->prepare("SELECT id,codigo,nombre FROM producto");
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT id,codigo,nombre FROM producto WHERE nombre LIKE :nombre");
			$stmt->bindValue(':nombre', '%'.$nombre.'%');
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
	static public function mdlGuardaProceso($objeto,$descripcion,$idMoneda,$presupuesto,$idActividad,$fecIni,$horIni,$fecFin,$horFin,$fecReg,$estado,$random){		
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO proceso (identidad,objeto,descripcion,idMoneda,presupuesto,idActividad,fecIni,horIni,fecFin,horFin,fecReg,estado) VALUES(
			:random,:objeto,:descripcion,:idMoneda,:presupuesto,:idActividad,:fecIni,:horIni,:fecFin,:horFin,:fecReg,:estado)");

			$stmt->bindParam(":random", $random, PDO::PARAM_STR);
			$stmt->bindParam(":objeto", $objeto, PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
			$stmt->bindParam(":idMoneda", $idMoneda, PDO::PARAM_STR);
			$stmt->bindParam(":presupuesto", $presupuesto, PDO::PARAM_STR);
			$stmt->bindParam(":idActividad", $idActividad, PDO::PARAM_STR);
			$stmt->bindParam(":fecIni", $fecIni, PDO::PARAM_STR);
			$stmt->bindParam(":horIni", $horIni, PDO::PARAM_STR);
			$stmt->bindParam(":fecFin", $fecFin, PDO::PARAM_STR);
			$stmt->bindParam(":horFin", $horFin, PDO::PARAM_STR);
			$stmt->bindParam(":fecReg", $fecReg, PDO::PARAM_STR);
			$stmt->bindParam(":estado", $estado, PDO::PARAM_STR);

		
		
		if ($stmt->execute()) {

			return 1;
						
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt->close();

		$stmt = null;
	}
	
	/*=====================================
	Ver Estado
	=====================================*/
	static public function mdlVerEstado($id, $funcion){		
		if($id == null){
			$stmt = Conexion::conectar()->prepare("SELECT id,nombre FROM estadoProceso");
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT id,nombre FROM modulos WHERE id = :id");
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
	Consulta los procesos dependiendo de los filtros
	=====================================*/
	static public function mdlConsultProceso($idCerrada,$objeto,$comprador,$estado,$funcion){	
		$wheId = "";
		$wheObj = "";
		$wheEst	= "";
		if($idCerrada != ''){
			$wheId = " AND p.id = :id";
		}
		if($objeto != ''){
			$wheObj = " AND p.objeto LIKE :objeto";
		}
		/*
		if($comprador != ''){
			$wheCom = " AND comprador LIKE :comprador";
		}
		*/
		if($estado != '0'){
			$wheEst = " AND p.estado = :estado";
		}

		$stmt = Conexion::conectar()->prepare("SELECT p.id,p.identidad,p.objeto,p.descripcion,p.idMoneda,p.presupuesto,p.idActividad,p.fecIni,p.horIni,p.fecFin,p.horFin,p.estado AS idEstado, e.nombre as estado 
										FROM proceso p
										INNER JOIN estadoProceso e ON p.estado = e.id
										WHERE p.identidad IS NOT NULL".$wheId.$wheObj.$wheEst);

		if($idCerrada != ''){
			$stmt->bindParam(":id", $idCerrada, PDO::PARAM_STR);
		}
		if($objeto != ''){
			$stmt->bindValue(':objeto', '%'.$objeto.'%');
		}
		/*
		if($comprador != ''){
			$stmt->bindParam(":comprador", $comprador, PDO::PARAM_STR);
		}
		*/
		if($estado != '0'){
			$stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
		}

		//$stmt->execute();
		
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