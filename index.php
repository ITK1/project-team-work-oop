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




// 1. Sửa đường dẫn: Bỏ dấu /./ thừa đi
// Lưu ý: Hãy nhìn vào thư mục máy bạn, nếu thư mục tên là "Controller" (viết hoa) 
// thì đổi chữ 'controller' bên dưới thành 'Controller' nhé.
// require_once __DIR__ . '/controller/ProductController.php';

// 2. Khởi tạo đối tượng (Chuẩn rồi)
// $app = new ProductController();

// 3. Chạy ứng dụng
// $app->handleRequest();
// require_once './views/index.php';
?>