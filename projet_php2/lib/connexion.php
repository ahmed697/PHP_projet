<?php 


$dataBaseName = "amazon";
$server = "localhost";
$passwordDB = "";
$loginDB = "root";


$connexion = mysqli_connect($server, $loginDB, $passwordDB, $dataBaseName);
// 1er etape : connexion à la bdd en se servant de 4 variables indispensables !

if (mysqli_connect_error()) {
    echo "Erreur de connexion à la BDD";
}
// si l'echo s'affiche alors nous n'avons pas reussi à nous connecter.