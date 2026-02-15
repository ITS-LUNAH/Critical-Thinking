// ============================================
// GESTION DU MODAL D'AUTHENTIFICATION
// ============================================

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('authModal');
    const startPlayBtn = document.getElementById('startPlayBtn');
    const closeBtn = document.querySelector('.close');
    const loginForm = document.querySelector('.login-form');
    const signupForm = document.querySelector('.signup-form');
    const toggleLinks = document.querySelectorAll('.toggle-link');

    // Ouvrir le modal au clic sur "Let's Start Play"
    startPlayBtn.addEventListener('click', function() {
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    });

    // Fermer le modal au clic sur X
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    });

    // Fermer le modal au clic en dehors
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });

    // Basculer entre connexion et inscription
    toggleLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            loginForm.classList.toggle('active');
            signupForm.classList.toggle('active');
        });
    });

    // Gestion du formulaire de connexion
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
        handleLogin(this);
    });

    // Gestion du formulaire d'inscription
    document.getElementById('signupForm').addEventListener('submit', function(e) {
        e.preventDefault();
        handleSignup(this);
    });

    // Animation des statistiques au chargement
    animateStatistics();
});

// ============================================
// FONCTION DE CONNEXION
// ============================================
function handleLogin(form) {
    const email = form.querySelector('input[type="email"]').value;
    const password = form.querySelector('input[type="password"]').value;

    // Validation basique
    if (!email || !password) {
        showNotification('Veuillez remplir tous les champs', 'error');
        return;
    }

    // Afficher un loader
    const submitBtn = form.querySelector('.btn-submit');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = '⏳ Connexion en cours...';
    submitBtn.disabled = true;

    // Envoyer les données au serveur
    setTimeout(() => {
        fetch('AuthController.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'login',
                email: email,
                password: password
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('✓ Connexion réussie!', 'success');
                setTimeout(() => {
                    window.location.href = 'index.php?url=game/indexgames';
                }, 1500);
            } else {
                showNotification(data.message || 'Erreur de connexion', 'error');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            showNotification('Erreur de connexion au serveur', 'error');
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        });
    }, 500);
}

// ============================================
// FONCTION D'INSCRIPTION
// ============================================
function handleSignup(form) {
    const username = form.querySelector('input[type="text"]').value;
    const email = form.querySelectorAll('input[type="email"]')[0].value;
    const password = form.querySelectorAll('input[type="password"]')[0].value;
    const confirmPassword = form.querySelectorAll('input[type="password"]')[1].value;

    // Validation
    if (!username || !email || !password || !confirmPassword) {
        showNotification('Veuillez remplir tous les champs', 'error');
        return;
    }

    if (password !== confirmPassword) {
        showNotification('Les mots de passe ne correspondent pas', 'error');
        return;
    }

    if (password.length < 6) {
        showNotification('Le mot de passe doit contenir au moins 6 caractères', 'error');
        return;
    }

    if (!isValidEmail(email)) {
        showNotification('Veuillez entrer une adresse email valide', 'error');
        return;
    }

    // Afficher un loader
    const submitBtn = form.querySelector('.btn-submit');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = '⏳ Inscription en cours...';
    submitBtn.disabled = true;

    // Envoyer les données au serveur
    setTimeout(() => {
        fetch('AuthController.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'signup',
                username: username,
                email: email,
                password: password
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('✓ Inscription réussie! Redirection...', 'success');
                setTimeout(() => {
                    window.location.href = 'index.php?url=game/indexgames';
                }, 1500);
            } else {
                showNotification(data.message || 'Erreur lors de l\'inscription', 'error');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            showNotification('Erreur de connexion au serveur', 'error');
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        });
    }, 500);
}

// ============================================
// FONCTION DE NOTIFICATION
// ============================================

function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 16px 24px;
        background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#6366f1'};
        color: white;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        z-index: 2000;
        animation: slideInRight 0.3s ease-out;
        font-weight: 500;
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease-out';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// ============================================
// VALIDATION EMAIL
// ============================================

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// ============================================
// ANIMATION DES STATISTIQUES
// ============================================

function animateStatistics() {
    const statNumbers = document.querySelectorAll('.stat-number');

    const observerOptions = {
        threshold: 0.5
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                const target = parseInt(element.getAttribute('data-target'));
                animateCounter(element, target);
                observer.unobserve(element);
            }
        });
    }, observerOptions);

    statNumbers.forEach(number => observer.observe(number));
}

// ============================================
// ANIMATION DU COMPTEUR
// ============================================

function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const duration = 2000;
    const stepTime = duration / 50;

    const counter = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target.toLocaleString('fr-FR');
            clearInterval(counter);
        } else {
            element.textContent = Math.floor(current).toLocaleString('fr-FR');
        }
    }, stepTime);
}

// ============================================
// ANIMATIONS SUPPLÉMENTAIRES
// ============================================

// Animation des éléments au scroll
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'slideUp 0.6s ease-out forwards';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.feature-item, .expression-card, .stat-card').forEach(el => {
        observer.observe(el);
    });
});

// Ajouter les animations CSS manquantes
const style = document.createElement('style');
style.textContent = `
    @keyframes slideOutRight {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100px);
        }
    }

    .notification {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
`;
document.head.appendChild(style);
