<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $productId = $_GET['id'];
    include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    $result = mysqli_query($connect,"delete from `otkos` where id = $productId");
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/otkosMain.php');
?>