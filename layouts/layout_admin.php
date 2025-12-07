<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS Personalizado -->
    <link href="../../css/admin.css" rel="stylesheet">
</head>
<style>
    /* Variables CSS corregidas para legibilidad */
:root {
    --primary-dark: #29170F;          /* Marrón oscuro principal */
    --primary-pink: #ffadb4;          /* Rosa claro */
    --accent-brown: #8B4513;          /* Marrón accent */
    --text-light: #ffae00ff;
    --text-dark: #333333;
    --shadow-light: rgba(255, 173, 180, 0.3);
    --shadow-dark: rgba(41, 23, 15, 0.6);
}

/* Reset y configuración base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background: linear-gradient(135deg, #29170F 0%, #3d2217 100%);
    color: var(--text-light);
    line-height: 1.6;
}

.sidebar {
    width: 280px;
    height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
    z-index: 1000;
    
    /* Gradiente corregido */
    background: linear-gradient(180deg, 
        var(--primary-pink) 0%, 
        #ff9fa7 50%, 
        var(--primary-pink) 100%);
    
    /* Sombra corregida */
    box-shadow: 0 0 30px var(--shadow-dark);
    
    /* Bordes y espaciado */
    border-right: 3px solid var(--accent-brown);
    padding: 0;
    overflow-y: auto;
    transition: all 0.3s ease;
}

/* Header del sidebar */
.sidebar h2 {
    background: var(--primary-dark);
    color: var(--text-light);
    padding: 25px 20px;
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
    text-align: center;
    border-bottom: 3px solid var(--accent-brown);
    position: sticky;
    top: 0;
    z-index: 1001;
    
    /* Sombra corregida */
    box-shadow: 0 2px 10px var(--shadow-dark);
}

/* Navegación del sidebar */
.sidebar .nav {
    padding: 20px 0;
}

.sidebar .nav-item {
    margin: 5px 15px;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.sidebar .nav-link {
    color: #2c1810;                    /* Color sólido corregido */
    font-weight: 600;                  /* Peso aumentado para mejor legibilidad */
    font-size: 0.95rem;
    padding: 15px 20px;
    border-radius: 12px;
    margin: 0;
    transition: all 0.3s ease;
    position: relative;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 10px;
    
    /* Iconos usando pseudo-elementos */
}

.sidebar .nav-link::before {
    content: "⚡";
    font-size: 1rem;
    opacity: 0.7;
}

/* Estados hover y activo corregidos */
.sidebar .nav-link:hover,
.sidebar .nav-link.active {
    background: var(--primary-dark);
    color: var(--text-light);
    transform: translateX(5px);
    box-shadow: 0 5px 15px var(--shadow-dark);
}

.sidebar .nav-link:hover::before,
.sidebar .nav-link.active::before {
    opacity: 1;
    transform: scale(1.1);
    transition: all 0.3s ease;
}

/* =====================================================
   CONTENIDO PRINCIPAL CORREGIDO
   ===================================================== */
.content {
    margin-left: 280px;
    padding: 30px;
    min-height: 100vh;
    background: linear-gradient(135deg, 
        rgba(255, 173, 180, 0.1) 0%, 
        rgba(41, 23, 15, 0.1) 100%);
    backdrop-filter: blur(10px);
}

/* =====================================================
   DASHBOARD CARDS CORREGIDAS
   ===================================================== */
.card {
    background: linear-gradient(145deg, 
        rgba(255, 255, 255, 0.95) 0%, 
        rgba(255, 255, 255, 0.9) 100%);
    
    border: none;
    border-radius: 20px;
    box-shadow: 
        0 10px 30px rgba(0, 0, 0, 0.1),
        0 1px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    backdrop-filter: blur(10px);
    position: relative;
}

.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-pink), var(--accent-brown));
}

.card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.15),
        0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Card headers */
.card-header {
    background: linear-gradient(135deg, 
        var(--primary-pink) 0%, 
        #ff9fa7 100%);
    color: var(--primary-dark);
    border: none;
    padding: 20px;
    font-weight: 600;
    font-size: 1.1rem;
    border-bottom: 2px solid rgba(41, 23, 15, 0.1);
}

/* Card body */
.card-body {
    padding: 25px;
    color: #333;
}

.card-text {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.6;
}

/* Card footer */
.card-footer {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.8) 0%, 
        rgba(255, 255, 255, 0.9) 100%);
    border: none;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Botones en cards */
.btn {
    border-radius: 25px;
    padding: 10px 20px;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    border: none;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}
.btn-success {
    background-color: #ffbc05ff !important;  /* ← CAMBIA ESTE VERDE POR AZUL */
    border-color: #ffbc05ff !important;
    color: #ffffff !important;
}

.btn-success:hover {
    background-color: #ffbc05ff !important;
    border-color: #ffbc05ff !important;
    color: #ffffff !important;
}
.btn-primary {
    background-color: #ffbc05ff !important;    /* ← NARANJA (o cambia por el color que quieras) */
    border-color: #ffbc05ff !important;
    color: #ffffff !important;
}

.btn-primary:hover {
    background-color: #ffbc05ff !important;    /* ← NARANJA MÁS OSCURO */
    border-color: #ffbc05ff !important;
    color: #ffffff !important;
}
/* Colores específicos para cada card */
.card.bg-primary { --card-color: #ff9100ff; }
.card.bg-success { --card-color: #ff94dbff; }
.card.bg-warning { --card-color: #ffc107; }
.card.bg-info { --card-color: #f5a850ff; }

/* =====================================================
   TABLAS CORREGIDAS - PROBLEMA PRINCIPAL DE LEGIBILIDAD
   ===================================================== */
.table {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}

.table thead th {
    background: var(--primary-dark);   /* Fondo sólido, no gradiente */
    color: var(--text-light);
    border: none;
    padding: 15px;
    font-weight: 600;
    font-size: 0.95rem;
}

.table tbody tr {
    transition: all 0.3s ease;
}

.table tbody tr:hover {
    background: rgba(255, 173, 180, 0.1);
    transform: scale(1.01);
}

.table tbody td {
    padding: 15px;
    border-color: rgba(255, 173, 180, 0.2);
    color: #333;
}

/* =====================================================
   FORMULARIOS CORREGIDOS
   ===================================================== */
.form-control {
    border: 2px solid rgba(255, 173, 180, 0.3);
    border-radius: 12px;
    padding: 12px 15px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(5px);
}

.form-control:focus {
    border-color: var(--primary-pink);
    box-shadow: 0 0 0 0.2rem rgba(255, 173, 180, 0.25);
    background: rgba(255, 255, 255, 1);
}

.form-group label {
    color: var(--primary-dark);
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 0.95rem;
}

/* =====================================================
   TÍTULOS CORREGIDOS - PROBLEMA PRINCIPAL DE LEGIBILIDAD
   ===================================================== */
h1, h2, h3, h4, h5, h6 {
    color: var(--text-light);          /* Cambio crítico para legibilidad */
    font-weight: 600;
    margin-bottom: 20px;
}

h1 {
    font-size: 2.5rem;
    color: var(--text-light);          /* Corregido - era transparente */
    background: none;                  /* Removido gradiente de texto */
    -webkit-background-clip: unset;
    -webkit-text-fill-color: unset;
    background-clip: unset;
    text-align: center;
    margin-bottom: 30px;
}

h2 {
    font-size: 2rem;
    color: var(--text-light);          /* Corregido - era primary-dark */
    border-bottom: 3px solid var(--primary-pink);
    padding-bottom: 10px;
    display: inline-block;
}

/* =====================================================
   CONTAINERS Y SPACING CORREGIDOS
   ===================================================== */
.container {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    padding: 30px;
    margin: 20px auto;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}

.container-fluid {
    background: transparent;
    padding: 0;
}

/* =====================================================
   ALERTAS Y MENSAJES
   ===================================================== */
.alert {
    border: none;
    border-radius: 15px;
    padding: 20px;
    margin: 20px 0;
    backdrop-filter: blur(10px);
    font-weight: 500;
}

.alert-success {
    background: linear-gradient(135deg, 
        rgba(40, 167, 69, 0.1), 
        rgba(255, 61, 2, 0.2));
    color: #d87626ff;
    border-left: 5px solid #793a07ff;
}

.alert-danger {
    background: linear-gradient(135deg, 
        rgba(220, 53, 69, 0.1), 
        rgba(220, 53, 69, 0.2));
    color: #721c24;
    border-left: 5px solid #dc3545;
}

/* =====================================================
   RESPONSIVE DESIGN
   ===================================================== */
@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }
    
    .sidebar.show {
        transform: translateX(0);
    }
    
    .content {
        margin-left: 0;
        padding: 20px;
    }
    
    .sidebar h2 {
        font-size: 1.3rem;
        padding: 20px;
    }
    
    h1 {
        font-size: 2rem;
    }
    
    h2 {
        font-size: 1.5rem;
    }
}

/* =====================================================
   ANIMACIONES Y TRANSICIONES GLOBALES
   ===================================================== */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.container, .card, .table {
    animation: fadeInUp 0.6s ease-out;
}

/* Scrollbar personalizada */
.sidebar::-webkit-scrollbar {
    width: 8px;
}

.sidebar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
}

.sidebar::-webkit-scrollbar-thumb {
    background: var(--primary-dark);
    border-radius: 4px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background: var(--accent-brown);
}
</style>





<body>

    <!-- Sidebar de Navegación Mejorado -->
    <div class="sidebar">
        <h2><img src="../../img/condor.png" alt="Chocolates Cóndor" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; margin-right: 16px; vertical-align: middle;">Panel de Administración</h2>
        <nav class="nav flex-column">
            <div class="nav-item">
                <a class="nav-link active" href="../admin/admin_dashboard.php">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="../users/list_users.php">
                    <i class="fas fa-users me-2"></i>Usuarios
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="../categories/list_categories.php">
                    <i class="fas fa-tags me-2"></i>Categorías
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="../posts/list_posts.php">
                    <i class="fas fa-file-alt me-2"></i>Posts
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="../comments/list_comments.php">
                    <i class="fas fa-comments me-2"></i>Comentarios
                </a>
            </div>
            <hr class="my-3">
            <div class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                </a>
            </div>
        </nav>
    </div>

    <!-- Contenido Principal -->
    <div class="content">
        <?php echo $content; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para cerrar sidebar en móvil -->
    <script>
        // Cerrar sidebar al hacer click en un enlace en móvil
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    document.querySelector('.sidebar').classList.remove('show');
                }
            });
        });
        
        // Toggle sidebar en móvil
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('show');
        }
    </script>
</body>
</html>