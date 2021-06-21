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

}