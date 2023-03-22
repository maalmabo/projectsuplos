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

		//$stmt->close();

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

		//$stmt->close();

		$stmt = null;
	}
	
	/*=====================================
	Ver Clase
	=====================================*/
	static public function mdlVerclase($id, $funcion){		
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

		//$stmt->close();

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

		//$stmt->close();

		$stmt = null;
	}
	
	/*=====================================
	Guardar Producto
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

		//$stmt->close();

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

		//$stmt->close();

		$stmt = null;
	}
	
	/*=====================================
	Consulta los procesos dependiendo de los filtros
	=====================================*/
	static public function mdlConsultProceso($idCerrada,$objeto,$estado,$funcion){	
		$wheId = "";
		$wheObj = "";
		$wheEst	= "";
		if($idCerrada != ''){
			$wheId = " AND p.id = :id";
		}
		if($objeto != ''){
			$wheObj = " AND p.objeto LIKE :objeto";
		}
		if($estado != '0'){
			$wheEst = " AND p.estado = :estado";
		}

		$stmt = Conexion::conectar()->prepare("SELECT p.id,
												p.identidad,
												p.objeto,
												p.descripcion,
												p.idMoneda,
												tm.nombre AS nombreMoneda,
												p.presupuesto,
												p.idActividad,
												pr.nombre AS nombreProducto,
												p.fecIni,
												p.horIni,
												p.fecFin,
												p.horFin,
												p.estado AS idEstado, 
												e.nombre as estado 
										FROM proceso p
										INNER JOIN estadoProceso e ON p.estado = e.id
										INNER JOIN producto pr ON p.idActividad = pr.id
										INNER JOIN tipomoneda tm ON p.idMoneda = tm.id
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

		//$stmt->close();

		$stmt = null;
	}
	
	/*=====================================
	Actualiza el estado del proceso cuando se cargar la plataforma
	=====================================*/
	static public function mdlActEst(){		
		$fecAct = date("Y-m-d");
		//Actualiza los estado ha publicado
		$stmt1 = Conexion::conectar()->prepare("UPDATE proceso SET estado = 3 WHERE estado = 2 AND fecIni <= :fecAct");
		$stmt1->bindParam(":fecAct", $fecAct, PDO::PARAM_STR);

		//Actualiza los estado ha Evaluacion
		$stmt2 = Conexion::conectar()->prepare("UPDATE proceso SET estado = 4 WHERE estado = 3 AND fecFin <= :fecAct");
		$stmt2->bindParam(":fecAct", $fecAct, PDO::PARAM_STR);

		$stmt1->execute();
		$stmt2->execute();
		
		if ($stmt1->execute()) {
			return 1;
						
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}

		//$stmt->close();

		$stmt = null;
	}
	//Para LIKE $stmt->bindValue(':anioMes', $anioMes.'-%');

	
	/*=====================================
	Cambia el estado manualmente con el boton de publicar
	=====================================*/
	static public function mdlCambiaEstado($estado, $identidad){		
		
		//Actualiza los estado ha publicado
		$stmt = Conexion::conectar()->prepare("UPDATE proceso SET estado = :estado WHERE identidad = :identidad");
		$stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
		$stmt->bindParam(":identidad", $identidad, PDO::PARAM_STR);

		$stmt->execute();
		
		if ($stmt->execute()) {
			return 1;
						
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}

		//$stmt->close();

		$stmt = null;
	}
	/*=====================================
	Consulta proceso en especifico
	=====================================*/
	static public function mdlverProceso($identidad, $funcion){		
		
		//Actualiza los estado ha publicado
		$stmt = Conexion::conectar()->prepare("SELECT objeto,descripcion,idMoneda,presupuesto,idActividad,fecIni,horIni,fecFin,horFin,estado FROM proceso WHERE identidad = :identidad");		
		$stmt->bindParam(":identidad", $identidad, PDO::PARAM_STR);

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

		//$stmt->close();

		$stmt = null;
	}

	
	/*=====================================
	Ver inserta el archivo
	=====================================*/
	static public function mdlInsertDoc($identidad, $titulo, $descripcion, $nombre){		
		
		//Actualiza los estado ha publicado
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO documento (idProceso, titulo, descripcion, archivo) VALUES (:identidad,:titulo,:descripcion,:nombre)");
		$stmt->bindParam(":identidad", $identidad, PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);

		//$stmt->execute();
		
		if ($stmt->execute()) {
			return 1;						
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}

		//$stmt->close();

		$stmt = null;
	}

	
	/*=====================================
	Consulta documento
	=====================================*/
	static public function mdlConsultDoc($identidad, $funcion){		
		
		
		$stmt = Conexion::conectar()->prepare("SELECT id,titulo,descripcion,archivo FROM documento WHERE idProceso = :identidad");		
		$stmt->bindParam(":identidad", $identidad, PDO::PARAM_STR);

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

		//$stmt->close();

		$stmt = null;
	}

	
	/*=====================================
	elimina el archivo
	=====================================*/
	static public function mdlEliminaArchivo($id){			
		
		$stmt = Conexion::conectar()->prepare("DELETE FROM documento WHERE id = :id");		
		$stmt->bindParam(":id", $id, PDO::PARAM_STR);

		if ($stmt->execute()) {
			return 1;						
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}

		//$stmt->close();

		$stmt = null;
	}

	
	/*=====================================
	Consulta documento en especifico
	=====================================*/
	static public function mdlverArchivo($id,$funcion){			
		
		$stmt = Conexion::conectar()->prepare("SELECT id,idProceso,archivo FROM documento WHERE id = :id");		
		$stmt->bindParam(":id", $id, PDO::PARAM_STR);

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

		//$stmt->close();

		$stmt = null;
	}
}