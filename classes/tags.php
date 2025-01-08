<?php
require_once('../connection/connect.php');

class Tags {
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function Tags($tagName){
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM tags WHERE name = :name");
        $stmt->bindParam(':name', $tagName);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        
        if (!$result) {
            $stmt = $this->conn->prepare("INSERT INTO tags (name) VALUES (:name)");
            $stmt->bindParam(':name', $tagName);
            $stmt->execute();
        } else {
            echo "this tags already exist";
        }
        echo "<div class='tag'>{$tagName} <span class='tag-remove'>&times;</span></div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tag = $_POST["tags"];
    $insertTags = new Tags();
    $insertTags->Tags($tag);
}
?>
