<?php
session_start();

if (isset($_POST['submit'])) {
    include 'connect_db.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = $_POST['password'];

    $select = "SELECT * FROM user_form WHERE name = '$name'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if (password_verify($password, $row['password'])) {
            // Mật khẩu đúng
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_roles'] = explode(',', $row['roles']);

            if (in_array('admin', $_SESSION['user_roles'])) {
                echo '<script>
                    setTimeout(function() {
                        var newTab = window.open("admin_page.php", "_blank");
                        newTab.focus();
                    }, 2000);
                    alert("Đăng nhập thành công. Đang chuyển hướng đến trang admin...");
                   
                </script>';
                exit();
            } else {
                echo '<script>
                    setTimeout(function() {
                        window.location.href = "index.php";
                    }, 2000);
                    alert("Đăng nhập thành công. Đang chuyển hướng đến trang chính...");
                </script>';
                exit();
            }
        } else {
            // Mật khẩu sai
            echo '<script>
                setTimeout(function() {
                    window.location.href = "index.php";
                }, 2000);
                alert("Mật khẩu sai. Đang chuyển hướng đến trang đăng nhập...");
            </script>';
            exit();
        }
    } else {
        // Người dùng không tồn tại
        echo '<script>
            setTimeout(function() {
                window.location.href = "index.php";
            }, 2000);
            alert("Người dùng chưa đăng ký hoặc mật khẩu sai. Đang chuyển hướng đến trang đăng nhập...");
        </script>';
        exit();
    }
}
