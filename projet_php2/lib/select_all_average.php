
<?php
       $id_produit = $_GET['id_produit'];
   
       $moyenne_all_rate = "SELECT id_produit,ROUND(AVG(rate)) AS average_rating FROM `review` GROUP BY `id_produit`";
       
       $table_select_all_average = mysqli_query($connexion, $moyenne_all_rate);
       $resultat_all_average = mysqli_fetch_all($table_select_all_average, MYSQLI_ASSOC);
    
    //    print_r($resultat_all_average);

       $avg_array = array();

       foreach($resultat_all_average as $key => $value){
           $avg_array[$value['id_produit']] = $value['average_rating'];
       }

    //    print_r($avg_array);