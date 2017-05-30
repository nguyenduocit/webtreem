-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2017 lúc 05:28 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoptreem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `role_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avata` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_ad` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `role_id`, `name`, `email`, `phone`, `address`, `password`, `avata`, `status`, `created_at`, `updated_ad`) VALUES
(9, ' 1', 'nguyen van duoc', 'admin@gmail.com', 1247578578, 'gỵighjfgjgh Bình', '25f9e794323b453885f5181f1b624d0b', 'images (1).jpg', 1, '2017-05-05 09:22:24', '2017-05-05 02:22:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` tinyint(4) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `title`, `icon`, `sort_order`, `status`, `created_at`) VALUES
(6, 0, 'Quà tặng miễn phí ', 'qua-tang-mien-phi', ' ', 1, 1, '0000-00-00 00:00:00'),
(8, 0, 'Quần  áo bé trai', 'Quần  áo bé trai', ' ', 2, 1, '0000-00-00 00:00:00'),
(9, 8, 'Đất nặn thông minh ', 'Đất nặn thông minh ', ' ', 1, 1, '0000-00-00 00:00:00'),
(10, 0, 'quần áo bé gái', 'quần áo bé gái', ' ', 3, 1, '0000-00-00 00:00:00'),
(11, 6, 'Quà tặng cho đơn hàng từ 300.000 đ', 'Quà tặng cho đơn hàng từ 300.000 đ', ' ', 1, 1, '0000-00-00 00:00:00'),
(12, 6, 'Quà tặng miễn phí cho khách hàng', 'qua-tang-mien-phi-cho-khach-hang', ' ', 2, 1, '0000-00-00 00:00:00'),
(13, 6, 'Quà tặng cho đơn hàng từ 1.500.000 đ', 'qua-tang-cho-don-hang-tu-1-500-000-d', ' ', 3, 1, '0000-00-00 00:00:00'),
(14, 0, 'đồ sơ sinh', 'đồ sơ sinh', ' ', 4, 1, '0000-00-00 00:00:00'),
(16, 10, 'đồ gia dung trong nha', 'do-gia-dung-trong-nha', ' ', 1, 1, '0000-00-00 00:00:00'),
(17, 14, 'Hàng khuyến mại giá rẻ', 'hang-khuyen-mai-gia-re', NULL, 1, 1, '0000-00-00 00:00:00'),
(20, 0, 'test ', 'test', NULL, 5, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(5) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `intro`, `content`, `image_link`, `status`, `created`) VALUES
(13, 'Đang mang thai nên dùng thuốc trị táo bón nào?', 'Hỏi: Em đang mang thai , nhưng gần đây em hay bị táo bón. Có loại thuốc chữa táo bón nào dùng được cho người có thai như em không?', ' Có nhiều loại thuốc trị táo bón an toàn với thai phụ\r\n\r\nTrả lời: Một số thuốc chữa táo bón có thể dùng được cho người có thai như folax, sorbitol… Folax là thuốc chống táo bón thuộc loại thuốc cao phân tử hút nước và làm trương nở phân. Đây là thuốc an toàn dùng cho phụ nữ có thai (bởi vì nó không hấp thu). Tuy nhiên khi dùng cần chú ý, thuốc sẽ hút nước làm cho khối phân to lên, kích thích vào đại tràng sích-ma làm cho dễ đi ngoài hơn, nên khi dùng các thuốc này phải uống với nhiều nước. Nếu không cung cấp đủ nước thuốc sẽ hút nước ở trong lòng ruột, từ tế bào ra sẽ rất nguy hiểm). Không nên dùng các thuốc kích thích trực tiếp nhu động ruột (như bisacodyl) và các thuốc thụt tại chỗ. Ngoài thuốc ra, việc điều chỉnh chế độ ăn uống, nghỉ ngơi thích hợp cũng có tác dụng tốt trong việc cải thiện tình trạng táo bón này. ', '125365.jpeg', 1, '2017-05-05 07:29:41'),
(14, 'Mang bầu có nên ăn mướp đắng?', 'Hỏi: Tôi mang thai được 2 tháng. Không hiểu sao tôi cảm thấy người rất nóng. Nghe nói mướp đắng là món ăn thanh nhiệt tốt, nhưng tôi vẫn e ngại không dám dùng vì có ý kiến lại nói mướp đắng độc với thai nhi. Vậy xin quý báo lời khuyên?', '  Trả lời: Chúc mừng bạn đang mang thai và sắp có em bé. Về vấn đề bạn hỏi xin được giải thích như sau. Bạn đang mang thai được 2 tháng, nghĩa là bạn đang ở thời kỳ đầu của phụ nữ mang thai (thời kỳ nghén). Trong thời kỳ này, người mẹ chưa quen với sự xuất hiện của một bào thai trong cơ thể, lại do việc thay đổi chuyển hoá, nội tiết tố gây ra những triệu chứng khó chịu trong thời kỳ đầu này. Một trong các biểu hiện khó chịu đặc trưng là buồn nôn, nôn thậm chí là thấy người “nóng ran” hơn bình thường. Bạn đừng quá lo lắng vì nó chỉ là dấu hiệu của thai kỳ bình thường mà thôi.\r\n\r\nMướp đắng là một thực phẩm, thảo dược rất tốt với nhiều công dụng như hỗ trợ điều trị bệnh tiểu đường, ung thư, viêm khớp, ngứa ngoài da và lớn nhất là tác dụng thanh nhiệt. Nhưng nó lại gây ra hiện tượng tăng co bóp dạ dày và tử cung. Điều này dẫn tới hậu quả là dễ gây sảy thai, đẻ non ở những phụ nữ có nguy cơ cao như tử cung ngả sau, tử cung có sẹo, nạo phá thai nhiều lần. Mặc dù nghiên cứu chưa chỉ rõ chất nào trong mướp đắng có thể gây tác hại này nhưng thực nghiệm trên chuột cho thấy, mướp đắng liều cao có thể gây ra quái thai ở thai nhi chuột. Vì vậy các nhà khoa học đã đưa ra một cảnh báo là phụ nữ mang thai không nên ăn nhiều mướp đắng.\r\n\r\nĐể thanh nhiệt, bạn có thể dùng một số thực phẩm khác để thay thế như đỗ đen, rau má, rau diếp cá, nhân trần…  ', 'cw02.jpg', 1, '2017-05-05 07:29:54'),
(10, 'sdfgsdfsdf', 'sdfsdfsdf', 'sdfsdfsdf', 'gffghfghc.jpg', 1, '0000-00-00 00:00:00'),
(11, 'Đang mang thai nên dùng thuốc trị táo bón nào?', 'Hỏi: Em đang mang thai , nhưng gần đây em hay bị táo bón. Có loại thuốc chữa táo bón nào dùng được cho người có thai như em không?', ' Có nhiều loại thuốc trị táo bón an toàn với thai phụ\r\n\r\nTrả lời: Một số thuốc chữa táo bón có thể dùng được cho người có thai như folax, sorbitol… Folax là thuốc chống táo bón thuộc loại thuốc cao phân tử hút nước và làm trương nở phân. Đây là thuốc an toàn dùng cho phụ nữ có thai (bởi vì nó không hấp thu). Tuy nhiên khi dùng cần chú ý, thuốc sẽ hút nước làm cho khối phân to lên, kích thích vào đại tràng sích-ma làm cho dễ đi ngoài hơn, nên khi dùng các thuốc này phải uống với nhiều nước. Nếu không cung cấp đủ nước thuốc sẽ hút nước ở trong lòng ruột, từ tế bào ra sẽ rất nguy hiểm). Không nên dùng các thuốc kích thích trực tiếp nhu động ruột (như bisacodyl) và các thuốc thụt tại chỗ. Ngoài thuốc ra, việc điều chỉnh chế độ ăn uống, nghỉ ngơi thích hợp cũng có tác dụng tốt trong việc cải thiện tình trạng táo bón này. ', '1280x720-OGC.jpg', 1, '2017-05-05 07:04:04'),
(15, 'test', 'test', ' test fgdfgsdgdf\r\ndfgsdfgdfg', '1466232-10201165069478037-2110813118-n-1388253389351.jpg', 1, '2017-05-16 16:05:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordere`
--

CREATE TABLE `ordere` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ordere`
--

INSERT INTO `ordere` (`id`, `product_id`, `qty`, `name`, `price`, `image`, `amount`, `transaction_id`, `status`, `created_at`) VALUES
(13, 16, 1, 'Ghế nhún Baby Care cho bé', 44, '1434343689-jakj7_exhy.jpg', 44, 13, 0, '2017-05-04 00:41:15'),
(14, 14, 1, 'Bộ Locknlock thủy tinh chịu nhiệt 6 món Samsung', 524960, 'DSC_7687.JPG', 524960, 14, 0, '2017-05-04 00:50:21'),
(15, 16, 1, 'Ghế nhún Baby Care cho bé', 44, '1434343689-jakj7_exhy.jpg', 44, 15, 0, '2017-05-04 00:51:05'),
(16, 13, 1, 'Bập bênh tuần lộc Vinamilk', 1800000, '15193569_1114640511989616_1216360158402682752_n.jpg', 1800000, 16, 0, '2017-05-04 00:51:55'),
(17, 16, 1, 'Ghế nhún Baby Care cho bé', 44, '1434343689-jakj7_exhy.jpg', 44, 17, 0, '2017-05-04 00:54:06'),
(18, 7, 1, 'dsfdsf', 4407, '13876235_846683595467091_4276046732209911185_n.jpg', 4407, 18, 0, '2017-05-04 16:59:34'),
(19, 14, 1, 'Bộ Locknlock thủy tinh chịu nhiệt 6 món Samsung', 524960, 'DSC_7687.JPG', 524960, 18, 0, '2017-05-04 16:59:34'),
(20, 6, 1, 'gương soi ', 294, '19826769293_0825467091_b.jpg', 294, 18, 0, '2017-05-04 16:59:34'),
(21, 19, 1, 'Set váy yếm áo phông cho bé gái (2-5T)', 151000, 'set-vay-yem-cho-be-gai-1.jpg', 151000, 18, 0, '2017-05-06 21:14:17'),
(22, 14, 1, 'Bộ Locknlock thủy tinh chịu nhiệt 6 món Samsung', 524960, 'DSC_7687.JPG', 524960, 19, 0, '2017-05-06 21:24:32'),
(23, 12, 1, 'Bộ 12 Món Tô, Bát, Đĩa Sứ hoa đào Panasonic', 23889, 'images.jpg', 23889, 20, 0, '2017-05-06 21:32:27'),
(24, 13, 2, 'Bập bênh tuần lộc Vinamilk', 1800000, '15193569_1114640511989616_1216360158402682752_n.jpg', 3600000, 20, 0, '2017-05-06 21:32:27'),
(25, 8, 1, 'Bình sữa dữ nhiệt', 6, 'profile_pic02.jpg', 6, 20, 0, '2017-05-06 21:32:27'),
(26, 14, 1, 'Bộ Locknlock thủy tinh chịu nhiệt 6 món Samsung', 524960, 'DSC_7687.JPG', 524960, 21, 0, '2017-05-06 21:33:05'),
(27, 8, 1, 'Bình sữa dữ nhiệt', 6, 'profile_pic02.jpg', 6, 1, 0, '2017-05-12 07:09:05'),
(28, 8, 1, 'Bình sữa dữ nhiệt', 6, 'profile_pic02.jpg', 6, 2, 0, '2017-05-12 07:10:18'),
(29, 8, 1, 'Bình sữa dữ nhiệt', 6, 'profile_pic02.jpg', 6, 3, 0, '2017-05-12 07:11:13'),
(30, 18, 1, 'Set 3 khăn Kiba Thái Lan cỡ to 1,4m (loại 1)', 3456789, '15178168_1114640448656289_7519374413140251760_n.jpg', 3456789, 4, 0, '2017-05-12 07:29:09'),
(31, 12, 1, 'Bộ 12 Món Tô, Bát, Đĩa Sứ hoa đào Panasonic', 23889, 'images.jpg', 23889, 4, 0, '2017-05-12 07:29:09'),
(32, 14, 1, 'Bộ Locknlock thủy tinh chịu nhiệt 6 món Samsung', 524960, 'DSC_7687.JPG', 524960, 4, 0, '2017-05-12 07:29:09'),
(33, 8, 7, 'Bình sữa dữ nhiệt', 6, 'profile_pic02.jpg', 43, 5, 0, '2017-05-12 19:51:12'),
(34, 8, 100, 'Bình sữa dữ nhiệt', 6, 'profile_pic02.jpg', 608, 6, 0, '2017-05-13 05:29:22'),
(35, 12, 9, 'Bộ 12 Món Tô, Bát, Đĩa Sứ hoa đào Panasonic', 23889, 'images.jpg', 215003, 7, 0, '2017-05-16 15:43:32'),
(36, 12, 7, 'Bộ 12 Món Tô, Bát, Đĩa Sứ hoa đào Panasonic', 23889, 'images.jpg', 167225, 8, 0, '2017-05-16 16:08:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text,
  `qty` int(11) DEFAULT NULL,
  `hot` tinyint(4) DEFAULT '0',
  `buyed` int(5) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `thunbar` varchar(255) DEFAULT NULL,
  `status` char(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `category_id`, `content`, `qty`, `hot`, `buyed`, `view`, `thunbar`, `status`, `created_at`, `updated_at`) VALUES
(7, 'dsfdsf', 'dsfdsf', 4543, 3, 10, '345345', 3435, 0, 71, NULL, '13876235_846683595467091_4276046732209911185_n.jpg', '1', '2017-04-30 17:18:39', '2017-04-30 17:18:39'),
(8, 'Bình sữa dữ nhiệt', 'binh-sua-du-nhiet', 8, 24, 9, 'rẻewrewrwer', 83, 1, 2, NULL, 'profile_pic02.jpg', '1', '2017-04-30 17:19:46', '2017-04-30 17:19:46'),
(9, 'test', 'test', 5000000, 10, 11, 'sdgdsgsdg', 0, 0, 9, NULL, 'Capture.PNG', '1', '2017-05-01 17:03:36', '2017-05-01 17:03:36'),
(10, 'Bộ bát đĩa Ngọc Phú Sỹ 19 món Sony', 'bo-bat-dia-ngoc-phu-sy-19-mon-sony', 59, 2, 10, 'fdsfsd', 58, 1, 1, NULL, 'main.jpg', '1', '2017-05-01 17:12:29', '2017-05-01 17:12:29'),
(11, 'Xe đẩy trẻ em 3 bánh siêu gọn', 'xe-day-tre-em-3-banh-sieu-gon', 8000000, 5, 13, 'dsdfsdf', 3455, 0, 4, NULL, '4gatu-all.png', '1', '2017-05-01 17:18:34', '2017-05-01 17:18:34'),
(12, 'Bộ 12 Món Tô, Bát, Đĩa Sứ hoa đào Panasonic', 'bo-12-mon-to-bat-dia-su-hoa-dao-panasonic', 43435, 45, 12, 'etretert', 50, 1, 12, NULL, 'images.jpg', '1', '2017-05-01 17:24:20', '2017-05-01 17:24:20'),
(13, 'Bập bênh tuần lộc Vinamilk', 'bap-benh-tuan-loc-vinamilk', 2000000, 10, 9, '54646', 0, 0, 14, NULL, '15193569_1114640511989616_1216360158402682752_n.jpg', '1', '2017-05-01 17:46:46', '2017-05-01 17:46:46'),
(14, 'Bộ Locknlock thủy tinh chịu nhiệt 6 món Samsung', 'bo-locknlock-thuy-tinh-chiu-nhiet-6-mon-samsung', 576879, 9, 11, 'ssdasd', 37, 0, 5, NULL, 'DSC_7687.JPG', '1', '2017-05-01 17:49:14', '2017-05-01 17:49:14'),
(15, 'Xe 3 bánh trẻ em kèm bình nước', 'xe-3-banh-tre-em-kem-binh-nuoc', 43646, 5, 12, 'êttwer', 453, 0, 0, NULL, '1436820020-uojo9_mtey.jpg', '1', '2017-05-01 17:51:23', '2017-05-01 17:51:23'),
(17, 'Ghế nhún Baby Care cho bé', 'ghe-nhun-baby-care-cho-be', 809, 78, 16, '7887', 78, 1, NULL, NULL, 'anh-girl-xinh-facebook-10.jpg', '1', '2017-05-01 17:53:44', '2017-05-01 17:53:44'),
(18, 'Set 3 khăn Kiba Thái Lan cỡ to 1,4m (loại 1)', 'set-3-khan-kiba-thai-lan-co-to-1-4m-loai-1', 3456789, 0, 16, 'àdghm', 426, 0, NULL, NULL, '15178168_1114640448656289_7519374413140251760_n.jpg', '1', '2017-05-01 18:14:21', '2017-05-01 18:14:21'),
(19, 'Set váy yếm áo phông cho bé gái (2-5T)', 'Set váy yếm áo phông cho bé gái (2-5T)', 151000, 0, 17, 'Thông tin nổi bật của set váy yếm áo phông cho bé gái (2-5T)\r\n\r\n- Chất vải: yếm bằng vải bò nhưng vẫn mềm mại, giữ dáng, tạo cảm giác thoải mái cho bé khi mặc. Áo phông bằng vải cotton\r\n\r\n- Gồm: 1 yếm bò + 1 áo phông ngắn tay\r\n\r\n- Kiểu dáng thời trang vừa mang đến nét khỏe khoắn nhưng vẫn nữ tính, điệu đà cho bé\r\n\r\n- Đường chỉ may nổi bật, tỉ mỉ, cẩn thận\r\n\r\n- Phù hợp cho trẻ mặc khi đi học, đi chơi, đi dạo phố, du lịch\r\n\r\n- Dành cho bé gái từ 2 - 5 tuổi\r\n\r\n- Xuất xứ: Quảng Châu - Trung Quốc', 50, 0, NULL, NULL, 'set-vay-yem-cho-be-gai-1.jpg', '1', '2017-05-06 07:55:11', '2017-05-06 07:55:11'),
(20, 'Bộ lanh bé trai SB03 (1-4T)', 'Bộ lanh bé trai SB03 (1-4T)', 55000, 0, 17, 'Điểm nổi bật của bộ lanh bé trai SB03 (1-4T)\r\n\r\n- Chất liệu: vải lanh với đặc tính nhẹ, mát, dễ giặt, nhanh khô\r\n\r\n- Dành cho bé từ 1 - 4 tuổi\r\n\r\n- Bộ đồ gồm một áo và 1 quần đùi chun mềm mại\r\n\r\n- Kiểu dáng dễ thương, rộng rãi cho bé thoải mái vui chơi trong những ngày hè oi bức\r\n\r\n- Bộ quần áo làm bằng vải lanh mềm, mịn, thoáng mát, thấm hút mồ hôi, không gây kích ứng da bé, rất thích hợp cho mùa hè.\r\n\r\n- Xuất xứ: Việt Nam', 20, 1, NULL, NULL, 'bo-lanh-be-trai-1.jpg', '1', '2017-05-06 08:01:55', '2017-05-06 08:01:55'),
(21, 'Bộ lanh lụa Kata cho bé gái (1-5T)', 'Bộ lanh lụa Kata cho bé gái (1-5T)', 76000, 0, 17, 'Điểm nổi bật của bộ lanh lụa Kata cho bé gái (1-5T)\r\n\r\n- Chất vải: vải lanh thấm mồ hôi, mặc rất mát vào mùa hè cho bé thoải mái vận động cả ngày\r\n\r\n- Gồm 1 áo sát nách + 1 quần lưng chun\r\n\r\n- Size phù hợp với các bé từ 1 - 5 tuổi.\r\n\r\n- Họa tiết in xinh xắn, tăng thêm nét đáng yêu cho trẻ\r\n\r\n- Đường may được chăm chút tỉ mỉ, đảm bảo độ bền của sản phẩm.\r\n\r\n- Bộ quần áo có nhiều họa tiết áo quần rất xinh xắn để mẹ thỏa sức chọn đúng ý con yêu.\r\n\r\n- Kiểu dáng xinh xắn, dễ thương, rộng rãi cho bé thoải mái vui chơi trong những ngày hè oi bức\r\n\r\n- Phù hợp cho bé mặc khi ở nhà, đi ngủ\r\n\r\n- Xuất xứ: Việt Nam\r\n\r\n', 25, 0, NULL, NULL, 'bo-quan-ao-lanh-kata-be-gai-1.jpg', '1', '2017-05-06 08:09:22', '2017-05-06 08:09:22'),
(24, 'test 1.12', 'test ', 50000000, 15, 11, 'etyertert', 20, 0, NULL, NULL, '9x-a-hau-nguoi-viet-1.jpg', '1', '2017-05-16 16:04:06', '2017-05-16 16:04:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `permission`, `created_at`) VALUES
(1, 'Subper admin', 'Subper admin', 'All', '2017-03-14 06:43:56'),
(2, 'Admin', 'Admin', 'trang chu, them bai viết , xem bài viết ,', '2017-03-14 06:56:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `active` tinyint(5) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `name`, `email`, `address`, `phone`, `amount`, `message`, `active`, `created_at`) VALUES
(1, 'sdsdfsdf', 'nguyenvanduoc071994@gmail.com', 'sdfsdf', '5423535553', 6.08, NULL, 1, '2017-05-12 07:09:05'),
(2, 'etrrgdfg', 'admin@gmail.com', 'sgsdgsdf', '01659020898', 6.08, NULL, 1, '2017-05-12 07:10:18'),
(3, 'sdfgsdfsdf', 'admin@gmail.com', 'sdfsdfsdf', '01659020898', 6.08, NULL, 1, '2017-05-12 07:11:13'),
(4, 'fdsf', 'admin@gmail.com', 'sdfsdfsdf', '01659020898', 4005640, NULL, 0, '2017-05-12 07:29:09'),
(5, 'sfsdfsdfsdfsd', 'admin@gmail.com', 'fgdfgdfgdf', '01659020898', 42.56, NULL, 0, '2017-05-12 19:51:12'),
(7, 'test', 'admin@gmail.com', 'fgdfgdfgdf', '01659020898', 215003, 'sdsdfsdfsdf', 1, '2017-05-16 15:43:32'),
(8, 'test', 'admin@gmail.com', 'dfgdfgdfg', '01659020898', 167225, NULL, 0, '2017-05-16 16:08:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `address`, `created_at`) VALUES
(4, 'admin', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', '123456789', 'admin', '2017-05-10 16:48:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `news` ADD FULLTEXT KEY `title` (`title`);

--
-- Chỉ mục cho bảng `ordere`
--
ALTER TABLE `ordere`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT cho bảng `ordere`
--
ALTER TABLE `ordere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
