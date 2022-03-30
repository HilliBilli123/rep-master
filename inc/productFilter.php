<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $id = $_GET["id"];
    include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    mysqli_query($connect, "SELECT products.*, category.nameCategory, category.nameCategoryKz, category.price FROM `products` join category on category.id = products.type where products.type = '$id'");
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/products.php');
?>