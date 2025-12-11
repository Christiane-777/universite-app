<?php
session_start();
if (!isset($_SESSION['etudiant_id'])) header('Location: ../public/login.php');
include __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../config/database.php';
$db = new Database(); $conn = $db->connect();


$id = $_SESSION['etudiant_id'];
$pay = $conn->prepare('SELECT * FROM paiements WHERE etudiant_id = ?');
$pay->execute([$id]); $paiement = $pay->fetch(PDO::FETCH_ASSOC);
if (!$paiement) { $conn->prepare('INSERT INTO paiements (etudiant_id) VALUES (?)')->execute([$id]); $pay->execute([$id]); $paiement = $pay->fetch(PDO::FETCH_ASSOC); }
?>


<div class="container student-layout">
<?php include __DIR__ . '/../../includes/navbar_etudiant.php'; ?>

<section class="student-main">
<div class="page-header">
<h2>Frais d'inscription</h2>
<p>Réglez vos droits d'inscription en toute sécurité.</p>
</div>
<div class="card">
<p>Montant : <strong><?= htmlspecialchars($paiement['montant']) ?> FCFA</strong></p>
<p>Statut : <strong><?= htmlspecialchars($paiement['statut']) ?></strong></p>
<?php if ($paiement['statut'] === 'non_paye'): ?>
<form action="<?= $BASE_PATH ?>/controllers/paiement.php" method="POST">
<button class="btn" type="submit">Payer maintenant (simulateur)</button>
</form>
<?php else: ?>
<p>Paiement effectué le <?= htmlspecialchars($paiement['date_paiement']) ?></p>
<?php endif; ?>
</div>
</section>
</div>


<?php include __DIR__ . '/../../includes/footer.php'; ?>
