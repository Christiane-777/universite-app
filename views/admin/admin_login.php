<?php include __DIR__ . '/../../includes/header.php'; ?>

<div class="auth-page">
<div class="auth-card">
<div class="auth-logo">
<img src="<?= $BASE_PATH ?>/assets/img/logo.png" alt="Logo" width="70">
</div>
<h2>Admin login</h2>
<p class="auth-subtitle">Access your admin space.</p>
<?php if (isset($_GET['success'])): ?>
<div class="auth-alert success">Connection successful.</div>
<?php endif; ?>

<form action="<?= $BASE_PATH ?>/controllers/login_admin.php" method="POST">
<div class="auth-field">
<label>Email</label>
<div class="input-shell">
<span class="input-icon">@</span>
<input type="email" name="email" placeholder="username@gmail.com" required>
</div>
</div>

<div class="auth-field">
<label>Mot de passe</label>
<div class="input-shell">
<span class="input-icon">🔒</span>
<input type="password" name="password" placeholder="********" required>
<span class="input-action" aria-hidden="true">👁</span>
</div>
</div>

<button class="btn btn-auth" type="submit">Login</button>
</form>

<div class="auth-links">
<a href="<?= $BASE_PATH ?>/views/admin/login.php">Return</a>
</div>
</div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

