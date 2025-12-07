<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
    // Redirigir al usuario a la página de inicio de sesión si no está autenticado
    header("Location: login.php");
    exit();
}

// Obtener información del usuario actual
$nombre_usuario = $_SESSION['username'] ?? 'Administrador';
$fecha_actual = date('d/m/Y');
$hora_actual = date('H:i');

// Opcional: Conectar a base de datos para obtener estadísticas
// Descomenta si tienes base de datos configurada

try {
    $pdo = new PDO("mysql:host=localhost;dbname=condor_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Obtener estadísticas básicas
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM usuarios");
    $total_usuarios = $stmt->fetch()['total'] ?? 0;
    
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM categorias");
    $total_categorias = $stmt->fetch()['total'] ?? 0;
    
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM productos");
    $total_productos = $stmt->fetch()['total'] ?? 0;
    
} catch (PDOException $e) {
    // Si no hay base de datos, mostrar valores por defecto
    $total_usuarios = 'N/A';
    $total_categorias = 'N/A';
    $total_productos = 'N/A';
}

?>

<div class="admin-dashboard">
    <!-- Header de bienvenida -->
    <div class="welcome-header">
        <h2>Panel de Administración de Condor</h2>
        <div class="user-info">
            <span class="welcome-text">Bienvenido, <?php echo htmlspecialchars($nombre_usuario); ?></span>
            <span class="date-time"><?php echo $fecha_actual; ?> - <?php echo $hora_actual; ?></span>
        </div>
    </div>

    <!-- Mensaje de gestión -->
    <div class="management-message">
        <p>Gestiona el contenido del sitio desde aquí. Selecciona una sección del menú lateral para comenzar.</p>
    </div>

    <!-- Panel de estadísticas (opcional, solo se muestra si hay datos) -->
    <div class="stats-panel">
        <div class="stats-title">
            <h3>Resumen del Sistema</h3>
        </div>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?php echo $total_usuarios ?? '—'; ?></div>
                <div class="stat-label">Usuarios</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $total_categorias ?? '—'; ?></div>
                <div class="stat-label">Categorías</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $total_productos ?? '—'; ?></div>
                <div class="stat-label">Productos</div>
            </div>
        </div>
    </div>

    <!-- Accesos rápidos -->
    <div class="quick-actions">
        <h3>Accesos Rápidos</h3>
        <div class="actions-grid">
            <a href="#" class="action-card">
                <div class="action-icon">👥</div>
                <div class="action-text">Gestionar Usuarios</div>
            </a>
            <a href="#" class="action-card">
                <div class="action-icon">📂</div>
                <div class="action-text">Administrar Categorías</div>
            </a>
            <a href="#" class="action-card">
                <div class="action-icon">📦</div>
                <div class="action-text">Control de Productos</div>
            </a>
            <a href="#" class="action-card">
                <div class="action-icon">⚙️</div>
                <div class="action-text">Configuración</div>
            </a>
        </div>
    </div>

    <!-- Notificaciones o información adicional -->
    <div class="info-panel">
        <h3>Información</h3>
        <div class="info-content">
            <p>🔒 <strong>Sesión activa:</strong> Tu sesión está protegida y segura.</p>
            <p>📝 <strong>Última actividad:</strong> Panel de administración cargado correctamente.</p>
            <p>🔧 <strong>Sistema:</strong> Todas las funciones del panel están operativas.</p>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include '../../layouts/layout_admin.php';
?>

<style>
/* Estilos CSS para la página de bienvenida */
.admin-dashboard {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.welcome-header {
    background: linear-gradient(135deg, var(--primary-dark, #29170F), var(--accent-brown, #8B4513));
    color: white;
    padding: 30px;
    border-radius: 10px;
    margin-bottom: 30px;
    text-align: center;
}

.welcome-header h2 {
    margin: 0 0 15px 0;
    font-size: 2.5em;
    font-weight: 300;
}

.user-info {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.welcome-text {
    font-size: 1.2em;
    font-weight: 600;
}

.date-time {
    opacity: 0.9;
    font-size: 1em;
}

.management-message {
    background: var(--primary-pink, #ffadb4);
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
    text-align: center;
}

.management-message p {
    margin: 0;
    font-size: 1.1em;
    color: #333;
}

.stats-panel {
    background: white;
    border-radius: 10px;
    padding: 25px;
    margin-bottom: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.stats-title h3 {
    margin: 0 0 20px 0;
    color: var(--primary-dark, #29170F);
    text-align: center;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 20px;
}

.stat-card {
    text-align: center;
    padding: 20px;
    background: var(--primary-dark, #29170F);
    color: white;
    border-radius: 8px;
}

.stat-number {
    font-size: 2.5em;
    font-weight: bold;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 1em;
    opacity: 0.9;
}

.quick-actions {
    background: white;
    border-radius: 10px;
    padding: 25px;
    margin-bottom: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.quick-actions h3 {
    margin: 0 0 20px 0;
    color: var(--primary-dark, #29170F);
    text-align: center;
}

.actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

.action-card {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
    background: var(--primary-pink, #ffadb4);
    color: #333;
    text-decoration: none;
    border-radius: 8px;
    transition: transform 0.2s, box-shadow 0.2s;
}

.action-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    text-decoration: none;
    color: #333;
}

.action-icon {
    font-size: 1.5em;
}

.action-text {
    font-weight: 600;
}

.info-panel {
    background: white;
    border-radius: 10px;
    padding: 25px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.info-panel h3 {
    margin: 0 0 15px 0;
    color: var(--primary-dark, #29170F);
}

.info-content p {
    margin: 10px 0;
    line-height: 1.6;
}

/* Responsivo */
@media (max-width: 768px) {
    .admin-dashboard {
        padding: 15px;
    }
    
    .welcome-header h2 {
        font-size: 2em;
    }
    
    .user-info {
        flex-direction: column;
        gap: 10px;
    }
    
    .stats-grid,
    .actions-grid {
        grid-template-columns: 1fr;
    }
}
</style>