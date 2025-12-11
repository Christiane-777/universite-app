<?php
session_start();
require_once __DIR__ . '/../config/database.php';


if (!isset($_SESSION['etudiant_id'])) {
header('Location: ../views/public/login.php');
exit;
}


$db = new Database();
$conn = $db->connect();
$etudiant_id = $_SESSION['etudiant_id'];


$allowed_extensions = ['pdf','jpg','jpeg','png'];
$upload_base = __DIR__ . '/../assets/uploads/';


function saveFile($field, $subdir, $type, $conn, $etudiant_id, $allowed_extensions, $upload_base) {
if (!isset($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) return false;


$name = $_FILES[$field]['name'];
$tmp = $_FILES[$field]['tmp_name'];
$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
if (!in_array($ext, $allowed_extensions)) die('Format non autorisé: ' . htmlspecialchars($name));


// create dir if not exists
if (!is_dir($upload_base . $subdir)) mkdir($upload_base . $subdir, 0755, true);


$newName = uniqid() . '.' . $ext;
$dest = $upload_base . $subdir . '/' . $newName;


if (!move_uploaded_file($tmp, $dest)) die('Erreur lors de l\'upload.');


$stmt = $conn->prepare('INSERT INTO documents (etudiant_id, type_document, fichier_path) VALUES (?, ?, ?)');
$stmt->execute([$etudiant_id, $type, $subdir . '/' . $newName]);
return true;
}


// Attendu: cni, diplome, releve, photo
saveFile('cni', 'cartes', 'cni', $conn, $etudiant_id, $allowed_extensions, $upload_base);
saveFile('diplome', 'diplomes', 'diplome', $conn, $etudiant_id, $allowed_extensions, $upload_base);
saveFile('releve', 'releves', 'releve', $conn, $etudiant_id, $allowed_extensions, $upload_base);
saveFile('photo', 'photos', 'photo', $conn, $etudiant_id, $allowed_extensions, $upload_base);


// Si paiement déjà payé et docs >=4, statut attente
$pay = $conn->prepare('SELECT statut FROM paiements WHERE etudiant_id = ?');
$pay->execute([$etudiant_id]);
$pp = $pay->fetch(PDO::FETCH_ASSOC);
$docCount = $conn->prepare('SELECT COUNT(*) FROM documents WHERE etudiant_id = ?');
$docCount->execute([$etudiant_id]);
$count = $docCount->fetchColumn();


if ($pp && $pp['statut'] === 'paye' && $count >= 4) {
$conn->prepare('UPDATE etudiants SET statut_dossier = "attente" WHERE id = ?')->execute([$etudiant_id]);
}


header('Location: ../views/etudiant/upload.php?success=1');
exit;