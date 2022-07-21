<?php
   $id_produit = $_GET['id_produit'];
   
   $moyenne_rate = "SELECT ROUND(AVG(rate)) FROM `review` WHERE `id_produit` = $id_produit";
   
   $table_select_average = mysqli_query($connexion, $moyenne_rate);
   $resultat_average = mysqli_fetch_array($table_select_average, MYSQLI_ASSOC);

   // print_r($resultat_average);
