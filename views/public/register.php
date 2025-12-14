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
<h2>Student registration</h2>
<p class="auth-subtitle">Log in to your account to continue your application.</p>

<form class="auth-form two-col" action="<?= $BASE_PATH ?>/controllers/register.php" method="POST">
<div class="auth-field">
<label>First name</label>
<div class="input-shell">
<input type="text" name="nom" placeholder="Nom" required>
</div>
</div>

<div class="auth-field">
<label>Last name</label>
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
<label>Phone number</label>
<div class="input-shell">
<input type="text" name="telephone" placeholder="Numero de telephone">
</div>
</div>

<div class="auth-field">
<label>Date of birth</label>
<div class="input-shell">
<input type="date" name="date_naissance">
</div>
</div>

<div class="auth-field">
<label>Nationality</label>
<div class="input-shell">
<input type="text" name="nationalite" placeholder="Nationalite" required>
</div>
</div>

<div class="auth-field">
<label>Former school</label>
<div class="input-shell">
<input type="text" name="ancien_ecole" placeholder="Etablissement precedent" required>
</div>
</div>

<div class="auth-field">
<label>Country of residence</label>
<div class="input-shell">
<input type="text" name="pays_residence" placeholder="Pays de residence" required>
</div>
</div>

<div class="auth-field">
<label>Level of study</label>
<div class="input-shell">
<select name="niveau_etude" required>
<option value="">-- Select --</option>
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
<option value="">-- Choose --</option>
<?php foreach($filieres as $f): ?>
<option value="<?= $f['id'] ?>"><?= htmlspecialchars($f['nom']) ?></option>
<?php endforeach; ?>
</select>
</div>
</div>

<div class="auth-field">
<label>Password</label>
<div class="input-shell">
<span class="input-icon">🔒</span>
<input type="password" name="password" placeholder="********" required>
</div>
</div>

<div class="auth-field">
<label>Password confirmation</label>
<div class="input-shell">
<span class="input-icon">🔒</span>
<input type="password" name="confirm_password" placeholder="********" required>
</div>
</div>

<div class="auth-field">
<label>Parent's name (optionnal)</label>
<div class="input-shell">
<input type="text" name="parent_nom" placeholder="Nom et prenom du parent ou tuteur">
</div>
</div>

<div class="auth-field">
<label>Parent's number (optionnal)</label>
<div class="input-shell">
<input type="text" name="parent_contact" placeholder="Contact du parent ou tuteur">
</div>
</div>

<div class="auth-actions">
<button class="btn btn-auth" type="submit">Register</button>
<a class="link-inline" href="<?= $BASE_PATH ?>/views/public/login.php">Already registered, login </a>
</div>
</form>
</div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
