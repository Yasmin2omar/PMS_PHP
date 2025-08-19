<?php
include_once __DIR__."/../core/function.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $search=$_POST['search'];
    if($productSearch=productSearch($search)) {
        setMessege("success","Product is available");
        header("location: ../admin.php");
        exit;
    }else{
        setMessege("danger","Product isn't available");
        header("location: ../admin.php");
        exit;
    }
}