<?php
require_once('../connection/connect.php');
class Theme {
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // public function addTheme($name){
    //     $stmt = $this->conn->prepare("INSERT INTO theme (name) VALUES (:name)");
    //     $stmt->bindParam(':name', $name);
    //     $stmt->execute();
    // }

    public function getAllThemes(){
        $stmt = $this->conn->prepare("SELECT * FROM theme");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    
}
?>