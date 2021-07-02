<?php 

/**
 * 
 */
class InicioControlador {
	
	function __construct() {
		$this->constructorSQL = new ConstructorSQL();
	}

	public function index(){
		$vistas = ['Inicio'];
		require_once 'vista/includes/layout.php';
	}

	public function mostrarAlimentacion(){
		$resp = $this->consumosProductos($_POST['fechaDesde'], $_POST['fechaHasta'], $_POST['idGalponInicio'], $_GET['idTipoProducto']);
		$this->constructorSQL = new ConstructorSQL();
		$this->constructorSQL->select(' galponeslotes')->where('idGalpon', '=', $_POST['idGalponInicio'])->where('activo', '=', 1);
		$gallinas = $this->constructorSQL->ejecutarSQL();
		$this->constructorSQL = new ConstructorSQL();
		$this->constructorSQL->select('operaciongalpon', 'sum(operaciongalpon.cantidadProducto) as suma')->innerJoin('productos', 'productos.idProducto', '=', 'operaciongalpon.idProducto')->innerJoin('inventario', 'inventario.idInventario','=', 'operaciongalpon.idInventario')->where('productos.idTipoProducto', '=', 3)->where('inventario.fechaOperacion', '>=', $_POST['fechaDesde'])->where('inventario.fechaOperacion', '<=', $_POST['fechaHasta'])->where('operaciongalpon.idGalpon', '=', 1);
		$mortalidad = $this->constructorSQL->ejecutarSQL();
		$this->constructorSQL = new ConstructorSQL();
		$this->constructorSQL->select('operaciongalpon', 'sum(operaciongalpon.cantidadProducto) as suma')->innerJoin('inventario', 'operaciongalpon.idInventario', '=', 'inventario.idInventario')->innerJoin('productos', 'productos.idProducto','=', 'operaciongalpon.idProducto')->where('productos.idTipoProducto', '=', 1)->where('operaciongalpon.idGalpon', '=', 1);
		$alimentoInventario = $this->constructorSQL->ejecutarSQL();
		if ($mortalidad[0]->suma != null) {
			$gallinas = $gallinas[0]->cantidadGallinas - $mortalidad[0]->suma;
		} else $gallinas = $gallinas[0]->cantidadGallinas;
		
		$alimento = $resp[0]->suma / $gallinas;
		$res = ['fechaDesde' =>$_POST['fechaDesde'], 'fechaHasta' => $_POST['fechaHasta'], 'division' => $alimentoInventario[0]->suma, 'suma' => $resp[0]->suma,  'Inventario' => $alimento];
		echo json_encode($res);
	}


	public function consumosProductos($fechaDesde, $fechaHasta, $idGalpon, $tipoProducto){
		$this->constructorSQL->select('operaciongalpon', 'sum(operaciongalpon.cantidadProducto) as suma, operaciongalpon.idLote')->innerJoin('inventario', 'operaciongalpon.idInventario', '=', 'inventario.idInventario')->innerJoin('productos', 'productos.idProducto', '=', 'operaciongalpon.idProducto')->where('productos.idTipoProducto', '=', $tipoProducto)->where('inventario.fechaOperacion', '>=', $fechaDesde)->where('inventario.fechaOperacion', '<=', $fechaHasta)->where('operaciongalpon.idGalpon', '=', $idGalpon);
		return $this->constructorSQL->ejecutarSQL();
	}

	function mostrarMortalidad(){
		$mortalidadTotal = $this->consumosProductos($_POST['fechaDesde'], $_POST['fechaHasta'], $_POST['idGalponInicio'], $_GET['idTipoProducto']);
		$this->constructorSQL = new ConstructorSQL();
		$this->constructorSQL->select(' galponeslotes')->where('idGalpon', '=', $_POST['idGalponInicio'])->where('activo', '=', 1);
		$gallinasTotal = $this->constructorSQL->ejecutarSQL();
		if ($mortalidadTotal[0]->suma != null || $mortalidadTotal[0]->suma != []) {
			$gallinasRestantes = $gallinasTotal[0]->cantidadGallinas - $mortalidadTotal[0]->suma;
			$mortalidadObtenida = (100 * $mortalidadTotal[0]->suma) / $gallinasTotal[0]->cantidadGallinas;
		$res = ['Lote' => $mortalidadTotal[0]->idLote, 'mortalidadObtenida' => $mortalidadObtenida, 'mortalidadTotal' => $mortalidadTotal[0]->suma, 'gallinasRestantes' => $gallinasRestantes];

		}else $res = [$gallinasTotal[0]->idLote,0,0, $gallinasTotal[0]->cantidadGallinas];
		echo json_encode($res);
	}

	public function mostrarProduccion(){
		$this->constructorSQL->select('inventarioproduccion', 'sum(inventarioproduccion.cantidadProduccion) as suma')->innerJoin('galponeslotes', 'galponeslotes.idGalpon', '=', 'inventarioproduccion.idGalpon')->where('inventarioproduccion.idGalpon', '=', $_POST['idGalponInicio'])->where('galponeslotes.activo', '=', 1)->where('inventarioproduccion.fechaInventarioProduccion', '>=', $_POST['fechaDesde'])->where('inventarioproduccion.fechaInventarioProduccion', '<=', $_POST['fechaHasta']);
		$mortalidadTotal = $this->consumosProductos($_POST['fechaDesde'], $_POST['fechaHasta'], $_POST['idGalponInicio'], 3);
		$huevosProducidos = $this->constructorSQL->ejecutarSQL();
		$porcentaje = 0;
		if ($mortalidadTotal[0]->suma != 0 || $mortalidadTotal[0]->suma != null) {
			$porcentaje = (100 * $huevosProducidos[0]->suma)/ $mortalidadTotal[0]->suma;
		}
		$res = ['fechaDesde' =>$_POST['fechaDesde'], 'fechaHasta' => $_POST['fechaHasta'],'porcentaje' => $porcentaje, 'huevosProducidos' => $huevosProducidos[0]->suma];
		echo json_encode($res);
	}
	public function mostrarInicioProductos(){
		$this->constructorSQL->select('compragranja', 'productos.nombreProducto, personas.nombrePersona, personas.apellidosPersona, max(inventario.fechaOperacion) as fecha, sum(compragranja.cantidadProducto) as suma, compragranja.documentoProveedor, tiposproducto.nombreTipoProducto')->innerJoin('productos', 'productos.idProducto', '=','compragranja.idProducto')->innerJoin('inventario', 'inventario.idInventario', '=', 'compragranja.idInventario')->innerJoin('tiposproducto', 'productos.idProducto', '=', 'tiposproducto.idTipoProducto')->innerJoin('personas', 'personas.documento', '=', 'compragranja.documentoProveedor')->groupBy('productos.idTipoProducto');
		$tabla = $this->constructorSQL->ejecutarSQL();
		echo json_encode($tabla);
	}

	public function tablaCaducidad(){

	}
}