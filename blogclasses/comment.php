<?php
require_once('../connection/connect.php');
class Comment {
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }
    public function addComment($user_id, $article_id, $comment) {
        $sql = "INSERT INTO blog_comments (user_id, article_id, comment) VALUES (:user_id, :article_id, :comment)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':article_id', $article_id);
        $stmt->bindParam(':comment', $comment);
        return $stmt->execute();
    }

    public function getComments($article_id) {
        $sql = "SELECT bc.*, u.username 
                FROM blog_comments bc 
                JOIN users u ON bc.user_id = u.user_id 
                WHERE bc.article_id = :article_id 
                ORDER BY bc.created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':article_id', $article_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editComment($user_id, $comment_id, $comment) {
        $sql = "UPDATE blog_comments 
                SET comment = :comment, updated_at = NOW() 
                WHERE comment_id = :comment_id AND user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':comment_id', $comment_id);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }
}
?>