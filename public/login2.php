<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Chocolates Condór</title>


    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="../css/late.css">
    
</head>

<body>
    <h2 style="text-align: center; margin: 20px 0; color: #fffcfcff;">Chocolates Condór</h2>

    <div class="container" id="container">

        <div class="form-container sign-in-container">
            <form action="process_login2.php" method="post">
                <h1>Iniciar Sesión</h1>
                <input type="text" placeholder="Usuario" name="username" required />
                <input type="password" placeholder="Contraseña" name="password" required />
                <a href="#">¿Olvidaste tu contraseña?</a>
                <button type="submit">Iniciar Sesión</button>
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger mt-3" style="font-size: 12px;"><?php echo htmlspecialchars($_GET['error']); ?></div>
                <?php endif; ?>
            </form>
        </div>


        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>¡Bienvenido!</h1>
                    <p>Ingresa tus credenciales para acceder a Chocolates Condór</p>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chocolates Condór</h1>
                    <p>La mejor calidad de Chocolates de Bolivia</p>
                </div>
            </div>
        </div>
    </div>


    <script>
       
       document.addEventListener('DOMContentLoaded', function() {

            const container = document.getElementById('container');
            const overlay = document.querySelector('.overlay');

            container.addEventListener('mouseenter', function() {
                overlay.style.transform = 'translateX(10px)';
            });

            container.addEventListener('mouseleave', function() {
                overlay.style.transform = 'translateX(0)';
            });
        });
       
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>