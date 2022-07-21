<?php

session_start(); 
// SI session_start n'est pas activé, alors nous ne pourrons pas manipuler la session
session_unset();
session_destroy();

header('Location: ../index.php');

?>