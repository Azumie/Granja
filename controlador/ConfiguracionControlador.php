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
				$this->constructorSQL->insert('granjas', ['nombreGranja' => $_POST['nombreGranja'],
																						'ubicacion'		 => $_POST['ubicacionGranja']]);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Operacion Exitosa');
			} catch (PDOException $e) {
				echo json_encode('Operacion Fallida');
			}
		}
	}

	public function obtenerGranjas () {
		$granjas = $this->constructorSQL->select('granjas')->ejecutarSQL();
		echo json_encode($granjas);
	}

	public function editarGranja () {
		if (isset($_POST['nombreGranja'], $_POST['ubicacionGranja'], $_POST['idGranja'])) {
			try {
				$this->constructorSQL->update('granjas', ['nombreGranja' => $_POST['nombreGranja'],
																									'ubicacion'		 => $_POST['ubicacionGranja']]);
				$this->constructorSQL->where('idGranja', '=', $_POST['idGranja']);
				$this->constructorSQL->ejecutarSQL();
				echo json_encode('Operacion Exitosa');
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
			}
		}
	}

}