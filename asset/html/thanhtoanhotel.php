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
     <?php
     // Kiểm tra xem có tồn tại tham số 'id' trong URL không
     if (isset($_GET['id'])) {
          $khachSanId = $_GET['id'];
          $ten_san_pham = $_GET['ten'];
          $giatour = $_GET['giakm'];
     }
     ?>

     <div class="screen" style="display: flex; justify-content: center;">
          <div class="thanhtoan__box">
               <div class="gird_row">
                    <form action="" method="post">
                         <label for="ma_san_pham" class="thanhtoan-label">
                              Mã Sản phẩm
                              <input type="text" name="ma_san_pham" value="<?php echo $khachSanId; ?>" class="thanhtoan-btn" readonly>
                         </label>
                         <label for="ten_san_pham" class="thanhtoan-label">
                              Tên Sản phẩm
                              <input type="ten_san_pham" name="ten_san_pham" class="thanhtoan-btn" value="<?php echo $ten_san_pham; ?>" readonly>
                         </label>
                         <label for="giatour" class="thanhtoan-label">
                              Giá
                              <?php
                              // Định dạng giá tour với ký tự phân cách hàng nghìn
                              $formattedPrice = number_format($giatour, 0, '', ',');
                              echo "<input type='text' name='giatour' id='giatour' class='thanhtoan-btn' value='{$formattedPrice}đ' readonly>";
                              ?>
                         </label>

                         <label for="ho_ten" class="thanhtoan-label">
                              Họ tên
                              <input type="text" name="ho_ten" class="thanhtoan-btn" required>
                         </label>

                         <label for="email" class="thanhtoan-label">
                              Email
                              <input type="email" name="email" class="thanhtoan-btn" required>
                         </label>

                         <label for="so_dien_thoai" class="thanhtoan-label">
                              Số điện thoại
                              <input type="text" name="so_dien_thoai" class="thanhtoan-btn" required>
                         </label>

                         <label for="dia_chi" class="thanhtoan-label">
                              Địa chỉ
                              <input type="text" name="dia_chi" class="thanhtoan-btn" required>
                         </label>

                         <label class="thanhtoan-label">
                              Chọn phương thức thanh toán!
                              <label class="thanhtoan-label2">
                                   <input type="radio" name="phuong_thuc_thanh_toan" value="Tiền Mặt" required>
                                   Thanh toán tiền mặt
                              </label>
                              <label class="thanhtoan-label2">
                                   <input type="radio" name="phuong_thuc_thanh_toan" value="online" required>
                                   Thanh toán online (Dịch vụ chưa hỗ trợ!)
                              </label>
                         </label>
                         <div id="qrcode-container" style="display: none;"></div>
                         <div class="thanhtoan-gui">
                              <input type="submit" value="Gửi">
                         </div>
                    </form>
                    <?php
                    include 'connect_db.php';

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                         $ma_san_pham = mysqli_real_escape_string($conn, $_POST['ma_san_pham']);
                         $ten_san_pham = mysqli_real_escape_string($conn, $_POST['ten_san_pham']);

                         // Loại bỏ dấu phẩy hàng nghìn từ giatour và chuyển đổi thành số nguyên
                         $giatour = str_replace(',', '', $_POST['giatour']);
                         $giatour = intval($giatour);
                         $ho_ten = mysqli_real_escape_string($conn, $_POST['ho_ten']);
                         $email = mysqli_real_escape_string($conn, $_POST['email']);
                         $so_dien_thoai = mysqli_real_escape_string($conn, $_POST['so_dien_thoai']);
                         $dia_chi = mysqli_real_escape_string($conn, $_POST['dia_chi']);
                         $phuong_thuc_thanh_toan = mysqli_real_escape_string($conn, $_POST['phuong_thuc_thanh_toan']);
                         $user_id = $_SESSION['user_id'];

                         $query = "INSERT INTO hoadon (ma_san_pham, ten_san_pham, giatour, ho_ten, email, so_dien_thoai, dia_chi, phuong_thuc_thanh_toan, user_id) 
              VALUES ('$ma_san_pham', '$ten_san_pham', '$giatour', '$ho_ten', '$email', '$so_dien_thoai', '$dia_chi', '$phuong_thuc_thanh_toan', '$user_id')";

                         if (mysqli_query($conn, $query)) {
                              echo '<div style="text-align: center; font-size: 1.6em; margin-top: 10px; font-weight: bold; color: red;">Gửi Hóa Đơn Thành Công !</div>';
                              echo "<script>
            setTimeout(function() {
                window.location.href = 'donhang.php';
            }, 1000);
        </script>";
                         } else {
                              echo "Lỗi: " . mysqli_error($conn);
                         }

                         mysqli_close($conn);
                    }
                    ?>



                    <div class="thanhtoan__box2 col c-6 l-12">
                         <div class="thanhtoan__box2-n">
                              <h2>Du lịch trong nước</h2>
                              <p>PHỤC VỤ TẬN TÌNH</p>
                              <p><i class="fa-solid fa-phone"></i> 0971999988</p>
                         </div>
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
                                   21111062295@hunre.edu.vn
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