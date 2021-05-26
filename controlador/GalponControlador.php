<?php
/**
 *
 */
class GalponControlador{

	function __construct() {}

	public function index(){
		$vistas = ['InicioGalpon', 'AgregarGalpon'];
		require_once 'vista/includes/layout.php';
		$ConstructorSQL = new ConstructorSQL();
		$ConstructorSQL->insert('galpones',['idGranja'=>1, 
			'numeroGalpon'=>'1', 'fechaA'=>'2021-05-04', 'areaUtil'=>15.9, 'confinamiento'=>'J']);
		$ConstructorSQL->ejecutarSQL();
	}
}