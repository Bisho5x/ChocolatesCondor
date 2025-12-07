<?php
include '../../config/database.php';

ob_start();
?>

<h1>Añadir Categoría</h1>
<form action="process_add_category.php" method="post">
    <div class="form-group">
        <label for="category_name">Nombre de Categoría</label>
        <input type="text" class="form-control" id="category_name" name="category_name" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Categoría</button>
</form>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>
