<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CÓNDOR - Chocolates</title>
    <!-- Como les voy a pasar, esto en verde es para que sepan en que apartado estan -->
    <!-- Bootstrap CSS no borrar -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Link de la pagina de iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts pa tipoglafia -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- CSS el link-->
    <link rel="stylesheet" href="./css/condors.css">
</head> 
<body>
    <!-- El navegador de la pagina -->
    <nav class="confi-navbar">
        <div class="container">
            <!-- Barra de búsqueda - Posición fija izquierda -->
            <div class="buscador-container">
                <input type="text" class="buscador-input" placeholder="Buscar...">
                <i class="fas fa-search buscador-icon"></i>
            </div>

            <!-- IZQUIERDA - Solo 3 elementos -->
            <div class="navbar-izq">
                <a class="nav-link" href="#inicio">INICIO</a>
                <a class="nav-link" href="./sucursales/Sucursales.php">SUCURSALES</a>
                <a class="nav-link" href="#productos">PRODUCTOS</a>
            </div>

            <!-- CENTRO del Logo -->
            <div class="navbar-brand-container">
                <a class="navbar-brand" href="#">
                    <div class="logo-circulo">
                        <img src="./img/condor.png" alt="LogoCondor" class="logo-image">
                    </div>
                </a>
            </div>

            <!-- DERECHA - 3 elementos -->
            <div class="navbar-der">
                <a class="nav-link" href="#servicios">SERVICIOS</a>
                <a class="nav-link" href="#contactanos">CONTÁCTANOS</a>
                <a class="nav-link" href="#nosotros">NOSOTROS</a>
            </div>

            <!-- Botón hamburguesa para móvil -->
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Menú  responsivo -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#inicio">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="#sucursales">SUCURSALES</a></li>
                    <li class="nav-item"><a class="nav-link" href="#productos">PRODUCTOS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#servicios">SERVICIOS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contactanos">CONTÁCTANOS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#nosotros">NOSOTROS</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- El centro animado de Condor-->
    <section id="inicio" class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="hero-title animate__animated animate__fadeInUp">CÓNDOR</h1>
                    <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s">Expericia única en chocolates</p>
                    <button class="btn btn-primary hero-btn animate__animated animate__fadeInUp animate__delay-2s">Descubre Nuestros Productos</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Igual del centro pero ya el texto con el cuadro en el que ira-->
    <section id="productos" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="seccion-titu">Nuestros Productos</h2>
                    <p class="seccion-subtitu">Chocolates de la más alta calidad y sabor</p>
                </div>
            </div>

            <!-- El apartado de los 3 primeros productos que seran promociones-->
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card producto-card h-100">
                        <img src="./img/huawulli.jpg" class="card-img-top" alt="HalloweenCondor">
                        <div class="card-body">
                            <h5 class="card-titu">Especial Halloween</h5>
                            <p class="card-text"> Descubre nuestra colección de Halloween.</p>
                            <div class="text-center">
                                <span class="price">20.00 Bs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card producto-card h-100">
                        <img src="./img/Cigarros.jpg" class="card-img-top" alt="CigarrosChoco">
                        <div class="card-body">
                            <h5 class="card-titu">Cigarros de Chocolate</h5>
                            <p class="card-text">Una combinación perfecta de sabor cremoso y textura irresistible.</p>
                            <div class="text-center">
                                <span class="price">15.00 Bs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card producto-card h-100">
                        <img src="./img/ChocoAguayo.jpg" class="card-img-top" alt="Bombones">
                        <div class="card-body">
                            <h5 class="card-titu">Chocolates</h5>
                            <p class="card-text">¿Chocolate blanco, chocolate negro, de arroz, pasas, maní o de leche?.</p>
                            <div class="text-center">
                                <span class="price">15.00 Bs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nuestro pie de pagina humilde-->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h5>CÓNDOR</h5>
                    <p>Chocolates de la más alta calidad y sabor desde 1960.</p>
                </div>
                <div class="col-lg-3">
                    <h6>Enlaces</h6>
                    <ul class="list-unstyled">
                        <li><a href="#inicio" class="text-white-50 ">Inicio</a></li>
                        <li><a href="#productos" class="text-white-50">Productos</a></li>
                        <li><a href="#servicios" class="text-white-50">Servicios</a></li>
                        <li><a href="#contactanos" class="text-white-50">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6>Síguenos</h6>
                    <div class="social-links">
                        <a href="#" class="text-white-50 me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white-50 me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white-50 me-3"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-3">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="mb-0">&copy; 2025 CÓNDOR. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap el java-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Nuestra animacion por medio de los CSS, no es complicada ojo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
   
</body>

</html>