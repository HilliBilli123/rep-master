<?php
    session_start();
    require_once 'connect.php';
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $ot = $_POST['ot'];
    $do = $_POST['do'];
    $price = $_POST['price'];
    // mysqli_query($connect, "INSERT INTO `manufactures` (`text`, `pathImage`, `textKz`) VALUES ('$text', '$pathImage', '$textKz')");
    mysqli_query($connect, "INSERT INTO `otkos` (`ot`, `do`, `price`) VALUES ('$ot', '$do', '$price')");
    
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/otkosMain.php');
?>