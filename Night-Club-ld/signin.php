<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin</title>
    <link type="image/x-icon" rel="shortcut icon" href="./ico/logo.ico">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./font/suisseintl.css">
</head>

<body>
    <?php include_once('./elements/header.php') ?>
    <main>
        <div class="signup">
            <div class="container">
                <form class="signup_form" action="./backend/sign_in.php" method="post">
                    <h1>Вход</h1>
                    <?php
                    if ($_SESSION['message']) {
                        echo   $_SESSION['message'];
                    }
                    unset($_SESSION['message']);
                    ?>
                    <div class="signup_email">
                        <input type="text" placeholder="Введите почту" name="email" required>
                    </div>
                    <div class="signup_pass">
                        <input type="password" placeholder="Введите пароль " name="password" required>
                    </div>

                    <button type="submit" class="signup_btn">Войти</button>
                   
                </form>
            </div>
        </div>
    </main>
    <?php include_once('./elements/footer.php') ?>
</body>

</html>