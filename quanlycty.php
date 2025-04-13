<?php
// error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quanlycongty</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header> 
    <div class="box-header">
    <a href="index.php"><img src="img/logo-my-pham-11.jpg" alt="" style=" width: 200px, height: 100px"></a>
    <h1 style="color: #044115"> Shop Mỹ Phẩm </h1>
    </div>


</header>
<nav>
        <a href="view/dangxuat.php">Đăng xuất</a>
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
            <br>
            <div> 
                <a href="quanlycty.php">Quản lý công ty</a>
            </div>
            <br>
            <div>
                <a href="quanlysp.php">Quản lý sản phẩm</a>
            </div>
            </div>
        </div>

        <div class="sec ">
            <h2>Quản lý công ty</h2>
            <a href="addcty.php">Thêm danh mục</a>
            <br>
            <br>
            <?php 

                if(isset($_GET['editComp'])){
                    include_once("editCty.php");
                } else
                    include_once("view/QuanLy/quanlyCty.php");
            ?>
        </div>
    </div>
    <footer style="background-color: #f8fff5"></footer>
</body>
</html>