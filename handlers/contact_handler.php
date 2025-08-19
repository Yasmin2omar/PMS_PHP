<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once ("../core/validation.php");
include_once ("../core/function.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $messege=$_POST['messege'];
    $error=validateMessege($name,$email,$messege);
    if(!empty($error)){
        setMessege("danger",$error);
        header("location: ../contact.php");
        exit;
    }
    if(saveMessege($name,$email,$messege)){
        setMessege("success","Data is saved");
        header("location: ../contact.php");
        exit;
    }
};