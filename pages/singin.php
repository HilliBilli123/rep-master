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
                        <label for="login">Логин</label>
                        <input type="text" name="login">
                        <label for="password">Пароль</label>
                        <input type="password" name="password">
                        <button type="submit">Войти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>