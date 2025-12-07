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
    .contacto-section {
        background: var(--bg-primary);
        min-height: 100vh;
        padding-top: 120px;
        padding-bottom: 60px;
    }

    .contacto-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Título de sección (como tu .seccion-titu) */
    .contacto-title {
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

    .contacto-title::after {
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

    .contacto-subtitle {
        font-size: 1.3rem;
        color: var(--text-white);
        text-align: center;
        margin-bottom: 60px;
        font-weight: 400;
    }

    /* ===== GRID DE CONTACTO ===== */
    .contacto-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-bottom: 60px;
    }

    /* ===== FORMULARIO DE CONTACTO ===== */
    .formulario-contacto {
        background: var(--bg-card);
        border: 10px solid var(--color-pink-verylight);
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(248, 215, 218, 0.3);
        transition: all 0.3s ease;
    }

    .formulario-contacto:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px #f8d7da;
    }

    .formulario-contacto h3 {
        color: var(--color-primary-dark);
        font-size: 2rem;
        margin-bottom: 25px;
        font-family: 'Libre Franklin', sans-serif;
        text-align: center;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: var(--color-primary-dark);
        font-weight: 600;
        font-size: 1rem;
    }

    .form-input,
    .form-textarea,
    .form-select {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid var(--color-pink-verylight);
        border-radius: 15px;
        font-size: 1rem;
        font-family: 'Montserrat', sans-serif;
        transition: all 0.3s ease;
        background: white;
    }

    .form-input:focus,
    .form-textarea:focus,
    .form-select:focus {
        outline: none;
        border-color: var(--color-primary-pink);
        box-shadow: 0 0 0 3px rgba(219, 139, 146, 0.1);
        transform: translateY(-2px);
    }

    .form-textarea {
        resize: vertical;
        min-height: 120px;
    }

    /* Botón del formulario (como tu .hero-btn) */
    .btn-formulario {
        background: linear-gradient(135deg, var(--color-primary-pink), #fa9c71);
        border: none;
        padding: 15px 40px;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-white);
        border-radius: 50px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
    }

    .btn-formulario:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px var(--color-primary-pink);
        color: var(--color-primary-dark);
    }

    /* ===== INFORMACIÓN DE CONTACTO ===== */
    .info-contacto {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    /* Card de información (basado en tu .producto-card) */
    .info-card {
        background: var(--bg-card);
        border: 10px solid var(--color-pink-verylight);
        border-radius: 25px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(248, 215, 218, 0.3);
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px #f8d7da;
    }

    .info-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--color-primary-pink), #fa9c71);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 1.8rem;
        color: var(--text-white);
        transition: all 0.3s ease;
    }

    .info-card:hover .info-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .info-titulo {
        color: var(--color-primary-dark);
        font-weight: 600;
        font-size: 1.3rem;
        margin-bottom: 15px;
        font-family: 'Libre Franklin', sans-serif;
    }

    .info-contenido {
        color: var(--text-light);
        line-height: 1.6;
    }

    .info-contenido a {
        color: var(--color-primary-pink);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .info-contenido a:hover {
        color: var(--color-primary-dark);
        text-decoration: underline;
    }

    /* ===== HORARIOS DE ATENCIÓN ===== */
    .horarios-card {
        grid-column: 1 / -1;
        background: var(--bg-card);
        border: 10px solid var(--color-pink-verylight);
        border-radius: 25px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(248, 215, 218, 0.3);
        transition: all 0.3s ease;
    }

    .horarios-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px #f8d7da;
    }

    .horarios-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .horario-item {
        text-align: center;
        padding: 15px;
        background: white;
        border-radius: 15px;
        border: 2px solid var(--color-pink-verylight);
    }

    .horario-dia {
        font-weight: 600;
        color: var(--color-primary-dark);
        margin-bottom: 5px;
    }

    .horario-hora {
        color: var(--color-primary-pink);
        font-weight: 600;
    }

    /* ===== REDES SOCIALES ===== */
    .redes-sociales {
        background: linear-gradient(135deg, var(--color-primary-pink), #fa9c71);
        border-radius: 25px;
        padding: 40px;
        text-align: center;
        margin-top: 40px;
    }

    .redes-sociales h3 {
        color: var(--text-white);
        font-size: 2rem;
        margin-bottom: 15px;
        font-family: 'Libre Franklin', sans-serif;
    }

    .redes-sociales p {
        color: var(--text-white);
        font-size: 1.1rem;
        margin-bottom: 25px;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .social-link {
        width: 60px;
        height: 60px;
        background: var(--text-white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--color-primary-dark);
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        background: var(--color-primary-dark);
        color: var(--text-white);
        transform: translateY(-3px) scale(1.1);
        text-decoration: none;
    }

    /* ===== REPRODUCTOR DE MÚSICA PARA CONTACTO ===== */
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
        0% {
            box-shadow: 0 8px 25px rgba(219, 139, 146, 0.4);
        }

        50% {
            box-shadow: 0 8px 25px rgba(219, 139, 146, 0.8);
        }

        100% {
            box-shadow: 0 8px 25px rgba(219, 139, 146, 0.4);
        }
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
        .contacto-section {
            padding-top: 100px;
        }

        .contacto-title {
            font-size: 2.5rem;
        }

        .contacto-subtitle {
            font-size: 1.1rem;
        }

        .contacto-grid {
            grid-template-columns: 1fr;
            gap: 30px;
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
        .contacto-title {
            font-size: 2rem;
        }

        .contacto-container {
            padding: 0 15px;
        }

        .formulario-contacto,
        .info-card {
            padding: 25px;
        }

        .btn-formulario {
            padding: 12px 30px;
            font-size: 1rem;
        }

        .horarios-grid {
            grid-template-columns: 1fr;
        }

        .social-links {
            gap: 15px;
        }

        .social-link {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
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
    <main class="contacto-section">
        <div class="contacto-container">
            <h1 class="contacto-title">Contáctanos</h1>
            <p class="contacto-subtitle">Estamos aquí para resolver todas tus dudas y necesidades</p>

            <!-- Grid de Contacto -->
            <div class="contacto-grid">

                <!-- Formulario de Contacto -->
                <div class="formulario-contacto">
                    <h3>Envíanos un Mensaje</h3>
                    <form id="contactForm" action="#" method="POST">
                        <div class="form-group">
                            <label class="form-label" for="nombre">Nombre Completo *</label>
                            <input type="text" id="nombre" name="nombre" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Correo Electrónico *</label>
                            <input type="email" id="email" name="email" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="telefono">Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="asunto">Asunto *</label>
                            <select id="asunto" name="asunto" class="form-select" required>
                                <option value="">Selecciona un asunto</option>
                                <option value="general">Consulta General</option>
                                <option value="productos">Información de Productos</option>
                                <option value="servicios">Servicios</option>
                                <option value="eventos">Eventos y Celebraciones</option>
                                <option value="mayorista">Venta Mayorista</option>
                                <option value="reclamo">Reclamo</option>
                                <option value="sugerencia">Sugerencia</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="mensaje">Mensaje *</label>
                            <textarea id="mensaje" name="mensaje" class="form-textarea" placeholder="Escribe tu mensaje aquí..." required></textarea>
                        </div>

                        <button type="submit" class="btn-formulario">Enviar Mensaje</button>
                    </form>
                </div>

                <!-- Información de Contacto -->
                <div class="info-contacto">

                    <!-- Dirección -->
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4 class="info-titulo">Nuestra Ubicación</h4>
                        <div class="info-contenido">
                            <p>Calle Genaro Sanjinés N° 343<br>
                                Entre las calles Mercado y Potosí<br>
                                La Paz<br>
                                Bolivia</p>
                            <a href="https://maps.app.goo.gl/cSboj6tdVbKHyDCK9" target="_blank" rel="noopener">Ver en el mapa →</a>
                        </div>
                    </div>


                    <!-- Teléfonos -->
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h4 class="info-titulo">Teléfonos</h4>
                        <div class="info-contenido">
                            <p><strong>Pedidos:</strong> <a href="tel:+1234567890">+591 76252160</a></p>
                            <p><strong>Venta de Agencias:</strong> <a href="tel:+1234567891">+591 76252160</a></p>
                            <p><strong>Curbside pickup:</strong> <a href="tel:+1234567892">+591 76252160</a></p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4 class="info-titulo">Correos Electrónicos</h4>
                        <div class="info-contenido">
                            <p><strong>Pedidos:</strong> <a href="mailto:pedidos@chocolatescondor.com">pedidos@chocolatescondor.com</a></p>
                            <p><strong>Venta de Agencias:</strong> <a href="mailto:venta@chocolatescondor.com">venta@chocolatescondor.com</a></p>
                            <p><strong>Curbside pickup:</strong> <a href="mailto:Curbsidepickup@chocolatescondor.com">Curbsidepickup@chocolatescondor.com</a></p>
                        </div>
                    </div>

                </div>

                <!-- Horarios de Atención -->
                <div class="horarios-card">
                    <h3 style="color: var(--color-primary-dark); font-size: 2rem; margin-bottom: 10px; font-family: 'Libre Franklin', sans-serif; text-align: center;">
                        <i class="fas fa-clock" style="margin-right: 10px; color: var(--color-primary-pink);"></i>
                        Horarios de Atención
                    </h3>
                    <div class="horarios-grid">
                        <div class="horario-item">
                            <div class="horario-dia">Lunes - Viernes</div>
                            <div class="horario-hora">9:00 AM - 8:00 PM</div>
                        </div>
                        <div class="horario-item">
                            <div class="horario-dia">Sábados</div>
                            <div class="horario-hora">9:00 AM - 9:00 PM</div>
                        </div>
                        <div class="horario-item">
                            <div class="horario-dia">Domingos</div>
                            <div class="horario-hora">10:00 AM - 6:00 PM</div>
                        </div>
                        <div class="horario-item">
                            <div class="horario-dia">Feriados</div>
                            <div class="horario-hora">10:00 AM - 4:00 PM</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Redes Sociales -->
            <div class="redes-sociales">
                <h3>Síguenos en Redes Sociales</h3>
                <p>Mantente al día con nuestras novedades y ofertas especiales</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/chocolatescondorbolivia/about?locale=es_LA"
                        class="social-link"
                        title="Facebook"
                        target="_blank"
                        rel="noopener noreferrer">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/chocolates.condor/?hl=es-la"
                        class="social-link"
                        title="Instagram"
                        target="_blank"
                        rel="noopener noreferrer"
                        onclick="alert('Enlace de Instagram Listo')">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://x.com/ChocolatesCndo1"
                        class="social-link"
                        title="Twitter"
                        target="_blank"
                        rel="noopener noreferrer"
                        onclick="alert('Enlace de Twitter Listo')">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.link/dr2p4n"
                        class="social-link"
                        title="WhatsApp"
                        target="_blank"
                        rel="noopener noreferrer"
                        onclick="abrirWhatsApp()">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://www.tiktok.com/@chocolatescondor"
                        class="social-link"
                        title="TikTok"
                        target="_blank"
                        rel="noopener noreferrer"
                        onclick="alert('Enlace de TikTok Listo')">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://www.youtube.com/@chocolatescondorbo"
                        class="social-link"
                        title="YouTube"
                        target="_blank"
                        rel="noopener noreferrer"
                        onclick="alert('Enlace de YouTube Listo')">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
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

    <!-- Audio element -->
    <audio id="backgroundMusic" loop preload="auto">
        <source src="../public/audio/Berlin - Take My Breath Away (Instrumental Cover).mp3" type="audio/mpeg">
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

        // Funcionalidad del formulario
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Aquí puedes agregar la lógica para enviar el formulario
            alert('¡Gracias por tu mensaje! Te contactaremos pronto.');

            // Reset del formulario
            this.reset();
        });

        // Función para abrir mapa (placeholder)
        function abrirMapa() {
            alert('Aquí se abriría el mapa de Google Maps con nuestra ubicación.');
        }
    </script>
</body>


<?php include '../layouts/footer.php'; ?>