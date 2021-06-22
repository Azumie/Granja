<?php 

class LoteControlador
{
	
	function __construct()	{
		$this->constructorSQL = new ConstructorSQL();
	}
	function index(){
		$vistas = ['InicioLote', 'LineaGenetica', 'NuevoLote', 'Galponeros'];
		require_once 'vista/includes/layout.php';
	}
	// public function obtenerLote(){
	// 	$lote = $this->ConstructorSQL->select('lotes')->where('activogalponLote', '=', '1')->ejecutarSQL();
	// 	echo json_encode($lote);
	// }
}