<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Thuê & Trả Băng Đĩa</title>
    <link rel="stylesheet" href="../css/rental_style.css">
</head>
<body>
    <div class="container">
        <h2>Quản lý Thuê & Trả Băng Đĩa</h2>
        
        <a href="add_rent.php" class="btn">Thêm băng đĩa</a>
        <button onclick="window.location.href='return_rent.php'">Trả băng đĩa</button>

        <table>
            <thead>
                <tr>
                    <th>Mã giao dịch</th>
                    <th>Khách hàng</th>
                    <th>Băng đĩa</th>
                    <th>Ngày thuê</th>
                    <th>Ngày trả</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db_connect.php';
                session_start();
                $sql = "SELECT * FROM rentals";
                $result = $conn->query($sql);
                
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['rental_id']}</td>
                        <td>{$row['customer_id']}</td>
                        <td>{$row['disc_id']}</td>
                        <td>{$row['rental_date']}</td>
                        <td>{$row['return_date']}</td>
                        <td>".($row['status'] == 1 ? 'Đã trả' : 'Chưa trả')."</td>
                        <td>
                            <a href='return_rent.php?id={$row['rental_id']}'>Trả</a> | 
                            <a href='delete_rent.php?id={$row['rental_id']}'>Xóa</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>