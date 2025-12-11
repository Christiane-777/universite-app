<?php
session_start();
if (!isset($_SESSION['admin_id'])) header('Location: admin_login.php');
include __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../config/database.php';
$db = new Database(); $conn = $db->connect();

$total_etudiants = $conn->query('SELECT COUNT(*) FROM etudiants')->fetchColumn();
$total_paiements = $conn->query("SELECT COUNT(*) FROM paiements WHERE statut='paye'")->fetchColumn();
$attente = $conn->query("SELECT COUNT(*) FROM etudiants WHERE statut_dossier='attente'")->fetchColumn();
$valides = $conn->query("SELECT COUNT(*) FROM etudiants WHERE statut_dossier='valide'")->fetchColumn();
$rejetes = $conn->query("SELECT COUNT(*) FROM etudiants WHERE statut_dossier='rejete'")->fetchColumn();

$lastEtudiants = $conn->query("SELECT e.id, e.nom, e.prenom, e.email, e.statut_dossier, f.nom AS filiere,
(SELECT statut FROM paiements p WHERE p.etudiant_id=e.id LIMIT 1) AS pay_statut
FROM etudiants e LEFT JOIN filieres f ON f.id=e.filiere_id ORDER BY e.created_at DESC LIMIT 10")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container dashboard-layout">
<?php include __DIR__ . '/../../includes/navbar_admin.php'; ?>

<section class="dashboard-main">
<div class="admin-hero">
<div>
<p class="muted">Vue globale</p>
<h2>Pilotage des inscriptions</h2>
<p class="muted">Suivez les dossiers, paiements et documents.</p>
</div>
<div class="hero-actions">
<a class="btn secondary" href="<?= $BASE_PATH ?>/views/admin/liste_etudiants.php">Liste complète</a>
<a class="btn" href="<?= $BASE_PATH ?>/views/admin/dashboard_admin.php">Rafraîchir</a>
</div>
</div>

<div class="stats-grid">
<div class="card kpi-card"><div class="icon-bubble">Σ</div><div><h3>Total Étudiants</h3><p class="muted"><?= $total_etudiants ?></p></div></div>
<div class="card kpi-card"><div class="icon-bubble success">₣</div><div><h3>Paiements validés</h3><p class="muted"><?= $total_paiements ?></p></div></div>
<div class="card kpi-card"><div class="icon-bubble warning">⏳</div><div><h3>En attente</h3><p class="muted"><?= $attente ?></p></div></div>
<div class="card kpi-card"><div class="icon-bubble success">✔</div><div><h3>Validés</h3><p class="muted"><?= $valides ?></p></div></div>
<div class="card kpi-card"><div class="icon-bubble muted">✖</div><div><h3>Rejetés</h3><p class="muted"><?= $rejetes ?></p></div></div>
</div>

<div class="card">
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
<h3>Derniers inscrits</h3>
<a class="link-inline" href="<?= $BASE_PATH ?>/views/admin/liste_etudiants.php">Voir tous les inscrits</a>
</div>
<table class="table">
<tr><th>Nom</th><th>Email</th><th>Filière</th><th>Dossier</th><th>Paiement</th><th>Action</th></tr>
<?php foreach($lastEtudiants as $e): ?>
<?php
$dossierClass = 'status-pill ';
switch($e['statut_dossier']) {
case 'valide': $dossierClass .= 'status-valide'; break;
case 'attente': $dossierClass .= 'status-attente'; break;
case 'rejete': $dossierClass .= 'status-rejete'; break;
default: $dossierClass .= 'status-incomplet';
}
$payClass = $e['pay_statut'] === 'paye' ? 'status-pill status-valide' : 'status-pill status-incomplet';
$payLabel = $e['pay_statut'] ? $e['pay_statut'] : 'non payé';
?>
<tr>
<td><?= htmlspecialchars($e['nom']) ?> <?= htmlspecialchars($e['prenom']) ?></td>
<td><?= htmlspecialchars($e['email']) ?></td>
<td><?= htmlspecialchars($e['filiere'] ?? '-') ?></td>
<td><span class="<?= $dossierClass ?>"><span class="dot"></span><?= htmlspecialchars($e['statut_dossier'] ?? '-') ?></span></td>
<td><span class="<?= $payClass ?>"><span class="dot"></span><?= htmlspecialchars($payLabel) ?></span></td>
<td><a class="btn secondary" href="<?= $BASE_PATH ?>/views/admin/dossier.php?id=<?= $e['id'] ?>">Détails</a></td>
</tr>
<?php endforeach; ?>
</table>
</div>
</section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
