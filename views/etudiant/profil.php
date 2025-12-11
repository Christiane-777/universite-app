<?php
session_start();
if (!isset($_SESSION['etudiant_id'])) header('Location: ../public/login.php');
include __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../config/database.php';
$db = new Database(); $conn = $db->connect();


$id = $_SESSION['etudiant_id'];
$stmt = $conn->prepare('SELECT e.*, f.nom AS filiere FROM etudiants e LEFT JOIN filieres f ON e.filiere_id = f.id WHERE e.id = ?');
$stmt->execute([$id]); $et = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<div class="container student-layout">
<?php include __DIR__ . '/../../includes/navbar_etudiant.php'; ?>

<section class="student-main">
<div class="page-header">
<h2>Mon profil</h2>
<p>Vérifiez vos informations personnelles.</p>
</div>
<div class="card">
<p><strong>Nom :</strong> <?= htmlspecialchars($et['nom']) ?></p>
<p><strong>Prénom :</strong> <?= htmlspecialchars($et['prenom']) ?></p>
<p><strong>Email :</strong> <?= htmlspecialchars($et['email']) ?></p>
<p><strong>Téléphone :</strong> <?= htmlspecialchars($et['telephone']) ?></p>
<p><strong>Filière :</strong> <?= htmlspecialchars($et['filiere'] ?? 'Non renseignée') ?></p>
</div>
</section>
</div>


<?php include __DIR__ . '/../../includes/footer.php'; ?>
