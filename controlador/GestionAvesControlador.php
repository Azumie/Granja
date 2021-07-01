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
				echo json_encode($tipoHuevo);
			} catch (PDOException $e) {
				echo json_encode('Error');
			}
		} else echo json_encode('No pasamos los post');
	}

	public function obtenerGalponesLotes(){
		$this->constructorSQL->select('galponeslotes', 'galponeslotes.*, galpones.numeroGalpon')->innerJoin('galpones', 'galponeslotes.idGalpon', '=', 'galpones.idGalpon')->where('galponeslotes.activo', '=', '1');
		if (isset($_GET['idGalpon'])) {
			$this->constructorSQL->where('idGalpon', '=', $_GET['idGalpon']);
		}
		
		$galponLote = $this->constructorSQL->ejecutarSQL();
		echo json_encode($galponLote);
	}

	public function obtenerAlimentacion(){
		$this->constructorSQL->select('operaciongalpon', 'operaciongalpon.*, inventario.*, galponeslotes.cantidadGallinas, productos.nombreProducto')->innerJoin('inventario', 'operaciongalpon.idInventario', '=', 'inventario.idInventario')->innerJoin('galponeslotes', 'galponeslotes.idGalpon', '=', 'operaciongalpon.idGalpon')->innerJoin('productos', 'productos.idProducto','=', 'operaciongalpon.idProducto')->where('productos.idTipoProducto', '=', $_GET['idTipoProducto']);
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
			$this->constructorSQL->select('galponeslotes')->where('activo', '=', '1')->where('idGalpon', '=', $_POST['idGalponEnLote']);
			$galponLote = $this->constructorSQL->ejecutarSQL();
			if (($ultID != '' ||  !is_null($ultID)) && ($galponLote != '' || !is_null($galponLote))) {
				$pd = 'productos';
				$tp = 'tiposproducto';
				$producto = $this->constructorSQL->select($pd)
					->innerJoin($tp, "$tp.idTipoProducto" , '=', "$pd.idTipoProducto")
					->where("$tp.nombreTipoProducto", '=', 'Gallinas')->ejecutarSQL();
				if (isset($_POST['alimentoAUsar'])) {
					$producto = $_POST['alimentoAUsar'];
				}
			// 	// Insertando en operación galpón
				$this->constructorSQL->insert('operaciongalpon', ['idInventario' => $ultID, 'idGalpon' => $_POST['idGalponEnLote'], 'idLote' => $galponLote[0]->idLote, 'cantidadProducto' => $_POST['cantidadProducto'], 'idProducto' => $producto[0]->idProducto]);
				$this->constructorSQL->ejecutarSQL();
			}
			echo json_encode('Agregado');
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
			}
		}
	}
}