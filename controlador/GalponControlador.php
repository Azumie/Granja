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
		if (isset($_POST['fechaCreacionGalpon'], $_POST['numeroGalpon'], $_POST['areaUtilGalpon'], $_POST['ConfinamientoGalpon'])) {
			if ($_POST['fechaCreacionGalpon'] != null && $_POST['fechaCreacionGalpon']) {
				if (($_POST['numeroGalpon'] > 0 && $_POST['numeroGalpon'] < 500) && preg_match('/\D/', $_POST['numeroGalpon']) == 0) {
					if ($_POST['areaUtilGalpon'] != '' && $_POST['areaUtilGalpon'] != null && preg_match("/[^0-9.,]/", $_POST['areaUtilGalpon']) != true && $_POST['areaUtilGalpon'] >= 100 && $_POST['areaUtilGalpon'] <= 2000) {
						if ($_POST['ConfinamientoGalpon'] == 'P' || $_POST['ConfinamientoGalpon'] == 'J') {
							
							try {
								$this->ConstructorSQL->insert('galpones', ['fechaCreacionGalpon' => $_POST['fechaCreacionGalpon'],'numeroGalpon' => $_POST['numeroGalpon'], 'areaUtil' => $_POST['areaUtilGalpon'],  'confinamiento' => $_POST['ConfinamientoGalpon'], 'idGranja' => 1]);
								$this->ConstructorSQL->ejecutarSQL();
								echo json_encode('Eres una ganadora');
							} catch (PDOException $e) {
								echo json_encode('Fallida');
							}
						}
					}else echo json_encode(preg_match("/[0-9.,]/", $_POST['areaUtilGalpon']));
				}else { 
				echo json_encode('No pasamos TTnTT');
				}
			}
			
			
			
			
		}else echo json_encode('Campos Vacíos');
	}
	public function obtenerGalpones(){
		$galpon = $this->ConstructorSQL->select('galpones')->ejecutarSQL();
		echo json_encode($galpon);
	}
}