<?php
session_start(); // Inicia la sesión si es necesario
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: white;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<nav class="sidebar p-3">
    <h4 class="text-white">Mi Dashboard</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="#home"><i class="fas fa-home"></i> Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#reports"><i class="fas fa-chart-line"></i> Reportes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#settings"><i class="fas fa-cogs"></i> Configuración</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#logout"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
        </li>
    </ul>
</nav>

<!-- Main Content -->
<div class="container-fluid p-4">
    <h1>Bienvenido al Dashboard</h1>
    <p>Aquí puedes gestionar tu aplicación.</p>

    <!-- Contenido dinámico -->
    <div id="content">
        <!-- Aquí se incluirán las diferentes secciones según la navegación -->

        <h2>Demostraciones</h2>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

</body>
</html>