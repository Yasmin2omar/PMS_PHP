<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function setMessege($type,$text){
    $_SESSION['messege']=[
        "type"=>$type,
        "messege"=>$text
    ];
}
function showMessege(){
    if(isset($_SESSION['messege'])){
        $type=$_SESSION['messege']['type'];
        $messege=$_SESSION['messege']['messege'];
        echo"<div class='alert alert-$type'> $messege</div>";
        unset($_SESSION['messege']);
    }
}

$messegeJson= __DIR__."/../data/messeges.json";
if(!file_exists($messegeJson)){
    file_put_contents($messegeJson,json_encode([]));
}
function saveMessege($name,$email,$messege){
    $messegeJsonFile=$GLOBALS['messegeJson'];
    $dataJson=file_get_contents($messegeJsonFile);
    $messeges=json_decode($dataJson,true);
    $new_messege=[
        "name"=>$name,
        "email"=>$email,
        "messege"=>$messege
    ];
    $messeges[]=$new_messege;
    file_put_contents($messegeJsonFile,json_encode($messeges,JSON_PRETTY_PRINT));
    return true;
}

$fileJson= __DIR__."/../data/users.json";
if(!file_exists($fileJson)){
    file_put_contents($fileJson,json_encode([]));
}
function registerUser($name,$email,$password){
    $userjson=$GLOBALS['fileJson'];
    $userData=file_get_contents($userjson);
    $users=json_decode($userData,true);
    $pass_hash=password_hash($password,PASSWORD_DEFAULT);
    $new_user=[
        'name'=>$name,
        'email'=>$email,
        'password'=>$pass_hash,
    ];
    $users[]=$new_user;
    file_put_contents($userjson,json_encode($users,JSON_PRETTY_PRINT));
    return true;
}
function loginUser($email,$password){
    $userjson=$GLOBALS['fileJson'];
    $userData=file_get_contents($userjson);
    $users=json_decode($userData,true);
    foreach($users as $user){
        if($email=="admin@gmail.com"&&$password=="Admin123456789"){
            header("location: ../admin.php");
            exit;
        }elseif($user['email']==$email && password_verify($password,$user['password'])){
            $_SESSION['user']=[
                'password'=>$user['password'],
                'email'=>$user['email']
            ]
            ;return true;
        }
        
    }
    return false;
}


$userDataJson=__DIR__."/../data/orders.json";
if(!file_exists($userDataJson)){
    file_put_contents($userDataJson,json_encode([]));
}

function saveUserData($name,$email,$address,$phone,$note,$data){
    $userJson=$GLOBALS['userDataJson'];
    $userData=file_get_contents($userJson);
    $users=json_decode($userData,true);
    $product_data=[];
    foreach($_SESSION['cartData'] as $value){
        $product_data[]=[
        "product_name"=>$value['name'],
        "product_price"=>$value['price'],
        "product_quantity"=>$value['quantity']
        ];}
    $newUser=[
        "name"=>$name,
        "email"=>$email,
        "address"=>$address,
        "phone"=>$phone,
        "note"=>$note,
        "product_data"=>$product_data
    ];
    $users[]=$newUser;
    file_put_contents($userJson,data: json_encode($users,JSON_PRETTY_PRINT));
    return true;
}
function products(){
    $productJson=__DIR__."/../data/products.json";
    $productData=file_get_contents($productJson);
    $products=json_decode($productData,true);
    return $products;
}
function productSearch($search){
    $productJson=__DIR__."/../data/products.json";
    $productData=file_get_contents($productJson);
    $products=json_decode($productData,true);
    foreach($products as $product){
        if($product['name']==$search){
            $_SESSION['search']=[
                "id"=>$product['id'],
                "name"=>$product['name'],
                "img"=>$product['img'],
                "price"=>$product['price'],
                "old_price"=>$product['old_price']
            ];
            return $_SESSION['search'];
        }

    }
    return false;

}

function addToCart($productId, $name, $img, $price){
    if (!isset($_SESSION['cartData']) || !is_array($_SESSION['cartData'])) {
        $_SESSION['cartData'] = [];
    }
    $found = false;
    $newData = [
        "productId" => $productId,
        "img"       => $img,
        "name"      => $name,
        "price"     => $price,
        "quantity"  => 1
    ];
    foreach ($_SESSION['cartData'] as &$product) {
        if ($product['productId'] == $newData['productId']) {
            $product['quantity'] += 1;
            $found = true;
            break;
        }
    }
    unset($product);
    if (!$found) {
        $_SESSION['cartData'][] = $newData;
    }
    return true;
}
