<?php
session_start();
if ( isset($_GET['delete']) && isset($_SESSION['cart']) ) {
    $_SESSION['cart'] = array_filter($_SESSION['cart'], function($e) {
       return $e['id'] != $_GET['delete'];
    });
  }
  header('Location:../basket.php');
  ?>