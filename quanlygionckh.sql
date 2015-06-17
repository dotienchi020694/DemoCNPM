-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2015 at 06:51 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quanlygionckh`
--

-- --------------------------------------------------------

--
-- Table structure for table `dkonline_sogiogiangday`
--

CREATE TABLE IF NOT EXISTS `dkonline_sogiogiangday` (
`ggd_id` int(11) NOT NULL,
  `ggd_tenmon` varchar(50) NOT NULL,
  `ggd_sogiothucday` float NOT NULL,
  `ggd_hesomon` float NOT NULL,
  `ggd_tenlop` varchar(100) NOT NULL,
  `ggd_hesolop` float NOT NULL,
  `ggd_hesothoigian` float NOT NULL,
  `gv_id` int(11) NOT NULL,
  `kh_id` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kihoc`
--

CREATE TABLE IF NOT EXISTS `kihoc` (
`kh_id` int(11) NOT NULL,
  `kh_ten` varchar(100) NOT NULL,
  `kh_tgbd` int(2) NOT NULL,
  `kh_tgkt` int(2) NOT NULL,
  `kh_mota` varchar(1000) DEFAULT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `namhoc`
--

CREATE TABLE IF NOT EXISTS `namhoc` (
`nh_id` int(11) NOT NULL,
  `nh_ten` varchar(100) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `namhoc`
--

INSERT INTO `namhoc` (`nh_id`, `nh_ten`, `is_delete`) VALUES
(1, 'Năm học 2014', 0),
(2, 'Năm học 2015', 0),
(3, 'Năm học 2016', 0),
(4, 'Năm học 2017', 0),
(5, 'Năm học 2018', 0),
(6, 'Năm học 2019', 0),
(7, 'Năm học 2020', 0);

-- --------------------------------------------------------

--
-- Table structure for table `namhoc_kihoc`
--

CREATE TABLE IF NOT EXISTS `namhoc_kihoc` (
`nh_kh_id` int(11) NOT NULL,
  `nh_id` int(11) NOT NULL,
  `kh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `qlcv_danhmucquydoi`
--

CREATE TABLE IF NOT EXISTS `qlcv_danhmucquydoi` (
`dmqd_id` int(11) NOT NULL,
  `lv_id` int(11) NOT NULL,
  `dmqd_congvieccuthe` varchar(1000) NOT NULL,
  `dmqd_sogio` float NOT NULL,
  `dmqd_sodonvi` float NOT NULL,
  `dv_id` int(11) NOT NULL,
  `dmqd_xacnhan` int(1) NOT NULL DEFAULT '0',
  `dmqd_ghichu` varchar(500) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qlcv_danhmucquydoi`
--

INSERT INTO `qlcv_danhmucquydoi` (`dmqd_id`, `lv_id`, `dmqd_congvieccuthe`, `dmqd_sogio`, `dmqd_sodonvi`, `dv_id`, `dmqd_xacnhan`, `dmqd_ghichu`, `is_delete`) VALUES
(1, 1, 'Đề tài cấp nhà nước', 350, 350, 1, 0, 'Chia giờ cho những người tham gia', 0),
(2, 1, 'Đề tài cấp bộ', 200, 1, 1, 0, 'Chia giờ cho những người tham gia', 0),
(3, 1, 'Đề tài cấp trường', 100, 1, 1, 0, 'Chia giờ cho những người tham gia', 0),
(4, 2, 'Sách chuyên khảo, sách dịch', 150, 100, 2, 0, 'Chia giờ cho những người tham gia', 0),
(5, 2, 'Giáo trình', 70, 1, 3, 0, 'Chia giờ cho những người tham gia', 0),
(6, 2, 'Bài giảng', 20, 1, 3, 0, 'Chia giờ cho những người tham gia', 0),
(7, 3, 'Bài báo đăng trên các tạp chí quốc tế có uy tín thuộc danh mục Hội đồng chức danh tính tối đa 1.5 điểm', 150, 1, 1, 0, 'Chia giờ cho những người tham gia.', 0),
(8, 2, 'Bài giảng', 20, 1, 3, 0, 'Chia giờ cho những người tham gia', 0),
(9, 3, 'Bài báo đăng trên các tạp chí quốc tế có uy tín thuộc danh mục Hội đồng chức danh tính tối đa 1.5 điểm', 150, 1, 1, 0, 'Chia giờ cho những người tham gia.', 0),
(15, 1, 'Đề tài cấp thế giới', 350, 200, 2, 0, 'Chia đều số người tham gia', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qlcv_donvi`
--

CREATE TABLE IF NOT EXISTS `qlcv_donvi` (
`dv_id` int(11) NOT NULL,
  `dv_ten` varchar(50) NOT NULL,
  `dv_mota` varchar(1000) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qlcv_donvi`
--

INSERT INTO `qlcv_donvi` (`dv_id`, `dv_ten`, `dv_mota`, `is_delete`) VALUES
(1, 'giờ', 'số giờ thực hiện', 0),
(2, 'trang', 'số trang', 0),
(3, 'TC', 'tín chỉ môn học của giáo trình', 0),
(4, 'giờ trình bày', 'số giờ trình bày tại seminar', 0),
(5, 'giờ dự', 'số giờ dự seminar', 0),
(6, 'tín chỉ', 'tín chỉ chương trình đào tạo thạc sĩ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qlcv_loaiviec`
--

CREATE TABLE IF NOT EXISTS `qlcv_loaiviec` (
`lv_id` int(11) NOT NULL,
  `lv_ten` varchar(500) NOT NULL,
  `lv_mota` varchar(1000) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qlcv_loaiviec`
--

INSERT INTO `qlcv_loaiviec` (`lv_id`, `lv_ten`, `lv_mota`, `is_delete`) VALUES
(1, 'Thực hiện đề tài', 'Công việc bao gồm các đề tài cấp trường cấp bộ và cấp nhà nước.', 0),
(2, 'Viết sách, giáo trình, bài giảng', '', 0),
(3, 'Viết bài báo khoa học', '', 0),
(4, 'Báo cáo khoa học dự hội thảo khoa học.', 'Được tính tối đa 80 giờ.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qldm_dinhmuc_giangday`
--

CREATE TABLE IF NOT EXISTS `qldm_dinhmuc_giangday` (
`dmgd_id` int(11) NOT NULL,
  `dmgd_sogio` int(11) NOT NULL,
  `dmgd_mota` varchar(1000) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qldm_dinhmuc_giangday`
--

INSERT INTO `qldm_dinhmuc_giangday` (`dmgd_id`, `dmgd_sogio`, `dmgd_mota`, `is_delete`) VALUES
(1, 180, 'Giờ quy chuẩn 1 năm học...', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qldm_dinhmuc_nckh`
--

CREATE TABLE IF NOT EXISTS `qldm_dinhmuc_nckh` (
`dmnckh_id` int(11) NOT NULL,
  `hv_id` int(11) NOT NULL,
  `dmnckh_sogio` int(11) NOT NULL,
  `dmnckh_mota` varchar(1000) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qldm_dinhmuc_nckh`
--

INSERT INTO `qldm_dinhmuc_nckh` (`dmnckh_id`, `hv_id`, `dmnckh_sogio`, `dmnckh_mota`, `is_delete`) VALUES
(1, 1, 150, 'Giờ chuẩn nghiên cứu khoa học.', 0),
(2, 2, 180, 'giờ quy chuẩn/1 năm học.', 0),
(3, 3, 180, 'Giờ quy chuẩn /1 năm học.', 0),
(4, 5, 160, 'Giờ quy chuẩn/1 năm học.', 0),
(5, 6, 160, 'giờ quy chuẩn/1 năm học', 0),
(6, 4, 160, 'giờ quy chuẩn/1 năm học.', 0),
(7, 7, 140, 'giờ quy chuẩn/1 năm học', 0),
(8, 8, 140, 'giờ quy chuẩn/1 năm học', 0),
(9, 9, 140, 'giờ quy chuẩn/1 năm học.', 0),
(10, 10, 110, 'This is description', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qldm_heso`
--

CREATE TABLE IF NOT EXISTS `qldm_heso` (
  `hv_id` int(11) NOT NULL,
  `nh_id` int(11) NOT NULL,
  `hs_heso` float NOT NULL,
  `hs_mota` varchar(1000) NOT NULL,
  `hs_sonamyc` int(1) NOT NULL DEFAULT '0',
  `hs_sonamdk` tinyint(4) DEFAULT '0',
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qldm_heso`
--

INSERT INTO `qldm_heso` (`hv_id`, `nh_id`, `hs_heso`, `hs_mota`, `hs_sonamyc`, `hs_sonamdk`, `is_delete`) VALUES
(2, 2, 1.7, 'Giáo sư phải làm nhiều việc nên cho cao', 0, 0, 0),
(4, 1, 1.5, '', 0, 0, 0),
(6, 1, 1.6, '', 0, 0, 0),
(7, 1, 1.2, '', 1, 0, 0),
(8, 1, 1.3, '', 2, 0, 0),
(9, 1, 1.4, '', 0, 0, 0),
(10, 1, 1, '', 0, 0, 1),
(10, 2, 0.9, '', 8, 1, 1),
(10, 5, 0.6, '', 10, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `qlgv_bomon`
--

CREATE TABLE IF NOT EXISTS `qlgv_bomon` (
`bm_id` int(11) NOT NULL,
  `bm_ten` varchar(100) NOT NULL,
  `bm_mota` varchar(1000) NOT NULL,
  `k_id` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qlgv_bomon`
--

INSERT INTO `qlgv_bomon` (`bm_id`, `bm_ten`, `bm_mota`, `k_id`, `is_delete`) VALUES
(1, 'Bộ môn toán', 'Đào tạo chuyên ngành toán ứng dụng.', 1, 0),
(2, 'Bộ môn tin', 'Đào tạo các chuyên ngành khoa học máy tính, truyền thông và mạng máy tính, hệ thống thông tin quản lý.', 1, 0),
(6, 'Kế toán', 'Đào tạo các chuyên ngành kế toán.', 2, 0),
(7, 'Tài chính ngân hàng.', 'Đào tạo ác chuyên ngành tài chính và ngân hàng.', 2, 0),
(8, 'Quản trị kinh doanh', 'Gồm các chuyên ngành về quản trị kinh doanh.', 2, 0),
(9, 'Ngôn ngữ Anh', 'Đào tạo chuyên ngành tiếng Anh\r\n', 3, 0),
(10, 'Ngôn ngữ Nhật', 'Đào tạo chuyên ngành tiếng Nhật', 3, 0),
(11, 'Ngôn ngữ Trung Quốc', 'Đào tạo chuyên ngành tiếng Trung Quốc', 3, 0),
(12, 'Điều dưỡng', 'Đào tạo chuyên ngành điều dưỡng', 4, 0),
(13, 'Y tế công cộng', 'Đào tạo chuyên ngành y tế công cộng', 4, 0),
(14, 'Quản lý bệnh viện', 'Đào tạo chuyên ngành quản lý bệnh viện.', 4, 0),
(15, 'Công tác xã hội', 'Đào tạo chuyên ngành công tác xã hội.', 5, 0),
(16, 'Việt Nam học.', 'Đào tạo chuyên ngành việt nam học.', 5, 0),
(17, 'Tiếng nhật', '', 3, 0),
(18, 'Tiếng ý', '', 3, 0),
(19, 'Tiếng Hàn', '', 3, 0),
(20, 'Tiếng Hán', '', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `qlgv_chucdanh`
--

CREATE TABLE IF NOT EXISTS `qlgv_chucdanh` (
`cd_id` int(11) NOT NULL,
  `cd_ten` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cd_dmg_giangday` int(3) DEFAULT '0',
  `cd_dmg_nckh` int(3) DEFAULT '0',
  `cd_mota` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qlgv_chucdanh`
--

INSERT INTO `qlgv_chucdanh` (`cd_id`, `cd_ten`, `cd_dmg_giangday`, `cd_dmg_nckh`, `cd_mota`, `is_delete`) VALUES
(1, 'Trưởng khoa', 100, 80, 'Người đứng đầu một khoa.', 0),
(2, 'Phó trưởng khoa', 75, 50, 'Người đứng thứ 2 trong khoa phụ trách công tác quản lý.', 0),
(3, 'Trưởng bộ môn', 50, 30, NULL, 0),
(4, 'Phó Trưởng bộ môn', 0, 0, NULL, 0),
(5, 'Thư ký khoa và bộ môn', 0, 0, NULL, 0),
(6, 'Thư ký khoa', 0, 0, NULL, 0),
(7, 'Thư ký bộ môn', 0, 0, NULL, 0),
(8, 'Giảng viên', 30, 40, NULL, 0),
(9, 'Thư ký', 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `qlgv_giangvien`
--

CREATE TABLE IF NOT EXISTS `qlgv_giangvien` (
`gv_id` int(11) NOT NULL,
  `gv_magv` varchar(10) NOT NULL,
  `gv_ten` varchar(100) DEFAULT NULL,
  `gv_gioitinh` int(1) DEFAULT NULL,
  `gv_diachi` varchar(100) DEFAULT NULL,
  `gv_sdt` varchar(50) DEFAULT NULL,
  `gv_email` varchar(50) DEFAULT NULL,
  `gv_time_start_job` datetime DEFAULT NULL,
  `bm_id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `hv_id` int(11) NOT NULL,
  `tt_id` int(11) NOT NULL,
  `gv_mota` text,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qlgv_giangvien`
--

INSERT INTO `qlgv_giangvien` (`gv_id`, `gv_magv`, `gv_ten`, `gv_gioitinh`, `gv_diachi`, `gv_sdt`, `gv_email`, `gv_time_start_job`, `bm_id`, `cd_id`, `hv_id`, `tt_id`, `gv_mota`, `is_delete`) VALUES
(1, 'GV0001', 'Trần Đức Minh', 1, 'Hà Nội', '01687231088', 'minhtd@gmail.com', '0000-00-00 00:00:00', 2, 1, 3, 1, '&lt;p&gt;Giảng vi&amp;ecirc;n đi c&amp;ocirc;ng t&amp;aacute;cfdf&lt;/p&gt;\r\n', 0),
(2, 'GV00013725', 'Đinh Phương Thanh', 2, 'Ba Đình - Hà Nội', '0915178691', '0915178691', '0000-00-00 00:00:00', 1, 8, 3, 1, 'Thử thêm mới một giảng viên.', 0),
(3, 'GV00044352', 'Hoàng Anh Sơn', 1, 'Ba Đình - Hà Nội', '0164586473', '0164586473', '2015-08-03 00:00:00', 2, 8, 7, 3, '', 0),
(4, 'GV005', 'Bùi Thị Phương Thảo', 2, 'Hà Nội', '01687589874', '01687589874', '0000-00-00 00:00:00', 15, 8, 7, 1, '', 0),
(5, 'GV006', 'Mai Thúy Nga', 2, 'Hà Nội', '01687458965', '01687458965', '0000-00-00 00:00:00', 2, 4, 1, 1, '', 0),
(6, 'GV006', 'Trần Tuấn Toàn', 1, 'Hà Nội', '01687985485', '01687985485', '0000-00-00 00:00:00', 2, 8, 1, 1, '', 0),
(7, 'A206131314', 'Test', 1, 'Vietnam', '0915131313', '0915131313', '2018-12-03 00:00:00', 2, 3, 2, 1, 'Rất tốt', 1),
(8, 'aerwq3tww', 'Test', 1, 'gsfbgsfhbsbs', '12523626', '12523626', '2018-08-01 00:00:00', 10, 4, 6, 1, '&lt;p&gt;Test m&amp;ocirc; tả&lt;/p&gt;\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qlgv_hocvi`
--

CREATE TABLE IF NOT EXISTS `qlgv_hocvi` (
`hv_id` int(11) NOT NULL,
  `hv_ten` varchar(100) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  `hv_mota` text
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qlgv_hocvi`
--

INSERT INTO `qlgv_hocvi` (`hv_id`, `hv_ten`, `is_delete`, `hv_mota`) VALUES
(1, 'Giảng viên cao cấp', 1, 'Giảng viên cao cấp của trường.'),
(2, 'Giáo sư', 0, NULL),
(3, 'Tiến sĩ khoa học', 0, NULL),
(4, 'Tiến sĩ', 0, NULL),
(5, 'Giảng viên chính', 0, NULL),
(6, 'Phó giáo sư', 0, NULL),
(7, 'Giảng viên < 3 năm chưa là thạc sĩ', 0, NULL),
(8, 'Giảng viên > 3 năm chưa là thạc sĩ', 0, NULL),
(9, 'Thạc sĩ', 0, NULL),
(10, 'Cơ hữu tập sự', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `qlgv_khoa`
--

CREATE TABLE IF NOT EXISTS `qlgv_khoa` (
`k_id` int(11) NOT NULL,
  `k_ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_makhoa` varchar(10) DEFAULT NULL,
  `k_email` varchar(50) DEFAULT NULL,
  `k_sdt` varchar(15) DEFAULT NULL,
  `k_mota` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qlgv_khoa`
--

INSERT INTO `qlgv_khoa` (`k_id`, `k_ten`, `k_makhoa`, `k_email`, `k_sdt`, `k_mota`, `is_delete`) VALUES
(1, 'Toán - Tin', 'TT0001', 'toantin.tlu@gmail.com', '041256898', 'Gồm bộ môn toán và bộ môn tin', 0),
(2, 'Khoa kinh tế - Quản lý', 'KTQL0003', 'kinhthequanly.tlu@gmail.com', '043569856', 'Gồm các bộ môn kinh tế', 0),
(3, 'Ngoại ngữ', 'NN0005', 'nntlu@gmail.com', '044569875', 'Gồm các bộ môn tiếng anh, tiếng trung, tiếng nhật', 0),
(4, 'Khoa học sức khỏe', 'KHSK004', 'khsk@gmail.com', '01687231082', 'Gồm các bộ môn điều dưỡng, y tế công cộng, quản lý bệnh viện.', 0),
(5, 'Khoa học xã hỗi và nhân văn ', 'KHXH005', 'ddtlu@gmail.com', '01687231088', 'Gồm các bộ môn công tác xã hội và việt nam học', 0),
(6, 'Việt Nam học', 'VNH0011', 'vnhtlu@gmail.com', '01687231082', 'Viá»‡t Nam há»c', 1),
(7, 'Khoa gì đó', 'AB0013', 'dd@gamil.com', '123456', '', 1),
(11, 'Khoa gì đấy', 'CD0015', 'vh@gmaiil.com', '1255', '', 1),
(15, 'khoa cu the', '1234ABCD', 'lalla@yahoo.com', '019238249142', '1234', 1),
(16, 'Khoa học sức khỏe', 'KHSK003', 'khsk@gmil.com', '0489657896', 'Gồm các bộ bộ công tác xã hội và việt nam học', 1),
(17, 'ưetwt', '?erwvwvgwe', 'rfwfw@wegfwgew', '32526472372', '<p>gshgsrhsrhf</p>\r\n', 1),
(18, 'aaaaaaaaaaaa', 'dddddddddd', '3333333333', '44444444', '<p>132222</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qlgv_tinhtrang`
--

CREATE TABLE IF NOT EXISTS `qlgv_tinhtrang` (
`tt_id` int(11) NOT NULL,
  `tt_ten` varchar(50) NOT NULL,
  `tt_mota` varchar(1000) DEFAULT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qlgv_tinhtrang`
--

INSERT INTO `qlgv_tinhtrang` (`tt_id`, `tt_ten`, `tt_mota`, `is_delete`) VALUES
(1, 'Bình thường', 'Bình thường', 1),
(3, 'Không bình thường', 'Không bình thường một chút nào', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qls_giangvien_seminar`
--

CREATE TABLE IF NOT EXISTS `qls_giangvien_seminar` (
  `gv_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `qls_seminar`
--

CREATE TABLE IF NOT EXISTS `qls_seminar` (
`s_id` int(11) NOT NULL,
  `s_ten` varchar(100) NOT NULL,
  `s_chude` varchar(500) NOT NULL,
  `s_thoigianbd` date NOT NULL,
  `s_thoigiankt` date NOT NULL,
  `s_diadiem` varchar(500) NOT NULL,
  `s_nguoithuchien` int(11) NOT NULL,
  `s_noidung` varchar(1000) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `qltk_role`
--

CREATE TABLE IF NOT EXISTS `qltk_role` (
`r_id` int(4) NOT NULL,
  `r_ten` varchar(50) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qltk_role`
--

INSERT INTO `qltk_role` (`r_id`, `r_ten`, `is_delete`) VALUES
(1, 'ADMIN', 0),
(2, 'Giảng viên', 0),
(3, 'Thư ký bộ môn', 0),
(4, 'Thư ký lãnh đạo', 0),
(5, 'Lãnh đạo', 0),
(6, 'Cán bộ phòng NCKH', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qltk_user`
--

CREATE TABLE IF NOT EXISTS `qltk_user` (
`u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_password` varchar(32) NOT NULL,
  `r_id` int(11) NOT NULL,
  `gv_id` int(11) NOT NULL,
  `u_trangthai` tinyint(4) NOT NULL DEFAULT '1',
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qltk_user`
--

INSERT INTO `qltk_user` (`u_id`, `u_name`, `u_password`, `r_id`, `gv_id`, `u_trangthai`, `is_delete`) VALUES
(1, 'minhtd', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 1, 0),
(2, 'test', '123456789', 5, 4, 1, 1),
(3, 'thanhdp', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, 1, 0),
(4, 'son', 'a5d35e01f286cdaed1a267f669c07eea', 1, 3, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dkonline_sogiogiangday`
--
ALTER TABLE `dkonline_sogiogiangday`
 ADD PRIMARY KEY (`ggd_id`);

--
-- Indexes for table `kihoc`
--
ALTER TABLE `kihoc`
 ADD PRIMARY KEY (`kh_id`);

--
-- Indexes for table `namhoc`
--
ALTER TABLE `namhoc`
 ADD PRIMARY KEY (`nh_id`);

--
-- Indexes for table `namhoc_kihoc`
--
ALTER TABLE `namhoc_kihoc`
 ADD PRIMARY KEY (`nh_kh_id`);

--
-- Indexes for table `qlcv_danhmucquydoi`
--
ALTER TABLE `qlcv_danhmucquydoi`
 ADD PRIMARY KEY (`dmqd_id`);

--
-- Indexes for table `qlcv_donvi`
--
ALTER TABLE `qlcv_donvi`
 ADD PRIMARY KEY (`dv_id`);

--
-- Indexes for table `qlcv_loaiviec`
--
ALTER TABLE `qlcv_loaiviec`
 ADD PRIMARY KEY (`lv_id`);

--
-- Indexes for table `qldm_dinhmuc_giangday`
--
ALTER TABLE `qldm_dinhmuc_giangday`
 ADD PRIMARY KEY (`dmgd_id`);

--
-- Indexes for table `qldm_dinhmuc_nckh`
--
ALTER TABLE `qldm_dinhmuc_nckh`
 ADD PRIMARY KEY (`dmnckh_id`);

--
-- Indexes for table `qldm_heso`
--
ALTER TABLE `qldm_heso`
 ADD PRIMARY KEY (`hv_id`,`nh_id`);

--
-- Indexes for table `qlgv_bomon`
--
ALTER TABLE `qlgv_bomon`
 ADD PRIMARY KEY (`bm_id`), ADD KEY `fk_qlgv_khoa` (`k_id`);

--
-- Indexes for table `qlgv_chucdanh`
--
ALTER TABLE `qlgv_chucdanh`
 ADD PRIMARY KEY (`cd_id`);

--
-- Indexes for table `qlgv_giangvien`
--
ALTER TABLE `qlgv_giangvien`
 ADD PRIMARY KEY (`gv_id`), ADD KEY `fk_qlgv_chucdanh` (`cd_id`), ADD KEY `fk_qlgv_hocvi` (`hv_id`), ADD KEY `fk_qlgv_bomon` (`bm_id`), ADD KEY `fk_qlgv_tinhtrang` (`tt_id`);

--
-- Indexes for table `qlgv_hocvi`
--
ALTER TABLE `qlgv_hocvi`
 ADD PRIMARY KEY (`hv_id`);

--
-- Indexes for table `qlgv_khoa`
--
ALTER TABLE `qlgv_khoa`
 ADD PRIMARY KEY (`k_id`);

--
-- Indexes for table `qlgv_tinhtrang`
--
ALTER TABLE `qlgv_tinhtrang`
 ADD PRIMARY KEY (`tt_id`);

--
-- Indexes for table `qls_giangvien_seminar`
--
ALTER TABLE `qls_giangvien_seminar`
 ADD PRIMARY KEY (`gv_id`,`s_id`);

--
-- Indexes for table `qls_seminar`
--
ALTER TABLE `qls_seminar`
 ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `qltk_role`
--
ALTER TABLE `qltk_role`
 ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `qltk_user`
--
ALTER TABLE `qltk_user`
 ADD PRIMARY KEY (`u_id`), ADD KEY `fk_qltk_role` (`r_id`), ADD KEY `fk_qlgv_giangvien` (`gv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dkonline_sogiogiangday`
--
ALTER TABLE `dkonline_sogiogiangday`
MODIFY `ggd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kihoc`
--
ALTER TABLE `kihoc`
MODIFY `kh_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `namhoc`
--
ALTER TABLE `namhoc`
MODIFY `nh_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `namhoc_kihoc`
--
ALTER TABLE `namhoc_kihoc`
MODIFY `nh_kh_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qlcv_danhmucquydoi`
--
ALTER TABLE `qlcv_danhmucquydoi`
MODIFY `dmqd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `qlcv_donvi`
--
ALTER TABLE `qlcv_donvi`
MODIFY `dv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `qlcv_loaiviec`
--
ALTER TABLE `qlcv_loaiviec`
MODIFY `lv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `qldm_dinhmuc_giangday`
--
ALTER TABLE `qldm_dinhmuc_giangday`
MODIFY `dmgd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `qldm_dinhmuc_nckh`
--
ALTER TABLE `qldm_dinhmuc_nckh`
MODIFY `dmnckh_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `qlgv_bomon`
--
ALTER TABLE `qlgv_bomon`
MODIFY `bm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `qlgv_chucdanh`
--
ALTER TABLE `qlgv_chucdanh`
MODIFY `cd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `qlgv_giangvien`
--
ALTER TABLE `qlgv_giangvien`
MODIFY `gv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `qlgv_hocvi`
--
ALTER TABLE `qlgv_hocvi`
MODIFY `hv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `qlgv_khoa`
--
ALTER TABLE `qlgv_khoa`
MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `qlgv_tinhtrang`
--
ALTER TABLE `qlgv_tinhtrang`
MODIFY `tt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `qls_seminar`
--
ALTER TABLE `qls_seminar`
MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qltk_role`
--
ALTER TABLE `qltk_role`
MODIFY `r_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `qltk_user`
--
ALTER TABLE `qltk_user`
MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
