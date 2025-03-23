<?php
include("controller/cCompany.php");
$p = new CCompany();

// Kiểm tra nếu có ID sản phẩm cần chỉnh sửa
if (isset($_GET['editComp'])) {
    $company_id = $_GET['editComp'];
    $company = $p->getCompanyById($company_id);
    if (!$company) {
        echo "<script>alert('Sản phẩm không tồn tại!'); window.location.href='quanlyCty.php';</script>";
        exit;
    }
}

// Xử lý cập nhật sản phẩm
if (isset($_POST['btnupdate'])) {
    $TenCty = $_POST['compName'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    // Cập nhật sản phẩm
    if ($p->updateCompany($company_id, $TenCty, $address, $email)) {
        echo "<script>alert('Cập nhật thành công!'); window.location.href='quanlycty.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi cập nhật công ty!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa công ty</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Chỉnh sửa công ty</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Tên công ty</td>
            <td><input type="text" name="compName" value="<?php echo $company['name']; ?>" required></td>
        </tr>
        <tr>
            <td>address</td>
            <td><input type="text" name="address" value="<?php echo $company['address']; ?>" required></td>
        </tr>
        <tr>
            <td>email</td>
            <td><input type="email" name="email" required value="<?php echo $company['email']; ?>"></td>
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