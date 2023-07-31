-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 27, 2023 lúc 10:07 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tpshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `lever` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `lever`) VALUES
(1, 'Ethan', 'Ethan@gmail.com', 'EthanUser', '1', 0),
(2, 'admin', 'admin@gmail.com', 'admin', 'admin', 0),
(9999999, 'Ethan', 'ethanadmin@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(11, 'Apple'),
(12, 'Samsung'),
(13, 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(18, 'Phone'),
(19, 'Ipad'),
(20, 'Macbook');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(20, 1, 24, 'iPhone 14 Pro Max 128GB Chính hãng (VN/A)', '27090000', '1b857f89ce.jpg'),
(21, 1, 37, 'Samsung Galaxy Z Fold4 5G (12GB | 1TB)', '29999000', 'e761e714ba.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_coupon`
--

CREATE TABLE `tbl_coupon` (
  `id` int(11) NOT NULL,
  `couponCode` varchar(50) NOT NULL,
  `discountAmount` decimal(10,2) NOT NULL,
  `releaseDate` date NOT NULL,
  `expiredDate` date NOT NULL,
  `notes` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`id`, `couponCode`, `discountAmount`, `releaseDate`, `expiredDate`, `notes`) VALUES
(4, 'JULYSUMMER2023', 30.00, '2023-07-18', '2023-07-31', 'Giảm giá tháng 7 30% cho hóa đơn.'),
(5, 'juneSUMMER2023', 30.00, '2023-07-18', '2023-07-31', 'Giảm giá tháng 6 30% cho hóa đơn.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `phoneNumber` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userImage` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `fullName`, `phoneNumber`, `username`, `password`, `email`, `userImage`, `address`) VALUES
(10, 'Nguyen Thi Linh Phuong', '0128387424', 'linhphuong', 'c4ca4238a0b923820dcc509a6f75849b', 'linhphuong@gmail.com', '6dfe36c3a8.jpg', 'Công viên phần mềm Quang Trung'),
(12, 'User', 'none', 'username12', 'e199aa8351d99658dd861e561d87dba9', 'none@gmail.com', 'faceIcon.jpg', '1/1 blabla bla bla'),
(13, 'Đại Gia Tiền Lẻ', '1234568909', 'ethan', 'c4ca4238a0b923820dcc509a6f75849b', 'admin@gmail.com', 'edf5967b33.jpg', '1/1 blabla bla bla'),
(14, 'Admin', '1231456789', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin@gmail.com', 'faceIcon.jpg', ''),
(15, 'namnt', '123456789', 'nam', 'c4ca4238a0b923820dcc509a6f75849b', 'namnt@gmail.com', 'faceIcon.jpg', ''),
(16, 'Nguyễn Văn A', '123456789', 'nguyenvana', 'c4ca4238a0b923820dcc509a6f75849b', 'nguyenvana@gmail.com', 'faceIcon.jpg', '1/1 A Quang Trung'),
(17, 'Nguyễn Văn B', '123456789', 'nguyenvanb', 'c4ca4238a0b923820dcc509a6f75849b', 'nguyenvanb@gmail.com', '90999cda65.png', '1/1B Quang Trung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `orderId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(121744, 36, 121755, 'Samsung Galaxy S22 Ultra 5G (12GB | 256GB)', 10, 1, '16489000', 'trang_4k05-pq.jpg', 2, '2023-06-28 04:07:37'),
(121745, 36, 121755, 'Samsung Galaxy S22 Ultra 5G (12GB | 256GB)', 10, 1, '16489000', 'trang_4k05-pq.jpg', 1, '2023-07-06 19:14:41'),
(121746, 36, 121755, 'Samsung Galaxy S22 Ultra 5G (12GB | 256GB)', 10, 1, '16489000', 'trang_4k05-pq.jpg', 0, '2023-07-06 19:41:20'),
(121747, 30, 27, 'iPhone 14 Plus 512GB Chính Hãng (VN/A)', 10, 1, '29909000', 'iphone1.jpeg', 0, '2023-07-06 19:41:20'),
(121748, 25, 27, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 17, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-09 18:23:33'),
(121749, 35, 0, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 17, 1, '14298900', 'den_oz8l-qv.jpg', 0, '2023-07-09 18:23:33'),
(121750, 25, 0, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-11 19:25:23'),
(121751, 35, 0, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 10, 1, '14298900', 'den_oz8l-qv.jpg', 0, '2023-07-11 19:25:23'),
(121752, 25, 0, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-18 14:54:57'),
(121753, 34, 0, 'Xiaomi 12T', 10, 1, '13189000', 'note-12.jpg', 0, '2023-07-18 14:54:57'),
(121754, 33, 0, 'iPhone 14 512GB Chính Hãng (VN/A)', 10, 1, '27489000', 'iphone-14-plus-128gb-mau-do-didongviet_1.webp', 0, '2023-07-18 15:00:36'),
(121755, 35, 0, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 10, 1, '14298900', 'den_oz8l-qv.jpg', 0, '2023-07-18 15:00:36'),
(121756, 25, 0, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-19 05:01:17'),
(121757, 31, 0, 'iPhone 14 Plus 256GB  Chính Hãng (VN/A)', 10, 1, '27269000', 'iphone-13-pro-128gb-mau-bac-didongviet.webp', 0, '2023-07-19 05:01:17'),
(121758, 34, 0, 'Xiaomi 12T', 10, 1, '13189000', 'note-12.jpg', 0, '2023-07-19 05:05:49'),
(121759, 33, 0, 'iPhone 14 512GB Chính Hãng (VN/A)', 10, 1, '27489000', 'iphone-14-plus-128gb-mau-do-didongviet_1.webp', 0, '2023-07-19 05:05:49'),
(121760, 34, 0, 'Xiaomi 12T', 10, 1, '13189000', 'note-12.jpg', 0, '2023-07-19 05:07:00'),
(121761, 33, 0, 'iPhone 14 512GB Chính Hãng (VN/A)', 10, 1, '27489000', 'iphone-14-plus-128gb-mau-do-didongviet_1.webp', 0, '2023-07-19 05:07:00'),
(121762, 29, 0, 'iPad Pro M2 11-inch (2022) | 1TB 5G', 10, 1, '54989000', 'iPad-Pro-11-(2022)-5G-128GB-gray1459717503.jpg', 0, '2023-07-19 05:17:03'),
(121763, 28, 0, 'iPad Gen 9 2021 | Wifi 64GB', 10, 1, '7469000', 'iPad-Air-Gen-5-WF-pik-2.jpg', 0, '2023-07-19 05:17:03'),
(121764, 25, 0, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-19 05:18:31'),
(121765, 34, 0, 'Xiaomi 12T', 10, 1, '13189000', 'note-12.jpg', 0, '2023-07-19 05:18:31'),
(121766, 25, 0, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-19 05:21:06'),
(121767, 31, 0, 'iPhone 14 Plus 256GB  Chính Hãng (VN/A)', 10, 1, '27269000', 'iphone-13-pro-128gb-mau-bac-didongviet.webp', 0, '2023-07-19 05:22:55'),
(121768, 31, 0, 'iPhone 14 Plus 256GB  Chính Hãng (VN/A)', 10, 1, '27269000', 'iphone-13-pro-128gb-mau-bac-didongviet.webp', 0, '2023-07-19 05:44:29'),
(121769, 35, 0, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 10, 1, '14298900', 'den_oz8l-qv.jpg', 0, '2023-07-19 05:46:43'),
(121770, 25, 0, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-19 06:06:11'),
(121771, 29, 0, 'iPad Pro M2 11-inch (2022) | 1TB 5G', 10, 1, '54989000', 'iPad-Pro-11-(2022)-5G-128GB-gray1459717503.jpg', 0, '2023-07-19 06:06:11'),
(121772, 25, 26, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-19 06:32:55'),
(121773, 25, 27, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-19 06:39:07'),
(121774, 34, 28, 'Xiaomi 12T', 10, 1, '13189000', 'note-12.jpg', 0, '2023-07-19 06:50:34'),
(121775, 25, 29, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-19 07:16:50'),
(121776, 34, 34, 'Xiaomi 12T', 10, 1, '13189000', 'note-12.jpg', 0, '2023-07-20 18:40:03'),
(121777, 25, 34, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-20 18:40:03'),
(121778, 25, 35, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-20 18:50:49'),
(121779, 25, 36, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-20 21:02:55'),
(121780, 30, 37, 'iPhone 14 Plus 512GB Chính Hãng (VN/A)', 10, 6, '179454000', 'iphone1.jpeg', 2, '2023-07-20 21:49:24'),
(121781, 35, 38, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 10, 1, '14298900', 'den_oz8l-qv.jpg', 2, '2023-07-20 22:02:43'),
(121782, 34, 39, 'Xiaomi 12T', 10, 1, '13189000', 'note-12.jpg', 0, '2023-07-20 22:03:25'),
(121783, 35, 40, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 10, 1, '14298900', 'den_oz8l-qv.jpg', 0, '2023-07-20 22:04:56'),
(121784, 25, 42, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 2, '2023-07-21 03:59:57'),
(121785, 31, 42, 'iPhone 14 Plus 256GB  Chính Hãng (VN/A)', 10, 1, '27269000', 'iphone-13-pro-128gb-mau-bac-didongviet.webp', 0, '2023-07-21 03:59:57'),
(121786, 25, 43, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-21 04:37:07'),
(121787, 35, 43, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 10, 1, '14298900', 'den_oz8l-qv.jpg', 0, '2023-07-21 04:37:07'),
(121788, 35, 44, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 10, 1, '14298900', 'den_oz8l-qv.jpg', 2, '2023-07-24 03:32:07'),
(121789, 25, 45, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 10, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-24 09:34:08'),
(121790, 34, 45, 'Xiaomi 12T', 10, 1, '13189000', 'note-12.jpg', 0, '2023-07-24 09:34:08'),
(121791, 35, 46, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 10, 1555, '22234789500', 'den_oz8l-qv.jpg', 0, '2023-07-24 09:34:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `notes` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `address` text NOT NULL,
  `discountAmount` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`id`, `customer_id`, `order_date`, `notes`, `total_price`, `status`, `address`, `discountAmount`, `quantity`) VALUES
(35, 10, '2023-07-20 18:50:49', 'ffffff', 20010000.00, 2, '1/1 blabla bla blaf', 0.00, 1),
(45, 10, '2023-07-24 09:34:08', 'Hãy cẩn thận', 32000000.00, 0, '1/1 blabla bla blaf', 0.00, 0),
(46, 10, '2023-07-24 09:34:33', 'Xin hãy hủy đơn, tôi ấn nhầm!', 99999999.99, 9, '1/1 blabla bla blaf', 0.00, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `Discount` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sales` int(255) NOT NULL DEFAULT 0,
  `comments` int(255) NOT NULL DEFAULT 0,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `Discount`, `image`, `sales`, `comments`, `stock`) VALUES
(23, 'Samsung Galaxy S22 Ultra 5G (8GB | 128GB) ', 21, 12, '<ul>\r\n<li>Samsung Galaxy S22&nbsp;Ultra 5G (8GB | 128GB) Mỹ l&agrave; m&aacute;y Mới 100% Fullbox đầy đủ phụ kiện xịn, bảo h&agrave;nh 12 th&aacute;ng tại Đức Huy Mobile</li>\r\n<li>Galaxy S22&nbsp;Ultra 5G&nbsp;128GB Mỹ&nbsp;<span>2 SIM 2 S&oacute;ng</span>,&nbsp;<span>sẵn Tiếng Việt</span>&nbsp;trải nghiệm kh&ocirc;ng kh&aacute;c g&igrave; bản ch&iacute;nh h&atilde;ng.</li>\r\n<li>M&aacute;y sở hữu thiết kế sang trọng, cấu h&igrave;nh khủng với camera 108MP, chip&nbsp;Snapdragon 8 Gen 1, pin khủng 5000 mAh</li>\r\n<li>Gi&aacute; Samsung S22 Ultra&nbsp;5G 128GB Mỹ New Fullbox lu&ocirc;n rẻ hơn thị trường, ưu đ&atilde;i&nbsp;thu cũ đổi &amp; hỗ trợ trả g&oacute;p 0%, ship COD.</li>\r\n<li>\r\n<div class=\"home-header-banner\">\r\n<div id=\"image_pairs5167\" class=\"banners owl-carousel owl-theme\">\r\n<div class=\"owl-wrapper-outer\">\r\n<div class=\"owl-wrapper\">\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_2037378580\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S21 5G 128GB Ch&iacute;nh H&atilde;ng\" src=\"https://www.duchuymobile.com/images/detailed/56/full_2vf6-gu.jpg\" alt=\"Samsung Galaxy S21 5G 128GB Ch&iacute;nh H&atilde;ng\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_497646198\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S21 5G 128GB Ch&iacute;nh H&atilde;ng\" src=\"https://www.duchuymobile.com/images/detailed/56/my.jpg\" alt=\"Samsung Galaxy S21 5G 128GB Ch&iacute;nh H&atilde;ng\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_817590769\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S22 Ultra 5G (12GB | 128GB) Mỹ Mới 100%\" src=\"https://www.duchuymobile.com/images/detailed/56/mua_dr9o-o4.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G (12GB | 128GB) Mỹ Mới 100%\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_986200358\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S22 Ultra 5G (12GB | 128GB) Mỹ Mới 100%\" src=\"https://www.duchuymobile.com/images/detailed/56/spen.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G (12GB | 128GB) Mỹ Mới 100%\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_1096257094\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S22 Ultra 5G (8GB | 128GB) Mỹ 2 SIM Mới 100%\" src=\"https://www.duchuymobile.com/images/detailed/56/camera_226t-xe.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G (8GB | 128GB) Mỹ 2 SIM Mới 100%\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_1600938227\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S22 Ultra 5G (8GB | 128GB) Mỹ 2 SIM Mới 100%\" src=\"https://www.duchuymobile.com/images/detailed/56/man-hinh_8hzi-h6.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G (8GB | 128GB) Mỹ 2 SIM Mới 100%\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"owl-controls clickable\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div id=\"content_description\" class=\"wysiwyg-content\">\r\n<div>\r\n<p><a href=\"https://www.duchuymobile.com/samsung-galaxy-s22-ultra-5g-my\" target=\"_blank\">Samsung Galaxy S22 Ultra 5G 128GB) Mỹ Mới 100% Fullbox</a>&nbsp;l&agrave; chiếc flagship cực HOT ở thời điểm hiện tại nhờ model n&agrave;y&nbsp;sở hữu&nbsp;2 SIM 2 S&oacute;ng tiện lợi, sẵn Tiếng Việt,&nbsp;t&iacute;nh năng tương tự c&ugrave;ng&nbsp;trải nghiệm&nbsp;sử dụng&nbsp;kh&ocirc;ng kh&aacute;c g&igrave;&nbsp;<a href=\"https://www.duchuymobile.com/samsung-galaxy-s22-ultra-5g\" target=\"_blank\">Galaxy S22 Ultra 5G ch&iacute;nh h&atilde;ng</a>&nbsp;m&agrave; gi&aacute; b&aacute;n lại rẻ hơn.</p>\r\n</div>\r\n</div>\r\n</li>\r\n</ul>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '15999000', 0, 'A34-sil.jpg', 0, 0, 1000),
(25, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 19, 11, '<p><span>iPad Pro M2 11-inch 128GB Wifi&nbsp;</span><span>l&agrave;&nbsp;m&aacute;y mới&nbsp;</span><span>100%</span><span>,&nbsp;hiện đ&atilde; c&oacute; mặt tại Di Động Việt -&nbsp;</span><span>Đại l&yacute; uỷ quyền ch&iacute;nh thức của Apple tại Việt Nam</span><span>. iPad Pro&nbsp;c&oacute; thiết kế&nbsp;</span><span>tinh tế</span><span>,&nbsp;</span><span>hiện đại</span><span>&nbsp;t&iacute;ch hợp với con chip&nbsp;</span><span>Apple M2</span><span>&nbsp;với hiệu năng cực khủng, m&agrave;n h&igrave;nh&nbsp;</span><span>Liquid Retina 11-inch</span><span>&nbsp;hỗ trợ tần số qu&eacute;t&nbsp;</span><span>120Hz</span><span>&nbsp;hứa hẹn sẽ mang lại nhiều trải nghiệm tuyệt vời cho người d&ugrave;ng.</span></p>\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Th&ocirc;ng tin sản phẩm</span></div>\r\n<div class=\"info-content\">\r\n<p>Bộ sản phẩm gồm: Hộp, Th&acirc;n m&aacute;y, C&aacute;p, Sạc, S&aacute;ch hướng dẫn</p>\r\n</div>\r\n</div>\r\n<hr class=\"line\" />\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Bảo h&agrave;nh</span></div>\r\n<div class=\"info-content\">\r\n<ul>\r\n<li>Gi&aacute; đ&atilde; bao gồm 10% VAT. Bảo h&agrave;nh 12 th&aacute;ng theo ch&iacute;nh s&aacute;ch Apple&nbsp;to&agrave;n cầu. (<a href=\"https://didongviet.vn/tin-tuc/bao-hanh-gioi-han-mot-nam-cua-apple\" rel=\"noopener\" target=\"_blank\">Xem chi tiết</a>)\r\n<p><span>Bảo h&agrave;nh 1 đổi 1 trong 33 ng&agrave;y</span>&nbsp;độc quyền tại Di Động Việt.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '19990000', 0, 'iPad-New-2021-WF-sgy-1.jpg', 0, 0, 100),
(26, 'MacBook Pro 14 inch M2 Pro 2023 | 16GB/1TB', 20, 0, '&lt;p&gt;&lt;span&gt;MacBook Pro 14 inch M2 Pro 2023 | 16GB/1TB &lt;/span&gt;&lt;span&gt;là máy mới &lt;/span&gt;&lt;span&gt;100%&lt;/span&gt;&lt;span&gt;, hiện đã có mặt tại Di Động Việt - &lt;/span&gt;&lt;span&gt;Đại lý uỷ quyền chính thức của Apple tại Việt Nam&lt;/span&gt;&lt;span&gt;. Thiết bị có kiểu dáng &lt;/span&gt;&lt;span&gt;mỏng nhẹ&lt;/span&gt;&lt;span&gt;, màn hình lớn &lt;/span&gt;&lt;span&gt;14.2 inch&lt;/span&gt;&lt;span&gt;, trang bị tấm nền &lt;/span&gt;&lt;span&gt;Liquid Retina XDR&lt;/span&gt;&lt;span&gt;. MacBook Pro có cấu hình hoạt động &lt;/span&gt;&lt;span&gt;mượt mà&lt;/span&gt;&lt;span&gt;, đa tác vụ &lt;/span&gt;&lt;span&gt;nhanh nhạy&lt;/span&gt;&lt;span&gt; với chipset siêu khủng &lt;/span&gt;&lt;span&gt;M2 Pro&lt;/span&gt;&lt;span&gt;. ROM &lt;/span&gt;&lt;span&gt;16GB &lt;/span&gt;&lt;span&gt;và bộ nhớ lưu trữ rộng rãi &lt;/span&gt;&lt;span&gt;1TB&lt;/span&gt;&lt;span&gt;. Thời lượng pin &lt;/span&gt;&lt;span&gt;18 giờ&lt;/span&gt;&lt;span&gt;.&lt;/span&gt;&lt;/p&gt;\r\n&lt;div class=&quot;info-more info-note-more&quot;&gt;\r\n&lt;div class=&quot;info-more-head&quot;&gt;&lt;span&gt;Thông tin sản phẩm&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;info-content&quot;&gt;\r\n&lt;p&gt;Bộ sản phẩm gồm: Hộp, Thân máy, Cáp USB-C to C, Sách HDSD&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;hr class=&quot;line&quot; /&gt;\r\n&lt;div class=&quot;info-more info-note-more&quot;&gt;\r\n&lt;div class=&quot;info-more-head&quot;&gt;&lt;span&gt;Bảo hành&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;info-content&quot;&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Giá đã bao gồm &lt;span&gt;10% VAT&lt;/span&gt;. Bảo hành &lt;span&gt;12 tháng&lt;/span&gt; tại trung tâm bảo hành chính hãng Apple Việt Nam.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;eJOY__extension_root&quot; class=&quot;eJOY__extension_root_class&quot; style=&quot;all: unset;&quot;&gt; &lt;/div&gt;', 2, '60590000', 0, '1684140297189_thumb_macbook_pro_m2_didongviet.webp', 0, 0, 100),
(27, 'iPad 10.9-inch 2022 | 64GB Wifi', 19, 0, '&lt;p&gt;&lt;span&gt;iPad Gen 10 64GB Wifi &lt;/span&gt;được bán tại Di Động Việt được bảo hành &lt;span&gt;12 tháng&lt;/span&gt; theo chính sách của Apple toàn cầu. Ngoài ra, khách hàng sẽ được hưởng thêm nhiều đặc quyền, ưu đãi và khuyến mãi hấp dẫn khác khi mua máy tại Di Động Việt.&lt;/p&gt;\r\n&lt;p&gt;&lt;span&gt;iPad Gen 10 64GB Wifi &lt;/span&gt;được trang bị con chip thế hệ mới, thiết kế mỏng nhẹ và màn hình &lt;span&gt;10.9 inch&lt;/span&gt; đem đến một hiển thị nội dung rộng lớn và tích hợp &lt;span&gt;Apple Pencil&lt;/span&gt; và camera 12MP được trang bị thêm tính năng &lt;span&gt;Center Stage&lt;/span&gt; tuyệt vời.&lt;/p&gt;\r\n&lt;div class=&quot;info-more info-note-more&quot;&gt;\r\n&lt;div class=&quot;info-more-head&quot;&gt;&lt;span&gt;Thông tin sản phẩm&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;info-content&quot;&gt;\r\n&lt;p&gt;Bộ sản phẩm bao gồm: Bộ sản phẩm gồm: Hộp, Thân máy, Cáp, Sạc, Sách hướng dẫn&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;hr class=&quot;line&quot; /&gt;\r\n&lt;div class=&quot;info-more info-note-more&quot;&gt;\r\n&lt;div class=&quot;info-more-head&quot;&gt;&lt;span&gt;Bảo hành&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;info-content&quot;&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Giá đã bao gồm 10% VAT. Bảo hành 12 tháng theo chính sách Apple toàn cầu. (&lt;a href=&quot;https://didongviet.vn/tin-tuc/bao-hanh-gioi-han-mot-nam-cua-apple&quot; rel=&quot;noopener&quot; target=&quot;_blank&quot;&gt;Xem chi tiết&lt;/a&gt;)\r\n&lt;p&gt;&lt;span&gt;Bảo hành 1 đổi 1 trong 33 ngày&lt;/span&gt; độc quyền tại Di Động Việt.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;eJOY__extension_root&quot; class=&quot;eJOY__extension_root_class&quot; style=&quot;all: unset;&quot;&gt; &lt;/div&gt;', 2, '10990000', 0, 'iPad-Air-5G-Cell-2022-starl9-2.jpg', 0, 0, 100),
(28, 'iPad Gen 9 2021 | Wifi 64GB', 19, 11, '<p><span>iPad Gen 9 64GB Wifi</span>&nbsp;được trang bị con chip&nbsp;<span>A13 Bionic</span>, thiết kế mỏng nhẹ v&agrave; m&agrave;n h&igrave;nh&nbsp;<span>10.2 inch</span>&nbsp;đem đến một hiển thị nội dung rộng lớn v&agrave; t&iacute;ch hợp&nbsp;<span>Apple Pencil</span>&nbsp;v&agrave; camera 12MP được trang bị th&ecirc;m t&iacute;nh năng&nbsp;<span>Center Stage</span>&nbsp;tuyệt vời.</p>\r\n<p>iPad Gen 9 64GB Wifi&nbsp;được b&aacute;n tại Di Động Việt được bảo h&agrave;nh&nbsp;<span>12 th&aacute;ng</span>&nbsp;theo ch&iacute;nh s&aacute;ch của Apple to&agrave;n cầu. Ngo&agrave;i ra, kh&aacute;ch h&agrave;ng sẽ được hưởng th&ecirc;m nhiều đặc quyền, ưu đ&atilde;i v&agrave; khuyến m&atilde;i hấp dẫn kh&aacute;c khi mua m&aacute;y tại Di Động Việt.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Th&ocirc;ng tin sản phẩm</span></div>\r\n<div class=\"info-content\">\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Bộ sản phẩm gồm: Hộp, Th&acirc;n m&aacute;y, C&aacute;p, Sạc, S&aacute;ch hướng dẫn</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<hr class=\"line\" />\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Bảo h&agrave;nh</span></div>\r\n<div class=\"info-content\">\r\n<ul>\r\n<li>Bộ sản phẩm gồm: Hộp, Th&acirc;n m&aacute;y, C&aacute;p, Sạc, S&aacute;ch hướng dẫn</li>\r\n<li>Gi&aacute; đ&atilde; bao gồm 10% VAT. Bảo h&agrave;nh 12 th&aacute;ng theo ch&iacute;nh s&aacute;ch Apple&nbsp;to&agrave;n cầu. (<a href=\"https://didongviet.vn/tin-tuc/bao-hanh-gioi-han-mot-nam-cua-apple\" rel=\"noopener\" target=\"_blank\">Xem chi tiết</a>)\r\n<p><span>Bảo h&agrave;nh 1 đổi 1 trong 33 ng&agrave;y</span>&nbsp;độc quyền tại Di Động Việt.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '6790000', 0, 'iPad-Air-Gen-5-WF-pik-2.jpg', 0, 0, 100),
(29, 'iPad Pro M2 11-inch (2022) | 1TB 5G', 19, 11, '<p><span>iPad Pro M2 11-inch&nbsp;1TB 5G&nbsp;</span>được&nbsp;b&aacute;n ch&iacute;nh h&atilde;ng tại Di Động Việt,&nbsp;cam kết m&aacute;y&nbsp;mới<span>&nbsp;100%</span>, bảo h&agrave;nh&nbsp;<span>12 th&aacute;ng</span>&nbsp;theo ch&iacute;nh s&aacute;ch của Apple to&agrave;n cầu. Ngo&agrave;i ra, kh&aacute;ch h&agrave;ng sẽ được hưởng th&ecirc;m nhiều đặc quyền, ưu đ&atilde;i v&agrave; khuyến m&atilde;i hấp dẫn kh&aacute;c khi mua m&aacute;y tại Di Động Việt.</p>\r\n<p><span>iPad Pro M2 11-inch 1TB 5G&nbsp;</span>c&oacute; thiết kế&nbsp;<span>tinh tế</span>,&nbsp;<span>hiện đại</span>&nbsp;t&iacute;ch hợp với con chip&nbsp;<span>Apple M2</span>&nbsp;với hiệu năng cực khủng, m&agrave;n h&igrave;nh lớn&nbsp;<span>Liquid Retina&nbsp;11-inch</span>&nbsp;hỗ trợ tần số qu&eacute;t&nbsp;<span>120Hz</span>. Cung cấp mạng&nbsp;<span>5G</span>&nbsp;gi&uacute;p truy cập internet&nbsp;<span>nhanh ch&oacute;ng</span>&nbsp;hứa hẹn sẽ mang lại nhiều trải nghiệm tuyệt vời cho người d&ugrave;ng.</p>\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Th&ocirc;ng tin sản phẩm</span></div>\r\n<div class=\"info-content\">\r\n<p>Bộ sản phẩm gồm:&nbsp;Hộp, Th&acirc;n m&aacute;y, C&aacute;p, Sạc, S&aacute;ch hướng dẫn</p>\r\n</div>\r\n</div>\r\n<hr class=\"line\" />\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Bảo h&agrave;nh</span></div>\r\n<div class=\"info-content\">\r\n<ul>\r\n<li>Gi&aacute; đ&atilde; bao gồm 10% VAT. Bảo h&agrave;nh 12 th&aacute;ng theo ch&iacute;nh s&aacute;ch Apple&nbsp;to&agrave;n cầu. (<a href=\"https://didongviet.vn/tin-tuc/bao-hanh-gioi-han-mot-nam-cua-apple\" rel=\"noopener\" target=\"_blank\">Xem chi tiết</a>)\r\n<p><span>Bảo h&agrave;nh 1 đổi 1 trong 33 ng&agrave;y</span>&nbsp;độc quyền tại Di Động Việt.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '49990000', 0, 'iPad-Pro-11-(2022)-5G-128GB-gray1459717503.jpg', 0, 0, 100),
(30, 'iPhone 14 Plus 512GB Chính Hãng (VN/A)', 18, 11, '<p><span>iPhone 14 Plus 512GB Ch&iacute;nh h&atilde;ng (VN/A)</span><span>&nbsp;hiện đ&atilde; c&oacute; mặt tại Di Động Việt -&nbsp;</span><span>Đại l&yacute; uỷ quyền ch&iacute;nh thức của Apple</span><span>&nbsp;tại Việt Nam. Với thiết kế thời thượng v&agrave; c&aacute;c t&iacute;nh năng hiện đại, chiếc smartphone n&agrave;y sẽ mang đến cho bạn trải nghiệm đầy cảm x&uacute;c với khả năng s&aacute;ng tạo v&ocirc; tận từ&nbsp;</span><span>2 camera 12MP</span><span>, kết hợp với hiệu năng mạnh mẽ từ&nbsp;</span><span>chipset Apple A15 Bionic 6 nh&acirc;n.&nbsp;</span><span>B&ecirc;n cạnh đ&oacute;, với&nbsp;</span><span>dung lượng pin lớn</span><span>&nbsp;cho ph&eacute;p người d&ugrave;ng trải nghiệm d&agrave;i l&acirc;u. Đặt mua iPhone 14 tại Di Động Việt để c&oacute; thể sở hữu chiếc m&aacute;y sớm nhất với nhiều ưu đ&atilde;i v&agrave; khuyến m&atilde;i đi k&egrave;m.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '27190000', 0, 'iphone1.jpeg', 0, 0, 100),
(31, 'iPhone 14 Plus 256GB  Chính Hãng (VN/A)', 18, 11, '<p><span>iPhone 14 Plus 256GB  Ch&iacute;nh h&atilde;ng (VN/A)</span><span>&nbsp;hiện đ&atilde; c&oacute; mặt tại Di Động Việt -&nbsp;</span><span>Đại l&yacute; uỷ quyền ch&iacute;nh thức của Apple</span><span>&nbsp;tại Việt Nam. Với thiết kế thời thượng v&agrave; c&aacute;c t&iacute;nh năng hiện đại, chiếc smartphone n&agrave;y sẽ mang đến cho bạn trải nghiệm đầy cảm x&uacute;c với khả năng s&aacute;ng tạo v&ocirc; tận từ&nbsp;</span><span>2 camera 12MP</span><span>, kết hợp với hiệu năng mạnh mẽ từ&nbsp;</span><span>chipset Apple A15 Bionic 6 nh&acirc;n.&nbsp;</span><span>B&ecirc;n cạnh đ&oacute;, với&nbsp;</span><span>dung lượng pin lớn</span><span>&nbsp;cho ph&eacute;p người d&ugrave;ng trải nghiệm d&agrave;i l&acirc;u. Đặt mua iPhone 14 tại Di Động Việt để c&oacute; thể sở hữu chiếc m&aacute;y sớm nhất với nhiều ưu đ&atilde;i v&agrave; khuyến m&atilde;i đi k&egrave;m.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '24790000', 0, 'iphone-13-pro-128gb-mau-bac-didongviet.webp', 0, 0, 100),
(33, 'iPhone 14 512GB Chính Hãng (VN/A)', 18, 11, '<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span><span>iPhone 14 512GB Ch&iacute;nh h&atilde;ng (VN/A)</span><span>&nbsp;hiện đ&atilde; c&oacute; mặt tại Di Động Việt -&nbsp;</span><span>Đại l&yacute; uỷ quyền ch&iacute;nh thức của Apple</span><span>&nbsp;tại Việt Nam. Với thiết kế thời thượng v&agrave; c&aacute;c t&iacute;nh năng hiện đại, chiếc smartphone n&agrave;y sẽ mang đến cho bạn trải nghiệm đầy cảm x&uacute;c với khả năng s&aacute;ng tạo v&ocirc; tận từ&nbsp;</span><span>2 camera 12MP</span><span>, kết hợp với hiệu năng mạnh mẽ từ&nbsp;</span><span>chipset Apple A15 Bionic 6 nh&acirc;n.&nbsp;</span><span>B&ecirc;n cạnh đ&oacute;, với&nbsp;</span><span>dung lượng pin lớn</span><span>&nbsp;cho ph&eacute;p người d&ugrave;ng trải nghiệm d&agrave;i l&acirc;u. Đặt mua iPhone 14 tại Di Động Việt để c&oacute; thể sở hữu chiếc m&aacute;y sớm nhất với nhiều ưu đ&atilde;i v&agrave; khuyến m&atilde;i đi k&egrave;m.</span><br />Th&ocirc;ng tin sản phẩm</span></div>\r\n<div class=\"info-content\">\r\n<p>Bộ sản phẩm gồm: Th&acirc;n m&aacute;y, C&aacute;p USB-C to Lightning, C&acirc;y lấy sim, S&aacute;ch HDSD.</p>\r\n</div>\r\n</div>\r\n<hr class=\"line\" />\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Bảo h&agrave;nh</span></div>\r\n<div class=\"info-content\">\r\n<ul>\r\n<li>Gi&aacute; đ&atilde; bao gồm 10% VAT. Bảo h&agrave;nh&nbsp;<span>12 th&aacute;ng</span>&nbsp;tại trung t&acirc;m bảo h&agrave;nh ch&iacute;nh h&atilde;ng Apple Việt Nam. (<a href=\"https://didongviet.vn/tin-tuc/bao-hanh-gioi-han-mot-nam-cua-apple\" rel=\"noopener\" target=\"_blank\">Xem chi tiết</a>)</li>\r\n<li><span>Bảo h&agrave;nh&nbsp;<span>1 đổi 1 trong&nbsp;<span>33 ng&agrave;y</span></span></span>&nbsp;độc quyền tại Di Động Việt.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '24990000', 0, 'iphone-14-plus-128gb-mau-do-didongviet_1.webp', 0, 0, 100),
(34, 'Xiaomi 12T', 18, 13, '<div class=\"is-flex is-justify-content-space-between is-align-items-center\">\r\n<h2 class=\"title is-6 mb-3\">Th&ocirc;ng số kỹ thuật</h2>\r\n</div>\r\n<ul class=\"technical-content\">\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>K&iacute;ch thước m&agrave;n h&igrave;nh</p>\r\n<div>6.66 inches</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>C&ocirc;ng nghệ m&agrave;n h&igrave;nh</p>\r\n<div>OLED</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Camera sau</p>\r\n<div>108MP + 8MP + 2MP</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Camera trước</p>\r\n<div>20MP</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Chipset</p>\r\n<div>MediaTek Dimensity 8100 Ultra</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Dung lượng RAM</p>\r\n<div>8 GB</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Bộ nhớ trong</p>\r\n<div>128 GB</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Pin</p>\r\n<div>5000mAh</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Thẻ SIM</p>\r\n<div>2 SIM (Nano-SIM)</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Hệ điều h&agrave;nh</p>\r\n<div>Android 12, MIUI 13</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>T&iacute;nh năng m&agrave;n h&igrave;nh</p>\r\n<div>1 tỉ m&agrave;u, 120Hz, Dolby Vision, HDR10+</div>\r\n</li>\r\n</ul>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '11990000', 0, 'note-12.jpg', 0, 0, 100),
(35, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 18, 12, '<ul>\r\n<li>Samsung Galaxy Note 20 Ultra 5G l&agrave; m&aacute;y Mới 100% Fullbox, bảo h&agrave;nh 12 th&aacute;ng uy t&iacute;n.</li>\r\n<li>M&aacute;y c&oacute; chip Rồng 865+, RAM 12GB hiệu năng khủng chiến game mượt m&agrave;.</li>\r\n<li>3 Camera 108MP chụp ảnh sắc n&eacute;t, zoom ấn tượng, B&uacute;t S Pen quyền năng.</li>\r\n<li>Shop sẵn h&agrave;ng, c&oacute; b&aacute;n trả g&oacute;p 0%&nbsp;Galaxy Note 20 Ultra 5G Mới v&agrave; thu cũ đổi mới l&ecirc;n đời tiết kiệm.\r\n<ul>\r\n<li class=\"icon-info-auth\">Bảo h&agrave;nh<strong>&nbsp;12 th&aacute;ng</strong>&nbsp;tại Đức Huy Mobile.</li>\r\n<li class=\"icon-info-freeship\">Giao h&agrave;ng C.O.D tr&ecirc;n to&agrave;n quốc</li>\r\n<li class=\"icon-info-status\"><strong>Bộ sản phẩm:</strong>&nbsp;Mới, đầy đủ phụ kiện từ nh&agrave; sản xuất</li>\r\n<li class=\"icon-info-installment\"><strong>Trả trước 30%</strong>&nbsp;qua&nbsp;<a class=\"link_tragop\" href=\"https://www.duchuymobile.com/mua-tra-gop?product_id=3520\" rel=\"nofollow\">C&ocirc;ng ty t&agrave;i ch&iacute;nh</a>. Thủ tục chỉ cần CCCD + GPLX;</li>\r\n<li class=\"icon-info-auth\">Bao test 1 đổi 1 trong&nbsp;<strong>15 ng&agrave;y</strong>&nbsp;bao gồm nguồn v&agrave; m&agrave;n h&igrave;nh</li>\r\n<li class=\"installment-last\">Hoặc trả g&oacute;p&nbsp;<strong>l&atilde;i suất 0%</strong>&nbsp;qua thẻ t&iacute;n dụng Visa, Master, JCB.</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '12999000', 0, 'den_oz8l-qv.jpg', 0, 0, 100),
(36, 'Samsung Galaxy S22 Ultra 5G (12GB | 256GB)', 18, 0, '&lt;ul&gt;\r\n&lt;li class=&quot;icon-info-auth&quot;&gt;Bảo hành&lt;strong&gt; 6 tháng&lt;/strong&gt; tại Đức Huy Mobile.&lt;/li&gt;\r\n&lt;li class=&quot;icon-info-freeship&quot;&gt;Giao hàng C.O.D trên toàn quốc&lt;/li&gt;\r\n&lt;li class=&quot;icon-info-status&quot;&gt;&lt;strong&gt;Bộ sản phẩm:&lt;/strong&gt; Cáp, Sạc 15W&lt;/li&gt;\r\n&lt;li class=&quot;icon-info-installment&quot;&gt;&lt;strong&gt;Trả trước 30%&lt;/strong&gt; qua &lt;a class=&quot;link_tragop&quot; href=&quot;https://www.duchuymobile.com/mua-tra-gop?product_id=5180&quot; rel=&quot;nofollow&quot;&gt;Công ty tài chính&lt;/a&gt;. Thủ tục chỉ cần CCCD + GPLX;&lt;/li&gt;\r\n&lt;li class=&quot;icon-info-auth&quot;&gt;Bao test 1 đổi 1 trong &lt;strong&gt;15 ngày&lt;/strong&gt; bao gồm nguồn và màn hình&lt;/li&gt;\r\n&lt;li class=&quot;installment-last&quot;&gt;Hoặc trả góp &lt;strong&gt;lãi suất 0%&lt;/strong&gt; qua thẻ tín dụng Visa, Master, JCB.&lt;br /&gt;&lt;br /&gt;\r\n&lt;h3&gt;Thông số sản phẩm&lt;/h3&gt;\r\n&lt;div class=&quot;content-product_features&quot;&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Mặt kính cảm ứng:&lt;/label&gt;&lt;span&gt;Gorilla Glass Victus+&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Độ phân giải:&lt;/label&gt;&lt;span&gt;2K+ (1440 x 3088 Pixels)&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Màn hình rộng:&lt;/label&gt;&lt;span&gt;6.8 inches, 111.6 cm2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Camera sau:&lt;/label&gt;&lt;span&gt;108 MP, 10MP và 10MP+ 12MP&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Quay Phim:&lt;/label&gt;&lt;span&gt;8K@24fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Hệ điều hành:&lt;/label&gt;&lt;span&gt;Android 12, One UI 4&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Chipset:&lt;/label&gt;&lt;span&gt;Snapdragon 8 Gen 1 8 nhân&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;RAM:&lt;/label&gt;&lt;span&gt;12 GB&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Bộ nhớ trong ( Rom):&lt;/label&gt;&lt;span&gt;256GB&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Dung lượng pin:&lt;/label&gt;&lt;span&gt;5000 mAh&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;\r\n&lt;div class=&quot; tab_product_view&quot;&gt;\r\n&lt;div class=&quot;home-header-banner&quot;&gt;\r\n&lt;div id=&quot;image_pairs5180&quot; class=&quot;banners owl-carousel owl-theme&quot;&gt;\r\n&lt;div class=&quot;owl-wrapper-outer&quot;&gt;\r\n&lt;div class=&quot;owl-wrapper&quot;&gt;\r\n&lt;div class=&quot;owl-item&quot;&gt;\r\n&lt;div class=&quot;item&quot; title=&quot;&quot;&gt;&lt;img id=&quot;det_img_1696820351&quot; class=&quot;ty-pict   lazyOwl   cm-image&quot; title=&quot;Samsung Galaxy S21 5G 128GB Chính Hãng&quot; src=&quot;https://www.duchuymobile.com/images/detailed/52/so-luong-s22-ultra.jpg&quot; alt=&quot;Samsung Galaxy S21 5G 128GB Chính Hãng&quot; width=&quot;873&quot; height=&quot;485&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;owl-item&quot;&gt;\r\n&lt;div class=&quot;item&quot; title=&quot;&quot;&gt;&lt;img id=&quot;det_img_711402376&quot; class=&quot;ty-pict   lazyOwl   cm-image&quot; title=&quot;Samsung Galaxy S21 5G 128GB Chính Hãng&quot; src=&quot;https://www.duchuymobile.com/images/detailed/52/canh-tren-s22-ultra.jpg&quot; alt=&quot;Samsung Galaxy S21 5G 128GB Chính Hãng&quot; width=&quot;873&quot; height=&quot;485&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;owl-item&quot;&gt;\r\n&lt;div class=&quot;item&quot; title=&quot;&quot;&gt;&lt;img id=&quot;det_img_774769026&quot; class=&quot;ty-pict   lazyOwl   cm-image&quot; title=&quot;Samsung Galaxy S22 Ultra 5G (12GB | 256GB) Hàn Quốc Like New&quot; src=&quot;https://www.duchuymobile.com/images/detailed/52/canh_6ipi-pq.jpg&quot; alt=&quot;Samsung Galaxy S22 Ultra 5G (12GB | 256GB) Hàn Quốc Like New&quot; width=&quot;873&quot; height=&quot;485&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;owl-item&quot;&gt;\r\n&lt;div class=&quot;item&quot; title=&quot;&quot;&gt;&lt;img id=&quot;det_img_2024953406&quot; class=&quot;ty-pict   lazyOwl   cm-image&quot; title=&quot;Samsung Galaxy S22 Ultra 5G (12GB | 256GB) Hàn Quốc Like New&quot; src=&quot;https://www.duchuymobile.com/images/detailed/52/camera-s22-ultra.jpg&quot; alt=&quot;Samsung Galaxy S22 Ultra 5G (12GB | 256GB) Hàn Quốc Like New&quot; width=&quot;873&quot; height=&quot;485&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;owl-item&quot;&gt;\r\n&lt;div class=&quot;item&quot; title=&quot;&quot;&gt;&lt;img id=&quot;det_img_287687676&quot; class=&quot;ty-pict   lazyOwl   cm-image&quot; title=&quot;Samsung Galaxy S22 Ultra 5G (12GB | 256GB) Hàn Quốc Like New&quot; src=&quot;https://www.duchuymobile.com/images/detailed/52/man-hinh.jpg&quot; alt=&quot;Samsung Galaxy S22 Ultra 5G (12GB | 256GB) Hàn Quốc Like New&quot; width=&quot;873&quot; height=&quot;485&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;owl-controls clickable&quot;&gt; &lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;content_description&quot; class=&quot;wysiwyg-content&quot;&gt;\r\n&lt;div&gt;\r\n&lt;p&gt;&lt;a href=&quot;https://www.duchuymobile.com/samsung-galaxy-s22-ultra-5g-256gb-han-quoc-cu&quot; target=&quot;_blank&quot;&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ&lt;/a&gt; là flagship cao cấp nhất hiện nay trong dòng dòng sản phẩm &lt;a href=&quot;https://www.duchuymobile.com/samsung-galaxy-s22-plus-ultra-5g&quot; target=&quot;_blank&quot;&gt;Galaxy S22 | S22+ | S22 Ultra 5G&lt;/a&gt; của nhà sản xuất Hàn Quốc. Thiết bị sở hữu vi xử lý Snapdragon 8 Gen 1 8 nhân mạnh mẽ, hỗ trợ bút S Pen, màn hình có tần số quét 120Hz mượt mà, cảm biến camera chính độ phân giải đến 108MP cho Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ chụp ảnh sắc nét. &lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/galaxy-s22-ultra-5g-256gb-han.jpg&quot; alt=&quot;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ sẵn hàng giá rẻ nhất.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/canh-galaxy-s22-ultra-5g-256gb-han.jpg&quot; alt=&quot;cạnh Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ&quot; /&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có ngoại hình đẹp keng như mới, ít trầy xước.&lt;/em&gt;&lt;/p&gt;\r\n&lt;h3&gt;&lt;span&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có thiết kế nổi bật, camera chất:&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/galaxy-s22-ultra-5g-256gb-han-mau-trang.jpg&quot; alt=&quot;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ màu trắng &quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Trên tay Samsung S22 Ultra 5G Hàn Quốc cũ màu trắng tinh khôi.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Mẫu smartphone Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ sở hữu thiết kế cao cấp khá thanh mảnh và đẹp mắt. Máy có kích thước Dài 163.3 mm - Ngang 77.9 mm - Dày 8.9 mm, trọng lượng 228 g và 4 góc bo cong mềm mại tạo cảm giác cầm nắm điện thoại Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ thoải mái. &lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/galaxy-s22-ultra-5g-256gb-han-den.jpg&quot; alt=&quot;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ màu đen&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Galaxy S22 Ultra 5G Hàn Quốc cũ sở hữu thiết kế bắt mắt&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Nếu so với kích thước của &lt;a href=&quot;https://www.duchuymobile.com/samsung-galaxy-s22-5g&quot; target=&quot;_blank&quot;&gt;Samsung Galaxy S22 5G 128GB&lt;/a&gt; và &lt;a href=&quot;https://www.duchuymobile.com/samsung-galaxy-s22-plus-5g&quot; target=&quot;_blank&quot;&gt;Samsung Galaxy S22 Plus 5G 128GB&lt;/a&gt; thì Galaxy S22 Ultra 5G Hàn Quốc cũ có phần to hơn. Tuy nhiên vẫn đảm bảo việc cầm nắm gọn nhẹ, vừa tay. &lt;/p&gt;\r\n&lt;h3&gt;&lt;span&gt;Màn hình Samsung S22 Ultra 5G Hàn Quốc cũ lớn có tần số quét lên đến 120Hz:&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p&gt;Màn hình Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có chất lượng cao cùng kích thước lớn 6.8 inches với tấm nền Dynamic AMOLED 2X cao cấp và độ phân giải 2K+ (1440 x 3088 Pixels) hiển thị sắc nét. &lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/chip-galaxy-s22-ultra-5g-256gb-han.jpg&quot; alt=&quot;hiển thị Galaxy S22 Ultra 5G Hàn Quốc cũ&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Màn hình Galaxy S22 Ultra 5G Hàn Quốc cũ còn được phủ kính cường lực Gorilla Glass Victus+ cứng cáp.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Camera trước của Galaxy S22 Ultra 5G Hàn Quốc cũ được hãng &lt;a href=&quot;https://www.duchuymobile.com/samsung-galaxy&quot; target=&quot;_blank&quot;&gt;điện thoại Samsung&lt;/a&gt; thiết kế đục lỗ và đặt ở giữa sát cạnh trên màn hình. Ngoài ra, mẫu flagship Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ giá rẻ có tần số quét cao lên đến 120Hz. &lt;/p&gt;\r\n&lt;h3&gt;&lt;span&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có cụm camera 4 ống kính chính 108MP&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p&gt;Mẫu điện thoại Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ được trang bị tất cả là 4 camera sau “rất đỉnh” với cảm biến chính độ phân giải đến 108MP, cùng các cảm biến Phụ với độ phân giải lần lượt là 12 MP, 10 MP, 10 MP với nhiều chế độ chụp ảnh như: Ban đêm (Night Mode), Tự động lấy nét (AF), Chống rung quang học (OIS), Làm đẹp, Chuyên nghiệp (Pro), AI Camera... cho Galaxy S22 Ultra 5G Hàn Quốc khả năng nhiếp ảnh đỉnh cao.&lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/galaxy-s22-ultra-5g-256gb-xanh.jpg&quot; alt=&quot;camera Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có camera đỉnh của &quot;chóp&quot;.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Camera selfie trên Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ giá rẻ là ống kính 40MP mang lại cho bạn những bức ảnh selfie tuyệt vời nhất. Ngoài ra, siêu phẩm Galaxy S22 Ultra 5G Hàn Quốc cũ còn khả năng quay video 8K cho những hình ảnh, chuyển động vẫn giữ được độ phân giải siêu sắc nét.&lt;/p&gt;\r\n&lt;h3&gt;&lt;span&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có hiệu năng mạnh mẽ:&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p&gt;Hiệu năng ấn tượng trên chiếc flagship Samsung S22 Ultra 5G Hàn Quốc cũ với dung lượng RAM 12GB cùng chip Snapdragon 8 Gen 1 8 nhân mạnh nhất của Qualcomm, máy chạy trên hệ điều hành Android 12 mới nhất cho người dùng những trải nghiệm thú vị. &lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/sim-galaxy-s22-ultra-5g-256gb-han.jpg&quot; alt=&quot;pin Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có h&lt;em&gt;iệu năng mạnh mẽ nhờ chip Rồng 8 Gen 1 đầu bảng.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Với con chip khủng này, model Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ sẽ mang đến một tốc độ xử lý cực kỳ mượt mà và nhanh chóng. Đi kèm với máy là dung lượng bộ nhớ trong 256GB cho phép bạn lưu trữ thoải mái hình ảnh, video và tài liệu. &lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/pin-galaxy-s22-ultra-5g-256gb-han.jpg&quot; alt=&quot;pin Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ giá rẻ có thời gian sử dụng ấn tượng.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Cuối cùng, Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ còn được trang bị viên pin với dung lượng lớn 5.000 mAh hỗ trợ sạc nhanh công suất đến 45W. Với mức dung lượng pin này máy hoàn toàn có thể đáp ứng mọi nhu cầu của bạn trong suốt một ngày.  &lt;/p&gt;\r\n&lt;p&gt;Duchuymobile.com&lt;/p&gt;\r\n&lt;p class=&quot;show-more&quot;&gt;&lt;span class=&quot;readmore&quot;&gt;Đọc thêm&lt;/span&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;faq_page&quot;&gt;\r\n&lt;h2 class=&quot;title-detail faq_page-title&quot;&gt;Câu hỏi thường gặp&lt;/h2&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;div id=&quot;eJOY__extension_root&quot; class=&quot;eJOY__extension_root_class&quot; style=&quot;all: unset;&quot;&gt; &lt;/div&gt;', 2, '14990000', 0, 'cdd5e6d076.jpg', 0, 0, 100),
(39, 'MacBook Pro M2 Max 16 inch 2023 New – (M2 Max/32GB/1TB/Space Gray)', 20, 11, 'Tình trạng: New, Nguyên Seal, AppleCare+ 2026\r\nMàu sắc: Space Gray\r\nCPU: Apple M2 Max with 12‑core CPU\r\nGPU: 38‑core GPU, 16‑core Neural Engine\r\nRAM: 32GB\r\nStorage: 1TB SSD\r\nMàn hình: 16-inch Liquid Retina XDR display\r\nInterface: Three Thunderbolt 4 ports, HDMI port, SDXC card slot, headphone jack, MagSafe 3 port\r\nBacklit Magic Keyboard with Touch ID – US English\r\nTouch ID, TouchBar\r\nTrọng lượng: 2.16 Kg', 1, '78000000', 0, '7f6cb60c80.jpg', 0, 0, 0),
(40, 'Apple MacBook Pro 13 M2 2022 16GB 256GB', 20, 11, 'ĐẶC ĐIỂM NỔI BẬT\r\nHiệu năng vượt trội - Chip M2, 10 nhân GPU xử lý tốt các Photoshop, Illustrator, Premiere, xử lý các video 4K\r\n16GB Ram, 512GB - Đa nhiệm tốt, mở cùng lúc trên Safari hay nhiều ứng dụng\r\nThiết kế mỏng nhẹ tinh tế - Vỏ kim loại, trọng lượng chỉ 1.4kg\r\nTrải nghiệm giải trí cực đã - Màn hình 13.3 inch, độ phân giải 2560 x 1600 cho chất lượng hiển thị cực rõ ràng', 2, '35990000', 0, '24ae139eb6.webp', 0, 0, 0),
(41, 'Apple Macbook Air M2 2022 8GB 512GB', 20, 11, 'ĐẶC ĐIỂM NỔI BẬT\r\nThiết kế sang trọng, lịch lãm - siêu mỏng 11.3mm, chỉ 1.24kg\r\nHiệu năng hàng đầu - Chip Apple m2, 8 nhân GPU, hỗ trợ tốt các phần mềm như Word, Axel, Adoble Premier\r\nĐa nhiệm mượt mà - Ram 8GB, SSD 512GB cho phép vừa làm việc, vừa nghe nhạc\r\nMàn hình sắc nét - Độ phân giải 2560 x 1664 cùng độ sáng 500 nits\r\nÂm thanh sống động - 4 loa tramg bị công nghệ dolby atmos và âm thanh đa chiều', 2, '31990000', 0, '93a3af0cf9.webp', 0, 0, 0),
(42, 'Xiaomi Redmi Note 12 8GB 128GB', 18, 13, 'ĐẶC ĐIỂM NỔI BẬT\r\nTrải nghiệm hình ảnh mượt mà và liền mạch nhờ tốc độ làm mới cao 120Hz.\r\nHiệu năng vượt trội và được tăng cường với chip xử lý Snapdragon® 685 6nm mạnh mẽ.\r\nNăng lượng cho cả ngày dài nhờ vào viên pin lên đến 5000mAh đi kèm sạc nhanh 33W\r\nBắt trọn mọi khoảnh khắc của bạn với bộ 3 camera 50MP.\r\nXiaomi Redmi Note 12 8GB 128GB tỏa sáng với diện mạo viền vuông cực thời thượng cùng hiệu suất mạnh mẽ nhờ sở hữu con chip Snapdragon 685 ấn tượng. Chất lượng hiển thị hình ảnh của Redmi Note 12 Vàng cũng khá sắc nét thông qua tấm nền AMOLED 120Hz hiện đại. Chưa hết, máy còn sở hữu cụm 3 camera với độ rõ nét lên tới 50MP cùng viên pin 5000mAh và s ạc nhanh 33W giúp đáp ứng được mọi nhu cầu sử dụng của người dùng.\r\n\r\nPhiên bản sắc vàng - Độc quyền chỉ có tại CellphoneS\r\nXiaomi Redmi Note 12 được Xiaomi cho ra mắt với nhiều phiên bản màu sắc khác nhau cho người dùng lựa chọn, tuy nhiên sắc vàng là màu sắc ấn tượng nhất trong series Redmi Note 12 này và hiện được bán độc quyền tại CellphoneS.\r\n\r\nRedmi Note 12 Vàng Bình Minh với hiệu ứng chuyển màu gradient bắt mắt phối hợp với thiết kế khung viền phẳng mang lại một thiết kế tinh tế.\r\n\r\nXiaomi Redmi Note 12 8GB Vàng\r\n\r\nĐiện thoại Xiaomi Redmi Note 12 8GB Vàng - Cấu hình vượt trội, quay chụp đỉnh cao\r\nXiaomi Redmi Note 12 8GB 128GB có lẽ là cái tên được nhắc tới nhiều nhất khi nói về các dòng smartphone tốt trong phân khúc giá tầm trung. Thế hệ 12 của Series Xiaomi Redmi Note này được đánh giá cao về thiết kế thời thượng bên ngoài cùng hiệu năng mạnh mẽ thông qua chipset Qualcomm hiện đại. Dưới này là các đánh giá chi tiết về thông số kỹ thuật của Xiaomi Redmi Note 12 mà bạn có thể tham khảo thêm nhé!\r\n\r\nTrải nghiệm mượt mà mọi tác vụ với chipset Snapdragon 685 hiện đại\r\nSức mạnh xử lý, tính toán của Xiaomi Redmi Note 12 vàng tới từ con chip hiện đại của nhà Qualcomm - Snapdragon 685. Đây là con chip được sản xuất trên tiến trình 6nm, mang lại hiệu suất ấn tượng với tốc độ xung nhịp tối đa lên tới 2.8GHz. \r\n\r\nHIệu năng Xiaomi Redmi Note 12 8GB Vàng\r\n\r\nĐiều này đảm bảo cho máy luôn hoạt động mượt mà và hiệu quả trong các tác vụ hàng ngày như đàm thoại, lướt web và xem phim. Không chỉ vậy, Redmi Note 12 còn hỗ trợ chơi các tựa game phổ biến như Liên Quân Mobile và PUBG Mobile với cấu hình phù hợp, đem tới trải nghiệm tốt nhất cho người dùng. Cụ thể, qua các bài test hiệu năng máy mang lại 360216 điểm trên phần mềm Benchmark và trên Geekbench 6 thì thiết bị cho 436 điểm đơn nhân và 1440 điểm đa nhân.\r\n\r\nHIệu năng Xiaomi Redmi Note 12 8GB Vàng\r\n\r\nCải thiện khả năng nhiếp ảnh với cảm biến camera lên tới 50MP\r\nVới bộ cảm biến 3 camera, bao gồm camera chính 50MP, camera góc siêu rộng 8MP và camera macro 2MP, Xiaomi Redmi Note 12 8GB cho phép người dùng thỏa sức ghi lại các phong cảnh khác nhau với chất lượng cực kỳ sắc nét.\r\n\r\nCamera Xiaomi Redmi Note 12 8GB Vàng\r\n\r\nĐồng thời, máy cũng hỗ trợ tính năng chụp ảnh chân dung với hiệu ứng bokeh tự nhiên, mang lại những bức ảnh đẹp và đầy ấn tượng. Thông qua cụm cảm biến hiện đại này của Redmi Note 12, bạn sẽ có được những trải nghiệm chụp ảnh và quay video cực kỳ tuyệt vời.\r\n\r\nThỏa sức làm việc giải trí suốt ngày dài với viên pin 5000mAh\r\nSo với thế hệ tiền nhiệm trước đó, thông số năng lượng trên Xiaomi Redmi Note 12 vàng dường như vẫn được giữ nguyên là 5000mAh. Tuy nhiên, do được nâng cấp về vi xử lý nên mức độ tiêu thụ điện năng của phân khúc smartphone này đã được tối ưu hơn rất nhiều. Cụ thể, máy có thể duy trì hoạt động trong suốt 1,35 ngày trước khi cần sạc lại. \r\n\r\nPin Xiaomi Redmi Note 12 8GB Vàng\r\n\r\nNgoài ra, Redmi Note 12 vàng còn hỗ trợ công nghệ sạc siêu nhanh với công suất tối đa 33W. Nhờ khả năng sạc nhanh này, bạn có thể tiết kiệm được nhiều thời gian hơn và không phải chờ đợi quá lâu trong quá trình nạp lại pin nữa rồi nhé!\r\n\r\nNâng tầm trải nghiệm hình ảnh thông qua màn hình cỡ lớn\r\nTrong phiên bản Redmi Series mới nhất này, Xiaomi đã tích hợp cho máy màn hình AMOLED có độ phân giải Full HD+ (1080 x 2400 pixels) siêu sắc nét. Với công nghệ này, chất lượng hiển thị trên màn hình luôn đạt độ chi tiết cực cao, màu sắc sinh động, mang tới trải nghiệm hình ảnh chân thực cho mọi khung hình.\r\n\r\nMàn hình Xiaomi Redmi Note 12 8GB Vàng\r\n\r\nNgoài ra, Redmi Note 12 còn sở hữu tần số quét màn hình đạt tới 120Hz. Nhờ vậy mà mọi trải nghiệm vuốt chạm của người dùng trên màn hình luôn cực kỳ nhanh nhạy, mượt mà. Đồng thời, máy cũng sẽ sở hữu độ sáng tối đa 1200nits, giúp cải thiện khả năng hiển thị hình ảnh mỗi khi được sử dụng ngoài trời.\r\n\r\nDiện mạo vuông vắn đầy thời thượng\r\nXiaomi Redmi Note 12 8GB có diện mạo đẹp mắt và được đánh giá là khá ấn tượng. Theo đó, máy sở hữu thiết kế viền vuông, các góc bo tròn kết hợp với khung vát phẳng tạo nên một vẻ ngoài hết sức hiện đại nhưng cũng không kém phần trẻ trung.\r\n\r\nThiết kế Xiaomi Redmi Note 12 8GB Vàng\r\n\r\nMặt trước của điện thoại được trang bị màn hình phẳng và được thiết kế dạng nốt ruồi. Viền màn hình được tối ưu hóa, tạo ra một không gian hiển thị rộng rãi, thoải mái. \r\n\r\nĐiện thoại Xiaomi Redmi Note 12 8GB khi nào ra mắt?\r\nKhông để các MiFan phải chờ đợi lâu, ngay từ đầu năm 2023 vừa rồi, Xiaomi đã chính thức “trình làng” ấn phẩm công nghệ nổi bật - Redmi Note 12 trên thị trường smartphone. Cụ thể, Xiaomi Redmi Note 12 đã được ra mắt vào ngày 11/01/2023 tại thị trường nội địa. \r\n\r\nĐiện thoại Xiaomi Redmi Note 12 8GB khi nào ra mắt\r\n\r\nVề các phiên bản màu sắc, Redmi Note 12 sở hữu 3 phiên bản màu chính lần lượt là: Xám, Xanh Dương và Xanh Lá. Các tone màu này đều cực kỳ sang trọng, tinh tế, phù hợp với mọi phong cách cá nhân của người sử dụng. \r\n\r\nĐiện thoại Xiaomi Redmi Note 12 8GB 128GB giá bao nhiêu?\r\nXiaomi Redmi Note 12 8GB hiện tại đang có mức giá dao động trong khoảng 5.8 triệu VNĐ. Với một phân khúc smartphone tầm trung như Redmi Note 12 thì mức giá này khá hợp lý. \r\n\r\nĐiện thoại Xiaomi Redmi Note 12 8GB 128GB giá bao nhiêu\r\n\r\nDù so với người anh em tiền nhiệm trước đó thì mức giá này có hơi cao, tuy nhiên những nâng cấp trong lần ra mắt này của Redmi Note 12 8GB 128GB được xem là hoàn toàn xứng đáng với con số trên. Nếu bạn đang tìm kiếm một phân khúc smartphone tầm trung ổn định thì Xiaomi Redmi Note 12 sẽ là gợi ý hoàn hảo mà bạn không nên bỏ qua nhé!', 1, '5390000', 0, 'cd5dc5c31d.webp', 0, 0, 0),
(43, 'Samsung Galaxy S20 FE 256GB', 18, 12, 'ĐẶC ĐIỂM NỔI BẬT\r\nKhông gian giải trí bất tận - Màn hình Super Amoled 6.5&quot;, FullHD, HDR10+, 120Hz\r\nHiệu năng mạnh mẽ - Chip Snapdragon 865, chuẩn bộ nhớ UFS 3.1\r\nBừng sáng mọi khung hình - Camera 12MP hỗ trợ quay phim 8K, zoom quang 3X\r\nNăng lượng cho cả ngày dài - Viên pin lớn 4500mAh, sạc nhanh 25W\r\nSamsung Galaxy S20 FE sở hữu màn hình AMOLED 6.5 inch tần số quét 120Hz cùng công nghệ HDR10+, mang đến khả năng hiển thị sống động, sắc nét và chi tiết. Thêm vào đó, sản phẩm còn trang bị vi xử lý mạnh mẽ với chip Snapdragon 865 cùng RAM 8GB và bộ nhớ trong 256GB. Không chỉ vậy, cụm camera 12MP cùng khả năng zoom quang học 3x hỗ trợ khả năng chụp ảnh ổn định, giúp người dùng lưu giữ khoảnh khắc thú vị trong cuộc sống.\r\n\r\nĐiện thoại Samsung Galaxy S20 FE - Phiên bản đặc biệt dành cho fan Samsung\r\nSamsung S20 FE là chiếc điện thoại thuộc dòng Samsung Galaxy S, với chữ FE trong tên gọi của máy có nghĩa là Fan Edition. Đây là dòng điện thoại ra mắt như để gửi lời tri ân đến các fan trung thành đã và đang sử dụng các sản phẩm của Samsung. Với số lượng sản phẩm được giới hạn và chỉ mở bán trong thời gian ngắn.  \r\n\r\nMàn hình Super Amoled 6.5 inch, FullHD, công nghệ HDR10+, tần số quét 120Hz\r\nĐược định hướng vẫn là sản phẩm ở phân khúc cao cấp, Galaxy S20 Fan Edition được trang bị tấm nền Super Amoled cao cấp, kích thước màn hình lớn lên đến 6.5 inches, màn hình độ phân giải FullHD giúp hình ảnh hiển thị trên chiếc điện thoại này là vô cùng sắc nét và rực rỡ.\r\n\r\nMàn hình 6.5 inch, tấm nền Super Amoled FullHD, công nghệ HDR10+, màn hình tần số quét 120Hz\r\n\r\nKhông bỏ lỡ trào lưu tần số quét cao, điện thoại được trang bị một màn hình với tần số quét 120Hz, công nghệ hình ảnh HDR10+ tăng độ tương phản, giúp bạn có những phút giây giải trí hoàn hảo dù là chơi game hay xem phim.\r\n\r\nHiệu năng mạnh mẽ với chip Snapdragon 865, chuẩn bộ nhớ UFS 3.1\r\nTrái tim của Samsung S20 FE chính là bộ vi xử lý Snapdragon 865 8 nhân giúp máy hoạt động mạnh mẽ, nhưng vẫn tiết kiệm được pin nhờ áp dụng tiến trình sản xuất nhỏ hơn.\r\n\r\nHiệu năng mạnh mẽ với Exynos 990 (7 nm+)\r\n\r\nNgoài ra chuẩn bộ nhớ UFS 3.1 mới nhất cho tốc độ đọc ghi lần lượt là 2100Mb/s, 1200Mb/s. Ấn tượng nhất trong phân khúc các điện thoại đầu bảng hiện này, giúp Samsung Galaxy S20 Fan Edition có thể load các ứng dụng hay trao đổi file trên máy tính nhanh chóng hơn.\r\n\r\nCamera 12MP hỗ trợ quay phim 8K, zoom quang 3X\r\nGalaxy S20 FE thừa hưởng cụm camera từ người đàn anh Samsung Galaxy S20 với cụm 3 camera: camera chính 12MP hỗ trợ quay phim lên đến 8K kèm khả năng chống rung quang OIS kết hợp với chống rung điện tử EIS.\r\n\r\nCamera 12MP hỗ trợ quay phim 8K, zoom quang 3X\r\n\r\nCam tele của máy cho phép người dùng có thể zoom quang học 3X, giúp người dùng có thể chụp được những bức hình ở khoảng cách xa mà không làm giảm chất lượng hình ảnh. Hỗ trợ camera góc siêu rộng để chụp lại những bức hình nhóm, hay khung cảnh hùng vỹ.\r\n\r\nCamera 12MP\r\n\r\nHỗ trợ Wifi thế hệ 6 tốc độ cao, băng tần 4G tích hợp mạnh mẽ\r\nThế hệ Wifi thứ 6 mới nhất được tích hợp trên Samsung S20 FE cho tốc độ độ truyền tải cao hơn 30% so với thế hệ thứ 5, kết nối nhanh chóng với mạng, giảm độ trễ khi chơi game.\r\n\r\nHỗ trợ Wifi thế hệ 6 tốc độ cao, băng tần 5G tích hợp mạnh mẽ\r\n\r\nĐiểm đặc biệt tiếp theo là hỗ trợ mạng 4G, cho phép Samsung Galaxy S20 FE đón đầu xu hướng, khi mà tại Việt Nam các nhà mạng đã cho phép thử nghiệm băng tần mạng thế hệ mới này.\r\n\r\nSạc nhanh 25W, viên pin dung lượng lớn 4500mAh\r\nS20 FE sở hữu viên pin dung lượng lớn 4500mAh, màn hình AMOLED tiết kiệm điện giúp máy có thể sử dụng cả ngày dài mà không lo lắng về vấn đề hết pin trên chiếc điện thoại này.\r\n\r\nSạc nhanh 15W, viên pin dung lượng lớn 4500mAh\r\n\r\nNgoài ra máy hỗ trợ sạc nhanh 25W giúp giảm thời gian sạc đầy 100% của thiết bị, thêm thời gian để bạn sử dụng và trải nghiệm thiết bị của mình được lâu hơn.\r\n\r\nGiao diện One UI 2.5 mới nhất, Android 10 bảo mật\r\nSamsung S20 Fan Edition ra mắt sẽ được tích hợp giao diện One UI 2.5 hoàn toàn mới trên nền Android 10 giúp thiết bị của bạn được hỗ trợ phần mềm trong thời gian dài.\r\n\r\nGiao diện One UI 2.5 mới nhất, Android 10 bảo mật\r\n\r\nGiao diện mới thêm vào một loạt tính năng về camera như Singe Take, Night Hyperlapse và chế độ Video Pro. Tính năng Samsung Dex giờ đây đã cho phép kết nối không dây như Tivi thông minh hay màn hình có tính năng Screen Mirroring.\r\n\r\nSamsung S20 FE giá bao nhiêu\r\nTại thị trường Việt Nam, Galaxy S20 FE 256GB chính hãng đang có mức giá chỉ 7.490.000 VNĐ tại CellphoneS. Đặc biệt giảm thêm 500K cho khách hàng tham gia thu cũ lên đời sản phẩm.\r\n\r\nNgười dùng sẽ có 3 tùy chọn màu sắc bao gồm Tím, Xanh và Xanh lá. Ngoài ra, mời bạn tham khảo thêm điện thoại Samsung Galaxy S21 FE với nhiều nâng cấp về cấu hình, camera và dung lượng pin.', 2, '7250000', 0, '992e1dc755.webp', 0, 0, 0);
INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `Discount`, `image`, `sales`, `comments`, `stock`) VALUES
(44, 'Samsung Galaxy Z Flip4 128GB', 18, 12, 'ĐẶC ĐIỂM NỔI BẬT\r\nNgoại hình thời trang - cầm nắm cực sang với thiết kế gập vỏ sò độc đáo\r\nCông nghệ màn hình hàng đầu đến từ Samsung - 6.7 inch, tấm nền Dynamic AMOLED 2X\r\nTrang bị camera chất lượng - Bộ đôi camera có cùng độ phân giải 12 MP, chống rung, chụp đêm\r\nHiệu năng mạnh mẽ đến từ dòng chip cao cấp của Qualcomm - Snapdragon 8+ Gen 1\r\nTiếp tục là một mẫu smartphone màn hình gập độc đáo, đầy lôi cuốn và mới mẻ từ hãng công nghệ Hàn Quốc, dự kiến sẽ có tên là Samsung Galaxy Z Flip 4 với nhiều nâng cấp. Đây hứa hẹn sẽ là một siêu phẩm bùng nổ trong thời gian tới và thu hút được sự quan tâm của đông đảo người dùng với nhiều cải tiến từ ngoại hình, camera, bộ vi xử lý và viên pin được nâng cấp.\r\n\r\nSo sánh điện thoại Samsung Z Flip4 với Samsung Galaxy Z Flip3\r\nSamsung Galaxy Z Flip4 5G\r\n\r\nSamsung Galaxy Z Flip3 5G\r\n\r\nGiá niêm yết\r\n\r\n23.990.000\r\n\r\n24.990.000\r\n\r\nKích thước màn hình\r\n\r\nMàn hình chính: 6.7 inch\r\n\r\nMàn hình phụ: 1.9 inch\r\n\r\nMàn hình chính: 6.7 inch\r\n\r\nMàn hình phụ: 1.9 inch\r\n\r\nTần số quét\r\n\r\n120Hz\r\n\r\n120Hz\r\n\r\nTrọng lượng\r\n\r\n187 g \r\n\r\n183g \r\n\r\nCông nghệ màn hình\r\n\r\n Foldable Dynamic AMOLED 2X\r\n\r\n Super AMOLED\r\n\r\nCamera sau\r\n\r\nCamera góc siêu rộng: 12MP\r\n\r\nCamera góc rộng: 12MP \r\n\r\nCamera góc siêu rộng: 12MP, f/2.2\r\n\r\nCamera góc rộng: 12MP, f/1.8 \r\n\r\nCamera trước\r\n\r\nCamera Selfie 10MP\r\n\r\nGóc rộng 10MP, f/2.4\r\n\r\nDung lượng RAM\r\n\r\n8GB\r\n\r\n8GB\r\n\r\nBộ nhớ trong\r\n\r\n128GB/256GB/512GB\r\n\r\n128GB/ 256GB\r\n\r\nThẻ SIM\r\n\r\n1 Nano SIM &amp; 1 eSIM\r\n\r\n2 SIM (nano‑SIM và eSIM)\r\n\r\nChỉ số kháng nước\r\n\r\nIPX8\r\n\r\nIPX8\r\n\r\nCảm biến vân tay\r\n\r\nCảm biến vân tay cạnh bên\r\n\r\nCảm biến vân tay cạnh bên\r\n\r\nSạc nhanh\r\n\r\n3700mAh\r\n\r\nSạc nhanh 25W\r\n\r\nSạc không dây 10W\r\n\r\nSạc ngược không dây\r\n\r\n3300 mAh\r\n\r\nSạc nhanh 15W\r\n\r\nSạc không dây 10W\r\n\r\nCPU\r\n\r\nSnapdragon 8+ Gen 1\r\n\r\nSnapdragon 888 8 (5nm)\r\n\r\nGPU\r\n\r\nAdreno 670\r\n\r\nAdreno 660l\r\n\r\nHệ điều hành\r\n\r\nAndroid 12\r\n\r\nAndroid 11\r\n\r\nMàu sắc\r\n\r\nTím Bora\r\n\r\nXám Graphite\r\n\r\nHồng Champagne\r\n\r\nXanh Lovebird\r\n\r\nĐen Phantom\r\n\r\nKem Ivory\r\n\r\nXanh Phantom\r\n\r\nTím Lilac\r\n\r\nKhi điện thoại Samsung Z Flip4 chính thức ra mắt, người dùng Samsung Z Flip3 sẽ phân vân có nên nâng cấp lên mẫu điện thoại mới này hay không. Vậy cùng tìm hiểu Samsung Z Flip4 với Flip 3 có gì khác biệt.\r\n\r\nĐánh giá điện thoại Samsung Flip 4 chi tiết\r\nLà mẫu điện thoại cao cấp được ra mắt hàng năm của Samsung, do đó Samsung ZFlip 4 được rất nhiều người quan tâm. Vậy sản phẩm được thiết kế ra sao, tính năng có gì nổi bật? Cùng tìm hiểu chi tiết ngay dưới đây.\r\n\r\nThiết kế đột phá đầy lôi cuốn\r\nSamsung Galaxy Z Flip 4 sở hữu thiết kế nhìn chung không có nhiều khác biệt so với thế hệ trước đó. Điện thoại vẫn sở hữu một thiết kế bao gồm hai tone màu với màn hình gập. Tuy nhiên các chi tiết sẽ được chăm chút hơn rất nhiều so với người đàn anh Z Flip 3.\r\n\r\nĐiện thoại Samsung ZFlip 4 tiếp tục là một mẫu mã sang chảnh, thời thượng của Samsung được lấy cảm hứng từ hộp trang điểm cầm tay của các chị em hay chiếc vỏ sò. Với công nghệ gập đột phá, Samsung đã tạo ra một chiếc smartphone mang đậm dấu ấn Samsung trên thị trường. Đóng lại là phụ kiện công nghệ với kích thước 4.2-inch, vừa vặn mọi ngăn túi. Mở ra là một chiếc smartphone gập phá vỡ mọi giới hạn từ trước đến nay.\r\n\r\nThiết kế đột phá đầy lôi cuốn\r\n\r\nKhung nhôm của máy được bo tròn tinh tế với những đường nét mềm mại. Trông rất cao cấp. Chạm vào thì vô cùng thoải mái. Hơn nữa, lớp phủ nhám nhẹ trên bề mặt kính máy sẽ hạn chế tối đa dấu vân tay hoặc vết bẩn để máy luôn mới và sạch.\r\n\r\nGalaxy Z Flip 4 tiếp tục được trang bị kính siêu mỏng Ultra Thin Glass (UTG). Công nghệ màn hình này mang cho bạn trải nghiệm linh hoạt không tưởng. Bền hơn 80% so với phiên bản Z Flip trước đó. Và có gập mở đến 200.000 lần mà không gặp trục trặc gì. Phần bản lề này không chỉ bền bỉ hơn mà cũng nhỏ và nhẹ hơn.\r\n\r\nNếu nếp gấp giữa màn hình từng là một điểm yếu trên Samsung Galaxy Z Flip 3 thì điều này đã hoàn toàn được cải thiện trên thế mới kế nhiệm này. Khi mở ra, màn hình Z Flip 4 vẫn tồn tại những nếp gấp tuy nhiên nếp gấp này mờ hơn đáng kể, rất khó để nhìn thấy và hoàn toàn không ảnh hưởng đến các trải nghiệm của người dùng.\r\n\r\nĐánh giá Samsung Galaxy Z Flip 4\r\n\r\nThiết kế màn hình gập độc đáo này còn hỗ trợ người dùng trò chuyện rảnh tay vô cùng tiện lợi. Khi gập góc 90 độ, điện thoại có thể tự đứng mà không cần người dùng luôn cầm trên tay hay sử dụng phụ kiện hỗ trợ.\r\n\r\nSamsung Galaxy Z Flip 4 này giúp bạn thỏa sức sáng tạo mà không lo hư hỏng do ướt bởi khả năng kháng nước đạt chuẩn IPX8. Giúp điện thoại chịu đựng được ở độ sâu 1.5m trong môi trường nước (tối đa 30 phút).\r\n\r\nTrải nghiệm xem hình ảnh đỉnh cao nhất từ trước đến nay\r\nGiải trí và thao tác mà không cần mở điện thoại. Samsung Z Flip 4 cho phép bạn kiểm tra tin nhắn, chụp ảnh, phát nhạc và hơn thế nữa ngay trên màn hình ngoài trực quan lớn hơn với kích thước 1.9-inch.\r\n\r\nTrải nghiệm xem hình ảnh đỉnh cao nhất từ trước đến nay\r\n\r\nCuộn và lướt mượt mà hơn để bắt kịp mọi thông tin, xu hướng mới nhất với màn hình chính 120Hz. Kết hợp với tính năng tối ưu theo nội dung xem cho bạn trải nghiệm xem trên màn hình thêm mãn nhãn.\r\n\r\nSở hữu công nghệ Dynamic AMOLED 2X trên màn hình chính 6.7 inch độ phân giải 2640 x 1080 pixel, Galaxy Z Flip 4 đưa bạn đến gần hơn với thế giới giải trí chuẩn điện ảnh và cực kỳ sống động.\r\n\r\nTrải nghiệm xem hình ảnh đỉnh cao nhất từ trước đến nay\r\n\r\nSamsung Flip 4 với màn hình tỉ lệ 21:9, được đánh giá là một bước cải tiến so với nhiều mầu điện thoại màn hình gập trước đây của SamSung. Đặc biệt, camera đã được ẩn trong màn hình nhờ đó mà các trải nghiệm chơi game hay xem phim có thể diễn ra liền mạch hơn. Tuy là điện thoại gập nhưng khi mở máy ra hết hơn thì máy mang lại màn hình 6.7 inch cùng khả năng hiển thị sắc nét không hề thua kém mẫu điện thoại cơ bản nào.\r\n\r\nMàn hình trên Z Flip 4 còn hỗ trợ khả năng chia đôi màn hình thông minh nhờ đó người dùng có thể vừa làm việc vừa nhắn tin hay xem video vô cùng tiện lợi.\r\n\r\nCamera định hình lại phong cách chụp ảnh của bạn\r\nSamsung Z Flip 4 được trang bị bộ đôi camera sau 12MP ngay trên màn hình ngoài và camera trước ở màn hình trong là 10MP. Điểm đặc biệt ở phiên bản này đó là camera sau có khả năng xoay, mang đến trải nghiệm nhiếp ảnh mới mẻ và thú vị nhất từ trước đến nay.\r\n\r\nĐịnh hình lại phong cách chụp ảnh của bạn\r\n\r\nTuy không có nhiều khác biệt về thông số so với người tiền nhiệm nhưng điện thoại Galaxy Z Flip 4 có thể mang lại khả năng chụp ảnh chất lượng hơn với phần mềm được cải thiện. Cụ thể, Samsung Galaxy Z Flip 4 có thể mang lại những bức ảnh chất lượng cao qua những tính năng chụp ảnh thông minh.\r\n\r\nCamera selfie trên ZFlip 4 có thể mang lại những bức ảnh tự sướng tự nhiên, màu sắc sống động. Đặc biệt thiết kế màn hình gập thông minh còn hỗ trợ chụp ảnh selfie từ màn hình ngoài vô cùng tiện lợi. Khi cần chụp chỉ nhần nhấn nút  tăng – giảm âm lượng là có thể chụp nhanh mà không cần mở máy.\r\n\r\nHay với chế độ tự đứng người dùng có thể chụp ảnh và quay pin dễ dàng thông qua cử chỉ tay, kể cả trong các chuyến đi một mình.\r\n\r\nĐiện thoại Samsung Flip 4 cho phép bạn bắt trọn mọi khoảnh khắc chỉ với 1 chạm. Chỉ cần chọn chế độ Flex cam là có thể chụp ảnh và quay phim cùng một lúc đầy sáng tạo với nhiều góc độ mới lạ.\r\n\r\nKhông chỉ vậy, Flex cam còn cho phép điện thoại đứng vững trên bề mặt phẳng, bạn có thể ghi trọn mọi thước phim ấn tượng, không bị mờ mà không cần đến phụ kiện hỗ trợ rườm rà.\r\n\r\nĐịnh hình lại phong cách chụp ảnh của bạn\r\n\r\nDung lượng lưu trữ thoải mái\r\nĐiện thoại Samsung Z Flip 4 được trang bị dung lượng bộ nhớ trong phiên bản tiêu chuẩn là 128GB. Đây là một mức dung lượng lớn giúp người dùng có thể thoải mái cài đặt và lưu trữ các ứng dụng mà không cần lo lắng đầy bộ nhớ.\r\n\r\nỞ phiên bản dung lượng tối đa, Galaxy Z Flip 4 với 512GB bộ nhớ mang lại một không gian lưu trữ khổng lồ. Bộ nhớ lưu trữ lớn đặc biệt thích hợp với dùng dùng sáng tạo nội dung, cần lưu trữ hình ảnh và video độ phân giải cao với số lượng lớn.\r\n\r\nChip xử lý mạnh mẽ, cân mọi tác vụ\r\nKhông chỉ được chú trong nâng cấp về thiết kế bên ngoài mà cấu hình phần cứng trên Galaxy Z Flip 4 cũng được chú trọng đầu tư. Cụ thể, điện thoại sẽ được trang bị con chip Snapdragon 8+ Gen 1 mới nhất. Trong đó có lõi chính Cortex-X1 hoạt động trên tốc độ 2.995 GHz, ba lõi là Cortex-A78 hoạt động với tốc độ 2.42GHz. Cuối cùng là bốn lõi Cortex-A55 với tốc độ tới 1.8 GHz.\r\n\r\nKết hợp với bộ nhớ RAM tới 8GB nhờ đó thiết bị mang lại không khả năng đa nhiệm ổn định và mượt mà. Người dùng có thể thoải mái chơi game đồ họa 3D nặng hay xem youtube, livestream một cách thoải mái mà không cần lo lắng đến tình trạng giật – lag.\r\n\r\nĐánh giá Samsung Galaxy Z Flip 4\r\n\r\nThiết bị còn nâng cao khả năng giải trí với công nghệ Dolby Atmos. Nhờ đó mà các trải nghiệm âm thanh trong trò chơi, video giải trí phát ra vô cùng sống động.\r\n\r\nViên pin dung lượng lớn, sạc nhanh siêu tốc\r\nVới pin kép thông minh 3700mAh, sạc nhanh 25W và công nghệ AI tích hợp để tối ưu mức pin theo thói quen trải nghiệm, Samsung Z Flip 4 cho bạn nhiều thời gian hơn để hoàn thành công việc hoặc làm điều bạn thích. Nhìn chung, với mức dung lượng lớn này Samsung Galaxy Z Flip 4 mang lại thời gián sử dụng nhiều giờ. \r\n\r\nMọi trải nghiệm trong tầm tay với viên pin dung lượng lớn\r\n\r\nBên cạnh đó là một con chip tiết kiệm điện năng, nhờ đó mà thời gian trả nghiệm và sử dụng của Galaxy Z Flip 4 sẽ kéo dài hơn. Không chỉ sạc nhanh có dây công suất lớn, điện thoại còn hỗ trợ tính năng sạc nhanh không dây Fast Wireless Charging 2.0.  \r\n\r\nĐiện thoại thông minh Samsung Z Flip 4 còn được trang bị tính năng bảo mật vân tay một chạm thông minh. Nhờ đó người dùng có thể mở khóa nhanh chóng mà không cần tháo khẩu trang. Kết hợp với đó là Samsung Knox giúp bảo vệ dữ liệu theo thời gian thực.\r\n\r\nKhả năng chống nước và bụi tốt\r\nLà sản phẩm flagship do đó Z Flip 4 chắc chắn sẽ được trang bị tính năng kháng nước và bụi bẩn. Với tính năng kháng nước thông minh này, người dùng có thể mang theo sống ảo ở bể bơi, gần sông suối. Tính năng hỗ trợ người dùng có thể sử dụng trong nhiều điều kiện môi trường và thời tiết.\r\n\r\nTuy nhiên, nhà sản xuất sẽ không bảo hành tính năng này, do đó khuyến khích người tiêu dùng không nên test thử.\r\n\r\nSamsung Galaxy Z Flip 4 gập được bao nhiêu lần?\r\nVới mẫu màn hình gập người dùng rất quan tâm đến độ bền của thiết bị và với Galaxy Z Flip 4 cũng không ngoại lệ. Ở thế hệ Galaxy Z Flip 3, thiết bị cũng vượt qua bài kiểm tra với gần 200.000 lần gập mở. Như vậy Galaxy Z Flip 4 với nhiều cải tiến về bản lề cũng sẽ cho khả năng gập mở tương tự hoặc lớn hơn.\r\n\r\nNhư vậy người dùng hoàn toàn có thể an tâm và sử dụng thiết bị lên tới gần 4 năm với trung bình 150 lần gập – mở mỗi ngày.\r\n\r\nHơn thế nữa, phần vỏ của máy được hoàn thiện từ lớp kính cường lực cứng nhất hiện tại - Corning Gorilla Glass Victus cùng bản lệ được bảo vệ bởi khung nhôm Armor Aluminum vô cùng bền bỉ.\r\n\r\nSamsung Galaxy Z Flip 4 khi nào ra mắt?\r\nVới những tính năng hấp dẫn, đây là một trong những chiếc smartphone được nhiều người dùng quan tâm trong năm 2022. Vậy điện thoại Samsung Z Flip 4 bao giờ ra mắt? Tính đến thời điểm hiện tại vẫn chưa có nhiều thông tin chính thức về thời gian ra mắt của mẫu điện thoại Samsung mới này. Tuy nhiên, khả năng rất lớn thiết bị sẽ được Samsung giới thiệu đến người dùng tại sự kiện Galaxy Unpacked 2022. Sự kiện dự kiến được tổ chức vào ngày 10 tháng 8 tới đây.\r\n\r\nĐánh giá Samsung Galaxy Z Flip 4\r\n\r\nThế hệ Samsung Galaxy Z Flip 3 cũng được giới thiệu trong sự kiện này nên có thể nói gần như chắc chắn Flip 4 sẽ được chính thức ra mắt cùng với Z Fold 4 vào ngày 10 tháng 8 năm 2022. Tuy nhiên cũng không ngoại trừ khả năng khác khi mà thế hệ màn hình gập không được Samsung cho ra mắt theo chu kỳ nhất định khi Galaxy Z Flip thế hệ đầu được ra mắt vào tháng 2 và thế hệ tiếp theo được ra mắt trong tháng 8.\r\n\r\nSamsung Galaxy Z Flip 4 giá bao nhiêu?\r\nCũng như ngày ra mắt, hiện tại vẫn chưa có nhiều thông tin về giá bán của mẫu điện thoại màn hình gập dạng vỏ sò này. Tuy nhiên có nhiều dự kiến về giá bán được đưa ra bởi các trang tin công nghệ thì Samsung Flip 4 có thể lên kệ với mức giá 1229 USD ở thị trường Hoa Kỳ hay 1050 EUR ở thị trường Châu Âu, tương đương từ 27 đến 28 triệu đồng.\r\n\r\nĐánh giá Samsung Galaxy Z Flip 4\r\n\r\nGiá bán mẫu điện thoại mới Samsung Z Flip 4 dự kiến sẽ lên kệ thấp hơn so với người tiền nhiệm Z Flip 3. Điều này cũng có thể sảy ra khi nhiều nguồn tin cho thấy mẫu điện thoại đồng hành Galaxy Z Fold 4 được lên kệ thấp hơn Galaxy Z Fold 3. Hay thế hệ Galaxy Z Flip 3 cũng rẻ hơn tới gần 400 USD so với Galaxy Z Flip thế hệ đầu.\r\n\r\nĐiện thoại Samsung Galaxy Z Flip 4 có mấy màu sắc?\r\nVề màu sắc, điện thoại Samsung Galaxy Z Fold 4 sẽ có nhiều phiên bản màu hơn so với Z Flip 3. Cụ thể, nếu Samsung Z Flip 3 sở hữu bốn màu sắc:\r\n\r\n-   Tím Bora\r\n\r\n-   Xám Graphite\r\n\r\n-   Xanh Lovebird\r\n\r\n-   Hồng Champagne\r\n\r\nĐiện thoại Samsung Galaxy Z Flip 4 có mấy màu sắc?\r\n\r\nBên cạnh đó với phiên bản Samsung Z Flip 4 đặc biệt, Samsung đã trang bị phiên bản phiên bản Bespoke. Nhờ đó mà người dùng có thể kết hợp các màu sắc khác nhau để tự do khoe cá tính. Trong đó khung viền có ba màu lựa chọn là vàng đồng, đen, bạc.\r\n\r\nĐánh giá dung lượng pin Samsung Z Flip4 \r\n(Cập nhật 20/8)\r\n\r\nĐiện thoại Samsung Z Flip4 sở hữu viên pin dung lượng lên đến 3700 mAh, tăng 12% so với người tiên nhiệm. Cụ thể, trong bài test, điện thoại cho thời gian lướt web lên đến 11 tiếng 40 phút, nếu sử dụng để xem Youtube liên tục, thiết bị có thể trụ đến 9 tiếng 45 phút (Lưu ý thời gian sử dụng có thể thay đổi tùy theo mức độ sáng của màn hình).\r\n\r\nSamsung Z Flip4 nâng cấp gì so với Z Flip 3?\r\n(Cập nhật 14/08)\r\n\r\nSau khi Samsung Z Flip4 chính thức được trình làng, người dùng có thể dễ dàng nhận thấy mẫu Samsung Z mới này kế thừa nhiều đặc điểm của người đi trước nhưng cũng được cải tiến nhiều tính năng.\r\n\r\nNgoại hình sang trọng hơn\r\nKhác với khung viền bo tròn trên Z Flip 3 thì Samsung Z Flip 4 tuy vẫn ở hữu thiết kế gập như hộp trang điểm nhưng sang trọng hơn với khung viền vuông vắn. Do đó nếu Samsung Z Flip 3 hơi hướng nữ tính thì Galaxy Z Flip 4 lại có chút mạnh mẽ, phù hợp cho cả người dùng nam và nữ.\r\n\r\nSamsung Z Flip4 - Ngoại hình sang trọng\r\n\r\nPhần bản lề trên Z Flip 4 được Samsung hoàn thiện tỉ mỉ hơn, tổng thể gọn hơn và ít bị nhô ra ngoài. Khung viền kim loại của thiết bị cũng khá mỏng giúp tăng tỉ lệ của mặt lưng kính giúp thiết bị sở hữu một vẻ ngoài sang trọng.\r\n\r\nMàn hình bổ sung nhiều tính năng\r\nTuy không có sự thay đổi về kích thước so với thế hệ cũ nhưng Z Flip 4 được nâng cấp thêm nhiều tính năng thông minh. Đơn cử như màn hình phụ người dùng có thể tạo được Ar emoji cá nhân, tạo nhieefeu widget hơn hay trả lời tin nhắn nhanh. Màn hình chính bền hơn với mặt kính cường lực Gorilla Glass Victus+.\r\n\r\nSamsung Z Flip4 - màn hinh nhiều tính năng\r\n\r\nCảm biến camera được nâng cấp\r\nTuy vẫn giữ thông số độ phân giải nhưng cảm biến trên Galaxy Z Flip 4 đã được nâng cấp. Cụ thể cảm biến camera chính được thay đổi từ 1,4µm lên 1,8µm. Nhờ đó mà khả năng chụp ảnh trên thế hệ Z Flip 4 sẽ tốt hơn với hình ảnh sắc nét hơn, khả năng thu sáng tốt hơn.\r\n\r\nNâng cấp con chip cùng bộ nhớ trong\r\nĐiểm khác biệt lớn nhất trong cấu hình Samsung Z Flip 4 đó chính là con chip Snapdragon 8+, con chip mạnh mẽ mang lại một hiệu năng vượt trội. Bên cạnh đó, bộ nhớ trong trên thiết bị cũng được mở rộng với phiên bản cấu hình tối đa có dung lượng bộ nhớ lên đến 512GB.\r\n\r\nSamsung Z Flip4 - Nâng cấp về hiệu năng\r\n\r\nViên pin được nâng cấp về dung lượng và khả năng sạc nhanh\r\nPin cải thiện là tính năng được nhiều người dùng hi vọng trước khi điện thoại chính tức ra mắt và Samsung đã thỏa mãn mong ước của người dùng. Z Flip 4 không chỉ được nâng cấp về dung lượng pin lên 3700 mAh (Lớn hơn 12% so với thế hệ trước) mà còn nâng cấp khả năng sạc nhanh từ 15W lên 25W.', 1, '15990000', 0, 'f8db5a4552.webp', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_review`
--

CREATE TABLE `tbl_review` (
  `commentId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerId` varchar(255) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_review`
--

INSERT INTO `tbl_review` (`commentId`, `productId`, `customerId`, `customerName`, `comment`, `CreatedAt`) VALUES
(13, 19, '10', 'Nguyen Thi Linh Phuong', 'xin chao\r\n', '0000-00-00 00:00:00'),
(14, 19, '10', 'Nguyen Thi Linh Phuong', 'f', '2023-06-15 05:53:52'),
(15, 19, '13', 'Tran Nguyen Dang Huy', 'ff', '2023-06-15 06:12:34'),
(16, 19, '13', 'Tran Nguyen Dang Huy', 'fasdfsad', '2023-06-15 06:12:37'),
(17, 24, '10', 'Nguyen Thi Linh Phuong', 'fadsf', '2023-06-15 07:15:25'),
(18, 24, '10', 'Nguyen Thi Linh Phuong', 'fadsf', '2023-06-15 07:15:25'),
(19, 24, '10', 'Nguyen Thi Linh Phuong', 'fadsf', '2023-06-15 07:15:25'),
(20, 24, '10', 'Nguyen Thi Linh Phuong', 'fadsf', '2023-06-15 07:15:25'),
(21, 24, '10', 'Nguyen Thi Linh Phuong', 'fadsf', '2023-06-15 07:15:25'),
(22, 24, '10', 'Nguyen Thi Linh Phuong', 'fadsf', '2023-06-15 07:15:26'),
(23, 24, '10', 'Nguyen Thi Linh Phuong', 'fadsf', '2023-06-15 07:15:26'),
(24, 24, '10', 'Nguyen Thi Linh Phuong', 'fadsf', '2023-06-15 07:15:26'),
(25, 24, '10', 'Nguyen Thi Linh Phuong', 'fadsf', '2023-06-15 07:15:26'),
(26, 24, '10', 'Nguyen Thi Linh Phuong', 'fadsf', '2023-06-15 07:15:26'),
(27, 24, '10', 'Nguyen Thi Linh Phuong', 'fadsf', '2023-06-15 07:15:26'),
(28, 24, '10', 'Nguyen Thi Linh Phuong', 'fadsf', '2023-06-15 07:15:27'),
(29, 24, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfa', '2023-06-15 07:16:47'),
(30, 24, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfa', '2023-06-15 07:16:47'),
(31, 24, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfa', '2023-06-15 07:16:47'),
(32, 24, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfa', '2023-06-15 07:16:48'),
(59, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:28'),
(60, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:28'),
(61, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:28'),
(62, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:28'),
(63, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:28'),
(65, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:29'),
(66, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:29'),
(67, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:29'),
(68, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:29'),
(69, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:29'),
(70, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:29'),
(71, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:29'),
(72, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:29'),
(73, 26, '10', 'Nguyen Thi Linh Phuong', 'fdasfasdfsda', '2023-06-15 08:30:30'),
(74, 25, '10', 'Nguyen Thi Linh Phuong', 'dsadas', '2023-06-28 11:10:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `sliderDesc` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `sliderName`, `sliderDesc`, `image`, `type`, `title`) VALUES
(7, 'Samsung Slider', 'Samsung Slider', '01-hd02-B4-kv-pc-1440x640.webp', 1, 'Samsung Slider'),
(9, 'Apple new gen', 'Apple new gen', 'd4c4fa6011.jpg', 1, 'Apple new gen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(7, 10, 36, 'Samsung Galaxy S22 Ultra 5G (12GB | 256GB)', '14990000', 'trang_4k05-pq.jpg'),
(9, 17, 31, 'iPhone 14 Plus 256GB  Chính Hãng (VN/A)', '24790000', 'iphone-13-pro-128gb-mau-bac-didongviet.webp'),
(10, 17, 35, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', '12999000', 'den_oz8l-qv.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `catId` (`catId`),
  ADD KEY `brandId` (`brandId`);

--
-- Chỉ mục cho bảng `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `customerId` (`customerId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `productId` (`productId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000002;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121792;

--
-- AUTO_INCREMENT cho bảng `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD CONSTRAINT `tbl_brand_ibfk_1` FOREIGN KEY (`brandId`) REFERENCES `tbl_product` (`brandId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD CONSTRAINT `tbl_category_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `tbl_product` (`catId`);

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `tbl_wishlist_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
