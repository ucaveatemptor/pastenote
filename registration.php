<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pastenote</title>
</head>
<body>
    <?php require_once "blocks/header.php"?>
    <form method="post" action="app/src/reg.php">
    <div class="contcenter">
        <p>Регистрация</p>
        <div>
            <label>Имя</label>
            <input type="text" name="username">
        </div>
        <div>
            <label>Пароль</label>
            <input type="password" name="password">
        </div>

        <button type="submit">я сделал</button>

    </div>
</body>
</html>