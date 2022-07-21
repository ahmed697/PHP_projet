<?php
    $sql_sondage = "SELECT id_produit,COUNT(rate) AS nbr_vote FROM review GROUP BY id_produit";
    $table_sondage = mysqli_query($connexion, $sql_sondage);
    $result_sondage = mysqli_fetch_all($table_sondage,MYSQLI_ASSOC);

    // print_r($result_sondage);
    unlink("../backoffice/js/sondage.json");
    $file=fopen("../backoffice/js/sondage.json","a");
    $json = json_encode($result_sondage);
    fwrite($file,$json);
    fclose($file);