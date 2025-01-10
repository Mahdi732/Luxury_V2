<?php
session_start();
require_once('../connection/connect.php');

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
            header('Location: ../pages/login.php');
            exit();
        } else {
            echo '<script>alert("I am a rapist of whores and you are a son of bitch.")</script>';
        }
    }

    public function signIn($email, $password){
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (password_verify($password, $result['password'])) {
                $_SESSION["user_email"] = $result["email"];
                $_SESSION["user_id"] = $result["user_id"];
                
                if ($email === "admin@gmail.com") {
                    $_SESSION["admin"] = true;
                }else {
                    $_SESSION["admin"] = false;
                }
                header("Location: ../index.php");
                exit();
            }
        }
    }

    public function logOut(){
        session_unset();
        session_destroy();
        header("Location: ../index.php");
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST["first_name"] ?? null;
    $last_name = $_POST["last_name"] ?? null;
    $name = $first_name . " " . $last_name;
    $username = $name;
    $email = $_POST["email_sig"] ?? null;
    $password = $_POST["password_sig"] ?? null;
    $email_log = $_POST["email_log"] ?? null;
    $password_log = $_POST["password_log"] ?? null;
    $log_out = $_POST["log_out"] ?? null;

    if (isset($username) && isset($email) && isset($password)) {
        $sign_up = new User();
        $sign_up->signUp($username, $email, $password);
    }

    if (isset($email_log) && isset($password_log)) {
        $sign_in = new User();
        $sign_in->signIn($email_log, $password_log);
    }
    if (isset($log_out)) {
        $logOut = new User();
        $logOut->logOut();
    }
}
?>
