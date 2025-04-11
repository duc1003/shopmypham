<?php
// Chỉ khởi động session nếu chưa khởi động
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Gọi model người dùng
require_once(__DIR__ . "/../model/mNguoiDung.php");

class ModelNguoiDung  {
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
                $_SESSION['message'] = "Sai mật khẩu";
            }
        } else {
            $_SESSION['message'] = "Không tìm thấy người dùng";
        }
    }

    public function cRegis($username, $password, $confirmpass) {
        $p = new ModelNguoiDung();
        $chk = $p->mCheckID($username);

        if ($chk->num_rows > 0) {
            $_SESSION['message'] = "Tài khoản đã tồn tại";
        } else {
            if ($password !== $confirmpass) {
                $_SESSION['message'] = "Mật khẩu không khớp";
            } else {
                $hashedPwd = password_hash($password, PASSWORD_BCRYPT);
                $result = $p->mRegis($username, $hashedPwd);
                if ($result) {
                    $_SESSION['message'] = "Đăng ký thành công";
                    header("Location: index.php?page=dangnhap");
                    exit();
                } else {
                    $_SESSION['message'] = "Lỗi đăng ký";
                }
            }
        }
    }
}
