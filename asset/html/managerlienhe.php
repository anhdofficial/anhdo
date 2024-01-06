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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1px;
            text-align: center;
            border: 1px solid #000;
            /* Màu khung bảng */
        }

        th,
        td {
            border: 1px solid #000;
            /* Màu khung ô */
            padding: 10px;
            /* Khoảng cách giữa nội dung và khung */
        }

        th {
            background-color: #ed0080;
            /* Màu nền của tiêu đề */
        }

        .donhang-tb-b tr {
            height: 10px;

        }
    </style>
</head>

<body>

    <div class="Container">
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

        // Thực hiện truy vấn để lấy danh sách người dùng từ CSDL
        $query = "SELECT * FROM lienhe";
        $result = $conn->query($query);
        ?>

        <!-- Hiển thị bảng danh sách người dùng -->
        
        <table>
            <thead>
                
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Dịch vụ</th>
                    <th>Tel</th>
                    <th>Vấn đề</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Duyệt qua từng dòng dữ liệu và hiển thị
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['ten_kh']}</td>";
                    echo "<td>{$row['ten_dv']}</td>";
                    echo "<td>{$row['sdt']}</td>";
                    echo "<td>{$row['note']}</td>";
                    echo "<td>{$row['trangthai']}</td>";
                    echo "<td><a href='editlienhe.php?id={$row['id']}'>Sửa</a> &nbsp <a href='dellienhe.php?id={$row['id']}'>Xóa</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <?php
        // Đóng kết nối
        $conn->close();
        ?>



    </div>

</body>

</html>