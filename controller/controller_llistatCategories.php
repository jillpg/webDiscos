<?php

$pagina = 'categories';

require __DIR__ . '/../model/model_accesBD.php';
$connexioBD = connectaBD();

require __DIR__ . '/../model/model_llistatCategories.php';
$categories = getCategories($connexioBD);

foreach ($categories as $categoria) {
    $string = $categoria['nom'];
    $categoria['nom'] = htmlentities($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

// require __DIR__ . '/../controller/controller_capçalera.php';
require __DIR__ . '/../view/view_llistatCategories.php';

?>