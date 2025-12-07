<?php
 include '../layouts/header.php';
ob_start();
include '../config/database.php'; // Conexión con tu administrador

// CONFIGURACIÓN PARA PRODUCTOS
$category_id = 2; // CAMBIAR POR EL ID REAL DE TU CATEGORÍA "PRODUCTOS"

// Consultar productos desde tu administrador
try {
    $sql = "SELECT posts.post_id, posts.title, posts.content, posts.image_path, categories.category_name, categories.category_id 
                          FROM posts
                          JOIN categories ON posts.category_id = categories.category_id
                          WHERE posts.category_id = :category_id
                          ORDER BY posts.created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['category_id' => $category_id]);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        
} catch (PDOException $e) {
    echo "Error al obtener productos: " . $e->getMessage();
    $productos = [];
}
?>

<style>
    :root{
        --bg: #e9882d;
        --card-bg: #2b150f;
        --accent: #d88b9b;
        --highlight: #f9c255;
        --text-light: #ffffff;
        --muted: rgba(255,255,255,0.85);
        --radius: 18px;
    }

    *{ box-sizing: border-box; margin:0; padding:0; }

    body {
        font-family: "Montserrat", Arial, sans-serif;
        background-color: var(--bg);
        color: var(--text-light);
        -webkit-font-smoothing:antialiased;
        -moz-osx-font-smoothing:grayscale;
    }

    .header-separation { height: 18px; } /* separación visual entre header y contenido */

    .productos-main {
        padding: 30px 20px 60px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .productos-section { padding-top: 100px; }

    .heading {
        text-align: center;
        font-size: 2rem;
        letter-spacing: 1px;
        padding: 18px 0;
        color: var(--text-light);
    }

    .gallery-image{
        display:flex;
        flex-wrap:wrap;
        gap:28px;
        justify-content:center;
        align-items:flex-start;
        padding: 10px 10px 40px;
    }

    .producto-card{
        width: 340px;
        background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(0,0,0,0.06)), var(--card-bg);
        border: 4px solid var(--accent);
        border-radius: var(--radius);
        padding: 18px;
        text-align:center;
        color: var(--text-light);
        transition: transform .28s ease, box-shadow .28s ease;
        display:flex;
        flex-direction:column;
        align-items:center;
    }

    .producto-card:hover{
        transform: translateY(-6px);
        box-shadow: 0 18px 38px rgba(0,0,0,0.25);
    }

    .img-box{ width:100%; border-radius:12px; overflow:hidden; display:flex; justify-content:center; align-items:center; }
    .producto-img{ width:100%; height:240px; background:#f2f2f2; display:flex; align-items:center; justify-content:center; border-radius:12px; overflow:hidden; }
    .producto-img img{ width:100%; height:100%; object-fit:cover; display:block; transition: transform .45s ease; }
    .img-box:hover img{ transform: scale(1.06); }

    .producto-nombre{ font-size:1.15rem; margin:14px 0 6px; font-weight:700; color:var(--text-light); text-align:center; }
    .producto-precio{ font-size:1rem; margin-bottom:12px; color:var(--highlight); font-weight:700; }

    .producto-actions{ display:flex; gap:12px; width:100%; margin-top:auto; justify-content:center; align-items:center; }
    .btn-carrito, .btn-vermas{
        flex:1;
        padding:10px 12px;
        border-radius:12px;
        border:none;
        cursor:pointer;
        font-weight:700;
        transition: transform .18s ease, box-shadow .18s ease;
    }

    .btn-carrito{
        background: linear-gradient(135deg,var(--highlight), #ffd26b);
        color:#000;
    }
    .btn-carrito:hover{ transform: translateY(-3px); box-shadow: 0 10px 22px rgba(0,0,0,0.18); }

    .btn-vermas{
        background: var(--accent);
        color: var(--text-light);
    }
    .btn-vermas:hover{ transform: translateY(-3px); box-shadow: 0 10px 22px rgba(0,0,0,0.12); }

    .mensaje-sin-productos{
        text-align:center;
        color:var(--text-light);
        padding: 40px;
        background: rgba(43,21,15,0.08);
        border-radius:12px;
        margin: 20px auto;
        max-width:800px;
    }

    /* ===== REPRODUCTOR DE MÚSICA ADAPTADO PARA PRODUCTOS ===== */
    .music-player {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: linear-gradient(135deg, var(--accent), var(--highlight));
        border-radius: 25px;
        padding: 15px;
        box-shadow: 0 8px 25px rgba(216, 139, 155, 0.4);
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
        box-shadow: 0 12px 35px rgba(216, 139, 155, 0.6);
    }

    .music-controls {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .play-btn {
        background: #ffffff;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: var(--card-bg);
        font-size: 16px;
    }

    .play-btn:hover {
        transform: scale(1.1);
        background: var(--card-bg);
        color: #ffffff;
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
        color: #ffffff;
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
        background: #ffffff;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .volume-slider::-webkit-slider-thumb:hover {
        transform: scale(1.2);
        background: var(--card-bg);
    }

    .volume-slider::-moz-range-thumb {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #ffffff;
        cursor: pointer;
        border: none;
        transition: all 0.3s ease;
    }

    .volume-slider::-moz-range-thumb:hover {
        transform: scale(1.2);
        background: var(--card-bg);
    }

    .music-info {
        color: #ffffff;
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
        background: linear-gradient(135deg, var(--accent), var(--highlight));
        border: none;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #ffffff;
        font-size: 20px;
        z-index: 1001;
        box-shadow: 0 8px 25px rgba(216, 139, 155, 0.4);
        animation: pulse 2s infinite;
    }

    .music-activate:hover {
        transform: scale(1.1);
        box-shadow: 0 12px 35px rgba(216, 139, 155, 0.6);
        animation: none;
    }

    @keyframes pulse {
        0% { box-shadow: 0 8px 25px rgba(216, 139, 155, 0.4); }
        50% { box-shadow: 0 8px 25px rgba(216, 139, 155, 0.8); }
        100% { box-shadow: 0 8px 25px rgba(216, 139, 155, 0.4); }
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
        background: linear-gradient(135deg, var(--accent), var(--highlight));
        color: #ffffff;
        padding: 15px 25px;
        border-radius: 25px;
        z-index: 1002;
        box-shadow: 0 8px 25px rgba(216, 139, 155, 0.4);
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

    /* Responsive */
    @media (max-width: 980px){
        .producto-card{ width: 48%; }
        
        .music-player {
            min-width: 180px;
            bottom: 15px;
            right: 15px;
        }
        
        .music-activate {
            bottom: 15px;
            right: 15px;
            width: 50px;
            height: 50px;
            font-size: 18px;
        }
    }
    @media (max-width: 680px){
        .producto-card{ width: 92%; }
        .producto-img{ height:200px; }
        .gallery-image{ gap:18px; }
        
        .music-player {
            min-width: 160px;
            padding: 12px;
        }
        
        .play-btn {
            width: 35px;
            height: 35px;
            font-size: 14px;
        }
        
        .volume-slider {
            max-width: 60px;
        }
        
        .music-activate {
            width: 45px;
            height: 45px;
            font-size: 16px;
        }
    }
</style>

<!-- ESPACIADO ADICIONAL PARA SEPARAR DEL HEADER -->
<div class="header-separation"></div>

<!-- CONTENEDOR PRINCIPAL DE PRODUCTOS -->
<div class="productos-main">
    <div class="productos-section">
        <div class="gallery-image">

        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <?php
                // Manejar imagen
                $imagePath = $producto['image_path'] ?? '';
                if ($imagePath === '') {
                    $fullImagePath = '../img/huawulli.jpg';
                } elseif (strpos($imagePath, '../') === 0 || strpos($imagePath, '/') === 0) {
                    $fullImagePath = $imagePath;
                } elseif (file_exists(__DIR__ . '/../public/posts/' . $imagePath)) {
                    $fullImagePath = '../public/posts/' . $imagePath;
                } elseif (file_exists(__DIR__ . '/../img/' . $imagePath)) {
                    $fullImagePath = '../img/' . $imagePath;
                } else {
                    $fullImagePath = '../img/huawulli.jpg';
                }

                // Extraer precio del contenido
                $content = $producto['content'] ?? '';
                $precioTexto = $content;
                if (preg_match('/(\d+(?:\.\d{2})?)\s*Bs/i', $content, $matches)) {
                    $precioTexto = number_format(floatval($matches[1]), 2) . " Bs. Uni.";
                }
                ?>
            
                <div class="producto-card">
                    <div class="img-box">
                        <div class="producto-img">
                            <img src="<?php echo htmlspecialchars($fullImagePath); ?>" alt="<?php echo htmlspecialchars($producto['title']); ?>" onerror="this.src='../img/huawulli.jpg'">
                        </div>
                    </div>

                    <h3 class="producto-nombre"><?php echo htmlspecialchars($producto['title']); ?></h3>
                    <p class="producto-precio"><?php echo $precioTexto; ?></p>

                    <div class="producto-actions">
                        <button class="btn-carrito" data-id="<?php echo $producto['post_id']; ?>" data-title="<?php echo htmlspecialchars($producto['title']); ?>" data-price="<?php echo preg_match('/(\d+(?:\.\d{2})?)/', $precioTexto, $m) ? $m[1] : '0'; ?>" data-image="<?php echo htmlspecialchars(basename($imagePath)); ?>">
                            Añadir al carrito
                        </button>
                        <button class="btn-vermas" onclick="location.href='producto_detalle.php?id=<?php echo $producto['post_id']; ?>'">Ver Más...</button>
                    </div>
                </div>
                
            <?php endforeach; ?>
        <?php else: ?>
            <div class="mensaje-sin-productos">
                <h3>No hay productos disponibles</h3>
                <p>Por ahora no hay productos en esta categoría. Puedes revisar el administrador o volver más tarde.</p>
            </div>
        <?php endif; ?>
            
        </div>
    </div>
</div>

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

<!-- Audio element (con múltiples opciones) -->
<audio id="backgroundMusic" loop preload="auto">
    <!-- Música de prueba gratuita (puedes cambiar esta URL) -->
    <source src="../public/audio/Laufey - Lover Girl (Official Instrumental).mp3" type="audio/mpeg">
</audio>

<script>
/* Manejo simple en cliente para enviar al carrito vía POST (uso de fetch para no recargar) */
document.addEventListener('click', function(e){
    if(e.target && e.target.matches('.btn-carrito')){
        const btn = e.target;
        const id = btn.dataset.id || 0;
        const title = btn.dataset.title || 'Producto';
        const price = btn.dataset.price || 0;
        const image = btn.dataset.image || 'huawulli.jpg';
        const payload = new FormData();
        payload.append('action','agregar');
        payload.append('producto_id', id);
        payload.append('titulo', title);
        payload.append('precio', price);
        payload.append('imagen', image);
        payload.append('cantidad', 1);

        fetch('carrito.php', { method: 'POST', body: payload, credentials: 'same-origin' })
            .then(res => {
                // redirigir al carrito para confirmar (opcional)
                window.location.href = 'carrito.php';
            })
            .catch(err => {
                console.error('Error agregando al carrito', err);
                alert('No se pudo agregar al carrito. Intenta de nuevo.');
            });
    }
});

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
</script>

<?php include '../layouts/footer.php'; ?>