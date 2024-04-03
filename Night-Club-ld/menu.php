<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link type="image/x-icon" rel="shortcut icon" href="./ico/logo.ico">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/normalize.css">
</head>

<body>
    <?php include_once('./elements/header.php') ?>

    <main>
        <div class="news new_menu">
            <div class="container news_container">
                <div class="news_content">
                    <h1 class="title_news">Новости и акции</h1>
                    <div class="slider_news">
                        <div class="card_news"><img src="./img/card_news_2.png" alt=""></div>
                        <div class="card_news"><img src="./img/card_news_1.png" alt=""></div>
                        <div class="card_news"><img src="./img/card_news_3.png" alt=""></div>
                        <div class="card_news"><img src="./img/card_news_1.png" alt=""></div>
                        <div class="card_news"><img src="./img/card_news_2.png" alt=""></div>
                        <div class="prev_btn"><img src="./img/Slider_news.png" alt=""></div>
                        <div class="next_btn"><img src="./img/slider_news_right.png" alt=""></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="tab">
            <div class="container">
                <input checked id="tab-btn-1" class="tab_input" name="tab-btn" type="radio" value="">
                <label for="tab-btn-1" class="tab_title_1 tab_title">Основное Меню</label>
                <input id="tab-btn-2" class="tab_input" name="tab-btn" type="radio" value="">
                <label for="tab-btn-2" class="tab_title_2 tab_title">Напитки</label>
                <div class="filter">
                    <div class="filter_top">
                        <p class="filter_text">Холодные закуски</p>
                        <p class="filter_text">Салаты</p>
                        <p class="filter_text">Горячие закуски</p>
                        <p class="filter_text">Супы</p>
                        <p class="filter_text">Паста</p>
                        <p class="filter_text">Основные блюда</p>
                    </div>
                    <div class="filter_bot">
                        <p class="filter_text">Пицца</p>
                        <p class="filter_text">Блюда на гриле</p>
                        <p class="filter_text">Морепродукты</p>
                        <p class="filter_text">Гарниры</p>
                        <p class="filter_text">Соусы</p>
                        <p class="filter_text">Десерты</p>
                    </div>
                </div>
                <div class="tab-content" id="content-1">
                    <div class="tab_content_menu">
                        <?php
                        require_once './backend/connect.php';
                        $sql = "SELECT * FROM `menu` ";
                        $food = mysqli_query($connect, "SELECT * FROM `menu`  WHERE  `category`= 'food'");
                        $product = mysqli_query($connect, $sql);
                        if (mysqli_num_rows($food) > 0) {
                            while ($row = mysqli_fetch_assoc($food)) {
                                $show_img = base64_encode($row['image']);
                        ?>
                                <div class="card_content_food">
                                    <img src="data:image/jpeg;base64,<?php echo $show_img ?>" alt="">
                                    <div class="text_card_menu">
                                        <div class="container_card_menu">
                                            <h1 class="text_card_menu_title"><?php echo $row['name'] ?></h1>
                                            <div class="kk_BGY">
                                                <p class="kk_BGY_p">Ккал: <?php echo $row['calories'] ?></p>
                                                <p class="kk_BGY_p">БЖУ: <?php echo $row['pfc'] ?></p>
                                            </div>
                                            <div class="buy_food_menu">
                                                <div class="price_div">
                                                    <h1 class="price"><?php echo $row['price'] ?>₽</h1> <span class="price_span">/100г.</span>
                                                </div>
                                                <div class="more_basket">

                                                    <a href="./backend/cart.php?id=<?php echo $row['id'] ?>">
                                                        <button class="button_basket"><img src="./vector/basket.svg" alt=""></button>
                                                    </a>
                                                </div>
                                            </div>
                                            <hr class="hr_card">
                                        </div>

                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-content" id="content-2">
                    <div class="tab_content_menu">
                        <?php
                        $drink = mysqli_query($connect, "SELECT * FROM `menu`  WHERE  `category`= 'drink'");
                        $product = mysqli_query($connect, $sql);
                        if (mysqli_num_rows($drink) > 0) {
                            while ($row = mysqli_fetch_assoc($drink)) {
                                $show_img = base64_encode($row['image']);
                        ?>
                                <div class="card_content_dring">
                                    <img src="data:image/jpeg;base64,<?php echo $show_img ?>" alt="">
                                    <div class="text_card_menu">
                                        <div class="container_card_menu">
                                            <h1 class="text_card_menu_title"><?php echo $row['name'] ?></h1>
                                            <div class="dring_cat">
                                                <p class="dring_categry"><?php echo $row['description'] ?></p>
                                            </div>
                                            <div class="buy_food_menu">
                                                <div class="price_div">
                                                    <h1 class="price"><?php echo $row['price'] ?>₽</h1> <span class="price_span">/100г.</span>
                                                </div>
                                                <div class="more_basket">
                                                    <a href="./backend/cart.php?id=<?php echo $row['id'] ?>">
                                                        <button class="button_basket"><img src="./vector/basket.svg" alt=""></button>
                                                    </a>

                                                </div>
                                            </div>
                                            <hr class="hr_card">
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>


        </div>
    </main>

    <?php include_once('./elements/footer.php') ?>
    <script src="./js/slider_news.js"></script>
</body>

</html>