<?php
session_start();
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    include "../inc/connect.php";
	$id = $_GET['id'];
	if($id > 0){
		$result = mysqli_query($connect,"SELECT products.*, category.nameCategory, category.nameCategoryKz, category.price FROM `products` join category on category.id = products.type where `type` = '$id'");
	}else{
		$result = mysqli_query($connect,"SELECT products.*, category.nameCategory, category.nameCategoryKz, category.price FROM `products` join category on category.id = products.type");
	}
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
	$category = mysqli_query($connect, "SELECT * FROM `category`");

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

<body>
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
				<li class="menu__link menu__auth"><a href="/pages/singin.php">
						<img src="../response/image/userIcon.png" alt="">
					</a></li>
			</ul>
		</div>
	</header>
    <section class="page__products products">
		<div class="product__menu _contein">
			<ul class="product__body__menu">
				<li class="product__menu__link"><a href="../pages/products.php">Все</a></li>
				<?php
				foreach($category as $type)
					{
				?>
					<li class="product__menu__link"><a href="../pages/products.php?id=<?php echo $type['id'];?>"><?php echo $type['nameCategory']?></a></li>
				<?php
					}
				?>	
			</ul>		
		</div>
        <div class="products-container _contein">
			<h2 class="products__title _title"></h2>
			<div class="products__items">
				<?php
				foreach ($result as $product) {
				?>
					<div class="products__item item__product">
						<div class="item__product__image _ibg">
							<img src="../<?php echo $product['pathImage'] ?>" alt="">
						</div>
						<div class="item__product__body">
							<div class="item__product__content">
								<div class="item__product__title">
									<p><?php echo $product['name']?></p>
								</div>
								<div class="item__product__text">
									<?php echo $product['nameCategory']?>
								</div>
								<div class="item__product__buttons">
									<a href="productCalculate.php?id=<?php echo $product['id']; ?>" class="item__product__button">Подробнее</a>
								</div>
							</div>		
						</div>
						
					</div>
				<?php
				}
				?>
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