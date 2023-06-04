<?php

require __DIR__ . '/../controller/controller_capçalera.php';
$nom = $correu = $claudepas = $adreça = $poblacio = $codipostal = '';
require __DIR__ . '/../view/view_registre.php';


if (isset($_POST['regNom'])) {
    $dadesRegistre = array(
        $_POST['regNom'],
        $_POST['regCorreu'],
        $_POST['regClau'],
        $_POST['regAdreca'],
        $_POST['regPoblacio'],
        $_POST['regPostal']
    );

    require __DIR__ . '/../model/model_accesBD.php';
    $connexioBD = connectaBD();

    require __DIR__ . '/../model/model_registre.php';

    if (validarDadesRegistre($connexioBD, $dadesRegistre)) {
        registrarUsuari($connexioBD, $dadesRegistre);

        if (validarDadesRegistreSeridor($connexioBD, $dadesRegistre)) {
            echo '<i>Registre completat!</i><br><br>';
        } else {
            eliminarUsuari($connexioBD, $dadesRegistre[1]);
            echo '<i>Registre fallit! No s\'han pogut<br>registrar les dades al servidor.</i><br><br>';
        }
    } else {
        echo '<i>Registre fallit! El format de les<br>dades introduïdes no són correctes.</i><br><br>';
    }
}
