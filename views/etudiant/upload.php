<?php
session_start();
if (!isset($_SESSION['etudiant_id'])) header('Location: ../public/login.php');
include __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../config/database.php';
$db = new Database(); $conn = $db->connect();
$id = $_SESSION['etudiant_id'];

$docStmt = $conn->prepare('SELECT type_document, fichier_path, uploaded_at FROM documents WHERE etudiant_id = ? ORDER BY uploaded_at DESC');
$docStmt->execute([$id]);
$docs = $docStmt->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container student-layout">
<?php include __DIR__ . '/../../includes/navbar_etudiant.php'; ?>

<section class="student-main">
<div class="page-header">
<h2>Téléversement des documents</h2>
<p>Ajoutez vos pièces justificatives pour finaliser votre dossier.</p>
</div>
<?php if (isset($_GET['success'])): ?>
<div class="card">Documents envoyés avec succès.</div>
<?php endif; ?>


<form action="<?= $BASE_PATH ?>/controllers/upload_docs.php" method="POST" enctype="multipart/form-data">
<label>Carte d'identité (PDF/JPG/PNG)</label>
<input type="file" name="cni" required>


<label>Diplôme (PDF/JPG/PNG)</label>
<input type="file" name="diplome" required>


<label>Relevé(s) (PDF/JPG/PNG)</label>
<input type="file" name="releve" required>


<label>Photo d'identité (JPG/PNG)</label>
<input type="file" name="photo" required>


<button class="btn" type="submit">Envoyer les documents</button>
</form>

<?php if ($docs): ?>
<div class="card" style="margin-top:14px">
<h3>Documents envoyés</h3>
<div class="table" style="overflow:auto">
<table style="min-width:100%">
<thead>
<tr>
<th>Type</th>
<th>Fichier</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<?php foreach ($docs as $doc): ?>
<tr>
<td><?= htmlspecialchars(strtoupper($doc['type_document'])) ?></td>
<td><a class="link-inline" href="<?= $BASE_PATH ?>/assets/uploads/<?= htmlspecialchars($doc['fichier_path']) ?>" target="_blank">Voir le fichier</a></td>
<td><?= htmlspecialchars($doc['uploaded_at']) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
<?php endif; ?>
</section>
</div>


<?php include __DIR__ . '/../../includes/footer.php'; ?>
