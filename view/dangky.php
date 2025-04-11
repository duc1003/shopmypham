<?php
if(isset($_POST['nut'])){
	include_once(__DIR__ . "/../controller/cNguoiDung.php");

	$p = new ControlNguoiDung();
	$username = $_POST['txtID'];
	$password = $_POST['txtPWD'];
  $confirmpass = $_POST['cpassword'];
	$p->cRegis($username, $password,   $confirmpass);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../css/dangKy.css">
</head>
<body style="text-align: left">

<form action="#" method="post" >
  <h2 style=" text-align: center; margin-top: 20px;">Trang Đăng Ký</h2>

  <table width="434" height="185" ,border="1" ,align="center">
    <tbody>
      <tr>
        <th colspan="2" scope="col" style="text-align: center;">ĐĂNG KÝ</th>
      </tr>
      <tr>
        <td width="142">EMAIL:</td>
        <td width="271" style="text-align: center"><input name="txtID" type="email" id="txtID" size="40"></td>
      </tr>
      <tr>
        <td>PASSWORD:</td>
        <td style="text-align: center"><input name="txtPWD" type="password" id="txtPWD" size="40"></td>
      </tr>
      <tr>
        <td><span style="text-align: center"></span>CONFIRM PASSWORD :</td>
        <td style="text-align: center"><input name="cpassword" type="password" id="cpassword" size="40"></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center"><input type="submit" name="nut" id="nut" value="Đăng ký"></td>
      </tr>
    </tbody>
  </table>
  <p> <span style="text-align: left"><a href="dangnhap.php"></a></span></p>
</form>

</body>
</html>
