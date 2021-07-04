<?php 
class InventarioGeneralControlador {
	
	function __construct() {
		$this->constructorSQL = new ConstructorSQL();
	}

	public function index (){
		$vistas = ['InicioInventarioGeneral', 'Compras', 'Consumos', 'Despachos', 'Clientes', 'Proveedores'];
		require_once 'vista/includes/layout.php';
	}

	public function obtenerProveedoresProducto (){
		if (isset($_GET['idProducto'])){
			$pd = 'productos';
			$pp = 'proveedoresproducto';
			$ps = 'personas';
			$proveedoresProducto = $this->constructorSQL->select($pd)
				->innerJoin($pp, "$pd.idProducto", '=', "$pp.idProducto")
				->innerJoin($ps, "$pp.documentoProveedor", '=', "$ps.documento")
				->where("$pd.idProducto", '=', $_GET['idProducto'])
				->ejecutarSQL();
			echo json_encode($proveedoresProducto);
		}else{
			echo json_encode('Error: Pase los parametros necesarios ');
		}
	}

	public function agregarInventario () {
		if (isset($_POST['fechaOperacion'])) {
			try {
				return $this->constructorSQL->insert('inventario',
					[
						'fechaOperacion'=> strval($_POST['fechaOperacion']),
					])
					->ejecutarSQL();
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
				die();
			}
		}
	}

	public function agregarCompra (){

		$idInventario = $this->agregarInventario();

		if (isset($_POST['productos'])) {
			try {

				foreach ($_POST['productos'] as $pos => $producto) {
					$this->constructorSQL->insert('compragranja',
						[
							'idInventario' => $idInventario,
							// TOMAR GRANJA DEL SESSION DEL USUARIO
							'idGranja' => 1,
							'idProducto' => $producto['idProducto'],
							'precioProducto' => $producto['precioProducto'],
							'cantidadProducto' => $producto['cantidadProducto'],
							'documentoProveedor' => $producto['documentoProveedor']
						])->ejecutarSQL();
				}
				echo json_encode($idInventario);
			} catch (PDOException $e) {
				echo json_encode('No se pudo agregar la compra correctamente');
			}
		}else {
			echo json_encode('Por favor introduzca los datos necesarios');
			// echo json_encode($_POST);
		}
	}

	public function obtenerCompras () {
			try {
				$i = 'inventario';
				$cg = 'compragranja';
				$p = 'productos';
				$tp = 'tiposproducto';
				$this->constructorSQL->select($i)
				 ->innerJoin($cg, "$cg.idInventario", "=", "$i.idInventario");
				if (isset($_GET['idInventario'])) {
			 	$this->constructorSQL
					->innerJoin($p, "$p.idProducto", "=", "$cg.idProducto")
					->innerJoin($tp, "$tp.idTipoProducto", "=", "$p.idTipoProducto")
				 	->where("$i.idInventario", '=', $_GET['idInventario']);
				}else {
					$this->constructorSQL->groupBy("$i.idInventario");
				}
				$compras = $this->constructorSQL->ejecutarSQL();
				echo json_encode($compras);
			} catch (PDOException $e) {
				echo json_encode('Error al obtener las Compras');				
			}
	}

	public function editarCompra(){
		if (isset($_POST['cantidadProducto'], $_POST['precioProducto'])) {
			try {
				$this->constructorSQL->update('compragranja', [
					'cantidadProducto' => $_POST['cantidadProducto'],
					'precioProducto' => $_POST['precioProducto']
				])
				->where('idCompraGranja', '=', $_POST['idCompraGranja'])
				->ejecutarSQL();
				echo json_encode('Compra actualizada exitosamente');
			} catch (PDOException $e) {
				echo json_encode('Error: No se pudo actualizar la compra');
			}
		}
		// echo json_encode($_POST);
	}

	public function eliminarProductoCompra(){
		if (isset($_GET['idCompraGranja'])) {
			try {
				$this->constructorSQL->delete('compragranja', 'idCompraGranja', $_GET['idCompraGranja'])
					->ejecutarSQL();
				echo json_encode('Producto Eliminado correctamente');
			} catch (PDOException $e) {
				echo json_encode('Error: No se ha podido Eliminar el Producto de la compra');
			}
		}
	}

	public function obtenerConsumos() {
		try {
			$og = 'operaciongalpon';
			$iv = 'inventario';
			$consumos = $this->constructorSQL->select($og)
				->innerJoin($iv, "$iv.idInventario", "=", "$og.idInventario")
				->where("$iv.entrada", "=", 0)
				->groupBy("$iv.fechaOperacion, $og.idGalpon, $og.idLote")
				->ejecutarSQL();

			echo json_encode($consumos);
		} catch (PDOException $e) {
			echo json_encode("Error: No se pudieron Obtener las Consumos");
		}
	}

	public function ObtenerDetalleConsumos () {
		if (isset($_GET['fechaOperacion'])) {
			try {
				$og = 'operaciongalpon';
				$pd = 'productos';
				$iv = 'inventario';
				$tp = 'tiposproducto';
				$detalleConsumo = $this->constructorSQL->select($iv)
					->innerJoin($og, "$og.idInventario", '=', "$iv.idInventario")
					->innerJoin($pd, "$pd.idProducto", '=', "$og.idProducto")
					->innerJoin($tp, "$tp.idTipoProducto", '=', "$pd.idTipoProducto")
					->where("$iv.fechaOperacion", '=', $_GET['fechaOperacion'])
					->where("$iv.entrada", '=', 0)
					->ejecutarSQL();
				echo json_encode($detalleConsumo);
			} catch (PDOException $e) {
				
			}
		}
	}

	public function obtenerDespachos(){
		$ip = 'inventarioproduccion';
		$dd ='detalledespachos';
		$dp = 'despachos';
		$this->constructorSQL->select($ip, "sum($ip.cantidadProduccion) AS produccion, $ip.*, $dp.*")
			->innerJoin($dd, "$dd.idInventarioProduccion", '=', "$ip.idInventarioProduccion")
			->innerJoin($dp, "$dp.idDespachos", '=', "$dd.idDespachos")
			->where("entrada", "=", "0")
			->groupBy("$ip.fechaInventarioProduccion, $dp.idDespachos");
		$recogidas = $this->constructorSQL->ejecutarSQL();
		echo json_encode($recogidas);
	}

	// ya cargamos la infor a la tabla gracias a esto
	//  ahora lo que tenemos que hacer es colocar lo mismo en mi culo 
	// otra cosita es que falta cargar la info en el formulario y despues de ahi editar // gracias bb

	public function agregarDespachos () {
		if (isset($_POST['fechaDespacho'])) {
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
				if (isset($_POST['agregar'], $_POST['idCliente'], $_POST['precinto'])) {
					$idDespachos = $this->constructorSQL->insert('despachos', [
						'documentoCliente' => $_POST['idCliente'],
						'precinto' => $_POST['precinto']
					])->ejecutarSQL();
					foreach ($_POST['agregar'] as $idTipoHuevo => $cantidadProduccion) {
						if ($cantidadProduccion != '') {
							$idInventario = $this->constructorSQL->insert('inventarioproduccion', [
									'idGalpon' => 1,
									'idLote' => 1,
									'fechaInventarioProduccion' => $_POST['fechaDespacho'],
									'idTipoHuevo' => $idTipoHuevo,
									'cantidadProduccion' => $cantidadProduccion,
									'entrada' => 0
								])
								->ejecutarSQL();
							$this->constructorSQL->insert('detalledespachos', [
								'idInventarioProduccion' => $idInventario,
								'idDespachos' => $idDespachos
							])->ejecutarSQL();
						}
					}
				}
				echo json_encode('Se agrego el depacho conrrectamente');
			} catch (PDOException $e) {
				echo json_encode($e->getMessage());
			}
		} else echo json_encode('No pasamos los post');
		// echo json_encode($_POST);
	}

	public function obtenerdetalleDespacho () {
		// if (isset($_POST['idCliente'] , $_POST['idLote'], $_POST['fechaInventarioProduccion'])) {
		// 	try {
		// 		$ip = 'inventarioproduccion';
		// 		$th = 'tiposhuevo';
		// 		$detalleRecogida = $this->constructorSQL->select($ip)
		// 			->innerJoin($th, "$th.idTipoHuevo", '=', "$ip.idTipoHuevo")
		// 			->where("$ip.idLote", '=', $_POST['idLote'])
		// 			->where("$ip.idGalpon", '=', $_POST['idGalpon'])
		// 			->where("$ip.fechaInventarioProduccion", '=', $_POST['fechaInventarioProduccion'])
		// 			->where("$ip.entrada", '=', 1)
		// 			->ejecutarSQL();
		// 		echo json_encode($detalleRecogida);
		// 	} catch (PDOException $e) {
		// 		echo json_encode('Error al obtener el Detalle de la produccion');
		// 	}
		// }
		echo json_encode($_POST);
	}

}