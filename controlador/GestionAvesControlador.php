<?php

/**
 *
 */
class GestionAvesControlador {

	public function index(){
		$vistas = ['InicioGestionAves', 'Alimentacion', 'Mortalidad'];
		require_once 'vista/includes/layout.php';
	}

}