<?php
include 'connect_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $tour_id = $_GET['id'];

    $ten = mysqli_real_escape_string($conn, $_POST['ten']);
    $diemxuatphat = mysqli_real_escape_string($conn, $_POST['diemxuatphat']);
    $thoigian = mysqli_real_escape_string($conn, $_POST['thoigian']);
    $phuongtien = mysqli_real_escape_string($conn, $_POST['phuongtien']);
    $khuyenmai = (int)$_POST['khuyenmai'];
    $giagoc = (int)$_POST['giagoc'];
    $khoihanh = mysqli_real_escape_string($conn, $_POST['khoihanh']);
    $thongtin = mysqli_real_escape_string($conn, $_POST['thongtin']);
    $ghichu = mysqli_real_escape_string($conn, $_POST['ghichu']);
    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);

    $query = "UPDATE tours SET ten='$ten', diemxuatphat='$diemxuatphat', thoigian='$thoigian', phuongtien='$phuongtien', khuyenmai=$khuyenmai, giagoc=$giagoc, khoihanh='$khoihanh', thongtin='$thongtin', ghichu='$ghichu', image_url='$image_url' WHERE id=$tour_id";

    if (mysqli_query($conn, $query)) {
        echo "Sửa tour thành công!";
        echo "<script>
            setTimeout(function() {
                window.location.href = 'managertour.php';
            }, 1000);
        </script>";
        die();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

// Nếu không có id hoặc không phải là POST request, hiển thị form chỉnh sửa
if (isset($_GET['id'])) {
    $tour_id = $_GET['id'];

    $query = "SELECT * FROM tours WHERE id = $tour_id";
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
            <h2>Chỉnh sửa tour</h2>


            <form action="" method="post">
                <label for="ten">Tên Tour:</label>
                <input type="text" name="ten" value="<?php echo $row['ten']; ?>" required><br>

                <label for="diemxuatphat">Điểm Xuất Phát:</label>
                <input type="text" name="diemxuatphat" value="<?php echo $row['diemxuatphat']; ?>" required><br>

                <label for="thoigian">Thời Gian:</label>
                <input type="text" name="thoigian" value="<?php echo $row['thoigian']; ?>" required><br>

                <label for="phuongtien">Phương Tiện:</label>
                <input type="text" name="phuongtien" value="<?php echo $row['phuongtien']; ?>" required><br>

                <label for="khuyenmai">Khuyến Mãi:</label>
                <input type="text" name="khuyenmai" value="<?php echo $row['khuyenmai']; ?>"><br>

                <label for="giagoc">Giá Gốc:</label>
                <input type="text" name="giagoc" value="<?php echo $row['giagoc']; ?>" required><br>

                <label for="khoihanh">Khởi Hành:</label>
                <input type="text" name="khoihanh" value="<?php echo $row['khoihanh']; ?>" required><br>

                <label for="thongtin">Thông Tin:</label>
                <textarea name="thongtin" required><?php echo $row['thongtin']; ?></textarea><br>

                <label for="ghichu">Ghi Chú:</label>
                <textarea name="ghichu" required><?php echo $row['ghichu']; ?></textarea><br>

                <label for="image_url">URL Ảnh:</label>
                <input type="text" name="image_url" value="<?php echo $row['image_url']; ?>" required><br>

                <input type="submit" value="Cập Nhật">
            </form>
        </body>

        </html>
<?php
    } else {
        echo "Không tìm thấy thông tin tour.";
    }

    mysqli_close($conn);
} else {
    echo "Không có thông tin tour.";
}
?>