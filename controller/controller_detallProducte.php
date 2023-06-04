<?php

$pagina = 'detallProducte';
$idProducte = $_GET['idProducte'] ?? null;

require __DIR__ . '/../model/model_accesBD.php';
$connexioBD = connectaBD();

require __DIR__ . '/../model/model_detallProducte.php';
$producte = getProducte($connexioBD, $idProducte);

// require __DIR__ . '/../controller/controller_capçalera.php';
require __DIR__ . '/../view/view_detallProducte.php';

?>