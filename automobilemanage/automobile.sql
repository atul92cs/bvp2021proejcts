-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 10:10 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BRANCH_ID` varchar(50) NOT NULL,
  `BUDGET_REMAINING` bigint(20) NOT NULL,
  `VEHICLES_SOLD` int(11) NOT NULL,
  `TURN_OVER` bigint(20) NOT NULL,
  `BUDGET_ALLOCATION` bigint(20) NOT NULL,
  `MONTH_YEAR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BRANCH_ID`, `BUDGET_REMAINING`, `VEHICLES_SOLD`, `TURN_OVER`, `BUDGET_ALLOCATION`, `MONTH_YEAR`) VALUES
('b_98754', 199900000, 25, 100000, 200000000, 'JAN-2018'),
('b_98754', 49900000, 23, 100000, 200000000, 'FEB-2018'),
('b_98754', 99900000, 26, 100000, 200000000, 'MAR-2018'),
('b_98754', 52900000, 22, 100000, 200000000, 'APR-2018'),
('b_98754', 185200000, 21, 100000, 200000000, 'MAY-2018'),
('b_98754', 200040000, 29, 100000, 200000000, 'JUN-2018'),
('b_98754', 79900000, 25, 100000, 200000000, 'JUL-2018'),
('b_98754', 79900000, 23, 100000, 200000000, 'AUG-2018'),
('b_98754', 69900000, 28, 100000, 200000000, 'SEP-2018'),
('b_98754', 29900000, 24, 100000, 200000000, 'OCT-2018'),
('b_98754', 89900000, 25, 100000, 200000000, 'NOV-2018'),
('b_98754', 79900000, 30, 100000, 200000000, 'DEC-2018'),
('b_98755', 99900000, 25, 100000, 200000000, 'JAN-2018'),
('b_98755', 79900000, 23, 100000, 200000000, 'FEB-2018'),
('b_98755', 69900000, 26, 100000, 200000000, 'MAR-2018'),
('b_98755', 39900000, 22, 100000, 200000000, 'APR-2018'),
('b_98755', 29900000, 21, 100000, 200000000, 'MAY-2018'),
('b_98755', 59900000, 29, 100000, 200000000, 'JUN-2018'),
('b_98755', 59900000, 25, 100000, 200000000, 'JUL-2018'),
('b_98755', 29900000, 23, 100000, 200000000, 'AUG-2018'),
('b_98755', 99900000, 28, 100000, 200000000, 'SEP-2018'),
('b_98755', 99900000, 24, 100000, 200000000, 'OCT-2018'),
('b_98755', 19900000, 25, 100000, 200000000, 'NOV-2018'),
('b_98755', 89900000, 30, 100000, 200000000, 'DEC-2018'),
('', 0, 0, 0, 0, ''),
('br_00999', 45679000, 0, 0, 0, ''),
('br_00999', 45679000, 54, 45678903, 600005424, 'FEB-2019'),
('br_00999', 45679000, 54, 45678903, 600005424, 'FEB-2019'),
('br_00999', 45679000, 54, 45678903, 600005424, 'FEB-2019'),
('br_00999', 45679000, 54, 45678903, 600005424, 'FEB-2019'),
('br_00999', 45679000, 54, 45678903, 600005424, 'FEB-2019'),
('br_00999', 45679000, 54, 45678903, 600005424, 'FEB-2019');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUSTOMER_ID` varchar(50) NOT NULL,
  `DATE_OF_INQUIRY` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ADDRESS` text NOT NULL,
  `MOBILE_NUMBER` bigint(20) NOT NULL,
  `MAIL_ID` varchar(50) NOT NULL,
  `DATE_OF_BOOKING` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `MODEL` varchar(50) NOT NULL,
  `AMOUNT_PAID` int(11) NOT NULL,
  `PAYMENT_MODE` varchar(50) NOT NULL,
  `PAYMENT_ID` varchar(50) NOT NULL,
  `VEHICLE_ID` varchar(50) NOT NULL,
  `BRANCH_ID` varchar(50) NOT NULL,
  `BOOKING_ID` varchar(50) NOT NULL,
  `DATE_OF_DELIVERY` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NAME` varchar(50) NOT NULL,
  `TOTAL_AMOUNT` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUSTOMER_ID`, `DATE_OF_INQUIRY`, `ADDRESS`, `MOBILE_NUMBER`, `MAIL_ID`, `DATE_OF_BOOKING`, `MODEL`, `AMOUNT_PAID`, `PAYMENT_MODE`, `PAYMENT_ID`, `VEHICLE_ID`, `BRANCH_ID`, `BOOKING_ID`, `DATE_OF_DELIVERY`, `NAME`, `TOTAL_AMOUNT`) VALUES
('c_00001', '2017-11-21 01:00:00', 'abc,xyz', 9087656782, 'xyz@xmail.com', '2018-01-15 01:00:00', '', 500000, 'Cheque', 'PY_076545', 'v0001H', 'b_98754', 'BK_09676', '2018-01-20 01:00:00', 'Robert', 500000),
('c_00002', '2017-11-21 01:00:00', 'def,hij', 9052525782, 'khg@xmail.com', '2018-11-14 01:00:00', '', 708000, 'Net-Banking', 'PY_076s95', 'v0001F', 'b_98754', 'BK_09776', '2018-11-21 01:00:00', 'Nico', 906000),
('c_00003', '2017-11-21 01:00:00', 'ghy,juk', 8563456782, 'fsvc@xmail.com', '2018-11-21 01:00:00', '', 1500000, 'Finance', 'PY_07fgf5', 'v0002F', 'b_98755', 'BK_07776', '2018-12-20 01:00:00', 'Daniel', 2300000),
('c_00004', '2017-11-21 01:00:00', 'yui,jyf', 7453225882, 'dfgfd@xmail.com', '2018-05-01 01:00:00', '', 1800000, 'Cheque', 'PY_03fd45', 'v0002L', 'b_98754', 'BK_01776', '2018-05-11 01:00:00', 'Max', 1900000),
('ct_000098', '2019-02-17 02:31:27', '', 9098765432, 'sedfrgt@hukl.com', '0000-00-00 00:00:00', 'verna', 890000, 'CHEQUE', 'py_ch_004', 'v00029', 'br_00999', 'bk_vh_0089', '2019-02-17 02:31:27', 'Robert', 1290000),
('ct_000097', '2019-02-17 02:30:22', '', 9098765432, 'sedfrgt@hukl.com', '0000-00-00 00:00:00', 'verna', 890000, 'CHEQUE', 'py_ch_004', 'v0002L', 'br_00999', 'bk_vh_0089', '2019-02-17 02:30:22', 'Jegadheesh', 1290000),
('ct_000045', '2018-01-31 18:30:00', '', 9098765432, 'sedfrgt@hukl.com', '0000-00-00 00:00:00', 'verna', 0, '', '', '', 'br_00999', '', '2019-02-17 02:33:07', 'Romain', 0),
('ct_000045', '2018-01-31 18:30:00', '', 9098765432, 'sedfrgt@hukl.com', '0000-00-00 00:00:00', 'verna', 0, '', '', '', 'br_00999', '', '2019-02-17 02:34:05', 'Romain', 0),
('ct_000087', '2018-01-31 18:30:00', '', 9098765432, 'sedfrgt@hukl.com', '0000-00-00 00:00:00', 'verna', 0, '', '', '', 'br_00999', '', '2019-02-18 01:48:15', 'Jega', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `user_id` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `staff_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`user_id`, `password`, `staff_id`) VALUES
('test_001', 'test_001', 'staff_test_001'),
('test_002', 'test_002', 'staff_test_002'),
('admin', 'admin', 'admin'),
('test_003', 'test_003', 'staff_test_003'),
('admin1', 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `DESIGNATION` varchar(50) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `DATE_OF_JOINING` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `STAFF_ID` varchar(50) NOT NULL,
  `DATE_OF_BIRTH` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ACTIVE_INACTIVE` text NOT NULL,
  `BRANCH_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`DESIGNATION`, `NAME`, `DATE_OF_JOINING`, `STAFF_ID`, `DATE_OF_BIRTH`, `ACTIVE_INACTIVE`, `BRANCH_ID`) VALUES
('Clerk', 'staff_test_001', '2019-02-16 15:20:57', 'test_001', '1994-04-15 18:30:00', 'Active', 'b_98754'),
('Manager', 'test_002', '2019-02-16 15:20:57', 'stf_002', '1994-05-07 18:30:00', 'ACTIVE', 'b_98755'),
('Manager', 'staff_test_003', '2019-02-16 15:20:57', 'test_003', '1994-06-09 18:30:00', 'ACTIVE', 'br_00999'),
('BRANCH_HEAD', 'Chriss', '2019-02-16 15:20:57', 's_097565', '1990-01-20 01:00:00', 'ACTIVE', 'b_98754'),
('BRANCH_SALES_HEAD', 'Alan', '2019-02-16 15:20:57', 's_000091', '1990-11-21 01:00:00', 'ACTIVE', 'br_00999'),
('ALL_BRANCH_HEAD', 'Nick', '2019-02-16 15:20:57', 's_098768', '1990-12-20 01:00:00', 'ACTIVE', 'b_98754'),
('CLERK', 'Jonathan', '2019-02-16 15:20:57', 's_975369', '1990-08-10 01:00:00', 'ACTIVE', 'b_98755'),
('CLERK', 'Rick', '2019-02-16 15:20:57', 's_098765', '1990-05-11 01:00:00', 'ACTIVE', 'br_00999'),
('MECHANIC', 'Charles', '2019-02-16 15:20:57', 's_458907', '1990-09-01 01:00:00', 'ACTIVE', 'b_98754'),
('MECHANIC', 'Randy', '2019-02-16 15:20:57', 's_098911', '1990-08-06 01:00:00', 'INACTIVE', 'b_98755'),
('Asst.Manager', 'James', '2018-06-17 06:39:00', 'atf_9090', '1990-06-16 18:30:00', 'ACTIVE', 'br_00999'),
('Delivery Manager', 'Christian', '2018-08-17 06:39:00', 'stf_0087', '1989-06-16 18:30:00', 'ACTIVE', 'br_00999'),
('Delivery Manager', 'Robert', '2018-06-17 06:39:00', 'stf_0067', '1990-06-16 18:30:00', 'ACTIVE', 'br_00999'),
('Delivery Manager', 'Robert', '2018-06-17 06:39:00', 'stf_0067', '1990-06-16 18:30:00', 'ACTIVE', 'br_00999');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `MODEL` varchar(50) NOT NULL,
  `BRANCH_ID` varchar(50) NOT NULL,
  `VARIANT` varchar(50) NOT NULL,
  `DATE_OF_INTAKE` date NOT NULL,
  `VEHICLE_ID` varchar(50) NOT NULL,
  `DATE_OF_REGISTRATION` date NOT NULL,
  `DATE_OF_DELIVERY` date NOT NULL,
  `BRANCH_CUSTOMER` text NOT NULL,
  `CUSTOMER_ID_BRANCH_ID` text NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`MODEL`, `BRANCH_ID`, `VARIANT`, `DATE_OF_INTAKE`, `VEHICLE_ID`, `DATE_OF_REGISTRATION`, `DATE_OF_DELIVERY`, `BRANCH_CUSTOMER`, `CUSTOMER_ID_BRANCH_ID`, `STATUS`) VALUES
('verna', 'b_98754', '300-TDI', '2018-01-10', 'v0001H', '2018-01-19', '2018-01-20', 'C', 'c_00001', 'Delivered'),
('Elantra', 'b_98754', '345-TDI', '2018-10-21', 'v0001F', '2018-11-20', '2018-11-21', 'C', 'c_10987', 'Delivered'),
('Eco-sport', 'b_98755', '345-TXI', '2018-11-20', 'v0002F', '2018-12-19', '2018-12-20', 'C', 'c_56790', 'Delivered'),
('Endeavour', 'b_98755', '567-TSI', '2018-07-10', 'v0001L', '2018-08-09', '2018-08-10', '', '', ''),
('Sesto-Elemento', 'b_98754', '500-TDI', '2018-03-11', 'v0002L', '2018-05-10', '2018-05-11', 'C', 'c_67890', 'Delivered'),
('Hurrican', 'b_98755', '490-TSI', '2018-04-01', 'v000XL', '2018-09-01', '2018-09-01', 'B', 'b_98754', 'Delivered'),
('Centanario', 'b_98755', '235-TXI', '2018-05-06', 'v0002H', '2018-08-05', '2018-08-06', 'B', 'b_98754', 'Delivered'),
('verna', 'br_00999', '1.6 tdi', '2019-02-19', 'vh_00050', '2019-02-22', '2019-02-24', 'CUSTOMER', 'ct_00345', 'Booked');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
