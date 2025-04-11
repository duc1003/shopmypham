<?php
// Kiểm tra session đã khởi động chưa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Bao gồm file Controller nếu chưa được nạp
$controller_path = __DIR__ . "/../Controller/cNguoiDung.php";
if (file_exists($controller_path)) {
    require_once($controller_path); // dùng require_once để tránh khai báo class trùng
} else {
    die("Lỗi: Không tìm thấy Controller/cNguoiDung.php");
}

$message = ""; 

if (isset($_POST["submit"])) { 
    $p = new ControlNguoiDung(); 
    $id = $_POST["txtID"];
    $pwd = $_POST["txtPWD"];
    
    $result = $p->cLogin($id, $pwd); 

    if ($result === "Đăng nhập thành công") {
        header("Location: index.php?message=loginsuccess&page=trangchu");
        exit();
    } else {
        $message = "<p style='color: red;'>$result</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../css/dangNhap.css">
</head>
<body>


<form id="form1" name="form1" method="post"  >

<h2 style="text-align: center; margin-top: 20px;">Trang Đăng Nhập</h2>

  
  <table width="442" height="183" ,border="1" ,align="center">
    <tbody>
      <tr>
        <th colspan="2">ĐĂNG NHẬP</th>
      </tr>
      <tr>
        <td width="108">EMAIL:</td>
        <td width="193"><input name="txtID" type="email" id="txtID" size="40" required></td>
      </tr>
      <tr>
        <td>PASSWORD:</td>
        <td><input name="txtPWD" type="password" id="txtPWD" size="40" required></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center">
          <input type="submit" name="submit" id="submit" value="Đăng nhập">
        </td>
      </tr>
    </tbody>
  </table>
  <p style="text-align: center;"><?php echo $message;  ?></p>
  <p style="text-align: center;"><a href="dangky.php">Chưa có tài khoản? Đăng ký ngay!</a></p>
</form>
</body>
</html>
