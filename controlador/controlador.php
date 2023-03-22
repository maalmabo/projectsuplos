<?php
Class ControlAdmin{
	/*=====================================
	Muestra los modulos
	=====================================*/
	static public function ctrVerModulo($id, $estado, $funcion){

		$respuesta = ModeloAdmin::mdlVerModulo($id, $estado, $funcion);

		return $respuesta;
	}
	/*=====================================
	Muestra las monedas
	=====================================*/
	static public function ctrVerMoneda($id, $estado, $funcion){

		$respuesta = ModeloAdmin::mdlVerMoneda($id, $estado, $funcion);

		return $respuesta;
	}
	/*=====================================
	Muestra las clases
	=====================================*/
	static public function ctrVerClase($id, $funcion){

		$respuesta = ModeloAdmin::mdlVerClase($id, $funcion);

		return $respuesta;
	}
	/*=====================================
	Muestra las producto
	=====================================*/
	static public function ctrVerProducto($idClase, $funcion){

		$respuesta = ModeloAdmin::mdlVerProducto($idClase, $funcion);

		return $respuesta;
	}
	/*=====================================
	Guarda el proceso
	=====================================*/
	static public function ctrGuardaProceso($objeto,$descripcion,$idMoneda,$presupuesto,$idActividad,$fecIni,$horIni,$fecFin,$horFin,$fecReg,$estado,$random){

		$respuesta = ModeloAdmin::mdlGuardaProceso($objeto,$descripcion,$idMoneda,$presupuesto,$idActividad,$fecIni,$horIni,$fecFin,$horFin,$fecReg,$estado,$random);

		return $respuesta;
	}
	/*=====================================
	Muestra las estados del proceso
	=====================================*/
	static public function ctrVerEstado($id,$funcion){

		$respuesta = ModeloAdmin::mdlVerEstado($id,$funcion);

		return $respuesta;
	}
	/*=====================================
	Consulta los procesos dependiendo de los filtros
	=====================================*/
	static public function ctrConsultProceso($idCerrada,$objeto,$estado,$funcion){

		$respuesta = ModeloAdmin::mdlConsultProceso($idCerrada,$objeto,$estado,$funcion);

		return $respuesta;
	}
	/*=====================================
	Actualiza los estados de forma masiva
	=====================================*/
	static public function ctrActEst(){

		$respuesta = ModeloAdmin::mdlActEst();

		return $respuesta;
	}
	/*=====================================
	Cambia el estado del proceso
	=====================================*/
	static public function ctrCambiaEstado($estado, $identidad){

		$respuesta = ModeloAdmin::mdlCambiaEstado($estado, $identidad);

		return $respuesta;
	}
	/*=====================================
	Consulta proceso
	=====================================*/
	static public function ctrverProceso($identidad, $funcion){

		$respuesta = ModeloAdmin::mdlverProceso($identidad, $funcion);

		return $respuesta;
	}
	/*=====================================
	Inserta el archivo
	=====================================*/
	static public function ctrInsertDoc($identidad, $titulo, $descripcion, $nombre){

		$respuesta = ModeloAdmin::mdlInsertDoc($identidad, $titulo, $descripcion, $nombre);

		return $respuesta;
	}
	/*=====================================
	Consulta los archivo de un proceso
	=====================================*/
	static public function ctrConsultDoc($identidad, $funcion){

		$respuesta = ModeloAdmin::mdlConsultDoc($identidad, $funcion);

		return $respuesta;
	}
	/*=====================================
	Elimina archivo
	=====================================*/
	static public function ctrEliminaArchivo($id){

		$respuesta = ModeloAdmin::mdlEliminaArchivo($id);

		return $respuesta;
	}
	/*=====================================
	Consulta un arhcivo en especifico
	=====================================*/
	static public function ctrverArchivo($id,$funcion){

		$respuesta = ModeloAdmin::mdlverArchivo($id,$funcion);

		return $respuesta;
	}

	
	
	

	
	
	
}