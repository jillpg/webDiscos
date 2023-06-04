<?php

function cercaComandesUsuari($connexioBD, $correu) {
    $sql = "SELECT * FROM \"public\".\"Comandes\" WHERE \"idUsuari\" = '$correu'";
    $result = pg_query($connexioBD, $sql);
    $usuari = pg_fetch_all($result);
    return $usuari;
}

?>