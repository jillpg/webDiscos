<?php

require __DIR__ . '/../controller/controller_capçalera.php';
require __DIR__ . '/../view/view_login.php';

/*
     *  1: Llegir dades de login
     *  2: Validar format de les dades de login
     *  3: Anar a buscar a la BD les dades de l'usuari
     *  4: Validar que les dades de login coincideixen amb les de la BD
     *  5: Si és així, iniciar sessió
     */

if (isset($_POST['loginCorreu']) && isset($_POST['loginClau'])) {
    $dadesLoginInput = array($_POST['loginCorreu'], $_POST['loginClau']);

    require_once __DIR__ . '/../model/model_login.php';

    if (validarDadesLoginInput($dadesLoginInput)) {
        require_once __DIR__ . '/../model/model_accesBD.php';
        $connexioBD = connectaBD();
        $dadesUsuari = buscarUsuariBD($connexioBD, $dadesLoginInput[0]);

        if (password_verify($dadesLoginInput[1], $dadesUsuari[0]['clau'])) {
            iniciarSessioUsuari(array($dadesUsuari[0]['correu'], $dadesUsuari[0]['nom']));
            header('Location: index.php');
            exit();
            // echo "Sessió iniciada";
        } else {
            // ERROR: Les dades de login no coincideixen amb les de la BD
            echo '<i>ERROR: Les dades introduides no coincideixen.</i><br><br>';
        }
    } else {
        // ERROR: El format de les dades de login no és vàlid
        echo '<i>ERROR: El format de les dades introduides no és vàlid.</i><br><br>';
    }
}
