document.addEventListener('DOMContentLoaded', function() {
const forms = document.querySelectorAll('form');
forms.forEach(form => {
// only for register form
if (!form.querySelector('input[name="confirm_password"]')) return;


form.addEventListener('submit', function(e){
const pwd = form.querySelector('input[name="password"]');
const confirm = form.querySelector('input[name="confirm_password"]');
const email = form.querySelector('input[type="email"]');


if (pwd.value.length < 6) {
e.preventDefault(); alert('Le mot de passe doit contenir au moins 6 caractères.'); pwd.focus(); return;
}
if (pwd.value !== confirm.value) {
e.preventDefault(); alert('Les mots de passe ne correspondent pas.'); confirm.focus(); return;
}
if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
e.preventDefault(); alert('Email invalide.'); email.focus(); return;
}
});
});
});