<?php

include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role_id = $_POST['role_id'];

    // Si se actualiza la contraseña
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $sql = "UPDATE users SET username = :username, email = :email, password = :password, role_id = :role_id WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':role_id' => $role_id,
            ':user_id' => $user_id,
        ]);
    } else {
        $sql = "UPDATE users SET username = :username, email = :email, role_id = :role_id WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':role_id' => $role_id,
            ':user_id' => $user_id,
        ]);
    }

    header('Location: list_users.php');
    exit();
}