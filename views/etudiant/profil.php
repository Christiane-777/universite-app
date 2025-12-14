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
<p>Verifiez vos informations personnelles.</p>
</div>
<div class="card">
<p><strong>Nom :</strong> <?= htmlspecialchars($et['nom']) ?></p>
<p><strong>Prenom :</strong> <?= htmlspecialchars($et['prenom']) ?></p>
<p><strong>Email :</strong> <?= htmlspecialchars($et['email']) ?></p>
<p><strong>Telephone :</strong> <?= htmlspecialchars($et['telephone']) ?></p>
<p><strong>Filiere :</strong> <?= htmlspecialchars($et['filiere'] ?? 'Non renseignee') ?></p>
<p><strong>Nationalite :</strong> <?= htmlspecialchars($et['nationalite'] ?? 'Non renseignee') ?></p>
<p><strong>Ancienne ecole :</strong> <?= htmlspecialchars($et['ancien_ecole'] ?? 'Non renseigne') ?></p>
<p><strong>Pays de residence :</strong> <?= htmlspecialchars($et['pays_residence'] ?? 'Non renseigne') ?></p>
<p><strong>Niveau d'etude :</strong> <?= htmlspecialchars($et['niveau_etude'] ?? 'Non renseigne') ?></p>
<p><strong>Parent / Tuteur :</strong> <?= htmlspecialchars($et['parent_nom'] ?? 'Non renseigne') ?> - <?= htmlspecialchars($et['parent_contact'] ?? 'Contact non renseigne') ?></p>
</div>
</section>
</div>


<?php include __DIR__ . '/../../includes/footer.php'; ?>
