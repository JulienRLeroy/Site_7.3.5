<?php
include_once "../controller/player_controller.php";
include_once "../class/player.php";
include_once "../class/connect_db.php";

$methodPlayer = new Player_controler();
session_start();

 if(isset($_POST['sub_input'])) {
        
        $mdp = $_POST['password'];
        $mdp_verif = $_POST['pass_secure'];
        $email = $_POST['login_email'];
        
        if(empty($email)) 
        {
            $_SESSION['erreur'] = "Veuillez remplir un email";
             Header("Location: ../");
        } 
        else if(empty($mdp)) 
        {
            $_SESSION['erreur'] = "Veuillez remplir un mot de passe";
            Header("Location: ../");
        }
        else if(empty($mdp_verif))
        {
            $_SESSION['erreur'] = "Veuillez remplir la vérification de mot de passe";
            Header("Location: ../");
        }
        else if($mdp != $mdp_verif) {
            
            $_SESSION['erreur'] = "Les mots de passe ne correpondent pas";
            Header("Location: ../");
        } 
        else {
            
            $methodPlayer = new Player_controler();
            if($methodPlayer->Register($email, $mdp)) {
                
                $methodPlayer->Login($_POST['login_email'], $_POST['password']);
				$_SESSION['valide'] = "Compte créer avec succès !";
                Header("Location: ../");
            }
            else 
            {
                $_SESSION['erreur'] = "ERREUR : Veuillez contacter l'administrateur du site";
                Header("Location: ../");
            }
           
        }
	} else {
		$_SESSION['erreur'] = "Vous n'avez rien à faire ici";
        Header("Location: ../");
	}


?>

