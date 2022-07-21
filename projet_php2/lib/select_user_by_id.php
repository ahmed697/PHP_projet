<?php 


	$id = $_SESSION['id_user'];

	$sql_select_user_by_id = "SELECT * FROM `user` WHERE `id_user` = '$id'";
	$table_user_by_id =  mysqli_query($connexion, $sql_select_user_by_id);
	$resultat_user_by_id = mysqli_fetch_array( $table_user_by_id, MYSQLI_ASSOC );

	// echo "<pre>";
	// print_r($resultat_user_by_id);
	// echo "</pre>";

?>