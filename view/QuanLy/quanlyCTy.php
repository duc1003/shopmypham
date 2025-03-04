<?php
    include("controller/cCongTy.php");
    $p = new CCongTy();
    $tbl = $p ->getAllCT();

    if(!$tbl){
        echo "Không thể kết nối";
    }elseif($tbl == null){
        echo "Chưa có dữ liệu";
    }else{
        $dem = 0;
        echo "<table class='tb' >";
        echo "<thead>";
        echo "<th>Mã danh mục</th>";
        echo "<th>Danh mục sản phẩm</th>";
        echo "<th>Company adress</th>";
        echo "<th>Action</th>";
        echo "</thead>";
        while($r=$tbl->fetch_assoc()){
            echo "<tr>";
            echo "<td>";
            echo $r["MaLSP"];
            echo "</td>";

            echo "<td>";
            echo $r["LoaiSP"];
            echo "</td>";

            echo "<td>";
            echo "499 Quang Trung Phường 10 Gò Vấp Hồ Chí Minh";
            echo "</td>";
            echo "<td> Sửa|Xóa </td>";
            echo "</tr>";
            $dem++;
            if($dem%5==0){
                echo "</tr>";
                echo "<tr>";
            }
        }
        echo "</tr>";
        echo "</table>";
    }
?>
