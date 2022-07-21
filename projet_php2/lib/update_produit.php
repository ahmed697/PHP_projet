<?php
if(!empty($_POST)){
    $id_produit = $_GET['id_produit'];
    $title = str_replace("'","''",$_POST['title']);
    $content = str_replace("'","''",$_POST['content']);
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $reduction = $_POST['reduction'];
    $stock = $_POST['stock'];
    // print_r($_POST);

if(!empty($title) && !empty($content) && !empty($price) && !empty($reduction)){
    $sql_update_produit = "UPDATE `produit` SET `title` = '$title', `content` = '$content', `price` = '$price', `image` = '$image', `reduction` = '$reduction', `stock` = '$stock'
                            WHERE `id_produit` = '$id_produit'";
    //($sql_upda echo te_produit);                
    mysqli_query($connexion, $sql_update_produit);

}else{

}
}