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
	Muestra las producto
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
	static public function ctrConsultProceso($idCerrada,$objeto,$comprador,$estado,$funcion){

		$respuesta = ModeloAdmin::mdlConsultProceso($idCerrada,$objeto,$comprador,$estado,$funcion);

		return $respuesta;
	}
	
	
}