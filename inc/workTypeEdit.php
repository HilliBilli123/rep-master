<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $id = $_POST["id"];
    $name = $_POST["name"];
    $nameKz = $_POST['nameKz'];
    $price = $_POST['price'];
    $categoty = $_POST['nameCategory'];
    include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    mysqli_query($connect, "UPDATE `workType` SET `name` = '$name', `nameKz` = '$nameKz', `price` = '$price', `categoryId` = '$categoty' WHERE `id` = '$id' ");
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/workTypeMain.php');
?>