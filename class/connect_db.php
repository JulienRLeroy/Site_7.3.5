<?php 	
	class DB {	
			
		private $login = "doctor";	
		private $mdp = "123456789";	
			
		public function ReturnAuth() {	
			try {	
				$auth = new PDO('mysql:host=127.0.0.1;dbname=auth_legion;charset=utf8mb4', $this->login, $this->mdp);	
				return $auth;	
			}	
			catch(Exception $e)	
			{	
				echo 'N° : '.$e->getCode();	
			}	
		}	
		
	}	
?> 