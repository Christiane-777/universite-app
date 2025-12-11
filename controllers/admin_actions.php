<?php
session_start();
require_once __DIR__ . '/../config/database.php';

if (!isset($_SESSION['admin_id'])) die('Accès refusé');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') die('Requête invalide');

$id = $_POST['id'];
$action = $_POST['action'] ?? '';
$motive = isset($_POST['motif']) ? trim($_POST['motif']) : null;

$db = new Database();
$conn = $db->connect();

if ($action === 'valider') {
    $conn->prepare('UPDATE etudiants SET statut_dossier = "valide", motif_rejet = NULL WHERE id = ?')->execute([$id]);
}

if ($action === 'rejeter') {
    $conn->prepare('UPDATE etudiants SET statut_dossier = "rejete", motif_rejet = ? WHERE id = ?')->execute([$motive, $id]);
}

header('Location: ../views/admin/dossier.php?id=' . $id);
exit;
