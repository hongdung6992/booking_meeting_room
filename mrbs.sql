-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 14, 2019 lúc 10:28 PM
-- Phiên bản máy phục vụ: 5.7.27-0ubuntu0.18.04.1
-- Phiên bản PHP: 7.2.24-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `booking_meeting_room`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `slot_ids` varchar(100) NOT NULL,
  `attendees` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0: cancelled, 1: planing, 2 confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `name`, `phone`, `email`, `date`, `slot_ids`, `attendees`, `status`) VALUES
(1, 2, 'Nguyen Hong Dung', '01202767539', 'hongdung@gmail.com', '2019-11-12', '2,4,6', 25, 2),
(16, 1, 'Lê Thanh Hưng', '0123568486', 'thanhhung@gmail.com', '2019-11-14', '2,4', 23, 0),
(17, 2, 'Tran Kim Anh', '0125652369', 'kimanh@gmail.com', '2019-11-14', '1,3', 25, 2),
(18, 3, 'Tran Anh Tuyet', '01203586478', 'anhtuyet@gmail.com', '2019-11-14', '11,12,13', 20, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `descriptions` text,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: inactive, 1: active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `capacity`, `descriptions`, `image`, `status`) VALUES
(1, 'A1', 20, 'Width: 10m, \nHeight: 20m, Super fast Wi-Fi, Comfortable, private workspace for business traveler, Printer supplied', 'A1.jpeg', 1),
(2, 'A2', 30, 'Width: 10m, \nHeight: 15m, Super fast Wi-Fi, catch up on emails', 'A2.jpg', 1),
(3, 'A3', 50, 'Width: 7m, \nHeight: 12m, Super fast Wi-Fi', 'A3.jpg', 1),
(4, 'B2', 20, NULL, 'default.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slots`
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL,
  `time` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: inactive, 1: active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slots`
--

INSERT INTO `slots` (`id`, `time`, `status`) VALUES
(1, '06:00 - 07:00', 1),
(2, '07:00 - 08:00', 1),
(3, '08:00 - 09:00', 1),
(4, '09:00 - 10:00', 1),
(5, '10:00 - 11:00', 1),
(6, '11:00 - 12:00', 1),
(7, '12:00 - 13:00', 1),
(8, '13:00 - 14:00', 1),
(9, '14:00 - 15:00', 1),
(10, '15:00 - 16:00', 1),
(11, '16:00 - 17:00', 1),
(12, '17:00 - 18:00', 1),
(13, '18:00 - 19:00', 1),
(14, '19:00 - 20:00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: inactive, 1: active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Nguyen Hong Dung', 'admin@gmail.com', '4297f44b13955235245b2497399d7a93', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meeting_room_id` (`room_id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
