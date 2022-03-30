<?php
session_start();
require_once 'connect.php';
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
$text = $_POST['text'];
$path = 'admin/upload/' . time() . $_FILES['file']['name'];
$textKz = $_POST['textKz'];
// mysqli_query($connect, "INSERT INTO `manufactures` (`text`, `pathImage`, `textKz`) VALUES ('$text', '$pathImage', '$textKz')");
if ($_FILES["file"]["name"]) {
    if (!move_uploaded_file($_FILES['file']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке фото';
        header('Location: ../pages/manufacturesMain.php');
    }
    mysqli_query($connect, "INSERT INTO `manufactures` (`text`, `pathImage`, `textKz`) VALUES ('$text', '$path', '$textKz')");
} else {
    $_SESSION['message'] = 'Загрузите фото';
}

//ini_set('date.timezone', 'Asia/Almaty');
header('Location: ../pages/manufacturesMain.php');
