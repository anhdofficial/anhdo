<?php
@include 'connect_db.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Kiểm tra sự tồn tại của người dùng
    $query = "SELECT * FROM user_form WHERE name = '$name' AND email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        
        $new_password = generateRandomPassword(); // Hàm tạo mật khẩu ngẫu nhiên

        // Mã hóa mật khẩu mới
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Lưu mật khẩu mới vào cơ sở dữ liệu
        $update_query = "UPDATE user_form SET password = '$hashed_password' WHERE name = '$name' AND email = '$email'";
        mysqli_query($conn, $update_query);

        // Hiển thị mật khẩu mới cho người dùng
        echo "<script>
                alert('Mật khẩu mới của bạn là: $new_password');
                window.location.href = 'index.php'; // Chuyển hướng về trang chính
              </script>";
    } else {
        // Người dùng không tồn tại 
        echo "<script>
                alert('Thông tin không chính xác. Vui lòng kiểm tra lại.');
                window.location.href = 'quenmatkhau.php'; // Chuyển hướng trở lại form đặt lại mật khẩu
              </script>";
    }
}

// Hàm tạo mật khẩu ngẫu nhiên
function generateRandomPassword($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}
