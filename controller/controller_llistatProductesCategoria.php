<?php

$pagina = 'categories';
$categoria = $_GET['categoria'] ?? null;

require __DIR__ . '/../model/model_accesBD.php';
$connexioBD = connectaBD();

require __DIR__ . '/../model/model_llistatProductesCategoria.php';
$nomCategoria = getNomCategoria($connexioBD, $categoria);
$nomCategoria = htmlentities($nomCategoria['nom'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
$productes = getProductesCategoria($connexioBD, $categoria);

// require __DIR__ . '/../controller/controller_capçalera.php';
require __DIR__ . '/../view/view_llistatProductesCategoria.php';

?>