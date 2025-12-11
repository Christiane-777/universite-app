<?php
session_start();
if (!isset($_SESSION['admin_id'])) header('Location: admin_login.php');
require_once __DIR__ . '/../../config/database.php';
$db = new Database(); $conn = $db->connect();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $conn->prepare('SELECT e.*, f.nom AS filiere FROM etudiants e LEFT JOIN filieres f ON e.filiere_id = f.id WHERE e.id = ?');
$stmt->execute([$id]); $et = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$et) die('Étudiant introuvable');

$docsStmt = $conn->prepare('SELECT type_document, fichier_path, uploaded_at FROM documents WHERE etudiant_id = ?');
$docsStmt->execute([$id]); $docs = $docsStmt->fetchAll(PDO::FETCH_ASSOC);
$payStmt = $conn->prepare('SELECT * FROM paiements WHERE etudiant_id = ?');
$payStmt->execute([$id]); $pay = $payStmt->fetch(PDO::FETCH_ASSOC);

include __DIR__ . '/../../includes/header.php';
?>

<div class="container dashboard-layout">
<?php include __DIR__ . '/../../includes/navbar_admin.php'; ?>

<section class="dashboard-main">
<h2>Dossier : <?= htmlspecialchars($et['nom']) ?> <?= htmlspecialchars($et['prenom']) ?></h2>

<div class="card">
<h3>Informations</h3>
<p><strong>Email:</strong> <?= htmlspecialchars($et['email']) ?></p>
<p><strong>Téléphone:</strong> <?= htmlspecialchars($et['telephone']) ?></p>
<p><strong>Filière:</strong> <?= htmlspecialchars($et['filiere']) ?></p>
<p><strong>Statut dossier:</strong> <?= htmlspecialchars($et['statut_dossier']) ?></p>
<?php if ($et['motif_rejet']): ?><p><strong>Motif rejet:</strong> <?= htmlspecialchars($et['motif_rejet']) ?></p><?php endif; ?>
</div>

<div class="card">
<h3>Documents envoyés</h3>
<?php if ($docs): ?>
<table class="table">
<tr><th>Type</th><th>Fichier</th><th>Date</th></tr>
<?php foreach($docs as $d): ?>
<tr>
<td><?= htmlspecialchars(strtoupper($d['type_document'])) ?></td>
<td><a class="link-inline" href="<?= $BASE_PATH ?>/assets/uploads/<?= htmlspecialchars($d['fichier_path']) ?>" target="_blank">Voir</a></td>
<td><?= htmlspecialchars($d['uploaded_at']) ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php else: ?>
<p>Aucun document.</p>
<?php endif; ?>
</div>

<div class="card">
<h3>Paiement</h3>
<?php if ($pay): ?>
<p>Statut: <strong><?= htmlspecialchars($pay['statut']) ?></strong></p>
<?php if ($pay['date_paiement']) : ?><p>Date paiement: <?= htmlspecialchars($pay['date_paiement']) ?></p><?php endif; ?>
<p>Montant: <?= htmlspecialchars($pay['montant']) ?> FCFA</p>
<?php else: ?>
<p>Aucun paiement.</p>
<?php endif; ?>
</div>

<div class="card">
<h3>Actions</h3>
<form action="<?= $BASE_PATH ?>/controllers/admin_actions.php" method="POST">
<input type="hidden" name="id" value="<?= $id ?>">
<label>Motif (en cas de rejet)</label>
<input type="text" name="motif" placeholder="Motif du rejet (optionnel)">
<div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:8px">
<button class="btn success" name="action" value="valider">Valider</button>
<button class="btn danger" name="action" value="rejeter">Rejeter</button>
</div>
</form>
</div>
</section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
