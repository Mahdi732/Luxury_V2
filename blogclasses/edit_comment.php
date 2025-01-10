<?php
session_start();
require_once('../blogclasses/comment.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_id']) && isset($_POST['comment_id']) && isset($_POST['comment'])) {
        $user_id = $_SESSION['user_id'];
        $comment_id = $_POST['comment_id'];
        $comment = $_POST['comment'];

        $blog = new Comment();
        $result = $blog->editComment($user_id, $comment_id, $comment);

        if ($result) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Error updating comment.";
        }
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request method.";
}