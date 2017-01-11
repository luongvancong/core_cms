-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2016 at 09:22 PM
-- Server version: 10.0.28-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `defa`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teaser` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `teaser`, `link`, `image`, `position`, `page`, `status`, `created_at`, `updated_at`, `deleted_at`, `image_alt`, `sort`) VALUES
(7, 'banner chính', 'chỉ là test thôi mà ', 'http://defa.codeup247.com/nt-10/noi-that-noi-that-chi-tiet', '2016_11_28_355d9b134a.jpg', 'top', 'home', 1, '2016-11-18 02:56:38', '2016-12-04 06:58:12', NULL, NULL, 1),
(10, 'vbjdfvdfv', 'dfbdfbcfb', 'http://defa.codeup247.com/tu-van-thiet-ke', '2016_11_28_3780cf2d1c.jpg', 'top', 'home', 1, '2016-11-19 02:08:08', '2016-11-28 05:51:06', NULL, NULL, 0),
(11, 'fbfcb', 'fbfzbd', 'http://defa.codeup247.com/tu-van-thiet-ke', '2016_11_28_6356117248.jpg', 'top', 'home', 1, '2016-11-19 02:14:01', '2016-11-28 05:51:13', NULL, NULL, 0),
(13, 'svhjfb', 'fgfhft', 'defa.codeup247.com', '2016_11_28_ee342727eb.jpg', 'top', 'product_detail', 1, '2016-11-21 08:05:45', '2016-11-28 05:51:20', NULL, 'thiet-ke-tu-bep', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_count` bigint(20) NOT NULL DEFAULT '0',
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `background_image_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position_image_in_menu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_homepage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `background`, `sort`, `active`, `parent_id`, `slug`, `product_count`, `type`, `short_description`, `description`, `created_at`, `updated_at`, `background_image_alt`, `position_image_in_menu`, `background_homepage`) VALUES
(1, 'Phòng Khách', NULL, '2016_11_19_54c0b2069a.jpg', 1, 1, 0, 'phong-khach', 0, 0, 'Một phòng khách tuyệt vời', '', '2016-11-07 03:00:21', '2016-11-21 16:25:44', NULL, 'right', NULL),
(3, 'Phòng ngủ', NULL, '2016_11_21_77abb92f2b.jpg', 3, 1, 0, 'phong-ngu', 0, 0, '', '', '2016-11-07 03:01:56', '2016-11-21 16:26:31', NULL, 'right', NULL),
(4, 'Phòng trẻ em', NULL, '2016_11_21_458a22852a.jpg', 6, 1, 0, 'phong-tre-em', 0, 0, '', '', '2016-11-07 03:02:06', '2016-11-21 16:26:48', NULL, 'left', NULL),
(5, 'Phòng ăn', NULL, '2016_11_21_4f25eeb2d2.jpg', 4, 1, 0, 'phong-an', 0, 0, '', '', '2016-11-07 03:02:19', '2016-11-21 16:27:13', NULL, 'left', NULL),
(6, 'Tủ bếp', NULL, '2016_11_21_8cd8388e64.jpg', 5, 1, 0, 'tu-bep', 0, 0, '', '', '2016-11-07 03:02:26', '2016-11-21 16:27:52', NULL, 'left', NULL),
(7, 'THIẾT KẾ TRỌN BỘ', NULL, '2016_12_04_d372ac942f.jpg', 0, 1, 1, 'noi-that-phong-khach-tron-bo', 0, 1, '', '<p><span class="example2 example1">Ph&ograve;ng kh&aacute;ch thường l&agrave; kh&ocirc;ng gian trung t&acirc;m của mỗi ng&ocirc;i nh&agrave;: nơi diễn ra nhiều hoạt động trong gia đ&igrave;nh, nơi đầu ti&ecirc;n để lại ấn tượng với mỗi người kh&aacute;ch gh&eacute; thăm. H&atilde;y để những thiết kế nội thất ph&ograve;ng kh&aacute;ch của DEFA gi&uacute;p bạn kể l&ecirc;n c&acirc;u chuyện về phong c&aacute;ch sống của m&igrave;nh một c&aacute;ch tinh tế nhất!</span></p>', '2016-11-07 03:05:44', '2016-12-04 07:01:49', NULL, '', NULL),
(8, 'Phòng khách hiện đại', NULL, '2016_11_10_2464436274.png', 0, 1, 7, 'phong-khach-hien-dai', 0, 1, '', NULL, '2016-11-07 03:06:48', '2016-11-10 09:33:53', NULL, NULL, NULL),
(9, 'Phòng khách tân cổ điển', NULL, NULL, 0, 1, 7, 'phong-khach-tan-co-dien', 0, 1, '', NULL, '2016-11-07 03:07:08', '2016-11-10 05:27:24', NULL, NULL, NULL),
(10, 'Nội thất chi tiết', NULL, '2016_11_23_ea3b628b75.jpg', 0, 1, 1, 'noi-that-chi-tiet', 0, 0, '', '<p style="margin-left: 0px; margin-right: 0px;"><span class="example2">Colors are split into their red, green, blue and alpha dimensions. The operation is applied to each color dimension separately. E.g., if the user added two colors, then the green dimension of the result is equal to sum of green dimensions of input colors. If the user multiplied a color by a number, each color dimension will get multiplied.</span></p>\r\n<p style="margin-left: 0px; margin-right: 0px;"><span class="example2">Note: arithmetic operation on alpha is not defined, because math operation on colors do not have standard agreed upon meaning. Do not rely on current implemention as it&nbsp;<a style="box-sizing: border-box; background: transparent; color: #43759e; text-decoration: none;" href="https://github.com/less/less.js/issues/2694">may change</a>&nbsp;in later versions.</span></p>\r\n<p style="margin-left: 0px; margin-right: 0px;"><span class="example2">An operation on colors always produces valid color. If some color dimension of the result ends up being bigger than&nbsp;<code>ff</code>&nbsp;or smaller than&nbsp;<code>00</code>, the dimension is rounded to either&nbsp;<code>ff</code>&nbsp;or&nbsp;<code>00</code>. If alpha ends up being bigger than&nbsp;<code>1.0</code>&nbsp;or smaller than&nbsp;<code>0.0</code>, the alpha is rounded to either&nbsp;<code>1.0</code>&nbsp;or&nbsp;<code>0.0</code>.</span></p>', '2016-11-07 03:08:22', '2016-11-23 04:04:39', NULL, '', NULL),
(11, 'Bàn nước', NULL, NULL, 0, 1, 10, 'ban-nuoc', 0, 0, NULL, NULL, '2016-11-07 03:08:45', '2016-11-07 03:08:47', NULL, NULL, NULL),
(12, 'Sofa nỉ', NULL, NULL, 0, 1, 10, 'sofa-ni', 0, 0, NULL, NULL, '2016-11-07 03:08:57', '2016-11-07 03:08:58', NULL, NULL, NULL),
(13, 'Ghế', NULL, NULL, 0, 1, 10, 'ghe', 0, 0, NULL, NULL, '2016-11-07 03:09:06', '2016-11-07 03:09:18', NULL, NULL, NULL),
(14, 'Sofa italia', NULL, NULL, 0, 1, 10, 'sofa-italia', 0, 0, NULL, NULL, '2016-11-07 03:09:37', '2016-11-07 03:09:40', NULL, NULL, NULL),
(15, 'Kệ tivi', NULL, NULL, 0, 1, 10, 'ke-tivi', 0, 0, NULL, NULL, '2016-11-07 03:10:04', '2016-11-07 03:10:07', NULL, NULL, NULL),
(16, 'Sofa malaysia', NULL, NULL, 0, 1, 10, 'sofa-malaysia', 0, 0, NULL, NULL, '2016-11-07 03:10:17', '2016-11-07 04:10:52', NULL, NULL, NULL),
(17, 'Tủ phòng khách', NULL, NULL, 0, 1, 10, 'tu-phong-khach', 0, 0, NULL, NULL, '2016-11-07 03:10:57', '2016-11-07 03:10:58', NULL, NULL, NULL),
(18, 'Ghế ăn', NULL, NULL, 0, 1, 63, 'ghe-an', 0, 0, '', '', '2016-11-09 08:09:51', '2016-11-21 08:59:14', NULL, NULL, NULL),
(19, 'Bàn ăn', NULL, NULL, 0, 1, 63, 'ban-an', 0, 0, '', '', '2016-11-09 08:10:01', '2016-11-21 08:59:43', NULL, NULL, NULL),
(34, 'Thiết kế nội thất nhà đẹp', NULL, '2016_11_23_76ce1a809a.jpg', 0, 1, 0, 'thiet-ke-noi-that-nha-dep', 0, 2, '<p>Làm đẹp cho không gian riêng của mỗi khách hàng là niềm vui làm việc của mọi nhân viên Nội thất DEFA.<br />\r\nChúng tôi cung cấp sản phẩm nội thất chất lượng, nhận tư vấn thiết kế và thi công hoàn thiện các công trình nội thất <a class="link-underline" href="http://abc">Nhà lô phố</a>, <br />\r\n<a class="link-underline" href="http://abc">Căn hộ chung cư</a>, <a class="link-underline" href="http://abc">Biệt thự</a></p>\r\n', '', '2016-11-10 08:05:11', '2016-11-23 02:53:39', NULL, '', '2016_11_23_393e349b87.jpg'),
(35, 'Thiết kế nhà hàng - khách sạn', NULL, '2016_11_23_5c85f760b6.jpg', 0, 1, 0, 'thiet-ke-noi-that-nha-hang-khach-san', 0, 2, '<p>Chúng tôi hoàn toàn thấu hiểu tầm quan trọng của kiến trúc và nội thất sẽ ảnh hưởng đến hiệu quả công việc kinh doanh của quý khách.<br/>\r\nSự tư vấn tận tụy của đội ngũ kiến trúc sư DEFA cho từng chi tiết thiết kế trong công trình sẽ mang đến kết quả hài lòng nhất.</p>\r\n', '', '2016-11-10 08:13:28', '2016-11-23 03:02:25', NULL, '', '2016_11_23_5de8fb5332.jpg'),
(36, 'Thiết kế văn phòng - Show room', NULL, '2016_11_23_8af4d6cdd7.jpg', 0, 1, 0, 'thiet-ke-noi-that-van-phong-show-room', 0, 2, '<p>Tinh thần làm việc, tinh thần mua sắm luôn có thể được cải thiện đáng kể trong không gian văn phòng/ showroom được thiết kế phù hợp với chủ đề mà vẫn sáng tạo nhất.<br />\r\nHãy để những thiết kế và sản phẩm nội thất chất lượng của DEFA kể \r\nlên câu chuyện phong cách và đẳng cấp về doanh nghiệp của bạn.</p>\r\n', '', '2016-11-10 08:14:20', '2016-11-23 03:23:10', NULL, '', '2016_11_23_475afee8ce.jpg'),
(37, 'chung cư', NULL, '2016_11_11_6237be9705.png', 0, 1, 34, 'thiet-ke-nha-chung-cu', 0, 2, '', '', '2016-11-10 08:16:41', '2016-11-21 04:50:09', NULL, NULL, NULL),
(38, 'NHÀ PHỐ', NULL, '2016_11_18_ba872b0156.jpg', 0, 1, 34, NULL, 0, 2, '', '', '2016-11-18 07:52:22', '2016-11-18 07:52:22', NULL, NULL, NULL),
(39, 'Tủ sách', NULL, NULL, 0, 1, 2, NULL, 0, 0, '', '', '2016-11-19 08:54:49', '2016-11-19 09:01:14', NULL, NULL, NULL),
(40, 'Phòng làm việc hiện đại', NULL, NULL, 0, 1, 40, NULL, 0, 1, '', '', '2016-11-19 08:58:07', '2016-11-19 08:58:46', NULL, NULL, NULL),
(42, 'Phòng làm việc', NULL, '2016_11_21_e880073dbe.jpg', 2, 1, 0, 'noi-that-phong-lam-viec', 0, 0, '', '', '2016-11-19 09:03:00', '2016-11-21 16:28:39', NULL, 'right', NULL),
(43, 'Biệt thự', NULL, NULL, 0, 1, 34, 'thiet-ke-noi-that-biet-thu', 0, 2, '', '', '2016-11-21 04:50:58', '2016-11-21 04:50:58', NULL, NULL, NULL),
(44, 'Nhà hàng', NULL, NULL, 0, 1, 35, 'thiet-ke-noi-that-nha-hang', 0, 2, '', '', '2016-11-21 04:52:43', '2016-11-21 04:52:43', NULL, NULL, NULL),
(45, 'Khách sạn', NULL, NULL, 0, 1, 35, 'thiet-ke-noi-that-khach-san', 0, 2, '', '', '2016-11-21 04:53:53', '2016-11-21 04:53:53', NULL, NULL, NULL),
(46, 'Văn phòng', NULL, NULL, 0, 1, 36, 'thiet-ke-noi-that-van-phong', 0, 2, '', '', '2016-11-21 04:56:15', '2016-11-21 04:56:15', NULL, NULL, NULL),
(47, 'Showroom', NULL, NULL, 0, 1, 36, 'thiet-ke-noi-that-showroom', 0, 2, '', '', '2016-11-21 04:57:14', '2016-11-21 04:57:14', NULL, NULL, NULL),
(48, 'Thiết kế trọn bộ', NULL, NULL, 0, 1, 42, 'thiet-ke-noi-that-phong-lam-viec', 0, 1, '', '', '2016-11-21 06:53:08', '2016-11-21 06:53:08', NULL, NULL, NULL),
(49, 'Nội thất chi tiết', NULL, NULL, 0, 1, 42, 'noi-that-phong-lam-viec', 0, 0, '', '', '2016-11-21 06:54:39', '2016-11-21 06:54:39', NULL, NULL, NULL),
(50, 'Phòng làm việc hiện đại', NULL, NULL, 0, 1, 48, 'phong-lam-viec-hien-dai', 0, 1, '', '', '2016-11-21 06:55:51', '2016-11-21 06:57:00', NULL, NULL, NULL),
(51, 'Phòng làm việc tân cổ điển', NULL, NULL, 0, 1, 48, 'phong-lam-viec-tan-co-dien', 0, 1, '', '', '2016-11-21 06:57:57', '2016-11-22 06:15:44', NULL, '', NULL),
(52, 'Tủ sách', NULL, NULL, 2, 1, 49, 'tu-sach', 0, 0, '', '', '2016-11-21 07:01:13', '2016-11-21 07:19:54', NULL, NULL, NULL),
(53, 'Bàn làm việc', NULL, NULL, 1, 1, 49, 'ban-lam-viec', 0, 0, '', '', '2016-11-21 07:18:09', '2016-11-21 07:19:49', NULL, NULL, NULL),
(54, 'THIẾT KẾ PHÒNG NGỦ TRỌN BỘ', NULL, '2016_11_24_a507bb538a.jpg', 0, 1, 3, 'thiet-ke-phong-ngu-tron-bo', 0, 1, '', '<p style="text-align: justify;"><span style="color: #725d50;">Kh&ocirc;ng chỉ ch&uacute; trọng tạo kh&ocirc;ng gian thoải m&aacute;i nhất cho nơi nghỉ ngơi ri&ecirc;ng tư của mỗi người, những thiết kế nội thất ph&ograve;ng ngủ của DEFA c&ograve;n lu&ocirc;n duy tr&igrave; được sự thể hiện th&ocirc;ng minh cho từng sở th&iacute;ch, c&aacute; t&iacute;nh kh&aacute;c biệt của kh&aacute;ch h&agrave;ng qua những sản phẩm chất lượng.</span></p>', '2016-11-21 08:41:04', '2016-11-24 09:31:14', NULL, '', NULL),
(55, 'Nội thất chi tiết', NULL, '2016_11_24_27b8f68828.jpg', 0, 1, 3, 'noi-that-chi-tiet', 0, 0, '', '', '2016-11-21 08:43:42', '2016-11-24 04:32:40', NULL, '', NULL),
(56, 'Phòng ngủ hiện đại', NULL, NULL, 0, 1, 54, 'phong-ngu-hien-dai', 0, 1, '', '', '2016-11-21 08:44:17', '2016-11-21 08:49:22', NULL, NULL, NULL),
(58, 'Giường ', NULL, NULL, 0, 1, 55, 'giuong', 0, 0, '', '', '2016-11-21 08:52:46', '2016-11-21 08:52:46', NULL, NULL, NULL),
(59, 'Tủ đầu giường', NULL, NULL, 0, 1, 55, 'tu-dau-giuong', 0, 0, '', '', '2016-11-21 08:53:45', '2016-11-21 08:53:45', NULL, NULL, NULL),
(60, 'Tủ quần áo', NULL, NULL, 0, 1, 55, 'tu-quan-ao', 0, 0, '', '', '2016-11-21 08:54:14', '2016-11-21 08:54:14', NULL, NULL, NULL),
(61, 'Bàn phấn', NULL, NULL, 0, 1, 55, 'ban-phan', 0, 0, '', '', '2016-11-21 08:54:44', '2016-11-21 08:54:44', NULL, NULL, NULL),
(62, 'Thiết kế trọn bộ', NULL, NULL, 0, 1, 5, 'thiet-ke-tron-bo', 0, 1, '', '', '2016-11-21 08:57:24', '2016-11-21 15:52:48', NULL, NULL, NULL),
(63, 'Nội thất chi tiết', NULL, NULL, 0, 1, 5, 'noi-that-chi-tiet', 0, 0, '', '', '2016-11-21 08:58:00', '2016-11-21 08:58:00', NULL, NULL, NULL),
(64, 'Nội thất chi tiết', NULL, NULL, 2, 1, 4, 'noi-that-chi-tiet', 0, 0, '', '', '2016-11-21 09:15:59', '2016-11-21 09:34:58', NULL, NULL, NULL),
(65, 'Thiết kế trọn bộ', NULL, NULL, 1, 1, 4, 'thiet-ke-tron-bo', 0, 1, '', '', '2016-11-21 09:16:58', '2016-11-21 15:52:17', NULL, NULL, NULL),
(66, 'Giường ', NULL, NULL, 0, 1, 64, 'giuong', 0, 0, '', '', '2016-11-21 09:26:51', '2016-11-21 09:26:51', NULL, NULL, NULL),
(67, 'Tủ quần áo', NULL, NULL, 0, 1, 64, 'tu-quan-ao', 0, 0, '', '', '2016-11-21 09:27:28', '2016-11-21 09:27:28', NULL, NULL, NULL),
(68, 'Bàn học', NULL, NULL, 0, 1, 64, 'ban-hoc', 0, 0, '', '', '2016-11-21 09:27:59', '2016-11-21 09:27:59', NULL, NULL, NULL),
(69, 'Giá sách', NULL, NULL, 0, 1, 64, 'gia-sach', 0, 0, '', '', '2016-11-21 09:28:35', '2016-11-21 09:30:38', NULL, NULL, NULL),
(70, 'Phòng bé gái', NULL, NULL, 0, 1, 65, 'phong-be-gai', 0, 1, '', '', '2016-11-21 09:29:07', '2016-11-21 09:34:06', NULL, NULL, NULL),
(71, 'Phòng bé trai', NULL, NULL, 0, 1, 65, 'phong-be-trai', 0, 1, '', '', '2016-11-21 09:30:00', '2016-11-21 09:30:00', NULL, NULL, NULL),
(72, 'Thiết kế trọn bộ', NULL, NULL, 0, 1, 6, 'thiet-ke-tron-bo', 0, 1, '', '', '2016-11-21 09:37:16', '2016-11-21 15:53:24', NULL, NULL, NULL),
(73, 'Tủ bếp hiện đại', NULL, NULL, 0, 1, 72, 'tu-bep-hien-dai', 0, 1, '', '', '2016-11-21 09:40:10', '2016-11-21 09:40:10', NULL, NULL, NULL),
(74, 'Tủ bếp phong cách vintage', NULL, '2016_11_21_58ace6fe60.jpg', 0, 1, 72, 'tu-bep-phong-cach-vintage', 0, 1, '', '', '2016-11-21 09:41:03', '2016-11-22 06:16:48', NULL, '', NULL),
(75, 'Nội thất chi tiết', NULL, NULL, 0, 1, 6, 'noi-that-chi-tiet', 0, 0, '', '', '2016-11-21 10:05:55', '2016-11-21 10:05:55', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories_products`
--

CREATE TABLE `categories_products` (
  `category_id` bigint(20) NOT NULL DEFAULT '0',
  `product_id` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cit_id` int(11) NOT NULL,
  `cit_name` varchar(255) DEFAULT NULL,
  `cit_parent` int(11) DEFAULT '0',
  `cit_active` tinyint(4) DEFAULT '1',
  `cit_hot` tinyint(1) NOT NULL DEFAULT '0',
  `cit_image` varchar(255) NOT NULL,
  `cit_country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cit_id`, `cit_name`, `cit_parent`, `cit_active`, `cit_hot`, `cit_image`, `cit_country_id`) VALUES
(2, 'Hà Nội', 0, 1, 0, '', 0),
(3, 'Hồ Chí Minh', 0, 1, 0, '', 0),
(4, 'An Giang', 0, 1, 0, '', 0),
(5, 'Bà Rịa - Vũng Tàu', 0, 1, 0, '', 0),
(6, 'Bắc Ninh', 0, 1, 0, '', 0),
(7, 'Bắc Giang', 0, 1, 0, '', 0),
(8, 'Bình Dương', 0, 1, 0, '', 0),
(9, 'Bình Định', 0, 1, 0, '', 0),
(10, 'Bình Phước', 0, 1, 0, '', 0),
(11, 'Bình Thuận', 0, 1, 0, '', 0),
(13, 'Bến Tre', 0, 1, 0, '', 0),
(14, 'Bắc Cạn', 0, 1, 0, '', 0),
(15, 'Cần Thơ', 0, 1, 0, '', 0),
(17, 'Khánh Hòa', 0, 1, 0, '', 0),
(19, 'Thừa Thiên Huế', 0, 1, 0, '', 0),
(20, 'Lào Cai', 0, 1, 0, '', 0),
(21, 'Quảng Ninh', 0, 1, 0, '', 0),
(22, 'Đồng Nai', 0, 1, 0, '', 0),
(23, 'Nam Định', 0, 1, 0, '', 0),
(24, 'Cà Mau', 0, 1, 0, '', 0),
(25, 'Cao Bằng', 0, 1, 0, '', 0),
(26, 'Gia Lai', 0, 1, 0, '', 0),
(27, 'Hà Giang', 0, 1, 0, '', 0),
(28, 'Hà Nam', 0, 1, 0, '', 0),
(30, 'Hà Tĩnh', 0, 1, 0, '', 0),
(31, 'Hải Dương', 0, 1, 0, '', 0),
(32, 'Hải Phòng', 0, 1, 0, '', 0),
(33, 'Hoà Bình', 0, 1, 0, '', 0),
(34, 'Hưng Yên', 0, 1, 0, '', 0),
(35, 'Kiên Giang', 0, 1, 0, '', 0),
(36, 'Kon Tum', 0, 1, 0, '', 0),
(37, 'Lai Châu', 0, 1, 0, '', 0),
(38, 'Lâm Đồng', 0, 1, 0, '', 0),
(39, 'Lạng Sơn', 0, 1, 0, '', 0),
(40, 'Long An', 0, 1, 0, '', 0),
(41, 'Nghệ An', 0, 1, 0, '', 0),
(42, 'Ninh Bình', 0, 1, 0, '', 0),
(43, 'Ninh Thuận', 0, 1, 0, '', 0),
(44, 'Phú Thọ', 0, 1, 0, '', 0),
(45, 'Phú Yên', 0, 1, 0, '', 0),
(46, 'Quảng Bình', 0, 1, 0, '', 0),
(47, 'Quảng Nam', 0, 1, 0, '', 0),
(48, 'Quảng Ngãi', 0, 1, 0, '', 0),
(49, 'Quảng Trị', 0, 1, 0, '', 0),
(50, 'Sóc Trăng', 0, 1, 0, '', 0),
(51, 'Sơn La', 0, 1, 0, '', 0),
(52, 'Tây Ninh', 0, 1, 0, '', 0),
(53, 'Thái Bình', 0, 1, 0, '', 0),
(54, 'Thái Nguyên', 0, 1, 0, '', 0),
(55, 'Thanh Hoá', 0, 1, 0, '', 0),
(56, 'Tiền Giang', 0, 1, 0, '', 0),
(57, 'Trà Vinh', 0, 1, 0, '', 0),
(58, 'Tuyên Quang', 0, 1, 0, '', 0),
(59, 'Vĩnh Long', 0, 1, 0, '', 0),
(60, 'Vĩnh Phúc', 0, 1, 0, '', 0),
(61, 'Yên Bái', 0, 1, 0, '', 0),
(62, 'Đắc Lắc', 0, 1, 0, '', 0),
(64, 'Đồng Tháp', 0, 1, 0, '', 0),
(65, 'Đà Nẵng', 0, 1, 0, '', 0),
(66, 'Buôn Mê Thuột', 0, 1, 0, '', 0),
(67, 'Đắc Nông', 0, 1, 0, '', 0),
(68, 'Hậu Giang', 0, 1, 0, '', 0),
(70, 'Bạc Liêu', 0, 1, 0, '', 0),
(71, 'Điện Biên', 0, 1, 0, '', 0),
(72, 'Quận Hoàng Mai', 2, 1, 0, '', 0),
(73, 'Quận Ba Đình', 2, 1, 0, '', 0),
(74, 'Quận Long Biên', 2, 1, 0, '', 0),
(75, 'Quận Cầu Giấy', 2, 1, 0, '', 0),
(76, 'Quận Đống Đa', 2, 1, 0, '', 0),
(77, 'Quận Hai Bà Trưng', 2, 1, 0, '', 0),
(78, 'Quận Hoàn Kiếm', 2, 1, 0, '', 0),
(79, 'Quận Tây Hồ', 2, 1, 0, '', 0),
(80, 'Quận Thanh Xuân', 2, 1, 0, '', 0),
(81, 'Huyện Ba Vì', 2, 1, 0, '', 0),
(82, 'Huyện Chương Mỹ', 2, 1, 0, '', 0),
(83, 'Huyện Đan Phượng', 2, 1, 0, '', 0),
(84, 'Quận 1', 3, 1, 0, '', 0),
(85, 'Quận 2', 3, 1, 0, '', 0),
(86, 'Huyện Gia Lâm', 2, 1, 0, '', 0),
(87, 'Huyện Hoài Đức', 2, 1, 0, '', 0),
(88, 'Huyện Mê Linh', 2, 1, 0, '', 0),
(89, 'Huyện Mỹ Đức', 2, 1, 0, '', 0),
(90, 'Huyện Phú Xuyên', 2, 1, 0, '', 0),
(91, 'Huyện Phúc Thọ', 2, 1, 0, '', 0),
(92, 'Huyện Quốc Oai', 2, 1, 0, '', 0),
(93, 'Huyện Sóc Sơn', 2, 1, 0, '', 0),
(94, 'Huyện Thạch Thất', 2, 1, 0, '', 0),
(95, 'Huyện Thanh Oai', 2, 1, 0, '', 0),
(96, 'Huyện Thanh Trì', 2, 1, 0, '', 0),
(97, 'Huyện Thường Tín', 2, 1, 0, '', 0),
(98, 'Huyện Từ Liêm', 2, 1, 0, '', 0),
(99, 'Huyện Ứng Hòa', 2, 1, 0, '', 0),
(100, 'Quận 3', 3, 1, 0, '', 0),
(101, 'Quận 4', 3, 1, 0, '', 0),
(102, 'Quận 5', 3, 1, 0, '', 0),
(103, 'Quận 6', 3, 1, 0, '', 0),
(104, 'Quận 7', 3, 1, 0, '', 0),
(105, 'Quận 8', 3, 1, 0, '', 0),
(106, 'Quận 9', 3, 1, 0, '', 0),
(107, 'Quận 10', 3, 1, 0, '', 0),
(108, 'Quận 11', 3, 1, 0, '', 0),
(109, 'Quận 12', 3, 1, 0, '', 0),
(110, 'Quận Tân Bình', 3, 1, 0, '', 0),
(111, 'Quận Tân Phú', 3, 1, 0, '', 0),
(112, 'Quận Bình Tân', 3, 1, 0, '', 0),
(113, 'Quận Phú Nhuận', 3, 1, 0, '', 0),
(114, 'Quận Gò Vấp', 3, 1, 0, '', 0),
(115, 'Quận Bình Thạnh', 3, 1, 0, '', 0),
(116, 'Quận Thủ Đức', 3, 1, 0, '', 0),
(117, 'Quận Hồng Bàng', 32, 1, 0, '', 0),
(118, 'Quận Ngô Quyền', 32, 1, 0, '', 0),
(119, 'Quận Lê Chân', 32, 1, 0, '', 0),
(120, 'Quận Kiến An', 32, 1, 0, '', 0),
(121, 'Quận Hải An', 32, 1, 0, '', 0),
(122, 'Quận Dương Kinh', 32, 1, 0, '', 0),
(123, 'Quận Đồ Sơn', 32, 1, 0, '', 0),
(124, 'Huyện Sơn Trà', 65, 1, 0, '', 0),
(125, 'Quận Hải Châu', 65, 1, 0, '', 0),
(126, 'Quận Thanh Khê', 65, 1, 0, '', 0),
(127, 'Quận Ngũ Hành Sơn', 65, 1, 0, '', 0),
(128, 'Quận Liên Chiểu', 65, 1, 0, '', 0),
(129, 'Quận Cẩm Lệ', 65, 1, 0, '', 0),
(130, 'Quận Ninh Kiều', 15, 1, 0, '', 0),
(131, 'Quận Bình Thủy', 15, 1, 0, '', 0),
(132, 'Quận Cái Răng', 15, 1, 0, '', 0),
(133, 'Quận Thốt Nốt', 15, 1, 0, '', 0),
(134, 'Quận Hà Đông', 2, 1, 0, '', 0),
(135, 'Quận Ô môn', 15, 1, 0, '', 0),
(136, 'Huyện A Lưới', 19, 1, 0, '', 0),
(137, 'Huyện Đông Hải ', 70, 1, 0, '', 0),
(138, 'Huyện Nam Đông ', 19, 1, 0, '', 0),
(139, 'Huyện Phong Điền', 19, 1, 0, '', 0),
(140, 'Huyện Phú Lộc', 19, 1, 0, '', 0),
(141, 'Huyện Phú Vang', 19, 1, 0, '', 0),
(142, 'Huyện Quảng Điền', 19, 1, 0, '', 0),
(143, 'Thị xã Hương Thủy', 19, 1, 0, '', 0),
(144, 'Huyện Châu Đức', 5, 1, 0, '', 0),
(145, 'Huyện Côn Đảo', 5, 1, 0, '', 0),
(146, 'Huyện Đất Đỏ', 5, 1, 0, '', 0),
(147, 'Huyện Long Điền', 5, 1, 0, '', 0),
(148, 'Huyện Tân Thành', 5, 1, 0, '', 0),
(149, 'Thị xã Bà Rịa', 5, 1, 0, '', 0),
(150, 'Thành phố Vũng Tàu', 5, 1, 0, '', 0),
(151, 'Huyện Xuyên Mộc', 5, 1, 0, '', 0),
(152, 'Huyện An Phú', 4, 1, 0, '', 0),
(153, 'Huyện Châu Phú', 4, 1, 0, '', 0),
(154, 'Thị xã Châu Đốc', 4, 1, 0, '', 0),
(155, 'Huyện Châu Thành', 4, 1, 0, '', 0),
(156, 'Huyện Chợ Mới', 4, 1, 0, '', 0),
(157, 'Thành phố Long Xuyên ', 4, 1, 0, '', 0),
(158, 'Thị xã Tân Châu', 4, 1, 0, '', 0),
(159, 'Huyện Thoại Sơn', 4, 1, 0, '', 0),
(160, 'Huyện Tịnh Biên', 4, 1, 0, '', 0),
(161, 'Huyện Tri Tôn ', 4, 1, 0, '', 0),
(162, 'Thành phố Bạc Liêu', 70, 1, 0, '', 0),
(163, 'Huyện Giá Rai ', 70, 1, 0, '', 0),
(164, 'Huyện Hoà Bình ', 70, 1, 0, '', 0),
(165, 'Huyện Hồng Dân ', 70, 1, 0, '', 0),
(166, 'Huyện Phước Long ', 70, 1, 0, '', 0),
(167, 'Huyện Vĩnh Lợi ', 70, 1, 0, '', 0),
(168, 'Thành phố Bắc Giang ', 7, 1, 0, '', 0),
(169, 'Huyện Lục Nam', 7, 1, 0, '', 0),
(170, 'Huyện Lục Ngạn ', 7, 1, 0, '', 0),
(171, 'Huyện Sơn Động ', 7, 1, 0, '', 0),
(172, 'Huyện Tân Yên ', 7, 1, 0, '', 0),
(173, 'Huyện Yên Dũng ', 7, 1, 0, '', 0),
(174, 'Huyện Yên Thế ', 7, 1, 0, '', 0),
(175, 'Thị xã Bắc Kạn ', 14, 1, 0, '', 0),
(176, 'Huyện Chợ Mới ', 14, 1, 0, '', 0),
(177, 'Huyện Na Rì ', 14, 1, 0, '', 0),
(178, 'Huyện Ngân Sơn ', 14, 1, 0, '', 0),
(179, 'Thành phố Bắc Ninh ', 6, 1, 0, '', 0),
(180, 'Huyện Gia Bình ', 6, 1, 0, '', 0),
(181, 'Huyện Quế Võ ', 6, 1, 0, '', 0),
(182, 'Huyện Thuận Thành ', 6, 1, 0, '', 0),
(183, 'Huyện Tiên Du ', 6, 1, 0, '', 0),
(184, 'Thị xã Từ Sơn', 6, 1, 0, '', 0),
(185, 'Huyện Yên Phong ', 6, 1, 0, '', 0),
(186, 'Huyện Ba Tri ', 13, 1, 0, '', 0),
(187, 'Thành phố Bến Tre', 13, 1, 0, '', 0),
(188, 'Huyện Bình Đại ', 13, 1, 0, '', 0),
(189, 'Huyện Châu Thành ', 13, 1, 0, '', 0),
(190, 'Huyện Chợ Lách ', 13, 1, 0, '', 0),
(191, 'Huyện Giồng Trôm ', 13, 1, 0, '', 0),
(192, 'Huyện Mỏ Cày Nam ', 13, 1, 0, '', 0),
(193, 'Huyện Thạnh Phú ', 13, 1, 0, '', 0),
(194, 'Huyện Bến Cát ', 8, 1, 0, '', 0),
(195, 'Huyện Dầu Tiếng ', 8, 1, 0, '', 0),
(196, 'Thị xã Dĩ An ', 8, 1, 0, '', 0),
(197, 'Huyện Phú Giáo ', 8, 1, 0, '', 0),
(198, 'Huyện Tân Uyên ', 8, 1, 0, '', 0),
(199, 'Thị xã Thủ Dầu Một ', 8, 1, 0, '', 0),
(200, 'Thị xã Thuận An ', 8, 1, 0, '', 0),
(201, 'Huyện An Lão ', 9, 1, 0, '', 0),
(202, 'Huyện An Nhơn ', 9, 1, 0, '', 0),
(203, 'Huyện Hoài Nhơn ', 9, 1, 0, '', 0),
(204, 'Huyện Phù Cát ', 9, 1, 0, '', 0),
(205, 'Huyện Phù Mỹ ', 9, 1, 0, '', 0),
(206, 'Thành phố Qui Nhơn', 9, 1, 0, '', 0),
(207, 'Huyện Tây Sơn ', 9, 1, 0, '', 0),
(208, 'Huyện Tuy Phước ', 9, 1, 0, '', 0),
(209, 'Huyện Vân Canh ', 9, 1, 0, '', 0),
(210, 'Huyện Vĩnh Thạnh ', 9, 1, 0, '', 0),
(211, 'Thị xã Bình Long ', 10, 1, 0, '', 0),
(212, 'Huyện Bù Đăng ', 10, 1, 0, '', 0),
(213, 'Thị xã Đồng Xoài ', 10, 1, 0, '', 0),
(214, 'Huyện Lộc Ninh ', 10, 1, 0, '', 0),
(215, 'Thị xã Phước Long ', 10, 1, 0, '', 0),
(216, 'Huyện Bù Gia Mập ', 10, 1, 0, '', 0),
(217, 'Huyện Hàm Tân ', 11, 1, 0, '', 0),
(218, 'Thị xã La Gi', 11, 1, 0, '', 0),
(219, 'Thành phố Phan Thiết ', 11, 1, 0, '', 0),
(220, 'Huyện Tuy Phong ', 11, 1, 0, '', 0),
(221, 'Thành phố Cà Mau ', 24, 1, 0, '', 0),
(222, 'Huyện Cái Nước ', 24, 1, 0, '', 0),
(223, 'Huyện Đầm Dơi ', 24, 1, 0, '', 0),
(224, 'Huyện Năm Căn ', 24, 1, 0, '', 0),
(225, 'Huyện Ngọc Hiển ', 24, 1, 0, '', 0),
(226, 'Huyện Phú Tân ', 24, 1, 0, '', 0),
(227, 'Huyện Thới Bình ', 24, 1, 0, '', 0),
(228, 'Huyện Trần Văn Thời ', 24, 1, 0, '', 0),
(229, 'Huyện U Minh ', 24, 1, 0, '', 0),
(230, 'Huyện Bảo Lạc ', 25, 1, 0, '', 0),
(231, 'Huyện Bảo Lâm ', 25, 1, 0, '', 0),
(232, 'Thị xã Cao Bằng ', 25, 1, 0, '', 0),
(233, 'Huyện Nguyên Bình ', 25, 1, 0, '', 0),
(234, 'Huyện Quảng Uyên ', 25, 1, 0, '', 0),
(235, 'Huyện Thông Nông ', 25, 1, 0, '', 0),
(236, 'Huyện Trà Lĩnh ', 25, 1, 0, '', 0),
(237, 'Huyện Trùng Khánh ', 25, 1, 0, '', 0),
(238, 'Huyện Cờ Đỏ ', 15, 1, 0, '', 0),
(239, 'Huyện Phong Điền ', 15, 1, 0, '', 0),
(240, 'Huyện Vĩnh Thạnh ', 15, 1, 0, '', 0),
(241, 'Huyện Buôn Đôn ', 62, 1, 0, '', 0),
(242, 'Huyện đảo Hoàng Sa ', 65, 1, 0, '', 0),
(243, 'Thành phố Buôn Ma Thuột ', 62, 1, 0, '', 0),
(244, 'Huyện Cư Kuin ', 62, 1, 0, '', 0),
(245, 'Huyện Ea Hleo ', 62, 1, 0, '', 0),
(246, 'Huyện Ea Kar ', 62, 1, 0, '', 0),
(247, 'Huyện Ea Súp ', 62, 1, 0, '', 0),
(248, 'Huyện Krông Ana ', 62, 1, 0, '', 0),
(249, 'Huyện Krông Bông ', 62, 1, 0, '', 0),
(250, 'Huyện Krông Búk ', 62, 1, 0, '', 0),
(251, 'Huyện Krông Năng ', 62, 1, 0, '', 0),
(252, 'Huyện Krông Pắk ', 62, 1, 0, '', 0),
(253, 'Huyện MĐrăk ', 62, 1, 0, '', 0),
(254, 'Thị xã Buôn Hồ ', 62, 1, 0, '', 0),
(255, 'Huyện Đăk Glong ', 67, 1, 0, '', 0),
(256, 'Huyện Đăk Mil ', 67, 1, 0, '', 0),
(257, 'Huyện Đăk RLấp ', 67, 1, 0, '', 0),
(258, 'Huyện Đăk Song ', 67, 1, 0, '', 0),
(259, 'Thị xã Gia Nghĩa ', 67, 1, 0, '', 0),
(260, 'Huyện Tuy Đức ', 67, 1, 0, '', 0),
(261, 'Thành phố Biên Hòa ', 22, 1, 0, '', 0),
(262, 'Huyện Cẩm Mỹ ', 22, 1, 0, '', 0),
(263, 'Huyện Định Quán ', 22, 1, 0, '', 0),
(264, 'Thị xã Long Khánh ', 22, 1, 0, '', 0),
(265, 'Huyện Long Thành ', 22, 1, 0, '', 0),
(266, 'Huyện Nhơn Trạch ', 22, 1, 0, '', 0),
(267, 'Huyện Thống Nhất ', 22, 1, 0, '', 0),
(268, 'Huyện Trảng Bom ', 22, 1, 0, '', 0),
(269, 'Huyện Vĩnh Cửu ', 22, 1, 0, '', 0),
(270, 'Huyện Xuân Lộc ', 22, 1, 0, '', 0),
(271, 'Huyện Tân Phú ', 22, 1, 0, '', 0),
(272, 'Thành phố Cao Lãnh ', 64, 1, 0, '', 0),
(273, 'Huyện Cao Lãnh ', 64, 1, 0, '', 0),
(274, 'Huyện Châu Thành ', 64, 1, 0, '', 0),
(275, 'Thị xã Hồng Ngự ', 64, 1, 0, '', 0),
(276, 'Huyện Lai Vung ', 64, 1, 0, '', 0),
(277, 'Huyện Hồng Ngự ', 64, 1, 0, '', 0),
(278, 'Huyện Lấp Vò ', 64, 1, 0, '', 0),
(279, 'Thị xã Sa Đéc ', 64, 1, 0, '', 0),
(280, 'Huyện Tam Nông ', 64, 1, 0, '', 0),
(281, 'Huyện Tân Hồng ', 64, 1, 0, '', 0),
(282, 'Huyện Thanh Bình ', 64, 1, 0, '', 0),
(283, 'Huyện Tháp Mười ', 64, 1, 0, '', 0),
(284, 'Thị xã An Khê ', 26, 1, 0, '', 0),
(285, 'Thị xã Ayun Pa ', 26, 1, 0, '', 0),
(286, 'Huyện Chư Prông ', 26, 1, 0, '', 0),
(287, 'Huyện Chư Sê ', 26, 1, 0, '', 0),
(288, 'Huyện Đăk Đoa ', 26, 1, 0, '', 0),
(289, 'Huyện Đức Cơ ', 26, 1, 0, '', 0),
(290, 'Huyện KBang ', 26, 1, 0, '', 0),
(291, 'Huyện Kông Chro ', 26, 1, 0, '', 0),
(292, 'Huyện Krông Pa ', 26, 1, 0, '', 0),
(293, 'Huyện Mang Yang ', 26, 1, 0, '', 0),
(294, 'Huyện Phú Thiện ', 26, 1, 0, '', 0),
(295, 'Thành phố Pleiku ', 26, 1, 0, '', 0),
(296, 'Huyện Chư Pưh ', 26, 1, 0, '', 0),
(297, 'Huyện Đồng Văn ', 27, 1, 0, '', 0),
(298, 'Thành phố Hà Giang ', 27, 1, 0, '', 0),
(299, 'Huyện Mèo Vạc ', 27, 1, 0, '', 0),
(300, 'Huyện Quản Bạ ', 27, 1, 0, '', 0),
(301, 'Huyện Vị Xuyên', 27, 1, 0, '', 0),
(302, 'Huyện Xín Mần ', 27, 1, 0, '', 0),
(303, 'Huyện Yên Minh ', 27, 1, 0, '', 0),
(304, 'Huyện Bình Lục', 28, 1, 0, '', 0),
(305, 'Huyện Duy Tiên ', 28, 1, 0, '', 0),
(306, 'Huyện Kim Bảng ', 28, 1, 0, '', 0),
(307, 'Huyện Lý Nhân ', 28, 1, 0, '', 0),
(308, 'Thành phố Phủ Lý ', 28, 1, 0, '', 0),
(309, 'Huyện Can Lộc ', 30, 1, 0, '', 0),
(310, 'Huyện Cẩm Xuyên ', 30, 1, 0, '', 0),
(311, 'Huyện Đức Thọ ', 30, 1, 0, '', 0),
(312, 'Thành phố Hà Tĩnh ', 30, 1, 0, '', 0),
(313, 'Thị xã Hồng Lĩnh ', 30, 1, 0, '', 0),
(314, 'Huyện Hương Khê ', 30, 1, 0, '', 0),
(315, 'Huyện Hương Sơn ', 30, 1, 0, '', 0),
(316, 'Huyện Kỳ Anh ', 30, 1, 0, '', 0),
(317, 'Huyện Vũ Quang ', 30, 1, 0, '', 0),
(318, 'Huyện Thạch Hà ', 30, 1, 0, '', 0),
(319, 'Huyện Nghi Xuân ', 30, 1, 0, '', 0),
(320, 'Huyện Bình Giang ', 31, 1, 0, '', 0),
(321, 'Huyện Cẩm Giàng ', 31, 1, 0, '', 0),
(322, 'Thị xã Chí Linh ', 31, 1, 0, '', 0),
(323, 'Huyện Gia Lộc ', 31, 1, 0, '', 0),
(324, 'Thành phố Hải Dương ', 31, 1, 0, '', 0),
(325, 'Huyện Kim Thành ', 31, 1, 0, '', 0),
(326, 'Huyện Kinh Môn ', 31, 1, 0, '', 0),
(327, 'Huyện Nam Sách ', 31, 1, 0, '', 0),
(328, 'Huyện Ninh Giang ', 31, 1, 0, '', 0),
(329, 'Huyện Thanh Hà ', 31, 1, 0, '', 0),
(330, 'Huyện Thanh Miện ', 31, 1, 0, '', 0),
(331, 'Huyện Tứ Kỳ ', 31, 1, 0, '', 0),
(332, 'Huyện An Dương ', 32, 1, 0, '', 0),
(333, 'Huyện đảo Cát Hải ', 32, 1, 0, '', 0),
(334, 'Huyện Kiến Thụy ', 32, 1, 0, '', 0),
(335, 'Huyện Tiên Lãng ', 32, 1, 0, '', 0),
(336, 'Huyện Vĩnh Bảo ', 32, 1, 0, '', 0),
(337, 'Huyện Châu Thành', 68, 1, 0, '', 0),
(338, 'Huyện Châu Thành A ', 68, 1, 0, '', 0),
(339, 'Huyện Long Mỹ ', 68, 1, 0, '', 0),
(340, 'Huyện Phụng Hiệp ', 68, 1, 0, '', 0),
(341, 'Thị xã Ngã Bảy (Tân Hiệp cũ) ', 68, 1, 0, '', 0),
(342, 'Thành phố Vị Thanh ', 68, 1, 0, '', 0),
(343, 'Huyện Vị Thủy ', 68, 1, 0, '', 0),
(344, 'Huyện Cao Phong ', 33, 1, 0, '', 0),
(345, 'Huyện Đà Bắc ', 33, 1, 0, '', 0),
(346, 'Thành phố Hoà Bình ', 33, 1, 0, '', 0),
(347, 'Huyện Kim Bôi ', 33, 1, 0, '', 0),
(348, 'Huyện Lạc Sơn ', 33, 1, 0, '', 0),
(349, 'Huyện Lạc Thủy ', 33, 1, 0, '', 0),
(350, 'Huyện Lương Sơn ', 33, 1, 0, '', 0),
(351, 'Huyện Mai Châu ', 33, 1, 0, '', 0),
(352, 'Huyện Yên Thủy ', 33, 1, 0, '', 0),
(353, 'Huyện Ân Thi ', 34, 1, 0, '', 0),
(354, 'Thành phố Hưng Yên ', 34, 1, 0, '', 0),
(355, 'Huyện Khoái Châu ', 34, 1, 0, '', 0),
(356, 'Huyện Mỹ Hào ', 34, 1, 0, '', 0),
(357, 'Huyện Văn Giang ', 34, 1, 0, '', 0),
(358, 'Huyện Văn Lâm ', 34, 1, 0, '', 0),
(359, 'Huyện Yên Mỹ ', 34, 1, 0, '', 0),
(360, 'Huyện An Biên ', 35, 1, 0, '', 0),
(361, 'Huyện An Minh ', 35, 1, 0, '', 0),
(362, 'Huyện Châu Thành ', 35, 1, 0, '', 0),
(363, 'Huyện Giồng Riềng ', 35, 1, 0, '', 0),
(364, 'Huyện Gò Quao ', 35, 1, 0, '', 0),
(365, 'Thị xã Hà Tiên ', 35, 1, 0, '', 0),
(366, 'Huyện Hòn Đất', 35, 1, 0, '', 0),
(367, 'Huyện Kiên Lương ', 35, 1, 0, '', 0),
(368, 'Huyện đảo Phú Quốc ', 35, 1, 0, '', 0),
(369, 'Thành phố Rạch Giá ', 35, 1, 0, '', 0),
(370, 'Huyện Tân Hiệp ', 35, 1, 0, '', 0),
(371, 'Huyện U Minh Thượng ', 35, 1, 0, '', 0),
(372, 'Huyện Vĩnh Thuận ', 35, 1, 0, '', 0),
(373, 'Huyện Đắk Glei ', 36, 1, 0, '', 0),
(374, 'Huyện Đắk Hà ', 36, 1, 0, '', 0),
(375, 'Huyện Đăk Tô ', 36, 1, 0, '', 0),
(376, 'Huyện Kon Plông ', 36, 1, 0, '', 0),
(377, 'Huyện Kon Rẫy ', 36, 1, 0, '', 0),
(378, 'Huyện Sa Thầy ', 36, 1, 0, '', 0),
(379, 'Huyện Tu Mơ Rông ', 36, 1, 0, '', 0),
(380, 'Thành phố Cam Ranh ', 17, 1, 0, '', 0),
(381, 'Huyện Diên Khánh ', 17, 1, 0, '', 0),
(382, 'Huyện Khánh Sơn ', 17, 1, 0, '', 0),
(383, 'Huyện Khánh Vĩnh ', 17, 1, 0, '', 0),
(384, 'Thành phố Nha Trang ', 17, 1, 0, '', 0),
(385, 'Thị xã Ninh Hòa ', 17, 1, 0, '', 0),
(386, 'Huyện Vạn Ninh ', 17, 1, 0, '', 0),
(387, 'Thị xã Lai Châu ', 37, 1, 0, '', 0),
(388, 'Huyện Phong Thổ ', 37, 1, 0, '', 0),
(389, 'Huyện Sìn Hồ ', 37, 1, 0, '', 0),
(390, 'Huyện Tam Đường ', 37, 1, 0, '', 0),
(391, 'Huyện Than Uyên ', 37, 1, 0, '', 0),
(392, 'Huyện Mường Tè ', 37, 1, 0, '', 0),
(393, 'Huyện Bắc Sơn ', 39, 1, 0, '', 0),
(394, 'Huyện Bình Gia ', 39, 1, 0, '', 0),
(395, 'Huyện Chi Lăng ', 39, 1, 0, '', 0),
(396, 'Huyện Đình Lập ', 39, 1, 0, '', 0),
(397, 'Huyện Hữu Lũng', 39, 1, 0, '', 0),
(398, 'Thành phố Lạng Sơn ', 39, 1, 0, '', 0),
(399, 'Huyện Lộc Bình ', 39, 1, 0, '', 0),
(400, 'Huyện Văn Quan ', 39, 1, 0, '', 0),
(401, 'Huyện Bát Xát ', 20, 1, 0, '', 0),
(402, 'Huyện Bắc Hà ', 20, 1, 0, '', 0),
(403, 'Thành phố Lào Cai ', 20, 1, 0, '', 0),
(404, 'Huyện Mường Khương ', 20, 1, 0, '', 0),
(405, 'Huyện Sa Pa ', 20, 1, 0, '', 0),
(406, 'Huyện Si Ma Cai ', 20, 1, 0, '', 0),
(407, 'Huyện Văn Bàn ', 20, 1, 0, '', 0),
(408, 'Huyện Bảo Lâm ', 38, 1, 0, '', 0),
(409, 'Thành phố Bảo Lộc ', 38, 1, 0, '', 0),
(410, 'Huyện Di Linh ', 38, 1, 0, '', 0),
(411, 'Thành phố Đà Lạt ', 38, 1, 0, '', 0),
(412, 'Huyện Đạ Tẻh ', 38, 1, 0, '', 0),
(413, 'Huyện Lạc Dương ', 38, 1, 0, '', 0),
(414, 'Huyện Lâm Hà ', 38, 1, 0, '', 0),
(415, 'Huyện Bến Lức ', 40, 1, 0, '', 0),
(416, 'Huyện Cần Đước ', 40, 1, 0, '', 0),
(417, 'Huyện Cần Giuộc ', 40, 1, 0, '', 0),
(418, 'Huyện Châu Thành ', 40, 1, 0, '', 0),
(419, 'Huyện Đức Hòa ', 40, 1, 0, '', 0),
(420, 'Huyện Đức Huệ ', 40, 1, 0, '', 0),
(421, 'Huyện Mộc Hóa ', 40, 1, 0, '', 0),
(422, 'Thành phố Tân An ', 40, 1, 0, '', 0),
(423, 'Huyện Tân Hưng ', 40, 1, 0, '', 0),
(424, 'Huyện Tân Thạnh ', 40, 1, 0, '', 0),
(425, 'Huyện Tân Trụ ', 40, 1, 0, '', 0),
(426, 'Huyện Thạnh Hóa ', 40, 1, 0, '', 0),
(427, 'Huyện Thủ Thừa ', 40, 1, 0, '', 0),
(428, 'Huyện Vĩnh Hưng ', 40, 1, 0, '', 0),
(429, 'Huyện Giao Thủy ', 23, 1, 0, '', 0),
(430, 'Huyện Hải Hậu ', 23, 1, 0, '', 0),
(431, 'Huyện Mỹ Lộc ', 23, 1, 0, '', 0),
(432, 'Thành phố Nam Định ', 23, 1, 0, '', 0),
(433, 'Huyện Nam Trực ', 23, 1, 0, '', 0),
(434, 'Huyện Nghĩa Hưng ', 23, 1, 0, '', 0),
(435, 'Huyện Trực Ninh ', 23, 1, 0, '', 0),
(436, 'Huyện Vụ Bản ', 23, 1, 0, '', 0),
(437, 'Huyện Xuân Trường ', 23, 1, 0, '', 0),
(438, 'Huyện Ý Yên ', 23, 1, 0, '', 0),
(439, 'Huyện Gia Viễn ', 42, 1, 0, '', 0),
(440, 'Huyện Kim Sơn ', 42, 1, 0, '', 0),
(441, 'Huyện Nho Quan', 42, 1, 0, '', 0),
(442, 'Thành phố Ninh Bình ', 42, 1, 0, '', 0),
(443, 'Thị xã Tam Điệp ', 42, 1, 0, '', 0),
(444, 'Huyện Ninh Sơn ', 43, 1, 0, '', 0),
(445, 'Thành phố Phan Rang-Tháp Chàm ', 43, 1, 0, '', 0),
(446, 'Huyện Anh Sơn ', 41, 1, 0, '', 0),
(447, 'Huyện Con Cuông ', 41, 1, 0, '', 0),
(448, 'Thị xã Cửa Lò ', 41, 1, 0, '', 0),
(449, 'Huyện Diễn Châu ', 41, 1, 0, '', 0),
(450, 'Huyện Đô Lương ', 41, 1, 0, '', 0),
(451, 'Huyện Hưng Nguyên ', 41, 1, 0, '', 0),
(452, 'Huyện Kỳ Sơn ', 41, 1, 0, '', 0),
(453, 'Huyện Nam Đàn ', 41, 1, 0, '', 0),
(454, 'Huyện Nghi Lộc ', 41, 1, 0, '', 0),
(455, 'Huyện Quỳ Hợp ', 41, 1, 0, '', 0),
(456, 'Huyện Quỳnh Lưu ', 41, 1, 0, '', 0),
(457, 'Huyện Tân Kỳ ', 41, 1, 0, '', 0),
(458, 'Thị xã Thái Hòa ', 41, 1, 0, '', 0),
(459, 'Huyện Thanh Chương ', 41, 1, 0, '', 0),
(460, 'Thành phố Vinh ', 41, 1, 0, '', 0),
(461, 'Huyện Yên Thành ', 41, 1, 0, '', 0),
(462, 'Huyện Đoan Hùng ', 44, 1, 0, '', 0),
(463, 'Huyện Hạ Hòa ', 44, 1, 0, '', 0),
(464, 'Huyện Lâm Thao ', 44, 1, 0, '', 0),
(465, 'Thị xã Phú Thọ', 44, 1, 0, '', 0),
(466, 'Huyện Thanh Ba ', 44, 1, 0, '', 0),
(467, 'Huyện Thanh Sơn ', 44, 1, 0, '', 0),
(468, 'Huyện Thanh Thủy ', 44, 1, 0, '', 0),
(469, 'Thành phố Việt Trì ', 44, 1, 0, '', 0),
(470, 'Huyện Yên Lập ', 44, 1, 0, '', 0),
(471, 'Thị xã Sông Cầu ', 45, 1, 0, '', 0),
(472, 'Huyện Tuy An ', 45, 1, 0, '', 0),
(473, 'Thành phố Tuy Hòa ', 45, 1, 0, '', 0),
(474, 'Huyện Bố Trạch ', 46, 1, 0, '', 0),
(475, 'Thành phố Đồng Hới ', 46, 1, 0, '', 0),
(476, 'Huyện Lệ Thủy ', 46, 1, 0, '', 0),
(477, 'Huyện Điện Bàn ', 47, 1, 0, '', 0),
(478, 'Thành phố Hội An ', 47, 1, 0, '', 0),
(479, 'Huyện Núi Thành ', 47, 1, 0, '', 0),
(480, 'Huyện Phú Ninh ', 47, 1, 0, '', 0),
(481, 'Thành phố Tam Kỳ ', 47, 1, 0, '', 0),
(482, 'Huyện Thăng Bình ', 47, 1, 0, '', 0),
(483, 'Huyện Tiên Phước ', 47, 1, 0, '', 0),
(484, 'Huyện Ba Chẽ ', 21, 1, 0, '', 0),
(485, 'Huyện Bình Liêu ', 21, 1, 0, '', 0),
(486, 'Thị xã Cẩm Phả ', 21, 1, 0, '', 0),
(487, 'Huyện đảo Cô Tô ', 21, 1, 0, '', 0),
(488, 'Huyện Đầm Hà ', 21, 1, 0, '', 0),
(489, 'Huyện Đông Triều ', 21, 1, 0, '', 0),
(490, 'Thành phố Hạ Long ', 21, 1, 0, '', 0),
(491, 'Huyện Hoành Bồ ', 21, 1, 0, '', 0),
(492, 'Thành phố Móng Cái ', 21, 1, 0, '', 0),
(493, 'Huyện Tiên Yên ', 21, 1, 0, '', 0),
(494, 'Thành phố Uông Bí ', 21, 1, 0, '', 0),
(495, 'Huyện Yên Hưng ', 21, 1, 0, '', 0),
(496, 'Huyện Ba Tơ ', 48, 1, 0, '', 0),
(497, 'Huyện Đức Phổ ', 48, 1, 0, '', 0),
(498, 'Huyện đảo Lý Sơn ', 48, 1, 0, '', 0),
(499, 'Huyện Minh Long ', 48, 1, 0, '', 0),
(500, 'Huyện Mộ Đức ', 48, 1, 0, '', 0),
(501, 'Thành phố Quảng Ngãi ', 48, 1, 0, '', 0),
(502, 'Huyện Sơn Hà ', 48, 1, 0, '', 0),
(503, 'Huyện Sơn Tịnh ', 48, 1, 0, '', 0),
(504, 'Huyện Trà Bồng ', 48, 1, 0, '', 0),
(505, 'Huyện Cam Lộ ', 49, 1, 0, '', 0),
(506, 'Huyện đảo Cồn Cỏ ', 49, 1, 0, '', 0),
(507, 'Huyện Đa Krông ', 49, 1, 0, '', 0),
(508, 'Thành phố Đông Hà ', 49, 1, 0, '', 0),
(509, 'Huyện Gio Linh ', 49, 1, 0, '', 0),
(510, 'Huyện Hải Lăng ', 49, 1, 0, '', 0),
(511, 'Thị xã Quảng Trị ', 49, 1, 0, '', 0),
(512, 'Huyện Vĩnh Linh ', 49, 1, 0, '', 0),
(513, 'Huyện Cù Lao Dung ', 50, 1, 0, '', 0),
(514, 'Huyện Kế Sách ', 50, 1, 0, '', 0),
(515, 'Huyện Long Phú ', 50, 1, 0, '', 0),
(516, 'Huyện Mỹ Tú ', 50, 1, 0, '', 0),
(517, 'Huyện Mỹ Xuyên ', 50, 1, 0, '', 0),
(518, 'Huyện Ngã Năm ', 50, 1, 0, '', 0),
(519, 'Thành phố Sóc Trăng ', 50, 1, 0, '', 0),
(520, 'Huyện Thạnh Trị ', 50, 1, 0, '', 0),
(521, 'Huyện Vĩnh Châu ', 50, 1, 0, '', 0),
(522, 'Huyện Châu Thành ', 50, 1, 0, '', 0),
(523, 'Huyện Bắc Yên ', 51, 1, 0, '', 0),
(524, 'Huyện Mộc Châu ', 51, 1, 0, '', 0),
(525, 'Huyện Phù Yên ', 51, 1, 0, '', 0),
(526, 'Huyện Quỳnh Nhai ', 51, 1, 0, '', 0),
(527, 'Huyện Sông Mã ', 51, 1, 0, '', 0),
(528, 'Huyện Sốp Cộp ', 51, 1, 0, '', 0),
(529, 'Thành phố Sơn La ', 51, 1, 0, '', 0),
(530, 'Huyện Thuận Châu ', 51, 1, 0, '', 0),
(531, 'Huyện Yên Châu ', 51, 1, 0, '', 0),
(532, 'Huyện Bến Cầu ', 52, 1, 0, '', 0),
(533, 'Huyện Châu Thành ', 52, 1, 0, '', 0),
(534, 'Huyện Dương Minh Châu ', 52, 1, 0, '', 0),
(535, 'Huyện Gò Dầu ', 52, 1, 0, '', 0),
(536, 'Huyện Hòa Thành ', 52, 1, 0, '', 0),
(537, 'Huyện Tân Biên ', 52, 1, 0, '', 0),
(538, 'Huyện Tân Châu ', 52, 1, 0, '', 0),
(539, 'Thị xã Tây Ninh ', 52, 1, 0, '', 0),
(540, 'Huyện Trảng Bàng ', 52, 1, 0, '', 0),
(541, 'Huyện Cai Lậy ', 56, 1, 0, '', 0),
(542, 'Huyện Cái Bè ', 56, 1, 0, '', 0),
(543, 'Huyện Chợ Gạo ', 56, 1, 0, '', 0),
(544, 'Thị xã Gò Công ', 56, 1, 0, '', 0),
(545, 'Thành phố Mỹ Tho ', 56, 1, 0, '', 0),
(546, 'Huyện Tân Phước ', 56, 1, 0, '', 0),
(547, 'Huyện Chiêm Hóa ', 58, 1, 0, '', 0),
(548, 'Huyện Hàm Yên ', 58, 1, 0, '', 0),
(549, 'Huyện Na Hang ', 58, 1, 0, '', 0),
(550, 'Huyện Sơn Dương ', 58, 1, 0, '', 0),
(551, 'Thành phố Tuyên Quang ', 58, 1, 0, '', 0),
(552, 'Huyện Yên Sơn ', 58, 1, 0, '', 0),
(553, 'Huyện Đông Hưng ', 53, 1, 0, '', 0),
(554, 'Huyện Hưng Hà ', 53, 1, 0, '', 0),
(555, 'Huyện Kiến Xương ', 53, 1, 0, '', 0),
(556, 'Huyện Quỳnh Phụ ', 53, 1, 0, '', 0),
(557, 'Thành phố Thái Bình ', 53, 1, 0, '', 0),
(558, 'Huyện Thái Thụy ', 53, 1, 0, '', 0),
(559, 'Huyện Tiền Hải ', 53, 1, 0, '', 0),
(560, 'Huyện Vũ Thư ', 53, 1, 0, '', 0),
(561, 'Huyện Đại Từ ', 54, 1, 0, '', 0),
(562, 'Huyện Đồng Hỷ ', 54, 1, 0, '', 0),
(563, 'Thị xã Sông Công ', 54, 1, 0, '', 0),
(564, 'Thành phố Thái Nguyên ', 54, 1, 0, '', 0),
(565, 'Huyện Bá Thước ', 55, 1, 0, '', 0),
(566, 'Thị xã Bỉm Sơn', 55, 1, 0, '', 0),
(567, 'Huyện Cẩm Thủy ', 55, 1, 0, '', 0),
(568, 'Huyện Hà Trung ', 55, 1, 0, '', 0),
(569, 'Huyện Hậu Lộc ', 55, 1, 0, '', 0),
(570, 'Huyện Hoằng Hóa ', 55, 1, 0, '', 0),
(571, 'Huyện Lang Chánh ', 55, 1, 0, '', 0),
(572, 'Huyện Mường Lát ', 55, 1, 0, '', 0),
(573, 'Huyện Nga Sơn ', 55, 1, 0, '', 0),
(574, 'Huyện Ngọc Lặc ', 55, 1, 0, '', 0),
(575, 'Huyện Nông Cống ', 55, 1, 0, '', 0),
(576, 'Huyện Quan Hóa ', 55, 1, 0, '', 0),
(577, 'Huyện Quan Sơn ', 55, 1, 0, '', 0),
(578, 'Huyện Quảng Xương ', 55, 1, 0, '', 0),
(579, 'Thị xã Sầm Sơn ', 55, 1, 0, '', 0),
(580, 'Huyện Thạch Thành ', 55, 1, 0, '', 0),
(581, 'Thành phố Thanh Hóa ', 55, 1, 0, '', 0),
(582, 'Huyện Thiệu Hóa ', 55, 1, 0, '', 0),
(583, 'Huyện Thọ Xuân ', 55, 1, 0, '', 0),
(584, 'Huyện Thường Xuân ', 55, 1, 0, '', 0),
(585, 'Huyện Tĩnh Gia ', 55, 1, 0, '', 0),
(586, 'Huyện Triệu Sơn ', 55, 1, 0, '', 0),
(587, 'Huyện Vĩnh Lộc ', 55, 1, 0, '', 0),
(588, 'Huyện Yên Định ', 55, 1, 0, '', 0),
(589, 'Huyện Càng Long ', 57, 1, 0, '', 0),
(590, 'Huyện Cầu Kè ', 57, 1, 0, '', 0),
(591, 'Huyện Cầu Ngang ', 57, 1, 0, '', 0),
(592, 'Huyện Châu Thành ', 57, 1, 0, '', 0),
(593, 'Huyện Duyên Hải ', 57, 1, 0, '', 0),
(594, 'Huyện Tiểu Cần ', 57, 1, 0, '', 0),
(595, 'Huyện Trà Cú ', 57, 1, 0, '', 0),
(596, 'Thành phố Trà Vinh ', 57, 1, 0, '', 0),
(597, 'Huyện Bình Minh ', 59, 1, 0, '', 0),
(598, 'Huyện Bình Tân ', 59, 1, 0, '', 0),
(599, 'Huyện Long Hồ ', 59, 1, 0, '', 0),
(600, 'Huyện Mang Thít ', 59, 1, 0, '', 0),
(601, 'Huyện Tam Bình ', 59, 1, 0, '', 0),
(602, 'Huyện Trà Ôn ', 59, 1, 0, '', 0),
(603, 'Thành phố Vĩnh Long ', 59, 1, 0, '', 0),
(604, 'Huyện Vũng Liêm ', 59, 1, 0, '', 0),
(605, 'Huyện Bình Xuyên ', 60, 1, 0, '', 0),
(606, 'Huyện Lập Thạch ', 60, 1, 0, '', 0),
(607, 'Thị xã Phúc Yên ', 60, 1, 0, '', 0),
(608, 'Huyện Vĩnh Tường ', 60, 1, 0, '', 0),
(609, 'Thành phố Vĩnh Yên ', 60, 1, 0, '', 0),
(610, 'Huyện Yên Lạc ', 60, 1, 0, '', 0),
(611, 'Huyện Tam Đảo ', 60, 1, 0, '', 0),
(612, 'Huyện Mù Căng Chải ', 61, 1, 0, '', 0),
(613, 'Thị xã Nghĩa Lộ ', 61, 1, 0, '', 0),
(614, 'Huyện Trạm Tấu ', 61, 1, 0, '', 0),
(615, 'Thành phố Yên Bái ', 61, 1, 0, '', 0),
(616, 'Huyện Yên Bình ', 61, 1, 0, '', 0),
(617, 'Huyện Điện Biên ', 71, 1, 0, '', 0),
(618, 'Huyện Điện Biên Đông ', 71, 1, 0, '', 0),
(619, 'Thành phố Điện Biên Phủ ', 71, 1, 0, '', 0),
(620, 'Huyện Mường Ảng ', 71, 1, 0, '', 0),
(621, 'Huyện Mường Chà ', 71, 1, 0, '', 0),
(622, 'Thị xã Mường Lay ', 71, 1, 0, '', 0),
(623, 'Huyện Mường Nhé ', 71, 1, 0, '', 0),
(624, 'Huyện Tủa Chùa ', 71, 1, 0, '', 0),
(625, 'Huyện Tuần Giáo ', 71, 1, 0, '', 0),
(626, 'Huyện Đông Anh', 2, 1, 0, '', 0),
(627, 'Thành phố Huế', 19, 1, 0, '', 0),
(628, 'Huyện Cần Giờ', 3, 1, 0, '', 0),
(629, 'Huyện Củ Chi', 3, 1, 0, '', 0),
(630, 'Huyện Vân Đồn', 21, 1, 0, '', 0),
(631, 'Huyện Hiệp Hòa', 7, 1, 0, '', 0),
(632, 'Huyện Lạng Giang', 7, 1, 0, '', 0),
(633, 'Huyện Việt Yên', 7, 1, 0, '', 0),
(634, 'Huyện Ba Bể', 14, 1, 0, '', 0),
(635, 'Huyện Bạch Thông ', 14, 1, 0, '', 0),
(636, 'Huyện Chợ Đồn', 14, 1, 0, '', 0),
(637, 'Huyện Pác Nặm ', 14, 1, 0, '', 0),
(638, 'Huyện Lương Tài', 6, 1, 0, '', 0),
(639, 'Huyện Mỏ Cày Bắc ', 13, 1, 0, '', 0),
(640, 'Huyện Hoài Ân ', 9, 1, 0, '', 0),
(641, 'Huyện Bù Đốp ', 10, 1, 0, '', 0),
(642, 'Huyện Chơn Thành', 10, 1, 0, '', 0),
(643, 'Huyện Đồng Phú ', 10, 1, 0, '', 0),
(644, 'Huyện Hớn Quản', 10, 1, 0, '', 0),
(645, 'Huyện Bắc Bình ', 11, 1, 0, '', 0),
(646, 'Huyện Đức Linh', 11, 1, 0, '', 0),
(647, 'Huyện Hàm Thuận Bắc', 11, 1, 0, '', 0),
(648, 'Huyện Hàm Thuận Nam', 11, 1, 0, '', 0),
(649, 'Huyện đảo Phú Quý', 11, 1, 0, '', 0),
(650, 'Huyện Tánh Linh', 11, 1, 0, '', 0),
(651, 'Huyện Thới Lai ', 15, 1, 0, '', 0),
(652, 'Huyện Hà Quảng', 25, 1, 0, '', 0),
(653, 'Huyện Hạ Lang ', 25, 1, 0, '', 0),
(654, 'Huyện Hòa An', 25, 1, 0, '', 0),
(655, 'Huyện Phục Hòa', 25, 1, 0, '', 0),
(656, 'Huyện Thạch An', 25, 1, 0, '', 0),
(657, 'Huyện Hòa Vang', 65, 1, 0, '', 0),
(658, 'Huyện Cư Mgar ', 62, 1, 0, '', 0),
(659, 'Huyện Lăk', 62, 1, 0, '', 0),
(660, 'Huyện Cư Jút ', 67, 1, 0, '', 0),
(661, 'Huyện Krông Nô', 67, 1, 0, '', 0),
(662, 'Huyện Chư Păh', 26, 1, 0, '', 0),
(663, 'Huyện Đắk Pơ', 26, 1, 0, '', 0),
(664, 'Huyện Ia Grai ', 26, 1, 0, '', 0),
(665, 'Huyện Ia Pa ', 26, 1, 0, '', 0),
(666, 'Huyện Bắc Mê ', 27, 1, 0, '', 0),
(667, 'Huyện Bắc Quang ', 27, 1, 0, '', 0),
(668, 'Huyện Hoàng Su Phì ', 27, 1, 0, '', 0),
(669, 'Huyện Quang Bình', 27, 1, 0, '', 0),
(670, 'Huyện Thanh Liêm ', 28, 1, 0, '', 0),
(671, 'Huyện Lộc Hà ', 30, 1, 0, '', 0),
(672, 'Huyện An Lão ', 32, 1, 0, '', 0),
(673, 'Huyện đảo Bạch Long Vĩ', 32, 1, 0, '', 0),
(674, 'Huyện Thuỷ Nguyên ', 32, 1, 0, '', 0),
(675, 'Huyện Kỳ Sơn ', 33, 1, 0, '', 0),
(676, 'Huyện Kim Động ', 34, 1, 0, '', 0),
(677, 'Huyện Phù Cừ ', 34, 1, 0, '', 0),
(678, 'Huyện Tiên Lữ ', 34, 1, 0, '', 0),
(679, 'Huyện đảo Trường Sa', 17, 1, 0, '', 0),
(680, 'Huyện Cam Lâm ', 17, 1, 0, '', 0),
(681, 'Huyện đảo Kiên Hải ', 35, 1, 0, '', 0),
(682, 'Huyện Giang Thành', 35, 1, 0, '', 0),
(683, 'Thành phố Kon Tum', 36, 1, 0, '', 0),
(684, 'Huyện Ngọc Hồi', 36, 1, 0, '', 0),
(685, 'Huyện Tân Uyên', 37, 1, 0, '', 0),
(686, 'Huyện Cát Tiên ', 38, 1, 0, '', 0),
(687, 'Huyện Đạ Huoai ', 38, 1, 0, '', 0),
(688, 'Huyện Đam Rông ', 38, 1, 0, '', 0),
(689, 'huyện Đơn Dương ', 38, 1, 0, '', 0),
(690, 'Huyện Đức Trọng ', 38, 1, 0, '', 0),
(691, 'Huyện Cao Lộc', 39, 1, 0, '', 0),
(692, 'huyện Tràng Định ', 39, 1, 0, '', 0),
(693, 'Huyện Văn Lãng', 39, 1, 0, '', 0),
(694, 'Huyện Bảo Thắng ', 20, 1, 0, '', 0),
(695, 'Huyện Bảo Yên', 20, 1, 0, '', 0),
(696, 'Huyện Nghĩa Đàn ', 41, 1, 0, '', 0),
(697, 'Huyện Quế Phong ', 41, 1, 0, '', 0),
(698, 'Huyện Quỳ Châu ', 41, 1, 0, '', 0),
(699, 'Huyện Tương Dương ', 41, 1, 0, '', 0),
(700, 'Huyện Hoa Lư ', 42, 1, 0, '', 0),
(701, 'Huyện Yên Khánh ', 42, 1, 0, '', 0),
(702, 'Huyện Yên Mô ', 42, 1, 0, '', 0),
(703, 'Huyện Bác Ái ', 43, 1, 0, '', 0),
(704, 'Huyện Ninh Hải', 43, 1, 0, '', 0),
(705, 'Huyện Ninh Phước ', 43, 1, 0, '', 0),
(706, 'Huyện Thuận Bắc', 43, 1, 0, '', 0),
(707, 'Huyện Thuận Nam ', 43, 1, 0, '', 0),
(708, 'Huyện Phù Ninh ', 44, 1, 0, '', 0),
(709, 'Huyện Tam Nông', 44, 1, 0, '', 0),
(710, 'Huyện Tân Sơn', 44, 1, 0, '', 0),
(711, 'Huyện Cẩm Khê', 44, 1, 0, '', 0),
(712, 'Huyện Đông Hòa ', 45, 1, 0, '', 0),
(713, 'Huyện Đồng Xuân', 45, 1, 0, '', 0),
(714, 'Huyện Phú Hòa', 45, 1, 0, '', 0),
(715, 'Huyện Sông Hinh', 45, 1, 0, '', 0),
(716, 'Huyện Sơn Hòa', 45, 1, 0, '', 0),
(717, 'Huyện Tây Hòa', 45, 1, 0, '', 0),
(718, 'Huyện Minh Hóa ', 46, 1, 0, '', 0),
(719, 'Huyện Quảng Ninh', 46, 1, 0, '', 0),
(720, 'Huyện Quảng Trạch ', 46, 1, 0, '', 0),
(721, 'Huyện Tuyên Hóa', 46, 1, 0, '', 0),
(722, 'Huyện Nam Trà My ', 47, 1, 0, '', 0),
(723, 'Huyện Bắc Trà My ', 47, 1, 0, '', 0),
(724, 'Huyện Duy Xuyên', 47, 1, 0, '', 0),
(725, 'Huyện Đại Lộc', 47, 1, 0, '', 0),
(726, 'Huyện Đông Giang', 47, 1, 0, '', 0),
(727, 'Huyện Hiệp Đức ', 47, 1, 0, '', 0),
(728, 'Huyện Nam Giang ', 47, 1, 0, '', 0),
(729, 'Huyện Phước Sơn', 47, 1, 0, '', 0),
(730, 'Huyện Quế Sơn', 47, 1, 0, '', 0),
(731, 'Huyện Tây Giang', 47, 1, 0, '', 0),
(732, 'Huyện Nông Sơn', 47, 1, 0, '', 0),
(733, 'Huyện Bình Sơn ', 48, 1, 0, '', 0),
(734, 'Huyện Nghĩa Hành', 48, 1, 0, '', 0),
(735, 'Huyện Sơn Tây ', 48, 1, 0, '', 0),
(736, 'Huyện Tây Trà ', 48, 1, 0, '', 0),
(737, 'Huyện Tư Nghĩa ', 21, 1, 0, '', 0),
(738, 'Huyện Hải Hà ', 21, 1, 0, '', 0),
(739, 'Huyện Hướng Hóa ', 49, 1, 0, '', 0),
(740, 'Huyện Triệu Phong', 49, 1, 0, '', 0),
(741, 'Huyện Trần Đề', 50, 1, 0, '', 0),
(742, 'Huyện Mai Sơn', 51, 1, 0, '', 0),
(743, 'Huyện Mường La', 51, 1, 0, '', 0),
(744, 'Huyện Định Hóa', 54, 1, 0, '', 0),
(745, 'Huyện Phổ Yên ', 54, 1, 0, '', 0),
(746, 'Huyện Phú Bình', 54, 1, 0, '', 0),
(747, 'Huyện Phú Lương ', 54, 1, 0, '', 0),
(748, 'Huyện Võ Nhai', 54, 1, 0, '', 0),
(749, 'Huyện Đông Sơn ', 55, 1, 0, '', 0),
(750, 'Huyện Như Thanh', 55, 1, 0, '', 0),
(751, 'Huyện Như Xuân ', 55, 1, 0, '', 0),
(752, 'Huyện Châu Thành ', 56, 1, 0, '', 0),
(753, 'Huyện Gò Công Đông', 56, 1, 0, '', 0),
(754, 'Huyện Gò Công Tây', 56, 1, 0, '', 0),
(755, 'Huyện Tân Phú Đông', 56, 1, 0, '', 0),
(756, 'Huyện Bình Chánh ', 3, 1, 0, '', 0),
(757, 'Huyện Cần Giờ ', 3, 1, 0, '', 0),
(758, 'Huyện Cụ Chi', 3, 1, 0, '', 0),
(759, 'Huyện Hóc Môn ', 3, 1, 0, '', 0),
(760, 'Huyện Nhà Bè ', 3, 1, 0, '', 0),
(761, 'Huyện Lâm Bình', 58, 1, 0, '', 0),
(762, 'Huyện Sông Lô', 60, 1, 0, '', 0),
(763, 'Huyện Tam Dương', 60, 1, 0, '', 0),
(764, 'Huyện Lục Yên', 61, 1, 0, '', 0),
(765, 'Huyện Trấn Yên', 61, 1, 0, '', 0),
(766, 'Huyện Văn Chấn', 61, 1, 0, '', 0),
(767, 'Huyện Văn Yên ', 61, 1, 0, '', 0),
(768, 'Thị xã Sơn Tây', 2, 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ips`
--

CREATE TABLE `ips` (
  `id` int(10) UNSIGNED NOT NULL,
  `start` double NOT NULL,
  `end` double NOT NULL,
  `type` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ips`
--

INSERT INTO `ips` (`id`, `start`, `end`, `type`) VALUES
(1, 20185088, 20447231, 'VN'),
(2, 234885120, 234889215, 'VN'),
(3, 245366784, 247463935, 'VN'),
(4, 249561088, 251658239, 'VN'),
(5, 452987904, 452988927, 'VN'),
(6, 453115904, 453246975, 'VN'),
(7, 457179136, 458227711, 'VN'),
(8, 460722176, 460726271, 'VN'),
(9, 704724992, 704741375, 'VN'),
(10, 710934528, 710950911, 'VN'),
(11, 711983104, 712507391, 'VN'),
(12, 774162643, 774162647, 'VN'),
(13, 832320512, 832321535, 'VN'),
(14, 836059136, 836075519, 'VN'),
(15, 837603328, 837604351, 'VN'),
(16, 838238208, 838262783, 'VN'),
(17, 985268224, 985399295, 'VN'),
(18, 1024188416, 1024196607, 'VN'),
(19, 1025302528, 1025310719, 'VN'),
(20, 1071298816, 1071299071, 'VN'),
(21, 1071299328, 1071299583, 'VN'),
(22, 1071301888, 1071302143, 'VN'),
(23, 1697972224, 1697988607, 'VN'),
(24, 1700793344, 1700794367, 'VN'),
(25, 1700806656, 1700823039, 'VN'),
(26, 1700986880, 1701003263, 'VN'),
(27, 1728169984, 1728171007, 'VN'),
(28, 1728172032, 1728173055, 'VN'),
(29, 1728179200, 1728180223, 'VN'),
(30, 1728240640, 1728243711, 'VN'),
(31, 1728312320, 1728315391, 'VN'),
(32, 1728348160, 1728349183, 'VN'),
(33, 1728388608, 1728389119, 'VN'),
(34, 1728433152, 1728435199, 'VN'),
(35, 1728521216, 1728523263, 'VN'),
(36, 1728556032, 1728556287, 'VN'),
(37, 1728556544, 1728557055, 'VN'),
(38, 1728557312, 1728557567, 'VN'),
(39, 1728562176, 1728562431, 'VN'),
(40, 1728580864, 1728581119, 'VN'),
(41, 1728643072, 1728645119, 'VN'),
(42, 1728662528, 1728665599, 'VN'),
(43, 1728693248, 1728698367, 'VN'),
(44, 1728731136, 1728732159, 'VN'),
(45, 1728762880, 1728763903, 'VN'),
(46, 1728818176, 1728819199, 'VN'),
(47, 1728866304, 1728867327, 'VN'),
(48, 1728924672, 1728925695, 'VN'),
(49, 1729048576, 1729049599, 'VN'),
(50, 1729101824, 1729102847, 'VN'),
(51, 1729189888, 1729190911, 'VN'),
(52, 1729227776, 1729228799, 'VN'),
(53, 1729233920, 1729234943, 'VN'),
(54, 1729277952, 1729278975, 'VN'),
(55, 1729323008, 1729324031, 'VN'),
(56, 1729340416, 1729341439, 'VN'),
(57, 1729354752, 1729355775, 'VN'),
(58, 1729400832, 1729402879, 'VN'),
(59, 1729460224, 1729461247, 'VN'),
(60, 1729467392, 1729468415, 'VN'),
(61, 1729597440, 1729598463, 'VN'),
(62, 1729600512, 1729601535, 'VN'),
(63, 1729688576, 1729689599, 'VN'),
(64, 1729821696, 1729822719, 'VN'),
(65, 1729838080, 1729840127, 'VN'),
(66, 1729881472, 1729881599, 'VN'),
(67, 1729881856, 1729881983, 'VN'),
(68, 1729883136, 1729884159, 'VN'),
(69, 1729896448, 1729898495, 'VN'),
(70, 1729923072, 1729924095, 'VN'),
(71, 1729932288, 1729933311, 'VN'),
(72, 1730028544, 1730029567, 'VN'),
(73, 1730115584, 1730117631, 'VN'),
(74, 1730485248, 1730487295, 'VN'),
(75, 1730578432, 1730579455, 'VN'),
(76, 1730632704, 1730634751, 'VN'),
(77, 1730820096, 1730821119, 'VN'),
(78, 1742776320, 1742777343, 'VN'),
(79, 1742859264, 1742860287, 'VN'),
(80, 1742892032, 1742893055, 'VN'),
(81, 1742927872, 1742928895, 'VN'),
(82, 1742958592, 1742959615, 'VN'),
(83, 1742985216, 1742986239, 'VN'),
(84, 1743000576, 1743001599, 'VN'),
(85, 1743071232, 1743072255, 'VN'),
(86, 1743110144, 1743111167, 'VN'),
(87, 1743229952, 1743230975, 'VN'),
(88, 1743270912, 1743273983, 'VN'),
(89, 1743288320, 1743289343, 'VN'),
(90, 1743335424, 1743336447, 'VN'),
(91, 1743397888, 1743398911, 'VN'),
(92, 1743411200, 1743412223, 'VN'),
(93, 1743507456, 1743509503, 'VN'),
(94, 1743600640, 1743602687, 'VN'),
(95, 1743609856, 1743610879, 'VN'),
(96, 1743622144, 1743624191, 'VN'),
(97, 1743668224, 1743672319, 'VN'),
(98, 1743704064, 1743706111, 'VN'),
(99, 1743724544, 1743725567, 'VN'),
(100, 1743746048, 1743748095, 'VN'),
(101, 1743910912, 1743911935, 'VN'),
(102, 1743926272, 1743927295, 'VN'),
(103, 1744005120, 1744006143, 'VN'),
(104, 1744033792, 1744034815, 'VN'),
(105, 1744078848, 1744079871, 'VN'),
(106, 1744147456, 1744148479, 'VN'),
(107, 1744172032, 1744175103, 'VN'),
(108, 1744201728, 1744201983, 'VN'),
(109, 1744231424, 1744232447, 'VN'),
(110, 1744347136, 1744349183, 'VN'),
(111, 1744376832, 1744377855, 'VN'),
(112, 1744397312, 1744398335, 'VN'),
(113, 1744443392, 1744444415, 'VN'),
(114, 1744568320, 1744569343, 'VN'),
(115, 1744632832, 1744633855, 'VN'),
(116, 1744656384, 1744657407, 'VN'),
(117, 1744702464, 1744704511, 'VN'),
(118, 1744709632, 1744710655, 'VN'),
(119, 1744754688, 1744755711, 'VN'),
(120, 1744786432, 1744787455, 'VN'),
(121, 1744825344, 1744826367, 'VN'),
(122, 1847803904, 1847807999, 'VN'),
(123, 1848424448, 1848426495, 'VN'),
(124, 1866592256, 1866596351, 'VN'),
(125, 1868294144, 1868295167, 'VN'),
(126, 1883783168, 1883799551, 'VN'),
(127, 1884160000, 1884164095, 'VN'),
(128, 1886214144, 1886216191, 'VN'),
(129, 1888059392, 1888063487, 'VN'),
(130, 1891958784, 1892024319, 'VN'),
(131, 1893027840, 1893031935, 'VN'),
(132, 1897160704, 1897168895, 'VN'),
(133, 1897267200, 1897365503, 'VN'),
(134, 1899241472, 1899249663, 'VN'),
(135, 1899850752, 1899851775, 'VN'),
(136, 1906311168, 1908408319, 'VN'),
(137, 1934098432, 1934622719, 'VN'),
(138, 1934929920, 1934931967, 'VN'),
(139, 1938978816, 1938980863, 'VN'),
(140, 1940234240, 1940236287, 'VN'),
(141, 1950646272, 1950648319, 'VN'),
(142, 1952448512, 1953497087, 'VN'),
(143, 1953890304, 1953923071, 'VN'),
(144, 1958821888, 1958825983, 'VN'),
(145, 1960058880, 1960067071, 'VN'),
(146, 1962934272, 1963458559, 'VN'),
(147, 1969733632, 1969750015, 'VN'),
(148, 1970929664, 1970962431, 'VN'),
(149, 1984167936, 1984430079, 'VN'),
(150, 1986396160, 1986398207, 'VN'),
(151, 1986740224, 1986756607, 'VN'),
(152, 1997512704, 1997520895, 'VN'),
(153, 1997651968, 1997668351, 'VN'),
(154, 1997701120, 1997705215, 'VN'),
(155, 1997715456, 1997717503, 'VN'),
(156, 2001895424, 2001899519, 'VN'),
(157, 2016589824, 2016591871, 'VN'),
(158, 2018004992, 2018007039, 'VN'),
(159, 2018009088, 2018017279, 'VN'),
(160, 2022326272, 2022330367, 'VN'),
(161, 2053533696, 2053534719, 'VN'),
(162, 2055274496, 2055290879, 'VN'),
(163, 2059995136, 2059997183, 'VN'),
(164, 2064646144, 2065694719, 'VN'),
(165, 2090663936, 2090680319, 'VN'),
(166, 2090729472, 2090733567, 'VN'),
(167, 2100953088, 2100969471, 'VN'),
(168, 2111078400, 2111111167, 'VN'),
(169, 2111176704, 2111193087, 'VN'),
(170, 2112487424, 2112618495, 'VN'),
(171, 2113761280, 2113765375, 'VN'),
(172, 2617176832, 2617177087, 'VN'),
(173, 2883584000, 2885681151, 'VN'),
(174, 2899116032, 2899148799, 'VN'),
(175, 2928175552, 2928175559, 'VN'),
(176, 2942779392, 2942795775, 'VN'),
(177, 2942959616, 2942960639, 'VN'),
(178, 3025993728, 3026059263, 'VN'),
(179, 3029598208, 3029600255, 'VN'),
(180, 3029630976, 3029635071, 'VN'),
(181, 3033984000, 3033985023, 'VN'),
(182, 3064025088, 3064029183, 'VN'),
(183, 3068948480, 3068949503, 'VN'),
(184, 3068990464, 3068991487, 'VN'),
(185, 3075473408, 3075571711, 'VN'),
(186, 3076169728, 3076171775, 'VN'),
(187, 3076194304, 3076202495, 'VN'),
(188, 3076235264, 3076243455, 'VN'),
(189, 3237869952, 3237870079, 'VN'),
(190, 3389017856, 3389018111, 'VN'),
(191, 3389302784, 3389303039, 'VN'),
(192, 3389304832, 3389305087, 'VN'),
(193, 3389391360, 3389391615, 'VN'),
(194, 3389415424, 3389415935, 'VN'),
(195, 3389607680, 3389608191, 'VN'),
(196, 3389608960, 3389609215, 'VN'),
(197, 3391444480, 3391444991, 'VN'),
(198, 3391843328, 3391844351, 'VN'),
(199, 3391916288, 3391916543, 'VN'),
(200, 3392100096, 3392100351, 'VN'),
(201, 3392114176, 3392114431, 'VN'),
(202, 3392415488, 3392415743, 'VN'),
(203, 3392635904, 3392636927, 'VN'),
(204, 3392682240, 3392682495, 'VN'),
(205, 3392861440, 3392861695, 'VN'),
(206, 3392925184, 3392925695, 'VN'),
(207, 3392928768, 3392929279, 'VN'),
(208, 3392956416, 3392958463, 'VN'),
(209, 3393861632, 3393861887, 'VN'),
(210, 3393862144, 3393862655, 'VN'),
(211, 3394166784, 3394168831, 'VN'),
(212, 3394234368, 3394236415, 'VN'),
(213, 3394753536, 3394754559, 'VN'),
(214, 3395027968, 3395028991, 'VN'),
(215, 3395132416, 3395133439, 'VN'),
(216, 3395179008, 3395179263, 'VN'),
(217, 3395180544, 3395181055, 'VN'),
(218, 3397176320, 3397176575, 'VN'),
(219, 3397526528, 3397527039, 'VN'),
(220, 3397783552, 3397785599, 'VN'),
(221, 3397793280, 3397793535, 'VN'),
(222, 3398934528, 3398938623, 'VN'),
(223, 3399414784, 3399415807, 'VN'),
(224, 3399515136, 3399515647, 'VN'),
(225, 3400270848, 3400271359, 'VN'),
(226, 3401529344, 3401530367, 'VN'),
(227, 3406331648, 3406331903, 'VN'),
(228, 3406343168, 3406343423, 'VN'),
(229, 3408039936, 3408040191, 'VN'),
(230, 3410866688, 3410866943, 'VN'),
(231, 3410959360, 3410959615, 'VN'),
(232, 3411643392, 3411644415, 'VN'),
(233, 3412326400, 3412327423, 'VN'),
(234, 3413213184, 3413229567, 'VN'),
(235, 3413575680, 3413576703, 'VN'),
(236, 3413582848, 3413583871, 'VN'),
(237, 3413584896, 3413585919, 'VN'),
(238, 3413588480, 3413593087, 'VN'),
(239, 3414224896, 3414226943, 'VN'),
(240, 3416260608, 3416261119, 'VN'),
(241, 3416285184, 3416287231, 'VN'),
(242, 3416371712, 3416371967, 'VN'),
(243, 3416391680, 3416457215, 'VN'),
(244, 3416489984, 3416506367, 'VN'),
(245, 3416922624, 3416923135, 'VN'),
(246, 3416985600, 3416989695, 'VN'),
(247, 3417350144, 3417352191, 'VN'),
(248, 3418168320, 3418169343, 'VN'),
(249, 3418267648, 3418271743, 'VN'),
(250, 3418294272, 3418296319, 'VN'),
(251, 3418304512, 3418306559, 'VN'),
(252, 3418554368, 3418570751, 'VN'),
(253, 3418961920, 3418962943, 'VN'),
(254, 3419209728, 3419226111, 'VN'),
(255, 3419517952, 3419518975, 'VN'),
(256, 3419570176, 3419602943, 'VN'),
(257, 3464342288, 3464342295, 'VN'),
(258, 3523362816, 3523379199, 'VN'),
(259, 3528908800, 3528912895, 'VN'),
(260, 3537068032, 3537076223, 'VN'),
(261, 3539271680, 3539304447, 'VN'),
(262, 3663989248, 3663989503, 'VN'),
(263, 3663990272, 3663990527, 'VN'),
(264, 3664002048, 3664002303, 'VN'),
(265, 3706142720, 3706159103, 'VN'),
(266, 3715694592, 3715710975, 'VN'),
(267, 3716415488, 3716431871, 'VN'),
(268, 3716481024, 3716489215, 'VN'),
(269, 3741057024, 3741319167, 'VN'),
(270, 3743115264, 3743117311, 'VN');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_07_03_112021_entrust_setup_tables', 2),
('2015_07_23_051216_create_setting_table', 3),
('2015_08_17_164944_create_posts_table', 4),
('2015_09_07_181732_edit_table_products_add_column_keyword', 5),
('2015_09_08_173541_create_table_domains', 5),
('2015_09_09_182534_edit_domain_table', 6),
('2015_09_10_171843_create_price_rules_table', 7),
('2015_09_11_173648_create_product_prices_table', 7),
('2015_09_11_175016_edit_price_rules_table', 8),
('2015_09_14_161108_product_videos', 9),
('2015_09_18_231820_edit_product_prices_table', 10),
('2015_10_06_232222_alert_table_sms_add_column_mode', 11),
('2015_10_18_233422_create_table_brands', 11),
('2015_10_27_164330_product_created_at', 12),
('2015_10_27_232229_product_images', 13),
('2015_10_31_102406_alter_post_add_post_category_201510311023', 13),
('2015_11_02_013925_alter_table_products_add_images_20151102', 13),
('2015_11_03_053056_alter_product_add_hot_20151103', 13),
('2015_11_04_093746_alter_product_prices_add_brand_20151104', 13),
('2015_11_09_071300_create_table_post_categories', 14),
('2015_11_09_100442_alter_table_post_add_post_type', 14),
('2015_11_18_065205_create_table_banner', 15),
('2015_11_28_062935_create_table_events', 16),
('2015_11_30_101535_craete_table_sites', 17),
('2015_12_04_063129_alter_table_event_add_column_extra', 18),
('2015_12_04_100005_alter_table_event_add_column_shop_name_and_product_price_id', 18),
('2015_12_28_110211_create_table_product_likes', 19),
('2016_01_04_222235_create_table_questions', 20),
('2016_01_04_222251_create_table_answers', 20),
('2016_01_11_163518_create_table_tags', 21),
('2016_01_11_174245_alter_table_sites_add_column_logo', 21),
('2016_01_11_225903_alter_table_sites_add_column_hot', 21),
('2016_01_18_101546_create_table_tags_positions', 22),
('2016_01_20_103124_create_table_site_xpaths', 23),
('2016_01_20_103148_create_table_site_links', 23),
('2016_01_26_221555_alter_table_posts_add_column_has_image_content', 24),
('2016_01_31_112843_alter_table_posts_add_has_image', 25),
('2016_02_15_141100_alter_table_product_add_keyword_except', 26),
('2016_02_20_111326_alter_table_products_add_column_is_banner', 27),
('2016_02_21_185640_alter_table_site_add_some_column', 27),
('2016_02_25_143112_alter_table_products_add_meta_seo', 28),
('2016_02_25_162625_alter_table_products_add_keywor_post_rate', 28),
('2016_02_25_205503_alter_table_sites_add_alias', 28),
('2016_02_26_233823_alter_table_sites_add_email', 28),
('2016_02_27_100858_alter_table_posts_add_column_views', 29),
('2016_02_27_180226_alter_table_products_add_column_video_keywords', 29),
('2016_02_29_093548_create_table_wrong_prices', 30),
('2016_03_02_112105_alter_table_product_prices_add_column_crawled_at', 31),
('2016_03_09_162026_alter_table_product_add_column_min_price', 32),
('2016_03_09_162756_alter_table_products_add_column_total_shop', 33),
('2016_03_10_113502_alter_table_products_add_column_is_crawl', 34),
('2016_03_11_135213_alter_table_products_add_column_tags', 35),
('2016_03_11_152049_alter_table_wrong_price_add_column_error_type', 35),
('2016_03_14_141207_alter_table_brands_add_column_total_product', 36),
('2016_03_18_134355_alter_table_post_add_column_tags', 37),
('2016_03_18_135525_alter_table_products_add_column_opponent', 37),
('2016_03_22_092023_create_table_rates', 38),
('2016_03_25_114501_atler_table_products_add_column_is_something', 39),
('2016_03_26_093002_alter_table_products_add_brand_id', 39),
('2016_03_26_111638_alter_table_prices_add_source_id', 39),
('2016_03_27_144833_alter_table_wrong_prices_add_columnn_updated', 40),
('2016_03_28_093331_create_table_classifields', 41),
('2016_03_29_112154_alter_table_brands_add_column_slug', 42),
('2016_04_05_151627_alter_table_site_links_add_comlums', 43),
('2016_04_06_150743_alter_table_product_prices_add_column_brand_id', 43),
('2016_04_07_105048_alter_table_sites_add_env_testing', 44),
('2016_04_08_113340_create_table_carlendar', 45),
('2016_04_11_101433_alter_table_site_metas_add_id', 46),
('2016_04_11_101615_alter_table_site_links_add_xpath_id', 46),
('2016_04_11_152429_alter_table_sites_add_column_total_links', 47),
('2016_04_13_104952_alter_table_site_links_add_is_json_json_key', 48),
('2016_04_15_090437_alter_table_picture_add_active_field', 49),
('2016_04_15_162602_alter_table_site_add_column_env_quick', 50),
('2016_04_18_094855_alter_table_site_links_add_column_request_method', 51),
('2016_04_19_165252_alter_table_sites_add_column_allow_crawl', 52),
('2016_04_19_160721_create_table_kpi', 53),
('2016_04_21_133536_alter_table_kpis_float', 54),
('2016_04_21_134341_alter_table_kpis_add_column_day', 54),
('2016_04_21_141430_alter_table_kpis_add_column_page_view', 54),
('2016_04_21_152755_create_redirect_statistics', 54),
('2016_04_22_144445_alter_table_kpis_question_field', 55),
('2016_04_25_143739_alter_table_products_add_column_views', 56),
('2016_04_25_213131_create_table_product_views', 57),
('2016_04_26_143254_alter_table_products_add_column_rating_count_comment_count', 58),
('2016_04_27_110735_alter_products_add_column_display_score', 58),
('2016_04_28_152807_create_table_product_xpaths', 59),
('2016_04_28_153500_create_table_product_xlinks', 59),
('2016_05_03_131006_alter_table_site_metas_add_some_columns', 60),
('2016_05_03_141527_alter_table_site_links_add_columns_step_page', 60),
('2016_05_03_155128_alter_table_site_xpaths_add_column_cookie', 60),
('2016_05_05_110346_alter_table_site_links_add_column_param_page', 61),
('2016_05_05_155654_alter_table_product_prices_change_default_columns', 61),
('2016_05_05_162136_create_table_ads', 61),
('2016_05_05_163520_create_table_ads_ip', 61),
('2016_05_05_163935_create_table_ads_statistic', 61),
('2016_05_06_120354_alter_table_site_links_add_form_columns', 61),
('2016_05_07_100032_create_table_ads_register', 61),
('2016_05_09_090649_alter_table_product_xpaths_drop_some_columns', 61),
('2016_05_09_090853_alter_table_product_xlinks_add_form_header_some_columns', 61),
('2016_05_09_135609_alter_table_product_xpaths_add_column_link_item', 61),
('2016_05_10_100943_alter_table_product_xlinks_add_column_json_key', 61),
('2016_05_10_111324_alter_table_product_xplinks_add_column_request_method', 61),
('2016_05_11_100044_alter_table_product_xlinks_add_column_brand_id', 61),
('2016_05_11_101848_alter_table_product_xlinks_alter_step_page', 61),
('2016_05_11_103121_alter_table_product_xlinks_alter_response_type', 61),
('2016_05_12_111156_alter_table_ads_statistic_add_day_field', 62),
('2016_05_15_212212_alter_table_users_add_column_shop_id', 62),
('2016_05_16_091053_create_table_auctions', 62),
('2016_05_16_100712_create_table_transaction_histories', 62),
('2016_05_16_104318_alter_table_user_add_column_money', 62),
('2016_05_17_161641_create_table_auction_clicks', 62),
('2016_05_17_162017_create_table_auction_statistics', 62),
('2016_05_18_092138_alter_table_transaction_histories_add_column_admin_id', 62),
('2016_05_23_142152_create_table_auction_product_ignores', 62),
('2016_05_27_085522_create_table_posts_tags', 63),
('2016_05_27_085807_create_table_products_tags', 63),
('2016_05_30_140046_alter_table_tags_add_columns_metas', 64),
('2016_05_30_144404_create_table_videos_tags', 64),
('2016_05_31_105217_alter_table_tags_add_slug', 65),
('2016_05_31_155254_alter_table_brand_add_column_meta', 66),
('2016_06_04_090729_alter_table_classifield_add_column_content', 67),
('2016_06_04_111203_alter_table_classifields_add_many_columns', 67),
('2016_06_06_091957_create_table_price_histories', 67),
('2016_06_06_101320_create_table_product_price_hitories', 67),
('2016_06_06_103029_alter_table_products_add_column_avg_price', 67),
('2016_06_13_104245_alter_table_posts_add_column_static_time', 68),
('2016_06_13_150735_alter_table_sites_add_column_parent_id', 69),
('2016_06_14_093935_create_table_products_shops', 69),
('2016_06_14_095459_create_table_products_prices', 69),
('2016_06_14_152251_alter_table_sites_add_column_slug', 69),
('2016_06_15_171540_alter_table_products_add_column_new', 70),
('2016_06_29_162358_alter_table_add_column_has_change_price', 71),
('2016_06_29_170211_create_table_products_posts', 71),
('2016_06_29_173431_alter_table_products_add_column_post_count', 71),
('2016_06_30_104408_create_table_products_posts_dates', 71),
('2016_06_30_153252_alter_table_products_add_column_is_camera', 71),
('2016_07_01_103930_alter_table_product_xlinks_add_column_is_camera', 71),
('2016_07_04_163844_alter_table_questions_add_column_answer_count', 72),
('2016_07_04_164224_alter_table_questions_add_column_view_count', 72),
('2016_07_06_104833_create_table_products_questions', 73),
('2016_07_06_105609_alter_table_products_add_some_columns_count', 73),
('2016_07_06_113514_create_table_products_classifields', 73),
('2016_07_06_151318_alter_table_products_add_column_hot_updated_at', 73),
('2016_07_06_155541_create_table_post_hash_links', 73),
('2016_07_11_140329_alter_table_classifields_add_column_phone_source', 74),
('2016_07_17_144402_create_table_cache_globals', 75),
('2016_07_23_144312_alter_table_products_add_column_type', 76),
('2016_07_24_160900_create_table_merchant_reports', 76),
('2016_07_24_200410_alter_products_table_add_column_news_count_7day_ago', 76),
('2016_07_24_200621_alter_products_table_add_column_data_count_7day_ago', 76),
('2016_07_28_141329_create_table_merchant_views', 77),
('2016_07_28_141933_create_table_merchant_rates', 77),
('2016_08_02_091422_alter_table_posts_add_tinhte_columns', 77),
('2016_08_02_100217_alter_table_sites_add_is_craw', 77),
('2016_08_05_101648_create_table_merchant_rates_count', 78),
('2016_08_05_151854_create_table_post_comments', 78),
('2016_08_14_223947_alter_table_merchant_rates_all_add_count_star', 79),
('2016_08_14_224344_alter_table_merchant_rates_count_add_count_star', 79),
('2016_08_15_145754_alter_table_merchant_rates_drop_column_product_id', 80),
('2016_08_15_145931_drop_table_merchant_rates_count', 80),
('2016_08_15_153816_alter_table_sites_add_multi_count_columns', 81),
('2016_08_20_095309_alter_product_table_add_newest_column', 82),
('2016_09_05_093137_create_table_dpreviews', 83),
('2016_09_05_115459_edit_dpreviews_convert_charset', 84),
('2016_09_05_133810_alter_table_products_add_column_announce_date', 85),
('2016_09_07_113209_alter_table_products_all_original_keyword_column', 86),
('2016_09_07_115129_alter_table_products_add_parent_id_column', 87),
('2016_09_17_085146_alter_product_prices_table_add_status_column', 88),
('2016_09_17_102412_alter_table_products_add_merchant_count_product_new_old', 89),
('2016_09_17_170604_alter_products_table_add_source_id', 90),
('2016_09_21_151102_alter_table_product_xlinks_add_type', 91),
('2016_09_21_171846_create_table_categories', 92),
('2016_09_22_091624_create_table_categories_brands', 93),
('2016_09_22_092020_create_table_categories_products', 93),
('2016_09_22_093653_alter_table_categories_add_active_column', 94),
('2016_09_22_102317_alter_table_categories_add_parent_id_column', 95),
('2016_09_22_120119_alter_table_categories_add_slug_column', 96),
('2016_09_23_142420_alter_products_table_add_category_id_column', 97),
('2016_09_23_145515_alter_product_xlinks_add_category_id_column', 98),
('2016_09_23_170437_alter_categories_table_add_product_count', 99),
('2016_09_27_112809_alter_table_kpis_add_column_new_product', 100),
('2016_10_01_094053_alter_table_brands_add_columns_link_vatgia', 101),
('2016_10_01_101042_alter_table_products_add_column_id_vatgia', 102),
('2016_10_03_213110_create_table_craw_products_vatgia_brand_link', 103),
('2016_10_04_142504_create_table_product_metas', 104),
('2016_10_07_150219_create_real_estate_table', 105),
('2016_10_10_220827_real_estate_queue_images', 106),
('2016_10_11_092707_create_product_images_queue', 107),
('2016_10_12_093427_alter_real_estate_table_add_placement', 107),
('2016_10_12_141445_alter_real_estate_table_add_some_search_column', 108),
('2016_10_14_143710_alter_products_table_add_json_tags_vg_column', 109),
('2016_10_21_092629_alter_table_real_estate_add_json_tags_column', 110),
('2016_10_31_143901_create_bds_count_result_search_keywords', 111),
('2016_11_01_164643_alter_real_estate_table_add_type_column', 112),
('2016_11_10_132107_create_table_brochure_subscribers', 113),
('2016_11_10_134358_create_table_subcribers', 114),
('2016_11_15_215155_create_table_advisory_subcribers', 115),
('2016_11_20_110907_alter_page_table_add_pag_slug', 116),
('2016_11_20_111453_alter_products_table_add_slug', 116),
('2016_11_20_113055_add_alt_image_to_multi_tables', 116),
('2016_11_20_121104_alter_table_posts_add_metadata', 116),
('2016_11_20_122145_create_table_options', 116),
('2016_11_21_214418_alter_post_category_add_parent_id', 117),
('2016_11_21_230012_alter_table_categories_add_column_position_image_in_menu', 117),
('2016_11_22_132931_alter_table_categories_add_background_homepage', 118),
('2016_11_24_224239_alter_products_table_add_active_column', 119),
('2016_11_27_214019_alter_product_images_add_sort_column', 120),
('2016_11_27_215557_alter_products_table_add_sort_column', 121),
('2016_11_29_223304_alter_products_table_add_promotion_price', 122),
('2016_12_04_134440_alter_products_table_add_image_homepage', 123),
('2016_12_04_135657_alter_banners_table_add_sort_column', 124),
('2016_12_04_154218_add_metadata_pages_table', 125);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pag_id` int(11) NOT NULL,
  `pag_title` varchar(255) DEFAULT NULL,
  `pag_teaser` varchar(255) DEFAULT NULL,
  `pag_content` text,
  `pag_create_time` int(11) DEFAULT NULL,
  `pag_update_time` int(11) DEFAULT NULL,
  `pag_domain_id` int(11) NOT NULL,
  `pag_type` tinyint(4) NOT NULL DEFAULT '0',
  `pag_active` tinyint(1) NOT NULL DEFAULT '0',
  `pag_position` tinyint(4) NOT NULL DEFAULT '0',
  `pag_parent` int(11) NOT NULL DEFAULT '0',
  `pag_image` varchar(255) NOT NULL,
  `pag_slug` varchar(255) DEFAULT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pag_id`, `pag_title`, `pag_teaser`, `pag_content`, `pag_create_time`, `pag_update_time`, `pag_domain_id`, `pag_type`, `pag_active`, `pag_position`, `pag_parent`, `pag_image`, `pag_slug`, `image_alt`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, 'CHÀO MỪNG TỚI WEBSITE CHÍNH THỨC CỦA NỘI THẤT DEFA', NULL, '<p>Lời đầu ti&ecirc;n, C&ocirc;ng ty Nội thất DEFA xin gửi đến c&aacute;c đối t&aacute;c, kh&aacute;ch h&agrave;ng v&agrave; đồng nghiệp lời ch&agrave;o tr&acirc;n trọng,&nbsp;<br /> lời ch&uacute;c sức khỏe v&agrave; th&agrave;nh đạt.</p>\r\n<p>&nbsp;</p>\r\n<div class="tinymce-ulimage"><img style="float: right;" src="/uploads/images/2016_12_04_c8bd335d76.jpeg" width="420" height="336" /></div>\r\n<p><strong>THƯƠNG HIỆU NỘI THẤT VỚI CẢ THẬP KỶ KINH NGHIỆM CHUY&Ecirc;N M&Ocirc;N</strong></p>\r\n<p>DEFA l&agrave; một thương hiệu nội thất h&agrave;ng đầu hiện nay về tư vấn thiết kế, trang tr&iacute; nội thất, sản xuất kinh doanh,<br /> thi c&ocirc;ng ho&agrave;n thiện nội ngoại thất cho c&aacute;c c&aacute; nh&acirc;n v&agrave; tổ chức. Đặc biệt, c&ocirc;ng ty ch&uacute;ng t&ocirc;i c&oacute; showroom trưng<br /> b&agrave;y sản phẩm tại tầng 3 t&ograve;a nh&agrave; HCMCC số 2 Văn Cao - Ba Đ&igrave;nh - H&agrave; Nội. Đến với showroom, qu&yacute; kh&aacute;ch&nbsp;<br /> chắc chắn sẽ c&oacute; cảm gi&aacute;c mới lạ về c&aacute;ch b&agrave;i tr&iacute;, ngỡ ng&agrave;ng về c&aacute;c sản phẩm đồ gỗ mang xu hướng hiện đại,<br /> tinh tế v&agrave; sang trọng. DEFA ph&acirc;n khu chức năng ri&ecirc;ng biệt theo từng ph&ograve;ng mẫu v&agrave; ch&uacute; trọng đến việc phối&nbsp;<br /> m&agrave;u, trang tr&iacute; phụ kiện đi k&egrave;m, nhằm gi&uacute;p cho kh&aacute;ch h&agrave;ng định h&igrave;nh tốt hơn sở th&iacute;ch v&agrave; nhu cầu của m&igrave;nh.</p>\r\n<p><strong>DỊCH VỤ THIẾT KẾ NỘI THẤT</strong></p>\r\n<p>Dịch vụ tư vấn thiết kế DEFA dựa v&agrave;o nhu cầu cụ thể của từng dự &aacute;n từ nh&agrave; ở đến kinh doanh như nh&agrave; h&agrave;ng,&nbsp;<br /> kh&aacute;ch sạn, spa, showroom&hellip; Ch&uacute;ng t&ocirc;i lu&ocirc;n xem x&eacute;t c&aacute;c dự &aacute;n từ nhiều g&oacute;c độ, nghi&ecirc;n cứu ưu ti&ecirc;n c&aacute;c&nbsp;<br /> phương &aacute;n ph&ugrave; hợp nhằm đưa ra giải ph&aacute;p tối ưu cho kh&aacute;ch h&agrave;ng. Với sự d&agrave;y dạn kinh nghiệm của c&aacute;c kiến&nbsp;<br /> tr&uacute;c sư t&agrave;i ba đ&atilde; c&oacute; nhiều c&aacute;c c&ocirc;ng tr&igrave;nh thực tế ti&ecirc;u biểu v&agrave; c&oacute; nhiều năm l&agrave;m việc tại c&aacute;c c&ocirc;ng ty nước ngo&agrave;i.<br /> C&ugrave;ng với đội ngũ kỹ sư c&oacute; năng lực chuy&ecirc;n m&ocirc;n cao, gi&agrave;u kinh nghiệm. DEFA tự tin khi tham gia c&aacute;c dự &aacute;n tư&nbsp;<br /> vấn thiết kế x&acirc;y dựng nội ngoại thất theo ti&ecirc;u chuẩn quốc tế.<br /> Ch&uacute;ng t&ocirc;i vui mừng h&acirc;n hạnh được sự hỗ trợ v&agrave; cung cấp c&aacute;c g&oacute;i dịch vụ để qu&yacute; kh&aacute;ch h&agrave;ng lựa chọn trong&nbsp;<br /> việc Thiết k&ecirc; &ndash; Thi c&ocirc;ng &ndash; Lắp đặt c&aacute;c sản phẩm nội ngoại thất.<br /> &nbsp; &nbsp; &nbsp; &nbsp;<br /> DEFA hi vọng sẽ mang lại sự h&agrave;i l&ograve;ng cho Qu&yacute; kh&aacute;ch h&agrave;ng.<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br /> &ldquo; DEFA mở ra kh&ocirc;ng gian cuộc sống&rdquo;<br /> &ldquo; H&atilde;y kh&aacute;m ph&aacute; Thương hiệu của ch&uacute;ng t&ocirc;i&hellip;.!&rdquo;<br /> Xin tr&acirc;n trọng cảm ơn v&agrave; mong sớm nhận được sự hợp t&aacute;c của Qu&yacute; kh&aacute;ch h&agrave;ng.</p>', 1478953598, 1480841275, 0, 0, 1, 0, 0, '2016_11_22_1f2c578d25.jpg', 'gioi-thieu-defa', '', 'gaga', 'gagagaga', 'gagagagagag'),
(2, 'Kiến thức nội thất', NULL, '', 1478960762, 1479794498, 0, 0, 1, 0, 0, '2016_11_12_da09348860.jpg', 'kien-thuc-noi-that', '', NULL, NULL, NULL),
(3, 'Liên hệ', NULL, '<p>Liên hệ với Defa</p>\n', 1479395335, 1479794485, 0, 0, 1, 0, 0, '', 'lien-he', '', NULL, NULL, NULL),
(4, 'Thư viện công trình', NULL, '<p>Thư viện công trình</p>\n', 1479395395, 1479794477, 0, 0, 1, 0, 0, '', 'thu-vien-cong-trinh', '', NULL, NULL, NULL),
(5, 'Sơ đồ trang', NULL, '<p>Sơ đồ trang</p>\n', 1479395405, 1479794469, 0, 0, 1, 0, 0, '', 'so-do-trang', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user.view', 'View user', 'View user\'s info', '0000-00-00 00:00:00', '2015-07-22 11:19:58'),
(2, 'user.create', 'Create user', 'Tạo user', '0000-00-00 00:00:00', '2016-11-17 14:38:44'),
(3, 'user.edit', 'Edit user', 'Edit user\'s info', '0000-00-00 00:00:00', '2015-07-22 11:20:35'),
(4, 'user.destroy', 'Delete user', 'Xóa user', '0000-00-00 00:00:00', '2016-11-17 14:38:54'),
(5, 'post.edit', 'Edit post', 'Sửa tin tức', '2015-07-22 10:45:58', '2016-11-17 14:36:53'),
(6, 'post.create', 'Create post', 'Tạo tin tức', '2015-07-22 10:46:36', '2016-11-17 14:36:35'),
(7, 'post.delete', 'Delete post', 'Xóa tin tức', '2015-07-22 10:53:47', '2016-11-17 14:36:43'),
(10, 'post.active', 'Active post', 'Kích hoạt tin tức', '2015-07-22 10:59:22', '2016-11-17 14:36:26'),
(11, 'product.view', 'View Product', 'Xem sản phẩm', '2016-03-09 04:26:38', '2016-11-17 14:37:52'),
(12, 'product.edit', 'Edit Product', 'Sửa sản phẩm', '2016-03-09 04:26:44', '2016-11-17 14:37:40'),
(13, 'product.delete', 'Delete Product', 'Xóa sản phẩm', '2016-03-09 04:26:56', '2016-11-17 14:37:32'),
(14, 'product.create', 'Create Product', 'Tạo sản phẩm', '2016-03-09 04:27:23', '2016-11-17 14:37:23'),
(19, 'banner.view', 'View banner', 'Xem banner', '2016-03-09 04:29:23', '2016-11-17 14:39:24'),
(20, 'banner.create', 'Create banner', 'Tạo banner', '2016-03-09 04:29:34', '2016-11-17 14:39:48'),
(21, 'banner.edit', 'Edit banner', 'Sửa banner', '2016-03-09 04:29:42', '2016-11-17 14:39:33'),
(22, 'banner.destroy', 'Delete banner', 'Xóa banner', '2016-03-09 04:29:48', '2016-11-18 08:09:54'),
(34, 'post_category.view', 'View post category', 'Danh mục tin tức', '2016-03-09 04:32:55', '2016-11-17 14:34:00'),
(35, 'post_category.create', 'Create post category', 'Danh mục tin tức', '2016-03-09 04:33:06', '2016-11-17 14:33:31'),
(36, 'post_category.edit', 'Edit post category', 'Sửa danh mục tin tức', '2016-03-09 04:33:21', '2016-11-17 14:36:11'),
(37, 'post_category.delete', 'Delete post category', 'Xóa danh mục tin tức', '2016-03-09 04:33:30', '2016-11-17 14:35:56'),
(38, 'dashboard.view', 'View dashboard', 'Xem quản trị', '2016-03-09 04:58:43', '2016-11-17 14:39:11'),
(39, 'post.view', 'View post', 'Xem tin tức', '2016-03-10 10:19:27', '2016-11-17 14:37:04'),
(43, 'brochure_subscriber.view', 'Xem ds đăng ký brochure', 'Xem ds đăng ký brochure', '2016-11-17 14:40:44', '2016-11-17 14:40:44'),
(44, 'subscriber.view', 'Xem ds đăng ký nhận tin', 'Xem ds đăng ký nhận tin', '2016-11-17 14:41:05', '2016-11-17 14:41:05'),
(45, 'advisory_subscriber.view', 'Xem ds đăng ký tư vấn', 'Xem ds đăng ký tư vấn', '2016-11-17 14:41:23', '2016-11-17 14:41:23'),
(46, 'page.view', 'Xem trang tĩnh', 'Xem trang tĩnh', '2016-11-17 14:53:57', '2016-11-17 14:53:57'),
(47, 'category.view', 'Xem danh mục sản phẩm', 'Xem danh mục sản phẩm', '2016-11-17 14:55:12', '2016-11-17 14:55:12'),
(48, 'setting.view', 'Cấu hình', 'Cấu hình', '2016-11-17 14:56:12', '2016-11-17 14:56:12'),
(49, 'setting.edit', 'Chỉnh sửa cấu hình', 'Chỉnh sửa cấu hình', '2016-11-18 02:34:59', '2016-11-18 02:34:59'),
(50, 'page.create', 'Tạo trang tĩnh', 'Tạo trang tĩnh', '2016-11-18 07:54:32', '2016-11-18 07:54:32'),
(51, 'page.edit', 'Sửa trang tĩnh', 'Tạo trang tĩnh', '2016-11-18 07:54:45', '2016-11-18 07:54:45'),
(52, 'page.delete', 'Xóa trang tĩnh', 'Xóa trang tĩnh', '2016-11-18 07:54:57', '2016-11-18 07:54:57'),
(53, 'page.active', 'Kích hoạt trang tĩnh', 'Kích hoạt trang tĩnh', '2016-11-18 07:55:10', '2016-11-18 07:55:10'),
(56, 'user.update', 'Post update user', 'Post update user', '2016-11-22 15:59:06', '2016-11-22 15:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(3, 7),
(5, 7),
(6, 7),
(7, 7),
(10, 7),
(11, 7),
(12, 7),
(13, 7),
(14, 7),
(19, 7),
(20, 7),
(21, 7),
(22, 7),
(34, 7),
(35, 7),
(36, 7),
(37, 7),
(38, 7),
(39, 7),
(43, 7),
(44, 7),
(45, 7),
(46, 7),
(47, 7),
(48, 7),
(49, 7),
(50, 7),
(51, 7),
(52, 7),
(53, 7),
(56, 7);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `teaser` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8_unicode_ci,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `hot` tinyint(4) NOT NULL DEFAULT '0',
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `has_image_content` tinyint(4) NOT NULL DEFAULT '0',
  `has_image` tinyint(4) NOT NULL DEFAULT '0',
  `views` bigint(20) NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `static_time` int(11) NOT NULL DEFAULT '0',
  `tinhte_category_link` text COLLATE utf8_unicode_ci,
  `is_tinhte` tinyint(4) NOT NULL DEFAULT '0',
  `image_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `teaser`, `image`, `link`, `category_id`, `product_id`, `user_id`, `active`, `hot`, `type`, `slug`, `created_at`, `updated_at`, `has_image_content`, `has_image`, `views`, `tags`, `static_time`, `tinhte_category_link`, `is_tinhte`, `image_alt`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, 'DEFA đã có mặt tại tòa nhà AVARE, Kuala Lumpur, Malaysia', '<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">Kh&ocirc;ng gian nh&agrave; đẹp l&agrave; điều m&agrave; ai cũng mong muốn c&oacute; được, tuy nhi&ecirc;n tự m&igrave;nh tạo n&ecirc;n kh&ocirc;ng gian nội thất đẹp v&agrave; mang dấu ấn c&aacute; nh&acirc;n lại l&agrave; điều m&agrave; kh&ocirc;ng phải ai cũng dễ d&agrave;ng th&agrave;nh c&ocirc;ng. Dưới đ&acirc;y l&agrave; một v&agrave;i những ch&uacute; &yacute; cơ bản để bạn c&oacute; thể tự trang tr&iacute; nh&agrave; đẹp m&agrave; kh&ocirc;ng cần đến những kiến thức thiết kế nội thất chuy&ecirc;n nghiệp chuy&ecirc;n s&acirc;u.</span></span></p>\r\n<p style="text-align: justify;"><strong><span style="font-size: 13.0pt;"><span style="color: black;">1. X&aacute;c định được thiết kế nội thất trước khi lựa chọn m&agrave;u sơn</span></span></strong></p>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">Th&ocirc;ng thường, khi chuyển đến nh&agrave; mới hay c&oacute; &yacute; định cải tạo lại một kh&ocirc;ng gian n&agrave;o đ&oacute;, người ta hay nghĩ đến chọn m&agrave;u sơn đầu ti&ecirc;n trước khi quyết định về những lựa chọn nội thất. Tuy nhi&ecirc;n, thực tế cho thấy đ&acirc;y kh&ocirc;ng ho&agrave;n to&agrave;n l&agrave; một &yacute; kiến hay.</span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">C&oacute; h&agrave;ng ngh&igrave;n m&agrave;u sơn để chọn với đủ c&aacute;c t&ocirc;ng m&agrave;u v&agrave; sắc th&aacute;i. Thậm ch&iacute;, c&ugrave;ng một m&agrave;u sơn lại c&oacute; thể đem đến những hiệu ứng rất kh&aacute;c nhau t&ugrave;y thuộc từng căn ph&ograve;ng, do ảnh hưởng của c&aacute;ch sử dụng v&agrave; bố tr&iacute; &aacute;nh s&aacute;ng, nguồn s&aacute;ng kh&aacute;c nhau, c&ugrave;ng với sự kết hợp của c&aacute;c nội thất, b&agrave;y tr&iacute; trong ph&ograve;ng. Điều đ&oacute; c&oacute; nghĩa rằng, khi bạn nh&igrave;n thấy một ng&ocirc;i nh&agrave; n&agrave;o đ&oacute; với m&agrave;u sơn rất đẹp v&agrave; thuyết phục, th&igrave; cũng chưa chắc m&agrave;u đ&oacute; cũng sẽ thực sự đẹp với kh&ocirc;ng gian nh&agrave; bạn.</span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">Điều bạn thực sự muốn l&agrave; m&agrave;u sắc những của những bức tường kết hợp khi kết hợp với nguồn s&aacute;ng thực tế trong nh&agrave; sẽ h&agrave;i h&ograve;a v&agrave; t&ocirc;n l&ecirc;n vẻ đẹp nhất của c&aacute;c đồ đạc trong ph&ograve;ng: bộ b&agrave;n ghế, thảm, những gi&aacute; s&aacute;ch hay kệ tủ &hellip; V&igrave; thế, h&atilde;y để lựa chọn m&agrave;u sơn đến cuối c&ugrave;ng khi bạn đ&atilde; c&oacute; đủ những đồ nội thất, đồ trang tr&iacute; ch&iacute;nh trong ph&ograve;ng.</span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">&gt;&gt;&gt; Ảnh: <a href="http://defa.codeup247.vn" target="_blank">http://defa.com.vn</a></span></span></p>\r\n<h2 style="text-align: justify;"><strong><span style="font-size: 13.0pt;"><span style="color: black;">2. Thiết kế, bố tr&iacute; kh&ocirc;ng gian trống hợp l&yacute; giữa những đồ nội thất</span></span></strong></h2>\r\n<h2 style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">C&oacute; thể bạn đang cố gắng trang tr&iacute; nội thất cầu kỳ với thật nhiều chi tiết để tạo vẻ ấn tượng, sinh động cho ng&ocirc;i nh&agrave;, nhưng một căn ph&ograve;ng qu&aacute; nhiều đồ đạc dễ tạo cảm gi&aacute;c chật chội, rối mắt. Bạn muốn một kh&ocirc;ng gian sống thanh lịch, tiện nghi? H&atilde;y đầu tư v&agrave;o những sự sắp đặt nội thất kh&eacute;o l&eacute;o để tạo n&ecirc;n những khoảng kh&ocirc;ng gian trống ho&agrave;n hảo, tạo cảm gi&aacute;c rộng r&atilde;i v&agrave; thoải m&aacute;i. N&oacute;i c&aacute;ch kh&aacute;c, h&atilde;y cho những nội thất trong nh&agrave; bạn một khoảng kh&ocirc;ng để thở. Đ&acirc;y thực sự l&agrave; tin tốt cho những người kh&ocirc;ng dư dả chi ti&ecirc;u khi bạn kh&ocirc;ng cần tốn qu&aacute; nhiều chi ph&iacute; cho những đồ trang tr&iacute; để c&oacute; một kh&ocirc;ng gian đẹp v&agrave; phong c&aacute;ch. Đồng thời, &iacute;t đồ đạc hơn cũng c&oacute; nghĩa &iacute;t hơn c&aacute;c bề mặt phủ bụi đ&ograve;i hỏi thời gian v&agrave; c&ocirc;ng sức của bạn để lau ch&ugrave;i dọn dẹp thường xuy&ecirc;n.</span></span></h2>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">&gt;&gt;&gt; Ảnh: Hai chiếc ghế trang nh&atilde; vẫn l&agrave;m n&ecirc;n điểm nhấn khi kh&ocirc;ng phải chen ch&acirc;n trong một bức tranh đ&ocirc;ng đ&uacute;c đồ đạc</span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">&gt;&gt;&gt; Tham khảo phong c&aacute;ch thiết k&ecirc; nội thất tối giản hiện đại, tiện nghi</span></span></p>\r\n<h2 style="text-align: justify;"><strong><span style="font-size: 13.0pt;"><span style="color: black;">3. Treo c&aacute;c t&aacute;c phẩm nghệ thuật ở đ&uacute;ng độ cao</span></span></strong></h2>', 'DEFA đã rất nỗ lực vượt qua các đối thủ nặng ký để trở thành nhà cung cấp nội thất chính thức cho tập đoàn đa quốc gia Statewide ....jfjdbvjdfbvjbdfjvnjfkbvjcvbhjdfbvjdfbvjdfnvkjdfbvjfdnvjdfnvkdfvj', '2016_11_30_9742b45d57.jpg', NULL, 7, NULL, 2, 1, 0, NULL, 'noi-that-defa-tai-malaysia', '2016-11-22 03:59:25', '2016-11-30 14:37:35', 0, 0, 0, '', 0, NULL, 0, '', '', '', ''),
(2, 'DEFA KHỞI XƯỚNG CLB NGÔI NHÀ MƠ ƯỚC', '<p style="text-align: justify;"><strong><span style="font-size: 13.0pt;"><span style="color: black;">12 T&iacute;p trang tr&iacute; nội thất l&agrave;m đẹp hơn bất cứ căn ph&ograve;ng n&agrave;o (Phần 1)</span></span></strong></p>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">Kh&ocirc;ng gian nh&agrave; đẹp l&agrave; điều m&agrave; ai cũng mong muốn c&oacute; được, tuy nhi&ecirc;n tự m&igrave;nh tạo n&ecirc;n kh&ocirc;ng gian nội thất đẹp v&agrave; mang dấu ấn c&aacute; nh&acirc;n lại l&agrave; điều m&agrave; kh&ocirc;ng phải ai cũng dễ d&agrave;ng th&agrave;nh c&ocirc;ng. Dưới đ&acirc;y l&agrave; một v&agrave;i những ch&uacute; &yacute; cơ bản để bạn c&oacute; thể tự trang tr&iacute; nh&agrave; đẹp m&agrave; kh&ocirc;ng cần đến những kiến thức thiết kế nội thất chuy&ecirc;n nghiệp chuy&ecirc;n s&acirc;u.</span></span></p>\r\n<p style="text-align: justify;"><a href="http://www.houzz.com/ideabooks/19837206/list/12-key-decorating-tips-to-make-any-room-better"><span style="font-size: 13.0pt;"><span style="color: #1155cc;">http://www.houzz.com/ideabooks/19837206/list/12-key-decorating-tips-to-make-any-room-better</span></span></a></p>\r\n<ol>\r\n<li style="text-align: justify;"><strong><span style="font-size: 13.0pt;"><span style="color: black;">X&aacute;c định được thiết kế nội thất trước khi lựa chọn m&agrave;u sơn</span></span></strong></li>\r\n</ol>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">Th&ocirc;ng thường, khi chuyển đến nh&agrave; mới hay c&oacute; &yacute; định cải tạo lại một kh&ocirc;ng gian n&agrave;o đ&oacute;, người ta hay nghĩ đến chọn m&agrave;u sơn đầu ti&ecirc;n trước khi quyết định về những lựa chọn nội thất. Tuy nhi&ecirc;n, thực tế cho thấy đ&acirc;y kh&ocirc;ng ho&agrave;n to&agrave;n l&agrave; một &yacute; kiến hay.</span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">C&oacute; h&agrave;ng ngh&igrave;n m&agrave;u sơn để chọn với đủ c&aacute;c t&ocirc;ng m&agrave;u v&agrave; sắc th&aacute;i. Thậm ch&iacute;, c&ugrave;ng một m&agrave;u sơn lại c&oacute; thể đem đến những hiệu ứng rất kh&aacute;c nhau t&ugrave;y thuộc từng căn ph&ograve;ng, do ảnh hưởng của c&aacute;ch sử dụng v&agrave; bố tr&iacute; &aacute;nh s&aacute;ng, nguồn s&aacute;ng kh&aacute;c nhau, c&ugrave;ng với sự kết hợp của c&aacute;c nội thất, b&agrave;y tr&iacute; trong ph&ograve;ng. Điều đ&oacute; c&oacute; nghĩa rằng, khi bạn nh&igrave;n thấy một ng&ocirc;i nh&agrave; n&agrave;o đ&oacute; với m&agrave;u sơn rất đẹp v&agrave; thuyết phục, th&igrave; cũng chưa chắc m&agrave;u đ&oacute; cũng sẽ thực sự đẹp với kh&ocirc;ng gian nh&agrave; bạn.</span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">Điều bạn thực sự muốn l&agrave; m&agrave;u sắc những của những bức tường kết hợp khi kết hợp với nguồn s&aacute;ng thực tế trong nh&agrave; sẽ h&agrave;i h&ograve;a v&agrave; t&ocirc;n l&ecirc;n vẻ đẹp nhất của c&aacute;c đồ đạc trong ph&ograve;ng: bộ b&agrave;n ghế, thảm, những gi&aacute; s&aacute;ch hay kệ tủ &hellip; V&igrave; thế, h&atilde;y để lựa chọn m&agrave;u sơn đến cuối c&ugrave;ng khi bạn đ&atilde; c&oacute; đủ những đồ nội thất, đồ trang tr&iacute; ch&iacute;nh trong ph&ograve;ng.</span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">&gt;&gt;&gt; Ảnh:</span></span></p>\r\n<p style="text-align: justify;"><strong><span style="font-size: 13.0pt;"><span style="color: black;">2. Thiết kế, bố tr&iacute; kh&ocirc;ng gian trống hợp l&yacute; giữa những đồ nội thất</span></span></strong></p>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">C&oacute; thể bạn đang cố gắng trang tr&iacute; nội thất cầu kỳ với thật nhiều chi tiết để tạo vẻ ấn tượng, sinh động cho ng&ocirc;i nh&agrave;, nhưng một căn ph&ograve;ng qu&aacute; nhiều đồ đạc dễ tạo cảm gi&aacute;c chật chội, rối mắt. Bạn muốn một kh&ocirc;ng gian sống thanh lịch, tiện nghi? H&atilde;y đầu tư v&agrave;o những sự sắp đặt nội thất kh&eacute;o l&eacute;o để tạo n&ecirc;n những khoảng kh&ocirc;ng gian trống ho&agrave;n hảo, tạo cảm gi&aacute;c rộng r&atilde;i v&agrave; thoải m&aacute;i. N&oacute;i c&aacute;ch kh&aacute;c, h&atilde;y cho những nội thất trong nh&agrave; bạn một khoảng kh&ocirc;ng để thở. Đ&acirc;y thực sự l&agrave; tin tốt cho những người kh&ocirc;ng dư dả chi ti&ecirc;u khi bạn kh&ocirc;ng cần tốn qu&aacute; nhiều chi ph&iacute; cho những đồ trang tr&iacute; để c&oacute; một kh&ocirc;ng gian đẹp v&agrave; phong c&aacute;ch. Đồng thời, &iacute;t đồ đạc hơn cũng c&oacute; nghĩa &iacute;t hơn c&aacute;c bề mặt phủ bụi đ&ograve;i hỏi thời gian v&agrave; c&ocirc;ng sức của bạn để lau ch&ugrave;i dọn dẹp thường xuy&ecirc;n.</span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">&gt;&gt;&gt; Ảnh: Hai chiếc ghế trang nh&atilde; vẫn l&agrave;m n&ecirc;n điểm nhấn khi kh&ocirc;ng phải chen ch&acirc;n trong một bức tranh đ&ocirc;ng đ&uacute;c đồ đạc</span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: 13.0pt;"><span style="color: black;">&gt;&gt;&gt; Tham khảo phong c&aacute;ch thiết k&ecirc; nội thất tối giản hiện đại, tiện nghi</span></span></p>\r\n<p style="text-align: justify;"><strong><span style="font-size: 13.0pt;"><span style="color: black;">3. Treo c&aacute;c t&aacute;c phẩm nghệ thuật ở đ&uacute;ng độ cao</span></span></strong></p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n<div class="tinymce-ulimage"><img style="display: block; margin-left: auto; margin-right: auto;" src="/uploads/images/2016_11_24_37177a2d4d.jpeg" alt="test cai nhi" width="802" height="234" /></div>', 'vdjbvdfvdfbvjsdnvkjdfbvjvd câu lạc bộ ngôi nhà mơ ước do công ty nội thất defa phong cách châu âu thành lập với mong muốn nkjsvnkxvxcvxvjd', '2016_11_30_97bbe77ac4.jpg', NULL, 7, NULL, 2, 1, 0, NULL, 'defa-khoi-xuong-clb-ngoi-nha-mo-uoc', '2016-11-22 04:03:20', '2016-11-30 14:37:22', 0, 0, 0, '', 0, NULL, 0, '', '', '', ''),
(3, '12 Típ trang trí nội thất làm đẹp hơn bất cứ căn phòng nào (Phần 1)', '<h2 style="text-align: justify;"><span style="color: #725d50; font-size: 14pt;">1. X&aacute;c định được thiết kế nội thất trước khi lựa chọn m&agrave;u sơn</span></h2>\r\n<p style="text-align: justify;"><span style="font-size: 14pt; color: #725d50;">Th&ocirc;ng thường, khi chuyển đến nh&agrave; mới hay c&oacute; &yacute; định cải tạo lại một kh&ocirc;ng gian n&agrave;o đ&oacute;, người ta hay nghĩ đến chọn&nbsp;m&agrave;u sơn đầu ti&ecirc;n trước khi quyết định về những lựa chọn nội thất. Tuy nhi&ecirc;n, thực tế cho thấy đ&acirc;y kh&ocirc;ng ho&agrave;n to&agrave;n l&agrave; một &yacute; kiến hay.</span></p>\r\n<p style="text-align: justify;"><span style="font-size: 14pt; color: #725d50;">C&oacute; h&agrave;ng ngh&igrave;n m&agrave;u sơn để chọn với đủ c&aacute;c t&ocirc;ng m&agrave;u v&agrave; sắc th&aacute;i. Thậm ch&iacute;, c&ugrave;ng một m&agrave;u sơn lại c&oacute; thể đem đến những hiệu ứng rất kh&aacute;c nhau t&ugrave;y thuộc từng căn ph&ograve;ng, do ảnh hưởng của c&aacute;ch sử dụng v&agrave; bố tr&iacute; &aacute;nh s&aacute;ng, nguồn s&aacute;ng kh&aacute;c nhau, c&ugrave;ng với sự kết hợp của c&aacute;c nội thất, b&agrave;y tr&iacute; trong ph&ograve;ng. Điều đ&oacute; c&oacute; nghĩa rằng, khi bạn nh&igrave;n thấy một ng&ocirc;i nh&agrave; n&agrave;o đ&oacute; với m&agrave;u sơn rất đẹp v&agrave; thuyết phục, th&igrave; cũng chưa chắc m&agrave;u đ&oacute; cũng sẽ thực sự đẹp với kh&ocirc;ng gian nh&agrave; bạn.</span></p>\r\n<p style="text-align: justify;"><span style="font-size: 14pt; color: #725d50;">Điều bạn thực sự muốn l&agrave; m&agrave;u sắc những của những bức tường kết hợp khi kết hợp với nguồn s&aacute;ng thực tế trong nh&agrave; sẽ h&agrave;i h&ograve;a v&agrave; t&ocirc;n l&ecirc;n vẻ đẹp nhất của c&aacute;c đồ đạc trong ph&ograve;ng: bộ b&agrave;n ghế, thảm, những gi&aacute; s&aacute;ch hay kệ tủ &hellip; V&igrave; thế, h&atilde;y để lựa chọn m&agrave;u sơn đến cuối c&ugrave;ng khi bạn đ&atilde; c&oacute; đủ những đồ nội thất, đồ trang tr&iacute; ch&iacute;nh trong ph&ograve;ng.</span></p>\r\n<p style="text-align: justify;"><span style="font-size: 14pt; color: #725d50;">&gt;&gt;&gt; Ảnh:</span></p>\r\n<div class="tinymce-ulimage"><span style="color: #725d50; font-size: 14pt;"><img style="display: block; margin-left: auto; margin-right: auto;" src="/uploads/images/2016_11_23_9060681bbb.png" alt="Chỉ l&agrave; test caption th&ocirc;i m&agrave;" width="152" height="152" /></span></div>\r\n<p style="text-align: justify;"><span style="font-size: 14pt; color: #725d50;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></p>\r\n<h2><span style="font-size: 14pt; color: #725d50;">2. Thiết kế, bố tr&iacute; kh&ocirc;ng gian trống hợp l&yacute; giữa những đồ nội thất</span></h2>\r\n<h2 style="text-align: justify;">&nbsp;</h2>', 'fvbv xc vlkdfvdvfdskfdscsdksdf', '2016_11_30_f5887ad8bd.jpg', NULL, 2, NULL, 2, 1, 0, NULL, '12-tip-trang-tri-noi-that-lam-dep-hon-bat-cu-can-phong-nao-phan-1', '2016-11-22 04:19:23', '2016-11-30 14:37:29', 0, 0, 0, '', 0, NULL, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `post_id` bigint(20) NOT NULL DEFAULT '0',
  `tag_id` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`, `parent_id`) VALUES
(1, 'Bảo quản nội thất', 'bao-quan-noi-that', '2016-11-12 16:16:13', '2016-11-22 02:15:28', NULL, 6),
(2, 'Sắp đặt nội thất', 'sap-dat-noi-that', '2016-11-12 16:16:21', '2016-11-22 02:15:16', NULL, 6),
(3, 'Phong cách nội thất', 'phong-cach-noi-that', '2016-11-12 16:16:31', '2016-11-22 02:15:03', NULL, 6),
(4, 'Thương hiệu nội thất', 'thuong-hieu-noi-that', '2016-11-12 16:16:37', '2016-11-22 02:14:49', NULL, 6),
(5, 'Kiến thức nội thất khác', 'kien-thuc-noi-that-khac', '2016-11-12 16:16:46', '2016-11-22 02:14:27', NULL, 6),
(6, 'Kiến thức nội thất', 'kien-thuc-noi-that', '2016-11-21 04:03:52', '2016-11-21 04:03:52', NULL, 0),
(7, 'Tin tức DEFA', 'tin-tuc-noi-that-defa', '2016-11-22 02:13:45', '2016-11-22 02:13:45', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_statistics`
--

CREATE TABLE `post_statistics` (
  `post_id` int(11) NOT NULL,
  `views` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `hash_name` varchar(32) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `brand_id` int(11) NOT NULL DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `images` text NOT NULL,
  `short_description` text,
  `content` text,
  `link` varchar(255) DEFAULT NULL,
  `hot` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ignore_keyword` varchar(255) DEFAULT NULL,
  `is_banner` tinyint(4) NOT NULL DEFAULT '0',
  `is_banner_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `post_keyword` varchar(255) DEFAULT NULL,
  `rate_keyword` varchar(255) DEFAULT NULL,
  `video_keyword` varchar(255) DEFAULT NULL,
  `min_price` int(11) NOT NULL DEFAULT '0',
  `total_shop` int(11) NOT NULL DEFAULT '0',
  `total_shop_update` int(11) NOT NULL DEFAULT '0',
  `is_crawl` tinyint(4) NOT NULL DEFAULT '1',
  `tags` varchar(255) DEFAULT NULL,
  `opponent` varchar(255) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `rating_count` int(11) NOT NULL DEFAULT '0',
  `comment_count` int(11) NOT NULL DEFAULT '0',
  `click_to_shop_count` int(11) NOT NULL DEFAULT '0',
  `display_score` double(8,2) NOT NULL DEFAULT '0.00',
  `avg_price` bigint(20) NOT NULL DEFAULT '0',
  `new` tinyint(4) NOT NULL DEFAULT '0',
  `has_change_price` tinyint(4) NOT NULL DEFAULT '0',
  `post_count` bigint(20) NOT NULL DEFAULT '0',
  `is_camera` tinyint(4) NOT NULL DEFAULT '0',
  `video_count` int(11) NOT NULL DEFAULT '0',
  `question_count` int(11) NOT NULL DEFAULT '0',
  `classifield_count` int(11) NOT NULL DEFAULT '0',
  `hot_updated_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `news_count_7day_ago` int(11) NOT NULL DEFAULT '0',
  `data_count_7day_ago` int(11) NOT NULL DEFAULT '0',
  `newest` tinyint(4) NOT NULL DEFAULT '0',
  `announce_date` timestamp NULL DEFAULT NULL,
  `original_keyword` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `count_merchant_buy_news` int(11) NOT NULL,
  `count_merchant_buy_olds` int(11) NOT NULL,
  `min_price_merchant_buy_news` int(11) NOT NULL,
  `min_price_merchant_buy_olds` int(11) NOT NULL,
  `source_id` bigint(20) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `design_category_id` int(11) NOT NULL DEFAULT '0',
  `customer_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `sort` tinyint(4) NOT NULL DEFAULT '0',
  `promotion_price` bigint(20) NOT NULL DEFAULT '0',
  `image_homepage` varchar(255) DEFAULT NULL,
  `image_homepage_alt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `keyword`, `hash_name`, `brand`, `brand_id`, `price`, `image`, `images`, `short_description`, `content`, `link`, `hot`, `created_at`, `updated_at`, `ignore_keyword`, `is_banner`, `is_banner_time`, `meta_title`, `meta_keyword`, `meta_description`, `post_keyword`, `rate_keyword`, `video_keyword`, `min_price`, `total_shop`, `total_shop_update`, `is_crawl`, `tags`, `opponent`, `views`, `rating_count`, `comment_count`, `click_to_shop_count`, `display_score`, `avg_price`, `new`, `has_change_price`, `post_count`, `is_camera`, `video_count`, `question_count`, `classifield_count`, `hot_updated_at`, `type`, `news_count_7day_ago`, `data_count_7day_ago`, `newest`, `announce_date`, `original_keyword`, `parent_id`, `count_merchant_buy_news`, `count_merchant_buy_olds`, `min_price_merchant_buy_news`, `min_price_merchant_buy_olds`, `source_id`, `category_id`, `design_category_id`, `customer_name`, `slug`, `image_alt`, `active`, `sort`, `promotion_price`, `image_homepage`, `image_homepage_alt`) VALUES
(37, 'Thiết kế căn cc vincom Nguyễn Chí Thanh', 'ADiepVincom', NULL, NULL, NULL, 0, 0, '2016_11_23_fb802b03b7.png', '', 'According to the RIAA, the Beatles are the best-selling music artists in the United States, with 178 million certified units. They have had more number-one albums on the British charts and sold more singles in the UK than any other act. In 2008, the group topped Billboard magazine\'s list of the all-time most successful "Hot 100" artists; as of 2016, they hold the record for most number-one hits on the Hot 100 chart with twenty.', '<p style="text-align: justify;"><span class="example2" style="color: #725d50;">The Beatles were an English <a style="color: #725d50;" title="Rock music" href="https://en.wikipedia.org/wiki/Rock_music">rock</a> band, formed in <a style="color: #725d50;" title="Liverpool" href="https://en.wikipedia.org/wiki/Liverpool">Liverpool</a> in 1960. With members <a style="color: #725d50;" title="John Lennon" href="https://en.wikipedia.org/wiki/John_Lennon">John Lennon</a>, <a style="color: #725d50;" title="Paul McCartney" href="https://en.wikipedia.org/wiki/Paul_McCartney">Paul McCartney</a>,<a style="color: #725d50;" title="George Harrison" href="https://en.wikipedia.org/wiki/George_Harrison">George Harrison</a> and <a style="color: #725d50;" title="Ringo Starr" href="https://en.wikipedia.org/wiki/Ringo_Starr">Ringo Starr</a>, they became widely regarded as <a class="mw-redirect" style="color: #725d50;" title="The Beatles\' influence on popular culture" href="https://en.wikipedia.org/wiki/The_Beatles%27_influence_on_popular_culture">the foremost and most influential act</a> of the rock era.<sup id="cite_ref-1" class="reference"><a style="color: #725d50;" href="https://en.wikipedia.org/wiki/The_Beatles#cite_note-1">[1]</a></sup> Rooted in <a style="color: #725d50;" title="Skiffle" href="https://en.wikipedia.org/wiki/Skiffle">skiffle</a>, <a style="color: #725d50;" title="Beat music" href="https://en.wikipedia.org/wiki/Beat_music">beat</a>, and 1950s <a style="color: #725d50;" title="Rock and roll" href="https://en.wikipedia.org/wiki/Rock_and_roll">rock and roll</a>, the Beatles later experimented with several <a style="color: #725d50;" title="Music genre" href="https://en.wikipedia.org/wiki/Music_genre">musical styles</a>, ranging from <a style="color: #725d50;" title="Pop music" href="https://en.wikipedia.org/wiki/Pop_music">pop</a> <a style="color: #725d50;" title="Ballad" href="https://en.wikipedia.org/wiki/Ballad">ballads</a> and <a style="color: #725d50;" title="Music of India" href="https://en.wikipedia.org/wiki/Music_of_India">Indian music</a> to <a style="color: #725d50;" title="Psychedelic music" href="https://en.wikipedia.org/wiki/Psychedelic_music">psychedelia</a> and <a style="color: #725d50;" title="Hard rock" href="https://en.wikipedia.org/wiki/Hard_rock">hard rock</a>, often incorporating <a style="color: #725d50;" title="Classical music" href="https://en.wikipedia.org/wiki/Classical_music">classical</a> elements and unconventional <a style="color: #725d50;" title="The Beatles\' recording technology" href="https://en.wikipedia.org/wiki/The_Beatles%27_recording_technology">recording techniques</a> in innovative ways. In the early 1960s, their enormous popularity first emerged as "<a style="color: #725d50;" title="Beatlemania" href="https://en.wikipedia.org/wiki/Beatlemania">Beatlemania</a>", but as the group\'s music grew in sophistication, led by primary songwriters <a style="color: #725d50;" title="Lennon&ndash;McCartney" href="https://en.wikipedia.org/wiki/Lennon%E2%80%93McCartney">Lennon and McCartney</a>, they came to be perceived as an embodiment of the ideals shared by the <a style="color: #725d50;" title="Counterculture of the 1960s" href="https://en.wikipedia.org/wiki/Counterculture_of_the_1960s">counterculture of the 1960s</a>.</span></p>\r\n<p style="text-align: justify;"><span class="example2" style="color: #725d50;">The Beatles built their reputation playing clubs in Liverpool and <a style="color: #725d50;" title="Hamburg" href="https://en.wikipedia.org/wiki/Hamburg">Hamburg</a> over a three-year period from 1960, with <a style="color: #725d50;" title="Stuart Sutcliffe" href="https://en.wikipedia.org/wiki/Stuart_Sutcliffe">Stuart Sutcliffe</a> initially serving as bass player. The core of Lennon, McCartney and Harrison went through a succession of drummers, including <a style="color: #725d50;" title="Pete Best" href="https://en.wikipedia.org/wiki/Pete_Best">Pete Best</a>, before asking Starr to join them. Manager <a style="color: #725d50;" title="Brian Epstein" href="https://en.wikipedia.org/wiki/Brian_Epstein">Brian Epstein</a> moulded them into a professional act, and producer <a style="color: #725d50;" title="George Martin" href="https://en.wikipedia.org/wiki/George_Martin">George Martin</a> guided and developed their recordings, greatly expanding their popularity in the United Kingdom after their first hit, "<a style="color: #725d50;" title="Love Me Do" href="https://en.wikipedia.org/wiki/Love_Me_Do">Love Me Do</a>", in late 1962. They acquired the nickname "the Fab Four" as Beatlemania grew in Britain the next year, and by early 1964 became international stars, leading the "<a style="color: #725d50;" title="British Invasion" href="https://en.wikipedia.org/wiki/British_Invasion">British Invasion</a>" of the United States pop market. From 1965 onwards, the Beatles produced increasingly innovative recordings, including the albums <a style="color: #725d50;" title="Rubber Soul" href="https://en.wikipedia.org/wiki/Rubber_Soul">Rubber Soul</a> (1965), <a style="color: #725d50;" title="Revolver (Beatles album)" href="https://en.wikipedia.org/wiki/Revolver_(Beatles_album)">Revolver</a> (1966), <a style="color: #725d50;" title="Sgt. Pepper\'s Lonely Hearts Club Band" href="https://en.wikipedia.org/wiki/Sgt._Pepper%27s_Lonely_Hearts_Club_Band">Sgt. Pepper\'s Lonely Hearts Club Band</a> (1967), <a style="color: #725d50;" title="The Beatles (album)" href="https://en.wikipedia.org/wiki/The_Beatles_(album)">The Beatles</a> (commonly known as the White Album, 1968) and <a style="color: #725d50;" title="Abbey Road" href="https://en.wikipedia.org/wiki/Abbey_Road">Abbey Road</a> (1969).</span></p>\r\n<p style="text-align: justify;"><span class="example2" style="color: #725d50;">After <a class="mw-redirect" style="color: #725d50;" title="The Beatles\' break-up" href="https://en.wikipedia.org/wiki/The_Beatles%27_break-up">their break-up</a> in 1970, they each enjoyed successful musical careers of varying lengths. McCartney and Starr, the surviving members, remain musically active. Lennon was <a style="color: #725d50;" title="Death of John Lennon" href="https://en.wikipedia.org/wiki/Death_of_John_Lennon">shot and killed</a> in December 1980, and Harrison died of lung cancer in November 2001.</span></p>', NULL, 0, '2016-11-23 08:08:28', '2016-11-23 09:19:31', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 37, 0, 'Anh Điệp', 'thiet-ke-can-cc-vincom-nguyen-chi-thanh', '', 1, 0, 0, NULL, NULL),
(38, 'Thiết kế căn cc Vimeco ', 'cLuongVimeco', NULL, NULL, NULL, 0, 0, '2016_11_23_eeb68a449d.jpg', '', '', '<p style="text-align: justify;"><span class="example2" style="color: #725d50;">The Beatles were an English <a style="color: #725d50;" title="Rock music" href="https://en.wikipedia.org/wiki/Rock_music">rock</a> band, formed in <a style="color: #725d50;" title="Liverpool" href="https://en.wikipedia.org/wiki/Liverpool">Liverpool</a> in 1960. With members <a style="color: #725d50;" title="John Lennon" href="https://en.wikipedia.org/wiki/John_Lennon">John Lennon</a>, <a style="color: #725d50;" title="Paul McCartney" href="https://en.wikipedia.org/wiki/Paul_McCartney">Paul McCartney</a>,<a style="color: #725d50;" title="George Harrison" href="https://en.wikipedia.org/wiki/George_Harrison">George Harrison</a> and <a style="color: #725d50;" title="Ringo Starr" href="https://en.wikipedia.org/wiki/Ringo_Starr">Ringo Starr</a>, they became widely regarded as <a class="mw-redirect" style="color: #725d50;" title="The Beatles\' influence on popular culture" href="https://en.wikipedia.org/wiki/The_Beatles%27_influence_on_popular_culture">the foremost and most influential act</a> of the rock era.<sup id="cite_ref-1" class="reference"><a style="color: #725d50;" href="https://en.wikipedia.org/wiki/The_Beatles#cite_note-1">[1]</a></sup> Rooted in <a style="color: #725d50;" title="Skiffle" href="https://en.wikipedia.org/wiki/Skiffle">skiffle</a>, <a style="color: #725d50;" title="Beat music" href="https://en.wikipedia.org/wiki/Beat_music">beat</a>, and 1950s <a style="color: #725d50;" title="Rock and roll" href="https://en.wikipedia.org/wiki/Rock_and_roll">rock and roll</a>, the Beatles later experimented with several <a style="color: #725d50;" title="Music genre" href="https://en.wikipedia.org/wiki/Music_genre">musical styles</a>, ranging from <a style="color: #725d50;" title="Pop music" href="https://en.wikipedia.org/wiki/Pop_music">pop</a> <a style="color: #725d50;" title="Ballad" href="https://en.wikipedia.org/wiki/Ballad">ballads</a> and <a style="color: #725d50;" title="Music of India" href="https://en.wikipedia.org/wiki/Music_of_India">Indian music</a> to <a style="color: #725d50;" title="Psychedelic music" href="https://en.wikipedia.org/wiki/Psychedelic_music">psychedelia</a> and <a style="color: #725d50;" title="Hard rock" href="https://en.wikipedia.org/wiki/Hard_rock">hard rock</a>, often incorporating <a style="color: #725d50;" title="Classical music" href="https://en.wikipedia.org/wiki/Classical_music">classical</a> elements and unconventional<a style="color: #725d50;" title="The Beatles\' recording technology" href="https://en.wikipedia.org/wiki/The_Beatles%27_recording_technology">recording techniques</a> in innovative ways. In the early 1960s, their enormous popularity first emerged as "<a style="color: #725d50;" title="Beatlemania" href="https://en.wikipedia.org/wiki/Beatlemania">Beatlemania</a>", but as the group\'s music grew in sophistication, led by primary songwriters <a style="color: #725d50;" title="Lennon&ndash;McCartney" href="https://en.wikipedia.org/wiki/Lennon%E2%80%93McCartney">Lennon and McCartney</a>, they came to be perceived as an embodiment of the ideals shared by the <a style="color: #725d50;" title="Counterculture of the 1960s" href="https://en.wikipedia.org/wiki/Counterculture_of_the_1960s">counterculture of the 1960s</a>.</span></p>\r\n<p style="text-align: justify;"><span class="example2" style="color: #725d50;">The Beatles built their reputation playing clubs in Liverpool and <a style="color: #725d50;" title="Hamburg" href="https://en.wikipedia.org/wiki/Hamburg">Hamburg</a> over a three-year period from 1960, with <a style="color: #725d50;" title="Stuart Sutcliffe" href="https://en.wikipedia.org/wiki/Stuart_Sutcliffe">Stuart Sutcliffe</a> initially serving as bass player. The core of Lennon, McCartney and Harrison went through a succession of drummers, including <a style="color: #725d50;" title="Pete Best" href="https://en.wikipedia.org/wiki/Pete_Best">Pete Best</a>, before asking Starr to join them. Manager <a style="color: #725d50;" title="Brian Epstein" href="https://en.wikipedia.org/wiki/Brian_Epstein">Brian Epstein</a>moulded them into a professional act, and producer <a style="color: #725d50;" title="George Martin" href="https://en.wikipedia.org/wiki/George_Martin">George Martin</a> guided and developed their recordings, greatly expanding their popularity in the United Kingdom after their first hit, "<a style="color: #725d50;" title="Love Me Do" href="https://en.wikipedia.org/wiki/Love_Me_Do">Love Me Do</a>", in late 1962. They acquired the nickname "the Fab Four" as Beatlemania grew in Britain the next year, and by early 1964 became international stars, leading the "<a style="color: #725d50;" title="British Invasion" href="https://en.wikipedia.org/wiki/British_Invasion">British Invasion</a>" of the United States pop market. From 1965 onwards, the Beatles produced increasingly innovative recordings, including the albums <a style="color: #725d50;" title="Rubber Soul" href="https://en.wikipedia.org/wiki/Rubber_Soul">Rubber Soul</a> (1965), <a style="color: #725d50;" title="Revolver (Beatles album)" href="https://en.wikipedia.org/wiki/Revolver_(Beatles_album)">Revolver</a> (1966), <a style="color: #725d50;" title="Sgt. Pepper\'s Lonely Hearts Club Band" href="https://en.wikipedia.org/wiki/Sgt._Pepper%27s_Lonely_Hearts_Club_Band">Sgt. Pepper\'s Lonely Hearts Club Band</a> (1967), <a style="color: #725d50;" title="The Beatles (album)" href="https://en.wikipedia.org/wiki/The_Beatles_(album)">The Beatles</a> (commonly known as the White Album, 1968) and <a style="color: #725d50;" title="Abbey Road" href="https://en.wikipedia.org/wiki/Abbey_Road">Abbey Road</a> (1969).</span></p>\r\n<p style="text-align: justify;"><span class="example2" style="color: #725d50;">After <a class="mw-redirect" style="color: #725d50;" title="The Beatles\' break-up" href="https://en.wikipedia.org/wiki/The_Beatles%27_break-up">their break-up</a> in 1970, they each enjoyed successful musical careers of varying lengths. McCartney and Starr, the surviving members, remain musically active. Lennon was <a style="color: #725d50;" title="Death of John Lennon" href="https://en.wikipedia.org/wiki/Death_of_John_Lennon">shot and killed</a> in December 1980, and Harrison died of lung cancer in November 2001.</span></p>', NULL, 0, '2016-11-23 09:18:45', '2016-11-23 09:50:39', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 37, 0, 'chị Lương', 'thiet-ke-can-cc-vimeco', '', 1, 0, 0, NULL, NULL),
(39, 'Thiết kế căn cc RoyalCity', 'ASonRoyal', NULL, NULL, NULL, 0, 0, '2016_11_23_f3543e6fff.jpg', '', '', '<p style="text-align: justify;"><span class="example2" style="color: #725d50;">The Beatles were an English <a style="color: #725d50;" title="Rock music" href="https://en.wikipedia.org/wiki/Rock_music">rock</a> band, formed in <a style="color: #725d50;" title="Liverpool" href="https://en.wikipedia.org/wiki/Liverpool">Liverpool</a> in 1960. With members <a style="color: #725d50;" title="John Lennon" href="https://en.wikipedia.org/wiki/John_Lennon">John Lennon</a>, <a style="color: #725d50;" title="Paul McCartney" href="https://en.wikipedia.org/wiki/Paul_McCartney">Paul McCartney</a>,<a style="color: #725d50;" title="George Harrison" href="https://en.wikipedia.org/wiki/George_Harrison">George Harrison</a> and <a style="color: #725d50;" title="Ringo Starr" href="https://en.wikipedia.org/wiki/Ringo_Starr">Ringo Starr</a>, they became widely regarded as <a class="mw-redirect" style="color: #725d50;" title="The Beatles\' influence on popular culture" href="https://en.wikipedia.org/wiki/The_Beatles%27_influence_on_popular_culture">the foremost and most influential act</a> of the rock era.<sup id="cite_ref-1" class="reference"><a style="color: #725d50;" href="https://en.wikipedia.org/wiki/The_Beatles#cite_note-1">[1]</a></sup> Rooted in <a style="color: #725d50;" title="Skiffle" href="https://en.wikipedia.org/wiki/Skiffle">skiffle</a>, <a style="color: #725d50;" title="Beat music" href="https://en.wikipedia.org/wiki/Beat_music">beat</a>, and 1950s <a style="color: #725d50;" title="Rock and roll" href="https://en.wikipedia.org/wiki/Rock_and_roll">rock and roll</a>, the Beatles later experimented with several <a style="color: #725d50;" title="Music genre" href="https://en.wikipedia.org/wiki/Music_genre">musical styles</a>, ranging from <a style="color: #725d50;" title="Pop music" href="https://en.wikipedia.org/wiki/Pop_music">pop</a> <a style="color: #725d50;" title="Ballad" href="https://en.wikipedia.org/wiki/Ballad">ballads</a> and <a style="color: #725d50;" title="Music of India" href="https://en.wikipedia.org/wiki/Music_of_India">Indian music</a> to <a style="color: #725d50;" title="Psychedelic music" href="https://en.wikipedia.org/wiki/Psychedelic_music">psychedelia</a> and <a style="color: #725d50;" title="Hard rock" href="https://en.wikipedia.org/wiki/Hard_rock">hard rock</a>, often incorporating <a style="color: #725d50;" title="Classical music" href="https://en.wikipedia.org/wiki/Classical_music">classical</a> elements and unconventional<a style="color: #725d50;" title="The Beatles\' recording technology" href="https://en.wikipedia.org/wiki/The_Beatles%27_recording_technology">recording techniques</a> in innovative ways. In the early 1960s, their enormous popularity first emerged as "<a style="color: #725d50;" title="Beatlemania" href="https://en.wikipedia.org/wiki/Beatlemania">Beatlemania</a>", but as the group\'s music grew in sophistication, led by primary songwriters <a style="color: #725d50;" title="Lennon&ndash;McCartney" href="https://en.wikipedia.org/wiki/Lennon%E2%80%93McCartney">Lennon and McCartney</a>, they came to be perceived as an embodiment of the ideals shared by the <a style="color: #725d50;" title="Counterculture of the 1960s" href="https://en.wikipedia.org/wiki/Counterculture_of_the_1960s">counterculture of the 1960s</a>.</span></p>\r\n<p style="text-align: justify;"><span class="example2" style="color: #725d50;">The Beatles built their reputation playing clubs in Liverpool and <a style="color: #725d50;" title="Hamburg" href="https://en.wikipedia.org/wiki/Hamburg">Hamburg</a> over a three-year period from 1960, with <a style="color: #725d50;" title="Stuart Sutcliffe" href="https://en.wikipedia.org/wiki/Stuart_Sutcliffe">Stuart Sutcliffe</a> initially serving as bass player. The core of Lennon, McCartney and Harrison went through a succession of drummers, including <a style="color: #725d50;" title="Pete Best" href="https://en.wikipedia.org/wiki/Pete_Best">Pete Best</a>, before asking Starr to join them. Manager <a style="color: #725d50;" title="Brian Epstein" href="https://en.wikipedia.org/wiki/Brian_Epstein">Brian Epstein</a>moulded them into a professional act, and producer <a style="color: #725d50;" title="George Martin" href="https://en.wikipedia.org/wiki/George_Martin">George Martin</a> guided and developed their recordings, greatly expanding their popularity in the United Kingdom after their first hit, "<a style="color: #725d50;" title="Love Me Do" href="https://en.wikipedia.org/wiki/Love_Me_Do">Love Me Do</a>", in late 1962. They acquired the nickname "the Fab Four" as Beatlemania grew in Britain the next year, and by early 1964 became international stars, leading the "<a style="color: #725d50;" title="British Invasion" href="https://en.wikipedia.org/wiki/British_Invasion">British Invasion</a>" of the United States pop market. From 1965 onwards, the Beatles produced increasingly innovative recordings, including the albums <a style="color: #725d50;" title="Rubber Soul" href="https://en.wikipedia.org/wiki/Rubber_Soul">Rubber Soul</a> (1965), <a style="color: #725d50;" title="Revolver (Beatles album)" href="https://en.wikipedia.org/wiki/Revolver_(Beatles_album)">Revolver</a> (1966), <a style="color: #725d50;" title="Sgt. Pepper\'s Lonely Hearts Club Band" href="https://en.wikipedia.org/wiki/Sgt._Pepper%27s_Lonely_Hearts_Club_Band">Sgt. Pepper\'s Lonely Hearts Club Band</a> (1967), <a style="color: #725d50;" title="The Beatles (album)" href="https://en.wikipedia.org/wiki/The_Beatles_(album)">The Beatles</a> (commonly known as the White Album, 1968) and <a style="color: #725d50;" title="Abbey Road" href="https://en.wikipedia.org/wiki/Abbey_Road">Abbey Road</a> (1969).</span></p>\r\n<p style="text-align: justify;"><span class="example2" style="color: #725d50;">After <a class="mw-redirect" style="color: #725d50;" title="The Beatles\' break-up" href="https://en.wikipedia.org/wiki/The_Beatles%27_break-up">their break-up</a> in 1970, they each enjoyed successful musical careers of varying lengths. McCartney and Starr, the surviving members, remain musically active. Lennon was <a style="color: #725d50;" title="Death of John Lennon" href="https://en.wikipedia.org/wiki/Death_of_John_Lennon">shot and killed</a> in December 1980, and Harrison died of lung cancer in November 2001.</span></p>', NULL, 0, '2016-11-23 09:28:56', '2016-11-23 09:50:15', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 37, 0, 'Anh Sơn', 'thiet-ke-can-cc-royalcity', '', 1, 0, 0, NULL, NULL),
(40, 'Thiết kế căn cc Capital, 102 Trường Chinh', 'CLinhTruongChinh', NULL, NULL, NULL, 0, 0, '2016_11_23_f6b2cfd3f1.jpg', '', '', '<p style="text-align: justify;"><span class="example2" style="color: #725d50;">The Beatles were an English <a style="color: #725d50;" title="Rock music" href="https://en.wikipedia.org/wiki/Rock_music">rock</a> band, formed in <a style="color: #725d50;" title="Liverpool" href="https://en.wikipedia.org/wiki/Liverpool">Liverpool</a> in 1960. With members <a style="color: #725d50;" title="John Lennon" href="https://en.wikipedia.org/wiki/John_Lennon">John Lennon</a>, <a style="color: #725d50;" title="Paul McCartney" href="https://en.wikipedia.org/wiki/Paul_McCartney">Paul McCartney</a>,<a style="color: #725d50;" title="George Harrison" href="https://en.wikipedia.org/wiki/George_Harrison">George Harrison</a> and <a style="color: #725d50;" title="Ringo Starr" href="https://en.wikipedia.org/wiki/Ringo_Starr">Ringo Starr</a>, they became widely regarded as <a class="mw-redirect" style="color: #725d50;" title="The Beatles\' influence on popular culture" href="https://en.wikipedia.org/wiki/The_Beatles%27_influence_on_popular_culture">the foremost and most influential act</a> of the rock era.<sup id="cite_ref-1" class="reference"><a style="color: #725d50;" href="https://en.wikipedia.org/wiki/The_Beatles#cite_note-1">[1]</a></sup> Rooted in <a style="color: #725d50;" title="Skiffle" href="https://en.wikipedia.org/wiki/Skiffle">skiffle</a>, <a style="color: #725d50;" title="Beat music" href="https://en.wikipedia.org/wiki/Beat_music">beat</a>, and 1950s <a style="color: #725d50;" title="Rock and roll" href="https://en.wikipedia.org/wiki/Rock_and_roll">rock and roll</a>, the Beatles later experimented with several <a style="color: #725d50;" title="Music genre" href="https://en.wikipedia.org/wiki/Music_genre">musical styles</a>, ranging from <a style="color: #725d50;" title="Pop music" href="https://en.wikipedia.org/wiki/Pop_music">pop</a> <a style="color: #725d50;" title="Ballad" href="https://en.wikipedia.org/wiki/Ballad">ballads</a> and <a style="color: #725d50;" title="Music of India" href="https://en.wikipedia.org/wiki/Music_of_India">Indian music</a> to <a style="color: #725d50;" title="Psychedelic music" href="https://en.wikipedia.org/wiki/Psychedelic_music">psychedelia</a> and <a style="color: #725d50;" title="Hard rock" href="https://en.wikipedia.org/wiki/Hard_rock">hard rock</a>, often incorporating <a style="color: #725d50;" title="Classical music" href="https://en.wikipedia.org/wiki/Classical_music">classical</a> elements and unconventional<a style="color: #725d50;" title="The Beatles\' recording technology" href="https://en.wikipedia.org/wiki/The_Beatles%27_recording_technology">recording techniques</a> in innovative ways. In the early 1960s, their enormous popularity first emerged as "<a style="color: #725d50;" title="Beatlemania" href="https://en.wikipedia.org/wiki/Beatlemania">Beatlemania</a>", but as the group\'s music grew in sophistication, led by primary songwriters <a style="color: #725d50;" title="Lennon&ndash;McCartney" href="https://en.wikipedia.org/wiki/Lennon%E2%80%93McCartney">Lennon and McCartney</a>, they came to be perceived as an embodiment of the ideals shared by the <a style="color: #725d50;" title="Counterculture of the 1960s" href="https://en.wikipedia.org/wiki/Counterculture_of_the_1960s">counterculture of the 1960s</a>.</span></p>\r\n<p style="text-align: justify;"><span class="example2" style="color: #725d50;">The Beatles built their reputation playing clubs in Liverpool and <a style="color: #725d50;" title="Hamburg" href="https://en.wikipedia.org/wiki/Hamburg">Hamburg</a> over a three-year period from 1960, with <a style="color: #725d50;" title="Stuart Sutcliffe" href="https://en.wikipedia.org/wiki/Stuart_Sutcliffe">Stuart Sutcliffe</a> initially serving as bass player. The core of Lennon, McCartney and Harrison went through a succession of drummers, including <a style="color: #725d50;" title="Pete Best" href="https://en.wikipedia.org/wiki/Pete_Best">Pete Best</a>, before asking Starr to join them. Manager <a style="color: #725d50;" title="Brian Epstein" href="https://en.wikipedia.org/wiki/Brian_Epstein">Brian Epstein</a>moulded them into a professional act, and producer <a style="color: #725d50;" title="George Martin" href="https://en.wikipedia.org/wiki/George_Martin">George Martin</a> guided and developed their recordings, greatly expanding their popularity in the United Kingdom after their first hit, "<a style="color: #725d50;" title="Love Me Do" href="https://en.wikipedia.org/wiki/Love_Me_Do">Love Me Do</a>", in late 1962. They acquired the nickname "the Fab Four" as Beatlemania grew in Britain the next year, and by early 1964 became international stars, leading the "<a style="color: #725d50;" title="British Invasion" href="https://en.wikipedia.org/wiki/British_Invasion">British Invasion</a>" of the United States pop market. From 1965 onwards, the Beatles produced increasingly innovative recordings, including the albums <a style="color: #725d50;" title="Rubber Soul" href="https://en.wikipedia.org/wiki/Rubber_Soul">Rubber Soul</a> (1965), <a style="color: #725d50;" title="Revolver (Beatles album)" href="https://en.wikipedia.org/wiki/Revolver_(Beatles_album)">Revolver</a> (1966), <a style="color: #725d50;" title="Sgt. Pepper\'s Lonely Hearts Club Band" href="https://en.wikipedia.org/wiki/Sgt._Pepper%27s_Lonely_Hearts_Club_Band">Sgt. Pepper\'s Lonely Hearts Club Band</a> (1967), <a style="color: #725d50;" title="The Beatles (album)" href="https://en.wikipedia.org/wiki/The_Beatles_(album)">The Beatles</a> (commonly known as the White Album, 1968) and <a style="color: #725d50;" title="Abbey Road" href="https://en.wikipedia.org/wiki/Abbey_Road">Abbey Road</a> (1969).</span></p>\r\n<p style="text-align: justify;"><span class="example2" style="color: #725d50;">After <a class="mw-redirect" style="color: #725d50;" title="The Beatles\' break-up" href="https://en.wikipedia.org/wiki/The_Beatles%27_break-up">their break-up</a> in 1970, they each enjoyed successful musical careers of varying lengths. McCartney and Starr, the surviving members, remain musically active. Lennon was <a style="color: #725d50;" title="Death of John Lennon" href="https://en.wikipedia.org/wiki/Death_of_John_Lennon">shot and killed</a> in December 1980, and Harrison died of lung cancer in November 2001.</span></p>', NULL, 0, '2016-11-23 09:49:36', '2016-11-23 09:49:36', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 37, 0, 'Chị Linh', '', '', 1, 0, 0, NULL, NULL),
(41, 'Bộ phòng ngủ Spring', 'DF-PN-01', NULL, NULL, NULL, 0, 52230000, '2016_12_04_5932cb0de9.jpg', '', 'Bộ nội thất phòng ngủ Spring gồm 4 sản phẩm chi tiết: giường, tủ áo, tủ đầu giường, bàn phấn', '<p>fidb&igrave;dnvjfdnvkdfmvdfjv;dfkv,mfdnvdfv,dfvfnvdf,vdfvmdfvdfvfdvndf</p>', NULL, 0, '2016-11-24 02:51:25', '2016-12-04 08:13:14', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 56, 0, '', 'bo-phong-ngu-spring', '', 1, 0, 0, NULL, ''),
(42, 'Bộ phòng ngủ Summer', 'DF-PN-02', NULL, NULL, NULL, 0, 0, '2016_11_24_157205ef5c.jpg', '', '', '', NULL, 0, '2016-11-24 02:58:13', '2016-11-24 02:58:13', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 56, 0, '', '', '', 1, 0, 0, NULL, NULL),
(43, 'Bộ phòng ngủ số 3', 'DF-PN-03', NULL, NULL, NULL, 0, 0, '2016_11_24_b6b644c91c.jpg', '', '', '', NULL, 0, '2016-11-24 03:06:21', '2016-11-24 03:06:21', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 56, 0, '', '', '', 1, 0, 0, NULL, NULL),
(46, 'Bộ phòng ngủ Sunshine', 'DF-PN-06', NULL, NULL, NULL, 0, 0, '2016_11_24_cb35886982.jpg', '', '', '', NULL, 0, '2016-11-24 03:18:11', '2016-11-24 03:18:11', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 56, 0, '', '', '', 1, 0, 0, NULL, NULL),
(47, 'Bộ phòng ngủ Innovation', 'DF-PN-07', NULL, NULL, NULL, 0, 0, '2016_11_24_07a36afb06.jpg', '', '', '', NULL, 0, '2016-11-24 03:39:13', '2016-11-29 14:46:34', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 56, 0, '', 'bo-phong-ngu-innovation', '', 1, 2, 0, NULL, NULL),
(48, 'Bộ phòng ngủ Relax', 'DF-PN-08', NULL, NULL, NULL, 0, 0, '2016_11_24_1870937fc7.jpg', '', '', '', NULL, 0, '2016-11-24 03:40:12', '2016-11-28 06:35:11', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 56, 0, '', '', '', 1, 1, 0, NULL, NULL),
(49, 'Test cai', 'ggg', NULL, NULL, NULL, 0, 100000, '2016_11_29_2d8ffb152d.png', '', '', '<p>day la thong tin mo ta</p>', NULL, 0, '2016-11-29 15:01:48', '2016-12-04 06:47:23', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 11, 0, '', 'test-cai', '', 1, 0, 80000, '2016_12_04_92cacd392d.jpg', 'image home page'),
(50, 'Test cai\r\n', 'ggg', NULL, NULL, NULL, 0, 100000, '2016_11_29_2d8ffb152d.png', '', '', '', NULL, 0, '2016-11-29 15:01:48', '2016-11-29 15:45:26', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 11, 0, '', 'test-cai', '', 1, 0, 80000, NULL, NULL),
(51, 'Test cai\r\n', 'ggg', NULL, NULL, NULL, 0, 100000, '2016_11_29_2d8ffb152d.png', '', '', '', NULL, 0, '2016-11-29 15:01:48', '2016-11-29 15:45:26', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 11, 0, '', 'test-cai', '', 1, 0, 80000, NULL, NULL),
(52, 'Test cai\r\n', 'ggg', NULL, NULL, NULL, 0, 100000, '2016_11_29_2d8ffb152d.png', '', '', '', NULL, 0, '2016-11-29 15:01:48', '2016-11-29 15:45:26', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 11, 0, '', 'test-cai', '', 1, 0, 80000, NULL, NULL),
(53, 'Test cai\r\n', 'ggg', NULL, NULL, NULL, 0, 100000, '2016_11_29_2d8ffb152d.png', '', '', '', NULL, 0, '2016-11-29 15:01:48', '2016-11-29 15:45:26', NULL, 0, '0000-00-00 00:00:00', '', '', '', NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, 0, 0, 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 11, 0, '', 'test-cai', '', 1, 0, 80000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `image_alt`, `sort`) VALUES
(1, 6, '2016_11_10_e36cc63dc3.jpg', NULL, 0),
(2, 6, '2016_11_10_431cffab0f.jpg', NULL, 0),
(3, 7, '2016_11_10_15bf123a18.png', NULL, 0),
(4, 7, '2016_11_10_177f598035.png', NULL, 0),
(5, 14, '2016_11_10_14d53fde22.jpg', NULL, 0),
(6, 14, '2016_11_10_852f7bca19.jpg', NULL, 0),
(7, 14, '2016_11_10_c80625b820.jpg', NULL, 0),
(8, 14, '2016_11_10_3accbc6c7c.jpg', NULL, 0),
(9, 14, '2016_11_10_ffed7a0210.jpg', NULL, 0),
(10, 14, '2016_11_10_b2699ed556.jpg', NULL, 0),
(11, 14, '2016_11_10_7c8c6658f5.jpg', NULL, 0),
(12, 14, '2016_11_10_0eec636704.jpg', NULL, 0),
(13, 14, '2016_11_10_033a8cf668.jpg', NULL, 0),
(14, 17, '2016_11_11_a0e34bd394.png', NULL, 0),
(15, 17, '2016_11_11_556c471827.png', NULL, 0),
(16, 17, '2016_11_11_6771e99b72.png', NULL, 0),
(18, 26, '2016_11_16_fc9776786e.jpg', NULL, 0),
(19, 26, '2016_11_16_aae6d99670.jpg', NULL, 0),
(21, 27, '2016_11_16_1a22a923e3.jpg', NULL, 0),
(22, 27, '2016_11_16_e73e3b2264.jpg', NULL, 0),
(23, 27, '2016_11_16_09141ef994.jpg', NULL, 0),
(24, 37, '2016_11_23_cb49c1bd24.png', NULL, 0),
(25, 37, '2016_11_23_5d99c5ba5c.jpg', NULL, 0),
(26, 37, '2016_11_23_7a14de5678.png', NULL, 0),
(27, 37, '2016_11_23_d6dc90ce49.png', NULL, 0),
(32, 39, '2016_11_23_d8231035b6.jpg', NULL, 0),
(33, 39, '2016_11_23_3c81ec890a.jpg', NULL, 0),
(34, 39, '2016_11_23_0528d84913.jpg', NULL, 0),
(35, 39, '2016_11_23_8f57afb30f.jpg', NULL, 0),
(36, 39, '2016_11_23_c43ce2195d.jpg', NULL, 0),
(37, 39, '2016_11_23_c5081a4d6a.jpg', NULL, 0),
(38, 40, '2016_11_23_c57a5df4b9.jpg', NULL, 0),
(39, 40, '2016_11_23_7ec63490d7.jpg', NULL, 0),
(40, 40, '2016_11_23_465415eb33.jpg', NULL, 0),
(41, 40, '2016_11_23_23f05cf376.jpg', NULL, 0),
(42, 40, '2016_11_23_699cd7a761.jpg', NULL, 0),
(43, 40, '2016_11_23_cdc8324921.jpg', NULL, 0),
(48, 38, '2016_11_24_852eae1aa5.jpg', NULL, 0),
(49, 38, '2016_11_24_277f3d7cee.jpg', NULL, 0),
(50, 38, '2016_11_24_75b0bd226a.jpg', NULL, 0),
(51, 38, '2016_11_24_eaacc518b5.jpg', NULL, 0),
(60, 42, '2016_11_24_5d8ccd4d67.jpg', NULL, 0),
(61, 42, '2016_11_24_9d621fb093.jpg', NULL, 0),
(62, 42, '2016_11_24_1dedae76a7.jpg', NULL, 0),
(63, 42, '2016_11_24_87a671d787.jpg', NULL, 0),
(64, 42, '2016_11_24_ffe5f00349.jpg', NULL, 0),
(65, 42, '2016_11_24_0e02e05c3f.jpg', NULL, 0),
(68, 43, '2016_11_24_2cf43b040e.jpg', NULL, 0),
(69, 43, '2016_11_24_cd5f7f6e2d.jpg', NULL, 0),
(70, 43, '2016_11_24_63dcac7a57.jpg', NULL, 0),
(77, 45, '2016_11_24_2b0e67e1d5.jpg', NULL, 0),
(78, 45, '2016_11_24_6cb85e1e19.jpg', NULL, 0),
(79, 45, '2016_11_24_f2b86cdec8.jpg', NULL, 0),
(80, 45, '2016_11_24_d37a79de87.jpg', NULL, 0),
(81, 45, '2016_11_24_1ce2abe328.jpg', NULL, 0),
(82, 45, '2016_11_24_406f634025.jpg', NULL, 0),
(84, 52, '2016_11_24_de901f891e.jpg', NULL, 0),
(85, 52, '2016_11_24_594975d05f.jpg', NULL, 0),
(86, 44, '2016_11_24_d2ccae3d63.jpg', NULL, 1),
(87, 44, '2016_11_24_dfbc57ee51.jpg', NULL, 0),
(88, 44, '2016_11_24_3b36998e83.jpg', NULL, 2),
(89, 44, '2016_11_24_f43d49c8be.jpg', NULL, 0),
(90, 44, '2016_11_24_850bef5dbe.jpg', NULL, 0),
(91, 44, '2016_11_24_1c3cfc40a9.jpg', NULL, 0),
(92, 49, '2016_11_29_7ea4e13b2d.png', NULL, 0),
(93, 49, '2016_11_29_64a96374d2.png', NULL, 0),
(94, 49, '2016_11_29_a2b56f504b.png', NULL, 0),
(95, 49, '2016_11_29_3ab7ae8536.png', NULL, 0),
(96, 41, '2016_12_04_999f89a819.jpg', NULL, 0),
(97, 41, '2016_12_04_c3bb6309b7.jpg', NULL, 0),
(98, 41, '2016_12_04_1d8f9c1f42.jpg', NULL, 0),
(99, 41, '2016_12_04_4583b43501.jpg', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_metas`
--

CREATE TABLE `product_metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teaser` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `spec` text COLLATE utf8_unicode_ci,
  `spec_json` text COLLATE utf8_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `raovat_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `json_tags_vg` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Super Admin', 'Super administrator role', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'root', 'Root', 'Quyền quản trị cao nhất', '2016-03-09 04:20:00', '2016-03-09 04:20:00'),
(7, 'marketing', 'Marketing', 'Marketing', '2016-03-09 04:22:38', '2016-11-22 15:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(1, 6),
(2, 1),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone_2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone_3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `skype_1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `skype_2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `skype_3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `yahoo_1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `yahoo_2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `yahoo_3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `js_codes` text COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `googleplus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tumblr` text COLLATE utf8_unicode_ci,
  `pinterest` text COLLATE utf8_unicode_ci,
  `instagram` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `name`, `address`, `email_1`, `email_2`, `email_3`, `hotline`, `phone_1`, `phone_2`, `phone_3`, `skype_1`, `skype_2`, `skype_3`, `yahoo_1`, `yahoo_2`, `yahoo_3`, `short_description`, `description`, `contact`, `meta_title`, `meta_keyword`, `meta_description`, `js_codes`, `facebook`, `googleplus`, `twitter`, `linkin`, `youtube`, `tumblr`, `pinterest`, `instagram`) VALUES
(1, '2016_12_09_f162d99b14.png', 'Nội thất DEFA Phong cách Châu Âu', 'Tầng 3, Toà Nhà HCMCC, Số 02 Văn Cao, Ba Đình, Hà Nội', 'info@defa.com.vn', '', '', '04 625 88 988', '+84.4 62 588 988', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://www.facebook.com/DEFAnoithatphongcachchauau', '', '', '', '', 'tum', 'pin', 'in');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'cong.itsoft@gmail.com', '2016-11-10 07:00:00', '2016-11-10 07:00:00'),
(2, 'cong.itsoft@gmail.com', '2016-11-10 07:00:30', '2016-11-10 07:00:30'),
(3, 'cong.itsoft@gmail.com', '2016-11-10 07:01:00', '2016-11-10 07:01:00'),
(4, 'cong.itsoft@gmail.com', '2016-11-10 07:01:17', '2016-11-10 07:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`, `meta_title`, `meta_keywords`, `meta_description`, `slug`) VALUES
(1, 'iphone 5s', '2016-01-13 07:51:47', '2016-01-19 03:31:28', NULL, NULL, NULL, NULL),
(2, 'iphone 6', '2016-01-13 07:52:02', '2016-01-19 03:31:24', NULL, NULL, NULL, NULL),
(3, 'HTC One M8', '2016-01-13 07:52:14', '2016-01-19 03:31:19', NULL, NULL, NULL, NULL),
(4, 'iphone 5', '2016-01-13 07:52:23', '2016-01-19 03:31:15', NULL, NULL, NULL, NULL),
(5, 'Sony Xperia Z3', '2016-01-13 07:52:49', '2016-01-19 03:31:09', NULL, NULL, NULL, NULL),
(6, 'Samsung Galaxy S6', '2016-01-13 07:53:14', '2016-01-19 03:31:04', NULL, NULL, NULL, NULL),
(7, 'sony xperia z4', '2016-01-13 07:55:20', '2016-01-19 03:30:54', NULL, NULL, NULL, NULL),
(8, 'htc one m9', '2016-01-13 07:55:40', '2016-01-19 03:30:49', NULL, NULL, NULL, NULL),
(9, 'lg g4', '2016-01-13 07:56:04', '2016-01-19 03:30:44', NULL, NULL, NULL, NULL),
(10, 'microsoft lumia 1030', '2016-01-13 07:56:39', '2016-01-19 03:26:28', NULL, NULL, NULL, NULL),
(11, 'xiaomi 5', '2016-01-19 03:35:29', '2016-03-02 10:14:19', NULL, NULL, NULL, NULL),
(12, 'Samsung Galaxy Note 5', '2016-01-19 03:36:18', '2016-01-19 03:42:52', NULL, NULL, NULL, NULL),
(13, 'Nexus 6p', '2016-01-19 03:37:09', '2016-01-19 03:42:48', NULL, NULL, NULL, NULL),
(14, 'Lg v10', '2016-01-19 03:37:28', '2016-01-19 03:42:45', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags_positions`
--

CREATE TABLE `tags_positions` (
  `tag_id` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags_positions`
--

INSERT INTO `tags_positions` (`tag_id`, `position`) VALUES
(10, 1),
(10, 2),
(9, 1),
(9, 2),
(8, 1),
(8, 2),
(7, 1),
(6, 1),
(6, 2),
(5, 1),
(4, 1),
(4, 2),
(3, 1),
(3, 2),
(2, 1),
(2, 2),
(1, 1),
(1, 2),
(14, 2),
(13, 2),
(12, 2),
(11, 1),
(11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `active` tinyint(4) DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `shop_id` int(11) NOT NULL DEFAULT '0',
  `money` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `nickname`, `avatar`, `phone`, `address`, `gender`, `active`, `remember_token`, `created_at`, `updated_at`, `shop_id`, `money`) VALUES
(1, 'admin@nguyenhats.com', '$2y$10$0E8QCHmUUiZfEy1HrESjFuHKgAoyazbj7fYec/p/Org6kwiZgtUsO', 'Administrator', 'Administrator', '2016_04_04_2a82d7948c.png', '0934577886', '15/3 Ngọc Hồi, Hoàng Mai, Hà Nội', 0, 1, 'eHzmqRDzUF01IrSnfNuVTtiutZlkQ81AlP2A8M9U2ZRpFSvgnqGfAETdBQYD', '0000-00-00 00:00:00', '2016-11-23 14:31:01', 0, 0),
(2, 'marketing@defa.com.vn', '$2y$10$4axt5FxZfiXlH9auYnFvC.PoOyA8Ktz.xq5h5SXNuZgE7dSEatwQi', 'Marketing Team', 'Marketing Team', '', '901452368', 'Ha Noi, Viet Nam', 0, 1, 'ZpM666LIUteJaNjXVNzCcEBSxZhOpTeL6VO4ZGKsJGqkcUY87CWNgWvz5Hl0', '2016-11-17 14:43:05', '2016-11-23 06:10:30', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_position_index` (`position`),
  ADD KEY `banners_page_index` (`page`),
  ADD KEY `banners_status_index` (`status`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_products`
--
ALTER TABLE `categories_products`
  ADD KEY `categories_products_category_id_index` (`category_id`),
  ADD KEY `categories_products_product_id_index` (`product_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cit_id`);

--
-- Indexes for table `ips`
--
ALTER TABLE `ips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `start` (`start`),
  ADD KEY `end` (`end`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pag_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `active` (`active`),
  ADD KEY `hot` (`hot`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price` (`price`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_metas`
--
ALTER TABLE `product_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=769;
--
-- AUTO_INCREMENT for table `ips`
--
ALTER TABLE `ips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `product_metas`
--
ALTER TABLE `product_metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
