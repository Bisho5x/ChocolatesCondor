<?php
include '../../config/database.php';

// Cargar el contenido específico

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];
    
    $sql = "INSERT INTO categories (category_name) VALUES (:category_name)";
    //var_dump($sql);
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':category_name' => $category_name,
        
    ]);

    header('Location: list_categories.php');
    exit();
}