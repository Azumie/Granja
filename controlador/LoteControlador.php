<?php 

class LoteControlador
{
	
	function __construct()	{
		$this->constructorSQL = new ConstructorSQL();
	}
	function index(){
		$vistas = ['InicioLote', 'LineaGenetica', 'NuevoLote', 'Galponeros'];
		require_once 'vista/includes/layout.php';
	}

	public function obtenerLote(){

	}

	public function obtenerProveedoresGallina () {
		try {
			$ps = 'personas';
			$pp = 'proveedoresproducto';
			$pd = 'productos';
			$tp = 'tiposproducto';
			$proveedores = $this->constructorSQL->select($ps)
				->innerJoin($pp, "$pp.documentoProveedor", "=", "$ps.documento")
				->innerJoin($pd, "$pd.idProducto", "=", "$pp.idProducto")
				->innerJoin($tp, "$tp.idTipoProducto", "=", "$pd.idTipoProducto")
				->where("$tp.nombreTipoProducto","=", "Gallinas")
				->ejecutarSQL();
			echo json_encode($proveedores);
		} catch (PDOException $e) {
			// echo json_encode($e->getMessage());
			echo json_encode('Ha ocurrido un error en la consulta');
		}
	}

	public function obtenerLineagenetica () {
		try {
			$lineagenetica = $this->constructorSQL->select('lineagenetica')
				->ejecutarSQL();
			echo json_encode($lineagenetica);
		} catch (PDOException $e) {
			echo json_encode('No se ha podido consultar la linea genetica');
		}
	}

	public function obtenerGalpones () {
		try {
			$galpones = $this->constructorSQL->select('galpones')
				->ejecutarSQL();
			echo json_encode($galpones);
		} catch (PDOException $e) {
			echo json_encode('No se han podido consultar los Galpones');
		}
	}

	public function agregarInventario () {
		if (isset($_POST['fechaOperacion'])) {
			try {
				return $this->constructorSQL->insert('inventario',
					[
						'fechaOperacion'=> $_POST['fechaOperacion'],
					])
					->ejecutarSQL();
			} catch (PDOException $e) {
				echo json_encode('No podemos agregar el inventario');
				die();
			}
		}
	}

	public function agregarNuevoLote(){
		$idInventario = (isset($_POST['idInventarioLote']) && !empty($_POST['idInventarioLote']))
				? $_POST['idInventarioLote'] : $this->agregarInventario();
		if (isset($_POST['precioProducto'],$_POST['cantidadProducto'], $_POST['documentoProveedor'], $_POST['idLineaGenetica'], $_POST['fechaInicio'], $_POST['numeroLote'])) {
				try {
					$idCompra = $this->constructorSQL->insert('compragranja', [
						'idInventario' => $idInventario,
						// obtener la granja de la session del usuario
						'idGranja' => 1,
						'idProducto' => 3,
						'documentoProveedor' => $_POST['documentoProveedor'],
						'precioProducto' => $_POST['precioProducto'],
						'cantidadProducto' => $_POST['cantidadProducto'],
					])->ejecutarSQL();
					$idLote = $this->constructorSQL->insert('lotes', [
						'idInventario' => $idInventario,
						'idLineaGenetica' => $_POST['idLineaGenetica'],
						'fechaInicio' => $_POST['fechaInicio'],
						'numeroLote' => $_POST['numeroLote'],
					])->ejecutarSQL();
					foreach ($_POST['galpones'] as $i => $galpon) {
						$this->constructorSQL->insert('galponeslotes', [
							'idLote' => $idLote,
							'idGalpon' => $galpon['idGalpon'],
							'cantidadGallinas' => $galpon['cantidadGallinas'],
						])->ejecutarSQL();
					}
					echo json_encode($idLote);
				} catch (PDOException $e) {
					echo json_encode($e->getMessage());					
				}
		}else {
			echo json_encode($_POST);
		}
	}

	public function editarLote() {
		if (isset($_POST['precioProducto'],$_POST['cantidadProducto'], $_POST['idCompraGranja'], $_POST['idLineaGenetica'], $_POST['fechaInicio'], $_POST['idLote'])) {
			try {
				$this->constructorSQL->update('lotes', [
					'idLineaGenetica' => $_POST['idLineaGenetica'],
					'fechaInicio' => $_POST['fechaInicio'],
				])->where('idLote', '=', $_POST['idLote'])->ejecutarSQL();
				$this->constructorSQL = new ConstructorSQL();
				$this->constructorSQL->update('compragranja', [ 
					'precioProducto' => $_POST['precioProducto'],
					'cantidadProducto' => $_POST['cantidadProducto'],
				])->where('idCompraGranja', '=', $_POST['idCompraGranja'])->ejecutarSQL();
				echo json_encode('Lote Editado Correctamente');
			} catch (PDOException $e) {
				echo json_encode('Error al editar el Lote');
			}
		}else 
				echo json_encode($_POST['cantidadProducto']);
	}

	public function obtenerLotes () {
		try {
			$lotes = $this->constructorSQL->select('compragranja cg')
				->innerJoin('inventario i', 'i.idInventario', '=', 'cg.idInventario')
				->innerJoin('lotes l', 'l.idInventario', '=', 'i.idInventario')
				// ->innerJoin('inventario', 'inventario.idInventario', '=', 'compragranja.idInventario')
				->ejecutarSQL();
			echo json_encode($lotes);
		} catch (PDOException $e) {
			echo json_encode($e->getMessage());
		}
	}

	public function obtenerGalponeslotes () {
		try {
			$galpones = $this->constructorSQL->select('galponeslotes')
				->where('idLote', '=', $_GET['idLote'])
				->ejecutarSQL();
			echo json_encode($galpones);
		} catch (PDOException $e) {
			
		}
	}

}