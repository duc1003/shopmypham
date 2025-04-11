<?php
include_once("model/mProduct.php");
class CProduct{
    public function getAllProduct(){
        $p = new MProduct();
        $table = $p->getAllProduct();
        
        if($table){
            if($table->num_rows>0){
                return $table;
            }
        }else{
            return false;
        }
    }

    public function getAllProductByType($type){
        $p = new MProduct();
        $table = $p->getAllProductByType($type);
        
        if($table){
            if($table->num_rows>0){
                return $table;
            }
        }else{
            return false;
        }
    }

    public function getAllProductByName($name){
        $p = new MProduct();
        $table = $p->getAllProductByName($name);
        
        if($table){
            if($table->num_rows>0){
                return $table;
            }
        }else{
            return false;
        }
    }
   public function getProductByID($id){
    $p = new MProduct();
    $table = $p->getProductByID($id);
    
    if ($table && $table->num_rows > 0) {
        return $table;
    } else {
        return false;
    }
}

}



?>