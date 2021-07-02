<?php
/**
 *
 */
class GalponControlador{

	function __construct() {
		$this->ConstructorSQL = new ConstructorSQL();
	}

	public function index(){
		$vistas = ['InicioGalpon', 'AgregarGalpon'];
		require_once 'vista/includes/layout.php';
	}

	public function agregarGalpon(){
		// Validando que existan los campos a usar
	  	if (isset($_POST['fechaCreacionGalpon'], $_POST['numeroGalpon'], $_POST['areaUtilGalpon'], $_POST['ConfinamientoGalpon'])) {
	  		// Validando que campo fecha sea distinto de null
	   		if ($_POST['fechaCreacionGalpon'] != null && $_POST['fechaCreacionGalpon']) {
	   			// Validando que campo numero galpon sea solo número entero
	    		if (($_POST['numeroGalpon'] > 0 && $_POST['numeroGalpon'] < 500) && preg_match('/\D/', $_POST['numeroGalpon']) == 0) {
	    			// Validando que area util galpon sea número floatnte o entero
	     			if ($_POST['areaUtilGalpon'] != '' && $_POST['areaUtilGalpon'] != null && preg_match("/[^0-9.,]/", $_POST['areaUtilGalpon']) != true && $_POST['areaUtilGalpon'] >= 100 && $_POST['areaUtilGalpon'] <= 2000) {
	     				// Valñdando que confinamiento galpon sea P o J
	      				if ($_POST['ConfinamientoGalpon'] == 'P' || $_POST['ConfinamientoGalpon'] == 'J') {
// Agregando en tabla galpones 
try {
$this->ConstructorSQL->insert('galpones', ['fechaCreacionGalpon' => $_POST['fechaCreacionGalpon'],'numeroGalpon' => $_POST['numeroGalpon'], 'areaUtil' => $_POST['areaUtilGalpon'],  'confinameiento' => $_POST['ConfinamientoGalpon'], 'idGranja' => 1]);
$this->ConstructorSQL->ejecutarSQL();
echo json_encode('Exito: El galpón fue agregado con éxito.');
} catch (PDOException $e) {
echo json_encode( 'Error: El número de Galpón ya existe.');
}
	      				} else echo json_encode( 'Error: Confinamiento Galpón debe ser P o J.');
     				}else echo json_encode( 'Error: Área útil no debe estar vacío o contener letras.');
;
			    }else { 
			    	echo json_encode( 'Error: Número de Galpón no debe estar vacío o contener letras.');
	    		}
	   		}
	  	}else echo json_encode('Error: Campos Vacíos.');
	}
	
	public function obtenerGalpones(){
		try {
			$this->ConstructorSQL->select('galpones', ' galpones.*, galponeslotes.cantidadGallinas, sum(operaciongalpon.cantidadProducto) as suma')->innerJoin('operaciongalpon', 'operaciongalpon.idGalpon', '=', 'galpones.idGalpon')->innerJoin('galponeslotes', 'galponeslotes.idGalpon', '=', 'galpones.idGalpon')->where('galponeslotes.activo', '=', '1')->where('operaciongalpon.idProducto', '=', 3)->groupBy('galpones.idGalpon');
			$galpon = $this->ConstructorSQL->ejecutarSQL();
			for ($i=0; $i < count($galpon); $i++) { 
				if ($galpon[$i]->suma != null) {
					$galpon[$i]->cantidadGallinas = $galpon[$i]->cantidadGallinas - $galpon[$i]->suma;
				}
			}
			// (isset($_GET['e'])) ? $galpon = 'galpones '.$_GET['e'] : $galpon = 'galpones';
			// $galpon = $this->ConstructorSQL->select($galpon)
			// 	->where('idGranja', '=', 1)
			// 	->ejecutarSQL();
			echo json_encode($galpon);
		} catch (PDOException $e) {
			echo json_encode($e->getMessage());
		}
	}
}