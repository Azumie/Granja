<?php 

class LoteControlador
{
	
	function __construct()	{}
	function index(){
		$vistas = ['InicioLote'];
		require_once 'vista/includes/layout.php';
	}
}