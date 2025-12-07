<?php
include '../../config/database.php';

$user_id = $_GET['id'];

$sql = "DELETE FROM users WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);

header("Location: list_users.php");
exit;
?>
