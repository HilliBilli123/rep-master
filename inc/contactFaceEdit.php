<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $contactFace = $_POST["contactFace"];
    $rabNum = $_POST['rabNum'];
    $sotNum = $_POST['sotNum'];
    $inst = $_POST["inst"];
    $email = $_POST['email'];
    $oNas = $_POST['oNas'];
    $oNasKz = $_POST["oNasKz"];
    $contactFaceKz = $_POST['contactFaceKz'];
    include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    mysqli_query($connect, "UPDATE `contacts` SET `contactFace` = '$contactFace', `rabNum` = '$rabNum', `sotNum` = '$sotNum', `inst` = '$inst', `email` = '$email', `oNas` = '$oNas', `pathImage` = '$pathImage', `oNasKz` = '$contactFaceKz', `contactFaceKz` = '$sotNum' WHERE `id` = '1' ");
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/admin.php');
?>