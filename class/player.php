<?php
include_once "connect_db.php";

class Player {
	
	private $_email;
	private $_id;
	private $_ip;  
	private $_BDD;

	function __construct($email,$id, $ip) {
	    
		$this->_BDD = new DB();
		$this->_email = $email;
		$this->_ip = $ip;
	
	}

	public function getEmail() {
		return $this->_email;
	}
	
	public function getId() {
	    return $this->_id;
	}
	
	public function getIp() {
	    return $this->_ip;
	}
	
}
?>