<?php
include("controller/cProduct.php");
$p = new CProduct();

// Kiểm tra nếu có ID sản phẩm cần chỉnh sửa
if (isset($_GET['edit'])) {
    $product_id = $_GET['edit'];
    $product = $p->getProductById($product_id);
    if (!$product) {
        echo "<script>alert('Sản phẩm không tồn tại!'); window.location.href='quanlysp.php';</script>";
        exit;
    }
}

// Xử lý cập nhật sản phẩm
if (isset($_POST['btnupdate'])) {
    $TenSP = $_POST['txtten'];
    $DonGia = $_POST['txtgia'];
    $SoLuong = $_POST['txtsl'];
    $MoTa = $_POST['txtmota'];
    $MaLSP = $_POST['txtdm'];
    $HinhAnh = $product['image_url']; // Mặc định giữ ảnh cũ

    // Kiểm tra nếu có tải lên ảnh mới
    if (!empty($_FILES['file']['name'])) {
        $HinhAnh = $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], "img/" . $HinhAnh);
    }

    // Cập nhật sản phẩm
    if ($p->updateProduct($product_id, $TenSP, $DonGia, $SoLuong, $MoTa, $MaLSP, $HinhAnh)) {
        echo "<script>alert('Cập nhật thành công!'); window.location.href='quanlysp.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi cập nhật sản phẩm!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Chỉnh sửa sản phẩm</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="txtten" value="<?php echo $product['product_name']; ?>" required></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="number" name="txtgia" value="<?php echo $product['price']; ?>" required></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="number" name="txtsl" value="<?php echo $product['stock']; ?>" required></td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td><textarea name="txtmota" required><?php echo $product['description']; ?></textarea></td>
        </tr>
        <tr>
            <td>Danh mục</td>
            <td><?php include("view/QuanLy/addsp.php"); ?></td>
        </tr>
        <tr>
            <td>Ảnh hiện tại</td>
            <td>
                <img src="img/<?php echo $product['image_url']; ?>" width="100px" alt="">
            </td>
        </tr>
        <tr>
            <td>Ảnh mới (nếu có)</td>
            <td><input type="file" name="file"></td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="btnupdate">Lưu thay đổi</button>
                <a href="quanlysp.php">Hủy</a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>