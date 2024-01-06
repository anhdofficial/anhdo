<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Add user name</title>
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

    <h2>Add New User</h2>
    <?php
    include 'connect_db.php';

    // Kiểm tra xem có tồn tại tham số 'id' trong URL không
    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];

        // Nếu tồn tại 'id', hiển thị biểu mẫu sửa thông tin người dùng
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
                $roles = mysqli_real_escape_string($conn, $_POST['roles']);

                if (!empty($_POST['password'])) {
                    // Người dùng đã nhập mật khẩu mới, thực hiện mã hóa mật khẩu
                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    // Thực hiện truy vấn cập nhật thông tin người dùng
                    $update_query = "UPDATE user_form SET name='$name', phone='$phone', email='$email', password='$hashed_password', roles='$roles' WHERE id=$user_id";
                } else {
                    // Người dùng không nhập mật khẩu mới, giữ nguyên mật khẩu cũ
                    $update_query = "UPDATE user_form SET name='$name', phone='$phone', email='$email', roles='$roles' WHERE id=$user_id";
                }

                if (mysqli_query($conn, $update_query)) {
                    echo "Cập nhật người dùng thành công!";
                    echo "<script>
        setTimeout(function() {
            window.location.href = 'manageruser.php';
        }, 1000);
    </script>";
                    die();
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            }
    ?>
            <form action="" method="post">
                <!-- Hiển thị các trường cho việc sửa thông tin người dùng -->
                <label for="name">Tài khoản :</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>

                <label for="phone">Số điện thoại :</label>
                <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Nhập mật khẩu mới (để trống nếu giữ nguyên)">

                <label for="roles">Phân quyền:</label>
                <select name="roles" required>
                    <option value="admin" <?php if ($row['roles'] == 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="user" <?php if ($row['roles'] == 'user') echo 'selected'; ?>>User</option>
                </select><br>
                <input type="submit" value="Update">
            </form>

    <?php
        } else {
            echo "Không tìm thấy thông tin người dùng.";
        }
    } else {
        echo "Không có thông tin người dùng.";
    }

    // Đóng kết nối
    $conn->close();
    ?>


</body>

</html>