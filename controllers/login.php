<?php
session_start();
require_once __DIR__ . '/../config/database.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
header('Location: ../views/public/login.php');
exit;
}


$db = new Database();
$conn = $db->connect();


$email = trim($_POST['email']);
$password = $_POST['password'];


$stmt = $conn->prepare('SELECT * FROM etudiants WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($user && password_verify($password, $user['password_hash'])) {
// Regénération de session id pour sécurité
session_regenerate_id(true);
$_SESSION['etudiant_id'] = $user['id'];
$_SESSION['etudiant_nom'] = $user['nom'];
header('Location: ../views/etudiant/dashboard.php');
exit;
} else {
die('Identifiants incorrects.');
}