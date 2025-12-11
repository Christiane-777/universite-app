document.addEventListener('DOMContentLoaded', function() {
document.querySelectorAll('form button[value="rejeter"]').forEach(btn => {
btn.addEventListener('click', function(e){ if (!confirm('Confirmer le rejet ?')) e.preventDefault(); });
});
});