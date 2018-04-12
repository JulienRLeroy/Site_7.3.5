<?php 
    
    class Player_controler {
        
        private $_BDD;
        
			function __construct() {
			
				$this->_BDD = new DB();
			}
			
			
			public function Register($username, $email, $mdp) {
				
				$mdp_crypt = $this->_BDD->ReturnAuth()->quote(str_split(strtoupper((hash('sha256', strtoupper(hash('sha256', $email)) . ":" . $mdp))), 2));
				$email = htmlentities($this->_BDD->ReturnAuth()->quote($email)); 
				$username = htmlentities($this->_BDD->ReturnAuth()->quote($username)); 
				$insertBnetAcc = $this->_BDD->ReturnAuth()->query("INSERT INTO battlenet_accounts SET email=$email, sha_pass_hash=$mdp_crypt");
				$SelectIdBnetAcc = $this->_BDD->ReturnAuth()->query("SELECT id FROM battlenet_accounts WHERE email=$email");
				
				if($tab = $SelectIdBnetAcc ->fetch()) {			   
					$req2 = $this->_BDD->ReturnAuth()->query("INSERT INTO account SET username=$username, sha_pass_hash=$mdp_crypt, email=$email, battlenet_account=".$tab['id'].", battlenet_index=".$tab['id']."");
					return true;
				}
				
			}
			
			public function Login($ndc, $mdp) {
				
				$mdp_crypt = sha1(strtoupper($ndc) . ":" . strtoupper($mdp)); // Le mdp est $ndc + : + $mdp
				$ndc = htmlentities($this->_BDD->ReturnAuth()->quote($ndc)); // 
				$req = $this->_BDD->ReturnAuth()->query("SELECT * FROM account WHERE username=$ndc AND sha_pass_hash='$mdp_crypt'");
				
				if($tab = $req ->fetch()) {
				   
					   $_SESSION['user'] = new Player($tab['username'], $tab['email'], $tab['vote'], $tab['id'], $tab['last_ip'], $tab['parrain'], $tab['rank']); // COPIE DE LA CLASS PLAYER		   
						return true;
				}
				
			}
			
		
        }
?>