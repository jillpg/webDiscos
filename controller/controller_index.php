<?php

// require __DIR__ . '/../controller/controller_capçalera.php';

switch ($pagina) {
    case 'categories':
        require __DIR__ . '/../controller/controller_capçalera.php';
        require __DIR__ . '/../controller/controller_llistatCategories.php';
        break;

    case 'productesCategoria':
        require __DIR__ . '/../controller/controller_capçalera.php';
        require __DIR__ . '/../controller/controller_llistatProductesCategoria.php';
        break;

    case 'detallProducte':
        require __DIR__ . '/../controller/controller_capçalera.php';
        require __DIR__ . '/../controller/controller_detallProducte.php';
        break;

    default:
    case 'productes':
        require __DIR__ . '/../controller/controller_capçalera.php';
        require __DIR__ . '/../controller/controller_llistatProductes.php';
        break;
}
