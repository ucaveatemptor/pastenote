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
    <form method="post" action="../src/createNote.php">
    <div>Sobriquet: <?=$_COOKIE['showUsername']?>.</div>
    <div>
            <label>label</label>
            <input type="text" name="label">
        </div>
        <div>
            <label>text</label>
            <textarea rows="2" cols="25" placeholder="text" name="text"></textarea>
        </div>
        <button type="submit">submit</button>
</body>
</html>