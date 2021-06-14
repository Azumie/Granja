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

function prepararRequire ($string){
	$string = str_replace('á', 'a', $string);
	$string = str_replace('é', 'e', $string);
	$string = str_replace('í', 'i', $string);
	$string = str_replace('ó', 'o', $string);
	$string = str_replace('ú', 'u', $string);
	$string = str_replace('de', '', $string);
	$string = str_replace(' ', '', $string);
	return $string;
}

$menuItems = 
[
	'Inicio'=> 'Inicio',
	'Gestión de Aves' => 
		[
			'Alimentacion' => 'Alimentación',
			'Mortalidad' => 'Mortalidad',
			'Produccion' => 'Producción'
		],
	'InventarioGeneral' => [
		'Consumos' => 'Consumos',
		'Despachos' => 'Despachos',
		'Compras' => 'Compras'
	],
	'Lote' => [
		'LineaGenetica' => 'Líneas Genéticas',
		'Galponeros' => 'Galponeros',
		'NuevoLote' => 'Nuevo Lote'
	],
	'Reportes'		=> [
		'Alimentacion' => 'Alimentación',
		'Mortalidad' => 'Mortalidad',
		'Produccion' => 'Producción'
	],
	'Configuración' => [
			'TiposHuevo' => 'Tipos de Huevo',
			'TiposVenta' => 'Tipos de Venta',
			'Usuarios' => 'Usuarios',
			'Granjas' => 'Granjas',
			'Clientes' => 'Clientes',
			'Proveedores' => 'Proveedores',
			'Galpones' => 'Galpones'
		]
	];

define ('MENUITEMS', $menuItems);
$controlador = isset($_GET['c'], $_SESSION['nombreUsuario']) ? $_GET['c'] : 'Login';
$controlador = isset($_GET['c']) ? $_GET['c'] : 'Login';
$metodo		 = isset($_GET['m']) ? $_REQUEST['m'] : 'index';
define('CONTROLADOR', $controlador);
$controlador = ucwords($controlador).'Controlador';
$controlador = new $controlador();
call_user_func([$controlador, $metodo]);
