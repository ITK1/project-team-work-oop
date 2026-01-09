<?php
session_start(); // Khởi tạo session ngay đầu file
require_once __DIR__ .'/../core/Database.php'; // Chỉnh lại đường dẫn nếu cần thiết (ví dụ: ../core/Database.php)
require_once __DIR__ . '/../models/ProductModel.php'; // Chỉnh lại đường dẫn models

class ProductController {
    private $model;

    public function __construct() {
        $dbConnect = new Database();
        $this->model = new ProductModel($dbConnect->connect());
    }

    public function handleRequest() {
        // --- 1. XỬ LÝ ĐĂNG NHẬP ---
        if (isset($_POST['action']) && $_POST['action'] == 'login') {
            if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin123') {
                $_SESSION['user_logged'] = true;
                header("Location: index.php"); // Load lại trang để vào dashboard
            } else {
                $error = "Sai mật khẩu hoặc tài khoản";
                require __DIR__ . '/../views/login.php';
            }
            exit();
        }

        // --- 2. XỬ LÝ ĐĂNG XUẤT ---
        // (Đoạn này lúc nãy bị nằm ngoài hàm)
        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            session_destroy();
            header("Location: index.php");
            exit();
        }

        // --- 3. CHẶN BẢO MẬT (Auth Guard) ---
        // Nếu CHƯA đăng nhập (!isset), thì hiện form login và DỪNG xử lý
        if (!isset($_SESSION['user_logged'])) {
            require __DIR__ . '/../views/login.php';
            return; // Dừng hàm tại đây, không cho chạy code bên dưới
        }

        // --- 4. XỬ LÝ THÊM SẢN PHẨM ---
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_add'])) {
            $ten = $_POST['ten_sp'];
            $gia = $_POST['gia'];
            $hinh = null;

            // Sửa lỗi chính tả: $_FILES (có chữ s)
            if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0) {
                $target_DIR = "uploads/"; // Sửa chính tả taget -> target
                
                // Lấy đuôi file để tạo tên mới an toàn hơn
                $extension = pathinfo($_FILES['hinh_anh']['name'], PATHINFO_EXTENSION);
                $filename = time() . "_" . uniqid() . "." . $extension;
                
                $target_file = $target_DIR . $filename;

                if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file)) {
                    $hinh = "uploads/" . $filename;
                }
            }

            $this->model->add($ten, $gia, $hinh);
            header("Location: index.php");
            exit();
        }

        // --- 5. XỬ LÝ XÓA SẢN PHẨM ---
        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $this->model->delete($_GET['id']);
            header("Location: index.php");
            exit();
        }

        // --- 6. HIỂN THỊ DASHBOARD ---
        // Nếu đã đăng nhập và không thực hiện hành động gì đặc biệt, lấy danh sách hiển thị
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
        $products = $this->model->getAll($keyword);

        require __DIR__ . '/../views/dashboard.php';
    
    } // <--- ĐÓNG HÀM handleRequest Ở TẬN CUỐI CÙNG
}
?>