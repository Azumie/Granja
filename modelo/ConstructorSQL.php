<?php

class ConstructorSQL {
	
	private $sql   = '';
	private $datos = [];
	private $tablas= [];
	private $inner = '';
	private $where = '';
	private $group = '';
	private $tipo  = '';

	function __construct() {}

	public function insert($tabla, array $datos = [] ){
		$campos      = implode(', ', array_keys($datos));//agarra los títulos del campo del array
		$campos      = "( $campos )";
		$valores     = []; 
		foreach ($datos as $valor) array_push($valores, '?');
		$valores     = implode(', ', array_values($valores));
		$valores     = "( $valores )";
		$this->sql   = "INSERT INTO $tabla $campos VALUES $valores";
		$this->datos = array_values($datos);
		$this->tipo  = 'insertGetId';
		return $this;
	}

	public function select($tabla, $datos = "*", $todos = true){
		$this->sql = "SELECT $datos FROM $tabla";
		$this->tipo = ($todos === true) ? 'obtenerTodos' : 'obtener' ;
		$this->tablas = [$tabla];
		$this->datos = [];
		return $this;
	}

	public function innerJoin ($tabla, $campoT1, $signo, $campoT2){
		$this->inner = " INNER JOIN $tabla ON $campoT1 $signo $campoT2";
		$this->sql .= $this->inner;
		return $this;
	}

	public function where($campo , $signo, $valor){
		if ($this->where == '') {
			$this->where = " WHERE $campo $signo ?";
			// $this->datos = [$valor];
			array_push($this->datos, $valor);
			$this->sql  .= $this->where;
		}else {
			$where        = " AND $campo $signo ?";
			$this->sql   .= $where;
			$this->where .= $where;
			array_push($this->datos, $valor);
		}
		return $this;
	}

	public function groupBy($campo){
		if ($this->group == '') {
			$this->group = " GROUP BY $campo";
			$this->sql  .= $this->group;
		}
		return $this;
	}

	public function orWhere($campo , $signo, $valor){
		if ($this->where != '') {
			$where        = " OR $campo $signo ?";
			$this->sql   .= $where;
			$this->where .= $where;
			array_push($this->datos, $valor);
		}
	}

	public function update($tabla , array $datos = []){
		if (!empty($datos)) {
			$sql = "UPDATE $tabla SET ";
			foreach ($datos as $campo => $valor) {
				$sql .= "$campo = ? ,";
			}
			$this->sql = rtrim($sql, ','); 
			$this->datos = array_values($datos);
			$this->tipo  = 'consulta';
		}
		return $this;
	}

	public function delete($tabla , array $datos = []){
		$campo     = key($datos);
		$valor     = current($datos);
		$this->sql = "DELETE FROM $tabla WHERE $campo = ? ";
		$this->datos = [$valor];
		$this->tipo  = 'consulta';
	}

	public function ejecutarSQL(){
		$pdo = new Conexion();
		return call_user_func( [$pdo, $this->tipo], $this->sql, $this->datos);
	}

	public function getSql(){
		return $this->sql;
	}

	public function getDatos(){
		return $this->datos;
	}

}