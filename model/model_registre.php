<?php

function validarDadesRegistre($connexioBD, $dadesRegistre)
{
    $nom = $dadesRegistre[0];
    $correu = $dadesRegistre[1];
    $password = $dadesRegistre[2];
    $adreca = $dadesRegistre[3];
    $poblacio = $dadesRegistre[4];
    $codipostal = $dadesRegistre[5];

    $nomOK = false;
    $correuOK = false;
    $passwordOK = false;
    $adrecaOK = false;
    $poblacioOK = false;
    $codipostalOK = false;

    if (empty($nom)) {
        // ERROR: El nom és obligatori
    } else {
        // Nom OK
        $nomOK = true;
    }

    if (empty($correu)) {
        // ERROR: El correu és obligatori
    } else if (!filter_var($correu, FILTER_VALIDATE_EMAIL)) {
        // ERROR: El correu no és vàlid
    } else {
        // Correu OK
        $correuOK = true;
    }

    if (empty($password)) {
        // ERROR: La contrasenya és obligatòria
    } else if (strlen($password) < 8) {
        // ERROR: La contrasenya ha de tenir almenys 8 caràcters
    } else {
        // Contrasenya OK
        $passwordOK = true;
    }

    if (empty($adreca) and strlen($adreca) > 30) {
        // ERROR: L'adreça és obligatòria
    } else {
        // Adreça OK
        $adrecaOK = true;
    }

    if (empty($poblacio) and strlen($poblacio) > 30) {
        // ERROR: La població és obligatòria
    } else {
        // Població OK
        $poblacioOK = true;
    }

    if (empty($codipostal)) {
        // ERROR: El codi postal és obligatori
    } else if (!preg_match('/^[0-9]{5}$/', $codipostal)) {
        // ERROR: El codi postal no és vàlid
    } else {
        // Codi postal OK
        $codipostalOK = true;
    }

    return ($nomOK && $correuOK && $passwordOK && $adrecaOK && $poblacioOK && $codipostalOK);
}

function registrarUsuari($connexioBD, $dadesRegistre)
{
    $dadesRegistre[2] = password_hash($dadesRegistre[2], PASSWORD_DEFAULT);
    $sql = "INSERT INTO \"public\".\"Usuari\" VALUES ('".$dadesRegistre[0]."', '".$dadesRegistre[1]."', '".$dadesRegistre[2]."', '".$dadesRegistre[3]."', '".$dadesRegistre[4]."', '".$dadesRegistre[5]."')";
    $result = pg_query($connexioBD, $sql);
    return pg_fetch_all($result);
}

function validarDadesRegistreSeridor($connexioBD, $dadesRegistre)
{
    // Cercar usuari
    $correu = $dadesRegistre[1];
    $sql = "SELECT * FROM \"public\".\"Usuari\" WHERE correu = '$correu'";
    $result = pg_query($connexioBD, $sql);
    $usuari = pg_fetch_all($result);
    
    if (empty($usuari[0])) {
        return false;
    } else {
        $campsBuits = $correuOK = $postalInt = false;

        // Comprovar que no hi ha camps buits
        foreach ($dadesRegistre as $camp) {
            if (empty($camp)) {
                $campsBuits = true;
            }
        }

        // Comprovar que el format del correu és correcte
        if (filter_var($dadesRegistre[1], FILTER_VALIDATE_EMAIL)) {
            $correuOK = true;
        }

        // Comprovar que el codi postal és un enter
        if (is_numeric($dadesRegistre[5])) {
            $postalInt = true;
        }

        return (!$campsBuits && $correuOK && $postalInt);
    }
}

function eliminarUsuari($connexioBD, $idUsuari)
{
    $sql = "DELETE FROM \"public\".\"Usuari\" WHERE correu = '$idUsuari'";
    pg_query($connexioBD, $sql);
}
