<?php
    include("model/mCongTy.php");
    class CCongTy{
        public function getAllCT(){
            $p = new MCongTy();
            $tbl = $p->selectAllCT();
            
            if($tbl){
                if($tbl->num_rows>0){
                    return $tbl;
                }
            }else{
                return false;
            }
        }

    }
?>