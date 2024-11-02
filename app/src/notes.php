<?php
    require_once '../../sql/db.php';
    $user = $_COOKIE['showUsername'];
    $sqlUID = 'SELECT id FROM users WHERE name = ?';
    $queryUID = $pdo->prepare($sqlUID);
    $queryUID->execute([$user]);
    $row = $queryUID->fetch();
    $userId = $row[0];
    $sql = 'SELECT id, label, text, date FROM notes WHERE userId = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$userId]);
    $notes = $query->fetchAll(PDO::FETCH_OBJ);