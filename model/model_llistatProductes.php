<?php

function getProductes($connexio) {
    $sql = "SELECT * FROM \"public\".\"Producte\"";
    $result = pg_query($connexio, $sql);
    $categories = pg_fetch_all($result);
    return $categories;
}

?>