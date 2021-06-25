<?php 




/**
 * 
 */
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
		if (isset($_POST['fechaCompraProducto'])) {
			try {
				return $this->constructorSQL->insert('inventario',
					[
						'fechaOperacion'=> $_POST['fechaCompraProducto'],
					])
					->ejecutarSQL();
			} catch (PDOException $e) {
				echo json_encode('No podemos agregar el inventario');
				die();
			}
		}
	}

	public function agregarCompra (){

		$idInventario = (!isset($_POST['idInventario']) || empty($_POST['idInventario'])) 
									? $this->agregarInventario() : $_POST['idInventario'];
		// echo json_encode($idInventario);
		if (isset($_POST['idTipoProducto'], $_POST['idProducto'], $_POST['documentoProveedor'], $_POST['cantidadProducto'], $_POST['precioProducto'])) {
			try {
				$this->constructorSQL->insert('compragranja',
					[
						'idInventario' => $idInventario,
						// TOMAR GRANJA DEL SESSION DEL USUARIO
						'idGranja' => 1,
						'idProducto' => $_POST['idProducto'],
						'precioProducto' => $_POST['precioProducto'],
						'cantidadProducto' => $_POST['cantidadProducto'],
						'documentoProveedor' => $_POST['documentoProveedor']
					]
				)->ejecutarSQL();
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
		if (isset($_GET['idInventario'])) {
			try {
				$i = 'inventario';
				$cg = 'compragranja';
				$p = 'productos';
				$tp = 'tiposproducto';
				$compras = $this->constructorSQL->select($i)
				 ->innerJoin($cg, "$cg.idInventario", "=", "$i.idInventario")
				 ->innerJoin($p, "$p.idProducto", "=", "$cg.idProducto")
				 ->innerJoin($tp, "$tp.idTipoProducto", "=", "$p.idTipoProducto")
				 ->where("$i.idInventario", '=', $_GET['idInventario'])
				 ->ejecutarSQL();
				echo json_encode($compras);
			} catch (PDOException $e) {
				echo json_encode('Error al obtener las Compras');				
			}
		}
	}



}