<?php
    include_once("ketnoi.php");
    class MCongTy{
        public function SelectAllCT(){
            $p = new clsketnoi();
            $conn = $p->moketnoi();
            $conn->set_charset('utf8');
            if($conn){
                $str = "select * from loaisanpham";
                $tbl = $conn->query($str);
                $p->dongketnoi($conn);
                return $tbl;
            }else{
                return false;
            }
        }
    }
?>