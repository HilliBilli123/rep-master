<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    //include "../inc/connect.php";
    // echo $_GET['id'];
    // var_damp($_GET)
    // printf($id)
    // $connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    //$result = mysqli_query($connect,"SELECT * FROM `products` WHERE `id` = '$id'");
    // print_r($result);
    //ini_set('date.timezone', 'Asia/Almaty');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../inc/userAdd.php" method="POST">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="password" placeholder="Пароль">
        <input type="text" name="lastName" placeholder="Фамилия">
        <input type="text" name="firstName" placeholder="Имя">
        <input type="text" name="middleName" placeholder="Отчество">
        <input type="text" name="email" placeholder="Почта">
        <input type="text" name="phone" placeholder="Телефон">
        <button type="submit">Добавить</button>
    </form>
</body>
</html>