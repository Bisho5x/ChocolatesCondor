<?php
session_start();
include '../../config/database.php';

$sql = "SELECT P.post_id,P.title,P.content,P.image_path,C.category_name 
        FROM posts as P INNER JOIN categories as C ON P.category_id = C.category_id";
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

ob_start();
?>

<?php //function displayContent() { global $result; ?>
    <div class="container">
        <h2 class="mt-4">Publicaciones</h2>
        <a href="add_post.php" class="btn btn-success mb-3">Añadir Nueva Publicación</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?php echo $post['post_id']; ?></td>
                        <td><?php echo $post['title']; ?></td>
                        <td><?php echo substr($post['content'], 0, 50) . '...'; ?></td>
                        <td><?php echo $post['category_name']; ?></td>
                        <td><?php if ($post['image_path']): ?><img src="<?php echo $post['image_path']; ?>" width="80"><?php endif; ?></td>
                        <td>
                            <a href="edit_post.php?id=<?php echo $post['post_id']; ?>" class="btn btn-primary">Editar</a>
                            <a href="process_delete_post.php?id=<?php echo $post['post_id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta publicación?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php //} ?>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>
