<?php
    
    $sqlCategorie = "SELECT * FROM `categorie`";
    $categorie_table = mysqli_query($connexion, $sqlCategorie);
    $categorie_resultat = mysqli_fetch_all($categorie_table, MYSQLI_ASSOC);