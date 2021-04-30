<?php
/**
 *
 */
class InsumosAvicolasControlador
{

	function __construct() {}

	public function index(){
		$vistas = ['InicioInsumosAvicolas'];
		require_once 'vista/includes/layout.php';
	}
}