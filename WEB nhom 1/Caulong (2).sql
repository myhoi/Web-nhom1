-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 04:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caulong`
--

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` varchar(200) DEFAULT NULL,
  `mat_khau` varchar(32) DEFAULT NULL,
  `ma_vai_tro` int(11) DEFAULT NULL,
  `thoi_gian_tao` datetime DEFAULT NULL,
  `thoi_gian_cap_nhat` datetime DEFAULT NULL,
  `da_xoa` int(11) DEFAULT 0,
  `hoten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `username`, `email`, `so_dien_thoai`, `dia_chi`, `mat_khau`, `ma_vai_tro`, `thoi_gian_tao`, `thoi_gian_cap_nhat`, `da_xoa`, `hoten`) VALUES
(1, 'huynh_nhat_huy', 'huy@example.com', '0912345678', '789 Đường GHI, Quận LMN', '1234', 2, '2025-05-12 14:09:25', NULL, 0, 'Huỳnh Nhật Huy'),
(2, 'dang_quoc_hung', 'hung@example.com', '0987654320', '101 Đường OPQ, Quận RST', 'abcd', 1, '2025-05-12 14:09:25', NULL, 0, 'Đặng Quốc Hùng'),
(3, 'le_ngo_dong_gun', 'gun@example.com', '0933333333', '222 Đường UVW, Quận XYZ', '1234', 2, '2025-05-12 14:09:25', NULL, 0, 'Lê Ngô Dong Gun'),
(4, 'nguyen_thi_thuan_thien', 'thns@example.com', '0966666666', '333 Đường ABC, Quận LMN', 'abcd', 3, '2025-05-12 14:09:25', NULL, 0, 'Nguyễn Thị Thuận Thiên'),
(5, 'pham_binh_chuong', 'chuong@example.com', '0933333333', '222 Đường UVW, Quận XYZ', '1234', 2, '2025-05-12 14:09:25', NULL, 0, 'Phạm Bình Chương'),
(6, 'nguyen_gia_bao', 'giabao@example.com', '0966666666', '333 Đường ABC, Quận LMN', 'abcd', 3, '2025-05-12 14:09:25', NULL, 0, 'Nguyễn Gia Bảo'),
(7, 'phan_thi_my_hoi', 'myhoi@example.com', '0999999999', '444 Đường DEF, Quận RST', '1234', 1, '2025-05-12 14:09:25', NULL, 0, 'Phan Thị Mỹ Hội'),
(0, 'myhoi', 'phanthimyhoifpt47@gmail.com', NULL, NULL, '123a', NULL, '2025-05-15 11:19:24', NULL, 0, 'Phan Thị Mỹ Hội'),
(0, 'myhoi1', 'phanthimyhoifpt47@gmail.com', NULL, NULL, '1234', NULL, '2025-05-16 15:24:40', NULL, 0, 'Phan Thị Mỹ Hội');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(100) NOT NULL,
  `Loại` int(11) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `gia` decimal(10,2) NOT NULL,
  `Giamgia` int(11) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `is_hot` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ten_san_pham`, `Loại`, `mo_ta`, `gia`, `Giamgia`, `hinh_anh`, `is_hot`) VALUES
(1, 'Áo cầu lông Yonex', 1, 'Giày cầu lông Yonex thiết kế đế chống trượt, phù hợp với các vận động viên chuyên nghiệp.', 1500000.00, 0, 'imagers/products/ao.webp', 0),
(2, 'Áo cầu lông Li-Ning', 1, 'Áo cầu lông Li-Ning thoáng khí, phù hợp cho các vận động viên', 600000.00, 400000, 'imagers/products/ao.webp', 0),
(3, 'Áo cầu lông Yonex 1', 1, 'Áo cầu lông Yonex với chất liệu thoáng khí, giúp bạn vận động thoải mái.', 550000.00, 0, 'imagers/products/ao.webp', 1),
(4, 'Vợt cầu lông Victor 2', 2, 'Áo cầu lông Victor siêu nhẹ, dễ dàng vận động, phù hợp cho các giải đấu.', 580000.00, 0, 'imagers/products/caulong.webp', 1),
(5, 'Giày cầu lông Adidas AYZU021', 3, 'Áo cầu lông Adidas, thiết kế thời trang, chất liệu thấm hút mồ hôi tốt.', 590000.00, 0, 'imagers/products/giay_AYZU021.jpg', 1),
(6, 'Áo cầu lông Li-Ning 4', 1, 'Áo cầu lông Li-Ning với thiết kế hiện đại, thoáng mát, sử dụng cho các môn thể thao.', 620000.00, 0, 'imagers/products/ao.webp', 0),
(7, 'Áo cầu lông Mizuno 5', 1, 'Áo cầu lông Mizuno mềm mại, hỗ trợ tối đa trong mỗi cú đánh.', 650000.00, 500000, 'imagers/products/ao.webp', 0),
(8, 'Áo cầu lông Yonex 6', 1, 'Áo cầu lông Yonex với công nghệ chống mồ hôi, mang lại sự thoải mái khi thi đấu.', 560000.00, 400000, 'imagers/products/ao.webp', 0),
(9, 'Áo cầu lông Victor 8', 1, 'Áo cầu lông Victor phù hợp cho các trận đấu căng thẳng, với chất liệu thoáng khí.', 570000.00, 0, 'imagers/products/ao.webp', 0),
(10, 'Vợt cầu lông Victor Thruster K 12', 2, 'Vợt cầu lông với sức mạnh vượt trội, phù hợp cho người chơi tấn công.', 3800000.00, 0, 'imagers/products/thruster_k12.jpg', 0),
(11, 'Vợt cầu lông Lining Turbo X90', 2, 'Vợt cầu lông bền bỉ, phù hợp cho người chơi phong trào.', 2500000.00, 0, 'imagers/products/lining_turbo_x90.jpg', 0),
(12, 'Vợt cầu lông Mizuno JPX 8.1', 2, 'Vợt cầu lông nhẹ, linh hoạt, phù hợp cho người chơi kiểm soát.', 3200000.00, 0, 'imagers/products/mizuno_jpx_8.1.jpg', 0),
(13, 'Quả cầu lông Yonex Aerosensa 50', 5, 'Quả cầu lông chất lượng cao, phù hợp cho thi đấu chuyên nghiệp.', 600000.00, 0, 'imagers/products/aerosensa_50.jpg', 1),
(14, 'Quả cầu lông Hải Yến S90', 5, 'Quả cầu lông bền bỉ, phù hợp cho người chơi phong trào.', 250000.00, 0, 'imagers/products/haiyen_s90.jpg', 0),
(15, 'Giày cầu lông Yonex Power Cushion 65Z3', 3, 'Giày cầu lông với công nghệ giảm chấn tiên tiến.', 2800000.00, 24900000, 'imagers/products/power_cushion_65z3.jpg', 1),
(16, 'Giày cầu lông Victor A960', 3, 'Giày cầu lông bám sân tốt, hỗ trợ di chuyển linh hoạt.', 2600000.00, 0, 'imagers/products/victor_a960.jpg', 0),
(17, 'Túi cầu lông Yonex Pro Tournament', 6, 'Túi cầu lông rộng rãi, chứa được nhiều dụng cụ.', 1500000.00, 0, 'imagers/products/yonex_pro_tournament.jpg', 0),
(18, 'Túi cầu lông Lining ABJE054', 6, 'Túi cầu lông thời trang, tiện lợi.', 1200000.00, 0, 'imagers/products/lining_abje054.jpg', 0),
(19, 'Vợt cầu lông Yonex Astrox 100ZZ', 2, 'Vợt cầu lông cao cấp dành cho người chơi chuyên nghiệp.', 4500000.00, 0, 'imagers/products/astrox_100zz.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'gun', '$2y$10$0F.zKD/lAfaJDx.rO5kPXOZsGyQV3YI170W0tjzlQOk3a8hf7zPzC'),
(2, 'hoi', '$2y$10$49f/5B8Y5oEu1AqTRvXVGOfxrxLegSUU9Hmwg4flcv2a4y3N1wpG2'),
(5, 'chuong', '$2y$10$YO7psDKSopp1dTWUKG/bUOsksMrElIotahAqzCbYOql5Gc/E7lhO6'),
(6, 'mot', '$2y$10$N5KvYhbDH791kipQlqLNseSfcryPUXVFKEllechb.IOB6JQy2RTJC'),
(7, 'hai', '$2y$10$KK6.9LvGIZOk6BLNEn/Ag.RnjzH0ogoQhU87jvA4pPIzoOgxqgc1O'),
(8, 'bon', '$2y$10$wAPMnclAS86s0kgyY7TlAeFczW0YtKrQmsvHfIZ/0V7SuwUvRM/EK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD KEY `username_2` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
