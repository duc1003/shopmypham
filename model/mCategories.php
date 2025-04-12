<?php
include_once("connect.php");
class MCategories {
    public function getAllCategories(){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "select * from categories";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }
}



?>