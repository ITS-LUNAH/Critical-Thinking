<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Créer un nouvel utilisateur
    public function create($username, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO utilisateur (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$username, $email, $hashed_password]);
    }

    // Trouver un utilisateur par email
    public function findByEmail($email) {
        $query = "SELECT * FROM utilisateur WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Vérifier si l'email existe déjà
    public function emailExists($email) {
        $query = "SELECT id FROM utilisateur WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        return $stmt->rowCount() > 0;
    }

    // Récupérer les statistiques de gamification d'un utilisateur
    public function getStats($user_id) {
        $query = "SELECT points, level, badges_count FROM utilisateur WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>