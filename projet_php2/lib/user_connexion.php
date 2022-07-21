<?php 

if(!empty($_POST)){

	$email = $_POST['email'];
	$password = $_POST['password'];


	if( !empty($email) && !empty($password) ){

		// print_r($_POST);

 		$sql_select_user = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
 		$table_select_user = mysqli_query($connexion, $sql_select_user);
 		$resultat_user = mysqli_fetch_all( $table_select_user, MYSQLI_ASSOC );

		print_r($resultat_user);


 		if( mysqli_num_rows($table_select_user) > 0 ){

 			echo "GG ! on a une correspondance !";
 
		    session_unset();

 			$_SESSION['id_user'] = $resultat_user[0]['id_user'];
 			
 			$_SESSION['email'] = $_POST['email'];
 			$_SESSION['motdepasse'] = $_POST['password'];
 			$_SESSION['prenom'] = $resultat_user[0]['firstname'];
 			$_SESSION['nom'] = $resultat_user[0]['lastname'];
 			$_SESSION['droit'] = $resultat_user[0]['power'];
 			$_SESSION['image_profil'] = $resultat_user[0]['image_profil'];


 			header("Location: ../index.php");




 		}else{

 			echo "Login ou mot de passe incorrect";
 		}


	}
}


?>