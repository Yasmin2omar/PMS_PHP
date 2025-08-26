<?php
function validateRequired($value,$filedName){
    return(empty($value))?"The $filedName is required":null;
}
function validateEmail($email){
    return filter_var($email,FILTER_VALIDATE_EMAIL)?null:"Invalid Email";
}
function validatePassword($password){
    if(strlen($password)<6){
        return"Password must be greater than 6 numbers";
    };
    if(!preg_match("/[A-Z]/",$password)){
        return"Password must have Uppercase";
    };    
    if(!preg_match("/[a-z]/",$password)){
        return"Password must have Lowercase";
    };
    if(!preg_match("/[0-9]/",$password)){
        return"Password must have numbers";
    };
    return null;
}
function validateConfirmPassword($password,$confirm_password){
    if($password!==$confirm_password){
        return"Password & Confirm_password are not matched";
    }
    return null;
}
function validatePhone($phone){
    if(strlen($phone) !=11){
        return("Phone number must equal 11 number");
    }
}
function validateAddress($address){
    if(strlen($address) >100){
    return("Long Address");}
    if(strlen($address) <15){
    return("Short Address");}
}
function validateOld_Price($old_price){
    if(preg_match("/[A-Z]/",$old_price)){
        return"This field must be numbers";
    };    
    if(preg_match("/[a-z]/",$old_price)){
        return"This field must be numbers";
    };
    return null;
}
function validateNew_Price($new_price){
    if(preg_match("/[A-Z]/",$new_price)){
        return"This field must be numbers";
    };    
    if(preg_match("/[a-z]/",$new_price)){
        return"This field must be numbers";
    };
    return null;
}
function validateCreation($name,$old_price,$new_price,$url){
    $itemData=[
        "name"=>$name,
        "old_price"=>$old_price,
        "new_price"=>$new_price,
        "url"=>$url
    ];
    foreach($itemData as $key=> $data){
            if($error=validateRequired($data,$key)){
            return $error;
        }
    }
    if($error=validateOld_Price($old_price)){
        return $error;
    }
    if($error=validateNew_Price($new_price)){
        return $error;
    }
}
function validateRegister($name,$email,$password,$confirm_password){
    $userData=[
        "name"=>$name,
        "email"=>$email,
        "password"=>$password,
        "confirm_password"=>$confirm_password
    ];
    foreach($userData as $fieldName=>$value){
        if($error=validateRequired($value,$fieldName)){
            return $error;
        }
    }
    if($error=validateEmail($email)){
        return $error;
    }
    if($error=validatePassword($password)){
        return $error;
    }        
    if($error=validateConfirmPassword($password,$confirm_password)){
        return $error;
    }
}
function validateLogin($email,$password){
    $userData=[
        "email"=>$email,
        "password"=>$password,
    ];
    foreach($userData as $fieldName=>$value){
        if($error=validateRequired($value,$fieldName)){
            return $error;
        }
    }
    if($error=validateEmail($email)){
        return $error;
    }
}
function validateUserData($name,$email,$phone,$address,$note){
    $userData=[
        "name"=>$name,
        "email"=>$email,
        "phone"=>$phone,
        "address"=>$address,
        "note"=>$note
    ];
    foreach($userData as $fieldName=>$value){
        if($error=validateRequired($value,$fieldName)){
            return $error;
        }
        if($error=validateEmail($email)){
            return $error;
        }
        if($error=validatePhone($phone)){
            return $error;
        }        
        if($error=validateAddress($address)){
            return $error;
        }
    }
}
function validateMessege($name,$email,$messege){
    $data=[
        "name"=>$name,
        "email"=>$email,
        "messege"=>$messege
    ];
    foreach($data as $filedName => $value){
        if($error=(validateRequired($value,$filedName))){
            return $error;
        }
        if($error=(validateEmail($email))){
            return $error;
        }
        
    }
}