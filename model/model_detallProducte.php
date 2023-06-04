<?php

function getProducte($connexioBD, $idProducte) {
    $sql = "SELECT * FROM \"public\".\"Producte\" WHERE id = $idProducte";
    $result = pg_query($connexioBD, $sql);
    $producte = pg_fetch_all($result);
    return $producte[0];
}

?>