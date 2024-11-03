<?php

    require_once '../../sql/db.php';
    class NoteHandler {
        private $pdo;
        public function __construct() {
            $this->pdo = Database::getInstance();
        }

        public function getNotesByUsername($username): array {
            $userId = $this->getUserId($username);
            $query = $this->pdo->prepare('SELECT id, label, text, date FROM notes WHERE userId = ? ORDER BY id DESC');
            $query->execute([$userId]);
            $notes = $query->fetchAll(PDO::FETCH_OBJ);
            return $notes;
        }

        public function addNote($user, $label, $text) {
            $queryUID = $this->pdo->prepare('SELECT id FROM users WHERE name = ? LIMIT 1');
            $queryUID->execute([$user]);
            $row = $queryUID->fetch();
            $userId = $row[0];
            $query = $this->pdo->prepare('INSERT INTO notes(userId, label, text, date) VALUES (?, ?, ?, ?)');
            $query->execute([$userId,$label,$text,date("Y-m-d")]);
        }

        public function deleteNote($id) {
            $query = $this->pdo->prepare('DELETE FROM notes WHERE id = ?');
            $query->execute([$id]);
        }

        private function getUserId($username): int {
            $sqlUID = 'SELECT id FROM users WHERE name = ? LIMIT 1';
            $queryUID = $this->pdo->prepare($sqlUID);
            $queryUID->execute([$username]);
            $row = $queryUID->fetch();
            return $row[0];
        }
    }