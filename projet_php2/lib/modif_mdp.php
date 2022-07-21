<?php
if(!empty($_POST)){
    $token = $_GET['token'];
    $password = $_POST['new_mdp'];
    $confirm_password = $_POST['confirm_mdp'];

        if($password == $confirm_password){
            if(strlen($password) >= 8){

                $update_password = "UPDATE `user` SET `password` = $password, `token` = NULL WHERE `token` = '$token'";
                mysqli_query($connexion, $update_password);

                header("Location: ../backoffice/login.php");
        }else{
            echo "mdp inferieur a 8 cractères";
        }
    }else{
        echo "mdp pas identiques";
    }
}