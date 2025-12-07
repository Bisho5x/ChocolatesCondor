<?php include '../layouts/header.php';
ob_start(); ?>

<style>
    /* Estilos para Secciones Adicionales */
    .historia-section {
        background: linear-gradient(135deg, #29170F 0%, #3a2318 100%);
        color: white;
        padding: 80px 0;
        position: relative;
    }

    .historia-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="chocolate" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,173,180,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23chocolate)"/></svg>');
        opacity: 0.3;
    }

    .historia-content {
        position: relative;
        z-index: 2;
    }

    .historia-card {
        background: rgba(255, 173, 180, 0.15);
        border-radius: 25px;
        padding: 40px;
        margin: 20px 0;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 173, 180, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .historia-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(255, 173, 180, 0.3);
    }

    .historia-title {
        color: #ffadb4;
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .historia-subtitle {
        color: #ffadb4;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .historia-text {
        color: white;
        font-size: 1.1rem;
        line-height: 1.8;
        text-align: justify;
    }

    .servicios-section {
        background: #f8f9fa;
        padding: 80px 0;
    }

    .servicio-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        margin: 20px 0;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .servicio-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        border-color: #ffadb4;
    }

    .servicio-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #ffadb4, #ffb3c6);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2rem;
        color: white;
    }

    .servicio-title {
        color: #29170F;
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 15px;
        text-align: center;
    }

    .servicio-description {
        color: #666;
        text-align: center;
        line-height: 1.6;
    }

    .mvv-section {
        background: linear-gradient(135deg, #ffadb4 0%, #ffb3c6 100%);
        padding: 80px 0;
    }

    .mvv-card {
        background: white;
        border-radius: 25px;
        padding: 40px;
        margin: 20px 0;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 3px solid transparent;
        text-align: center;
        height: 100%;
    }

    .mvv-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        border-color: #29170F;
    }

    .mvv-icon {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #29170F, #3a2318);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 3rem;
        color: white;
        box-shadow: 0 10px 25px rgba(41, 23, 15, 0.3);
    }

    .mvv-title {
        color: #29170F;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .mvv-text {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.7;
        text-align: justify;
    }

    .ubicacion-section {
        background: linear-gradient(135deg, #29170F 0%, #3a2318 50%, #4a2f23 100%);
        padding: 60px 0;
        position: relative;
        margin-top: 40px;
        border-radius: 30px;
        overflow: hidden;
    }

    .ubicacion-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="location-pattern" x="0" y="0" width="30" height="30" patternUnits="userSpaceOnUse"><circle cx="15" cy="15" r="2" fill="rgba(255,173,180,0.1)"/><circle cx="5" cy="5" r="1" fill="rgba(255,173,180,0.15)"/><circle cx="25" cy="25" r="1" fill="rgba(255,173,180,0.15)"/></pattern></defs><rect width="100" height="100" fill="url(%23location-pattern)"/></svg>');
        opacity: 0.6;
        z-index: 1;
    }

    .ubicacion-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .ubicacion-title {
        color: #ffadb4;
        font-size: 2.8rem;
        font-weight: bold;
        margin-bottom: 20px;
        text-shadow: 0 2px 10px rgba(255, 173, 180, 0.3);
        animation: titleGlow 3s ease-in-out infinite alternate;
    }

    @keyframes titleGlow {
        from {
            text-shadow: 0 2px 10px rgba(255, 173, 180, 0.3);
        }

        to {
            text-shadow: 0 2px 20px rgba(255, 173, 180, 0.6);
        }
    }

    .ubicacion-subtitle {
        color: white;
        font-size: 1.3rem;
        margin-bottom: 40px;
        opacity: 0.9;
    }

    .btn-ubicacion-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 0;
    }

    .btn-ubicacion {
        position: relative;
        background: linear-gradient(135deg, #ffadb4 0%, #ffb3c6 100%);
        color: #29170F;
        border: 3px solid #29170F;
        border-radius: 50px;
        padding: 18px 40px;
        font-size: 1.3rem;
        font-weight: bold;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 15px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        margin: 0;
        box-shadow:
            0 10px 30px rgba(255, 173, 180, 0.4),
            0 0 0 0 rgba(255, 173, 180, 0.7),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        overflow: hidden;
        z-index: 1;
    }

    .btn-ubicacion::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.5s ease;
        z-index: -1;
    }

    .btn-ubicacion:hover::before {
        left: 100%;
    }

    .btn-ubicacion:hover {
        background: linear-gradient(135deg, #ffb3c6 0%, #ffadb4 100%);
        transform: translateY(-5px) scale(1.05);
        box-shadow:
            0 15px 40px rgba(255, 173, 180, 0.6),
            0 0 20px rgba(255, 173, 180, 0.8),
            inset 0 1px 0 rgba(255, 255, 255, 0.4);
        border-color: #29170F;
    }

    .btn-ubicacion:active {
        transform: translateY(-2px) scale(1.02);
        box-shadow:
            0 8px 25px rgba(255, 173, 180, 0.5),
            0 0 15px rgba(255, 173, 180, 0.6);
    }

    .btn-ubicacion .location-icon {
        font-size: 1.5rem;
        animation: bounce 2s infinite, glow 1.5s ease-in-out infinite alternate;
        filter: drop-shadow(0 2px 4px rgba(41, 23, 15, 0.3));
    }

    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-5px);
        }

        60% {
            transform: translateY(-3px);
        }
    }

    @keyframes glow {
        from {
            filter: drop-shadow(0 2px 4px rgba(41, 23, 15, 0.3));
        }

        to {
            filter: drop-shadow(0 0 8px rgba(41, 23, 15, 0.6));
        }
    }

    .btn-ubicacion .text-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2px;
    }

    .btn-ubicacion .main-text {
        font-size: 1.1rem;
        font-weight: bold;
    }

    .btn-ubicacion .sub-text {
        font-size: 0.8rem;
        opacity: 0.8;
        font-weight: normal;
    }

    .btn-ubicacion .click-effect {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
        z-index: -1;
    }

    .btn-ubicacion.clicked .click-effect {
        width: 300px;
        height: 300px;
    }

    .btn-ubicacion.highlighted {
        background: linear-gradient(135deg, #fa9c71 0%, #fa824aff 100%);
        border-color: #db4500ff;
        color: white;
    }

    .btn-ubicacion.highlighted:hover {
        background: linear-gradient(135deg, #db4500ff 0%, #fa9c71 100%);
    }

    /* Información adicional */
    .ubicacion-info {
        margin-top: 30px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .ubicacion-info .highlight {
        color: #ffadb4;
        font-weight: bold;
    }

    /* Estilos responsivos para el botón */
    @media (max-width: 768px) {
        .ubicacion-section {
            padding: 40px 0;
            margin-top: 20px;
        }

        .ubicacion-title {
            font-size: 2.2rem;
        }

        .ubicacion-subtitle {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .btn-ubicacion {
            padding: 15px 30px;
            font-size: 1.1rem;
            gap: 12px;
        }

        .btn-ubicacion .location-icon {
            font-size: 1.3rem;
        }

        .btn-ubicacion .main-text {
            font-size: 1rem;
        }

        .btn-ubicacion .sub-text {
            font-size: 0.75rem;
        }
    }

    @media (max-width: 576px) {
        .ubicacion-title {
            font-size: 1.8rem;
        }

        .ubicacion-subtitle {
            font-size: 1rem;
        }

        .btn-ubicacion {
            padding: 12px 25px;
            font-size: 1rem;
            gap: 10px;
            flex-direction: column;
            text-align: center;
        }

        .btn-ubicacion .location-icon {
            font-size: 1.2rem;
        }

        .btn-ubicacion .main-text {
            font-size: 0.9rem;
        }

        .btn-ubicacion .sub-text {
            font-size: 0.7rem;
        }
    }

    /* Estilos para carrusel de Bootstrap */
    .bootstrap-carousel {
        background: #29170F;
        border-radius: 30px;
        padding: 40px 20px;
        margin: 20px 0;
    }

    .bootstrap-carousel .carousel-item {
        padding: 20px 0;
    }

    .bootstrap-carousel .card {
        background: #ffadb4;
        border: none;
        border-radius: 25px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        height: 100%;
    }

    .bootstrap-carousel .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(255, 105, 180, 0.4);
    }

    .bootstrap-carousel .card-img-top {
        height: 200px;
        object-fit: cover;
        border-radius: 25px 25px 0 0;
    }

    .bootstrap-carousel .card-body {
        padding: 25px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: calc(100% - 200px);
    }

    .bootstrap-carousel .card-title {
        color: #29170F;
        font-size: 1.3rem;
        font-weight: bold;
        margin-bottom: 15px;
        text-align: center;
    }

    .bootstrap-carousel .card-text {
        color: #29170F;
        font-size: 0.95rem;
        line-height: 1.5;
        text-align: center;
        margin-bottom: 20px;
    }

    .bootstrap-carousel .price {
        color: #29170F;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        display: block;
    }
    .producto-card .card-text {
    color: #666;
    text-align: center;
    line-height: 1.6;
}

    .bootstrap-carousel .btn {
        border-radius: 25px;
        font-weight: bold;
        padding: 10px 20px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .bootstrap-carousel .btn-primary {
        background: #FFA500;
        border-color: #FFA500;
        flex: 1;
        margin-right: 5px;
    }

    .bootstrap-carousel .btn-primary:hover {
        background: #FF8C00;
        border-color: #FF8C00;
        transform: translateY(-2px);
    }

    .bootstrap-carousel .btn-secondary {
        background: #29170F;
        border-color: #29170F;
        flex: 1;
        margin-left: 5px;
    }

    .bootstrap-carousel .btn-secondary:hover {
        background: #4a2f23;
        border-color: #4a2f23;
        transform: translateY(-2px);
    }

    .bootstrap-carousel .carousel-control-prev,
    .bootstrap-carousel .carousel-control-next {
        width: 5%;
        color: #ffadb4;
    }

    .bootstrap-carousel .carousel-indicators [data-bs-target] {
        background-color: rgba(255, 173, 180, 0.6);
        border: 2px solid rgba(41, 23, 15, 0.3);
        width: 14px;
        height: 14px;
        border-radius: 50%;
    }

    .bootstrap-carousel .carousel-indicators .active {
        background-color: #ffadb4;
        border-color: #29170F;
        transform: scale(1.3);
    }

    @media (max-width: 768px) {
        .historia-title {
            font-size: 2rem;
        }

        .historia-card {
            padding: 25px;
        }

        .servicio-card {
            padding: 20px;
        }

        .mvv-card {
            padding: 30px;
            margin-bottom: 30px;
        }

        .mvv-title {
            font-size: 1.5rem;
        }
    }

    /* ===== REPRODUCTOR DE MÚSICA PARA HOME ===== */
    .music-player {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: linear-gradient(135deg, #db8b92, #fa9c71);
        border-radius: 25px;
        padding: 15px;
        box-shadow: 0 8px 25px rgba(219, 139, 146, 0.4);
        z-index: 1000;
        transition: all 0.3s ease;
        min-width: 200px;
        opacity: 0;
        transform: translateY(100px);
        pointer-events: none;
    }
    
    .music-player.show {
        opacity: 1;
        transform: translateY(0);
        pointer-events: all;
    }
    
    .music-player:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(219, 139, 146, 0.6);
    }
    
    .music-controls {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .play-btn {
        background: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #29170F;
        font-size: 16px;
    }
    
    .play-btn:hover {
        transform: scale(1.1);
        background: #29170F;
        color: white;
    }
    
    .play-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    .volume-container {
        display: flex;
        align-items: center;
        gap: 8px;
        flex: 1;
    }
    
    .volume-icon {
        color: white;
        font-size: 14px;
        width: 16px;
    }
    
    .volume-slider {
        -webkit-appearance: none;
        appearance: none;
        height: 4px;
        border-radius: 2px;
        background: rgba(255, 255, 255, 0.3);
        outline: none;
        cursor: pointer;
        flex: 1;
    }
    
    .volume-slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .volume-slider::-webkit-slider-thumb:hover {
        transform: scale(1.2);
        background: #29170F;
    }
    
    .volume-slider::-moz-range-thumb {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: white;
        cursor: pointer;
        border: none;
        transition: all 0.3s ease;
    }
    
    .volume-slider::-moz-range-thumb:hover {
        transform: scale(1.2);
        background: #29170F;
    }
    
    .music-info {
        color: white;
        font-size: 12px;
        margin-top: 8px;
        text-align: center;
        opacity: 0.9;
    }
    
    .music-status {
        font-size: 11px;
        margin-top: 4px;
        text-align: center;
        opacity: 0.7;
    }
    
    .music-activate {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: linear-gradient(135deg, #db8b92, #fa9c71);
        border: none;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: white;
        font-size: 20px;
        z-index: 1001;
        box-shadow: 0 8px 25px rgba(219, 139, 146, 0.4);
        animation: pulse 2s infinite;
    }
    
    .music-activate:hover {
        transform: scale(1.1);
        box-shadow: 0 12px 35px rgba(219, 139, 146, 0.6);
        animation: none;
    }
    
    @keyframes pulse {
        0% { box-shadow: 0 8px 25px rgba(219, 139, 146, 0.4); }
        50% { box-shadow: 0 8px 25px rgba(219, 139, 146, 0.8); }
        100% { box-shadow: 0 8px 25px rgba(219, 139, 146, 0.4); }
    }
    
    .music-activate.hidden {
        opacity: 0;
        pointer-events: none;
    }
    
    /* Estilos para alertas */
    .music-alert {
        position: fixed;
        top: 100px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #db8b92, #fa9c71);
        color: white;
        padding: 15px 25px;
        border-radius: 25px;
        z-index: 1002;
        box-shadow: 0 8px 25px rgba(219, 139, 146, 0.4);
        font-size: 14px;
        font-weight: 500;
        opacity: 0;
        transition: all 0.3s ease;
        pointer-events: none;
    }
    
    .music-alert.show {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }
</style>

<!-- Sección Hero -->
<section id="inicio" class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="hero-title animate__animated animate__fadeInUp">CÓNDOR</h1>
                <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s">Experiencia única en chocolates</p>
                <button class="btn btn-primary hero-btn animate__animated animate__fadeInUp animate__delay-2s">Descubre Nuestros Productos</button>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Productos Destacados -->
<?php

try {
    require_once '../config/database.php';

    // Consulta productos destacados (ajusta category_id según tu admin)
    $query = "SELECT * FROM posts WHERE category_id = 10 ORDER BY created_at DESC LIMIT 6";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $featured = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Procesar imágenes igual que el carrusel
    $imgDir     = realpath(__DIR__ . '/../img');
    $uploadsDir = realpath(__DIR__ . '/../uploads');
    $defaultImg = 'huawulli.jpg';

    foreach ($featured as &$item) {
        // Extraer precio
        if (!empty($item['content']) && preg_match('/(\d+(?:\.\d{2})?)\s*(?:Bs|Bolivianos)/i', $item['content'], $matches)) {
            $item['precio'] = number_format((float)$matches[1], 2);
            $item['descripcion'] = trim(preg_replace('/\s*\d+(?:\.\d{2})?\s*(?:Bs|Bolivianos)\s*/i', '', $item['content']));
        } else {
            $item['precio'] = '0.00';
            $item['descripcion'] = trim($item['content'] ?? '');
        }

        if ($item['descripcion'] === '') {
            $item['descripcion'] = 'Delicioso producto de chocolate artesanal.';
        }

        // Resolver imagen
        $raw = trim((string)($item['image_path'] ?? ''));
        $resolved = '';
        
        if ($raw !== '') {
            $candidate = basename(str_replace('\\', '/', $raw));
            if ($imgDir && file_exists($imgDir . DIRECTORY_SEPARATOR . $candidate)) {
                $resolved = $candidate;
            } elseif ($uploadsDir && file_exists($uploadsDir . DIRECTORY_SEPARATOR . $candidate)) {
                $resolved = '../uploads/' . $candidate;
            } elseif (file_exists(__DIR__ . '/../' . $candidate)) {
                $resolved = $candidate;
            }
        }

        if ($resolved === '') {
            $resolved = $defaultImg;
        }

        $item['imagen'] = $resolved;
    }
    unset($item);

} catch (Exception $e) {
    $featured = [];
}
?>
<section id="productos-destacados" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="seccion-titu">Productos Destacados</h2>
                <p class="seccion-subtitu">Nuestra selección especial para ti</p>
            </div>
        </div>

        <div class="row">
            <?php foreach ($featured as $item): 
                if (strpos($item['imagen'], '../uploads/') === 0) {
                    $src = $item['imagen'];
                } else {
                    $src = '../img/' . $item['imagen'];
                }
            ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card producto-card h-100">
                        <img src="<?php echo htmlspecialchars($src); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['title']); ?>" onerror="this.onerror=null; this.src='../img/huawulli.jpg';">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-titu text-center"><?php echo htmlspecialchars($item['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($item['descripcion']); ?></p>
                            <div class="mt-auto text-center">
                                <span class="price"><?php echo htmlspecialchars($item['precio']); ?> Bs</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Carrusel AJUSTADO para tu Administrador -->
<?php
// Conexión exacta a tu base de datos
try {
    require_once '../config/database.php';

    // Consulta con tu category_id = 9
    $query = "SELECT * FROM posts WHERE category_id = 9 ORDER BY created_at DESC LIMIT 12";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Si no hay productos, usar productos de ejemplo que SÍ funcionan en tu página
    if (empty($productos)) {
        $productos = [
            [
                'title' => 'Grajeas',
                'content' => 'Deliciosas grajeas de chocolate que se derriten de calidad y sabor. 17.00 Bs',
                'image_path' => '11.jpg'
            ],
            [
                'title' => 'Chokoa',
                'content' => 'Exquisitos malvaviscos que se derriten en tu paladar. 40.00 Bs',
                'image_path' => '12.jpg'
            ],
            [
                'title' => 'Botitas Cowboy',
                'content' => 'Deliciosas bolitas de chocolate con un sabor misterioso. 10.00 Bs',
                'image_path' => '14.jpg'
            ],
            [
                'title' => 'Bombon Caja Cubo Licor',
                'content' => 'Un sabor único a cada sorbo. 61.00 Bs',
                'image_path' => '16.jpg'
            ],
            [
                'title' => 'Risoffiato sin gluten',
                'content' => 'Delicias en sus formas más saludables. 43.00 Bs',
                'image_path' => '18.jpg'
            ],
            [
                'title' => 'Micro Bombita Chocolate',
                'content' => 'Que cada parada sea una explosión de sabor. 20.00 Bs',
                'image_path' => '20.jpg'
            ],
            
        ];
    }

     // Procesar productos con mejor manejo de imágenes
    $imgDir     = realpath(__DIR__ . '/../img');      // carpeta física de imágenes
    $uploadsDir = realpath(__DIR__ . '/../uploads');  // carpeta alternativa
    $defaultImg = 'huawulli.jpg';

    foreach ($productos as &$producto) {
        // Extraer precio del contenido
        if (!empty($producto['content']) && preg_match('/(\d+(?:\.\d{2})?)\s*(?:Bs|Bolivianos)/i', $producto['content'], $matches)) {
            $producto['precio'] = number_format((float)$matches[1], 2);
            $producto['descripcion'] = trim(preg_replace('/\s*\d+(?:\.\d{2})?\s*(?:Bs|Bolivianos)\s*/i', '', $producto['content']));
        } else {
            $producto['precio'] = '0.00';
            $producto['descripcion'] = trim($producto['content'] ?? '');
        }

        if ($producto['descripcion'] === '') {
            $producto['descripcion'] = 'Delicioso producto de chocolate artesanal.';
        }

        // Resolver imagen: preferir ../img/<filename>, si existe usar solo el filename.
        // Si está en uploads, usar ruta relativa a uploads.
        $raw = trim((string)($producto['image_path'] ?? ''));

        $resolved = '';
        if ($raw !== '') {
            // normalizar nombre
            $candidate = basename(str_replace('\\', '/', $raw));

            // buscar en ../img/
            if ($imgDir && file_exists($imgDir . DIRECTORY_SEPARATOR . $candidate)) {
                $resolved = $candidate; // la plantilla usa ../img/<imagen>
            }
            // buscar en ../uploads/
            elseif ($uploadsDir && file_exists($uploadsDir . DIRECTORY_SEPARATOR . $candidate)) {
                $resolved = '../uploads/' . $candidate; // quedará ../img/../uploads/... si la plantilla antepone ../img/
            }
            // intentar ruta relativa desde la carpeta pública
            elseif (file_exists(__DIR__ . '/../' . $candidate)) {
                $resolved = $candidate;
            }
        }

        // fallback a imagen por defecto (debe existir en ../img/)
        if ($resolved === '') {
            $resolved = $defaultImg;
        }

        $producto['imagen'] = $resolved;
    }
    unset($producto);

    // Agrupar en slides de 3 productos
    $slides = array_chunk($productos, 3);
?>

    <section id="productos" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="seccion-titu">Nuestros Productos</h2>
                    <p class="seccion-subtitu">Chocolates de la más alta calidad y sabor</p>
                </div>
            </div>

            <div class="bootstrap-carousel">
                <div id="productosCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <!-- Indicadores dinámicos -->
                    <div class="carousel-indicators">
                        <?php foreach ($slides as $index => $slide): ?>
                            <button type="button"
                                data-bs-target="#productosCarousel"
                                data-bs-slide-to="<?php echo $index; ?>"
                                <?php echo $index === 0 ? 'class="active" aria-current="true"' : ''; ?>
                                aria-label="Slide <?php echo $index + 1; ?>">
                            </button>
                        <?php endforeach; ?>
                    </div>

                    <!-- Slides dinámicas -->
                    <div class="carousel-inner">
                        <?php foreach ($slides as $slideIndex => $slide): ?>
                            <div class="carousel-item <?php echo $slideIndex === 0 ? 'active' : ''; ?>">
                                <div class="row">
                                    <?php foreach ($slide as $producto): ?>
                                        <div class="col-md-6 col-lg-4 mb-3">
                                            <div class="card h-100">
                                                <!-- IMAGEN CON MANEJO MEJORADO -->
                                                <img src="../img/<?php echo htmlspecialchars($producto['imagen']); ?>"
                                                    class="card-img-top"
                                                    alt="<?php echo htmlspecialchars($producto['title']); ?>"
                                                    onerror="this.onerror=null; this.src='../img/huawulli.jpg';">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo htmlspecialchars($producto['title']); ?></h5>
                                                    <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                                                    <span class="price"><?php echo $producto['precio']; ?> Bs</span>
                                                    <div class="d-grid gap-2 d-md-flex">
                                                        <button class="btn btn-primary">Añadir al carrito</button>
                                                        <button class="btn btn-secondary">Ver más...</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#productosCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productosCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

<?php
} catch (Exception $e) {
    // Si hay error, mostrar mensaje pero seguir funcionando
    echo "<!-- Error: " . $e->getMessage() . " -->";
}
?>

<!-- Sección de Historia -->
<section id="historia" class="historia-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="historia-content">
                    <h2 class="historia-title">Nuestra Historia</h2>
                    <div class="historia-card">
                        <h3 class="historia-subtitle">Tradición y Pasión desde 1960</h3>
                        <p class="historia-text">
                            En la década de los 50´s se destacó en el arte de la Confitería y Chocolatería Aproximadamente en 1955, el Sr. Francisco Gonzales al retornar a Bolivia desarrolló su primer producto"mazapán" de almendra, pero al pasar los años con un capital escaso elaboró cigarritos, barritas de fruta, bollos y los traguitos. Formalmente con el nombre de ¨Cóndor¨. La empresa inició su actividad industrial el 22 de febrero de 1960, tras inscribir su empresa unipersonal.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Misión, Visión y Valores -->
<section id="mvv" class="mvv-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="seccion-titu" style="color: #29170F;">Misión, Visión y Valores</h2>
                <p class="seccion-subtitu" style="color: #29170F;">Los pilares que nos guían</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="mvv-card">
                    <div class="mvv-icon">🎯</div>
                    <h3 class="mvv-title">Misión</h3>
                    <p class="mvv-text">
                        Elaborar y comercializar productos a base de chocolate de la más alta calidad, utilizando exclusivamente cacao de producción nacional. Buscamos no solo ofrecer sabores excepcionales, sino también impulsar el crecimiento de nuestro país, apoyando a los productores locales y fortaleciendo la cadena productiva del cacao boliviano. Con cada producto, reafirmamos nuestro compromiso con la calidad, la identidad y el desarrollo nacional.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="mvv-card">
                    <div class="mvv-icon">🔭</div>
                    <h3 class="mvv-title">Visión</h3>
                    <p class="mvv-text">
                        Llegar a ser una empresa líder en el rubro chocolatero, reconocida a nivel nacional por la excelencia y autenticidad de nuestros productos, ofreciendo una amplia y deliciosa variedad de innovaciones que cautiven los sentidos y superen las expectativas de nuestros clientes. Aspiramos a crecer con identidad propia, manteniendo altos estándares de calidad, creatividad y compromiso, para que cada elaboración refleje dedicación, pasión y la esencia única de nuestra marca dentro del mundo del chocolate.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="mvv-card">
                    <div class="mvv-icon">💎</div>
                    <h3 class="mvv-title">Valores</h3>
                    <p class="mvv-text">
                        <strong>Calidad y durabilidad:</strong> usan materia prima de calidad reforzado con fibra de vidrio, lo que implica que la resistencia es un valor muy importante..<br><br>
                        <strong>Confianza:</strong> Al proyectarse como "si es Cóndor, es garantía".<br><br>
                        <strong>Innovación:</strong> Por su énfasis en "una historia de innovación" y el desarrollo de nuevas tecnologías para sus productos..<br><br>
                        <strong>Responsabilidad social:</strong>por sus proyectos con comunidades vulnerables (RSE).
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Apartado del Botón "¿Dónde Encontrarnos?" MEJORADO -->
<section id="ubicacion-section" class="ubicacion-section">
    <div class="container">
        <div class="ubicacion-content">
            <h2 class="ubicacion-title">¿Dónde Encontrarnos?</h2>
            <p class="ubicacion-subtitle">Te esperamos en nuestras sucursales para una experiencia única</p>

            <div class="btn-ubicacion-container">
                <a href="../public/sucursales.php" class="btn-ubicacion" id="btnUbicacion">
                    <span class="location-icon">📍</span>
                    <div class="text-content">
                        <span class="main-text">Nuestras Sucursales</span>
                        <span class="sub-text">¡Visítanos Hoy!</span>
                    </div>
                    <div class="click-effect"></div>
                </a>
            </div>

            <div class="ubicacion-info">
                <p>Encuentra la <span class="highlight">sucursal más cercana</span> a ti y vive la experiencia completa de nuestros chocolates de calidad</p>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Servicios -->
<section id="servicios" class="servicios-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="seccion-titu" style="color: #29170F;">Nuestros Servicios</h2>
                <p class="seccion-subtitu" style="color: #666;">Calidad y experiencia en cada servicio</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="servicio-card">
                    <div class="servicio-icon">🍫</div>
                    <h3 class="servicio-title">Pedidos</h3>
                    <p class="servicio-description">
                        Se pueden realizar pedidos telefónicos al número de celular 76252160 para la línea de Risoffiato.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="servicio-card">
                    <div class="servicio-icon">🏪</div>
                    <h3 class="servicio-title">Venta de Agencias</h3>
                    <p class="servicio-description">
                        A través de la venta de sus productos en sus agencias ubicadas en La Paz.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="servicio-card">
                    <div class="servicio-icon">🚚</div>
                    <h3 class="servicio-title">Curbside pickup</h3>
                    <p class="servicio-description">
                        Servicio minorista en el que los clientes piden en línea y recogen sus compras sin salir de su vehículo.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Alerta de música -->
<div class="music-alert" id="musicAlert">
    ¡Haz clic para activar la música de fondo!
</div>

<!-- Botón de activación de música -->
<button class="music-activate" id="musicActivate">
    <i class="fas fa-music"></i>
</button>

<!-- Reproductor de Música (inicialmente oculto) -->
<div class="music-player" id="musicPlayer">
    <div class="music-controls">
        <button class="play-btn" id="playBtn">
            <i class="fas fa-play" id="playIcon"></i>
        </button>
        <div class="volume-container">
            <i class="fas fa-volume-up volume-icon"></i>
            <input type="range" class="volume-slider" id="volumeSlider" min="0" max="100" value="30">
        </div>
    </div>
    <div class="music-info">Música de fondo</div>
    <div class="music-status" id="musicStatus">Listo para reproducir</div>
</div>

<!-- Audio element -->
<audio id="backgroundMusic" loop preload="auto">
    <source src="../public/audio/Michael Jackson  Billie Jean [Instrumental Version].mp3" type="audio/mpeg">
</audio>

<script>
// Funcionalidad del boton sucursal "
document.addEventListener('DOMContentLoaded', function() {
    const btnUbicacion = document.getElementById('btnUbicacion');

    btnUbicacion.addEventListener('click', function(e) {
        e.preventDefault();

        // Efecto de clic con animación
        this.classList.add('clicked');

        // Efecto visual temporal
        const icon = this.querySelector('.location-icon');
        const mainText = this.querySelector('.main-text');
        const subText = this.querySelector('.sub-text');

        // Guardar textos originales
        const originalMainText = mainText.textContent;
        const originalSubText = subText.textContent;
        const originalIcon = icon.textContent;

        // Cambiar textos temporalmente
        mainText.textContent = '¡Cargando...';
        subText.textContent = 'Redirigiendo';
        icon.textContent = '⏳';

        // Añadir clase de destacado
        this.classList.add('highlighted');

        // Redirigir después de la animación
        setTimeout(() => {
            window.location.href = '../public/sucursales.php';
        }, 800);

        // Restaurar después de un tiempo (en caso de que la redirección falle)
        setTimeout(() => {
            mainText.textContent = originalMainText;
            subText.textContent = originalSubText;
            icon.textContent = originalIcon;
            this.classList.remove('highlighted', 'clicked');
        }, 2000);
    });

    // Efecto hover mejorado
    btnUbicacion.addEventListener('mouseenter', function() {
        // Efecto de partículas o brillos
        this.style.filter = 'brightness(1.1)';
    });

    btnUbicacion.addEventListener('mouseleave', function() {
        this.style.filter = 'brightness(1)';
    });

    // Funcionalidad de botones del carrusel
    document.querySelectorAll('.btn-primary').forEach(btn => {
        if (btn.textContent.includes('Añadir al carrito')) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Producto añadido al carrito');
                const originalText = this.textContent;
                this.style.background = '#fa9c71';
                this.textContent = '¡Añadido!';
                setTimeout(() => {
                    this.style.background = '';
                    this.textContent = originalText;
                }, 1500);
            });
        }
    });

    // Agregar eventos a botones de "Ver más"
    document.querySelectorAll('.btn-secondary').forEach(btn => {
        if (btn.textContent.includes('Ver más')) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Ver más detalles del producto');
            });
        }
    });

    // ===== REPRODUCTOR DE MÚSICA =====
    // Variables del reproductor
    const playBtn = document.getElementById('playBtn');
    const playIcon = document.getElementById('playIcon');
    const volumeSlider = document.getElementById('volumeSlider');
    const musicPlayer = document.getElementById('musicPlayer');
    const musicActivate = document.getElementById('musicActivate');
    const musicAlert = document.getElementById('musicAlert');
    const musicStatus = document.getElementById('musicStatus');
    const backgroundMusic = document.getElementById('backgroundMusic');
    
    let isPlaying = false;
    let isInitialized = false;
    
    // Inicializar volumen
    backgroundMusic.volume = volumeSlider.value / 100;
    
    // Función para mostrar alerta
    function showAlert(message, duration = 3000) {
        musicAlert.textContent = message;
        musicAlert.classList.add('show');
        setTimeout(() => {
            musicAlert.classList.remove('show');
        }, duration);
    }
    
    // Función para inicializar el reproductor
    function initializePlayer() {
        if (!isInitialized) {
            musicPlayer.classList.add('show');
            musicActivate.classList.add('hidden');
            isInitialized = true;
            showAlert('¡Reproductor activado! Haz clic en play para escuchar música.');
        }
    }
    
    // Función para reproducir/pausar
    function togglePlay() {
        if (!isInitialized) {
            initializePlayer();
        }
        
        if (isPlaying) {
            backgroundMusic.pause();
            playIcon.className = 'fas fa-play';
            isPlaying = false;
            musicStatus.textContent = 'Pausado';
        } else {
            backgroundMusic.play().then(() => {
                playIcon.className = 'fas fa-pause';
                isPlaying = true;
                musicStatus.textContent = 'Reproduciendo';
            }).catch(error => {
                console.log('Error al reproducir:', error);
                showAlert('No se pudo reproducir la música. Verifica el archivo de audio.');
                musicStatus.textContent = 'Error al reproducir';
            });
        }
    }
    
    // Función para ajustar volumen
    function adjustVolume() {
        backgroundMusic.volume = volumeSlider.value / 100;
    }
    
    // Función para mostrar reproductor
    function showPlayer() {
        if (!isInitialized) {
            initializePlayer();
        } else {
            musicPlayer.classList.add('show');
            musicActivate.classList.add('hidden');
        }
    }
    
    // Event listeners
    playBtn.addEventListener('click', togglePlay);
    volumeSlider.addEventListener('input', adjustVolume);
    musicActivate.addEventListener('click', showPlayer);
    
    // Auto-ocultar después de unos segundos si no se usa
    let hideTimeout;
    
    function resetHideTimer() {
        if (isInitialized && isPlaying) {
            clearTimeout(hideTimeout);
            musicPlayer.classList.add('show');
            
            hideTimeout = setTimeout(() => {
                if (isPlaying) {
                    musicPlayer.classList.remove('show');
                    musicActivate.classList.remove('hidden');
                }
            }, 8000); // Ocultar después de 8 segundos
        }
    }
    
    // Reset timer on user interaction
    ['mouseenter', 'mousemove', 'click', 'touchstart'].forEach(event => {
        musicPlayer.addEventListener(event, resetHideTimer);
    });
    
    // Manejar errores de audio
    backgroundMusic.addEventListener('error', function(e) {
        console.log('Error al cargar el archivo de música:', e);
        musicStatus.textContent = 'Error al cargar música';
        showAlert('No se pudo cargar el archivo de música. Verifica la ruta del archivo.');
    });
    
    // Manejar cuando el audio termina
    backgroundMusic.addEventListener('ended', function() {
        playIcon.className = 'fas fa-play';
        isPlaying = false;
        musicStatus.textContent = 'Reproducción terminada';
    });
    
    // Manejar cuando el audio se puede reproducir
    backgroundMusic.addEventListener('canplaythrough', function() {
        musicStatus.textContent = 'Listo para reproducir';
    });
    
    // Limpiar al salir
    window.addEventListener('beforeunload', function() {
        clearTimeout(hideTimeout);
        if (isPlaying) {
            backgroundMusic.pause();
        }
    });
    
    // Mostrar alerta inicial después de 2 segundos
    setTimeout(() => {
        if (!isInitialized) {
            showAlert('¡Haz clic en el botón musical para activar la música de fondo!', 4000);
        }
    }, 2000);
});
</script>
<?php include '../layouts/footer.php'; ?>