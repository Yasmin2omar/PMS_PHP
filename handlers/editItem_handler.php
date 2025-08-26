<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once("../core/function.php");
if($_SERVER['REQUEST_METHOD']=="POST" ){
    $productJson=__DIR__."/../data/products.json";
    $productData=file_get_contents($productJson);
    $products=json_decode($productData,true);


    $id=$_POST['edit'];
    foreach($products as &$product){
        if($product['id']==$id){
              $product['name']=$_POST['name'];
               $product['img']=$_POST['url'];
               $product['price']=$_POST['new_price'];
               $product['old_price']=$_POST['old_price']  ;
    
            file_put_contents($productJson,json_encode($products,JSON_PRETTY_PRINT));
            setMessege("success","Updated successfully");
            unset($_SESSION['search']);
            header("location: ../admin.php");
            exit;
        }
    }
    setMessege("danger","Updated failed");
    header("location: ../admin.php");
    exit;
}