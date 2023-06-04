<?php

function buidaCistella()
{
    // session_start();
    // unset($_SESSION['cistella']);
    unset($_SESSION['productes']);
    unset($_SESSION['quantitats']);
    unset($_SESSION['preus']);
}

function afegeixProducteCistella($afegeixID, $quantitat, $preu)
{
    session_start();

    if (!isset($_SESSION['productes'])) {
        $_SESSION['productes'] = array();
        $_SESSION['quantitats'] = array();
        $_SESSION['preus'] = array();

        array_push($_SESSION['productes'], $afegeixID);
        array_push($_SESSION['quantitats'], $quantitat);
        array_push($_SESSION['preus'], $preu);
    } else { // Comprova si el producte ja existeix a la cistella
        $index = array_search($afegeixID, $_SESSION['productes']);
        if ($index === false) {
            array_push($_SESSION['productes'], $afegeixID);
            array_push($_SESSION['quantitats'], $quantitat);
            array_push($_SESSION['preus'], $preu);
        } else {
            $_SESSION['quantitats'][$index] += $quantitat;
        }
    }
}

function getProductesCistella($connexioBD)
{
    // session_start();
    $productes = array();
    if (isset($_SESSION['productes'])) {
        foreach ($_SESSION['productes'] as $idProducte) {
            array_push($productes, getInfoProducteBD($connexioBD, $idProducte));
        }
    }
    return $productes;
}

function getInfoProducteBD($connexioBD, $idProducte)
{
    $sql = "SELECT * FROM \"public\".\"Producte\" WHERE id = $idProducte";
    $result = pg_query($connexioBD, $sql);
    $producte = pg_fetch_all($result);
    return $producte[0];
}

function compraCistella($connexioBD) {
    $idComanda = $data = $hora = $idUsuari = $import = $quantitatProductes = null;
    $idProducte = $nomProducte = $quantitatProducte = $preuProducte = $formatProducte = [];

    // Dades de la comanda
    $idComanda = getIdComanda($connexioBD);
    if ($idComanda == null) {
        $idComanda = 1;
    } else {
        $idComanda++;
    }
    $data = date("Y-m-d");
    $hora = date("H:i:s");
    $idUsuari = $_SESSION['usuari'][0];

    // Càlcul import i quantitat de productes
    $import = 0;
    $quantitatProductes = 0;
    $qpd = 0;

    for ($i = 0; $i < count($_SESSION['productes']); $i++) {
        $import += $_SESSION['preus'][$i] * $_SESSION['quantitats'][$i];
        $quantitatProductes += $_SESSION['quantitats'][$i];

        array_push($idProducte, $_SESSION['productes'][$i]);
        array_push($nomProducte, getInfoProducteBD($connexioBD, $_SESSION['productes'][$i])['nom']);
        array_push($quantitatProducte, $_SESSION['quantitats'][$i]);
        array_push($preuProducte, $_SESSION['preus'][$i]);
        array_push($formatProducte, getInfoProducteBD($connexioBD, $_SESSION['productes'][$i])['format']);
        $qpd++;
    }

    // Inserir dades generals a la taula Comanda
    $sql = "INSERT INTO \"public\".\"Comandes\" (\"idComanda\", \"data\", \"hora\", \"idUsuari\", \"import\", \"quantitat\")
            VALUES ('$idComanda', '$data', '$hora', '$idUsuari', '$import', '$quantitatProductes')";
    pg_query($connexioBD, $sql);

    // Inserir productes a la taula Comanda
    for ($i = 0; $i < $qpd; $i++) {
        $sql = "UPDATE \"public\".\"Comandes\" \"idProducte\"
                SET \"idProducte\" = array_append(\"idProducte\", '$idProducte[$i]')
                WHERE \"idComanda\" = '$idComanda'";
        pg_query($connexioBD, $sql);
        $sql = "UPDATE \"public\".\"Comandes\" \"nomProducte\"
                SET \"nomProducte\" = array_append(\"nomProducte\", '$nomProducte[$i]')
                WHERE \"idComanda\" = '$idComanda'";
        pg_query($connexioBD, $sql);
        $sql = "UPDATE \"public\".\"Comandes\" \"quantitatProducte\"
                SET \"quantitatProducte\" = array_append(\"quantitatProducte\", '$quantitatProducte[$i]')
                WHERE \"idComanda\" = '$idComanda'";
        pg_query($connexioBD, $sql);
        $sql = "UPDATE \"public\".\"Comandes\" \"preuProducte\"
                SET \"preuProducte\" = array_append(\"preuProducte\", '$preuProducte[$i]')
                WHERE \"idComanda\" = '$idComanda'";
        pg_query($connexioBD, $sql);
        $sql = "UPDATE \"public\".\"Comandes\" \"formatProducte\"
                SET \"formatProducte\" = array_append(\"formatProducte\", '$formatProducte[$i]')
                WHERE \"idComanda\" = '$idComanda'";
        pg_query($connexioBD, $sql);
    }

    // return $result;
}

function getIdComanda($connexioBD) {
    $sql = "SELECT MAX(\"idComanda\") FROM \"public\".\"Comandes\"";
    $result = pg_query($connexioBD, $sql);
    $idComanda = pg_fetch_all($result);
    return $idComanda[0]['max'];
}