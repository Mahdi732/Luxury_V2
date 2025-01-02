<?php
session_start();
require_once('../connection/connect.php');
class Admin {
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getCategories(){
        $sql = "SELECT category_id, name FROM `categories`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Createorder($name, $img, $price, $desc, $ava, $cate){
        $sql = "INSERT INTO vehicles (category_id, model, price, description, availability, image_url) VALUES (:cate, :name, :price, :desc, :ava, :img)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cate', $cate);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':ava', $ava);
        $stmt->bindParam(':img', $img);
        $stmt->execute();
        header("Location: ../pages/clientdashboard.php");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = $_POST['model'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $availability = $_POST['availability'];
    $category = $_POST['category'];
    $create = new Admin();
    $create->Createorder($model, $image, $price, $description, $availability, $category);
}
?>