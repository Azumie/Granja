<?php 

/**
 * 
 */
class Valicion {
	
	private $campos = [
		'documentoProveedor' => 
			[
				'documento',
				'mayorQue' => '12'
			],
		'numeroProveedor' => 'entero'
	];
	private $errores = [];

	function __construct() {}

	public function validar(){
		$error = false;
		foreach ($this->campos as $clave => $tipoValidacion) {
			if (call_user_func([$this, $tipoValidacion], $_POST[$clave])) {
				$error = true;
			}
		}
		return $error;
	}

	public function entero($variable){
		return preg_match('/^([0-9]+)$/', $variable);
	}

	public function flotante ($variable) {
		return preg_match('/^([0-9]+,[0-9]+)$/', $variable);
	}

	public function documento ($variable) {
		return preg_match('/^(V|J|E|v|j|e)-[0-9]{8,10}$/', $variable);
	}

	public function fecha ($variable) {
		return preg_match('/^\d{4}(-)(0?[1-9]|1[1-2])\1(3[01]|[12][0-9]|0?[1-9])$/', $variable);
	}

	public function mayorQue ($variable) {

	}

	public function menorQue ($variable) {
		
	}

}
// echo '<pre>'; var_dump(preg_match('/^(V|J|E)-[0-9]{8,10}$/', 'v-12688737')); echo '</pre>';