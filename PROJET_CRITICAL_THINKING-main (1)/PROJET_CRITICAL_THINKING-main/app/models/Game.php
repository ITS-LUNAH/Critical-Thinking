<?php
require_once '../config/database.php';

class Game {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getRandomSituation() {
        // MySQL utilise RAND() au lieu de RANDOM()
        $stmt = $this->db->query("SELECT * FROM situations ORDER BY RAND() LIMIT 1");
        return $stmt->fetch();
    }

    public function getStepsForSituation($situation_id) {
        $stmt = $this->db->prepare("SELECT * FROM steps WHERE situation_id = ?");
        $stmt->execute([$situation_id]);
        $steps = $stmt->fetchAll();
        // Mélanger les étapes pour le jeu
        shuffle($steps);
        return $steps;
    }

    public function checkOrder($situation_id, $user_order) {
        $stmt = $this->db->prepare("SELECT id, step_order FROM steps WHERE situation_id = ? ORDER BY step_order ASC");
        $stmt->execute([$situation_id]);
        $correct_steps = $stmt->fetchAll();
        
        $is_correct = true;

        foreach ($correct_steps as $index => $correct_step) {
            if (!isset($user_order[$index]) || $user_order[$index] != $correct_step['id']) {
                $is_correct = false;
                break;
            }
        }

        return $is_correct;
    }
}
