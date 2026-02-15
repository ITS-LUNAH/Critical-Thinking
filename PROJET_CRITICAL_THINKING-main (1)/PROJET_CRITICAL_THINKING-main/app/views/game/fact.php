<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fait ou Fiction - Critical Thinking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        .animate-fadeIn { animation: fadeIn 0.6s ease; }
        .animate-pulse-once { animation: pulse 0.5s ease; }
        .animate-shake { animation: shake 0.5s ease; }
        .card-shadow {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-rose-100 via-pink-50 to-orange-100 min-h-screen flex items-center justify-center p-6">

<?php
// Check if we have data passed from controller
$question = $data['question'] ?? null;
$currentIndex = $data['currentIndex'] ?? 0;
$totalQuestions = $data['totalQuestions'] ?? 0;
$score = $data['score'] ?? 0;
$isCorrect = $data['isCorrect'] ?? null;
$nextIndex = $data['nextIndex'] ?? 0;
$choice = $data['choice'] ?? null;

// Determine which view to show
if ($isCorrect !== null): 
    // RESULT VIEW
?>
    <div class="max-w-2xl w-full animate-fadeIn">
        <div class="bg-white rounded-3xl p-10 card-shadow border border-gray-100">
            <!-- Result Icon & Title -->
            <div class="text-center mb-8">
                <?php if ($isCorrect): ?>
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-emerald-100 rounded-full mb-6 animate-pulse-once">
                        <svg class="w-12 h-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4m6-4a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-emerald-600 to-green-600 bg-clip-text text-transparent">
                        Exactement ! Bien joué ! 🎯
                    </h2>
                <?php else: ?>
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-rose-100 rounded-full mb-6 animate-shake">
                        <svg class="w-12 h-12 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text text-transparent">
                        Raté ! Continue d'essayer ! 💪
                    </h2>
                <?php endif; ?>
            </div>

            <!-- Score Display -->
            <div class="mb-6 p-4 bg-rose-50 rounded-2xl border border-rose-200 text-center">
                <p class="text-rose-900 font-bold text-lg">
                    Score: <?php echo $score; ?> / <?php echo $nextIndex; ?>
                </p>
            </div>

            <!-- Truth Reveal -->
            <div class="mb-6 p-6 <?php echo $question['is_fact'] ? 'bg-gradient-to-r from-emerald-50 to-green-50 border-emerald-200' : 'bg-gradient-to-r from-rose-50 to-red-50 border-rose-200'; ?> rounded-2xl border-2">
                <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">🔍 La vérité :</p>
                <div class="flex items-center gap-3">
                    <?php if ($question['is_fact']): ?>
                        <div class="flex-shrink-0 w-12 h-12 bg-emerald-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-emerald-800 font-bold text-2xl">
                            C'est un FAIT ✓
                        </p>
                    <?php else: ?>
                        <div class="flex-shrink-0 w-12 h-12 bg-rose-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <p class="text-rose-800 font-bold text-2xl">
                            C'est une FICTION ✗
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Explanation -->
            <div class="mb-8 p-6 bg-gray-50 rounded-2xl border border-gray-200">
                <div class="flex items-start gap-3">
                    <div class="text-2xl">📚</div>
                    <div class="flex-1">
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Pourquoi ?</p>
                        <p class="text-gray-700 leading-relaxed text-lg">
                            <?php echo htmlspecialchars($question['explanation']); ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3">
                <a href="index.php?url=game/fact/<?php echo $nextIndex; ?>" 
                   class="flex items-center justify-center w-full bg-gradient-to-r from-rose-500 to-orange-500 text-white font-bold py-4 rounded-2xl hover:from-rose-600 hover:to-orange-600 transition-all shadow-lg">
                    Défi suivant
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a href="index.php?url=game/indexgames" 
                   class="block w-full text-center text-gray-500 hover:text-gray-700 text-sm font-medium py-2 transition">
                    ← Retour aux jeux
                </a>
            </div>
        </div>
    </div>

<?php else: 
    // QUESTION VIEW
?>
    <div class="max-w-3xl w-full animate-fadeIn">
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex justify-between items-end mb-3">
                <div>
                    <span class="text-sm font-bold text-rose-600">Défi <?php echo $currentIndex + 1; ?></span>
                    <span class="text-sm text-gray-400"> sur <?php echo $totalQuestions; ?></span>
                </div>
                <div class="text-right">
                    <span class="text-xs text-gray-400">Score:</span>
                    <span class="text-sm font-bold text-rose-600"> <?php echo $score; ?>/<?php echo $currentIndex; ?></span>
                </div>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-gradient-to-r from-rose-500 to-orange-500 h-2 rounded-full transition-all duration-500" 
                     style="width: <?php echo (($currentIndex + 1) / $totalQuestions) * 100; ?>%">
                </div>
            </div>
            <div class="text-right mt-1">
                <span class="text-xs text-rose-600 font-medium">
                    <?php echo round((($currentIndex + 1) / $totalQuestions) * 100); ?>% complété
                </span>
            </div>
        </div>

        <!-- Question Card -->
        <div class="bg-white rounded-3xl p-12 card-shadow border border-gray-100 text-center">
            <!-- Icon -->
            <div class="mb-8 inline-flex items-center justify-center w-20 h-20 bg-rose-100 rounded-2xl">
                <span class="text-4xl">🔍</span>
            </div>
            
            <!-- Statement -->
            <p class="text-3xl mb-12 font-bold text-gray-800 leading-tight">
                "<?php echo htmlspecialchars($question['statement']); ?>"
            </p>
            
            <!-- Choice Buttons -->
            <form action="index.php?url=game/factcheck" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <input type="hidden" name="id" value="<?php echo $question['id']; ?>">
                <input type="hidden" name="currentIndex" value="<?php echo $currentIndex; ?>">
                
                <!-- FACT Button -->
                <button type="submit" 
                        name="choice" 
                        value="true" 
                        class="bg-gradient-to-br from-emerald-500 to-green-600 text-white font-bold py-6 px-8 rounded-2xl hover:from-emerald-600 hover:to-green-700 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2">
                    <div class="flex items-center justify-center gap-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6-4a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <div class="text-2xl">C'EST UN</div>
                            <div class="text-3xl font-black">FAIT</div>
                        </div>
                    </div>
                </button>
                
                <!-- FICTION Button -->
                <button type="submit" 
                        name="choice" 
                        value="false" 
                        class="bg-gradient-to-br from-rose-500 to-red-600 text-white font-bold py-6 px-8 rounded-2xl hover:from-rose-600 hover:to-red-700 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2">
                    <div class="flex items-center justify-center gap-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <div class="text-2xl">C'EST UNE</div>
                            <div class="text-3xl font-black">FICTION</div>
                        </div>
                    </div>
                </button>
            </form>
        </div>

        <!-- Footer Link -->
        <div class="mt-8 text-center">
            <a href="index.php?url=game/indexgames" 
               class="text-gray-400 hover:text-gray-600 text-sm font-medium transition">
                ← Abandonner le défi
            </a>
        </div>
    </div>
<?php endif; ?>

</body>
</html>