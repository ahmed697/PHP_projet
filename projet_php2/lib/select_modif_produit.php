<?php
    $id_produit = $_GET['id_produit'];
    $select_id_produit = "SELECT * FROM `produit` WHERE `id_produit` = $id_produit";
    $table_select_id_produit = mysqli_query($connexion, $select_id_produit);
    $resultat_select_produit = mysqli_fetch_array($table_select_id_produit, MYSQLI_ASSOC);
    // print_r($resultat_select_produit);