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

    <form action="" method="post">
        <label for="name">Tài khoản :</label>
        <input type="text" name="name" required><br>

        <label for="phone">Số điện thoại :</label>
        <input type="text" name="phone" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="roles">Phân quyền :</label>
        <select name="roles" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br>

        <input type="submit" value="Add">
    </form>

    <?php
    include 'connect_db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']); // Lưu ý: không mã hóa ở đây
        $roles = mysqli_real_escape_string($conn, $_POST['roles']);

        // Mã hóa mật khẩu
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Thực hiện truy vấn để thêm người dùng vào CSDL với mật khẩu đã mã hóa
        $query = "INSERT INTO user_form (name, phone, email, password, roles) VALUES ('$name', '$phone', '$email', '$hashed_password', '$roles')";

        if (mysqli_query($conn, $query)) {
            echo "Thêm người dùng thành công!";
            header("refresh:1;url=manageruser.php");
            die(); // Dừng script để đảm bảo không có mã HTML hoặc mã PHP tiếp theo được thực thi
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }

        // Đóng kết nối CSDL
        mysqli_close($conn);
    }
    ?>

</body>

</html>