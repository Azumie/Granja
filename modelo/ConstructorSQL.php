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
		$campos      = implode(', ', array_keys($datos));
		$campos      = "( $campos )";
		$valores     = []; 
		foreach ($datos as $valor) array_push($valores, '?');
		$valores     = implode(', ', array_values($valores));
		$valores     = "VALUES ($valores)";
		$this->sql   = "INSERT INTO $tabla $campos $valores";
		$this->datos = array_values($datos);
		$this->tipo  = 'insertGetId';
		return $this;
	}

	public function select($tabla, $todos = true){
		$this->sql = "SELECT * FROM $tabla";
		$this->tipo = ($todos === true) ? 'obtener' : 'obtenerTodos' ;
		$this->tablas = [$tabla];
		return $this;
	}

	public function innerJoin ($tabla, $campoTablaUno, $signo, $campoTablaDos){
		$inner = "INNER JOIN $tabla ON $campoTablaUno $signo $campoTablaDos";
	}

	public function where($campo , $signo, $valor){
		if ($this->where == '') {
			$this->where = " WHERE $campo $signo ?";
			$this->datos = [$valor];
			$this->sql  .= $this->where;
		}else {
			$where        = " AND $campo $signo ?";
			$this->sql   .= $where;
			$this->where .= $where;
			array_push($this->datos, $valor);
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
			$sql = "UPDATE $tabla SET";
			foreach ($datos as $campo => $valor) {
				$sql .= "$campo = ? ,";
			}
			$this->sql = $sql; 
		}
		$this->tipo  = 'consulta';
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

	public function toString(){
		return $this->sql;
	}

	public function getDatos(){
		return $this->datos;
	}

}