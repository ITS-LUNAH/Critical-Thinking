<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mind Puzzle - Critical Thinking Challenge</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #ec4899 100%);
            min-height: 100vh;
            padding: 20px;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 30px;
            animation: fadeInDown 0.8s ease;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header h1 {
            font-size: 3em;
            margin-bottom: 10px;
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .header p {
            font-size: 1.3em;
            opacity: 0.95;
        }

        .game-board {
            background: white;
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            margin-bottom: 30px;
            animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stats-bar {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .stat-item {
            text-align: center;
        }

        .stat-label {
            color: #64748b;
            font-size: 0.9em;
            margin-bottom: 8px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-value {
            font-size: 2.5em;
            font-weight: bold;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .level-info {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            border-left: 5px solid #f59e0b;
            box-shadow: 0 5px 15px rgba(245, 158, 11, 0.2);
        }

        .level-info h2 {
            color: #92400e;
            margin-bottom: 12px;
            font-size: 1.5em;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .level-info p {
            color: #78350f;
            font-size: 1.1em;
            line-height: 1.6;
        }

        .puzzle-hint {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            text-align: center;
            border: 2px solid #3b82f6;
        }

        .puzzle-hint p {
            color: #1e40af;
            font-size: 1.05em;
            font-weight: 500;
        }

        .solution-area {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            border: 3px dashed #6366f1;
            border-radius: 15px;
            min-height: 150px;
            padding: 25px;
            margin-bottom: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .solution-area.drag-over {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border-color: #f59e0b;
            transform: scale(1.02);
        }

        .solution-area h3 {
            width: 100%;
            text-align: center;
            color: #475569;
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .pieces-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            margin-bottom: 30px;
            padding: 20px;
            background: linear-gradient(135deg, #fef9f3 0%, #fef3e2 100%);
            border-radius: 15px;
        }

        .pieces-container h3 {
            width: 100%;
            text-align: center;
            color: #78350f;
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .puzzle-piece {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            padding: 18px 30px;
            border-radius: 12px;
            font-size: 1.3em;
            font-weight: 600;
            color: #1e293b;
            cursor: grab;
            border: 3px solid #cbd5e1;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            user-select: none;
            position: relative;
        }

        .puzzle-piece:hover {
            transform: translateY(-5px) rotate(2deg);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
            border-color: #6366f1;
        }

        .puzzle-piece:active {
            cursor: grabbing;
            transform: scale(0.95);
        }

        .puzzle-piece.in-solution {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border-color: #10b981;
        }

        .puzzle-piece::before {
            content: '🧩';
            position: absolute;
            top: -8px;
            left: -8px;
            font-size: 1.2em;
            opacity: 0.7;
        }

        .buttons-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        button {
            padding: 18px 40px;
            font-size: 1.15em;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-verify {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .btn-verify:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }

        .btn-reset {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }

        .btn-reset:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
        }

        .btn-hint {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            color: white;
        }

        .btn-hint:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
        }

        .feedback {
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            font-size: 1.3em;
            font-weight: 700;
            margin-bottom: 20px;
            display: none;
            animation: bounceIn 0.6s ease;
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .feedback.success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border: 3px solid #10b981;
            display: block;
        }

        .feedback.error {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            border: 3px solid #ef4444;
            display: block;
        }

        /* Modal Overlay */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            z-index: 999;
            backdrop-filter: blur(5px);
        }

        /* Celebration Modal */
        .celebration-modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            background: white;
            padding: 50px;
            border-radius: 25px;
            box-shadow: 0 25px 80px rgba(0,0,0,0.5);
            text-align: center;
            z-index: 1000;
            max-width: 600px;
            width: 90%;
            display: none;
        }

        .celebration-modal.show {
            display: block;
            animation: modalPop 0.6s ease forwards;
        }

        @keyframes modalPop {
            0% {
                transform: translate(-50%, -50%) scale(0);
            }
            50% {
                transform: translate(-50%, -50%) scale(1.1);
            }
            100% {
                transform: translate(-50%, -50%) scale(1);
            }
        }

        .celebration-modal h2 {
            font-size: 3em;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .celebration-modal .message {
            font-size: 1.3em;
            color: #475569;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .celebration-modal .points {
            font-size: 2em;
            font-weight: bold;
            color: #6366f1;
            margin: 20px 0;
        }

        .btn-next {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            padding: 18px 50px;
            font-size: 1.2em;
            margin-top: 20px;
        }

        .btn-next:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.5);
        }

        /* Final Message Modal */
        .final-modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            padding: 60px;
            border-radius: 25px;
            box-shadow: 0 25px 80px rgba(0,0,0,0.5);
            text-align: center;
            z-index: 1000;
            max-width: 700px;
            width: 90%;
            display: none;
            border: 5px solid #f59e0b;
        }

        .final-modal.show {
            display: block;
            animation: modalPop 0.8s ease forwards;
        }

        .final-modal h2 {
            font-size: 2.5em;
            color: #92400e;
            margin-bottom: 30px;
        }

        .final-modal .admin-message {
            background: white;
            padding: 30px;
            border-radius: 15px;
            font-size: 1.4em;
            color: #1e293b;
            line-height: 1.8;
            margin-bottom: 25px;
            border-left: 5px solid #f59e0b;
            font-style: italic;
        }

        .final-modal .signature {
            font-size: 1.2em;
            color: #78350f;
            font-weight: 600;
            margin-top: 20px;
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #f59e0b;
            position: absolute;
            animation: confetti-fall 3s linear;
        }

        @keyframes confetti-fall {
            to {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2em;
            }

            .game-board {
                padding: 20px;
            }

            .puzzle-piece {
                padding: 12px 20px;
                font-size: 1.1em;
            }

            .stats-bar {
                flex-direction: column;
                gap: 15px;
            }

            .buttons-container {
                flex-direction: column;
            }

            button {
                width: 100%;
            }
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
<body>
    <div class="modal-overlay" id="modalOverlay"></div>
    
    <!-- Celebration Modal -->
    <div class="celebration-modal" id="celebrationModal">
        <h2>🎉 Excellent! 🎉</h2>
        <p class="message">Vous avez résolu le puzzle!</p>
        <p class="points" id="levelPoints"></p>
        <button class="btn-next" onclick="nextLevel()">Niveau Suivant</button>
    </div>

    <!-- Final Message Modal -->
    <div class="final-modal" id="finalModal">
        <h2>📜 Message de l'Administrateur</h2>
        <div class="admin-message" id="adminMessage"></div>
        <div class="signature">— Admin</div>
        <button class="btn-next" onclick="restartGame()">Recommencer</button>
    </div>

    <div class="container">
        <div class="header">
            <h1>🧠 Mind Puzzle</h1>
            <p>Challenge de Pensée Critique</p>
        </div>

        <div class="game-board">
            <div class="stats-bar">
                <div class="stat-item">
                    <div class="stat-label">Niveau</div>
                    <div class="stat-value" id="currentLevel">1</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Score</div>
                    <div class="stat-value" id="totalScore">0</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Puzzles</div>
                    <div class="stat-value"><span id="solvedPuzzles">0</span>/8</div>
                </div>
            </div>

            <div class="level-info">
                <h2 id="levelTitle"></h2>
                <p id="levelDescription"></p>
            </div>

            <div class="puzzle-hint">
                <p id="puzzleHint">💡 Glissez les mots dans la bonne zone pour former la phrase</p>
            </div>

            <div class="solution-area" id="solutionArea">
                <h3>📝 Votre Solution</h3>
            </div>

            <div class="pieces-container" id="piecesContainer">
                <h3>🧩 Pièces du Puzzle</h3>
            </div>

            <div class="feedback" id="feedback"></div>

            <div class="buttons-container">
                <button class="btn-verify" onclick="verifyPuzzle()">✓ Vérifier</button>
                <button class="btn-reset" onclick="resetPuzzle()">↻ Réinitialiser</button>
                <button class="btn-hint" onclick="showHint()">💡 Indice</button>
            </div>
        </div>
   <!-- Bouton Retour aux Jeux -->
   <div style="text-align: center; margin-top: 30px;">
            <a href="index.php?url=game/indexgames" class="btn-return">
                ← Retour aux Jeux
            </a>
        </div>
    </div>


    <script>
        let currentLevel = 0;
        let totalScore = 0;
        let solvedPuzzles = 0;
        let draggedElement = null;
        let hintsUsed = 0;

        const levels = [
            {
                title: "🎯 Niveau 1 - Introduction",
                description: "Commençons doucement...",
                sentence: "Remettez en question tout ce que vous entendez",
                words: ["Remettez", "en", "question", "tout", "ce", "que", "vous", "entendez"],
                points: 100,
                hint: "Commencez par 'Remettez'..."
            },
            {
                title: "🔍 Niveau 2 - Vérification",
                description: "La vérification est essentielle...",
                sentence: "Vérifiez toujours vos sources avec attention",
                words: ["Vérifiez", "toujours", "vos", "sources", "avec", "attention", "rapidement", "jamais"],
                points: 150,
                hint: "Il y a 2 mots en trop! Cherchez les mots qui contredisent le message..."
            },
            {
                title: "🧪 Niveau 3 - Analyse",
                description: "La réflexion avant l'action...",
                sentence: "Pensez de manière critique avant de croire",
                words: ["Pensez", "de", "manière", "critique", "avant", "de", "croire", "après", "jamais", "tout"],
                points: 200,
                hint: "3 mots sont en trop! Le bon ordre commence par 'Pensez'..."
            },
            {
                title: "⚖️ Niveau 4 - Jugement",
                description: "Distinguer les faits des opinions...",
                sentence: "Les preuves et la logique guident les décisions éclairées",
                words: ["Les", "preuves", "et", "la", "logique", "guident", "les", "décisions", "éclairées", "rapides", "émotionnelles", "parfois"],
                points: 250,
                hint: "3 mots perturbent le message de rationalité..."
            },
            {
                title: "💡 Niveau 5 - Réflexion",
                description: "Creuser plus profond...",
                sentence: "Ne confondez jamais corrélation et causalité réelle",
                words: ["Ne", "confondez", "jamais", "corrélation", "et", "causalité", "réelle", "possible", "toujours", "évidente", "simple", "directe"],
                points: 300,
                hint: "5 mots en trop! Focus sur la distinction corrélation/causalité..."
            },
            {
                title: "🎭 Niveau 6 - Biais",
                description: "Reconnaître nos propres biais...",
                sentence: "Reconnaissez vos biais pour mieux les surmonter",
                words: ["Reconnaissez", "vos", "biais", "pour", "mieux", "les", "surmonter", "ignorer", "accepter", "toujours", "éviter", "cacher"],
                points: 350,
                hint: "5 mots créent de la confusion. L'objectif est de 'surmonter' les biais..."
            },
            {
                title: "🔬 Niveau 7 - Preuve",
                description: "L'importance de la preuve...",
                sentence: "Une affirmation extraordinaire nécessite une preuve extraordinaire",
                words: ["Une", "affirmation", "extraordinaire", "nécessite", "une", "preuve", "extraordinaire", "simple", "rapide", "opinion", "parfois", "rarement", "toujours", "jamais"],
                points: 400,
                hint: "7 mots sont incorrects! Cette phrase parle de l'équilibre entre affirmation et preuve..."
            },
            {
                title: "🎯 Niveau 8 - Maîtrise",
                description: "Le défi final...",
                sentence: "Questionnez les hypothèses cachées pour découvrir la vérité profonde",
                words: ["Questionnez", "les", "hypothèses", "cachées", "pour", "découvrir", "la", "vérité", "profonde", "superficielle", "évidente", "simple", "rapide", "immédiate", "visible", "apparente"],
                points: 500,
                hint: "7 mots sont des distracteurs qui vont contre l'idée d'analyse profonde..."
            }
        ];

        const finalMessage = "Bravo pour avoir complété tous les puzzles! La pensée critique n'est pas simplement une compétence académique, c'est une attitude de vie. Vous avez appris à questionner, vérifier, analyser et remettre en question vos propres hypothèses. Rappelez-vous : un esprit critique est un esprit libre et éclairé. Dans un monde rempli d'informations, votre capacité à distinguer le vrai du faux, les faits des opinions, et les corrélations des causalités est votre plus grande force. Continuez à cultiver cette sagesse et utilisez-la pour prendre des décisions éclairées dans votre vie personnelle et professionnelle. Félicitations!";

        function initGame() {
            loadLevel(currentLevel);
            updateStats();
        }

        function loadLevel(levelIndex) {
            const level = levels[levelIndex];
            
            document.getElementById('levelTitle').textContent = level.title;
            document.getElementById('levelDescription').textContent = level.description;
            
            // Shuffle words
            const shuffledWords = [...level.words].sort(() => Math.random() - 0.5);
            
            // Clear containers
            const piecesContainer = document.getElementById('piecesContainer');
            piecesContainer.innerHTML = '<h3>🧩 Pièces du Puzzle</h3>';
            
            // Create puzzle pieces
            shuffledWords.forEach((word, index) => {
                const piece = document.createElement('div');
                piece.className = 'puzzle-piece';
                piece.textContent = word;
                piece.draggable = true;
                piece.dataset.word = word;
                piece.dataset.index = index;
                
                piece.addEventListener('dragstart', handleDragStart);
                piece.addEventListener('dragend', handleDragEnd);
                
                piecesContainer.appendChild(piece);
            });

            // Setup solution area
            const solutionArea = document.getElementById('solutionArea');
            solutionArea.innerHTML = '<h3>📝 Votre Solution</h3>';
            solutionArea.addEventListener('dragover', handleDragOver);
            solutionArea.addEventListener('drop', handleDrop);
            solutionArea.addEventListener('dragleave', handleDragLeave);

            document.getElementById('feedback').style.display = 'none';
            hintsUsed = 0;
            
            // Re-enable verify button
            const verifyBtn = document.querySelector('.btn-verify');
            verifyBtn.disabled = false;
            verifyBtn.style.opacity = '1';
            verifyBtn.style.cursor = 'pointer';
        }

        function handleDragStart(e) {
            draggedElement = e.target;
            e.target.style.opacity = '0.5';
        }

        function handleDragEnd(e) {
            e.target.style.opacity = '1';
        }

        function handleDragOver(e) {
            e.preventDefault();
            e.currentTarget.classList.add('drag-over');
        }

        function handleDragLeave(e) {
            e.currentTarget.classList.remove('drag-over');
        }

        function handleDrop(e) {
            e.preventDefault();
            e.currentTarget.classList.remove('drag-over');

            if (draggedElement && e.currentTarget.id === 'solutionArea') {
                const clone = draggedElement.cloneNode(true);
                clone.classList.add('in-solution');
                
                // Add click to remove from solution
                clone.addEventListener('click', function() {
                    this.remove();
                });
                
                e.currentTarget.appendChild(clone);
            }
        }

        function verifyPuzzle() {
            // Disable button to prevent double-click
            const verifyBtn = document.querySelector('.btn-verify');
            if (verifyBtn.disabled) return;
            verifyBtn.disabled = true;
            verifyBtn.style.opacity = '0.6';
            verifyBtn.style.cursor = 'not-allowed';

            const level = levels[currentLevel];
            const solutionArea = document.getElementById('solutionArea');
            const placedWords = Array.from(solutionArea.querySelectorAll('.puzzle-piece'))
                .map(piece => piece.textContent.trim());
            
            const userSentence = placedWords.join(' ');
            const correctSentence = level.sentence;

            // Debug logging
            console.log("Votre phrase:", userSentence);
            console.log("Phrase correcte:", correctSentence);
            console.log("Match:", userSentence === correctSentence);

            const feedback = document.getElementById('feedback');

            if (userSentence === correctSentence) {
                let points = level.points;
                if (hintsUsed > 0) {
                    points = Math.floor(points * 0.8); // -20% si hint utilisé
                }
                
                totalScore += points;
                solvedPuzzles++;
                updateStats();

                feedback.className = 'feedback success';
                feedback.innerHTML = `
                    ✅ Parfait! La phrase est correcte!<br>
                    <strong>+${points} points</strong>
                `;

                setTimeout(() => {
                    showCelebrationModal(points);
                }, 1000);

            } else {
                feedback.className = 'feedback error';
                feedback.innerHTML = `
                    ❌ Ce n'est pas tout à fait ça...<br>
                    Vérifiez l'ordre des mots et assurez-vous de n'utiliser que les bons mots.<br>
                    <small style="font-size: 0.8em; opacity: 0.7;">Votre réponse: "${userSentence}"</small>
                `;
                
                // Re-enable button after 2 seconds for retry
                setTimeout(() => {
                    verifyBtn.disabled = false;
                    verifyBtn.style.opacity = '1';
                    verifyBtn.style.cursor = 'pointer';
                }, 2000);
            }
        }

        function showCelebrationModal(points) {
            document.getElementById('levelPoints').textContent = `+${points} points`;
            document.getElementById('modalOverlay').style.display = 'block';
            document.getElementById('celebrationModal').classList.add('show');
            createConfetti();
        }

        function createConfetti() {
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.background = ['#f59e0b', '#6366f1', '#ec4899', '#10b981'][Math.floor(Math.random() * 4)];
                confetti.style.animationDelay = Math.random() * 3 + 's';
                document.body.appendChild(confetti);
                
                setTimeout(() => confetti.remove(), 3000);
            }
        }

        function nextLevel() {
            document.getElementById('celebrationModal').classList.remove('show');
            document.getElementById('modalOverlay').style.display = 'none';
            
            currentLevel++;
            
            if (currentLevel >= levels.length) {
                showFinalMessage();
            } else {
                loadLevel(currentLevel);
                updateStats();
            }
        }

        function showFinalMessage() {
            document.getElementById('adminMessage').textContent = finalMessage;
            document.getElementById('modalOverlay').style.display = 'block';
            document.getElementById('finalModal').classList.add('show');
            createConfetti();
        }

        function restartGame() {
            currentLevel = 0;
            totalScore = 0;
            solvedPuzzles = 0;
            document.getElementById('finalModal').classList.remove('show');
            document.getElementById('modalOverlay').style.display = 'none';
            loadLevel(currentLevel);
            updateStats();
        }

        function resetPuzzle() {
            const solutionArea = document.getElementById('solutionArea');
            const pieces = solutionArea.querySelectorAll('.puzzle-piece');
            pieces.forEach(piece => piece.remove());
            document.getElementById('feedback').style.display = 'none';
        }

        function showHint() {
            const level = levels[currentLevel];
            hintsUsed++;
            
            const feedback = document.getElementById('feedback');
            feedback.className = 'feedback';
            feedback.style.display = 'block';
            feedback.style.background = 'linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%)';
            feedback.style.color = '#1e40af';
            feedback.style.border = '3px solid #3b82f6';
            feedback.innerHTML = `💡 <strong>Indice:</strong> ${level.hint}`;
        }

        function updateStats() {
            document.getElementById('currentLevel').textContent = currentLevel + 1;
            document.getElementById('totalScore').textContent = totalScore;
            document.getElementById('solvedPuzzles').textContent = solvedPuzzles;
        }

        // Initialize game on load
        initGame();
    </script>
</body>
</html>