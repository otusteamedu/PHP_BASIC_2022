<?php
class servise_db
{
	private $_conn;
	private $_res;
	private $_count = 0;

	function __construct(){
		$this->_conn = new mysqli('localhost',
		                             'root',
		                             '',
		                             'otus');
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
		} else { 
			die('Cannot connect MySQL (escape_string)');
		}
	
	}

}
