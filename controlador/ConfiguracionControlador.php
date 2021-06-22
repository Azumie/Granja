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
			try {
				$this->constructorSQL->insert('tiposhuevo', ['nombreTipoHuevo' => $_POST['nombreTipoHuevo']]);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode($this->constructorSQL->getSql());
			} catch (PDOException $e) {
				echo json_encode('Operacion Fallida');
			}
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

	public function agregarTipoPersona () {
		if (isset($_POST['nombreTipoPersona'])) {
			try {
				$this->constructorSQL->insert('tipospersona', ['nombreTipoPersona' => $_POST['nombreTipoPersona']]);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode($this->constructorSQL->getDatos());
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
		$this->constructorSQL->select('tiposproducto');
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
			try {
				$documento =$_POST['nacionalidadProveedor'].'-'.$_POST['documentoProveedor'];
				$this->constructorSQL->insert('personas', ['documento' => $documento,'idTipoPersona' => 3, 'nombrePersona' => $_POST['nombresProveedor'], 'apellidosPersona' => $_POST['apellidosProveedor'], 'telefonoPersona' => $_POST['telefonoProveedor'],'emailPersona' => $_POST['emailProveedor'], 'activoPersona' => 1]);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Eres una ganadora');
			} catch (PDOException $e) {
				echo json_encode('Fallida');
			}
		}else echo json_encode('No existe');
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
			try {
				$documento =$_POST['nacionalidadCliente'].'-'.$_POST['documentoCliente'];
				$this->constructorSQL->insert('personas', ['documento' => $documento,'idTipoPersona' => 2, 'nombrePersona' => $_POST['nombresCliente'], 'apellidosPersona' => $_POST['apellidosCliente'], 'telefonoPersona' => $_POST['telefonoCliente'],'emailPersona' => $_POST['emailCliente'], 'activoPersona' => 1]);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Eres una ganadora');
			} catch (PDOException $e) {
				echo json_encode('Fallida');
				echo json_encode($e->getMessage());
			}
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
			try {
				$documento =$_POST['nacionalidadGalponero'].'-'.$_POST['documentoGalponero'];
				$this->constructorSQL->insert('personas', ['documento' => $documento,'idTipoPersona' => 1, 'nombrePersona' => $_POST['nombresGalponero'], 'apellidosPersona' => $_POST['apellidosGalponero'], 'telefonoPersona' => $_POST['telefonoGalponero'],'emailPersona' => $_POST['emailGalponero'], 'activoPersona' => 1]);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Eres una ganadora');
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
			}
		}else echo json_encode($_POST);
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
			
		if (isset($_GET['idTipoHuevo'])) {
			$this->constructorSQL->where('idTipoHuevo', '=', $_GET['idTipoHuevo']);
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

}