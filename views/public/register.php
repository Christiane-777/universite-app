<?php include __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../config/database.php';
$db = new Database(); $conn = $db->connect();
$filieres = $conn->query('SELECT * FROM filieres')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="auth-page">
<div class="auth-card wide">
<div class="auth-logo">
    <img src="<?= $BASE_PATH ?>/assets/img/logo.png" alt="Logo" width="70">
</div>
<h2>Inscription Etudiant</h2>
<p class="auth-subtitle">Creez votre compte pour poursuivre votre dossier.</p>

<form class="auth-form two-col" action="<?= $BASE_PATH ?>/controllers/register.php" method="POST">
<div class="auth-field">
<label>Nom</label>
<div class="input-shell">
<input type="text" name="nom" placeholder="Nom" required>
</div>
</div>

<div class="auth-field">
<label>Prenom</label>
<div class="input-shell">
<input type="text" name="prenom" placeholder="Prenom" required>
</div>
</div>

<div class="auth-field">
<label>Email</label>
<div class="input-shell">
<span class="input-icon">@</span>
<input type="email" name="email" placeholder="username@gmail.com" required>
</div>
</div>

<div class="auth-field">
<label>Telephone</label>
<div class="input-shell">
<input type="text" name="telephone" placeholder="Numero de telephone">
</div>
</div>

<div class="auth-field">
<label>Date de naissance</label>
<div class="input-shell">
<input type="date" name="date_naissance">
</div>
</div>

<div class="auth-field">
<label>Nationalite</label>
<div class="input-shell">
<input type="text" name="nationalite" placeholder="Nationalite" required>
</div>
</div>

<div class="auth-field">
<label>Ancienne ecole</label>
<div class="input-shell">
<input type="text" name="ancien_ecole" placeholder="Etablissement precedent" required>
</div>
</div>

<div class="auth-field">
<label>Pays de residence</label>
<div class="input-shell">
<input type="text" name="pays_residence" placeholder="Pays de residence" required>
</div>
</div>

<div class="auth-field">
<label>Niveau d'etude</label>
<div class="input-shell">
<select name="niveau_etude" required>
<option value="">-- Selectionner --</option>
<?php for ($i = 1; $i <= 5; $i++): ?>
<option value="<?= $i ?>"><?= $i ?></option>
<?php endfor; ?>
</select>
</div>
</div>

<div class="auth-field">
<label>Filiere</label>
<div class="input-shell">
<select name="filiere_id" required>
<option value="">-- Choisir --</option>
<?php foreach($filieres as $f): ?>
<option value="<?= $f['id'] ?>"><?= htmlspecialchars($f['nom']) ?></option>
<?php endforeach; ?>
</select>
</div>
</div>

<div class="auth-field">
<label>Mot de passe</label>
<div class="input-shell">
<span class="input-icon">🔒</span>
<input type="password" name="password" placeholder="********" required>
</div>
</div>

<div class="auth-field">
<label>Confirmer le mot de passe</label>
<div class="input-shell">
<span class="input-icon">🔒</span>
<input type="password" name="confirm_password" placeholder="********" required>
</div>
</div>

<div class="auth-field">
<label>Nom du parent (optionnel)</label>
<div class="input-shell">
<input type="text" name="parent_nom" placeholder="Nom et prenom du parent ou tuteur">
</div>
</div>

<div class="auth-field">
<label>Numero du parent (optionnel)</label>
<div class="input-shell">
<input type="text" name="parent_contact" placeholder="Contact du parent ou tuteur">
</div>
</div>

<div class="auth-actions">
<button class="btn btn-auth" type="submit">S'inscrire</button>
<a class="link-inline" href="<?= $BASE_PATH ?>/views/public/login.php">Deja inscrit ? Se connecter</a>
</div>
</form>
</div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
