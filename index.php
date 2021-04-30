<?php
session_start();
function autoload($clase){
	if (file_exists("controlador/$clase.php")) {
		require_once "controlador/$clase.php";
	}else if (file_exists("modelo/$clase.php")){
		require_once "modelo/$clase.php";
	}else {
		die("La Clase $clase no existe");
		#AGREGAR PAGINA 404
	}
}
spl_autoload_register('autoload');
$menuItems = ['Recogida'		=> 'Recogida',
							'Galpon'			=> 'Galpón',
							'ControlAves' => 'Control de Aves',
							'Lote'				=> 'Lotes',
							'InsumosAvicolas' => 'Insumos Avicolas',
							'Responsables' => 'Responsables',
							'Usuarios'		=> 'Usuarios',
							'Reportes'		=> ['ProduccionDiaria' => 'Producción Diaria',
																'ProduccionEntreFechas' => 'Producción Entre Fechas',
																'FormatoDistribucion' => 'Formato de Distribución']
							];





define('MENUITEMS', $menuItems);
/**
 * ROUTER
 */
$controlador = isset($_GET['c']) ? $_GET['c'] : 'Login';
$metodo		 = isset($_GET['m']) ? $_REQUEST['m'] : 'index';
define('CONTROLADOR', $controlador);
$controlador = ucwords($controlador).'Controlador';
$controlador = new $controlador();
call_user_func([$controlador, $metodo]);