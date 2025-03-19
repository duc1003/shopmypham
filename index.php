<?php
// error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trangchu</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <a href="index.php"><img src="img/logo-test.png" alt="" style=" width: 200px, height: 100px"></a>
</header>
<nav class="nav-header">
        <a href="index.php">Trang chủ |</a>
        <a href="quanlycty.php">| Quản lý</a>
        <form action="index.php" method="post">
            <div class="search">
                <input type="text"  name="txtsearch" placeholder="Tìm kiếm..." style="background-color: white;">
                
                <button type="submit" name ="btnsearch" value="Search" style="width: 30px; height: 20px; background-color: white;">go</button>
            </div>
        </form>
</nav>
    <div class="container-body">
        
        <div class="menu">
            <div class="menu1">   
            <h3 class ="h3_category">Danh mục</h3>
            <br>
            <?php
                include_once("controller/CType.php");
                $p = new CType();
                $tableComp = $p->getAllType();
                
                if(!$tableComp){
                    echo "Không có sản phẩm";
                }elseif($tableComp == null){
                    echo "Chưa có dữ liệu";
                }else{
                    while ($row=$tableComp->fetch_assoc()){
                        echo "<a href='index.php?type=".$row["type_id"]."'>".$row["name"]."</a><br><br>";
                    }
                }
            ?>
            </div>
        </div>

        <div class="sec">
            <?php 
                include_once("view/SanPham/index.php");
            ?>
        </div>
    </div>
<footer style="background-color: pink "><b></b></footer>
</body>
</html>