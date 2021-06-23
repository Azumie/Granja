<?php
/**
 *
 */
class InventarioControlador
{

	function __construct() {
		$this->constructorSQL = new ConstructorSQL();
	}

	public function index(){
		$vistas = ['InicioInventario'];
		require_once 'vista/includes/layout.php';
	}

	public function obtenerDespachos(){
		
	}
}