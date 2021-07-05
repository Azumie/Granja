<?php 
/**
 * 
 */
class LoginControlador
{
	
	function __construct() {
		$this->constructorSQL = new ConstructorSQL();
	}

	public function index(){
		$vistas = ['Inicio', 'RecuperarClave'];
		require_once 'vista/includes/layout.php';
	}

	public function accederLogin(){
		if (isset($_POST['nombreUsuario'], $_POST['claveUsuario'])) {
			$usuario = $this->constructorSQL->select('usuarios')->where('nombreUsuario', '=', $_POST['nombreUsuario'])->where('activoUsuario', '=', 1)->ejecutarSQL();
			if ($usuario == []) {
				echo json_encode('Error: El usuario '.$_POST['nombreUsuario'].' no existe o no está activo en el sistema');
			}else if ($usuario[0]->claveUsuario != $_POST['claveUsuario']){
				 echo json_encode('Error: La clave no coincide con el usuario ingresado');
			}else{
				$_SESSION['login'] = true;
				$_SESSION['nombreUsuario'] = $_POST['nombreUsuario'];
				echo json_encode('?c=Inicio');
			}
		}else{
			echo json_encode('Ingrese los datos para poder acceder al sistema.');
		}
	}

	public function salir(){
		$_SESSION['nombreUsuario'] = null;
		unset($_SESSION['nombreUsuario']);
		session_destroy();
		header('location:./');
	}
}