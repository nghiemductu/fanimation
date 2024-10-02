-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2024 lúc 07:49 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fanimation`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `ten_danh_muc` varchar(100) NOT NULL,
  `hien_thi_dm` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `ten_danh_muc`, `hien_thi_dm`, `parent_id`) VALUES
(122, 'Panasonic', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_orders`
--

CREATE TABLE `chi_tiet_orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` decimal(9,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `ngay_dat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tong_gia` decimal(9,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `ten_sp` varchar(100) NOT NULL,
  `mo_ta_sp` text NOT NULL,
  `gia` decimal(9,0) NOT NULL,
  `so_luong_hang` int(11) NOT NULL,
  `id_danh_muc` int(11) NOT NULL,
  `images` varchar(200) NOT NULL,
  `hien_thi_sp` tinyint(4) NOT NULL DEFAULT 1,
  `cong_suat` varchar(50) NOT NULL,
  `cong_nghe` varchar(50) NOT NULL,
  `chat_lieu` varchar(50) NOT NULL,
  `chuc_nang` varchar(50) NOT NULL,
  `so_canh` varchar(50) NOT NULL,
  `toc_do` varchar(50) NOT NULL,
  `ngay_dang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `new_arrival` tinyint(1) DEFAULT 0,
  `featured` tinyint(1) DEFAULT 0,
  `best_seller` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `ten_sp`, `mo_ta_sp`, `gia`, `so_luong_hang`, `id_danh_muc`, `images`, `hien_thi_sp`, `cong_suat`, `cong_nghe`, `chat_lieu`, `chuc_nang`, `so_canh`, `toc_do`, `ngay_dang`, `new_arrival`, `featured`, `best_seller`) VALUES
(110, 'quạt vn', 'ádasfsdfsdf', 500000, 55, 122, '[\"..\\/upload\\/66fcd83e4833c.png\",\"..\\/upload\\/66fcd83e48448.png\",\"..\\/upload\\/66fcd83e48527.png\",\"..\\/upload\\/66fcd83e485f7.png\",\"..\\/upload\\/66fcd83e486c0.png\",\"..\\/upload\\/66fcd83e487dc.png\"]', 1, '10w', 'ko', 'nhựa', 'quay ', '5', '1213km', '2024-10-02 05:21:02', 0, 1, 0),
(111, 'photo', 'ádasfsdfsdf', 500000, 55, 122, '[\"..\\/upload\\/66fcd8788dbe8.png\",\"..\\/upload\\/66fcd8788dd1b.png\",\"..\\/upload\\/66fcd8788de0b.png\",\"..\\/upload\\/66fcd8788df36.png\",\"..\\/upload\\/66fcd8788e037.png\",\"..\\/upload\\/66fcd8788e110.png\"]', 1, '50w', 'sdfg', 'SẮT', 'quayfad ', '4', '1150km', '2024-10-02 05:22:00', 0, 0, 1),
(112, 'photoầ', 'ádadfsdf', 300, 555, 122, '[\"..\\/upload\\/66fcd89d1d0f3.png\",\"..\\/upload\\/66fcd89d1d207.png\",\"..\\/upload\\/66fcd89d1d2ee.png\",\"..\\/upload\\/66fcd89d1d3c2.png\",\"..\\/upload\\/66fcd89d1d490.png\",\"..\\/upload\\/66fcd89d1d55b.png\"]', 1, '5w', 'sdfg', 'SẮT', 'quay ', '6', '1120km', '2024-10-02 05:22:37', 1, 0, 0),
(113, 'FAA-43', 'ầdfsdfsdfÁ', 200, 50, 122, '[\"..\\/upload\\/66fcda4dbc4da.png\",\"..\\/upload\\/66fcda4dbc5ee.png\",\"..\\/upload\\/66fcda4dbc6ef.png\",\"..\\/upload\\/66fcda4dbc7db.png\",\"..\\/upload\\/66fcda4dbc928.png\",\"..\\/upload\\/66fcda4dbca0d.png\"]', 1, '5w', 'sdfg', 'sắt', 'quayfad ', '6', '1120km', '2024-10-02 05:29:49', 0, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `danh_gia` int(11) NOT NULL,
  `binh_luan` text NOT NULL,
  `ngay_bl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hien_thi_bl` tinyint(4) NOT NULL DEFAULT 1,
  `id_san_pham` int(10) NOT NULL,
  `id_khach_hang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `hien_thi_user` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `email`, `role`, `hien_thi_user`) VALUES
(3, 'admin', '$2y$10$iJud82D7gL8trEafQOEiveq7PwvfvYHPyIV8R2fA.n1DKsWHyjyBq', 'm1@gmail.com', 0, 1),
(17, 'ductu', '$2y$10$LsT7NmNUsy7L1ma0QfMUpu9Of9yucHOGaYNniK44o/6ABrtjqWkvC', 'm1@gmail.com', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chi_tiet_orders`
--
ALTER TABLE `chi_tiet_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_danh_muc` (`id_danh_muc`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_review_products` (`id_san_pham`),
  ADD KEY `fk_review_users` (`id_khach_hang`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_orders`
--
ALTER TABLE `chi_tiet_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_orders`
--
ALTER TABLE `chi_tiet_orders`
  ADD CONSTRAINT `chi_tiet_orders_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `chi_tiet_orders_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_danh_muc`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_products` FOREIGN KEY (`id_san_pham`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_review_users` FOREIGN KEY (`id_khach_hang`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
