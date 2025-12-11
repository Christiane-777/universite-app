<?php
require_once __DIR__ . '/../config/database.php';


if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
header('Location: ../views/public/register.php');
exit;
}


$db = new Database();
$conn = $db->connect();


$nom = trim($_POST['nom']);
$prenom = trim($_POST['prenom']);
$email = trim($_POST['email']);
$telephone = trim($_POST['telephone']);
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];
$filiere_id = $_POST['filiere_id'];
$date_naissance = !empty($_POST['date_naissance']) ? $_POST['date_naissance'] : null;


if ($password !== $confirm) {
die('Les mots de passe ne correspondent pas.');
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
die('Email invalide.');
}


// Vérifier doublon
$check = $conn->prepare('SELECT id FROM etudiants WHERE email = ?');
$check->execute([$email]);
if ($check->rowCount() > 0) {
die('Email déjà utilisé.');
}


$password_hash = password_hash($password, PASSWORD_DEFAULT);


$stmt = $conn->prepare('INSERT INTO etudiants (nom, prenom, email, telephone, password_hash, filiere_id, date_naissance) VALUES (?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$nom, $prenom, $email, $telephone, $password_hash, $filiere_id, $date_naissance]);


// Créer enregistrement paiement par défaut
$etudiant_id = $conn->lastInsertId();
$conn->prepare('INSERT INTO paiements (etudiant_id) VALUES (?)')->execute([$etudiant_id]);


header('Location: ../views/public/login.php?success=1');
exit;