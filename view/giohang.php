<?php
session_start();
?>

<h2>Giỏ hàng của bạn</h2>
<?php
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<p>Giỏ hàng đang trống.</p>";
} else {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xóa</th>
        </tr>";
    $tong = 0;
    foreach ($_SESSION['cart'] as $id => $item) {
        $thanhtien = $item['price'] * $item['quantity'];
        $tong += $thanhtien;
        echo "<tr>
                <td>{$item['name']}</td>
                <td>".number_format($item['price'])."đ</td>
                <td>{$item['quantity']}</td>
                <td>".number_format($thanhtien)."đ</td>
                <td><a href='giohang.php?remove=$id'>Xóa</a></td>
            </tr>";
    }
    echo "<tr><td colspan='3'><b>Tổng cộng</b></td><td colspan='2'><b>".number_format($tong)."đ</b></td></tr>";
    echo "</table>";
    echo "<br><a href='dathang.php'>Tiến hành đặt hàng</a>";
}

// Xử lý xóa sản phẩm
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
    header("Location: giohang.php");
    exit();
}
?>