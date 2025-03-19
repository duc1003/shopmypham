<?php
include_once("model/mCompany.php");
class CCompany{
    public function getAllCompany(){
        $p = new MCompany();
        $table = $p->getAllCompany();
        
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