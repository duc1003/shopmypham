<?php
include_once("model/mCategories.php");

class CCategories{
    public function getAllCategories(){
        $p = new MCategories();
        $table = $p->getAllCategories();
        
        if($table){
            if($table->num_rows>0){
                return $table;
            }
        }else{
            return false;
        }
    }

}



?>