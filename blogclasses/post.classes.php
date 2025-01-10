<?php
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
        return $this->conn->lastInsertId();
    }

    public function getTagId($tagName) {
        $stmt = $this->conn->prepare("SELECT tag_id FROM tags WHERE name = :tagName");
        $stmt->bindParam(':tagName', $tagName);
        $stmt->execute();

        $tag = $stmt->fetch();

        if ($tag) {
            return $tag['tag_id']; 
        }
    }

    public function insertTagRelation($article_id, $tag_id) {
        $stmt = $this->conn->prepare("INSERT INTO article_tags (article_id, tag_id) VALUES (:article_id, :tag_id)");
        $stmt->bindParam(':article_id', $article_id);
        $stmt->bindParam(':tag_id', $tag_id);
        $stmt->execute();
    }

    public function affichePost(){
    $stmt = $this->conn->prepare("SELECT 
    ba.article_id,
    ba.title AS article_title,
    ba.created_at AS created_at,
    ba.status AS statu,
    ba.content AS article_content,
    ba.image_url AS image,
    th.name AS theme_name,
    u.username AS client_name,
    GROUP_CONCAT(t.name) AS tags
FROM blog_articles ba
JOIN theme th ON ba.theme_id = th.theme_id
JOIN users u ON ba.user_id = u.user_id
LEFT JOIN article_tags at ON ba.article_id = at.article_id
LEFT JOIN tags t ON at.tag_id = t.tag_id
WHERE ba.status = 'approved'
GROUP BY ba.article_id
LIMIT 9 ;
");

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION["user_id"] ?? null;
    $name = $_POST["name"] ?? null;
    $content = $_POST["content"] ?? null;
    $theme = $_POST["theme"] ?? null;
    $imagePath = "" ?? null; 

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = "/uploads/"; 
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . $upload_dir;

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); 
        }
        $file_name = uniqid() . "_" . basename($_FILES['image']['name']);
        $target_file = $target_dir . $file_name;
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/WEBP'];
        if (in_array($_FILES['image']['type'], $allowed_types)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $imagePath = $upload_dir . $file_name;
            } else {
                echo "Error uploading the image. Please try again.";
                exit();
            }
        } else {
            echo "Invalid file type. Please upload a JPEG, PNG, or GIF image.";
            exit();
        }
    } else {
        echo "Image upload failed. Please try again.";
        exit();
    }

    $blog = new Blog();
    $article_id = $blog->insertBlog($id, $name, $content, $imagePath, $theme);
    
    $tags = json_decode($_POST['addTags'], true);
    if (is_array($tags)) {
        foreach ($tags as $tag) {
            $tag_id = $blog->getTagId($tag['value']);
            if ($tag_id) {
                $blog->insertTagRelation($article_id, $tag_id);
            }
        }
}

}
?>