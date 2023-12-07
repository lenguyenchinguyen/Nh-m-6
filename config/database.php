<?php

$server = "localhost";
$username = "root";
$password = "mysql";
$database = "thu";

global $connection;


$connection = mysqli_connect($server, $username, $password, $database );


if(!$connection){
echo "lỗi kết nối cơ sở dữ lieu!";
die();
}



require_once 'modules/product.php';
require_once 'modules/users.php';
require_once 'modules/post.php';
require_once 'modules/order.php';

?>