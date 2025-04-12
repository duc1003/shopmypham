<?php
    include("controller/cCategories.php");
    $p = new CCategories();
    $tbl = $p ->getAllCategories();

    if(!$tbl){
        echo "Không thể kết nối";
    }elseif($tbl == null){
        echo "Chưa có dữ liệu";
    }else{
        $dem = 0;
        echo "<table class='tb' >";
        echo "<thead>";
        echo "<th>Mã danh mục</th>";
        echo "<th>Tên danh mục</th>";
        echo "<th>Mô tả</th>";
        echo "</thead>";
        while($r=$tbl->fetch_assoc()){
            echo "<tr>";
            echo "<td>";
            echo $r["category_id"];
            echo "</td>";

            echo "<td>";
            echo $r["category_name"];
            echo "</td>";

            echo "<td>";
            echo $r["description"];
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
