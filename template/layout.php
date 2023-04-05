<?php

require_once('../model/categories.php');
$categories = categoriesVue();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>EMP</title>
</head>
<script>
    function updateCartCount() {

        $.ajax({
            url: "countCarts.php",
            type: "GET",
            data: {
                action: "get_total_quantity"
            },
            dataType: "json",
            success: function(response) {

                const cartBadge = document.getElementById("compteurPanier");
                cartBadge.innerHTML = response.totalQuantity;
            },

        });
    }
    window.onload = function() {
        updateCartCount();
    };
</script>


<style>
    a {
        text-decoration: none;
        cursor: url(../images/cursor.cur), auto;
    }
</style>

<body>


    <header class=" mb-5">
        <div class="container-fluid ">
            <div class="row bg-black text-white justify-content-end align-items-center">

                <div class="col-lg-2">
                    <a href="index.php"> <img src="../images/logo.svg" class="img-fluid logo " alt=""></a>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-2 justify-content-end"><a href="index.php?action=connection" class="text-white"><i class="bi bi-person">Se connecter</i></a>

                    <a href="index.php?action=carts">
                        <button type="button" class="btn btn-dark position-relative">
                            <i class="bi bi-cart3"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="compteurPanier">
                                0
                                <span class="visually-hidden"></span>
                            </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php foreach ($categories as $category => $products) { ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $category ?>
                                </a>

                                <ul class="dropdown-menu">
                                    <?php foreach ($products as $cat) { ?>
                                        <li><a class="dropdown-item" href="index.php?action=products&id=<?= $cat['id'] ?>"><?php echo $cat['name']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main class="mt-5">


        <?= $content ?>

    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-4 ">
                    <p class="fw-bold">
                        Service Client
                    </p>
                    <p class="text-secondary fs-6">
                        Notre équipe SAV est disponible de 10:00 à 18:30.
                    </p>
                    <div class=" mb-2 mt-3 d-flex">
                        <a href="index.php?action=contact" class="  w-auto">
                            <span class="  d-flex text-black">Nous contacter !</span>
                        </a>
                    </div>
                    <div class=" mb-2 mt-3 d-flex">
                        <a href="" class="  w-auto">
                            <span class="  d-flex text-black">FAQ</span>
                        </a>
                    </div>
                    <div class=" mb-2 mt-3 d-flex">
                        <a href="" class="  w-auto">
                            <span class="  d-flex text-black">Service Retour</span>
                        </a>
                    </div>
                    <div class=" mb-2 mt-3 d-flex">
                        <a href="" class="  w-auto">
                            <span class="  d-flex text-black">Informations sur la taille</span>
                        </a>
                    </div>
                    <div class=" mb-2 mt-3 d-flex">
                        <a href="" class="  w-auto">
                            <span class="  d-flex text-black">Annuler mon Abonnement BSC</span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-4 ">
                    <p class="  font-size-l fw-bold">
                        Offre pour toi
                    </p>
                    <div class=" mb-2 mt-3 d-flex">
                        <a href="" class="  w-auto">
                            <span class="  d-flex text-black">Concours</span>
                        </a>
                    </div>
                    <div class=" mb-2 mt-3 d-flex">
                        <a href="" class="  w-auto">
                            <span class="  d-flex text-black">Bons d'achat EMP</span>
                        </a>
                    </div>
                    <div class=" mb-2 mt-3 d-flex">
                        <a href="" class="  w-auto">
                            <span class="  d-flex text-black">Réduction EMP pour les étudiants</span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-4 ">
                    <p class="font-secondary  font-size-l fw-bold">
                        À propos d'EMP
                    </p>
                    <div class=" mb-2 mt-3 d-flex">
                        <a href="" class="  w-auto">
                            <span class="  d-flex text-black">Réseau d'Affiliation</span>
                        </a>
                    </div>
                    <div class=" mb-2 mt-3 d-flex">
                        <a href="" class="  w-auto">
                            <span class="  d-flex text-black">Durabilité</span>
                        </a>
                    </div>
                </div>
            </div>


            <div class="mt-5">
                <div class="position-relative">
                    <p class="font-secondary fw-bold font-size-l font-size-sm-xl mb-2">
                        Légal
                    </p>
                    <div class="row">
                        <div class="col-12 col-sm-auto mb-5">
                            <a href="" class="text-black">
                                <span>Conditions générales</span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-auto mb-5">
                            <a href="" class="text-black"> <span>Éditeur</span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-auto mb-5">
                            <a href="" class="text-black"> <span>Clauses de confidentialité</span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-auto mb-5">
                            <a href="" class="text-black"> <span>Politique de cookies</span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-auto mb-5">
                            <a href="" class="text-black"> <span>Élimination des déchets et protection de l'environnement</span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-auto mb-5">
                            <a href="" class="text-black">
                                <span>Déclaration de Conformité</span>
                            </a>
                        </div>
                    </div>
                    <div class=" darkgray-text row">
                        <div class="col-12">
                            <span class="mb-1 d-block">
                                Tous nos prix sont T.T.C. Cependant, ils ne comprennent pas les frais d'envoi.
                            </span>
                            <p>© 1986-2023 EMP France</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


</html>