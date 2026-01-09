<?php

require_once './core/Database.php';
require_once __DIR__ . '/../models/ProductModel.php';

class ProductController{
    private $model;
    
    public function __construct(){
        $dbClass = new Database();
        
        $this->model = new ProductModel($dbClass->connect());
    }



    public function handleRequest(){
        
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['btn_add'])){

        $ten = $_POST['ten_sp'];
        $gia = $_POST['gia'];
        $hinh = null;



        if(isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] ==0){
            $target_dir = __DIR__ ."/../uploads/";

            $fileName = time() . "_" . $_FILES['hinh_anh']['name'];

            $target_file = $target_dir . $fileName;


            if(move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file)){
                // luu tru bo nho
                $hinh = "uploads/" . $fileName;
            }
        }
    

    $this->model->add($ten,$gia,$hinh);
    
    header("location: index.php");
    exit();
    }


    // logic xoa
    // --- 2. XỬ LÝ XÓA (GET) ---
        if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])){
            $this->model->delete($_GET['id']);
            header("Location: index.php");
            exit();
        }

        // --- 3. MẶC ĐỊNH: LẤY DANH SÁCH SẢN PHẨM ---
        return $this->model->getAll();
 }
}
?>