<?php 
// PAGE SINGLE ARTICLE
session_start();
include("../lib/connexion.php");
include("../lib/select_produit.php");
include("../lib/insert_review.php");
include "../lib/verify_note.php";
include "../lib/select_review_average.php";
include "../lib/select_all_average.php";
// echo $_GET['id_produit'];

// print_r($produit_resultat);



?>


 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="http://localhost/projet_php2/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>


        <?php foreach ($produit_resultat as $key) {  ?>
            <?php if( $key['id_produit'] == $_GET['id_produit'] ) { ?>

            <!-- Product section-->
            <section class="py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="../assets/images/<?php echo $key['image']; ?>" alt="..." /></div>
                        <div class="col-md-6">
                            <div class="small mb-1">SKU: BST-498</div>
                            <h1 class="display-5 fw-bolder"><?php echo $key['title']; ?></h1>
                            <div class="fs-5 mb-5">
                                <span class="text-decoration-line-through"><?php echo $key['price']; ?></span>
                                <span><?php echo $key['price']; ?></span>
                            </div>

                            <div class="d-flex justify-content-center">
                            <?php 
                                for($i=0;$i<$resultat_average['ROUND(AVG(rate))'];$i++){
                                    echo "<div class='bi-star-fill'></div>";
                                    }
                                    for($i=0;$i<5-$resultat_average['ROUND(AVG(rate))'];$i++){
                                    echo "<div class='bi-star'></div>";
                                    }
                                    ?>
                            </div>

                            <p class="lead"><?php echo $key['content']; ?></p>
                            <?php 
                            if(!empty($_SESSION)){
                                if(mysqli_num_rows($table_verification_user_review) == 0){ ?>

                                <form class="d-flex" method="POST">
                                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" name="vote" />
                                    <input type="submit" name="envoyer" value="Voter !">                    
                                </form>

                            <?php }else{ ?>
                                <p>deja voté</p>
                            <?php }} ?>

                        </div>
                    </div>
                </div>
            </section>

           <?php }} ?>


        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


                    <?php foreach ($produit_resultat as $key) {
                        if($key['display'] == 0){ 
                        if( $key['id_produit'] != $_GET['id_produit'] ){ ?>
                        
                
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo $key['reduction']; ?>%</div>
                                <!-- Product image-->
                                <img class="card-img-top" src="../assets/images/<?php echo $key['image']; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $key['title']; ?></h5>
                                        <!-- Product reviews-->

                                        <div class="d-flex justify-content-center">
                                        <?php
                                             if (!empty($avg_array[$key['id_produit']])){
                                                 echo $avg_array[$key['id_produit']];
                                             }
                                        ?>
                                            <?php 
                                                for($i=0;$i<$avg_array[$key['id_produit']];$i++){
                                                    echo "<div class='bi-star-fill'></div>";
                                                    }
                                                    for($i=0;$i<5-$avg_array[$key['id_produit']];$i++){
                                                    echo "<div class='bi-star'></div>";
                                                    }
                                            ?>
                                        </div>  

                                        <!-- Product price-->
                                       <?php if($key['reduction']){  

                                            echo '<span class="text-muted text-decoration-line-through">'.$key['price'].' €</span>';

                                            echo  round($key['price'] * (1 - $key['reduction'] / 100), 2)." €";

                                            // Si j'ai un prix à réduire : alors, j'affiche le prix de base baré avec le span
                                            // puis je fais un echo d'un calcul du prix de base via le % de réduction

                                         }else{

                                            echo  $key['price']." €";

                                            // je n'ai pas de réduction, j'affiche le prix normal

                                         } ?>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id_produit=<?php echo $key['id_produit']; ?>">Voir le produit</a></div>
                                </div>
                            </div>
                        </div>
                        
                        <?php }else{}}}?>

                  
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
