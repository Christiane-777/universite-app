<?php $current = basename($_SERVER['PHP_SELF']); ?>

<aside class="student-sidebar">
<div class="sidebar-brand">
<div class="sidebar-badge">Espace étudiant</div>
<div class="sidebar-title">Mon parcours</div>
</div>

<ul class="sidebar-links">
<li class="<?= $current === 'dashboard.php' ? 'active' : '' ?>">
<a href="<?= $BASE_PATH ?>/views/etudiant/dashboard.php">
<span class="icon-wrap" aria-hidden="true">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
<path d="M3 12L12 4l9 8"/>
<path d="M5 10v10h5v-5h4v5h5V10"/>
</svg>
</span>
<div class="link-text">
<span class="link-title">Tableau de bord</span>
<span class="link-subtitle">Vue d'ensemble</span>
</div>
</a>
</li>

<li class="<?= $current === 'paiement.php' ? 'active' : '' ?>">
<a href="<?= $BASE_PATH ?>/views/etudiant/paiement.php">
<span class="icon-wrap" aria-hidden="true">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
<rect x="3" y="6" width="18" height="12" rx="2"/>
<path d="M7 12h5M7 9h2.5"/>
</svg>
</span>
<div class="link-text">
<span class="link-title">Paiement</span>
<span class="link-subtitle">Frais d'inscription</span>
</div>
</a>
</li>

<li class="<?= $current === 'upload.php' ? 'active' : '' ?>">
<a href="<?= $BASE_PATH ?>/views/etudiant/upload.php">
<span class="icon-wrap" aria-hidden="true">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
<path d="M12 16V4M7 9l5-5 5 5"/>
<rect x="4" y="14" width="16" height="6" rx="2"/>
</svg>
</span>
<div class="link-text">
<span class="link-title">Documents</span>
<span class="link-subtitle">Téléverser & suivre</span>
</div>
</a>
</li>

<li class="<?= $current === 'profil.php' ? 'active' : '' ?>">
<a href="<?= $BASE_PATH ?>/views/etudiant/profil.php">
<span class="icon-wrap" aria-hidden="true">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
<circle cx="12" cy="8" r="4"/>
<path d="M5 20c1.5-3 4-4.5 7-4.5s5.5 1.5 7 4.5"/>
</svg>
</span>
<div class="link-text">
<span class="link-title">Profil</span>
<span class="link-subtitle">Infos personnelles</span>
</div>
</a>
</li>
</ul>

<a class="sidebar-logout" href="<?= $BASE_PATH ?>/controllers/logout.php">
<span class="icon-wrap" aria-hidden="true">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
<path d="M10 6V4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2h-6a2 2 0 0 1-2-2v-2"/>
<path d="M15 12H3m4-4-4 4 4 4"/>
</svg>
</span>
<span class="link-title">Déconnexion</span>
</a>
</aside>
