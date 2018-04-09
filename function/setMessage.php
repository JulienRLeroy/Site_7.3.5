<?php

function SetMessage() {
	
		if(isset($_SESSION['erreur'])) {

			echo $_SESSION['erreur'];
			unset($_SESSION['erreur']);
		}

		if(isset($_SESSION['valide'])) {
	
			echo $_SESSION['valide'];
			unset($_SESSION['valide']);
		}
}	
?>