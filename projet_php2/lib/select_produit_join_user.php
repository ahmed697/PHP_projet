<?php 

$sql_produit_join_user = "SELECT * FROM `produit` INNER JOIN `user` ON produit.id_user = user.id_user";
$table_produit_join_user = mysqli_query($connexion, $sql_produit_join_user);
$resultat_produit_join_user = mysqli_fetch_all($table_produit_join_user, MYSQLI_ASSOC);

// echo "<pre>";
// print_r($resultat_produit_join_user);
// echo "</pre>";




?>