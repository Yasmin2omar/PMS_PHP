<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once("../core/function.php");
if($_SERVER['REQUEST_METHOD']=="GET" ){
    $productJson=__DIR__."/../data/products.json";
    $productData=file_get_contents($productJson);
    $products=json_decode($productData,true);

    if(isset($_GET['edit']) && isset($products[$_GET['edit']])){

            $products[$_GET['edit']-1]=[
                "name"=>$_GET['name'],
                "img"=>$_GET['url'],
                "price"=>$_GET['new_price'],
                "old_price"=>$_GET['old_price']
            ];
            file_put_contents($productJson,json_encode($products,JSON_PRETTY_PRINT));
            setMessege("success","Updated successfully");
            unset($_SESSION['search']);
            header("location: ../admin.php");
            exit;

    }else{
                    
        setMessege("danger","Updated failed");
        
        header("location: ../admin.php");
        exit;}
}