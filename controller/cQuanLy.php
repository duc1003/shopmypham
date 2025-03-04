<?php
    include("model/mQuanLy.php");
    class CQuanLy{
        public function getAllQL(){
            $p = new MCongTy();
            $tbl = $p->selectAllQL();
            
            if($tbl){
                if($tbl->num_rows>0){
                    return $tbl;
                }else{
                    return -1; //Không có dữ liệu trong bảng
                }
            }else{
                return false;
            }
        }

    }
?>