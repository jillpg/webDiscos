<?php

function getNomCategoria($connexioBD, $categoria) {
    $sql = "SELECT nom FROM \"public\".\"Categories\" WHERE idcat = '$categoria'";
    $resultat = pg_query($connexioBD, $sql);
    $nomCategoria = pg_fetch_all($resultat);
    return $nomCategoria[0];
}

function getProductesCategoria($connexioBD, $categoria) {
    $sql = "SELECT * FROM \"public\".\"Producte\" WHERE categoria='$categoria'";
    $result = pg_query($connexioBD, $sql);
    $productesID = pg_fetch_all($result);
    return $productesID;
}

?>