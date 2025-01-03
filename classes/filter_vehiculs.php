<?php
require_once("menu.php");
$vehicule = new menu();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categorie = $_POST['categorie_sel'];

    if ($categorie === 'all') {
        $vehicles = $vehicule->aficheVehicles();
    } else {
        $vehicles = $vehicule->filter($categorie);
    }

    echo json_encode($vehicles);
}

?>