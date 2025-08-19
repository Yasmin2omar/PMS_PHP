<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once("../core/function.php");
require_once("../core/validation.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=trim($_POST['phone']);
    $note=$_POST['note'];
    $data=$_POST['data'];
    if(!empty($error=validateUserData($name,$email,$phone,$address,$note))){
        setMessege("danger",$error);
        header("location: ../checkout.php");
        exit;
    }
    if(saveUserData($name,$email,$address,$phone,$note,$data)){
        setMessege("success","Data Is Saved");
        header("location: ../checkout.php");
        exit;
    }
}