<?php
// 1. Sửa đường dẫn: Bỏ dấu /./ thừa đi
// Lưu ý: Hãy nhìn vào thư mục máy bạn, nếu thư mục tên là "Controller" (viết hoa) 
// thì đổi chữ 'controller' bên dưới thành 'Controller' nhé.
require_once __DIR__ . '/controller/ProductController.php';

// 2. Khởi tạo đối tượng (Chuẩn rồi)
$app = new ProductController();

// 3. Chạy ứng dụng
$app->handleRequest();
require_once './views/index.php';
?>