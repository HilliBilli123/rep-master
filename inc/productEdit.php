<?php
session_start();
require_once 'connect.php';
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
$id = $_POST["id"];
$name = $_POST['name'];
$nameKz = $_POST['nameKz'];
$price = $_POST['price'];
$harackter = $_POST['harackter'];
$harackterKz = $_POST['harackterKz'];
$category = $_POST['nameCategory'];
$path = 'admin/upload/' . time() . $_FILES['file']['name'];
if ($_FILES["file"]["name"]) {
    if (!move_uploaded_file($_FILES['file']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке фото';
        header('Location: ../pages/manufacturesMain.php');
    }
    mysqli_query($connect, "UPDATE `products` SET `name` = '$name', `harackter` = '$harackter', `type` = '$category', `price` = '$price', `nameKz` = '$nameKz', `harakterKz` = '$harackterKz' WHERE `id` = '$id' ");
} else {
    $_SESSION['message'] = 'Загрузите фото';
}
//ini_set('date.timezone', 'Asia/Almaty');
header('Location: ../pages/productMain.php');
