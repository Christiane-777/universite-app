<?php
session_start();
require_once __DIR__ . '/../config/database.php';


if (!isset($_SESSION['etudiant_id'])) {
header('Location: ../views/public/login.php');
exit;
}
$db = new Database();
$conn = $db->connect();


$id = $_SESSION['etudiant_id'];


$stmt = $conn->prepare('UPDATE paiements SET statut = "paye", date_paiement = NOW() WHERE etudiant_id = ?');
$stmt->execute([$id]);


// Si tous les documents présents et paiement ok, mettre en attente
// (on vérifie presence de docs côté admin ou ici)
$docCount = $conn->prepare('SELECT COUNT(*) FROM documents WHERE etudiant_id = ?');
$docCount->execute([$id]);
$count = $docCount->fetchColumn();
if ($count >= 4) {
$conn->prepare('UPDATE etudiants SET statut_dossier = "attente" WHERE id = ?')->execute([$id]);
}


header('Location: ../views/etudiant/paiement.php');
exit;