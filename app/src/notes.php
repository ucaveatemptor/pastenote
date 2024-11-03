<?php
    require_once 'noteHandler.php';
    $user = $_COOKIE['showUsername'];
    $nh = new NoteHandler();
    $notes = $nh->getNotesByUsername($user);
