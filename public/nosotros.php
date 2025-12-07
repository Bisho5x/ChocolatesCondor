<?php include '../layouts/header.php';
ob_start(); ?>
<style>
    body {
    font-family: 'Montserrat', sans-serif;
    background-color: #29170f;
}
  :root { --site-header-height: 90px; } /* ajusta este valor según la altura real de tu header */
    .page-top-space { height: var(--site-header-height); }

   
    .section-top-adjust { margin-top: 12px; }
.icon-illustration{
    width:100%;
    height:200px;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    overflow:hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    margin-bottom:12px;
}
.icon-illustration svg{ width:80px; height:80px; opacity:0.98; filter: drop-shadow(0 6px 18px rgba(0,0,0,0.12)); }

/* paletas suaves coordinadas con el tema */
.history-ill{ background: linear-gradient(135deg,#e57a13 0%, #ffb677 100%); }
.mission-ill{ background: linear-gradient(135deg,#db8b92 0%, #ff9fb8 100%); }
.vision-ill{ background: linear-gradient(135deg,#ffd26b 0%, #ffadb4 100%); }


    .card {
    transition: transform 0.3s ease;
    height: 100%;
    width: 100%;
}
.card-body { padding-top: 6px; }
.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgb(255, 255, 255);
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}

.section-title {
    font-weight: 600;
    color: #ffffff;
    margin-bottom: 2rem;
}

.cards {
    width: 130px;
    height: 130px;
    object-fit: cover;
    border-radius: 50%;
    margin: 20px auto 10px;
    display: block;

}

.titulo-seccion1 {
    font-size: 4rem;
    font-weight: 900;
    color: #e57a13;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.body1 {
    font-family: 'Poppins', sans-serif;
    background-color: #db8b92;
}

.card {
    border: 8px solid #db8b92;
    border-radius: 15px;
}

.card1 {
    border: 8px solid #e7adb2;
    border-radius: 15px;
}

.card1 {
    background-color: #29170f;
}

/* ===== REPRODUCTOR DE MÚSICA MEJORADO ===== */
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
    color: #29170f;
    font-size: 16px;
}

.play-btn:hover {
    transform: scale(1.1);
    background: #29170f;
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
    background: #29170f;
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
    background: #29170f;
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
    color: #ffffff;
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
    color: #ffffff;
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

/* ===== RESPONSIVE PARA REPRODUCTOR ===== */
@media (max-width: 768px) {
    .music-player {
        min-width: 160px;
        bottom: 15px;
        right: 15px;
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
        bottom: 15px;
        right: 15px;
        width: 50px;
        height: 50px;
        font-size: 18px;
    }
}

@media (max-width: 576px) {
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
   <!-- ESPACIO PARA SEPARAR DEL HEADER (inserta justo después del <body>) -->
    <div class="page-top-space" aria-hidden="true"></div>

    <!-- Contenido Principal -->
    <main class="contacto-section section-top-adjust">   
<!-- Sección 3 Columnas -->
    <section class="py-5">
       <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-4 d-flex">
                    <div class="card w-100">
                        <div class="icon-illustration history-ill" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v18H6.5A2.5 2.5 0 0 1 4 17.5v-13z" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h5 class="titulo-seccion1 text-center">HISTORIA</h5>
                            <p class="card-text text-center">En 1955, Francisco Gonzales retornó a Bolivia y lanzó su primer producto, el mazapán de almendra. Con recursos limitados amplió su oferta a cigarritos, barritas de fruta, bollos y traguitos. En 1960 formalizó su empresa unipersonal bajo el nombre "Cóndor".</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex">
                    <div class="card w-100">
                        <div class="icon-illustration mission-ill" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M12 2c2.7 0 4 1 4 1s1 1.3 1 4-1 4-1 4 0 1.3-1 4-4 4-4 4-1.3-1-4-4-4-4-4-4 1.3-1 4-1 4-1 4-1 0-1.3 1-4 4-4 4-4z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h5 class="titulo-seccion1 text-center">MISIÓN</h5>
                            <p class="card-text text-center">Elaborar y comercializar productos en base a chocolate de elevada calidad, obtenidos únicamente a partir de cacao de producción nacional; para apoyar así el desarrollo de nuestro país.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex">
                    <div class="card w-100">
                        <div class="icon-illustration vision-ill" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="3" stroke="#fff" stroke-width="1.5"/>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h5 class="titulo-seccion1 text-center">VISIÓN</h5>
                            <p class="card-text text-center">Llegar a ser una empresa líder en el rubro chocolatero, comercializando una amplia gama de productos innovadores que cumplan los requisitos de nuestros clientes, a nivel nacional.</p>
                        </div>
                    </div>
                </div>
            </div>
        
            </div>
        </div>
    </section>

    <!-- Sección 5 Columnas -->
    <section class="py-5 body1">
        <div class="container">
            <h2 class="text-center section-title">Nosotros</h2>
            <div class="row g-4">
                <div class="col">
                    <div class="card card1">
                        <img src="../img/pablo.jpeg" class="cards" alt="pablo">
                        <div class="card-body">
                            <h5 class="card-title text-center text-light">Pablo Mayta</h5>
                            <p class="card-text text-center text-light">Encargado de diseñar y desarrollar la página web, asegurando su buen funcionamiento y una experiencia visual atractiva.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card1">
                        <img src="../img/al.jpg" class="cards" alt="al">
                        <div class="card-body">
                            <h5 class="card-title text-center text-light">Alison Araos</h5>
                            <p class="card-text text-center text-light">Colabora en el desarrollo y diseño de la página web, apoyando en tareas técnicas y mejoras para asegurar un funcionamiento óptimo.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card1">
                        <img src="../img/ad.jpg" class="cards" alt="as">
                        <div class="card-body">
                            <h5 class="card-title text-center text-light">Adriana Espinoza</h5>
                            <p class="card-text text-center text-light">Participó en el proyecto brindando apoyo puntual en el desarrollo y se encargó principalmente de elaborar y organizar el informe final.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card1">
                        <img src="../img/kenya.jpeg" class="cards" alt="kenya">
                        <div class="card-body">
                            <h5 class="card-title text-center text-light">Kenia Soto</h5>
                            <p class="card-text text-center text-light">Encargada de definir la estética y el estilo visual del proyecto, creando diseños atractivos y coherentes para mejorar la presentación general.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card1">
                        <img src="../img/mau.jpeg" class="cards" alt="mau">
                        <div class="card-body">
                            <h5 class="card-title text-center text-light">Mauren Cruz</h5>
                            <p class="card-text text-center text-light">Encargada de tomar y seleccionar fotografías para el proyecto, garantizando imágenes claras, estéticas y adecuadas para la presentación visual del trabajo.</p>
                        </div>
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
    
    <!-- Audio element (con múltiples opciones) -->
    <audio id="backgroundMusic" loop preload="auto">
        <!-- Reemplaza con tu archivo de música -->
        <source src="../public/audio/flawed mangoes - killswitch lullaby.mp3" type="audio/mpeg">
    </audio>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
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

</html>




<?php include '../layouts/footer.php'; ?>