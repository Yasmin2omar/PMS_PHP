<?php 
include("../core/validation.php");
include("../core/function.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=trim($_POST['password']);
    $confirm_password=trim($_POST['confirm_password']);
    $error=validateRegister($name,$email,$password,$confirm_password);
    if(!empty($error)){
        setMessege("danger",$error);
        header("location:../register.php");
        exit;
    }
    if(registerUser($name,$email,$password)){
        setMessege("success","Registration successful");
        header("location: ../index.php");
        exit;
    }
}
