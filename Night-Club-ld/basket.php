<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>

    <link type="image/x-icon" rel="shortcut icon" href="./ico/logo.ico">
    </link>

    <link rel="stylesheet" href="./css/index.css">
    </link>

    <link rel="stylesheet" href="./css/normalize.css">
    </link>
</head>

<body>
    <?php include_once('./elements/header.php') ?>
    <menu>
        <div class="basket">
            <div class="container">
                <hr class="about_hr">
                <h1 class="buy_plus_title">Заказать</h1>


























                <?php
                $count = 0;
                foreach ($_SESSION['cart'] as $item) {
                    $count++;
                    // Другие операции с корзиной
                }
                ?>



                <div class="about_basket">
                    <h1 class="about_basket_title">
                        В корзине заказов:

                        <span><?php echo $count ?></span>

                        
                    </h1>

                    <button onclick="window.location.href='./backend/del_item_all.php'" class="btn_about_basket">
                        <img src="./vector/trash_baket.svg" alt="">

                        Очистить
                        корзину
                    </button>
                </div>

                <div class="about_basket_content">
                    <div class="about_basket_content_left">
                        <div class="order_select">
                            <?php
                            require_once './backend/connect.php';
                            if (isset($_SESSION['cart'])) {
                                $Price = 0;

                                foreach ($_SESSION['cart'] as $item) {
                                    $id = $item['id'];

                                    $product = mysqli_query($connect, "SELECT * FROM `menu` WHERE `id` = '$id'");
                                    while ($row = mysqli_fetch_assoc($product)) {
                                        $show_img = base64_encode($row['image']);
                                        $Price += $row['price'];
                                    
                            ?>


                                        <div class="order_card">
                                            <div class="left_order_card">
                                                <img src="data:image/jpeg;base64,<?php echo $show_img ?>" alt="">
                                            </div>

                                            <div class="mid_order_card">
                                                <h1 class="text_card_menu_title"><?php echo $row['name'] ?></h1>
                                                <?php
                                                if ($row['category'] == 'food') {


                                                ?>
                                                    <div class="kk_BGY">
                                                        <p class="kk_BGY_p">Ккал: <?php echo $row['calories'] ?></p>

                                                        <p class="kk_BGY_p">БЖУ: <?php echo $row['pfc'] ?></p>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="kk_BGY">
                                                        <p class="kk_BGY_p"><?php echo $row['consist'] ?></p>


                                                    </div>
                                                <?php } ?>

                                                <div class="price_count">
                                                    <div class="price_div">
                                                        <h1 class="price"><?php echo $row['price'] ?>₽</h1>

                                                        <span class="price_span">/100г.</span>
                                                    </div>

                                                    <!-- Сделать счетчик количества товара -->
                                                    <div class="coutn_food"></div>
                                                </div>
                                            </div>

                                            <div class="right_order_card">
                                                <div class="btn_order_more">
                                                    <button onclick="window.location.href='./backend/del_item.php?delete=<?php echo $row['id'] ?>'" class="button_dring_more btn_more_order">отменить</button>
                                                </div>

                                                <div class="btn_order">
                                                    <button onclick="window.location.href='./backend/del_item.php?delete=<?php echo $row['id'] ?>'" class="btn_close_order">
                                                        <img src="./vector/close_order.svg" alt="">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <!-- content left cloze -->

                    <div class="about_basket_content_right">
                        <div class="your_order">
                            <h1 class="your_order_title">Ваш заказ</h1>

                            <div class="your_order_buy">
                                <?php
                                require_once './backend/connect.php';
                                if (isset($_SESSION['cart'])) {
                                    // $Price = 0;
                                    // $count = 0;
                                    foreach ($_SESSION['cart'] as $item) {
                                        $id = $item['id'];

                                        $product = mysqli_query($connect, "SELECT * FROM `menu` WHERE `id` = '$id'");
                                        while ($row = mysqli_fetch_assoc($product)) {

                                ?>
                                            <div class="order_chek">
                                                <h1 class="order_chek_left"><?php echo $row['name'] ?></h1>

                                                <h1 class="order_chek_mid">1шт.</h1>

                                                <h1 class="order_chek_right"><?php echo $row['price'] ?>₽</h1>
                                            </div>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </div>

                            <div class="delivery_order">
                                <h1 class="delivery_order_text">Доставка</h1>

                                <h1 class="delivery_order_price">1 000₽</h1>
                            </div>

                            <div class="arrange_order">
                                <div class="result_order">
                                    <h1 class="result_order_text">Итог:</h1>

                                    <h1 class="result_order_price"><?php echo $Price+1000 ?>₽</h1>
                                </div>

                                <a href="#openModal">
                                    <button class="button_arrange_order">Оформить заказ</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </menu>
    <?php include_once('./elements/footer.php') ?>

    <script src="./js/modal_open.js"></script>
</body>

</html>