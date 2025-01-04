<?php
require_once("menu.php");
$cherches = new menu();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $chercheValue = $_GET['cherche_value'];
    $chercheResult = $cherches->chercheByName($chercheValue);
    echo json_encode($chercheResult);
}

?>