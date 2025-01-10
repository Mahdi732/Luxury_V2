<?php
session_start();
require_once('../blogclasses/comment.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_id']) && isset($_POST['article_id']) && isset($_POST['comment'])) {
        $user_id = $_SESSION['user_id'];
        $article_id = $_POST['article_id'];
        $comment = $_POST['comment'];

        $blog = new Comment();
        $result = $blog->addComment($user_id, $article_id, $comment);

        if ($result) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Error submitting comment.";
        }
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request method.";
}