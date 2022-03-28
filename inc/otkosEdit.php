<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $id = $_POST["id"];
    $ot = $_POST["ot"];
    $do = $_POST["do"];
    $price = $_POST["price"];
   
    $textKz = $_POST['textKz'];
    require_once 'connect.php';
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    mysqli_query($connect, "UPDATE `otkos` SET `ot` = '$ot', `do` = '$do', `price` = '$price' WHERE `id` = '$id' ");
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/otkosMain.php');
    // echo $path;
?>