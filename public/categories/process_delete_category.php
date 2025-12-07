<?php
include '../../config/database.php';

if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Preparar y ejecutar la consulta para borrar la categoría
    $sql = "DELETE FROM categories WHERE category_id = :category_id";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([':category_id' => $category_id]);
        header("Location: list_categories.php?success=Categoría borrada con éxito.");
        exit();
    } catch (PDOException $e) {
        echo "Error al borrar la categoría: " . $e->getMessage();
    }
} else {
    header("Location: list_categories.php");
    exit();
}
