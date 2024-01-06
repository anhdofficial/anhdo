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

    <div class="screen screen-mt">
        <div class="gird">
            <div class="introduce__list">
                <div class="introduce-heading">
                    <i class="fa-brands fa-airbnb"></i>
                    Sản phẩm
                </div>
                <div class="gird_row introduce__info">
                    <div class="introduce__item col c-6 l-12 m-12">
                        <h1 class="introduce__item-heading">
                            ỨNG DỤNG ĐẶT CHUYẾN DU LỊCH, KHÁCH SẠN
                            CỦA CHÚNG TÔI ĐƯA RA MỤC TIÊU MANG ĐẾN CHO KHÁCH HÀNG "TRẢI NGHIỆM KỲ NGHỈ TUYỆT VỜI"
                        </h1>
                        <p class="introduce__item-description">
                            Dòng sản phẩm chính của chúng tôi là Combo Du lịch - sản phẩm cung cấp
                            đầy đủ cho một kỳ nghỉ bao gồm phòng khách sạn, vé máy bay, đưa đón, ăn uống, khám phá,… chỉ trong 1 lần đặt.
                            Với combo du lịch khách hàng không cần băn khoăn chọn lựa hoặc mất thời gian đặt từng dịch vụ riêng lẻ,
                            lại còn hưởng được mức giá vô cùng tốt với những dòng combo mà chúng tôi mang lại: combo tiết kiệm, voucher độc quyền, ưu đãi đặt sớm và flash sales
                        </p>
                        <p class="introduce__item-description">
                            Để đảm bảo cho khách hàng một “Trải nghiệm kỳ nghỉ tuyệt vời”,
                            chúng tôi áp dụng công nghệ vào việc đọc hiểu nhu cầu của thị trường,
                            nghiên cứu phát triển sản phẩm và gợi ý những sản phẩm và dịch vụ tốt nhất,
                            phù hợp với từng khách hàng.
                        </p>
                        <div class="introduce__cart-list gird_row">
                            <div class="introduce__cart-item col c-6 m-12 l-12">
                                <div class="introduce__cart-item-box">
                                    <i class="fa-solid fa-circle-check"></i>
                                    Cắm trại gia đình
                                </div>
                            </div>
                            <div class="introduce__cart-item col c-6 m-12 l-12">
                                <div class="introduce__cart-item-box">
                                    <i class="fa-solid fa-circle-check"></i>
                                    Cắm trại cặp đôi
                                </div>
                            </div>
                            <div class="introduce__cart-item col c-6 m-12 l-12">
                                <div class="introduce__cart-item-box">
                                    <i class="fa-solid fa-circle-check"></i>
                                    Trải nghiệm văn hóa
                                </div>
                            </div>
                            <div class="introduce__cart-item col c-6 m-12 l-12">
                                <div class="introduce__cart-item-box">
                                    <i class="fa-solid fa-circle-check"></i>
                                    Xe di chuyển sang trọng
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="introduce__item col c-6 l-12 m-12">
                        <div class="introduce__item-img" style="background-image: url(../img/img_gioithieu/img_gioithieu2.jpg);"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="introduce__list" style="background-color: #1D231F; padding: 20px 0 40px;">
            <div class="gird">
                <div class="introduce-heading">
                    <i class="fa-brands fa-airbnb"></i>
                    Thành viên trong nhóm
                </div>
            </div>

            <div class="gird">
                <center>
                    <p class="introduce__members-heading">Với kiến thức, kỹ năng và đam mê của mình, chúng tôi sẽ mang đến sự đa dạng và tạo ra những ý tưởng tuyệt vời.</p>
                </center>

                <div class="introduce__members-list">
                    <div class="gird_row">
                        <div class="introduce__members-item col c-6 m-6 l-12">
                            <div class="introduce__members-item-box">
                                <div class="introduce__members-img">
                                    <img src="../img/img_gioithieu/img_ntquang.jpg" alt="">
                                </div>
                                <div class="introduce__members-info">
                                    <h3 class="introduce__members-name">NGUYỄN THẾ QUANG</h3>
                                    <p class="introduce__members-vitri">Thiết kế giao diện website</p>
                                    <div class="introduce__members-link">
                                        <a class="introduce__members-link-icon" target="_blank" href="https://www.facebook.com/long.trieuduy.35/">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-github"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="introduce__members-item col c-6 m-6 l-12">
                            <div class="introduce__members-item-box">
                                <div class="introduce__members-img">
                                    <img src="../img/img_gioithieu/img_dvanh.jpg" alt="">
                                </div>
                                <div class="introduce__members-info">
                                    <h3 class="introduce__members-name">Đỗ Văn Anh</h3>
                                    <p class="introduce__members-vitri">Thiết kế Database</p>
                                    <div class="introduce__members-link">
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-github"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="introduce__members-item col c-4 m-6 l-12">
                            <div class="introduce__members-item-box">
                                <div class="introduce__members-img">
                                    <img src="../img/img_gioithieu/img_member.jpg" alt="">
                                </div>
                                <div class="introduce__members-info">
                                    <h3 class="introduce__members-name">Phạm Thị Chinh</h3>
                                    <p class="introduce__members-vitri">Thiết kế giao diện website</p>
                                    <div class="introduce__members-link">
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-github"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="introduce__members-item col c-4 m-6 l-12">
                            <div class="introduce__members-item-box">
                                <div class="introduce__members-img">
                                    <img src="../img/img_gioithieu/img_qnhu.jpg" alt="">
                                </div>
                                <div class="introduce__members-info">
                                    <h3 class="introduce__members-name">Lê Thị Quỳnh Như</h3>
                                    <p class="introduce__members-vitri">Thiết kế giao diện website</p>
                                    <div class="introduce__members-link">
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-github"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="introduce__members-item col c-4 m-6 l-12">
                            <div class="introduce__members-item-box">
                                <div class="introduce__members-img">
                                    <img src="../img/img_gioithieu/img_member.jpg" alt="">
                                </div>
                                <div class="introduce__members-info">
                                    <h3 class="introduce__members-name">Ngô Thế Vinh</h3>
                                    <p class="introduce__members-vitri">Thiết kế giao diện website</p>
                                    <div class="introduce__members-link">
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                        <a class="introduce__members-link-icon" target="_blank" href="">
                                            <i class="fa-brands fa-github"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="introduce__list">
            <div class="gird">
                <div class="introduce-heading">
                    <i class="fa-brands fa-airbnb"></i>
                    Về điều kiện & điều khoản
                </div>
            </div>

            <div class="gird">
                <div class="introduce__terms">
                    <h4 class="introduce__terms-heading">
                        1. Định nghĩa:
                    </h4>
                    <p class="introduce__terms-sub-heading">
                        - Dịch vụ: là việc chúng tôi thay mặt khách hàng thực hiện đặt phòng khách sạn, đặt vé máy bay, tour, tư vấn, đặt dịch vụ, hỗ trợ sau đặt dịch vụ, … với đối tác.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Nhà cung cấp bao gồm khách sạn, hãng hàng không, tour, nhà xe, …
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Phí dịch vụ là khoản phí mà người sử dụng cuối hoặc khách hàng phải trả khi họ đặt các dịch vụ như khách sạn, vé máy bay, tours... được cung cấp bởi chúng tôi. Khoản phí dịch vụ mà khách hàng đã thanh toán sẽ không được hoàn trả trong bất kỳ tình huống nào. Đây là một phí được áp dụng để bù đắp cho những nỗ lực của chúng tôi trong việc cung cấp nguồn nhân lực và kiến thức chuyên môn, nhằm đáp ứng và đồng hành với các nhu cầu và mong muốn của khách hàng.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Phí tiện ích là khoản phí mà chúng tôi thu khi khách hàng sử dụng dịch vụ tại website và ứng dụng điện thoại của chúng tôi. Mức phí tiện ích được tính theo từng dịch vụ và có thể thay đổi (mà không cần thông báo trước) tùy thuộc vào từng giai đoạn. Mục đích của việc áp dụng phí tiện ích là nâng cao chất lượng dịch vụ và cải thiện hệ thống cung cấp dịch vụ của chúng tôi, nhằm mang lại trải nghiệm tốt hơn cho khách hàng.
                    </p>
                    <h4 class="introduce__terms-heading">
                        2. Độ tuổi:
                    </h4>
                    <p class="introduce__terms-sub-heading">
                        Quý Khách phải từ 18 tuổi trở lên mới được phép đặt dịch vụ của chúng tôi.
                    </p>
                    <h4 class="introduce__terms-heading">
                        3. Thanh toán
                    </h4>
                    <p class="introduce__terms-sub-heading">
                        - Website có nhiều phương thức thanh toán để thuận tiện cho Khách hàng khi đặt dịch vụ, Khách hàng có thể tham khảo và lựa chọn phương thức phù hợp:
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Chuyển khoản qua ngân hàng: Sau khi đặt hàng, Khách hàng chuyển khoản số tiền đơn hàng vào tài khoản của chúng tôi tại các hệ thống ngân hàng.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Thanh toán bằng thẻ ATM nội địa: Khách hàng sử dụng thẻ ATM nội địa để thanh toán.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Thanh toán bằng thẻ tín dụng quốc tế: Khách hàng sử dụng thẻ Visa/ Master Card/ JCB để thanh toán.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Thanh toán tại cửa hàng tiện lợi Payoo hoặc qua QR code Payoo. Thanh toán trực tiếp tại cửa hàng của chúng tôi tại: Hà Nội.
                    </p>
                    <h4 class="introduce__terms-heading">
                        4. Xác nhận thông tin đặt dịch vụ:
                    </h4>
                    <p class="introduce__terms-sub-heading">
                        - Thông tin đặt dịch vụ được xác nhận thể hiện trong email xác nhận (đặt phòng, combo, vé máy bay, …) được gởi từ chúng tôi đến email Quý Khách đã đăng ký tại thời điểm đặt phòng với web và trên hệ thống website(bao gồm website và ứng dụng travel). Đây là cơ sở xác định các dịch vụ cung cấp cho khách hàng.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Trường hợp Quý Khách thực hiện thanh toán trễ hơn hạn thanh toán được thông báo từ website qua email, website, ứng dụng, việc đặt dịch vụ của Quý khách sẽ không còn hiệu lực.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Chúng tôi không đảm bảo bất kỳ thông tin đặt phòng nào cho đến khi quý khách nhận được email xác nhận lần cuối.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Khi thực hiện đặt dịch vụ và thanh toán, xem như Quý Khách đã đồng ý các điều kiện, điều khoản, chính sách áp dụng của chúng tôi và nhà cung cấp trước, trong và sau quá trình sử dụng dịch vụ.
                    </p>
                    <h4 class="introduce__terms-heading">
                        5. Thực hiện thay đổi cho thông tin đặt dịch vụ:
                    </h4>
                    <p class="introduce__terms-sub-heading">
                        - Sau khi đặt dịch vụ thành công (dịch vụ đã được xác nhận qua email), nếu Quý Khách muốn thay đổi thông tin đặt dịch vụ, vui lòng gởi yêu cầu đến email dattour@gmail.com hoặc số điện thoại 1900 2543. Chúng tôi sẽ cố gắng để hỗ trợ Quý Khách một cách tốt nhất, tuy nhiên chúng tôi không đảm bảo mọi yêu cầu thay đổi sẽ được thực hiện.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Nếu Quý Khách được phép hủy hoặc thay đổi Đặt dịch vụ nhưng không hủy hoặc thay đổi trước thời hạn cho phép, Quý Khách sẽ có trách nhiệm trả phí hủy theo quy định tại thời điểm đó, thuế hoặc phí khôi phục thuế (áp dụng hiện hành theo quy định), phí dịch vụ hoặc phí đặt dịch vụ khác dù Quý Khách có sử dụng dịch vụ hay không.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Nếu Quý Khách không sử dụng dịch vụ (lên máy bay, tham gia tour, nhận phòng khách sạn, …) vào ngày/đêm đặt dịch vụ đầu tiên nhưng dự định nhận phòng/tiếp tục sử dụng dịch vụ cho các đêm tiếp theo thì Quý Khách phải xác nhận với chúng tôi và nhà cung cấp/đơn vị liên kết của chúng tôi tối thiểu 6 tiếng trước giờ khởi hành/ngày/đêm đặt dịch vụ đầu tiên và trong thời gian làm việc (08.00 am – 20.00 pm). Nếu Quý Khách không làm như vậy, Đặt dịch vụ của Quý Khách sẽ bị hủy và Quý Khách sẽ không được sử dụng dịch vụ cũng như hoàn trả.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Trường hợp Quý Khách muốn thay đổi, hủy, hoàn tiền cho đặt dịch vụ đã đặt vì bất kỳ lý do gì vui lòng liên hệ gấp để được hỗ trợ trước khi sử dụng dịch vụ/nhận phòng (check in)/ khởi hành hoặc theo thời gian quy định tại thời điểm đó. Chúng tôi sẽ nỗ lực hết sức để hỗ trợ Quý Khách trong khả năng của chúng tôi. Trường hợp Quý Khách đã sử dụng dịch vụ, mọi yêu cầu hoàn, hủy, thay đổi sẽ không được thực hiện.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Ngoài ra, chúng tôi cũng áp dụng phí quản lý cho các yêu cầu thay đổi đặt dịch vụ /thông tin hủy phòng được chấp nhận (phí cộng thêm ngoài mức phí huỷ dịch vụ của nhà cung cấp).
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Voucher, khuyến mãi, mã giảm giá, điểm thưởng sẽ không được hoàn lại khi Quý Khách thay đổi, hủy dịch vụ.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Trường hợp có sự thay đổi từ nhà cung cấp dịch vụ (hãng hàng không, khách sạn, dịch vụ khác, ...) các điều kiện khách quan khác (bao gồm và không giới hạn các trường hợp bất khả kháng như thiên tai, dịch bệnh, ...) dẫn đến Quý Khách không thể sử dụng dịch vụ hoặc thay đổi dịch vụ, tùy theo quyết định của nhà cung cấp, chúng tôi sẽ thông báo lại cho Quý khách phương án áp dụng hoặc các chi phí hoàn lại, phát sinh tại thời điểm đó. Trường hợp nhà cung cấp cho phép hủy dịch vụ và hoàn lại tiền, chúng tôi sẽ hoàn lại số tiền Quý Khách đã thanh toán sau khi trừ đi phí dịch vụ của chúng tôi.
                    </p>
                    <h4 class="introduce__terms-heading">
                        6. Yêu cầu đăng ký thông tin:
                    </h4>
                    <p class="introduce__terms-sub-heading">
                        - Chúng tôi không cung cấp thông tin chi tiết thẻ tín dụng của Quý Khách cho bất kỳ nhà cung cấp phòng nào. Cho nên, nhà cung cấp của chúng tôi có thể yêu cầu Quý khách cung cấp thông tin có trên thẻ đã sử dụng để thanh toán cho việc đặt dịch vụ và chữ ký chủ thẻ tương. Nhà cung cấp sẽ yêu cầu xuất trình giấy CMND hoặc hộ chiếu tại thời điểm sử dụng dịch vụ. Một bản lưu của thẻ tín dụng / CMND hoặc hộ chiếu (passport) của Quý Khách cũng có thể được nhà cung cấp giữ lại.
                    </p>
                    <h4 class="introduce__terms-heading">
                        7. Thông tin trang web:
                    </h4>
                    <p class="introduce__terms-sub-heading">
                        - Chúng tôi nỗ lực cam kết độ chính xác cao nhất của các thông tin được hiển thị trên trang web, tuy nhiên xin lưu ý các thông tin cũng được chỉnh sửa từ nhà cung cấp dịch vụ và điều chỉnh theo đánh giá khách quan, phù hợp từ khách hàng (bao gồm cả thông tin, xếp hạng, đánh giá khách sạn, khu nghỉ dưỡng, ...).
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Do đó, chúng tôi không đảm bảo được tất cả thông tin trên là chính xác hoàn toàn hoặc không có bất kỳ lỗi nào. Chúng tôi bảo lưu quyền thay đổi thông tin hiển thị trên trang web (bao gồm Điều khoản và Điều kiện này) bất kỳ thời điểm nào mà không phải báo trước và các thay đổi này có hiệu lực ngay cho tất cả các dịch vụ của chúng tôi ở mọi thời điểm.
                    </p>
                    <h4 class="introduce__terms-heading">
                        8. Trách nhiệm:
                    </h4>
                    <p class="introduce__terms-sub-heading">
                        - Chúng tôi sẽ không chịu trách nhiệm với bất kỳ thiệt hại, mất mát, khiếu nại hoặc khoản phí nào (bao gồm những nguyên nhân sau: sự sai lệch thông tin hậu quả trực tiếp hay gián tiếp gây ra) được phát sinh từ trang web chúng tôi liên quan đến những sản phẩm hay những dịch vụ được niêm yết trên trang này.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Chúng tôi không bảo đảm hay là người đại diện cho những sản phẩm phòng ở hay dịch vụ nào trên trang web hoặc các trang kết nối. Ở đây trách nhiệm của chúng tôi chỉ cho phép thực hiện việc đặt phòng. Chúng tôi không chịu trách nhiệm với lý do không có phòng trống vì khách sạn đã cho thuê vượt quá số phòng.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Trường hợp nhà cung cấp không cung cấp những dịch vụ đã được chúng tôi thay mặt cho khách hàng đặt trước (bao gồm và không giới hạn: phòng không còn trống, loại phòng không chính xác, …) hoặc khách hàng không nhận được dịch vụ như đã xác nhận, khách hàng có trách nhiệm thông báo cho chúng tôi ngay lập tức tại thời điểm xảy ra sự việc. Chúng tôi sẽ nỗ lực hết sức phối hợp với nhà cung cấp để cung cấp dịch vụ đúng như yêu cầu đã được xác nhận dựa vào chính sách, quy định của đối tác cung cấp tại thời điểm phát sinh. Trường hợp đã qua ngày hoàn tất dịch vụ (ngày trả phòng, ngày sử dụng dịch vụ, ...), chúng tôi có quyền từ chối hỗ trợ trừ khi có sự đồng ý từ phía nhà cung cấp. Chúng tôi sẽ thông báo cho khách hàng quyết định của nhà cung cấp cho các yêu cầu hỗ trợ của khách hàng. Chúng tôi không chịu trách nhiệm bồi thường cho các phát sinh xảy ra nếu khách hàng không thông báo cho chúng tôi theo quy định nêu trên hoặc do nhà cung cấp không đồng ý bồi thường.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        Trong trường hợp không cung cấp dịch vụ được do hết phòng, hết chỗ, hủy chuyến, ..., chúng tôi có quyền lựa chọn dịch vụ thay thế, đặt lại dịch vụ cho Quý Khách:
                    </p>
                    <p class="introduce__terms-sub-heading">
                        (i) Đặt dịch vụ thay thế cho Quý Khách với một nhà cung cấp khác tương đương.;
                    </p>
                    <p class="introduce__terms-sub-heading">
                        (ii) Trường hợp không có nhà cung cấp tương đương,chúng tôi sẽ đặt dịch vụ với một nhà cung cấp khác.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        (iii) Trường hợp Quý khách không đồng ý với (i) và (ii) hoặc không có dịch vụ thay thế, chúng tôi sẽ hoàn lại phần tiền Quý khách đã thanh toán cho dịch vụ Quý Khách chưa sử dụng.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        Tương đương được định nghĩa như sau:
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Đối với đặt phòng khách sạn: chỗ lưu trú tại khách sạn cùng hạng sao, ở cùng khu vực (tỉnh, thành phố), loại phòng có sức chứa giống nhau (số lượng khách), các dịch vụ bao gồm nhau: bữa ăn sáng/bữa ăn trưa/bữa ăn tối, ... (đảm bảo đủ số bữa, số lượng dịch vụ, không đảm bảo về món ăn, chi tiết dịch vụ). Giá trị/loại dịch vụ thay thế được xác định dựa trên giá công bố dịch vụ đó trên website hoặc các trang web online khác do chúng tôi xác định, vào thời điểm do chúng tôi xác định. Trường hợp khách hàng không đồng ý với dịch vụ thay thế, khách hàng có quyền hủy đơn đặt dịch vụ và nhận lại khoản tiền hoàn cho phần dịch vụ chưa sử dụng. Trường hợp khách hàng đã sử dụng dịch vụ, sẽ không được hoàn tiền.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Đối với phương tiện vận chuyển (Vé máy bay/ tàu lửa/ Xe khách...): thời gian khởi hành cho lựa chọn mới đúng hoặc chênh lệch +/- 3 tiếng so với giờ khởi hành ban đầu đã đặt dịch vụ. Hoặc dựa vào chính sách, quy định của nhà cung cấp tại thời điểm phát sinh.
                        Chúng tôi và các nhà cung cấp của chúng tôi sẽ nỗ lực hợp lý trong việc cập nhật Thông tin để đảm bảo thông tin được chính xác. Tuy nhiên, Thông tin của chúng tôi là do các nhà cung cấp Đặt phòng khách sạn cung cấp. Vì vậy:
                        Thông tin của chúng tôi có thể được thay đổi, bổ sung, sửa đổi hoặc xóa bất kỳ lúc nào, thông tin có thể không còn hoặc được thay đổi bất kỳ lúc nào mà không có thông báo và chúng tôi không chịu trách nhiệm pháp lý;
                        Chúng tôi khước từ toàn bộ trách nhiệm pháp lý về bất kỳ lỗi hay sự không chính xác nào liên quan đến Thông tin của chúng tôi (bao gồm nhưng không giới hạn ở giá Đặt phòng khách sạn, ảnh khách sạn, danh sách tiện nghi khách sạn và mô tả chung về khách sạn, …);
                        Chúng tôi không đảm bảo khả năng cung cấp của Đặt phòng khách sạn cụ thể;
                        Chúng tôi không cam đoan về tính phù hợp của Thông tin của chúng tôi cho bất kỳ mục đích nào;
                        Xếp hạng khách sạn hiển thị trong Thông tin của chúng tôi chỉ nhằm mục đích hướng dẫn chung dựa trên thông tin nhà cung cấp cập nhật và đánh giá khách quan, phù hợp từ khách hàng, chúng tôi không thể đảm bảo tính chính xác của các xếp hạng đó;
                        Khước từ mọi bảo đảm và điều kiện rằng Thông tin của chúng tôi, dịch vụ hay bất kỳ email nào mà chúng tôi gửi đều không chứa virus hay các thành phần độc hại khác và
                        Toàn bộ Thông tin và dịch vụ của chúng tôi đều được cung cấp “nguyên trạng” mà không có bất kỳ loại bảo đảm nào.
                        Chúng tôi công khai bảo lưu quyền sửa mọi lỗi về giá và/hoặc các Đặt phòng được thực hiện với mức giá không chính xác.Trong trường hợp như vậy, nếu có, Quý Khách sẽ có cơ hội giữ Đặt phòng với mức giá được sửa đổi hoặc quý vị có thể hủy đặt phòng mà không bị phạt tiền.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        Chúng tôi sẽ được miễn trừ nghĩa vụ cung cấp dịch vụ và bồi thường trong các trường hợp sau:
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Chúng tôi sẽ được miễn trừ nghĩa vụ cung cấp dịch vụ và bồi thường trong các trường hợp sau:
                    </p>
                    <p class="introduce__terms-sub-heading">
                        Quý Khách được lựa chọn một trong các phương án nhà cung cấp thông báo, có thể là hủy đơn đặt dịch vụ, hoàn lại một phần hay toàn bộ phí; hoặc bảo lưu dịch vụ để sử dụng vào thời điểm khác (có phụ thu hoặc không) hoặc phương án khác. chúng tôi sẽ thông báo các phương án này để Quý khách lựa chọn. Trong tất cả các trường hợp, chúng tôi sẽ giữ lại phí dịch vụ của chúng tôi và không hoàn lại.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Nếu có sự thay đổi lịch trình của các phương tiện vận chuyển công cộng như: tàu thuyền, tàu hỏa,.…theo thông báo từ phía nhà cung cấp, chúng tôi sẽ giữ quyền thay đổi lộ trình hoặc buộc phải thông báo hoãn hủy chuyến đi vì sự an toàn cho Quý khách.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Chuyến bay/xe/tàu bị chậm, hủy theo thông báo của hãng hàng không/tàu/xe ngoài tầm kiểm soát của chúng tôi.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Website không thông thông báo được cho hành khách về việc chậm, huỷ chuyến do hành khách không đăng ký địa chỉ hay thông tin liên lạc (email, số điện thoại); hoặc không liên hệ được với hành khách theo thông tin đã đăng ký.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Miễn trừ bồi thường cho khách bị từ chối trong trường hơp lý do từ hành khách (như tình trạng sức khỏe, dịch bệnh, việc khách không tuân thủ đúng điều lệ/ hợp đồng vận chuyển/quy định của nhà chức trách…), theo yêu cầu của nhà chức trách, an ninh hàng không, ...
                    </p>
                    <h4 class="introduce__terms-heading">
                        9. Bản quyền:
                    </h4>
                    <p class="introduce__terms-sub-heading">
                        - Những hình ảnh và nội dung trên website là không được phép sao chép hoặc được sử dụng lại với bất kỳ phiên bản nào khác mà chỉ được sử dụng trên trang web của chúng tôi.
                    </p>
                    <h4 class="introduce__terms-heading">
                        10. Chung:
                    </h4>
                    <p class="introduce__terms-sub-heading">
                        - Tất cả những điều khoản và điều kiện được công nhận bởi pháp luật Việt Nam. Chúng tôi nhận những thanh toán từ khách sạn thành viên từ việc cung cấp dịch vụ phòng đặt phòng của chúng tôi. Mọi thắc mắc liên hệ ngay với chúng tôi để xác nhận đặt phòng qua email. Thông tin chi tiết của chúng tôi về cách thức xử lý thông tin cá nhân xin Quý Khách tham khảo Chính sách quyền cá nhân.
                    </p>
                    <p class="introduce__terms-sub-heading">
                        - Các đặt phòng được đặt qua đối tác của chúng tôi sẽ tuân theo các điều kiện và điều khoản của đối tác.
                    </p>
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