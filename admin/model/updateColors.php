<?php

require_once('database.php');

function colorsVue($id)
{
    $db = dbconnect();

    $sqlQuery = 'SELECT * FROM colors WHERE id = :id';
    $nomsStatement = $db->prepare($sqlQuery);
    $nomsStatement->bindValue(':id', $id, PDO::PARAM_STR);
    $nomsStatement->execute(array(
        'id' => $id,
    ));
    $nomsStatement->execute();
    $noms = $nomsStatement->fetchAll();

    foreach ($noms as $nom) {
        $nomTitre = $nom['color'];
    }
    return $nomTitre;
}
