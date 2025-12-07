<?php
include '../../config/database.php';

if (isset($_GET['id'])) {
    $comment_id = $_GET['id'];

    // Preparar y ejecutar la consulta para borrar la categoría
    $sql = "DELETE FROM comments WHERE comment_id = :comment_id";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([':comment_id' => $comment_id]);
        header("Location: list_comments.php?success=Categoría borrada con éxito.");
        exit();
    } catch (PDOException $e) {
        echo "Error al borrar el post: " . $e->getMessage();
    }
} else {
    header("Location: list_posts.php");
    exit();
}