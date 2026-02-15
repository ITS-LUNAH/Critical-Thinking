<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - Critical Thinking</title>
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
        .animate-fadeIn { animation: fadeIn 0.6s ease; }
        .animate-pulse-once { animation: pulse 0.5s ease; }
        .card-shadow {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-100 via-purple-50 to-pink-100 min-h-screen flex items-center justify-center p-6">

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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-emerald-600 to-green-600 bg-clip-text text-transparent">
                        Bravo ! C'est exact ! 🎉
                    </h2>
                <?php else: ?>
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-rose-100 rounded-full mb-6 animate-pulse-once">
                        <svg class="w-12 h-12 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text text-transparent">
                        Pas tout à fait... 😔
                    </h2>
                <?php endif; ?>
            </div>

            <!-- Score Display -->
            <div class="mb-6 p-4 bg-indigo-50 rounded-2xl border border-indigo-200 text-center">
                <p class="text-indigo-900 font-bold text-lg">
                    Score: <?php echo $score; ?> / <?php echo $nextIndex; ?>
                </p>
            </div>

            <!-- Correct Answer (if wrong) -->
            <?php if (!$isCorrect): ?>
                <div class="mb-6 p-6 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl border-2 border-indigo-200">
                    <p class="text-indigo-400 text-xs font-bold uppercase tracking-widest mb-2">✓ La bonne réponse était :</p>
                    <p class="text-indigo-800 font-bold text-xl">
                        <?php echo htmlspecialchars($question['options'][$question['answer']]); ?>
                    </p>
                </div>
            <?php endif; ?>

            <!-- Explanation -->
            <div class="mb-8 p-6 bg-gray-50 rounded-2xl border border-gray-200">
                <div class="flex items-start gap-3">
                    <div class="text-2xl">💡</div>
                    <div class="flex-1">
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Explication :</p>
                        <p class="text-gray-700 leading-relaxed text-lg">
                            <?php echo htmlspecialchars($question['explanation']); ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3">
                <a href="index.php?url=game/quiz/<?php echo $nextIndex; ?>" 
                   class="flex items-center justify-center w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold py-4 rounded-2xl hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg">
                    Question suivante
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
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
                    <span class="text-sm font-bold text-indigo-700">Question <?php echo $currentIndex + 1; ?></span>
                    <span class="text-sm text-gray-400"> sur <?php echo $totalQuestions; ?></span>
                </div>
                <div class="text-right">
                    <span class="text-xs text-gray-400">Score:</span>
                    <span class="text-sm font-bold text-indigo-700"> <?php echo $score; ?>/<?php echo $currentIndex; ?></span>
                </div>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 h-2 rounded-full transition-all duration-500" 
                     style="width: <?php echo (($currentIndex + 1) / $totalQuestions) * 100; ?>%">
                </div>
            </div>
            <div class="text-right mt-1">
                <span class="text-xs text-indigo-600 font-medium">
                    <?php echo round((($currentIndex + 1) / $totalQuestions) * 100); ?>% complété
                </span>
            </div>
        </div>

        <!-- Question Card -->
        <div class="bg-white rounded-3xl p-10 card-shadow border border-gray-100">
            <!-- Question Icon -->
            <div class="flex items-center gap-4 mb-8">
                <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                    <span class="text-2xl">📝</span>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 leading-tight">
                    <?php echo htmlspecialchars($question['question']); ?>
                </h2>
            </div>
            
            <!-- Answer Options -->
            <form action="index.php?url=game/quizcheck" method="POST">
                <input type="hidden" name="id" value="<?php echo $question['id']; ?>">
                <input type="hidden" name="currentIndex" value="<?php echo $currentIndex; ?>">
                
                <div class="space-y-3 mb-8">
                    <?php foreach ($question['options'] as $index => $option): ?>
                        <label class="flex items-center p-5 border-2 border-gray-200 rounded-2xl cursor-pointer hover:bg-indigo-50 hover:border-indigo-300 transition-all group">
                            <input type="radio" 
                                   name="choice" 
                                   value="<?php echo $index; ?>" 
                                   required 
                                   class="w-5 h-5 text-indigo-600 border-gray-300 focus:ring-2 focus:ring-indigo-500">
                            <span class="ml-4 text-gray-700 font-medium text-lg group-hover:text-indigo-900 transition-colors">
                                <?php echo htmlspecialchars($option); ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold py-4 rounded-2xl hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Valider ma réponse ✓
                </button>
            </form>
        </div>

        <!-- Footer Link -->
        <div class="mt-6 text-center">
            <a href="index.php?url=game/indexgames" 
               class="text-gray-400 hover:text-gray-600 text-sm font-medium transition">
                ← Quitter le quiz
            </a>
        </div>
    </div>
<?php endif; ?>

</body>
</html>