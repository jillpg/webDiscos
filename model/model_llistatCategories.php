<?php

function getCategories($connexio) {
    $sql = "SELECT * FROM \"public\".\"Categories\"";
    $result = pg_query($connexio, $sql);
    $categories = pg_fetch_all($result);
    return $categories;
}

?>