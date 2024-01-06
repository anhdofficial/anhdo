<?php
@include 'connect_db.php';

$errors = array();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Kiểm tra user tồn tại
    $select = "SELECT * FROM user_form WHERE name = '$name' OR email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $errors[] = 'User đã tồn tại trong hệ thống';
        header("refresh:1;url=index.php");
    } else {
        // Kiểm tra mật khẩu và đăng ký
        if ($password != $cpassword) {
            $errors[] = 'Password không trùng khớp';
            header("refresh:1;url=index.php");
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert = "INSERT INTO user_form (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$hashed_password')";
            mysqli_query($conn, $insert);
            echo "Đăng ký thành công";
            header("refresh:1;url=index.php");
        }
    }
}

if (!empty($errors)) {
    // Nếu có lỗi, hiển thị thông báo lỗi và quay lại form đăng ký
    foreach ($errors as $error) {
        echo '<p>' . $error . '</p>';
    }
}
?>
