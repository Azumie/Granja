<?php 

/**
 * 
 */
class Validacion {
	
	private $campos = [];
	private $metodo = '';
	private $errores = [];

	function __construct($campos) {
		$this->campos = $campos;
	}

	public function validar(){
		foreach ($this->campos as $campo => $tiposValidacion) {

			foreach ($tiposValidacion as $clave => $valor) {
				$val = true;
				if ($this->entero($clave)) {
					$clave = $valor;
					$val = call_user_func([$this, $clave], $_REQUEST[$campo]);
				}else {
					$val = call_user_func([$this, $clave], $_REQUEST[$campo], $valor);
				}
				if ($val == false) {
					return false;
				}
			}
		}
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

	public function mayorQue ($variable, $valorRef) {
		return $variable > $valorRef;
	}

	public function menorQue ($variable, $valorRef) {
		return $variable < $valorRef;
	}

	public function confinamiento ($variable) {
		return preg_match('/^(p|P|j|J)$/', $variable);
	}

}