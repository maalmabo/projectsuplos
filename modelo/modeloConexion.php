<?php
Class Conexion{

	static public function conectar(){
		#PDO("nombre del servidor; nombre base de datos; usuario; constraseña")
		$link = new PDO("mysql:host=localhost;dbname=suplos_bd",
						"root",
						"");
		$link->exec("set names utf8");

		return $link;

	}

}