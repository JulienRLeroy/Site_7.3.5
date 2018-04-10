<?php 

    
    class Player_controler {
        
        private $_BDD;
        
			function __construct() {
			
				$this->_BDD = new DB();
			}
			
			public function Login($email, $mdp) {
				
				$mdp_crypt = sha1(strtoupper($email) . ":" . strtoupper($mdp)); // Le mdp est $email + : + $mdp
				$email = htmlentities($this->_BDD->ReturnAuth()->quote($email)); // 
				$req = $this->_BDD->ReturnAuth()->query("SELECT * FROM battlenet_accounts WHERE email=$email AND sha_pass_hash='$mdp_crypt'");
				
				if($tab = $req ->fetch()) {
				   
					   $_SESSION['user'] = new Player($tab['username'], $tab['email'],$tab['id'], $tab['last_ip']); // COPIE DE LA CLASS PLAYER
					   return true;
			   
				}
				
				return false;
			}
			
			public function Register($email, $mdp) {
				
			   $mdp_crypt = $this->_BDD->ReturnAuth()->quote(sha1(strtoupper($email) .":". strtoupper($mdp))); // Le mdp est $email + : + $mdp
			   $email = htmlentities($this->_BDD->ReturnAuth()->quote($email)); 
			   
			   $req = $this->_BDD->ReturnAuth()->query("INSERT INTO battlenet_accounts SET email=$email, sha_pass_hash=$mdp_crypt");
			   if($req){
				   return true;
			   } 
			   
			   return false;
			}
			
		
        }
?>