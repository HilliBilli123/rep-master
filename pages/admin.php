<?php
    session_start();
    if(!$_SESSION['user']){
        header('Location: ../index.php');
    }
    include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    $result = mysqli_query($connect,"SELECT count(*) FROM `products`");
    $result = mysqli_fetch_assoc($result);
    $count = $result['count(*)'];
    $result1 = mysqli_query($connect,"SELECT count(*) FROM `manufactures`");
    $result1 = mysqli_fetch_assoc($result1);
    $count1 = $result1['count(*)'];
    $result2 = mysqli_query($connect,"SELECT count(*) FROM `category`");
    $result2 = mysqli_fetch_assoc($result2);
    $count2 = $result2['count(*)'];
    $result3 = mysqli_query($connect,"SELECT count(*) FROM `user`");
    $result3 = mysqli_fetch_assoc($result3);
    $count3 = $result3['count(*)'];
    // print_r($count['count']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin Panel</title>
</head>
<body>
    <!-- <a href="../index.html">Главная</a> -->
    <div class="menu">
        <div class="left__menu">
            <div class="left__menu__contein">
            
                <a href="productMain.php" class="circle__internal">
                    <div class="circle__text">Товары</div>
                    <div class="cout"><?php echo $count?></div>
                </a>
                <a href="manufacturesMain.php" class="circle__internal">
                    <div class="circle__text">Производители</div>
                    <div class="cout"><?php echo $count1?></div>
                </a>
                <a href="contactInfoMain.php" class="circle__internal">
                    <div class="circle__text">Контактная информация</div>
                   
                </a>
                <a href="categoryMain.php" class="circle__internal">
                    <div class="circle__text">Категории</div>
                    <div class="cout"><?php echo $count2?></div>
                </a>
                <a href="userMain.php" class="circle__internal">
                    <div class="circle__text">Пользователи</div>
                    <div class="cout"><?php echo $count3?></div>
                </a>
            </div>
        </div>
        <div class="right__menu">
            <div class="right__menu__contein">
                <div class="logout">
                    <div class="logout__contein">
                        <div class="header__logo">
                            <img src="../response/image/logo.png" alt="">
                        </div>
                        <div class="logout__content">
                            <div class="logout__login">
                                <?php echo $_SESSION['user']['login'] ?>
                            </div>
                            <a href="../inc/logout.php" class="logout__menu">Выход</a>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="info__contein">
                        <div class="info__content">
                            <div class="info__image">
                                <img src="../response/image/userIcon.png" alt="">
                            </div>
                            <div class="info_text info_text_flex">
                                <!-- <label for="" class="info__label">ФИО</label> -->
                                <div class="info__info"><?php echo $_SESSION['user']['lastName']?></div>
                                <div class="info__info"><?php echo $_SESSION['user']['firstName']?></div>
                                <div class="info__info"><?php echo $_SESSION['user']['middleName']?></div>
                            </div>
                            
                            <div class="info_text">
                                <div class="info__info"><?php echo $_SESSION['user']['email'] ?></div>
                            </div>
                            <div class="info_text">
                                <div class="info__info"><?php echo $_SESSION['user']['phone'] ?></div>
                            </div>
                            <div class="info_text">
                                <div class="info__info"><?php echo $_SESSION['user']['cityName'] ?></div>
                            </div>
                            <div class="info_text">
                                <div class="info__info">Администратор</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order__contein">
                    <div class="order__content">
                        <div class="order__content_text">
                            Исполнено заказы: 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>