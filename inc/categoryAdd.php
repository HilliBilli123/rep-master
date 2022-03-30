<?php
session_start();
require_once 'connect.php';
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
$code = $_POST['code'];
$nameRu = $_POST['nameRu'];
$nameKz = $_POST['nameKz'];
$price = $_POST['price'];
$description = $_POST['description'];
//include "../inc/connect.php";
//$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
mysqli_query($connect, "INSERT INTO `category` (`code`, `nameCategory`, `nameCategoryKz`, `price`, `opisanie`) VALUES ('$code', '$nameRu', '$nameKz', '$price', '$description')");

//ini_set('date.timezone', 'Asia/Almaty');
header('Location: ../pages/categoryMain.php');
