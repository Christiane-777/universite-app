<?php
session_start();
if (!isset($_SESSION['admin_id'])) header('Location: admin_login.php');
include __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../config/database.php';
$db = new Database(); $conn = $db->connect();

$search = $_GET['search'] ?? '';
$filiere_filter = $_GET['filiere'] ?? '';
$statut_filter = $_GET['statut'] ?? '';

$query = "SELECT e.*, f.nom AS filiere,
(SELECT statut FROM paiements p WHERE p.etudiant_id=e.id LIMIT 1) AS pay_statut
FROM etudiants e LEFT JOIN filieres f ON e.filiere_id = f.id WHERE (e.nom LIKE :search OR e.prenom LIKE :search)";
if ($filiere_filter) $query .= " AND e.filiere_id = :filiere";
if ($statut_filter) $query .= " AND e.statut_dossier = :statut";

$stmt = $conn->prepare($query);
$stmt->bindValue(':search', "%$search%");
if ($filiere_filter) $stmt->bindValue(':filiere', $filiere_filter);
if ($statut_filter) $stmt->bindValue(':statut', $statut_filter);
$stmt->execute();
$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);

$filieres = $conn->query('SELECT * FROM filieres')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container dashboard-layout">
<?php include __DIR__ . '/../../includes/navbar_admin.php'; ?>

<section class="dashboard-main">
<h2>Liste des étudiants</h2>
<form method="GET" class="filter-form" style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:12px">
<input type="text" name="search" placeholder="Recherche" value="<?= htmlspecialchars($search) ?>">
<select name="filiere">
<option value="">Toutes</option>
<?php foreach($filieres as $f): ?>
<option value="<?= $f['id'] ?>" <?= $filiere_filter == $f['id'] ? 'selected' : '' ?>><?= htmlspecialchars($f['nom']) ?></option>
<?php endforeach; ?>
</select>
<select name="statut">
<option value="">Tous statuts</option>
<option value="attente" <?= $statut_filter == 'attente' ? 'selected' : '' ?>>En attente</option>
<option value="valide" <?= $statut_filter == 'valide' ? 'selected' : '' ?>>Validé</option>
<option value="rejete" <?= $statut_filter == 'rejete' ? 'selected' : '' ?>>Rejeté</option>
</select>
<button class="btn" type="submit">Filtrer</button>
</form>

<table class="table">
<tr><th>Nom</th><th>Email</th><th>Filière</th><th>Statut dossier</th><th>Paiement</th><th>Action</th></tr>
<?php foreach($etudiants as $e): ?>
<tr>
<td><?= htmlspecialchars($e['nom']) ?> <?= htmlspecialchars($e['prenom']) ?></td>
<td><?= htmlspecialchars($e['email']) ?></td>
<td><?= htmlspecialchars($e['filiere']) ?></td>
<td><?= htmlspecialchars($e['statut_dossier']) ?></td>
<td><?= $e['pay_statut'] ? htmlspecialchars($e['pay_statut']) : 'non renseigné' ?></td>
<td><a class="btn secondary" href="<?= $BASE_PATH ?>/views/admin/dossier.php?id=<?= $e['id'] ?>">Détails</a></td>
</tr>
<?php endforeach; ?>
</table>
</section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
