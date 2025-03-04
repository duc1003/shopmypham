<?php
    include_once("ketnoi.php");
    class MQuanLy{
        public function SelectAllQL(){
            $p = new clsketnoi();
            $conn = $p->moketnoi();
            $conn->set_charset('utf8');
            if($conn){
                $str = "select * from sanpham";
                $tbl = $conn->query($str);
                $p->dongketnoi($conn);
                return $tbl;
            }else{
                return false;
            }
        }
    }
?>