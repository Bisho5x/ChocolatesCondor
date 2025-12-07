<?php
// Conexión a la base de datos
include '../config/database.php';

// Consultar categorías directamente en el archivo
try {
        $sql = "SELECT * FROM categories ORDER BY category_name ASC";
        $stmt = $pdo->query($sql);
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $stmt = $db->query("SELECT * FROM categories ORDER BY category_name ASC");
    // $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener categorías: " . $e->getMessage();
    $categories = [];
}
ob_start();
?>

<!-- Mostrar las categorías en el menú -->
<header class="bg-dark text-white p-3">
    <div class="container">
        <h1 class="display-4">Mi CMS Básico</h1>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="index.php">Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php foreach ($categories as $category): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="post.php?category_id=<?php echo $category['category_id']; ?>">
                                <?php echo htmlspecialchars($category['category_name']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
    </div>
</header>
<?php
$content = ob_get_clean();
include '../layouts/layout_site.php';
?>