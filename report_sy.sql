-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2020 at 05:44 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report_sy`
--

-- --------------------------------------------------------

--
-- Table structure for table `sy_brand`
--

CREATE TABLE `sy_brand` (
  `b_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `b_name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sy_brand`
--

INSERT INTO `sy_brand` (`b_id`, `b_name`) VALUES
('b001', 'LG inverter'),
('b002', 'Mitsubishi Electric Mr.Slim'),
('b003', 'Samsung'),
('b004', 'Daikin'),
('b005', 'Carrier'),
('b006', 'CENTRAL AIR'),
('b007', 'Saijo Denki'),
('b008', 'Panasonic'),
('b009', 'EMINENT'),
('b010', 'Misubishi Heavy Duty'),
('b011', 'York');

-- --------------------------------------------------------

--
-- Table structure for table `sy_check`
--

CREATE TABLE `sy_check` (
  `c_id` varchar(20) NOT NULL,
  `c_list` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sy_check`
--

INSERT INTO `sy_check` (`c_id`, `c_list`) VALUES
('c001', 'ตรวจสอบอุณหภูมิหน้าเครื่อง (°C)'),
('c002', 'ตรวจสอบแรงลมหน้าเครื่อง (เมตร/วินาที)'),
('c003', 'ตรวจสอบแรงดันน้ำยาแอร์ (PSI.)'),
('c004', 'ตรวจสอบกระแสไฟของคอมเพรสเซอร์.');

-- --------------------------------------------------------

--
-- Table structure for table `sy_overview`
--

CREATE TABLE `sy_overview` (
  `v_id` varchar(20) NOT NULL,
  `v_list` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sy_overview`
--

INSERT INTO `sy_overview` (`v_id`, `v_list`) VALUES
('v002', '• ผลการตรวจสอบก่อนการล้าง สภาพทางกายภาพของเครื่องปรับอากาศ คอยล์ร้อน/เย็น อยู่ในเกณฑ์'),
('v001', '• ผลการตรวจสอบก่อนการล้าง ปริมาณฝุ่นที่สะสมอยู่ในคอยล์เย็น อยู่ในเกณฑ์'),
('v003', '• ผลการตรวจสอบ สภาพการทำงานของคอยล์เย็น หลังล้าง อยู่ในเกณฑ์'),
('v004', '• ผลการตรวจสอบ สภาพการทำงานของคอยล์ร้อน หลังล้าง อยู่ในเกณฑ์'),
('v005', '• ผลการตรวจสอบ การทำอุณหภูมิ หลังล้าง ทำอุณหภูมิได้ อยู่ในเกณฑ์'),
('v006', '• ผลการตรวจสอบ แรงลมของพัดลมที่คอยล์เย็น หลังล้าง อยู่ในเกณฑ์'),
('v007', '• ผลการตรวจสอบ แรงดันน้ำยาทำความเย็น หลังล้าง อยู่ในเกณฑ์');

-- --------------------------------------------------------

--
-- Table structure for table `sy_refrig`
--

CREATE TABLE `sy_refrig` (
  `r_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `r_name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sy_refrig`
--

INSERT INTO `sy_refrig` (`r_id`, `r_name`) VALUES
('r001', 'R410A'),
('r002', 'R22'),
('r003', 'R32');

-- --------------------------------------------------------

--
-- Table structure for table `sy_status`
--

CREATE TABLE `sy_status` (
  `s_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `s_name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sy_status`
--

INSERT INTO `sy_status` (`s_id`, `s_name`) VALUES
('s001', 'ปกติ'),
('s002', 'ไม่ปกติ'),
('s003', 'ยังไม่ได้รับการตรวจสอบ'),
('s004', 'ตรวจสอบไม่ได้');

-- --------------------------------------------------------

--
-- Table structure for table `sy_team`
--

CREATE TABLE `sy_team` (
  `t_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `t_head` varchar(70) CHARACTER SET utf8 NOT NULL,
  `t_number` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sy_team`
--

INSERT INTO `sy_team` (`t_id`, `t_head`, `t_number`) VALUES
('t001', 'ณัตพงษ์ แก้วทา', '1'),
('t002', 'วิทูร พลทวี', '2'),
('t003', 'ลิขิต กอนมนตร', '3'),
('t004', 'ณัฐิวุฒิ กลีบบัวทอง', '4'),
('t005', 'กรกฏ เรืองฤทธิ์', '5'),
('t006', 'ศราวุธ ส่วยรัก', '6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sy_brand`
--
ALTER TABLE `sy_brand`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `sy_check`
--
ALTER TABLE `sy_check`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `sy_overview`
--
ALTER TABLE `sy_overview`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `sy_refrig`
--
ALTER TABLE `sy_refrig`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sy_status`
--
ALTER TABLE `sy_status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sy_team`
--
ALTER TABLE `sy_team`
  ADD PRIMARY KEY (`t_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
