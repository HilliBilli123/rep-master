<?php
session_start();
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
include "../inc/connect.php";
//$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
$result = mysqli_query($connect, "SELECT zakaz.*, products.name, products.type, category.nameCategory FROM `zakaz` JOIN `products` on zakaz.productId = products.id JOIN `category` ON products.type = category.id ");
//print_r($result);
//ini_set('date.timezone', 'Asia/Almaty');
?>
<!-- <pre>
    <?php
    print_r(mysqli_fetch_assoc($result));
    ?>
</pre> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>City Panel</title>
</head>

<body class="body">
    <!-- <form action="" method="post" enctype="multipart/form-data"> -->

    <!-- </form> -->
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
                </div>
            </div>
        </div>
        <div class="table">
            <div class="table__contain">
                <div class="table__content flex__content table__header">
                    <div class="table__title__number">№</div>
                    <div class="table__title">Наименование</div>
                    <div class="table__title">Категория товара</div>
                    <div class="table__title">Доп. работы</div>
                    <div class="table__title">Цена</div>
                    <div class="table__title">Просмотр</div>
                </div>
                <?php
                $count = 0;
                foreach ($result as $product) {
                    $count++;
                ?>
                    <div class="table__content flex__content">
                        <div class="table__title__number"><?php echo $count ?></div>
                        <div class="table__title"><?php echo $product['name'] ?></div>
                        <div class="table__title"><?php echo $product['nameCategory'] ?></div>
                        <div class="table__title"><?php echo $product['dop'] ?></div>
                        <div class="table__title"><?php echo $product['price'] ?></div>
                        <div class="table__title">
                            <a class="" href="../pages/zakaz.php?id=<?php echo $product['id']; ?>">Посмотреть</a>
                        </div>
                    </div>
                <?php
                }
                if ($_SESSION['message']) {
                    echo '<p class="msg"> ' . $_SESSION['message'] .  ' </p> ';
                }
                unset($_SESSION['message']);
                ?>
            </div>
        </div>
    </div>
    <script src="../js/popap.js"></script>
</body>

</html>