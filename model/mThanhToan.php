<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["xacnhan"])) {
    $ten = trim($_POST["tenkhach"] ?? '');
    $sdt = trim($_POST["sdt"] ?? '');
    $diachi = trim($_POST["diachi"] ?? '');

    $pattern_sdt = "/^(03|05|07|08|09)\d{8}$/";

    if (!preg_match($pattern_sdt, $sdt)) {
        echo "<p style='color:red; text-align:center;'>⚠️ Số điện thoại không hợp lệ. Vui lòng nhập lại.</p>";
        echo "<p style='text-align:center;'><a href='../view/thanhtoan.php'>Quay lại trang thanh toán</a></p>";
        exit();
}


    if (empty($_SESSION["cart"])) {
        echo "<p>Giỏ hàng đang trống. <a href='../index.php'>Quay lại mua sắm</a></p>";
        exit();
    }

    $tong = 0;
    $donhang_html = "";

    foreach ($_SESSION["cart"] as $sp) {
        $thanhtien = $sp["price"] * $sp["quantity"];
        $tong += $thanhtien;

        $donhang_html .= "
            <tr>
                <td>{$sp["name"]}</td>
                <td>" . number_format($sp["price"]) . "đ</td>
                <td>{$sp["quantity"]}</td>
                <td>" . number_format($thanhtien) . "đ</td>
            </tr>
        ";
    }

    // Tuỳ chọn: xoá giỏ hàng sau khi đặt hàng
    unset($_SESSION["cart"]);
} else {
    header("Location: ../view/thanhtoan.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
    <link rel="stylesheet" href="../css/giohang.css">
    <style>
        .success-box {
            max-width: 700px;
            margin: 30px auto;
            padding: 25px;
            border: 1px solid #28a745;
            background: #e8f5e9;
            border-radius: 10px;
        }

        .success-box h2 {
            color: #28a745;
            text-align: center;
        }

        .success-box p {
            font-size: 17px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        table th {
            background-color: #f4f4f4;
        }

        .continue {
            display: inline-block;
            margin-top: 20px;
            background: #28a745;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            float: right;
        }

        .continue:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="success-box">
    <h2>✅ Đặt hàng thành công!</h2>
    <p><strong>Họ tên người nhận:</strong> <?= htmlspecialchars($ten) ?></p>
    <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($sdt) ?></p>
    <p><strong>Địa chỉ giao hàng:</strong> <?= htmlspecialchars($diachi) ?></p>

    <h3>Chi tiết đơn hàng:</h3>
    <table>
        <tr>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        <?= $donhang_html ?>
        <tr>
            <td colspan="3" style="text-align: right;"><strong>Tổng cộng:</strong></td>
            <td><strong><?= number_format($tong) ?>đ</strong></td>
        </tr>
    </table>

    <a class="continue" href="../index.php">Tiếp tục mua sắm</a>
</div>

</body>
</html>
