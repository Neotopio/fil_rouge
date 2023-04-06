<?php ob_start(); ?>

<div class="container mb-5">
    <div class="row mt-5">
        <h2 class="mb-5 text-center">Les vêtements</h2>
        <?php foreach ($products as $product) { ?>

            <div class="col-3 mt-4">
                <a href="index.php?action=productsDetail&id=<?= $product['pid'] ?>&previous=<?php if (isset($_GET['id'])) {echo $_GET['id'];} ?>">
                    <div class="card" style="height: 46rem;">
                        <img src="../admin/<?= $product['chemin'] ?>" class="card-img-top img-fluid" alt="" style="height:40rem ;">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?= $product['pn'] ?></h5>
                    <p class="card-text text-truncate"><?= $product['description'] ?></p>

                </div>
            </div>

    </div>

<?php } ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>