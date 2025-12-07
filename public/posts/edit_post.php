<?php
include '../../config/database.php';

$post_id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE post_id = :post_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':post_id' => $post_id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

$sqlCategories="SELECT category_id,category_name FROM categories";
$stmtcategory = $pdo->query($sqlCategories);
$categories = $stmtcategory->fetchAll(PDO::FETCH_ASSOC);

if (!$post) {
    echo "Post encontrado.";
    exit();
}
// Cargar el contenido específico
ob_start();
?>



<h2 class="mt-4">Editar Publicación</h2>
<form action="process_edit_post.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
    <div class="form-group">
        <label for="title">Título:</label>
        <input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>" required>
    </div>
    <div class="form-group">
        <label for="content">Contenido:</label>
        <textarea class="form-control" name="content" rows="5" required><?php echo $post['content']; ?></textarea>
    </div>
    <div class="form-group">        
        <label for="category_id" class="form-label">Categoria</label>
        <select class="form-select" id="category_id" name="category_id" required>
            <option value="">Seleccione la categoria</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['category_id']; ?>"
                    <?php echo ($category['category_id'] == $post['category_id']) ? 'selected' : ''; ?>>
                    <?php echo $category['category_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Imagen:</label>
        <input type="file" class="form-control" name="image" accept="image/*">        
        <?php if ($post['image_path']): ?>
            <p>Imagen actual: <img src="<?php echo $post['image_path']; ?>" width="150"></p>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Actualizar Publicación</button>
</form>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>