<?php ob_start(); ?>

<div class="container mt-5 ">
    <div class="row mt-5">
        <div class="col-12 mt-5">
            <h2 class="mb-5 text-center mt-5">Qui somme nous</h2>
            Tout pour les fans de rock, de métal, de punk ou de gothique.
            Avec sa large gamme de T-shirts imprimés, T-shirts en métal, T-shirts rock,
            sweatshirts, chaussures et accessoires de mode ou cadeaux, la boutique de métal EMP
            est l'un des principaux vendeurs de vetements en métal et rock dans notre pays. Notre magasin
            de métal a déja répondu aux souhaits de milliers d'âmes apparentées et leur a fourni des T-shirts
            en métal, des pulls molletonnés, des chaussures en acier et d'autres cadeaux. Nous ajoutons et stockons
            de nouveaux vetements en métal de marque, t-shirts en métal et autres accessoires chaque semaine, nous
            vous recommandons donc de suivre régulierement nos actualités. Notre spécialité n'est pas seulement les
            t-shirts métalliques, les CHAUSSURES ACIER ou les vetements Spiral Direct. Nous proposons de nombreuses
            marques bien connues. Nous ne vendons que des vetements en métal officiels et de marque.
        </div>
    </div>

    <div class="row mt-5">
        <h2 class="mb-5 text-center">Les nouveautées</h2>
        <?php foreach ($products as $product) { ?>

            <div class="col-lg-3 mt-4 col-sm-12 col-md-6"> 
                <a href="index.php?action=productsDetail&id=<?=$product['id'];?>&previous=<?=$product['id_sous_categories'];?>">
                    <div class="card" style="height: 35rem;">
                        <img src="../admin/<?= $product['chemin'] ?>" class="card-img-top img-fluid" alt="" style="height: 20rem;"> </a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['product_name'] ?></h5>
                            <p class="card-text"><?= $product['description'] ?></p>

                        </div>
                    </div>
               
            </div>

        <?php } ?>
    </div>



</div>










<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>