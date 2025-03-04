<?php
    include_once("ketnoi.php");
    class MSanPham{
        public function SelectAllSP(){
            $p = new clsketnoi();
            $conn = $p->moketnoi();
            $conn->set_charset('utf8');
            if($conn){
                $str = "select * from sanpham";
                $tblSP = $conn->query($str);
                $p->dongketnoi($conn);
                return $tblSP;
            }else{
                return false;
            }
        }
    }
?>