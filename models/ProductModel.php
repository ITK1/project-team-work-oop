<?php
class ProductModel{

    private $conn;
    public function __construct($db){

        $this->conn = $db;
    }


    public function getAll(){
        $sql = "SELECT * FROM san_pham";
        if(!empty($keyword)){
            $sql .= "WHERE ten_sp LIKE  :kw";
        }
        $sql .= "ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        if(!empty($keyword)){
            $stmt->bindValue(':kw','%' .$keyword . '%');
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($ten,$gia,$hinh){
        $sql = "INSERT INTO san_pham(ten_sp, gia, hinh_anh) VALUES (:ten,:gia,:hinh)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':ten'=>$ten, ':gia'=> $gia, ':hinh' =>$hinh]);
    }

    public function delete($id){
        $sql = $this->conn->prepare("DELETE FROM san_pham WHERE id =:id");
        return $sql->execute([':id'=>$id]);
    }

    
    
}


?>