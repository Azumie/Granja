<?php 

class LoteControlador
{
	
	function __construct()	{}
	function index(){
		$vistas = ['InicioLote', 'LineaGenetica', 'NuevoLote', 'Galponeros'];
		require_once 'vista/includes/layout.php';
	}
}