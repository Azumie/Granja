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
				$this->constructorSQL->select('galponeslotes', ' MIN(idGalpon) as idGalpon, idLote')->where('activo', '=', 1);
				 $lote = $this->constructorSQL->ejecutarSQL();
				 if ($lote != []) {
				 	$this->constructorSQL = new ConstructorSQL();
				 	//Rectificando que existe en inventario produccion un registro con una fecha como la que entra
				 	$this->constructorSQL->select('inventarioproduccion')->where('fechaInventarioProduccion', '=', strval($_POST['fechaDespacho']));
				 	$inventarioProduccion = $this->constructorSQL->ejecutarSQL();
				 	$this->constructorSQL = new ConstructorSQL();
				 	// Rectificando que existe en Despachos un mismo cliente
				 	$this->constructorSQL->select('despachos')->where('documentoCliente', '=', $_POST['idCliente']);
				 	$despachos = $this->constructorSQL->ejecutarSQL();
			 		$this->constructorSQL = new ConstructorSQL();
				 	if ($inventarioProduccion == [] || $despachos == []) {
				 		// Si existe un registro de salida en inventario produccion y existe el nombre del cliente toma el idDespacho de ese proceso
				 		$this->constructorSQL->insert('despachos', ['documentoCliente' => $_POST['idCliente'], 'precinto'=> $_POST['precinto']]);
				 		$despachos = $this->constructorSQL->ejecutarSQL();
				 		$this->constructorSQL = new ConstructorSQL();
				 		// Insertando en inventario produccion y tomando su id
				 		$this->constructorSQL->insert('inventarioproduccion', ['idLote' => $lote[0]->idLote, 'idGalpon' => $lote[0]->idGalpon, 'idTipoHuevo' => $_POST['idTipoHuevoDespacho'], 'fechaInventarioProduccion' => $_POST['fechaDespacho'], 'cantidadProduccion' => $_POST['cantidadHuevos'], 'entrada' => 0]);
				 		$inventarioProduccion = $this->constructorSQL->ejecutarSQL();
				 		$this->constructorSQL = new ConstructorSQL();
				 		// Insertando en detalledespacho y tomando su id
				 		$this->constructorSQL->insert('detalledespachos', ['idInventarioProduccion' => $inventarioProduccion, 'idDespachos' => $despachos]);
				 		$this->constructorSQL->ejecutarSQL();
				 	} else {
				 		$this->constructorSQL->insert('inventarioproduccion', ['idLote' => $lote[0]->idLote, 'idGalpon' => $lote[0]->idGalpon, 'idTipoHuevo' => $_POST['idTipoHuevoDespacho'], 'fechaInventarioProduccion' => $_POST['fechaDespacho'], 'cantidadProduccion' => $_POST['cantidadHuevos'], 'entrada' => 0]);
				 		$inventarioProduccion = $this->constructorSQL->ejecutarSQL();
				 		$this->constructorSQL = new ConstructorSQL();
				 		$this->constructorSQL->insert('detalledespachos', ['idInventarioProduccion' => $inventarioProduccion, 'idDespachos' => $despachos[0]->idDespachos]);
				 		$this->constructorSQL->ejecutarSQL();
				 	}
			 	}
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
			}
		}
	}
	public function obtenerDespachos(){
		$this->constructorSQL->select('inventarioproduccion', 'sum(cantidadProduccion) AS produccion, fechaInventarioProduccion, idGalpon')->where('entrada', '=', 1)->groupBy('fechaInventarioProduccion');
		$recogidas = $this->constructorSQL->ejecutarSQL();
		echo json_encode($recogidas);
	}
}