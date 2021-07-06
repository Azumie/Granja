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

	public function graficoInicio(){
		$res = $this->constructorSQL->select('inventarioproduccion', 'tiposhuevo.nombreTipoHuevo, sum(inventarioproduccion.cantidadProduccion) as suma')->innerJoin('galponeslotes','galponeslotes.idGalpon', '=', 'inventarioproduccion.idGalpon')->innerJoin('tiposhuevo', 'tiposhuevo.idTipoHuevo', '=', 'inventarioproduccion.idTipoHuevo')->where('galponeslotes.activo', '=', 1)->where('inventarioproduccion.entrada', '=', 1)->groupBy('inventarioproduccion.idTipoHuevo')->ejecutarSQL();
		echo json_encode($res);
		// SELECT tiposhuevo.nombreTipoHuevo, sum(inventarioproduccion.cantidadProduccion) as suma FROM inventarioproduccion inner JOIN galponeslotes on galponeslotes.idGalpon = inventarioproduccion.idGalpon INNER JOIN tiposhuevo on tiposhuevo.idTipoHuevo = inventarioproduccion.idTipoHuevo where galponeslotes.activo = 1 and inventarioproduccion.entrada = 1 GROUP BY inventarioproduccion.idTipoHuevo
	}

		// SELECT sum(cantidadProduccion) as suma, idTipoHuevo, fechaInventarioProduccion from inventarioproduccion where entrada =1 and fechaInventarioProduccion <= '2021-07-03'and fechaInventarioProduccion >= '2021-06-13' GROUP BY fechaInventarioProduccion, idTipoHuevo
	public function tablaCaducidad(){
		// Fecha actual
		$fecha = date('Y-m-d');
		// Restando 20 días a la fecha actual 
		$nuevafecha = strtotime ('-20 day' , strtotime ( $fecha ));
		// Obteniendo huevos producidos entre las dos fechas anteriores
		$producidosReciente = $this->constructorSQL->select('inventarioproduccion', 'sum(cantidadProduccion) as suma, idTipoHuevo, fechaInventarioProduccion')->where('entrada', '=', 1)->where('fechaInventarioProduccion', '<=', $fecha)->where('fechaInventarioProduccion', '>=', date('Y-m-d',$nuevafecha))->groupBy('fechaInventarioProduccion, idTipoHuevo')->ejecutarSQL();
		// Todos los huevos despachados a lo largo del tiempo
		$this->constructorSQL = new ConstructorSQL();
		$despachados = $this->constructorSQL->select('inventarioproduccion', 'sum(cantidadProduccion) as suma, idTipoHuevo')->where('entrada', '=', 0)->groupBy('idTipoHuevo')->ejecutarSQL();
		// Los huevos producidosReciente antes de esa fecha 
		// 15-20 Dias
		// 10-15 Dias
		// 5-10 Dias
		// 0-5 Dias
		$this->constructorSQL = new ConstructorSQL();
		$producido = $this->constructorSQL->select('inventarioproduccion', 'sum(cantidadProduccion) as suma, idTipoHuevo')->where('entrada', '=', 1)->where('fechaInventarioProduccion', '<', date("Y-m-d", $nuevafecha))->groupBy('idTipoHuevo')->ejecutarSQL();
		$res = [];
		$caducidad = ['danger' => ['16-20 Dias',0,0,0], 'warning' => ['11-15 Dias',0,0,0], 'info' => ['6-10 Dias',0,0,0], 'success' => ['0-5 Dias',0,0,0]];
		for ($i=0; $i < count($producidosReciente); $i++) { 
			if ($this->fechaMayor($producidosReciente[$i]->fechaInventarioProduccion, $fecha, '-5 day', '0 day')) {
				switch ($producidosReciente[$i]->idTipoHuevo) {
					case 1:
						$caducidad['success'][1] += $producidosReciente[$i]->suma; 
						break;
					case 2:
						$caducidad['success'][2] += $producidosReciente[$i]->suma; 
						break;
					case 3: 
						$caducidad['success'][3] += $producidosReciente[$i]->suma; 
						break;
				}
			
			}
			else if ($this->fechaMayor($producidosReciente[$i]->fechaInventarioProduccion, $fecha, '-10 day', '6 day')) {

				switch ($producidosReciente[$i]->idTipoHuevo) {
					case 1:
						$caducidad['info'][1] += $producidosReciente[$i]->suma; 
						break;
					case 2:
						$caducidad['info'][2] += $producidosReciente[$i]->suma; 
						break;
					case 3: 
						$caducidad['info'][3] += $producidosReciente[$i]->suma; 
						break;
				}
			}else if ($this->fechaMayor($producidosReciente[$i]->fechaInventarioProduccion, $fecha, '-15 day', '11 day')) {

				switch ($producidosReciente[$i]->idTipoHuevo) {
					case 1:
						$caducidad['warning'][1] += $producidosReciente[$i]->suma; 
						break;
					case 2:
						$caducidad['warning'][2] += $producidosReciente[$i]->suma; 
						break;
					case 3: 
						$caducidad['warning'][3] += $producidosReciente[$i]->suma; 
						break;
				}
			}else if ($this->fechaMayor($producidosReciente[$i]->fechaInventarioProduccion, $fecha, '-20 day', '16 day')) {

				switch ($producidosReciente[$i]->idTipoHuevo) {
					case 1:
						$caducidad['danger'][1] += $producidosReciente[$i]->suma; 
						break;
					case 2:
						$caducidad['danger'][2] += $producidosReciente[$i]->suma; 
						break;
					case 3: 
						$caducidad['danger'][3] += $producidosReciente[$i]->suma; 
						break;
				}
			}
		}
		if ($despachados != null) {
			// Recorriendo despachos y producidos antes de fecha para calcular los huevos restantes por despachar
			for ($i=0; $i < count($despachados); $i++) { 
				for ($e=0; $e < count($producido); $e++) { 
					if ($despachados[$i]->idTipoHuevo == $producido[$e]->idTipoHuevo) {
						if ($despachados[$i]->suma > $producido[$e]->suma) {
							$despachados[$i]->suma = $producido[$e]->suma - $despachados[$i]->suma;
						}else $despachados[$i]->suma = 0;
					} 
				}
			}
			// $iterando = 1;
			// foreach ($caducidad as $iterador => $value) {
			// 	for ($e=0; $e < count($despachados); $e++){
			// 		if ($despachados[$e]->idTipoHuevo == 1 && $despachados[$e]->suma > 0) {
			// 			if ($caducidad[$iterador][$iterando] >= $despachados[$e]->suma) {
			// 				$caducidad[$iterador][$iterando] -= $despachados[$e]->suma;
			// 				$despachados[$e]->suma = 0;
			// 			} else{
			// 				$despachados[$e]->suma -= $caducidad[$iterador][$iterando];
			// 				$caducidad[$iterador][$iterando] = 0;
			// 			}
			// 		}
			// 	}
			// 	$iterando++;
			// }
		}
		echo json_encode($caducidad);
	}
	public function fechaMayor($fechaNueva, $fechaActual, $intervaloA, $intervaloB){
		$res = false;
 		if (strtotime($fechaNueva)  >= strtotime ( $intervaloA , strtotime ( $fechaActual )) && strtotime($fechaNueva)  <= strtotime ( $intervaloB , strtotime ( $fechaActual ))){
 			$res = true;
 		}
 		return $res;
	}
}