<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Terminé - Critical Thinking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes confetti {
            0% { transform: translateY(-100vh) rotate(0deg); }
            100% { transform: translateY(100vh) rotate(360deg); }
        }
        .animate-fadeIn { animation: fadeIn 0.8s ease; }
        .card-shadow {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-100 via-purple-50 to-pink-100 min-h-screen flex items-center justify-center p-6">
    
    <div class="max-w-2xl w-full animate-fadeIn">
        <div class="bg-white rounded-3xl p-12 card-shadow border border-gray-100 text-center">
            
            <!-- Trophy Icon -->
            <div class="mb-8">
                <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full">
                    <span class="text-6xl">🏆</span>
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-5xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent mb-6">
                Quiz Terminé !
            </h1>

            <!-- Score Display -->
            <?php
            $score = $data['score'] ?? 0;
            $total = $data['total'] ?? 0;
            $percentage = $total > 0 ? round(($score / $total) * 100) : 0;
            
            // Determine performance level
            if ($percentage >= 80) {
                $message = "Excellent ! Tu maîtrises la pensée critique ! 🌟";
                $color = "text-emerald-600";
                $bgColor = "bg-emerald-50";
                $borderColor = "border-emerald-200";
            } elseif ($percentage >= 60) {
                $message = "Bien joué ! Continue comme ça ! 👍";
                $color = "text-blue-600";
                $bgColor = "bg-blue-50";
                $borderColor = "border-blue-200";
            } elseif ($percentage >= 40) {
                $message = "Pas mal ! Il y a de la marge de progression ! 💪";
                $color = "text-orange-600";
                $bgColor = "bg-orange-50";
                $borderColor = "border-orange-200";
            } else {
                $message = "Continue à t'entraîner ! Tu vas y arriver ! 🎯";
                $color = "text-rose-600";
                $bgColor = "bg-rose-50";
                $borderColor = "border-rose-200";
            }
            ?>

            <!-- Score Card -->
            <div class="mb-8 p-8 <?php echo $bgColor; ?> rounded-2xl border-2 <?php echo $borderColor; ?>">
                <div class="text-7xl font-black <?php echo $color; ?> mb-4">
                    <?php echo $score; ?> / <?php echo $total; ?>
                </div>
                <div class="text-3xl font-bold text-gray-700 mb-3">
                    <?php echo $percentage; ?>%
                </div>
                <p class="text-xl font-semibold <?php echo $color; ?>">
                    <?php echo $message; ?>
                </p>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-4 mb-10">
                <div class="p-4 bg-gray-50 rounded-xl">
                    <div class="text-2xl font-bold text-emerald-600"><?php echo $score; ?></div>
                    <div class="text-sm text-gray-600">Bonnes réponses</div>
                </div>
                <div class="p-4 bg-gray-50 rounded-xl">
                    <div class="text-2xl font-bold text-rose-600"><?php echo $total - $score; ?></div>
                    <div class="text-sm text-gray-600">Erreurs</div>
                </div>
                <div class="p-4 bg-gray-50 rounded-xl">
                    <div class="text-2xl font-bold text-indigo-600"><?php echo $percentage; ?>%</div>
                    <div class="text-sm text-gray-600">Réussite</div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-4">
                <a href="index.php?url=game/quiz/0" 
                   class="flex items-center justify-center w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold py-5 rounded-2xl hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Recommencer le quiz
                </a>
                
                <a href="index.php?url=game/indexgames" 
                   class="flex items-center justify-center w-full bg-gray-100 text-gray-700 font-bold py-5 rounded-2xl hover:bg-gray-200 transition-all">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path>
                    </svg>
                    Retour aux jeux
                </a>

                <a href="index.php?url=game/home" 
                   class="block text-center text-gray-500 hover:text-gray-700 text-sm font-medium py-2 transition">
                    Retour à l'accueil
                </a>
            </div>

        </div>
    </div>

</body>
</html>