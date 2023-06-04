<?php

require __DIR__ . '/../model/model_logout.php';
tancaSessioUsuari();
header('Location: index.php');    
exit();

?>