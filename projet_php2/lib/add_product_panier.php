<?php
if(!empty($_POST)){
    $id_produit = $_POST['id_produit'];
    $user = $_SESSION['id_user'];

    $sql_add_product_to_panier = "INSERT INTO `panier`(`user_id`, `id_produit`) VALUES ('$user','$id_produit')";
    mysqli_query($connexion, $sql_add_product_to_panier);
}