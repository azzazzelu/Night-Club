<?php
session_start();
require_once('connect.php');
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
// Хешируем пароль с помощью алгоритма SHA-256
$hashed_password = hash('sha256', $password);
if (strlen($password) > 6) {
    $sql = mysqli_query($connect, "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$hashed_password')");
    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('location: ../signin.php');
} else {
    $_SESSION['message'] = 'Длина пароля меньше 6';
    header('location: ../signup.php');
}
