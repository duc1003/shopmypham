<?php
include_once("connect.php");
class MProduct{
    public function getAllProduct() {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "select * from products";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }

    public function getAllProductByType($type) {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "select * from products where category_id = '$type'";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }

    public function getAllProductByName($name) {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "select * from products where product_name like '%$name%'";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }
    public function getProductByID($id){
    $p = new Connect();
    $conn = $p->connect();
    $conn->set_charset('utf8');

    if (!$conn) return false;
    else {
        $query = "SELECT * FROM products WHERE product_id = '$id'";
        $result = $conn->query($query);
        $p->closeConnect($conn);
        return $result;
    }
}


}



?>