<?php
session_start();

// Vérifier si l'utilisateur est connecté
$is_logged_in = isset($_SESSION['user_id']);
$user_name = $is_logged_in ? $_SESSION['username'] : '';

// Récupérer les statistiques globales de la plateforme (exemples réels)
$total_players = 1250;
$total_games_played = 5840;
$avg_score = 78;
$total_badges_earned = 3420;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindChallenge - Jeu Sérieux de Pensée Critique</title>
    <link rel="stylesheet" href="css/home.css">
    <style>
        /* Styles pour la section Fonctionnalités */
        .features {
            padding: 80px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .features .section-title {
            color: white;
            margin-bottom: 50px;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .feature-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .feature-card-icon {
            font-size: 3.5rem;
            margin-bottom: 20px;
            display: block;
        }
        
        .feature-card h3 {
            color: #667eea;
            font-size: 1.5rem;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .feature-card p {
            color: #666;
            line-height: 1.6;
            font-size: 1rem;
        }
        
        .feature-badge {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 15px;
        }

        /* Styles pour le Footer Copyright */
        .footer {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: white;
            padding: 40px 0 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 30px;
        }
        
        .footer-section h3 {
            color: #667eea;
            margin-bottom: 20px;
            font-size: 1.3rem;
        }
        
        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.8;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-section a:hover {
            color: #667eea;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: #667eea;
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 25px;
            text-align: center;
        }
        
        .copyright {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
        }
        
        .copyright a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        
        .copyright a:hover {
            text-decoration: underline;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo-section">
                <h1 class="logo">🧠 MindChallenge</h1>
                <p class="tagline">Développez votre pensée critique</p>
            </div>
            <nav class="nav">
                <ul class="nav-list">
                    <li><a href="#about">À Propos</a></li>
                    <li><a href="#stats">Statistiques</a></li>
                    <li><a href="#features">Fonctionnalités</a></li>
                    <?php if ($is_logged_in): ?>
                        <li><span class="user-greeting">Bienvenue, <?php echo htmlspecialchars($user_name); ?></span></li>
                        <li><a href="index.php?url=game/logout" class="btn-logout">Déconnexion</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2 class="hero-title">Relevez le Défi de la Pensée Critique</h2>
                <p class="hero-subtitle">Résolvez des problèmes complexes, gagnez des points et montez en niveau</p>
                <button class="btn-start" id="startPlayBtn">
                    <span class="btn-text">Let's Start Play</span>
                    <span class="btn-icon">🚀</span>
                </button>
            </div>
            <div class="hero-image">
                <div class="floating-card">
                    <span class="card-emoji">🎮</span>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title">À Propos de MindChallenge</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>
                        MindChallenge est une plateforme innovante de jeu sérieux conçue pour développer et améliorer votre pensée critique. 
                        À travers des scénarios réalistes et des défis progressifs, vous apprendrez à analyser, résoudre des problèmes et 
                        prendre des décisions éclairées.
                    </p>
                    <p>
                        Notre approche gamifiée rend l'apprentissage engageant et amusant. Gagnez des points, débloquez des badges et 
                        montez en niveau en complétant des missions de plus en plus difficiles.
                    </p>
                </div>
                <div class="about-features">
                    <div class="feature-item">
                        <span class="feature-icon">📊</span>
                        <h3>Analyse Profonde</h3>
                        <p>Apprenez à analyser les données et identifier les causes racines</p>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">🎯</span>
                        <h3>Résolution de Problèmes</h3>
                        <p>Développez des stratégies pour résoudre des défis complexes</p>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">🏆</span>
                        <h3>Gamification</h3>
                        <p>Progressez, gagnez des récompenses et comparez-vous aux autres</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section id="stats" class="statistics">
        <div class="container">
            <h2 class="section-title">Statistiques de la Communauté</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number" data-target="<?php echo $total_players; ?>">0</div>
                    <p class="stat-label">Joueurs Actifs</p>
                    <div class="stat-bar">
                        <div class="stat-fill" style="width: 85%;"></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-target="<?php echo $total_games_played; ?>">0</div>
                    <p class="stat-label">Jeux Joués</p>
                    <div class="stat-bar">
                        <div class="stat-fill" style="width: 92%;"></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-target="<?php echo $avg_score; ?>">0</div>
                    <p class="stat-label">Score Moyen</p>
                    <div class="stat-bar">
                        <div class="stat-fill" style="width: 78%;"></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-target="<?php echo $total_badges_earned; ?>">0</div>
                    <p class="stat-label">Badges Gagnés</p>
                    <div class="stat-bar">
                        <div class="stat-fill" style="width: 88%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Expressions Section -->
    <section class="expressions">
        <div class="container">
            <h2 class="section-title">Expressions Encourageantes</h2>
            <div class="expressions-carousel">
                <div class="expression-card">
                    <p class="expression-text">"La pensée critique est la clé du succès"</p>
                    <span class="expression-author">- Socrate</span>
                </div>
                <div class="expression-card">
                    <p class="expression-text">"Chaque problème est une opportunité d'apprendre"</p>
                    <span class="expression-author">- Tony Robbins</span>
                </div>
                <div class="expression-card">
                    <p class="expression-text">"L'analyse profonde mène à la sagesse"</p>
                    <span class="expression-author">- Confucius</span>
                </div>
                <div class="expression-card">
                    <p class="expression-text">"Questionnez tout, acceptez peu"</p>
                    <span class="expression-author">- Carl Sagan</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <h2 class="section-title">Fonctionnalités Principales</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <span class="feature-card-icon">🎮</span>
                    <h3>4 Jeux Interactifs</h3>
                    <p>Découvrez nos jeux variés : Challenge de Pensée Critique, Puzzle, Quiz et Fact or Fiction</p>
                    <span class="feature-badge">Disponible</span>
                </div>
                
                <div class="feature-card">
                    <span class="feature-card-icon">📊</span>
                    <h3>Suivi de Progression</h3>
                    <p>Suivez vos performances avec des statistiques détaillées et des graphiques en temps réel</p>
                    <span class="feature-badge">Disponible</span>
                </div>
                
                <div class="feature-card">
                    <span class="feature-card-icon">🏆</span>
                    <h3>Système de Badges</h3>
                    <p>Débloquez des badges et des récompenses en accomplissant des défis et en progressant</p>
                    <span class="feature-badge">Bientôt</span>
                </div>
                
                <div class="feature-card">
                    <span class="feature-card-icon">👥</span>
                    <h3>Compétition</h3>
                    <p>Comparez vos scores avec d'autres joueurs et grimpez dans le classement</p>
                    <span class="feature-badge">Bientôt</span>
                </div>
                
                <div class="feature-card">
                    <span class="feature-card-icon">💡</span>
                    <h3>Explications Détaillées</h3>
                    <p>Apprenez avec des explications complètes après chaque réponse pour comprendre vos erreurs</p>
                    <span class="feature-badge">Disponible</span>
                </div>
                
                <div class="feature-card">
                    <span class="feature-card-icon">📱</span>
                    <h3>Multi-Plateforme</h3>
                    <p>Jouez sur n'importe quel appareil : ordinateur, tablette ou smartphone</p>
                    <span class="feature-badge">Disponible</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer avec Copyright -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <!-- À Propos -->
                <div class="footer-section">
                    <h3 class="footer-logo">🧠 MindChallenge</h3>
                    <p>
                        Plateforme de jeu sérieux dédiée au développement de la pensée critique et des compétences analytiques.
                    </p>
                    <div class="social-links">
                        <a href="#" title="Facebook">📘</a>
                        <a href="#" title="Twitter">🐦</a>
                        <a href="#" title="Instagram">📷</a>
                        <a href="#" title="LinkedIn">💼</a>
                    </div>
                </div>
                
                <!-- Liens Rapides -->
                <div class="footer-section">
                    <h3>Liens Rapides</h3>
                    <ul class="footer-links">
                        <li><a href="#about">À Propos</a></li>
                        <li><a href="#stats">Statistiques</a></li>
                        <li><a href="#features">Fonctionnalités</a></li>
                        <li><a href="index.php?url=game/indexgames">Nos Jeux</a></li>
                    </ul>
                </div>
                
                <!-- Support -->
                <div class="footer-section">
                    <h3>Support</h3>
                    <ul class="footer-links">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Aide</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Confidentialité</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div class="footer-section">
                    <h3>Contact</h3>
                    <p>📧 contact@mindchallenge.com</p>
                    <p>📞 +212 6 99 99 99 99 </p>
                    <p>📍 Marrakech, Maroc</p>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="footer-bottom">
                <p class="copyright">
                    © <?php echo date('Y'); ?> <a href="#">MindChallenge</a>. Tous droits réservés. 
                    Développé avec 💜 par <a href="#">Votre Nom</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Modal de Connexion/Inscription -->
    <div id="authModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            
            <!-- Formulaire de Connexion -->
            <div class="auth-form login-form active">
                <h2>Connexion</h2>
                <form id="loginForm">
                    <div class="form-group">
                        <input type="email" placeholder="Email" required>
                        <span class="input-icon">✉️</span>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Mot de passe" required>
                        <span class="input-icon">🔒</span>
                    </div>
                    <button type="submit" class="btn-submit">Se Connecter</button>
                </form>
                <p class="toggle-form">Pas encore inscrit? <a href="#" class="toggle-link">S'inscrire</a></p>
            </div>

            <!-- Formulaire d'Inscription -->
            <div class="auth-form signup-form">
                <h2>Inscription</h2>
                <form id="signupForm">
                    <div class="form-group">
                        <input type="text" placeholder="Nom d'utilisateur" required>
                        <span class="input-icon">👤</span>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email" required>
                        <span class="input-icon">✉️</span>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Mot de passe" required>
                        <span class="input-icon">🔒</span>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Confirmer le mot de passe" required>
                        <span class="input-icon">🔒</span>
                    </div>
                    <button type="submit" class="btn-submit">S'Inscrire</button>
                </form>
                <p class="toggle-form">Déjà inscrit? <a href="#" class="toggle-link">Se Connecter</a></p>
            </div>
        </div>
    </div>
    
    <script src="js/home.js"></script>
</body>
</html>