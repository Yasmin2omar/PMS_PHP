<?php
include_once __DIR__."/../core/validation.php";
include_once __DIR__."/../core/function.php";
if($_SERVER['REQUEST_METHOD']=="POST" ){
    $productJson=__DIR__."/../data/products.json";
    $productData=file_get_contents($productJson);
    $products=json_decode($productData,true);
    $name=$_POST['name'];
    $old_price=$_POST['old_price'];
    $new_price=$_POST['new_price'];
    $url=$_POST['url'];
    $error=validateCreation($name,$old_price,$new_price, $url);
    if(!empty($error)){
        setMessege("danger",$error);
        header("location:../create.php");
        exit;
    }
    $maxid=max(array_column($products,'id'));
    $newItem=[
        "id"=>$maxid+1,
        "name"=>$name,
        "img"=>$url,
        "price"=>$new_price,
        "old_price"=>$old_price
    ];
    $products[]=$newItem;
    file_put_contents($productJson,json_encode($products,JSON_PRETTY_PRINT));
    setMessege("success","Created successfully");
    unset($_SESSION['search']);
    header("location: ../admin.php");
    exit;
}