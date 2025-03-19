<?php
include_once("connect.php");

class MCompany {
    public function getAllCompany(){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "select * from companies";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }
}




?>