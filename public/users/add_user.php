<?php
include '../../config/database.php';


ob_start();
?>


<h1>Agregar Usuario</h1>
<form action="process_add_user.php" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Nombre de Usuario</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <!-- <label for="role" class="form-label">Rol</label> -->
        <label for="role_id">Rol</label>
        <select class="form-select" id="role_id" name="role_id" required>
            <?php
            $sql = "SELECT * FROM roles";
            $stmt = $pdo->query($sql);
            while ($role = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$role['role_id']}'>{$role['role_name']}</option>";
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Agregar Usuario</button>
</form>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>
