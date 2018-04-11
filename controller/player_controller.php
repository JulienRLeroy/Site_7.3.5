<?php 

    
    class Player_controler {
        
        private $_BDD;
        
			function __construct() {
			
				$this->_BDD = new DB();
			}
			
			
			public function Register($username, $email, $mdp) {
				
				$mdp_crypt = $this->_BDD->ReturnAuth()->quote(bin2hex(strrev(hex2bin(strtoupper(hash("sha256",strtoupper(hash("sha256", strtoupper($email)).":".strtoupper($mdp))))))));
				$email = htmlentities($this->_BDD->ReturnAuth()->quote($email)); 
				$username = htmlentities($this->_BDD->ReturnAuth()->quote($username)); 

				$insertBnetAcc = $this->_BDD->ReturnAuth()->query("INSERT INTO battlenet_accounts SET email=$email, sha_pass_hash=$mdp_crypt");
				$SelectIdBnetAcc = $this->_BDD->ReturnAuth()->query("SELECT id FROM battlenet_accounts WHERE email=$email");
				
				if($tab = $SelectIdBnetAcc ->fetch()) {			   
					$req2 = $this->_BDD->ReturnAuth()->query("INSERT INTO account SET username=$username, sha_pass_hash=$mdp_crypt, email=$email, battlenet_account=".$tab['id'].", battlenet_index=".$tab['id']."");
					return true;
				}
				
			}
			
		
        }
?>