-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2021 lúc 05:40 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doanweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `alert`
--

CREATE TABLE `alert` (
  `id_alert` int(11) NOT NULL,
  `alert_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `alert`
--

INSERT INTO `alert` (`id_alert`, `alert_content`) VALUES
(21, 'Lê Trí Đức');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apps`
--

CREATE TABLE `apps` (
  `id_app` int(255) NOT NULL,
  `name_app` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `poster` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `describes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prie` int(255) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_app` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `show` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `apps`
--

INSERT INTO `apps` (`id_app`, `name_app`, `poster`, `category`, `describes`, `cost`, `prie`, `file`, `img_app`, `status`, `show`) VALUES
(42, 'Zoombie vs Plant', 'Nguyễn Trần Minh Hoa', 'Game', 'Thiên nhiên nổi giận - 1 phiên bản khác của trò Hoa quả nổi giận trên DNH Store, với cốt truyện xoay quanh loài người, zombie tàn phá môi trường đến mức thiên nhiên - thành phần cốt lõi của sự sống trên Trái đất phải chuyển mình, và nổi giận dữ dội. Trong', 'Miễn Phí', 0, 'Netflit.zip', 'image/img_sanpham/Plants-vs-Zombies.jpg', 1, 'Đã được duyệt'),
(44, 'How You Like That ', 'Nguyễn Trần Minh Hoa', 'Music', '\"How You Like That\" là một bài hát của nhóm nhạc nữ Hàn Quốc Blackpink. Bài hát ra mắt vào ngày 26 tháng 6 năm 2020, thông qua YG và Interscope. Sau khi phát hành, MV đã phá vỡ nhiều kỉ lục, bao gồm kỉ lục của video có nhiều người xem công chiếu nhất, kỉ ', 'Có Phí', 600000, 'Netflit.zip', 'image/img_sanpham/maxresdefault (1).jpg', 1, 'Đã được duyệt'),
(46, 'Tây Du Ký', 'Nguyễn Thị Thảo Như', 'Film', 'Tây du ký là một bộ phim truyền hình được chuyển thể từ tiểu thuyết cùng tên của nhà văn Trung Quốc Ngô Thừa Ân, do Đài truyền hình Trung ương Trung Quốc (CCTV) và Cục Đường sắt Trung Quốc phối hợp sản xuất.Ở Việt Nam, bộ phim này được trình chiếu từ đầu ', 'Miễn Phí', 0, 'Netflit.zip', 'image/img_sanpham/maxresdefault (2).jpg', 1, 'Đã được duyệt'),
(47, 'Nhà giả kim ', 'Nguyễn Thị Thảo Như', 'Book', 'Trong một đoàn người lữ hành, một nhà giả kim thuật lại một câu chuyện mà ông đọc được dọc dường. Đó là một dị bản của truyền thuyết hoa thủy tiên. Điều độc đáo trong dị bản này là cái hồ nước, nơi Narcissus rơi xuống và chết, không khóc vì vẻ đẹp của chà', 'Có Phí', 50000, 'Book.zip', 'image/img_sanpham/gioi-thieu-quyen-sach-nha-gia-kim.jpg', 1, 'Đã được duyệt'),
(49, 'Công chúa bong bóng', 'Nguyễn Trần Minh Hoa', 'Film', 'Mariposa và người bạn lông xù Zee quay trở lại trong phần phim trong một cuộc phiêu lưu mới. Lần này, Mariposa trở thành đại sứ hoàng gia đến Vương quốc tiên Pha lê Shimmervale. Mariposa ko gây dc ấn tượng đầu tiên với Đức vua, nhưng cô ấy nhanh chóng trở', 'Miễn Phí', 0, 'Netflit.zip', 'image/img_sanpham/maxresdefault (3).jpg', 1, 'Đã được duyệt'),
(50, 'Harry Potter (Trọn bộ)', 'Nguyễn Thị Thảo Như', 'Book', 'Nội dung câu chuyện giả tưởng từng gây sốt trên nhiều thị trường sách này kể về cuộc chiến của cậu bé Harry Potter một mình chống lại một phù thủy hắc ám Chúa tể Voldemort, người đã giết cha mẹ cậu để thực hiện tham vọng làm chủ thế giới phù thủy.', 'Miễn Phí', 0, 'Book.zip', 'image/img_sanpham/Bộ-7-cuốn-sách-Harry-Potter.jpg', 1, 'Đã được duyệt'),
(51, 'Đắc nhân tâm', 'Nguyễn Trần Minh Hoa', 'Book', 'Đối nhân xử thế không phải xuất phát từ bản năng của con người mà mỗi chúng ta đều phải quan sát, nhìn nhận những tình huống để rút ra được những kinh nghiệm cho riêng mình. Đắc nhân tâm chính là một quyển sách mà bạn cần có để biết cách chinh phục người ', 'Miễn Phí', 0, 'Book.zip', 'image/img_sanpham/unnamed.jpg', 1, 'Đã được duyệt'),
(52, 'Tik Tok', 'Lê Trí Đức', 'App', 'TikTok là mạng xã hội cực HOT về video nơi mọi người chia sẻ các clip ngắn được truyền cảm hứng bằng âm nhạc. Bất kể là nhảy, múa, phong cách tự do hay biểu diễn tài năng, người dùng được khuyến khích để cho trí tưởng tượng bay cao bay xa.', 'Miễn Phí', 0, 'Netflit.zip', 'image/img_sanpham/tik-tok-foto-screenshot-website-1.jpg', 1, 'Đã được duyệt'),
(53, 'HaGo', 'Lê Trí Đức', 'App', 'HAGO là một nền tảng ứng dụng xã hội, hội tụ tất cả-trong-một nhằm đáp ứng tất cả mọi nhu cầu giải trí và kết nối bạn bè của mọi người! Bạn cảm thấy thật buồn chán trong suốt thời gian cách ly? ? Đừng lo! Để Hago lo, rồi bạn sẽ hết buồn sớm thôi! ', 'Miễn Phí', 0, 'Apps.zip', 'image/img_sanpham/Hago.jpg', 1, 'Đã được duyệt'),
(54, 'Facebook', 'Nguyễn Trần Minh Hoa', 'App', 'Cập nhật thông tin từ bạn bè nhanh chóng hơn bao giờ hết.\r\n• Xem bạn bè đang làm gì\r\n• Chia sẻ cập nhật, ảnh và video\r\n• Nhận thông báo khi bạn bè thích và bình luận về bài viết của bạn\r\n• Chơi trò chơi và sử dụng các ứng dụng yêu thích\r\n• Mua và bán tại ', 'Miễn Phí', 0, 'Apps.zip', 'image/img_sanpham/facebook-f-logo-1920-800x450.png', 1, 'Đã được duyệt'),
(55, 'Eight', 'Nguyễn Trần Minh Hoa', 'Music', 'Eight is a song recorded by South Korean singer-songwriter IU featuring Suga, a rapper of South Korean boy band BTS. It was released as a digital single on May 6, 2020 by EDAM Entertainment.', 'Có Phí', 10000, 'Netflit.zip', 'image/img_sanpham/maxresdefault (4).jpg', 1, 'Đã được duyệt'),
(56, 'Look what you made me do ', 'Lê Trí Đức', 'Music', '\"Look What You Made Me Do\" là một bài hát của ca sĩ-nhạc sĩ người Hoa Kỳ Taylor Swift, trích từ album phòng thu thứ sáu sắp ra mắt của cô, Reputation (2017). Bài hát được phát hành dưới dạng đĩa đơn mở đường cho album vào ngày 24 tháng 8 năm 2017.', 'Miễn Phí', 0, 'Netflit.zip', 'image/img_sanpham/maxresdefault (5).jpg', 1, 'Đã được duyệt'),
(57, 'Duolingo', 'Lê Trí Đức', 'App', 'Học tiếng Anh miễn phí với Duolingo, ứng dụng giáo dục ngôn ngữ được tải về hàng đầu trên thế giới', 'Miễn Phí', 0, 'Apps.zip', 'image/img_sanpham/Nha-phat-hanh-Duolingo.jpg', 1, 'Đã được duyệt'),
(58, 'Google Meet', 'Lê Trí Đức', 'App', 'Sau khi được phát hành trên iOS[3] vào tháng 2 năm 2017, Google đã chính thức ra mắt Google Meet vào tháng 3 năm 2017.[4] Dịch vụ này được công bố là một ứng dụng họp mặt trực tuyến, và được coi là một ứng dụng thân thiện với doanh nghiệp phiên bản của Ha', 'Miễn Phí', 0, 'File test.zip', 'image/img_sanpham/google-meet-mo-mien-phi-60-phut-hop-250-nguoi-th-4.jpg', 1, 'Đã được duyệt'),
(59, 'Google Maps', 'Lê Trí Đức', 'App', 'Tìm đường nhanh hơn và dễ dàng hơn bằng Google Maps. Hơn 220 quốc gia và vùng lãnh thổ được lập bản đồ cũng như hàng trăm triệu doanh nghiệp và địa điểm đã có mặt trên bản đồ. Xem thông tin đường đi qua GPS, thông tin về tình hình giao thông và phương tiệ', 'Miễn Phí', 0, 'googlemap.zip', 'image/img_sanpham/google-maps-API-key.jpg', 1, 'Đã được duyệt'),
(60, 'Messager', 'Lê Trí Đức', 'App', 'Tụ họp bên nhau mọi lúc bằng ứng dụng giao tiếp đa năng, miễn phí* của chúng tôi, hoàn chỉnh với các tính năng nhắn tin, gọi thoại, gọi video và nhóm chat video không giới hạn. Dễ dàng đồng bộ tin nhắn và danh bạ với điện thoại Android, đồng thời kết nối ', 'Miễn Phí', 0, 'File test.zip', 'image/img_sanpham/facebook-messenger-updates.png', 1, 'Đã được duyệt'),
(63, 'Liên Quân', 'Nguyễn Mỹ Anh', 'Game', 'Garena Liên Quân Mobile là một trò chơi đấu trường trận chiến trực tuyến nhiều người chơi do Tencent Games phát triển và phát hành bởi Garena, phân phối trên các nền tảng di động Android, iOS và Nintendo Switch, bắt đầu từ cuối năm 2016.', 'Miễn Phí', 0, 'File test.zip', 'image/img_sanpham/lq.jpg', 1, 'Đã được duyệt'),
(64, 'Garena Free Fire', 'Nguyễn Mỹ Anh', 'Game', 'Garena Free Fire là một Trò chơi điện tử nhiều người chơi và Trò chơi bắn súng góc nhìn người thứ ba do 111dots Studio phát triển và Garena phát hành. Phiên bản thử nghiệm của trò chơi được phát hành vào ngày 3 tháng 11 năm 2017 cho Android và được chính ', 'Miễn Phí', 0, 'Apps.zip', 'image/img_sanpham/ff.jpg', 1, 'Đã được duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cards`
--

CREATE TABLE `cards` (
  `id_cards` int(11) NOT NULL,
  `id_card` int(10) NOT NULL,
  `id_seri` int(10) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cards`
--

INSERT INTO `cards` (`id_cards`, `id_card`, `id_seri`, `price`) VALUES
(160, 709919435, 917378125, 20000),
(161, 173460544, 587540042, 20000),
(162, 415275376, 373950375, 50000),
(163, 304846369, 680527668, 100000),
(164, 494524829, 490921209, 200000),
(165, 107803465, 105272811, 500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(28, 'Game'),
(29, 'Music'),
(30, 'Book'),
(31, 'App'),
(32, 'Film');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_app` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mobilerecharge`
--

CREATE TABLE `mobilerecharge` (
  `id_mobilerecharge` int(255) NOT NULL,
  `id_cards` int(11) NOT NULL,
  `id_user` int(255) NOT NULL,
  `mobilerecharge` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mobilerecharge`
--

INSERT INTO `mobilerecharge` (`id_mobilerecharge`, `id_cards`, `id_user`, `mobilerecharge`, `total`, `date`) VALUES
(47, 163, 62, 100000, 290000, '16/05/2021'),
(48, 164, 62, 200000, 290000, '16/05/2021'),
(49, 161, 62, 20000, 290000, '16/05/2021');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `fullname`, `email`, `address`, `phone`, `img_avatar`, `level`, `status`) VALUES
(60, 'admin', 'admin', 'Lê Trí Đức', 'letriducmhd@gmail.com', 'ấp Mỹ Hội, xã Mỹ Hội Đông, huyện Chợ Mới, tỉnh An Giang', '0377025449', 'image/img_avt/anhlogo.jpg', 0, 0),
(61, 'developer', 'developer', 'Nguyễn Thị Thảo Như', 'nhu@gmail.com', 'ấp Mỹ Hội, xã Mỹ Hội Đông, huyện Chợ Mới, tỉnh An Giang', '0377025449', 'image/img_avt_df/avatar.png', 1, 0),
(62, 'user', 'user', 'Nguyễn Trần Minh Hoa', 'hoa@gmail.com', 'ấp Mỹ Hội, xã Mỹ Hội Đông, huyện Chợ Mới, tỉnh An Giang', '0377025449', 'image/img_avt/iu.jpg', 2, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id_alert`);

--
-- Chỉ mục cho bảng `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id_app`);

--
-- Chỉ mục cho bảng `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id_cards`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_id_app` (`id_app`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Chỉ mục cho bảng `mobilerecharge`
--
ALTER TABLE `mobilerecharge`
  ADD PRIMARY KEY (`id_mobilerecharge`),
  ADD KEY `fk_mobilerecharge_id_user` (`id_user`),
  ADD KEY `fk_id_id_cards` (`id_cards`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `alert`
--
ALTER TABLE `alert`
  MODIFY `id_alert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `apps`
--
ALTER TABLE `apps`
  MODIFY `id_app` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `cards`
--
ALTER TABLE `cards`
  MODIFY `id_cards` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `mobilerecharge`
--
ALTER TABLE `mobilerecharge`
  MODIFY `id_mobilerecharge` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_id_app` FOREIGN KEY (`id_app`) REFERENCES `apps` (`id_app`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `mobilerecharge`
--
ALTER TABLE `mobilerecharge`
  ADD CONSTRAINT `fk_id_id_cards` FOREIGN KEY (`id_cards`) REFERENCES `cards` (`id_cards`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_mobilerecharge_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
