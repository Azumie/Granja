<?php 

class ConfiguracionControlador
{
	
	function __construct() {
		$this->constructorSQL = new ConstructorSQL();
	}

	public function index () {
		$vistas = ['InicioConfiguracion', 'TiposHuevo', 'TiposPersona', 'TiposVenta', 'TiposProducto', 'Usuarios', 'Granjas'];
		require_once 'vista/includes/layout.php';
	}

	public function agregarGranja () {
		if (isset($_POST['nombreGranja'], $_POST['ubicacionGranja'])) {
			try {
				$this->constructorSQL->insert('granjas', ['nombreGranja' => $_POST['nombreGranja'],	'ubicacionGranja'  => $_POST['ubicacionGranja']]);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Operacion Exitosa');
			} catch (PDOException $e) {
				echo json_encode('Operacion Fallida');
			}
		}
	}

	public function obtenerGranjas () {
		$this->constructorSQL->select('granjas');
		if (isset($_GET['idGranja'])) {
			$this->constructorSQL->where('idGranja', '=', $_GET['idGranja']);
		}
		$granjas = $this->constructorSQL->ejecutarSQL();
		echo json_encode($granjas);
	}

	public function editarGranja () {
		if (isset($_POST['nombreGranja'], $_POST['ubicacionGranja'], $_POST['idGranja'])) {
			try {
				$this->constructorSQL->update('granjas', ['nombreGranja' => $_POST['nombreGranja'], 'ubicacionGranja'	=> $_POST['ubicacionGranja']]);
				$this->constructorSQL->where('idGranja', '=', $_POST['idGranja']);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Operacion Exitosa');
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
			}
		}
	}

	public function agregarTipoHuevo () {
		if (isset($_POST['nombreTipoHuevo'])) {
			if (preg_match('/[^a-zA-Zñáéíóú ]/', $_POST['nombreTipoHuevo']) == 0 && strlen($_POST['nombreTipoHuevo']) <= 45 && strlen($_POST['nombreTipoHuevo']) >= 3) {
try {
$this->constructorSQL->insert('tiposhuevo', ['nombreTipoHuevo' => $_POST['nombreTipoHuevo']]);
$this->constructorSQL->ejecutarSQL();
echo json_encode('Éxito: El tipo de huevo fue agregado exitosamente.');
} catch (PDOException $e) {
echo json_encode('Error: El tipo de huevo ingresado ya existe.');
}
				
			}else echo json_encode('Error: El tipo de huevo no debe contener caracteres especiales o dígitos.');
		}
	}

	public function editarTipoHuevo () {
		if (isset($_POST['nombreTipoHuevo'], $_POST['idTipoHuevo'])) {
			try {
				$this->constructorSQL->update('tiposhuevo', ['nombreTipoHuevo' => $_POST['nombreTipoHuevo']]);
				$this->constructorSQL->where('idTipoHuevo', '=', $_POST['idTipoHuevo']);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Operacion Exitosa');
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
			}
		}
	}

	public function obtenerTiposPersona () {
		$this->constructorSQL->select('tipospersona');
		if (isset($_GET['idTipoPersona'])) {
			$this->constructorSQL->where('idTipoPersona', '=', $_GET['idTipoPersona']);
		}
		$tiposhuevo = $this->constructorSQL->ejecutarSQL();
		echo json_encode($tiposhuevo);
	}

	public function obtenerTipoProducto () {
		$this->constructorSQL->select('tiposproducto')->where('nombreTipoProducto', '!=', 'Gallina');
		$tipoProducto = $this->constructorSQL->ejecutarSQL();
		echo json_encode($tipoProducto);
	}


	public function agregarProductos(){
		if (isset($_POST['idProveedorProducto'], $_POST['idTipoProducto'], $_POST['nombreProducto'])) {
			try {
				$this->constructorSQL->insert('productos', ['documentoProveedor' => $_POST['idProveedorProducto'],'idTipoProducto' => $_POST['idTipoProducto'], 'nombreProducto' => $_POST['nombreProducto']]);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Eres una ganadora');
			} catch (PDOException $e) {
				echo json_encode('Fallida');
			}
		}else echo json_decode('no existe');
	}

	public function obtenerProducto(){
		$productos = 'j';
		$this->constructorSQL->select('productos');
		if (isset($_GET['documentoProveedor'])) {
			$this->constructorSQL->where('documentoProveedor', '=', $_GET['documentoProveedor']);
		}else {$productos.='Nop';}
		if (isset($_GET['idProducto'])) {
			$this->constructorSQL->where('idProducto', '=', $_GET['idProducto']);
		}else{
		$productos .= 'No existe';}
		if (isset($_GET['idTipoProducto'])) {
			$this->constructorSQL->where('idTipoProducto', '=', $_GET['idTipoProducto']);
		}
		if (isset($_GET['tipoProducto'])) {
			$this->constructorSQL->where('idTipoProducto', '=', $_GET['tipoProducto']);
		}else{$productos .= 'No ta producto';}
		$productos = $this->constructorSQL->ejecutarSQL();
		echo json_encode($productos);
	}

	public function agregarProveedor(){
		if (isset($_POST['documentoProveedor'], $_POST['nombresProveedor'], $_POST['apellidosProveedor'], $_POST['telefonoProveedor'], $_POST['emailProveedor'])) {
			$resp = $this->agregandoPersona($_POST['documentoProveedor'], $_POST['nacionalidadProveedor'], $_POST['nombresProveedor'], $_POST['apellidosProveedor'], $_POST['telefonoProveedor'], $_POST['emailProveedor'], 3);
			echo json_encode($resp);
		}else echo json_encode('Error: Al agregar proveedor.');
	}
	public function editarProveedor () {
		if (isset($_POST['documentoProveedor'], $_POST['nombresProveedor'], $_POST['apellidosProveedor'], $_POST['telefonoProveedor'], $_POST['emailProveedor'])) {
			try {
				$documento =$_POST['nacionalidadProveedor'].'-'.$_POST['documentoProveedor'];
				$this->constructorSQL->update('personas', ['nombrePersona' => $_POST['nombresProveedor'], 'apellidosPersona' => $_POST['apellidosProveedor'], 'telefonoPersona' => $_POST['telefonoProveedor'],'emailPersona' => $_POST['emailProveedor'], 'activoPersona' => 1]);
				$this->constructorSQL->where('documento', '=', $documento);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Proveedor editado correctamente');
			} catch (PDOException $e) {
				echo json_encode('No se pudo editar el Proveedor');
			}
		}else echo json_encode('Pro favor introduzca todos los campos');
	}
	public function obtenerProveedor(){
		$this->constructorSQL->select('personas')
			->where('idTipoPersona', '=', '3');
			
		if (isset($_GET['documentoProveedor'])) {
			$this->constructorSQL->where('documento', '=', $_GET['documentoProveedor']);
		}
		$persona = $this->constructorSQL->ejecutarSQL();
		echo json_encode($persona);
	}

	public function obtenerCliente(){
		$this->constructorSQL->select('personas')
			->where('idTipoPersona', '=', '2');
			
		if (isset($_GET['documentoCliente'])) {
			$this->constructorSQL->where('documento', '=', $_GET['documentoCliente']);
		}
		$persona = $this->constructorSQL->ejecutarSQL();
		echo json_encode($persona);
	}

	public function agregarCliente(){
		if (isset($_POST['documentoCliente'], $_POST['nombresCliente'], $_POST['apellidosCliente'], $_POST['telefonoCliente'], $_POST['emailCliente'])) {
			$resp = $this->agregandoPersona($_POST['documentoCliente'], $_POST['nacionalidadCliente'], $_POST['nombresCliente'], $_POST['apellidosCliente'], $_POST['telefonoCliente'], $_POST['emailCliente'], 2);
			echo json_encode($resp);
		}else echo json_encode('No existe');
	}

	public function editarCliente () {
		if (isset($_POST['documentoCliente'], $_POST['nombresCliente'], $_POST['apellidosCliente'], $_POST['telefonoCliente'], $_POST['emailCliente'])) {
			try {
				$documento =$_POST['nacionalidadCliente'].'-'.$_POST['documentoCliente'];
				$this->constructorSQL->update('personas', ['nombrePersona' => $_POST['nombresCliente'], 'apellidosPersona' => $_POST['apellidosCliente'], 'telefonoPersona' => $_POST['telefonoCliente'],'emailPersona' => $_POST['emailCliente'], 'activoPersona' => 1]);
				$this->constructorSQL->where('documento', '=', $documento);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Cliente editado correctamente');
			} catch (PDOException $e) {
				echo json_encode('No se pudo editar el Cliente');
			}
		}else echo json_encode('Pro favor introduzca todos los campos');
	}

	public function obtenerGalponero(){
		$this->constructorSQL->select('personas')
			->where('idTipoPersona', '=', '1');
			
		if (isset($_GET['documentoGalponero'])) {
			$this->constructorSQL->where('documento', '=', $_GET['documentoGalponero']);
		}
		$persona = $this->constructorSQL->ejecutarSQL();
		echo json_encode($persona);
	}

	public function agregarGalponero(){
		if (isset($_POST['documentoGalponero'], $_POST['nombresGalponero'], $_POST['apellidosGalponero'], $_POST['telefonoGalponero'], $_POST['emailGalponero'])) {
			$resp = $this->agregandoPersona($_POST['documentoGalponero'], $_POST['nacionalidadGalponero'], $_POST['nombresGalponero'], $_POST['apellidosGalponero'], $_POST['telefonoGalponero'], $_POST['emailGalponero'], 1);
			echo json_encode($resp);
		}else echo json_encode('Error: Al agregar Galponero.');
	}

	public function editarGalponero () {
		if (isset($_POST['documentoGalponero'], $_POST['nombresGalponero'], $_POST['apellidosGalponero'], $_POST['telefonoGalponero'], $_POST['emailGalponero'])) {
			try {
				$documento =$_POST['nacionalidadGalponero'].'-'.$_POST['documentoGalponero'];
				$this->constructorSQL->update('personas', ['nombrePersona' => $_POST['nombresGalponero'], 'apellidosPersona' => $_POST['apellidosGalponero'], 'telefonoPersona' => $_POST['telefonoGalponero'],'emailPersona' => $_POST['emailGalponero'], 'activoPersona' => 1]);
				$this->constructorSQL->where('documento', '=', $documento);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Galponero editado correctamente');
			} catch (PDOException $e) {
				echo json_encode('No se pudo editar el Galponero');
			}
		}else echo json_encode('Pro favor introduzca todos los campos');
	}

	public function obtenerTipoHuevo(){
		$this->constructorSQL->select('tiposhuevo');
			
		if (isset($_GET['where'])) {
			$this->constructorSQL->where('activoHuevo', '=', 1);
		}
		$tiposhuevo = $this->constructorSQL->ejecutarSQL();
		echo json_encode($tiposhuevo);
	}

	public function obtenerUsuario(){
		$this->constructorSQL->select('usuarios');
			
		if (isset($_GET['idUsuario'])) {
			$this->constructorSQL->where('idUsuario', '=', $_GET['idUsuario']);
		}
		$usuario = $this->constructorSQL->ejecutarSQL();
		echo json_encode($usuario);
	}

	public function agregarUsuario(){
		if (isset($_POST['preguntaUsuario'], $_POST['nombreUsuario'], $_POST['claveUsuario'], $_POST['respuestaUsuario'], $_POST['documentoUsuario'])) {
			try {
				$this->constructorSQL->insert('usuarios', ['documento' => $_POST['documentoUsuario'],'idGranja' => 1, 'nombreUsuario' => $_POST['nombreUsuario'], 'claveUsuario' => $_POST['claveUsuario'], 'pregunta' => $_POST['preguntaUsuario'],'respuesta' => $_POST['respuestaUsuario'], 'activoUsuario' => 1]);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Eres una ganadora');
			} catch (PDOException $e) {
				echo json_encode('No se agrego el usuario correctamente');
			}
		}else echo json_encode('No existe');
	}

	public function editarUsuario(){
		if (isset($_POST['preguntaUsuario'], $_POST['nombreUsuario'], $_POST['claveUsuario'], $_POST['respuestaUsuario'], $_POST['documentoUsuario'], $_POST['idUsuario'])) {
			try {
				$this->constructorSQL->update('usuarios', ['nombreUsuario' => $_POST['nombreUsuario'], 'claveUsuario' => $_POST['claveUsuario'], 'pregunta' => $_POST['preguntaUsuario'],'respuesta' => $_POST['respuestaUsuario'], 'activoUsuario' => 1]);
				$this->constructorSQL->where('idUsuario', '=', $_POST['idUsuario']);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Usuario editado correctamente');
			} catch (PDOException $e) {
				echo json_encode('No se editado el usuario correctamente');
			}
		}else echo json_encode('Por favor introduzca todos los datos');
	}

	public function agregarLineaGenetica(){
		if (isset($_POST['nombreLineaGenetica'])) {
			try {
				$this->constructorSQL->insert('lineagenetica', ['nombreLineaGenetica' => $_POST['nombreLineaGenetica']]);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Eres una ganadora');
			} catch (PDOException $e) {
				echo json_encode('Fallida');
			}
		}else echo json_encode('No existe');
	}

	public function obtenerLineaGenetica(){
		$this->constructorSQL->select('lineagenetica');
			
		if (isset($_GET['idLineaGenetica'])) {
			$this->constructorSQL->where('idLineaGenetica', '=', $_GET['idLineaGenetica']);
		}
		$lineaGenetica = $this->constructorSQL->ejecutarSQL();
		echo json_encode($lineaGenetica);
	}

	public function obtenerCompra(){
		$this->constructorSQL->select('usuarios');
			
		if (isset($_GET['idUsuario'])) {
			$this->constructorSQL->where('idUsuario', '=', $_GET['idUsuario']);
		}
		$usuario = $this->constructorSQL->ejecutarSQL();
		echo json_encode($usuario);
	}

	public function agregarCompra(){
		if (isset($_POST['idProveedorProducto'], $_POST['fechaCompraProducto'], $_POST['claveUsuario'], $_POST['respuestaUsuario'], $_POST['DocumentoUsuario'])) {
			try {
				$this->constructorSQL->insert('usuarios', ['documento' => $_POST['DocumentoUsuario'],'idGranja' => 1, 'nombreUsuario' => $_POST['nombreUsuario'], 'claveUsuario' => $_POST['claveUsuario'], 'pregunta' => $_POST['preguntaUsuario'],'respuesta' => $_POST['respuestaUsuario'], 'activoUsuario' => 1]);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Eres una ganadora');
			} catch (PDOException $e) {
				echo json_encode('Fallida');
			}
		}else echo json_encode('No existe');
	}

	public function agregandoPersona($documentoP, $nacionalidaP, $nombre, $apellido, $telefono, $email, $tipoPersona){
		$resp = "";
		if ($documentoP > 5000000 && $documentoP < 40000000 && preg_match('/\D/', $documentoP) == 0) {
				if (preg_match('/[^a-zA-Z ]/', $nombre) == 0 && strlen($nombre) < 45 && strlen($nombre) > 1) {
					if (preg_match('/[^a-zA-Z ]/', $apellido) == 0 && strlen($apellido) < 45 && strlen($apellido) > 1) {
            			if (preg_match('/(^|416|424|412|426| {3})([0-9]+)/', $telefono) == 1 && strlen($telefono) == 11 && preg_match('/\D/', $telefono) == 0) {
              				if (preg_match('/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+[a-zA-Z]{3})+$/',  $email) == 1 && strlen($email) <= 30) { 
try {
	$documento =$nacionalidaP.'-'.$documentoP;
	$this->constructorSQL->insert('personas', ['documento' => $documento,'idTipoPersona' => $tipoPersona, 'nombrePersona' => $nombre, 'apellidosPersona' => $apellido, 'telefonoPersona' => $telefono,'emailPersona' => $email, 'activoPersona' => 1]);
	$this->constructorSQL->ejecutarSQL();
	$resp = 'Éxito: La persona fue agregada satisfactoriamente.';
} catch (PDOException $e) {
	$resp = 'Error: Al agregar a persona.';
}
              				}else $resp ='Error: Email persona no consta con el formato válido';
            			}else $resp ='Error: Teléfono persona no consta con el formato válido';
					}else $resp ='Error: Apellido persona no debe contener dígitos o caracteres especiales.';
				}else $resp ='Error: Nombre persona no debe contener dígitos o caracteres especiales.';
			}else $resp ='Error: Documento debe ser entero.';
	}

}