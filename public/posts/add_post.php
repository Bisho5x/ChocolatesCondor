<?php
session_start();
include '../../config/database.php';



ob_start();
?>

<?php //function displayContent() { 
?>
<div class="container">
    <h2 class="mt-4">Añadir Publicación</h2>
    <form action="process_add_post.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Contenido:</label>
            <textarea class="form-control" name="content" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <?php
                $sql = "SELECT category_id,category_name FROM categories";
                $stmt = $pdo->query($sql);
                while ($category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$category['category_id']}'>{$category['category_name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Imagen:</label>
            <input type="file" class="form-control" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Agregar Publicación</button>
    </form>
</div>
<?php //} 
?>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>