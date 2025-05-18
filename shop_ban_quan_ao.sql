-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 01, 2022 lúc 09:29 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_ban_quan_ao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about-us`
--

DROP TABLE IF EXISTS `about-us`;
CREATE TABLE IF NOT EXISTS `about-us` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `about-us`
--

INSERT INTO `about-us` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ưa', NULL, '2022-10-05 23:37:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `banners_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `photo`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Banner 1', 'banner-1', '/storage/photos/1/Banners/slideshow_1.png', '<p>Khác Biệt Ngoài Mong Đợi</p>', 1, '2022-10-12 05:08:51', '2022-10-12 05:08:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `title`, `slug`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(4, 'GUCCI', 'gucci', '/storage/photos/1/Brands/gucci.jpg', 1, '2022-10-10 08:23:59', '2022-10-10 08:23:59'),
(2, 'KENZO', 'kapa', '/storage/photos/1/Brands/logo-kenzo.png', 1, '2022-10-08 06:24:44', '2022-10-10 08:28:14'),
(3, 'BOSS', 'asss', '/storage/photos/1/Brands/hugo-boss-logo.jpg', 1, '2022-10-08 06:25:00', '2022-10-10 08:26:47'),
(5, 'Prada', 'prada', '/storage/photos/1/Brands/prada-thuong-hieu-nuoc-nao-2.jpg', 1, '2022-10-10 08:24:55', '2022-10-10 08:24:55'),
(6, 'Chanel', 'chanel', '/storage/photos/1/Brands/thuong-hieu-chanel.jpg', 1, '2022-10-10 08:25:39', '2022-10-10 08:25:39'),
(7, 'Adidas', 'adidas', '/storage/photos/1/Brands/Adidas_Logo.svg.png', 1, '2022-10-23 07:34:23', '2022-10-23 07:34:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `status` enum('new','progress','delivered','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `quantity` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_product_id_foreign` (`product_id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_order_id_foreign` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  KEY `categories_added_by_foreign` (`added_by`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `photo`, `is_parent`, `parent_id`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Quần', 'quan', '/storage/photos/1/Category/img_1259_a7a5660484d44a94aff9276331cfa3c6_1024x1024.webp', 1, NULL, NULL, 1, '2022-10-11 18:05:23', '2022-10-11 18:05:23'),
(6, 'Váy', 'vay', '/storage/photos/1/Category/dsc04902_copy_488cfa092db64fc2ab5fdc3755005af9_1024x1024.webp', 1, NULL, NULL, 1, '2022-10-11 18:04:54', '2022-10-11 18:04:54'),
(3, 'Áo', 'ao', '/storage/photos/1/Category/áo.jpg', 1, NULL, NULL, 1, '2022-10-10 05:59:56', '2022-10-11 04:18:29'),
(4, 'Quần Tây Nữ', 'quan-tay-nu', '/storage/photos/1/Category/img_1259_a7a5660484d44a94aff9276331cfa3c6_1024x1024.webp', 0, 7, NULL, 1, '2022-10-10 10:16:54', '2022-10-11 18:54:04'),
(5, 'Chân Váy', 'chan-vay', '/storage/photos/1/Category/dsc04902_copy_488cfa092db64fc2ab5fdc3755005af9_1024x1024.webp', 1, NULL, NULL, 1, '2022-10-10 10:17:59', '2022-10-10 10:17:59'),
(8, 'Áo Sơ Mi Trơn', 'ao-so-mi-tron', '/storage/photos/1/Category/aosomitron.jpg', 0, 3, NULL, 1, '2022-10-11 18:14:23', '2022-10-11 18:14:23'),
(9, 'Chân Váy Trơn', 'chan-vay-tron', '/storage/photos/1/Category/dsc04902_copy_488cfa092db64fc2ab5fdc3755005af9_1024x1024.webp', 0, 5, NULL, 1, '2022-10-11 18:46:33', '2022-10-11 18:46:33'),
(10, 'Quần Ống Suông', 'quan-ong-suong', '/storage/photos/1/Category/quanongsuong.png', 0, 7, NULL, 1, '2022-10-11 18:52:41', '2022-10-11 18:52:41'),
(11, 'Áo Sơ Mi Sọc', 'ao-so-mi-soc', '/storage/photos/1/Category/aosomi.webp', 0, 3, NULL, 1, '2022-10-15 06:26:59', '2022-10-15 06:26:59'),
(12, 'Chân Váy Bút Chì', 'chan-vay-but-chi', '/storage/photos/1/Category/dsc04902_copy_488cfa092db64fc2ab5fdc3755005af9_1024x1024.webp', 0, 5, NULL, 1, '2022-10-15 06:27:31', '2022-10-15 06:27:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `value`, `ngaybatdau`, `ngayketthuc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Khuyến Mãi T10', 'abc', '25000.00', '2022-10-08', '2022-10-31', 1, '2022-10-08 06:29:12', '2022-10-08 06:29:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_07_10_021010_create_brands_table', 1),
(6, '2020_07_10_025334_create_banners_table', 1),
(7, '2020_07_10_112147_create_categories_table', 1),
(8, '2020_07_11_063857_create_products_table', 1),
(9, '2020_07_12_073132_create_post_categories_table', 1),
(10, '2020_07_12_073701_create_post_tags_table', 1),
(11, '2020_07_12_083638_create_posts_table', 1),
(12, '2020_07_13_151329_create_messages_table', 1),
(13, '2020_07_14_023748_create_shippings_table', 1),
(14, '2020_07_15_054356_create_orders_table', 1),
(15, '2020_07_15_102626_create_carts_table', 1),
(16, '2020_07_16_041623_create_notifications_table', 1),
(17, '2020_07_16_053240_create_coupons_table', 1),
(18, '2020_07_23_143757_create_wishlists_table', 1),
(19, '2020_07_24_074930_create_product_reviews_table', 1),
(20, '2020_07_24_131727_create_post_comments_table', 1),
(21, '2020_08_01_143408_create_settings_table', 1),
(22, '2022_10_03_133829_create_table_ordersdetail', 1),
(23, '2022_10_04_054925_create_table_about-us', 1),
(24, '2022_10_05_102725_create_table_nhacungcap', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

DROP TABLE IF EXISTS `nhacungcap`;
CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tenncc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `tenncc`, `email`, `phone`, `diachi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'aaaaa', 'admin@gmail.com', '1234578902', 'aaaaaaa', 1, '2022-10-05 17:45:12', '2022-10-05 17:45:12'),
(2, 'KAPA', 'kapa@gmail.com', '1234567890', '55A Bình Thạnh TP Hồ Chí Minh', 1, '2022-10-08 06:29:53', '2022-10-08 06:29:53'),
(3, 'Nguyễn Thanh Lâm', 'thanhlam@gmail.com', '0919 313 433', '181 Cao Thắng, Phường 12, Quận 10, Hồ Chí Minh.', 1, '2022-11-01 01:36:07', '2022-11-01 01:36:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mahd` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci,
  `ngaylap` date NOT NULL,
  `httt` int(11) NOT NULL,
  `trangthaitt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tongtien` decimal(18,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `mahd`, `hoten`, `email`, `phone`, `diachi`, `ghichu`, `ngaylap`, `httt`, `trangthaitt`, `tongtien`, `status`, `created_at`, `updated_at`) VALUES
(28, 'DO48305', 'Nguyễn Thanh Lâm', '0306181326@caothang.edu.vn', '0343754517', '55A PAsteur, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh', NULL, '2022-11-01', 1, '4', '2200000.00', 1, '2022-11-01 02:00:13', '2022-11-01 02:01:32'),
(27, 'DO17707', 'Nguyễn Thanh Lâm', '0306181326@caothang.edu.vn', '0343754517', '55A PAsteur, Phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh', NULL, '2022-11-01', 1, '4', '1020000.00', 1, '2022-11-01 01:52:56', '2022-11-01 02:04:10'),
(26, 'DO19848', 'Nguyễn Thanh Lâm', '0306181326@caothang.edu.vn', '0343754517', '36A Lý Thường Kiệt, Phường 26, Quận Bình Thạnh, Thành phố Hồ Chí Minh', NULL, '2022-11-01', 1, '3', '970000.00', 1, '2022-11-01 01:18:25', '2022-11-01 02:04:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

DROP TABLE IF EXISTS `orders_detail`;
CREATE TABLE IF NOT EXISTS `orders_detail` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` smallint(5) UNSIGNED DEFAULT NULL,
  `id_donhang` bigint(20) UNSIGNED DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `giaban` decimal(8,2) NOT NULL,
  `thanhtien` decimal(18,2) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_detail_product_id_foreign` (`product_id`),
  KEY `orders_detail_id_donhang_foreign` (`id_donhang`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `product_id`, `id_donhang`, `soluong`, `giaban`, `thanhtien`, `trangthai`, `created_at`, `updated_at`) VALUES
(20, 5, 26, 1, '450000.00', '450000.00', 1, '2022-11-01 01:18:30', '2022-11-01 01:18:30'),
(19, 8, 26, 1, '520000.00', '520000.00', 1, '2022-11-01 01:18:30', '2022-11-01 01:18:30'),
(21, 12, 28, 2, '620000.00', '1240000.00', 1, '2022-11-01 02:00:18', '2022-11-01 02:00:18'),
(22, 4, 28, 1, '450000.00', '450000.00', 1, '2022-11-01 02:00:18', '2022-11-01 02:00:18'),
(23, 10, 28, 1, '510000.00', '510000.00', 1, '2022-11-01 02:00:18', '2022-11-01 02:00:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `quote` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_post_cat_id_foreign` (`post_cat_id`),
  KEY `posts_post_tag_id_foreign` (`post_tag_id`),
  KEY `posts_added_by_foreign` (`added_by`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `summary`, `description`, `quote`, `photo`, `tags`, `post_cat_id`, `post_tag_id`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(2, 'TIPS CHỌN TRANG PHỤC KHI ĐI PHỎNG VẤN', 'tips-chon-trang-phuc-khi-di-phong-van', '<p><span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Chọn được trang phục phù hợp cũng là một trong những cách để gây ấn tượng tốt với nhà tuyển dụng, có thể giúp bạn</span><br></p>', '<div class=\"box-article-heading clearfix\" style=\"margin: 0px; padding: 0px; font-family: Quicksand, sans-serif; color: rgb(102, 102, 102); font-size: 14px;\"><h1 class=\"sb-title-article\" style=\"margin: 20px 0px; padding: 0px; font-family: inherit; font-size: 24px; color: rgb(0, 0, 0);\">TIPS CHỌN TRANG PHỤC KHI ĐI PHỎNG VẤN</h1><ul class=\"article-info-more\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none;\"><li style=\"margin: 0px 10px 0px 0px; padding: 0px; opacity: 0.85; display: inline-block; font-size: 13px; font-weight: 600;\">Người viết: Trang Trần Ngọc lúc&nbsp;<time pubdate=\"\" datetime=\"2021-05-13\" style=\"margin: 0px; padding: 0px;\">13.05.2021</time></li>&nbsp;<li style=\"margin: 0px 10px 0px 0px; padding: 0px; opacity: 0.85; display: inline-block; font-size: 13px; font-weight: 600;\"><span class=\"fa fa-file-text-o\" style=\"margin: 0px 5px 0px 0px; padding: 0px; font-weight: normal; font-stretch: normal; font-size: inherit; font-family: FontAwesome !important;\"></span><a href=\"https://gillee.vn/blogs/news/tips-chon-trang-phuc-khi-di-phong-van#\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); outline: none; transition: opacity 150ms linear 0s, color 150ms linear 0s, background 150ms linear 0s;\">&nbsp;Tin tức</a></li></ul></div><div class=\"article-pages\" style=\"margin: 0px 0px 40px; padding: 0px; font-family: Quicksand, sans-serif; color: rgb(102, 102, 102); font-size: 14px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Chọn được trang phục phù hợp cũng là một trong những cách để gây ấn tượng tốt với nhà tuyển dụng, có thể giúp bạn tăng khả năng ứng tuyển vào vị trí mình mong muốn. Vậy làm sao để chọn được những trang phục thanh lịch và thích hợp?</span></p><h1 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 36px; color: rgb(0, 0, 0); max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">1. Tìm hiểu môi trường làm việc</span></h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Đầu tiên bạn nên tìm hiểu kỹ về môi trường công ty nơi mình sắp làm việc. Nếu là các công ty nhà nước hoặc nơi làm việc hơi truyền thống thì bạn nên chọn những dáng trang phục nghiêm túc và những gam màu trầm, trung tính. Ngược lại, nếu bạn muốn ứng tuyển vào các công ty trẻ, cần sự sáng tạo như start-up hoặc truyền thông, quảng cáo...thì bạn có thể chọn những bộ quần áo có màu sắc tươi sáng và đa dạng kiểu dáng hơn.&nbsp;</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%; text-align: center;\"><img src=\"https://file.hstatic.net/200000232953/file/749a8198_dd9135493890412e965d0428e5bb1e85_grande.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; max-width: 100%;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%; text-align: center;\">&nbsp;</p><h1 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 36px; color: rgb(0, 0, 0); max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">2. Chọn trang phục đơn sắc</span></h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Trang phục sẽ tạo được những ấn tượng đầu tiên nên sẽ tốt hơn nếu bạn chọn những gam màu cơ bản, không cần họa tiết quá nổi bật hay những đường cut-out quá hở hang. Bởi vì, dù công việc sáng tạo đến đâu thì khi bước vào buổi phỏng vấn bạn vẫn cần tạo cho mình một cảm giác chuyên nghiệp tối thiểu. Bên cạnh ngoại hình chỉn chu, nhà tuyển dụng vẫn tập trung nhiều nhất vào năng lực của bạn.</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Tuy nhiên không nhất thiết chỉ được chọn những chiếc áo sơ mi trơn đơn giản, bạn cũng có thể thử các hoạt tiết hoa nhí hoặc kẻ ô, thêm chút phong cách nhưng vẫn giữ được nét thanh lịch.</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%; text-align: center;\"><img src=\"https://file.hstatic.net/200000232953/file/749a8548_8ea725e145514695b877bd8d7c522501_grande.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; max-width: 100%;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\">&nbsp;</p><h1 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 36px; color: rgb(0, 0, 0); max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">3. Ưu tiên gam màu trung tính</span></h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Xanh navy, xám, đen và nâu là những màu trung tính rất thích hợp cho một buổi phỏng vấn xin việc. Trắng cũng là lựa chọn khá tốt nếu bạn mặc áo blouse hoặc áo sơ mi. Bạn có thể chọn một chiếc áo sơ mi trơn tông xanh navy đơn giản và khoác ngoài với blazer cũng tạo cảm giác chuyên nghiệp. Hoặc một chiếc áo sơ mi với họa tiết kẻ ô trầm kết hợp cùng quần ống suông cũng là một lựa chọn đáng để thử.</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%; text-align: center;\"><img src=\"https://file.hstatic.net/200000232953/file/749a8623_202db14c92914bafae58101185129d13_grande.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; max-width: 100%;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Hy vọng rằng những tips trên đây sẽ giúp bạn có một buổi phỏng vấn thành công!</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\">&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Tham khảo: ELLE Vietnam</span></p></div>', '<span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Chọn được trang phục phù hợp cũng là một trong những cách để gây ấn tượng tốt với nhà tuyển dụng, có thể giúp bạn</span>', '/storage/photos/1/Posts/749a8313_d362b52029e3411eb45be547d89a647b_large.jpg', 'ISSUUS', 1, NULL, 1, 1, '2022-10-10 07:58:14', '2022-10-10 08:06:09'),
(3, 'LÀM SAO ĐỂ CHỌN ĐƯỢC MỘT CHIẾC SƠ MI HOÀN HẢO?', 'lam-sao-de-chon-duoc-mot-chiec-so-mi-hoan-hao', '<p><span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Một chiếc áo sơ mi đẹp sẽ ảnh hưởng rất nhiều đến phong thái và tâm trạng của người mặc. Và việc chọn được một...</span><br></p>', '<div class=\"box-article-heading clearfix\" style=\"margin: 0px; padding: 0px; font-family: Quicksand, sans-serif; color: rgb(102, 102, 102); font-size: 14px;\"><div class=\"background-img fade-box\" style=\"margin: 0px; padding: 0px;\"><img class=\" ls-is-cached lazyloaded\" data-src=\"//file.hstatic.net/200000232953/article/green_handdrawn_watercolour_general_greetings_mother_s_day_poster__10__0e1924e8c3564e89bec0b03480aaa901_1024x1024.png\" src=\"https://file.hstatic.net/200000232953/article/green_handdrawn_watercolour_general_greetings_mother_s_day_poster__10__0e1924e8c3564e89bec0b03480aaa901_1024x1024.png\" alt=\"LÀM SAO ĐỂ CHỌN ĐƯỢC MỘT CHIẾC SƠ MI HOÀN HẢO?\" style=\"margin: 0px; padding: 0px; border: 0px; max-width: 100%; opacity: 1;\"></div><h1 class=\"sb-title-article\" style=\"margin: 20px 0px; padding: 0px; font-family: inherit; font-size: 24px; color: rgb(0, 0, 0);\">LÀM SAO ĐỂ CHỌN ĐƯỢC MỘT CHIẾC SƠ MI HOÀN HẢO?</h1><ul class=\"article-info-more\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none;\"><li style=\"margin: 0px 10px 0px 0px; padding: 0px; opacity: 0.85; display: inline-block; font-size: 13px; font-weight: 600;\">Người viết: Trang Trần Ngọc lúc&nbsp;<time pubdate=\"\" datetime=\"2021-05-13\" style=\"margin: 0px; padding: 0px;\">13.05.2021</time></li>&nbsp;<li style=\"margin: 0px 10px 0px 0px; padding: 0px; opacity: 0.85; display: inline-block; font-size: 13px; font-weight: 600;\"><span class=\"fa fa-file-text-o\" style=\"margin: 0px 5px 0px 0px; padding: 0px; font-weight: normal; font-stretch: normal; font-size: inherit; font-family: FontAwesome !important;\"></span><a href=\"https://gillee.vn/blogs/news/lam-sao-de-chon-duoc-mot-chiec-so-mi-hoan-hao#\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); outline: none; transition: opacity 150ms linear 0s, color 150ms linear 0s, background 150ms linear 0s;\">&nbsp;Tin tức</a></li></ul></div><div class=\"article-pages\" style=\"margin: 0px 0px 40px; padding: 0px; font-family: Quicksand, sans-serif; color: rgb(102, 102, 102); font-size: 14px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Một chiếc áo sơ mi đẹp sẽ ảnh hưởng rất nhiều đến phong thái và tâm trạng của người mặc. Và việc chọn được một chiếc áo phù hợp cho phái nữ là không hề đơn giản. Vậy nên dựa vào những yếu tố nào để quyết định một chiếc sơ mi “chuẩn”?</span></p><h1 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 36px; color: rgb(0, 0, 0); max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">1. Chất liệu</span></h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Một trong những yếu tố quan trọng nhất khi chọn áo sơ mi là chất liệu. Chất liệu phải tạo cảm giác thoải mái cho người mặc, đồng thời giữ được form dáng đẹp. Lụa là loại chất liệu bạn nên cân nhắc vì lụa tốt sẽ rất dày dặn, mềm mát, lại có độ rũ vừa phải giúp người mặc trông thanh thoát và dịu dàng hơn. Ngoài ra, có một số chất liệu phổ biến khác cho áo sơ mi như:</span></p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px 0px 0px 20px; list-style: initial; max-width: 100%;\"><li style=\"margin: 0px; padding: 0px; max-width: 100%;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Vải kate: Vải kate mềm mại, ít nhăn và thấm hút mồ hôi tốt nhưng chỉ có thể may được một vài kiểu dáng sơ mi thanh lịch, nghiêm túc. Do đó sẽ không thích hợp cho những kiểu áo cần thời trang và phong cách.</span></p></li><li style=\"margin: 0px; padding: 0px; max-width: 100%;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Vải Kaki: Ưu điểm của vải Kaki là tính bền, mát và có độ co giãn tốt. Nhưng nếu bạn cần một chiếc áo bồng bềnh, mềm mại thì Kaki không thể đáp ứng được.</span></p></li><li style=\"margin: 0px; padding: 0px; max-width: 100%;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Vải poplin: Chất vải có kết cấu xen kẽ chồng lên nhau, phẳng mịn và không có hoa văn. Tuy nhiên nhược điểm là vải poplin có thể bị co rút nhẹ và giá thành khá cao.</span></p></li></ul><div style=\"margin: 0px; padding: 0px; max-width: 100%;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%; text-align: center;\"><img src=\"https://file.hstatic.net/200000232953/file/749a7643_004008c088b34aa08b631c69df0c431b_grande.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; max-width: 100%;\"></p></div><h1 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 36px; color: rgb(0, 0, 0); max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">2. Cổ áo&nbsp;</span></h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Một chiếc sơ mi đúng chuẩn thì phải có cổ áo rộng vừa phải. Bạn có thể thử bằng cách cài hết khuy cổ áo sau đó cho hai ngón tay vào cổ áo. Nếu vừa vặn thì đó là một chiếc áo phù hợp với bạn. Một số loại cổ áo khác nhau:&nbsp;</span></p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px 0px 0px 20px; list-style: initial; max-width: 100%;\"><li style=\"margin: 0px; padding: 0px; max-width: 100%;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Cổ đức đơn giản, thích hợp cho các cô nàng công sở hoặc khi cần tham gia những sự kiện trang trọng.&nbsp;</span></p></li><li style=\"margin: 0px; padding: 0px; max-width: 100%;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Cổ nơ điệu đà có thể diện vào cuối tuần khi xuống phố với bạn bè hay đơn giản là một chút đổi phong cách khác với thường ngày.&nbsp;</span></p></li><li style=\"margin: 0px; padding: 0px; max-width: 100%;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Cổ trụ: là kiểu cổ áo mang cảm hứng từ trang phục truyền thống của Trung Quốc. Thiết kế cổ đứng mang lại vẻ sang trọng, thanh lịch cho người mặc.</span></p></li></ul><div style=\"margin: 0px; padding: 0px; max-width: 100%;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%; text-align: center;\"><img src=\"https://file.hstatic.net/200000232953/file/dsc00023_ca5173c206524da0a56a2903aa984062_grande.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; max-width: 100%;\"></p></div><h1 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 36px; color: rgb(0, 0, 0); max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">3. Kích cỡ</span></h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Khi thử áo, bạn nên xem thử phần cầu vai nối với tay áo có nằm đúng vào điểm tiếp giáp giữa xương vai và cánh tay hay không, ngoài ra phần nách nên có đủ độ rộng để để bạn thấy thoải mái khi hoạt động cả ngày dài. Thân áo cũng nên có độ dài tầm 20cm khi không sơ vin để tránh áo bị bung ra ngoài.&nbsp;</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%; text-align: center;\"><img src=\"https://file.hstatic.net/200000232953/file/tea00473_545c82905af74cb18caaec874a723c6f_grande.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; max-width: 100%;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Đây là ba tiêu chí bạn cần suy nghĩ để có thể chọn được một chiếc áo sơ mi ưng ý, ngoài ra bạn có thể xem thêm cái kiểu áo sơ mi đa dạng tại Gillee để có thêm nhiều sự lựa chọn hơn nhé!</span></p></div>', '<p><span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Một chiếc áo sơ mi đẹp sẽ ảnh hưởng rất nhiều đến phong thái và tâm trạng của người mặc. Và việc chọn được một...</span><br></p>', '/storage/photos/1/Posts/tetsts.png', 'ISSUUS', 1, NULL, 1, 1, '2022-10-10 10:40:04', '2022-10-10 10:40:04'),
(4, 'ĐÂU LÀ XU HƯỚNG THỜI TRANG XUÂN-HÈ 2021?', 'dau-la-xu-huong-thoi-trang-xuan-he-2021', '<p><span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Đâu là xu hướng thời trang đang được ưa chuộng từ các show thời trang Xuân-Hè 2021? Sau đây là những gợi ý để bạn...</span><br></p>', '<div class=\"box-article-heading clearfix\" style=\"margin: 0px; padding: 0px; font-family: Quicksand, sans-serif; color: rgb(102, 102, 102); font-size: 14px;\"><div class=\"background-img fade-box\" style=\"margin: 0px; padding: 0px;\"><img class=\" ls-is-cached lazyloaded\" data-src=\"//file.hstatic.net/200000232953/article/749a8337_ed505b544c2442c19bafd1758fb51dd2_1024x1024.jpg\" src=\"https://file.hstatic.net/200000232953/article/749a8337_ed505b544c2442c19bafd1758fb51dd2_1024x1024.jpg\" alt=\"ĐÂU LÀ XU HƯỚNG THỜI TRANG XUÂN-HÈ 2021?\" style=\"margin: 0px; padding: 0px; border: 0px; max-width: 100%; opacity: 1;\"></div><h1 class=\"sb-title-article\" style=\"margin: 20px 0px; padding: 0px; font-family: inherit; font-size: 24px; color: rgb(0, 0, 0);\">ĐÂU LÀ XU HƯỚNG THỜI TRANG XUÂN-HÈ 2021?</h1><ul class=\"article-info-more\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none;\"><li style=\"margin: 0px 10px 0px 0px; padding: 0px; opacity: 0.85; display: inline-block; font-size: 13px; font-weight: 600;\">Người viết: Trang Trần Ngọc lúc&nbsp;<time pubdate=\"\" datetime=\"2021-05-13\" style=\"margin: 0px; padding: 0px;\">13.05.2021</time></li>&nbsp;<li style=\"margin: 0px 10px 0px 0px; padding: 0px; opacity: 0.85; display: inline-block; font-size: 13px; font-weight: 600;\"><span class=\"fa fa-file-text-o\" style=\"margin: 0px 5px 0px 0px; padding: 0px; font-weight: normal; font-stretch: normal; font-size: inherit; font-family: FontAwesome !important;\"></span><a href=\"https://gillee.vn/blogs/news/dau-la-xu-huong-thoi-trang-xuan-he-2021#\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); outline: none; transition: opacity 150ms linear 0s, color 150ms linear 0s, background 150ms linear 0s;\">&nbsp;Tin tức</a></li></ul></div><div class=\"article-pages\" style=\"margin: 0px 0px 40px; padding: 0px; font-family: Quicksand, sans-serif; color: rgb(102, 102, 102); font-size: 14px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Đâu</span><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">&nbsp;là xu hướng thời trang đang được ưa chuộng từ các show thời trang Xuân-Hè 2021? Sau đây là những gợi ý để bạn có thể trendy mỗi ngày dựa theo những sàn diễn nổi tiếng.</span></p><h1 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 36px; color: rgb(0, 0, 0); max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">1. Ống suông/rộng phóng khoáng</span></h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Quần ống suông hoặc ống rộng cạp cao có khả năng hack dáng thần kỳ. Các loại quần ống suông thường là quần đơn sắc, rất dễ dàng để kết hợp với bất kỳ item sơ mi nào và tạo ra những outfit mang vô vàn những phong cách khác nhau.&nbsp;</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Ví dụ, quần ống suông kết hợp với sơ mi đen sẽ tạo cảm giác tự tin, độc lập và mạnh mẽ. Ngược lại, nếu kết hợp với những chiếc áo cổ nơ điệu đà sẽ đậm chất nàng thơ.&nbsp;</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%; text-align: center;\"><img src=\"https://file.hstatic.net/200000232953/file/749a1334_b1f3d3fa836345a7a016741744f4aece_grande.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; max-width: 100%;\"></p><h1 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 36px; color: rgb(0, 0, 0); max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">2. Họa tiết lan tỏa</span></h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Những họa tiết như hoa cỏ, hình học...là một cuộc chơi màu sắc được các nhà mốt ưa thích. Họa tiết lan tỏa thường rất đa dạng và phong cách mang tới đều phụ thuộc vào sức sáng tạo của nhà thiết kế. Những yếu tố táo bạo từ họa tiết lan tỏa sẽ giúp outfit của bạn cực kỳ nổi bật ở bất cứ đâu dù là đi làm hay đi dạo phố cùng bạn bè.&nbsp;</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%; text-align: center;\"><img src=\"https://file.hstatic.net/200000232953/file/749a3128_611a662d58bc4f09b6ee0692c880e798_grande.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; max-width: 100%;\"></p><h1 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 36px; color: rgb(0, 0, 0); max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">3. Cổ điển</span></h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Họa tiết kiểu cổ điển thường sẽ được lòng những ai đam mê phong cách vintage hay phong cách từ những thập niên trước. Gần đây các thiết kế và màu sắc cổ điển đã quay trở lại và trở thành xu hướng, được rất nhiều người ủng hộ. Màu đơn sắc và thiết kế đơn giản mang màu sắc cổ điển cũng có thể đem tới một cái nhìn tươi mới cho outfit của bạn.</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%; text-align: center;\"><img src=\"https://file.hstatic.net/200000232953/file/tea00604_29e90fa87c4b41198968f74ab95e9d6a_grande.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; max-width: 100%;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Còn ngại gì mà không bắt trend và biến mỗi ngày đi làm của mình đều như đang bước trên sàn diễn!!!</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\">&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; max-width: 100%;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; max-width: 100%;\">Tham khảo: ELLE Vietnam</span></p></div>', '<p><span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Đâu là xu hướng thời trang đang được ưa chuộng từ các show thời trang Xuân-Hè 2021? Sau đây là những gợi ý để bạn...</span><br></p>', '/storage/photos/1/Posts/xuhuong.jpg', 'ISSUUS', 1, NULL, 1, 1, '2022-10-11 04:11:11', '2022-10-11 04:11:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_categories`
--

INSERT INTO `post_categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'bài viết mới nhất', 'bai-viet-moi-nhat', 1, '2022-10-08 06:31:43', '2022-10-08 06:31:43'),
(2, 'Sản Phẩm', 'san-pham', 1, '2022-10-14 07:40:24', '2022-10-14 07:40:24'),
(3, 'Áo', 'ao', 1, '2022-10-14 07:40:36', '2022-10-14 07:40:36'),
(4, 'Váy', 'vay', 1, '2022-10-14 07:40:43', '2022-10-14 07:40:43'),
(5, 'Quần', 'quan', 1, '2022-10-14 07:40:48', '2022-10-14 07:40:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_comments`
--

DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE IF NOT EXISTS `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `replied_comment` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_comments_user_id_foreign` (`user_id`),
  KEY `post_comments_post_id_foreign` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tags`
--

DROP TABLE IF EXISTS `post_tags`;
CREATE TABLE IF NOT EXISTS `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_tags_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_tags`
--

INSERT INTO `post_tags` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ISSUUS', 'issuus', 1, '2022-10-08 06:31:58', '2022-10-08 06:31:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '1',
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'M',
  `condition` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_nhacungcap` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_id_nhacungcap_foreign` (`id_nhacungcap`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_cat_id_foreign` (`cat_id`),
  KEY `products_child_cat_id_foreign` (`child_cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `summary`, `description`, `photo`, `stock`, `size`, `condition`, `status`, `price`, `discount`, `is_featured`, `cat_id`, `child_cat_id`, `brand_id`, `id_nhacungcap`, `created_at`, `updated_at`) VALUES
(3, 'Áo Sơ Mi Kẻ Sọc FAS214', 'aaaa', '<h4 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 18px; font-size: 13px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">1. THỜI GIAN HỖ TRỢ ĐỔI HÀNG</span></h4><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; text-align: justify;\">Trong vòng 03 NGÀY kể từ khi nhận hàng thành công.</p></li></ul><h4 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 18px; font-size: 13px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">2. TRƯỜNG HỢP ÁP DỤNG ĐỔI HÀNG</span></h4><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; text-align: justify;\">Đối với sản phẩm lỗi do nhà sản xuất, giao không đúng mẫu, không đúng size (GILLEE hỗ trợ phí ship) hoặc đổi theo yêu cầu của khách hàng (Khách hàng trả phí ship) .</p></li><li style=\"margin: 0px; padding: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; text-align: justify;\">Chỉ hỗ trợ đổi size, đổi mẫu với sản phẩm mua nguyên giá. Không áp dụng đổi hàng với sản phẩm trong chương trình khuyến mãi.</p></li><li style=\"margin: 0px; padding: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; text-align: justify;\">KHÔNG chấp nhận đổi hàng với các sản phẩm lỗi, hỏng hóc do khách hàng bảo quản không đúng hướng dẫn sử dụng hoặc sản phẩm đã cắt tag, nhãn mác.</p></li></ul><h4 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 18px; font-size: 13px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">3. ĐIỀU KIỆN ĐỔI HÀNG&nbsp;</span></h4><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; text-align: justify;\">Hàng đổi phải chưa qua sử dụng, chỉnh sửa, giặt ủi, không bị dơ bẩn, không có mùi, không bị hư hỏng, và còn nguyên tem, tag, nhãn mác.</p></li><li style=\"margin: 0px; padding: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; text-align: justify;\">Chỉ hỗ trợ đổi 1 lần cho mỗi đơn hàng. Sản phẩm đổi mới phải ngang giá hoặc cao hơn sản phẩm cũ (Không hoàn trả tiền mặt).&nbsp;</p></li><li style=\"margin: 0px; padding: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 21px; text-align: justify;\">Đơn hàng online vui lòng liên hệ CSKH để được hỗ trợ đổi online. KHÔNG áp dụng đổi tại cửa hàng.</p></li></ul><h4 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 18px; font-size: 13px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">4. HƯỚNG DẪN ĐỔI TRẢ</span></h4><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Bước 1:</span>&nbsp;Gọi vào hotline của GILLEE theo số&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: 700;\">0902 015 505</span>&nbsp;hoặc&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Inbox fanpage</span>&nbsp;(cung cấp mã đơn hàng, sản phẩm cần đổi, lý do đổi) để được hỗ trợ.</li><li style=\"margin: 0px; padding: 0px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Bước 2:</span>&nbsp;Đóng gói sản phẩm và gửi theo địa chỉ CSKH cung cấp.</li><li style=\"margin: 0px; padding: 0px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Bước 3:&nbsp;</span>Nhận lại sản phẩm đổi trong 3-5 ngày làm việc sau khi CSKH xác nhận đã nhận hàng.</li><li></li></ul>', '<p>aaaaaaaaaaaaaaa</p>', '/storage/photos/1/Product/aosomi.webp', 0, 'S,M,L', 1, 1, 150000.00, 0.00, 0, 3, NULL, 2, 2, '2022-10-10 10:04:02', '2022-10-29 20:02:10'),
(5, 'Áo Sơ Mi Chấm Tròn FAS210', 'ao-so-mi-cham-tron-fas210', '<p><span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Chất liệu: Lụa cát</span><br></p>', '<ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;giặt bằng nước mát bằng tay</li><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;ủi ở nhiệt độ thấp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;dùng chất tẩy trực tiếp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;nên vò, vắt nước quá mạnh tay</li></ul>', '/storage/photos/1/Product/2.jpg,/storage/photos/1/Product/222.jpg,/storage/photos/1/Product/2222.jpg', 5, 'S,M,L,XL', 1, 1, 450000.00, 0.00, 1, 3, NULL, 3, 2, '2022-10-10 10:29:44', '2022-11-01 01:18:30'),
(4, 'Áo Sơ Mi Họa Tiết FAS213', 'ao-so-mi-hoa-tiet-fas213', '<p><span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Chất liệu: Lụa cát</span><br></p>', '<ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;giặt bằng nước mát bằng tay</li><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;ủi ở nhiệt độ thấp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;dùng chất tẩy trực tiếp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;nên vò, vắt nước quá mạnh tay</li></ul>', '/storage/photos/1/Product/ao_so_mi.jpg,/storage/photos/1/Product/img_2382_3494b842a40d48d78d328919b6d86670_1024x1024.webp', 8, 'S,M', 1, 1, 450000.00, 0.00, 1, 3, NULL, 2, 2, '2022-10-10 10:21:29', '2022-11-01 02:00:18'),
(6, 'Quần Baggy Tuyết Mưa Vàng', 'quan-baggy-tuyet-mua-vang', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 21px; color: rgb(102, 102, 102); font-size: 14px;\">Chất liệu: Tuyết mưa</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 21px; color: rgb(102, 102, 102); font-size: 14px;\">Màu vàng rất thích hợp để diện trong những ngày hè chói chang. Một chiếc quần baggy vàng sẽ giúp bạn nổi bật ở bất cứ đâu.</p>', '<ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;giặt bằng nước mát bằng tay</li><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;ủi ở nhiệt độ thấp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;dùng chất tẩy trực tiếp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;nên vò, vắt nước quá mạnh tay</li></ul><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 21px; color: rgb(102, 102, 102); font-size: 14px;\">&nbsp;</p>', '/storage/photos/1/Product/babby1.jpg,/storage/photos/1/Product/babby2.jpg,/storage/photos/1/Product/babby3.jpg,/storage/photos/1/Product/babby4.jpg', 8, 'S,M', 1, 1, 450000.00, 10.00, 1, 4, NULL, 2, 2, '2022-10-10 10:38:19', '2022-11-01 00:41:57'),
(7, 'Quần Ống Suông Tuyết Mưa Xanh', 'quan-ong-suong-tuyet-mua-xanh', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 21px; color: rgb(102, 102, 102); font-size: 14px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">CHẤT LIỆU</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 21px; color: rgb(102, 102, 102); font-size: 14px; text-align: justify;\">Tuyết mưa</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 21px; color: rgb(102, 102, 102); font-size: 14px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">KIỂU DÁNG</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 21px; color: rgb(102, 102, 102); font-size: 14px; text-align: justify;\">Quần Tây công sở ống suông dài</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 21px; color: rgb(102, 102, 102); font-size: 14px; text-align: justify;\">Quần ống suông chắc chắn là item không thể thiếu cho những cô nàng công sở. Sự&nbsp;đơn giản giúp bạn có thể mặc mỗi ngày mà không cần phải suy nghĩ nhiều, ngoài ra có thể kết hợp với rất nhiều kiểu áo và phụ kiện và tạo ra rất nhiều phong cách khác nhau.</p>', '<ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;giặt bằng nước mát bằng tay</li><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;ủi ở nhiệt độ thấp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;dùng chất tẩy trực tiếp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;nên vò, vắt nước quá mạnh tay</li></ul>', '/storage/photos/1/Product/suong.png,/storage/photos/1/Product/suong2.png,/storage/photos/1/Product/suong3.png', 10, 'S,M,L', 1, 1, 550000.00, 10.00, 1, 7, 10, 5, 2, '2022-10-15 06:26:08', '2022-10-15 06:26:08'),
(8, 'Chân Váy Chữ A Tai Thỏ FVA019', 'chan-vay-chu-a-tai-tho-fva019', '<p><span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Chất liệu: Vải Nhung</span><br></p>', '<ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;giặt bằng nước mát bằng tay</li><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;ủi ở nhiệt độ thấp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;dùng chất tẩy trực tiếp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;nên vò, vắt nước quá mạnh tay</li></ul>', '/storage/photos/1/Product/cva1.png,/storage/photos/1/Product/cva.png,/storage/photos/1/Product/cva2.png', 18, 'S,M,L,XL', 1, 1, 520000.00, 0.00, 1, 5, NULL, 3, 2, '2022-10-17 00:01:45', '2022-11-01 01:18:30'),
(9, 'Áo Sơ Mi Cơ Bản Trơn FAS216', 'ao-so-mi-co-ban-tron-fas216', '<p><span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Chất liệu: Lụa nhung</span><br></p>', '<ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;giặt bằng nước mát bằng tay</li><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;ủi ở nhiệt độ thấp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;dùng chất tẩy trực tiếp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;nên vò, vắt nước quá mạnh tay</li></ul>', '/storage/photos/1/Product/ASM/asm.png,/storage/photos/1/Product/ASM/asm2.png,/storage/photos/1/Product/ASM/asm3.png,/storage/photos/1/Product/ASM/asm4.png', 8, 'S,M,L', 1, 1, 450000.00, 0.00, 1, 3, NULL, 3, 2, '2022-10-17 00:07:41', '2022-10-31 00:59:28'),
(10, 'Áo sơ mi lụa đỏ Tulip', 'ao-so-mi-lua-do-tulip', '<p>Chất liệu: Lụa cát</p><p>Chất liệu lụa cát với độ rũ vừa phải, chiếc áo Tulip đỏ sẽ giúp bạn nổi bật trong đám đông mỗi khi tham dự một sự kiện đặc biệt. Chi tiết túi áo tinh tế mang đến cảm giác chuyên nghiệp hơn.</p>', '<p><span style=\"font-size: 1rem;\">NÊN giặt bằng nước mát bằng tay</span><br></p><p>NÊN ủi ở nhiệt độ thấp</p><p>KHÔNG dùng chất tẩy trực tiếp</p><p>KHÔNG nên vò, vắt nước quá mạnh tay</p>', '/storage/photos/1/Product/ASM/asml1.png,/storage/photos/1/Product/ASM/asml2.png,/storage/photos/1/Product/ASM/asml3.png,/storage/photos/1/Product/ASM/asml4.png', 7, 'S,M,L', 1, 1, 600000.00, 15.00, 1, 3, NULL, 2, 2, '2022-10-23 07:37:39', '2022-11-01 02:00:18'),
(11, 'Áo Sơ Mi Cơ Bản TMĐT YAS190', 'ao-so-mi-co-ban-tmdt-yas190', '<p><span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Chất liệu: Lụa</span><br></p>', '<ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;giặt bằng nước mát bằng tay</li><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;ủi ở nhiệt độ thấp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;dùng chất tẩy trực tiếp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;nên vò, vắt nước quá mạnh tay</li></ul>', '/storage/photos/1/Product/ASM/asmtd3.png,/storage/photos/1/Product/ASM/asmtd2.png,/storage/photos/1/Product/ASM/asmtm.png,/storage/photos/1/Product/ASM/asptd4.png', 50, 'S,M,L,XL', 1, 1, 399000.00, 25.00, 1, 3, NULL, 5, 2, '2022-10-26 06:18:52', '2022-10-26 06:18:52'),
(12, 'Quần Ống Rộng Trơn FQR030', 'quan-ong-rong-tron-fqr030', '<p><span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Chưa có mô tả ngắn</span><br></p>', '<ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;giặt bằng nước mát bằng tay</li><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;ủi ở nhiệt độ thấp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;dùng chất tẩy trực tiếp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;nên vò, vắt nước quá mạnh tay</li></ul><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 21px; color: rgb(102, 102, 102); font-size: 14px;\">&nbsp;</p>', '/storage/photos/1/Product/QuanOng/quanor.png,/storage/photos/1/Product/QuanOng/quanor2.png', 6, 'S,M,L,XL', 0, 1, 620000.00, 0.00, 1, 7, NULL, 2, 2, '2022-10-29 19:44:22', '2022-11-01 02:00:18'),
(13, 'Áo Sơ Mi Lụa Sọc FAS200', 'ao-so-mi-lua-soc-fas200', '<p><span style=\"color: rgb(102, 102, 102); font-family: Quicksand, sans-serif; font-size: 14px;\">Chất liệu: Lụa&nbsp;</span><br></p>', '<ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; list-style: none; color: rgb(102, 102, 102); font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;giặt bằng nước mát bằng tay</li><li style=\"margin: 0px; padding: 0px;\">NÊN&nbsp;ủi ở nhiệt độ thấp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;dùng chất tẩy trực tiếp</li><li style=\"margin: 0px; padding: 0px;\">KHÔNG&nbsp;nên vò, vắt nước quá mạnh tay</li></ul><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: Quicksand, sans-serif; line-height: 21px; color: rgb(102, 102, 102); font-size: 14px;\">&nbsp;</p>', '/storage/photos/1/Product/ASM/asml.png,/storage/photos/1/Product/ASM/asmls2.png,/storage/photos/1/Product/ASM/asmls3.png,/storage/photos/1/Product/ASM/asmls4.png', 30, 'S,M,L,XL', 1, 1, 400000.00, 0.00, 1, 3, NULL, 6, 3, '2022-11-01 01:40:29', '2022-11-01 01:40:29'),
(14, 'Quần KAKI FAS', 'quan-kaki-fas', '<p>Chất liệu Kaki</p>', '<p>Bảo quản nơi khô ráo</p><p>Hạn chế giặt máy</p>', '/storage/photos/1/Product/QuanOng/qkk.png,/storage/photos/1/Product/QuanOng/qkk2.png,/storage/photos/1/Product/QuanOng/qkk3.png,/storage/photos/1/Product/QuanOng/qkk4.png', 20, 'S,M,L,XL', 1, 1, 350000.00, 0.00, 1, 7, NULL, 5, 3, '2022-11-01 02:03:32', '2022-11-01 02:03:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT '0',
  `review` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_user_id_foreign` (`user_id`),
  KEY `product_reviews_product_id_foreign` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `description`, `short_des`, `logo`, `photo`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Phá bỏ suy nghĩ thiết kế thời trang là phải đắt đỏ,Gille mang tới những sản phẩm thời trang trẻ trung cá tính,với giá thành phải chăng cùng chất lượng vượt ngoài mong đợi', 'aaa', '/storage/photos/1/Setting/logo.webp', 'null', 'Số 16, đường Lý Chính Thắng, phường 8, quận 3, Tp. Hồ Chí Minh', '0343754517', 'kq909981@gmail.com', NULL, '2022-10-11 05:47:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shippings`
--

DROP TABLE IF EXISTS `shippings`;
CREATE TABLE IF NOT EXISTS `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loaitk` int(11) NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `address`, `photo`, `loaitk`, `provider`, `provider_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '0343754517', NULL, '$2y$10$dV8YyJYG0AJFgVtqvdSxouRh/kGWXofCTY51qxKlssO.cKd63MmxG', '55A Kha Vạn Cân,Linh Đông,Thủ Đức,TP Hồ Chí Minh', '/storage/photos/1/User/admin-van-phong-la-lam-gi-1.jpg', 1, NULL, NULL, 1, 'in26eJuGv058gPNc39zco7eZOXa3gRIi3TTlqY4nFN1yXm5zzLRZW0wf8HWK', NULL, '2022-10-08 06:27:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_product_id_foreign` (`product_id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_cart_id_foreign` (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
