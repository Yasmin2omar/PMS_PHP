<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET['delete'])){
    unset($_SESSION['cartData'][$_GET['delete']]);
    $_SESSION['cartData']=array_values($_SESSION['cartData']);
    header("location: ../cart.php");
    exit;
}