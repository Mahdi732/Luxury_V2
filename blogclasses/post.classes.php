<?php
session_start();
require_once('../connection/connect.php');
class Blog {
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    function insertBlog($id_user, $title, $content, $imagePath, $theme){
        $stmt = $this->conn->prepare("INSERT INTO blog_articles (user_id, title, content, image_url, theme_id) VALUES (:user, :title, :content, :image, :theme)");
        $stmt->bindParam(':user', $id_user);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $imagePath);
        $stmt->bindParam(':theme', $theme);
        $stmt->execute();
    }

    public function tagsBlog($tags, $blog){
        $stmt = $this->conn->prepare("INSERT INTO article_tags (article_id, tag_id) VALUES (:blog, :tags)");
        $stmt->bindParam(':blog', $blog);
    }
}
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $tags = json_decode($_POST['addTags'], true);
//     if (is_array($tags)) {
//     foreach ($tags as $tag) {
//         $insertTags = new Blog();
//         $insertTags->insertBlog($tag['value']);
//     }
// }
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION["user_id"];
    $name = $_POST["name"];
    $content = $_POST["content"];
    $theme = $_POST["theme"];
    $imagePath = ""; 

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = "/uploads/"; 
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . $upload_dir;

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); 
        }
        $file_name = uniqid() . "_" . basename($_FILES['image']['name']);
        $target_file = $target_dir . $file_name;
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['image']['type'], $allowed_types)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $imagePath = $upload_dir . $file_name;
            } else {
                die("Error uploading the image. Please try again.");
            }
        } else {
            die("Invalid file type. Please upload a JPEG, PNG, or GIF image.");
        }
    } else {
        die("Image upload failed. Please try again.");
    }

    $blog = new Blog();
    $blog->insertBlog($id, $name, $content, $imagePath, $theme);
}

?>