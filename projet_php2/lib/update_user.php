<?php 




if( !empty( $_POST )){

	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$password = $_POST['password'];

	if( !empty($lastname) && !empty($firstname) && !empty($password)){

		if(strlen($password) >= 8){

			if(!empty( $_FILES['file']['name'] )){

				$uploaddir = '../assets/images/profil/';

				$uploadfile = $uploaddir . $_FILES['file']['name'];
				// ../assets/images/profil/bg1.PNG
				

				if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {

				    // echo "File is valid, and was successfully uploaded.\n";

				    $nameFile = $_FILES['file']['name'];


				    $sql_update_user = "UPDATE `user` SET `lastname` = '$lastname', `firstname` = '$firstname', `password` = '$password', `image_profil` = '$nameFile' WHERE `id_user` = ".$_SESSION['id_user'];

					mysqli_query( $connexion, $sql_update_user ); 

				} else {

				    echo "Possible file upload attack!\n";

				} 

			}else{ 

				$sql_update_user = "UPDATE `user` SET `lastname` = '$lastname', `firstname` = '$firstname', `password` = '$password' WHERE `id_user` = ".$_SESSION['id_user'];

				mysqli_query( $connexion, $sql_update_user ); 

			}




		}

	}

}




?>