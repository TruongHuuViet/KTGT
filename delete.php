<?php
    include "connect.php";

    if(isset($_GET['MaNV']) && !empty($_GET['MaNV'])) {
        $maNV = $_GET['MaNV'];

        // Query để xóa nhân viên từ cơ sở dữ liệu
        $sql = "DELETE FROM nhanvien WHERE MaNV='$maNV'";

        if(mysqli_query($conn, $sql)) {
            echo "Xóa nhân viên thành công!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Không tìm thấy mã nhân viên để xóa.";
    }
?>
