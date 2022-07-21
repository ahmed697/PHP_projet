<?php

if(isset($_SESSION['id_user'])){
$id_user = $_SESSION['id_user'];
$id_produit = $_GET['id_produit'];

$sql_verification_user_review = "SELECT * FROM `review` WHERE `id_user` = $id_user AND `id_produit` = $id_produit";
$table_verification_user_review = mysqli_query($connexion, $sql_verification_user_review);


// print_r ($table_verification_user_review);

if(mysqli_num_rows($table_verification_user_review) > 0){
    echo "jai voté je suis un escroc";
}else{
    echo "jai jamais voté";
}
}





?>

