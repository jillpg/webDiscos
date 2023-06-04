<?php

$pagina = 'productes';

require __DIR__ . '/../model/model_accesBD.php';
$connexioBD = connectaBD();

require __DIR__ . '/../model/model_llistatProductes.php';
$productes = getProductes($connexioBD);

// require __DIR__ . '/../controller/controller_capçalera.php';
require __DIR__ . '/../view/view_llistatProductes.php';

?>