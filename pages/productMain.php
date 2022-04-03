<?php
session_start();

include "../inc/connect.php";
$result = mysqli_query($connect, "SELECT products.*, category.nameCategory, category.nameCategoryKz FROM `products` join category on category.id = products.type");
$category = mysqli_query($connect, "SELECT * FROM category");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Товары</title>
</head>

<body class="body">
    <div class="product flex__content">
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
        <div class="table">
            <div class="buttons__add">
                <a href="" class="button__add">Добавить</a>
                <div class="popap__window">
                    <div class="popap__window__conten">
                        <form action="../inc/productAdd.php" enctype="multipart/form-data" method="post" class="popap__form">
                            <div class="popap__title">Редактирование</div>
                            <div class="popap__out">X</div>
                            <div class="popap__all">
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Название</label>
                                    <input name="name" type="text" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Название каз</label>
                                    <input name="nameKz" type="text" class="popap__lable">
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
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Характиристика</label>
                                    <input type="text" name="harackter" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable">Характиристика каз</label>
                                    <input type="text" name="harackterKz" class="popap__lable">
                                </div>
                                <input type="file" name="file" id="" accept="image/jpeg,image/png">
                                <br>
                                <button type="submit">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table__contain">
                <div class="table__content flex__content table__header">
                    <div class="table__title__number">ID</div>
                    <div class="table__title">Название каз/рус</div>
                    <div class="table__title">Изображение</div>
                    <div class="table__title">Тип</div>
                    <div class="table__title">Характиристика каз/рус</div>
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
                        <div class="table__title"><?php echo $product['name'] ?><br><?php echo $product['nameKz'] ?></div>
                        <div class="table__title"><?php echo $product['pathImage'] ?></div>
                        <div class="table__title"><?php echo $product['nameCategory'] ?></div>
                        <div class="table__title"><?php echo $product['harackter'] ?><br><?php echo $product['harakterKz'] ?></div>
                        <div class="table__title">
                            <a class="icon-edit" href=""></a>
                            <div class="popap__window">
                                <div class="popap__window__conten">
                                    <form action="../inc/productEdit.php" enctype="multipart/form-data" method="post" class="popap__form">
                                        <div class="popap__title">Редактирование</div>
                                        <div class="popap__out">X</div>
                                        <div class="popap__all">
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Название</label>
                                                <input name="name" type="text" class="popap__lable" value="<?php echo $product['name'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Название каз</label>
                                                <input name="nameKz" type="text" class="popap__lable" value="<?php echo $product['nameKz'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Характиристика</label>
                                                <input type="text" name="harackter" class="popap__lable" value="<?php echo $product['harackter'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Характиристика каз</label>
                                                <input type="text" name="harackterKz" class="popap__lable" value="<?php echo $product['harakterKz'] ?>">
                                            </div>
                                            <div class="popap__text">
                                                <label for="" class="popap__lable">Тип</label>
                                                <select name="nameCategory" class="popap__lable">
                                                    <option value="<?php echo $product['type'] ?>"><?php echo $product['nameCategory'] ?></option>
                                                    <?php
                                                    foreach ($category as $type) {
                                                        if ($type['id'] != $product['type']) {
                                                    ?>
                                                            <option value="<?php echo $type['id'] ?>"><?php echo $type['nameCategory'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <input type="file" name="file" id="" accept="image/jpeg,image/png">
                                            <input type="text" name="id" style="display: none;" value="<?php echo $product['id'] ?>">
                                            <br>
                                            <button type="submit">Сохранить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table__title">
                            <form action="../inc/productDelete.php">
                                <a class="icon-bin" href="../inc/productDelete.php?id=<?php echo $product['id']; ?>"></a>
                            </form>
                        </div>
                    </div>
                <?php
                }
                if ($_SESSION['message']) {
                    echo '<p class="msg"> ' . $_SESSION['message'] .  ' </p> ';
                }
                unset($_SESSION['message']);
                ?>
            </div>

        </div>

    </div>

    <script src="../js/popap.js"></script>
</body>

</html>