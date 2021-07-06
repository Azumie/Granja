<?php 

/**
 * 
 */
class ReportesControlador {
	
	function __construct() {
		$this->constructorSQL = new ConstructorSQL();
	}

	public function index () {
		$vistas = [$_GET['p']];
		require_once 'vista/includes/layout.php';
	}

	public function graficaProduccion(){
		if (isset($_POST['fechaDesdeGrafico'], $_POST['fechaHastaGrafico'], $_POST['galponGraficaProduccion'])) {
			$this->constructorSQL->select('inventarioproduccion', 'sum(inventarioproduccion.cantidadProduccion) as suma, tiposhuevo.nombreTipoHuevo')->innerJoin('tiposhuevo','tiposhuevo.idTipoHuevo', '=', 'inventarioproduccion.idTipoHuevo')->innerJoin('galpones', 'galpones.idGalpon', '=', 'inventarioproduccion.idGalpon');
			if ($_POST['galponGraficaProduccion'] != 'Todos') {
				$this->constructorSQL->where('galpones.idGalpon', '=', $_POST['galponGraficaProduccion']);
			}
			$graficaProduccion = $this->constructorSQL->where('inventarioproduccion.fechaInventarioProduccion', '<=', $_POST['fechaHastaGrafico'])->where('inventarioproduccion.fechaInventarioProduccion', '>=', $_POST['fechaDesdeGrafico'])->where('inventarioproduccion.entrada', '=', 1)->groupBy('inventarioproduccion.idTipoHuevo')->ejecutarSQL();
			echo json_encode($graficaProduccion);
			// ELECT sum(inventarioproduccion.cantidadProduccion) as suma, tiposhuevo.nombreTipoHuevo FROM inventarioproduccion INNER JOIN tiposhuevo on tiposhuevo.idTipoHuevo = inventarioproduccion.idTipoHuevo WHERE inventarioproduccion.fechaInventarioProduccion <= '2021-07-04' and inventarioproduccion.fechaInventarioProduccion >= '2021-06-10' and inventarioproduccion.entrada = 1 GROUP BY inventarioproduccion.idTipoHuevo
		}else echo json_encode($_POST);
	}

	public function graficoAlimentacion(){
		if (isset($_REQUEST['fechaGraficoAlimentacion'], $_REQUEST['fechaFinGrAlimentacion'], $_REQUEST['idGalponGrAlimentacion'])) {
			// select sum(operaciongalpon.cantidadProducto) as suma, inventario.fechaOperacion from operaciongalpon inner Join inventario on inventario.idInventario = operaciongalpon.idInventario INNER JOIN productos on productos.idProducto = operaciongalpon.idProducto where productos.idTipoProducto = 1 AND inventario.fechaOperacion >= '2021-06-12' AND inventario.fechaOperacion <= '2021-07-05' GROUP BY inventario.fechaOperacion

			$this->constructorSQL->select('operaciongalpon', 'sum(operaciongalpon.cantidadProducto) as suma, inventario.fechaOperacion')->innerJoin('inventario', 'operaciongalpon.idInventario', '=', 'inventario.idInventario')->innerJoin('productos', 'productos.idProducto', '=', 'operaciongalpon.idProducto')->innerJoin('galpones', 'galpones.idGalpon', '=', 'operaciongalpon.idGalpon')->where('inventario.fechaOperacion', '>=', $_REQUEST['fechaGraficoAlimentacion'])->where('inventario.fechaOperacion', '<=', $_REQUEST['fechaFinGrAlimentacion'])->where('productos.idTipoProducto', '=', 1 );
			if ($_REQUEST['idGalponGrAlimentacion'] != 'Todos') {
				$this->constructorSQL->where('galpones.idGalpon', '=', $_REQUEST['idGalponGrAlimentacion']);
			}
			$galponLote = $this->constructorSQL->groupBy('inventario.fechaOperacion')->ejecutarSQL();
			echo json_encode($galponLote);
		}
	}
}