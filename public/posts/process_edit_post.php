<?php
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id=$_POST['category_id'];
    $imagePath = null;
    // var_dump($_FILES['image']);
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        //var_dump($content);
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $uploadDir = 'uploads/';
        $imagePath = $uploadDir . $imageName;
        //move_uploaded_file($imageTmpPath, $imagePath);
    }
    
    if ($imagePath) {
        if (move_uploaded_file($imageTmpPath, $imagePath)){
            $sql = "UPDATE posts SET title = :title, content = :content, image_path = :image, category_id = :category_id WHERE post_id = :post_id";
            $stmt = $pdo->prepare($sql);        
            $stmt->execute([
                ':title' => $title,
                ':content' => $content,
                ':image' => $imagePath,
                ':post_id' => $post_id, 
                ':category_id'=> $category_id,           
            ]);
        }      
                
    } else {
        $sql = "UPDATE posts SET title = :title, content = :content, category_id = :category_id WHERE post_id = :post_id";
        $stmt = $pdo->prepare($sql);        
        $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':post_id' => $post_id,
            ':category_id'=> $category_id,            
        ]);    
            
    }

    header('Location: list_posts.php');
    exit();


    // if ($stmt->execute()) {
    //     header("Location: list_posts.php");
    // } else {
    //     echo "Error al actualizar la publicación.";
    // }
}
?>
