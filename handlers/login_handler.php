<?php 
include("../core/validation.php");
include("../core/function.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $email=$_POST['email'];
    $password=trim($_POST['password']);
    $error=validateLogin($email,$password);
    if(!empty($error)){
        setMessege("danger",$error);
        header("location:../index.php");
        exit;
    }
    if(loginUser($email,$password)){
        header("location: ../home.php");
        exit;
    }else{
        setMessege("danger","Invalid email or password");
        header("location: ../index.php");
        exit;  
    }
}
