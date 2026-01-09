<?php
require_once __DIR__ . '/../config/config.php';


class Database{

public function connect(){
    
try{
    $sql = "mysql:host=" . DB_HOST .";dbname=" . DB_NAME .";charset";
    $conn = new PDO($sql , DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
} catch(PDOException $e){
    die("loi ket noi sql:" .$e->getMessage());
}
}
}
?>