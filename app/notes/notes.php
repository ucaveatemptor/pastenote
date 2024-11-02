<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pastenote</title>
</head>
<body>
    <?php require_once "../../blocks/header.php"?>
    <div>Sobriquet: <?=$_COOKIE['showUsername']?>.</div>
    <button><a href="../notes/createNote.php">Create note</a></button>
    <?php
        require_once "../src/notes.php"
    ?>
</body>
</html>