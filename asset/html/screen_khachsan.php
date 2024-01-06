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
     <title>Khách sạn</title>
     <!-- reset css -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
     <!-- css riêng -->
     <link rel="stylesheet" href="../css/main.css">
     <!-- css chung -->
     <link rel="stylesheet" href="../css/base.css">
     <!-- font-icons -->
     <link rel="stylesheet" href="../font/fontawesome-free-6.4.2-web/css/all.css">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap&subset=vietnamese" rel="stylesheet">
     <style>
          @keyframes glowing {
               0% {
                    color: red;
                    text-shadow: 0 0 10px red, 0 0 20px red, 0 0 30px red;
               }

               50% {
                    color: darkred;
                    text-shadow: 0 0 20px darkred, 0 0 30px darkred, 0 0 40px darkred;
               }

               100% {
                    color: red;
                    text-shadow: 0 0 10px red, 0 0 20px red, 0 0 30px red;
               }
          }

          .glowing-red {
               animation: glowing 0.5s infinite;
               /* Điều chỉnh thời gian và lặp lại theo ý muốn */
          }
     </style>

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

     <div class="screen">
          <div class="hotel__slider" style="background-image: url('../img/img_khachsan/anh_ksan5sao.jpg');">
               <div class="gird">
                    <div class="hotel__slider-box">
                         <h1 class="hotel__slider-heading">Khách sạn</h1>
                         <p class="hotel__slider-description">
                              Lưu lại các điểm đến trong mơ và khám phá những hoạt động độc đáo nhất.
                         </p>
                    </div>
               </div>
          </div>

          <div class="hotel__form-search">
               <div class="hotel__form-search-titel">
                    <i class="fa-solid fa-hotel"></i>
                    Tìm kiếm khách sạn tốt nhất
               </div>
               <form action="search_hotels.php" method="get">
                    <div class="hotel__form-search-list">
                         <div class="hotel__form-search-item">
                              <div class="hotel__form-search-child">
                                   <i class="fa-solid fa-location-dot"></i>
                                   <input type="text" name="keyword" class="hotel__form-search-input" placeholder="Địa điểm cần thuê khách sạn">
                              </div>
                         </div>
                    </div>
                    <div class="hotel__form-search-btn-box">
                         <button type="submit" class="hotel__form-search-btn">TÌM KIẾM</button>
                    </div>
               </form>
               <!-- <div class="hotel__sapxep">
                    Tìm kiếm theo:
               </div> -->
          </div>

          <div class="gird">
               <div class="hotel__product">
                    <div class="hotel__product-heading">
                         Khách sạn tốt nhất
                    </div>

                    <div class="hotel__product-list gird_row">
                         <?php
                         // Kết nối đến cơ sở dữ liệu
                         include 'connect_db.php';

                         // Truy vấn dữ liệu
                         $query = "SELECT * FROM hotels";
                         $result = mysqli_query($conn, $query);

                         // Hiển thị dữ liệu
                         while ($row = mysqli_fetch_assoc($result)) {
                              $giakm = $row['giagoc'] - $row['giagoc'] / 100 * $row['khuyenmai'];
                              echo '<div class="hotel__product-item col c-6 l-12 m-12">';
                              echo '<a href="../html/hotel.php?id=' . $row['id'] . '" class="hotel__product-item-box">';
                              echo '<div class="hotel__product-item-img" style="background-image: url(\'' . $row['image_url'] . '\');"></div>';
                              echo '<div class="hotel__product-item-info">';
                              echo '<h3 class="hotel__product-item-info-name">' . $row['ten'] . '</h3>';
                              echo '<div class="hotel__product-item-info-star">';
                              echo 'Khách sạn:';
                              echo '<p class="hotel__star-quantity" style="display: inline-block;">' . $row['sosao'] . '</p>';
                              echo '<i class="fa-solid fa-star hotel__product-item-info-star-icon"></i>';
                              echo '</div>';
                              echo '<div class="hotel__product-item-info-star">';
                              echo 'Địa chỉ:';
                              echo '<p class="hotel__star-quantity" style="display: inline-block; margin-left: 5px;">' . $row['diachi'] . '</p>';
                              echo '</div>';
                              echo '<div class="hotel__product-item-box-child">';
                              echo '<span class="hotel__product-box-title">Giá trung bình mỗi đêm:</span>';
                              echo '<del class="hotel__product-box-price">' . number_format($row['giagoc']) . ' VNĐ</del>';
                              echo '<span class="hotel__product-box-price glowing-red">' . number_format($giakm) . ' VND</span>';
                              echo '</div>';
                              echo '</div>';
                              echo '</a>';
                              echo '</div>';
                         }
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
</body>

</html>