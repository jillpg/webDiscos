<?php

function llegirDadesUsuari($connexioBD, $idUsuari)
{
    $sql = "SELECT * FROM \"public\".\"Usuari\" WHERE correu = '$idUsuari'";
    $result = pg_query($connexioBD, $sql);
    $usuari = pg_fetch_all($result);
    return $usuari[0];
}

function actualitzarCampsModificats($connexioBD, $dadesAntigues, $dadesNoves)
{
    $campsModificats = identificaCampsModificats($dadesAntigues, $dadesNoves);

    print_r($campsModificats);
    print("<br>");
    print_r($dadesAntigues);
    print("<br>");
    print_r($dadesNoves);
    print("<br>");

    // Clau de pas
    if ($campsModificats[1]) {
        if ($dadesNoves[1] == $dadesNoves[2]) {
            $dadesNoves[1] = password_hash($dadesNoves[1], PASSWORD_DEFAULT);
            $sql = "UPDATE \"public\".\"Usuari\" SET clau = '$dadesNoves[1]' WHERE correu = '$dadesAntigues[0]'";
            pg_query($connexioBD, $sql);
        }
    }

    // Nom
    if ($campsModificats[3]) {
        $sql = "UPDATE \"public\".\"Usuari\" SET nom = '$dadesNoves[3]' WHERE correu = '$dadesAntigues[0]'";
        pg_query($connexioBD, $sql);
        actualitzaNomSessioActual($dadesAntigues[3], $dadesNoves[3]);
    }

    // Adreça
    if ($campsModificats[4]) {
        $sql = "UPDATE \"public\".\"Usuari\" SET adreca = '$dadesNoves[4]' WHERE correu = '$dadesAntigues[0]'";
        pg_query($connexioBD, $sql);
    }

    // Població
    if ($campsModificats[5]) {
        $sql = "UPDATE \"public\".\"Usuari\" SET poblacio = '$dadesNoves[5]' WHERE correu = '$dadesAntigues[0]'";
        pg_query($connexioBD, $sql);
    }

    // Codi postal
    if ($campsModificats[6]) {
        $sql = "UPDATE \"public\".\"Usuari\" SET postal = '$dadesNoves[6]' WHERE correu = '$dadesAntigues[0]'";
        pg_query($connexioBD, $sql);
    }

    // Correu electrònic
    if ($campsModificats[0]) {
        $sql = "UPDATE \"public\".\"Usuari\" SET correu = '$dadesNoves[0]' WHERE correu = '$dadesAntigues[0]'";
        pg_query($connexioBD, $sql);

        actualitzarCorreuComandes($connexioBD, $dadesAntigues[0], $dadesNoves[0]);
        actualitzaCorreuSessioActual($dadesAntigues[0], $dadesNoves[0]);
    }
}

function identificaCampsModificats($dadesAntigues, $dadesNoves)
{
    $dadesModificades = array(false, false, false, false, false, false, false);

    // Comprova si s'ha modificat el correu
    if ($dadesAntigues[0] != $dadesNoves[0] && $dadesNoves[0] != "") {
        $dadesModificades[0] = true;
    }

    // Comprova si s'ha modificat la clau
    if (!password_verify($dadesNoves[1], $dadesAntigues[1]) && $dadesNoves[1] != "" && $dadesNoves[2] != "") {
        $dadesModificades[1] = true;
    }

    // Comprova si s'ha modificat el nom
    if ($dadesAntigues[3] != $dadesNoves[3] && $dadesNoves[3] != "") {
        $dadesModificades[3] = true;
    }

    // Comprova si s'ha modificat l'adreça
    if ($dadesAntigues[4] != $dadesNoves[4] && $dadesNoves[4] != "") {
        $dadesModificades[4] = true;
    }

    // Comprova si s'ha modificat la població
    if ($dadesAntigues[5] != $dadesNoves[5] && $dadesNoves[5] != "") {
        $dadesModificades[5] = true;
    }

    // Comprova si s'ha modificat el codi postal
    if ($dadesAntigues[6] != $dadesNoves[6] && $dadesNoves[6] != "") {
        $dadesModificades[6] = true;
    }

    return $dadesModificades;
}

function actualitzarCorreuComandes($connexioBD, $correuAntic, $correuNou)
{
    $sql = "UPDATE \"public\".\"Comandes\" SET \"idUsuari\" = '$correuNou' WHERE \"idUsuari\" = '$correuAntic'";
    $result = pg_query($connexioBD, $sql);
    return $result;
}

function actualitzaCorreuSessioActual($correuAntic, $correuNou)
{
    if ($_SESSION['usuari'][0] == $correuAntic) {
        $_SESSION['usuari'][0] = $correuNou;
    }
}

function actualitzaNomSessioActual($nomAntic, $nomNou)
{
    if ($_SESSION['usuari'][1] == $nomAntic) {
        $_SESSION['usuari'][1] = $nomNou;
    }
}