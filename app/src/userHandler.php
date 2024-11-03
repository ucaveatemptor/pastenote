<?php

    require_once '../../sql/db.php';
    require_once '../../env/hashkey.php';
    class UserHandler {
        private $pdo;
        public function __construct() {
            $this->pdo = Database::getInstance();
        }
        public function registration($username, $password) {
            $password = md5(KEY.$password);
            try {
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $this->pdo->prepare('INSERT INTO users(name, password) VALUES(?, ?)');
                $query->execute([$username, $password]);
            } catch (PDOException $e) {
                echo "Connection error: " . $e->getMessage();
            }
        }
    }