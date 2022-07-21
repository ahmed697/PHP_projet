<?php
if (!empty($_POST)) {
    $id_produit = $_POST['id_produit'];
    $toggleDisplay = $_POST['toggle_display'];
    if ($toggleDisplay == 0) {
        $sql_display = "UPDATE `produit` SET `display`= 1 WHERE `id_produit` = '$id_produit'";
        mysqli_query($connexion, $sql_display);
    } else {
        $sql_display_none = "UPDATE `produit` SET `display` = 0 WHERE `id_produit` = '$id_produit'";
        mysqli_query($connexion, $sql_display_none);
    }
}
