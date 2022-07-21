<?php 


// echo "COUCOU";

// print_r($_POST);

// print_r($_SESSION);

if( !empty($_POST) ){


	$vote = $_POST['vote'];
	$id_produit = $_GET['id_produit'];
	$id_user = $_SESSION['id_user'];

	if( !empty($vote) && $vote >= 1 && $vote <= 5){

		echo "test du formulaire de vote valeur : ".$vote;
		$sql_insert_review = "INSERT INTO `review`(`rate`, `id_produit`, `id_user`) VALUES ('$vote','$id_produit','$id_user') ";

		mysqli_query( $connexion, $sql_insert_review);

	 


	}else{

		echo "Veuillez renseigner une valeur entre 1 et 5";

	}

}