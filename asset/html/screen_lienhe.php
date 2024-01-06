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

     <div class="screen">
          <div class="box__contact-top">
               <div class="box__contact-top-inner">
                    <h1>LIÊN HỆ CHÚNG TÔI</h1>
                    <p>Chúng tôi luôn sẵn sàng hỗ trợ, dù bạn ở bất cứ nơi đâu!</p>
               </div>
          </div>

          <div class="box__haed-tad">
               <ul class="nav__tabs">
                    <li class="tab-contact-items tabs-click">Hỗ trợ khác hàng</li>
                    <li class="tab-contact-items">Tuyển dụng và đối tác</li>
               </ul>
          </div>

          <div class="box__contact-mid">
               <div class="box__contact-item active">
                    <?php
                    include 'connect_db.php';

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                         // Lấy dữ liệu từ form
                         $ten_dv = mysqli_real_escape_string($conn, $_POST['ten_dv']);
                         $ten_kh = mysqli_real_escape_string($conn, $_POST['ten_kh']);
                         $sdt = mysqli_real_escape_string($conn, $_POST['sdt']);
                         $note = mysqli_real_escape_string($conn, $_POST['note']);

                         // Thực hiện truy vấn thêm
                         $query = "INSERT INTO lienhe (ten_dv, ten_kh, sdt, note) 
                              VALUES ('$ten_dv', '$ten_kh', '$sdt', '$note')";

                         if (mysqli_query($conn, $query)) {
                              echo "Thêm tour thành công!";
                              echo "<script>
                                   setTimeout(function() {
                                        alert('Gửi thông tin liên hệ thành công!')
                                        window.location.href = 'index.php';                   
                                   }, 1000);
                                   </script>";
                         } else {
                              echo "Lỗi: " . mysqli_error($conn);
                         }

                         mysqli_close($conn);
                    }
                    ?>

                    <form method="POST" action="">
                    <!-- Các trường thông tin liên hệ -->
                    <label for="" class="box__contact-label">
                         Tên dịch vụ
                         <input type="text" name="ten_dv" id="" placeholder="Nhập tên dịch vụ cần tư vấn">
                    </label>
                    <label for="" class="box__contact-label">
                         Tên của bạn
                         <input type="text" name="ten_kh" id="" placeholder="Nhập Tên của bạn">
                    </label>
                    <label for="" class="box__contact-label">
                         Số điện thoại
                         <input type="text" name="sdt" id="" placeholder="Nhập số điện thoại">
                    </label>
                    <label for="" class="box__contact-label">
                         Hãy chia sẻ lo lắng của bạn
                         <textarea class="contact-texttarea" name="note" cols="30" rows="10" placeholder="Nhập thông tin ở đây"></textarea>
                    </label>

                    <div class="hotel__form-search-btn-box">
                         <button type="submit" name="submit" class="hotel__form-search-btn">LIÊN HỆ</button>
                    </div>
                    </form>
               </div>

               <div class="box__contact-item">
                    <h2 class="box__contact-item-heading">
                         Tuyển dụng
                    </h2>
                    <p class="box__contact-item-sub-heading">
                         Để tìm hiểu thêm về cơ hội nghề nghiệp, vui lòng xem trang <a href="#">Tuyển dụng.</a>
                    </p>
                    <h2 class="box__contact-item-heading">
                         Đối tác và truyền thông
                    </h2>
                    <p class="box__contact-item-sub-heading">
                         Đối với các yêu cầu hoặc đề nghị hợp tác, vui lòng gửi email về cho chúng tôi tại:
                         <a href="#">dovananh15042003@gmail.com</a> hoặc liên hệ <a href="#">0965456280</a>
                    </p>
                    <h2 class="box__contact-item-heading">
                         Đăng ký đối tác khách sạn
                    </h2>
                    <p class="box__contact-item-sub-heading">
                         Đăng ký bán phòng khách sạn tại Vietnam Booking, Quý đối tác sẽ mở ra cơ hội tiếp cận vô vàn khách hàng tiềm năng không chỉ trong nước mà còn đến từ khắp nơi trên thế giới.
                         Quý đối tác sẽ được cung cấp các công cụ, dữ liệu phân tích chuyên sâu và sự hỗ trợ tốt nhất từ đội ngũ chuyên viên nhiều kinh nghiệm.
                         <br>
                         Liên hệ với chúng tôi qua email <a href="#">dovananh15042003@gmail.com</a> hoặc liên hệ <a href="#">0965456280</a>
                    </p>
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
                                   0965456280
                              </p>
                              <p class="footer-info">
                                   21111062487@hunre.edu.vn
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
     <script src="../js/js_lienhe.js"></script>
</body>

</html>