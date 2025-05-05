-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 04:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `createAt`, `updateAt`) VALUES
('admin', '$2y$10$71ZJXVruNg6NYCCCg07UROxg9zQeIShNfLO.cmHt31ZjNc1fAWn0W', '2022-11-29 10:08:52', '2022-11-29 10:08:52'),
('admin123', '$2y$10$AyFdLHWsP1/r6ZelX0Ab/uFLdL.oRZi46g/wm04emdlqTrDgmZZlC', '2022-11-29 10:08:52', '2022-11-29 10:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `date`, `approved`, `content`, `news_id`, `user_id`, `parent`) VALUES
(15, '2022-11-30 12:42:55', 1, 'Đánh giá cao', 4, 'guest', NULL),
(16, '2022-11-30 12:43:18', 1, 'Đồng tình', 4, 'guest', 15),
(17, '2022-11-30 12:59:46', 1, 'Khai báo', 1, 'guest', NULL),
(18, '2022-11-30 13:00:24', 1, 'Khai báo quản lý', 1, 'guest', 17);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `createAt`, `updateAt`) VALUES
(1, 'Chi nhánh TPHCM', '268 Lý Thường Kiệt, Phường 14, Quận 10, TPHCM', NULL, '2022-11-29 10:11:35'),
(2, 'Chi nhánh Hà Nội', 'Hà Nội', NULL, '2022-11-29 10:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `status`, `date`, `description`, `content`, `title`) VALUES
(1, 1, '2022-11-29 06:14:37', 'TTO - TP.HCM không lập lại các chốt kiểm soát để kiểm tra di biến động dân cư như trước đây. Tuy vậy người dân từ các tỉnh thành đến TP.HCM sẽ phải đăng ký tạm trú tạm vắng để địa phương có biện pháp kiểm soát.', 'UBND TP.HCM yêu cầu tăng cường kiểm soát chặt chẽ di biến động dân cư. Các địa phương phải nắm chắc tình hình người dân khi ra, vào địa bàn, người có nguy cơ đang lưu trú, làm việc tại các địa phương, doanh nghiệp như lái xe, phụ xe liên tỉnh, người làm việc ngoài tỉnh về địa phương lưu trú… Từ đó sẽ chủ động các biện pháp quản lý phù hợp.\r\nTuy nhiên trước chủ trương này của thành phố, nhiều người dân bày tỏ sự băn khoăn, không biết liệu thành phố có lập lại các chốt kiểm soát và cần phải chuẩn bị những thủ tục gì khi đến TP.HCM.\r\nTrao đổi về vấn đề này, thượng tá Lê Mạnh Hà - phó trưởng Phòng tham mưu Công an TP.HCM - cho biết TP.HCM không lập lại các chốt kiểm soát để kiểm tra di biến động dân cư như trước đây.\r\nTheo thượng tá Hà, biến động dân cư được hiểu là sự thay đổi về dân cư, thường trú, tạm trú, không phải là lực lượng chức năng kiểm soát người dân đi lại ở các chốt.\r\nHiện nay Công an TP.HCM đang thực hiện các công tác quản lý di biến động dân cư như: đăng ký thường trú, tạm trú, rà soát hộ khẩu, những ai có mặt thực tế ở địa phương. Công an TP cũng đang rà soát, đối sánh các dữ liệu dân cư, cấp mã số định danh cá nhân.\r\nBên cạnh đó ngành công an cũng đang kiểm tra diện thường trú, tạm trú, những người đang lưu trú ở khách sạn, nhà nghỉ... khai báo để quản lý chặt chẽ và thực hiện các chính sách an sinh xã hội...', 'Ca nhiễm tăng, TP.HCM kiểm soát di biến động dân cư ra sao?'),
(2, 1, '2022-11-29 06:14:37', 'TTO - Với việc ban hành hướng dẫn gói chăm sóc sức khỏe cho F0 cách ly tại nhà phiên bản 1.6, ngành y tế TP.HCM cho thấy quyết tâm tập trung \"đánh chặn từ xa\" bằng việc kiểm soát F0 cách ly tại cộng đồng không để trở nặng.', 'Không phải F0 nào cũng cách ly tại nhà\nTheo thống kê, trong tổng số ca F0 hiện tại có khoảng 70% trường hợp có triệu chứng nhẹ, hoặc không có triệu chứng đang được cách ly chăm sóc tại nhà hoặc khu cách ly tập trung. Làm gì để giảm số ca mắc chuyển nặng? Hướng dẫn mới nhất từ TP.HCM được \"chi tiết hóa\" từ phân loại người F0 nào được cách ly ở nhà; chăm sóc ra sao; nên và không nên làm gì; dấu hiệu cần báo ngay cho y tế và kê đơn, cấp cứu F0 tại nhà...\nHướng dẫn lần này quy định rõ hơn về đối tượng được chăm sóc tại nhà khi đảm bảo đủ 2 điều kiện bao gồm không triệu chứng hoặc triệu chứng nhẹ (không có suy hô hấp SpO2 lớn hơn hoặc bằng 96% khi thở khí trời, nhịp thở bằng hoặc dưới 20 lần/phút). Chỉ những F0 có độ tuổi từ 1 - 50 tuổi, không có bệnh nền, không đang mang thai, không béo phì mới được cách ly ở nhà.\nNgoài ra quy định này chỉ cho phép một số trường hợp không thỏa các điều kiện nêu trên có thể xem xét cách ly ở nhà nếu có bệnh nền ổn định, bảo đảm tiêm đủ 2 mũi vắc xin hoặc sau 14 ngày kể từ ngày tiêm mũi đầu tiên.\nTP Thủ Đức (TP.HCM) là một trong các địa phương được ghi nhận có số ca mắc tăng nhanh gần đây. Ông Nguyễn Văn Chức - giám đốc Trung tâm Y tế TP Thủ Đức - cho biết để \"đánh chặn từ xa\", ngoài 32 trạm y tế cố định, các trạm y tế lưu động, các phường triển khai tổ y tế lưu động đến từng khu phố (trước đây là phường) để kịp thời xử lý các ca F0 chuyển nặng. \"Tổ lưu động của từng khu phố khá đông, bao gồm đủ các ban ngành từ y tế, đoàn thanh niên, dân quân, giáo dục, thành ra việc phản ứng và tiếp cận sẽ được gần người dân hơn\" - ông Chức nói.', '50% ca tử vong ở TP.HCM chưa tiêm vắc xin, thành phố đang \"đánh chặn\" số ca chuyển nặng'),
(4, 1, '2022-11-29 06:14:37', 'Nờ Ô Nô Hiện tượng TikTOk', 'Chúc mừng kênh Tiktok Nờ Ô Nô đã bị xóa', 'Chúc mừng kênh Tiktok Nờ Ô Nô đã bị xóa');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `price`, `name`, `description`, `content`, `img`) VALUES
(1, 28000, 'VÕ LÂM TRUYỀN KỲ MOBILE', 'Võ Lâm Truyền Kỳ là một trò chơi nhập vai trực tuyến nhiều người chơi (MMORPG) được Việt hóa  từ trò chơi Kiếm Hiệp Tình Duyên Online', 'Võ Lâm Truyền Kỳ   là một trò chơi nhập vai trực tuyến nhiều người chơi (MMORPG) được Việt hóa từ trò chơi Kiếm hiệp tình duyên Online (chữ Hán: 剑侠情缘; tiếng Anh: SWORDSMAN Online hay Justice Xwar) của công ty Kingsoft (Kim Sơn) từ Trung Quốc và được VNG phân phối tại Việt Nam. Trò chơi cho phép các người chơi đóng vai dựa theo các tiểu thuyết kiếm hiệp của Trung Quốc. Trò chơi này từng gây cơn sốt ở Trung Quốc và được Hiệp hội Phần mềm Trung Quốc trao giải \"Trò chơi xuất sắc nhất năm 2003\"', './public/img/products/2021_11_30_12_22_53am.png'),
(2, 25000, 'GUNNY', 'Gunny hay còn gọi là DDTank là trò chơi thuộc thể loại Webgame (Game chơi ngay trên trình duyệt) Casual kết hợp với MMORPG', 'Gunny hay còn gọi là DDTank là trò chơi thuộc thể loại Webgame (Game chơi ngay trên trình duyệt) Casual kết hợp với MMORPG, thuộc thể loại bắn súng canh tọa độ theo lượt (2D Arcade).', './public/img/products/2021_11_30_12_26_21am.png'),
(3, 25000, 'ZALO', 'Zalo là một trong những ứng dụng gọi điện và nhắn tin quen thuộc trong cuộc sống của chúng ta thời công nghệ', 'Zalo là ứng dụng nhắn tin nhanh đa nền tảng được phát triển bởi công ty VNG ở Việt Nam. Ngoài Việt Nam, ứng dụng này còn được sử dụng tại các quốc gia như Hoa Kỳ, Nhật Bản, Đài Loan, Hàn Quốc, Úc, Đức, Myanmar và Singapore.', './public/img/products/2021_11_30_12_28_11am.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `profile_photo`, `fname`, `lname`, `gender`, `age`, `phone`, `createAt`, `updateAt`, `password`) VALUES
('admin', 'public/img/user/default.png', '1', '1', 1, 1, '1', '2022-12-04 20:55:52', '2022-12-04 20:55:52', '$2y$10$WQjEkZWcTefiHVW6zEYI6uBBstDufXDi9YoYtZYD.VNWtX9pyY8PK'),
('guest', 'public/img/user/default.png', 'Nguyễn', 'Trọng', 1, 22, '0378466105', '2022-11-29 12:49:44', '2022-11-29 12:49:44', '$2y$10$14bVHOtFJrLbBWKMWHxcq.awVuhx7jNXAiNOdl2Gt9rfcXb54Efly'),
('hangnguyencskh@gmail.com', 'public/img/user/default.png', 'Hung', 'Nguyen', 1, 12, '0365256850', '2022-10-30 22:46:47', '2022-10-30 22:46:47', '$2y$10$pSI5FDqnrmdR4WVEmRwFN.QDs8pWje/azv648VZHk3ZfERKea04gi'),
('hung', 'public/img/user/default.png', 'Hung', 'Nguyen', 1, 21, '0365256850', '2022-11-29 16:24:36', '2022-11-29 16:24:36', '$2y$10$s703p8Ra/qUVBnOSY6Aq7OJfD3Zdg5Y2fn8Wl3opjIj9E.y.ppbya'),
('hung123', 'public/img/user/default.png', 'Hung', 'Nguyen', 1, 12, '0365256850', '2022-11-01 22:40:42', '2022-11-01 22:40:42', '$2y$10$Q/u3dg2OtDPVrYupo0EPwOsW0fVOraOIf4a16xtx24I8xrIjvRosO'),
('username', 'public/img/user/default.png', 'Hung', 'Nguyen', 1, 12, '0365256850', '2022-11-29 16:25:23', '2022-11-29 16:25:23', '$2y$10$tefzv/hp0xZTzzNlR1KDeub.EVXOSsKkC6M720eK31t6wUjqHbn.K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`parent`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
