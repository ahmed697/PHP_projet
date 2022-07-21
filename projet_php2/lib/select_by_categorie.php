<?php
    if(isset($_GET['cid'])){

        $cat_id =  $_GET['cid'];


    $sql_produit_Categorie = "SELECT * FROM `produit_categorie` 
                                JOIN `produit` ON produit.id_produit = produit_categorie.id_produit
                                WHERE `id_categorie` = $cat_id";
    $categorie_produit_table = mysqli_query($connexion, $sql_produit_Categorie);
    $categorie_produit_resultat = mysqli_fetch_all($categorie_produit_table, MYSQLI_ASSOC);
    // print_r($categorie_produit_resultat);
    }else{
        $sql_produit_Categorie = "SELECT * FROM `produit`";

        $categorie_produit_table = mysqli_query($connexion, $sql_produit_Categorie);
        $categorie_produit_resultat = mysqli_fetch_all($categorie_produit_table, MYSQLI_ASSOC);
    }
