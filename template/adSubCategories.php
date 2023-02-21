
<?php ob_start(); ?>
<div class="container ">
    <div class="row">
        <section class="col-12">
            <h1>SAISIE DES SOUS-CATEGORIES</h1>
            <form action="admin.php" method="POST" class="row my-5">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="sub_categories">
                </div>
                <div class="mb-3">
            <label for="definition" class="form-label">choisir la catégorie</label>
            <select name="subCategoriesCategories" class="form-select" aria-label="Default select example">
                <?php
                foreach ($categories as $categorie) {
                ?>
                    <option value="<?= $categorie['id'] ?>"><?= $categorie['name'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>

                <div class="mb-3 col-3">
                    <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                </div>
            </form>
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>