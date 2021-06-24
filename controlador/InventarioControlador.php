<?php
/**
 *
 */
class InventarioControlador
{

	function __construct() {
		$this->constructorSQL = new ConstructorSQL();
	}

	public function index(){
		$vistas = ['InicioInventario'];
		require_once 'vista/includes/layout.php';
	}

	public function agregarInventario(){
		if (isset($_POST['fechaDespacho'], $_POST['idCliente'], $_POST['precinto'], $_POST['idTipoHuevoDespacho'], $_POST['cantidadHuevos'])) {
			try {
				// $this->constructorSQL->select('inventarioproduccion')->where('fechaInventarioProduccion', '=', $_POST['fechaDespacho']);
				// $existe = $this->constructorSQL->ejecutarSQL();
				//  $this->constructorSQL->select('galponeslotes', ' MIN(idGalpon) as idGalpon, idLote')->where('activo', '=', 1);
				//  $lote = $this->constructorSQL->ejecutarSQL();
				// if ($existe == [] || $lote == []) {
				// 	$this->constructorSQL = new ConstructorSQL();
				// 	$this->constructorSQL->insert('inventarioproduccion', ['idLote' => $_POST['loteActivo'], 'idGalpon' => $_POST['gProduccion'], 'idTipoHuevo' => $tipoHuevo[$i]->idTipoHuevo, 'fechaInventarioProduccion' => $_POST['fechaProduccion'], 'cantidadProduccion' => $valor]);
				// 	$this->constructorSQL->ejecutarSQL();
				// }
				// for ($i=0; $i < count($tipoHuevo); $i++) {
				// 	foreach($_POST as $campo => $valor){
				// 		if ($campo == $tipoHuevo[$i]->nombreTipoHuevo && $valor != "") {
				// 			$this->constructorSQL->insert('inventarioproduccion', ['idLote' => $_POST['loteActivo'], 'idGalpon' => $_POST['gProduccion'], 'idTipoHuevo' => $tipoHuevo[$i]->idTipoHuevo, 'fechaInventarioProduccion' => $_POST['fechaProduccion'], 'cantidadProduccion' => $valor]);
				// 			$this->constructorSQL->ejecutarSQL();
				// 		}
				// 	} 
				// }
				echo json_encode($existe);
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
			}
		}
	}
}