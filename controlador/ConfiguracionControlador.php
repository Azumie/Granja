<?php 


/**
 * 
 */
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


	public function obtenerTiposHuevo () {
		$this->constructorSQL->select('tiposhuevo');
		if (isset($_GET['idTipoHuevo'])) {
			$this->constructorSQL->where('idTipoHuevo', '=', $_GET['idTipoHuevo']);
		}
		$tiposhuevo = $this->constructorSQL->ejecutarSQL();
		echo json_encode($tiposhuevo);
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

	public function obtenerTipoProducto(){
		$this->constructorSQL->select('tiposproducto');
		if (isset($_GET['idTipoProducto'])) {
			$this->constructorSQL->where('idTipoProducto', '=', $_GET['idTipoProducto']);
		}
		$tiposproducto = $this->constructorSQL->ejecutarSQL();
		echo json_encode($tiposproducto);
	}

	public function agregarProductos(){
		try {
			$this->constructorSQL->insert('productos', ['documentoProveedor' => $_POST['idProveedorProducto'],'idTipoProducto' => $_POST['idTipoProducto'], 'nombreProducto' => $_POST['nombreProducto']]);
			$this->constructorSQL->ejecutarSQL();
			echo json_encode('Eres una ganadora');
		} catch (PDOException $e) {
			echo json_encode('Fallida');
		}
	}

	public function agregarProveedor(){
		if (isset($_POST['documento'], $_POST['nombresProveedor'], $_POST['apellidosProveedor'], $_POST['telefonoProveedor'], $_POST['emailProveedor'])) {
			try {
				$documento =$_POST['nacionalidad'].'-'.$_POST['documento'];
				$this->constructorSQL->insert('personas', ['documento' => $documento,'idTipoPersona' => 4, 'nombrePersona' => $_POST['nombresProveedor'], 'apellidosPersona' => $_POST['apellidosProveedor'], 'telefonoPersona' => $_POST['telefonoProveedor'],'emailPersona' => $_POST['emailProveedor'], 'activoPersona' => 1]);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Eres una ganadora');
			} catch (PDOException $e) {
				echo json_encode('Fallida');
			}
		}else echo json_encode('No existe');
	}
	public function obtenerProveedor(){
		(isset($_GET['e'])) ? $persona = 'personas '.$_GET['e'] : $persona = 'personas';
		$persona = $this->constructorSQL->select($persona)->ejecutarSQL();
		foreach ($persona as $key => $value) {
			if ($persona[$key]->activoPersona == 1) {
				$persona[$key]->activoPersona = 'Activo';
			}else $persona[$key]->activoPersona = 'Inactivo';
		}
		echo json_encode($persona);
	}
}