<?php
if(!empty($_POST)){
        $id_produit = $_POST['id_produit'];

        $sql_delete_product_from_panier = "DELETE FROM `panier` WHERE `id_produit` = $id_produit";
        mysqli_query($connexion, $sql_delete_product_from_panier);
        header("Refresh:1");
}