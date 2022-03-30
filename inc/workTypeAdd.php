<?php
    session_start();
    require_once 'connect.php';
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $name = $_POST['name'];
    $nameKz = $_POST['nameKz'];
    $price = $_POST['price'];
    $category = $_POST['nameCategory'];
    //include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    mysqli_query($connect, "INSERT INTO `workType` (`categoryId`, `name`, `nameKz`, `price`) VALUES ('$category', '$name', '$nameKz', '$price')");
    
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/workTypeMain.php');
?>