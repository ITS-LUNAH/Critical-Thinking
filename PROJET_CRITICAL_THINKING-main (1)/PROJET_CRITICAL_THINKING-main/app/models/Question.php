<?php
class Question {
    private $dataFile;
    private $data;

    public function __construct() {
        $this->dataFile = __DIR__ . '/../../data/questions.json';
        $this->loadData();
    }

    private function loadData() {
        if (file_exists($this->dataFile)) {
            $json = file_get_contents($this->dataFile);
            $this->data = json_decode($json, true);
        } else {
            $this->data = ['quiz' => [], 'factfiction' => []];
        }
    }

    // Quiz methods
    public function getAllQuiz() {
        return $this->data['quiz'] ?? [];
    }

    public function getQuizById($id) {
        $questions = $this->getAllQuiz();
        foreach ($questions as $question) {
            if ($question['id'] == $id) {
                return $question;
            }
        }
        return null;
    }

    public function getQuizByIndex($index) {
        $questions = $this->getAllQuiz();
        return $questions[$index] ?? null;
    }

    // Fact/Fiction methods
    public function getAllFactFiction() {
        return $this->data['factfiction'] ?? [];
    }

    public function getFactFictionById($id) {
        $questions = $this->getAllFactFiction();
        foreach ($questions as $question) {
            if ($question['id'] == $id) {
                return $question;
            }
        }
        return null;
    }

    public function getFactFictionByIndex($index) {
        $questions = $this->getAllFactFiction();
        return $questions[$index] ?? null;
    }
}
?>