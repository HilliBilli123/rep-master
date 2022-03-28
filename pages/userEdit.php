<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    include "../inc/connect.php";
    $id = $_GET['id'];
    // echo $_GET['id'];
    // var_damp($_GET)
    // printf($id)
    // $connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    $result = mysqli_query($connect,"SELECT * FROM `user` WHERE `id` = '$id'");
    //print_r($result);
    //ini_set('date.timezone', 'Asia/Almaty');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $day = mysqli_fetch_assoc($result);
    ?>
    <form action="../inc/userEdit.php" method="POST">
        <input type="text" name="id" value="<?php echo $day['id']; ?>" style = "display:none">        
        <input type="text" name="login" value="<?php echo $day['login']; ?>">
        <input type="text" name="password" value="<?php echo $day['password']; ?>">
        <input type="text" name="lastName" value="<?php echo $day['lastName']; ?>">
        <input type="text" name="firstVhod" value="<?php echo $day['firstVhod']; ?>" style = "display:none">        
        <input type="text" name="firstName" value="<?php echo $day['firstName']; ?>">
        <input type="text" name="middleName" value="<?php echo $day['middleName']; ?>">
        <input type="text" name="email" value="<?php echo $day['email']; ?>">
        <input type="text" name="phone" value="<?php echo $day['phone']; ?>">
        <button type="submit">Изменить</button>
    </form>
</body>
</html>