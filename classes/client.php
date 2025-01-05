<?php 
require_once("../connection/connect.php");
class client {
    private $conn;
    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }
    function reservation($user, $vehicule, $startDate, $endDate, $pickupLocation, $dropoffLocation){
        $stmt = $this->conn->prepare("INSERT INTO reservations (user_id, vehicle_id, start_date, end_date, pickup_location, dropoff_location) VALUES (:user_id, :vehicle_id, :start_date, :end_date, :pickup_location, :dropoff_location)");
        $stmt->bindParam(':user_id', $user);
        $stmt->bindParam(':vehicle_id', $vehicule);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
        $stmt->bindParam(':pickup_location', $pickupLocation);
        $stmt->bindParam(':dropoff_location', $dropoffLocation);
        $stmt->execute();
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["idResrvationClient"];
    $vehicule = $_POST["idResrvationVehicule"];
     $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];
    $pickupLocation = $_POST["pickup_location"];
    $dropoffLocation = $_POST["dropoff_location"];
    $reserved = new client();
    $reserved->reservation($user, $vehicule, $startDate, $endDate, $pickupLocation, $dropoffLocation);
}
?>