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
		$campos = [
		'fechaCreacionGalpon' => 
			[
				'fecha',
			],
		'numeroGalpon' => [
				'entero',
				'mayorQue' => 0,
				'menorQue' => 500
			],
		'areaUtilGalpon' => [
			'flotante',
			'menorQue' => 2000
		],
		'ConfinamientoGalpon' => [
			'confinamiento'
		]
	];

	$validacion = new Validacion($campos);
	// echo '<pre>'; var_dump($validacion->validar()); echo '</pre>';

		// if (isset($_POST['fechaCreacionGalpon'], $_POST['numeroGalpon'], $_POST['areaUtilGalpon'], $_POST['ConfinamientoGalpon'])) {
		// 	if ($_POST['fechaCreacionGalpon'] != null && $_POST['fechaCreacionGalpon']) {
		// 		if (($_POST['numeroGalpon'] > 0 && $_POST['numeroGalpon'] < 500) && preg_match('/\D/', $_POST['numeroGalpon']) == 0) {
		// 			if ($_POST['areaUtilGalpon'] != '' && $_POST['areaUtilGalpon'] != null && preg_match("/[^0-9.,]/", $_POST['areaUtilGalpon']) != true && $_POST['areaUtilGalpon'] >= 100 && $_POST['areaUtilGalpon'] <= 2000) {
		// 				if ($_POST['ConfinamientoGalpon'] == 'P' || $_POST['ConfinamientoGalpon'] == 'J') {
		if ($validacion->validar()) {
			echo json_encode('todos los datos estan perfectos');
		}else {
			echo json_encode('error en la validacion');
		}
		// try {
		// 	$this->ConstructorSQL->insert('galpones', ['fechaCreacionGalpon' => $_POST['fechaCreacionGalpon'],'numeroGalpon' => $_POST['numeroGalpon'], 'areaUtil' => $_POST['areaUtilGalpon'],  'confinamiento' => $_POST['ConfinamientoGalpon'], 'idGranja' => 1]);
		// 	$this->ConstructorSQL->ejecutarSQL();
		// 	echo json_encode('Eres una ganadora');
		// } catch (PDOException $e) {
		// 	echo json_encode('Fallida');
		// }
		// }
		// 			}else echo json_encode(preg_match("/[0-9.,]/", $_POST['areaUtilGalpon']));
		// 		}else { 
		// 		echo json_encode('No pasamos TTnTT');
		// 		}
		// 	}
			
			
			
			
		// }else echo json_encode('Campos Vacíos');
	}
	
	public function obtenerGalpones(){
		try {
			(isset($_GET['e'])) ? $galpon = 'galpones '.$_GET['e'] : $galpon = 'galpones';
			$galpon = $this->ConstructorSQL->select($galpon)
				->where('idGranja', '=', 1)
				->ejecutarSQL();
			echo json_encode($galpon);
		} catch (PDOException $e) {
			echo json_encode($e->getMessage());
		}
	}
}