<?php
    include("controller/cCompany.php");
    $p = new CCompany();
    $tbl = $p ->getAllCompany();

    echo "<script>
        function confirmDelete(id) {
            if (confirm('Bạn có chắc muốn xóa sản phẩm này không?')) {
                window.location.href = 'quanlyCty.php?delComp=' + id;
            }
        }
    </script>";

    // Xử lý xóa sản phẩm
    if (isset($_GET['delComp'])) {
        $company_id = $_GET['delComp'];
        if ($p->deleteCompany($company_id)) {
            echo "<script>alert('Xóa sản phẩm thành công!'); window.location.href='quanlyCty.php';</script>";
        } else {
            echo "<script>alert('Lỗi khi xóa công ty!');</script>";
        }
    }

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
            echo "<td>
                <a href='quanlycty.php?editComp=" . $r['company_id'] . "'>Sửa</a> |
                <a href='#' onclick='confirmDelete(" . $r['company_id'] . ")'>Xóa</a>
              </td>";
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
