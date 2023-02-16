<?php



if(isset($_GET['pagenb']) && !empty($_GET['pagenb'])){
    $currentPage = (int) strip_tags($_GET['pagenb']);
}else{
    $currentPage = 1;
}

$sql = 'SELECT COUNT(*) AS nb_articles FROM `categories`;';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetch();
$nbArticles = (int) $result['nb_articles'];
$parPage = 5;
$pages = ceil($nbArticles / $parPage);
$premier = ($currentPage * $parPage) - $parPage;


$sql = 'SELECT * FROM `categories`  LIMIT :premier, :parpage;';
$query = $db->prepare($sql);
$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);


?>

    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Liste des catégories</h1>
                <table class="table">
                    <thead>
                       
                        <th>Nom</th>
                       
                    </thead>
                    <tbody>
                        <div class="ajouter">
                    <a href= "admin.php?page=adCategories"> <button class="btn btn-primary" type="submit"> Ajouter</button></a></div>
                        <?php
                        foreach($categories as $categorie){
                        ?>
                            <tr>
                                <td><?= $categorie['name'] ?></td>
                              
                                <td class="action">
                   <a href= "admin.php?page=modificationCategorie&id=<?php echo $categorie['id']?>"> <button class="btn btn-primary" type="submit"> Modifier</button></a>
                </td>
                <td class="action">
                   <a href= "admin.php?page=subCategories&id=<?php echo $categorie['id']?>"> <button class="btn btn-primary" type="submit"> Voir sous-catégories</button></a>
                </td>
                <td class="action"> <form action="model/deleteCategories.php" method="get"><input type="hidden" name='id' value="<?php echo $categorie['id']; ?>"> <button class="btn btn-danger" type="submit" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));"> Supprimer</button> </form>
                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <section>
                    <ul class="pagination">
                      
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="?page=gestion&pagenb=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                     
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="?page=gestion&pagenb=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                      
                          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="?page=gestion&pagenb=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </section>
            </section>
        </div>
        
    </main>
</body>
</html>