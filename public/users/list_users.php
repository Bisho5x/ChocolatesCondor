<?php
// include '../db_connection.php';
include '../../config/database.php';

$sql = "SELECT u.user_id, u.username, u.email, r.role_name FROM users u JOIN roles r ON u.role_id = r.role_id";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Cargar el contenido específico
ob_start();
?>

<h1>Lista de Usuarios</h1>

<!-- Botón para redirigir a agregar usuario -->
<div class="mb-3">
    <a href="add_user.php" class="btn btn-success">Añadir Usuario</a>
</div>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nombre de Usuario</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['user_id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['role_name']; ?></td>
            <td>
                <a href="edit_user.php?id=<?php echo $user['user_id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                <a href="process_delete_user.php?id=<?php echo $user['user_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>
