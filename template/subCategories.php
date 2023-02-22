
<?php ob_start(); ?>
<main class="container">
    <div class="row">
        <section class="col-12">
            <h1>Liste des sous-catégories</h1>
            <table class="table">
                <thead>

                    <th>Nom</th>

                </thead>
                <tbody>
                    <div class="ajouter">
                        <a href="admin.php?page=adSubCategories"> <button class="btn btn-primary" type="submit"> Ajouter</button></a>
                    </div>
                    <?php
                    foreach ($subs as $sub) {
                    ?>
                        <tr>
                            <td><?= $sub['name'] ?></td>

                            <td class="action">
                                <a href="admin.php?page=updateSubCategories&id=<?php echo $sub['id'] ?>"> <button class="btn btn-primary" type="submit"> Modifier</button></a>
                            </td>

                            <td class="action">
                                <form action="model/deleteSubCategories.php" method="get"><input type="hidden" name='id' value="<?php echo $sub['id']; ?>"> <button class="btn btn-danger" type="submit" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));"> Supprimer</button> </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
    
        </section>
    </div>

    <?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>