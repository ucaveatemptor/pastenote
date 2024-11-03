<?php 
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    $regexp = "/^[a-zA-Z_а-яёА-ЯЁ][0-9a-zA-Z_а-яёА-ЯЁ]+$/u";
    if (!preg_match($regexp, $username, $matches) || strlen($username) < 2) {
        echo "Username error";
        exit;
    };
    if(strlen($password) < 1) {
        echo "Password error";
        exit;
     }

    require_once 'userHandler.php';
    require_once '../../sql/db.php';
    $pdo = Database::getInstance();
    $sqlCheck = 'SELECT id FROM users WHERE name = ?';
    $queryCheck = $pdo->prepare($sqlCheck);
    $queryCheck->execute([$username]);
    if ($queryCheck->rowCount() == 0) {
        $uh = new UserHandler();
        $uh->registration($username, $password);
        // header('Location: /login.php');
    } else {
        echo 'Username already in use';
    }