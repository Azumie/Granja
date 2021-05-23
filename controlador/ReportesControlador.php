<?php 

/**
 * 
 */
class ReportesControlador {
	
	function __construct() {}

	public function index () {
		$vistas = [$_GET['p']];
		require_once 'vista/includes/layout.php';
	}
}