<?php
    $id = $_GET['id'];
    require_once 'noteHandler.php';
    $nh = new NoteHandler();
    $nh->deleteNote($id);
    header('Location: ../notes/notes.php');