<?php
include 'connect_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $hoaDonId = $_GET['id'];

    $maSanPham = mysqli_real_escape_string($conn, $_POST['ma_san_pham']);
    $tenSanPham = mysqli_real_escape_string($conn, $_POST['ten_san_pham']);
    $hoTen = mysqli_real_escape_string($conn, $_POST['ho_ten']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $soDienThoai = mysqli_real_escape_string($conn, $_POST['so_dien_thoai']);
    $diaChi = mysqli_real_escape_string($conn, $_POST['dia_chi']);
    $phuongThucThanhToan = mysqli_real_escape_string($conn, $_POST['phuong_thuc_thanh_toan']);
    $ngayTao = $_POST['ngay_tao']; // Cần kiểm tra định dạng ngày để tránh lỗ hổng bảo mật
    $tinhTrang = mysqli_real_escape_string($conn, $_POST['tinh_trang']);

    $query = "UPDATE hoadon 
              SET ma_san_pham='$maSanPham', 
                  ten_san_pham='$tenSanPham', 
                  ho_ten='$hoTen', 
                  email='$email', 
                  so_dien_thoai='$soDienThoai', 
                  dia_chi='$diaChi', 
                  phuong_thuc_thanh_toan='$phuongThucThanhToan', 
                  ngay_tao='$ngayTao', 
                  tinh_trang='$tinhTrang' 
              WHERE id=$hoaDonId";

    if (mysqli_query($conn, $query)) {
        echo "Sửa thông tin hóa đơn thành công!";
        echo "<script>
        setTimeout(function() {
            window.location.href = 'managerbill.php';
        }, 1000);
    </script>";
        die();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} elseif (isset($_GET['id'])) {
    $hoaDonId = $_GET['id'];

    $query = "SELECT * FROM hoadon WHERE id = $hoaDonId";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="styles.css">
            <title>Edit Tour</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }

                h2 {
                    text-align: center;
                    color: #333;
                }

                form {
                    max-width: 400px;
                    margin: 20px auto;
                    padding: 20px;
                    background-color: #f4f4f4;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                label {
                    display: block;
                    margin-bottom: 8px;
                    font-weight: bold;
                }

                input {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 16px;
                    box-sizing: border-box;
                }

                input[type="submit"] {
                    background-color: #4caf50;
                    color: white;
                    cursor: pointer;
                }

                input[type="submit"]:hover {
                    background-color: #45a049;
                }

                .success-message {
                    color: #4caf50;
                    text-align: center;
                    margin-top: 20px;
                }

                .error-message {
                    color: #ff0000;
                    text-align: center;
                    margin-top: 20px;
                }
            </style>
        </head>

        <body>
            <h2>Chỉnh sửa bill</h2>


            <form action="" method="post">
                <label for="ma_san_pham">Mã Sản Phẩm:</label>
                <input type="text" name="ma_san_pham" value="<?php echo $row['ma_san_pham']; ?>" required><br>

                <label for="ten_san_pham">Tên Sản Phẩm:</label>
                <input type="text" name="ten_san_pham" value="<?php echo $row['ten_san_pham']; ?>" required><br>

                <label for="ho_ten">Họ Tên:</label>
                <input type="text" name="ho_ten" value="<?php echo $row['ho_ten']; ?>" required><br>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>

                <label for="so_dien_thoai">Số Điện Thoại:</label>
                <input type="text" name="so_dien_thoai" value="<?php echo $row['so_dien_thoai']; ?>" required><br>

                <label for="dia_chi">Địa Chỉ:</label>
                <input type="text" name="dia_chi" value="<?php echo $row['dia_chi']; ?>" required><br>

                <label for="phuong_thuc_thanh_toan">Phương Thức Thanh Toán:</label>
                <input type="text" name="phuong_thuc_thanh_toan" value="<?php echo $row['phuong_thuc_thanh_toan']; ?>" required><br>

                <label for="ngay_tao">Ngày Tạo:</label>
                <input type="text" name="ngay_tao" value="<?php echo $row['ngay_tao']; ?>" required><br>

                <label for="tinh_trang">Tình Trạng:</label>
                <select name="tinh_trang" required>
                    <option value="Đã Duyệt" <?php echo ($row['tinh_trang'] == 'Đã Duyệt') ? 'selected' : ''; ?>>Đã Duyệt</option>
                    <option value="Chưa Duyệt" <?php echo ($row['tinh_trang'] == 'Chưa Duyệt') ? 'selected' : ''; ?>>Chưa Duyệt</option>
                </select><br>

                <input type="submit" value="Cập Nhật">
            </form>
        </body>

        </html>
<?php
    } else {
        echo "Không tìm thấy thông tin bill.";
    }

    mysqli_close($conn);
} else {
    echo "Không có thông tin bill.";
}
?>