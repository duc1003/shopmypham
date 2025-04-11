<?php
include_once(__DIR__ . "/../model/mNguoiDung.php");

class ControlNguoiDung {
    

    public function cLogin($username, $password) {
        $p = new ModelNguoiDung();
        $result = $p->mLogin($username);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['Password'])) {
                $_SESSION['message'] = "Đăng nhập thành công";
                header("Location: index.php?action=view/vProduct");
                exit();
            } else {
                echo 'Sai mật khẩu';
            }
        } else {
            echo 'Không tìm thấy người dùng';
        }
    }
	 public function cRegis($username, $password, $confirmpass) {
        $p = new ModelNguoiDung();
        $chk = $p->mCheckID($username);

        
        if ($chk->num_rows > 0) {
            echo 'Tài khoản đã tồn tại';
        } else {
            if ($password !== $confirmpass) {
                echo 'Mật khẩu không khớp';
            }else{
                $hashedPwd = password_hash($password, PASSWORD_BCRYPT);
                $result = $p->mRegis($username, $hashedPwd);
                if ($result) {
                    header("Location: index.php?page=dangnhap");
                    echo 'Đăng ký thành công';
                } else {
                    echo 'Lỗi đăng ký';
                }
            }
            
        }
	 }
}
?>
