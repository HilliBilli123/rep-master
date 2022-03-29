<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>123123</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="singin">
        <div class="singin__contein">
            <div class="singin__main">
                <form action="../inc/singin.php" method="post">
                    <div class="singin__content">
                        <h1>Bibala</h1>
                        <p>Авторизация</p>
                        <label for="login">Логин</label>
                        <input type="text" name="login">
                        <label for="password">Пароль</label>
                        <input type="password" name="password">
                        <div class="singin__button">
                            <button type="submit">Войти</button>
                            <a href="/">На главную</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>