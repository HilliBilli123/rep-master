<?php
    session_start();
    include "inc/connect.php";
    $result = mysqli_query($connect,"SELECT * FROM `contacts` WHERE `id` = '1'");
	$result = mysqli_fetch_assoc($result)
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/swiper-bundle.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Document</title>
</head>

<body >
	<header class="header__main">
		<div class="header__body _contein">
			<ul class="header__body__menu">
				<li class="menu__logo"><img src="response/image/logo.png" alt="logo"></li>
				<li class="menu__link"><a href="">Главная</a></li>
				<li class="menu__link"><a href="/pages/products.php">Товары</a></li>
				<li class="menu__link"><a href="/pages/basket.php">Корзина</a></li>
				<li class="menu__link"><a href="#footerMain">Контакты</a></li>
				<!-- <li>
					<ul class="menu__lang">
						<img src="response/image/flagKz.png" alt="">
						<img src="response/image/flagRu.png" alt="">
					</ul>
				</li> -->
				<li class="menu__link menu__auth"><a href="/pages/singin.php">
					<img src="response/image/userIcon.png" alt="">
				</a></li>
			</ul>
		</div>
	</header>
	<section class="main">
		<div class="slider _contein">
			<div class="image-slider swiper">
				<div class="image-slider__wrapper swiper-wrapper">
					<div class="image-slider__slide swiper-slide">
						<div class="image-slider_content">
							<div class="image-slider__image _ibg">
								<img src="response/slider/window.png" alt="no Image">
							</div>
							<div class="image-slider__contain slider-contain">
								<div class="slider-contain__title">
									Пластиковые окна
								</div>
								<div class="slider-contain__text">
									Материалы высшего качества
								</div>
								<div class="slider-contain__text">
									Выбирайте только лучшее
								</div>
								<div class="slider-contain__buttons">
									<a href="#about" class="slider-contain__button">Узнать</a>
								</div>
							</div>
						</div>
					</div>
					<div class="image-slider__slide swiper-slide">
						<div class="image-slider_content">
							<div class="image-slider__image _ibg">
								<img src="response/slider/door.png" alt="no Image">
							</div>
							<div class="image-slider__contain slider-contain">
								<div class="slider-contain__title">
									Пластиковые двери
								</div>
								<div class="slider-contain__text fontSize36">
									Воплощайте идеи
								</div>
								<div class="slider-contain__text fontSize36">
									Надежные для <br> профессиональных работ
								</div>
								<div class="slider-contain__buttons">
									<a href="#specification" class="slider-contain__button">Узнать</a>
								</div>
							</div>
						</div>	
					</div>
					<!-- <div class="image-slider__slide swiper-slide">
						<div class="image-slider__image _ibg">
							<img src="response/slider/slider3.jpg" alt="no Image">
						</div>
						<div class="image-slider__contain slider-contain">
							<div class="slider-contain__text fontSize36">
								Воплощайте идеи
							</div>
							<div class="slider-contain__title fontSize64">
								Европейское качество
							</div>
							<div class="slider-contain__text fontSize36">
								Надежные для <br> профессиональных работ
							</div>
							<div class="slider-contain__buttons">
								<a href="" class="slider-contain__button">Узнать</a>
							</div>
						</div>
					</div>
					<div class="image-slider__slide swiper-slide">
						<div class="image-slider__image _ibg">
							<img src="response/slider/slider4.jpg" alt="no Image">
						</div>
						<div class="image-slider__contain slider-contain">
							<div class="slider-contain__text fontSize36">
								Воплощайте идеи
							</div>
							<div class="slider-contain__title fontSize64">
								Европейское качество
							</div>
							<div class="slider-contain__text fontSize36">
								Надежные для <br> профессиональных работ
							</div>
							<div class="slider-contain__buttons">
								<a href="" class="slider-contain__button">Узнать</a>
							</div>
						</div>
					</div> -->
				</div>
				<!-- Стрелки -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
				<!-- Пагинация -->
				<!-- <div class="swiper-pagination"></div> -->
			</div>
		</div>
		<div id="about" class="about">
			<div class="main__about _contein">
				<div class="main__about__photo ">
					<div class="photo__contein">
						<img src="response/image/window1.png" alt="">
					</div>
						<!-- <img src="response/image/Знак-качества_Хай.svg" alt=""> -->
					<div class="photo__text__contein">
						<div class="text__contein__title">Высочайшее качество</div>
						<div class="text__contein__text">В производстве пластиковых окон наша компания использует
							германский профиль производства </div>
					</div>
				</div>
				<div class="main__about__photo ">
					<div class="photo__text__contein">
						<div class="text__contein__title">Высочайшее качество</div>
						<div class="text__contein__text">
							В производстве пластиковых окон наша компания использует
							германский профиль производства 
						</div>
					</div>
					<div class="photo__contein">
						<img src="response/image/window2.png" alt="">
					</div>
				</div>
			</div>
		</div>
		<div id="about2" class="about color">
			<div class="main__about _contein">
				<div class="main__about__photo ">
					<div class="photo__contein">
						<img src="response/image/profildoors.png" alt="">
					</div>
						<!-- <img src="response/image/Знак-качества_Хай.svg" alt=""> -->
					<div class="photo__text__contein">
						<div class="text__contein__title">Высочайшее качество</div>
						<div class="text__contein__text">В производстве пластиковых окон наша компания использует
							германский профиль производства </div>
					</div>
				</div>
				<div class="main__about__photo ">
					<div class="photo__text__contein">
						<div class="text__contein__title">Высочайшее качество</div>
						<div class="text__contein__text">
							В производстве пластиковых окон наша компания использует
							германский профиль производства 
						</div>
					</div>
					<div class="photo__contein">
						<img src="response/image/doors2.png" alt="">
					</div>
				</div>
			</div>
		</div>
		.
		<div id="specification" class="specification">
			<div class="swiper specification__slider _contein specification__slider__contein">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper ">
					<!-- Slides -->
					<div class="specification__card swiper-slide">
						<div class="card__logo">
							<img src="response/image/specification/specification-1.png" alt="">
						</div>
						<div class="card__title">Профиль KBE<br>Германия</div>
						<div class="card__text">
							Немецкая марка КБЕ – лидер на рынке производителей и поставщиков пластикового
							профиля для оконных и дверных систем.
						</div>
					</div>
					<div class="specification__card swiper-slide">
						<div class="card__logo">
							<img src="response/image/specification/specification-1.png" alt="">
						</div>
						<div class="card__title">Профиль KBE<br>Германия</div>
						<div class="card__text">
							Немецкая марка КБЕ – лидер на рынке производителей и поставщиков пластикового
							профиля для оконных и дверных систем.
						</div>
					</div>
				</div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
				<!-- <div class="swiper-pagination"></div> -->
			</div>
		</div>
	</section>
	<footer class="footer" id = "footerMain">
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
						<li><a href="" class="footer__socialMedia__link icon-telegram"><?php echo $result["email"]?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="js/swiper-bundle.min.js"></script>
	<script src="js/script.js"></script>
</body>

</html>