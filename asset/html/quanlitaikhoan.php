<?php
session_start();

include 'connect_db.php'; // Kết nối đến CSDL

$user_id = $_SESSION['user_id'];

// Lấy thông tin người dùng từ CSDL
$query = "SELECT * FROM user_form WHERE id = $user_id";
$result = $conn->query($query);

if ($row = $result->fetch_assoc()) {
    // Kiểm tra xem biểu mẫu đã được gửi chưa
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (!empty($_POST['password'])) {
            // Người dùng đã nhập mật khẩu mới, thực hiện mã hóa mật khẩu
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            // Thực hiện truy vấn cập nhật thông tin người dùng
            $update_query = "UPDATE User_form SET name='$name', phone='$phone', email='$email', password='$hashed_password', roles='$roles' WHERE id=$user_id";
        } else {
            // Người dùng không nhập mật khẩu mới, giữ nguyên mật khẩu cũ
            $update_query = "UPDATE User_form SET name='$name', phone='$phone', email='$email', roles='$roles' WHERE id=$user_id";
        }

        if (mysqli_query($conn, $update_query)) {
            echo "Cập nhật người dùng thành công!";
            header('location: index.php'); 
            die();
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Sửa thông tin người dùng</title>
        <!-- Thêm các đoạn mã CSS của bạn nếu cần -->
    </head>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            background-color: #f4f4f4;
            background-image: url('../img/bannerquanli.jpg');
            
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 30px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
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

    <body>

        <h2>Sửa thông tin người dùng</h2>

        <form action="" method="post">
            <!-- Hiển thị các trường cho việc sửa thông tin người dùng -->
            <label for="name">Tên:</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>

            <label for="phone">Số điện thoại:</label>
            <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Nhập mật khẩu mới (để trống nếu giữ nguyên)">

            <input type="submit" value="Cập nhật">
        </form>

    </body>

    </html>

<?php
} else {
    echo "Không tìm thấy thông tin người dùng.";
}

// Đóng kết nối
$conn->close();
?>