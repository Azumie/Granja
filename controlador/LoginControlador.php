<?php 
/**
 * 
 */
class LoginControlador
{
	
	function __construct() {}

	public function index(){
		$vistas = ['Inicio', 'RecuperarClave'];
		require_once 'vista/includes/layout.php';
	}

	public function login(){
		echo "<h1>HOLA</h1>";
		if (isset($_REQUEST['nombreUsuario'], $_REQUEST['claveUsuario'])) {
			//$usuario = $this->usuarioModelo->verificar($_REQUEST['nombreUsuario'], $_REQUEST['claveUsuario']);
			// if (!Novacio($usuario) && !Comparar($usuario->nombreUsuario, $_REQUEST['nombreUsuario'])) {
				// $_SESSION['login'] = true;
				$_SESSION['nombreUsuario'] = $_REQUEST['nombreUsuario'];
				// $_SESSION['claveUsuario'] = $usuario->claveUsuario;
				header('location:?c=Galpon');
			// }else{
			// 	alerta('danger', 'El usuario y/o la clave con la que intenta acceder no son válidos.');
			// 	header('location:./');
			// }
		}else{
				alerta('danger', 'Ingrese los datos para poder acceder al sistema.');
			header('location:./');
		}
	}
}