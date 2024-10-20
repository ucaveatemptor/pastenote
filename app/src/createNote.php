<?php
    $label = filter_var($_POST['label'], FILTER_SANITIZE_SPECIAL_CHARS);
    $text = filter_var($_POST['text'], FILTER_SANITIZE_SPECIAL_CHARS);
    if (strlen($label) == 0) {
        echo "lable length = 0 amongus<br>";
        exit;
    }
    if (strlen($text) == 0) {
        echo "text length = 0 not acceptable<br>";
        exit;
    }
    require_once '../../sql/db.php';
    $user = $_COOKIE['showUsername'];
    $sqlUID = 'SELECT id FROM users WHERE name = ?';
    $queryUID = $pdo->prepare($sqlUID);
    $queryUID->execute([$user]);
    $row = $queryUID->fetch();
    $userId = $row[0];

    $date = date("Y-m-d");
    $sql = 'INSERT INTO notes(userId, label, text, date) VALUES (?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$userId,$label,$text,$date]);

    header('Location: ../notes/notes.php');