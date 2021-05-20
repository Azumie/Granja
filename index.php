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
$menuItems = [#'Recogida'		=> 'Recogida',
							'Galpon'			=> 'Galpón',
							'GestionAves' => 'Gestion de aves',
							#'Lote'				=> 'Lotes',
							#'Inventario' => 'Inventario',
							'Responsables' => 'Responsables',
							'Usuarios'		=> 'Usuarios',
							'Reportes'		=> ['Alimentacion' => 'Alimentaciónn',
																'Mortalidad' => 'Mortalidad',
																'Produccion' => 'Produccion'],
							'Lote' => 'Lotes'
							];

define('MENUITEMS', $menuItems);
$controlador = isset($_GET['c'], $_SESSION['nombreUsuario']) ? $_GET['c'] : 'Login';
$controlador = isset($_GET['c']) ? $_GET['c'] : 'Login';
$metodo		 = isset($_GET['m']) ? $_REQUEST['m'] : 'index';
define('CONTROLADOR', $controlador);
$controlador = ucwords($controlador).'Controlador';
$controlador = new $controlador();
call_user_func([$controlador, $metodo]);