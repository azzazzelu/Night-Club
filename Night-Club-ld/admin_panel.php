<?php

session_start();
require_once './backend/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    </link>
    <link type="image/x-icon" rel="shortcut icon" href="./ico/logo.ico">
    </link>
    <link rel="stylesheet" href="./css/normalize.css">
    </link>
    <link rel="stylesheet" href="./css/admin_panel.css">


    <title>admin_panel</title>
</head>

<body>
    <?php include_once('./elements/header.php') ?>
    <div class="container">
        <?php if (!$_SESSION['user']['password'] == "1231231" && !$_SESSION['user']['email'] == "test@gmail.com") {
            echo "Вы попали сюда случайно";
        } else { ?>

            <h2>Добро пожаловать</h2>
            <div class="container_one">
                <form action="admin_panel.php" method="post" enctype="multipart/form-data" class="form">
                    <label>Добавить блюдо или напиток</label>
                    <div class="block">
                        <h1>Выберите изоброжение</h1>
                        <input name="file" type="file">
                    </div>
                    <div class="block">
                        <h1>Название блюда или напитка</h1>
                        <input class="input" autocomplete="off" name="name" type="text">
                    </div>
                    <div class="block">
                        <h1>Калории </h1>
                        <input class="input" autocomplete="off" name="calories" type="text">
                    </div>
                    <div class="block">
                        <h1>Из чего состоит (для напитков) </h1>
                        <input class="input" autocomplete="off" name="consist" type="text">
                    </div>
                    <div class="block">
                        <h1>БЖУ </h1>
                        <input class="input" autocomplete="off" name="pfc" type="text">
                    </div>
                    <div class="block">
                        <h1>Цена блюда или напитка </h1>
                        <input class="input" autocomplete="off" name="price" type="text">
                    </div>

                    <div class="block">
                        <h1>Выбирите блюдо или напиток </h1>
                        <p style="color:red;">ОБЯЗАТЕЛЬНОЕ ПОЛЕ</p>
                        <select name="category" id="">
                            <option value="">Выбрать</option>
                            <option value="food">food</option>
                            <option value="drinks">drinks</option>
                        </select>
                    </div>
                    <button class="button" name="upload" type="submit">Добавить</button>
                </form>
            </div>
        <?php
        } ?>
        <?php
        if (isset($_POST['upload'])) {
            if (!empty($_FILES['file']['tmp_name'])) $img = addslashes(file_get_contents($_FILES['file']['tmp_name']));
            $name = $_POST['name'];
            $price = $_POST['price'];
            $calories = $_POST['calories'];
            $pfc = $_POST['pfc'];
            $consist = $_POST['consist'];
            $category = $_POST['category'];
            if ($category == '') {
                echo '<h3>Вы не выбрали значение</h3>';
            } else {
                $add_product = mysqli_query($connect, "INSERT INTO `menu`(`image`,`name`,`price`,`calories`,`pfc`,`category`,`consist`)VALUES('$img','$name','$price','$calories','$pfc','$category','$consist')");
                if (!$add_product) {
                    echo '<h3>Данные введены не корректно</h3>';
                } else {
                    echo '<h3>Товар успешно добавлен</h3>';
                }
            }
        }
        ?><?php
            if (isset($_POST['edit'])) {
                $cat = $_POST['category'];

                $image = $_FILES['image']['tmp_name'];
                $imageType = $_FILES['image']['type'];
                $imgData = file_get_contents($image);
                $imgData = mysqli_real_escape_string($connect, $imgData);


                if ($cat == '') {
                    echo '<h3>Вы не выбрали значение</h3>';
                } else {
                    //Если это запрос на обновление, то обновляем
                    if (isset($_GET['red_id'])) {
                        if (!empty($imgData)) {
                            $sql = mysqli_query($connect, "UPDATE menu SET  image='$imgData', `name` = '{$_POST['nameEdit']}',price = '{$_POST['priceEdit']}',
                            calories='{$_POST['caloriesEdit']}', pfc='{$_POST['pfcEdit']}',category = '$cat', consist='{$_POST['consistEdit']}' WHERE id={$_GET['red_id']}");
                        } else {
                            $sql = mysqli_query($connect, "UPDATE menu SET  `name` = '{$_POST['nameEdit']}',price = '{$_POST['priceEdit']}',
                            calories='{$_POST['caloriesEdit']}', pfc='{$_POST['pfcEdit']}',category = '$cat', consist='{$_POST['consistEdit']}' WHERE id={$_GET['red_id']}");
                        }
                    } else {
                        //Иначе вставляем данные, подставляя их в запрос
                        $sql = mysqli_query($connect, "INSERT INTO menu (image,`name`, price,calories,pfc,category,consist) VALUES ('$imgData','{$_POST['nameEdit']}', '{$_POST['priceEdit']}',
                         '{$_POST['caloriesEdit']}','{$_POST['pfcEdit']}','{$_POST['category']}','{$_POST['consistEdit']}'
                         )");
                    }

                    //Если вставка прошла успешно
                    if ($sql) {
                        echo '<h3>Успешно изменено !</h3>';
                    } else {
                        echo '<h3>Произошла ошибка: ' . mysqli_error($connect) . '</h3>';
                    }
                }
            }

            if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
                //удаляем строку из таблицы
                $sql = mysqli_query($connect, "DELETE FROM `menu` WHERE `id` = {$_GET['del_id']}");
                if ($sql) {
                    echo "<h3>Товар удален</h3>";
                } else {
                    echo '<h3>Произошла ошибка: ' . mysqli_error($connect) . '</h3>';
                }
            }
            if (isset($_GET['red_id'])) {
                $sql = mysqli_query($connect, "SELECT `id`, `image`,`name`,`price`,`calories`,`pfc`,`category`,`consist` FROM `menu` WHERE `id`={$_GET['red_id']}");
                $product = mysqli_fetch_array($sql);
                $show_img = base64_encode($product['image']);
            }
            ?>
        <?php
        if (!$_SESSION['user']['password'] == " " && !$_SESSION['user']['email'] == "admin@admin") {
        } else {

        ?>
            <div class="container_one">
                <form action="" method="post" class="form" enctype="multipart/form-data">
                    <label>Редактирование</label>
                    <table>
                        <tr>
                            <div class="block">
                                <h1>Изоброжение:</h1>
                                <input name="image" type="file" value="">

                            </div>
                        </tr>
                        <tr>
                            <div class="block">
                                <h1>Название блюда или напитка</h1>
                                <input class="input" type="text" name="nameEdit" value="<?= isset($_GET['red_id']) ? $product['name'] : ''; ?>">
                               
                            </div>
                        </tr>
                        <tr>
                            <div class="block">
                                <h1>Калории </h1>
                                <input class="input" type="text" name="caloriesEdit" value="<?= isset($_GET['red_id']) ? $product['calories'] : ''; ?>">
                             </div>
                        </tr>
                        <tr>
                            <div class="block">
                                <h1>Из чего состоит (для напитков) </h1>
                                <input class="input" type="text" name="consistEdit" value="<?= isset($_GET['red_id']) ? $product['consist'] : ''; ?>">
                             </div>
                        </tr>
                        <tr>
                            <div class="block">
                                <h1>БЖУ </h1>
                                <input class="input" type="text" name="pfcEdit" value="<?= isset($_GET['red_id']) ? $product['pfc'] : ''; ?>">
                            </div>
                        </tr>
                        <tr>
                            <div class="block">
                                <h1>Цена:</h1>
                                <input class="input" type="text" name="priceEdit" value="<?= isset($_GET['red_id']) ? $product['price'] : ''; ?>"> руб.
                            </div>
                        </tr>
                        <tr>
                            <div class="block">
                                <h1>Категория одежды:</h1>
                                <p style="color:red;">ОБЯЗАТЕЛЬНОЕ ПОЛЕ</p>
                                <select name="category" id="">
                                    <option value="">Выбрать</option>

                                    <option value="<?= isset($_GET['red_id']) ? $product['category'] = 'food' : ''; ?>">food</option>
                                    <option value="<?= isset($_GET['red_id']) ? $product['category'] = 'drinks' : ''; ?>">drinks</option>

                                </select>
                            </div>
                        </tr>
                        <tr>
                            <input type="submit" name="edit" value="Подтвердить" class="button">
                        </tr>
                    </table>
                </form>
            </div>

            <div class="container_one">
                <table>
                    <tr class="">
                        <td>Изоброжение</td>
                        <td>Название</td>
                        <td>Цена</td>
                        <td>Калории</td>
                        <td>БЖУ</td>
                        <td>ИЗ чего сделано</td>
                        <td>Категория</td>
                        <td>Удаление/Редактирование</td>

                    </tr>

                    <?php

                    $sql = mysqli_query($connect, 'SELECT `id`,`image`,`name`,`price`,`calories`,`pfc`,`category`,`consist` FROM `menu`');
                    while ($result = mysqli_fetch_array($sql)) {
                        $show_img = base64_encode($result['image']); ?>

                        <tr>
                            <td><img width="200px" height="300px" src="data:image/jpeg;base64,<?php echo $show_img; ?>"></td>
                            <td><?php echo $result['name']; ?></td>
                            <td><?php echo $result['price']; ?> ₽</td>
                            <td><?php echo $result['calories']; ?></td>
                            <td><?php echo $result['pfc']; ?></td>
                            <td><?php echo $result['consist']; ?></td>
                            <td><?php echo $result['category']; ?></td>

                            <td><a class="button_min" href='?del_id=<?php echo $result['id']; ?>'>Удалить</a>
                                <br><br>
                                <br>
                                <a class="button_min" href='?red_id=<?php echo $result['id']; ?>'>Изменить</a>
                            </td>

                        </tr>
                    <?php
                    } ?>

                    <tr>
                </table>
            </div>
            <div class="exit">
                <a href="logout.php">Выход</a>
            </div>
    </div>
<?php }
        include_once('./elements/footer.php')
?>
<script src="js/header.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
</body>

</html>