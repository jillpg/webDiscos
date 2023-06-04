<?php

require __DIR__ . '/../controller/controller_capçalera.php';
require __DIR__ . '/../model/model_usuari.php';
require __DIR__ . '/../model/model_accesBD.php';
$connexioBD = connectaBD();
$dadesUsuari = llegirDadesUsuari($connexioBD, $_SESSION['usuari'][0]);

$accioUsuari = $_GET['accioUsuari'] ?? null;

if ($accioUsuari == 'update') { // Actualitzar dades de l'usuari
    $dadesNoves = array(
        $_POST['usCorreu'],
        $_POST['usClau'],
        $_POST['usClauRep'],
        $_POST['usNom'],
        $_POST['usAdreca'],
        $_POST['usPoblacio'],
        $_POST['usPostal']
    );

    $dadesAntigues = array(
        $dadesUsuari['correu'],
        $dadesUsuari['clau'],
        $dadesUsuari['clau'],
        $dadesUsuari['nom'],
        $dadesUsuari['adreca'],
        $dadesUsuari['poblacio'],
        $dadesUsuari['postal']
    );

    actualitzarCampsModificats($connexioBD, $dadesAntigues, $dadesNoves);

    unset($_POST['usCorreu']);
    unset($_POST['usClau']);
    unset($_POST['usClauRep']);
    unset($_POST['usNom']);
    unset($_POST['usAdreca']);
    unset($_POST['usPoblacio']);
    unset($_POST['usPostal']);

    header('Location: index.php?accio=usuari');

} else { // Mostrar formulari amb les dades precarregades
    require __DIR__ . '/../view/view_usuari.php';
}
