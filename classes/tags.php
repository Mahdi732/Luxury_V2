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
        }
    }

    public function searchByName($name){
        if (empty(trim($name))) {
            echo "please type somethings to get result";
            return;
        }
        $stmt = $this->conn->prepare("SELECT name FROM tags WHERE name LIKE :query LIMIT 3");
        $namesearch = '%' . $name . '%';
        $stmt->bindParam(':query', $namesearch);
        $stmt->execute();
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$tags) {
            echo "no Result";
        }else {
            foreach ($tags as $tag) {
                echo "<button type='button' value='{$tag['name']}' class='tag w-full border-2 border-blue-100 text-left p-2 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 rounded' >
                <span class='text-gray-800 font-medium'>{$tag['name']}</span>
                </button>";
            }
        }
    
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tags = json_decode($_POST['addTags'], true);
    if (is_array($tags)) {
    foreach ($tags as $tag) {
        $insertTags = new Tags();
        $insertTags->Tags($tag['value']);
    }
}
}

if (isset($_POST["nameTags"])) {
    $search = $_POST["nameTags"];
    $searchDb = new Tags();
    $searchDb->searchByName($search);
}
?>
