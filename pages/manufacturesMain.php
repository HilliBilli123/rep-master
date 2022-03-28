<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    $result = mysqli_query($connect,"SELECT * FROM `manufactures`");
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
    <title>Manufactures Panel</title>
</head>
<body>
    
    
    <!-- <form action="" method = "post" enctype = "multipart/form-data"> -->
    
    <!-- </form> -->
    <div class="manufactures">
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
        <div class="table">
            <div class="buttons__add">
                <a href="" class="button__add">Добавить</a>
                <div class="popap__window"> 
                    <div class="popap__window__conten">
                        <form action="../inc/manufacturesAdd.php" enctype="multipart/form-data" method="post" class="popap__form">    
                            <div class="popap__title">Редактирование</div>
                            <div class="popap__out">X</div>
                            <div class="popap__all">
                                <div class="popap__text">
                                    <label for="" class="popap__lable" >Описание на русском</label>
                                    <input name="text" type="text" class="popap__lable">
                                </div>
                                <div class="popap__text">
                                    <label for="" class="popap__lable" >Описание на казахском</label>
                                    <input type="text" name="textKz" class="popap__lable">
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
                    <div class="table__title__number">№</div>
                    <div class="table__title">Описание на русском</div>
                    <div class="table__title">Изображение</div>
                    <div class="table__title">Описание на казахском</div>
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
                    <div class="table__title"><?php echo $product['text']?></div>
                    <div class="table__title"><?php echo $product['pathImage']?></div>
                    <div class="table__title"><?php echo $product['textKz']?></div>
                    <div class="table__title">
                        <a class="icon-edit" href=""></a>
                        <div class="popap__window"> 
                            <div class="popap__window__conten">
                                <form action="../inc/manufacturesEdit.php" enctype="multipart/form-data" method="post" class="popap__form">    
                                    <div class="popap__title">Редактирование</div>
                                    <div class="popap__out">X</div>
                                    <div class="popap__all">
                                        <div class="popap__text">
                                            <label for="" class="popap__lable" >Описание на русском</label>
                                            <input name="text" type="text" class="popap__lable" value="<?php echo $product['text']?>">
                                        </div>
                                        <div class="popap__text">
                                            <label for="" class="popap__lable" >Описание на казахском</label>
                                            <input type="text" name="textKz" class="popap__lable" value="<?php echo $product['textKz'] ?>">
                                        </div>
                                        <input type="file" name="file" id="" accept="image/jpeg,image/png">
                                        <input type="text" name="id" style="display: none;" value="<?php echo $product['id']?>"> 
                                        <br>
                                        <button type="submit">Сохронить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table__title">
                        <form action="../inc/manufacturesDelete.php">
                            <a class="icon-bin" href="../inc/manufacturesDelete.php?id=<?php echo $product['id']; ?>"></a>
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
        </div>
    </div>
    <script src="../js/popap.js"></script>
</body>
</html>