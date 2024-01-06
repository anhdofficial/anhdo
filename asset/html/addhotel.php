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

    <h2>Thêm Khách sạn</h2>

    <form action="" method="post">
        <label for="ten">Tên Khách Sạn:</label>
        <input type="text" name="ten" required><br>

        <label for="sosao">Số Sao:</label>
        <input type="number" name="sosao" required><br>

        <label for="giagoc">Giá Gốc:</label>
        <input type="number" name="giagoc" required><br>

        <label for="diachi">Địa Chỉ:</label>
        <input type="text" name="diachi" required><br>

        <label for="khuyenmai">Khuyến Mãi:</label>
        <input type="number" name="khuyenmai" required><br>
  
        <label for="thongtin">Thông Tin:</label>
        <textarea name="thongtin" required></textarea><br>

        <label for="note">Ghi Chú:</label>
        <textarea name="note" required></textarea><br>

        <label for="image_url">URL Ảnh:</label>
        <input type="text" name="image_url" required><br>

        <input type="submit" value="Add Hotel">
    </form>
    <?php
    include 'connect_db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ten = mysqli_real_escape_string($conn, $_POST['ten']);
        $sosao = (int)$_POST['sosao'];
        $giagoc = (int)$_POST['giagoc'];
        $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
        $diachi = mysqli_real_escape_string($conn, $_POST['diachi']);
        $khuyenmai = (int)$_POST['khuyenmai'];
        $thongtin = mysqli_real_escape_string($conn, $_POST['thongtin']);
        $note = mysqli_real_escape_string($conn, $_POST['note']);

        $query = "INSERT INTO hotels (ten, sosao, giagoc, image_url, diachi, khuyenmai, thongtin, note) 
              VALUES ('$ten', $sosao, $giagoc, '$image_url', '$diachi', $khuyenmai, '$thongtin', '$note')";

        if (mysqli_query($conn, $query)) {
            echo "Thêm khách sạn thành công!";
            echo "<script>
            setTimeout(function() {
                window.location.href = 'managerhotel.php';
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