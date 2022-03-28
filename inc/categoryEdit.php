<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $id = $_POST["id"];
    $code = $_POST["code"];
    $name = $_POST['nameRu'];
    $nameKz = $_POST['nameKz'];
    include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    mysqli_query($connect, "UPDATE `category` SET `code` = '$code', `nameCategory` = '$name', `nameCategoryKz` = '$nameKz' WHERE `id` = '$id' ");
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/categoryMain.php');
?>