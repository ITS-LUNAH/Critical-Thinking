<?php

class GameController extends Controller {
    
    // ⬅️ الصفحة الرئيسية الأولى (Home)
    public function home() {
        $this->view('home/home');
    }

    // صفحة اختيار الألعاب
    public function indexgames() {
        $this->view('game/indexgames');
    }

    // لعبة Critical Thinking
    public function index() {
        $gameModel = $this->model('Game');
        $situation = $gameModel->getRandomSituation();
        $steps = $gameModel->getStepsForSituation($situation['id']);

        $this->view('game/index', [
            'situation' => $situation,
            'steps' => $steps
        ]);
    }

    // لعبة Puzzle
    public function puzzle() {
        $this->view('game/puzzle');
    }

    public function check() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $situation_id = $_POST['situation_id'];
            $user_order = json_decode($_POST['order']);

            $gameModel = $this->model('Game');
            $is_correct = $gameModel->checkOrder($situation_id, $user_order);

            echo json_encode(['success' => $is_correct]);
        }
    }
    // ⬅️ Authentication methods
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
            return;
        }

        require_once '../app/models/User.php';
        require_once '../config/database.php';
        
        $db = Database::getInstance();
        $userModel = new User($db);
        
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Veuillez remplir tous les champs']);
            return;
        }

        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Email ou mot de passe incorrect']);
        }
    }

    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
            return;
        }

        require_once '../app/models/User.php';
        require_once '../config/database.php';
        
        $db = Database::getInstance();
        $userModel = new User($db);
        
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($email) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Veuillez remplir tous les champs']);
            return;
        }

        if ($userModel->emailExists($email)) {
            echo json_encode(['success' => false, 'message' => 'Cet email est déjà utilisé']);
            return;
        }

        if ($userModel->create($username, $email, $password)) {
            $user = $userModel->findByEmail($email);
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la création du compte']);
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /Game_critical_thinking/public/');
        exit;
    }
    
    // ===============================================
    // QUIZ GAME METHODS
    // ===============================================
    public function quiz($index = 0) {
        session_start();
        $questionModel = $this->model('Question');
        $questions = $questionModel->getAllQuiz();
        
        // Initialize or get quiz session data
        if (!isset($_SESSION['quiz_score'])) {
            $_SESSION['quiz_score'] = 0;
            $_SESSION['quiz_total'] = 0;
        }
        
        // Check if finished
        if ($index >= count($questions)) {
            $this->view('game/quiz_finished', [
                'score' => $_SESSION['quiz_score'],
                'total' => $_SESSION['quiz_total']
            ]);
            // Reset session
            unset($_SESSION['quiz_score']);
            unset($_SESSION['quiz_total']);
            return;
        }

        $this->view('game/quiz', [
            'question' => $questions[$index],
            'currentIndex' => $index,
            'totalQuestions' => count($questions),
            'score' => $_SESSION['quiz_score']
        ]);
    }
    public function quizcheck() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $id = $_POST['id'];
            $choice = $_POST['choice'];
            $currentIndex = $_POST['currentIndex'];
            
            $questionModel = $this->model('Question');
            $question = $questionModel->getQuizById($id);
            
            $isCorrect = ($question['answer'] == $choice);
            
            // Update session score
            $_SESSION['quiz_total']++;
            if ($isCorrect) {
                $_SESSION['quiz_score']++;
            }
            
            // ⬅️ UTILISE LE MÊME FICHIER quiz.php
            $this->view('game/quiz', [
                'question' => $question,
                'isCorrect' => $isCorrect,
                'choice' => $choice,
                'nextIndex' => $currentIndex + 1,
                'score' => $_SESSION['quiz_score'],
                'total' => $_SESSION['quiz_total']
            ]);
        }
    }

    // ===============================================
    // FACT OR FICTION GAME METHODS
    // ===============================================
    
    public function fact($index = 0) {
        session_start();
        $questionModel = $this->model('Question');
        $questions = $questionModel->getAllFactFiction();
        
        // Initialize or get fact session data
        if (!isset($_SESSION['fact_score'])) {
            $_SESSION['fact_score'] = 0;
            $_SESSION['fact_total'] = 0;
        }
        
        // Check if finished
        if ($index >= count($questions)) {
            $this->view('game/fact_finished', [
                'score' => $_SESSION['fact_score'],
                'total' => $_SESSION['fact_total']
            ]);
            // Reset session
            unset($_SESSION['fact_score']);
            unset($_SESSION['fact_total']);
            return;
        }

        $this->view('game/fact', [
            'question' => $questions[$index],
            'currentIndex' => $index,
            'totalQuestions' => count($questions),
            'score' => $_SESSION['fact_score']
        ]);
    }

    public function factcheck() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $id = $_POST['id'];
            $choice = $_POST['choice'] === 'true';
            $currentIndex = $_POST['currentIndex'];
            
            $questionModel = $this->model('Question');
            $question = $questionModel->getFactFictionById($id);
            
            $isCorrect = ($question['is_fact'] == $choice);
            
            // Update session score
            $_SESSION['fact_total']++;
            if ($isCorrect) {
                $_SESSION['fact_score']++;
            }
            
            // ⬅️ UTILISE LE MÊME FICHIER fact.php
            $this->view('game/fact', [
                'question' => $question,
                'isCorrect' => $isCorrect,
                'choice' => $choice,
                'nextIndex' => $currentIndex + 1,
                'score' => $_SESSION['fact_score'],
                'total' => $_SESSION['fact_total']
            ]);
        }

}
}