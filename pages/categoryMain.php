<?php
session_start();
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
include "../inc/connect.php";
//$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
$result = mysqli_query($connect, "SELECT * FROM `category`");
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
    <title>Категории</title>
</head>

<body class="body">
    <!-- <a href="admin.php">На главную</a> -->
    <!-- <form action="" method = "post" enctype = "multipart/form-data"> -->

    <!-- </form> -->
    <div class="category flex__content">
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
        <!-- <a href="categoryAdd.php">Добавить</a> -->
        <div class="table">
            <div class="buttons__add">
                <a href="" class="button__add">Добавить</a>
                <div class="popap__window">
                    <div class="popap__window__conten">
                        <form action="../inc/categoryAdd.php" enctype="multipart/form-data" method="post" class="popap__form">
                            <div class="popap__title">Редактирование</div>
                            <div class="popap__out">X</div>
                            <div class="popap__all">
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Описание на русском</label>
                                    <input name="nameRu" type="text" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Описание на казахском</label>
                                    <input type="text" name="nameKz" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Код</label>
                                    <input type="text" name="code" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Описание</label>
                                    <input type="text" name="description" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Цена</label>
                                    <input type="text" name="price" class="popap__lable">
                                </div>
                                <button type="submit">Сохронить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table__contain">
                <div class="table__content flex__content table__header">
                    <div class="table__title__number">№</div>
                    <div class="table__title">Наименование</div>
                    <div class="table__title">Наименование каз</div>
                    <div class="table__title">Код</div>
                    <div class="table__title">Описание</div>
                    <div class="table__title">Цена</div>
                    <div class="table__title">Редактировать</div>
                    <div class="table__title">Удалить</div>
                </div>
                <?php
                $count = 0;
                foreach ($result as $product) {
                    $count++;
                ?>
                    <div class="table__content flex__content">
                        <div class="table__title__number"><?php echo $count ?></div>
                        <div class="table__title"><?php echo $product['nameCategory'] ?></div>
                        <div class="table__title"><?php echo $product['nameCategoryKz'] ?></div>
                        <div class="table__title"><?php echo $product['code'] ?></div>
                        <div class="table__title"><?php echo $product['opisanie'] ?></div>
                        <div class="table__title"><?php echo $product['price'] ?></div>
                        <div class="table__title">
                            <a class="icon-edit" href=""></a>
                            <div class="popap__window">
                                <div class="popap__window__conten">
                                    <form action="../inc/categoryEdit.php" enctype="multipart/form-data" method="post" class="popap__form">
                                        <div class="popap__title">Редактирование</div>
                                        <div class="popap__out">X</div>
                                        <div class="popap__all">
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Описание на русском</label>
                                                <input name="nameRu" type="text" class="popap__lable" value="<?php echo $product['nameCategory'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Описание на казахском</label>
                                                <input type="text" name="nameKz" class="popap__lable" value="<?php echo $product['nameCategoryKz'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Код</label>
                                                <input type="text" name="code" class="popap__lable" value="<?php echo $product['code'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Описание</label>
                                                <input type="text" name="description" class="popap__lable" value="<?php echo $product['opisanie'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Цена</label>
                                                <input type="text" name="price" class="popap__lable" value="<?php echo $product['price'] ?>">
                                            </div>
                                            <input type="text" name="id" style="display: none;" value="<?php echo $product['id'] ?>">
                                            <button type="submit">Сохранить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table__title">
                            <form action="../inc/categoryDelete.php">
                                <a class="icon-bin" href="../inc/categoryDelete.php?id=<?php echo $product['id']; ?>"></a>
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