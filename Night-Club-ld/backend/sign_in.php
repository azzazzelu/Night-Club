<?php
session_start();
require_once 'connect.php';
$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = hash('sha256', $password);
$sql = mysqli_query($connect, "SELECT * FROM `users`  WHERE  `password`= '$hashed_password'");
 
if (mysqli_fetch_assoc($sql) > 0) {
    $user = mysqli_fetch_assoc($sql);
    $_SESSION['user'] = $user;
    if ($_SESSION['user']['password'] == "240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9" && $_SESSION['user']['email'] == "admin@admin.com") {
        echo 'hi';
        header('Location: ../admin_panel.php');
        
    } else {
        header('location: ../index.php');
    }
} else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('location: ../signin.php');
}