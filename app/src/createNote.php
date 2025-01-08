<?php
    require_once 'classes/noteHandler.php';
    $label = filter_var($_POST['label'], FILTER_SANITIZE_SPECIAL_CHARS);
    $text = filter_var($_POST['text'], FILTER_SANITIZE_SPECIAL_CHARS);
    if (strlen($label) == 0) {
        echo "lable length = 0 amongus<br>";
        exit;
    } else if(strlen($label) > 200) {
        echo "Max length of label: 200, you have: " . strlen($label);
        exit;
    }
    if (strlen($text) == 0) {
        echo "text length = 0 not acceptable<br>";
        exit;
    } else if(strlen($text) > 30000) {
        echo "Max length of text: 30000, you have: " . strlen($text);
        exit;
    }
    $user = $_COOKIE['showUsername'];
    $nh = new NoteHandler();
    $nh->addNote($user, $label, $text);
    header('Location: ../notes/notes.php');