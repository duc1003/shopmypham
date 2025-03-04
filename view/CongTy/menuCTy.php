<?php
    include("controller/cCongTy.php");
    
    $p = new CCongTy();
    $tblCT = $p->getAllCT();
    
    if(!$tblCT){
        echo "Không có sản phẩm";
    }elseif($tblCT == null){
        echo "Chưa có dữ liệu";
    }else{
        while ($row=$tblCT->fetch_assoc()){
            echo "<a href='index.php?Comp=".$row["MaLSP"]."'>".$row["LoaiSP"]."</a><br><br>";
        }
    }
?>