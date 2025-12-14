<?php
require_once __DIR__ . '/../config/database.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
header('Location: ../views/public/register.php');
exit;
}


$db = new Database();
$conn = $db->connect();


$nom = trim($_POST['nom'] ?? '');
$prenom = trim($_POST['prenom'] ?? '');
$email = trim($_POST['email'] ?? '');
$telephone = trim($_POST['telephone'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';
$filiere_id = $_POST['filiere_id'] ?? null;
$date_naissance = !empty($_POST['date_naissance']) ? $_POST['date_naissance'] : null;
$nationalite = trim($_POST['nationalite'] ?? '');
$ancien_ecole = trim($_POST['ancien_ecole'] ?? '');
$pays_residence = trim($_POST['pays_residence'] ?? '');
$niveau_etude = isset($_POST['niveau_etude']) ? (int)$_POST['niveau_etude'] : null;
$parent_nom = trim($_POST['parent_nom'] ?? '');
$parent_contact = trim($_POST['parent_contact'] ?? '');


if (empty($nom) || empty($prenom) || empty($email) || empty($nationalite) || empty($ancien_ecole) || empty($pays_residence) || empty($filiere_id)) {
die('Champs obligatoires manquants.');
}


if ($password !== $confirm) {
die('Les mots de passe ne correspondent pas.');
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
die('Email invalide.');
}


if ($niveau_etude === null || $niveau_etude < 1 || $niveau_etude > 5) {
die('Niveau d\'etude invalide.');
}


// Verifier doublon
$check = $conn->prepare('SELECT id FROM etudiants WHERE email = ?');
$check->execute([$email]);
if ($check->rowCount() > 0) {
die('Email deja utilise.');
}


$password_hash = password_hash($password, PASSWORD_DEFAULT);


try {
$stmt = $conn->prepare('INSERT INTO etudiants (nom, prenom, email, telephone, password_hash, filiere_id, date_naissance, nationalite, ancien_ecole, pays_residence, niveau_etude, parent_nom, parent_contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([
$nom,
$prenom,
$email,
$telephone,
$password_hash,
$filiere_id,
$date_naissance,
$nationalite,
$ancien_ecole,
$pays_residence,
$niveau_etude,
$parent_nom !== '' ? $parent_nom : null,
$parent_contact !== '' ? $parent_contact : null
]);
} catch (PDOException $e) {
if ($e->getCode() === '23000') {
die('Email deja utilise.');
}
throw $e;
}


// Creer enregistrement paiement par defaut
$etudiant_id = $conn->lastInsertId();
$conn->prepare('INSERT INTO paiements (etudiant_id) VALUES (?)')->execute([$etudiant_id]);


header('Location: ../views/public/login.php?success=1');
exit;
