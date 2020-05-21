-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 21, 2020 lúc 06:24 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_smartphone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_05_03_025106_create_tbl_admin_table', 1),
(4, '2020_05_03_032048_create_tbl_category_product', 2),
(5, '2020_05_03_033414_create_tbl_brand_product', 3),
(6, '2020_05_03_152933_create_tbl_color_product', 3),
(7, '2020_05_03_153422_create_tbl_color_product', 4),
(8, '2020_05_03_153846_create_tbl_product', 5),
(9, '2020_05_03_155741_create_tbl_memory_product', 6),
(10, '2020_05_20_193436_tbl_shipping', 7),
(11, '2020_05_20_202931_payment', 8),
(12, '2020_05_20_203115_tbl_order', 9),
(13, '2020_05_20_203413_tbl_order_detail', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Đức Văn', 'phamducvan@gmail.com', '202cb962ac59075b964b07152d234b70', '0325692727', '2020-05-03 03:04:00', '2020-05-03 03:04:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand_product`
--

CREATE TABLE `tbl_brand_product` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand_product`
--

INSERT INTO `tbl_brand_product` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`) VALUES
(1, 'Apple', '<p>L&agrave; một h&atilde;ng sản xuất đủ thư tr&ecirc;n đời</p>', 0),
(2, 'SamSung', '<p>sam sung</p>\r\n\r\n<p>&nbsp;</p>', 0),
(3, 'Xiaomi', '<p>điện thoại trung quốc</p>', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(2, 'Iphone', '<p>Sản phẩm mới nhất năm 2019</p>', 0, NULL, NULL),
(3, 'Samsung', '<p>sản phẩm tầm trung</p>\r\n\r\n<p>&nbsp;</p>', 0, NULL, NULL),
(4, 'Xiaomi xách tay', '<p>abc</p>', 0, NULL, NULL),
(5, 'Phụ kiện', '<p>phụ kiện đi k&egrave;m</p>\r\n\r\n<p>&nbsp;</p>', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_color_product`
--

CREATE TABLE `tbl_color_product` (
  `color_id` int(10) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_color_product`
--

INSERT INTO `tbl_color_product` (`color_id`, `color_name`, `color_desc`, `color_status`) VALUES
(1, 'Xám', '<p>m&agrave;u x&aacute;m tựng trưng cho&nbsp;</p>', 0),
(2, 'Trắng', '<p>sdss</p>', 0),
(3, 'Đen', '<p>m&agrave;u đen</p>', 0),
(4, 'xanh', '<p>m&agrave;u xanh</p>', 0),
(5, 'tím', '<p>m&agrave;u t&iacute;m</p>', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_memory_product`
--

CREATE TABLE `tbl_memory_product` (
  `memory_id` int(10) UNSIGNED NOT NULL,
  `memory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memory_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_memory_product`
--

INSERT INTO `tbl_memory_product` (`memory_id`, `memory_name`, `memory_status`, `created_at`, `updated_at`) VALUES
(1, '32GB', 0, NULL, NULL),
(2, '64GB', 0, NULL, NULL),
(3, '128GB', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `payment_id`, `shipping_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 3, 6, '29,990,000.00', 'Đang chờ xử lý', NULL, NULL),
(2, 4, 6, '29,990,000.00', 'Đang chờ xử lý', NULL, NULL),
(3, 5, 6, '29,990,000.00', 'Đang chờ xử lý', NULL, NULL),
(4, 6, 6, '29,990,000.00', 'Đang chờ xử lý', NULL, NULL),
(5, 7, 6, '29,990,000.00', 'Đang chờ xử lý', NULL, NULL),
(6, 8, 6, '0.00', 'Đang chờ xử lý', NULL, NULL),
(7, 9, 6, '0.00', 'Đang chờ xử lý', NULL, NULL),
(8, 10, 7, '29,990,000.00', 'Đang chờ xử lý', NULL, NULL),
(9, 11, 7, '29,990,000.00', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` float NOT NULL,
  `product_sales_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`) VALUES
(1, 5, 3, 'Samsung S20 Ultra', 29990000, 1),
(2, 8, 3, 'Samsung S20 Ultra', 29990000, 1),
(3, 9, 3, 'Samsung S20 Ultra', 29990000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maypent_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `maypent_status`, `created_at`, `updated_at`) VALUES
(1, '2', 'đang chờ xử lý', NULL, NULL),
(2, '2', 'đang chờ xử lý', NULL, NULL),
(3, '2', 'đang chờ xử lý', NULL, NULL),
(4, '2', 'đang chờ xử lý', NULL, NULL),
(5, '2', 'đang chờ xử lý', NULL, NULL),
(6, '2', 'đang chờ xử lý', NULL, NULL),
(7, '2', 'đang chờ xử lý', NULL, NULL),
(8, '2', 'đang chờ xử lý', NULL, NULL),
(9, '2', 'đang chờ xử lý', NULL, NULL),
(10, '1', 'đang chờ xử lý', NULL, NULL),
(11, '2', 'đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `prudct_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `memory_id` int(11) NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_amount` int(11) NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`prudct_id`, `product_name`, `category_id`, `brand_id`, `color_id`, `memory_id`, `product_desc`, `product_amount`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(3, 'Samsung S20 Ultra', 3, 2, 1, 1, '<p>a</p>', 10, '<p>a</p>', '29990000', 'samsung-galaxy-s20-ultra-400x460-1-400x460.png18.png', 0, NULL, NULL),
(4, 'Điện thoại Xiaomi Redmi K30 (RAM 6GB, 8GB)', 4, 3, 5, 3, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td>IPS LCD, 6.67 inches, FHD+ (1080 x 2400 pixels) 120Hz</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td>Android 10; MIUI 11</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>4 camera: 64 MP, f/1.8, 26mm (g&oacute;c rộng) + 8 MP (Zoom) + 2 MP (si&ecirc;u rộng) + 2 MP (Xo&aacute; ph&ocirc;ng) , Quay phim 4K (2160p@60fps)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>2 Camera: 20 MP, f/2.2, (G&oacute;c rộng), 2 MP (Xo&aacute; ph&ocirc;ng)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td>Snapdragon 730G (8 nm) , 8 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM:</td>\r\n			<td>6GB - 8GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>64GB - 128GB - 256GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ SIM:</td>\r\n			<td>2 Sim , Nano SIM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4500mAh - Sạc nhanh 27W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế:</td>\r\n			<td>M&agrave;n h&igrave;nh nốt ruồi tần số qu&eacute;t 120Hz M&agrave;u sắc trẻ Trung</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '<p>Chiếc smartphone mới n&agrave;y c&oacute; g&igrave; đặc biệt, liệu c&oacute; n&oacute; sẽ l&agrave; một bản thay thế ho&agrave;n hảo của Redmi K20,</p>', '4.950.000 ₫', 'redmi-k30-5g-blue.jpg87.jpg', 0, NULL, NULL),
(5, 'Điện thoại Realme X2 (Snapdragon 730G)', 4, 3, 4, 2, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td>Super AMOLED, FHD+ (1080 x 2340 pixels), 6.4 inches, Corning Gorilla Glass 5</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td>Android 9.0 (Pie); ColorOS 6</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>4 Camera: 64 MP + 8 MP (g&oacute;c si&ecirc;u rộng) + 2 MP (macro lens) + 2 MP (đo chiều s&acirc;u) , Quay phim 4K (2160p@30fps)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>32 MP, f/2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td>Qualcomm Snapdragon 730G (8 nm) , 8 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM:</td>\r\n			<td>6GB - 8GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>64GB - 128GB - 256GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ SIM:</td>\r\n			<td>2 SIM , Nano Sim</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, sạc nhanh 30W (VOOC Flash Charge 4.0)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế:</td>\r\n			<td>Thiết kế nguy&ecirc;n khối, mặt lưng hoa văn c&aacute;ch điệu</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 23, '<p><strong>Realme X2</strong>&nbsp;l&agrave; mẫu smartphone tầm trung của OPPO nhưng lại sở hữu cấu h&igrave;nh mạnh mẽ v&agrave; nhiều t&iacute;nh năng cao cấp chỉ c&oacute; mặt ở c&aacute;c Flagship</p>', '4.750.000 ₫', 'mc-realme-x2-2.jpg17.jpg', 0, NULL, NULL),
(6, 'Điện thoại Xiaomi Redmi Note 8', 4, 3, 3, 2, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td>IPS LCD, Full HD+ (1080 x 2340 pixels), 6.3 inches, Corning Gorilla Glass 5</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td>Android 9.0 (Pie); MIUI 10</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>4 Camera: 48 MP + 8 MP (g&oacute;c rộng) + 2 MP (đo chiều s&acirc;u) + 2 MP (cận cảnh) , Quay phim 4K (2160p@30fps)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>13 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td>Qualcomm Snapdragon 665 (11 nm) , 8 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM:</td>\r\n			<td>4GB - 6GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>64GB - 128GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ SIM:</td>\r\n			<td>2 SIM , Nano SIM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, sạc nhanh 18W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế:</td>\r\n			<td>m&agrave;u sắc trẻ trung, m&agrave;n h&igrave;nh giọt nước</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 35, '<p>Mới đ&acirc;y, Xiaomi bất ngờ tung ra sản phẩm&nbsp;<strong>Xiaomi Redmi Note 8</strong>&nbsp;với nhiều cải tiến mới.</p>', '3.250.000 ₫', 'redmi-note-8-2.jpg60.jpg', 0, NULL, NULL),
(7, 'Điện thoại Realme Q (Realme 5 Pro)', 4, 3, 1, 1, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td>IPS LCD, Full HD+ (1080x2340 pixels), 6.3 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td>Android 9.0 (Pie); ColorOS 6</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>4 Camera: 48MP, 8MP, 2MP, 2MP ,&nbsp;2160p@30fps</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>16MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td>Snapdragon 712 (10nm) , 8 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM:</td>\r\n			<td>4GB - 6GB - 8GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128GB - 256GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ SIM:</td>\r\n			<td>2 Sim , Nano Sim</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4035 mAh - Sạc nhanh 20W (VOOC 3.0)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế:</td>\r\n			<td>Mặt lưng hiệu ứng độc đ&aacute;o, m&agrave;n h&igrave;nh giọt nước</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 67, '<p>Gi&aacute;&nbsp;<strong>Realme Q</strong>&nbsp;ch&iacute;nh h&atilde;ng cực RẺ, m&aacute;y đảm bảo đẹp tại H&agrave; Nội, HCM, Đ&agrave; Nẵng. Cam kết ch&iacute;nh s&aacute;ch BH l&ecirc;n tới 12 th&aacute;ng cho Realme Q</p>', '3.650.000 ₫', 'mc-realme-q.jpg14.jpg', 0, NULL, NULL),
(8, 'Điện thoại iPhone X Cũ (64GB, 256GB) - FullBox', 2, 1, 3, 2, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td>OLED, 5.8 inches, Full HD+ (1125 x 2436 pixels), Dolby Vision, HDR10, 120 Hz, 3D Touch</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td>iOS 11</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>2 Camera: 12 MP (wide) + 12 MP (telephoto) , Quay phim 4K&nbsp;2160p@60fps</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>7MP, TOF 3D camera</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td>Apple A11 Bionic (10 nm) , 6 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM:</td>\r\n			<td>3GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>64GB/256GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ SIM:</td>\r\n			<td>1 SIM , Nano SIM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>2716 mAh, hỗ trợ sạc nhanh 15W, sạc kh&ocirc;ng d&acirc;y chuẩn Qi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế:</td>\r\n			<td>Cảm ứng</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 36, '<p><strong>iPhone X cũ</strong>&nbsp;đang trở n&ecirc;n ng&agrave;y c&agrave;ng HOT khi mức gi&aacute; hiện tại rất phải chăng. Tuy l&agrave; m&aacute;y cũ nhưng chất lượng vẫn cực kỳ tốt v&agrave; rất đ&aacute;ng để sở hữu, h&atilde;y t&igrave;m hiểu qua xem tại sao iPhone X cũ lại đ&aacute;ng mua đến vậy nh&eacute;.</p>', '9.150.000 ₫', 'iphonex-black.jpg82.jpg', 0, NULL, NULL),
(9, 'Điện thoại iPhone XR Cũ (64GB, 128GB) - Fullbox', 2, 1, 2, 3, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td>Liquid Retina IPS LCD, 6.1 inches, HD+ (828 x 1792 pixels), 120Hz touch-sensing</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td>iOS 12</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>12 MP , Quay phim 4K (2160p@60fps)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>7 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td>Apple A12 Bionic (7 nm) , 6 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM:</td>\r\n			<td>3GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>64GB/128GB/256GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ SIM:</td>\r\n			<td>1 SIM hoặc 2 SIM (tuỳ từng phi&ecirc;n bản) , Nano-SIM and e-SIM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>2942 mAh, Sạc nhanh 15W, sạc kh&ocirc;ng d&acirc;y chuẩn Qi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế:</td>\r\n			<td>Thanh + Cảm ứng</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 67, '<p><strong>iPhone XR cũ</strong>&nbsp;ch&iacute;nh thức&nbsp;l&ecirc;n kệ ng&agrave;y 26/10. Với ng&ocirc;n ngữ thiết kế kh&aacute; giống c&aacute;c phi&ecirc;n bản XS v&agrave; XS Max song gi&aacute; của chiếc iPhone XR cũ lại mềm hơn rất nhiều.&nbsp;C&ugrave;ng t&igrave;m hiểu v&agrave; đ&aacute;nh gi&aacute; xem n&oacute; c&oacute; g&igrave; đ&aacute;ng ch&uacute; &yacute; nh&eacute;!</p>', '9.550.000 ₫', 'mc-xr-yellow.jpg33.jpg', 0, NULL, NULL),
(10, 'Điện thoại iPhone 11 cũ (64GB, 256GB)', 2, 1, 4, 2, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td>Liquid Retina IPS LCD 828 x 1792 pixels 6.1 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td>iOS 13</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>2 Camera 12MP v&agrave; 12MP ,&nbsp;2160p@24/30/60fps</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>12 MP, f/2.2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td>Apple A13 Bionic , 6 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM:</td>\r\n			<td>4GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>64/128/256GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ SIM:</td>\r\n			<td>2 Sim hoặc 1 Sim , Nano-SIM hoặc Electronic SIM card</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>Pin Li-Ion 3110 mAh - Sạc nhanh(PD) 18W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế:</td>\r\n			<td>Thiết kế nguy&ecirc;n 2 mặt k&iacute;nh, nhiều m&agrave;u sắc độc đ&aacute;o</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 46, '<p><strong>iPhone 11 cũ</strong>&nbsp;gi&aacute; rẻ nhất H&agrave; Nội, Đ&agrave; Nẵng, TP HCM. Mua iPhone 11 cũ x&aacute;ch tay trả g&oacute;p l&atilde;i suất thấp. B&aacute;n iPhone 11 cũ x&aacute;ch tay BH 12 th&aacute;ng ch&iacute;nh h&atilde;ng.</p>', '14.350.000 ₫', 'iphone-11-4.jpg85.jpg', 0, NULL, NULL),
(11, 'Điện thoại iPhone XS Max Cũ (64GB, 256GB) - Fullbox', 2, 1, 2, 3, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td>Full HD+</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td>IOS 12</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Dual 12 MP + 12 MP ,&nbsp;2160p@24/30/60fps,&nbsp;1080p@30/60/120/240fps, HDR, stereo sound rec.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>7 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td>Apple A12 Bionic , 6 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM:</td>\r\n			<td>4 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>64/256/512 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ SIM:</td>\r\n			<td>1 SIM - 2 SIM , Single SIM (Nano-SIM) or Dual SIM (Nano-SIM, dual stand-by) - for China</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>3174 mAh</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế:</td>\r\n			<td>Thanh + Cảm ứng</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 46, '<p><strong>iPhone XS Max cũ</strong>&nbsp;ch&iacute;nh h&atilde;ng, gi&aacute; rẻ nhất H&agrave; Nội, Đ&agrave; Nẵng, TP HCM. Mua iPhone XS Max cũ x&aacute;ch tay trả g&oacute;p l&atilde;i suất thấp. B&aacute;n iPhone XS Max cũ x&aacute;ch tay BH 12 th&aacute;ng ch&iacute;nh h&atilde;ng</p>', '12.950.000 ₫', 'iphonexs-max-trang.jpg38.jpg', 0, NULL, NULL),
(12, 'Điện thoại Samsung Galaxy S10e cũ', 3, 2, 4, 3, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td>Dynamic AMOLED, 5.8 inches (1080 x 2280 pixels), 5.8 inches, HDR10</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td>Android 9.0 (Pie); One UI</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>2 Camera 12MP v&agrave; 16MP (g&oacute;c rộng) ,&nbsp;2160p@30fps</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>10MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td>Snapdragon 855 (7 nm)/Exynos 9820 (8 nm) , 8 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM:</td>\r\n			<td>6GB - 8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128GB - 256 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ SIM:</td>\r\n			<td>2 Sim , NanoSim</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>Li-Ion 3100 mAh - sạc nhanh 15W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế:</td>\r\n			<td>Nhỏ gọn, tinh tế</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 35, '<p>Trong những sản phẩm gần đ&acirc;y mới ra mắt của Samsung hay c&aacute;c h&atilde;ng điện thoại kh&aacute;c đều c&oacute; những đặc điểm kh&aacute; giống nhau. Samsung Galaxy S10e xuất hiện như một l&agrave;n gi&oacute; mới của một sản phẩm nhỏ gọn m&agrave; kh&ocirc;ng k&eacute;m phần mạnh mẽ v&agrave; nhiều m&agrave;u sắc lựa chọn</p>', '8.450.000 ₫', 'samsungs10e.jpg83.jpg', 0, NULL, NULL),
(13, 'Điện thoại Samsung Galaxy S10 Plus Cũ (Mỹ, Hàn Quốc)', 3, 2, 3, 3, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td>Dynamic AMOLED, Quad HD+ (1440 x 3040 pixels), 6.1 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td>Android 9 Pie</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>4 Camera: 12 MP (ch&iacute;nh) + 12 MP (telephoto) + 16 MP (ultrawide) + TOF 3D camera , Quay phim 4k, tự động lấy n&eacute;t</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>10 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td>Exynos 9820 Octa (8 nm) , 8 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM:</td>\r\n			<td>8GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ SIM:</td>\r\n			<td>1 SIM , Nano SIM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4100mAh, sạc nhanh 15W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế:</td>\r\n			<td>M&agrave;n h&igrave;nh Infinity 0, 2 mặt lưng k&iacute;nh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 32, '<p>Ở thời điểm hiện tại, chỉ với khoảng 10 triệu đồng bỏ ra, bạn ho&agrave;n to&agrave;n c&oacute; thể sở hữu cho m&igrave;nh được mẫu flagship đến từ nh&agrave; Samsung đ&oacute; ch&iacute;nh lầ Galaxy S10 Plus. Đ&acirc;y l&agrave; chiếc smartphone c&oacute; rất nhiều điểm đ&aacute;ng mua trong ph&acirc;n kh&uacute;c 10 triệu như m&agrave;n h&igrave;nh xuất sắc, camera đẹp, hiệu năng mạnh mẽ,...</p>', '8.750.000 ₫', 'samsung-galaxy-s10-plus-den1.jpg22.jpg', 0, NULL, NULL),
(14, 'Điện thoại Samsung Galaxy Note 10 cũ', 3, 2, 4, 3, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td>Dynamic AMOLED, Full HD+ (1080 x 2280 pixels&middot;), 6.3 inches, Corning Gorilla Glass 6, HDR10+</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td>Android 9.0 (Pie); One UI</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>3 camera: 12 MP (wide) + 12 MP (telephoto) + 16 MP (g&oacute;c rộng ) , Quay phim 4K (2160p@60fps)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>10 MP, f/2.2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td>Exynos 9825 (7 nm) hoặc Qualcomm SDM855 Snapdragon 855 (7 nm) , 8 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM:</td>\r\n			<td>8G RAM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>256GB - 512GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ SIM:</td>\r\n			<td>2 Sim , Nano - Sim</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>3500 mAh, Sạc nhanh 25W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế:</td>\r\n			<td>Thi&ecirc;́t k&ecirc;́ nguy&ecirc;n kh&ocirc;́i cứng cáp, Màn hình Fullview</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 37, '<p>D&ograve;ng Note năm nay của Samsung&nbsp;c&oacute; nhi&ecirc;̀u thay đ&ocirc;̉i từ c&acirc;́u hình tới thi&ecirc;́t k&ecirc;́. Samsung Galaxy Note 10 được chính những khách hàng nh&acirc;̣n xét rằng đ&acirc;y là dòng Note đẹp nh&acirc;́t mà Samsung đã tạo ra. Vậy điểm n&agrave;o khiến người d&ugrave;ng h&agrave;o hứng, th&iacute;ch th&uacute; tới vậy, c&ugrave;ng t&igrave;m hiểu ngay ở dưới b&agrave;i viết nh&eacute;.</p>', '11.950.000 ₫', 'samsung-note-10-plus-4.jpg32.jpg', 0, NULL, NULL),
(15, 'Điện thoại Samsung Galaxy M30s', 3, 2, 4, 2, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td>Super AMOLED, Full HD+ (1080 x 2340 pixels), 6.4 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td>Android 9.0 (Pie); One UI</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>3 Camera 48MP + 8MP (g&oacute;c rộng) + 5MP (đo chiều s&acirc;u) ,&nbsp;2160p@30fps</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>16MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td>Exynos 9611 (10nm) , 8 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM:</td>\r\n			<td>4GB - 6G</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>64GB - 128GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ SIM:</td>\r\n			<td>2 Sim , Nano - Sim</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>6000mAh - Sạc nhanh 15W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế:</td>\r\n			<td>Thiết kế nguy&ecirc;n khối c&aacute;c g&oacute;c bo cong nhẹ</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 68, '<p>Khi Samsung ra mắt d&ograve;ng điện thoại th&ocirc;ng minh Galaxy M Series, kh&aacute; r&otilde; r&agrave;ng rằng d&ograve;ng sản phẩm n&agrave;y sẽ cạnh tranh trực tiếp với những c&aacute;i t&ecirc;n tới từ Trung Quốc như Xiaomi, Realme v&agrave; Honor đ&atilde; bắt đầu thống trị danh mục điện thoại th&ocirc;ng minh ng&acirc;n s&aacute;ch hẹp từ l&acirc;u.Năm nay Samsung đ&atilde; ra mắt Samsung Galaxy M30s với camera ba ph&iacute;a sau 48 MP, m&agrave;n h&igrave;nh Super AMOLED v&agrave; quan trọng nhất l&agrave; cung cấp pin 6000mAh. Nhưng liệu n&oacute; c&oacute; đủ để khiến người mua bỏ rơi Xiaomi v&agrave; Realme để mua điện thoại của họ.C&ugrave;ng t&igrave;m hiểu, đ&aacute;nh gi&aacute; nhanh c&ugrave;ng Mobilecity trong b&agrave;i viết dưới</p>', '4.750.000 ₫', 'samsungm30s.jpg1.jpg', 0, NULL, NULL),
(16, 'Tai nghe Samsung AKG S8, S9, Plus (Chính Hãng)', 5, 2, 3, 1, '<ul>\r\n	<li>Miễn ph&iacute; c&agrave;i đặt phần mềm</li>\r\n	<li>Tặng tấm d&aacute;n m&agrave;n h&igrave;nh chống xước</li>\r\n	<li>Tặng Gift Cards giảm gi&aacute; sửa chữa&nbsp;50.000₫</li>\r\n</ul>', 123, '<p><strong>Tai nghe Samsung AKG</strong>&nbsp;S8, S9 Plus&nbsp;ch&iacute;nh h&atilde;ng gi&aacute; rẻ tại H&agrave; Nội, TPHCM. Tai nghe&nbsp;Samsung AKG S8/S8+ chất lượng chỉ hơn&nbsp;100.000đ&nbsp;bảo h&agrave;nh d&agrave;i hạn tại MobileCity.</p>\r\n\r\n<p>Trong tầm gi&aacute; hiện tại của sản phẩm tai nghe Samsung AKG S8/S8+ gần như v&ocirc; định về hiệu năng sử l&yacute; &acirc;m thanh tuyệt vời, thiết kế nam t&iacute;nh, độ b&ecirc;n cao nhất trong c&aacute;c d&ograve;ng tai nghe hiện nay, kh&ocirc;ng hề k&eacute;m cạnh so với những sản phẩm mới mức gi&aacute; 3-400k của những h&atilde;ng sản chuy&ecirc;n sản xuất phụ kiện về &acirc;m thanh danh tiếng nhất&nbsp;</p>', '149.000 ₫', 'tai-nghe-samsung-galaxy-s8-akg-didongviet-medium.jpg65.jpg', 0, NULL, NULL),
(17, 'Tai nghe Bluetooth i9S', 5, 1, 2, 1, '<ul>\r\n	<li>Miễn ph&iacute; c&agrave;i đặt phần mềm</li>\r\n	<li>Tặng tấm d&aacute;n m&agrave;n h&igrave;nh chống xước</li>\r\n	<li>Tặng Gift Cards giảm gi&aacute; sửa chữa&nbsp;50.000₫</li>\r\n</ul>', 57, '<p><strong>Tai nghe Bluetooth i9S</strong>&nbsp;ch&iacute;nh h&atilde;ng, gi&aacute; RẺ, chất lượng tại H&agrave; Nội, Hồ Ch&iacute; Minh. Sản phẩm sử dụng cho những thiết bị hiện đại, cao cấp. Bảo h&agrave;nh thoải m&aacute;i tại Mobile City.</p>', '290.000 ₫', 'tai-nghe-i9ws-medium.jpg88.jpg', 0, NULL, NULL),
(18, 'Dán lưng PPF Xiaomi Redmi Note 7, Note 7 Pro', 5, 3, 2, 1, '<ul>\r\n	<li>Miễn ph&iacute; c&agrave;i đặt phần mềm</li>\r\n	<li>Tặng tấm d&aacute;n m&agrave;n h&igrave;nh chống xước</li>\r\n	<li>Tặng Gift Cards giảm gi&aacute; sửa chữa&nbsp;50.000₫</li>\r\n</ul>', 345, '<p>Miếng&nbsp;<strong>d&aacute;n lưng PPF Xiaomi Redmi Note 7, Note 7 Pro</strong>&nbsp;gi&aacute; RẺ, chất lượng h&agrave;ng đầu H&agrave; Nội, HCM, Đ&agrave; Nẵng. D&aacute;n lưng PPF Xiaomi Redmi Note 7 an to&agrave;n, tốt nhất với ch&iacute;nh s&aacute;ch BH l&ecirc;n đến 3 Th&aacute;ng.</p>', '99.000 ₫', 'ppf-xiaomi-redmi-note-7-2-medium.jpg45.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_email`, `shipping_name`, `shipping_phone`, `shipping_address`, `created_at`, `updated_at`) VALUES
(1, 'nhungpham2k@gmail.com', 'Phạm Thị Hồng Nhung', '1246666', 'z115 - Phạm Quyết Thắng - TP. Thái Nguyên - Tỉnh Thái Nguyên', NULL, NULL),
(2, 'nhungpham2k@gmail.com', 'Phạm Thị Hồng Nhung', '0835404222', 'z115 - Phạm Quyết Thắng - TP. Thái Nguyên - Tỉnh Thái Nguyên', NULL, NULL),
(3, 'nhungpham2k@gmail.com', 'Phạm Thị Hồng Nhung', '0835404222', 'z115 - Phạm Quyết Thắng - TP. Thái Nguyên - Tỉnh Thái Nguyên', NULL, NULL),
(4, 'nhungpham2k@gmail.com', 'Phạm Thị Hồng Nhung', '0835404222', 'z115 - Phạm Quyết Thắng - TP. Thái Nguyên - Tỉnh Thái Nguyên', NULL, NULL),
(5, 'nhungpham2k@gmail.com', 'Phạm Thị Hồng Nhung', '0835404222', 'z115 - Phạm Quyết Thắng - TP. Thái Nguyên - Tỉnh Thái Nguyên', NULL, NULL),
(6, 'nhungpham2k@gmail.com', 'Phạm Thị Hồng Nhung', '0835404222', 'z115 - Phạm Quyết Thắng - TP. Thái Nguyên - Tỉnh Thái Nguyên', NULL, NULL),
(7, 'nhungpham2k@gmail.com', 'Phạm Thị Hồng Nhung', '0835404222', 'z115 - Phạm Quyết Thắng - TP. Thái Nguyên - Tỉnh Thái Nguyên', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_color_product`
--
ALTER TABLE `tbl_color_product`
  ADD PRIMARY KEY (`color_id`);

--
-- Chỉ mục cho bảng `tbl_memory_product`
--
ALTER TABLE `tbl_memory_product`
  ADD PRIMARY KEY (`memory_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`prudct_id`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_color_product`
--
ALTER TABLE `tbl_color_product`
  MODIFY `color_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_memory_product`
--
ALTER TABLE `tbl_memory_product`
  MODIFY `memory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prudct_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
