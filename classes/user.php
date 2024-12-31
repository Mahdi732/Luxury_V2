<?php
require_once('../connection/connect.php');
session_start();
class User {
    private $conn;
    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function signUp($username, $email, $password){
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $haspassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $haspassword);
        $result = $stmt->execute();
        if ($result) {
            header('location: ../index.php');
            exit();
        }else {
            echo '<script>alert(" I am a rapist of whores and you are a son of bitch. ") </script>';
        }
    }

    public function signIn($email, $password){
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this ->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $result['password'])) {
                $_SESSION["user_email"] = $result["email"];
                $_SESSION["user_id"] = $result["user_id"];
                if ($result["email"] === "admin@gmailcom") {
                    header("location: ../../Luxury/index.php");
                }else {
                    header("location: ../../Luxury/index.php");
                }
            }
        }else {
            echo " I am a rapist of whores and you are a son of bitch. ";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST["first_name"] ?? null;
    $last_name =  $_POST["last_name"] ?? null;
    $name = $first_name . " " . $last_name;
    $username = $name ;
    $email = $_POST["email_sig"] ?? null;
    $password = $_POST["password_sig"] ?? null;
    $email_log = $_POST["email_log"] ?? null;
    $password_log = $_POST["password_log"] ?? null;
    if (isset($username, $email, $password)) {
        $sign_up = new User();
        $sign_up->signUp($username, $email, $password);
    }

    if (isset($email, $password)) {
        $sign_in = new User();
        $sign_in->signIn($email_log ,$password_log);
    }
    
}

?>