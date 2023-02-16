<?php 
$sql = 'SELECT * FROM `categories`  ';
$query = $db->prepare($sql);
$query->execute();
$articles = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container ">
    <div class="row">
        <section class="col-12">
            <h1>SAISIE DES SOUS-CATEGORIES</h1>
            <form action="model/subCategories.php" method="POST" class="row my-5">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="sub_categories">
                </div>
                <div class="mb-3">
            <label for="definition" class="form-label">choisir la catégorie</label>
            <select name="subCategoriesCategories" class="form-select" aria-label="Default select example">
                <?php
                foreach ($articles as $article) {
                ?>
                    <option value="<?= $article['id'] ?>"><?= $article['name'] ?></option>
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