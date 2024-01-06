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

        .administrator-logo {
            margin-bottom: 20px;
        }

        .administrator-logo img {
            width: 27px;
            height: 27px;
            float: left;
            margin-right: 10px;
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
            padding: 10px;
            text-align: left;
            width: 100%;
            transition: background-color 0.3s;
        }

        .line-menu {
            color: #fff;
            display: flex;
            align-items: center;
        }

        .line-menu i {
            margin-right: 10px;
        }

        .main-screen {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin: 20px;
        }

        .result-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .result-item {
            padding: 20px;
            border-bottom: 1px solid #ddd;
        }

        .result-item:last-child {
            border-bottom: none;
        }

        .result-item h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .total-summary {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
            margin-bottom: 20px;
        }

        .total-summary h2 {
            color: #333;
            margin-bottom: 10px;
        }

        @media screen and (max-width: 600px) {
            .box-menu {
                width: 100%;
            }
        }

        .btnkgvien:hover {
            background-color: #2980b9;
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
        <div class="main-screen">
            <div class="screen-menu">
                <div style="margin-right: 10px;float: right;">
                    <a class="link-home" href="../html/index.php"><i class="fas fa-home"></i>Vào trang web</a>
                </div>
            </div>
            <div class="screen-slides">
                <h1>
                    <center>xin chào admin</center>
                </h1>
                <div class="main-screen">
                    <h1>Doanh thu theo ngày</h1>

                    <!-- Biểu mẫu bộ lọc -->
                    <form method="get" action="managerdoanhthu.php">
                        <label for="start_date">Từ ngày:</label>
                        <input type="date" id="start_date" name="start_date" required>

                        <label for="end_date">Đến ngày:</label>
                        <input type="date" id="end_date" name="end_date" required>

                        <button type="submit">Lọc</button>
                    </form>
                    <?php
                    // Kết nối đến cơ sở dữ liệu
                    include 'connect_db.php';

                    // Kiểm tra nếu có dữ liệu được gửi từ biểu mẫu
                    if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
                        // Lấy giá trị từ biểu mẫu
                        $start_date = $_GET['start_date'];
                        $end_date = $_GET['end_date'];

                        // Truy vấn SQL với điều kiện ngày tháng năm
                        $sql = "SELECT 
                DATE(ngay_tao) AS ngay,
                COUNT(*) AS tong_so_luong_dat_tour,
                SUM(giatour) AS tong_doanh_thu
            FROM 
                hoadon
            WHERE 
                ngay_tao BETWEEN '$start_date' AND '$end_date'
            GROUP BY 
                ngay
            ORDER BY 
                ngay";

                        $result = $conn->query($sql);

                        // Kiểm tra và hiển thị kết quả
                        if ($result->num_rows > 0) {
                            $soluong = 0;
                            $doanhthu = 0;

                            echo '<div class="result-container">';
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="result-item">';
                                echo "<h2>Ngày: " . $row["ngay"] . "</h2>";
                                echo "Tổng số lượng đặt tour: " . number_format($row["tong_so_luong_dat_tour"]) . "<br>";
                                echo "Tổng doanh thu: " . number_format($row["tong_doanh_thu"]) . "<br><br>";

                                // Cộng dồn tổng
                                $soluong += $row["tong_so_luong_dat_tour"];
                                $doanhthu += $row["tong_doanh_thu"];
                                echo '</div>';
                            }
                            echo '</div>';

                            // Hiển thị tổng cuối cùng
                            echo '<div class="total-summary">';
                            echo "<h2>Tổng số lượng đặt tour: " . number_format($soluong) . "</h2>";
                            echo "<h2>Tổng doanh thu: " . number_format($doanhthu) . "</h2>";
                            echo '</div>';
                        } else {
                            echo "Không có dữ liệu cho khoảng thời gian đã chọn.";
                        }
                    }
                    ?>

                    <?php
                    $sql = "SELECT SUM(giatour) AS tong_doanh_thu FROM hoadon";
                    $result = $conn->query($sql);

                    // Kiểm tra và hiển thị kết quả
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $tongDoanhThu = $row["tong_doanh_thu"];

                        // Sử dụng number_format để thêm dấu phẩy
                        $formattedTongDoanhThu = number_format($tongDoanhThu);

                        // Hiển thị tổng doanh thu
                        echo "<h2>Tổng doanh thu của web: " . $formattedTongDoanhThu . "</h2>";
                    } else {
                        echo "Không có dữ liệu";
                    }

                    // Đóng kết nối
                    $conn->close();
                    ?>

                </div>

            </div>

</body>

</html>