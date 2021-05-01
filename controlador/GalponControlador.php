<?php
/**
 *
 */
class GalponControlador{

	function __construct() {}

	public function index(){
		$vistas = ['InicioGalpon', 'AgregarGalpon'];
		require_once 'vista/includes/layout.php';
	}
}