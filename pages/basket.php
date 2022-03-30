<?php
session_start();
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
include "../inc/connect.php";
//$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
$result = mysqli_query($connect, "SELECT zakazprocedure.*, products.name AS productName, products.type, products.pathImage, category.nameCategory, otkos.ot AS otkosOt, otkos.do AS otkosDo from `zakazprocedure` 
    JOIN otkos on otkos.id = zakazprocedure.otkosId
    JOIN products ON products.id = zakazprocedure.productId
    join category on category.id = products.type");
//print_r($result);
//ini_set('date.timezone', 'Asia/Almaty');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Товары</title>
</head>

<body class="body">
    <header class="header__main">
        <div class="header__body _contein">
            <ul class="header__body__menu">
                <li class="menu__logo"><img src="../response/image/logo.png" alt="logo"></li>
                <li class="menu__link"><a href="../index.php">Главная</a></li>
                <li class="menu__link"><a href="../pages/products.php">Товары</a></li>
                <li class="menu__link"><a href="../pages/basket.php">Корзина</a></li>
                <li class="menu__link"><a href="">Контакты</a></li>
                <!-- <li>
					<ul class="menu__lang">
						<img src="response/image/flagKz.png" alt="">
						<img src="response/image/flagRu.png" alt="">
					</ul>
				</li> -->
                <li class="menu__link menu__auth">
                    <a href="../pages/singin.php">
                        <img src="../response/image/userIcon.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <section class="main">
        <form action="../inc/createZakaz.php" method="POST">
            <?php
            $ids = "";
            foreach ($result as $product) {
            ?>
                <div class="product">
                    <div class="product_img">
                        <img src="../<?php echo $product['pathImage'] ?>" alt="">
                    </div>
                    <div class="nameAndType">
                        <p><?php echo $product['productName'] ?></p>
                        <p><?php echo $product['nameCategory'] ?></p>
                        <p><?php echo $product['height'] ?></p>
                        <p><?php echo $product['width'] ?></p>
                        <p><?php echo $product['price'] ?></p>
                        <p><?php echo $workTypes['name'] ?></p>
                        <p><?php echo $product['otkosOt'] ?> - <?php echo $product['otkosDo'] ?></p>
                    </div>
                </div>
                <input type="text" name="idZakazProc[]" value="<?php echo $product['id'] ?>" style="display:none;">
                <input type="text" name="otkosId[]" value="<?php echo $product['otkosId'] ?>" style="display:none;">
                <input type="text" name="productId[]" value="<?php echo $product['productId'] ?>" style="display:none;">
                <input type="text" name="width[]" value="<?php echo $product['width'] ?>" style="display:none;">
                <input type="text" name="height[]" value="<?php echo $product['height'] ?>" style="display:none;">
                <input type="text" name="price[]" value="<?php echo $product['price'] ?>" style="display:none;">
            <?php
            }
            ?>
            <div class="zakaz">
                <!-- <input type="number" name = "idZakazProc" value = "<?php echo $product['id'] ?>" style = "display:none;" > -->
                <input type="text" name="fio" id="fio">
                <label for="fio">ФИО</label>
                <input type="text" name="email" id="email">
                <label for="email">Email</label>
                <input type="text" name="phone" id="phone">
                <label for="phone">Сотовый телефон</label>
                <input type="text" name="addr" id="addr">
                <label for="addr">Адрес доставки</label>
                <button type="submit">Заказать</button>
            </div>
        </form>
    </section>
    <footer class="footer">
        <div class="footer__cpntainer _contein">
            <div class="footer__body">

                <div class="footer__contacts">
                    <div class="footer__contacts _footer-title">Контакты</div>
                    <ul class="footer__contacts__list">
                        <li><a href="tel:87475608836" class="footer__contacts__link">87475608836</a></li>
                        <li><a href="tel:87475608836" class="footer__contacts__link">87475608836</a></li>
                        <li><a href="tel:87475608836" class="footer__contacts__link icon-whatsapp">87475608836</a></li>
                        <li><a href="" class="footer__contacts__link icon-location2">Аль фараби 110</a></li>
                    </ul>
                </div>
                <div class="footer__socialMedia">
                    <div class="footer__socialMedia _footer-title">Следите за нами</div>
                    <ul class="footer__socialMedia__list">
                        <li><a href="" class="footer__socialMedia__link icon-facebook2">Dauletbekfacebook</a></li>
                        <li><a href="" class="footer__socialMedia__link icon-instagram">DauletbekInstagram</a></li>
                        <li><a href="" class="footer__socialMedia__link icon-telegram">DauletbekTelegram</a></li>
                        <li><a href="" class="footer__socialMedia__link icon-telegram">DauletbekEmail</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>