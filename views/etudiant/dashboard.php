<?php
session_start();
if (!isset($_SESSION['etudiant_id'])) header('Location: ../public/login.php');
include __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../config/database.php';
$db = new Database(); $conn = $db->connect();


$id = $_SESSION['etudiant_id'];
$stmt = $conn->prepare('SELECT e.*, f.nom AS filiere FROM etudiants e LEFT JOIN filieres f ON e.filiere_id = f.id WHERE e.id = ?');
$stmt->execute([$id]);
$et = $stmt->fetch(PDO::FETCH_ASSOC);


// paiement
$pay = $conn->prepare('SELECT * FROM paiements WHERE etudiant_id = ?');
$pay->execute([$id]); $paiement = $pay->fetch(PDO::FETCH_ASSOC);
$paiementStatut = $paiement['statut'] ?? 'non_paye';
$paiementMontant = $paiement['montant'] ?? 25000;


// docs count
$docCount = $conn->prepare('SELECT COUNT(*) FROM documents WHERE etudiant_id = ?');
$docCount->execute([$id]); $docs_nb = $docCount->fetchColumn();
$statutClass = 'status-' . ($et['statut_dossier'] ?? 'incomplet');
$statutLibelle = $et['statut_dossier'] ? ucfirst($et['statut_dossier']) : 'Incomplet';
?>

<div class="container student-layout">
<?php include __DIR__ . '/../../includes/navbar_etudiant.php'; ?>

<section class="student-main">
<div class="student-hero">
<div>
<p class="muted">Bienvenue,</p>
<h2><?= htmlspecialchars($et['prenom']) ?> <?= htmlspecialchars($et['nom']) ?></h2>
<p class="muted">Filière : <?= htmlspecialchars($et['filiere'] ?? 'Non renseignée') ?></p>
<div class="hero-actions">
<span class="status-pill <?= htmlspecialchars($statutClass) ?>"><span class="dot"></span><?= htmlspecialchars($statutLibelle) ?></span>
<span class="status-pill status-attente"><span class="dot"></span><?= htmlspecialchars($docs_nb) ?> document(s) envoyés</span>
</div>
</div>
<div class="hero-badge">
<p>Prochaine étape</p>
<strong><?= $paiementStatut === 'paye' ? 'Vérifier vos documents' : 'Régler les frais' ?></strong>
<a class="btn secondary" href="<?= $BASE_PATH ?>/views/etudiant/<?= $paiementStatut === 'paye' ? 'upload' : 'paiement' ?>.php">Gérer maintenant</a>
</div>
</div>


<div class="info-grid">
<div class="card info-card">
<div class="icon-bubble <?= $paiementStatut === 'paye' ? 'success' : 'warning' ?>">₣</div>
<div>
<p class="muted">Paiement</p>
<h3><?= htmlspecialchars(ucfirst($paiementStatut)) ?></h3>
<p>Montant : <strong><?= htmlspecialchars($paiementMontant) ?> FCFA</strong></p>
<a class="link-inline" href="<?= $BASE_PATH ?>/views/etudiant/paiement.php">Accéder au paiement</a>
</div>
</div>

<div class="card info-card">
<div class="icon-bubble muted">📄</div>
<div>
<p class="muted">Documents</p>
<h3><?= htmlspecialchars($docs_nb) ?> envoyé(s)</h3>
<p>Types requis : CNI, diplôme, relevés, photo</p>
<a class="link-inline" href="<?= $BASE_PATH ?>/views/etudiant/upload.php">Compléter mes fichiers</a>
</div>
</div>

<div class="card info-card">
<div class="icon-bubble">ℹ</div>
<div>
<p class="muted">Contact</p>
<h3><?= htmlspecialchars($et['email']) ?></h3>
<p><?= htmlspecialchars($et['telephone'] ?? 'Téléphone non renseigné') ?></p>
<a class="link-inline" href="<?= $BASE_PATH ?>/views/etudiant/profil.php">Mettre à jour mes infos</a>
</div>
</div>
</div>


<div class="card" style="margin-top:12px">
<h3>Actions rapides</h3>
<div class="quick-actions">
<a href="<?= $BASE_PATH ?>/views/etudiant/paiement.php">💳 Régler mes frais</a>
<a href="<?= $BASE_PATH ?>/views/etudiant/upload.php">⬆ Ajouter des documents</a>
<a href="<?= $BASE_PATH ?>/views/etudiant/profil.php">🪪 Mon profil</a>
</div>
</div>
</section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
