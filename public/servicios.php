<?php include '../layouts/header.php';
ob_start(); ?>
    <style>
        /* ===== ESTILOS BASADOS EN TU PROYECTO CONDOR ===== */
        
        :root {
            /* Tus colores exactos */
            --color-primary-dark: #29170F;
            --color-primary-pink: #db8b92;
            --color-primary-light: #ffadb4;
            --color-accent-orange: #FFA500;
            --color-pink-verylight: #f8d7da;
            
            --bg-primary: #29170F;
            --bg-card: #faf6f3;
            --text-white: #ffffff;
            --text-light: #666;
        }
        
        /* Reset básico (igual que tus archivos) */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--bg-primary);
            font-weight: 500;
            line-height: 1.6;
            color: #333;
        }
        
        /* ===== NAVBAR (usando tu estilo exacto) ===== */
        .confi-navbar {
            background: var(--color-primary-pink);
            padding: 15px 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        .confi-navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .navbar-izq,
        .navbar-der {
            display: flex;
            gap: 25px;
            flex: 1;
        }
        
        .navbar-izq {
            justify-content: flex-start;
            flex: 1;
            gap: 20px;
            padding-left: 0;
        }
        
        .navbar-der {
            justify-content: flex-end;
        }
        
        .navbar-izq .nav-link,
        .navbar-der .nav-link {
            color: var(--text-white) !important;
            font-weight: 500;
            font-size: 14px;
            letter-spacing: 1px;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            padding: 8px 0;
        }
        
        .navbar-izq .nav-link:hover,
        .navbar-der .nav-link:hover {
            color: var(--color-primary-dark) !important;
            transform: translateY(-2px);
        }
        
        .navbar-izq .nav-link::after,
        .navbar-der .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--color-primary-dark);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .navbar-izq .nav-link:hover::after,
        .navbar-der .nav-link:hover::after {
            width: 100%;
        }
        
        /* Logo circular (exactamente como el tuyo) */
        .navbar-brand-container {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }
        
        .logo-circulo {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--color-primary-dark), var(--color-accent-orange));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--color-primary-dark);
            box-shadow: 0 3px 10px var(--color-primary-dark);
            z-index: 10;
            transition: all 0.3s ease;
        }
        
        .logo-circulo:hover {
            transform: scale(1.1) rotate(10deg);
            box-shadow: 0 6px 25px rgba(255, 215, 0, 0.5);
        }
        
        /* ===== CONTENIDO PRINCIPAL ===== */
        .servicios-section {
            background: var(--bg-primary);
            min-height: 100vh;
            padding-top: 120px;
            padding-bottom: 60px;
        }
        
        .servicios-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Título de sección (como tu .seccion-titu) */
        .servicios-title {
            font-family: 'Libre Franklin', sans-serif;
            font-weight: 700;
            font-size: 3.5rem;
            color: var(--color-primary-pink);
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            width: 100%;
        }
        
        .servicios-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, var(--color-primary-pink), #d45317);
            transform: translateX(-50%);
            border-radius: 2px;
        }
        
        .servicios-subtitle {
            font-size: 1.3rem;
            color: var(--text-white);
            text-align: center;
            margin-bottom: 60px;
            font-weight: 400;
        }
        
        /* ===== GRID DE SERVICIOS ===== */
        .servicios-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }
        
        /* Card de servicio (basado en tu .producto-card) */
        .servicio-card {
            background: var(--bg-card);
            border: 10px solid var(--color-pink-verylight);
            border-radius: 25px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(248, 215, 218, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .servicio-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px #f8d7da;
        }
        
        .servicio-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--color-primary-pink), #fa9c71);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: var(--text-white);
            transition: all 0.3s ease;
        }
        
        .servicio-card:hover .servicio-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        .servicio-titulo {
            color: var(--color-primary-dark);
            font-weight: 600;
            font-size: 1.4rem;
            margin-bottom: 15px;
            font-family: 'Libre Franklin', sans-serif;
        }
        
        .servicio-descripcion {
            color: var(--text-light);
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .servicio-caracteristicas {
            list-style: none;
            margin-bottom: 25px;
            text-align: left;
        }
        
        .servicio-caracteristicas li {
            color: var(--text-light);
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
        }
        
        .servicio-caracteristicas li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--color-primary-pink);
            font-weight: bold;
        }
        
        /* Botón de servicio (como tu .hero-btn) */
        .btn-servicio {
            background: linear-gradient(135deg, var(--color-primary-pink), #fa9c71);
            border: none;
            padding: 12px 35px;
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-white);
            border-radius: 50px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-servicio:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px var(--color-primary-pink);
            color: var(--color-primary-dark);
            text-decoration: none;
        }
        
        /* ===== SECCIÓN DE CONTACTO ===== */
        .contacto-servicios {
            background: linear-gradient(135deg, var(--color-primary-pink), #fa9c71);
            border-radius: 25px;
            padding: 40px;
            text-align: center;
            margin-top: 40px;
        }
        
        .contacto-servicios h3 {
            color: var(--text-white);
            font-size: 2rem;
            margin-bottom: 15px;
            font-family: 'Libre Franklin', sans-serif;
        }
        
        .contacto-servicios p {
            color: var(--text-white);
            font-size: 1.1rem;
            margin-bottom: 25px;
        }
        
        .btn-contacto {
            background: var(--text-white);
            color: var(--color-primary-dark);
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-contacto:hover {
            background: var(--color-primary-dark);
            color: var(--text-white);
            transform: translateY(-2px);
            text-decoration: none;
        }
        
        /* ===== REPRODUCTOR DE MÚSICA MEJORADO ===== */
        .music-player {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: linear-gradient(135deg, var(--color-primary-pink), #fa9c71);
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
            background: var(--text-white);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--color-primary-dark);
            font-size: 16px;
        }
        
        .play-btn:hover {
            transform: scale(1.1);
            background: var(--color-primary-dark);
            color: var(--text-white);
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
            color: var(--text-white);
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
            background: var(--text-white);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .volume-slider::-webkit-slider-thumb:hover {
            transform: scale(1.2);
            background: var(--color-primary-dark);
        }
        
        .volume-slider::-moz-range-thumb {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--text-white);
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
        }
        
        .volume-slider::-moz-range-thumb:hover {
            transform: scale(1.2);
            background: var(--color-primary-dark);
        }
        
        .music-info {
            color: var(--text-white);
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
            background: linear-gradient(135deg, var(--color-primary-pink), #fa9c71);
            border: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--text-white);
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
            background: linear-gradient(135deg, var(--color-primary-pink), #fa9c71);
            color: var(--text-white);
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
        
        /* ===== RESPONSIVE (igual que tus breakpoints) ===== */
        @media (max-width: 991px) {
            .navbar-left,
            .navbar-right {
                display: none !important;
            }
            
            .navbar-brand-container {
                position: static;
                transform: none;
                margin: 0 auto;
            }
            
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
        
        @media (max-width: 768px) {
            .servicios-section {
                padding-top: 100px;
            }
            
            .servicios-title {
                font-size: 2.5rem;
            }
            
            .servicios-subtitle {
                font-size: 1.1rem;
            }
            
            .servicios-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }
            
            .logo-circulo {
                width: 45px !important;
                height: 45px !important;
            }
            
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
        
        @media (max-width: 576px) {
            .servicios-title {
                font-size: 2rem;
            }
            
            .servicios-container {
                padding: 0 15px;
            }
            
            .servicio-card {
                padding: 20px;
            }
            
            .btn-servicio {
                padding: 10px 25px;
                font-size: 0.9rem;
            }
            
            .contacto-servicios {
                padding: 30px 20px;
            }
            
            .logo-circulo {
                width: 40px !important;
                height: 40px !important;
            }
            
            .music-player {
                min-width: 140px;
                padding: 10px;
            }
            
            .music-info {
                font-size: 11px;
            }
            
            .volume-slider {
                max-width: 50px;
            }
            
            .music-activate {
                width: 40px;
                height: 40px;
                font-size: 14px;
            }
        }
    </style>

<body>
  
    
    <!-- Contenido Principal -->
    <main class="servicios-section">
        <div class="servicios-container">
            <h1 class="servicios-title">Nuestros Servicios</h1>
            <p class="servicios-subtitle">Descubre todo lo que Chocolates Condor puede ofrecerte</p>
            
            <!-- Grid de Servicios -->
            <div class="servicios-grid">
                
                <!-- Servicio 1: Fabricación Artesanal -->
                <div class="servicio-card">
                    <div class="servicio-icon">
                        <i class="fas fa-candy-cane"></i>
                    </div>
                    <h3 class="servicio-titulo">Pedidos</h3>
                    <p class="servicio-descripcion">
                        Se pueden realizar pedidos telefónicos al número de celular 76252160 para la línea de Risoffiato.
                    </p>
                    <ul class="servicio-caracteristicas">
                        <li>Ingredientes 100% de alta calidad</li>
                        <li>Proceso completo</li>
                        <li>Sabores únicos y exclusivos</li>
                        <li>Calidad garantizada</li>
                    </ul>
                    <a href="../public/contactamos.php" class="btn-servicio">Más Información</a>
                </div>
                
                <!-- Servicio 2: Entrega a Domicilio -->
                <div class="servicio-card">
                    <div class="servicio-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3 class="servicio-titulo">Curbside pickup</h3>
                    <p class="servicio-descripcion">
                      Servicio minorista en el que los clientes piden en línea y recogen sus compras sin salir de su vehículo.
                    </p>
                    <ul class="servicio-caracteristicas">
                        <li>Entrega en menos de 24 horas</li>
                        <li>Empaque especial para regalo</li>
                        <li>Cobertura en toda la ciudad</li>
                        <li>Seguimiento en tiempo real</li>
                    </ul>
                    <a href="../public/contactamos.php" class="btn-servicio">Pedir Ahora</a>
                </div>
                
                <!-- Servicio 3: Eventos y Celebraciones -->
                <div class="servicio-card">
                    <div class="servicio-icon">
                        <i class="fas fa-birthday-cake"></i>
                    </div>
                    <h3 class="servicio-titulo">Venta de Agencias</h3>
                    <p class="servicio-descripcion">
                        A través de la venta de sus productos en sus agencias ubicadas en La Paz.
                    </p>
                    <ul class="servicio-caracteristicas">
                        <li>Diseños personalizados</li>
                        <li>Empaques especiales</li>
                        <li>Diseños temáticos</li>
                        <li>Consultoría gratuita</li>
                    </ul>
                    <a href="../public/contactamos.php" class="btn-servicio">Cotizar Evento</a>
                </div>
                 </div>
            
            <!-- Sección de Contacto -->
            <div class="contacto-servicios">
                <h3>¿Necesitas un Servicio Personalizado?</h3>
                <p>Contáctanos y te ayudaremos a crear la solución perfecta para tus necesidades</p>
                <a href="../public/contactamos.php" class="btn-contacto">Contactar Ahora</a>
            </div>
     </div>
    </main>
    
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
     
        <!-- Reemplaza con tu archivo de música -->
        <source src="../public/audio/Canción de El Rubius [Suscríbete].mp3" type="audio/mpeg">
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
</body>
<?php include '../layouts/footer.php'; ?>