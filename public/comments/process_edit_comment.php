<?php
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment_id = $_POST['comment_id'];
    $user_id = $_POST['user_id'];   
    $post_id = $_POST['post_id'];  
    $content = $_POST['content'];  
    $sql = "UPDATE comments SET user_id = :user_id, post_id = :post_id , content = :content WHERE comment_id = :comment_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':user_id' => $user_id,
        ':post_id' => $post_id,
        ':content' => $content,
        ':comment_id' => $comment_id,
        
    ]);

    header('Location: list_comments.php');
    exit();
}