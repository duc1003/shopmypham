<?php
    include("controller/cCompany.php");
    $p = new CCompany();
    $tbl = $p ->getAllCompany();

    if(!$tbl){
        echo "Không thể kết nối";
    }elseif($tbl == null){
        echo "Chưa có dữ liệu";
    }else{
        $dem = 0;
        echo "<table class='tb' >";
        echo "<thead>";
        echo "<th>Mã công ty</th>";
        echo "<th>Tên công ty</th>";
        echo "<th>Địa chỉ</th>";
        echo "<th>Email</th>";
        echo "</thead>";
        while($r=$tbl->fetch_assoc()){
            echo "<tr>";
            echo "<td>";
            echo $r["company_id"];
            echo "</td>";

            echo "<td>";
            echo $r["name"];
            echo "</td>";

            echo "<td>";
            echo $r["address"];
            echo "</td>";
            echo "<td>";
            echo $r["email"];
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
