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
        $sql = "SELECT * FROM `categories`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMark(){
        $sql = "SELECT Marque FROM `vehicles`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Createorder($name, $img, $price, $desc, $ava, $cate, $mark){
        $sql = "INSERT INTO vehicles 
        (category_id, model, price, description, availability, image_url, Marque)
        VALUES
        (:cate, :name, :price, :desc, :ava, :img, :mark)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cate', $cate);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':ava', $ava);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':mark', $mark);
        $stmt->execute();
        header("Location: ../pages/clientdashboard.php");
    }

    public function deleteCar($deleteId) {
    if (isset($deleteId)) {
        $stmt = $this->conn->prepare("DELETE FROM vehicles WHERE vehicle_id = :deleteId");
        $stmt->bindParam(':deleteId', $deleteId);
        $stmt->execute();
        header("Location: ../pages/menu.php");
        exit;
    } else {
        echo "Error: No vehicle ID provided.";
    }
}

public function editVehicles($id, $name, $img, $price, $desc, $ava, $cate, $mark){
    $sql = "UPDATE vehicles 
        SET category_id = :cate, 
            model = :name, 
            price = :price, 
            description = :desc, 
            availability = :ava, 
            image_url = :img, 
            Marque = :mark 
        WHERE vehicle_id = $id";
        if (isset($id, $name, $img, $price, $desc, $ava, $cate, $mark)) {
            $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cate', $cate);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':ava', $ava);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':mark', $mark);
        $stmt->execute();
        header('Location: ../pages/menu.php');
        exit();
        }else {
            echo "ehhehehehheheheh";
        }
    
}
}


if (isset($_POST['vehicles'])) {
    foreach ($_POST['vehicles'] as $vehicle) {
        $model = $vehicle['model'];
        $image = $vehicle['image'];
        $price = $vehicle['price'];
        $availability = $vehicle['availability'];
        $description = $vehicle['description'];
        $category = $vehicle['category'];
        $marque = $vehicle['marque'];
        $insert = new Admin();
        $insert->Createorder($model, $image, $price, $description, $availability, $category, $marque);
    }
}
if (isset($_POST["delete_car"])) {
    $deleteCarExi = $_POST["delete_car"];
    $deleteted = new Admin();
    $deleteted->deleteCar($deleteCarExi);
} else {
    echo "Error: No vehicle ID provided.";
}
if (isset($_POST["idEdeted"], $_POST["editedvehiclesmodel"], $_POST["editedvehiclesimage"], $_POST["editedvehiclesprice"], $_POST["editedvehiclesavailability"], $_POST["editedvehiclesdescription"], $_POST["editedvehiclesmarque"], $_POST["editedvehiclescategory"])) {
    $idToEdit = $_POST["idEdeted"];
    $editModel = $_POST["editedvehiclesmodel"];
    $editImg = $_POST["editedvehiclesimage"];
    $editPrice = $_POST["editedvehiclesprice"];
    $editAvailability = $_POST["editedvehiclesavailability"];
    $editedDescription = $_POST["editedvehiclesdescription"];
    $editMarque = $_POST["editedvehiclesmarque"];
    $editcategorie = $_POST["editedvehiclescategory"];
    $edeted = new Admin();
    $edeted->editVehicles($idToEdit, $editModel, $editImg, $editPrice, $editedDescription, $editAvailability, $editcategorie, $editMarque);
}
?>