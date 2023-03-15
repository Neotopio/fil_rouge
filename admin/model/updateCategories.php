<?php

require_once('database.php');

function categoriesVue($id)
{
    $db = dbconnect();

    $sqlQuery = 'SELECT * FROM categories WHERE id = :id';
    $nomsStatement = $db->prepare($sqlQuery);
    $nomsStatement->bindValue(':id', $id, PDO::PARAM_STR);
    $nomsStatement->execute(array(
        'id' => $id,
    ));
    $nomsStatement->execute();
    $noms = $nomsStatement->fetchAll();

    foreach ($noms as $nom) {
        $nomTitre = $nom['names'];
    }
    return $nomTitre;
}
