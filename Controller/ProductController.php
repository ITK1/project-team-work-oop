<?php
session_start();
require_once __DIR__ .'/../Database.php';
require_once __DIR__ . '/../ProductModel.php';

class ProductController{
private $model;


 public function __construct(){
    $dbConnect = new Database();
    $this->model = new ProductModel($dbConnect->connect());
 }


 public function handleRequest(){
    
    // xu ly dang nhap
    // neu form dang nhap login gui len

    if(isset($_POST['action']) && $_POST['action'] =='login'){
        if($_POST['username'] == 'admin' && $_POST['password'] == 'admin123'){
            $_SESSION['user_logged'] = true;
            header("location: ../views/index.php");
        }
        else{
            $error = "sai Mat Khau";
            require __DIR__ . '/../views/login.php';
        }
        exit();
    }
 }
 


 // xu ly dang xuat


 if(isset(_$_GET['action']) && $_GET['action'] == 'logout'){
        session_destroy();
        header("Location: index.php");
        exit();
 }


 // chan cua bao mat
 // neu chua dang nhap se nhay sang dang nhap

 if(isset($_SESSION['user_logged'])){
    require __DIR__ . '/../views/index.php';
    return;
 }

    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['btn_add'])){
        $ten = $_POST['ten_sp'];
        $gia = $_POST['gia'];
        $hinh = null;
        
        if(isset($_FILE['hinh_anh'])&& $_FILES['hinh_anh']['error']==0){
                $taget_DIR =  "uploads/";
                $filename = time() . "_" . $_FILES['hinh_anh']['name'];
                $target_file = $taget_DIR . $filename;

                if(move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file)){
                    $hinh = "uploads/" . $filename;
                }
        }

        $this->model->add($ten,$gia,$hinh);
        header("Location: index.php");
        exit();
    }


    if(isset($_GET['action']) &&$_GET['action'] == 'delete' && isset($_GET['id'])){
        $this->model->delete($_GET['id']);
        header("location: index.php");
        exit();
    }
 

    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] ."";
    $products = $this->model->getAll($keyword);

    require __DIR__ . '/../views/dashboard.php';
}
?>