<?php
session_start();
include '../../config/database.php';
$sql = "SELECT C.comment_id,C.content,P.title,P.content as content_post, U.username 
            FROM comments as C INNER JOIN posts as P ON C.post_id=P.post_id 
            INNER JOIN users as U ON U.user_id=C.user_id";
$stmt = $pdo->query($sql);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
ob_start();
?>
<div class="container">
    <h2 class="mt-4">Comentarios</h2>
    <a href="add_comment.php" class="btn btn-success mb-3">Añadir Nuevo Comentario</a>
    <table class="table table-striped">
        <thead>
            <tr>

                <th>ID</th>
                <th>Titulo publicación</th>
                <th>Contenido publicación</th>
                <th>Usuario de comentario</th>
                <th>Comentario publicado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?php echo $comment['comment_id']; ?></td>
                    <td><?php echo $comment['title']; ?></td>
                    <td><?php echo substr($comment['content_post'], 0, 50) . '...'; ?></td>
                    <td><?php echo $comment['username']; ?></td>
                    <td><?php echo substr($comment['content'], 0, 50) . '...'; ?></td>
                    <td>
                        <a href="edit_comment.php?id=<?php echo $comment['comment_id']; ?>" class="btn btn-primary">Editar</a>
                        <a href="process_delete_comment.php?id=<?php echo $comment['comment_id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este comentario?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>