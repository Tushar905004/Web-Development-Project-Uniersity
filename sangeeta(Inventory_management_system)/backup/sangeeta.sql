-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2014 at 04:16 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sangeeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_id`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'sangeeta', '6057BDR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bonus`
--

CREATE TABLE IF NOT EXISTS `tbl_bonus` (
  `bonus_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) NOT NULL,
  `paid_bonus` varchar(10) NOT NULL,
  `pay_month` varchar(50) NOT NULL,
  `pay_year` int(4) NOT NULL,
  `paid_date` varchar(30) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  `status` varchar(2) NOT NULL,
  PRIMARY KEY (`bonus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_info`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_info` (
  `customer_id` int(5) NOT NULL AUTO_INCREMENT,
  `cus_name` text NOT NULL,
  `address` text NOT NULL,
  `mob_no` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL,
  `reg_date` int(20) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `tbl_customer_info`
--

INSERT INTO `tbl_customer_info` (`customer_id`, `cus_name`, `address`, `mob_no`, `status`, `reg_date`) VALUES
(35, 'NURUL KARIM', 'BAS PADUA', '01835963277', '', 1309280106),
(3, 'Akber Hossain', 'Bagmara', '01811517928', '', 1309070545),
(4, 'mohammmed Ali', 'noya pur parashuram', '01815275568', '', 1309190721),
(5, 'MD;SHAJAHAN', 'DUNI KUNDA', '01748778801', '', 1309191057),
(6, 'MDKHOKON', 'KAPTAN BAZAR', '01811743995', '', 1309200905),
(7, 'MD;ANWER', 'noya pur parashuram', '01823261621', '', 1309210710),
(8, 'TARAQ AZAIZ KUNDUKER', 'UTTOR KATRANGA', '01815726494', '', 1309211046),
(34, 'ABDUL HALIM', 'KALA PARA', '01822564511', '', 1309280103),
(10, 'MD;PINTO', 'RAJUS PUR PARASHURAM ', '01815119355', '', 1309220841),
(11, 'MD;MOSHIN', 'SHUTO O NAGAR', '01823975406', '', 1309221025),
(12, 'MD;YUSUP', 'KAWTULE PARASHURAM', '0181298121', '', 1309230734),
(13, 'MD;YUSUP', 'KAWTULE PARASHURAM', '0181298121', '', 1309230739),
(14, 'MD;NUR AMMED RITO', 'ANNTU PUR', '01818854750', '', 1309250914),
(15, 'ABDUL KADER', 'KOONDUL HIGH PARASHUM', '01811512541', '', 1309250920),
(16, 'RAZAUL KARIM', 'WEST ALOKA PARASHURAM ', '01857255993', '', 1309260729),
(17, 'MIZANUR RAHAMAN', 'PARASHURAM FENI', '01816828215', '', 1309260737),
(18, 'SHAMIM', 'KALIKA PUR', '01845126279', '', 1309260748),
(19, 'KAWSAR ALAM', 'DUNI KUNDA', '01836238383', '', 1309260753),
(20, 'KAWSER  ALAM', 'DUNI KUNDA', '01836238383', '', 1309260758),
(21, 'MD ;KAWSER ALAM', 'DUNI KUNDA', '01836238383', '', 1309260801),
(22, 'KAWSER  ALAM', 'DUNI KUNDA', '01836238383', '', 1309260805),
(23, 'KAWSAR ALAM', 'DUNI KUNDA', '01836238383', '', 1309260807),
(24, 'NURUL KARIM', 'SALIA PARASHU RAM FENI', '01716157041', '', 1309261132),
(25, 'MOSHIUR RAHAMAN', 'KOLA PARA', '01818670081', '', 1309261137),
(26, 'ABUL HASHEM', 'SALIA PARASHURAM FENI', '01821327667', '', 1309261144),
(27, 'KAWSAR ALAM', 'DUNI KUNDA', '01818670081', '', 1309261240),
(28, 'KAWSAR ALAM', 'DUNI KUNDA', '01818670081', '', 1309261242),
(29, 'ABDUL KADER', 'DUNI KUNDA', '0182354781', '', 1309280617),
(30, 'BAGEM ROKAYA', 'SATTUNA GAR', '018376889919', '', 1309280637),
(31, 'ABDUL MALEK', 'UTTOR KAWTALE', '01817640021', '', 1309280715),
(32, 'HAFAJA AKTHER', 'BARABAREA PARASHURAM', '01830514368', '', 1309280721),
(33, 'ASANUL HAQ', 'PARASHURAM', '01818740692', '', 1309280822),
(36, 'MD;HARUN', 'SALDAR PARASHURAM', '01820873588 ', '', 1309280108),
(37, 'BHUIYA    ELACTRONIC', 'CHHAGAL NIYA FENI', '01819061944/019', '', 1309290852),
(42, 'MD;ABDUL WAHAB', 'MALI PATHER PARASHU RAM', '01832509360', '', 1310011245),
(41, 'MD;ABDUL WAHAB', 'MALI PATHER PARASHU RAM', '01832509360', '', 1310011243),
(40, 'ABDUL  MOTIN', 'TRADESHAR KHANDOLHIG', '01733108228', '', 1309290939),
(43, 'MD;ABDUL WAHAB', 'MALI PATHER PARASHU RAM', '01832509360', '', 1310011248),
(44, 'ABDUL  MOTIN', 'TRADESHAR KHANDOLHIG', '01733108228', '', 1310010105),
(45, 'PARASHURAM IDEL COMPUTER CENTER', 'HASPATAL ROAD PARASHURAM', '01716335962', '', 1310010215),
(46, 'BHUIYA    ELACTRONIC', 'CHHAGAL NIYA FENI', '01819061944/019', '', 1310010230),
(47, 'ABUL HASHEMP', 'EAST SHAHAB NAGER', '01814767065', '', 1310010234),
(48, 'BHUIYA    ELACTRONIC', 'CHHAGAL NIYA FENI', '01819061944/019', 'fixed', 0),
(49, 'MASTER SHEK AHAMMED ELACTRONIC', 'AMJAD MAZUMDER  HAT', '01813934123 /01', 'fixed', 0),
(50, 'BHUIYA    ELACTRONIC', 'CHHAGAL NIYA FENI', '01819061944/019', 'fixed', 0),
(51, 'ABDUL HAMID', 'SSATUNANGER PARASHU RAM', '01824024025', '', 1310020121),
(52, 'ALI AKBOR', 'KHAND HIGH PARASHURAM', '01733108228', '', 1310020202),
(53, 'BVIDAN DAS', 'SPARASHURAM FENIA', '01914106086', '', 1310020209),
(54, 'REPU SHA', 'UTTOR GUTOMA', '01735227649', '', 1310030114),
(55, 'ABDULGOUPUR', 'MASTER PARA FENI', '01831772479', '', 1310030127),
(56, 'MD;SHOHAG CHUDUDREY', 'RAJUS PUR PARASHURAM', '01817243530', '', 1310030136),
(57, 'MD;SHUFUL ISLAM', 'NIGKALEKA PUR', '01817243530', '', 1310030146),
(58, 'MIRAJ HOOSAN', 'NOA PUR PARASHURAM', '01814838892', '', 1310051010),
(59, 'YEASMIN', 'KOLA PARA', '01967215227', '', 1310051012),
(60, 'MD;SHAMIM', 'SALIA PARASHU RAM FENI', '01726048263', '', 1310051016),
(61, 'MD;RASEL', 'ANNOTUPUR', '01934280482', '', 1310051037),
(62, 'MD;NOYON', 'SALIA PARASHU RAM FENI', '01915483439', '', 1310051044),
(63, 'MD;EIBRAHIM', 'PARASHURAM FENI', '01818404051', '', 1310051048),
(64, 'MD;NURAMMED', 'PARASHURAM FENI', '01711711352', '', 1310051051),
(65, 'MD;ABUL BASAR', 'SALIA PARASHU RAM FENI', '01819608176', '', 1310051056),
(66, 'MD;ABDUL MANNAN', 'WEST ALOKA PARASHURAM', '01838111783', '', 1310051100),
(67, 'BISMILLA ELACTRONIC', 'CHHAGAL NIYA FENI', '01712788911', '', 1310051117),
(68, 'MASTER SHEK AHAMMED ELACTRONIC', 'AMJAD MAZUMDER  HAT', '01813934123 /01', '', 1310051205),
(69, 'BHUIYA    ELACTRONIC', 'CHHAGAL NIYA FENI', '01819061944/019', 'fixed', 0),
(70, 'BHUIYA    ELACTRONIC', 'CHHAGAL NIYA FENI', '01819061944/019', 'fixed', 0),
(71, 'MASTER SHEK AHAMMED ELACTRONIC', 'AMJAD MAZUMDER  HAT', '01813934123 /01', 'fixed', 0),
(72, 'MD;MANIK DRIVER', 'PARASHURAM FENI', '01818519500', '', 1310061032),
(73, 'MD;YUSUP', 'RAJUS PUR PARASHURAM', '01728513187', '', 1310061200),
(74, 'JSMIN AKTHER', 'WEST ALOKA PARASHURAM', '01829996896', '', 1310061204),
(75, 'ALI AKBAR', 'BAGMARA PARASHURAM', '01811517928', '', 1310070613),
(76, 'JAKIR HOSSAN(SUMI)', 'GUTOMA PARASHURAM', '01828071295', '', 1310070730),
(77, 'MD;DEDAR/DAUD', 'ANNOTUPUR', '01812753828', '', 1310070747),
(78, 'AUBDUL HAMID', 'CITAOLIA PARASHURAM FENI', '01554318127', '', 1310070927),
(79, 'MASTER AZIZUL HAQ', 'CATRANGA FENI', '01824894907', '', 1310071216),
(80, 'MD;HAFAJ SAYDUR RAMAN', 'ANNOTUPUR PARASHURAM', '01917595362', '', 1310071229),
(81, 'BHUIYA    ELACTRONIC', 'CHHAGAL NIYA FENI', '01819061944/019', 'fixed', 0),
(82, 'M,D;SHADAK S/OMD;HABIBULLAH', 'ANANTA PUR PARASHURAM FENI', '01819744174', '', 1310081159),
(83, 'NURUL HUDA', 'KOLAPARA PARASHURAM', '01198226626', '', 1310081207),
(84, 'NURUL HUDA', 'KOLAPARA PARASHURAM', '01198226626', '', 1310081232),
(85, 'BHUIYA    ELACTRONIC', 'CHHAGAL NIYA FENI', '01819061944/019', '', 1310080103),
(86, 'MD;SHAJAHAN', 'MONI PUR SUBAR BAZAR', '01819826248', '', 1310080107),
(87, 'MD;ABU SAYED', 'BAUR KOUMA PARASHURAM', '01824472996', '', 1310080120),
(88, 'MD;NAZRUL ISLAM', 'COMILLA ', '01824487290', '', 1310080125),
(89, 'BISMILLAHA  ELACTRONIC', 'CHHAGAL NIYA FENI', '01712788911', 'fixed', 0),
(90, 'BISMILLA ELACTRONIC', 'CHHAGAL NIYA FENI', '01712788911', 'fixed', 0),
(91, 'BISMILLAH ELACTRONIC', 'CHHAGAL NIYA FENI', '01712788911', 'fixed', 0),
(92, 'MD;EBIRAHIMN KHALIL', 'UTTRO GUTOMA', '01812980070', '', 1310090445),
(93, 'MDMONJUR KADER', 'UTTUR GUTOMA', '01823690320', '', 1310091019),
(94, 'MD ;SHUIFUL ISLAM', 'UTTUR GUTOMA', '', '', 1310091028),
(95, 'MD;HASEM', 'PURBA ALOKA', '01815583672', '', 1310091043),
(96, 'MD;SHIAN(MATAL)', 'MIRAZA NAGER', '01824564951', '', 1310091047),
(97, 'M/S;FATEMA  AKTHER', 'JANGUL GUNA', '01817508690', '', 1310091051),
(98, 'DR;SUMSUL HAQ', 'DUB LA   SAD PARASHURAM', '01817268935', '', 1310091055),
(99, 'MD ;SHUIFUL ISLAM', 'UTTUR GUTOMA', '01836205837', '', 1310091124),
(100, 'MD ;SHUIFUL ISLAM', 'UTTUR GUTOMA', '01836205837', '', 1310091127),
(101, 'SHIFUL ISLAM', 'UTTUR GUTOMA', '01836205837', '', 1310091135),
(102, 'MASTER SHEK AHAMMED ELACTRONICs', 'AMJAD MAZUMDER  HAT', '01813934123 /01', 'fixed', 0),
(103, 'alam', 'durGApur', '01712457545', '', 1310100546),
(104, 'MASTER SHEK AHAMMED ELACTRONIC', 'AMJAD MAZUMDER  HAT', '01813934123 /01', 'fixed', 0),
(105, 'MASTER SHEK AHAMMED ELACTRONIC', 'AMJAD MAZUMDER  HAT', '01813934123 /01', 'fixed', 0),
(106, 'MASTER SHEK AHAMMED ELACTRONIC', 'AMJAD MAZUMDER  HAT', '01813934123 /01', '', 1310100847),
(107, 'MD;EKRAM HOOSAN', 'PURBA ALOKA', '01834032595', '', 1310100853),
(108, 'Murad', 'feni', '012887879', '', 1310190928),
(109, 'hasan', 'feni', '98989', '', 1310190936),
(110, 'hasan', 'feni', '98989', '', 1310190938),
(111, '', '', '', '', 1310190942);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expend`
--

CREATE TABLE IF NOT EXISTS `tbl_expend` (
  `expend_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `amount` int(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`expend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_godown`
--

CREATE TABLE IF NOT EXISTS `tbl_godown` (
  `godown_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_sl` varchar(100) NOT NULL,
  `product_name` text NOT NULL,
  `description` text NOT NULL,
  `buy_price` double NOT NULL,
  `cover_price` double NOT NULL,
  `warrenty` varchar(50) NOT NULL,
  `entry_by` varchar(50) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `sub_id` int(12) NOT NULL COMMENT 'sub_id means sub cateogory id',
  `shop_id` int(5) NOT NULL,
  PRIMARY KEY (`godown_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=368 ;

--
-- Dumping data for table `tbl_godown`
--

INSERT INTO `tbl_godown` (`godown_id`, `product_sl`, `product_name`, `description`, `buy_price`, `cover_price`, `warrenty`, `entry_by`, `entry_date`, `sub_id`, `shop_id`) VALUES
(9, '1090', '            Frigee   ', '    0', 21335, 25100, '5 years', 'mahabub', '18/09/2013', 15, 1),
(10, '3003830', 'Frigee', '0', 25925, 30500, '5 years', 'mahabub', '18/09/2013', 16, 1),
(11, '3004181', 'Frigee', '0', 25925, 30500, '5 years', 'mahabub', '18/09/2013', 16, 1),
(364, '306', 'ANNOROKOM-600VA', '0', 2250, 3000, '3YEARS', 'mahabub', '08/10/2013', 85, 1),
(14, '16089478', 'Frigee', '0', 19040, 22400, '5 years', 'mahabub', '18/09/2013', 17, 1),
(15, '1605131251', 'Frigee', '0', 19040, 22400, '5 years', 'mahabub', '18/09/2013', 17, 1),
(16, '2505131217', 'Frigee', '0', 19040, 22400, '5 years', 'mahabub', '18/09/2013', 17, 1),
(19, '63363', 'Frigee', '0', 19040, 22400, '5 years', 'mahabub', '18/09/2013', 17, 1),
(20, '63505', 'Frigee', '0', 19040, 22400, '5 years', 'mahabub', '18/09/2013', 17, 1),
(21, '62789', 'Frigee', '0', 19040, 22400, '5 years', 'mahabub', '18/09/2013', 17, 1),
(24, '1405131448', 'Frigee', '0', 19040, 22400, '5 years', 'mahabub', '18/09/2013', 17, 1),
(26, '85475', 'Frigee', '0', 19040, 22400, '5 years', 'mahabub', '18/09/2013', 17, 1),
(354, 'EN#152FMH11FU16631# FREAM#WBFU11011F16631#', 'FFUSIN-EX-110(DIGTAL)', '0', 89496, 101000, '2YEARS', 'mahabub', '08/10/2013', 6, 1),
(28, '63751', 'Frigee', '0', 19040, 22400, '5 years', 'mahabub', '18/09/2013', 17, 1),
(29, '63426', 'Frigee', '0', 19040, 22400, '5 years', 'mahabub', '18/09/2013', 17, 1),
(30, '109576', 'Frigee', '0', 18445, 21700, '5 years', 'mahabub', '18/09/2013', 18, 1),
(31, '109570', 'Frigee', '0', 18445, 21700, '5 years', 'mahabub', '18/09/2013', 18, 1),
(32, '109577', 'Frigee', '0', 18445, 21700, '5 years', 'mahabub', '18/09/2013', 18, 1),
(33, '105922', 'Frigee', '0', 18445, 21700, '5 years', 'mahabub', '18/09/2013', 18, 1),
(35, '109582', 'Frigee', '0', 18445, 21700, '5 years', 'mahabub', '18/09/2013', 18, 1),
(37, '109623', 'Frigee', '0', 18445, 21700, '5 years', 'mahabub', '18/09/2013', 18, 1),
(41, '75054', 'Frigee', '0', 18445, 21700, '5 years', 'mahabub', '18/09/2013', 18, 1),
(42, '105926', 'Frigee', '0', 18445, 21700, '5 years', 'mahabub', '18/09/2013', 18, 1),
(358, 'EN#150FMG13STO9185# FREAMWBST10013FO9185#', 'STYLEX(-SPOKE)', '0', 67584, 76000, '2YEARS', 'mahabub', '08/10/2013', 10, 1),
(45, '59961', 'Frigee', '0', 18445, 21700, '5 years', 'mahabub', '18/09/2013', 18, 1),
(349, '179386', 'W2D-2B0', '0', 24140, 28400, '5years', 'mahabub', '07/10/2013', 23, 1),
(268, '7489', 'FC-2T9(5DEEP)', '0', 21335, 25100, '5 years', 'mahabub', '04/10/2013', 15, 1),
(261, '516', 'SQUAR-1000VA', 'STABILIZER', 2100, 2600, '3YEARS', 'mahabub', '02/10/2013', 84, 1),
(249, '504', 'SQUAR-1000VA', 'STABILIZER', 2100, 2600, '3YEARS', 'mahabub', '02/10/2013', 84, 1),
(250, '505', 'SQUAR-1000VA', 'STABILIZER', 2100, 2600, '3YEARS', 'mahabub', '02/10/2013', 84, 1),
(251, '506', 'SQUAR-1000VA', 'STABILIZER', 2100, 2600, '3YEARS', 'mahabub', '02/10/2013', 84, 1),
(107, '92794', 'WPF 21T1', '0', 10965, 12900, '4 YEARS', 'mahabub', '19/09/2013', 139, 1),
(355, 'EN#152FMH11FU19275# FREAM#WBFU11010F19275#', 'FFUSIN-EX-110(DIGTAL)', '0', 89496, 101000, '2YEARS', 'mahabub', '08/10/2013', 6, 1),
(255, '510', 'SQUAR-1000VA', 'STABILIZER', 2100, 2600, '3YEARS', 'mahabub', '02/10/2013', 84, 1),
(246, '501', 'SQUAR-1000VA', 'STABILIZER', 2100, 2600, '3YEARS', 'mahabub', '02/10/2013', 84, 1),
(247, '502', 'SQUAR-1000VA', 'STABILIZER', 2100, 2600, '3YEARS', 'mahabub', '02/10/2013', 84, 1),
(248, '503', 'SQUAR-1000VA', 'STABILIZER', 2100, 2600, '3YEARS', 'mahabub', '02/10/2013', 84, 1),
(363, '305', 'ANNOROKOM-600VA', '0', 2250, 3000, '3YEARS', 'mahabub', '08/10/2013', 85, 1),
(365, '307', 'ANNOROKOM-600VA', '0', 2250, 3000, '3YEARS', 'mahabub', '08/10/2013', 85, 1),
(360, '302', 'ANNOROKOM-600VA', '0', 2250, 3000, '3YEARS', 'mahabub', '08/10/2013', 85, 1),
(82, '99302', 'Frigee', '0', 23970, 28200, '5 years', 'mahabub', '18/09/2013', 21, 1),
(83, '99273', 'Frigee', '0', 23970, 28200, '5 years', 'mahabub', '18/09/2013', 21, 1),
(85, '18550162', 'Frigee', '0', 24820, 29200, '5 years', 'mahabub', '18/09/2013', 22, 1),
(86, '220134244', 'Frigee', '0', 24140, 28400, '5 years', 'mahabub', '18/09/2013', 23, 1),
(87, '124533', 'Frigee', '0', 24140, 28400, '5 years', 'mahabub', '18/09/2013', 23, 1),
(351, 'EN#156FMI13FUO7713# FREAM#WBFU12513FO7713#', 'FUSION-125EX', '0', 95216, 0, '2YEARS', 'mahabub', '08/10/2013', 4, 1),
(90, '124543', 'Frigee', '0', 24140, 28400, '5 years', 'mahabub', '18/09/2013', 23, 1),
(253, '508', 'SQUAR-1000VA', 'STABILIZER', 2100, 2600, '3YEARS', 'mahabub', '02/10/2013', 84, 1),
(215, '01TRI', 'TRICON-1000 VA', '0', 2300, 2700, '2 YEARS', 'mahabub', '23/09/2013', 82, 1),
(252, '507', 'SQUAR-1000VA', 'STABILIZER', 2100, 2600, '3YEARS', 'mahabub', '02/10/2013', 84, 1),
(96, '22644553', 'Frigee', '0', 28050, 33000, '5 years', 'mahabub', '18/09/2013', 28, 1),
(103, 'WE95B0789', 'LED-32"', '0', 36125, 42500, '2 YEARS', 'mahabub', '18/09/2013', 118, 1),
(104, 'W24E66BM0886', 'LED-24"', '0', 21760, 25600, '2 YEARS', 'mahabub', '18/09/2013', 122, 1),
(216, '06TRI', 'TRICON-1000 VA', '0', 2300, 2700, '2 YEARS', 'mahabub', '23/09/2013', 82, 1),
(106, 'W022L4-40696', 'LCD 22"', '0', 19720, 23200, '2YEARS', 'mahabub', '18/09/2013', 128, 1),
(108, '92475', 'WPF 21T1', '0', 10965, 12900, '4 YEARS', 'mahabub', '19/09/2013', 139, 1),
(366, '308', 'ANNOROKOM-600VA', '0', 2250, 3000, '3YEARS', 'mahabub', '08/10/2013', 85, 1),
(357, 'EN#150FMG13STO9139# FREAM#WBST10013FO9139#', 'STYLEX(-SPOKE)', '0', 67584, 76000, '2YEARS', 'mahabub', '08/10/2013', 10, 1),
(346, '179393', 'W2D-2BO(CD)', '0', 24140, 28400, '5 years', 'mahabub', '07/10/2013', 23, 1),
(347, '179334', 'W2D-2BO(CD)', '0', 24140, 28400, '5 years', 'mahabub', '07/10/2013', 23, 1),
(112, 'PF26012', 'WPF 21T2', '0', 10965, 12900, '4 YEARS', 'mahabub', '19/09/2013', 139, 1),
(173, 'WB-1382', 'WB-M-35', '0', 2125, 2500, '1 YEARS', 'mahabub', '21/09/2013', 72, 1),
(115, 'T111499', 'WF 21T11', '0', 12070, 14200, '4 YEARS', 'mahabub', '19/09/2013', 134, 1),
(116, 'T111579', 'WF 21T11', '0', 12070, 14200, '4 YEARS', 'mahabub', '19/09/2013', 134, 1),
(117, 'T112558', 'WF 21T11', '0', 12070, 14200, '4 YEARS', 'mahabub', '19/09/2013', 134, 1),
(118, 'T 10A0244', 'WF 21T10A', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(119, 'T10A0279', 'WF 21T10A', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(120, 'T 10A0772', 'WF 21T10A', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(121, 'T10B1042', 'WF 21T10B', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(122, 'T10B1030', 'WF 21T10B', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(123, 'T10B1037', 'WF 21T10B', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(124, 'T10B1017', 'WF 21T10B', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(125, 'T10B1546', 'WF 21T10B', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(126, 'T10B1032', 'WF 21T10B', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(127, 'T10B1035', 'WF 21T10B', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(128, 'T10B1039', 'WF 21T10B', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(129, 'PU1 5489', 'WPF 21U1', '0', 12070, 14200, '4 YEARS', 'mahabub', '19/09/2013', 135, 1),
(131, 'PU1 5492', 'WPF 21U1', '0', 12070, 14200, '4 YEARS', 'mahabub', '19/09/2013', 135, 1),
(132, '    PU 26581', 'WPF 21U2', '0', 12070, 14200, '4YEARS', 'mahabub', '19/09/2013', 135, 1),
(133, '    PU 75428', 'WPF 21U2', '0', 12070, 14200, '4YEARS', 'mahabub', '19/09/2013', 135, 1),
(134, '    PU  26577', 'WPF 21U2', '0', 12070, 14200, '4YEARS', 'mahabub', '19/09/2013', 135, 1),
(136, 'U11 0624', 'WF21U11', '0', 12325, 0, '4 YEARS', 'mahabub', '19/09/2013', 131, 1),
(137, 'U11 0640', 'WF21U11', '0', 12325, 0, '4 YEARS', 'mahabub', '19/09/2013', 131, 1),
(138, 'M1009', 'WF21T10A', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(139, 'M2407', 'WF21T10A', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(140, '1021', 'WF21T10A', '0', 12325, 14500, '4 YEARS', 'mahabub', '19/09/2013', 132, 1),
(273, '170844', 'W2D-A90', '0', 21760, 25600, '5 years', 'mahabub', '04/10/2013', 19, 1),
(144, 'ENG#156FM11FUO3842# FRAME#WBFU 12511FO3842#', 'FUSION -125(Digital)', '0', 90, 1, '2 YEARS', 'mahabub', '19/09/2013', 5, 1),
(145, 'ENG#156FM11FUO5702# FRAME#WBFU12511FO5702#', 'FUSION -125(Digital)', '0', 90, 1, '2 YEARS', 'mahabub', '19/09/2013', 5, 1),
(146, 'ENG#152FMH12FU21538# FRAME#WBFU11012F21538#', 'FUSION-EX-110', '0', 89, 1, '2 YEARS', 'mahabub', '19/09/2013', 6, 1),
(147, 'ENG#152FMH12FU21529# FRAME#WBFU11012F21529#', 'FUSION-EX-110', '0', 89, 1, '2 YEARS', 'mahabub', '19/09/2013', 6, 1),
(148, 'ENG#152FMH12FU21589# FRAME#WBFU11012F21589#', 'FUSION-EX-110', '0', 89, 1, '2 YEARS', 'mahabub', '19/09/2013', 6, 1),
(149, 'ENG#152FMH12FU21626#  FRAME#WBFU11012F21626#', 'FUSION-EX-110', '0', 89, 1, '2 YEARS', 'mahabub', '19/09/2013', 6, 1),
(150, 'ENG#152FMH11FU20310# FRAME#WBFU11011F20310#', 'FUSION-110(Digital)', '0', 85, 96, '2YEARS', 'mahabub', '19/09/2013', 7, 1),
(151, 'ENG#152FMH11PRO3331# FRAME#WBPR11011FO3331#', 'PRIZM-110', '0', 89, 1, '2YEARS', 'mahabub', '19/09/2013', 8, 1),
(152, 'ENG#152FMH12PRO5929# FRAME#WBHPRO11012FO5929#', 'PRIZM-110', '0', 89, 1, '2YEARS', 'mahabub', '19/09/2013', 8, 1),
(153, 'ENG#152FMH11PRO1011# FRAME#WBPR11011FO1011#', 'PRIZM-110', '0', 89, 1, '2YEARS', 'mahabub', '19/09/2013', 8, 1),
(154, 'ENG#150FMG12CR17414# FRAME#WBCR10012F17414#', 'CRUIZE-100(Digital)', '0', 82, 93, '2 YEARS', 'mahabub', '19/09/2013', 9, 1),
(155, 'ENG#150FMG12CR17435# FRAME#WBCR10012F17435#', 'CRUIZE-100(Digital', '0', 82, 93, '2 YEARS', 'mahabub', '19/09/2013', 9, 1),
(156, 'ENG#150FMG12CR17431# FRAME#WBCR10012F17431#', 'CRUIZE-100(Digital', '0', 82, 93, '2 YEARS', 'mahabub', '19/09/2013', 9, 1),
(161, 'S.L.2895', 'WM-5LP', '0', 1870, 2200, '1 YEARS', 'mahabub', '20/09/2013', 87, 1),
(158, 'ENG#147FMG12LEO9632# FRAME#WBLEO8012FO9632#', 'LEO-Fixed(Spoke)80', '0', 65, 73, '2YEARS', 'mahabub', '19/09/2013', 11, 1),
(362, '304', 'ANNOROKOM-600VA', '0', 2250, 3000, '3YEARS', 'mahabub', '08/10/2013', 85, 1),
(160, 'ENG#150FMG11STO9035# FRAME#WBST10011FO9035#', 'STYLEX-(Spoke)100', '0', 69, 76, '2YEAR', 'mahabub', '19/09/2013', 10, 1),
(162, 'S,L.3989', 'WM-5LP', '0', 1870, 2200, '1 YEARS', 'mahabub', '20/09/2013', 87, 1),
(163, 'S.L3987 ', 'WM-5LP', '0', 1870, 2200, '1 YEARS', 'mahabub', '20/09/2013', 87, 1),
(164, 'S.L2983', 'WM-5LP', '0', 1870, 2200, '1 YEARS', 'mahabub', '20/09/2013', 87, 1),
(165, 'S.L3986', 'WM-5LP', '0', 1870, 2200, '1 YEARS', 'mahabub', '20/09/2013', 87, 1),
(166, 'S,L,3984', 'WM-5LP', '0', 1870, 2200, '1 YEARS', 'mahabub', '20/09/2013', 87, 1),
(167, 'S,L3983', 'WM-5LP', '0', 1870, 2200, '1 YEARS', 'mahabub', '20/09/2013', 87, 1),
(168, 'S,L,3982', 'WM-5LP', '0', 1870, 2200, '1 YEARS', 'mahabub', '20/09/2013', 87, 1),
(169, 'S,L,9671', 'WM-5LP', '0', 1870, 2200, '1 YEARS', 'mahabub', '20/09/2013', 87, 1),
(170, 'S,L9813', 'WM-5LP', '0', 1870, 2200, '1 YEARS', 'mahabub', '20/09/2013', 87, 1),
(171, 'S,L9814', 'WM-5LP', '0', 1870, 2200, '1 YEARS', 'mahabub', '20/09/2013', 87, 1),
(172, 'S,L9816', 'WM-5LP', '0', 1870, 2200, '1 YEARS', 'mahabub', '20/09/2013', 87, 1),
(174, 'WB-1380', 'WB-M-35', '0', 2125, 2500, '1 YEARS', 'mahabub', '21/09/2013', 72, 1),
(175, 'WB-958', 'WB-M-35', '0', 2125, 2500, '1 YEARS', 'mahabub', '21/09/2013', 72, 1),
(176, 'WB-0313000719', 'WB-M-35', '0', 2125, 2500, '1 YEARS', 'mahabub', '21/09/2013', 72, 1),
(177, 'WB-03133000959', 'WB-M-35', '0', 2125, 2500, '1 YEARS', 'mahabub', '21/09/2013', 72, 1),
(178, 'WB-0313000912', 'WB-M-35', '0', 2125, 2500, '1 YEARS', 'mahabub', '21/09/2013', 72, 1),
(179, 'WB-1511', 'WB-M-20', '0', 1785, 2100, '1 YEARS', 'mahabub', '21/09/2013', 73, 1),
(181, 'WJ-0440', 'WJ-BH33', '0', 2720, 3200, '1 YEARS', 'mahabub', '21/09/2013', 77, 1),
(182, 'WJ-0441', 'WJ-BH33', '0', 2720, 3200, '1 YEARS', 'mahabub', '21/09/2013', 77, 1),
(183, 'WJ-0443', 'WJ-BH33', '0', 2720, 3200, '1 YEARS', 'mahabub', '21/09/2013', 77, 1),
(184, 'WJ-BH-0470', 'WJ-BH391A', '0', 2500, 2950, '1 YEARS', 'mahabub', '21/09/2013', 78, 1),
(185, 'WJ-BH-0471', 'WJ-BH391A', '0', 2500, 2950, '1 YEARS', 'mahabub', '21/09/2013', 78, 1),
(186, 'ULTIMA-5403', 'IRON-ULTIMA', '0', 1200, 1500, '1YEARS', 'mahabub', '21/09/2013', 79, 1),
(187, 'ULTIMA-5444', 'IRON-ULTIMA', '0', 1200, 1500, '1YEARS', 'mahabub', '21/09/2013', 79, 1),
(188, 'ULTIMA-5387', 'IRON-ULTIMA', '0', 1200, 1500, '1YEARS', 'mahabub', '21/09/2013', 79, 1),
(189, 'ULTIMA-5369', 'IRON-ULTIMA', '0', 1200, 1500, '1YEARS', 'mahabub', '21/09/2013', 79, 1),
(190, 'Oasis-28915', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(191, 'Oasis-28916', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(192, 'Oasis-28917', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(193, 'Oasis-28919', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(194, 'Oasis-28864', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(195, 'Oasis-28849', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(196, 'Oasis-28860', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(197, 'Oasis-28862', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(198, 'Oasis-21984', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(199, 'Oasis-21986', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(200, 'Oasis-21991', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(201, 'Oasis-28859', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(202, 'Oasis-22045', 'IRON-Oasis', '0', 700, 850, '1 YEARS', 'mahabub', '21/09/2013', 80, 1),
(203, 'WEK-2189', 'WK-CR1193(107.L)', '0', 1100, 1300, '1 YEARS', 'mahabub', '21/09/2013', 98, 1),
(205, 'WEK-2191', 'WK-CR1193(107.L)', '0', 1100, 1300, '1 YEARS', 'mahabub', '21/09/2013', 98, 1),
(208, 'WEK-2195', 'WK-CR1193(107.L)', '0', 1100, 1300, '1 YEARS', 'mahabub', '21/09/2013', 98, 1),
(209, 'WEK-2196', 'WK-CR1193(107.L)', '0', 1100, 1300, '1 YEARS', 'mahabub', '21/09/2013', 98, 1),
(210, 'WC-0206', 'WC30ASPR', '0', 11.73, 13, '1YEARS', 'mahabub', '21/09/2013', 94, 1),
(211, 'W-368', 'W23AP', '0', 9265, 10900, '1 YEARS', 'mahabub', '21/09/2013', 95, 1),
(212, 'W-370', 'W23AP', '0', 9265, 10900, '1 YEARS', 'mahabub', '21/09/2013', 95, 1),
(213, 'W-0323', 'WG-17AL', '0', 7300, 8600, '1 YEARS', 'mahabub', '21/09/2013', 97, 1),
(214, 'W-0327', 'WG-17AL', '0', 7300, 8600, '1 YEARS', 'mahabub', '21/09/2013', 97, 1),
(219, '22TRI', 'TRICON-1000 VA', '0', 2300, 2700, '2 YEARS', 'mahabub', '23/09/2013', 82, 1),
(220, '022TRI', 'TRICON-1000 VA', '0', 2300, 2700, '2 YEARS', 'mahabub', '23/09/2013', 82, 1),
(221, '28TRI', 'TRICON-1000 VA', '0', 2300, 2700, '2 YEARS', 'mahabub', '23/09/2013', 82, 1),
(222, '29TRI', 'TRICON-1000 VA', '0', 2300, 2700, '2 YEARS', 'mahabub', '23/09/2013', 82, 1),
(223, '30TRI', 'TRICON-1000 VA', '0', 2300, 2700, '2 YEARS', 'mahabub', '23/09/2013', 82, 1),
(224, '35TRI', 'TRICON-1000 VA', '0', 2300, 2700, '2 YEARS', 'mahabub', '23/09/2013', 82, 1),
(225, '39TRI', 'TRICON-1000 VA', '0', 2300, 2700, '2 YEARS', 'mahabub', '23/09/2013', 82, 1),
(274, '178845', 'W2D-A90', '0', 21760, 25600, '5 years', 'mahabub', '04/10/2013', 19, 1),
(276, '179276', 'W2D-A90', '0', 21760, 25600, '5 years', 'mahabub', '04/10/2013', 19, 1),
(278, '178841', 'W2D-A90', '0', 21760, 25600, '5 years', 'mahabub', '04/10/2013', 19, 1),
(279, '179274', 'W2D-A90', '0', 21760, 25600, '5 years', 'mahabub', '04/10/2013', 19, 1),
(290, '170816', 'WFF-2A3CD', '0', 23970, 28200, '5 years', 'mahabub', '04/10/2013', 21, 1),
(291, '168765', 'WFF-2A3CD', '0', 23970, 28200, '5 years', 'mahabub', '04/10/2013', 21, 1),
(292, '179238', 'WFF-2A3CD', '0', 23970, 28200, '5 years', 'mahabub', '04/10/2013', 21, 1),
(294, '170811', 'WFF-2A3CD', '0', 23970, 28200, '5 years', 'mahabub', '04/10/2013', 21, 1),
(298, '161784', 'WFF-2A3CD', '0', 23970, 28200, '5 years', 'mahabub', '04/10/2013', 21, 1),
(301, '168682', 'WFF-2A3CD', '0', 23970, 28200, '5 years', 'mahabub', '04/10/2013', 21, 1),
(303, '159293', 'WFF-2A3CD', '0', 23970, 28200, '5 years', 'mahabub', '04/10/2013', 21, 1),
(304, '160451', 'WFF-2A3CD', '0', 23970, 28200, '5 years', 'mahabub', '04/10/2013', 21, 1),
(350, '    EN#156FMI 13FUO7716#  FRAME#WBFU12513FO7716#', 'FUSION-125EX', '0', 95216, 0, '2YEARS', 'mahabub', '08/10/2013', 4, 1),
(309, '116934', 'WFF-2A3CD', '0', 23970, 28200, '5 years', 'mahabub', '04/10/2013', 21, 1),
(311, '161428', 'W2D-2B6(PN)', '0', 29495, 34700, '5 years', 'mahabub', '04/10/2013', 29, 1),
(313, '161762', 'W2D-2B6(PN)', '0', 29495, 34700, '5 years', 'mahabub', '04/10/2013', 29, 1),
(314, '161715', 'W2D-2B6(PN)', '0', 29495, 34700, '5 years', 'mahabub', '04/10/2013', 29, 1),
(352, 'EN#156FMI13FUO7707# FREAM#WBF12513FO7707#', 'FUSION-125EX', '0', 95216, 0, '2YEARS', 'mahabub', '08/10/2013', 4, 1),
(318, '179393', 'W2D-2B0(CD)', '0', 24140, 28400, '5 years', 'mahabub', '04/10/2013', 25, 1),
(353, 'EN#152FMH11FU19254# FREAM#WBFU11011F19254#', 'FUSIN-EX-110(DIGTAL)', '0', 89496, 101000, '2YEARS', 'mahabub', '08/10/2013', 6, 1),
(361, '303', 'ANNOROKOM-600VA', '0', 2250, 3000, '3YEARS', 'mahabub', '08/10/2013', 85, 1),
(323, '3003130220', 'W2D-1H5(CD)', '0', 24820, 29200, '5 years', 'mahabub', '04/10/2013', 22, 1),
(324, 'WE95B06940', 'WA32E95B', '0', 36152, 42500, '2YEARS', 'mahabub', '05/10/2013', 118, 1),
(325, 'W24E61450', 'W24E66B LED', '0', 21760, 25600, '2YEARA', 'mahabub', '05/10/2013', 122, 1),
(326, '0742', 'WT1999D60', '0', 13600, 16000, '2YEARS', 'mahabub', '05/10/2013', 144, 1),
(327, '08598', 'WT1999D6', '0', 13600, 16000, '2YEARS', 'mahabub', '05/10/2013', 144, 1),
(328, '0260', 'W42T3500', '0', 61115, 71900, '2YEARS', 'mahabub', '05/10/2013', 110, 1),
(329, '19D60/0742', 'TUNER', '0', 1190, 1400, '1YEARS', 'mahabub', '05/10/2013', 145, 1),
(330, '19D60/0598', 'TUNER', '0', 1190, 1400, '1YEARS', 'mahabub', '05/10/2013', 145, 1),
(331, '00598', 'REMOTE', '0', 425, 500, '0', 'mahabub', '05/10/2013', 146, 1),
(332, '00742', 'REMOTE', '0', 425, 500, '0', 'mahabub', '05/10/2013', 146, 1),
(333, '3410', 'W1408', '0', 7565, 8900, '4YEARS', 'mahabub', '05/10/2013', 143, 1),
(334, '3484', 'W1408', '0', 7565, 8900, '4YEARS', 'mahabub', '05/10/2013', 143, 1),
(335, '3423', 'W1408', '0', 7565, 8900, '4YEARS', 'mahabub', '05/10/2013', 143, 1),
(336, '3137', 'W1406', '0', 7565, 8900, '4YEARS', 'mahabub', '05/10/2013', 143, 1),
(337, '3057', 'W1406', '0', 7565, 8900, '4YEARS', 'mahabub', '05/10/2013', 143, 1),
(338, '2954', 'W1406', '0', 7565, 8900, '4YEARS', 'mahabub', '05/10/2013', 143, 1),
(339, '0806', 'W-1403F', '0', 7905, 9300, '4YEARS', 'mahabub', '05/10/2013', 148, 1),
(341, '0797', 'W-1403F', '0', 7905, 9300, '4YEARS', 'mahabub', '05/10/2013', 148, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_income`
--

CREATE TABLE IF NOT EXISTS `tbl_income` (
  `income_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `amount` int(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`income_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_memo`
--

CREATE TABLE IF NOT EXISTS `tbl_memo` (
  `memo_id` int(10) NOT NULL AUTO_INCREMENT,
  `cust_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `memo_date` varchar(20) NOT NULL,
  PRIMARY KEY (`memo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_account`
--

CREATE TABLE IF NOT EXISTS `tbl_personal_account` (
  `account_id` int(8) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `amount` varchar(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `month` varchar(10) NOT NULL COMMENT 'this means entry''s month',
  `year` int(4) NOT NULL COMMENT 'this means entry''s year',
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_buying`
--

CREATE TABLE IF NOT EXISTS `tbl_product_buying` (
  `buying_id` int(10) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(5) NOT NULL,
  `total_amount` varchar(10) NOT NULL,
  `note` varchar(10) NOT NULL,
  `paid` varchar(10) NOT NULL,
  `due` varchar(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `month` varchar(10) NOT NULL COMMENT 'month means entry month',
  `year` int(4) NOT NULL,
  PRIMARY KEY (`buying_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_product_buying`
--

INSERT INTO `tbl_product_buying` (`buying_id`, `vendor_id`, `total_amount`, `note`, `paid`, `due`, `date`, `entry_date`, `month`, `year`) VALUES
(1, 2, '33.56,993', 'FRIGEE=296', '25,00000', '856993', '04.09.2013/25.09.2013', '05/10/2013', 'October', 2013),
(2, 2, '1682235', 'FRIGEE=140', '0', '856993+168', '02-10-2013', '05/10/2013', 'October', 2013);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE IF NOT EXISTS `tbl_product_category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(40) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`category_id`, `category_name`) VALUES
(1, 'Motor Cycle'),
(2, 'Refrigerator'),
(3, 'Walton Motorcycle'),
(4, 'Generator'),
(5, 'DVD Palyer'),
(6, 'Blender'),
(7, 'Iron'),
(8, 'Stabiliger'),
(9, 'Rice Cooker'),
(10, 'Wasiimg Machin'),
(11, 'Oven'),
(12, 'Electric Kettle'),
(13, 'Air Conditioner'),
(14, 'TV/LCD/LED/3D'),
(15, 'W1403F'),
(16, 'W1403F');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_sub_category`
--

CREATE TABLE IF NOT EXISTS `tbl_product_sub_category` (
  `sub_id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_category_name` varchar(50) NOT NULL,
  `category_id` int(10) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=150 ;

--
-- Dumping data for table `tbl_product_sub_category`
--

INSERT INTO `tbl_product_sub_category` (`sub_id`, `sub_category_name`, `category_id`) VALUES
(61, 'Sparks-4500E', 4),
(2, 'Xplore-140', 1),
(3, 'Xplore-125', 1),
(4, 'Fusion-Ex-125(Digital)', 1),
(5, 'Fusion-125(Digital)', 1),
(6, 'Fusion-Ex-110(Digital)', 1),
(7, 'Fusion-110(Digital)', 1),
(8, 'Priszm110', 1),
(9, 'Cruize(Digital)100', 1),
(10, 'Stylex(Spoke)100', 1),
(11, 'Leo-Fixed-(Spoke)80', 1),
(12, 'Voice Alarm', 1),
(13, 'Aloy', 1),
(14, 'FC-1D5', 2),
(15, 'FC-2T5', 2),
(16, 'FC-3JODEEP', 2),
(17, 'D-1F0', 2),
(18, 'W500-1D0', 2),
(19, 'W2D-A90', 2),
(20, 'WFF-2A3PN', 2),
(21, 'WEF-2A3/CD', 2),
(22, 'W2D-1H5', 2),
(23, 'W2D-2B0', 2),
(24, 'W2D-2B0-PN', 2),
(25, 'W2D-2B0-CD', 2),
(26, 'W2D-2D4', 2),
(27, 'W2D-2D4/PN', 2),
(28, 'W2D-2B6', 2),
(29, 'W2D-2B6-PN', 2),
(30, 'W2D-2GC', 2),
(31, 'NW2A0', 2),
(32, 'NW-2G6', 2),
(33, 'W2D-3F5', 2),
(34, 'WCO-M12(Glass Door)', 2),
(60, 'Sparks-4500', 4),
(59, 'Power Max-3100E', 4),
(58, 'Power Max-3100', 4),
(57, 'Excel-2200E-DM', 4),
(56, 'Excel-2200-DM', 4),
(55, 'Power Plus-1500E-DM', 4),
(54, 'Power Plus-1500-DM', 4),
(53, 'Sprit-1350', 4),
(52, 'Zoom-1200', 4),
(51, 'Zet-1000', 4),
(62, 'Silent Katrina-5000E-Diesel', 4),
(63, 'Superia-6000', 4),
(64, 'Superia-6000E', 4),
(65, 'Power Carft-7000E', 4),
(66, 'DVD-601', 5),
(67, 'DVD-602', 5),
(68, 'WT-363', 5),
(69, 'WD-835', 5),
(70, 'WT-308', 5),
(71, 'WT-365', 5),
(72, 'WB-M35', 6),
(73, 'WB-20', 6),
(74, 'WB-C101+', 6),
(75, 'WB-C102+', 6),
(76, 'WB-AM611', 6),
(77, 'WJ-BH33', 6),
(78, 'WJ-BH391A', 6),
(79, 'Ultoma ', 7),
(80, 'Oasis', 7),
(81, 'Tricon- 600Va', 8),
(82, 'Tricon- 1000Va', 8),
(83, 'Squer-600VA+700VA', 8),
(84, 'Squer-1000VA', 8),
(85, 'Annorokom-600VA', 8),
(86, 'Annorokom-1000VA', 8),
(87, 'WM-5lP', 9),
(88, 'WRM-s18', 9),
(89, 'WRM-S18', 9),
(90, 'WHM-B40', 9),
(91, 'WHM-A30', 9),
(92, 'WMG60_S302G', 10),
(93, 'WGWM-A510PE', 10),
(94, 'WC30ASPR/WG30ESLR', 11),
(95, 'WG23-CGD/W23AP', 11),
(96, 'WG20-GL', 11),
(97, 'WG17AL', 11),
(98, 'WK-CR1193', 12),
(99, 'WK-JS22W', 12),
(100, 'WK-HB1519', 12),
(101, 'W-25GW (.75-Ton )', 13),
(102, 'W-35GW (1Ton  )', 13),
(103, 'W-50GW( 1.5Ton )', 13),
(104, 'W-70GW ( 2.Ton )', 13),
(105, 'W55E72-LED-3D', 14),
(106, 'W47E72-LED-3D', 14),
(107, 'WR55LED', 14),
(108, 'W46T3500(46''''LED)', 14),
(109, 'W42E689(42''''LED)', 14),
(110, 'W42T3500(42''''LED)', 14),
(111, 'W39T3500(39''''LED)', 14),
(112, 'W39T35-(39''''LED)', 14),
(113, 'W32E61/W32E20(32''''LED)', 14),
(114, 'W32E80D(32''''LED)', 14),
(115, 'W32E68(32''''LED)', 14),
(116, 'W32T3500(32''''LED)', 14),
(117, 'W32T35(32''''LED)', 14),
(118, 'WA32E95B(32''''LED)', 14),
(119, 'W29E50(29''''LED)', 14),
(120, 'W28T3540(28''''LED)', 14),
(121, 'W24T3540(24''''LED)', 14),
(122, 'W24E66B(24''''LED)', 14),
(123, 'WK19LED1(19''''LED)', 14),
(124, 'WS19LED2(19''''LED)', 14),
(125, 'W42K05/W42L05LED', 14),
(126, 'WA32L4(LCD)', 14),
(127, 'W32L8E(LCD)', 14),
(128, 'W022L4(LCD)', 14),
(129, 'WJ22L3(LCD)', 14),
(130, 'WF21U10A', 14),
(131, 'WF21U11/WF21D', 14),
(132, 'WF21T10A/WF21T10B', 14),
(133, 'WT21F2PF/4PF', 14),
(134, 'WF21T11', 14),
(135, 'WPF21U1/U2', 14),
(136, 'WA2136US/WA2136USA', 14),
(137, 'WF2106A', 14),
(138, 'WF2103(WA2134PF/35PF)A', 14),
(139, 'WPF21T1/T2', 14),
(140, 'WDF21R/21S', 14),
(141, 'WSF2103A', 14),
(142, 'W/S14N01/W1403US', 14),
(143, 'W1408A/6A/1408/1406', 14),
(144, 'WT19D60(M.M.C MONITORA)', 14),
(145, 'TUNER', 14),
(146, 'REMOTE CONTROLLER', 14),
(147, '05', 1),
(148, '1', 15),
(149, 'W1403F', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sallery`
--

CREATE TABLE IF NOT EXISTS `tbl_sallery` (
  `sallery_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) NOT NULL,
  `total_sallery` varchar(10) NOT NULL,
  `paid_sallery` varchar(10) NOT NULL,
  `pay_month` varchar(10) NOT NULL,
  `pay_year` int(4) NOT NULL,
  `month` varchar(50) NOT NULL COMMENT 'this means entry''s month',
  `year` int(4) NOT NULL COMMENT 'this means entry''s year',
  `paid_date` varchar(30) NOT NULL,
  `status` varchar(2) NOT NULL,
  PRIMARY KEY (`sallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_sallery`
--

INSERT INTO `tbl_sallery` (`sallery_id`, `user_id`, `total_sallery`, `paid_sallery`, `pay_month`, `pay_year`, `month`, `year`, `paid_date`, `status`) VALUES
(1, '1', '5500', '4000', 'January', 2013, 'March', 2014, '06-03-2014', ''),
(2, '1', '5500', '1500', 'January', 2013, 'March', 2014, '06-03-2014', ''),
(3, '7', '200000', '2000', 'January', 2014, 'October', 2014, '13-10-2014', ''),
(4, '7', '200000', '180000', 'January', 2014, 'October', 2014, '13-10-2014', ''),
(5, '7', '200000', '18000', 'January', 2014, 'October', 2014, '13-10-2014', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sell`
--

CREATE TABLE IF NOT EXISTS `tbl_sell` (
  `sell_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_sl` varchar(100) NOT NULL,
  `product_name` text NOT NULL,
  `description` text NOT NULL,
  `warrenty` varchar(20) NOT NULL,
  `buy_price` int(10) NOT NULL,
  `cover_price` int(10) NOT NULL,
  `sell_by` varchar(20) NOT NULL,
  `sell_date` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  `sub_id` int(5) NOT NULL,
  `shop_id` int(5) NOT NULL,
  `cust_id` int(5) NOT NULL,
  `memo_id` int(10) NOT NULL,
  PRIMARY KEY (`sell_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=164 ;

--
-- Dumping data for table `tbl_sell`
--

INSERT INTO `tbl_sell` (`sell_id`, `product_sl`, `product_name`, `description`, `warrenty`, `buy_price`, `cover_price`, `sell_by`, `sell_date`, `month`, `year`, `sub_id`, `shop_id`, `cust_id`, `memo_id`) VALUES
(1, '1449', 'Pridge', '--', '5 years', 0, 31000, 'mahabub', '07-09-2013', 'September', 2013, 21, 1, 3, 1),
(2, '109634', 'Frigee', '0', '5years', 21760, 25600, 'mahabub', '19-09-2013', 'September', 2013, 19, 1, 4, 2),
(3, '99316', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '19-09-2013', 'September', 2013, 21, 1, 5, 3),
(4, '0', 'WPF 21T2', '0', '4 YEARS', 10965, 12900, 'mahabub', '20-09-2013', 'September', 2013, 139, 1, 6, 4),
(5, '0', 'WB-M-20', '0', '1 YEARS', 1785, 2100, 'mahabub', '21-09-2013', 'September', 2013, 73, 1, 7, 5),
(6, '1403130382', 'Frigee', '0', '5years', 28050, 33000, 'mahabub', '21-09-2013', 'September', 2013, 28, 1, 8, 6),
(7, '114921', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '22-09-2013', 'September', 2013, 21, 1, 10, 7),
(8, '103581', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '22-09-2013', 'September', 2013, 19, 1, 11, 8),
(9, '11', 'TRICON 1000VA', '0', '2YEARS', 2300, 2700, 'mahabub', '23-09-2013', 'September', 2013, 82, 1, 12, 9),
(10, '114936', 'Frigee', '0', '5 years', 26520, 31200, 'mahabub', '23-09-2013', 'September', 2013, 26, 1, 13, 10),
(11, '103230', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '25-09-2013', 'September', 2013, 19, 1, 14, 11),
(12, '1505131101', 'Frigee', '0', '5 years', 19040, 22400, 'mahabub', '25-09-2013', 'September', 2013, 17, 1, 15, 12),
(13, '0', 'XPLOR-140', '0', '2 YEARS', 1, 1, 'mahabub', '26-09-2013', 'September', 2013, 2, 1, 16, 13),
(14, '0', 'LCD 42', '0', '2 YEARS', 52615, 61900, 'mahabub', '26-09-2013', 'September', 2013, 125, 1, 17, 14),
(15, '0', 'WPF 21T2', '0', '4 YEARS', 10965, 12900, 'mahabub', '26-09-2013', 'September', 2013, 139, 1, 18, 15),
(16, '114925', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '26-09-2013', 'September', 2013, 21, 1, 24, 16),
(17, '49743', 'Frigee', '0', '5 years', 18445, 21700, 'mahabub', '26-09-2013', 'September', 2013, 18, 1, 25, 17),
(18, '1546', '   Frigee    ', '                  0', '       5years', 19272, 21900, 'mahabub', '26-09-2013', 'September', 2013, 14, 1, 26, 18),
(19, '114929', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '28-09-2013', 'September', 2013, 21, 1, 29, 19),
(20, '115170', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '28-09-2013', 'September', 2013, 21, 1, 30, 20),
(21, '114920', 'Frigee', '0', '5 years', 26520, 31200, 'mahabub', '28-09-2013', 'September', 2013, 26, 1, 31, 21),
(22, '109690', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '28-09-2013', 'September', 2013, 19, 1, 32, 22),
(23, '85768', 'Frigee', '0', '5 years', 18445, 21700, 'mahabub', '28-09-2013', 'September', 2013, 18, 1, 33, 23),
(24, '104798', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '28-09-2013', 'September', 2013, 19, 1, 34, 24),
(25, '99283', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '28-09-2013', 'September', 2013, 21, 1, 35, 25),
(26, '0', 'LED-32', '0', '2 YEARS', 36125, 42500, 'mahabub', '28-09-2013', 'September', 2013, 118, 1, 36, 26),
(27, '111455', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '29-09-2013', 'September', 2013, 21, 1, 37, 27),
(28, '111456', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '29-09-2013', 'September', 2013, 21, 1, 37, 27),
(29, '115787', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '29-09-2013', 'September', 2013, 21, 1, 37, 27),
(30, '103367', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '29-09-2013', 'September', 2013, 21, 1, 37, 27),
(31, '109579', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '29-09-2013', 'September', 2013, 21, 1, 37, 27),
(32, '105908', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '29-09-2013', 'September', 2013, 21, 1, 37, 27),
(33, '109632', 'Frigee', '0', '5 years', 18445, 21700, 'mahabub', '29-09-2013', 'September', 2013, 19, 1, 37, 27),
(34, '60665', 'Frigee', '0', '5 years', 18445, 21700, 'mahabub', '29-09-2013', 'September', 2013, 19, 1, 37, 27),
(35, '16088963', 'Frigee', '0', '5 years', 19040, 22400, 'mahabub', '29-09-2013', 'September', 2013, 19, 1, 37, 27),
(36, '63439', 'Frigee', '0', '5 years', 19040, 22400, 'mahabub', '29-09-2013', 'September', 2013, 19, 1, 37, 27),
(37, '111464', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '29-09-2013', 'September', 2013, 21, 1, 40, 28),
(38, '0', 'LEO-Fixed(Spoke)80', '0', '2YEARS', 65, 73, 'mahabub', '01-10-2013', 'October', 2013, 11, 1, 41, 29),
(39, '0', '', '', '', 0, 70000, 'mahabub', '01-10-2013', 'October', 2013, 0, 1, 43, 30),
(40, '111290', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '01-10-2013', 'October', 2013, 21, 1, 44, 31),
(41, '12663663', 'ZOOM 1200', '0', '2YEARS', 14960, 16700, 'mahabub', '01-10-2013', 'October', 2013, 52, 1, 45, 32),
(42, '1103130812', 'Frigee', '0', '5 years', 28050, 33000, 'mahabub', '01-10-2013', 'October', 2013, 28, 1, 46, 33),
(43, '114937', 'Frigee', '0', '5 years', 26520, 31200, 'mahabub', '01-10-2013', 'October', 2013, 28, 1, 46, 33),
(44, '114918', 'Frigee', '0', '5 years', 26520, 31200, 'mahabub', '01-10-2013', 'October', 2013, 26, 1, 46, 33),
(45, '115786', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '01-10-2013', 'October', 2013, 26, 1, 46, 33),
(46, '99658', 'Frigee', '0', '5years', 23970, 28200, 'mahabub', '01-10-2013', 'October', 2013, 26, 1, 46, 33),
(47, '109654', 'Frigee', '0', '5years', 21760, 25600, 'mahabub', '01-10-2013', 'October', 2013, 26, 1, 46, 33),
(48, '109706', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '01-10-2013', 'October', 2013, 21, 1, 46, 33),
(49, '103579', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '01-10-2013', 'October', 2013, 21, 1, 46, 33),
(50, '68843', '   Frigee    ', '                  0  ', '       5years   ', 19272, 21900, 'mahabub', '01-10-2013', 'October', 2013, 21, 1, 46, 33),
(51, '1542', '   Frigee   ', '                  0', '       5years    ', 19272, 21900, 'mahabub', '01-10-2013', 'October', 2013, 21, 1, 46, 33),
(52, '2147483647', 'Frigee', '0', '5 years', 28050, 33000, 'mahabub', '01-10-2013', 'October', 2013, 19, 1, 46, 33),
(53, '14535371', '   Frigee', '                  0', '       5 years', 19272, 21900, 'mahabub', '01-10-2013', 'October', 2013, 19, 1, 46, 33),
(54, '1034', '             Frigee  ', '    0', '5 years', 21335, 25100, 'mahabub', '01-10-2013', 'October', 2013, 19, 1, 46, 33),
(55, '1052', 'Frigee', '0', '5 years', 25925, 30500, 'mahabub', '01-10-2013', 'October', 2013, 19, 1, 46, 33),
(56, '1003130747', 'Frigee', '0', '5 years', 28050, 33000, 'mahabub', '01-10-2013', 'October', 2013, 19, 1, 46, 33),
(57, '1403130383', 'Frigee', '0', '5 years', 28050, 33000, 'mahabub', '01-10-2013', 'October', 2013, 19, 1, 46, 33),
(58, '109508', 'Frigee', '0', '5 years', 18445, 21700, 'mahabub', '01-10-2013', 'October', 2013, 18, 1, 47, 34),
(59, '105927', 'Frigee', '0', '5 years', 18445, 21700, 'mahabub', '02-10-2013', 'October', 2013, 18, 1, 51, 35),
(60, '109730', 'Frigee', '0', '5years', 21760, 25600, 'mahabub', '02-10-2013', 'October', 2013, 19, 1, 52, 36),
(61, '109710', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '02-10-2013', 'October', 2013, 19, 1, 53, 37),
(62, '0', 'WPF 21U1', '0', '4 YEARS', 12070, 14200, 'mahabub', '03-10-2013', 'October', 2013, 135, 1, 54, 38),
(63, '10', 'TRICON-1000 VA', '0', '2 YEARS', 2300, 2700, 'mahabub', '03-10-2013', 'October', 2013, 82, 1, 55, 39),
(64, '105919', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '03-10-2013', 'October', 2013, 82, 1, 55, 39),
(65, '514', 'SQUAR-1000VA', 'STABILIZER', '3YEARS', 2100, 2600, 'mahabub', '03-10-2013', 'October', 2013, 84, 1, 56, 40),
(66, '3005116', 'Frigee', '0', '5 years', 25925, 30500, 'mahabub', '03-10-2013', 'October', 2013, 84, 1, 56, 40),
(67, '0', 'WK-CR1193(107.L)', '0', '1 YEARS', 1100, 1300, 'mahabub', '03-10-2013', 'October', 2013, 98, 1, 57, 41),
(68, '0', 'WK-CR1193(107.L)', '0', '1 YEARS', 1100, 1300, 'mahabub', '03-10-2013', 'October', 2013, 98, 1, 57, 41),
(69, '0', 'WPF 21U2', '0', '4YEARS', 12070, 14200, 'mahabub', '05-10-2013', 'October', 2013, 135, 1, 58, 42),
(70, '0', 'WK-CR1193(107.L)', '0', '1 YEARS', 1100, 1300, 'mahabub', '05-10-2013', 'October', 2013, 98, 1, 59, 43),
(71, '103', 'SQUAR-600VA', 'STABILIZER', '3YEARS', 1450, 2000, 'mahabub', '05-10-2013', 'October', 2013, 83, 1, 60, 44),
(72, '109555', 'Frigee', '0', '5 years', 18445, 21700, 'mahabub', '05-10-2013', 'October', 2013, 83, 1, 60, 44),
(73, '110', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2300, 'mahabub', '05-10-2013', 'October', 2013, 83, 1, 61, 45),
(74, '84109', 'Frigee', '0', '5 years', 18445, 21700, 'mahabub', '05-10-2013', 'October', 2013, 83, 1, 61, 45),
(75, '179584', 'W2D-A90', '0', '5 years', 21760, 25600, 'mahabub', '05-10-2013', 'October', 2013, 19, 1, 62, 46),
(76, '1089', '            Frigee', '    0', '5 years', 21335, 25100, 'mahabub', '05-10-2013', 'October', 2013, 15, 1, 63, 47),
(77, '672', 'W-1403F', '0', '4YEARS', 7905, 9300, 'mahabub', '05-10-2013', 'October', 2013, 148, 1, 64, 48),
(78, '21', 'TRICON-1000 VA', '0', '2 YEARS', 2300, 2700, 'mahabub', '05-10-2013', 'October', 2013, 82, 1, 65, 49),
(79, '161138', 'W2D-2B6(PN)', '0', '5 years', 29495, 34700, 'mahabub', '05-10-2013', 'October', 2013, 82, 1, 65, 49),
(80, '112', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2300, 'mahabub', '05-10-2013', 'October', 2013, 83, 1, 66, 50),
(81, '159297', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '05-10-2013', 'October', 2013, 83, 1, 66, 50),
(82, '0', 'WPF 21T1', '0', '4 YEARS', 10965, 12900, 'mahabub', '05-10-2013', 'October', 2013, 139, 1, 67, 51),
(83, '160434', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '05-10-2013', 'October', 2013, 139, 1, 67, 51),
(84, '159282', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 67, 51),
(85, '178847', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 67, 51),
(86, '178848', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 67, 51),
(87, '170823', 'W2D-A90', '0', '5 years', 21760, 25600, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 67, 51),
(88, '178826', 'W2D-A90', '0', '5 years', 21760, 25600, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 67, 51),
(89, '905130689', 'FC-1D5(DEEF)', '0', '5 years', 18615, 21900, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 67, 51),
(90, '1205730670', 'FC-1D5(DEEF)', '0', '5 years', 18615, 21900, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 67, 51),
(91, '515', 'SQUAR-1000VA', 'STABILIZER', '3YEARS', 2100, 53783, 'mahabub', '05-10-2013', 'October', 2013, 84, 1, 68, 52),
(92, '170809', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '05-10-2013', 'October', 2013, 84, 1, 68, 52),
(93, '168508', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 68, 52),
(94, '111289', 'Frigee', '0', '5years', 23970, 28200, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 68, 52),
(95, '115154', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 68, 52),
(96, '168499', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 68, 52),
(97, '178803', 'W2D-A90', '0', '5 years', 21760, 25600, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 68, 52),
(98, '109544', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 68, 52),
(99, '104807', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '05-10-2013', 'October', 2013, 21, 1, 68, 52),
(100, '113', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2300, 'mahabub', '06-10-2013', 'October', 2013, 83, 1, 72, 53),
(101, '103588', 'Frigee', '0', '5 years', 21760, 25600, 'mahabub', '06-10-2013', 'October', 2013, 83, 1, 72, 53),
(102, '109', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2300, 'mahabub', '06-10-2013', 'October', 2013, 83, 1, 73, 54),
(103, '62557', 'Frigee', '0', '5 years', 19040, 22400, 'mahabub', '06-10-2013', 'October', 2013, 83, 1, 73, 54),
(104, '104', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2300, 'mahabub', '06-10-2013', 'October', 2013, 83, 1, 74, 55),
(105, '170723', 'W2D-A90', '0', '5 years', 21760, 25600, 'mahabub', '06-10-2013', 'October', 2013, 83, 1, 74, 55),
(106, '0', 'WPF 21T1', '0', '4 YEARS', 10965, 12900, 'mahabub', '07-10-2013', 'October', 2013, 139, 1, 75, 56),
(107, '19078448', 'W2D-A90', '0', '5 years', 26000, 28500, 'mahabub', '07-10-2013', 'October', 2013, 19, 1, 76, 57),
(108, '24498681', 'W2D-2D4/STB', '0', '5 years', 0, 35000, 'mahabub', '07-10-2013', 'October', 2013, 26, 1, 77, 58),
(109, '170628', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '07-10-2013', 'October', 2013, 21, 1, 78, 59),
(110, '159598', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '07-10-2013', 'October', 2013, 21, 1, 79, 60),
(111, '114', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 0, 'mahabub', '07-10-2013', 'October', 2013, 83, 1, 80, 61),
(112, '518', 'SQUAR-1000VA', 'STABILIZER', '3YEARS', 2100, 3000, 'mahabub', '07-10-2013', 'October', 2013, 83, 1, 80, 61),
(113, '114935', 'Frigee', '0', '5 years', 26520, 31000, 'mahabub', '07-10-2013', 'October', 2013, 84, 1, 80, 61),
(114, '0', 'STYLEX(-SPOKE)', '0', '2YEARS', 67584, 72000, 'mahabub', '08-10-2013', 'October', 2013, 10, 1, 82, 62),
(115, '119', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2300, 'mahabub', '08-10-2013', 'October', 2013, 83, 1, 83, 63),
(116, '606130959', 'FC-1D5(DEEF)', '0', '5 years', 18615, 21900, 'mahabub', '08-10-2013', 'October', 2013, 14, 1, 84, 64),
(117, '179112', 'W2D-2BO(CD)', '0', '5 years', 24140, 28400, 'mahabub', '08-10-2013', 'October', 2013, 23, 1, 85, 65),
(118, '124542', 'Frigee', '0', '5 years', 24140, 28400, 'mahabub', '08-10-2013', 'October', 2013, 23, 1, 85, 65),
(119, '168745', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '08-10-2013', 'October', 2013, 23, 1, 85, 65),
(120, '160299', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '08-10-2013', 'October', 2013, 23, 1, 85, 65),
(121, '170724', 'W2D-A90', '0', '5 years', 21760, 25600, 'mahabub', '08-10-2013', 'October', 2013, 21, 1, 85, 65),
(122, '170878', 'W2D-A90', '0', '5 years', 21760, 25600, 'mahabub', '08-10-2013', 'October', 2013, 21, 1, 85, 65),
(123, '59737', 'Frigee', '0', '5 years', 18445, 21700, 'mahabub', '08-10-2013', 'October', 2013, 21, 1, 85, 65),
(124, '109574', 'Frigee', '0', '5 years', 18445, 21700, 'mahabub', '08-10-2013', 'October', 2013, 21, 1, 85, 65),
(125, '63546', 'Frigee', '0', '5 years', 19040, 22400, 'mahabub', '08-10-2013', 'October', 2013, 19, 1, 85, 65),
(126, '63538', 'Frigee', '0', '5 years', 19040, 22400, 'mahabub', '08-10-2013', 'October', 2013, 19, 1, 85, 65),
(127, '115', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2300, 'mahabub', '08-10-2013', 'October', 2013, 83, 1, 86, 66),
(128, '2147483647', 'W2D-1H5(CD)', '0', '5 years', 24820, 29200, 'mahabub', '08-10-2013', 'October', 2013, 83, 1, 86, 66),
(129, '160315', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '08-10-2013', 'October', 2013, 21, 1, 87, 67),
(130, '301', 'ANNOROKOM-600VA', '0', '3YEARS', 2250, 4300, 'mahabub', '08-10-2013', 'October', 2013, 21, 1, 87, 67),
(131, '116', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2500, 'mahabub', '08-10-2013', 'October', 2013, 83, 1, 88, 68),
(132, '178844', 'W2D-A90', '0', '5 years', 21760, 26000, 'mahabub', '08-10-2013', 'October', 2013, 83, 1, 88, 68),
(133, '117', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2500, 'mahabub', '09-10-2013', 'October', 2013, 83, 1, 92, 69),
(134, '161793', 'WFF-2A3CD', '0', '5 years', 23970, 28500, 'mahabub', '09-10-2013', 'October', 2013, 83, 1, 92, 69),
(135, '118', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2000, 'mahabub', '09-10-2013', 'October', 2013, 83, 1, 93, 70),
(136, '109624', 'Frigee', '0', '5 years', 23970, 28000, 'mahabub', '09-10-2013', 'October', 2013, 83, 1, 93, 70),
(137, '517', 'SQUAR-1000VA', 'STABILIZER', '3YEARS', 2100, 3000, 'mahabub', '09-10-2013', 'October', 2013, 84, 1, 94, 71),
(138, '20536137', '              Frigee', '    0 ', '5 years', 21335, 25000, 'mahabub', '09-10-2013', 'October', 2013, 84, 1, 94, 71),
(139, '106', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2400, 'mahabub', '09-10-2013', 'October', 2013, 83, 1, 95, 72),
(140, '179027', 'W2D-A90', '0', '5 years', 21760, 25600, 'mahabub', '09-10-2013', 'October', 2013, 83, 1, 95, 72),
(141, '107', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2500, 'mahabub', '09-10-2013', 'October', 2013, 83, 1, 96, 73),
(142, '145418', 'WFF-2A3CD', '0', '5 years', 23970, 28500, 'mahabub', '09-10-2013', 'October', 2013, 83, 1, 96, 73),
(143, '509', 'SQUAR-1000VA', 'STABILIZER', '3YEARS', 2100, 2500, 'mahabub', '09-10-2013', 'October', 2013, 84, 1, 97, 74),
(144, '148765', 'W2D-1H5(CD)', '0', '5 years', 24820, 28000, 'mahabub', '09-10-2013', 'October', 2013, 84, 1, 97, 74),
(145, '176199', 'W2D-A90', '0', '5 years', 21760, 26000, 'mahabub', '09-10-2013', 'October', 2013, 19, 1, 98, 75),
(146, '511', 'SQUAR-1000VA', 'STABILIZER', '3YEARS', 2100, 0, 'mahabub', '10-10-2013', 'October', 2013, 84, 1, 103, 76),
(147, '512', 'SQUAR-1000VA', 'STABILIZER', '3YEARS', 2100, 2600, 'mahabub', '10-10-2013', 'October', 2013, 84, 1, 103, 76),
(148, '20536137', 'FC-2T5', '0', '5 years', 21335, 25100, 'mahabub', '10-10-2013', 'October', 2013, 84, 1, 103, 76),
(149, '161772', 'W2D-2B6(PN)', '0', '5 years', 29495, 34700, 'mahabub', '10-10-2013', 'October', 2013, 29, 1, 102, 77),
(150, '124537', 'Frigee', '0', '5 years', 24140, 28400, 'mahabub', '10-10-2013', 'October', 2013, 29, 1, 102, 77),
(151, '168641', 'WFF-2A3CD', '0', '5 years', 23970, 28200, 'mahabub', '10-10-2013', 'October', 2013, 23, 1, 102, 77),
(152, '115788', 'Frigee', '0', '5 years', 23970, 28200, 'mahabub', '10-10-2013', 'October', 2013, 23, 1, 102, 77),
(153, '178827', 'W2D-A90', '0', '5 years', 21760, 25600, 'mahabub', '10-10-2013', 'October', 2013, 21, 1, 102, 77),
(154, '178834', 'W2D-A90', '0', '5 years', 21760, 25600, 'mahabub', '10-10-2013', 'October', 2013, 21, 1, 102, 77),
(155, '513', 'SQUAR-1000VA', 'STABILIZER', '3YEARS', 2100, 2600, 'mahabub', '10-10-2013', 'October', 2013, 84, 1, 107, 78),
(156, '172620', 'W2D-2BO(CD)', '0', '5 years', 24140, 28400, 'mahabub', '10-10-2013', 'October', 2013, 84, 1, 107, 78),
(157, '105', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2300, 'mahabub', '19-10-2013', 'October', 2013, 83, 1, 49, 79),
(158, '108', 'SQUAR-700', 'STABILIZER', '3YEARS', 1550, 2300, 'mahabub', '19-10-2013', 'October', 2013, 83, 1, 102, 80),
(159, '0', 'WPF 21T1', '0', '4 YEARS', 10965, 12900, 'mahabub', '19-10-2013', 'October', 2013, 139, 1, 108, 81),
(160, '0', 'STYLEX-100(Spoke)', '0', '2YEARS', 69, 77, 'mahabub', '19-10-2013', 'October', 2013, 10, 1, 48, 82),
(161, '0306130257', 'FC-1D5(DEEF)', '0', '5 years', 18615, 21900, 'mahabub', '19-10-2013', 'October', 2013, 14, 1, 110, 83),
(162, '#157FMD12XLO2188# #WBXLO14012FO2188#', 'XPLOR-140', '0', '2 YEARS', 1, 1, 'mahabub', '19-10-2013', 'October', 2013, 2, 1, 48, 84),
(163, '#157FMD12XLO2202#WBXL14012FO2202#', 'XPLOR-140', '0', '2 YEARS', 1, 1, 'mahabub', '19-10-2013', 'October', 2013, 2, 1, 111, 85);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sell_history`
--

CREATE TABLE IF NOT EXISTS `tbl_sell_history` (
  `history_id` int(10) NOT NULL AUTO_INCREMENT,
  `memo_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `discount` int(3) NOT NULL,
  `total_price` int(11) NOT NULL,
  `paid` int(10) NOT NULL,
  `instalment` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  `sell_by` varchar(20) NOT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `tbl_sell_history`
--

INSERT INTO `tbl_sell_history` (`history_id`, `memo_id`, `cust_id`, `discount`, `total_price`, `paid`, `instalment`, `date`, `month`, `year`, `sell_by`) VALUES
(1, 1, 3, 0, 31000, 31000, 0, '07-10-2013', 'October', 2013, ''),
(2, 2, 4, 0, 25600, 25000, 0, '19-09-2013', 'September', 2013, ''),
(3, 3, 5, 0, 28200, 15000, 0, '19-09-2013', 'September', 2013, ''),
(4, 4, 6, 0, 12900, 12500, 0, '20-09-2013', 'September', 2013, ''),
(5, 5, 7, 0, 2100, 2100, 0, '21-09-2013', 'September', 2013, ''),
(6, 6, 8, 0, 33000, 33000, 0, '21-09-2013', 'September', 2013, ''),
(7, 7, 10, 0, 28200, 20000, 0, '22-09-2013', 'September', 2013, ''),
(8, 8, 11, 0, 25600, 15000, 1, '22-09-2013', 'September', 2013, ''),
(9, 9, 12, 0, 2700, 20000, 1, '23-09-2013', 'September', 2013, ''),
(10, 10, 13, 0, 31200, 20000, 1, '23-09-2013', 'September', 2013, ''),
(11, 11, 14, 0, 25600, 25600, 0, '07-10-2013', 'October', 2013, ''),
(12, 12, 15, 0, 22400, 22400, 1, '25-09-2013', 'September', 2013, ''),
(13, 13, 16, 0, 1, 75000, 1, '26-09-2013', 'September', 2013, ''),
(14, 14, 17, 0, 61900, 0, 1, '26-09-2013', 'September', 2013, ''),
(15, 15, 18, 0, 12900, 12400, 1, '26-09-2013', 'September', 2013, ''),
(16, 16, 24, 0, 28200, 28200, 0, '26-09-2013', 'September', 2013, ''),
(17, 17, 25, 0, 21700, 21700, 0, '26-09-2013', 'September', 2013, ''),
(18, 18, 26, 0, 21900, 18400, 0, '26-09-2013', 'September', 2013, ''),
(19, 19, 29, 0, 28200, 28000, 0, '28-09-2013', 'September', 2013, ''),
(20, 20, 30, 0, 28200, 28000, 0, '28-09-2013', 'September', 2013, ''),
(21, 21, 31, 0, 31200, 31200, 0, '28-09-2013', 'September', 2013, ''),
(22, 22, 32, 0, 25600, 12000, 0, '28-09-2013', 'September', 2013, ''),
(23, 23, 33, 0, 21700, 21700, 0, '28-09-2013', 'September', 2013, ''),
(24, 24, 34, 0, 25600, 22000, 1, '28-09-2013', 'September', 2013, ''),
(25, 25, 35, 0, 28200, 10000, 1, '28-09-2013', 'September', 2013, ''),
(26, 26, 36, 0, 42500, 10000, 1, '28-09-2013', 'September', 2013, ''),
(27, 27, 37, 11, 222144, 144, 1, '29-09-2013', 'September', 2013, 'mahabub'),
(28, 28, 40, 0, 28200, 28200, 0, '09-10-2013', 'October', 2013, ''),
(29, 29, 41, 0, 73, 55000, 1, '01-10-2013', 'October', 2013, ''),
(30, 30, 43, 0, 70000, 70000, 0, '07-10-2013', 'October', 2013, ''),
(31, 31, 44, 0, 28200, 18000, 1, '01-10-2013', 'October', 2013, ''),
(32, 32, 45, 0, 16700, 16700, 0, '01-10-2013', 'October', 2013, ''),
(33, 33, 46, 11, 399521, 0, 1, '01-10-2013', 'October', 2013, 'mahabub'),
(34, 34, 47, 0, 21700, 15700, 1, '01-10-2013', 'October', 2013, ''),
(35, 35, 51, 0, 21700, 6700, 1, '02-10-2013', 'October', 2013, ''),
(36, 36, 52, 0, 25600, 10000, 0, '02-10-2013', 'October', 2013, 'mahabub'),
(37, 37, 53, 0, 25600, 16600, 1, '02-10-2013', 'October', 2013, ''),
(38, 38, 54, 0, 14200, 11200, 1, '07-10-2013', 'October', 2013, 'mahabub'),
(39, 39, 55, 0, 28300, 18000, 1, '03-10-2013', 'October', 2013, 'mahabub'),
(40, 40, 56, 0, 33100, 12000, 1, '03-10-2013', 'October', 2013, 'mahabub'),
(41, 41, 57, 12, 2298, 2300, 0, '03-10-2013', 'October', 2013, 'mahabub'),
(42, 42, 58, 0, 14200, 1500, 1, '05-10-2013', 'October', 2013, ''),
(43, 43, 59, 0, 1300, 1300, 0, '05-10-2013', 'October', 2013, ''),
(44, 44, 60, 0, 23700, 24500, 0, '05-10-2013', 'October', 2013, 'mahabub'),
(45, 45, 61, 0, 24000, 15500, 1, '05-10-2013', 'October', 2013, 'mahabub'),
(46, 46, 62, 0, 25600, 10000, 1, '05-10-2013', 'October', 2013, ''),
(47, 47, 63, 0, 25100, 24000, 0, '05-10-2013', 'October', 2013, ''),
(48, 48, 64, 0, 9300, 5000, 1, '05-10-2013', 'October', 2013, ''),
(49, 49, 65, 0, 37400, 36000, 0, '05-10-2013', 'October', 2013, 'mahabub'),
(50, 50, 66, 0, 30500, 15000, 1, '05-10-2013', 'October', 2013, 'mahabub'),
(51, 51, 67, 10, 198630, 76000, 1, '05-10-2013', 'October', 2013, 'mahabub'),
(52, 52, 68, 9, 247140, 2, 1, '05-10-2013', 'October', 2013, 'mahabub'),
(53, 53, 72, 0, 27900, 10000, 1, '06-10-2013', 'October', 2013, 'mahabub'),
(54, 54, 73, 0, 24700, 10700, 1, '06-10-2013', 'October', 2013, 'mahabub'),
(55, 55, 74, 0, 27900, 10000, 1, '06-10-2013', 'October', 2013, 'mahabub'),
(56, 56, 75, 0, 12900, 12800, 0, '07-10-2013', 'October', 2013, ''),
(57, 57, 76, 0, 28500, 21500, 1, '07-10-2013', 'October', 2013, ''),
(58, 58, 77, 0, 35000, 31500, 1, '07-10-2013', 'October', 2013, ''),
(59, 59, 78, 0, 28200, 25200, 1, '07-10-2013', 'October', 2013, ''),
(60, 60, 79, 0, 28200, 5000, 1, '07-10-2013', 'October', 2013, ''),
(61, 61, 80, 0, 34000, 0, 0, '07-10-2013', 'October', 2013, 'mahabub'),
(62, 62, 82, 0, 72000, 72000, 0, '09-10-2013', 'October', 2013, ''),
(63, 63, 83, 0, 2300, 2300, 0, '08-10-2013', 'October', 2013, ''),
(64, 64, 84, 0, 21900, 8400, 1, '08-10-2013', 'October', 2013, ''),
(65, 65, 85, 11, 224814, 14, 1, '08-10-2013', 'October', 2013, 'mahabub'),
(66, 66, 86, 0, 31500, 10000, 1, '08-10-2013', 'October', 2013, 'mahabub'),
(67, 67, 87, 0, 32500, 10000, 1, '08-10-2013', 'October', 2013, 'mahabub'),
(68, 68, 88, 0, 28500, 14000, 1, '08-10-2013', 'October', 2013, 'mahabub'),
(69, 69, 92, 0, 31000, 31000, 0, '09-10-2013', 'October', 2013, 'mahabub'),
(70, 70, 93, 0, 30000, 30000, 0, '09-10-2013', 'October', 2013, 'mahabub'),
(71, 71, 94, 0, 28000, 0, 1, '09-10-2013', 'October', 2013, 'mahabub'),
(72, 72, 95, 0, 28000, 28000, 0, '09-10-2013', 'October', 2013, 'mahabub'),
(73, 73, 96, 0, 31000, 21000, 1, '09-10-2013', 'October', 2013, 'mahabub'),
(74, 74, 97, 0, 30500, 30500, 0, '06-03-2014', 'March', 2014, 'mahabub'),
(75, 75, 98, 0, 26000, 26000, 0, '03-11-2013', 'November', 2013, 'mahabub'),
(76, 76, 103, 0, 27700, 27700, 0, '10-10-2013', 'October', 2013, 'mahabub'),
(77, 77, 102, 9, 155337, 100000, 1, '10-10-2013', 'October', 2013, 'mahabub'),
(78, 78, 107, 0, 31000, 31000, 0, '02-11-2013', 'November', 2013, 'mahabub'),
(79, 79, 49, 0, 2300, 2000, 1, '19-10-2013', 'October', 2013, 'mahabub'),
(80, 80, 102, 0, 2300, 2300, 0, '19-10-2013', 'October', 2013, 'mahabub'),
(81, 81, 108, 10, 11610, 11610, 0, '19-10-2013', 'October', 2013, 'mahabub'),
(82, 82, 48, 60, 30, 30, 0, '19-10-2013', 'October', 2013, 'mahabub'),
(83, 83, 110, 10, 19710, 16000, 1, '19-10-2013', 'October', 2013, 'mahabub'),
(84, 84, 48, 5, 1, 1, 0, '19-10-2013', 'October', 2013, 'mahabub'),
(85, 85, 111, 0, 1, 1, 0, '19-10-2013', 'October', 2013, 'mahabub');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE IF NOT EXISTS `tbl_shop` (
  `shop_id` int(5) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(50) NOT NULL,
  `shop_address` varchar(30) NOT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_address`) VALUES
(1, 'Walton Exclusive', 'Nashima Mansion'),
(4, 'BHUIYAN  ELACTRONIC', 'CHHAGAL NIYA'),
(3, 'MASTER SHAEKAHAMMED ELACTRONIC', 'AMZAD MAJUMDER HAT'),
(5, 'BISMILLAHA ELACTRONIC', 'CHHAGAL NIYA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_sl` varchar(100) NOT NULL,
  `product_name` text NOT NULL,
  `description` text NOT NULL,
  `buy_price` double NOT NULL,
  `cover_price` double NOT NULL,
  `warrenty` varchar(50) NOT NULL,
  `entry_by` varchar(50) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `sub_id` int(12) NOT NULL COMMENT 'sub_id means sub cateogory id',
  `shop_id` int(5) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=165 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tmp_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_tmp_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` int(11) NOT NULL,
  `entry_time` varchar(40) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `tbl_tmp_cart`
--

INSERT INTO `tbl_tmp_cart` (`cart_id`, `stock_id`, `entry_time`) VALUES
(69, 81, '05-10-13[11:24:41]'),
(68, 66, '05-10-13[11:24:41]'),
(32, 62, '01-10-13[02:38:28]'),
(31, 61, '01-10-13[02:38:28]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(30) NOT NULL,
  `f_name` text NOT NULL,
  `age` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `join_date` varchar(30) NOT NULL,
  `d` int(2) NOT NULL COMMENT 'day',
  `m` int(2) NOT NULL COMMENT 'month',
  `y` int(4) NOT NULL COMMENT 'year',
  `sallery` varchar(10) NOT NULL,
  `shop_id` int(5) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `full_name`, `f_name`, `age`, `address`, `mobile_no`, `email`, `picture`, `join_date`, `d`, `m`, `y`, `sallery`, `shop_id`, `user_name`, `password`) VALUES
(1, 'Mahabub Alam', 'Ruhulamin', '33', 'Durga pur', '01812076772', 'rafiqfeni@yahoo.com', 'Mahabub Alam201.gif', '1-1-2011', 1, 1, 2011, '5500', 1, 'mahabub', '123456'),
(2, 'Hasan Mashud', 'hifaz vb', '', '', '', '', '', '', 0, 0, 0, '', 0, '', ''),
(6, '', '', '', '', '', '', '', 'System.Windows.Forms.ComboBox,', 0, 0, 0, '', 0, 'io', 'sdfdsf'),
(7, 'Reazul islam', 'Md.Ismail', '23', 'Feni', '018734847', 'muradfci@gm.com', '', 'System.Windows.Forms.ComboBox,', 9, 1, 2012, '200000', 0, 'murad', 'murad'),
(8, '', '', '', '', '', '', '', 'System.Windows.Forms.ComboBox,', 0, 0, 0, '', 0, 'dsf8', 'kji'),
(9, '', '', '', '', '', '', '', 'System.Windows.Forms.ComboBox,', 0, 0, 0, '', 0, 'f', 'dfs'),
(10, '', '', '', '', '', '', '', 'System.Windows.Forms.ComboBox,', 0, 0, 0, '', 0, 'f', 'sdf'),
(11, '', '', '', '', '', '', '', 'System.Windows.Forms.ComboBox,', 0, 0, 0, '', 0, 'dsf', 'sdf'),
(12, '', '', '', '', '', '', '', 'System.Windows.Forms.ComboBox,', 0, 0, 0, '', 0, 's', 'd'),
(13, '', '', '', '', '', '', '', 'System.Windows.Forms.ComboBox,', 0, 0, 0, '', 0, 'dfs', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE IF NOT EXISTS `tbl_vendor` (
  `vendor_id` int(3) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(200) NOT NULL,
  `vendor_address` text NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`vendor_id`, `vendor_name`, `vendor_address`) VALUES
(2, 'Walton Hi-Tech Industries Ltd', 'Dhaka');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
