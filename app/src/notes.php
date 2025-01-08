<?php
    require_once 'classes/noteHandler.php';
    $user = $_COOKIE['showUsername'];
    $nh = new NoteHandler();
    $notes = $nh->getNotesByUsername($user);
