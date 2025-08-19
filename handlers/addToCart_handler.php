<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__."/../core/function.php";
if (($_SERVER['REQUEST_METHOD'] == "POST")&&isset($_POST['add'])) {
    $productId=$_POST['productId'];
    $img=$_POST['img'];
    $name=$_POST['name'];
    $price=$_POST['price'];
        if((addToCart($productId,$name,$img,$price))){
            header("location: ../home.php");
            exit;
        }
}
$totalQuantity=0;
if(isset($_SESSION['cartData'])&& is_array($_SESSION['cartData'])){
    foreach($_SESSION['cartData'] as $product){
        $totalQuantity +=$product['quantity'];
    }
}
