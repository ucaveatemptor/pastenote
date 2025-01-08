<?php
    require_once 'classes/noteHandler.php';
    $id = $_GET['id'];
    $nh = new NoteHandler();
    $nh->deleteNote($id);
    header('Location: ../notes/notes.php');