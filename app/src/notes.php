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

    foreach($notes as $note) {
        echo '
        <div class="note">
            <p style>'. $note->label .'<br></p>
            <a>'. $note->text.'<br><br></a>
            <a class="redtext"> Дата создания: '. $note->date .'</a>
            <a href=../src/deleteNote.php?id=' . $note->id .'>Удалить</a>
        </div>';
    }