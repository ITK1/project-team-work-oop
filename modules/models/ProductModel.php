<?php
class ProductModel{
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    // lay toan bo danh sach
    public function getAll(){
        $sql = $this->conn->prepare("SELECT * FROM san_pham ORDER BY id DESC");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);// tra ve mang
    }


    public function add($ten, $gia, $hinh){
        $sql = " INSERT INTO san_pham (ten_sp, gia,hinh_anh) VALUES(:ten ,:gia, :hinh)";
        $sql = $this->conn->prepare($sql);
        return $sql->execute([':ten' =>$ten , ':gia' => $gia , ':hinh'=> $hinh]);
    }


    public function delete($id){
        $sql= $this->conn->prepare("DELETE FROM san_pham WHERE id=:id");
        $sql->execute([':id'=>$id]);
    }

    
}
?>