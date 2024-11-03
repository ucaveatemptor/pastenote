<?php
    require_once 'noteHandler.php';
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
    $user = $_COOKIE['showUsername'];
    $nh = new NoteHandler();
    $nh->addNote($user, $label, $text);
    header('Location: ../notes/notes.php');