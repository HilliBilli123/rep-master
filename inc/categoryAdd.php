<?php
    session_start();
    require_once 'connect.php';
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $code = $_POST['code'];
    $nameRu = $_POST['nameRu'];
    $nameKz = $_POST['nameKz'];
    //include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    mysqli_query($connect, "INSERT INTO `category` (`code`, `nameCategory`, `nameCategoryKz`) VALUES ('$code', '$nameRu', '$nameKz')");
    
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/categoryMain.php');
?>