<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>главная</title>
    <link type="image/x-icon" rel="shortcut icon" href="./ico/logo.ico">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./font/suisseintl.css">
</head>

<body>
    <?php include_once('./elements/header.php') ?>
    <main>
        <div class="night_clubbing">
            <div class="container_logo">
                <div class="content_night">
                    <div class="title_night_clubbing">
                        <img src="./vector/title_night.svg" alt="">
                    </div>
                    <div class="button_mid">
                        <button class="button_left_booking right">Заказать</button>
                        <button class="button_menu">посмотреть меню</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="about_club">
            <div class="container">
                <div class="about_contnet">
                    <div class="left_content_about">
                        <hr class="about_hr">
                        <h1 class="title_about">О нашем
                            <span class="title_span">заведении</span>
                            <img class="img_open" src="./vector/open.svg" alt="">
                        </h1>
                        <p class="text_about">
                            С другой стороны сложившаяся структура организации требуют определения и уточнения модели
                            развития. Значимость этих проблем настолько очевидна, что реализация намеченных плановых
                            заданий требуют от нас анализа дальнейших направлений развития.
                            <br><br>
                            Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности требуют
                            определения и уточнения направлений прогрессивного развития. Значимость этих проблем
                            настолько очевидна, что рамки и место обучения кадров играет важную роль в формировании форм
                            развития.
                        </p>
                        <a href="" class="read_more">Читать больше </a>
                    </div>

                    <div class="reght_content_about">
                        <a class="more_detailed" href="./still.php">
                            <p class="p_more">Подробнее</p>
                            <img src="./vector/arrow_right.svg" alt="">
                        </a>
                        <div class="slider-container">
                            <div class="slider-wrapper" id="slider">
                                <div class="slider-card"><img src="./img/Slider.png" alt="Картинка 1"></div>
                                <div class="slider-card"><img src="./img/slider_2.png" alt="Картинка 2"></div>
                                <div class="slider-card"><img src="./img/Slider.png" alt="Картинка 3"></div>
                                <div class="slider-card"><img src="./img/Slider.png" alt="Картинка 4"></div>

                            </div>
                            <div class="slider-indicator" id="indicator"></div>
                            <div class="slider_arrow">
                                <div class="slider-arrow arrow_prev left" onclick="prevSlide()"><img src="./vector/arrow_slider_left.svg" alt="">
                                </div>
                                <div class="slider-arrow arrow_next right" onclick="nextSlide()"><img src="./vector/arrow_slider_right.svg" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="news">
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


        <div class="what_we_have">
            <div class="container">
                <div class="have_content">
                    <div class="what_we_have_content">
                        <img src="./img/what_we_have_phone.png" alt="">
                        <div class="what_we_text">
                            <hr class="about_hr">
                            <h1 class="title_have">Что у нас можно<br>
                                <span class="text_have">покушать</span>
                            </h1>
                            <p class="text_we">С другой стороны сложившаяся структура организации требуют определения и
                                уточнения модели
                                развития. Значимость этих проблем настолько очевидна, что реализация намеченных плановых
                                заданий требуют от нас анализа дальнейших направлений развития.</p>
                            <a href="./menu.php" class="view_menu">
                                смотреть меню <img src="./vector/arrow_right.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contacts">
            <div class="container">
                <h1 class="title_contact">Контакты</h1>
                <div class="contact_content">
                    <div class="contact_content_left">
                        <h1 class="title_cont">Контактные данные</h1>
                        <div class="num_phone">
                            <img src="./vector/phone_cont.svg" alt="">
                            <h1 class="date_contact">+7 (999) 999-99-99</h1>
                        </div>
                        <div class="phone_email">
                            <img src="./vector/email_cont.svg" alt="">
                            <h1 class="date_contact">potracheno@mail.ru</h1>
                        </div>
                        <div class="address">
                            <img src="./vector/addres_cont.svg" alt="">
                            <div class="date_contact">г. Самара, ул. Ерошевского, 70</div>
                        </div>
                        
                        <h1></h1>
                        <img src="./vector/messange.svg" alt="">
                    </div>
                    <hr class="contacts_hr">
                    <div class="contact_content_right">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A650aae8e99746c1970b97554d9fda2ae48e4f415c96327e3ef937fcdcd08e284&amp;source=constructor" width="630" height="390" frameborder="0"></iframe>
                        <h1 class="work_time">Режим работы
                            <span class="time">Пт-Сб 21:00-8:00</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php include_once('./elements/footer.php') ?>
    <script src="./js/slider_one.js"> </script>
    <script src="./js/slider_news.js"></script>
</body>

</html>