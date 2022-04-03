<?php
session_start();
/*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
include "../inc/connect.php";
//$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
$result = mysqli_query($connect, "SELECT workType.*, category.nameCategory FROM `workType` JOIN `category` ON category.id = workType.categoryId");
$category = mysqli_query($connect, "SELECT * FROM category");
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
    <title>Вид работы</title>
</head>

<body class="body">
    <!-- <form action="" method="post" enctype="multipart/form-data"> -->

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
                        <form action="../inc/workTypeAdd.php" enctype="multipart/form-data" method="post" class="popap__form">
                            <div class="popap__title">Добавление</div>
                            <div class="popap__out">X</div>
                            <div class="popap__all">
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Наименование</label>
                                    <input name="name" type="text" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Наименование на казахском</label>
                                    <input type="text" name="nameKz" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Цена</label>
                                    <input type="text" name="price" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Тип</label>
                                    <!-- <input type="text" name="price" class="popap__lable"> -->
                                    <select name="nameCategory" class="popap__lable">
                                        <option value=""></option>
                                        <?php
                                        foreach ($category as $product) {
                                        ?>
                                            <option value="<?php echo $product['id'] ?>"><?php echo $product['nameCategory'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <button type="submit">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table__contain">
                <div class="table__content flex__content table__header">
                    <div class="table__title__number">№</div>
                    <div class="table__title">Наименование</div>
                    <div class="table__title">Наименование на каз яз</div>
                    <div class="table__title">Категория</div>
                    <div class="table__title">Цена</div>
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
                        <div class="table__title"><?php echo $product['name'] ?></div>
                        <div class="table__title"><?php echo $product['nameKz'] ?></div>
                        <div class="table__title"><?php echo $product['nameCategory'] ?></div>
                        <div class="table__title"><?php echo $product['price'] ?></div>
                        <div class="table__title">
                            <a class="icon-edit" href=""></a>
                            <div class="popap__window">
                                <div class="popap__window__conten">
                                    <form action="../inc/workTypeEdit.php" enctype="multipart/form-data" method="post" class="popap__form">
                                        <div class="popap__title">Редактирование</div>
                                        <div class="popap__out">X</div>
                                        <div class="popap__all">
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Наименование на русском</label>
                                                <input name="name" type="text" class="popap__lable" value="<?php echo $product['name'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Наименование на казахском</label>
                                                <input type="text" name="nameKz" class="popap__lable" value="<?php echo $product['nameKz'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Цена</label>
                                                <input type="text" name="price" class="popap__lable" value="<?php echo $product['price'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Тип</label>
                                                <select name="nameCategory" class="popap__lable" value="<?php echo $product['nameCategory'] ?>">
                                                    <option value="<?php echo $product['categoryId'] ?>"><?php echo $product['nameCategory'] ?></option>
                                                    <?php
                                                    $selected = $product['categoryId'];
                                                    foreach ($category as $type) {
                                                        if ($selected != $type['id']) {
                                                    ?>
                                                            <option value="<?php echo $type['id'] ?>"><?php echo $type['nameCategory'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <input type="text" name="id" style="display: none;" value="<?php echo $product['id'] ?>">
                                            <br>
                                            <button type="submit">Сохранить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table__title">
                            <form action="../inc/workTypeDelete.php">
                                <a class="icon-bin" href="../inc/workTypeDelete.php?id=<?php echo $product['id']; ?>"></a>
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