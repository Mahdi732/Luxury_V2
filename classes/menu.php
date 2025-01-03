<?php
require_once('../connection/connect.php');
class Menu{
    private $conn;
    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }

public function aficheVehicles() {
    $stmt = $this->conn->prepare("SELECT * FROM vehicles");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function filter($categorie) {
    $stmt = $this->conn->prepare("SELECT * FROM vehicles WHERE category_id = :categorie");
    $stmt->bindParam(':categorie', $categorie, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function showVehiculeInfo($id_info){
$stmt = $this->conn->prepare("SELECT vehicles.vehicle_id, 
       vehicles.model, 
       vehicles.price, 
       vehicles.availability, 
       vehicles.image_url, 
       vehicles.Marque,
       vehicles.description,
       categories.name AS category_name
FROM vehicles
JOIN categories ON vehicles.category_id = categories.category_id
WHERE vehicles.vehicle_id = :Info_Id");
$stmt->bindParam(':Info_Id', $id_info);
if ($stmt->execute()) {
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}
}


?>