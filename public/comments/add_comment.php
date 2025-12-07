<?php
include '../../config/database.php';

ob_start();
?>
<h1>Añadir Comentario</h1>
<form action="process_add_comment.php" method="post">
    <div class="form-group">
        <label for="content">Comentario</label>
        <input type="text" class="form-control" id="content" name="content" required>
    </div>
    <div class="form-group">
    <label for="user_id">Usuario</label>
        <select class="form-select" id="user_id" name="user_id" required>
            <?php
            $sql = "SELECT user_id,username FROM users";
            $stmt = $pdo->query($sql);
            while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$user['user_id']}'>{$user['username']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
    <label for="post_id">Publicación</label>
        <select class="form-select" id="post_id" name="post_id" required>
            <?php
            $sql = "SELECT post_id,title FROM posts";
            $stmt = $pdo->query($sql);
            while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$post['post_id']}'>{$post['title']}</option>";
            }
            ?>
        </select>
    </div>
 
    <button type="submit" class="btn btn-primary">Guardar Comentario</button>
</form>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>