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
    $dops = $_POST['dop'];
    $count = 0;
    foreach($ids as $id){
        $otkosId = $otkosIds[$count];
        $productId = $productIds[$count];
        $width = $widths[$count];
        $height = $heights[$count];
        $price = $prices[$count];
        $dop = $dops[$count];
        mysqli_query($connect, "INSERT INTO `zakaz`(`categoryId`, `otkosId`, `height`, `width`, `productId`, `price`, `fio`, `email`, `phone`, `addr`, `dop`) VALUES (0,'$otkosId','$height','$width','$productId','$price', '$fio', '$email', '$phone', '$addr', '$dop')");
        mysqli_query($connect, "delete from `zakazprocedure` where id = $id");        
        $count++;
    }
    //include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    //ini_set('date.timezone', 'Asia/Almaty');
     header('Location: ../index.php');
?>