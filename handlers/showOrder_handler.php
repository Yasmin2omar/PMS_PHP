<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__."/../core/function.php";

if(empty($orders=orders())){
    setMessege("danger","There are no orders yet.");

}
