<?php
session_start();

// Kiểm tra xem có thông báo lỗi trong session hay không
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];

    // Hiển thị thông báo lỗi
    echo '<div class="modal__box2-er">' . $error . '</div>';

    // Sau khi hiển thị thông báo, bạn có thể xóa nó khỏi session để không hiển thị lại
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toor du lịch</title>
    <!-- reset css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <!-- css riêng -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- css chung -->
    <link rel="stylesheet" href="../css/base.css">
    <!-- font-icons -->
    <link rel="stylesheet" href="../font/fontawesome-free-6.4.2-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap&subset=vietnamese" rel="stylesheet">
</head>

<body>
    <header id="header">
        <div class="gird">
            <ul class="header__list">
                <li class="header__item">
                    <a href="index.php" class="header__logo">TOUR</a>
                </li>
                <li class="header__item">
                    <a href="screen_dulich.php">Du lịch</a>
                </li>
                <li class="header__item">
                    <a href="screen_khachsan.php">Khách sạn</a>
                </li>
                <li class="header__item">
                    <a href="screen_lienhe.php">Liên hệ</a>
                </li>
                <li class="header__item">
                    <a href="screen_gioithieu.php">Giới thiệu</a>
                </li>
            </ul>

            <div class="header__user">
                <div class="header__user-item">
                    <div class="header__user-btn">
                        <i class="fa-regular fa-user header__user-icon"></i>
                    </div>

                    <div class="header__user-login">
                        <?php
                        if (isset($_SESSION['user_name'])) {
                            echo '<span class="header__user-manage-item">
                                   <a href="donhang.php">
                                        <div class="header__user-manage-icon" style="width: 16px;">
                                             <i class="fa-regular fa-file-lines"></i>
                                        </div>
                                        Đơn hàng
                                   </a>
                              </span>';
                            echo '<span class="header__user-manage-item">
                                   <a href="quanlitaikhoan.php">
                                        <div class="header__user-manage-icon" style="width: 16px;">
                                             <i class="fas fa-user"></i>
                                        </div>
                                        Quản lí tài khoản
                                   </a>
                              </span>';
                            echo '<a href="logout.php" class="header__user-manage-btn">Đăng xuất</a>';
                        } else {
                            echo '<span class="js-modal-login">Đăng nhập</span>';
                            echo '<span class="js-modal-signup-close">Đăng ký</span>';
                        }
                        ?>
                    </div>
                </div>
            </div>


            <div class="mobile-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </header>

    <div class="screen" style="display: flex; justify-content: center;">
        <div class="thanhtoan__box">
            <div class="gird_row">
                <div class="thanhtoan__box2 col c-4 l-12">
                    <div class="thanhtoan__box2-n">
                        <h2>Du lịch trong nước</h2>
                        <p>PHỤC VỤ TẬN TÌNH</p>
                        <p><i class="fa-solid fa-phone"></i> 0971999988</p>
                    </div>
                </div>
                <div class="thanhtoan__box1 col c-8 l-12">
                    <!-- <table style="width: 100%; border-collapse: collapse; margin-top: 1px;">
                        <thead class="donhang-tb-h">
                            <tr style="background-color: #ed0080;">
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Ngày đặt</th>
                                <th>Phương thức thanh toán</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody class="donhang-tb-b">
                            <tr>
                                <td>Product 1</td>
                                <td>01/01/2023</td>
                                <td>100,000 VND</td>
                                <td>Origin 1</td>
                                <td>Đã duyệt</td>
                            </tr>
                            <tr>
                                <td>Product 2</td>
                                <td>02/01/2023</td>
                                <td>Origin 2</td>
                                <td>150,000 VND</td>
                                <td>Chưa duyệt</td>
                            </tr>
                            
                        </tbody>
                    </table> -->
                    <?php
                    include 'connect_db.php';

                    // Lấy user_id từ session
                    $user_id = $_SESSION['user_id'];

                    // Thực hiện truy vấn để lấy dữ liệu từ bảng hoadon chỉ với user_id tương ứng
                    $query = "SELECT * FROM hoadon WHERE user_id = $user_id";
                    $result = mysqli_query($conn, $query);

                    // Đảm bảo kết nối thành công
                    if (!$result) {
                        die("Lỗi truy vấn: " . mysqli_error($conn));
                    }
                    ?>
              
                    <table style="width: 100%; border-collapse: collapse; margin-top: 1px;">
                        <thead class="donhang-tb-h">
                            <tr style="background-color: #ed0080;">
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Ngày đặt</th>
                                <th>Giá tiền</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody class="donhang-tb-b">
                            <?php
                            // Vòng lặp để hiển thị dữ liệu từ cơ sở dữ liệu
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                    <td>'.$row['ma_san_pham'].'</td>
                                    <td>'.$row['ten_san_pham'].'</td>
                                    <td>'.$row['ngay_tao'].'</td>
                                    <td>'.number_format($row['giatour']).'</td>
                                    <td>'.$row['tinh_trang'].'</td>
                                </tr>';
                            } 
                            ?>
                        </tbody>
                    </table>

                    <?php
                    // Đóng kết nối
                    mysqli_close($conn);
                    ?>             

                </div>
            </div>
        </div>
    </div>

    <footer id="footer">
        <div class="gird">
            <div class="footer__box">
                <div class="gird_row">
                    <div class="col c-4 l-12">
                        <h1 class="footer-heading-icon">TOUR</h1>
                        <p class="footer-info">
                            41A, Phú Diễn, Bắc Từ Liêm, Hà Nội
                        </p>
                        <p class="footer-info">
                            <i class="fa-solid fa-phone"></i>
                            0986882299
                        </p>
                        <p class="footer-info">
                            211110621235@hunre.edu.vn
                        </p>
                    </div>
                    <div class="col c-4 l-12">
                        <h1 class="footer-heading">
                            Designer
                        </h1>
                        <p class="footer-info">
                            Nguyễn Thế Quang
                        </p>
                        <p class="footer-info">
                            Phạm Thị Chinh
                        </p>
                        <p class="footer-info">
                            Lê Thị Quỳnh Như
                        </p>
                        <p class="footer-info">
                            Ngô Thế Vinh
                        </p>
                    </div>
                    <div class="col c-4 l-12">
                        <h1 class="footer-heading">
                            Build Database
                        </h1>
                        <p class="footer-info">
                            Đỗ Văn Anh
                        </p>
                        <p class="footer-info">
                            Team 1
                        </p>
                    </div>
                </div>

                <div class="footer__society">
                    <center>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-github"></i></a>
                    </center>
                </div>
            </div>
        </div>
    </footer>
    <!-- Kết thúc: Nội dung website -->

    <!--Bắt đầu: Modal - login - signup -->
    <div class="modal js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="modal__box">
                <h1 class="modal__box-logo">
                    TOUR
                </h1>
                <h1 class="modal__box-heading">
                    Welcome!
                </h1>
                <p class="modal__box-sub-heading">
                    To Our Nem Website
                </p>
                <p class="modal__box-description">
                    Laram ipsum, dolor sit amen consenter adipisicing elit. Beatae, asperiores
                </p>
                <div class="modal__box-icon">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </div>
            <form action="login_form.php" method="POST">
                <div class="modal__box2">
                    <div class="modal__box2-heading">
                        Login
                    </div>
                    <input type="name" name="name" id="name" class="modal__box2-login" placeholder="tên đăng nhập" required>
                    <input type="password" name="password" id="password" class="modal__box2-pw" placeholder="Mật Khẩu" required>
                    <div class="modal__box2-forgot-pw">
                        <a href="">Forgot Password?</a>
                    </div>
                    <button type="submit" name="submit" class="modal__box2-btn">Đăng nhập</button>
                    <p class="modal__box2-footer">Don't have an account? <span class="js-modal-switch">Sign up</span></p>
                </div>
            </form>
            <script>
                function validateForm() {
                    var name = document.getElementById("name").value;
                    var password = document.getElementById("password").value;

                    if (name === "" || password === "") {
                        alert("Vui lòng điền đầy đủ thông tin.");
                        return false;
                    }
                    return true;
                }
            </script>
        </div>
    </div>

    <div class="modal js-modal-signup">
        <div class="modal-signup__ctn">
            <div class="modal-close js-modal-close2">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="modal__box">
                <h1 class="modal__box-logo">
                    TOUR
                </h1>
                <h1 class="modal__box-heading">
                    Welcome!
                </h1>
                <p class="modal__box-sub-heading">
                    To Our Nem Website
                </p>
                <p class="modal__box-description">
                    Laram ipsum, dolor sit amen consenter adipisicing elit. Beatae, asperiores
                </p>
                <div class="modal__box-icon">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </div>
            <div class="modal__box2">
                <div class="modal__box2-heading">
                    Sign Up
                </div>
                <form action="register_form.php" method="POST">
                    <?php
                    if (!empty($errors)) {
                        // Nếu có lỗi, hiển thị thông báo lỗi
                        foreach ($errors as $error) {
                            echo '<div class="error-message">' . $error . '</div>';
                        }
                    }
                    ?>
                    <label class="modal-signup__label" for="">
                        <span>Tài khoản</span>
                        <input name="name" placeholder="Nhập tài khoản!" type="text" required>
                    </label>
                    <label class="modal-signup__label" for="">
                        <span>Email</span>
                        <input name="email" id="" placeholder="Nhập email" type="email" required>
                    </label>
                    <label class="modal-signup__label" for="">
                        <span>Số điện thoại</span>
                        <input name="phone" id="" placeholder="Nhập số điện thoại!" type="text" required>
                    </label>
                    <label class="modal-signup__label" for="">
                        <span>Mật khẩu</span>
                        <input name="password" id="" placeholder="Nhập mật khẩu!" type="password" required>
                    </label>
                    <label class="modal-signup__label" for="">
                        <span>Nhập lại mật khẩu</span>
                        <input name="cpassword" placeholder="Nhập lại mật khẩu!" type="password" required>
                    </label>
                    <input type="submit" name="submit" class="modal__box2-btn">
                </form>
                <script>
                    function validateForm() {
                        var name = document.getElementById("name").value;
                        var email = document.getElementById("email").value;
                        var phone = document.getElementById("phone").value;
                        var password = document.getElementById("password").value;
                        var cpassword = document.getElementById("cpassword").value;

                        if (name === "" || email === "" || phone === "" || password === "" || cpassword === "") {
                            alert("Vui lòng điền đầy đủ thông tin.");
                            return false;
                        }
                        return true;
                    }
                </script>
            </div>
        </div>
    </div>
    <!-- Kết thúc: Modal - login - signup -->

    <script src="../js/modal_login_signup.js"></script>
    <script src="../js/slider_active.js"></script>
</body>

</html>