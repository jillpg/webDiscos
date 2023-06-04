<?php

function iniciarSessioUsuari($usuari) {
    $_SESSION['usuari'] = $usuari;
}

function validarDadesLoginInput($dadesLoginInput) {
    $email = $dadesLoginInput[0];
    $clau = $dadesLoginInput[1];

    $emailOK = filter_var($email, FILTER_VALIDATE_EMAIL);
    $clauOK = strlen($clau) >= 8;

    return $emailOK && $clauOK;
}

function buscarUsuariBD($connexio, $email) {
    $sql = "SELECT * FROM \"public\".\"Usuari\" WHERE correu = '$email'";
    $result = pg_query($connexio, $sql);
    $usuari = pg_fetch_all($result);
    return $usuari;
}

?>