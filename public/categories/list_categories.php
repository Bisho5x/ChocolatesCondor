<?php
include '../../config/database.php';

// Cargar el contenido específico
ob_start();

$sql = "SELECT * FROM categories";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Lista de Categorías</h1>
<a href="add_category.php" class="btn btn-primary">Añadir Nueva Categoría</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre de Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category['category_id']; ?></td>
                <td><?php echo $category['category_name']; ?></td>
                <td>
                    <!-- Aquí puedes añadir botones para editar o borrar categorías -->
                    <a href="edit_category.php?id=<?php echo $category['category_id']; ?>" class="btn btn-warning">Editar</a>
                    <a href="process_delete_category.php?id=<?php echo $category['category_id']; ?>" class="btn btn-danger">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>
