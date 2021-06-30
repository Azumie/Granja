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
				]->ejecutarSQL());
				echo json_encode('Compra actualizada exitosamente');
			} catch (PDOException $e) {
				echo json_encode('Error: No se pudo actualizar la compra');
				
			}
		}
	}



}