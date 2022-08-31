<?php
$user = $_SESSION['id_user'];

$sql_select_panier = "SELECT * FROM `panier` JOIN `produit` ON produit.id_produit = panier.id_produit WHERE `user_id` = $user";
$table_select_panier = mysqli_query($connexion, $sql_select_panier);
$resultat_panier = mysqli_fetch_all($table_select_panier, MYSQLI_ASSOC);
// print_r($resultat_panier);