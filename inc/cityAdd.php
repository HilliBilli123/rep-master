<?php
session_start();
require_once 'connect.php';
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
$code = $_POST['code'];
$name = $_POST['name'];
$nameKz = $_POST['nameKz'];
// mysqli_query($connect, "INSERT INTO `manufactures` (`text`, `pathImage`, `textKz`) VALUES ('$text', '$pathImage', '$textKz')");
mysqli_query($connect, "INSERT INTO `city` (`code`, `name`, `nameKz`, `countryId`) VALUES ('$code', '$name', '$nameKz', '1')");

//ini_set('date.timezone', 'Asia/Almaty');
header('Location: ../pages/cityMain.php');
