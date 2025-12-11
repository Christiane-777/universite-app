<?php include __DIR__ . '/../../includes/header.php'; ?>


<div class="container">
<h2>Connexion Étudiant</h2>
<?php if (isset($_GET['success'])): ?>
<div class="card">Inscription réussie. Connectez-vous.</div>
<?php endif; ?>
<form action="<?= $BASE_PATH ?>/controllers/login.php" method="POST">
<label>Email</label>
<input type="email" name="email" required>
<label>Mot de passe</label>
<input type="password" name="password" required>
<button class="btn" type="submit">Se connecter</button>
</form>


<p>
    <a class="btn" href="<?= $BASE_PATH ?>/views/public/register.php">s' inscrire </a> <a  class="btn secondary" href="<?= $BASE_PATH ?>/views/admin/admin_login.php">Connexion Admin</a></p>
</div>


<?php include __DIR__ . '/../../includes/footer.php'; ?>