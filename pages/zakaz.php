<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    $productId = $_GET['id'];
    include "../inc/connect.php";

    //$connect = mysqli_connect('localhost', 'root' , '' , 'bibala');
    $result = mysqli_query($connect,"SELECT zakaz.*, products.name, products.type, products.pathImage, products.harackter, otkos.ot, otkos.do, category.nameCategory FROM `zakaz` JOIN `products` on zakaz.productId = products.id JOIN `category` ON products.type = category.id JOIN otkos ON otkos.id = zakaz.otkosId WHERE zakaz.id = '$productId'");
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
<body>
    
    

    <div class="manufactures">
        <div class="menu__admin__pages">
            <div class="menu__admin__pages__contain">
                <div class="menu__admin__pages__logo">
                    <img src="../response/image/logo.png" alt="">
                </div>
                <div class="menu__admin__pages__list">
                    <a href="admin.php" class="manufact__link">На главную</a>
                    <a href="" class="manufact__link">Товаровы</a>
                    <a href="" class="manufact__link">Производители</a>
                    <a href="" class="manufact__link">Категории</a>
                    <a href="" class="manufact__link">Пользоваетели</a>
                    <a href="" class="manufact__link">Город</a>
                    <a href="" class="manufact__link">Откос</a>
                    <a href="" class="manufact__link">Заказ</a>
                    <!-- <a href="" class="manufact__link"></a>
                    <a href="" class="manufact__link"></a> -->
                </div>
            </div>
        </div>
        <div class = "product_img">
            <img src="../<?php echo $product['pathImage']?>" alt="">   
        </div>
        <div class="harakter">
            <p><?php echo $product['name']?></p>
            <p><?php echo $product['nameCategory']?></p>
            <p><?php echo $product['harackter']?></p>
            <p><?php echo $product['width']?></p>
            <p><?php echo $product['height']?></p>
            <p><?php echo $product['price']?></p>
            <p><?php echo $product['ot']?> - <?php echo $product['do']?></p>
        </div>
        <div class="personInfo">
            <p><?php echo $product['fio']?></p>
            <p><?php echo $product['email']?></p>
            <p><?php echo $product['phone']?></p>
            <p><?php echo $product['addr']?></p>
        </div>

    </div>
</body>
</html>