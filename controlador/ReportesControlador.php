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
		if (isset($_REQUEST['fechaDesdeGrafico'], $_REQUEST['fechaHastaGrafico'], $_REQUEST['galponGraficaProduccion'])) {
			$this->constructorSQL->select('inventarioproduccion', 'sum(inventarioproduccion.cantidadProduccion) as suma, tiposhuevo.nombreTipoHuevo')->innerJoin('tiposhuevo','tiposhuevo.idTipoHuevo', '=', 'inventarioproduccion.idTipoHuevo')->innerJoin('galpones', 'galpones.idGalpon', '=', 'inventarioproduccion.idGalpon');
			if ($_REQUEST['galponGraficaProduccion'] != 'Todos') {
				$this->constructorSQL->where('galpones.idGalpon', '=', $_REQUEST['galponGraficaProduccion']);
			}
			$graficaProduccion = $this->constructorSQL->where('inventarioproduccion.fechaInventarioProduccion', '<=', $_REQUEST['fechaHastaGrafico'])->where('inventarioproduccion.fechaInventarioProduccion', '>=', $_REQUEST['fechaDesdeGrafico'])->where('inventarioproduccion.entrada', '=', 1)->groupBy('inventarioproduccion.idTipoHuevo')->ejecutarSQL();
			echo json_encode($graficaProduccion);
			// ELECT sum(inventarioproduccion.cantidadProduccion) as suma, tiposhuevo.nombreTipoHuevo FROM inventarioproduccion INNER JOIN tiposhuevo on tiposhuevo.idTipoHuevo = inventarioproduccion.idTipoHuevo WHERE inventarioproduccion.fechaInventarioProduccion <= '2021-07-04' and inventarioproduccion.fechaInventarioProduccion >= '2021-06-10' and inventarioproduccion.entrada = 1 GROUP BY inventarioproduccion.idTipoHuevo
		}else echo json_encode($_REQUEST);
	}

	public function graficoAlimentacion(){
		if (isset($_REQUEST['fechaGraficoAlimentacion'], $_REQUEST['fechaFinGrAlimentacion'], $_REQUEST['idGalponGrAlimentacion'])) {
			$alimentacion = $this->constructorSQL->select('operaciongalpon', 'sum(operaciongalpon.cantidadProduccion) as suma')->innerJoin('galpon', 'galpon.idGalpon', '=', 'operaciongalpon.idGalpon')->where('galpon.activo', '=', 1)->ejecutarSQL();

		}
	}
}