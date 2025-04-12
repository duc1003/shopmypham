<?php
    include("controller/cProduct.php");
    $p = new CProduct();
    $tbl = $p->getAllProduct();
    $trang = 5;// số trang
    $tong = $tbl->num_rows;// tổng số sp
    $tongtrang = ceil($tong / $trang);//tính tổng số trang

    $tranghientai = isset($_GET['page']) ? $_GET['page'] : 1;//xác định trang hiện tại

    // Đảm bảo trang hiện tại không vượt quá số trang tối đa
    if ($tranghientai > $tongtrang || $tranghientai < 1) {
        $tranghientai = 1;
    }

    // Tính offset
    $offset = ($tranghientai - 1) * $trang;
    echo "<table class='tb'>";
    echo "<thead>";
    echo "<th>ID</th>";
    echo "<th>Product Name</th>";
    echo "<th>Image</th>";
    echo "<th>Price</th>";
    echo "<th>Action</th>";
    echo "</thead>";

    // Di chuyển con trỏ về vị trí đầu tiên của kết quả
    $tbl->data_seek($offset);
    //hiển thị
    for ($i = 0; $i < $trang; $i++) {
        if ($row = $tbl->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["product_id"] . "</td>";
            echo "<td>" . $row["product_name"] . "</td>";
            echo "<td><img src='img/" . $row["image_url"] . "' width='70px' alt=''></td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>
                <a href='edit_product.php?id=" . $row["product_id"] . "'>Sửa</a> |
                <a href='delete_product.php?id=" . $row["product_id"] . "' onclick='return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');'>Xóa</a>
            </td>";
            echo "</tr>";
        }
    }
    echo "</table>";

    echo "<div>";
    for ($i = 1; $i <= $tongtrang; $i++) {
        if ($i == $tranghientai) {
            echo "<strong>$i</strong> ";
        } else {
            echo "<a href='?page=$i'>| $i</a> ";
        }
    }
    echo "</div>";
?>