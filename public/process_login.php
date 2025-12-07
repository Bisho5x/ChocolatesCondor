<?php
session_start();
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validar y sanitizar el nombre de usuario y la contraseña
    $username = trim($username);
    $password = trim($password);

    // Consultar la base de datos para obtener el usuario
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Establecer la sesión y redirigir a la página de administración
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        //var_dump($_SESSION['username']);
        header("Location: index.php");
        exit();
    } else {
        // Redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
        header("Location: login.php?error=Credenciales incorrectas.");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
