<?php 
require_once("../connection/connect.php");
class Client {
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
    public function afficheReservation($idSpecifique){
        $stmt = $this->conn->prepare("SELECT
        reservations.start_date,
        reservations.reservation_id,
        reservations.end_date,
        reservations.pickup_location,
        reservations.dropoff_location,
        reservations.status,
        vehicles.image_url,
        vehicles.model,
        vehicles.price,
        vehicles.Marque
        FROM reservations 
        JOIN vehicles on reservations.vehicle_id = vehicles.vehicle_id
        WHERE user_id = $idSpecifique");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function annuleReservation($idAnnulation){
        $stmt = $this->conn->prepare("DELETE FROM reservations WHERE reservation_id = $idAnnulation");
        $stmt->execute();
        header("Location: ../pages/admindashboard.php");
        exit();
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["idResrvationClient"] ?? null;
    $vehicule = $_POST["idResrvationVehicule"] ?? null;
     $startDate = $_POST["start_date"] ?? null;
    $endDate = $_POST["end_date"] ?? null;
    $pickupLocation = $_POST["pickup_location"] ?? null;
    $dropoffLocation = $_POST["dropoff_location"] ?? null;
    $reserved = new client();
    $reserved->reservation($user, $vehicule, $startDate, $endDate, $pickupLocation, $dropoffLocation);
}
?>