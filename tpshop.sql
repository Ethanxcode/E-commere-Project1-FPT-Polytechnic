-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 21, 2023 lúc 05:15 AM
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
(10, 'Nguyen Thi Linh Phuong', '12345678901', 'linhphuong', 'c4ca4238a0b923820dcc509a6f75849b', 'linhphuong@gmail.com', '22e4ad1321.jpg', '1/1 blabla bla blaf'),
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
(121780, 30, 37, 'iPhone 14 Plus 512GB Chính Hãng (VN/A)', 10, 6, '179454000', 'iphone1.jpeg', 0, '2023-07-20 21:49:24'),
(121781, 35, 38, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 10, 1, '14298900', 'den_oz8l-qv.jpg', 0, '2023-07-20 22:02:43'),
(121782, 34, 39, 'Xiaomi 12T', 10, 1, '13189000', 'note-12.jpg', 0, '2023-07-20 22:03:25'),
(121783, 35, 40, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 10, 1, '14298900', 'den_oz8l-qv.jpg', 0, '2023-07-20 22:04:56');

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
(34, 10, '2023-07-20 18:40:03', 'Giao tận tay ', 32000000.00, 2, '1/1 blabla bla blaf', 30.00, 2),
(35, 10, '2023-07-20 18:50:49', 'ffffff', 20010000.00, 2, '1/1 blabla bla blaf', 0.00, 1),
(37, 10, '2023-07-20 21:49:24', 'Giao tận tay ', 99999999.99, 0, '1/1 blabla bla blaf', 0.00, 0),
(38, 10, '2023-07-20 22:02:43', '', 13019000.00, 0, '1/1 blabla bla blaf', 0.00, 0),
(39, 10, '2023-07-20 22:03:25', '', 12010000.00, 0, '1/1 blabla bla blaf', 0.00, 0),
(40, 10, '2023-07-20 22:04:56', '', 13019000.00, 0, '1/1 blabla bla blaf', 0.00, 0);

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
(36, 'Samsung Galaxy S22 Ultra 5G (12GB | 256GB)', 18, 0, '&lt;ul&gt;\r\n&lt;li class=&quot;icon-info-auth&quot;&gt;Bảo hành&lt;strong&gt; 6 tháng&lt;/strong&gt; tại Đức Huy Mobile.&lt;/li&gt;\r\n&lt;li class=&quot;icon-info-freeship&quot;&gt;Giao hàng C.O.D trên toàn quốc&lt;/li&gt;\r\n&lt;li class=&quot;icon-info-status&quot;&gt;&lt;strong&gt;Bộ sản phẩm:&lt;/strong&gt; Cáp, Sạc 15W&lt;/li&gt;\r\n&lt;li class=&quot;icon-info-installment&quot;&gt;&lt;strong&gt;Trả trước 30%&lt;/strong&gt; qua &lt;a class=&quot;link_tragop&quot; href=&quot;https://www.duchuymobile.com/mua-tra-gop?product_id=5180&quot; rel=&quot;nofollow&quot;&gt;Công ty tài chính&lt;/a&gt;. Thủ tục chỉ cần CCCD + GPLX;&lt;/li&gt;\r\n&lt;li class=&quot;icon-info-auth&quot;&gt;Bao test 1 đổi 1 trong &lt;strong&gt;15 ngày&lt;/strong&gt; bao gồm nguồn và màn hình&lt;/li&gt;\r\n&lt;li class=&quot;installment-last&quot;&gt;Hoặc trả góp &lt;strong&gt;lãi suất 0%&lt;/strong&gt; qua thẻ tín dụng Visa, Master, JCB.&lt;br /&gt;&lt;br /&gt;\r\n&lt;h3&gt;Thông số sản phẩm&lt;/h3&gt;\r\n&lt;div class=&quot;content-product_features&quot;&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Mặt kính cảm ứng:&lt;/label&gt;&lt;span&gt;Gorilla Glass Victus+&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Độ phân giải:&lt;/label&gt;&lt;span&gt;2K+ (1440 x 3088 Pixels)&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Màn hình rộng:&lt;/label&gt;&lt;span&gt;6.8 inches, 111.6 cm2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Camera sau:&lt;/label&gt;&lt;span&gt;108 MP, 10MP và 10MP+ 12MP&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Quay Phim:&lt;/label&gt;&lt;span&gt;8K@24fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Hệ điều hành:&lt;/label&gt;&lt;span&gt;Android 12, One UI 4&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Chipset:&lt;/label&gt;&lt;span&gt;Snapdragon 8 Gen 1 8 nhân&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;RAM:&lt;/label&gt;&lt;span&gt;12 GB&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Bộ nhớ trong ( Rom):&lt;/label&gt;&lt;span&gt;256GB&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;features-list-item&quot;&gt;&lt;label&gt;Dung lượng pin:&lt;/label&gt;&lt;span&gt;5000 mAh&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;\r\n&lt;div class=&quot; tab_product_view&quot;&gt;\r\n&lt;div class=&quot;home-header-banner&quot;&gt;\r\n&lt;div id=&quot;image_pairs5180&quot; class=&quot;banners owl-carousel owl-theme&quot;&gt;\r\n&lt;div class=&quot;owl-wrapper-outer&quot;&gt;\r\n&lt;div class=&quot;owl-wrapper&quot;&gt;\r\n&lt;div class=&quot;owl-item&quot;&gt;\r\n&lt;div class=&quot;item&quot; title=&quot;&quot;&gt;&lt;img id=&quot;det_img_1696820351&quot; class=&quot;ty-pict   lazyOwl   cm-image&quot; title=&quot;Samsung Galaxy S21 5G 128GB Chính Hãng&quot; src=&quot;https://www.duchuymobile.com/images/detailed/52/so-luong-s22-ultra.jpg&quot; alt=&quot;Samsung Galaxy S21 5G 128GB Chính Hãng&quot; width=&quot;873&quot; height=&quot;485&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;owl-item&quot;&gt;\r\n&lt;div class=&quot;item&quot; title=&quot;&quot;&gt;&lt;img id=&quot;det_img_711402376&quot; class=&quot;ty-pict   lazyOwl   cm-image&quot; title=&quot;Samsung Galaxy S21 5G 128GB Chính Hãng&quot; src=&quot;https://www.duchuymobile.com/images/detailed/52/canh-tren-s22-ultra.jpg&quot; alt=&quot;Samsung Galaxy S21 5G 128GB Chính Hãng&quot; width=&quot;873&quot; height=&quot;485&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;owl-item&quot;&gt;\r\n&lt;div class=&quot;item&quot; title=&quot;&quot;&gt;&lt;img id=&quot;det_img_774769026&quot; class=&quot;ty-pict   lazyOwl   cm-image&quot; title=&quot;Samsung Galaxy S22 Ultra 5G (12GB | 256GB) Hàn Quốc Like New&quot; src=&quot;https://www.duchuymobile.com/images/detailed/52/canh_6ipi-pq.jpg&quot; alt=&quot;Samsung Galaxy S22 Ultra 5G (12GB | 256GB) Hàn Quốc Like New&quot; width=&quot;873&quot; height=&quot;485&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;owl-item&quot;&gt;\r\n&lt;div class=&quot;item&quot; title=&quot;&quot;&gt;&lt;img id=&quot;det_img_2024953406&quot; class=&quot;ty-pict   lazyOwl   cm-image&quot; title=&quot;Samsung Galaxy S22 Ultra 5G (12GB | 256GB) Hàn Quốc Like New&quot; src=&quot;https://www.duchuymobile.com/images/detailed/52/camera-s22-ultra.jpg&quot; alt=&quot;Samsung Galaxy S22 Ultra 5G (12GB | 256GB) Hàn Quốc Like New&quot; width=&quot;873&quot; height=&quot;485&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;owl-item&quot;&gt;\r\n&lt;div class=&quot;item&quot; title=&quot;&quot;&gt;&lt;img id=&quot;det_img_287687676&quot; class=&quot;ty-pict   lazyOwl   cm-image&quot; title=&quot;Samsung Galaxy S22 Ultra 5G (12GB | 256GB) Hàn Quốc Like New&quot; src=&quot;https://www.duchuymobile.com/images/detailed/52/man-hinh.jpg&quot; alt=&quot;Samsung Galaxy S22 Ultra 5G (12GB | 256GB) Hàn Quốc Like New&quot; width=&quot;873&quot; height=&quot;485&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;owl-controls clickable&quot;&gt; &lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;content_description&quot; class=&quot;wysiwyg-content&quot;&gt;\r\n&lt;div&gt;\r\n&lt;p&gt;&lt;a href=&quot;https://www.duchuymobile.com/samsung-galaxy-s22-ultra-5g-256gb-han-quoc-cu&quot; target=&quot;_blank&quot;&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ&lt;/a&gt; là flagship cao cấp nhất hiện nay trong dòng dòng sản phẩm &lt;a href=&quot;https://www.duchuymobile.com/samsung-galaxy-s22-plus-ultra-5g&quot; target=&quot;_blank&quot;&gt;Galaxy S22 | S22+ | S22 Ultra 5G&lt;/a&gt; của nhà sản xuất Hàn Quốc. Thiết bị sở hữu vi xử lý Snapdragon 8 Gen 1 8 nhân mạnh mẽ, hỗ trợ bút S Pen, màn hình có tần số quét 120Hz mượt mà, cảm biến camera chính độ phân giải đến 108MP cho Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ chụp ảnh sắc nét. &lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/galaxy-s22-ultra-5g-256gb-han.jpg&quot; alt=&quot;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ sẵn hàng giá rẻ nhất.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/canh-galaxy-s22-ultra-5g-256gb-han.jpg&quot; alt=&quot;cạnh Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ&quot; /&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có ngoại hình đẹp keng như mới, ít trầy xước.&lt;/em&gt;&lt;/p&gt;\r\n&lt;h3&gt;&lt;span&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có thiết kế nổi bật, camera chất:&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/galaxy-s22-ultra-5g-256gb-han-mau-trang.jpg&quot; alt=&quot;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ màu trắng &quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Trên tay Samsung S22 Ultra 5G Hàn Quốc cũ màu trắng tinh khôi.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Mẫu smartphone Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ sở hữu thiết kế cao cấp khá thanh mảnh và đẹp mắt. Máy có kích thước Dài 163.3 mm - Ngang 77.9 mm - Dày 8.9 mm, trọng lượng 228 g và 4 góc bo cong mềm mại tạo cảm giác cầm nắm điện thoại Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ thoải mái. &lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/galaxy-s22-ultra-5g-256gb-han-den.jpg&quot; alt=&quot;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ màu đen&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Galaxy S22 Ultra 5G Hàn Quốc cũ sở hữu thiết kế bắt mắt&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Nếu so với kích thước của &lt;a href=&quot;https://www.duchuymobile.com/samsung-galaxy-s22-5g&quot; target=&quot;_blank&quot;&gt;Samsung Galaxy S22 5G 128GB&lt;/a&gt; và &lt;a href=&quot;https://www.duchuymobile.com/samsung-galaxy-s22-plus-5g&quot; target=&quot;_blank&quot;&gt;Samsung Galaxy S22 Plus 5G 128GB&lt;/a&gt; thì Galaxy S22 Ultra 5G Hàn Quốc cũ có phần to hơn. Tuy nhiên vẫn đảm bảo việc cầm nắm gọn nhẹ, vừa tay. &lt;/p&gt;\r\n&lt;h3&gt;&lt;span&gt;Màn hình Samsung S22 Ultra 5G Hàn Quốc cũ lớn có tần số quét lên đến 120Hz:&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p&gt;Màn hình Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có chất lượng cao cùng kích thước lớn 6.8 inches với tấm nền Dynamic AMOLED 2X cao cấp và độ phân giải 2K+ (1440 x 3088 Pixels) hiển thị sắc nét. &lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/chip-galaxy-s22-ultra-5g-256gb-han.jpg&quot; alt=&quot;hiển thị Galaxy S22 Ultra 5G Hàn Quốc cũ&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Màn hình Galaxy S22 Ultra 5G Hàn Quốc cũ còn được phủ kính cường lực Gorilla Glass Victus+ cứng cáp.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Camera trước của Galaxy S22 Ultra 5G Hàn Quốc cũ được hãng &lt;a href=&quot;https://www.duchuymobile.com/samsung-galaxy&quot; target=&quot;_blank&quot;&gt;điện thoại Samsung&lt;/a&gt; thiết kế đục lỗ và đặt ở giữa sát cạnh trên màn hình. Ngoài ra, mẫu flagship Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ giá rẻ có tần số quét cao lên đến 120Hz. &lt;/p&gt;\r\n&lt;h3&gt;&lt;span&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có cụm camera 4 ống kính chính 108MP&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p&gt;Mẫu điện thoại Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ được trang bị tất cả là 4 camera sau “rất đỉnh” với cảm biến chính độ phân giải đến 108MP, cùng các cảm biến Phụ với độ phân giải lần lượt là 12 MP, 10 MP, 10 MP với nhiều chế độ chụp ảnh như: Ban đêm (Night Mode), Tự động lấy nét (AF), Chống rung quang học (OIS), Làm đẹp, Chuyên nghiệp (Pro), AI Camera... cho Galaxy S22 Ultra 5G Hàn Quốc khả năng nhiếp ảnh đỉnh cao.&lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/galaxy-s22-ultra-5g-256gb-xanh.jpg&quot; alt=&quot;camera Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có camera đỉnh của &quot;chóp&quot;.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Camera selfie trên Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ giá rẻ là ống kính 40MP mang lại cho bạn những bức ảnh selfie tuyệt vời nhất. Ngoài ra, siêu phẩm Galaxy S22 Ultra 5G Hàn Quốc cũ còn khả năng quay video 8K cho những hình ảnh, chuyển động vẫn giữ được độ phân giải siêu sắc nét.&lt;/p&gt;\r\n&lt;h3&gt;&lt;span&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có hiệu năng mạnh mẽ:&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p&gt;Hiệu năng ấn tượng trên chiếc flagship Samsung S22 Ultra 5G Hàn Quốc cũ với dung lượng RAM 12GB cùng chip Snapdragon 8 Gen 1 8 nhân mạnh nhất của Qualcomm, máy chạy trên hệ điều hành Android 12 mới nhất cho người dùng những trải nghiệm thú vị. &lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/sim-galaxy-s22-ultra-5g-256gb-han.jpg&quot; alt=&quot;pin Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ có h&lt;em&gt;iệu năng mạnh mẽ nhờ chip Rồng 8 Gen 1 đầu bảng.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Với con chip khủng này, model Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ sẽ mang đến một tốc độ xử lý cực kỳ mượt mà và nhanh chóng. Đi kèm với máy là dung lượng bộ nhớ trong 256GB cho phép bạn lưu trữ thoải mái hình ảnh, video và tài liệu. &lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/pin-galaxy-s22-ultra-5g-256gb-han.jpg&quot; alt=&quot;pin Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ giá rẻ có thời gian sử dụng ấn tượng.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Cuối cùng, Samsung Galaxy S22 Ultra 5G Hàn Quốc cũ còn được trang bị viên pin với dung lượng lớn 5.000 mAh hỗ trợ sạc nhanh công suất đến 45W. Với mức dung lượng pin này máy hoàn toàn có thể đáp ứng mọi nhu cầu của bạn trong suốt một ngày.  &lt;/p&gt;\r\n&lt;p&gt;Duchuymobile.com&lt;/p&gt;\r\n&lt;p class=&quot;show-more&quot;&gt;&lt;span class=&quot;readmore&quot;&gt;Đọc thêm&lt;/span&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;faq_page&quot;&gt;\r\n&lt;h2 class=&quot;title-detail faq_page-title&quot;&gt;Câu hỏi thường gặp&lt;/h2&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;div id=&quot;eJOY__extension_root&quot; class=&quot;eJOY__extension_root_class&quot; style=&quot;all: unset;&quot;&gt; &lt;/div&gt;', 2, '14990000', 0, 'cdd5e6d076.jpg', 0, 0, 100);

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
(8, 'Iphone slider', 'Iphone slider', 'Apple-iPhone-14-iPhone-14-Plus-hero-220907_Full-Bleed-Image_jpg_large.jpg', 1, 'Iphone slider');

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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`);

--
-- Chỉ mục cho bảng `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Chỉ mục cho bảng `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`commentId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121784;

--
-- AUTO_INCREMENT cho bảng `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
