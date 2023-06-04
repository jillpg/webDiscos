<?php

session_start();

$accio = $_GET['accio'] ?? null;
$categoria = $_GET['categoria'] ?? null;
$idProducte = $_GET['idProducte'] ?? null;
$quantitatAfegirCistella[] = $_GET['quantitatAfegirCistella'] ?? null;
$pagina = null;

$usuari = $_SESSION['usuari'] ?? null;
$cistella = $_SESSION['cistella'] ?? null;
$productes = $_SESSION['productes'] ?? null;
$quantitats = $_SESSION['quantitats'] ?? null;
$preus = $_SESSION['preus'] ?? null;

if ($accio != null) {
    $pagina = $accio;
    switch ($accio) {
        case 'login':
            include __DIR__ . '/resource_login.php';
            break;

        case 'logout':
            include __DIR__ . '/resource_logout.php';
            break;

        case 'registre':
            include __DIR__ . '/resource_registre.php';
            break;

        case 'exit':
            include __DIR__ . '/resource_exit.php';
            break;

        case 'cistella':
            include __DIR__ . '/resource_cistella.php';
            break;

        case 'usuari':
            include __DIR__ . '/resource_usuari.php';
            break;

        case 'comandes':
            include __DIR__ . '/resource_comandes.php';
            break;

        case 'categories':
        case 'productes':
        default:
            include __DIR__ . '/resource_index.php';
            break;
    }
} else if ($categoria != null) {
    $pagina = 'productesCategoria';
    include __DIR__ . '/resource_index.php';
} else if ($idProducte != null) {
    $pagina = 'detallProducte';
    include __DIR__ . '/resource_index.php';
} else {
    $pagina = 'productes';
    include __DIR__ . '/resource_index.php';
}
