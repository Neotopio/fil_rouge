<?php
require_once('../database.php');

function categoriesVue()
{
    $db = dbconnect();
    $sql = 'SELECT *  FROM categories INNER JOIN sub_categories ON id_categories= categories.id  ';
    $query = $db->prepare($sql);
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
    return groupByNames($categories);
}
function groupByNames($data)
{
    $result = [];
    foreach ($data as $item) {
        if (!isset($result[$item['names']])) {
            $result[$item['names']] = [];
        }
        $result[$item['names']][] = [
            'id' => $item['id'],
            'is_enable' => $item['is_enable'],
            'name' => $item['name'],
            'id_categories' => $item['id_categories']
        ];
    }
    return $result;
}
