<?php 

/**
 * 
 */
class InicioControlador {
	
	function __construct() {}

	public function index(){
		$vistas = ['Inicio'];
		require_once 'vista/includes/layout.php';
	}
}