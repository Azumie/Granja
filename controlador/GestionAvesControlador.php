<?php

/**
 *
 */
class GestionAvesControlador {

	public function index(){
		$vistas = ['InicioGestionAves', 'Alimentacion'];
		require_once 'vista/includes/layout.php';
	}

}