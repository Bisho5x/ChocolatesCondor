<?php
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];   
    $sql = "UPDATE categories SET category_name = :category_name WHERE category_id = :category_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':category_id' => $category_id,
        ':category_name' => $category_name,
        
    ]);

    header('Location: list_categories.php');
    exit();
}
