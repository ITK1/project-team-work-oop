<?php

require_once __DIR__ .'../core/Database.php'; // Chỉnh lại đường dẫn nếu cần thiết (ví dụ: ../core/Database.php)



$module = isset($_GET['module']) ? $_GET['module'] : 'admin';
$action = isset($_GET['action']) ? $_GET['action'] : 'dashboard';

$path = "modules/$module/$action.php";

if(file_exists($path)){
    include $path;
}else{
    echo "đường dẫn path không tồn tại!";
}




?>