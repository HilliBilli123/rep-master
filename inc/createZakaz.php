<?php
    session_start();
    require_once 'connect.php';
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $ids = $_POST['idZakazProc'];
    $otkosIds = $_POST['otkosId'];
    $productIds = $_POST['productId']; 
    $widths = $_POST['width'];
    $heights = $_POST['height'];
    $prices = $_POST['price'];
    $fio = $_POST['fio'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];
    $count = 0;
    foreach($ids as $id){
        $otkosId = $otkosIds[$count];
        $productId = $productIds[$count];
        $width = $widths[$count];
        $height = $heights[$count];
        $price = $prices[$count];
        mysqli_query($connect, "INSERT INTO `zakaz`(`categoryId`, `otkosId`, `height`, `width`, `productId`, `price`, `fio`, `email`, `phone`, `addr`) VALUES (0,'$otkosId','$height','$width','$price','$productId', '$fio', '$email', '$phone', '$addr')");
        mysqli_query($connect, "delete from `zakazprocedure` where id = $id");        
        $count++;
    }
    //include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    //ini_set('date.timezone', 'Asia/Almaty');
     header('Location: ../index.html');
?>