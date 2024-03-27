<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
    <?php
        include "connect.php";

        if(isset($_GET['id'])) {
            $employee_id = $_GET['id'];

            $sql = "SELECT * FROM nhanvien WHERE MaNV='$employee_id'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                $employee = mysqli_fetch_assoc($result);
            } else {
                echo "Không tìm thấy nhân viên.";
                exit();
            }
        } else {
            echo "Không có ID nhân viên được cung cấp.";
            exit();
        }
    ?>

    <h2>Edit Employee Information</h2>
    <form action="update_employee.php" method="POST">
        <input type="hidden" name="employee_id" value="<?php echo $employee['MaNV']; ?>">
        <label for="name">Employee Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $employee['TenNV']; ?>"><br><br>
        <label for="gender">Gender:</label>
        <input type="text" name="gender" id="gender" value="<?php echo $employee['Phai']; ?>"><br><br>
        <label for="dob">Date of Birth:</label>
        <input type="text" name="dob" id="dob" value="<?php echo $employee['NgaySinh']; ?>"><br><br>
        <input type="submit" value="Save Changes">
    </form>
</body>
</html>
