<?php
 //include '../config/database.php';
include '../layouts/header.php';
session_start();
include '../config/database.php'; // Conexión a la base de datos

// Verificar si se ha recibido el ID de la categoría

    $category_id = 1;

    // Consultar los posts de la categoría seleccionada
    try {

        $sql = "SELECT posts.post_id, posts.title, posts.content, posts.image_path, categories.category_name, categories.category_id 
                              FROM posts
                              JOIN categories ON posts.category_id = categories.category_id
                              WHERE posts.category_id = :category_id
                              ORDER BY posts.created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['category_id' => $category_id]);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);       
       
    } catch (PDOException $e) {
        echo "Error al obtener posts: " . $e->getMessage();
    }

ob_start();
?>

<style>
/* ===== SECCIONES ADICIONALES ===== */

/* Sección de Estadísticas */
.stats-section {
    background: linear-gradient(135deg, #db8b92, #c77884);
    padding: 80px 0;
    color: white;
}

.stats-title {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 2.8rem;
    text-align: center;
    margin-bottom: 15px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.stats-subtitle {
    font-size: 1.2rem;
    text-align: center;
    margin-bottom: 60px;
    opacity: 0.9;
}

.stat-card {
    text-align: center;
    padding: 30px 20px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    margin-bottom: 30px;
}

.stat-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.15);
}

.stat-icon {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #29170F;
}

.stat-number {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 10px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.stat-text {
    font-size: 1.1rem;
    font-weight: 500;
    opacity: 0.9;
}

/* Sección de Servicios */
.services-section {
    background: #f8f9fa;
    padding: 80px 0;
}

.services-title {
    font-family: 'Libre Franklin', sans-serif;
    font-weight: 700;
    font-size: 2.8rem;
    color: #29170F;
    text-align: center;
    margin-bottom: 15px;
}

.services-subtitle {
    font-size: 1.2rem;
    color: #666;
    text-align: center;
    margin-bottom: 60px;
}

.service-card {
    background: white;
    padding: 40px 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    margin-bottom: 30px;
    height: 100%;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
}

.service-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #db8b92, #c77884);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
    color: white;
    font-size: 2rem;
}

.service-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #29170F;
    margin-bottom: 20px;
}

.service-description {
    color: #666;
    line-height: 1.6;
}

/* Sección de Horarios y Contacto */
.schedule-section {
    background: #29170F;
    color: white;
    padding: 80px 0;
}

.schedule-card, .contact-card {
    background: rgba(255, 255, 255, 0.05);
    padding: 40px;
    border-radius: 20px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    height: 100%;
}

.schedule-title, .contact-title {
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 30px;
    color: #db8b92;
}

.schedule-title i, .contact-title i {
    margin-right: 10px;
}

.schedule-item {
    display: flex;
    justify-content: space-between;
    padding: 15px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.schedule-item.highlight {
    background: rgba(219, 139, 146, 0.1);
    margin: 0 -20px;
    padding: 15px 20px;
    border-radius: 10px;
}

.schedule-day {
    font-weight: 500;
}

.schedule-time {
    font-weight: 600;
    color: #db8b92;
}

.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    font-size: 1.1rem;
}

.contact-item i {
    width: 25px;
    margin-right: 15px;
    color: #db8b92;
    font-size: 1.2rem;
}

.social-media {
    margin-top: 30px;
    padding-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.social-media h5 {
    margin-bottom: 20px;
    color: #db8b92;
}

.social-links {
    display: flex;
    gap: 15px;
}

.social-link {
    width: 45px;
    height: 45px;
    background: rgba(219, 139, 146, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: #db8b92;
    color: white;
    transform: translateY(-3px);
}

/* Sección de Testimonios */
.testimonials-section {
    background: white;
    padding: 80px 0;
}

.testimonials-title {
    font-family: 'Libre Franklin', sans-serif;
    font-weight: 700;
    font-size: 2.8rem;
    color: #29170F;
    text-align: center;
    margin-bottom: 15px;
}

.testimonials-subtitle {
    font-size: 1.2rem;
    color: #666;
    text-align: center;
    margin-bottom: 60px;
}

.testimonial-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    height: 100%;
    border-top: 4px solid #db8b92;
    transition: all 0.3s ease;
    margin-bottom: 30px;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
}

.testimonial-stars {
    color: #FFD700;
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.testimonial-text {
    font-style: italic;
    color: #555;
    line-height: 1.6;
    margin-bottom: 25px;
}

.author-name {
    color: #29170F;
    font-weight: 600;
    margin-bottom: 5px;
}

.author-location {
    color: #db8b92;
    font-size: 0.9rem;
}

/* Sección de Información Mejorada */
.enhanced-info-section {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 80px 0;
}

.info-features {
    margin-top: 40px;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 25px;
    padding: 15px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.feature-item i {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #db8b92, #c77884);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin-right: 15px;
    font-size: 1.1rem;
}

.feature-item span {
    font-weight: 500;
    color: #29170F;
}

/* Sección Call to Action */
.cta-section {
    background: linear-gradient(135deg, #29170F, #3d2418);
    color: white;
    padding: 80px 0;
    text-align: center;
}

.cta-title {
    font-family: 'Libre Franklin', sans-serif;
    font-weight: 700;
    font-size: 2.8rem;
    margin-bottom: 20px;
    color: #db8b92;
}

.cta-text {
    font-size: 1.2rem;
    margin-bottom: 40px;
    opacity: 0.9;
}

.cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.cta-button {
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-primary.cta-button {
    background: #db8b92;
    color: white;
    border-color: #db8b92;
}

.btn-primary.cta-button:hover {
    background: transparent;
    color: #db8b92;
    border-color: #db8b92;
}

.btn-secondary.cta-button {
    background: transparent;
    color: white;
    border-color: white;
}

.btn-secondary.cta-button:hover {
    background: white;
    color: #29170F;
}

/* ===== REPRODUCTOR DE MÚSICA ===== */

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
    color: #29170F;
    font-size: 16px;
}

.play-btn:hover {
    transform: scale(1.1);
    background: #29170F;
    color: #ffffff;
}

.volume-container {
    display: flex;
    align-items: center;
    gap: 8px;
}

.volume-icon {
    color: #ffffff;
    font-size: 14px;
}

.volume-slider {
    width: 80px;
    height: 4px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 2px;
    outline: none;
    cursor: pointer;
    -webkit-appearance: none;
    appearance: none;
}

.volume-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 14px;
    height: 14px;
    background: #ffffff;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
}

.volume-slider::-webkit-slider-thumb:hover {
    transform: scale(1.2);
}

.volume-slider::-moz-range-thumb {
    width: 14px;
    height: 14px;
    background: #ffffff;
    border-radius: 50%;
    cursor: pointer;
    border: none;
}

.music-info {
    color: #ffffff;
    font-size: 12px;
    margin-top: 8px;
    text-align: center;
    opacity: 0.9;
}

.music-status {
    color: #ffffff;
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
    color: #ffffff;
    font-size: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
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
    padding: 12px 20px;
    border-radius: 25px;
    font-size: 14px;
    z-index: 1002;
    box-shadow: 0 4px 20px rgba(219, 139, 146, 0.4);
    opacity: 0;
    animation: fadeInOut 3s ease;
}

@keyframes fadeInOut {
    0% { opacity: 0; transform: translateX(-50%) translateY(-10px); }
    20%, 80% { opacity: 1; transform: translateX(-50%) translateY(0); }
    100% { opacity: 0; transform: translateX(-50%) translateY(-10px); }
}

/* Responsive */
@media (992px) {
max-width:     .music-player {
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
    .stats-title, .services-title, .testimonials-title, .cta-title {
        font-size: 2.2rem;
    }
    
    .stat-card {
        margin-bottom: 20px;
    }
    
    .service-card {
        margin-bottom: 30px;
    }
    
    .schedule-card, .contact-card {
        margin-bottom: 30px;
    }
    
    .testimonial-card {
        margin-bottom: 30px;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .cta-button {
        width: 100%;
        max-width: 300px;
        justify-content: center;
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

<!-- ===== SECCIÓN PRINCIPAL DE SUCURSALES ===== -->
<section class="sucursales-section">
    <div class="container">
        <h1 class="sucursales-title">Nuestras Sucursales</h1>
        <p class="sucursales-subtitle">Encuentra la sucursal CÓNDOR más cercana a ti</p>
        
        <!-- Tarjetas de Sucursales -->
        <div class="sucursales-container">
            <?php foreach ($posts as $sucursal): ?>
                <?php
                // Ajustar ruta de imagen según origen
                $imagePath = $sucursal['image_path'];
                // Si la imagen empieza con ../, déjala como está (imágenes de ejemplo)
                // Si no, es una imagen nueva del admin que ya tiene la ruta completa
                if (strpos($imagePath, '../') !== 0) {
                    // La ruta ya viene correcta de la BD: uploads/sucursales/nombre.jpg
                    // No necesita prefijo adicional
                    $imagePath = $imagePath;
                }
                ?>
                <div class="sucursal-card">
                    <img src="<?php echo "../public/posts/" . $sucursal['image_path']; ?>" alt="<?php echo htmlspecialchars($sucursal['title']); ?>">
                    <div class="card__head"><?php echo htmlspecialchars($sucursal['title']); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== SECCIÓN DE ESTADÍSTICAS ===== -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="stats-title">CÓNDOR en Números</h2>
                <p class="stats-subtitle">Más de 60 años construyendo dulces recuerdos</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <div class="stat-number">4</div>
                    <div class="stat-text">Sucursales</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number">1M+</div>
                    <div class="stat-text">Clientes Felices</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="stat-number">60+</div>
                    <div class="stat-text">Años de Experiencia</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="stat-number">100%</div>
                    <div class="stat-text">Calidad Garantizada</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SECCIÓN DE TESTIMONIOS ===== -->
<section class="testimonials-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="testimonials-title">Lo Que Dicen Nuestros Clientes</h2>
                <p class="testimonials-subtitle">Experiencias reales de quienes confían en CÓNDOR</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">
                            ""Los mejores chocolates de La Paz, Bolivia. La calidad es excepcional y el servicio al cliente es sobresaliente. ¡Siempre logran sorprendernos!""
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-info">
                            <h5 class="author-name">María González</h5>
                            <span class="author-location">Obrajes</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">
                            "Pedí una caja de chocolates para un regalo especial y quedó espectacular. El sabor y la presentación superaron mis expectativas."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-info">
                            <h5 class="author-name">Carlos Rodríguez</h5>
                            <span class="author-location">Miraflores</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">
                            "60 años de tradición se notan en cada producto. Los helados artesanales son deliciosos y el ambiente de las sucursales es muy acogedor."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-info">
                            <h5 class="author-name">Ana Martínez</h5>
                            <span class="author-location">Los Pinos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SECCIÓN INFORMACIÓN ADICIONAL MEJORADA ===== -->
<section class="enhanced-info-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="info-content">
                    <h2 class="info-title">¿Por qué visitarnos?</h2>
                    <p class="info-text">
                        En cada una de nuestras sucursales encontrarás la mejor selección de chocolates,
                        elaborados con los ingredientes más sabrosos y el cuidado que nos caracteriza desde 1960.
                        Nuestro personal te ayudará a encontrar el chocolate perfecto para cada ocasión.
                    </p>
                    
                    <div class="info-features">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="fas fa-leaf"></i>
                                    <span>Ingredientes Naturales</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="fas fa-medal"></i>
                                    <span>60+ Años de Experiencia</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="fas fa-heart"></i>
                                    <span>Hecho con Amor</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Garantía de Calidad</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SECCIÓN CALL TO ACTION ===== -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="cta-title">¿Listo para endulzar tu día?</h2>
                <p class="cta-text">
                    Visita cualquiera de nuestras sucursales y descubre por qué somos la marca de chocolates preferida de miles de familias peruanas.
                </p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-primary cta-button">
                        <i class="fas fa-map-marker-alt"></i>
                        Ver Todas las Sucursales
                    </a>
                    <a href="#" class="btn btn-secondary cta-button">
                        <i class="fab fa-whatsapp"></i>
                        Contactar por WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== REPRODUCTOR DE MÚSICA ===== -->
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
    <source src="../public/audio/Queen instrumental - I Want To Break Free [aQlxlrw9sGo].mp3" type="audio/mpeg">
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

// Configurar volumen inicial
backgroundMusic.volume = 0.3;

// Función para mostrar el reproductor
function showMusicPlayer() {
    musicPlayer.classList.add('show');
    musicActivate.classList.add('hidden');
}

// Función para ocultar el reproductor
function hideMusicPlayer() {
    if (!isPlaying) {
        musicPlayer.classList.remove('show');
        musicActivate.classList.remove('hidden');
    }
}

// Función para alternar play/pause
function togglePlayPause() {
    if (isPlaying) {
        backgroundMusic.pause();
        isPlaying = false;
        playIcon.className = 'fas fa-play';
        musicStatus.textContent = 'Pausado';
    } else {
        backgroundMusic.play().then(() => {
            isPlaying = true;
            playIcon.className = 'fas fa-pause';
            musicStatus.textContent = 'Reproduciendo';
            showMusicPlayer();
        }).catch(error => {
            console.log('Error al reproducir audio:', error);
            musicStatus.textContent = 'Error al cargar';
        });
    }
}

// Event listeners
musicActivate.addEventListener('click', function() {
    togglePlayPause();
    
    // Mostrar alerta temporal
    musicAlert.style.display = 'block';
    setTimeout(() => {
        musicAlert.style.display = 'none';
    }, 3000);
});

playBtn.addEventListener('click', function() {
    togglePlayPause();
    showMusicPlayer();
});

// Control de volumen
volumeSlider.addEventListener('input', function() {
    backgroundMusic.volume = this.value / 100;
    showMusicPlayer();
});

// Mostrar reproductor al pasar el mouse
musicPlayer.addEventListener('mouseenter', function() {
    showMusicPlayer();
});

// Ocultar reproductor al salir el mouse (solo si no está reproduciendo)
musicPlayer.addEventListener('mouseleave', function() {
    if (!isPlaying) {
        setTimeout(() => {
            hideMusicPlayer();
        }, 1000);
    }
});

// Manejar errores de audio
backgroundMusic.addEventListener('error', function() {
    musicStatus.textContent = 'Error al cargar audio';
    console.log('Error al cargar el archivo de audio');
});

// Manejar cuando el audio termina (se repite por el loop)
backgroundMusic.addEventListener('ended', function() {
    isPlaying = false;
    playIcon.className = 'fas fa-play';
    musicStatus.textContent = 'Detenido';
});

// Manejar cuando el audio se puede reproducir
backgroundMusic.addEventListener('canplay', function() {
    musicStatus.textContent = 'Listo para reproducir';
});

// Auto-activar botón de activación después de 2 segundos
setTimeout(() => {
    if (!isPlaying) {
        musicActivate.style.animation = 'pulse 1s infinite';
    }
}, 2000);

// Ocultar controles cuando se hace clic fuera del reproductor
document.addEventListener('click', function(event) {
    if (!musicPlayer.contains(event.target) && !musicActivate.contains(event.target) && isPlaying) {
        setTimeout(() => {
            hideMusicPlayer();
        }, 2000);
    }
});
</script>

<?php include '../layouts/footer.php'; ?>