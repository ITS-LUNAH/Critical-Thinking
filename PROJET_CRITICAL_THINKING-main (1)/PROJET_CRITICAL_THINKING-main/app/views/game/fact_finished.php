<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Défi Terminé - Critical Thinking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn { animation: fadeIn 0.8s ease; }
        .card-shadow {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-rose-100 via-pink-50 to-orange-100 min-h-screen flex items-center justify-center p-6">
    
    <div class="max-w-2xl w-full animate-fadeIn">
        <div class="bg-white rounded-3xl p-12 card-shadow border border-gray-100 text-center">
            
            <!-- Detective Icon -->
            <div class="mb-8">
                <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-rose-400 to-orange-500 rounded-full">
                    <span class="text-6xl">🕵️</span>
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-5xl font-bold bg-gradient-to-r from-rose-600 via-pink-600 to-orange-600 bg-clip-text text-transparent mb-6">
                Défi Terminé !
            </h1>

            <!-- Score Display -->
            <?php
            $score = $data['score'] ?? 0;
            $total = $data['total'] ?? 0;
            $percentage = $total > 0 ? round(($score / $total) * 100) : 0;
            
            // Determine performance level
            if ($percentage >= 80) {
                $message = "Champion ! Tu distingues parfaitement le vrai du faux ! 🏅";
                $color = "text-emerald-600";
                $bgColor = "bg-emerald-50";
                $borderColor = "border-emerald-200";
                $emoji = "🌟";
            } elseif ($percentage >= 60) {
                $message = "Bien joué ! Ton esprit critique s'aiguise ! 👏";
                $color = "text-blue-600";
                $bgColor = "bg-blue-50";
                $borderColor = "border-blue-200";
                $emoji = "💪";
            } elseif ($percentage >= 40) {
                $message = "Pas mal ! Continue à développer ton sens critique ! 🎯";
                $color = "text-orange-600";
                $bgColor = "bg-orange-50";
                $borderColor = "border-orange-200";
                $emoji = "📈";
            } else {
                $message = "N'abandonne pas ! La pratique fait le maître ! 🚀";
                $color = "text-rose-600";
                $bgColor = "bg-rose-50";
                $borderColor = "border-rose-200";
                $emoji = "💡";
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
                    <div class="text-sm text-gray-600">Correctes</div>
                </div>
                <div class="p-4 bg-gray-50 rounded-xl">
                    <div class="text-2xl font-bold text-rose-600"><?php echo $total - $score; ?></div>
                    <div class="text-sm text-gray-600">Erreurs</div>
                </div>
                <div class="p-4 bg-gray-50 rounded-xl">
                    <div class="text-2xl font-bold text-rose-600"><?php echo $percentage; ?>%</div>
                    <div class="text-sm text-gray-600">Réussite</div>
                </div>
            </div>

            <!-- Fun Facts Box -->
            <div class="mb-10 p-6 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl border border-orange-200">
                <div class="flex items-center gap-3 mb-3">
                    <span class="text-3xl">💭</span>
                    <h3 class="text-xl font-bold text-gray-800">Le savais-tu ?</h3>
                </div>
                <p class="text-gray-700 text-left leading-relaxed">
                    La pensée critique est comme un muscle : plus tu l'exerces en distinguant les faits des mythes, 
                    plus elle devient forte et rapide ! Continue à t'entraîner chaque jour.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-4">
                <a href="index.php?url=game/fact/0" 
                   class="flex items-center justify-center w-full bg-gradient-to-r from-rose-500 to-orange-500 text-white font-bold py-5 rounded-2xl hover:from-rose-600 hover:to-orange-600 transition-all shadow-lg hover:shadow-xl">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Recommencer le défi
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