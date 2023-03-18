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
	static public function ctrGuardaProceso($objeto,$descripcion,$idMoneda,$presupuesto,$idActividad,$fecIni,$horIni,$fecFin,$horFin,$fecReg,$estado){

		$respuesta = ModeloAdmin::mdlGuardaProceso($objeto,$descripcion,$idMoneda,$presupuesto,$idActividad,$fecIni,$horIni,$fecFin,$horFin,$fecReg,$estado);

		return $respuesta;
	}
}