<?php
require_once("menu.php");
$vehicule = new menu();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $categorie = $_GET['categorie_sel'];

    if ($categorie === 'all') {
        $vehicles = $vehicule->aficheVehicles();
    } else {
        $vehicles = $vehicule->filter($categorie);
    }

    echo json_encode($vehicles);
}

?>