<?php
    include("controller/cSanPham.php");
    $p = new CSanPham();
    if(isset($_GET["Comp"])){
        $tbl = $p->getAllSPbyCompany($_GET["Comp"]);
    }elseif(isset($_POST["btnsearch"])){
        $tbl = $p->getAllSPbyName($_POST["txtsearch"]);
    }
    else{
        $tbl = $p ->getAllSP();
    }
    if(!$tbl){
        echo "Không có sản phẩm";
    }elseif($tbl == null){
        echo "Chưa có dữ liệu";
    }else{
        $dem = 0;
        echo "<table >";
        echo "<tr>";
        while($r=$tbl->fetch_assoc()){
            echo "<td>";
            echo "<img src='img/".$r["HinhAnh"]."' width = '100px' alt =''>"."<br>";
            echo $r["TenSP"]."<br>";
            echo $r["DonGia"];
            echo "</td>";
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