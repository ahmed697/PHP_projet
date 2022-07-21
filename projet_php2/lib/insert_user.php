<?php 


// print_r($_POST);

if(!empty( $_POST )){


 

	$prenom = $_POST['prenom'];
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$mdp = $_POST['mdp'];
	$mdp_confirm = $_POST['confirm-mdp'];


	//  empty() verifie si une variable est vide
	// !empty() verifie si une variable est remplie


	if( !empty($prenom) && !empty($nom) && !empty($email) && !empty($mdp) && !empty($mdp_confirm)){

		// echo "Ok pour les champs !";


		if( $mdp == $mdp_confirm && strlen($mdp) >= 8  ){

			// echo "Ok pour les MDP";


			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

			    // echo "L'adresse email '$email' est considérée comme valide.";


			    $sql_select_user = "SELECT `email` FROM `user` WHERE `email` = '$email'";
			    $table_select_user = mysqli_query($connexion, $sql_select_user);


			    if( mysqli_num_rows($table_select_user) == 0 ) {

			    	// echo "0 correspondance, c'est bon !";

			    	$sql_insert_user = "INSERT INTO `user` (`lastname`, `firstname`, `email`, `password`) VALUES ('$nom', '$prenom', '$email', '$mdp');";
			    	mysqli_query( $connexion, $sql_insert_user);


			    	// header( location ) fonction de redirection sur une page précise.
			    	header('Location: login.php');


			    }else{

			    	// echo "email déjà existant";

			    }



			}else{

				// echo "L'adresse email est invalie";
			}


		}else{

			// echo "Vos MDP sont differents ou inferieur à 8 caractères";

		}

	}else{

		echo "Erreur ! Veuillez remplir tous les champs.";

	}




	


}

	?>