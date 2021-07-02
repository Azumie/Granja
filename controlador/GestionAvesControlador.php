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
				echo json_encode($tipoHuevo);
			} catch (PDOException $e) {
				echo json_encode('Error');
			}
		} else echo json_encode('No pasamos los post');
	}

	public function obtenerGalponesLotes(){
		$this->constructorSQL->select('galponeslotes')->where('activoGalponeLote', '=', '1')->where('idGalpon', '=', $_GET['idGalpon']);
		
		$galponLote = $this->constructorSQL->ejecutarSQL();
		echo json_encode($galponLote);
	}

	public function obtenerAlimentacion(){
		$this->constructorSQL->select('operaciongalpon', 'operaciongalpon.*, inventario.*, galpones.numeroGalpon, productos.nombreProducto')->innerJoin('inventario', 'operaciongalpon.idInventario', '=', 'inventario.idInventario')->innerJoin('galpones', 'galpones.idGalpon', '=', 'operaciongalpon.idGalpon')->innerJoin('productos', 'productos.idProducto','=', 'operaciongalpon.idProducto')->where('productos.idTipoProducto', '=', $_GET['idTipoProducto']);
		$galponLote = $this->constructorSQL->ejecutarSQL();
		echo json_encode($galponLote);
	}

	public function agregarOperacionGalpon(){
		if ((isset($_POST['idGalponEnLote'], $_POST['fechaOperacion'], $_POST['cantidadProducto']))) {
			try {
				$this->constructorSQL->insert('inventario',['fechaOperacion' => $_POST['fechaOperacion'], 'entrada' => 0]);
			// Ejecutando
			$ultID = $this->constructorSQL->ejecutarSQL();
			// Obteniendo lote activo
			$this->constructorSQL = new ConstructorSQL();
			$this->constructorSQL->select('galponeslotes')->where('activoGalponeLote', '=', '1')->where('idGalpon', '=', $_POST['idGalponEnLote']);
			$galponLote = $this->constructorSQL->ejecutarSQL();
			if (($ultID != '' ||  !is_null($ultID)) && ($galponLote != '' || !is_null($galponLote))) {
				$producto = 2;
				if (isset($_POST['alimentoAUsar'])) {
					$producto = $_POST['alimentoAUsar'];
				}
			// 	// Insertando en operación galpón
				$this->constructorSQL->insert('operaciongalpon', ['idInventario' => $ultID, 'idGalpon' => $_POST['idGalponEnLote'], 'idLote' => $galponLote[0]->idLote, 'cantidadProducto' => $_POST['cantidadProducto'], 'idProducto' => $producto]);
				$this->constructorSQL->ejecutarSQL();
			}
			echo json_encode('Agregado');
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
			}
		}
	}

	public function obtenerTipoHuevo(){
		$tiposHuevo = $this->constructorSQL->select('tiposhuevo')
			->where('activoHuevo', '=', 1)
			->ejecutarSQL();
		echo json_encode($tiposHuevo);
	}

}