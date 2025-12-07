<?php
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id=$_POST['category_id'];
    //var_dump($_FILES['image']);
    // Manejo de la carga de imagen
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $uploadDir = 'uploads/';
        $imagePath = $uploadDir . $imageName;

        if (move_uploaded_file($imageTmpPath, $imagePath)) {
            $sql="INSERT INTO posts (title, content, image_path,category_id) VALUES (:title, :content, :image, :category_id)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':title' => $title,
                ':content' => $content,
                ':image' => $imagePath,
                ':category_id'=> $category_id,
                //':role_id' => $role_id,
            ]);
        } else {
            echo "Error al subir la imagen.";
        }
    }
    header('Location: list_posts.php');
    exit();
}
?>
