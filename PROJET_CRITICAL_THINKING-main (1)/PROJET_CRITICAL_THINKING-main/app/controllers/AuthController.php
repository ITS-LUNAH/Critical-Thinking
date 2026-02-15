<?php
session_start();
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $db = Database::getInstance();
        $this->userModel = new User($db);
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';

            switch ($action) {
                case 'login':
                    $this->login();
                    break;
                case 'signup':
                    $this->signup();
                    break;
                default:
                    echo json_encode(['success' => false, 'message' => 'Action non reconnue']);
            }
        }
    }

    private function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Veuillez remplir tous les champs']);
            return;
        }

        $user = $this->userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Email ou mot de passe incorrect']);
        }
    }

    private function signup() {
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($email) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Veuillez remplir tous les champs']);
            return;
        }

        if ($this->userModel->emailExists($email)) {
            echo json_encode(['success' => false, 'message' => 'Cet email est déjà utilisé']);
            return;
        }

        if ($this->userModel->create($username, $email, $password)) {
            $user = $this->userModel->findByEmail($email);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la création du compte']);
        }
    }
}

// Initialiser et traiter la requête
$auth = new AuthController();
$auth->handleRequest();
?>