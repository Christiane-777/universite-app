<?php
session_start();
require_once __DIR__ . '/../config/database.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
header('Location: ../views/admin/admin_login.php');
exit;
}


$db = new Database();
$conn = $db->connect();


$email = trim($_POST['email']);
$password = $_POST['password'];


$stmt = $conn->prepare('SELECT * FROM admins WHERE email = ?');
$stmt->execute([$email]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);


if ($admin && password_verify($password, $admin['password_hash'])) {
session_regenerate_id(true);
$_SESSION['admin_id'] = $admin['id'];
$_SESSION['admin_nom'] = $admin['nom'];
header('Location: ../views/admin/dashboard_admin.php');
exit;
} else {
die('Identifiants administrateur incorrects.');
}