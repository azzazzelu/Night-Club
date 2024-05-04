<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    </meta>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </meta>

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

    <main>
        <div class="basket">
            <div class="container">
                <hr class="about_hr">

                <input checked="checked" id="tab_btn_1" class="tab_input" name="tab_btn" type="radio" value=""></input>

                <label for="tab_btn_1" class="tab_title_1 tab_title">Заказ Онлайн</label>

                <input id="tab_btn_2" class="tab_input" name="tab_btn" type="radio" value=""></input>

                <label for="tab_btn_2" class="tab_title_2 tab_title">Заказ в ресторане</label>

                <div class="tab-content" id="content_1">
                    <?php
                    require_once './backend/connect.php';
                    if (isset($_SESSION['cart'])) {
                        $Price = 0;
                        foreach ($_SESSION['cart'] as $item) {
                            $id = $item['id'];
                            $count = 0;
                            $product = mysqli_query($connect, "SELECT * FROM `menu` WHERE `id` = '$id'");
                            while ($row = mysqli_fetch_assoc($product)) {
                                $show_img = base64_encode($row['image']);
                                $Price += $row['price'];
                                $count++ 
                    ?>

                                <div class="about_basket">
                                    <h1 class="about_basket_title">
                                        В корзине

                                        <span><?php $count ?></span>

                                        товара
                                    </h1>

                                    <button onclick="window.location.href='./back/del_item_all.php'" class="btn_about_basket">
                                        <img src="./vector/trash_baket.svg" alt="">

                                        Очистить
                                        корзину
                                    </button>
                                </div>

                                <div class="about_basket_content">
                                    <div class="about_basket_content_left">
                                        <div class="order_select">
                                            <div class="order_card">
                                                <div class="left_order_card">
                                                <img src="data:image/jpeg;base64,<?php echo $show_img ?>" alt="">
                                                </div>

                                                <div class="mid_order_card">
                                                    <h1 class="text_card_menu_title"><?php echo $row['name'] ?></h1>

                                                    <div class="kk_BGY">
                                                        <p class="kk_BGY_p">Ккал: 245</p>

                                                        <p class="kk_BGY_p">БЖУ: 19,8/12,5/0</p>
                                                    </div>

                                                    <div class="price_count">
                                                        <div class="price_div">
                                                            <h1 class="price">359₽</h1>

                                                            <span class="price_span">/100г.</span>
                                                        </div>

                                                        <!-- Сделать счетчик количества товара -->
                                                        <div class="coutn_food"></div>
                                                    </div>
                                                </div>

                                                <div class="right_order_card">
                                                    <div class="btn_order_more">
                                                        <button class="button_dring_more btn_more_order">подробнее</button>
                                                    </div>

                                                    <div class="btn_order">
                                                        <button class="btn_close_order">
                                                            <img src="./vector/close_order.svg" alt="">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- content left cloze -->

                                    <div class="about_basket_content_right">
                                        <div class="your_order">
                                            <h1 class="your_order_title">Ваш заказ</h1>

                                            <div class="your_order_buy">
                                                <div class="order_chek">
                                                    <h1 class="order_chek_left">Салат пармиджано</h1>

                                                    <h1 class="order_chek_mid">1шт.</h1>

                                                    <h1 class="order_chek_right">359₽</h1>
                                                </div>
                                            </div>

                                            <div class="delivery_order">
                                                <h1 class="delivery_order_text">Доставка</h1>

                                                <h1 class="delivery_order_price">10 000₽</h1>
                                            </div>

                                            <div class="arrange_order">
                                                <div class="result_order">
                                                    <h1 class="result_order_text">Итог:</h1>

                                                    <h1 class="result_order_price">15 272₽</h1>
                                                </div>

                                                <a href="#openModal">
                                                    <button class="button_arrange_order">Оформить заказ</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                            }
                        }
                    }
                        ?>
                        <!-- content right cloze -->
                        <!-- modal windows -->

                        <div id="openModal" class="modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <a href="#close" title="Close" class="close">
                                            <img src="./vector/close_buy.svg" alt="">
                                        </a>

                                        <div class="modal_title">Заполните данные для доставки</div>

                                        <form class="modal_form" action="" method="post">
                                            <input type="text" id="name" name="name" placeholder="Ваше Имя" required="required"></input>

                                            <input type="text" id="number_phone" name="number_phone" placeholder="+7 (999) 999-99-99" required="required"></input>

                                            <input type="text" id="address" name="address" placeholder="Адрес доставки" required="required"></input>

                                            <input type="text" id="comment" name="comment" placeholder="Комментарий к заказу" required="required"></input>

                                            <div class="buy_modal">
                                                <div class="payment">Оплата</div>

                                                <div class="cask_or_Onlinebank">
                                                    <input type="radio" name="buy" id="cask_or_Onlinebank" required="required"></input>

                                                    <label for="male">
                                                        Оплата наличными или банковской картой при
                                                        получении
                                                        заказа
                                                    </label>
                                                </div>

                                                <div class="buy_on_site">
                                                    <input type="radio" name="buy" id="buy_on_site"></input>

                                                    <label for="male">
                                                        Оплата банковской картой на сайте
                                                    </label>
                                                </div>

                                                <div class="yandex">
                                                    <input type="radio" name="buy" id="yandex"></input>

                                                    <label for="male">
                                                        Яндекс.Касса (Apple pay, Google pay, Альфа Банк,
                                                        Тинькофф, QIWI, WebMoney, Яндекс Деньги)
                                                    </label>
                                                </div>
                                            </div>

                                            <input type="submit" value="Оформить заказ"></input>

                                            <p class="form_p">
                                                Нажимая на кнопку "Оставить заявку", вы даете согласие на
                                                обработку персональных данных
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                                </div>

                                <div class="buy_plus">
                                    <div class="buy_plus_title">
                                        <h1 class="buy_plus_title">Добавить к заказу</h1>
                                    </div>

                                    <div class="sauces_plus">
                                        <div class="sauces">
                                            <div class="sauces_left">
                                                <img src="./img/tomate.png" alt="">
                                            </div>

                                            <div class="sauces_mid">
                                                <h1 class="sauces_mid_title">Острый томатный соус</h1>

                                                <h1 class="sauces_mid_text">
                                                    +30₽

                                                    <span class="sauces_mid_span">/100г.</span>
                                                </h1>
                                            </div>

                                            <div class="sauces_right">
                                                <button class="sauces_right_plus">
                                                    <img src="./vector/plus_basket.svg" alt="">
                                                </button>
                                            </div>
                                        </div>

                                        <div class="sauces">
                                            <div class="sauces_left">
                                                <img src="./img/tomate.png" alt="">
                                            </div>

                                            <div class="sauces_mid">
                                                <h1 class="sauces_mid_title">Острый томатный соус</h1>

                                                <h1 class="sauces_mid_text">
                                                    +30₽

                                                    <span class="sauces_mid_span">/100г.</span>
                                                </h1>
                                            </div>

                                            <div class="sauces_right">
                                                <button class="sauces_right_plus">
                                                    <img src="./vector/plus_basket.svg" alt="">
                                                </button>
                                            </div>
                                        </div>

                                        <div class="sauces">
                                            <div class="sauces_left">
                                                <img src="./img/tomate.png" alt="">
                                            </div>

                                            <div class="sauces_mid">
                                                <h1 class="sauces_mid_title">Острый томатный соус</h1>

                                                <h1 class="sauces_mid_text">
                                                    +30₽

                                                    <span class="sauces_mid_span">/100г.</span>
                                                </h1>
                                            </div>

                                            <div class="sauces_right">
                                                <button class="sauces_right_plus">
                                                    <img src="./vector/plus_basket.svg" alt="">
                                                </button>
                                            </div>
                                        </div>

                                        <div class="sauces">
                                            <div class="sauces_left">
                                                <img src="./img/tomate.png" alt="">
                                            </div>

                                            <div class="sauces_mid">
                                                <h1 class="sauces_mid_title">Острый томатный соус</h1>

                                                <h1 class="sauces_mid_text">
                                                    +30₽

                                                    <span class="sauces_mid_span">/100г.</span>
                                                </h1>
                                            </div>

                                            <div class="sauces_right">
                                                <button class="sauces_right_plus">
                                                    <img src="./vector/plus_basket.svg" alt="">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>

                <!-- content 2 -->

                <div class="tab-content" id="content_2">
                    <div class="order_restaurant">
                        <div class="order_restaurant_title">
                            <div class="time_number_order">
                                <h1 class="time_number_order_h">Заказ №234234</h1>

                                <h1 class="time_number_order_text">18:30</h1>
                            </div>

                            <div class="order_status">
                                <h1 class="order_status_txt">статус: готовится</h1>
                            </div>
                        </div>

                        <div class="about_basket_content">
                            <div class="about_basket_content_left">
                                <div class="order_select">
                                    <div class="order_card">
                                        <div class="left_order_card">
                                            <img src="./img/order_left.png" alt="">
                                        </div>

                                        <div class="mid_order_card">
                                            <h1 class="text_card_menu_title">Салат пармиджано</h1>

                                            <div class="kk_BGY">
                                                <p class="kk_BGY_p">Ккал: 245</p>

                                                <p class="kk_BGY_p">БЖУ: 19,8/12,5/0</p>
                                            </div>

                                            <div class="price_count">
                                                <div class="price_div">
                                                    <h1 class="price">359₽</h1>

                                                    <span class="price_span">/100г.</span>
                                                </div>

                                                <!-- Сделать счетчик количества товара -->
                                                <div class="coutn_food"></div>
                                            </div>
                                        </div>

                                        <div class="right_order_card">

                                            <div class="checkbox_on">
                                                <input type="checkbox"></input>

                                                <h1 class="text_table">
                                                    подать к столу
                                                </h1>
                                            </div>



                                            <div class="btn_order">
                                                <button class="btn_close_order">
                                                    <img src="./vector/close_order.svg" alt="">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- content left cloze -->

                            <div class="about_basket_content_right">
                                <div class="your_order">
                                    <h1 class="your_order_title">Ваш заказ</h1>

                                    <div class="your_order_buy">
                                        <div class="order_chek">
                                            <h1 class="order_chek_left">Салат пармиджано</h1>

                                            <h1 class="order_chek_mid">1шт.</h1>

                                            <h1 class="order_chek_right">359₽</h1>
                                        </div>
                                    </div>

                                    <div class="delivery_order">
                                        <h1 class="delivery_order_text">Доставка</h1>

                                        <h1 class="delivery_order_price">10 000₽</h1>
                                    </div>

                                    <div class="arrange_order">
                                        <div class="result_order">
                                            <h1 class="result_order_text">Итог:</h1>

                                            <h1 class="result_order_price">15 272₽</h1>
                                        </div>

                                        <a href="#openModal">
                                            <button class="button_arrange_order">Оформить заказ</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="buy_plus">
                            <div class="buy_plus_title and_btn">
                                <h1 class="buy_plus_title">Добавить к заказу</h1>

                                <button class="buy_plus_title_btn">Перейти в меню</button>
                            </div>

                            <div class="sauces_plus">
                                <div class="sauces">
                                    <div class="sauces_left">
                                        <img src="./img/tomate.png" alt="">
                                    </div>

                                    <div class="sauces_mid">
                                        <h1 class="sauces_mid_title">Острый томатный соус</h1>

                                        <h1 class="sauces_mid_text">
                                            +30₽

                                            <span class="sauces_mid_span">/100г.</span>
                                        </h1>
                                    </div>

                                    <div class="sauces_right">
                                        <button class="sauces_right_plus">
                                            <img src="./vector/plus_basket.svg" alt="">
                                        </button>
                                    </div>
                                </div>

                                <div class="sauces">
                                    <div class="sauces_left">
                                        <img src="./img/tomate.png" alt="">
                                    </div>

                                    <div class="sauces_mid">
                                        <h1 class="sauces_mid_title">Острый томатный соус</h1>

                                        <h1 class="sauces_mid_text">
                                            +30₽

                                            <span class="sauces_mid_span">/100г.</span>
                                        </h1>
                                    </div>

                                    <div class="sauces_right">
                                        <button class="sauces_right_plus">
                                            <img src="./vector/plus_basket.svg" alt="">
                                        </button>
                                    </div>
                                </div>

                                <div class="sauces">
                                    <div class="sauces_left">
                                        <img src="./img/tomate.png" alt="">
                                    </div>

                                    <div class="sauces_mid">
                                        <h1 class="sauces_mid_title">Острый томатный соус</h1>

                                        <h1 class="sauces_mid_text">
                                            +30₽

                                            <span class="sauces_mid_span">/100г.</span>
                                        </h1>
                                    </div>

                                    <div class="sauces_right">
                                        <button class="sauces_right_plus">
                                            <img src="./vector/plus_basket.svg" alt="">
                                        </button>
                                    </div>
                                </div>

                                <div class="sauces">
                                    <div class="sauces_left">
                                        <img src="./img/tomate.png" alt="">
                                    </div>

                                    <div class="sauces_mid">
                                        <h1 class="sauces_mid_title">Острый томатный соус</h1>

                                        <h1 class="sauces_mid_text">
                                            +30₽

                                            <span class="sauces_mid_span">/100г.</span>
                                        </h1>
                                    </div>

                                    <div class="sauces_right">
                                        <button class="sauces_right_plus">
                                            <img src="./vector/plus_basket.svg" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once('./elements/footer.php') ?>

    <script src="./js/modal_open.js"></script>
</body>

</html>