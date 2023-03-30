<?php ob_start(); ?>




<div class="container ">
    <div class="row">
        <section class="col-12">
            <h1>MIS A JOUR DU PRODUIT</h1>

            <form action="controllers/updateProducts.php" method="POST" class="row my-5" enctype="multipart/form-data">
                <?php
                foreach ($products as $product) {
                ?>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="name" value="<?= $product['name'] ?>">
                    </div>
                    <div class="form-floating">

                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name='description'><?= $product['description'] ?></textarea>
                        <label for="floatingTextarea2">Déscription</label>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Prix</label>
                        <input type="text" class="form-control" name="price" value="<?= $product['price'] ?>">
                    </div>
                <?php
                }
                ?>
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

                    <select class="form-select" aria-label="Default select example" id="cat" name="categories">
                        <option value="Sélectionnez la catégorie">Sélectionnez la catégorie</option>
                        <?php
                        foreach ($categories as $categorie) {
                        ?>
                            <option value="<?= $categorie['id'] ?>"><?= $categorie['names'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="definition" class="form-label">Choisir la sous-catégorie</label>
                    <select class="form-select" aria-label="Default select example" id="sc" name="sousCategories">

                    </select>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Modification photos
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <?php
                                            foreach ($photos as $photo) {
                                            ?>
                                                <div class="col-2">
                                                    <div class="card ">
                                                        <img src="<?= $photo['chemin'] ?>" class="img-fluid">
                                                        <div class="card-body">

                                                            <a href="controllers/deletePictures.php?id=<?php echo $photo['id']; ?>" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));"> Supprimer</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Ajoux des photos</label>
                                            <input class="form-control" type="file" id="formFileMultiple" name="pictures[]" multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Modification des options
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row ">
                                            <div class="col-6">
                                                <legend>Couleurs disponible</legend>
                                                <?php
                                                foreach ($colors as $color) {
                                                ?>
                                                    <div class="mb-3">
                                                        <input class="form-check-input mt-0" <?php foreach ($options as $option) {
                                                                                                           
                                                                                                           if ($option['id_color'] == $color['id']) {
                                                                                                                echo 'checked';
                                                                                                                break;
                                                                                                            }

                                                                                                } ?> type="checkbox" name="color[]" id="<?= $color['color'] ?>" value="<?= $color['id'] ?>">
                                                        <label for="<?= $color['color'] ?>" class="form-label"><?= $color['color'] ?></label>


                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-6">
                                                <legend>Tailles disponible</legend>
                                                <?php
                                                foreach ($sizes as $size) {
                                                ?>
                                                    <div class="mb-3">
                                                        <input class="form-check-input mt-0" <?php foreach ($options as $option) {
                                                                                                    if ($option['id_size'] == $size['id']) {
                                                                                                        echo 'checked';
                                                                                                        break;
                                                                                                    }
                                                                                                } ?> type="checkbox" name="size[]" id="<?= $size['size'] ?>" value="<?= $size['id'] ?>">
                                                        <label for="<?= $size['size'] ?>" class="form-label"><?= $size['size'] ?></label>


                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-5">
                        <label for="enable" class="form-label">Active</label>
                        <select name="enable" id="" class="form-select">
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    window.addEventListener('load', () => {
        const cat = document.getElementById('cat');
        const sc = document.getElementById('sc');
        sc.disabled = true;
        cat.addEventListener('change', () => {
            sc.disabled = false;
            $.get('vueProducts.php', {
                identCat: cat.value
            }).done((data) => {
                sc.innerHTML = '';
                JSON.parse(data).forEach((e) => {
                    let subcat = document.createElement('OPTION');
                    subcat.value = e.id;
                    let txt = document.createTextNode(e.name);
                    subcat.appendChild(txt);
                    sc.appendChild(subcat);
                });
                if (cat.value == 'Sélectionnez la catégorie') {
                    sc.disabled = true;
                    let opt = document.createElement('OPTION');
                    opt.innerHTML = 'Sélectionnez la sous-catégorie';
                    sc.appendChild(opt);
                } else {
                    sc.disabled = false;
                }

            });
        });
    });
</script>