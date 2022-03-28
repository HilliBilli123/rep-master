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
    $result = mysqli_query($connect,"SELECT products.*, category.nameCategory, category.nameCategoryKz, category.price FROM `products` join category on category.id = products.type WHERE products.id = '$id'");
    $otkos = mysqli_query($connect, "select * from otkos")
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

<body>
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
            $product = mysqli_fetch_assoc($result);
        ?>
            <div class="product">
                <div class = "product_img">
                    <img src="../<?php echo $product['pathImage']?>" alt="">   
                </div>
                <div class="harakter">
                    <p><?php echo $product['name']?></p>
                    <p><?php echo $product['nameCategory']?></p>
                    <p><?php echo $product['harackter']?></p>
                </div>
                <div class="calculate">
                <form action="../" method="POST">
                    <input type="text" name="width" placeholder="Ширина">
                    <input type="text" name="height" placeholder="Высота">
                    <?php
                    foreach($otkos as $valueOtkos)
                        {
                    ?>  
                    <input type="radio" id="Choice<?php echo $valueOtkos['id']?>" name="contact<?php echo $valueOtkos['id']?>" value="<?php echo $valueOtkos['ot']?>">
                    <label for="Choice<?php echo $valueOtkos['id']?>"><?php echo $valueOtkos['ot']?> - <?php echo $valueOtkos['do']?></label>
                    <?php
                        }
                    ?>                  
                    <button type="submit">Добавить в корзину</button>
                </form>
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