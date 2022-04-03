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
    <link rel="stylesheet" href="../css/admin.css">
    <title>Контактная информация</title>
</head>

<body class="body flex__content">
    <div class="menu__admin__pages">
        <div class="menu__admin__pages__contain">
            <div class="menu__admin__pages__logo">
                <img src="../response/image/logo.png" alt="">
            </div>
            <div class="menu__admin__pages__list">
                <a href="admin.php" class="manufact__link">На главную</a>
                <a href="productMain.php" class="manufact__link">Товары</a>
                <a href="manufacturesMain.php" class="manufact__link">Производители</a>
                <a href="categoryMain.php" class="manufact__link">Категории</a>
                <a href="userMain.php" class="manufact__link">Пользователи</a>
                <a href="cityMain.php" class="manufact__link">Город</a>
                <a href="otkosMain.php" class="manufact__link">Откос</a>
                <a href="zakazMain.php" class="manufact__link">Заказ</a>
                <a href="workTypeMain.php" class="manufact__link">Вид работы</a>
            </div>
        </div>
    </div>
    <?php
    $contact = mysqli_fetch_assoc($result);
    ?>
    <div class="contact__table table">
        <form action="../inc/contactFaceEdit.php" method="POST">
            <div class="contact__info">
                <div class="contact__title">
                    <label for="contactFace">Контактное лицо</label>
                    <input type="text" name="contactFace" value="<?php echo $contact['contactFace']; ?>">
                </div>
                <div class="contact__title">
                    <label for="contactFace">Рабочи номер</label>
                    <input type="text" name="rabNum" value="<?php echo $contact['rabNum']; ?>">
                </div>
                <div class="contact__title">
                    <label for="contactFace">Сотовый номер</label>
                    <input type="text" name="sotNum" value="<?php echo $contact['sotNum']; ?>">
                </div>
                <div class="contact__title">
                    <label for="contactFace">Инстаграм</label>
                    <input type="text" name="inst" value="<?php echo $contact['inst']; ?>">
                </div>
                <div class="contact__title">
                    <label for="contactFace">Почта</label>
                    <input type="text" name="email" value="<?php echo $contact['email']; ?>">
                </div>
                <div class="contact__title">
                    <label for="contactFace">О нас</label>
                    <input type="text" name="oNas" value="<?php echo $contact['oNas']; ?>">
                </div>
                <div class="contact__title">
                    <label for="contactFace">О нас каз</label>
                    <input type="text" name="oNasKz" value="<?php echo $contact['oNasKz']; ?>">
                </div>
                <div class="contact__title">
                    <label for="contactFace">Контактное лицо каз</label>
                    <input type="text" name="contactFaceKz" value="<?php echo $contact['contactFaceKz']; ?>">
                </div>
                <button type="submit">Изменить</button>
            </div>
        </form>
    </div>
</body>

</html>