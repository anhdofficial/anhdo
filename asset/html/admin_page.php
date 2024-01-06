<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập và có quyền admin không
if (!isset($_SESSION['user_id']) || !in_array('admin', $_SESSION['user_roles'])) {
    header('location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        .Container {
            display: flex;
            height: 100vh;
        }

        .box-menu {
            width: 250px;
            background-color: #333;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .administrator-logo img {
            width: 27px;
            height: 27px;
            float: left;
        }

        .administrator-logo a {
            color: #FF7610;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .btnkgvien {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            text-align: left;
            width: 100%;
        }

        .line-menu {
            color: #fff;
            display: flex;
            align-items: center;
            padding: 10px;
        }

        .line-menu-lv2 {
            color: #f8f8f8;
            display: flex;
            align-items: center;
            padding: 10px 20px;
        }

        .btnkgvien i {
            margin-right: 10px;
        }

        .main-screen {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .screen-menu {
            background-color: #444;
            color: white;
            padding: 10px;
            text-align: right;
        }

        .screen-slides {
            flex: 1;
            padding: 20px;
        }

        .link-home {
            color: #fff;
            text-decoration: none;
        }

        .link-home i {
            padding-right: 5px;
        }

        .Container {
            margin: 0;
            padding: 0;
        }

        .box-menu {
            margin-top: 0;
            padding: 0;
            /* Thêm dòng này để loại bỏ độ dày nếu có */
        }

        .administrator-logo {
            margin-bottom: 0;
            /* Điều chỉnh theo nhu cầu */
        }

        /* Điều chỉnh padding cho các nút menu */
        .btnkgvien {
            padding: 10px;
            background-color: #333;
            color: #ffffff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btnkgvien:hover {
            background-color: #2980b9;
            /* Màu nền khi rê chuột vào nút */
        }
    </style>
</head>

<body>

    <div class="Container" style="background-image: url('../img/banner.jpg');">
        <div class="box-menu">
            <div class="administrator-logo">
                <img src="../img/iconadmin.png" alt="Admin Logo">
                <a href="#">
                    <p>Administrators</p>
                </a>
            </div>

            <!-- Các nút chức năng -->
            <form method="get" action="managertour.php">
                <input name="select" value="newposts" style="display: none">
                <button class="btnkgvien">
                    <div class="line-menu">
                        <i class="fas fa-plus-square"></i>
                        Quản Lí Tour du lịch
                    </div>
                </button>
            </form>
            <form method="get" action="managerhotel.php">
                <input name="select" value="newposts" style="display: none">
                <button class="btnkgvien">
                    <div class="line-menu">
                        <i class="fas fa-plus-square"></i>
                        Quản Lí Khách sạn
                    </div>
                </button>
            </form>
            <form method="get" action="manageruser.php">
                <input name="select" value="newposts" style="display: none">
                <button class="btnkgvien">
                    <div class="line-menu">
                        <i class="fas fa-plus-square"></i>
                        Quản Lí Tài khoản
                    </div>
                </button>
            </form>
            <form method="get" action="managerbill.php">
                <input name="select" value="newposts" style="display: none">
                <button class="btnkgvien">
                    <div class="line-menu">
                        <i class="fas fa-plus-square"></i>
                        Quản Lí Hóa đơn
                    </div>
                </button>
            </form>
            <form method="get" action="managerdoanhthu.php">
                <input name="select" value="newposts" style="display: none">
                <button class="btnkgvien">
                    <div class="line-menu">
                        <i class="fas fa-plus-square"></i>
                        Quản Lí Doanh thu
                    </div>
                </button>
            </form>
            <form method="get" action="managerlienhe.php">
                <input name="select" value="newposts" style="display: none">
                <button class="btnkgvien">
                    <div class="line-menu">
                        <i class="fas fa-plus-square"></i>
                        Chăm Sóc Khách Hàng
                    </div>
                </button>
            </form>
            <!-- Nút đăng xuất -->
            <form method="post" action="logout.php">
                <input name="act" value="true" style="display: none">
                <button class="btnkgvien">
                    <div class="line-menu" style="color: #ee1111;">
                        <i class="fas fa-sign-out-alt"></i>
                        Đăng xuất
                    </div>
                </button>
            </form>
        </div>

    </div>
</body>

</html>