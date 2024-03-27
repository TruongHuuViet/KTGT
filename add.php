<?php
    include "connect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $maNV = $_POST['maNV'];
        $tenNV = $_POST['tenNV'];
        $phai = $_POST['phai'];
        $noiSinh = $_POST['noiSinh'];
        $maPhong = $_POST['maPhong'];
        $luong = $_POST['luong'];

        $sql = "INSERT INTO nhanvien (MaNV, TenNV, Phai, NoiSinh, MaPhong, Luong)
                VALUES ('$maNV', '$tenNV', '$phai', '$noiSinh', '$maPhong', '$luong')";

        if (mysqli_query($conn, $sql)) {
            echo "Thêm nhân viên thành công!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thêm Nhân Viên</title>
</head>
<body>
    <h2>Thêm Nhân Viên</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="maNV">Mã Nhân Viên:</label>
        <input type="text" name="maNV" id="maNV"><br><br>

        <label for="tenNV">Tên Nhân Viên:</label>
        <input type="text" name="tenNV" id="tenNV"><br><br>

        <label for="phai">Phái:</label>
        <input type="text" name="phai" id="phai"><br><br>

        <label for="noiSinh">Nơi Sinh:</label>
        <input type="text" name="noiSinh" id="noiSinh"><br><br>

        <label for="maPhong">Mã Phòng:</label>
        <input type="text" name="maPhong" id="maPhong"><br><br>

        <label for="luong">Lương:</label>
        <input type="text" name="luong" id="luong"><br><br>

        <input type="submit" value="Submit">

        <td class="action-buttons">
                <a href="index.php">Trở về trang chủ</a>
            </td>
    </form>
</body>
</html>
