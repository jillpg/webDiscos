<?php

require __DIR__ . '/../controller/controller_capçalera.php';
require_once __DIR__ . '/../model/model_cistella.php';

$cistella = $_GET['cistella'] ?? null;
$afegeixID = $_GET['afegeixID'] ?? null;
$quantitat = $_GET['quantitat'] ?? null;
$preu = $_GET['preu'] ?? null;

// Buida la cistella
if ($cistella == 'buida') {
    buidaCistella();
    header('Location: index.php?accio=cistella');

    // Afegeix una quantitat d'un producte a la cistella
} else if ($cistella == 'afegeix' && $afegeixID != null && $preu != null) {
    if ($quantitat == null) {
        $quantitat = 1;
    }

    afegeixProducteCistella($afegeixID, $quantitat, $preu);
} else if ($cistella == 'compra') {
    if (isset($_SESSION['usuari'])) {
        require __DIR__ . '/../model/model_accesBD.php';
        $connexioBD = connectaBD();

        compraCistella($connexioBD);

        buidaCistella();

        header('Location: index.php?accio=exit');
    } else {
        header('Location: index.php?accio=cistella');
    }


} else {
    require __DIR__ . '/../model/model_accesBD.php';
    $connexioBD = connectaBD();

    $infoProductes = getProductesCistella($connexioBD);

    require __DIR__ . '/../view/view_cistella.php';
}
