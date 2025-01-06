<?php
require_once('../connection/connect.php');
class Menu{
    private $conn;
    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }

public function aficheVehicles() {
    $stmt = $this->conn->prepare("SELECT * FROM vehicles LIMIT 9");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function filter($categorie) {
    $stmt = $this->conn->prepare("SELECT * FROM vehicles WHERE category_id = :categorie");
    $stmt->bindParam(':categorie', $categorie);
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
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}


public function chercheByName($chercheValue){
    $stmt = $this->conn->prepare("SELECT * FROM vehicles WHERE model LIKE :cherche");
    $stmt->bindParam(':cherche', $chercheTrucks);
    $chercheTrucks = "%" . $chercheValue . "%";
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function pagination($numbero) {
    $numbero = max(0, (int)$numbero);
    $aficheNumber = $numbero * 9;
    $stmt = $this->conn->prepare("SELECT * FROM vehicles LIMIT 9 OFFSET $aficheNumber");
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function pageNumber(){
    $stmt = $this->conn->prepare("SELECT COUNT(*) FROM vehicles");
    $stmt->execute();
    $total_vehicles = $stmt->fetchColumn();
    $numberForAfiche = 9;
    $numberOfThePage = $total_vehicles / $numberForAfiche;
    return $numberOfThePage;
}


}
?>