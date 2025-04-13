<?php
session_start();

if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
    echo "<p>Giỏ hàng đang trống. <a href='index.php'>Mua sắm ngay</a></p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="css/giohang.css">
    <style>
        .checkout-form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background: #fefefe;
        }

        .checkout-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .checkout-form input, .checkout-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .checkout-form button {
            background-color: #27ae60;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            float: right;
        }

        .checkout-summary table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .checkout-summary th, .checkout-summary td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .checkout-summary th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<div class="checkout-form">
    <h2>Thông tin thanh toán</h2>
    <form method="post" action="../model/mThanhToan.php">
        <input type="text" name="tenkhach" placeholder="Họ tên người nhận" required>
        <input type="text" name="sdt" placeholder="Số điện thoại" required>
        <textarea name="diachi" placeholder="Địa chỉ giao hàng" rows="3" required></textarea>

        <div class="checkout-summary">
            <h3>Đơn hàng của bạn:</h3>
            <table>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php
                $tong = 0;
                foreach ($_SESSION["cart"] as $id => $sp) {
                    $thanhtien = $sp["price"] * $sp["quantity"];
                    $tong += $thanhtien;
                    echo "<tr>";
                    echo "<td>{$sp["name"]}</td>";
                    echo "<td>" . number_format($sp["price"]) . "đ</td>";
                    echo "<td>{$sp["quantity"]}</td>";
                    echo "<td>" . number_format($thanhtien) . "đ</td>";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td colspan="3" style="text-align: right;"><strong>Tổng cộng:</strong></td>
                    <td><strong><?= number_format($tong) ?>đ</strong></td>
                </tr>
            </table>
        </div>

        <button type="submit" name="xacnhan">Xác nhận đặt hàng</button>
    </form>
</div>

</body>
</html>
