<?php

class Database {
    private static $instance = null;
    private $conn;

    // Paramètres de configuration - À modifier selon votre environnement
    private $host = '127.0.0.1';
    private $port = '3307'; // Votre port spécifique
    private $db_name = 'critical_thinking_db';
    private $username = 'root';
    private $password = ''; // Laissez vide ou mettez votre mot de passe

    private function __construct() {
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance->conn;
    }
}
