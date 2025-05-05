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
(15, '2025-05-05 15:00:37', 1, '2 team việt nam pick đẹp quá rồi , chiến thôi nào',
 1, 'thoi@gmail.com', NULL),
(16, '2025-05-05 15:11:37', 1, 'Giải này có tính team color không ad', 1, 'tung@gmail.com', Null),
(17, '2025-05-05 15:12:46', 1, 'Không tính color nên mới pick hết quốc dân á bạn', 1, 'thoi@gmail.com', 16),
(18, '2025-01-22 20:14:37', 1, 'Cười thật to và tới với Jeeker nào anh em ơi 😆', 2, 'thanh@gmail.com', NULL),
(19, '2025-01-22 20:20:37', 1, 'Nguyễn Thu Trang chị này đội trưởng ạ xinh đẹp mãi đỉnh bắn hay đóng phim hay nữa ạ ❤️❤️❤️🥰🥰🥰', 2, 'trung@gmail.com', NULL);

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
(1, 1, '2025-05-05 14:40:37', 'Năm nay, 2 đại diện xuất sắc NK FC Online và SevenTV đã vượt qua hàng loạt đối thủ nặng ký để giành quyền đại diện Việt Nam, mang trên mình màu cờ sắc áo dân tộc chinh phục hành trình kỳ diệu tại FC Pro Masters 2025. Tại giải đấu, họ sẽ đối đầu với những “ông lớn” của FC Online đến từ 3 quốc gia: Thái Lan, Hàn Quốc, và Trung Quốc, nhằm tranh lấy vinh quang và mang niềm tự hào về cho nước nhà.',
 'Năm nay, 2 đại diện xuất sắc NK FC Online và SevenTV đã vượt qua hàng loạt đối thủ nặng ký để giành quyền đại diện Việt Nam, mang trên mình màu cờ sắc áo dân tộc chinh phục hành trình kỳ diệu tại FC Pro Masters 2025. Tại giải đấu, họ sẽ đối đầu với những “ông lớn” của FC Online đến từ 3 quốc gia: Thái Lan, Hàn Quốc, và Trung Quốc, nhằm tranh lấy vinh quang và mang niềm tự hào về cho nước nhà. Giải đấu FC Pro Masters sẽ diễn ra trong 3 ngày với 2 vòng đấu đầy kịch tính. Ngay trong ngày thi đấu đầu tiên, tất cả các đội sẽ ra sân tranh tài. Tuy nhiên, đội ở nhánh thua sẽ phải dừng bước ngay lập tức nếu thất bại trong ngày này.
Điểm nhấn đặc biệt của giải đấu năm nay là showmatch hấp dẫn, được chia thành 2 phần: showmatch tuyển thủ trẻ và showmatch KOLs. Trong phần thi đấu của tuyển thủ trẻ, những VĐV trẻ tuổi nhất đến từ mỗi quốc gia sẽ đối đầu để tìm ra nhà vô địch. Còn ở showmatch KOLs, các KOLs đại diện cho từng quốc gia sẽ tranh tài, hứa hẹn mang đến những pha bóng đỉnh cao và mãn nhãn cho khán giả. 
Thần đồng LHAT sẽ đại diện Việt Nam tham dự showmatch tuyển thủ trẻ, còn BLV Bình Be sẽ trực tiếp đối đầu với các đổi thủ mạnh tại showmatch KOLs. ',
 'VINH QUANG VÌ MÀU CỜ SẮC ÁO – VIỆT NAM TIẾN ĐẾN FC PRO MASTERS 2025'),
(2, 1, '2025-01-22 20:14:37', 'Nhằm mang đến không khí Tết sôi động và kết nối cộng đồng game thủ, Free Fire chính thức ra mắt Làng Sáng Tạo - sân chơi độc đáo kết hợp giữa thử thách sáng tạo nội dung và tinh thần đồng đội. Chương trình ghi hình thực tế hứa hẹn đem đến những giây phút giải trí hấp dẫn, đồng thời tạo cơ hội để các KOL thể hiện tài năng trong một môi trường mới mẻ và thú vị.',
 '
 Nhằm mang đến không khí Tết sôi động và kết nối cộng đồng game thủ, Free Fire chính thức ra mắt Làng Sáng Tạo - sân chơi độc đáo kết hợp giữa thử thách sáng tạo nội dung và tinh thần đồng đội. Chương trình ghi hình thực tế hứa hẹn đem đến những giây phút giải trí hấp dẫn, đồng thời tạo cơ hội để các KOL thể hiện tài năng trong một môi trường mới mẻ và thú vị.
 Không chỉ dừng lại ở các thử thách, gameshow còn bao gồm loạt hoạt động tương tác và nhiệm vụ thú vị dành riêng cho các KOL tham gia. Đây sẽ là dịp để mọi người cùng nhau chia sẻ những khoảnh khắc đáng nhớ trong dịp Tết, cùng Free Fire lan tỏa niềm vui và năng lượng tích cực.',
 'GAMESHOW LÀNG SÁNG TẠO'),
(4, 1, '2025-02-26 8:02:37', 'Bước vào mùa giải mới, Hảo Hảo tiếp tục đánh dấu cột mốc 7 mùa giải đồng hành cùng đấu trường thể thao điện tử đỉnh cao – Liên Quân Mobile, khẳng định sự gắn bó bền vững với cộng đồng game thủ. ', 'Bước vào mùa giải mới, Hảo Hảo tiếp tục đánh dấu cột mốc 7 mùa giải đồng hành cùng đấu trường thể thao điện tử đỉnh cao – Liên Quân Mobile, khẳng định sự gắn bó bền vững với cộng đồng game thủ. Với thông điệp “Bùng HẢO vị, Chiến HẢO game”, Hảo Hảo không chỉ tiếp sức bằng những ly mì Hảo Hảo Handy và Hảo Hảo Big 100g thơm ngon mà còn truyền lửa đam mê, giúp các tuyển thủ bùng nổ phong độ, chinh phục thử thách. Hơn hai thập kỷ qua, Mì ăn liền Hảo Hảo đã trở thành thương hiệu quốc dân trong lòng người tiêu dùng Việt Nam với chất lượng đồng nhất, hương vị đậm đà và sự đổi mới không ngừng. Được sản xuất theo tiêu chuẩn Nhật Bản, Hảo Hảo không chỉ đơn thuần là một món ăn mà còn là nguồn năng lượng quen thuộc của nhiều thế hệ, đặc biệt là cộng đồng game thủ yêu mến tựa game Liên Quân Mobile.

Thêm một mùa giải mới đã khởi tranh, Hảo Hảo tiếp tục ghi dấu cột mốc đặc biệt – lần thứ 7 liên tiếp đồng hành cùng Đấu Trường Danh Vọng. Điều này không chỉ khẳng định sức hút mạnh mẽ của sân chơi thể thao điện tử hàng đầu đất nước mà còn thể hiện sự gắn bó bền vững của Hảo Hảo với tinh thần chiến đấu và niềm đam mê của các tuyển thủ.

Với thông điệp “Bùng HẢO vị, Chiến HẢO game”, Hảo Hảo mong muốn tiếp thêm sức mạnh, tiếp lửa nhiệt huyết cho những trận đấu đỉnh cao. Mỗi ly mì Hảo Hảo Handy hay Hảo Hảo Big 100g không chỉ thơm ngon mà còn là người bạn đồng hành sẵn sàng tiếp sức các tuyển thủ và người hâm mộ trong mọi khoảnh khắc – từ những giờ phút căng thẳng tập luyện đến những pha giao tranh kịch tính trên đấu trường. Không chỉ mang đến hương vị hấp dẫn, Hảo Hảo còn đồng hành cùng game thủ trên hành trình chinh phục thử thách, vượt qua giới hạn và vươn tới vinh quang.

7 mùa giải – 7 lần cháy hết mình cùng cộng đồng Liên Quân Mobile, Hảo Hảo tự hào tiếp tục là người bạn đồng hành trên mọi chặng đường. Những màn so tài gay cấn, những khoảnh khắc vỡ òa cảm xúc sẽ càng trọn vẹn hơn khi có Hảo Hảo bên cạnh, tiếp sức để các game thủ luôn duy trì phong độ đỉnh cao.

Mùa giải năm nay hứa hẹn sẽ mang đến những trận đấu kịch tính, nơi các chiến binh xuất sắc nhất tranh tài để viết tiếp lịch sử. Hãy sẵn sàng cho một hành trình bùng nổ, nơi đam mê và bản lĩnh sẽ lên ngôi và Hảo Hảo sẽ luôn ở đây để tiếp sức cho những khoảnh khắc huy hoàng nhất!', 
'7 MÙA ĐỒNG HÀNH – NHIỆT HUYẾT VẸN NGUYÊN, HẢO VỊ BÙNG NỔ! HẢO HẢO CHÍNH THỨC LÀ NHÀ TÀI TRỢ CỦA GIẢI ĐẤU LIÊN QUÂN MOBILE SỐ 1 TẠI VIỆT NAM');

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
(1, 99999, 'FC ONLINE', 'EA Sports FC Mobile (trước đây là FIFA Mobile) là một trò chơi mô phỏng bóng đá được phát triển bởi EA Mobile và EA Canada, phát hành bởi EA Sports cho iOS và Android.', 
'EA Sports FC Mobile là tựa game mô phỏng bóng đá hấp dẫn trên iOS và Android, cho phép người chơi xây dựng đội hình mơ ước với hơn 18,000 cầu thủ từ 690 đội bóng và 30 giải đấu, bao gồm Premier League, LaLiga, và UEFA Champions League. Với đồ họa chân thực, hiệu ứng ánh sáng sống động, bình luận trực tiếp và các chế độ chơi đa dạng như Ultimate Team, Club Challenge, hay Rush Mode 5v5, game mang đến trải nghiệm bóng đá đỉnh cao. Cập nhật thường xuyên với các sự kiện thực tế như UEFA Euro 2024 và tính năng chiến thuật FC IQ giúp trò chơi luôn mới mẻ"', 
'./public/img/products/FCOnline.jpg'),
(2, 49999, 'Liên quân', 'Garena Liên Quân Mobile VN, còn gọi là Garena Arena of Valor, Garena AOV hay Garena ROV là tựa game cực nhiều người chơi tại Việt Nam và nổi tiếng trên thế giới.',
 'Liên Quân Mobile là tựa game MOBA (đấu trường trực tuyến đa người) hấp dẫn trên iOS và Android, do Garena và Tencent phát hành. Người chơi tham gia các trận đấu 5v5 kịch tính, lựa chọn từ hàng trăm tướng với kỹ năng đa dạng, phối hợp đồng đội để phá hủy nhà chính đối phương. Game sở hữu đồ họa sắc nét, lối chơi nhanh, và các chế độ như đấu xếp hạng, đấu thường, hay 3v3. Với các sự kiện thường xuyên, giải đấu eSports quy mô lớn và tính năng tùy chỉnh trang phục, Liên Quân Mobile mang đến trải nghiệm cạnh tranh sôi động, phù hợp cho cả người chơi mới và chuyên nghiệp.',
  './public/img/products/AOV.jpg'),
(3, 79999, 'FreeFire', 'Free Fire là tựa game bắn súng sinh tồn online siêu hay, siêu vui với hơn 1 tỷ lượt tải, và hơn 150 triệu người đang chơi.', 
'Free Fire là tựa game bắn súng sinh tồn (battle royale) nổi tiếng trên iOS và Android, được phát triển bởi Garena. Trong game, 50 người chơi nhảy dù xuống một đảo hoang, tìm kiếm vũ khí và trang bị để trở thành người sống sót cuối cùng trong các trận đấu kéo dài khoảng 10 phút. Với đồ họa mượt mà, lối chơi nhanh, và các chế độ như solo, duo, squad, hay Clash Squad 4v4, Free Fire mang đến trải nghiệm kịch tính. Game thường xuyên cập nhật sự kiện, trang phục, và nhân vật mới, phù hợp cho nhiều thiết bị cấu hình thấp.', 
'./public/img/products/FreeFire.jpg');

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
('tung@gmail.com', 'public/img/user/avt-1.png', 'Phạm Châu Thanh', 'Tùng', 1, 22, '0986801203', '2024-12-12 12:30:44', '2024-12-12 12:30:44', '$2y$10$.jApl6ep.Owgii0HxK9oHuYTEtdy7AbxoqHrh/7rzmIqF2X8yGWwG'),
('thanh@gmail.com', 'public/img/user/avt-3.png', 'Kim Nhật', 'Thành', 1, 22, '0834402903', '2024-12-13 12:30:44', '2024-12-13 12:30:44', '$2y$10$.jApl6ep.Owgii0HxK9oHuYTEtdy7AbxoqHrh/7rzmIqF2X8yGWwG'),
('trung@gmail.com', 'public/img/user/avt-4.png', 'Vũ Mai Xuân', 'Trung', 1, 22, '0905190092', '2024-12-13 12:30:44', '2024-12-13 12:30:44', '$2y$10$.jApl6ep.Owgii0HxK9oHuYTEtdy7AbxoqHrh/7rzmIqF2X8yGWwG'),
('thoi@gmail.com', 'public/img/user/avt-2.png', 'Nguyễn Thái', 'Thời', 1, 22, '0987234239', '2024-12-11 12:33:44', '2024-12-11 12:33:44', '$2y$10$.jApl6ep.Owgii0HxK9oHuYTEtdy7AbxoqHrh/7rzmIqF2X8yGWwG');

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
