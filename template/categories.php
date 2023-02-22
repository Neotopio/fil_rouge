<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Liste des catégories</h1>
            <table class="table">
                <thead>

                    <th>Nom</th>

                </thead>
                <tbody>
                    <div class="ajouter">
                        <a href="admin.php?page=adCategories"> <button class="btn btn-primary" type="submit"> Ajouter</button></a>
                    </div>
                    <?php
                    foreach ($categories as $categorie) {
                    ?>
                        <tr>
                            <td><?= $categorie['name'] ?></td>

                            <td class="action">
                                <a href="admin.php?page=updateCategories&id=<?php echo $categorie['id'] ?>"> <button class="btn btn-primary" type="submit"> Modifier</button></a>
                            </td>
                            <td class="action">
                                <a href="admin.php?page=subCategories&id=<?php echo $categorie['id'] ?>"> <button class="btn btn-primary" type="submit"> Voir sous-catégories</button></a>
                            </td>
                            <td class="action">
                                <form action="model/deleteCategories.php" method="get"><input type="hidden" name='id' value="<?php echo $categorie['id']; ?>"> <button class="btn btn-danger" type="submit" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));"> Supprimer</button> </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
           
        </section>
    </div>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>