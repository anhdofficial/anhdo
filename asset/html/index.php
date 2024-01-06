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

     <div id="slider">
          <img id="show" src="../img/img_modal/img1.jpg" alt="">
          <div class="slider-description">
               <h2 class="slider-heading">Một trong những đối tác du lịch tốt nhất</h2>
               <p class="slider-sub-heading">Hãy Ngắm Nhìn Thế Giới,
                    Điều Đó Tuyệt Vời Hơn Bất Cứ <span>Giấc Mơ</span> Nào!
               </p>
          </div>
          <div class="slider-icon-left js-slider-left" onclick="prev()">
               <i class="fa-solid fa-chevron-left"></i>
          </div>
          <div class="slider-icon-right js-slider-right" onclick="next()">
               <i class="fa-solid fa-chevron-right"></i>
          </div>
     </div>
     
     <script>
          var currentIndex = 0;
          var images = ['../img/img_modal/img1.jpg', '../img/img_modal/img2.jpg', '../img/img_modal/img3.jpg']; // Đường dẫn đến các ảnh

          function showImage(index) {
               var imgElement = document.getElementById('show');
               imgElement.src = images[index];

               var descriptions = [
                    "Một trong những đối tác du lịch tốt nhất",
                    // Thêm mô tả cho các ảnh khác nếu cần
               ];

               var descriptionElement = document.querySelector('.slider-description .slider-heading');
               descriptionElement.innerText = descriptions[index];
          }

          function next() {
               currentIndex = (currentIndex + 1) % images.length;
               showImage(currentIndex);
          }

          function prev() {
               currentIndex = (currentIndex - 1 + images.length) % images.length;
               showImage(currentIndex);
          }

          // Tự động chuyển đổi ảnh sau mỗi khoảng thời gian
          setInterval(function() {
               next();
          }, 3000);
     </script>
     <!-- Bắt đầu: Nội dung website -->
     <div id="contact">
          <div class="gird">
               <div class="contact__outstanding">
                    <center>
                         <h3 class="contact__outstanding-header">KHÁM PHÁ DU LỊCH CÙNG CHÚNG TÔI</h3>
                         <p class="contact__outstanding-sub-header">Tour Mới Và Phố Biến Nhất</p>
                    </center>
               </div>

               <div class="contact__tours-list gird_row">
                    <a href="../html/sanpham.php?id=1234567" class="contact__tour-item col c-3 m-6 l-12">
                         <div class="contact__tour-img" style="background-image: url('../img/img_modal/son_doong.jpg');"></div>
                         <div class="contact__tour-info">
                              <h2>Hang Sơn Đoòng</h2>
                              <span>
                                   <p style="display: inline-block;">Thời gian:</p> 2 ngày 1 đêm
                              </span>
                              <span>
                                   <p style="display: inline-block;">Giá:</p> 50.000.000
                              </span>
                         </div>
                    </a>


                    <a href="../html/sanpham.php?id=12345" class="contact__tour-item col c-3 m-6 l-12">
                         <div class="contact__tour-img" style="background-image: url('../img/img_modal/da_lat.jpg');"></div>
                         <div class="contact__tour-info">
                              <h2>Đà Lạt</h2>
                              <span>
                                   <p style="display: inline-block;">Thời gian:</p> 2 ngày 1 đêm
                              </span>
                              <span>
                                   <p style="display: inline-block;">Giá:</p> 20.000.000
                              </span>
                         </div>
                    </a>

                    <a href="../html/sanpham.php?id=123456" class="contact__tour-item col c-3 m-6 l-12">
                         <div class="contact__tour-img" style="background-image: url('../img/img_modal/sa_pa.jpg');"></div>
                         <div class="contact__tour-info">
                              <h2>Sa Pa</h2>
                              <span>
                                   <p style="display: inline-block;">Thời gian:</p> 2 ngày 1 đêm
                              </span>
                              <span>
                                   <p style="display: inline-block;">Giá:</p> 10.000.000
                              </span>
                         </div>
                    </a>

                    <a href="../html/sanpham.php?id=12345678" class="contact__tour-item col c-3 m-6 l-12">
                         <div class="contact__tour-img" style="background-image: url('../img/img_modal/vung_tau.jpg');"></div>
                         <div class="contact__tour-info">
                              <h2>Vũng Tàu</h2>
                              <span>
                                   <p style="display: inline-block;">Thời gian:</p> 2 ngày 1 đêm
                              </span>
                              <span>
                                   <p style="display: inline-block;">Giá:</p> 15.000.000
                              </span>
                         </div>
                    </a>
               </div>

               <div class="contact__container">
                    <div class="gird_row">
                         <div class="contact__container-item col c-3 m-6 l-12">
                              <div class="contact__container-icon">
                                   <i class="fa-solid fa-briefcase"></i>
                              </div>
                              <h2 class="contact__container-heading">
                                   Trải nghiệm đáng nhớ
                              </h2>
                              <p class="contact__container-description">
                                   Duyệt và đặt các chuyến tham quan và hoạt động thật đáng kinh ngạc
                              </p>
                         </div>

                         <div class="contact__container-item col c-3 m-6 l-12">
                              <div class="contact__container-icon">
                                   <i class="fa-regular fa-bell"></i>
                              </div>
                              <h2 class="contact__container-heading">
                                   Tính linh hoạt tối đa
                              </h2>
                              <p class="contact__container-description">
                                   Bạn nắm quyền kiếm sát với các tùy chọn thanh toán và hủy miễn phí
                              </p>
                         </div>

                         <div class="contact__container-item col c-3 m-6 l-12">
                              <div class="contact__container-icon">
                                   <i class="fa-regular fa-message"></i>
                              </div>
                              <h2 class="contact__container-heading">
                                   Tư vấn nhiệt tình
                              </h2>
                              <p class="contact__container-description">
                                   Giải đáp, tư vấn thắc mắc của khách hàng nhanh chóng và tận tình
                              </p>
                         </div>

                         <div class="contact__container-item col c-3 m-6 l-12">
                              <div class="contact__container-icon">
                                   <i class="fa-regular fa-heart"></i>
                              </div>
                              <h2 class="contact__container-heading">
                                   Sự hài lòng của khách hàng
                              </h2>
                              <p class="contact__container-description">
                                   Mang dịch vụ tốt nhất đến với khách hàng
                              </p>
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
                              <a href="quenmatkhau.php">Forgot Password?</a>
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

     <script src="../js/act_img.js"></script>
     <script src="../js/modal_login_signup.js"></script>
     <script src="../js/slider_active.js"></script>
</body>

</html>