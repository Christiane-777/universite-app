<?php include __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../config/database.php';
$db = new Database(); $conn = $db->connect();
$filieres = $conn->query('SELECT * FROM filieres')->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
<h2>Inscription Étudiant</h2>
<form action="<?= $BASE_PATH ?>/controllers/register.php" method="POST">
<label>Nom</label>
<input type="text" name="nom" required>


<label>Prénom</label>
<input type="text" name="prenom" required>


<label>Email</label>
<input type="email" name="email" required>


<label>Téléphone</label>
<input type="text" name="telephone">


<label>Date de naissance</label>
<input type="date" name="date_naissance">


<label>Mot de passe</label>
<input type="password" name="password" required>


<label>Confirmer le mot de passe</label>
<input type="password" name="confirm_password" required>


<label>Filière</label>
<select name="filiere_id" required>
<option value="">-- Choisir --</option>
<?php foreach($filieres as $f): ?>
<option value="<?= $f['id'] ?>"><?= htmlspecialchars($f['nom']) ?></option>
<?php endforeach; ?>
</select>


<button class="btn" type="submit">S'inscrire</button>
<a class="btn secondary" href="<?= $BASE_PATH ?>/views/public/login.php">Se connecter</a>
</form>
</div>


<?php include __DIR__ . '/../../includes/footer.php'; ?>