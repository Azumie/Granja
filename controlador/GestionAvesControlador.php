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
				$this->constructorSQL->select('tiposhuevo')->where('activoHuevo', '=', '1');
				$tipoHuevo = $this->constructorSQL->ejecutarSQL();
				for ($i=0; $i < count($tipoHuevo); $i++) {
					foreach($_POST as $campo => $valor){
						if ($campo == $tipoHuevo[$i]->nombreTipoHuevo && $valor != "") {
							$this->constructorSQL->insert('inventarioproduccion', ['idLote' => $_POST['loteActivo'], 'idGalpon' => $_POST['gProduccion'], 'idTipoHuevo' => $tipoHuevo[$i]->idTipoHuevo, 'fechaInventarioProduccion' => $_POST['fechaProduccion'], 'cantidadProduccion' => $valor]);
							$this->constructorSQL->ejecutarSQL();
						}
					} 
				}
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
			}
		}
	}

	public function obtenerGalponesLotes(){
		$this->constructorSQL->select('galponeslotes')->where('activo', '=', '1');
		$galponLote = $this->constructorSQL->ejecutarSQL();
		echo json_encode($galponLote);
	}
}