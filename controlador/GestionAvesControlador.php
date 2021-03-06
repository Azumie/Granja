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
		// select * from inventarioproduccion ip
		// inner join tiposhuevo tp on tp.idTipoHuevo = ip.idTipoHuevo
		// where ip.idGalpon = 1
		// and ip.idLote = 1
		// and ip.fechaInventarioProduccion = '2021-07-02'
		// and ip.entrada = 1
		$this->constructorSQL->select('inventarioproduccion', 'sum(cantidadProduccion) AS produccion, concat(fechaInventarioProduccion,idGalpon,idLote) AS id, inventarioproduccion.*')
			->where('entrada', '=', '1')
			->groupBy('fechaInventarioProduccion, idGalpon, idLote')
			->ejecutarSQL();
		$recogidas = $this->constructorSQL->ejecutarSQL();
		echo json_encode($recogidas);
	}

	public function obtenerdetalleRecogida () {
		if (isset($_POST['idGalpon'] , $_POST['idLote'], $_POST['fechaInventarioProduccion'])) {
			try {
				$ip = 'inventarioproduccion';
				$th = 'tiposhuevo';
				$detalleRecogida = $this->constructorSQL->select($ip)
					->innerJoin($th, "$th.idTipoHuevo", '=', "$ip.idTipoHuevo")
					->where("$ip.idLote", '=', $_POST['idLote'])
					->where("$ip.idGalpon", '=', $_POST['idGalpon'])
					->where("$ip.fechaInventarioProduccion", '=', $_POST['fechaInventarioProduccion'])
					->where("$ip.entrada", '=', 1)
					->ejecutarSQL();
				echo json_encode($detalleRecogida);
			} catch (PDOException $e) {
				echo json_encode('Error al obtener el Detalle de la produccion');
			}
		}
	}

	public function agregarRecogidas () {
		if (isset($_POST['gProduccion'], $_POST['fechaProduccion'])) {
			try {
				if (isset($_POST['editar'])) {
					foreach ($_POST['editar'] as $idInventarioProduccion => $cantidadProduccion) {
						$sql = $this->constructorSQL->update('inventarioproduccion', [
								'cantidadProduccion' =>  $cantidadProduccion
							])
							->where('idInventarioProduccion', '=', $idInventarioProduccion)
							->ejecutarSQL();
					}
				}
				if (isset($_POST['agregar'])) {
					foreach ($_POST['agregar'] as $idTipoHuevo => $cantidadProduccion) {
						if ($cantidadProduccion != '') {
							$this->constructorSQL->insert('inventarioproduccion', [
									'idGalpon' => $_POST['gProduccion'],
									'idLote' => $_POST['loteActivo'],
									'fechaInventarioProduccion' => $_POST['fechaProduccion'],
									'idTipoHuevo' => $idTipoHuevo,
									'cantidadProduccion' => $cantidadProduccion
								])
								->ejecutarSQL();
						}
					}
				}
				echo json_encode('Se agrego la Produccion conrrectamente');
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
			}
		} else echo json_encode('No pasamos los post');
		// echo json_encode($_POST);
	}

	public function obtenerGalponesLotes(){
		$this->constructorSQL->select('galponeslotes')->where('activo', '=', '1');
		
		$galponLote = $this->constructorSQL->ejecutarSQL();
		echo json_encode($galponLote);
	}

	public function obtenerAlimentacion(){
		$this->constructorSQL->select('operaciongalpon', 'operaciongalpon.*, inventario.*, galpones.numeroGalpon, productos.nombreProducto')->innerJoin('inventario', 'operaciongalpon.idInventario', '=', 'inventario.idInventario')->innerJoin('galpones', 'galpones.idGalpon', '=', 'operaciongalpon.idGalpon')->innerJoin('productos', 'productos.idProducto','=', 'operaciongalpon.idProducto')->where('productos.idTipoProducto', '=', $_GET['idTipoProducto']);
		$galponLote = $this->constructorSQL->ejecutarSQL();
		echo json_encode($galponLote);
	}

	

	public function obtenerTipoHuevo(){
		$tiposHuevo = $this->constructorSQL->select('tiposhuevo')
			->where('activoHuevo', '=', 1)
			->ejecutarSQL();
		echo json_encode($tiposHuevo);
	}

}