<?php
session_start();

// Verificar que el usuario esté autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Configuración del título de la página
$pageTitle = "Panel de Administración";
$breadcrumb = "Dashboard";

// Almacenamos el contenido del dashboard en $content
ob_start();
?>

<!-- Contenido específico para el Panel de Administración -->
<div class="container">
    <div class="text-center mb-5">
        <h1><i class="fas fa-chart-line me-3"></i>Dashboard Administrativo</h1>
        <p class="lead text-muted">Bienvenido al centro de control de Chocolates Cóndor</p>
    </div>

    <div class="row g-4">
        <!-- Card: Usuarios -->
        <div class="col-lg-3 col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-users me-2"></i>Usuarios
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Administra los usuarios del sistema, permisos y roles.</p>
                    <div class="text-center">
                        <i class="fas fa-user-cog fa-3x text-primary mb-3"></i>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="../users/list_users.php" class="btn btn-primary">
                        <i class="fas fa-arrow-right me-1"></i>Gestionar Usuarios
                    </a>
                </div>
            </div>
        </div>

        <!-- Card: Categorías -->
        <div class="col-lg-3 col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-tags me-2"></i>Categorías
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Organiza el contenido por categorías y etiquetas.</p>
                    <div class="text-center">
                        <i class="fas fa-layer-group fa-3x text-success mb-3"></i>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="../categories/list_categories.php" class="btn btn-success">
                        <i class="fas fa-arrow-right me-1"></i>Gestionar Categorías
                    </a>
                </div>
            </div>
        </div>

        <!-- Card: Posts -->
        <div class="col-lg-3 col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-file-alt me-2"></i>Publicaciones
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Crea, edita y publica contenido en tu sitio web.</p>
                    <div class="text-center">
                        <i class="fas fa-newspaper fa-3x text-warning mb-3"></i>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="../posts/list_posts.php" class="btn btn-warning text-dark">
                        <i class="fas fa-arrow-right me-1"></i>Gestionar Posts
                    </a>
                </div>
            </div>
        </div>

        <!-- Card: Sucursales -->
        <div class="col-lg-3 col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-store me-2"></i>Sucursales
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Gestiona la información de todas las sucursales.</p>
                    <div class="text-center">
                        <i class="fas fa-building fa-3x text-info mb-3"></i>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="../sucursales/list_sucursales.php" class="btn btn-info">
                        <i class="fas fa-arrow-right me-1"></i>Gestionar Sucursales
                    </a>
                </div>
            </div>
        </div>

        <!-- Card: Comentarios -->
        <div class="col-lg-3 col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-comments me-2"></i>Comentarios
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Modera y responde a los comentarios de usuarios.</p>
                    <div class="text-center">
                        <i class="fas fa-comments fa-3x text-secondary mb-3"></i>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="../comments/list_comments.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-right me-1"></i>Gestionar Comentarios
                    </a>
                </div>
            </div>
        </div>

        <!-- Card: Configuración -->
        <div class="col-lg-3 col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-cog me-2"></i>Configuración
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Ajustes generales del sitio web y sistema.</p>
                    <div class="text-center">
                        <i class="fas fa-tools fa-3x text-dark mb-3"></i>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-dark">
                        <i class="fas fa-arrow-right me-1"></i>Ver Ajustes
                    </a>
                </div>
            </div>
        </div>

        <!-- Card: Estadísticas (placeholder) -->
        <div class="col-lg-3 col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-bar me-2"></i>Estadísticas
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Visualiza métricas y reportes del sitio.</p>
                    <div class="text-center">
                        <i class="fas fa-chart-pie fa-3x text-danger mb-3"></i>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-danger">
                        <i class="fas fa-arrow-right me-1"></i>Ver Estadísticas
                    </a>
                </div>
            </div>
        </div>

        <!-- Card: Respaldo (placeholder) -->
        <div class="col-lg-3 col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-database me-2"></i>Respaldo
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Realiza respaldos de la base de datos y archivos.</p>
                    <div class="text-center">
                        <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-arrow-right me-1"></i>Gestionar Respaldos
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Información del Sistema -->
    <div class="mt-4">
        <div class="alert alert-info">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="mb-1">
                        <i class="fas fa-info-circle me-2"></i>Información del Sistema
                    </h6>
                    <p class="mb-0">
                        Panel de administración para Chocolates Cóndor - 
                        Versión del sistema actualizada y funcionando correctamente.
                    </p>
                </div>
                <div class="col-md-4 text-end">
                    <small class="text-muted">
                        <i class="fas fa-clock me-1"></i>
                        Última actualización: <?php echo date('d/m/Y H:i'); ?>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Guardamos el contenido en $content y lo mostramos en layout_admin.php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>