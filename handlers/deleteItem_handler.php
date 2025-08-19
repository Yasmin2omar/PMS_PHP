<?php
include_once __DIR__."/../core/function.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if($_SERVER['REQUEST_METHOD']=="GET" ){
    $productJson=__DIR__."/../data/products.json";
    $productData=file_get_contents($productJson);
    $products=json_decode($productData,true);
    $id=$_GET['delete'];
    $index=$id-1;
    if(isset($_GET['delete']) && isset($products[$index])){
    unset($products[$index]);
            $products=array_values($products);
            array_values($products);
            foreach ($products as $index => &$product) {
                  $product['id'] = $index + 1;
                }
            file_put_contents($productJson,json_encode($products,JSON_PRETTY_PRINT));
            setMessege("success","Deleted successfully");
            unset($_SESSION['search']);
            header("location: ../admin.php");
            exit;

    }else{
                    
        setMessege("danger","Deleted failed");
        
        header("location: ../admin.php");
        exit;}
}