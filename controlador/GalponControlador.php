<?php
/**
 *
 */
class GalponControlador{

	function __construct() {
		$this->ConstructorSQL = new ConstructorSQL();
	}

	public function index(){
		$vistas = ['InicioGalpon', 'AgregarGalpon'];
		require_once 'vista/includes/layout.php';
	}
	public function agregarGalpon(){
		if (isset($_POST['fechaGalpon'], $_POST['numeroGalpon'], $_POST['areaUtilGalpon'], $_POST['ConfinamientoGalpon'])) {
			try {
				$this->ConstructorSQL->insert('galpones', ['fechaA' => $_POST['fechaGalpon'],'numeroGalpon' => $_POST['numeroGalpon'], 'areaUtil' => $_POST['areaUtilGalpon'],  'confinamiento' => $_POST['ConfinamientoGalpon'], 'idGranja' => 1]);
				$this->ConstructorSQL->ejecutarSQL();
				echo json_encode('bien');
			} catch (PDOException $e) {
				echo json_encode('Fallida');
			}
			
		}
	}
	public function obtenerGalpones(){
		$galpon = $this->ConstructorSQL->select('galpones')->ejecutarSQL();
		echo json_encode($galpon);
	}
}