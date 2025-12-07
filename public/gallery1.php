<?php
session_start();
include '../config/database.php'; // Conexión a la base de datos

// Verificar si se ha recibido el ID de la categoría
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    // Consultar los posts de la categoría seleccionada
    try {

        $sql = "SELECT posts.post_id, posts.title, posts.content, posts.image_path, categories.category_name, categories.category_id 
                              FROM posts
                              JOIN categories ON posts.category_id = categories.category_id
                              WHERE posts.category_id = :category_id
                              ORDER BY posts.created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['category_id' => $category_id]);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);        
       
    } catch (PDOException $e) {
        echo "Error al obtener posts: " . $e->getMessage();
    }
} else {
    echo "Categoría no seleccionada.";
    exit();
}
ob_start();
?>

<div class="container my-5">
    <h2 class="mb-4">Posts en "<?php echo htmlspecialchars($posts[0]['category_name']); ?>"</h2>
    <div class="row">
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <?php if (!empty($post['image_path'])): ?>
                            <img src="<?php echo "../public/posts/" . $post['image_path']; ?>" class="card-img-top" alt="Imagen de <?php echo htmlspecialchars($post['title']); ?>">
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php //echo htmlspecialchars($post['title']);
                            echo $post['title']; ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars(substr($post['content'], 0, 100)) . '...'; ?></p>
                            <a href="#commentsModal<?php echo $post['post_id']; ?>" class="btn btn-primary" data-toggle="modal">Comentarios</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay posts en esta categoría.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal de Comentarios para cada post -->
<?php foreach ($posts as $post): ?>
<div class="modal fade" id="commentsModal<?php echo $post['post_id']; ?>" tabindex="-1" aria-labelledby="commentsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comentarios en "<?php echo htmlspecialchars($post['title']); ?>"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                // Consulta de comentarios del post
                $sql = "SELECT comments.content, users.username
                                      FROM comments
                                      JOIN users ON comments.user_id = users.user_id
                                      WHERE post_id = :post_id
                                      ORDER BY comments.created_at DESC";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':post_id' => $post['post_id']]);
                $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                ?>

                <!-- Mostrar comentarios existentes -->
                <div class="mb-4">
                    <?php if (!empty($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="border p-2 mb-2">
                                <strong><?php echo htmlspecialchars($comment['username']); ?>:</strong>
                                <p><?php echo htmlspecialchars($comment['content']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">No hay comentarios todavía.</p>
                    <?php endif; ?>
                </div>

                <!-- Formulario de comentario para usuarios autenticados -->
                <?php if (isset($_SESSION['user_id'])): ?>
                    <form action="post_comment.php" method="POST">
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="3" placeholder="Escribe un comentario..." required></textarea>
                        </div>
                        <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="category_id" value="<?php echo $post['category_id']; ?>">
                        <button type="submit" class="btn btn-primary">Publicar comentario</button>
                    </form>
                <?php else: ?>
                    <p class="text-muted">Inicia sesión para comentar.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php
$content = ob_get_clean();
include '../layouts/layout_site.php';
?>

