-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2023 lúc 05:06 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `user_db`
--
CREATE DATABASE IF NOT EXISTS `user_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `user_db`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `ma_san_pham` varchar(255) NOT NULL,
  `ten_san_pham` varchar(10000) NOT NULL,
  `giatour` int(11) NOT NULL,
  `so_luong_nguoi` int(11) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(15) NOT NULL,
  `dia_chi` text NOT NULL,
  `phuong_thuc_thanh_toan` varchar(255) NOT NULL,
  `ngay_tao` datetime DEFAULT current_timestamp(),
  `tinh_trang` varchar(255) DEFAULT 'Chưa Duyệt',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `ma_san_pham`, `ten_san_pham`, `giatour`, `so_luong_nguoi`, `ho_ten`, `email`, `so_dien_thoai`, `dia_chi`, `phuong_thuc_thanh_toan`, `ngay_tao`, `tinh_trang`, `user_id`) VALUES
(40, '3', 'Khách sạn Pullman Vung Tau Beach Resort', 1100000, 0, 'anh đỗ', 'dovananh15042003@gmail.com', '096546520', 'nam định', 'Tiền Mặt', '2023-12-15 10:04:28', 'Chưa Duyệt', 21),
(41, '1234567', 'Du lịch Hang Sơn Đoòng', 18000000, 0, 'anh đỗ', 'dovananh15042003@gmail.com', '03266265', 'nam định', 'Tiền Mặt', '2023-12-15 10:05:14', 'Chưa Duyệt', 21),
(42, '123456', 'Du Lịch Sa Pa', 8300000, 0, 'anh đỗ', 'dovananh15042003@gmail.com', '03266265', 'nam định', 'Tiền Mặt', '2023-12-16 10:34:04', 'Đã Duyệt', 21),
(43, '4', 'Khách sạn FLC Grand Hotel Sapa', 1200000, 0, 'anh đỗ', 'dovananh15042003@gmail.com', '03266265', 'nam định', 'Tiền Mặt', '2023-12-15 12:34:12', 'Chưa Duyệt', 21),
(44, '12345678', 'Du lịch Vũng Tàu', 15000000, 0, 'anh đỗ', 'dovananh15042003@gmail.com', '03266265', 'nam định', 'Tiền Mặt', '2023-12-15 12:34:20', 'Chưa Duyệt', 21),
(45, '123456', 'Du Lịch Sa Pa', 24900000, 3, 'anh đỗ', 'dovananh15042003@gmail.com', '03266265', 'nam định', 'Tiền Mặt', '2023-12-15 14:28:44', 'Chưa Duyệt', 21),
(46, '1', 'Du lịch Hội An', 1, 1, 'anh đỗ', 'dovananh15042003@gmail.com', '03266265', 'nam định', 'Tiền Mặt', '2023-12-15 14:49:03', 'Chưa Duyệt', 21),
(47, '2', 'Khách sạn InterContinental Grand Vung Tau', 950000, 1, 'anh đỗ', 'dovananh15042003@gmail.com', '03266265', 'nam định', 'Tiền Mặt', '2023-12-15 14:53:31', 'Chưa Duyệt', 21),
(48, '1', 'Khách sạn Mường Thanh Grand Vũng Tàu1', 810000, 3, 'qeư', 'andho@gmail.com', '096546', 'ádf', 'Tiền Mặt', '2023-12-16 21:34:48', 'Chưa Duyệt', 21),
(50, '1', 'Du lịch Hội An', 1080000, 2, 'anh đỗ', 'dovananh15042003@gmail.com', '03266265', 'nam định', 'Tiền Mặt', '2023-12-16 21:39:59', 'Chưa Duyệt', 21),
(51, '2', 'Khách sạn InterContinental Grand Vung Tau', 950000, 4, 'anh đỗ', 'dovananh15042003@gmail.com', '03266265', 'nam định', 'Tiền Mặt', '2023-12-16 21:40:19', 'Chưa Duyệt', 21),
(52, '5', 'anhdo2k3', 13232321, 4, 'anh đỗ', 'dovananh15042003@gmail.com', '03266265', 'nam định', 'Tiền Mặt', '2023-12-16 21:44:30', 'Chưa Duyệt', 21),
(53, '1', 'Khách sạn Mường Thanh Grand Vũng Tàu1', 3240000, 4, 'anh đỗ', 'dovananh15042003@gmail.com', '03266265', 'nam định', 'Tiền Mặt', '2023-12-16 21:48:16', 'Chưa Duyệt', 21),
(54, '1', 'Du lịch Hội An', 4320000, 4, 'qeư', 'dovananh15042003@gmail.com', '096546', 'ádf', 'Tiền Mặt', '2023-12-17 00:07:03', 'Chưa Duyệt', 21),
(56, '1234567', 'Du lịch Hang Sơn Đoòng', 72000000, 4, 'qeư', 'dovananh15042003@gmail.com', '096546', 'ádf', 'Tiền Mặt', '2023-12-17 00:17:00', 'Chưa Duyệt', 21),
(57, '12345', 'Du lịch Đà Lạt', 5160000, 4, 'qeư', 'dovananh15042003@gmail.com', '096546', 'ádf', 'Tiền Mặt', '2023-12-17 00:28:38', 'Đã Duyệt', 23),
(58, '1', 'Du lịch Hội An', 4320000, 4, 'qeư', 'dovananh1504200113@gmail.com', '096546', 'ádf', 'Tiền Mặt', '2023-12-18 13:20:16', 'Chưa Duyệt', 23),
(59, '123456', 'Du Lịch Sa Pa', 8300000, 1, 'jk', 'dovananh15042003@gmail.com', '096546', 'kkk', 'online', '2023-12-18 13:26:53', 'Đã Duyệt', 23),
(60, '1', 'Khách sạn Mường Thanh Grand Vũng Tàu1', 792000, 0, 'qeư', 'dovananh15042003@gmail.com', '096546', 'ádf', 'Tiền Mặt', '2023-12-18 22:23:18', 'Chưa Duyệt', 21),
(61, '4', 'Khách sạn FLC Grand Hotel Sapa', 801000, 0, 'qeư', 'dovananh15042003@gmail.com', '096546', 'ádf', 'Tiền Mặt', '2023-12-19 00:08:36', 'Chưa Duyệt', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `sosao` int(11) NOT NULL,
  `giagoc` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `khuyenmai` int(11) NOT NULL,
  `thongtin` varchar(10000) NOT NULL,
  `note` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hotels`
--

INSERT INTO `hotels` (`id`, `ten`, `sosao`, `giagoc`, `image_url`, `diachi`, `khuyenmai`, `thongtin`, `note`) VALUES
(1, 'Khách sạn Mường Thanh Grand Vũng Tàu1', 5, 900000, '../img/img_khachsan/1.jpg', 'Vũng Tàu', 12, 'Khách sạn Mường Thanh Grand Vũng Tàu là một khách sạn 5 sao nằm ở thành phố Vũng Tàu, Việt Nam. Khách sạn nằm ở vị trí thuận tiện, ngay trung tâm thành phố, gần các bãi biển, các địa điểm tham quan nổi tiếng của Vũng Tàu.<br/>\r\n\r\n<b>Vị trí : </b><br/>\r\n\r\nKhách sạn Mường Thanh Grand Vũng Tàu nằm ở số 20 đường Trần Phú, phường 1, thành phố Vũng Tàu. Khách sạn nằm ngay trung tâm thành phố, cách bãi biển Bãi Sau chỉ 500m, cách bãi biển Bãi Trước chỉ 1km. Khách sạn cũng nằm gần các địa điểm tham quan nổi tiếng của Vũng Tàu như:<br/>\r\n\r\n-Tượng Chúa Kitô Vua<br/>\r\n-Cầu tàu Thích Ca Mâu Ni<br/>\r\n-Bãi Dứa<br/>\r\n-Hồ Mây<br/>\r\n-Tiện nghi<br/>\r\n\r\nKhách sạn Mường Thanh Grand Vũng Tàu có tổng cộng 450 phòng nghỉ và suites, được thiết kế sang trọng, hiện đại. Các phòng nghỉ đều có ban công riêng, tầm nhìn ra thành phố hoặc biển.<br/>\r\n\r\nKhách sạn cung cấp các dịch vụ và tiện nghi cao cấp, bao gồm:<br/>\r\n\r\n-Bể bơi ngoài trời<br/>\r\n-Bể bơi trong nhà<br/>\r\n-Spa<br/>\r\n-Phòng tập thể dục<br/>\r\n-Nhà hàng<br/>\r\n-Bar<br/>\r\n-Trung tâm hội nghị<br/>\r\n<b>Ẩm thực :</b><br/>\r\n\r\nKhách sạn Mường Thanh Grand Vũng Tàu có hệ thống nhà hàng phục vụ nhiều món ăn Á Âu. Nhà hàng cao cấp Mường Thanh phục vụ các món ăn đặc sản của Việt Nam và các món ăn quốc tế. Nhà hàng La Vista phục vụ các món ăn hải sản tươi ngon. Nhà hàng The Beer Club phục vụ các món ăn nhẹ và đồ uống.<br/>\r\n<b>Đánh giá</b><br/>\r\n\r\nKhách sạn Mường Thanh Grand Vũng Tàu là một khách sạn 5 sao uy tín, chất lượng, được nhiều du khách lựa chọn khi đến Vũng Tàu. Khách sạn có vị trí thuận tiện, tiện nghi cao cấp, dịch vụ tốt.', 'Khách sạn phục vụ 24/24. Thời gian nhận phòng vào 12h trong ngày, có thể trả phòng mọi lúc'),
(2, 'Khách sạn InterContinental Grand Vung Tau', 5, 1200000, '../img/img_khachsan/2.jpg', 'Vũng tàu', 12, 'Khách sạn InterContinental Grand Vung Tau là một khách sạn 5 sao nằm ở thành phố Vũng Tàu, Việt Nam. Khách sạn nằm ở vị trí đắc địa, ngay sát bờ biển Bãi Sau, là một trong những bãi biển đẹp nhất của Vũng Tàu.<br/>\r\n\r\n  <b>Vị trí:</b><br/>\r\n\r\nKhách sạn InterContinental Grand Vung Tau nằm ở số 20 đường Thùy Vân, phường Thắng Tam, thành phố Vũng Tàu. Khách sạn nằm ngay sát bờ biển Bãi Sau, cách trung tâm thành phố khoảng 3km.<br/>\r\n\r\n  <b>Tiện nghi :</b><br/>\r\n\r\nKhách sạn InterContinental Grand Vung Tau có tổng cộng 260 phòng nghỉ và suites, được thiết kế sang trọng, hiện đại. Các phòng nghỉ đều có ban công riêng, tầm nhìn ra biển.<br/>\r\n\r\nKhách sạn cung cấp các dịch vụ và tiện nghi cao cấp, bao gồm:<br/>\r\n\r\n-Bể bơi ngoài trời<br/>\r\n-Bể bơi trong nhà<br/>\r\n-Spa<br/>\r\n-Phòng tập thể dục<br/>\r\n-Nhà hàng<br/>\r\n-Bar<br/>\r\n-Trung tâm hội nghị<br/>\r\n-Ẩm thực<br/>\r\n\r\nKhách sạn InterContinental Grand Vung Tau có hệ thống nhà hàng phục vụ nhiều món ăn Á Âu. Nhà hàng The Lighthouse phục vụ các món ăn hải sản tươi ngon. Nhà hàng The Bay phục vụ các món ăn đặc sản của Việt Nam. Nhà hàng The Lounge phục vụ các món ăn nhẹ và đồ uống.<br/>\r\n\r\n  <b>Đánh giá :</b><br/>\r\n\r\nKhách sạn InterContinental Grand Vung Tau là một khách sạn 5 sao uy tín, chất lượng, được nhiều du khách lựa chọn khi đến Vũng Tàu. Khách sạn có vị trí đắc địa, tiện nghi cao cấp, dịch vụ tốt.<br/>\r\n\r\nDưới đây là một số điểm nổi bật của khách sạn InterContinental Grand Vung Tau:<br/>\r\n\r\nVị trí đắc địa, ngay sát bờ biển Bãi Sau\r\nThiết kế sang trọng, hiện đại\r\nTiện nghi cao cấp, đáp ứng nhu cầu của du khách\r\nDịch vụ tốt, nhân viên thân thiện, nhiệt tình', 'Khách sạn phục vụ 24/24. Thời gian nhận phòng vào 12h trong ngày, có thể trả phòng mọi lúc'),
(3, 'Khách sạn Pullman Vung Tau Beach Resort', 5, 1560000, '../img/img_khachsan/3.jpg', 'Vũng Tàu', 15, 'Khách sạn Pullman Vung Tau Beach Resort là một khách sạn 5 sao nằm ở thành phố Vũng Tàu, Việt Nam. Khách sạn nằm ở vị trí đắc địa, ngay sát bờ biển Bãi Sau, là một trong những bãi biển đẹp nhất của Vũng Tàu.<br/>\r\n\r\n<b>Vị trí :</b><br/>\r\n\r\nKhách sạn Pullman Vung Tau Beach Resort nằm ở số 1 đường Thùy Vân, phường Thắng Tam, thành phố Vũng Tàu. Khách sạn nằm ngay sát bờ biển Bãi Sau, cách trung tâm thành phố khoảng 3km.<br/>\r\n\r\n<b>Tiện nghi :</b><br/>\r\n\r\nKhách sạn Pullman Vung Tau Beach Resort có tổng cộng 300 phòng nghỉ và suites, được thiết kế sang trọng, hiện đại. Các phòng nghỉ đều có ban công riêng, tầm nhìn ra biển.<br/>\r\n\r\nKhách sạn cung cấp các dịch vụ và tiện nghi cao cấp, bao gồm:<br/>\r\n\r\n-Bể bơi ngoài trời<br/>\r\n-Bể bơi trong nhà<br/>\r\n-Spa<br/>\r\n-Phòng tập thể dục<br/>\r\n-Nhà hàng<br/>\r\n-Bar<br/>\r\n-Trung tâm hội nghị<br/>\r\n<b>Ẩm thực :</b>\r\n\r\nKhách sạn Pullman Vung Tau Beach Resort có hệ thống nhà hàng phục vụ nhiều món ăn Á Âu. Nhà hàng The Beach House phục vụ các món ăn hải sản tươi ngon. Nhà hàng The Square phục vụ các món ăn đặc sản của Việt Nam. Nhà hàng The Lounge phục vụ các món ăn nhẹ và đồ uống.<br/>\r\n\r\n<b>Đánh giá :</b><br/>\r\n\r\nKhách sạn Pullman Vung Tau Beach Resort là một khách sạn 5 sao uy tín, chất lượng, được nhiều du khách lựa chọn khi đến Vũng Tàu. Khách sạn có vị trí đắc địa, tiện nghi cao cấp, dịch vụ tốt.<br/>\r\n\r\nDưới đây là một số điểm nổi bật của khách sạn Pullman Vung Tau Beach Resort:<br/>\r\n\r\nVị trí đắc địa, ngay sát bờ biển Bãi Sau\r\nThiết kế sang trọng, hiện đại\r\nTiện nghi cao cấp, đáp ứng nhu cầu của du khách\r\nDịch vụ tốt, nhân viên thân thiện, nhiệt tình\r\nKhách sạn Pullman Vung Tau Beach Resort là một lựa chọn lý tưởng cho du khách khi đến Vũng Tàu.', 'Khách sạn phục vụ 24/24. Thời gian nhận phòng vào 12h trong ngày, có thể trả phòng mọi lúc'),
(4, 'Khách sạn FLC Grand Hotel Sapa', 5, 900000, '../img/img_khachsan/4.jpg', 'Thái Bình', 11, '\r\nKhách sạn FLC Grand Hotel Sapa là một khách sạn 5 sao nằm ở trung tâm thị trấn Sapa, Việt Nam. Khách sạn có thiết kế hiện đại, sang trọng, với tầm nhìn tuyệt đẹp ra dãy núi Hoàng Liên Sơn.<br/>\r\n\r\n<b>Vị trí :</b><br/>\r\n\r\nKhách sạn FLC Grand Hotel Sapa nằm ở số 206 đường Điện Biên Phủ, thị trấn Sapa, tỉnh Lào Cai. Khách sạn nằm ngay trung tâm thị trấn Sapa, cách Nhà thờ Đá Sapa chỉ 500m, cách núi Hàm Rồng chỉ 1km.<br/>\r\n\r\n<b>Tiện nghi :</b><br/>\r\n\r\nKhách sạn FLC Grand Hotel Sapa có tổng cộng 200 phòng nghỉ và suites, được thiết kế sang trọng, hiện đại. Các phòng nghỉ đều có ban công riêng, tầm nhìn ra dãy núi Hoàng Liên Sơn.<br/>\r\n\r\n<b>Khách sạn cung cấp các dịch vụ và tiện nghi cao cấp, bao gồm:</b><br/>\r\n\r\n-Bể bơi ngoài trời<br/>\r\n-Bể bơi trong nhà<br/>\r\n-Spa<br/>\r\n-Phòng tập thể dục<br/>\r\n-Nhà hàng<br/>\r\n-Bar<br/>\r\n-Trung tâm hội nghị<br/>\r\n-Ẩm thực<br/>\r\n\r\nKhách sạn FLC Grand Hotel Sapa có hệ thống nhà hàng phục vụ nhiều món ăn Á Âu. Nhà hàng The Peak phục vụ các món ăn đặc sản của Việt Nam và các món ăn quốc tế. Nhà hàng The Valley phục vụ các món ăn hải sản tươi ngon. Nhà hàng The Lounge phục vụ các món ăn nhẹ và đồ uống.<br/>\r\n\r\n<b>Đánh giá :</b><br/>\r\n\r\nKhách sạn FLC Grand Hotel Sapa là một khách sạn 5 sao uy tín, chất lượng, được nhiều du khách lựa chọn khi đến Sapa. Khách sạn có vị trí thuận tiện, thiết kế sang trọng, tiện nghi cao cấp, dịch vụ tốt.<br/>\r\n\r\n<b>Dưới đây là một số điểm nổi bật của khách sạn FLC Grand Hotel Sapa:</b><br/>\r\n\r\nVị trí thuận tiện, ngay trung tâm thị trấn Sapa\r\nThiết kế hiện đại, sang trọng\r\nTầm nhìn tuyệt đẹp ra dãy núi Hoàng Liên Sơn\r\nTiện nghi cao cấp, đáp ứng nhu cầu của du khách\r\nDịch vụ tốt, nhân viên thân thiện, nhiệt tình', 'Khách sạn phục vụ 24/24. Thời gian nhận phòng vào 12h trong ngày, có thể trả phòng mọi lúc'),
(5, 'anhdo2k3', 12, 12222, '../img/img_gioithieu/img_gioithieu3.jpg', 'nam định', 12, 'ádf', 'sadf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `ten_dv` varchar(255) NOT NULL,
  `ten_kh` varchar(255) NOT NULL,
  `sdt` int(13) NOT NULL,
  `note` text NOT NULL,
  `trangthai` varchar(255) DEFAULT 'Chưa tư vấn!'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `ten_dv`, `ten_kh`, `sdt`, `note`, `trangthai`) VALUES
(1, 'Tour du lịch', 'nguyenthequang', 971625535, 'Tôi cần tư vấn về lịch trình', 'Đã tư vấn!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `diemxuatphat` varchar(255) NOT NULL,
  `thoigian` varchar(50) NOT NULL,
  `phuongtien` varchar(50) NOT NULL,
  `khuyenmai` int(11) DEFAULT 0,
  `giagoc` int(255) NOT NULL,
  `khoihanh` varchar(255) NOT NULL,
  `thongtin` varchar(10000) NOT NULL,
  `ghichu` varchar(1000) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tours`
--

INSERT INTO `tours` (`id`, `ten`, `diemxuatphat`, `thoigian`, `phuongtien`, `khuyenmai`, `giagoc`, `khoihanh`, `thongtin`, `ghichu`, `image_url`) VALUES
(1, 'Du lịch Hội An', 'Hà Nội', '10 ngày', 'Ô tô', 11, 1200000, '06h - 20/11/2023', 'Hội An, nằm ở tỉnh Quảng Nam, là một thành phố cổ cực kỳ quyến rũ tại Việt Nam.\r\n                            Với kiến trúc hoàn toàn cổ điển và lịch sử lâu đời, Hội An thu hút du khách bằng những con đường đá cổ, ngôi chùa và đền thờ, cùng với hệ thống cầu gỗ lấp lánh và ngôi nhà cổ có tuổi đời hàng trăm năm.\r\n                            Nơi đây nổi tiếng với các ngôi nhà gỗ cổ kính, hoa lơi trắng bên sông Hoài, và hệ thống đèn lồng lấp lánh khi về đêm. Không chỉ về kiến trúc, Hội An còn nổi tiếng với các món ăn độc đáo và hương vị truyền thống, chẳng hạn như Cao lầu và Bánh mì Phượng.\r\n                            Hội An cũng là một trung tâm thương mại và thương mại cổ kính với những ngôi chợ đêm sôi động và các cửa hàng thủ công truyền thống, nơi bạn có thể mua sắm các sản phẩm thủ công độc đáo và thú vị.\r\n                            Đến Hội An, bạn sẽ được tham quan một phần quý giá của di sản văn hóa Việt Nam và trải nghiệm không gian đẹp mê hồn của một trong những thành phố cổ đẹp nhất châu Á.', 'Commbo Tour du lịch trên đã bao gồm: phương tiên di chuyển, bữa ăn trong ngày và phí dịch vụ.', '../img/img_tour/hoi-an.jpg'),
(12345, 'Du lịch Đà Lạt', 'Hà Nội', '2 ngày 1 đêm', 'Ô tô', 14, 1500000, '06h - 20/11/2023', 'Đà Lạt là một thành phố trực thuộc tỉnh Lâm Đồng, nằm trên cao nguyên Lâm Viên, ở độ cao 1.500 m so với mặt nước biển. Đà Lạt được mệnh danh là \"thành phố ngàn hoa\", \"xứ sở sương mù\" và \"tiểu Paris của Việt Nam\".<br /> <br />\r\n\r\n<b>-Vị trí địa lý :</b><br/>\r\n\r\nĐà Lạt nằm ở phía nam Tây Nguyên, cách thành phố Hồ Chí Minh khoảng 250 km về phía đông bắc. Thành phố có diện tích tự nhiên 393,29 km², bao bọc bởi các dãy núi cao và hồ nước.<br/>\r\n\r\n<b>-Khí hậu :</b><br/>\r\n\r\nĐà Lạt có khí hậu ôn hòa, mát mẻ quanh năm. Nhiệt độ trung bình năm dao động từ 18 đến 23 độ C. Mùa hè (từ tháng 5 đến tháng 9) mát mẻ, không có nắng nóng gay gắt. Mùa đông (từ tháng 11 đến tháng 4 năm sau) lạnh nhưng không quá khắc nghiệt.<br/>\r\n\r\n<b>-Đặc điểm tự nhiên :</b><br/>\r\n\r\nĐà Lạt có cảnh quan thiên nhiên tươi đẹp, với những rừng thông bạt ngàn, hồ nước trong xanh, thác nước hùng vĩ. Thành phố cũng có nhiều loài hoa đẹp, đặc biệt là hoa dã quỳ, hoa mai anh đào, hoa phượng tím,...<br/>\r\n\r\n<b>-Lịch sử :</b><br/>\r\n\r\nĐà Lạt được người Pháp phát hiện vào năm 1893 và được xây dựng thành một khu nghỉ dưỡng. Thành phố nhanh chóng trở thành một điểm đến du lịch nổi tiếng của Việt Nam và thế giới.<br/>\r\n\r\n<b>-Du lịch :</b><br/>\r\n\r\nĐà Lạt là một thành phố du lịch nổi tiếng của Việt Nam. Thành phố có nhiều điểm tham quan hấp dẫn, bao gồm:\r\n\r\nHồ Xuân Hương: Hồ Xuân Hương là hồ nước nhân tạo lớn nhất Đà Lạt, nằm ở trung tâm thành phố. Hồ có phong cảnh hữu tình, là nơi lý tưởng để đi dạo, ngắm cảnh và chụp ảnh.\r\nThác Datanla: Thác Datanla là một thác nước hùng vĩ, nằm cách trung tâm thành phố khoảng 10 km. Thác có độ cao 40 m, với dòng nước chảy mạnh và tung bọt trắng xóa.\r\nThung lũng Tình Yêu: Thung lũng Tình Yêu là một địa điểm du lịch lãng mạn, nằm cách trung tâm thành phố khoảng 7 km. Thung lũng có phong cảnh thơ mộng, với những hồ nước, đồi thông và rừng thông.\r\nNhà thờ Con Gà: Nhà thờ Con Gà là một nhà thờ Công giáo nổi tiếng, nằm ở trung tâm thành phố. Nhà thờ có kiến trúc độc đáo, với chóp chuông cao và mái ngói màu đỏ.\r\nGa Đà Lạt: Ga Đà Lạt là một ga xe lửa cổ kính, được xây dựng vào năm 1933. Ga có kiến trúc Pháp cổ điển, là một trong những biểu tượng của Đà Lạt.<br/>\r\n<b>-Ẩm thực</b><br/>\r\n\r\nĐà Lạt có nền ẩm thực phong phú, với nhiều món ăn ngon, đặc trưng. Một số món ăn nổi tiếng của Đà Lạt bao gồm:\r\n\r\nBánh mì xíu mại: Đây là một món ăn đường phố nổi tiếng của Đà Lạt. Bánh mì xíu mại có vị thơm ngon, với bánh mì giòn rụm, xíu mại đậm đà và nước súp ngọt thanh.\r\nLẩu bò: Lẩu bò là một món ăn đặc trưng của Đà Lạt. Lẩu bò có vị thơm ngon, với nước dùng đậm đà, thịt bò mềm và rau tươi.\r\nBánh căn: Bánh căn là một món ăn dân dã của Đà Lạt. Bánh căn có vị thơm ngon, với lớp vỏ giòn rụm, nhân bánh đậm đà.\r\nBánh ướt lòng gà: Bánh ướt lòng gà là một món ăn sáng nổi tiếng của Đà Lạt. Bánh ướt mềm mịn, lòng gà ngọt thơm và nước chấm đậm đà.\r\nChè: Đà Lạt có nhiều món chè ngon, đặc trưng. Một số món chè nổi tiếng của Đà Lạt bao gồm chè thập cẩm, chè bưởi, chè đậu xanh,...', 'Commbo Tour du lịch trên đã bao gồm: phương tiên di chuyển, bữa ăn trong ngày và phí dịch vụ.', '../img/img_modal/da_lat.jpg'),
(123456, 'Du Lịch Sa Pa', 'Hà Nội', '2 ngày 1 đêm', 'Ô tô', 17, 10000000, '06h - 20/11/2023', '<b>Sapa – Thành phố ngàn hoa, xứ sở sương mù</b><br/>\r\n\r\nSapa là một thành phố trực thuộc tỉnh Lào Cai, Việt Nam. Nằm ở độ cao 1.500m so với mực nước biển, Sapa được mệnh danh là “thành phố ngàn hoa”, “xứ sở sương mù”. Nơi đây nổi tiếng với khí hậu mát mẻ quanh năm, cảnh quan thiên nhiên tươi đẹp và nền văn hóa đa dạng của các dân tộc thiểu số.<br/>\r\n\r\n<b>Vị trí địa lý :</b><br/>\r\n\r\nSapa nằm ở phía Tây Bắc của Việt Nam, cách thành phố Lào Cai khoảng 38km về phía Tây. Thành phố có diện tích tự nhiên 373,5km², bao bọc bởi các dãy núi cao và rừng nguyên sinh.<br/>\r\n\r\n<b>Khí hậu :</b> <br/> \r\n\r\nSapa có khí hậu ôn hòa, mát mẻ quanh năm, nhiệt độ trung bình dao động từ 15 đến 25 độ C. Mùa hè (từ tháng 5 đến tháng 9) mát mẻ, không có nắng nóng gay gắt. Mùa đông (từ tháng 10 đến tháng 4 năm sau) lạnh nhưng không quá khắc nghiệt.<br/>\r\n\r\n<b>Đặc điểm tự nhiên :</b><br/>\r\n\r\nSapa có cảnh quan thiên nhiên tươi đẹp, với những rừng thông bạt ngàn, hồ nước trong xanh, thác nước hùng vĩ. Thành phố cũng có nhiều loài hoa đẹp, đặc biệt là hoa dã quỳ, hoa mai anh đào, hoa phượng tím,...<br/>\r\n\r\n<b>Lịch sử :</b><br/>\r\n\r\nSapa được người Pháp phát hiện vào năm 1915 và được xây dựng thành một khu nghỉ dưỡng. Thành phố nhanh chóng trở thành một điểm đến du lịch nổi tiếng của Việt Nam và thế giới.<br/>\r\n\r\n<b>Du lịch :</b><br/>\r\n\r\nSapa là một thành phố du lịch nổi tiếng của Việt Nam. Thành phố có nhiều điểm tham quan hấp dẫn, bao gồm:<br/>\r\n\r\n-Hồ Xuân Hương: Hồ Xuân Hương là hồ nước nhân tạo lớn nhất Sapa, nằm ở trung tâm thành phố. Hồ có phong cảnh hữu tình, là nơi lý tưởng để đi dạo, ngắm cảnh và chụp ảnh.<br/>\r\n\r\n-Thác Bạc: Thác Bạc là một thác nước hùng vĩ, nằm cách trung tâm thành phố khoảng 12km. Thác có độ cao 200m, với dòng nước chảy trắng xóa.<br/>\r\n\r\n-Thung lũng Mường Hoa: Thung lũng Mường Hoa là một thung lũng rộng lớn, nằm ở phía Bắc của Sapa. Thung lũng có phong cảnh thơ mộng, với những thửa ruộng bậc thang, những ngôi làng nhỏ của người dân tộc thiểu số.<br/>\r\n\r\n-Núi Hàm Rồng: Núi Hàm Rồng là một ngọn núi cao, nằm ở trung tâm Sapa. Núi có phong cảnh hùng vĩ, với những vách đá dựng đứng, những hang động kỳ bí.<br/>\r\n\r\n\r\n-Cổng trời: Cổng trời là một địa điểm du lịch nổi tiếng, nằm ở phía Bắc của Sapa. Cổng trời có phong cảnh hùng vĩ, với những dãy núi trùng điệp, những cánh đồng lúa chín vàng.<br/>\r\n\r\n\r\nSapa có nền ẩm thực phong phú, với nhiều món ăn ngon, đặc trưng. Một số món ăn nổi tiếng của Sapa bao gồm:<br/>\r\n\r\n-Bánh chưng đen: Bánh chưng đen là món ăn truyền thống của người dân tộc thiểu số ở Sapa. Bánh được làm từ gạo nếp đen, thịt lợn, đậu xanh và các loại gia vị.<br/>\r\n\r\n-Thịt trâu gác bếp: Thịt trâu gác bếp là món ăn đặc sản của người dân tộc thiểu số ở Sapa. Thịt được thái lát mỏng, tẩm ướp gia vị và gác lên bếp củi để hun khói.<br/>\r\n\r\n-Cá hồi Sapa: Cá hồi Sapa được nuôi tại các trang trại ở Sapa. Cá có thịt chắc, thơm ngon, giàu dinh dưỡng.', 'Commbo Tour du lịch trên đã bao gồm: phương tiên di chuyển, bữa ăn trong ngày và phí dịch vụ.', '../img/img_modal/sa_pa.jpg'),
(1234567, 'Du lịch Hang Sơn Đoòng', 'Hà Nội', '2 ngày 1 đêm', 'Ô tô', 10, 20000000, '06h - 20/11/2023', 'Hang Sơn Đoòng là hang động lớn nhất thế giới, nằm trong lòng khu vực núi đá vôi Phong Nha-Kẻ Bàng, tỉnh Quảng Bình, Việt Nam. Hang được phát hiện vào năm 2009 bởi một nhóm thám hiểm người Anh dẫn đầu bởi Howard Limbert.\r\n\r\nKích thước và đặc điểm\r\n\r\nHang Sơn Đoòng có chiều dài 9.144 mét, cao từ 200 đến 250 mét và rộng từ 150 đến 200 mét. Thể tích của hang ước tính khoảng 38,5 triệu mét khối, lớn hơn hang Deer ở Malaysia gần 2 lần. Bên trong hang có một hệ thống sông ngầm, thác nước và cả một khu rừng nguyên sinh.\r\n\r\nHệ sinh thái độc đáo\r\n\r\nHang Sơn Đoòng là nơi cư trú của nhiều loài sinh vật quý hiếm, bao gồm cá, côn trùng, bò sát và động vật có vú. Trong số đó, có những loài chưa từng được ghi nhận ở bất kỳ nơi nào khác trên thế giới.\r\n\r\nĐiểm tham quan nổi tiếng\r\n\r\nHang Sơn Đoòng có nhiều điểm tham quan nổi tiếng, bao gồm:\r\n\r\nKhối nhũ đá \"Chân chó\": Đây là khối nhũ đá khổng lồ cao khoảng 70 mét, nằm ở khu vực Hồ Sứt.\r\nThác Thiên Đường: Đây là một thác nước cao khoảng 100 mét, nằm ở khu vực cuối cùng của hành trình khám phá hang Sơn Đoòng.\r\nSông ngầm: Sông ngầm trong hang Sơn Đoòng dài khoảng 2,5 km, có dòng chảy khá mạnh.', 'Commbo Tour du lịch trên đã bao gồm: phương tiên di chuyển, bữa ăn trong ngày và phí dịch vụ.', '../img/img_modal/son_doong.jpg'),
(12345678, 'Du lịch Vũng Tàu', 'Hà Nội', '2 ngày 1 đêm', 'Ô tô', 14, 1250000, '06h - 20/11/2023', 'Vũng Tàu – Thành phố biển xinh đẹp của Việt Nam\r\n\r\nVũng Tàu là một thành phố ven biển thuộc tỉnh Bà Rịa – Vũng Tàu, Việt Nam. Thành phố nằm ở phía đông nam của bán đảo Đông Dương, cách thành phố Hồ Chí Minh khoảng 120km về phía đông. Vũng Tàu được mệnh danh là “thành phố biển xinh đẹp”, “hòn ngọc Viễn Đông”.<br/>\r\n\r\n<b>-Vị trí địa lý:</b>\r\n\r\nVũng Tàu nằm ở phía đông nam của bán đảo Đông Dương, có diện tích tự nhiên 572km². Thành phố có bờ biển dài khoảng 50km, với nhiều bãi biển đẹp, nổi tiếng như Bãi Sau, Bãi Trước, Bãi Dứa,...<br/>\r\n\r\n<b>-Khí hậu:</b>\r\n\r\nVũng Tàu có khí hậu nhiệt đới gió mùa, với hai mùa rõ rệt: mùa mưa (từ tháng 5 đến tháng 10) và mùa khô (từ tháng 11 đến tháng 4 năm sau). Mùa mưa ở Vũng Tàu không kéo dài và không có mưa to, bão lớn.<br/>\r\n\r\n<b>-Đặc điểm tự nhiên :</b><br/>\r\n\r\nVũng Tàu có cảnh quan thiên nhiên tươi đẹp, với những bãi biển cát trắng, nước trong xanh, những ngọn núi cao, những rừng cây xanh mát. Thành phố cũng có nhiều di tích lịch sử và văn hóa, danh lam thắng cảnh nổi tiếng.<br/>\r\n\r\n<b>-Lịch sử :</b><br/>\r\n\r\nVũng Tàu được người Pháp phát hiện vào cuối thế kỷ 19 và được xây dựng thành một khu nghỉ dưỡng. Thành phố nhanh chóng trở thành một điểm đến du lịch nổi tiếng của Việt Nam và thế giới.<br/>\r\n\r\n<b>-Du lịch :</b><br/>\r\n\r\nVũng Tàu là một thành phố du lịch nổi tiếng của Việt Nam. Thành phố có nhiều điểm tham quan hấp dẫn, bao gồm:<br/>\r\n\r\nBãi biển Bãi Sau: Bãi Sau là bãi biển nổi tiếng nhất của Vũng Tàu. Bãi biển có cát trắng mịn, nước trong xanh, là nơi lý tưởng để tắm biển, nghỉ dưỡng.<br/>\r\n\r\nBãi biển Bãi Sau, Vũng Tàu<br/>\r\nBãi biển Bãi Trước: Bãi Trước là bãi biển nằm ngay trung tâm thành phố Vũng Tàu. Bãi biển có phong cảnh thơ mộng, là nơi lý tưởng để dạo chơi, ngắm cảnh.<br/>\r\n\r\nBãi biển Bãi Dứa: Bãi Dứa là bãi biển nằm ở phía đông của thành phố Vũng Tàu. Bãi biển có phong cảnh hoang sơ, là nơi lý tưởng để ngắm san hô.\r\n<br/>\r\nBãi biển Bãi Dứa, Vũng Tàu\r\nCầu tàu Thích Ca Mâu Ni: Cầu tàu Thích Ca Mâu Ni là một địa điểm du lịch nổi tiếng của Vũng Tàu. Cầu tàu có kiến trúc độc đáo, là nơi lý tưởng để ngắm biển, chụp ảnh.<br/>\r\n\r\nCầu tàu Thích Ca Mâu Ni, Vũng Tàu\r\nTượng Chúa Kitô Vua: Tượng Chúa Kitô Vua là một biểu tượng của thành phố Vũng Tàu. Tượng có chiều cao 32m, là bức tượng Chúa Kitô cao nhất Việt Nam.\r\n<br/>\r\n<b>-Ẩm thực:</b><br/>\r\n\r\nVũng Tàu có nền ẩm thực phong phú, với nhiều món ăn ngon, đặc trưng. Một số món ăn nổi tiếng của Vũng Tàu bao gồm:<br/>\r\n\r\nBánh khọt: Bánh khọt là món ăn đặc sản của Vũng Tàu. Bánh được làm từ bột gạo, đổ khuôn và chiên vàng giòn.<br/>\r\n\r\nBánh khọt Vũng Tàu<br/>\r\nLẩu cá đuối: Lẩu cá đuối là món ăn đặc sản của Vũng Tàu. Lẩu được nấu từ cá đuối tươi, với nước dùng chua cay, thơm ngon.<br/>\r\n\r\nLẩu cá đuối Vũng Tàu<br/>\r\nBún chả cá: Bún chả cá là món ăn đặc sản của Vũng Tàu. Bún được ăn kèm với chả cá, nước dùng chua cay, thơm ngon.', 'Commbo Tour du lịch trên đã bao gồm: phương tiên di chuyển, bữa ăn trong ngày và phí dịch vụ.', '../img/img_modal/vung_tau.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_form`
--

CREATE TABLE `user_form` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `phone`, `email`, `password`, `roles`) VALUES
(21, 'testuse1', '0965456280', 'dovananh150420023@gmail.com', '$2y$10$U3z61aQKDfEKoIWc2CTQaeR5dJ5aIIZT4AutyL.uGUmBT8s3jVUEu', 'user'),
(23, 'anhdo1', '0965456280', 'dovananh15042003@gmail.com', '$2y$10$L44vbBD3gBUGiEwObjBjJu4fi26fD63bBRk.ToQOCwh1HI2H8.ax.', ''),
(25, 'dovananh12', '0965456280', 'dovananh15042003@gmail.com', '$2y$10$eyGOyTqnZx4fyBM8EqE7AOgsK6IGet/o.DrOu/LzmZjU2sjyT1..2', 'user'),
(27, 'admin', '0965456280', 'dovananh150412003@gmail.com', '$2y$10$yM0OEdDqUbTyEO2X0uqVg.lq2Uo2uNrMwnArcRrhJg27Yja2MgNfC', 'admin'),
(28, 'testuse2003', '0965456280', 'dovananh150432003@gmail.com', '$2y$10$dcd2di2fJQdGpdZY/j1pZeez9RHgJnWoZeWGd0BAbfuvEp25e/oZq', 'user'),
(30, 'anhdo', '0965456280', 'dovananh12003@gmail.com', '$2y$10$cNBtlqCAJozYeJhKYUHK4OdcVJEoZOehBe3m6PyEyIh1l5eLKgb.q', 'admin'),
(32, 'quang', '0965456280', 'andho@gmail.com', '$2y$10$y0hNgOkQse6kvUyP8KXprurLNo3Xd3/r6VF7yFMfJXp1HDHi5RNw2', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345682;

--
-- AUTO_INCREMENT cho bảng `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
