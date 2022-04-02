<?php
session_start();
require_once 'connect.php';
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
$id = $_POST['productId'];
$width = $_POST['width'];
$height = $_POST['height'];
$price = $_POST['price'];
$otkosId = $_POST['otkosId'];
$workTypes = $_POST['workType'];
$dop = "";
// foreach ($workTypes as $workType) {
//     $dop += $workType;
// }
//include "../inc/connect.php";
//$connect = mysqli_connect('localhost', 'root' , '' , 'bibala');
mysqli_query($connect, "INSERT INTO `zakazprocedure`(`categoryId`, `otkosId`, `height`, `width`, `productId`, `price`, `dop`) VALUES ('0','$otkosId','$height','$width','$id', '$price', '$dop')");

//ini_set('date.timezone', 'Asia/Almaty');
header('Location: ../pages/products.php');
