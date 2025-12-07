<?php
    include '../../config/database.php';

    $comment_id = $_GET['id'];
    $sql = "SELECT * FROM comments WHERE comment_id = :comment_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['comment_id' => $comment_id]);
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);

    $sqlUser="SELECT user_id, username FROM users";
    $stmtuser = $pdo->query($sqlUser);
    $users = $stmtuser->fetchAll(PDO::FETCH_ASSOC);

    $sqlPost="SELECT post_id,title FROM posts";
    $stmtpost = $pdo->query($sqlPost);
    $posts = $stmtpost->fetchAll(PDO::FETCH_ASSOC);

    
    ob_start();
?>

<h1>Editar Comentario</h1>
<form action="process_edit_comment.php" method="post">
    <input type="hidden" name="comment_id" value="<?php echo $comment['comment_id']; ?>">
    <div class="mb-3">
        <label for="content" class="form-label">Comentario</label>
        <input type="text" name="content" class="form-control" value="<?php echo $comment['content']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="user_id" class="form-label">Usuario</label>
        <select class="form-select" id="user_id" name="user_id" required>
            <option value="">Seleccione el usuario</option>
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['user_id']; ?>"
                    <?php echo ($user['user_id'] == $comment["user_id"]) ? 'selected' : ''; ?>>
                    <?php echo $user['username']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">        
        <label for="post_id" class="form-label">Publicacion</label>
        <select class="form-select" id="post_id" name="post_id" required>
            <option value="">Seleccione la publicacion</option>
            <?php foreach ($posts as $post): ?>
                <option value="<?php echo $post['post_id']; ?>"
                    <?php echo ($post['post_id'] == $comment['post_id']) ? 'selected' : ''; ?>>
                    <?php echo $post['title']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
</form>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>