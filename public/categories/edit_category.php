<?php
include '../../config/database.php';

$category_id = $_GET['id'];
$sql = "SELECT * FROM categories WHERE category_id = :category_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':category_id' => $category_id]);
$category = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$category) {
    echo "Categoría no encontrada.";
    exit();
}



// Cargar el contenido específico
ob_start();
?>

<h1>Editar Categoría</h1>
<form action="process_edit_category.php" method="post">
    <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">
    <div class="form-group">
        <label for="category_name">Nombre de Categoría</label>
        <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category['category_name']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Actualizar Categoría</button>
</form>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>
