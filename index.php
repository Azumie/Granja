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
$menuItems = [
							'Inicio'=> 'Inicio',
							'Galpon'			=> 'Galpón',
							'GestionAves' => 'Gestión de aves',
							'InventarioGeneral' => 'Inventario General',
							'Lote' => 'Lotes',
							'Reportes'		=> ['Alimentacion' => 'Alimentación',
																'Mortalidad' => 'Mortalidad',
																'Produccion' => 'Producción'],
							'Configuración' => ['TiposHuevo' => 'Tipos de Huevo',
												'TiposVenta' => 'Tipos de Venta',
												'Usuarios' => 'Usuarios',
												'Granjas' => 'Granjas',
												'Clientes' => 'Clientes',
												'Proveedores' => 'Proveedores']
							];

define ('MENUITEMS', $menuItems);
$controlador = isset($_GET['c'], $_SESSION['nombreUsuario']) ? $_GET['c'] : 'Login';
$controlador = isset($_GET['c']) ? $_GET['c'] : 'Login';
$metodo		 = isset($_GET['m']) ? $_REQUEST['m'] : 'index';
define('CONTROLADOR', $controlador);
$controlador = ucwords($controlador).'Controlador';
$controlador = new $controlador();
call_user_func([$controlador, $metodo]);
