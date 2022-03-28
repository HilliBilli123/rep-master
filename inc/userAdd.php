<?php
    session_start();
    require_once 'connect.php';
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $login = $_POST['login'];
    $password = $_POST['password'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    $sql = "INSERT INTO `user`(`login`, `password`, `firstVhod`, `city`, `lastName`, `firstName`, `middleName`, `email`, `phone`) VALUES ('$login','$password','1','1','$lastName','$firstName','$lastName','$email','$phone')";
    mysqli_query($connect, $sql);
    
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/userMain.php');
?>