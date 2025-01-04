<?php
require_once("menu.php");
$paginationP = new Menu();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $paginationPage = $_GET['paginationPage']; 
    $paginations = $paginationP->pagination($paginationPage);
    echo json_encode($paginations);
}
?>
