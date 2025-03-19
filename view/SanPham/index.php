<?php
    include("controller/cProduct.php");
    $p = new CProduct();
    if(isset($_GET["type"])){
        $tbl = $p->getAllProductByType($_GET["type"]);
    }elseif(isset($_POST["btnsearch"])){
        $tbl = $p->getAllProductByName($_POST["txtsearch"]);
    }
    else{
        $tbl = $p ->getAllProduct();
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
            echo "<img src='img/".$r["image_url"]."' width = '100px' alt =''>"."<br>";
            echo $r["name"]."<br>";
            echo $r["price"];
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