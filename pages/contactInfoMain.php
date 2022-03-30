<?php
session_start();
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
include "../inc/connect.php";
//$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
$result = mysqli_query($connect, "SELECT * FROM `contacts` where `id` = '1'");
//print_r($result);
//ini_set('date.timezone', 'Asia/Almaty');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <title>ContactInfo Panel</title>
</head>

<body class="body"><a href="admin.php">На главную</a>
    <?php
    $contact = mysqli_fetch_assoc($result);
    ?>
    <form action="../inc/contactFaceEdit.php" method="POST">
        <input type="text" name="contactFace" value="<?php echo $contact['contactFace']; ?>">
        <input type="text" name="rabNum" value="<?php echo $contact['rabNum']; ?>">
        <input type="text" name="sotNum" value="<?php echo $contact['sotNum']; ?>">
        <input type="text" name="inst" value="<?php echo $contact['inst']; ?>">
        <input type="text" name="email" value="<?php echo $contact['email']; ?>">
        <input type="text" name="oNas" value="<?php echo $contact['oNas']; ?>">
        <input type="text" name="oNasKz" value="<?php echo $contact['oNasKz']; ?>">
        <input type="text" name="contactFaceKz" value="<?php echo $contact['contactFaceKz']; ?>">
        <button type="submit">Изменить</button>
    </form>
</body>

</html>