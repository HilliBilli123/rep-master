<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $id = $_POST["id"];
    $text = $_POST["text"];
    $path = 'admin/upload/'.time().$_FILES['file']['name'];
   
    $textKz = $_POST['textKz'];
    require_once 'connect.php';
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    if($_FILES["file"]["name"]){
    if(!move_uploaded_file($_FILES['file']['tmp_name'], '../'. $path)){
        $_SESSION['message'] = 'Ошибка при загрузке фото';
        header('Location: ../pages/manufacturesMain.php');
    }
    mysqli_query($connect, "UPDATE `manufactures` SET `text` = '$text', `pathImage` = '$path', `textKz` = '$textKz' WHERE `id` = '$id' ");
    }else{
        $_SESSION['message'] = 'Загрузите фото';
    }
    //ini_set('date.timezone', 'Asia/Almaty');
    header('Location: ../pages/manufacturesMain.php');
    // echo $path;
?>