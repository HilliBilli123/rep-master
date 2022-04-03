<?php
session_start();
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
$productId = $_GET['id'];
include "../inc/connect.php";

//$connect = mysqli_connect('localhost', 'root' , '' , 'bibala');
$result = mysqli_query($connect, "SELECT zakaz.*, products.name, products.type, products.pathImage, products.harackter, otkos.ot, otkos.do, category.nameCategory FROM `zakaz` JOIN `products` on zakaz.productId = products.id JOIN `category` ON products.type = category.id JOIN otkos ON otkos.id = zakaz.otkosId WHERE zakaz.id = '$productId'");
$product = mysqli_fetch_assoc($result);
//ini_set('date.timezone', 'Asia/Almaty');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Zakaz Panel</title>
</head>

<body class="body">
    <div class="main">
        <div class="menu__admin__pages">
            <div class="menu__admin__pages__contain">
                <div class="menu__admin__pages__logo">
                    <img src="../response/image/logo.png" alt="">
                </div>
                <div class="menu__admin__pages__list">
                    <a href="admin.php" class="manufact__link">На главную</a>
                    <a href="productMain.php" class="manufact__link">Товаровы</a>
                    <a href="manufacturesMain.php" class="manufact__link">Производители</a>
                    <a href="categoryMain.php" class="manufact__link">Категории</a>
                    <a href="userMain.php" class="manufact__link">Пользоваетели</a>
                    <a href="cityMain.php" class="manufact__link">Город</a>
                    <a href="otkosMain.php" class="manufact__link">Откос</a>
                    <a href="zakazMain.php" class="manufact__link">Заказ</a>
                    <a href="workTypeMain.php" class="manufact__link">Вид работы</a>
                </div>
            </div>
        </div>
        <div class="zakaz__main">
            <div class="zakaz__content">
                <div class="zakaz__content__img">
                    <img src="../<?php echo $product['pathImage'] ?>" alt="">
                </div>
                <div class="zakaz__info__content">
                    <div class="harakter">
                        <div class="zakaz__info__title">Наименование</div>
                        <p><?php echo $product['name'] ?></p>
                        <div class="zakaz__info__title">Тип</div>
                        <p><?php echo $product['nameCategory'] ?></p>
                        <div class="zakaz__info__title">Характиристика</div>
                        <p><?php echo $product['harackter'] ?></p>
                        <div class="zakaz__info__title">Ширина</div>
                        <p><?php echo $product['width'] ?></p>
                        <div class="zakaz__info__title">Высота</div>
                        <p><?php echo $product['height'] ?></p>
                        <div class="zakaz__info__title">Откос</div>
                        <p><?php echo $product['ot'] ?> - <?php echo $product['do'] ?></p>
                        <div class="zakaz__info__title">Дополнительно</div>
                        <p><?php echo $product['dop'] ?></p>
                        <div class="zakaz__info__title">Цена</div>
                        <p><?php echo $product['price'] ?></p>
                    </div>
                    <div class="personInfo">
                        <div class="zakaz__info__title">ФИО</div>
                        <p><?php echo $product['fio'] ?></p>
                        <div class="zakaz__info__title">ЭЛ. почта</div>
                        <p><?php echo $product['email'] ?></p>
                        <div class="zakaz__info__title">Телефон</div>
                        <p><?php echo $product['phone'] ?></p>
                        <div class="zakaz__info__title">Адрес</div>
                        <p><?php echo $product['addr'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>