<?php
session_start();
if (isset($_SESSION['user'])) {

    if (isset($_SESSION['cart'])) {
        $check = true;
        foreach ($_SESSION['cart'] as $product) {
            if ($product['id'] == $_GET['id']) {
                $check = false;
            }
        }
        if ($check) {
            $ExistingArray = $_SESSION['cart'];
            $AddProduct = array(
                "id" => $_GET['id'],
            );
            array_push($ExistingArray, $AddProduct);
            $_SESSION['cart'] = $ExistingArray;
        }
    } else {
        $array = array(
            0 => array(
                "id" => $_GET['id'],
            )
        );
        $_SESSION['cart'] = $array;
    }

    header('Location: ../basket.php');
} else {
    header('Location: ../signup.php');
}
