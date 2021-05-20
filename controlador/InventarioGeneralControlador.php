<?php 




/**
 * 
 */
class InventarioGeneralControlador {
	
	function __construct() {}

	public function index (){
		$vistas = ['InicioInventarioGeneral', 'Compras', 'Consumos', 'Despachos', 'Clientes', 'Proveedores'];
		require_once 'vista/includes/layout.php';
	}
}