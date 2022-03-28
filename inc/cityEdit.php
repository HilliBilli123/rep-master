<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $id = $_POST["id"];
    $code = $_POST["code"];
    $name = $_POST["name"];
    $nameKz = $_POST["nameKz"];
   
    $textKz = $_POST['textKz'];
    require_once 'connect.php';
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    mysqli_query($connect, "UPDATE `city` SET `code` = '$code', `name` = '$name', `nameKz` = '$nameKz' WHERE `id` = '$id' ");
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/cityMain.php');
    // echo $path;
?>