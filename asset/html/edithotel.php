<?php
include 'connect_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $hotel_id = $_GET['id'];

    $ten = mysqli_real_escape_string($conn, $_POST['ten']);
    $sosao = (int)$_POST['sosao'];
    $giagoc = (int)$_POST['giagoc'];
    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
    $diachi = mysqli_real_escape_string($conn, $_POST['diachi']);
    $khuyenmai = (int)$_POST['khuyenmai'];
    $thongtin = mysqli_real_escape_string($conn, $_POST['thongtin']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);

    $query = "UPDATE hotels 
              SET ten='$ten', sosao=$sosao, giagoc=$giagoc, image_url='$image_url', diachi='$diachi', khuyenmai=$khuyenmai, thongtin='$thongtin', note='$note'
              WHERE id=$hotel_id";

    if (mysqli_query($conn, $query)) {
        echo "Sửa thông tin khách sạn thành công!";
        echo "<script>
        setTimeout(function() {
            window.location.href = 'manageruser.php';
        }, 1000);
    </script>";
    die();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} elseif (isset($_GET['id'])) {
    $hotel_id = $_GET['id'];

    $query = "SELECT * FROM hotels WHERE id = $hotel_id";
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
                <label for="ten">Tên Khách Sạn:</label>
                <input type="text" name="ten" value="<?php echo $row['ten']; ?>" required><br>

                <label for="sosao">Số Sao:</label>
                <input type="number" name="sosao" value="<?php echo $row['sosao']; ?>" required><br>

                <label for="giagoc">Giá Gốc:</label>
                <input type="number" name="giagoc" value="<?php echo $row['giagoc']; ?>" required><br>

                <label for="diachi">Địa Chỉ:</label>
                <input type="text" name="diachi" value="<?php echo $row['diachi']; ?>" required><br>

                <label for="khuyenmai">Khuyến Mãi:</label>
                <input type="number" name="khuyenmai" value="<?php echo $row['khuyenmai']; ?>" required><br>
         
                <label for="thongtin">Thông Tin:</label>
                <textarea name="thongtin" required><?php echo $row['thongtin']; ?></textarea><br>

                <label for="note">Ghi Chú:</label>
                <textarea name="note" required><?php echo $row['note']; ?></textarea><br>

                <label for="image_url">URL Ảnh:</label>
                <input type="text" name="image_url" value="<?php echo $row['image_url']; ?>" required><br>

                <input type="submit" value="Update Hotel">
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