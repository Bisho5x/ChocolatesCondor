
<?php
include '../../config/database.php';

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Preparar y ejecutar la consulta para borrar la categoría
    $sql = "DELETE FROM posts WHERE post_id = :post_id";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([':post_id' => $post_id]);
        header("Location: list_posts.php?success=Categoría borrada con éxito.");
        exit();
    } catch (PDOException $e) {
        echo "Error al borrar el post: " . $e->getMessage();
    }
} else {
    header("Location: list_posts.php");
    exit();
}



