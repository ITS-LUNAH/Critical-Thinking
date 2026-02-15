<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critical Thinking Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <style>
        .sortable-ghost { 
            opacity: 0.4; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transform: scale(1.05);
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        
        .animate-slideIn { animation: slideIn 0.5s ease-out; }
        .animate-shake { animation: shake 0.5s ease-in-out; }
        
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .badge:hover { transform: scale(1.1); }
        
        .step-item {
            transition: all 0.3s ease;
        }
        
        .step-item:hover {
            transform: translateX(5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .btn-return {
            display: inline-block;
            padding: 18px 40px;
            font-size: 1.15em;
            font-weight: 700;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.3);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-return:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.5);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-blue-100 min-h-screen p-4 md:p-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header avec Score -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 animate-slideIn">
            <div class="flex justify-between items-center flex-wrap gap-4">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                        🧠 Challenge de Pensée Critique
                    </h1>
                    <p class="text-gray-600 mt-2">Développe ton esprit critique de manière ludique!</p>
                </div>
                
                <div class="flex gap-4 items-center">
                    <div class="badge bg-yellow-100 text-yellow-700">
                        <span class="text-2xl">⭐</span>
                        <span id="score">0</span> points
                    </div>
                    <div class="badge bg-purple-100 text-purple-700">
                        <span class="text-2xl">🏆</span>
                        <span id="level">Niveau 1</span>
                    </div>
                </div>
            </div>

            <div class="mt-4 bg-gray-200 rounded-full h-3 overflow-hidden">
                <div id="progress-bar" class="bg-gradient-to-r from-purple-500 to-pink-500 h-full transition-all duration-500" style="width: 0%"></div>
            </div>
        </div>

        <!-- Situation -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-6 animate-slideIn" style="animation-delay: 0.1s">
            <div class="mb-6 p-6 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-lg border-l-4 border-purple-500">
                <div class="flex items-start gap-4">
                    <span class="text-5xl">🎯</span>
                    <div>
                        <h2 class="text-2xl font-bold text-purple-800 mb-2"><?php echo htmlspecialchars($data['situation']['title']); ?></h2>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            <?php echo htmlspecialchars($data['situation']['description']); ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6 rounded">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">💡</span>
                    <p class="text-gray-700 font-medium">
                        Fais glisser les étapes ci-dessous pour les mettre dans le bon ordre logique!
                    </p>
                </div>
            </div>

            <!-- Liste des étapes -->
            <ul id="steps-list" class="space-y-4 mb-8">
                <?php foreach ($data['steps'] as $step): ?>
                    <li class="step-item p-5 bg-white border-2 border-gray-200 rounded-xl cursor-move hover:border-purple-400 flex items-center gap-4 shadow-sm" data-id="<?php echo $step['id']; ?>">
                        <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold px-4 py-2 rounded-full text-lg shadow-md">?</span>
                        <span class="text-gray-800 text-lg flex-1"><?php echo htmlspecialchars($step['content']); ?></span>
                        <span class="text-2xl opacity-30">☰</span>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Boutons -->
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <button id="check-btn" class="w-full md:w-auto bg-gradient-to-r from-purple-600 to-pink-600 text-white px-10 py-4 rounded-xl font-bold text-lg hover:from-purple-700 hover:to-pink-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                    ✅ Vérifier mon ordre
                </button>
                
                <button id="hint-btn" class="w-full md:w-auto bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-8 py-4 rounded-xl font-bold text-lg hover:from-blue-600 hover:to-cyan-600 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                    💭 Obtenir un indice (-10 points)
                </button>

                <button id="reset-btn" class="w-full md:w-auto bg-gradient-to-r from-gray-500 to-gray-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:from-gray-600 hover:to-gray-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                    🔄 Nouvelle situation
                </button>
            </div>

            <div id="feedback" class="hidden mt-6 p-6 rounded-xl text-center text-xl font-bold animate-slideIn"></div>
        </div>

        <!-- Badges -->
        <div id="badges-section" class="bg-white rounded-xl shadow-lg p-6 animate-slideIn" style="animation-delay: 0.2s">
            <h3 class="text-2xl font-bold text-purple-700 mb-4">🏅 Tes Badges</h3>
            <div id="badges-container" class="flex flex-wrap gap-3"></div>
        </div>
        <!-- Bouton Retour aux Jeux -->
   <div style="text-align: center; margin-top: 30px;">
            <a href="index.php?url=game/indexgames" class="btn-return">
                ← Retour aux Jeux
            </a>
        </div>
    </div>

    <script>
        let gameState = {
            score: parseInt(localStorage.getItem('gameScore')) || 0,
            level: parseInt(localStorage.getItem('gameLevel')) || 1,
            badges: JSON.parse(localStorage.getItem('gameBadges') || '[]'),
            attempts: 0,
            hintsUsed: 0
        };

        const el = document.getElementById('steps-list');
        const sortable = new Sortable(el, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            onEnd: updateStepNumbers
        });

        function updateStepNumbers() {
            Array.from(el.children).forEach((li, index) => {
                li.querySelector('span').textContent = index + 1;
            });
        }

        updateScore();
        updateBadges();

        document.getElementById('check-btn').addEventListener('click', function() {
            const order = Array.from(el.children).map(li => li.getAttribute('data-id'));
            const formData = new FormData();
            formData.append('situation_id', '<?php echo $data['situation']['id']; ?>');
            formData.append('order', JSON.stringify(order));

            gameState.attempts++;

            // CORRECTION ICI : La bonne URL selon le routing
            fetch('index.php?url=game/check', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                showFeedback(data.success);
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors de la vérification. Vérifie la console.');
            });
        });

        document.getElementById('hint-btn').addEventListener('click', function() {
            if (gameState.hintsUsed >= 2) {
                alert('Tu as déjà utilisé tous tes indices !');
                return;
            }

            gameState.score = Math.max(0, gameState.score - 10);
            gameState.hintsUsed++;

            const hints = [
                "💡 Commence toujours par identifier clairement le problème et l'objectif !",
                "💡 La planification et la logistique viennent avant la promotion de l'événement !"
            ];

            alert(hints[gameState.hintsUsed - 1]);
            updateScore();
            saveState();
        });

        document.getElementById('reset-btn').addEventListener('click', function() {
            location.reload();
        });

        function showFeedback(isCorrect) {
            const feedback = document.getElementById('feedback');
            feedback.classList.remove('hidden', 'bg-green-100', 'bg-red-100', 'animate-shake');
            
            if (isCorrect) {
                let points = 100;
                if (gameState.attempts === 1) points += 50;
                if (gameState.hintsUsed === 0) points += 30;
                
                gameState.score += points;
                
                feedback.innerHTML = `
                    <div class="flex flex-col items-center gap-4">
                        <span class="text-6xl">🎉</span>
                        <p class="text-3xl font-bold text-green-600">BRAVO ! C'est parfait !</p>
                        <p class="text-xl text-gray-700">Tu as gagné <span class="text-green-600 font-bold">${points} points</span> !</p>
                        <div class="flex gap-2 text-sm flex-wrap justify-center">
                            ${gameState.attempts === 1 ? '<span class="badge bg-yellow-100 text-yellow-700">⚡ Première tentative +50</span>' : ''}
                            ${gameState.hintsUsed === 0 ? '<span class="badge bg-blue-100 text-blue-700">🧠 Sans indice +30</span>' : ''}
                        </div>
                    </div>
                `;
                feedback.classList.add('bg-gradient-to-r', 'from-green-50', 'to-emerald-50', 'border-4', 'border-green-300');
                
                confetti({
                    particleCount: 150,
                    spread: 70,
                    origin: { y: 0.6 }
                });

                checkBadges();
                
            } else {
                feedback.innerHTML = `
                    <div class="flex flex-col items-center gap-4">
                        <span class="text-6xl">🤔</span>
                        <p class="text-2xl font-bold text-orange-600">Pas tout à fait...</p>
                        <p class="text-lg text-gray-700">Réfléchis à nouveau : quelle est la première chose à faire avant tout ?</p>
                        <p class="text-sm text-gray-500">Tentative ${gameState.attempts}/3</p>
                    </div>
                `;
                feedback.classList.add('bg-gradient-to-r', 'from-orange-50', 'to-yellow-50', 'border-4', 'border-orange-300', 'animate-shake');
            }
            
            updateScore();
            saveState();
        }

        function updateScore() {
            document.getElementById('score').textContent = gameState.score;
            
            const newLevel = Math.floor(gameState.score / 500) + 1;
            if (newLevel > gameState.level) {
                gameState.level = newLevel;
                showLevelUp();
            }
            
            document.getElementById('level').textContent = `Niveau ${gameState.level}`;
            
            const progress = (gameState.score % 500) / 500 * 100;
            document.getElementById('progress-bar').style.width = progress + '%';
        }

        function showLevelUp() {
            confetti({
                particleCount: 200,
                spread: 100,
                origin: { y: 0.5 }
            });
            
            setTimeout(() => alert(`🎊 NIVEAU ${gameState.level} ATTEINT ! 🎊`), 500);
        }

        function checkBadges() {
            const badges = [
                { id: 'first', name: 'Premier Succès', icon: '🌟', cond: () => gameState.score >= 100 },
                { id: 'perfect', name: 'Perfectionniste', icon: '💎', cond: () => gameState.attempts === 1 },
                { id: 'genius', name: 'Génie', icon: '🧠', cond: () => gameState.hintsUsed === 0 },
                { id: 'level5', name: 'Expert Niveau 5', icon: '🏆', cond: () => gameState.level >= 5 },
                { id: 'master', name: 'Maître', icon: '👑', cond: () => gameState.score >= 1000 }
            ];

            badges.forEach(b => {
                if (!gameState.badges.includes(b.id) && b.cond()) {
                    gameState.badges.push(b.id);
                    setTimeout(() => alert(`🎉 NOUVEAU BADGE !\n\n${b.icon} ${b.name}`), 1500);
                }
            });

            updateBadges();
        }

        function updateBadges() {
            const all = [
                { id: 'first', name: 'Premier Succès', icon: '🌟' },
                { id: 'perfect', name: 'Perfectionniste', icon: '💎' },
                { id: 'genius', name: 'Génie', icon: '🧠' },
                { id: 'level5', name: 'Expert Niveau 5', icon: '🏆' },
                { id: 'master', name: 'Maître', icon: '👑' }
            ];

            const container = document.getElementById('badges-container');
            container.innerHTML = '';

            all.forEach(b => {
                const unlocked = gameState.badges.includes(b.id);
                const div = document.createElement('div');
                div.className = `badge ${unlocked ? 'bg-gradient-to-r from-yellow-200 to-orange-200 text-orange-800' : 'bg-gray-200 text-gray-400'}`;
                div.innerHTML = `<span class="text-2xl">${unlocked ? b.icon : '🔒'}</span><span>${b.name}</span>`;
                container.appendChild(div);
            });
        }
        function saveState() {
            localStorage.setItem('gameScore', gameState.score);
            localStorage.setItem('gameLevel', gameState.level);
            localStorage.setItem('gameBadges', JSON.stringify(gameState.badges));
        }

        updateStepNumbers();
    </script>
</body>
</html>