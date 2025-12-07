<?php

// carrito.php - guardar productos en sesión y calcular totales
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* -----------------------
   Procesamiento POST
   ----------------------- */
if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'agregar') {
        $id = intval($_POST['producto_id'] ?? 0);
        $titulo = trim($_POST['titulo'] ?? 'Producto');
        $precio = floatval(str_replace(',', '.', ($_POST['precio'] ?? 0)));
        $cantidad = max(1, intval($_POST['cantidad'] ?? 1));
        $imagen = trim($_POST['imagen'] ?? 'huawulli.jpg');

        if ($id > 0 && $precio > 0) {
            $found = false;
            foreach ($_SESSION['carrito'] as &$it) {
                if ($it['id'] === $id) {
                    $it['cantidad'] += $cantidad;
                    $found = true;
                    break;
                }
            }
            unset($it);
            if (!$found) {
                $_SESSION['carrito'][] = [
                    'id'       => $id,
                    'titulo'   => $titulo,
                    'precio'   => $precio,
                    'cantidad' => $cantidad,
                    'imagen'   => $imagen
                ];
            }
        }
    } elseif ($action === 'actualizar') {
        $id = intval($_POST['producto_id'] ?? 0);
        $cantidad = max(1, intval($_POST['cantidad'] ?? 1));
        foreach ($_SESSION['carrito'] as &$it) {
            if ($it['id'] === $id) {
                $it['cantidad'] = $cantidad;
                break;
            }
        }
        unset($it);
    } elseif ($action === 'eliminar') {
        $id = intval($_POST['producto_id'] ?? 0);
        $_SESSION['carrito'] = array_values(array_filter($_SESSION['carrito'], function($it) use ($id) {
            return $it['id'] !== $id;
        }));
    }

    $isAjax = (
        !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
    ) || (strpos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') !== false);

    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['ok' => true, 'count' => count($_SESSION['carrito'])]);
        exit;
    } else {
        header('Location: carrito.php');
        exit;
    }
}

/* -----------------------
   Mostrar página (GET)
   ----------------------- */
include '../layouts/header.php';
ob_start();

$items = $_SESSION['carrito'] ?? [];
$subtotal = 0.0;
foreach ($items as $it) {
    $subtotal += ($it['precio'] * $it['cantidad']);
}
$impuesto = $subtotal * 0.03;
$total = $subtotal + $impuesto;
?>

<style>
:root{
    --bg: #f6e9e9;
    --card: #ffffff;
    --accent: #ffadb4;
    --accent-2: #ffd26b;
    --dark: #29170F;
    --muted: #6b6b6b;
    --radius: 14px;
    --glass: rgba(255,255,255,0.85);
    --shadow: 0 12px 30px rgba(0,0,0,0.06);
    --container-w: 1100px;
}

.carrito-page{
    max-width: var(--container-w);
    margin: 90px auto 60px;
    padding: 22px;
    font-family: "Montserrat", Arial, sans-serif;
    color: var(--dark);
    background: linear-gradient(180deg, var(--bg), #fff);
}

/* Grid central */
.carrito-grid{
    display: grid;
    grid-template-columns: 1fr 360px;
    gap: 30px;
    align-items: start;
}
@media (max-width: 900px){
    .carrito-grid{ grid-template-columns: 1fr; padding: 0 12px; }
}

/* Lista de items (centro estético) */
.carrito-list{
    background: var(--glass);
    border-radius: var(--radius);
    padding: 18px;
    box-shadow: var(--shadow);
    display:flex;
    flex-direction:column;
    gap:8px;
}

/* Item */
.carrito-item{
    display:flex;
    gap:16px;
    align-items:center;
    padding:12px 10px;
    border-radius:10px;
    background: linear-gradient(180deg, rgba(255,255,255,0.7), rgba(255,255,255,0.6));
    transition: transform .18s ease, box-shadow .18s ease;
}
.carrito-item:hover{
    transform: translateY(-4px);
    box-shadow: 0 14px 30px rgba(0,0,0,0.06);
}

.item-img{
    width:100px;
    height:100px;
    border-radius:10px;
    overflow:hidden;
    flex:0 0 100px;
    background:#f3f3f3;
}
.item-img img{ width:100%; height:100%; object-fit:cover; display:block; }

/* Meta y controles centrados verticalmente */
.item-meta{ flex:1; }
.item-meta h4{ margin:0 0 6px; font-size:1rem; color:var(--dark); }
.item-meta .unit{ color:var(--muted); font-size:0.95rem; }

/* Controles alineados a la derecha, pero visualmente centrados */
.item-controls{
    display:flex;
    flex-direction:column;
    gap:8px;
    align-items:flex-end;
    justify-content:center;
}

/* Cantidad: compacta y accesible */
.qty-form{ display:flex; gap:6px; align-items:center; }
.qty-form input[type="number"]{
    width:72px;
    padding:6px 8px;
    border-radius:8px;
    border:1px solid #e6e6e6;
    text-align:center;
}

/* Botones coherentes con tema */
.btn{
    padding:8px 12px;
    border-radius:10px;
    border:none;
    cursor:pointer;
    font-weight:700;
    font-size:0.9rem;
}
.btn-primary{
    background: linear-gradient(135deg, var(--accent), var(--accent-2));
    color: var(--dark);
}
.btn-ghost{
    background: transparent;
    color: var(--muted);
    border:1px solid rgba(0,0,0,0.04);
}

/* Total por línea */
.item-total{
    font-weight:800;
    color:var(--dark);
    min-width:95px;
    text-align:right;
}

/* Resumen (lado derecho) */
.summary{
    position: sticky;
    top: 100px;
    background: var(--card);
    padding: 20px;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    color: var(--dark);
}
.summary h3{ margin-top:0; }
.summary .row{ display:flex; justify-content:space-between; margin:10px 0; color:var(--muted); }
.summary .row.total{ font-weight:800; color:var(--dark); border-top:1px solid rgba(0,0,0,0.04); padding-top:12px; }

/* Estado vacío centrado */
.empty-state{
    text-align:center;
    padding:38px;
    background: linear-gradient(180deg, rgba(255,173,180,0.06), transparent);
    border-radius: var(--radius);
    color:var(--muted);
}

/* Ajustes móviles */
@media (max-width:520px){
    .item-img{ width:72px; height:72px; flex:0 0 72px; }
    .item-total{ min-width:85px; font-size:0.95rem; }
    .qty-form input[type="number"]{ width:56px; }
}

/* ===== REPRODUCTOR DE MÚSICA ELEGANTE PARA CARRITO ===== */
.music-player {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: linear-gradient(135deg, var(--accent), var(--accent-2));
    border-radius: 25px;
    padding: 15px;
    box-shadow: 0 8px 25px rgba(255, 173, 180, 0.4);
    z-index: 1000;
    transition: all 0.3s ease;
    min-width: 200px;
    opacity: 0;
    transform: translateY(100px);
    pointer-events: none;
    backdrop-filter: blur(10px);
}

.music-player.show {
    opacity: 1;
    transform: translateY(0);
    pointer-events: all;
}

.music-player:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 35px rgba(255, 173, 180, 0.6);
}

.music-controls {
    display: flex;
    align-items: center;
    gap: 12px;
}

.play-btn {
    background: rgba(255, 255, 255, 0.9);
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: var(--dark);
    font-size: 16px;
    backdrop-filter: blur(5px);
}

.play-btn:hover {
    transform: scale(1.1);
    background: var(--dark);
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
    color: var(--dark);
    font-size: 14px;
    width: 16px;
}

.volume-slider {
    -webkit-appearance: none;
    appearance: none;
    height: 4px;
    border-radius: 2px;
    background: rgba(41, 23, 15, 0.2);
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
    background: var(--dark);
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.volume-slider::-webkit-slider-thumb:hover {
    transform: scale(1.2);
    background: #ffffff;
}

.volume-slider::-moz-range-thumb {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: var(--dark);
    cursor: pointer;
    border: none;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.volume-slider::-moz-range-thumb:hover {
    transform: scale(1.2);
    background: #ffffff;
}

.music-info {
    color: var(--dark);
    font-size: 12px;
    margin-top: 8px;
    text-align: center;
    opacity: 0.9;
    font-weight: 500;
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
    background: linear-gradient(135deg, var(--accent), var(--accent-2));
    border: none;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: var(--dark);
    font-size: 20px;
    z-index: 1001;
    box-shadow: 0 8px 25px rgba(255, 173, 180, 0.4);
    animation: pulse 2s infinite;
    backdrop-filter: blur(10px);
}

.music-activate:hover {
    transform: scale(1.1);
    box-shadow: 0 12px 35px rgba(255, 173, 180, 0.6);
    animation: none;
}

@keyframes pulse {
    0% { box-shadow: 0 8px 25px rgba(255, 173, 180, 0.4); }
    50% { box-shadow: 0 8px 25px rgba(255, 173, 180, 0.8); }
    100% { box-shadow: 0 8px 25px rgba(255, 173, 180, 0.4); }
}

.music-activate.hidden {
    opacity: 0;
    pointer-events: none;
}

/* Estilos para alertas elegantes */
.music-alert {
    position: fixed;
    top: 100px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(135deg, var(--accent), var(--accent-2));
    color: var(--dark);
    padding: 15px 25px;
    border-radius: 25px;
    z-index: 1002;
    box-shadow: 0 8px 25px rgba(255, 173, 180, 0.4);
    font-size: 14px;
    font-weight: 500;
    opacity: 0;
    transition: all 0.3s ease;
    pointer-events: none;
    backdrop-filter: blur(10px);
}

.music-alert.show {
    opacity: 1;
    transform: translateX(-50%) translateY(0);
}

/* Responsive para el reproductor */
@media (max-width: 900px) {
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

@media (max-width: 520px) {
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

<div class="carrito-page">
    <h1>Mi Carrito</h1>

    <?php if (empty($items)): ?>
        <div class="empty-state">
            <p><strong>Tu carrito está vacío</strong></p>
            <p>Añade productos desde la tienda para verlos aquí.</p>
            <p style="margin-top:12px;"><a href="../public/productos.php" class="btn btn-primary">Seguir comprando</a></p>
        </div>
    <?php else: ?>
        <div class="carrito-grid">
            <div class="carrito-list">
                <?php foreach ($items as $item):
                    $lineTotal = $item['precio'] * $item['cantidad'];
                    $imgUrl = (strpos($item['imagen'], '../uploads/') === 0) ? htmlspecialchars($item['imagen']) : '../img/' . htmlspecialchars($item['imagen']);
                ?>
                    <div class="carrito-item">
                        <div class="item-img">
                            <img src="<?php echo $imgUrl; ?>" alt="<?php echo htmlspecialchars($item['titulo']); ?>" onerror="this.src='../img/huawulli.jpg'">
                        </div>

                        <div class="item-meta">
                            <h4><?php echo htmlspecialchars($item['titulo']); ?></h4>
                            <div class="unit"><?php echo number_format($item['precio'], 2); ?> Bs / unidad</div>
                        </div>

                        <div class="item-controls">
                            <form method="POST" class="qty-form">
                                <input type="hidden" name="action" value="actualizar">
                                <input type="hidden" name="producto_id" value="<?php echo (int)$item['id']; ?>">
                                <input type="number" name="cantidad" value="<?php echo (int)$item['cantidad']; ?>" min="1" aria-label="cantidad">
                                <button type="submit" class="btn btn-primary">OK</button>
                            </form>

                            <form method="POST" style="margin:0;">
                                <input type="hidden" name="action" value="eliminar">
                                <input type="hidden" name="producto_id" value="<?php echo (int)$item['id']; ?>">
                                <button type="submit" class="btn btn-ghost">Eliminar</button>
                            </form>
                        </div>

                        <div class="item-total">
                            <?php echo number_format($lineTotal, 2); ?> Bs
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <aside class="summary">
                <h3>Resumen de compra</h3>
                <div class="row"><span>Subtotal</span><strong><?php echo number_format($subtotal, 2); ?> Bs</strong></div>
                <div class="row"><span>IVA (03%)</span><strong><?php echo number_format($impuesto, 2); ?> Bs</strong></div>
                <div class="row total"><span>Total</span><strong><?php echo number_format($total, 2); ?> Bs</strong></div>

                <div style="margin-top:14px;">
                    <button class="btn btn-primary" style="width:100%;" onclick="alert('Implementar proceso de pago');">Proceder al pago</button>
                </div>

                <div style="text-align:center;margin-top:12px;">
                    <a href="../public/productos.php" class="btn btn-ghost" style="padding:8px 14px;">Seguir comprando</a>
                </div>
            </aside>
        </div>
    <?php endif; ?>
</div>

<!-- Alerta de música elegante -->
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
    <!-- Reemplaza con tu archivo de música -->
    <source src="../public/audio/The Walking Dead Game OST-09 honest.mp3" type="audio/mpeg">
</audio>

<script>
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

<?php
// carrito.php - guardar productos en sesión y calcular totales
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* -----------------------
   Procesamiento POST
   ----------------------- */
if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'agregar') {
        $id = intval($_POST['producto_id'] ?? 0);
        $titulo = trim($_POST['titulo'] ?? 'Producto');
        $precio = floatval(str_replace(',', '.', ($_POST['precio'] ?? 0)));
        $cantidad = max(1, intval($_POST['cantidad'] ?? 1));
        $imagen = trim($_POST['imagen'] ?? 'huawulli.jpg');

        if ($id > 0 && $precio > 0) {
            $found = false;
            foreach ($_SESSION['carrito'] as &$it) {
                if ($it['id'] === $id) {
                    $it['cantidad'] += $cantidad;
                    $found = true;
                    break;
                }
            }
            unset($it);
            if (!$found) {
                $_SESSION['carrito'][] = [
                    'id'       => $id,
                    'titulo'   => $titulo,
                    'precio'   => $precio,
                    'cantidad' => $cantidad,
                    'imagen'   => $imagen
                ];
            }
        }
    } elseif ($action === 'actualizar') {
        $id = intval($_POST['producto_id'] ?? 0);
        $cantidad = max(1, intval($_POST['cantidad'] ?? 1));
        foreach ($_SESSION['carrito'] as &$it) {
            if ($it['id'] === $id) {
                $it['cantidad'] = $cantidad;
                break;
            }
        }
        unset($it);
    } elseif ($action === 'eliminar') {
        $id = intval($_POST['producto_id'] ?? 0);
        $_SESSION['carrito'] = array_values(array_filter($_SESSION['carrito'], function($it) use ($id) {
            return $it['id'] !== $id;
        }));
    }

    $isAjax = (
        !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
    ) || (strpos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') !== false);

    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['ok' => true, 'count' => count($_SESSION['carrito'])]);
        exit;
    } else {
        header('Location: carrito.php');
        exit;
    }
}

/* -----------------------
   Mostrar página (GET)
   ----------------------- */
include '../layouts/header.php';
ob_start();

$items = $_SESSION['carrito'] ?? [];
$subtotal = 0.0;
foreach ($items as $it) {
    $subtotal += ($it['precio'] * $it['cantidad']);
}
$impuesto = $subtotal * 0.03;
$total = $subtotal + $impuesto;
?>

<style>
:root{
    --bg: #f6e9e9;
    --card: #fff;
    --accent: #ffadb4;
    --dark: #29170F;
    --muted: #6b6b6b;
    --radius: 14px;
}

.carrito-page {
    max-width: 1200px;
    margin: 100px auto 60px;
    padding: 20px;
    font-family: "Montserrat", Arial, sans-serif;
    color: var(--dark);
}

.carrito-grid {
    display: grid;
    grid-template-columns: 1fr 360px;
    gap: 28px;
    align-items: start;
}

@media (max-width: 900px) {
    .carrito-grid { grid-template-columns: 1fr; }
}

.carrito-list {
    background: linear-gradient(180deg, rgba(255,255,255,0.95), rgba(255,255,255,0.9));
    border-radius: var(--radius);
    padding: 18px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.06);
}

.carrito-item {
    display:flex;
    gap:16px;
    align-items:center;
    padding:14px 8px;
    border-bottom:1px dashed rgba(0,0,0,0.06);
}

.carrito-item:last-child { border-bottom: none; }

.item-img {
    width:100px;
    height:100px;
    border-radius:10px;
    overflow:hidden;
    flex: 0 0 100px;
    background:#f3f3f3;
}
.item-img img { width:100%; height:100%; object-fit:cover; display:block; }

.item-meta { flex:1; }
.item-meta h4 { margin:0 0 6px; font-size:1rem; color:var(--dark); }
.item-meta .unit { color:var(--muted); font-size:0.95rem; }

.item-controls {
    display:flex;
    flex-direction:column;
    gap:8px;
    align-items:flex-end;
}

.qty-form { display:flex; gap:6px; align-items:center; }
.qty-form input[type="number"] {
    width:68px;
    padding:6px 8px;
    border-radius:8px;
    border:1px solid #e6e6e6;
    text-align:center;
}

.btn {
    padding:8px 12px;
    border-radius:10px;
    border: none;
    cursor: pointer;
    font-weight:700;
    font-size:0.9rem;
}

.btn-primary {
    background: linear-gradient(135deg,var(--accent), #ffd26b);
    color: var(--dark);
}

.btn-ghost {
    background: transparent;
    color: var(--muted);
    border: 1px solid rgba(0,0,0,0.04);
}

.item-total {
    font-weight:800;
    color:var(--dark);
    min-width:95px;
    text-align:right;
}

/* Resumen */
.summary {
    position: sticky;
    top: 100px;
    background: var(--card);
    padding: 20px;
    border-radius: var(--radius);
    box-shadow: 0 12px 30px rgba(0,0,0,0.06);
    color: var(--dark);
}

.summary h3 { margin-top:0; }
.summary .row { display:flex; justify-content:space-between; margin:10px 0; color:var(--muted); }
.summary .row.total { font-weight:800; color:var(--dark); border-top:1px solid rgba(0,0,0,0.04); padding-top:12px; }

.empty-state {
    text-align:center;
    padding:40px;
    background:linear-gradient(180deg, rgba(255,173,180,0.08), transparent);
    border-radius: var(--radius);
    color:var(--muted);
}


<?php include '../layouts/footer.php'; ?>