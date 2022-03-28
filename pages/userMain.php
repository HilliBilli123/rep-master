<?php
    session_start();
    /*if(!$_SESSION['user']){
        header('Location: ../index.php');
    }*/
    include "../inc/connect.php";
    //$connect = mysqli_connect('localhost', 'root' , 'root' , 'bibala');
    $result = mysqli_query($connect,"SELECT user.*, city.name AS cityName, city.nameKz AS cityNameKz FROM `user` join city on user.city = city.id");
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
    <link rel="stylesheet" href="../css/style.css">
    <title>User Panel</title>
</head>
<body>
    <a href="admin.php">На главную</a>
    <!-- <form action="" method = "post" enctype = "multipart/form-data"> -->
    
    <!-- </form> -->
    <a href="userAdd.php">Добавить</a>
    <table style="border:1px solid #000;">
            <tr>
                <td style="border:1px solid #000;">№</td>
                <td style="border:1px solid #000;">login</td>
                <td style="border:1px solid #000;">password</td>
                <td style="border:1px solid #000;">city</td>
                <td style="border:1px solid #000;">lastName</td>
                <td style="border:1px solid #000;">firstName</td>
                <td style="border:1px solid #000;">middleName</td>
                <td style="border:1px solid #000;">email</td>
                <td style="border:1px solid #000;">phone</td>
                <td style="border:1px solid #000;">редактировать</td>
                <td style="border:1px solid #000;">удалить</td>
            </tr>
        <?php
            $count = 0;
            foreach($result as $product)
            {
                $count++;
        ?>
            <tr>
                <td><?php echo $count?></td>
                <td><?php echo $product['login']?></td>
                <td><?php echo $product['password']?></td>
                <td><?php echo $product['cityName']?></td>
                <td><?php echo $product['lastName']?></td>
                <td><?php echo $product['firstName']?></td>
                <td><?php echo $product['middleName']?></td>
                <td><?php echo $product['email']?></td>
                <td><?php echo $product['phone']?></td>
                <td>
                    <form action="userEdit.php">
                        <a href="userEdit.php?id=<?php echo $product['id']; ?>">редактировать</a>
                    </form>
                </td>
                <td>
                <form action="../inc/userDelete.php">
                    <a href="../inc/userDelete.php?id=<?php echo $product['id']; ?>">удалить</a>
                </form>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>