<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    $result = mysqli_query($connect,"SELECT products.*, category.nameCategory, category.nameCategoryKz FROM `products` join category on category.id = products.type");
    $category = mysqli_query($connect,"SELECT * FROM category");
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
    <title>Products Panel</title>
</head>
<body>
    <!-- <a href="admin.php">На главную</a> -->
    <!-- <form action="" method = "post" enctype = "multipart/form-data"> -->
    
    <!-- </form> -->
    <div class="product flex__content">
        <div class="menu__admin__pages">
            <div class="menu__admin__pages__contain">
                <div class="menu__admin__pages__logo">
                    <img src="../response/image/logo.png" alt="">
                </div>
                <div class="menu__admin__pages__list">
                    <a href="admin.php" class="manufact__link">На главную</a>
                    <a href="" class="manufact__link">Товаровы</a>
                    <a href="" class="manufact__link">Производители</a>
                    <a href="" class="manufact__link">Категории</a>
                    <a href="" class="manufact__link">Пользоваетели</a>
                    <!-- <a href="" class="manufact__link"></a>
                    <a href="" class="manufact__link"></a> -->
                </div>
            </div>
        </div>
    <!-- <a href="productAdd.php">Добавить</a> -->
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
                                    <label for="" class="popap__lable" >Название</label>
                                    <input name="name" type="text" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable" >Цена</label>
                                    <input type="text" name="price" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable" >Тип</label>
                                    <!-- <input type="text" name="price" class="popap__lable"> -->
                                    <select name="nameCategory" class="popap__lable">
                                        <option value=""></option>
                                        <?php 
                                            foreach($category as $product)
                                            {
                                                ?>
                                                    <option value="<?php echo $product['id']?>"><?php echo $product['nameCategory']?></option>                                            
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable" >Характиристика</label>
                                    <input type="text" name="harackter" class="popap__lable">
                                </div>
                                <input type="file" name="file" id="" accept="image/jpeg,image/png">
                                <br>
                                <button type="submit">Сохронить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table__contain">
            <div class="table__content flex__content table__header">
                <div class="table__title__number">ID</div>
                <div class="table__title">name</div>
                <div class="table__title">imagePath</div>
                <div class="table__title">price</div>
                <div class="table__title">type</div>
                <div class="table__title">harackter</div>
                <div class="table__title">редактировать</div>
                <div class="table__title">удалить</div>
            </div>
        <?php
            $count = 0;
            foreach($result as $product)
            {
                $count++;
        ?>
            <div class="table__content flex__content">
                <div class="table__title__number"><?php echo $count?></div>
                <div class="table__title"><?php echo $product['name']?></div>
                <div class="table__title"><?php echo $product['pathImage']?>
                </div>
                <div class="table__title"><?php echo $product['price']?></div>
                <div class="table__title"><?php echo $product['nameCategory']?></div>
                <div class="table__title"><?php echo $product['harackter']?></div>
                <div class="table__title">
                    <a class="icon-edit" href=""></a>
                    <div class="popap__window"> 
                        <div class="popap__window__conten">
                        <form action="../inc/productAdd.php" enctype="multipart/form-data" method="post" class="popap__form">    
                            <div class="popap__title">Редактирование</div> 
                            <div class="popap__out">X</div>
                            <div class="popap__all">
                                <div class="popap__text">
                                    <label for="" class="popap__lable" >Название</label>
                                    <input name="name" type="text" class="popap__lable" value="<?php echo $product['name']?>">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable" >Цена</label>
                                    <input type="text" name="price" class="popap__lable" value="<?php echo $product['price']?>">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable" >Характиристика</label>
                                    <input type="text" name="harackter" class="popap__lable" value="<?php echo $product['harackter']?>">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable" >Тип</label>
                                    <select name="nameCategory" class="popap__lable" value = "<?php echo $product['nameCategory']?>">
                                    <option value="<?php echo $product['type']?>"><?php echo $product['nameCategory']?></option>
                                        <?php
                                            $selected = $product['type'];
                                            foreach($category as $type)
                                            {
                                                if($selected != $type['id']){
                                                ?>
                                                    <option value="<?php echo $type['id']?>"><?php echo $type['nameCategory']?></option>                                            
                                                <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <input type="file" name="file" id="" accept="image/jpeg,image/png">
                                <input type="text" name="id" style="display: none;" value="<?php echo $product['id']?>">
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
            if($_SESSION['message']){
                echo '<p class="msg"> ' . $_SESSION['message'] .  ' </p> ';
            }
            unset($_SESSION['message']);
        ?>
        </div>
        <script src="../js/popap.js"></script>
    </div>
    </div>
</body>
</html>