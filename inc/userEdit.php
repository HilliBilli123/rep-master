<?php
session_start();
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
$id = $_POST["id"];
$login = $_POST["login"];
$password = $_POST['password'];
$firstVhod = $_POST['firstVhod'];
$lastName = $_POST["lastName"];
$firstName = $_POST["firstName"];
$middleName = $_POST['middleName'];
$city = $_POST['cityName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
// print_r($_POST);
include "../inc/connect.php";
//$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
mysqli_query($connect, "UPDATE `user` SET `login` = '$login', `password` = '$password', `lastName` = '$lastName', `firstName` = '$firstName', `middleName` = '$middleName', `email` = '$email', `phone` = '$phone', `city` = '$city' WHERE `id` = '$id' ");
//ini_set('date.timezone', 'Asia/Almaty');
header('Location: ../pages/userMain.php');
