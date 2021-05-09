<?php
/**
 *
 */
class InventarioControlador
{

	function __construct() {}

	public function index(){
		$vistas = ['InicioInventario'];
		require_once 'vista/includes/layout.php';
	}
}