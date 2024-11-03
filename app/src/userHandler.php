<?php

    require_once '../../sql/db.php';
    require_once '../../env/hashkey.php';
    class UserHandler {
        private $pdo;
        public function __construct() {
            $this->pdo = Database::getInstance();
        }
        public function registration($username, $password): bool {
            if(!$this->regMatchCheck($username)){
                return false;
            };

            $password = md5(KEY.$password);
            try {
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $this->pdo->prepare('INSERT INTO users(name, password) VALUES(?, ?)');
                $query->execute([$username, $password]);
                return true;
            } catch (PDOException $e) {
                echo "Connection error: " . $e->getMessage();
                return false;
            }
        }
        public function login($username, $password): bool {
            $password = md5(KEY.$password);
            $query = $this->pdo->prepare('SELECT id FROM users WHERE name = ? AND password = ?');
            $query->execute([$username, $password]);
            return $query->rowCount() == 1;
        }
        private function regMatchCheck($username): bool {
            $queryCheck = $this->pdo->prepare('SELECT id FROM users WHERE name = ?');
            $queryCheck->execute([$username]);
            return $queryCheck->rowCount() == 0;
        }

    }