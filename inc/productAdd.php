<?php
    session_start();
    require_once 'connect.php';
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $name = $_POST['name'];
    $price = $_POST['price'];
    $harackter = $_POST['harackter'];
    //include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    mysqli_query($connect, "INSERT INTO `products` (`name`, `pathImage`, `price`, `harackter`, `type`, `idStock`, `nameKz`, `harakterKz`) VALUES ('$name', ' ', '$price', '$harackter', '1', '1', ' ', ' ')");
    
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/productMain.php');
?>