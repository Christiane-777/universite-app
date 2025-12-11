<?php $current = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); ?>

<aside class="admin-sidebar">
<div class="sidebar-brand">
<div class="sidebar-badge">Espace admin</div>
<div class="sidebar-title">Pilotage</div>
</div>

<ul class="sidebar-links">
<li class="<?= $current === 'dashboard_admin.php' ? 'active' : '' ?>">
<a href="<?= $BASE_PATH ?>/views/admin/dashboard_admin.php">
<span class="icon-wrap" aria-hidden="true">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
<rect x="3" y="3" width="8" height="8" rx="2"/>
<rect x="13" y="3" width="8" height="5" rx="2"/>
<rect x="13" y="10" width="8" height="11" rx="2"/>
<rect x="3" y="13" width="8" height="8" rx="2"/>
</svg>
</span>
<div class="link-text">
<span class="link-title">Dashboard</span>
<span class="link-subtitle">Vue globale</span>
</div>
</a>
</li>

<li class="<?= $current === 'liste_etudiants.php' ? 'active' : '' ?>">
<a href="<?= $BASE_PATH ?>/views/admin/liste_etudiants.php">
<span class="icon-wrap" aria-hidden="true">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
<path d="M7 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM3 20c0-2.2 2.5-4 5.5-4s5.5 1.8 5.5 4"/>
<path d="M15 11.5a3 3 0 1 0 0-5.9M16.5 20c0-1.4-1.2-2.7-3-3.4"/>
</svg>
</span>
<div class="link-text">
<span class="link-title">Étudiants</span>
<span class="link-subtitle">Liste & filtres</span>
</div>
</a>
</li>

<li class="<?= $current === 'dossier.php' ? 'active' : '' ?>">
<a href="<?= $BASE_PATH ?>/views/admin/dossier.php<?= isset($_GET['id']) ? '?id=' . urlencode($_GET['id']) : '' ?>">
<span class="icon-wrap" aria-hidden="true">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
<path d="M3 7a2 2 0 0 1 2-2h4l2 2h6a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"/>
<path d="M9 13h6"/>
<path d="M9 16h4"/>
</svg>
</span>
<div class="link-text">
<span class="link-title">Dossiers</span>
<span class="link-subtitle">Consultation</span>
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
