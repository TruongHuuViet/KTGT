<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f9f9f9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .gender-column {
            text-align: center;
        }

        .gender-image {
            max-width: 50px;
            max-height: 50px;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            margin: 0 5px;
            padding: 5px 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            text-decoration: none;
            color: #333;
        }

        .pagination a.active {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container"> 
        <h1>THÔNG TIN NHÂN VIÊN</h1>
            <td class="action-buttons">
                <a href="add.php">Thêm</a>
            </td>

        <table>
            <thead>
                <tr>
                    <th>Mã Nhân Viên</th>
                    <th>Tên Nhân Viên</th>
                    <th>Phái</th>
                    <th>Nơi Sinh</th>
                    <th>Mã Phòng</th>
                    <th>Lương</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    include "connect.php";

                    $limit = 5; 
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $limit;
                    $sql = "SELECT * FROM nhanvien LIMIT $start, $limit";
                    $result = mysqli_query($conn, $sql);

                    while($row  = mysqli_fetch_array($result)){
                ?>
                <tr>    
                    <td><?php echo $row['MaNV'] ?></td>
                    <td><?php echo $row['TenNV'] ?></td> 
                    <td class="gender-column"> 
                        <?php 
                            // Xác định hình ảnh dựa trên giới tính
                            $gender = $row['Phai'];
                            if ($gender === 'NU') {
                                $imagePath = 'img/women.jpg';
                            } else {
                                $imagePath = 'img/man.png';
                            }
                            echo '<img class="gender-image" src="' . $imagePath . '" alt="Phái">';
                        ?> 
                    </td> 
                    <td><?php echo $row['NoiSinh'] ?></td>
                    <td><?php echo $row['MaPhong'] ?></td>  
                    <td><?php echo $row['Luong'] ?></td>
                    <td class="action-buttons">
                        <a href="edit_employee.php=<?php echo $row['MaNV']; ?>">Sửa</a>
                        <a href="delete.php?MaNV=<?php echo $row['MaNV']; ?>">Xóa</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="pagination"> 
        <?php
    
        $sql_count = "SELECT COUNT(*) AS total FROM nhanvien";
        $result_count = mysqli_query($conn, $sql_count);
        $row_count = mysqli_fetch_assoc($result_count);
        $total_pages = ceil($row_count["total"] / $limit);

        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?page=" . $i . "'";
            if ($page == $i) {
                echo " class='active'";
            }
            echo ">" . $i . "</a>";
        }
        ?>
    </div>

</body>
</html>
