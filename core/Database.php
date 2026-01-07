<?php
require_once __DIR__ . '/../config/config.php';

class Database{
    public function connect(){
        
        try{
            $sql = "mysql:host=" . DB_HOST . ";dbname=" .DB_NAME . ";charset=utf8mb4";
            $conn = new PDO($sql , DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $ex){
            die( "lỗi Kết Nối Sql:" .$ex->getMessage());
        }
    }
}
?>