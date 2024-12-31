<?php
require_once('../connection/connect.php');
session_start();
class User {
    private $conn;
    public function _construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function signUp($username, $email, $password){
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $result = $stmt->execute();
        if ($result) {
            header('location: ../pages/login.php');
            exit();
        }else {
            echo '<script>alert(" I am a rrapist of whores and you are a son of bitch. ") </script>';
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["first_name"] . " " . $_POST["last_name"];
    $email = $_POST["email_sig"];
    $password = $_POST["password_sig"];
    echo $username;
    echo $emai;
    echo $password;

    if (isset($username, $email, $password)) {
        $sign_up = new User();
        $sign_up->signUp($username, $email, $password);
    }
    
}

?>