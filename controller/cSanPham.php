<?php
    include("model/mSanPham.php");
    class CSanPham{
        public function getAllSP(){
            $p = new MSanPham();
            $tbl = $p->selectAllSP();
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

        public function getAllSPbyCompany($comp){
            $p = new MSanPham();
            $tbl = $p->SelectAllSPbyCompany($comp);
            if($tbl){
                if($tbl->num_rows>0){
                    return $tbl;
                }else{
                    return -1;
                }
            }else{
                return false;
            }
        }

        public function getAllSPbyName($name){
            $p = new MSanPham();
            $tbl = $p->selectAllSPbyName($name);
            if($tbl){
                if($tbl->num_rows>0){
                    return $tbl;
                }else{
                    return null;
                }
            }else{
                return false;
            }
        }

        // public function addsp($TenSP, $HinhAnh, $DonGia, $SoLuong, $MaLSP, $MoTa) {
        //     $p = new MSanPham();
        
        //     $testname = $p->selectAllSPbyName($TenSP);
        //     if ($testname && $testname->num_rows > 0) {
        //         return "Sản phẩm đã tồn tại trong cơ sở dữ liệu.";
        //     }
        
        //     $luu = $p->addsp($TenSP, $HinhAnh, $DonGia, $SoLuong, $MaLSP, $MoTa);
        
        //     // Trả về kết quả thêm sản phẩm hoặc thông báo lỗi nếu có
        //     return $luu;
        // }
    }
    

?>