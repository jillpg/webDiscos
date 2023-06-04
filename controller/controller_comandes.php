<?php

require __DIR__ . '/../controller/controller_capçalera.php';
require __DIR__ . '/../model/model_comandes.php';
require_once __DIR__ . '/../model/model_accesBD.php';
$connexioBD = connectaBD();

$comandes = cercaComandesUsuari($connexioBD, $usuari[0]);

require __DIR__ . '/../view/view_comandes.php';

?>