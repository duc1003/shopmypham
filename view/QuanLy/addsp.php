<?php
    include("controller/cType.php");
    $p = new CType();
    $tbl = $p ->getAllType();

    if(!$tbl){
        echo "Không thể kết nối";
    } elseif($tbl->num_rows == 0) {
        echo "Chưa có dữ liệu";
    } else {
        echo "<select name='txtdm'>";
        while($r = $tbl->fetch_assoc()){
            echo "<option value='" . $r["type_id"] . "'>" . $r["name"] . "</option>";
        }
        echo "</select>";
    }

    
    if(isset($_POST["btnthem"])) {
        $TenSP = $_POST["txtten"];
        $DonGia = $_POST["txtgia"];
        $SoLuong = $_POST["txtsl"];
        $MaLSP = $_POST["txtdm"];
        $HinhAnh = $_FILES["file"]["name"];
        $file_tmp = $_FILES["file"]["tmp_name"];
        $MoTa = $_POST["txtmota"];

        // Kiểm tra định dạng của tệp ảnh
        $file_type = str_replace('.', '', pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
        //pathinfo: lấy thông tin về phần mở rộng của tên tệp được tải lên
        
        //các định dạng cho phép
        $artype = array("jpg", "jpeg", "png");
    
        // Kiểm tra định dạng
        if (!in_array($file_type, $artype)) {
            echo "Chỉ nhận file JPG, JPEG, PNG.";
        } else {
            echo '<script>alert("Thêm sản phẩm thành công");</script>';
            }
    }

?>
