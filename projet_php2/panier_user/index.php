<?php 
session_start();
include("../lib/connexion.php");
include("../lib/select_panier.php");
include("../lib/select_categorie.php");
include("../lib/select_average.php");
include("../lib/select_by_categorie.php");
include("../lib/delete_from_panier.php");


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


<!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">MyShop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    </ul>


                    <?php  if( empty($_SESSION) ){  ?>

                        <form class="d-flex" style="    margin-right: 10px;">
                            <a class="btn btn-outline-dark" href="backoffice/login.php">
                                <i class="bi-box-arrow-in-right me-1"></i>
                                connexion
                                <!-- <span class="badge bg-dark text-white ms-1 rounded-pill">0</span> -->
                            </a>
                        </form>

                        <form class="d-flex">
                            <a class="btn btn-outline-dark" href="backoffice/register.php">
                                <i class="bi-file-earmark-diff me-1"></i>
                                inscription
                                <!-- <span class="badge bg-dark text-white ms-1 rounded-pill">0</span> -->
                            </a>
                        </form>

                    <?php } else { ?>

                        <form class="d-flex">
                            <a class="btn btn-outline-dark" href="backoffice">
                                <i class="bi-file-earmark-diff me-1"></i>
                                Panneau de configuration
                                <!-- <span class="badge bg-dark text-white ms-1 rounded-pill">0</span> -->
                            </a>
                        </form>

                    <?php } ?>
                </div>
            </div>
        </nav>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <h1>Votre Panier</h1>
                    <?php  foreach ($resultat_panier as $key) {
                    if($key['display'] == 0){ ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->


                            <?php if($key['reduction'] != ""){ ?>

                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo $key['reduction']; ?>%</div>


                            <?php } ?>



                            <?php 

                            // if( $key['reduction'] != "" ){

                            //     echo '<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">'.$key['reduction'].'</div>';

                            // }

                            ?>



                            <!-- Product image-->
                            <img class="card-img-top" width="300" src="../assets/images/<?php echo $key['image']; ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"> <?php echo $key['title']; ?> </h5>
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
                        <form method="POST">
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="single_article/index.php?id_produit=<?php echo $key['id_produit']; ?>">Voir le produit</a></div>
                                <div class="text-center"><button class="btn btn-outline-dark mt-auto" type="submit">Supprimer du panier</button></div>
                                <input type="hidden" name="id_produit" value="<?php echo $key['id_produit'] ?>">
                            </div>
                            </div>
                        </form>
                    </div>
                    
                    <?php }else{ } } ?>
                  
                </div>
            </div>
        </section>