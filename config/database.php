<?php

    $server = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "luongvhpc05477_asm_php1";
    
    global $connection;
    

$connection = mysqli_connect($server, $username, $password, $database );


if(!$connection){
    echo "lỗi kết nối cơ sở dữ liệu!";
    die();
}


require_once 'modules/product.php';
require_once 'modules/users.php';
require_once 'modules/post.php';
require_once 'modules/order.php';

?>