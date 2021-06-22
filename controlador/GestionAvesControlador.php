<?php

/**
 *
 */
class GestionAvesControlador {
	function __construct(){
		$this->constructorSQL = new ConstructorSQL();
	}
	public function index(){
		$vistas = ['InicioGestionAves', 'Alimentacion', 'Mortalidad', 'Produccion'];
		require_once 'vista/includes/layout.php';
	}
	public function obtenerRecogidas(){
		$this->constructorSQL->select('inventarioproduccion GROUP BY fechaInventarioProduccion', 'sum(cantidadProduccion) AS produccion, fechaInventarioProduccion, idGalpon');
		$recogidas = $this->constructorSQL->ejecutarSQL();
		echo json_encode($recogidas);
	}
	public function agregarRecogidas () {
		if (isset($_POST['gProduccion'], $_POST['fechaProduccion'])) {
			try {
				$loteActivo = obtenerGalponesLotes();
				for ($i=0; $i < 8; $i++) { 
					if ($_POST[$i] =! '') {
					$this->constructorSQL->insert('inventarioproduccion', ['idLote' => $_POST['nombreTipoPersona']]);
					$this->constructorSQL->ejecutarSQL();
					echo json_encode($this->constructorSQL->getDatos());
					}
				}
				// if ($_POST['Grandes'] != '') {
				// 	// code...
				// }
				// if ($_POST['Medianos'] != '') {
				// 	// code...
				// }
				// if ($_POST['Pequeños'] != '') {
				// 	// code...
				// }
				// if ($_POST['Picados'] != '') {
				// 	// code...
				// }
				// if ($_POST['Debil'] != '') {
				// 	// code...
				// }
				// if ($_POST['Derramados'] != '') {
				// 	// code...
				// }
				// if ($_POST['Rusticos'] != '') {
				// 	// code...
				// }
				// if ($_POST['Rusticos'] != '') {
				// 	// code...
				// }
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
			}
		}
	}

	public function obtenerGalponesLotes(){
		$galponLote = $this->constructorSQL->select('galponeslotes')->where('activo', '=', '1')->where('idGalpon','=',$_GET['idGalpon'])->ejecutarSQL();
		echo json_encode($_GET['idGalpon']);
	}
}