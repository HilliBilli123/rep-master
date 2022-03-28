<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $chek_user = mysqli_query($connect, "SELECT user.*, city.name AS cityName FROM `user` JOIN `city` ON city.id = user.city WHERE `login` = '$login' and `password` = '$password'");
    
    if(mysqli_num_rows($chek_user) > 0){
        $user = mysqli_fetch_assoc($chek_user);
        $_SESSION['user'] = [
            "login" => $user['login'],
            "cityName" => $user ['cityName'],
            "lastName" => $user ['lastName'],
            "firstName" => $user['firstName'],
            "middleName" => $user['middleName'],
            "email" => $user['email'],
            "phone" => $user['phone']
        ];
        header('Location: ../pages/admin.php');
    }
    else
    {
        $_SESSION['message'] = "Не верный логин или пароль";
        header('Location: ../index.php');
    }