<?php
class servise_db
{
	private $_conn;
	private $_res;
	private $_count = 0;

	function __construct(){
		$this->_conn = new mysqli(getConfigBD('host'),
		                            getConfigBD('user'),
		                            getConfigBD('password'),
		                            getConfigBD('bd_name'));
	}

	public function query($sql){
		$this->_res = $this->_conn->query($sql);
		return true;
	}

	public function lasterror(){ return mysqli_error($this->_conn); }
    
	public function fetchAll($sql){
		$this->query($sql);
		$tmp = array();

		while($row = mysqli_fetch_assoc($this->_res)){
			$tmp[] = $row;
		}
		return $tmp;
	}

	public function escape_string($string) { 
		if($this->_conn) {
            if(is_string($string) || is_numeric($string) || is_null($string)) {
			    return mysqli_real_escape_string( $this->_conn, $string );
            } 
		}
	
	}

	public function fetchBind($sql, $types, $keys, $params){

		$result = $keys;
		$return = [];
		$stmt = mysqli_prepare($this->_conn, $sql);
		mysqli_stmt_bind_param($stmt, $types, ...$params);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, ...$result);

		while (mysqli_stmt_fetch($stmt)) {
			$tmp = [];
			for($i=0;$i<count($result);$i++){
				$tmp[$keys[$i]] = $result[$i];
			}
			$return[] = $tmp;
		}
		return $return;
	}

	public function updateBind($sql, $types, $params){
		$stmt = mysqli_prepare($this->_conn, $sql);
		mysqli_stmt_bind_param($stmt, $types, ...$params);
		return mysqli_stmt_execute($stmt);
	}

	public function insertBind($sql, $types, $params){
		$stmt = mysqli_prepare($this->_conn, $sql);
		mysqli_stmt_bind_param($stmt, $types, ...$params);
		mysqli_stmt_execute($stmt);
		return mysqli_stmt_insert_id($stmt);
	}


}
