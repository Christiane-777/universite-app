<?php include __DIR__ . '/../../includes/header.php'; ?>


<div class="container">
<h2>Connexion Administrateur</h2>
<form action="<?= $BASE_PATH ?>/controllers/login_admin.php" method="POST">
<label>Email</label>
<input type="email" name="email" required>
<label>Mot de passe</label>
<input type="password" name="password" required>
<button class="btn" type="submit">Connexion</button>
</form>
</div>


<?php include __DIR__ . '/../../includes/footer.php'; ?>