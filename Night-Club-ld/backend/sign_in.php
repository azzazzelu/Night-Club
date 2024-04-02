<?php
session_start();
require_once 'connect.php';
$email = $_POST['email'];
$password = $_POST['password'];

    $sql = mysqli_query($connect, "SELECT * FROM `users`  WHERE  `password`= '$password'");
    if(mysqli_fetch_assoc($sql)>0){
        $user = mysqli_fetch_assoc($sql);
        $_SESSION['user']= "$user";
        header('location: ../index.php');
    }else{
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('location: ../signin.php');
    }

?>