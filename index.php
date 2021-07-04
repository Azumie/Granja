<?php
//probando git Token
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
	'Gestion de Granja' => 
		[
			'Gestion de Aves' => [
				'NuevoLote' => 'Nuevo Lote',
				'Mortalidad' => 'Mortalidad',
				'Alimentacion' => 'Alimentación',

			],
			'Configuración' => [
				'Usuarios' => 'Usuarios',
				'Galponeros' => 'Galponeros',
				'TiposHuevo' => 'Tipos de Huevo',
				'Galpones' => 'Galpones',
				'TiposProducto' => 'Tipos de Producto',
				// 'Granjas' => 'Granjas',
				'Clientes' => 'Clientes',
				'Proveedores' => 'Proveedores',
				'LineaGenetica' => 'Líneas Genéticas',
			],
			'Compras' => 'Compras',

		],
	'Gestion de Huevos' => 
		[
			'Produccion' => 'Recoleccion',
			'Consumos' => 'Consumibles',
			'Despachos' => 'Despachos de Huevos',
		],
	'Reportes'		=> [
		'Alimentacion' => 'Alimentación',
		'Mortalidad' => 'Mortalidad',
		'Produccion' => 'Producción'
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
