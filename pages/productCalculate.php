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
$result = mysqli_query($connect, "SELECT products.*, category.nameCategory, category.nameCategoryKz, category.price AS categoryPrice FROM `products` join category on category.id = products.type WHERE products.id = '$id'");
$otkos = mysqli_query($connect, "select * from otkos");
$product = mysqli_fetch_assoc($result);
$categoryId = $product['type'];
$workTypes = mysqli_query($connect, "select * from `workType` where categoryId = '$categoryId'");
// print_r($result);
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
    <title>Товар</title>
</head>

<body class="body">
    <header class="header__main header_mainProduct">
        <div class="header__body _contein">
            <ul class="header__body__menu">
                <li class="menu__logo"><img src="../response/image/logo.png" alt="logo"></li>
                <li class="menu__link"><a href="../index.html">Главная</a></li>
                <li class="menu__link"><a href="products.php">Товары</a></li>
                <li class="menu__link"><a href="">Услуги</a></li>
                <li class="menu__link"><a href="">Корзина</a></li>
                <li class="menu__link"><a href="">Контакты</a></li>
                <li>
                    <ul class="menu__lang">
                        <img src="response/image/flagKz.png" alt="">
                        <img src="response/image/flagRu.png" alt="">
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <section class="main">
        <?php

        ?>
        <div class="product _contein">
            <div class="product__harackter__content">
                <div class="product_img">
                    <img src="../<?php echo $product['pathImage'] ?>" alt="">
                </div>
                <div class="harackter">
                    <div class="harackter__title">Наименование</div>
                    <div class="harackter__text">
                        <?php echo $product['name'] ?>
                    </div>
                    <div class="harackter__title">Тип</div>
                    <div class="harackter__text">
                        <?php echo $product['nameCategory'] ?>
                    </div>
                    <div class="harackter__title">Характиристика</div>
                    <div class="harackter__text">
                        <?php echo $product['harackter'] ?>
                    </div>
                </div>
            </div>
            <div class="product__calculate">
                <div class="product__calculate__parametr">
                    <div class="_mainTitle">Параметры</div>
                    <form action="../inc/createZakazProc.php" method="POST" name="myForm">
                        <div class="calculate__parametr__title">Размер</div>
                        <div class="product__calculate__size">
                            <input type="text" name="productId" value="<?php echo $product['id'] ?>" style="display:none;">
                            <input type="text" name="width" id="width" placeholder="Ширина" oninput="calcualte()">
                            <input type="text" name="height" id="height" placeholder="Высота" oninput="calcualte()">
                        </div>
                        <div class="calculate__parametr__title">Откос</div>
                        <div class="product__calculate__otkos">
                            <?php
                            foreach ($otkos as $valueOtkos) {
                            ?>
                                <input type="radio" id="<?php echo $valueOtkos['price'] ?>" name="otkosId" value="<?php echo $valueOtkos['id'] ?>">
                                <label for="Choice<?php echo $valueOtkos['id'] ?>"><?php echo $valueOtkos['ot'] ?> - <?php echo $valueOtkos['do'] ?></label>
                            <?php
                            }
                            ?>
                        </div>
                        <div>Дополнительно</div>
                        <div class="product__additional">
                            <?php
                            foreach ($workTypes as $workType) {
                            ?>
                                <label for=""><input type="checkbox" id="<?php echo $workType['price'] ?>" name="workType" value="<?php echo $workType['id'] ?>"><?php echo $workType['name'] ?></label>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="calculate__parametr__title">Цена</div>
                        <div class="product__calculate__totalPrice">
                            <input id="price" type="text" name="price">
                            <input type="text" id="priceKvm" value="<?php echo $product['categoryPrice'] ?>" style="display:none">
                            <input type="number" id="priceOtkos" value="" style="display:none">
                            <input type="number" id="priceAdd" value="" style="display:none">
                        </div>
                        <script>
                            function calcualte() {
                                var x = parseFloat(document.getElementById("width").value) || 0;
                                var y = parseFloat(document.getElementById("height").value) || 0;
                                var kvm = parseFloat(document.getElementById("priceKvm").value) || 0;
                                var priceAdd = parseFloat(document.getElementById("priceAdd").value) || 0;
                                var priceOtkos = parseFloat(document.getElementById("priceOtkos").value) || 0;
                                var total = (x * 0.001 + y * 0.001) * kvm;
                                document.getElementById("price").value = total + priceOtkos + priceAdd;
                            }

                            function onclick(e) {
                                language = parseFloat(e.target.id) || 0;
                                document.getElementById("priceOtkos").value = language;
                                var x = parseFloat(document.getElementById("width").value) || 0;
                                var y = parseFloat(document.getElementById("height").value) || 0;
                                var kvm = parseFloat(document.getElementById("priceKvm").value) || 0;
                                var priceAdd = parseFloat(document.getElementById("priceAdd").value) || 0;
                                var total = (x * 0.001 + y * 0.001) * kvm;
                                document.getElementById("price").value = total + language + priceAdd;

                            }
                            for (var i = 0; i < myForm.otkosId.length; i++) {
                                myForm.otkosId[i].addEventListener("click", onclick);
                            }

                            function addCalc(d) {
                                check = d.target.checked;
                                language = parseFloat(d.target.id) || 0;
                                var priceAdd = parseFloat(document.getElementById("priceAdd").value) || 0;
                                var total = parseFloat(document.getElementById("price").value) || 0;
                                if (check) {
                                    document.getElementById("price").value = total + language;
                                    document.getElementById("priceAdd").value = priceAdd + language;
                                } else {
                                    document.getElementById("price").value = total - language;
                                    document.getElementById("priceAdd").value = priceAdd - language;
                                }
                            }
                            for (var i = 0; i < myForm.workType.length; i++) {
                                myForm.workType[i].addEventListener("click", addCalc);
                            }
                        </script>
                        <button type="submit">Добавить в корзину</button>
                    </form>
                </div>

            </div>

        </div>
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