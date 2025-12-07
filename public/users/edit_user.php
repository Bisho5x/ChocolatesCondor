<?php
include '../../config/database.php';

$user_id = $_GET['id'];
$sql = "SELECT * FROM users WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

ob_start();
?>

<h1>Editar Usuario</h1>
<form action="process_edit_user.php" method="post">
    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
    <div class="mb-3">
        <label for="username" class="form-label">Nombre de Usuario</label>
        <input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Rol</label>
        <select name="role_id" class="form-select" required>
            <option value="1" <?php if($user['role_id'] == 1) echo 'selected'; ?>>Admin</option>
            <option value="2" <?php if($user['role_id'] == 2) echo 'selected'; ?>>Editor</option>
            <option value="3" <?php if($user['role_id'] == 3) echo 'selected'; ?>>Viewer</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
</form>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>
