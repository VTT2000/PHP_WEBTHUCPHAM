-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 07, 2022 lúc 03:29 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webthucpham`
--
CREATE DATABASE IF NOT EXISTS `webthucpham` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `webthucpham`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadonkhachhang`
--

CREATE TABLE `chitiethoadonkhachhang` (
  `IdInvoiceCT` int(11) NOT NULL,
  `IdInvoice` int(11) DEFAULT NULL,
  `IdThucPham` int(11) DEFAULT NULL,
  `IdLoHang` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaTien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadonkhachhang`
--

INSERT INTO `chitiethoadonkhachhang` (`IdInvoiceCT`, `IdInvoice`, `IdThucPham`, `IdLoHang`, `SoLuong`, `GiaTien`) VALUES
(1, 1, 1, 1, 2, 120000),
(2, 2, 2, 2, 1, 55000),
(3, 2, 3, 3, 1, 52000),
(4, 2, 4, 4, 1, 43000),
(5, 2, 5, 5, 1, 40000),
(6, 3, 11, 12, 1, 15000),
(7, 4, 6, 7, 1, 66500),
(8, 5, 9, 10, 1, 55000),
(9, 5, 10, 11, 1, 25000),
(10, 5, 11, 12, 1, 15000),
(11, 6, 9, 10, 1, 55000),
(12, 6, 10, 11, 1, 25000),
(13, 6, 11, 12, 1, 15000),
(14, 7, 12, 14, 1, 10000),
(15, 8, 4, 4, 1, 39990),
(16, 9, 1, 1, 1, 57000),
(17, 10, 12, 14, 1, 10000),
(18, 11, 3, 3, 1, 48360),
(19, 12, 4, 4, 1, 39990),
(20, 13, 6, 13, 1, 66500),
(21, 14, 10, 11, 1, 25000),
(22, 15, 13, 15, 1, 9000),
(23, 16, 1, 1, 1, 57000),
(24, 16, 2, 2, 1, 52250),
(25, 16, 3, 3, 1, 48360),
(26, 16, 4, 4, 1, 39990),
(27, 16, 5, 5, 1, 37200);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonkhachhang`
--

CREATE TABLE `hoadonkhachhang` (
  `IdInvoice` int(11) NOT NULL,
  `IdKH` int(11) DEFAULT NULL,
  `NgayDat` datetime DEFAULT NULL,
  `NgayGiao` date DEFAULT NULL,
  `TongTien` int(11) DEFAULT NULL,
  `PhuongThucThanhToan` varchar(100) DEFAULT NULL,
  `TrangThai` varchar(100) DEFAULT NULL,
  `IdNV` int(11) DEFAULT NULL,
  `DiaChiNhanHang` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadonkhachhang`
--

INSERT INTO `hoadonkhachhang` (`IdInvoice`, `IdKH`, `NgayDat`, `NgayGiao`, `TongTien`, `PhuongThucThanhToan`, `TrangThai`, `IdNV`, `DiaChiNhanHang`) VALUES
(1, 1, '2021-10-25 00:00:00', '2021-10-26', 120000, 'Paypal', 'Đã giao', 1, '123 New Zealand'),
(2, 1, '2021-10-25 00:00:00', '2021-10-26', 190000, 'Paypal', 'Đã giao', 1, '123 Empire'),
(3, 1, '2021-11-10 00:00:00', '2021-12-30', 15000, 'Paypal', 'Chưa giao', NULL, '123 Kiev'),
(4, 1, '2021-11-22 12:17:50', '2021-11-23', 66500, 'Thường', 'Đã giao', 1, '123 Lee Hoo'),
(5, 1, '2021-11-28 09:19:22', '2021-11-29', 169000, 'Thường', 'Đã giao', 1, '123 BerLin'),
(6, 1, '2021-11-30 14:33:37', '2021-12-01', 169000, 'Thường', 'Đã giao', 1, '123 Zurich'),
(7, 1, '2021-12-04 09:40:02', '2021-12-05', 10000, 'Thường', 'Đã giao', 1, '123 LonDon'),
(8, 1, '2021-12-04 09:41:24', '2021-12-05', 39990, 'Paypal', 'Đã giao', 1, '123 Warsaw'),
(9, 1, '2021-12-04 10:12:41', '2021-12-05', 57000, 'Thường', 'Đã giao', 1, '123 Whashington'),
(10, 1, '2021-12-04 10:18:02', '2021-12-05', 10000, 'Thường', 'Đã giao', 1, '123 New York'),
(11, 1, '2021-12-04 10:18:55', '2021-12-05', 48360, 'Paypal', 'Đã giao', 1, '123 Moscow'),
(12, 1, '2021-12-12 18:26:01', '2021-12-13', 39990, 'Thường', 'Đã giao', 1, '123 Ha Noi'),
(13, 9, '2021-12-14 10:35:56', '2021-12-15', 66500, 'Thường', 'Đã giao', 1, '123 Hong Kong'),
(14, 10, '2021-12-14 20:18:05', '2021-12-15', 25000, 'Thường', 'Đã giao', 1, '123 Tokyo'),
(15, 11, '2021-12-15 16:27:48', '2021-12-16', 9000, 'Thường', 'Đã giao', 1, '123 Nagashaki'),
(16, 11, '2021-12-15 16:44:34', '2021-12-16', 234800, 'Thường', 'Đã giao', 1, '123 Hawai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `IdKH` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `SDT` varchar(20) DEFAULT NULL,
  `DiaChi` varchar(500) DEFAULT NULL,
  `MatKhau` varchar(50) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`IdKH`, `Name`, `Email`, `SDT`, `DiaChi`, `MatKhau`, `NgaySinh`) VALUES
(1, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '0147852369', '123 Hutech', 'nguyenvana', NULL),
(2, 'Nguyễn Văn B', 'nguyenvanb@gmail.com', '0369852147', '456 Hutech', 'nguyenvanb', '2021-09-03'),
(3, 'Hitler', 'hitler@gmail.com', '0666666666', '666 Berlin', 'hitler', '1945-04-30'),
(4, 'Nguyen Van 123456', '123456@gmail.com', NULL, NULL, '123456', '2021-10-31'),
(5, 'Text Text', 'tester18dthd1@gmail.com', NULL, NULL, NULL, '2021-11-14'),
(6, '3158_ Vưu Thanh Thuận', 'thuancmag2000@gmail.com', NULL, NULL, NULL, '2021-11-14'),
(7, 'aaaaaa', 'aaaaaa@gmail.com', NULL, NULL, '123456', '2021-12-04'),
(8, 'nguyenvanc', 'nguyenvanc@gmail.com', NULL, NULL, 'nguyenvanc', '2021-12-04'),
(9, 'nguyenvane', 'nguyenvane@gmail.com', '0123456789', 'ABCD', 'nguyenvane', NULL),
(10, 'nguyenvanh', 'nguyenvanh@gmail.com', '0123456789', 'ABCD', 'nguyenvanh', NULL),
(11, 'nguyenvanj', 'nguyenvanj@gmail.com', '0123456789', 'ABCD DienBien phu', 'nguyenvanj', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `IdKhuyenMai` int(11) NOT NULL,
  `NgayBatDau` datetime DEFAULT NULL,
  `NgayKetThuc` datetime DEFAULT NULL,
  `MoTaKhuyenMai` text DEFAULT NULL,
  `PhanTramKhuyenMai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`IdKhuyenMai`, `NgayBatDau`, `NgayKetThuc`, `MoTaKhuyenMai`, `PhanTramKhuyenMai`) VALUES
(1, '2021-10-26 00:00:00', '2021-12-27 23:59:00', 'Khuyến mãi 5%', 5),
(2, '2021-10-26 00:00:00', '2021-12-27 23:59:00', 'Khuyến mãi 7%', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaithucpham`
--

CREATE TABLE `loaithucpham` (
  `IdLoai` int(11) NOT NULL,
  `TenLoai` varchar(100) DEFAULT NULL,
  `LinkHinhAnh` varchar(200) DEFAULT NULL,
  `IdLoaiCha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaithucpham`
--

INSERT INTO `loaithucpham` (`IdLoai`, `TenLoai`, `LinkHinhAnh`, `IdLoaiCha`) VALUES
(1, 'Đóng hộp', 'https://i.imgur.com/0dwnqpB.jpg', NULL),
(2, 'Gia vị', 'https://i.imgur.com/uNixJQD.jpg', NULL),
(3, 'Rau', 'https://i.imgur.com/4PumZd8.jpg', NULL),
(4, 'Củ', 'https://i.imgur.com/CBcfDhe.jpg', NULL),
(5, 'Quả', 'https://i.imgur.com/tCe0FA7.jpg', NULL),
(6, 'Giá trị dinh dưỡng cao', 'https://i.imgur.com/gayAJ7t.jpg', NULL),
(7, 'Dạng sợi', 'https://i.imgur.com/jQWOlXj.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lohang`
--

CREATE TABLE `lohang` (
  `IdLoHang` int(11) NOT NULL,
  `IdThucPham` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `NgaySanXuat` date DEFAULT NULL,
  `NgayHetHan` date DEFAULT NULL,
  `NgayNhapLoHang` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lohang`
--

INSERT INTO `lohang` (`IdLoHang`, `IdThucPham`, `SoLuong`, `NgaySanXuat`, `NgayHetHan`, `NgayNhapLoHang`) VALUES
(1, 1, 496, '2021-10-06', '2025-11-06', '2021-10-26 00:00:00'),
(2, 2, 298, '2021-10-06', '2025-10-06', '2021-10-26 00:00:00'),
(3, 3, 597, '2021-10-06', '2025-10-06', '2021-10-26 00:00:00'),
(4, 4, 496, '2021-10-06', '2025-10-06', '2021-10-26 00:00:00'),
(5, 5, 398, '2021-10-06', '2025-10-06', '2021-10-26 00:00:00'),
(6, 1, 899, '2021-10-06', '2026-10-06', '2022-01-01 00:00:00'),
(7, 6, 0, '2019-10-06', '2020-10-06', '2022-01-01 00:00:00'),
(8, 7, 500, '2021-10-06', '2026-10-06', '2022-01-01 00:00:00'),
(9, 8, 100, '2021-10-06', '2026-10-06', '2022-01-01 00:00:00'),
(10, 9, 498, '2021-10-06', '2026-10-06', '2022-01-01 00:00:00'),
(11, 10, 597, '2021-10-06', '2026-10-06', '2022-01-01 00:00:00'),
(12, 11, 498, '2021-10-06', '2022-11-06', '2021-10-26 00:00:00'),
(13, 6, 499, '2021-11-11', '2023-10-10', '2021-12-02 00:00:00'),
(14, 12, 498, '2021-11-11', '2026-02-02', '2021-12-01 00:00:00'),
(15, 13, 499, '2021-11-11', '2025-05-05', '2021-12-01 00:00:00'),
(16, 14, 500, '2021-11-11', '2025-07-07', '2021-12-01 00:00:00'),
(17, 15, 0, '2021-11-11', '2025-07-07', '2021-12-01 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IdNV` int(11) NOT NULL,
  `Ten` varchar(100) DEFAULT NULL,
  `SDT` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `DiaChi` varchar(150) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `IdPermission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`IdNV`, `Ten`, `SDT`, `Email`, `DiaChi`, `Username`, `Password`, `NgaySinh`, `IdPermission`) VALUES
(1, 'Nhân viên 1', '0123654789', 'nhanvien1@gmail.com', NULL, 'nhanvien1', 'nhanvien1', NULL, 1),
(2, 'Nhân viên 2', '0987586254', 'nhanvien2@gmail.com', NULL, 'nhanvien2', 'nhanvien2', NULL, 1),
(3, 'Admin 123', '0999999999', 'admin@gmail.com', NULL, 'admin', 'admin', NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `IdNSX` int(11) NOT NULL,
  `TenNSX` varchar(100) NOT NULL,
  `DiaChi` varchar(150) DEFAULT NULL,
  `SoDienThoai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`IdNSX`, `TenNSX`, `DiaChi`, `SoDienThoai`) VALUES
(1, 'ABC Food', '123 Building A', '0123456789'),
(2, 'FPT Food', '123 Building B', '0987654321');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `IdPermission` int(11) NOT NULL,
  `Ten` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`IdPermission`, `Ten`) VALUES
(1, 'Nhân viên'),
(2, 'Quản lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theodoithucpham`
--

CREATE TABLE `theodoithucpham` (
  `IdTheoDoi` int(11) NOT NULL,
  `IdKH` int(11) DEFAULT NULL,
  `IdFood` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theodoithucpham`
--

INSERT INTO `theodoithucpham` (`IdTheoDoi`, `IdKH`, `IdFood`) VALUES
(3, 1, 4),
(4, 1, 1),
(5, 1, 2),
(6, 1, 3),
(7, 1, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thucpham`
--

CREATE TABLE `thucpham` (
  `IdThucPham` int(11) NOT NULL,
  `TenThucPham` varchar(100) DEFAULT NULL,
  `SoLuongTrenMotSanPham` int(11) DEFAULT NULL,
  `DonViTinh` varchar(20) DEFAULT NULL,
  `GiaMua` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `IdNSX` int(11) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `TrangThai` varchar(50) DEFAULT NULL,
  `IdLoai` int(11) DEFAULT NULL,
  `IdKhuyenMai` int(11) DEFAULT NULL,
  `LinkHinhAnh` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thucpham`
--

INSERT INTO `thucpham` (`IdThucPham`, `TenThucPham`, `SoLuongTrenMotSanPham`, `DonViTinh`, `GiaMua`, `GiaBan`, `IdNSX`, `NgayTao`, `TrangThai`, `IdLoai`, `IdKhuyenMai`, `LinkHinhAnh`) VALUES
(1, 'Thịt ba rọi', 500, 'g', 40000, 60000, 1, '2021-10-26 00:00:00', 'Kinh doanh', 1, 1, 'https://i.imgur.com/fONSj63.jpg'),
(2, 'Muối', 500, 'g', 35000, 55000, 2, '2021-10-26 00:00:00', 'Kinh doanh', 2, 1, 'https://i.imgur.com/xhDfBeY.jpg'),
(3, 'Đường', 1000, 'g', 30000, 52000, 2, '2021-10-26 00:00:00', 'Kinh doanh', 2, 2, 'https://i.imgur.com/RMBNp6X.jpg'),
(4, 'Nước tương', 500, 'ml', 25000, 43000, 2, '2021-10-26 00:00:00', 'Kinh doanh', 2, 2, 'https://i.imgur.com/umEkWIi.jpg'),
(5, 'Tiêu', 300, 'g', 20000, 40000, 2, '2021-10-26 00:00:00', 'Kinh doanh', 2, 2, 'https://i.imgur.com/yFBmKgA.jpg'),
(6, 'Thịt bò miếng lớn', 400, 'g', 50000, 70000, 1, '2021-10-26 00:00:00', 'Kinh doanh', 1, 1, 'https://i.imgur.com/uANMY6i.jpg'),
(7, 'Khoai tây', 5, 'củ', 30000, 45000, 2, '2021-10-26 00:00:00', 'Kinh doanh', 4, NULL, 'https://i.imgur.com/uNB2XeD.jpg'),
(8, 'Trứng', 10, 'quả', 25000, 35000, 2, '2021-10-26 00:00:00', 'Kinh doanh', 6, NULL, 'https://i.imgur.com/16cKREl.jpg'),
(9, 'Thịt nạc dăm', 500, 'g', 40000, 55000, 1, '2021-10-26 00:00:00', 'Kinh doanh', 1, NULL, 'https://i.imgur.com/1m6sm3N.jpg'),
(10, 'Bún tươi', 1000, 'g', 15000, 25000, 1, '2021-10-26 00:00:00', 'Kinh doanh', 7, NULL, 'https://i.imgur.com/5EWHF1M.jpg'),
(11, 'Rau xà lách', 300, 'g', 7000, 15000, 2, '2021-10-26 00:00:00', 'Kinh doanh', 3, NULL, 'https://i.imgur.com/aMXzz4p.jpg'),
(12, 'Đậu phộng', 100, 'g', 5000, 10000, 2, '2021-10-26 00:00:00', 'Kinh doanh', 6, NULL, 'https://i.imgur.com/eBpWstP.jpg'),
(13, 'Ớt', 100, 'g', 5000, 9000, 2, '2021-10-26 00:00:00', 'Kinh doanh', 2, NULL, 'https://i.imgur.com/gAJKLwO.jpg'),
(14, 'Nước mắm', 500, 'ml', 45000, 55000, 2, '2021-10-26 00:00:00', 'Kinh doanh', 2, NULL, 'https://i.imgur.com/3lTcRbv.jpg'),
(15, 'Mật ong', 350, 'g', 55000, 80000, 2, '2021-12-01 00:00:00', 'Kinh doanh', 6, NULL, 'https://i.imgur.com/5SxQEn7.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadonkhachhang`
--
ALTER TABLE `chitiethoadonkhachhang`
  ADD PRIMARY KEY (`IdInvoiceCT`),
  ADD KEY `FK_CTHOADON_HOADON` (`IdInvoice`),
  ADD KEY `FK_CTHOADON_THUCPHAM` (`IdThucPham`),
  ADD KEY `FK_CTHOADON_LOHANG` (`IdLoHang`);

--
-- Chỉ mục cho bảng `hoadonkhachhang`
--
ALTER TABLE `hoadonkhachhang`
  ADD PRIMARY KEY (`IdInvoice`),
  ADD KEY `FK_HOADONKHACHHANG_NHANVIEN` (`IdNV`),
  ADD KEY `FK_HOADONKHACHHANG_KHACHHANG` (`IdKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`IdKH`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`IdKhuyenMai`);

--
-- Chỉ mục cho bảng `loaithucpham`
--
ALTER TABLE `loaithucpham`
  ADD PRIMARY KEY (`IdLoai`),
  ADD KEY `FK_LOAITHUCPHAM_LOAITHUCPHAMCHA` (`IdLoaiCha`);

--
-- Chỉ mục cho bảng `lohang`
--
ALTER TABLE `lohang`
  ADD PRIMARY KEY (`IdLoHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IdNV`),
  ADD KEY `FK_NHANVIEN_PERMISSION` (`IdPermission`);

--
-- Chỉ mục cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`IdNSX`);

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`IdPermission`);

--
-- Chỉ mục cho bảng `theodoithucpham`
--
ALTER TABLE `theodoithucpham`
  ADD PRIMARY KEY (`IdTheoDoi`),
  ADD KEY `FK_THEODOITHUCPHAM_THUCPHAM` (`IdFood`),
  ADD KEY `FK_THEODOITHUCPHAM_KHACHHANG` (`IdKH`);

--
-- Chỉ mục cho bảng `thucpham`
--
ALTER TABLE `thucpham`
  ADD PRIMARY KEY (`IdThucPham`),
  ADD KEY `FK_THUCPHAM_NHASANXUAT` (`IdNSX`),
  ADD KEY `FK_THUCPHAM_KHUYENMAI` (`IdKhuyenMai`),
  ADD KEY `FK_THUCPHAM_LOAITHUCPHAM` (`IdLoai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadonkhachhang`
--
ALTER TABLE `chitiethoadonkhachhang`
  MODIFY `IdInvoiceCT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `hoadonkhachhang`
--
ALTER TABLE `hoadonkhachhang`
  MODIFY `IdInvoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `IdKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `IdKhuyenMai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loaithucpham`
--
ALTER TABLE `loaithucpham`
  MODIFY `IdLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `lohang`
--
ALTER TABLE `lohang`
  MODIFY `IdLoHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `IdNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `IdNSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `permission`
--
ALTER TABLE `permission`
  MODIFY `IdPermission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `theodoithucpham`
--
ALTER TABLE `theodoithucpham`
  MODIFY `IdTheoDoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `thucpham`
--
ALTER TABLE `thucpham`
  MODIFY `IdThucPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadonkhachhang`
--
ALTER TABLE `chitiethoadonkhachhang`
  ADD CONSTRAINT `FK_CTHOADON_HOADON` FOREIGN KEY (`IdInvoice`) REFERENCES `hoadonkhachhang` (`IdInvoice`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_CTHOADON_LOHANG` FOREIGN KEY (`IdLoHang`) REFERENCES `lohang` (`IdLoHang`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_CTHOADON_THUCPHAM` FOREIGN KEY (`IdThucPham`) REFERENCES `thucpham` (`IdThucPham`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Các ràng buộc cho bảng `hoadonkhachhang`
--
ALTER TABLE `hoadonkhachhang`
  ADD CONSTRAINT `FK_HOADONKHACHHANG_KHACHHANG` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`IdKH`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_HOADONKHACHHANG_NHANVIEN` FOREIGN KEY (`IdNV`) REFERENCES `nhanvien` (`IdNV`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Các ràng buộc cho bảng `loaithucpham`
--
ALTER TABLE `loaithucpham`
  ADD CONSTRAINT `FK_LOAITHUCPHAM_LOAITHUCPHAMCHA` FOREIGN KEY (`IdLoaiCha`) REFERENCES `loaithucpham` (`IdLoai`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NHANVIEN_PERMISSION` FOREIGN KEY (`IdPermission`) REFERENCES `permission` (`IdPermission`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Các ràng buộc cho bảng `theodoithucpham`
--
ALTER TABLE `theodoithucpham`
  ADD CONSTRAINT `FK_THEODOITHUCPHAM_KHACHHANG` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`IdKH`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_THEODOITHUCPHAM_THUCPHAM` FOREIGN KEY (`IdFood`) REFERENCES `thucpham` (`IdThucPham`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Các ràng buộc cho bảng `thucpham`
--
ALTER TABLE `thucpham`
  ADD CONSTRAINT `FK_THUCPHAM_KHUYENMAI` FOREIGN KEY (`IdKhuyenMai`) REFERENCES `khuyenmai` (`IdKhuyenMai`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_THUCPHAM_LOAITHUCPHAM` FOREIGN KEY (`IdLoai`) REFERENCES `loaithucpham` (`IdLoai`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_THUCPHAM_NHASANXUAT` FOREIGN KEY (`IdNSX`) REFERENCES `nhasanxuat` (`IdNSX`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
