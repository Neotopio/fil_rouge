<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Liste des Produits</h1>
            <table class="table">
                <thead>

                    <th>Nom</th>
                    <th>Déscription</th>

                </thead>
                <tbody>
                    <div class="ajouter">
                        <a href="admin.php?page=adProducts"> <button class="btn btn-primary" type="submit"> Ajouter</button></a>
                    </div>
                    <?php
                    foreach ($products as $product) {
                    ?>
                        <tr>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['description'] ?></td>

                            <td class="action">
                                <a href="admin.php?page=updateProducts&id=<?php echo $product['id'] ?>"> <button class="btn btn-primary" type="submit"> Modifier</button></a>
                            </td>
                           
                            <td class="action">
                                <form action="model/deleteProducts.php" method="get"><input type="hidden" name='id' value="<?php echo $product['id']; ?>"> <button class="btn btn-danger" type="submit" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));"> Supprimer</button> </form>
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