<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Add New Tour</title>
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

    <h2>Thêm Tour Du Lịch</h2>

    <form action="" method="post">
        <label for="ten">Tên Tour:</label>
        <input type="text" name="ten" required><br>

        <label for="diemxuatphat">Điểm Xuất Phát:</label>
        <input type="text" name="diemxuatphat" required><br>

        <label for="thoigian">Thời Gian:</label>
        <input type="text" name="thoigian" required><br>

        <label for="phuongtien">Phương Tiện:</label>
        <input type="text" name="phuongtien" required><br>

        <label for="khuyenmai">Khuyến Mãi (%):</label>
        <input type="number" name="khuyenmai" min="0" required><br>

        <label for="giagoc">Giá Gốc:</label>
        <input type="number" name="giagoc" min="0" required><br>

        <label for="khoihanh">Khởi Hành:</label>
        <input type="text" name="khoihanh" required><br>

        <label for="thongtin">Thông Tin:</label>
        <textarea name="thongtin" rows="4" required></textarea><br>

        <label for="ghichu">Ghi Chú:</label>
        <textarea name="ghichu" rows="2" required></textarea><br>

        <label for="image_url">URL Ảnh:</label>
        <input type="text" name="image_url" required><br>

        <input type="submit" value="Add">
    </form>
    <?php
    include 'connect_db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
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

        // Thực hiện truy vấn thêm
        $query = "INSERT INTO tours (ten, diemxuatphat, thoigian, phuongtien, khuyenmai, giagoc, khoihanh, thongtin, ghichu, image_url) 
              VALUES ('$ten', '$diemxuatphat', '$thoigian', '$phuongtien', $khuyenmai, $giagoc, '$khoihanh', '$thongtin', '$ghichu', '$image_url')";

        if (mysqli_query($conn, $query)) {
            echo "Thêm tour thành công!";
            echo "<script>
            setTimeout(function() {
                window.location.href = 'managertour.php';
            }, 1000);
        </script>";
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>


</body>

</html>