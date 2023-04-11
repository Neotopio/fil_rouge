<?php ob_start(); ?>


<form action="../controllers/adCarts.php" method="post">
    <div class="container mt-5 mb-5">
        <div class="row mt-5">
            <div class="col-lg-4 col-md-6 mt-5">

                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img src="../admin/<?= $photos[0]['chemin'] ?>" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <?php foreach ($photos as $index => $photo) {
                            if ($index == 0) continue;
                        ?>
                            <div class="carousel-item">
                                <img src="../admin/<?= $photo['chemin'] ?>" class="d-block w-100 img-fluid" alt="...">
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
            </div>

            <?php foreach ($products as $product) { ?>
                <div class="col-lg-8 col-md-6 mt-5">
                    <input type="hidden" name="id" value="<?= $product['id']; ?>">
                    <h2><?= $product['name']; ?></h2>
                    <p>Description du produit.</p>
                    <p><?= $product['description']; ?></p>
                    <p>Prix : <?= $product['price']; ?> euro/TTC</p>
                    <input type="hidden" name="price" value="<?= $product['price']; ?>">
                    <input type="hidden" name="previous" value="<?php if (isset($_GET['previous'])) {
                                                                    echo $_GET['previous'];
                                                                }; ?> ">
                <?php } ?>
                <div class="form-group">

                    <label for="color">Couleur :</label>

                    <select class="form-control" id="color" name="color">
                        <?php
                        foreach ($colors as $color) {
                        ?>
                            <?php foreach ($options as $option) {

                                if ($option['id_color'] == $color['id']) {
                                    echo '<option>' . $color['color'] . '</option>';
                                    break;
                                }
                            ?>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="size">Taille :</label>
                    <select class="form-control" id="size" name="size">
                        <?php
                        foreach ($sizes as $size) {
                        ?>
                            <?php foreach ($options as $option) {

                                if ($option['id_size'] == $size['id']) {
                                    echo '<option>' . $size['size'] . '</option>';
                                    break;
                                }
                            ?>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantite">Quantité :</label>
                    <input type="number" class="form-control" id="quantite" name="quantity" value="1" min="1">
                </div>
                <button class="btn btn-primary">Ajouter au panier</button>
                </div>

        </div>
    </div>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>