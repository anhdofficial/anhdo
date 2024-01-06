<?php
session_start();
session_unset();
session_destroy();

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

        /* Trong phần CSS của bạn */
        .info-column {
            max-width: 200px;
            /* Đặt giới hạn chiều rộng tùy ý */
            overflow: hidden;
            text-overflow: ellipsis;
            /* Để hiển thị dấu elipsis (...) nếu văn bản quá dài */
            white-space: nowrap;
        }


        @media screen and (max-width: 600px) {
            .info-column {
                display: none;
            }
        }

        .image-column img {
            max-height: 350px;
            /* Điều chỉnh chiều cao tối đa của hình ảnh */
            width: auto;
            /* Duy trì tỷ lệ khung hình */
            display: block;
            /* Tránh các khoảng trắng dư thừa dưới hình ảnh */
            margin: 0 auto;
            /* Căn giữa hình ảnh */
        }

        .btnkgvien {
            padding: 10px;
            background-color: #333;
            /* Màu nền của nút */
            color: #ffffff;
            /* Màu chữ trắng */
            border: none;
            /* Loại bỏ đường viền */
            cursor: pointer;
            /* Thay đổi con trỏ khi rê chuột vào nút */
            transition: background-color 0.3s;
            /* Hiệu ứng chuyển đổi màu nền */
        }

        .btnkgvien:hover {
            background-color: #2980b9;
            /* Màu nền khi rê chuột vào nút */
        }
    </style>
</head>

<body>

    <div class="Container" >
        <div class="box-menu">
            <div class="administrator-logo">
                <img src="../img/iconadmin.png" alt="Admin Logo">
                <a href="admin_page.php">
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

        <?php
        include 'connect_db.php';

        $query = "SELECT * FROM hotels";
        $result = mysqli_query($conn, $query);

        echo '<div class="main-screen">';
        echo '<div class="screen-menu">';
        echo '<div style="margin-right: 10px;float: right;">';
        echo '<a class="link-home" href="../html/index.php"><i class="fas fa-home"></i>Vào trang web</a>';
        echo '</div>';
        echo '</div>';
        echo '<div class="screen-slides">';
        echo '<h1> <center>xin chào admin</center></h1>';
        echo '<div class="table-container">';
        echo '<table border="2" style="width: 100%; border-collapse: collapse; max-height: 200px; overflow: auto; text-align:center;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Tên Khách Sạn</th>';
        echo '<th>Số Sao</th>';
        echo '<th>Địa Chỉ</th>';
        echo '<th>Khuyến Mãi</th>';
        echo '<th>Giá Gốc</th>';
        echo '<th>Giá Sau Km</th>';
        echo '<th>Thông Tin</th>';
        echo '<th>Ghi Chú</th>';
        echo '<th>Ảnh</th>';
        echo '<th>';
        echo '<a href="addhotel.php">thêm</a>';
        echo '</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            $giakm = $row['giagoc'] - $row['giagoc'] / 100 * $row['khuyenmai'];
            echo '<tr>';
            echo '<td >' . $row['id'] . '</td>';
            echo '<td >' . $row['ten'] . '</td>';
            echo '<td>' . $row['sosao'] . '</td>';
            echo '<td >' . $row['diachi'] . '</td>';
            echo '<td >' . $row['khuyenmai'] . '</td>';
            echo '<td>' . $row['giagoc'] . '</td>';
            echo '<td>' . $giakm . '</td>';
            echo '<td class="info-column" >' . $row['thongtin'] . '</td>';
            echo '<td>' . $row['note'] . '</td>';
            echo '<td class="info-column image-column"><img src="' . $row['image_url'] . '" alt="Tour Image"></td>';
            echo '<td><a href="edithotel.php?id=' . $row['id'] . '">Sửa</a>&nbsp;|&nbsp;<a href="delhotel.php?id=' . $row['id'] . '">Xóa</a></td>';
            echo '</tr>';
        }

        echo '</table>';

        mysqli_close($conn);
        ?>


    </div>

</body>

</html>