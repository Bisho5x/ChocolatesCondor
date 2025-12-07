<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id']; 
    $category_id = $_POST['category_id'];    

    $sql = "INSERT INTO comments (content, post_id, user_id) VALUES (:content, :post_id, :user_id)";
    //var_dump($sql);
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':content' => $content,
        ':post_id' => $post_id,
        ':user_id' => $user_id,        
    ]);

    header('Location: gallery.php?category_id='. $category_id);
    exit();
}