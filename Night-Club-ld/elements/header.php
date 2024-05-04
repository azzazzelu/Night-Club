<?php session_start() ?>
<header class="header header_PAGE_MENU">
    <div class="head_container">
        <div class="logo">
            <img src="./vector/logo.svg" alt="">
        </div>
        <div class="right_head">
            <div class="menu">
                <nav class="nav">
                    <a class="nav_a" href="index.php">Главная</a>
                    <a class="nav_a" href="menu.php">Меню</a>
                     
                    <?php
                    if (!isset($_SESSION['user'])) { ?>

                        <a href="./signin.php"> <button class="booking_button">Войти</button></a>
                        <a href="./signup.php"> <button class="booking_button">Регистрация</button></a>

                        
                    <?php  } else { ?>

                            <?php if ($_SESSION['user']['password'] == "admin123" && $_SESSION['user']['email'] == "admin@admin.com") { ?>
                            <a href="./admin_panel.php"> <button class="booking_button">Админ панель</button></a>
                        <?php   } else { ?>
                            <a href="./basket.php"> <button class="booking_button">Заказы </button></a>
                        <?php  } ?>
                        <a href="./backend/logout.php"> <button class="booking_button">Выйти</button></a>

                    <?php } ?>
                </nav>


            </div>
        </div>
    </div>
</header>