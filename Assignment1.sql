-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 09, 2023 lúc 09:04 PM
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
(9999999, 'Ethan', 'ethanadmin@gmail.com', 'ethanadmin', 'c4ca4238a0b923820dcc509a6f75849b', 0);

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

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(123, 36, 3, 'Samsung Galaxy S22 Ultra 5G (12GB | 256GB)', '14990000', 1, 'trang_4k05-pq.jpg');

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
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`, `address`) VALUES
(121744, 36, 'Samsung Galaxy S22 Ultra 5G (12GB | 256GB)', 10, 1, '16489000', 'trang_4k05-pq.jpg', 2, '2023-06-28 04:07:37', ''),
(121745, 36, 'Samsung Galaxy S22 Ultra 5G (12GB | 256GB)', 10, 1, '16489000', 'trang_4k05-pq.jpg', 1, '2023-07-06 19:14:41', ''),
(121746, 36, 'Samsung Galaxy S22 Ultra 5G (12GB | 256GB)', 10, 1, '16489000', 'trang_4k05-pq.jpg', 0, '2023-07-06 19:41:20', ''),
(121747, 30, 'iPhone 14 Plus 512GB Chính Hãng (VN/A)', 10, 1, '29909000', 'iphone1.jpeg', 0, '2023-07-06 19:41:20', ''),
(121748, 25, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 17, 1, '21989000', 'iPad-New-2021-WF-sgy-1.jpg', 0, '2023-07-09 18:23:33', ''),
(121749, 35, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 17, 1, '14298900', 'den_oz8l-qv.jpg', 0, '2023-07-09 18:23:33', '');

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
  `image` varchar(255) NOT NULL,
  `sales` int(255) NOT NULL DEFAULT 0,
  `comments` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`, `sales`, `comments`) VALUES
(23, 'Samsung Galaxy S22 Ultra 5G (8GB | 128GB) ', 21, 12, '<ul>\r\n<li>Samsung Galaxy S22&nbsp;Ultra 5G (8GB | 128GB) Mỹ l&agrave; m&aacute;y Mới 100% Fullbox đầy đủ phụ kiện xịn, bảo h&agrave;nh 12 th&aacute;ng tại Đức Huy Mobile</li>\r\n<li>Galaxy S22&nbsp;Ultra 5G&nbsp;128GB Mỹ&nbsp;<span>2 SIM 2 S&oacute;ng</span>,&nbsp;<span>sẵn Tiếng Việt</span>&nbsp;trải nghiệm kh&ocirc;ng kh&aacute;c g&igrave; bản ch&iacute;nh h&atilde;ng.</li>\r\n<li>M&aacute;y sở hữu thiết kế sang trọng, cấu h&igrave;nh khủng với camera 108MP, chip&nbsp;Snapdragon 8 Gen 1, pin khủng 5000 mAh</li>\r\n<li>Gi&aacute; Samsung S22 Ultra&nbsp;5G 128GB Mỹ New Fullbox lu&ocirc;n rẻ hơn thị trường, ưu đ&atilde;i&nbsp;thu cũ đổi &amp; hỗ trợ trả g&oacute;p 0%, ship COD.</li>\r\n<li>\r\n<div class=\"home-header-banner\">\r\n<div id=\"image_pairs5167\" class=\"banners owl-carousel owl-theme\">\r\n<div class=\"owl-wrapper-outer\">\r\n<div class=\"owl-wrapper\">\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_2037378580\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S21 5G 128GB Ch&iacute;nh H&atilde;ng\" src=\"https://www.duchuymobile.com/images/detailed/56/full_2vf6-gu.jpg\" alt=\"Samsung Galaxy S21 5G 128GB Ch&iacute;nh H&atilde;ng\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_497646198\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S21 5G 128GB Ch&iacute;nh H&atilde;ng\" src=\"https://www.duchuymobile.com/images/detailed/56/my.jpg\" alt=\"Samsung Galaxy S21 5G 128GB Ch&iacute;nh H&atilde;ng\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_817590769\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S22 Ultra 5G (12GB | 128GB) Mỹ Mới 100%\" src=\"https://www.duchuymobile.com/images/detailed/56/mua_dr9o-o4.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G (12GB | 128GB) Mỹ Mới 100%\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_986200358\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S22 Ultra 5G (12GB | 128GB) Mỹ Mới 100%\" src=\"https://www.duchuymobile.com/images/detailed/56/spen.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G (12GB | 128GB) Mỹ Mới 100%\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_1096257094\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S22 Ultra 5G (8GB | 128GB) Mỹ 2 SIM Mới 100%\" src=\"https://www.duchuymobile.com/images/detailed/56/camera_226t-xe.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G (8GB | 128GB) Mỹ 2 SIM Mới 100%\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_1600938227\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S22 Ultra 5G (8GB | 128GB) Mỹ 2 SIM Mới 100%\" src=\"https://www.duchuymobile.com/images/detailed/56/man-hinh_8hzi-h6.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G (8GB | 128GB) Mỹ 2 SIM Mới 100%\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"owl-controls clickable\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div id=\"content_description\" class=\"wysiwyg-content\">\r\n<div>\r\n<p><a href=\"https://www.duchuymobile.com/samsung-galaxy-s22-ultra-5g-my\" target=\"_blank\">Samsung Galaxy S22 Ultra 5G 128GB) Mỹ Mới 100% Fullbox</a>&nbsp;l&agrave; chiếc flagship cực HOT ở thời điểm hiện tại nhờ model n&agrave;y&nbsp;sở hữu&nbsp;2 SIM 2 S&oacute;ng tiện lợi, sẵn Tiếng Việt,&nbsp;t&iacute;nh năng tương tự c&ugrave;ng&nbsp;trải nghiệm&nbsp;sử dụng&nbsp;kh&ocirc;ng kh&aacute;c g&igrave;&nbsp;<a href=\"https://www.duchuymobile.com/samsung-galaxy-s22-ultra-5g\" target=\"_blank\">Galaxy S22 Ultra 5G ch&iacute;nh h&atilde;ng</a>&nbsp;m&agrave; gi&aacute; b&aacute;n lại rẻ hơn.</p>\r\n</div>\r\n</div>\r\n</li>\r\n</ul>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '15999000', 'A34-sil.jpg', 0, 0),
(25, 'iPad Pro M2 11-inch (2022) | 128GB Wifi', 19, 11, '<p><span>iPad Pro M2 11-inch 128GB Wifi&nbsp;</span><span>l&agrave;&nbsp;m&aacute;y mới&nbsp;</span><span>100%</span><span>,&nbsp;hiện đ&atilde; c&oacute; mặt tại Di Động Việt -&nbsp;</span><span>Đại l&yacute; uỷ quyền ch&iacute;nh thức của Apple tại Việt Nam</span><span>. iPad Pro&nbsp;c&oacute; thiết kế&nbsp;</span><span>tinh tế</span><span>,&nbsp;</span><span>hiện đại</span><span>&nbsp;t&iacute;ch hợp với con chip&nbsp;</span><span>Apple M2</span><span>&nbsp;với hiệu năng cực khủng, m&agrave;n h&igrave;nh&nbsp;</span><span>Liquid Retina 11-inch</span><span>&nbsp;hỗ trợ tần số qu&eacute;t&nbsp;</span><span>120Hz</span><span>&nbsp;hứa hẹn sẽ mang lại nhiều trải nghiệm tuyệt vời cho người d&ugrave;ng.</span></p>\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Th&ocirc;ng tin sản phẩm</span></div>\r\n<div class=\"info-content\">\r\n<p>Bộ sản phẩm gồm: Hộp, Th&acirc;n m&aacute;y, C&aacute;p, Sạc, S&aacute;ch hướng dẫn</p>\r\n</div>\r\n</div>\r\n<hr class=\"line\" />\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Bảo h&agrave;nh</span></div>\r\n<div class=\"info-content\">\r\n<ul>\r\n<li>Gi&aacute; đ&atilde; bao gồm 10% VAT. Bảo h&agrave;nh 12 th&aacute;ng theo ch&iacute;nh s&aacute;ch Apple&nbsp;to&agrave;n cầu. (<a href=\"https://didongviet.vn/tin-tuc/bao-hanh-gioi-han-mot-nam-cua-apple\" rel=\"noopener\" target=\"_blank\">Xem chi tiết</a>)\r\n<p><span>Bảo h&agrave;nh 1 đổi 1 trong 33 ng&agrave;y</span>&nbsp;độc quyền tại Di Động Việt.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '19990000', 'iPad-New-2021-WF-sgy-1.jpg', 1, 0),
(26, 'MacBook Pro 14 inch M2 Pro 2023 | 16GB/1TB', 20, 0, '&lt;p&gt;&lt;span&gt;MacBook Pro 14 inch M2 Pro 2023 | 16GB/1TB &lt;/span&gt;&lt;span&gt;là máy mới &lt;/span&gt;&lt;span&gt;100%&lt;/span&gt;&lt;span&gt;, hiện đã có mặt tại Di Động Việt - &lt;/span&gt;&lt;span&gt;Đại lý uỷ quyền chính thức của Apple tại Việt Nam&lt;/span&gt;&lt;span&gt;. Thiết bị có kiểu dáng &lt;/span&gt;&lt;span&gt;mỏng nhẹ&lt;/span&gt;&lt;span&gt;, màn hình lớn &lt;/span&gt;&lt;span&gt;14.2 inch&lt;/span&gt;&lt;span&gt;, trang bị tấm nền &lt;/span&gt;&lt;span&gt;Liquid Retina XDR&lt;/span&gt;&lt;span&gt;. MacBook Pro có cấu hình hoạt động &lt;/span&gt;&lt;span&gt;mượt mà&lt;/span&gt;&lt;span&gt;, đa tác vụ &lt;/span&gt;&lt;span&gt;nhanh nhạy&lt;/span&gt;&lt;span&gt; với chipset siêu khủng &lt;/span&gt;&lt;span&gt;M2 Pro&lt;/span&gt;&lt;span&gt;. ROM &lt;/span&gt;&lt;span&gt;16GB &lt;/span&gt;&lt;span&gt;và bộ nhớ lưu trữ rộng rãi &lt;/span&gt;&lt;span&gt;1TB&lt;/span&gt;&lt;span&gt;. Thời lượng pin &lt;/span&gt;&lt;span&gt;18 giờ&lt;/span&gt;&lt;span&gt;.&lt;/span&gt;&lt;/p&gt;\r\n&lt;div class=&quot;info-more info-note-more&quot;&gt;\r\n&lt;div class=&quot;info-more-head&quot;&gt;&lt;span&gt;Thông tin sản phẩm&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;info-content&quot;&gt;\r\n&lt;p&gt;Bộ sản phẩm gồm: Hộp, Thân máy, Cáp USB-C to C, Sách HDSD&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;hr class=&quot;line&quot; /&gt;\r\n&lt;div class=&quot;info-more info-note-more&quot;&gt;\r\n&lt;div class=&quot;info-more-head&quot;&gt;&lt;span&gt;Bảo hành&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;info-content&quot;&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Giá đã bao gồm &lt;span&gt;10% VAT&lt;/span&gt;. Bảo hành &lt;span&gt;12 tháng&lt;/span&gt; tại trung tâm bảo hành chính hãng Apple Việt Nam.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;eJOY__extension_root&quot; class=&quot;eJOY__extension_root_class&quot; style=&quot;all: unset;&quot;&gt; &lt;/div&gt;', 2, '60590000', '1684140297189_thumb_macbook_pro_m2_didongviet.webp', 0, 0),
(27, 'iPad 10.9-inch 2022 | 64GB Wifi', 19, 11, '<p><span>iPad Gen 10 64GB Wifi&nbsp;</span>được b&aacute;n tại Di Động Việt được bảo h&agrave;nh&nbsp;<span>12 th&aacute;ng</span>&nbsp;theo ch&iacute;nh s&aacute;ch của Apple to&agrave;n cầu. Ngo&agrave;i ra, kh&aacute;ch h&agrave;ng sẽ được hưởng th&ecirc;m nhiều đặc quyền, ưu đ&atilde;i v&agrave; khuyến m&atilde;i hấp dẫn kh&aacute;c khi mua m&aacute;y tại Di Động Việt.</p>\r\n<p><span>iPad Gen 10 64GB Wifi&nbsp;</span>được trang bị con chip thế hệ mới, thiết kế mỏng nhẹ v&agrave; m&agrave;n h&igrave;nh&nbsp;<span>10.9 inch</span>&nbsp;đem đến một hiển thị nội dung rộng lớn v&agrave; t&iacute;ch hợp&nbsp;<span>Apple Pencil</span>&nbsp;v&agrave; camera 12MP được trang bị th&ecirc;m t&iacute;nh năng&nbsp;<span>Center Stage</span>&nbsp;tuyệt vời.</p>\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Th&ocirc;ng tin sản phẩm</span></div>\r\n<div class=\"info-content\">\r\n<p>Bộ sản phẩm bao gồm:&nbsp;Bộ sản phẩm gồm: Hộp, Th&acirc;n m&aacute;y, C&aacute;p, Sạc, S&aacute;ch hướng dẫn</p>\r\n</div>\r\n</div>\r\n<hr class=\"line\" />\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Bảo h&agrave;nh</span></div>\r\n<div class=\"info-content\">\r\n<ul>\r\n<li>Gi&aacute; đ&atilde; bao gồm 10% VAT. Bảo h&agrave;nh 12 th&aacute;ng theo ch&iacute;nh s&aacute;ch Apple&nbsp;to&agrave;n cầu. (<a href=\"https://didongviet.vn/tin-tuc/bao-hanh-gioi-han-mot-nam-cua-apple\" rel=\"noopener\" target=\"_blank\">Xem chi tiết</a>)\r\n<p><span>Bảo h&agrave;nh 1 đổi 1 trong 33 ng&agrave;y</span>&nbsp;độc quyền tại Di Động Việt.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '10990000', 'iPad-Air-5G-Cell-2022-starl9-2.jpg', 0, 0),
(28, 'iPad Gen 9 2021 | Wifi 64GB', 19, 11, '<p><span>iPad Gen 9 64GB Wifi</span>&nbsp;được trang bị con chip&nbsp;<span>A13 Bionic</span>, thiết kế mỏng nhẹ v&agrave; m&agrave;n h&igrave;nh&nbsp;<span>10.2 inch</span>&nbsp;đem đến một hiển thị nội dung rộng lớn v&agrave; t&iacute;ch hợp&nbsp;<span>Apple Pencil</span>&nbsp;v&agrave; camera 12MP được trang bị th&ecirc;m t&iacute;nh năng&nbsp;<span>Center Stage</span>&nbsp;tuyệt vời.</p>\r\n<p>iPad Gen 9 64GB Wifi&nbsp;được b&aacute;n tại Di Động Việt được bảo h&agrave;nh&nbsp;<span>12 th&aacute;ng</span>&nbsp;theo ch&iacute;nh s&aacute;ch của Apple to&agrave;n cầu. Ngo&agrave;i ra, kh&aacute;ch h&agrave;ng sẽ được hưởng th&ecirc;m nhiều đặc quyền, ưu đ&atilde;i v&agrave; khuyến m&atilde;i hấp dẫn kh&aacute;c khi mua m&aacute;y tại Di Động Việt.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Th&ocirc;ng tin sản phẩm</span></div>\r\n<div class=\"info-content\">\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Bộ sản phẩm gồm: Hộp, Th&acirc;n m&aacute;y, C&aacute;p, Sạc, S&aacute;ch hướng dẫn</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<hr class=\"line\" />\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Bảo h&agrave;nh</span></div>\r\n<div class=\"info-content\">\r\n<ul>\r\n<li>Bộ sản phẩm gồm: Hộp, Th&acirc;n m&aacute;y, C&aacute;p, Sạc, S&aacute;ch hướng dẫn</li>\r\n<li>Gi&aacute; đ&atilde; bao gồm 10% VAT. Bảo h&agrave;nh 12 th&aacute;ng theo ch&iacute;nh s&aacute;ch Apple&nbsp;to&agrave;n cầu. (<a href=\"https://didongviet.vn/tin-tuc/bao-hanh-gioi-han-mot-nam-cua-apple\" rel=\"noopener\" target=\"_blank\">Xem chi tiết</a>)\r\n<p><span>Bảo h&agrave;nh 1 đổi 1 trong 33 ng&agrave;y</span>&nbsp;độc quyền tại Di Động Việt.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '6790000', 'iPad-Air-Gen-5-WF-pik-2.jpg', 0, 0),
(29, 'iPad Pro M2 11-inch (2022) | 1TB 5G', 19, 11, '<p><span>iPad Pro M2 11-inch&nbsp;1TB 5G&nbsp;</span>được&nbsp;b&aacute;n ch&iacute;nh h&atilde;ng tại Di Động Việt,&nbsp;cam kết m&aacute;y&nbsp;mới<span>&nbsp;100%</span>, bảo h&agrave;nh&nbsp;<span>12 th&aacute;ng</span>&nbsp;theo ch&iacute;nh s&aacute;ch của Apple to&agrave;n cầu. Ngo&agrave;i ra, kh&aacute;ch h&agrave;ng sẽ được hưởng th&ecirc;m nhiều đặc quyền, ưu đ&atilde;i v&agrave; khuyến m&atilde;i hấp dẫn kh&aacute;c khi mua m&aacute;y tại Di Động Việt.</p>\r\n<p><span>iPad Pro M2 11-inch 1TB 5G&nbsp;</span>c&oacute; thiết kế&nbsp;<span>tinh tế</span>,&nbsp;<span>hiện đại</span>&nbsp;t&iacute;ch hợp với con chip&nbsp;<span>Apple M2</span>&nbsp;với hiệu năng cực khủng, m&agrave;n h&igrave;nh lớn&nbsp;<span>Liquid Retina&nbsp;11-inch</span>&nbsp;hỗ trợ tần số qu&eacute;t&nbsp;<span>120Hz</span>. Cung cấp mạng&nbsp;<span>5G</span>&nbsp;gi&uacute;p truy cập internet&nbsp;<span>nhanh ch&oacute;ng</span>&nbsp;hứa hẹn sẽ mang lại nhiều trải nghiệm tuyệt vời cho người d&ugrave;ng.</p>\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Th&ocirc;ng tin sản phẩm</span></div>\r\n<div class=\"info-content\">\r\n<p>Bộ sản phẩm gồm:&nbsp;Hộp, Th&acirc;n m&aacute;y, C&aacute;p, Sạc, S&aacute;ch hướng dẫn</p>\r\n</div>\r\n</div>\r\n<hr class=\"line\" />\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Bảo h&agrave;nh</span></div>\r\n<div class=\"info-content\">\r\n<ul>\r\n<li>Gi&aacute; đ&atilde; bao gồm 10% VAT. Bảo h&agrave;nh 12 th&aacute;ng theo ch&iacute;nh s&aacute;ch Apple&nbsp;to&agrave;n cầu. (<a href=\"https://didongviet.vn/tin-tuc/bao-hanh-gioi-han-mot-nam-cua-apple\" rel=\"noopener\" target=\"_blank\">Xem chi tiết</a>)\r\n<p><span>Bảo h&agrave;nh 1 đổi 1 trong 33 ng&agrave;y</span>&nbsp;độc quyền tại Di Động Việt.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 1, '49990000', 'iPad-Pro-11-(2022)-5G-128GB-gray1459717503.jpg', 0, 0),
(30, 'iPhone 14 Plus 512GB Chính Hãng (VN/A)', 18, 11, '<p><span>iPhone 14 Plus 512GB Ch&iacute;nh h&atilde;ng (VN/A)</span><span>&nbsp;hiện đ&atilde; c&oacute; mặt tại Di Động Việt -&nbsp;</span><span>Đại l&yacute; uỷ quyền ch&iacute;nh thức của Apple</span><span>&nbsp;tại Việt Nam. Với thiết kế thời thượng v&agrave; c&aacute;c t&iacute;nh năng hiện đại, chiếc smartphone n&agrave;y sẽ mang đến cho bạn trải nghiệm đầy cảm x&uacute;c với khả năng s&aacute;ng tạo v&ocirc; tận từ&nbsp;</span><span>2 camera 12MP</span><span>, kết hợp với hiệu năng mạnh mẽ từ&nbsp;</span><span>chipset Apple A15 Bionic 6 nh&acirc;n.&nbsp;</span><span>B&ecirc;n cạnh đ&oacute;, với&nbsp;</span><span>dung lượng pin lớn</span><span>&nbsp;cho ph&eacute;p người d&ugrave;ng trải nghiệm d&agrave;i l&acirc;u. Đặt mua iPhone 14 tại Di Động Việt để c&oacute; thể sở hữu chiếc m&aacute;y sớm nhất với nhiều ưu đ&atilde;i v&agrave; khuyến m&atilde;i đi k&egrave;m.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '27190000', 'iphone1.jpeg', 0, 0),
(31, 'iPhone 14 Plus 256GB  Chính Hãng (VN/A)', 18, 11, '<p><span>iPhone 14 Plus 256GB  Ch&iacute;nh h&atilde;ng (VN/A)</span><span>&nbsp;hiện đ&atilde; c&oacute; mặt tại Di Động Việt -&nbsp;</span><span>Đại l&yacute; uỷ quyền ch&iacute;nh thức của Apple</span><span>&nbsp;tại Việt Nam. Với thiết kế thời thượng v&agrave; c&aacute;c t&iacute;nh năng hiện đại, chiếc smartphone n&agrave;y sẽ mang đến cho bạn trải nghiệm đầy cảm x&uacute;c với khả năng s&aacute;ng tạo v&ocirc; tận từ&nbsp;</span><span>2 camera 12MP</span><span>, kết hợp với hiệu năng mạnh mẽ từ&nbsp;</span><span>chipset Apple A15 Bionic 6 nh&acirc;n.&nbsp;</span><span>B&ecirc;n cạnh đ&oacute;, với&nbsp;</span><span>dung lượng pin lớn</span><span>&nbsp;cho ph&eacute;p người d&ugrave;ng trải nghiệm d&agrave;i l&acirc;u. Đặt mua iPhone 14 tại Di Động Việt để c&oacute; thể sở hữu chiếc m&aacute;y sớm nhất với nhiều ưu đ&atilde;i v&agrave; khuyến m&atilde;i đi k&egrave;m.</span></p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '24790000', 'iphone-13-pro-128gb-mau-bac-didongviet.webp', 0, 0),
(33, 'iPhone 14 512GB Chính Hãng (VN/A)', 18, 11, '<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span><span>iPhone 14 512GB Ch&iacute;nh h&atilde;ng (VN/A)</span><span>&nbsp;hiện đ&atilde; c&oacute; mặt tại Di Động Việt -&nbsp;</span><span>Đại l&yacute; uỷ quyền ch&iacute;nh thức của Apple</span><span>&nbsp;tại Việt Nam. Với thiết kế thời thượng v&agrave; c&aacute;c t&iacute;nh năng hiện đại, chiếc smartphone n&agrave;y sẽ mang đến cho bạn trải nghiệm đầy cảm x&uacute;c với khả năng s&aacute;ng tạo v&ocirc; tận từ&nbsp;</span><span>2 camera 12MP</span><span>, kết hợp với hiệu năng mạnh mẽ từ&nbsp;</span><span>chipset Apple A15 Bionic 6 nh&acirc;n.&nbsp;</span><span>B&ecirc;n cạnh đ&oacute;, với&nbsp;</span><span>dung lượng pin lớn</span><span>&nbsp;cho ph&eacute;p người d&ugrave;ng trải nghiệm d&agrave;i l&acirc;u. Đặt mua iPhone 14 tại Di Động Việt để c&oacute; thể sở hữu chiếc m&aacute;y sớm nhất với nhiều ưu đ&atilde;i v&agrave; khuyến m&atilde;i đi k&egrave;m.</span><br />Th&ocirc;ng tin sản phẩm</span></div>\r\n<div class=\"info-content\">\r\n<p>Bộ sản phẩm gồm: Th&acirc;n m&aacute;y, C&aacute;p USB-C to Lightning, C&acirc;y lấy sim, S&aacute;ch HDSD.</p>\r\n</div>\r\n</div>\r\n<hr class=\"line\" />\r\n<div class=\"info-more info-note-more\">\r\n<div class=\"info-more-head\"><span>Bảo h&agrave;nh</span></div>\r\n<div class=\"info-content\">\r\n<ul>\r\n<li>Gi&aacute; đ&atilde; bao gồm 10% VAT. Bảo h&agrave;nh&nbsp;<span>12 th&aacute;ng</span>&nbsp;tại trung t&acirc;m bảo h&agrave;nh ch&iacute;nh h&atilde;ng Apple Việt Nam. (<a href=\"https://didongviet.vn/tin-tuc/bao-hanh-gioi-han-mot-nam-cua-apple\" rel=\"noopener\" target=\"_blank\">Xem chi tiết</a>)</li>\r\n<li><span>Bảo h&agrave;nh&nbsp;<span>1 đổi 1 trong&nbsp;<span>33 ng&agrave;y</span></span></span>&nbsp;độc quyền tại Di Động Việt.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '24990000', 'iphone-14-plus-128gb-mau-do-didongviet_1.webp', 0, 0),
(34, 'Xiaomi 12T', 18, 13, '<div class=\"is-flex is-justify-content-space-between is-align-items-center\">\r\n<h2 class=\"title is-6 mb-3\">Th&ocirc;ng số kỹ thuật</h2>\r\n</div>\r\n<ul class=\"technical-content\">\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>K&iacute;ch thước m&agrave;n h&igrave;nh</p>\r\n<div>6.66 inches</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>C&ocirc;ng nghệ m&agrave;n h&igrave;nh</p>\r\n<div>OLED</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Camera sau</p>\r\n<div>108MP + 8MP + 2MP</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Camera trước</p>\r\n<div>20MP</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Chipset</p>\r\n<div>MediaTek Dimensity 8100 Ultra</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Dung lượng RAM</p>\r\n<div>8 GB</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Bộ nhớ trong</p>\r\n<div>128 GB</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Pin</p>\r\n<div>5000mAh</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Thẻ SIM</p>\r\n<div>2 SIM (Nano-SIM)</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>Hệ điều h&agrave;nh</p>\r\n<div>Android 12, MIUI 13</div>\r\n</li>\r\n<li class=\"technical-content-item is-flex is-align-items-center is-justify-content-space-between p-2\">\r\n<p>T&iacute;nh năng m&agrave;n h&igrave;nh</p>\r\n<div>1 tỉ m&agrave;u, 120Hz, Dolby Vision, HDR10+</div>\r\n</li>\r\n</ul>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '11990000', 'note-12.jpg', 0, 0),
(35, 'Samsung Galaxy Note 20 Ultra 5G (12GB | 256GB)', 18, 12, '<ul>\r\n<li>Samsung Galaxy Note 20 Ultra 5G l&agrave; m&aacute;y Mới 100% Fullbox, bảo h&agrave;nh 12 th&aacute;ng uy t&iacute;n.</li>\r\n<li>M&aacute;y c&oacute; chip Rồng 865+, RAM 12GB hiệu năng khủng chiến game mượt m&agrave;.</li>\r\n<li>3 Camera 108MP chụp ảnh sắc n&eacute;t, zoom ấn tượng, B&uacute;t S Pen quyền năng.</li>\r\n<li>Shop sẵn h&agrave;ng, c&oacute; b&aacute;n trả g&oacute;p 0%&nbsp;Galaxy Note 20 Ultra 5G Mới v&agrave; thu cũ đổi mới l&ecirc;n đời tiết kiệm.\r\n<ul>\r\n<li class=\"icon-info-auth\">Bảo h&agrave;nh<strong>&nbsp;12 th&aacute;ng</strong>&nbsp;tại Đức Huy Mobile.</li>\r\n<li class=\"icon-info-freeship\">Giao h&agrave;ng C.O.D tr&ecirc;n to&agrave;n quốc</li>\r\n<li class=\"icon-info-status\"><strong>Bộ sản phẩm:</strong>&nbsp;Mới, đầy đủ phụ kiện từ nh&agrave; sản xuất</li>\r\n<li class=\"icon-info-installment\"><strong>Trả trước 30%</strong>&nbsp;qua&nbsp;<a class=\"link_tragop\" href=\"https://www.duchuymobile.com/mua-tra-gop?product_id=3520\" rel=\"nofollow\">C&ocirc;ng ty t&agrave;i ch&iacute;nh</a>. Thủ tục chỉ cần CCCD + GPLX;</li>\r\n<li class=\"icon-info-auth\">Bao test 1 đổi 1 trong&nbsp;<strong>15 ng&agrave;y</strong>&nbsp;bao gồm nguồn v&agrave; m&agrave;n h&igrave;nh</li>\r\n<li class=\"installment-last\">Hoặc trả g&oacute;p&nbsp;<strong>l&atilde;i suất 0%</strong>&nbsp;qua thẻ t&iacute;n dụng Visa, Master, JCB.</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '12999000', 'den_oz8l-qv.jpg', 0, 0),
(36, 'Samsung Galaxy S22 Ultra 5G (12GB | 256GB)', 18, 12, '<ul>\r\n<li class=\"icon-info-auth\">Bảo h&agrave;nh<strong>&nbsp;6 th&aacute;ng</strong>&nbsp;tại Đức Huy Mobile.</li>\r\n<li class=\"icon-info-freeship\">Giao h&agrave;ng C.O.D tr&ecirc;n to&agrave;n quốc</li>\r\n<li class=\"icon-info-status\"><strong>Bộ sản phẩm:</strong>&nbsp;C&aacute;p, Sạc 15W</li>\r\n<li class=\"icon-info-installment\"><strong>Trả trước 30%</strong>&nbsp;qua&nbsp;<a class=\"link_tragop\" href=\"https://www.duchuymobile.com/mua-tra-gop?product_id=5180\" rel=\"nofollow\">C&ocirc;ng ty t&agrave;i ch&iacute;nh</a>. Thủ tục chỉ cần CCCD + GPLX;</li>\r\n<li class=\"icon-info-auth\">Bao test 1 đổi 1 trong&nbsp;<strong>15 ng&agrave;y</strong>&nbsp;bao gồm nguồn v&agrave; m&agrave;n h&igrave;nh</li>\r\n<li class=\"installment-last\">Hoặc trả g&oacute;p&nbsp;<strong>l&atilde;i suất 0%</strong>&nbsp;qua thẻ t&iacute;n dụng Visa, Master, JCB.<br /><br />\r\n<h3>Th&ocirc;ng số sản phẩm</h3>\r\n<div class=\"content-product_features\">\r\n<div class=\"features-list-item\"><label>Mặt k&iacute;nh cảm ứng:</label><span>Gorilla Glass Victus+</span></div>\r\n<div class=\"features-list-item\"><label>Độ ph&acirc;n giải:</label><span>2K+ (1440 x 3088 Pixels)</span></div>\r\n<div class=\"features-list-item\"><label>M&agrave;n h&igrave;nh rộng:</label><span>6.8 inches, 111.6 cm2</span></div>\r\n<div class=\"features-list-item\"><label>Camera sau:</label><span>108 MP, 10MP v&agrave; 10MP+ 12MP</span></div>\r\n<div class=\"features-list-item\"><label>Quay Phim:</label><span>8K@24fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS</span></div>\r\n<div class=\"features-list-item\"><label>Hệ điều h&agrave;nh:</label><span>Android 12, One UI 4</span></div>\r\n<div class=\"features-list-item\"><label>Chipset:</label><span>Snapdragon 8 Gen 1 8 nh&acirc;n</span></div>\r\n<div class=\"features-list-item\"><label>RAM:</label><span>12 GB</span></div>\r\n<div class=\"features-list-item\"><label>Bộ nhớ trong ( Rom):</label><span>256GB</span></div>\r\n<div class=\"features-list-item\"><label>Dung lượng pin:</label><span>5000 mAh</span><br /><br />\r\n<div class=\" tab_product_view\">\r\n<div class=\"home-header-banner\">\r\n<div id=\"image_pairs5180\" class=\"banners owl-carousel owl-theme\">\r\n<div class=\"owl-wrapper-outer\">\r\n<div class=\"owl-wrapper\">\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_1696820351\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S21 5G 128GB Ch&iacute;nh H&atilde;ng\" src=\"https://www.duchuymobile.com/images/detailed/52/so-luong-s22-ultra.jpg\" alt=\"Samsung Galaxy S21 5G 128GB Ch&iacute;nh H&atilde;ng\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_711402376\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S21 5G 128GB Ch&iacute;nh H&atilde;ng\" src=\"https://www.duchuymobile.com/images/detailed/52/canh-tren-s22-ultra.jpg\" alt=\"Samsung Galaxy S21 5G 128GB Ch&iacute;nh H&atilde;ng\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_774769026\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S22 Ultra 5G (12GB | 256GB) H&agrave;n Quốc Like New\" src=\"https://www.duchuymobile.com/images/detailed/52/canh_6ipi-pq.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G (12GB | 256GB) H&agrave;n Quốc Like New\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_2024953406\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S22 Ultra 5G (12GB | 256GB) H&agrave;n Quốc Like New\" src=\"https://www.duchuymobile.com/images/detailed/52/camera-s22-ultra.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G (12GB | 256GB) H&agrave;n Quốc Like New\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n<div class=\"owl-item\">\r\n<div class=\"item\" title=\"\"><img id=\"det_img_287687676\" class=\"ty-pict   lazyOwl   cm-image\" title=\"Samsung Galaxy S22 Ultra 5G (12GB | 256GB) H&agrave;n Quốc Like New\" src=\"https://www.duchuymobile.com/images/detailed/52/man-hinh.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G (12GB | 256GB) H&agrave;n Quốc Like New\" width=\"873\" height=\"485\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"owl-controls clickable\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div id=\"content_description\" class=\"wysiwyg-content\">\r\n<div>\r\n<p><a href=\"https://www.duchuymobile.com/samsung-galaxy-s22-ultra-5g-256gb-han-quoc-cu\" target=\"_blank\">Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ</a>&nbsp;l&agrave; flagship cao cấp nhất hiện nay trong d&ograve;ng d&ograve;ng sản phẩm&nbsp;<a href=\"https://www.duchuymobile.com/samsung-galaxy-s22-plus-ultra-5g\" target=\"_blank\">Galaxy S22 | S22+ | S22 Ultra 5G</a>&nbsp;của nh&agrave; sản xuất H&agrave;n Quốc. Thiết bị sở hữu vi xử l&yacute;&nbsp;Snapdragon 8 Gen 1 8 nh&acirc;n mạnh mẽ, hỗ trợ b&uacute;t S Pen, m&agrave;n h&igrave;nh c&oacute; tần số qu&eacute;t 120Hz mượt m&agrave;, cảm biến&nbsp;camera ch&iacute;nh độ ph&acirc;n giải đến&nbsp;108MP cho Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ chụp ảnh sắc n&eacute;t.&nbsp;</p>\r\n<p><img src=\"https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/galaxy-s22-ultra-5g-256gb-han.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ\" /></p>\r\n<p><em>Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ sẵn h&agrave;ng gi&aacute; rẻ nhất.</em></p>\r\n<p><em><img src=\"https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/canh-galaxy-s22-ultra-5g-256gb-han.jpg\" alt=\"cạnh Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ\" /></em></p>\r\n<p><em>Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ c&oacute; ngoại h&igrave;nh đẹp keng như mới, &iacute;t trầy xước.</em></p>\r\n<h3><span>Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ c&oacute; thiết kế nổi bật, camera chất:</span></h3>\r\n<p><img src=\"https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/galaxy-s22-ultra-5g-256gb-han-mau-trang.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ m&agrave;u trắng \" /></p>\r\n<p><em>Tr&ecirc;n tay&nbsp;Samsung S22 Ultra 5G H&agrave;n Quốc cũ m&agrave;u trắng tinh kh&ocirc;i.</em></p>\r\n<p>Mẫu smartphone Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ sở hữu thiết kế cao cấp kh&aacute; thanh mảnh v&agrave; đẹp mắt. M&aacute;y c&oacute; k&iacute;ch thước D&agrave;i 163.3 mm - Ngang 77.9 mm - D&agrave;y 8.9 mm, trọng lượng 228 g v&agrave; 4 g&oacute;c bo cong mềm mại tạo cảm gi&aacute;c cầm nắm điện thoại&nbsp;Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ&nbsp;thoải m&aacute;i.&nbsp;</p>\r\n<p><img src=\"https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/galaxy-s22-ultra-5g-256gb-han-den.jpg\" alt=\"Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ m&agrave;u đen\" /></p>\r\n<p><em>Galaxy S22 Ultra 5G H&agrave;n Quốc cũ&nbsp;sở hữu thiết kế bắt mắt</em></p>\r\n<p>Nếu so với k&iacute;ch thước của&nbsp;<a href=\"https://www.duchuymobile.com/samsung-galaxy-s22-5g\" target=\"_blank\">Samsung Galaxy S22 5G 128GB</a>&nbsp;v&agrave;&nbsp;<a href=\"https://www.duchuymobile.com/samsung-galaxy-s22-plus-5g\" target=\"_blank\">Samsung Galaxy S22 Plus 5G 128GB</a>&nbsp;th&igrave; Galaxy S22 Ultra 5G H&agrave;n Quốc cũ c&oacute; phần to hơn. Tuy nhi&ecirc;n vẫn đảm bảo việc cầm nắm gọn nhẹ, vừa tay.&nbsp;</p>\r\n<h3><span>M&agrave;n h&igrave;nh Samsung S22 Ultra 5G H&agrave;n Quốc cũ lớn c&oacute; tần số qu&eacute;t l&ecirc;n đến 120Hz:</span></h3>\r\n<p>M&agrave;n h&igrave;nh Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ&nbsp;c&oacute; chất lượng cao c&ugrave;ng&nbsp;k&iacute;ch thước lớn 6.8 inches với tấm nền Dynamic AMOLED 2X cao cấp v&agrave; độ ph&acirc;n giải 2K+ (1440 x 3088 Pixels) hiển thị sắc n&eacute;t.&nbsp;</p>\r\n<p><img src=\"https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/chip-galaxy-s22-ultra-5g-256gb-han.jpg\" alt=\"hiển thị Galaxy S22 Ultra 5G H&agrave;n Quốc cũ\" /></p>\r\n<p><em>M&agrave;n h&igrave;nh Galaxy S22 Ultra 5G H&agrave;n Quốc cũ c&ograve;n&nbsp;được phủ k&iacute;nh cường lực Gorilla Glass Victus+ cứng c&aacute;p.</em></p>\r\n<p>Camera trước của Galaxy S22 Ultra 5G H&agrave;n Quốc cũ&nbsp;được h&atilde;ng&nbsp;<a href=\"https://www.duchuymobile.com/samsung-galaxy\" target=\"_blank\">điện thoại Samsung</a>&nbsp;thiết kế đục lỗ v&agrave; đặt ở giữa s&aacute;t cạnh tr&ecirc;n m&agrave;n h&igrave;nh. Ngo&agrave;i ra, mẫu flagship&nbsp;Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ gi&aacute; rẻ&nbsp;c&oacute; tần số qu&eacute;t cao l&ecirc;n đến 120Hz.&nbsp;</p>\r\n<h3><span>Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ c&oacute; cụm camera 4&nbsp;ống k&iacute;nh ch&iacute;nh 108MP</span></h3>\r\n<p>Mẫu điện thoại&nbsp;Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ&nbsp;được trang bị tất cả l&agrave; 4 camera sau&nbsp;&ldquo;rất đỉnh&rdquo; với cảm biến ch&iacute;nh độ ph&acirc;n giải đến 108MP, c&ugrave;ng c&aacute;c cảm biến&nbsp;Phụ với độ ph&acirc;n giải lần lượt l&agrave; 12 MP, 10 MP, 10 MP với nhiều chế độ chụp ảnh như: Ban đ&ecirc;m (Night Mode), Tự động lấy n&eacute;t (AF), Chống rung quang học (OIS), L&agrave;m đẹp, Chuy&ecirc;n nghiệp (Pro), AI Camera... cho&nbsp;Galaxy S22 Ultra 5G H&agrave;n Quốc khả năng nhiếp ảnh đỉnh cao.</p>\r\n<p><img src=\"https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/galaxy-s22-ultra-5g-256gb-xanh.jpg\" alt=\"camera Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ\" /></p>\r\n<p><em>Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ c&oacute; camera đỉnh của \"ch&oacute;p\".</em></p>\r\n<p>Camera selfie tr&ecirc;n Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ&nbsp;gi&aacute; rẻ l&agrave; ống k&iacute;nh 40MP mang lại cho bạn những bức ảnh selfie tuyệt vời nhất. Ngo&agrave;i ra, si&ecirc;u phẩm&nbsp;Galaxy S22 Ultra 5G H&agrave;n Quốc cũ&nbsp;c&ograve;n khả năng quay video 8K cho những h&igrave;nh ảnh, chuyển động vẫn giữ được độ ph&acirc;n giải si&ecirc;u sắc n&eacute;t.</p>\r\n<h3><span>Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ c&oacute; hiệu năng mạnh mẽ:</span></h3>\r\n<p>Hiệu năng ấn tượng tr&ecirc;n chiếc flagship&nbsp;Samsung S22 Ultra 5G H&agrave;n Quốc cũ&nbsp;với dung lượng RAM 12GB c&ugrave;ng chip Snapdragon 8 Gen 1 8 nh&acirc;n&nbsp;mạnh nhất của Qualcomm, m&aacute;y chạy tr&ecirc;n hệ điều h&agrave;nh Android 12 mới nhất cho người d&ugrave;ng những trải nghiệm th&uacute; vị.&nbsp;</p>\r\n<p><img src=\"https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/sim-galaxy-s22-ultra-5g-256gb-han.jpg\" alt=\"pin Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ\" /></p>\r\n<p>Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ&nbsp;c&oacute; h<em>iệu năng mạnh mẽ nhờ chip Rồng 8 Gen 1 đầu bảng.</em></p>\r\n<p>Với con chip khủng n&agrave;y, model Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ sẽ mang đến một tốc độ xử l&yacute; cực kỳ mượt m&agrave; v&agrave; nhanh ch&oacute;ng. Đi k&egrave;m với m&aacute;y l&agrave; dung lượng bộ nhớ trong 256GB cho ph&eacute;p bạn lưu trữ thoải m&aacute;i h&igrave;nh ảnh, video v&agrave; t&agrave;i liệu.&nbsp;</p>\r\n<p><img src=\"https://www.duchuymobile.com/images/companies/1/1-tin-moi/2022/thang-1/60/pin-galaxy-s22-ultra-5g-256gb-han.jpg\" alt=\"pin Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ\" /></p>\r\n<p><em>Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ gi&aacute; rẻ c&oacute; thời gian sử dụng ấn tượng.</em></p>\r\n<p>Cuối c&ugrave;ng,&nbsp;Samsung Galaxy S22 Ultra 5G H&agrave;n Quốc cũ c&ograve;n&nbsp;được trang bị vi&ecirc;n pin với dung lượng lớn 5.000 mAh hỗ trợ sạc nhanh c&ocirc;ng suất đến 45W. Với mức dung lượng pin n&agrave;y m&aacute;y ho&agrave;n to&agrave;n c&oacute; thể đ&aacute;p ứng mọi nhu cầu của bạn trong suốt một ng&agrave;y. &nbsp;</p>\r\n<p>Duchuymobile.com</p>\r\n<p class=\"show-more\"><span class=\"readmore\">Đọc th&ecirc;m</span></p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"faq_page\">\r\n<h2 class=\"title-detail faq_page-title\">C&acirc;u hỏi thường gặp</h2>\r\n</div>\r\n</div>\r\n</div>\r\n</li>\r\n</ul>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, '14990000', 'trang_4k05-pq.jpg', 8, 0);

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
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
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
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

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
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121750;

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
