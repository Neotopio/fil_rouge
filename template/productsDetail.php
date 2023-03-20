<?php ob_start(); ?>



<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-6 mt-5">
            
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                    <?php foreach ($products as $product) { ?>
                        <div class="carousel-item active">
                            <img src="../admin/<?= $product['chemin']['0'] ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../admin/<?= $product['chemin'] ?>" class="d-block w-100" alt="...">
                        </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <?php foreach ($products as $product) { ?>
                <div class="col-md-6 mt-5">
                    <h2><?=$product['name'];?></h2>
                    <p>Description du produit.</p>
                   <p><?=$product['description'];?></p> 
                    <p>Prix : <?=$product['price'];?></p>
                <?php } ?>
                <div class="form-group">
                    <label for="color">Couleur :</label>
                  
                    <select class="form-control" id="color">
                          <?php foreach($options as $option){?>
                        <option>S</option>
                       <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="size">Taille :</label>
                    <select class="form-control" id="size">
                    <?php foreach($options as $option){?>
                        <option>S</option>
                       <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantite">Quantité :</label>
                    <input type="number" class="form-control" id="quantite" value="1" min="1">
                </div>
                <button class="btn btn-primary" onclick="ajouterAuPanier()">Ajouter au panier</button>
                </div>
        </div>
    </div>
    <?php $content = ob_get_clean(); ?>

    <?php require('layout.php') ?>