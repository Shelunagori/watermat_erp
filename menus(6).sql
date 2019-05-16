-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 09:19 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watermate`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `controller` varchar(40) DEFAULT NULL,
  `action` varchar(40) DEFAULT NULL,
  `icon_class_name` varchar(50) DEFAULT NULL,
  `is_hidden` enum('Y','N') NOT NULL DEFAULT 'N',
  `query_string` varchar(30) DEFAULT NULL,
  `target` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `parent_id`, `lft`, `rght`, `controller`, `action`, `icon_class_name`, `is_hidden`, `query_string`, `target`) VALUES
(1, 'Dashboard', NULL, 1, 2, 'Users', 'dashboard', 'icon-home', 'N', '', ''),
(2, 'Admin Master', NULL, 3, 30, '', '', 'icon-settings', 'N', '', ''),
(3, 'Projects', 2, 4, 5, 'Projects', 'index', '', 'N', '', ''),
(4, 'Work Schedule', 2, 6, 7, 'WorkSchedules', 'index', '', 'N', '', ''),
(5, 'Work Schedule Steps', 2, 8, 9, 'WorkScheduleRows', 'index', '', 'N', '', ''),
(6, 'Site Selection Date', 2, 10, 11, 'Villages', 'setSiteSelection', '', 'N', '', ''),
(7, 'O&M Schedule', 2, 12, 13, 'OmEmployees', 'omSchedule', '', 'N', '', ''),
(8, 'Godowns', 2, 14, 15, 'Godowns', 'index', '', 'N', '', ''),
(9, 'Godown Village', 2, 16, 17, 'GodownVillages', 'add', '', 'N', '', ''),
(10, 'Designation', 2, 18, 25, '', '', '', 'N', '', ''),
(11, 'Employee', 10, 19, 20, 'EmployeeDesignations', 'index', '', 'N', '', ''),
(12, 'Vendor', 10, 21, 22, 'VendorDesignations', 'index', '', 'N', '', ''),
(13, 'Department Officer', 10, 23, 24, 'DoPosts', 'index', '', 'N', '', ''),
(14, 'Inventory', NULL, 31, 50, '', '', 'icon-user', 'N', '', ''),
(15, 'Products', 14, 32, 33, 'Products', 'index', '', 'N', '', ''),
(16, 'Item In', 14, 34, 35, 'AccountingEntries', 'add', '', 'N', '', ''),
(17, 'Sub Godown Transfer', 14, 36, 37, 'AccountingEntries', 'subGodownTransfer', '', 'N', '', ''),
(18, 'Godown Requests', 14, 38, 39, 'AccountingEntries', 'godownRequest', '', 'N', '', ''),
(19, 'Plant Production', 14, 40, 41, 'Plants', 'add', '', 'N', '', ''),
(20, 'Transport', 14, 42, 47, '', '', '', 'N', '', ''),
(21, 'Add', 20, 43, 44, 'Transports', 'add', '', 'N', '', ''),
(22, 'Report', 20, 45, 46, 'Transports', 'index', '', 'N', '', ''),
(23, 'Sub Godown', NULL, 51, 60, '', '', 'icon-pointer', 'N', '', ''),
(24, 'Village Transfer', 23, 52, 53, 'AccountingEntries', 'villageTransfer', '', 'N', '', ''),
(25, 'Godown Transfer', 23, 54, 55, 'AccountingEntries', 'mainGodownTransfer', '', 'N', '', ''),
(26, 'Village Requests', 23, 56, 57, 'Godowns', 'villageRequest', '', 'N', '', ''),
(27, 'Request For Product', 23, 58, 59, 'AccountingEntries', 'addProductRequest', '', 'N', '', ''),
(28, 'Users', NULL, 61, 82, '', '', 'icon-users', 'N', '', ''),
(29, 'Create', 28, 62, 63, 'Employees', 'createUser', '', 'N', '', ''),
(30, 'View Report', 28, 64, 71, '', '', '', 'N', '', ''),
(31, 'Employees', 30, 65, 66, 'Employees', 'index', '', 'N', '', ''),
(32, 'Vendors', 30, 67, 68, 'Vendors', 'index', '', 'N', '', ''),
(33, 'Assign To Village', 28, 72, 81, '', '', '', 'N', '', ''),
(34, 'Project Employees', 33, 73, 74, 'Villages', 'addEmployee', '', 'N', '', ''),
(35, 'Vendors', 33, 75, 76, 'Villages', 'addVendor', '', 'N', '', ''),
(36, 'Department Officers', 33, 77, 78, 'Villages', 'addDo', '', 'N', '', ''),
(37, 'O&M', 33, 79, 80, 'Villages', 'addOm', '', 'N', '', ''),
(38, 'Project Menus', NULL, 83, 105, '', '', 'fa fa-gear', 'N', '', ''),
(39, 'States', 38, 84, 85, 'States', 'index', '', 'N', '', ''),
(40, 'Districts', 38, 86, 87, 'Districts', 'index', '', 'N', '', ''),
(41, 'Blocks', 38, 88, 89, 'Blocks', 'index', '', 'N', '', ''),
(42, 'Divisions', 38, 90, 91, 'Divisions', 'index', '', 'N', '', ''),
(43, 'Gram Panchayat', 38, 92, 93, 'GramPanchayats', 'index', '', 'N', '', ''),
(44, 'Department Officers', 38, 94, 95, 'DepartmentOfficers', 'index', '', 'N', '', ''),
(45, 'Add Village', 38, 96, 97, 'Villages', 'add', '', 'N', '', ''),
(46, 'View Village', 38, 98, 99, 'Villages', 'index', '', 'N', '', ''),
(47, 'Add Operator', 38, 103, 104, 'Employees', 'createOperator', '', 'N', '', ''),
(48, 'View Operators', 38, 102, 105, 'Operators', 'index', '', 'N', '', ''),
(49, 'Stock Report', 14, 48, 49, 'AccountingEntries', 'stockReport', '', 'N', '', ''),
(50, 'Vehicle Master', 2, 26, 27, 'VehicleMasters', 'index', '', 'N', '', ''),
(51, 'MLA Constituencies', 38, 100, 101, 'MlaConstituencies', 'index', '', 'N', '', ''),
(52, 'Portal Users', 2, 28, 29, 'PortalUsers', 'add', '', 'N', '', ''),
(53, 'Report', NULL, 106, 109, '', '', 'fa fa-book', 'N', '', ''),
(54, 'Project', 53, 107, 108, 'Projects', 'report', '', 'N', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
