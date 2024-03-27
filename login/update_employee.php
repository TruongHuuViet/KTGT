<?php
    include "connect.php";

    if(isset($_POST['employee_id'])) {
        $employee_id = $_POST['employee_id'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];

        $sql = "UPDATE nhanvien SET TenNV='$name', Phai='$gender', NgaySinh='$dob' WHERE MaNV='$employee_id'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "Thông tin nhân viên đã được cập nhật thành công.";
        } else {
            echo "Có lỗi xảy ra khi cập nhật thông tin nhân viên: " . mysqli_error($conn);
        }
    } else {
        echo "Dữ liệu không hợp lệ.";
    }

    // Đóng kết nối
    mysqli_close($conn);
?>
