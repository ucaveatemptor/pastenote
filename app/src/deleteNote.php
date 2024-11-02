<?php
    $id = $_GET['id'];
    require_once 'note.php';
    require_once '../../sql/db.php';
    $sql = 'DELETE FROM notes WHERE id = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$id]);
    header('Location: ../notes/notes.php');