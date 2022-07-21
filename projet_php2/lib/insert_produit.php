<?php 





if( !empty($_POST)){
 
	$title = $_POST['title'];
	$content = $_POST['content'];
	$image = $_FILES['image']['name'];
	// image1.jpg
	$price = $_POST['price']; 
	$reduction = $_POST['reduction'];
	$categorie = $_POST['categorie'];
	$id_user = $_SESSION['id_user'];

	print_r($categorie);

	if( !empty($title) && !empty($content) && !empty($image) && !empty($price)){
 
		$directory_upload = "../assets/images/";
		$directory = $directory_upload.$image;
		// "../assets/images/monImage.jpg"

		if( move_uploaded_file($_FILES['image']['tmp_name'], $directory) ){

			$sql_insert_produit = "INSERT INTO `produit`(`title`, `content`, `image`, `price`, `reduction`, `id_user`) VALUES ('$title','$content','$image','$price','$reduction','$id_user')";
			mysqli_query($connexion, $sql_insert_produit);

			$sql_insert_categorie = "INSERT INTO `produit_categorie` (`produit_id`,`categorie_id`)
									SELECT
										u.produit_id,
										r.categorie_id,
									from `produit` u
									inner join `categorie` r
									on r.id_categorie = u.categorie_id";
			mysqli_query($connexion, $sql_insert_categorie);


			// "INSERT INTO `produit_categorie` (`produit_id`,`categorie_id`)
			// SELECT
			// 	u.produit_id,
			// 	r.categorie_id,
			// from `produit` u
			// inner join `categorie` AS r
			//    on r.id_categorie = u.categorie_id"
		} 

	}else{

		echo "il faut remplir les champs du formulaire !";

	} 

}


?>