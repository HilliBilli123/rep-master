<?php
session_start();
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
include "../inc/connect.php";
//$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
$result = mysqli_query($connect, "SELECT user.*, city.name AS cityName, city.nameKz AS cityNameKz FROM `user` join city on user.city = city.id");
$citys = mysqli_query($connect, "SELECT * FROM `city`")
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
    <title>Пользователи</title>
</head>

<body class="body">
    <!-- <a href="admin.php">На главную</a> -->
    <!-- <form action="" method = "post" enctype = "multipart/form-data"> -->

    <!-- </form> -->
    <div class="user flex__content">
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
        <!-- <a href="userAdd.php">Добавить</a> -->
        <div class="table">
            <div class="buttons__add">
                <a href="" class="button__add">Добавить</a>
                <div class="popap__window">
                    <div class="popap__window__conten">
                        <form action="../inc/userAdd.php" enctype="multipart/form-data" method="post" class="popap__form">
                            <div class="popap__title">Редактирование</div>
                            <div class="popap__out">X</div>
                            <div class="popap__all">
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Логин</label>
                                    <input name="login" type="text" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Пароль</label>
                                    <input type="text" name="password" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Город</label>
                                    <select name="cityName">
                                        <option>Выберите город</option>
                                        <?php
                                        foreach ($citys as $city) {
                                        ?>
                                            <option value="<?php echo $city['id'] ?>"><?php echo $city['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Фамилия</label>
                                    <input type="text" name="firstName" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Имя</label>
                                    <input type="text" name="name" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Отчество</label>
                                    <input type="text" name="lastName" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Email</label>
                                    <input type="text" name="email" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Номер тел.</label>
                                    <input type="text" name="phone" class="popap__lable">
                                </div>
                                <input type="text" style="display: none;" name="firstVhod" value="0">
                                <button type="submit">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table__contain">
                <div class="table__content flex__content table__header">
                    <div class="table__title__number">№</div>
                    <div class="table__title">Логин</div>
                    <div class="table__title">Пароль</div>
                    <div class="table__title">Город</div>
                    <div class="table__title">ФИО</div>
                    <!-- <div class="table__title">firstName</div>
                    <div class="table__title">middleName</div> -->
                    <div class="table__title">email</div>
                    <div class="table__title">Номер тел.</div>
                    <div class="table__title">редактировать</div>
                    <div class="table__title">удалить</div>
                </div>
                <?php
                $count = 0;
                foreach ($result as $product) {
                    $count++;
                ?>
                    <div class="table__content flex__content">
                        <div class="table__title__number"><?php echo $count ?></div>
                        <div class="table__title"><?php echo $product['login'] ?></div>
                        <div class="table__title"><?php echo $product['password'] ?></div>
                        <div class="table__title"><?php echo $product['cityName'] ?></div>
                        <div class="table__title">
                            <?php echo $product['lastName'] ?><br>
                            <?php echo $product['firstName'] ?><br>
                            <?php echo $product['middleName'] ?>
                        </div>
                        <div class="table__title"><?php echo $product['email'] ?></div>
                        <div class="table__title"><?php echo $product['phone'] ?></div>
                        <div class="table__title">
                            <a class="icon-edit" href=""></a>
                            <div class="popap__window">
                                <div class="popap__window__conten">
                                    <form action="../inc/userEdit.php" enctype="multipart/form-data" method="post" class="popap__form">
                                        <div class="popap__title">Редактирование</div>
                                        <div class="popap__out">X</div>
                                        <div class="popap__all">
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Логин</label>
                                                <input name="login" type="text" class="popap__lable" value="<?php echo $product['login'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Пароль</label>
                                                <input type="text" name="password" class="popap__lable" value="<?php echo $product['password'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Город</label>
                                                <select name="cityName">
                                                    <option value="<?php echo $product['city'] ?>"><?php echo $product['cityName'] ?></option>
                                                    <?php
                                                    foreach ($citys as $city) {
                                                        if ($city['id'] != $product['city']) {
                                                    ?>
                                                            <option value="<?php echo $city['id'] ?>"><?php echo $city['name'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Фамилия</label>
                                                <input type="text" name="lastName" class="popap__lable" value="<?php echo $product['lastName'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Имя</label>
                                                <input type="text" name="firstName" class="popap__lable" value="<?php echo $product['firstName'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Отчество</label>
                                                <input type="text" name="middleName" class="popap__lable" value="<?php echo $product['middleName'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Email</label>
                                                <input type="text" name="email" class="popap__lable" value="<?php echo $product['email'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Номер тел.</label>
                                                <input type="text" name="phone" class="popap__lable" value="<?php echo $product['phone'] ?>">
                                            </div>
                                            <input type="text" style="display: none;" name="id" value="<?php echo $product['id'] ?>">
                                            <!-- <input type="text" style="display: none;" name="firstVhod" value="0"> -->
                                            <button type="submit">Сохронить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table__title">
                            <form action="../inc/userDelete.php">
                                <a class="icon-bin" href="../inc/userDelete.php?id=<?php echo $product['id']; ?>"></a>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <script src="../js/popap.js"></script>
</body>

</html>