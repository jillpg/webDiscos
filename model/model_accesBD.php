<?php

function connectaBD()
{
    try {
        $connexio = pg_connect("host=127.0.0.1 dbname=tdiw-l7 user=tdiw-l7 password=9X4hgoSi");
        //echo "Connectat a la BD";
    } catch (PDOException $e) {
        //echo "Error: " . $e->getMessage();
        echo "ERROR: No s'ha pogut connectar a la base de dades";
    }
    return $connexio;
}

?>