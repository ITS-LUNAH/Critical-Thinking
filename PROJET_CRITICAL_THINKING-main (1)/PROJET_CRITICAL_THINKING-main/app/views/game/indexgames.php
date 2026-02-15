<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centre des Jeux - Critical Thinking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .game-card {
            transition: all 0.3s ease;
        }
        .game-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn { animation: fadeIn 0.6s ease; }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-blue-100 min-h-screen p-8">
    <div class="max-w-6xl mx-auto">
        <!-- Back to Home Button -->
        <div class="mb-6 animate-fadeIn">
            <a href="index.php?url=game/home" 
               class="inline-flex items-center gap-2 text-gray-600 hover:text-purple-700 font-semibold transition-all group">
                <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour à l'accueil
            </a>
        </div>

        <div class="text-center mb-12 animate-fadeIn">
            <h1 class="text-5xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-4">
                🎮 Centre des Jeux de Pensée Critique
            </h1>
            <p class="text-gray-600 text-xl">Choisis ton jeu et développe ton esprit critique !</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Game 1: Critical Thinking -->
            <a href="index.php?url=game/index" class="game-card bg-white rounded-2xl shadow-lg p-8 block animate-fadeIn" style="animation-delay: 0.1s">
                <div class="text-6xl mb-4 text-center">🧠</div>
                <h2 class="text-2xl font-bold text-purple-700 mb-3">Challenge de Pensée Critique</h2>
                <p class="text-gray-600 mb-4">Mets les étapes dans le bon ordre pour résoudre des situations complexes. Développe ta logique et ton raisonnement !</p>
                <div class="flex gap-2 flex-wrap">
                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">🎯 Logique</span>
                    <span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-sm">⭐ Badges</span>
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">📊 Scoring</span>
                </div>
            </a>

            <!-- Game 2: Puzzle Game -->
            <a href="index.php?url=game/puzzle" class="game-card bg-white rounded-2xl shadow-lg p-8 block animate-fadeIn" style="animation-delay: 0.2s">
                <div class="text-6xl mb-4 text-center">🧩</div>
                <h2 class="text-2xl font-bold text-purple-700 mb-3">Mind Puzzle Challenge</h2>
                <p class="text-gray-600 mb-4">Reconstitue des phrases significatives en assemblant les bons mots. Affine ton analyse et ta pensée critique !</p>
                <div class="flex gap-2 flex-wrap">
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">🧩 Puzzle</span>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">💡 Indices</span>
                    <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm">🏆 Niveaux</span>
                </div>
            </a>

            <!-- Game 3: Quiz -->
            <a href="index.php?url=game/quiz" class="game-card bg-white rounded-2xl shadow-lg p-8 block animate-fadeIn" style="animation-delay: 0.3s">
                <div class="text-6xl mb-4 text-center">📝</div>
                <h2 class="text-2xl font-bold text-indigo-700 mb-3">Quiz de Pensée Critique</h2>
                <p class="text-gray-600 mb-4">Testez vos connaissances sur les biais cognitifs et la logique. Choix multiples avec explications détaillées !</p>
                <div class="flex gap-2 flex-wrap">
                    <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm">✅ Choix Multiples</span>
                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">💡 Explications</span>
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">📈 Score</span>
                </div>
            </a>

            <!-- Game 4: Fact or Fiction -->
            <a href="index.php?url=game/fact" class="game-card bg-white rounded-2xl shadow-lg p-8 block animate-fadeIn" style="animation-delay: 0.4s">
                <div class="text-6xl mb-4 text-center">🔍</div>
                <h2 class="text-2xl font-bold text-rose-700 mb-3">Fait ou Fiction</h2>
                <p class="text-gray-600 mb-4">Apprenez à distinguer les faits prouvés des idées reçues courantes. Vérité ou mythe populaire ?</p>
                <div class="flex gap-2 flex-wrap">
                    <span class="bg-rose-100 text-rose-700 px-3 py-1 rounded-full text-sm">✓ Vrai/Faux</span>
                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">🎓 Éducatif</span>
                    <span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-sm">🧠 Mythbusting</span>
                </div>
            </a>
        </div>

        <div class="mt-12 bg-white rounded-2xl shadow-lg p-8 text-center animate-fadeIn" style="animation-delay: 0.5s">
            <h3 class="text-2xl font-bold text-gray-800 mb-3">💪 Pourquoi jouer ?</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div>
                    <div class="text-4xl mb-2">🎯</div>
                    <h4 class="font-bold text-purple-700 mb-2">Améliore ta logique</h4>
                    <p class="text-gray-600 text-sm">Développe ton raisonnement et ta capacité d'analyse</p>
                </div>
                <div>
                    <div class="text-4xl mb-2">🏆</div>
                    <h4 class="font-bold text-pink-700 mb-2">Gagne des récompenses</h4>
                    <p class="text-gray-600 text-sm">Collectionne des badges et grimpe les niveaux</p>
                </div>
                <div>
                    <div class="text-4xl mb-2">🧠</div>
                    <h4 class="font-bold text-blue-700 mb-2">Entraîne ton esprit</h4>
                    <p class="text-gray-600 text-sm">Des défis progressifs pour stimuler ta pensée</p>
                </div>
            </div>
        </div>

        <!-- Bottom Back Button (Alternative style) -->
        <div class="mt-8 text-center animate-fadeIn" style="animation-delay: 0.6s">
            <a href="index.php?url=game/home" 
               class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-3 px-8 rounded-full hover:from-purple-700 hover:to-pink-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Retour à la page d'accueil
            </a>
        </div>
    </div>
</body>
</html>