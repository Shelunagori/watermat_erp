

CREATE TABLE `accounting_entries` (
  `id` int(11) NOT NULL,
  `godown_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT '1.00',
  `transaction_date` date NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `status` enum('IN','OUT') NOT NULL,
  `refer_to` enum('purchase','godown','village','plant') NOT NULL,
  `receive_godown_id` int(11) DEFAULT NULL,
  `village_id` int(11) DEFAULT NULL,
  `plant_id` int(11) DEFAULT NULL,
  `village_request_id` int(11) DEFAULT NULL,
  `sub_godown_request_id` int(11) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounting_entries`
--

INSERT INTO `accounting_entries` (`id`, `godown_id`, `product_id`, `brand_name`, `quantity`, `transaction_date`, `vendor_id`, `status`, `refer_to`, `receive_godown_id`, `village_id`, `plant_id`, `village_request_id`, `sub_godown_request_id`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 1, 1, NULL, '2.00', '2019-03-01', NULL, 'IN', 'purchase', NULL, NULL, NULL, NULL, NULL, '2019-03-07 09:30:29', 1, NULL, NULL, 0),
(2, 1, 2, NULL, '5.00', '2019-03-05', 4, 'IN', 'purchase', NULL, NULL, NULL, NULL, NULL, '2019-03-07 09:32:23', 1, NULL, NULL, 0),
(3, 1, 3, NULL, '100.00', '2019-03-05', NULL, 'IN', 'purchase', NULL, NULL, NULL, NULL, NULL, '2019-03-07 09:32:23', 1, NULL, NULL, 0),
(26, 1, 1, NULL, '1.00', '2019-03-15', NULL, 'OUT', 'godown', 2, NULL, NULL, NULL, NULL, '2019-03-16 12:36:58', 1, NULL, NULL, 0),
(27, 1, 2, NULL, '2.00', '2019-03-15', NULL, 'OUT', 'godown', 2, NULL, NULL, NULL, NULL, '2019-03-16 12:36:58', 1, NULL, NULL, 0),
(28, 2, 1, NULL, '1.00', '2019-03-15', NULL, 'IN', 'godown', NULL, NULL, NULL, NULL, NULL, '2019-03-16 12:36:59', 1, NULL, NULL, 0),
(29, 2, 2, NULL, '2.00', '2019-03-15', NULL, 'IN', 'godown', NULL, NULL, NULL, NULL, NULL, '2019-03-16 12:36:59', 1, NULL, NULL, 0),
(30, 1, 1, NULL, '2.00', '2019-03-21', NULL, 'IN', 'purchase', NULL, NULL, NULL, NULL, NULL, '2019-03-21 11:23:09', 1, NULL, NULL, 0),
(31, 1, 2, NULL, '3.00', '2019-03-21', NULL, 'IN', 'purchase', NULL, NULL, NULL, NULL, NULL, '2019-03-21 11:32:37', 1, NULL, NULL, 0),
(32, 1, 2, NULL, '2.00', '2019-03-15', NULL, 'OUT', 'godown', 2, NULL, NULL, NULL, NULL, '2019-03-23 05:08:22', 1, NULL, NULL, 0),
(33, 2, 2, NULL, '2.00', '2019-03-15', NULL, 'IN', 'godown', NULL, NULL, NULL, NULL, NULL, '2019-03-23 05:08:22', 1, NULL, NULL, 0),
(34, 2, 2, NULL, '1.00', '2019-03-21', NULL, 'OUT', 'godown', 1, NULL, NULL, NULL, NULL, '2019-03-23 05:13:17', 1, NULL, NULL, 0),
(35, 1, 2, NULL, '1.00', '2019-03-21', NULL, 'IN', 'godown', NULL, NULL, NULL, NULL, NULL, '2019-03-23 05:13:17', 1, NULL, NULL, 0),
(36, 1, 1, NULL, '2.00', '2019-03-23', NULL, 'OUT', 'plant', NULL, NULL, 4, NULL, NULL, '2019-03-23 07:36:12', 1, NULL, NULL, 0),
(37, 1, 3, NULL, '20.00', '2019-03-23', NULL, 'OUT', 'plant', NULL, NULL, 4, NULL, NULL, '2019-03-23 07:36:12', 1, NULL, NULL, 0),
(38, 1, 2, NULL, '1.00', '2019-03-23', NULL, 'OUT', 'plant', NULL, NULL, 4, NULL, NULL, '2019-03-23 07:36:12', 1, NULL, NULL, 0),
(39, 1, 3, NULL, '50.00', '2019-03-23', NULL, 'OUT', 'plant', NULL, NULL, 5, NULL, NULL, '2019-03-23 07:52:42', 1, NULL, NULL, 0),
(40, 2, 2, NULL, '1.00', '2019-03-25', NULL, 'OUT', 'godown', 1, NULL, NULL, NULL, NULL, '2019-03-25 04:29:43', 1, NULL, NULL, 0),
(41, 1, 2, NULL, '1.00', '2019-03-25', NULL, 'IN', 'godown', NULL, NULL, NULL, NULL, NULL, '2019-03-25 04:29:43', 1, NULL, NULL, 0),
(42, 1, 1, NULL, '3.00', '2019-04-03', NULL, 'IN', 'purchase', NULL, NULL, NULL, NULL, NULL, '2019-04-02 06:19:17', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `accounting_serials`
--

CREATE TABLE `accounting_serials` (
  `id` int(11) NOT NULL,
  `accounting_entry_id` int(11) NOT NULL,
  `serial_no` varchar(50) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounting_serials`
--

INSERT INTO `accounting_serials` (`id`, `accounting_entry_id`, `serial_no`, `purchase_date`, `expiry_date`, `brand_name`, `vendor_id`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 1, '201', '2019-02-01', '2019-03-03', NULL, NULL, '2019-03-07 09:30:29', 1, NULL, NULL, 0),
(2, 1, '202', '2019-02-26', '2019-03-28', NULL, NULL, '2019-03-07 09:30:29', 1, NULL, NULL, 0),
(3, 2, '101', '2019-01-01', '2019-06-30', NULL, NULL, '2019-03-07 09:32:23', 1, NULL, NULL, 0),
(4, 2, '102', '2019-01-01', '2019-06-30', NULL, NULL, '2019-03-07 09:32:23', 1, NULL, NULL, 0),
(5, 2, '103', '2019-01-10', '2019-07-09', NULL, NULL, '2019-03-07 09:32:23', 1, NULL, NULL, 0),
(6, 2, '104', '2019-01-10', '2019-07-09', NULL, NULL, '2019-03-07 09:32:23', 1, NULL, NULL, 0),
(7, 2, '105', '2019-01-10', '2019-07-09', NULL, NULL, '2019-03-07 09:32:23', 1, NULL, NULL, 0),
(27, 26, '201', '2019-02-01', '2019-03-03', NULL, NULL, '2019-03-16 12:36:58', 1, NULL, NULL, 0),
(28, 27, '101', '2019-01-01', '2019-06-30', NULL, NULL, '2019-03-16 12:36:58', 1, NULL, NULL, 0),
(29, 27, '102', '2019-01-01', '2019-06-30', NULL, NULL, '2019-03-16 12:36:58', 1, NULL, NULL, 0),
(30, 28, '201', '2019-02-01', '2019-03-03', NULL, NULL, '2019-03-16 12:36:59', 1, NULL, NULL, 0),
(31, 29, '101', '2019-01-01', '2019-06-30', NULL, NULL, '2019-03-16 12:36:59', 1, NULL, NULL, 0),
(32, 29, '102', '2019-01-01', '2019-06-30', NULL, NULL, '2019-03-16 12:36:59', 1, NULL, NULL, 0),
(33, 30, '204', '2019-03-01', '2019-03-31', NULL, NULL, '2019-03-21 11:23:09', 1, NULL, NULL, 0),
(34, 30, '205', '2019-02-24', '2019-03-26', NULL, NULL, '2019-03-21 11:23:09', 1, NULL, NULL, 0),
(35, 31, '111', '2019-02-27', '2019-08-26', 'sitaram', 2, '2019-03-21 11:32:37', 1, NULL, NULL, 0),
(36, 31, '112', '2019-02-28', '2019-08-27', 'sitaram', NULL, '2019-03-21 11:32:37', 1, NULL, NULL, 0),
(37, 31, '113', '2019-03-13', '2019-09-09', 'sitaram', 3, '2019-03-21 11:32:37', 1, NULL, NULL, 0),
(38, 32, '111', '2019-02-27', '2019-08-26', 'sitaram', 2, '2019-03-23 05:08:22', 1, NULL, NULL, 0),
(39, 32, '112', '2019-02-28', '2019-08-27', 'sitaram', NULL, '2019-03-23 05:08:22', 1, NULL, NULL, 0),
(40, 33, '111', '2019-02-27', '2019-08-26', 'sitaram', 2, '2019-03-23 05:08:22', 1, NULL, NULL, 0),
(41, 33, '112', '2019-02-28', '2019-08-27', 'sitaram', NULL, '2019-03-23 05:08:22', 1, NULL, NULL, 0),
(42, 34, '111', NULL, NULL, NULL, NULL, '2019-03-23 05:13:17', 1, NULL, NULL, 0),
(43, 35, '111', NULL, NULL, NULL, NULL, '2019-03-23 05:13:17', 1, NULL, NULL, 0),
(44, 36, '202', NULL, NULL, NULL, NULL, '2019-03-23 07:36:12', 1, NULL, NULL, 0),
(45, 36, '204', NULL, NULL, NULL, NULL, '2019-03-23 07:36:12', 1, NULL, NULL, 0),
(46, 38, '103', NULL, NULL, NULL, NULL, '2019-03-23 07:36:12', 1, NULL, NULL, 0),
(47, 40, '112', '2019-02-28', '2019-08-27', 'sitaram', NULL, '2019-03-25 04:29:43', 1, NULL, NULL, 0),
(48, 41, '112', '2019-02-28', '2019-08-27', 'sitaram', NULL, '2019-03-25 04:29:43', 1, NULL, NULL, 0),
(49, 42, '555', '2019-04-01', '2019-05-01', 'brand', 2, '2019-04-02 06:19:17', 1, NULL, NULL, 0),
(50, 42, '556', '2019-04-01', '2019-05-01', 'brand', NULL, '2019-04-02 06:19:17', 1, NULL, NULL, 0),
(51, 42, '557', '2019-04-01', '2019-05-01', 'brand', NULL, '2019-04-02 06:19:17', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `api_versions`
--

CREATE TABLE `api_versions` (
  `id` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `forcefully_update` int(11) DEFAULT '0',
  `cdnPath` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_versions`
--

INSERT INTO `api_versions` (`id`, `version`, `forcefully_update`, `cdnPath`) VALUES
(1, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` int(11) NOT NULL,
  `village_work_id` int(11) NOT NULL,
  `billing_question_id` int(11) NOT NULL,
  `answer` enum('Yes','No') DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `village_work_id`, `billing_question_id`, `answer`, `date`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, 11, 1, 'No', NULL, 1, '2019-03-05 12:30:10', NULL, NULL, 0),
(2, 11, 2, 'No', NULL, 1, '2019-03-05 12:30:10', NULL, NULL, 0),
(3, 22, 1, 'No', NULL, 1, '2019-03-05 12:30:20', NULL, NULL, 0),
(4, 22, 2, 'No', NULL, 1, '2019-03-05 12:30:20', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `billing_questions`
--

CREATE TABLE `billing_questions` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_questions`
--

INSERT INTO `billing_questions` (`id`, `name`) VALUES
(1, 'Water Test Reports Collected From Department'),
(2, 'Bill, GPS Photo, Water Test Report, RMS Report, WTPL Bank Details Submitted For Payment');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `project_id`, `division_id`, `name`, `image`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 1, 1, 'Block A', NULL, '2019-01-29 05:25:25', 1, '2019-02-13 09:52:29', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `civils`
--

CREATE TABLE `civils` (
  `id` int(11) NOT NULL,
  `village_work_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commissionings`
--

CREATE TABLE `commissionings` (
  `id` int(11) NOT NULL,
  `village_work_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_officers`
--

CREATE TABLE `department_officers` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `do_post_id` int(11) NOT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `image` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_officers`
--

INSERT INTO `department_officers` (`id`, `project_id`, `name`, `do_post_id`, `contact_no`, `email`, `dob`, `image`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 1, 'Vishvas', 1, '9988776655', 'ace@gmail.com', '1982-01-02', '/documents/f63804fbf2042692f1afe53ab2bfab91.jpg1548955576.jpg', '2019-01-31 17:26:17', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `project_id`, `state_id`, `name`, `image`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 1, 1, 'Udaipur', NULL, '2019-01-29 05:20:17', 1, '2019-02-13 09:52:47', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `project_id`, `district_id`, `name`, `image`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 1, 1, 'D1', NULL, '2019-01-29 05:25:38', 1, '2019-02-13 09:53:04', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `do_posts`
--

CREATE TABLE `do_posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `do_posts`
--

INSERT INTO `do_posts` (`id`, `name`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, 'ACE', NULL, NULL, 1, NULL, 0),
(2, 'SE', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `do_villages`
--

CREATE TABLE `do_villages` (
  `id` int(11) NOT NULL,
  `do_post_id` int(11) NOT NULL,
  `department_officer_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `do_villages`
--

INSERT INTO `do_villages` (`id`, `do_post_id`, `department_officer_id`, `village_id`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(4, 1, 1, 4, 1, '2019-02-07 06:42:31', 1, '2019-02-18 05:46:41', 0),
(6, 2, 1, 4, 1, '2019-02-18 05:46:15', NULL, NULL, 0),
(7, 2, 1, 5, 1, '2019-02-18 05:46:15', NULL, NULL, 0),
(8, 1, 1, 5, 1, '2019-02-18 05:46:43', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_designation_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_of_joining` date NOT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `employee_code` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `work_location` enum('Field','Office','Admin') NOT NULL,
  `sub_location` varchar(50) DEFAULT NULL,
  `pf` varchar(100) DEFAULT NULL,
  `kyc` varchar(100) DEFAULT NULL,
  `image` text NOT NULL,
  `address` text,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(11) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `adhar_card` text,
  `dl` text,
  `pan_card` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_designation_id`, `name`, `date_of_joining`, `contact_no`, `email`, `employee_code`, `latitude`, `longitude`, `grade`, `dob`, `work_location`, `sub_location`, `pf`, `kyc`, `image`, `address`, `account_holder_name`, `bank`, `account_no`, `ifsc_code`, `branch`, `adhar_card`, `dl`, `pan_card`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 3, 'Admin', '2019-01-15', '1234567890', 'admin@gmail.com', '111', '11211', '1231321', 'A', '1999-02-06', 'Admin', NULL, NULL, NULL, '/documents/f63804fbf2042692f1afe53ab2bfab91.jpg1548867908.jpg', 'udaipur', '', NULL, '', '', '', '', '', '', '2019-01-30 17:05:08', 1, NULL, NULL, 0),
(2, 4, 'Ram', '2018-12-04', '5432154321', 'ram@gmail.com', '444', '112233', '445566', 'A', '1990-01-22', 'Field', NULL, NULL, NULL, '/documents/f63804fbf2042692f1afe53ab2bfab91.jpg1548908299.jpg', 'udaipur', '', NULL, '', '', '', '', '', '', '2019-01-31 04:18:19', 1, '2019-02-07 10:41:54', NULL, 0),
(3, 4, 'Shyam', '2018-12-13', '1122334455', 'shyam@gmail.com', '555', '123456', '654321', 'B', '1995-08-22', 'Field', NULL, NULL, NULL, '/documents/f63804fbf2042692f1afe53ab2bfab91.jpg1548908521.jpg', 'chittod', '', NULL, '', '', '', '', '', '', '2019-01-31 04:22:01', 1, '2019-01-31 04:56:31', 1, 0),
(4, 4, 'Sohan', '2012-01-06', '1111111111', 'sohan@gmail.com', '564', '11', '123644', 'A', '1990-10-18', 'Field', NULL, NULL, NULL, '/documents/f63804fbf2042692f1afe53ab2bfab91.jpg1548916182.jpg', 'chittod', 'sohan', 'Bank of baroda', '123654789987645', 'BARB0BHEELO', 'udaipur', '', '', '', '2019-01-31 06:29:42', 1, '2019-02-07 18:42:25', 1, 0),
(5, 4, 'Mohan', '2005-03-01', '1010101010', 'mohan@gmail.com', '1245783', '245545', '54564', 'A', '2013-03-01', 'Field', NULL, NULL, NULL, '', 'jkhgjk', '', '', '', '', '', '', '', '', '2019-03-01 06:30:14', 6, NULL, NULL, 0),
(6, 4, 'Rani', '2008-03-01', '1515151515', 'rani@gmail.com', '5646', '5645646', '456456', 'F', '2014-03-01', 'Field', NULL, NULL, NULL, '', 'kjhk', '', '', '', '', '', '', '', '', '2019-03-01 06:31:06', 6, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_designations`
--

CREATE TABLE `employee_designations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_designations`
--

INSERT INTO `employee_designations` (`id`, `name`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(3, 'Admin', '2019-01-24 12:28:53', 0, '2019-01-31 06:14:15', 1, 0),
(4, 'Field', '2019-01-24 12:29:07', 0, NULL, NULL, 0),
(5, 'Office', '2019-01-24 12:29:19', 0, NULL, NULL, 0),
(6, 'Manager', '2019-04-02 06:33:24', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_villages`
--

CREATE TABLE `employee_villages` (
  `id` int(11) NOT NULL,
  `designation` enum('Manager','Technician') NOT NULL,
  `employee_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_villages`
--

INSERT INTO `employee_villages` (`id`, `designation`, `employee_id`, `village_id`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(7, 'Manager', 3, 4, 1, '2019-02-07 06:42:31', NULL, NULL, 0),
(8, 'Technician', 4, 4, 1, '2019-02-07 06:42:31', NULL, NULL, 0),
(9, 'Manager', 4, 5, 1, '2019-02-16 09:39:33', NULL, NULL, 0),
(11, 'Manager', 2, 5, 1, '2019-02-16 12:13:14', NULL, NULL, 0),
(12, 'Manager', 2, 4, 1, '2019-04-01 07:17:08', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `glow_sign_boards`
--

CREATE TABLE `glow_sign_boards` (
  `id` int(11) NOT NULL,
  `village_work_id` int(11) NOT NULL,
  `is_received` tinyint(1) DEFAULT '0',
  `remark` text,
  `image` text,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `godowns`
--

CREATE TABLE `godowns` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT '0',
  `image` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `godowns`
--

INSERT INTO `godowns` (`id`, `name`, `state`, `district`, `city`, `area`, `employee_id`, `is_main`, `image`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'Main', 'Rajasthan', 'Udaipur', 'Udaipur', 'Sevasharm', 1, 1, '', '2019-03-05 10:33:06', 1, '2019-03-05 10:37:23', 1, 0),
(2, 'Chittod', 'Rajasthan', 'Chittod', 'Chittod', 'xyz', 6, 0, NULL, '2019-03-09 12:26:19', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `godown_villages`
--

CREATE TABLE `godown_villages` (
  `id` int(11) NOT NULL,
  `godown_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `godown_villages`
--

INSERT INTO `godown_villages` (`id`, `godown_id`, `village_id`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, 2, 4, 1, '2019-03-09 12:31:29', NULL, NULL, 0),
(2, 2, 5, 1, '2019-03-09 12:31:29', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gram_panchayats`
--

CREATE TABLE `gram_panchayats` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gram_panchayats`
--

INSERT INTO `gram_panchayats` (`id`, `project_id`, `block_id`, `name`, `image`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 1, 1, 'G1', '', '2019-02-01 05:26:47', 1, '2019-02-08 05:52:47', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `installations`
--

CREATE TABLE `installations` (
  `id` int(11) NOT NULL,
  `village_work_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `model` text NOT NULL,
  `updated_field` text NOT NULL,
  `old_value` text,
  `new_value` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `model`, `updated_field`, `old_value`, `new_value`, `created_on`, `created_by`) VALUES
(1, 'OmScheduleForms', 'remark', '', 'testing', '2019-03-27 04:30:47', 10),
(2, 'OmScheduleForms', 'remark', '', 'testing', '2019-03-27 05:23:13', 10),
(3, 'OmScheduleForms', 'remark', '', 'ycivhob', '2019-03-27 05:23:30', 10),
(4, 'VillageRequests', 'status', 'pending', 'sent', '2019-03-28 12:29:42', 1),
(5, 'VillageRequests', 'status', 'pending', 'sent', '2019-03-28 12:30:26', 1),
(6, 'VillageRequests', 'status', 'pending', 'sent', '2019-03-28 12:31:19', 1),
(7, 'VillageRequests', 'status', 'pending', 'sent', '2019-03-28 12:33:09', 1),
(8, 'Transports', 'receipt', 'documents/2017-12-10-13-04-12-756.jpg1553946910.jpg', 'documents/activity diagram.png1553947266.png', '2019-03-30 12:01:06', 1);

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
(2, 'Admin Master', NULL, 3, 28, '', '', 'icon-settings', 'N', '', ''),
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
(14, 'Office', NULL, 29, 48, '', '', 'icon-user', 'N', '', ''),
(15, 'Products', 14, 30, 31, 'Products', 'index', '', 'N', '', ''),
(16, 'Item In', 14, 32, 33, 'AccountingEntries', 'add', '', 'N', '', ''),
(17, 'Sub Godown Transfer', 14, 34, 35, 'AccountingEntries', 'subGodownTransfer', '', 'N', '', ''),
(18, 'Godown Requests', 14, 36, 37, 'AccountingEntries', 'godownRequest', '', 'N', '', ''),
(19, 'Plant Production', 14, 38, 39, 'Plants', 'add', '', 'N', '', ''),
(20, 'Transport', 14, 40, 45, '', '', '', 'N', '', ''),
(21, 'Add', 20, 41, 42, 'Transports', 'add', '', 'N', '', ''),
(22, 'Report', 20, 43, 44, 'Transports', 'index', '', 'N', '', ''),
(23, 'Sub Godown', NULL, 49, 58, '', '', 'icon-pointer', 'N', '', ''),
(24, 'Village Transfer', 23, 50, 51, 'AccountingEntries', 'villageTransfer', '', 'N', '', ''),
(25, 'Godown Transfer', 23, 52, 53, 'AccountingEntries', 'mainGodownTransfer', '', 'N', '', ''),
(26, 'Village Requests', 23, 54, 55, 'Godowns', 'villageRequest', '', 'N', '', ''),
(27, 'Request For Product', 23, 56, 57, 'AccountingEntries', 'addProductRequest', '', 'N', '', ''),
(28, 'Users', NULL, 59, 80, '', '', 'icon-users', 'N', '', ''),
(29, 'Create', 28, 60, 61, 'Employees', 'createUser', '', 'N', '', ''),
(30, 'View Report', 28, 62, 69, '', '', '', 'N', '', ''),
(31, 'Employees', 30, 63, 64, 'Employees', 'index', '', 'N', '', ''),
(32, 'Vendors', 30, 65, 66, 'Vendors', 'index', '', 'N', '', ''),
(33, 'Operators', 30, 67, 68, 'Operators', 'index', '', 'N', '', ''),
(34, 'Assign To Village', 28, 70, 79, '', '', '', 'N', '', ''),
(35, 'Project Employees', 34, 71, 72, 'Villages', 'addEmployee', '', 'N', '', ''),
(36, 'Vendors', 34, 73, 74, 'Villages', 'addVendor', '', 'N', '', ''),
(37, 'Department Officers', 34, 75, 76, 'Villages', 'addDo', '', 'N', '', ''),
(38, 'O&M', 34, 77, 78, 'Villages', 'addOm', '', 'N', '', ''),
(39, 'Masters', NULL, 81, 100, '', '', 'fa fa-gear', 'N', '', ''),
(40, 'States', 39, 82, 83, 'States', 'index', '', 'N', '', ''),
(41, 'Districts', 39, 84, 85, 'Districts', 'index', '', 'N', '', ''),
(42, 'Blocks', 39, 86, 87, 'Blocks', 'index', '', 'N', '', ''),
(43, 'Divisions', 39, 88, 89, 'Divisions', 'index', '', 'N', '', ''),
(44, 'Gram Panchayat', 39, 90, 91, 'GramPanchayats', 'index', '', 'N', '', ''),
(45, 'Department Officers', 39, 92, 93, 'DepartmentOfficers', 'index', '', 'N', '', ''),
(46, 'Add Village', 39, 94, 95, 'Villages', 'add', '', 'N', '', ''),
(47, 'View Village', 39, 96, 97, 'Villages', 'index', '', 'N', '', ''),
(48, 'Stock Report', 14, 46, 47, 'AccountingEntries', 'stockReport', '', 'N', '', ''),
(49, 'Vehicle Master', 2, 26, 27, 'VehicleMasters', 'index', '', 'N', '', ''),
(50, 'MLA Constituencies', 39, 98, 99, 'MlaConstituencies', 'index', '', 'N', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mla_constituencies`
--

CREATE TABLE `mla_constituencies` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mla_constituencies`
--

INSERT INTO `mla_constituencies` (`id`, `project_id`, `block_id`, `name`, `image`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 1, 1, 'Constituency 1 ', '', '2019-02-08 11:51:13', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `om_employees`
--

CREATE TABLE `om_employees` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `technician_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `om_employees`
--

INSERT INTO `om_employees` (`id`, `village_id`, `technician_id`, `manager_id`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, 4, 5, 6, 1, '2019-03-05 12:35:06', 1, '2019-03-05 12:35:18', 0),
(2, 5, 5, 6, 1, '2019-03-05 12:35:06', 1, '2019-03-05 12:35:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `om_schedules`
--

CREATE TABLE `om_schedules` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `visited_on` date DEFAULT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT '0',
  `is_verify` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `om_schedules`
--

INSERT INTO `om_schedules` (`id`, `village_id`, `visit_date`, `visited_on`, `is_complete`, `is_verify`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, 4, '2019-03-13', '2019-03-27', 1, 1, 1, '2019-03-05 12:35:58', NULL, '2019-03-27 05:23:13', 0),
(2, 5, '2019-03-15', '2019-03-27', 1, 1, 1, '2019-03-05 12:35:58', NULL, '2019-03-27 05:23:30', 0),
(3, 4, '2019-04-06', NULL, 0, 0, 0, '2019-03-27 05:00:58', NULL, NULL, 0),
(4, 5, '2019-04-06', NULL, 0, 0, 0, '2019-03-27 05:22:48', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `om_schedule_forms`
--

CREATE TABLE `om_schedule_forms` (
  `id` int(11) NOT NULL,
  `om_schedule_id` int(11) NOT NULL,
  `plant_status` enum('Operational','Non Operational') NOT NULL,
  `plant_service` enum('Yes','No') NOT NULL,
  `reason` text,
  `treated_water_flow` decimal(15,2) NOT NULL,
  `twf_image` text NOT NULL,
  `reject_flow` decimal(15,2) NOT NULL,
  `reject_image` text NOT NULL,
  `dosing` enum('Yes','No') NOT NULL,
  `card_issued` int(11) NOT NULL,
  `card_amount` decimal(15,2) NOT NULL,
  `recharge` decimal(15,2) NOT NULL,
  `card_operator` int(11) NOT NULL,
  `amount_collected` decimal(15,2) NOT NULL,
  `amount_operator` decimal(15,2) NOT NULL,
  `ro_meter_reading` int(11) NOT NULL,
  `ro_image` text NOT NULL,
  `remark` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `om_schedule_forms`
--

INSERT INTO `om_schedule_forms` (`id`, `om_schedule_id`, `plant_status`, `plant_service`, `reason`, `treated_water_flow`, `twf_image`, `reject_flow`, `reject_image`, `dosing`, `card_issued`, `card_amount`, `recharge`, `card_operator`, `amount_collected`, `amount_operator`, `ro_meter_reading`, `ro_image`, `remark`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(2, 1, 'Operational', 'Yes', NULL, '12.20', 'documents/Capture.PNG1553662812.PNG', '13.20', 'documents/activity diagram.png1553662812.PNG', 'Yes', 100, '5000.00', '2000.00', 50, '10000.00', '0.00', 150, 'documents/Capture.PNG1553662812.PNG', 'testing', '2019-03-27 05:00:21', 3, '2019-03-27 05:23:13', 10, 0),
(3, 2, 'Operational', 'Yes', '', '5.00', 'documents/twf_image.png1553664161.PNG', '6.00', 'documents/reject_image.png1553664161.PNG', 'Yes', 6, '500.00', '255.00', 22, '3695.00', '356.00', 63, 'documents/ro_image.png1553664161.PNG', 'ycivhob', '2019-03-27 05:22:41', 10, '2019-03-27 05:23:30', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `om_schedule_masters`
--

CREATE TABLE `om_schedule_masters` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `om_schedule_masters`
--

INSERT INTO `om_schedule_masters` (`id`, `village_id`, `days`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 4, 10, '2019-02-27 11:45:08', 1, NULL, NULL, 0),
(2, 5, 10, '2019-02-27 11:45:08', 1, '2019-02-27 12:15:53', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `aadhar_number` varchar(12) NOT NULL,
  `pan_number` varchar(10) DEFAULT NULL,
  `date_of_appointment` date NOT NULL,
  `pf` varchar(100) DEFAULT NULL,
  `kyc` varchar(100) DEFAULT NULL,
  `salary_paid_upto` date DEFAULT NULL,
  `incentive_plan_id` int(11) DEFAULT NULL,
  `image` text NOT NULL,
  `id_proof` text,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(11) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `village_id`, `name`, `father_name`, `contact_no`, `qualification`, `aadhar_number`, `pan_number`, `date_of_appointment`, `pf`, `kyc`, `salary_paid_upto`, `incentive_plan_id`, `image`, `id_proof`, `account_holder_name`, `bank`, `account_no`, `ifsc_code`, `branch`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 5, 'Ronak', 'mukesh', '9672714646', 'MBA', '123412341234', '123ABCV123', '2019-01-23', NULL, NULL, '2018-04-04', NULL, 'documents/f63804fbf2042692f1afe53ab2bfab91.jpg1553755496.JPG', 'documents/Capture.PNG1553755496.PNG', 'ronak', 'sbi', '123456789', 'sbin00001', 'udaipur', '2019-03-28 06:44:56', 1, '2019-03-28 07:02:01', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` int(11) NOT NULL,
  `village_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `complete_date` date DEFAULT NULL,
  `is_received` tinyint(1) NOT NULL DEFAULT '0',
  `image` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `village_id`, `name`, `vendor_id`, `start_date`, `complete_date`, `is_received`, `image`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(4, 4, 'PLANT-001', 4, '2019-03-21', '2019-03-23', 0, NULL, '2019-03-23 07:36:12', 1, '2019-03-30 11:09:56', 1, 0),
(5, NULL, 'PLANT-002', 4, '2019-04-06', NULL, 0, NULL, '2019-03-23 07:52:42', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plant_receives`
--

CREATE TABLE `plant_receives` (
  `id` int(11) NOT NULL,
  `village_work_id` int(11) NOT NULL,
  `damages_visible` text,
  `is_received` tinyint(1) DEFAULT '0',
  `remark` text,
  `image` text,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `portals`
--

CREATE TABLE `portals` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portals`
--

INSERT INTO `portals` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Office'),
(3, 'Sub Godown'),
(4, 'Porject');

-- --------------------------------------------------------

--
-- Table structure for table `portal_users`
--

CREATE TABLE `portal_users` (
  `id` int(11) NOT NULL,
  `portal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portal_users`
--

INSERT INTO `portal_users` (`id`, `portal_id`, `user_id`) VALUES
(1, 1, 1),
(3, 2, 1),
(4, 3, 2),
(5, 2, 3),
(6, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `warranty_days` int(11) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `image` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `product_category_id`, `warranty_days`, `unit_id`, `image`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'Test', 1, 30, 2, '', '2019-03-05 10:03:45', 1, '2019-03-07 05:28:38', 1, 0),
(2, 'Test2', 2, 180, 2, NULL, '2019-03-07 04:21:58', 1, NULL, NULL, 0),
(3, 'Pipe', 1, NULL, 5, NULL, '2019-03-07 06:27:23', 1, NULL, NULL, 0),
(4, 'Screws & Bolts', 2, NULL, 1, NULL, '2019-03-07 11:53:29', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'Main Product', '2019-03-05 09:38:23', NULL, '2019-03-05 09:38:52', NULL, 0),
(2, 'Component', '2019-03-05 09:38:23', NULL, '2019-03-05 09:38:54', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `project_number` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `project_number`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'Udaipur', '355', '2019-01-31 06:35:52', 1, '2019-04-01 10:06:29', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_employees`
--

CREATE TABLE `project_employees` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `designation` enum('Manager','Technician') NOT NULL DEFAULT 'Manager',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_employees`
--

INSERT INTO `project_employees` (`id`, `project_id`, `employee_id`, `designation`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 1, 2, 'Manager', '2019-01-31 06:35:53', 1, NULL, NULL, 0),
(2, 1, 3, 'Manager', '2019-01-31 06:35:53', 1, NULL, NULL, 0),
(3, 1, 4, 'Technician', '2019-01-31 06:35:53', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `punch_attendances`
--

CREATE TABLE `punch_attendances` (
  `id` int(11) NOT NULL,
  `start_points` text NOT NULL,
  `end_points` text NOT NULL,
  `distance` decimal(6,2) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `price_pr_km` decimal(6,2) NOT NULL,
  `travel_from` varchar(50) DEFAULT NULL,
  `travel_to` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('complete','cancel') NOT NULL DEFAULT 'complete',
  `comment` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `punch_attendances`
--

INSERT INTO `punch_attendances` (`id`, `start_points`, `end_points`, `distance`, `vehicle`, `price_pr_km`, `travel_from`, `travel_to`, `user_id`, `status`, `comment`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, '11,22', '33,44', '2.20', 'bus', '5.00', '', '', 1, 'complete', NULL, '2019-03-30 04:36:30', 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shelters`
--

CREATE TABLE `shelters` (
  `id` int(11) NOT NULL,
  `village_work_id` int(11) NOT NULL,
  `delivered` tinyint(1) DEFAULT '0',
  `delivered_date` date DEFAULT NULL,
  `installation_started` tinyint(1) DEFAULT '0',
  `installation_start_date` date DEFAULT NULL,
  `installation_complete` tinyint(1) DEFAULT '0',
  `installation_complete_date` date DEFAULT NULL,
  `canopy_installed` tinyint(1) DEFAULT '0',
  `canopy_installed_date` date DEFAULT NULL,
  `image` text,
  `invoice_image` text,
  `is_complete` tinyint(1) DEFAULT '0',
  `is_verified` tinyint(1) DEFAULT '0',
  `verified_by` int(11) DEFAULT NULL,
  `damages_visible` text,
  `verify_remark` text,
  `verify_image` text,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_selections`
--

CREATE TABLE `site_selections` (
  `id` int(11) NOT NULL,
  `village_work_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `gps_co_ordinates` text,
  `lendmark` varchar(255) DEFAULT NULL,
  `gram_panchayat_id` int(11) DEFAULT NULL,
  `mla_constituency_id` int(11) DEFAULT NULL,
  `sarpanch` varchar(50) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `borewell_available` enum('Yes','No') DEFAULT NULL,
  `borewell_distance` varchar(255) DEFAULT NULL,
  `borewell_unit` varchar(50) DEFAULT NULL,
  `electricity_available` enum('Yes','No') DEFAULT NULL,
  `electricity_distance` varchar(255) DEFAULT NULL,
  `electricity_unit` varchar(50) DEFAULT NULL,
  `moter_lowered` enum('Yes','No') DEFAULT NULL,
  `moter_distance` varchar(255) DEFAULT NULL,
  `moter_unit` varchar(50) DEFAULT NULL,
  `raw_water_tds` varchar(255) DEFAULT NULL,
  `obstacle` text,
  `image` text,
  `remark` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_complete` tinyint(1) NOT NULL DEFAULT '0',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_by` int(11) DEFAULT NULL,
  `form` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `project_id`, `name`, `image`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 1, 'Rajasthan', 'documents/admin.png1550291735.png', '2019-01-24 07:06:00', 1, '2019-02-28 05:23:04', 1, 0),
(5, 1, 'Panjab', 'documents/agent_account2.png1550291748.png', '2019-01-28 12:40:10', 1, '2019-02-16 04:35:48', 1, 0),
(6, 1, 'Gujrat', NULL, '2019-01-29 04:56:41', 1, '2019-02-13 09:53:46', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_godown_requests`
--

CREATE TABLE `sub_godown_requests` (
  `id` int(11) NOT NULL,
  `godown_id` int(11) NOT NULL,
  `status` enum('pending','sent','received') NOT NULL DEFAULT 'pending',
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_godown_requests`
--

INSERT INTO `sub_godown_requests` (`id`, `godown_id`, `status`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, 2, 'pending', 1, '2019-03-29 10:28:38', 1, '2019-03-29 11:06:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_godown_request_products`
--

CREATE TABLE `sub_godown_request_products` (
  `id` int(11) NOT NULL,
  `sub_godown_request_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `om_quantity` decimal(15,2) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_godown_request_products`
--

INSERT INTO `sub_godown_request_products` (`id`, `sub_godown_request_id`, `product_id`, `quantity`, `om_quantity`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, 1, 1, '2.00', NULL, 1, '2019-03-29 10:28:38', NULL, NULL, 0),
(2, 1, 2, '4.00', NULL, 1, '2019-03-29 10:28:38', NULL, NULL, 0),
(3, 1, 3, '20.00', NULL, 1, '2019-03-29 10:28:38', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tank_receives`
--

CREATE TABLE `tank_receives` (
  `id` int(11) NOT NULL,
  `village_work_id` int(11) NOT NULL,
  `damages_visible` text,
  `tank_size` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `remark` text,
  `image` text,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tank_sizes`
--

CREATE TABLE `tank_sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tank_sizes`
--

INSERT INTO `tank_sizes` (`id`, `name`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, '5 Litre', 1, '2019-02-15 03:56:03', NULL, NULL, 0),
(2, '10 Litre', 1, '2019-02-15 03:56:03', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `dispatch_date` date NOT NULL,
  `expected_delivery_date` date NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `vehicle_number` varchar(15) NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `receipt` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`id`, `plant_id`, `village_id`, `vendor_name`, `dispatch_date`, `expected_delivery_date`, `vehicle`, `driver_name`, `contact_no`, `vehicle_number`, `bill_no`, `receipt`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 4, 4, 'abc', '2019-04-01', '2019-04-06', 'bus', 'ramu', '1230123012', '123', '123', 'documents/activity diagram.png1553947266.png', '2019-03-30 11:55:10', 1, '2019-03-30 12:01:06', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(1, 'NOS'),
(2, 'KG'),
(3, 'Gram'),
(4, 'Ltr'),
(5, 'Meter');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `department_officer_id` int(11) DEFAULT NULL,
  `device_id` text,
  `om` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `employee_id`, `vendor_id`, `department_officer_id`, `device_id`, `om`) VALUES
(1, 'admin@gmail.com', '$2y$10$F5gopOMl8Vf4op7awOJNSOHoyj1dTKRETlUMHwnCb/i1MIYwoY8Oi', 1, NULL, NULL, 'dfghdshgkdhskgfdsjkl', 0),
(2, '5432154321', '$2y$10$vJcCQVeCe29./2aH7oPo3OI9n7/Tpn//jNjAcwXxtCCIVwmv1BpBm', 2, NULL, NULL, 'cFh3t4OlakI:APA91bHmJfFah5pNSn_svMwQjDgXY_nYQu7JzAa2wDWjXwBlNNwgPqa8hcul80Q-nCPJvJkt3edUx4-frmbWgv_LVCPv0uNVjAaOwh4bzDILML0SV_13jA76VU_Nnvuh5l5GO-zmvZ0G', 0),
(3, '1122334455', '$2y$10$c.qzv3TgTITN4eELqekJPuGZebItDeCC.sGZe4sooYxnSKEMHd5s2', 3, NULL, NULL, 'dfghdshgkdhskgfdsjkl', 0),
(4, '9461882490', '$2y$10$SS4GzOa.FI/reWsUT.ie.O.nSVGObX6zH7ZZRAihZOktqJViXVLz.', 4, NULL, NULL, NULL, 0),
(5, '9876543210', '$2y$10$gnbxO7qdASKsI2C9XnfMv.a8prWEsWAmfyhXhxOS6HG7MMWKiywUS', NULL, 1, NULL, NULL, 0),
(6, '1234512345', '$2y$10$kRa63HhJnmxB2.7Ra3.UteVuiDV6d8a/Nc2Wxhys078.ELVzia3kW', NULL, 2, NULL, 'e7GKWlsjl2Q:APA91bH9dHZZxEU0lEkQ1dFuIuVUKfKetOAvvd_CxS-Z6CbG0PZPSb11PLozQE7CU9dD-XM7MDGkYCh4zQgtKMLukXcmUcioaKvvCszwEavFCiaO4idTipnKY3ElkIH-7qKgOYEXfnQe', 0),
(7, '9988776655', '$2y$10$kRa63HhJnmxB2.7Ra3.UteVuiDV6d8a/Nc2Wxhys078.ELVzia3kW', NULL, NULL, 1, NULL, 0),
(8, '9898989898', '$2y$10$J32hf/TMO.eaL31VhtpvyO93o8.jdUAG2iN1dtDJaWVtCAVGnT9Qi', NULL, 3, NULL, NULL, 0),
(9, '1010101010', '$2y$10$kgf24K2vbtKFwWvXCa78h.9Qwff0MIoDx79iNUTh82HiCsUeJoiLu', 5, NULL, NULL, 'e7GKWlsjl2Q:APA91bH9dHZZxEU0lEkQ1dFuIuVUKfKetOAvvd_CxS-Z6CbG0PZPSb11PLozQE7CU9dD-XM7MDGkYCh4zQgtKMLukXcmUcioaKvvCszwEavFCiaO4idTipnKY3ElkIH-7qKgOYEXfnQe', 1),
(10, '1515151515', '$2y$10$j1nOIzltZLtqT8pzMEBkduP8.X3PxGGPlDJMGzZjoRvC9yDqrMRa6', 6, NULL, NULL, 'dH7Fi8ISt28:APA91bHZHnyj4__PG5X54ZgY6BImjvjppiZ-bNUM4NZGMSOin1zLJRYy2BrwFLJXT4iyqf2FZchAMkTNEVT6rc2WIVK0ss3gGZw_UWqqE5kKuNwVsHBuH8b5DCxIqOXhoKORCOs62Vog', 1),
(11, '1212121212', '$2y$10$7mH2rS.uYF4bazaHTuIbJuI1GxAEYMa3UAq2rabEjzxtHa8jmKA/y', NULL, 4, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE `user_rights` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `portal_id` int(11) DEFAULT NULL,
  `menu_ids` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`id`, `employee_id`, `portal_id`, `menu_ids`) VALUES
(1, NULL, 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,28,29,30,31,32,33,34,35,36,37,38,49'),
(3, NULL, 2, '1,14,15,16,17,18,19,48'),
(4, NULL, 3, '1,23,24,25,26,27'),
(5, NULL, 4, '1,39,40,41,42,43,44,45,46,47,50');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_masters`
--

CREATE TABLE `vehicle_masters` (
  `id` int(11) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `price_pr_km` decimal(8,2) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_masters`
--

INSERT INTO `vehicle_masters` (`id`, `vehicle`, `price_pr_km`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'Bus', '2.00', '2019-03-29 12:26:46', 1, NULL, NULL, 0),
(2, 'Bike', '5.00', '2019-03-29 12:28:38', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `vendor_designation_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_of_joining` date NOT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `gst_no` varchar(255) NOT NULL,
  `pan_no` varchar(12) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_person_image` text,
  `address` text,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(11) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `f_c_r_certificate` text,
  `pf_registration_certificate` text,
  `esic_registration_certificate` text,
  `id_proof` text,
  `other` text,
  `payment_term` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_designation_id`, `name`, `date_of_joining`, `contact_no`, `email`, `gst_no`, `pan_no`, `contact_person`, `contact_person_image`, `address`, `account_holder_name`, `bank`, `account_no`, `ifsc_code`, `branch`, `f_c_r_certificate`, `pf_registration_certificate`, `esic_registration_certificate`, `id_proof`, `other`, `payment_term`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 1, 'Ramesh Civil', '2017-02-06', '9876543210', 'ramesh@gmail.com', '12355', 'CCQPP0547C', 'vivek', 'f63804fbf2042692f1afe53ab2bfab91.jpg', 'udaipur', '', '', '', '', '', 'admin.png', '', '', 'agents.png', NULL, '', '2019-01-31 09:03:01', 1, '2019-02-07 18:36:23', 1, 0),
(2, 5, 'Mahesh Shelter', '2016-02-06', '1234512345', 'mahesh@gmail.com', '56454', 'THWKL0872P', 'test2', 'documents/f63804fbf2042692f1afe53ab2bfab91.jpg1548928486.jpg', 'udaipur', '', '', '', '', '', '/documents/Edit_Records.png1548928486.png', '', '/documents/home.png1548928486.png', '', NULL, '', '2019-01-31 09:54:46', 1, '2019-02-15 07:19:38', NULL, 0),
(3, 3, 'Demo IC', '2006-02-15', '9898989898', 'demoic@gmail.com', '1212', 'yhghhjgjhg', 'ggg', 'documents/f63804fbf2042692f1afe53ab2bfab91.jpg1550215133.jpg', 'udaipur', '', '', '', '', '', '', '', '', '', NULL, '', '2019-02-15 07:18:53', 1, NULL, NULL, 0),
(4, 2, 'Hament', '2015-03-14', '1212121212', 'hament@gmail.com', 'qqq', 'qqq', 'abc', '', 'Udaipur', '', '', '', '', '', '', '', '', '', NULL, '', '2019-03-07 06:33:05', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_designations`
--

CREATE TABLE `vendor_designations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_designations`
--

INSERT INTO `vendor_designations` (`id`, `name`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, 'CIVIL', 1, '2019-01-28 11:55:52', 1, '2019-01-31 06:12:56', 0),
(2, 'PLANT ASSEMBLY', 1, '2019-01-28 11:55:52', NULL, NULL, 0),
(3, 'INSTALLATION & COMMISSION', 1, '2019-01-28 11:55:52', NULL, NULL, 0),
(4, 'COMPONANT', 1, '2019-01-28 11:55:52', NULL, NULL, 0),
(5, 'SHELTER', 1, '2019-01-28 11:55:52', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_villages`
--

CREATE TABLE `vendor_villages` (
  `id` int(11) NOT NULL,
  `vendor_designation_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_villages`
--

INSERT INTO `vendor_villages` (`id`, `vendor_designation_id`, `vendor_id`, `village_id`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, 1, 1, 4, 1, '2019-02-18 04:22:52', 1, '2019-02-18 04:40:37', 0),
(2, 1, 1, 5, 1, '2019-02-18 04:22:52', 1, '2019-02-18 04:40:38', 0),
(3, 3, 3, 4, 1, '2019-02-18 04:42:18', NULL, NULL, 0),
(4, 3, 3, 5, 1, '2019-02-18 04:42:18', NULL, NULL, 0),
(5, 5, 2, 4, 1, '2019-02-18 05:09:35', NULL, NULL, 0),
(6, 5, 2, 5, 1, '2019-02-18 05:09:35', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `block_id` int(11) NOT NULL,
  `population` int(11) NOT NULL,
  `no_household` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `customer_care` varchar(10) DEFAULT NULL,
  `image` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`id`, `project_id`, `name`, `block_id`, `population`, `no_household`, `latitude`, `longitude`, `customer_care`, `image`, `created_by`, `created_on`, `edited_by`, `edited_on`) VALUES
(4, 1, 'Dabok', 1, 12500, '545', '41541541', '415415', '1800123456', '/documents/BingImageOfTheDay.jpg1549521751.jpg', 1, '2019-02-07 06:42:31', NULL, '2019-02-07 11:46:13'),
(5, 1, 'Madardi', 1, 10000, '11', '1213', '121321', '1800123123', 'documents/banks.png1550295401.png', 1, '2019-02-16 05:36:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `village_requests`
--

CREATE TABLE `village_requests` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `om_schedule_id` int(11) NOT NULL,
  `status` enum('pending','sent','received','unapproved') NOT NULL DEFAULT 'unapproved',
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `village_requests`
--

INSERT INTO `village_requests` (`id`, `village_id`, `technician_id`, `manager_id`, `om_schedule_id`, `status`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(2, 4, 5, 6, 1, 'pending', 0, '2019-03-27 05:00:52', 1, '2019-03-29 10:42:15', 0),
(3, 5, 5, 6, 2, 'unapproved', 0, '2019-03-27 05:22:45', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `village_request_products`
--

CREATE TABLE `village_request_products` (
  `id` int(11) NOT NULL,
  `village_request_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `om_quantity` decimal(15,2) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `village_request_products`
--

INSERT INTO `village_request_products` (`id`, `village_request_id`, `product_id`, `quantity`, `om_quantity`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(3, 2, 1, '3.00', '3.00', 0, '2019-03-27 05:00:56', NULL, '2019-03-27 05:47:47', 0),
(4, 2, 2, '2.00', '2.00', 0, '2019-03-27 05:00:56', NULL, '2019-03-27 05:47:47', 0),
(5, 3, 4, '58.00', NULL, 0, '2019-03-27 05:22:47', NULL, NULL, 0),
(6, 3, 1, '39.00', NULL, 0, '2019-03-27 05:22:47', NULL, NULL, 0),
(7, 3, 3, '4.00', NULL, 0, '2019-03-27 05:22:47', NULL, NULL, 0),
(8, 3, 2, '48.00', NULL, 0, '2019-03-27 05:22:47', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `village_works`
--

CREATE TABLE `village_works` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `work_schedule_id` int(11) NOT NULL,
  `schedule_date` date DEFAULT NULL,
  `complete_date` date DEFAULT NULL,
  `is_complete` tinyint(1) DEFAULT '0',
  `is_verified` tinyint(1) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `village_works`
--

INSERT INTO `village_works` (`id`, `village_id`, `work_schedule_id`, `schedule_date`, `complete_date`, `is_complete`, `is_verified`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, 4, 1, '2019-03-06', '2019-04-01', 1, 0, 1, '2019-03-05 12:30:10', NULL, '2019-04-01 11:45:31', 0),
(2, 4, 2, '2019-04-11', NULL, 0, 0, 1, '2019-03-05 12:30:10', NULL, '2019-04-01 11:45:31', 0),
(3, 4, 3, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:10', NULL, NULL, 0),
(4, 4, 4, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:10', NULL, NULL, 0),
(5, 4, 5, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:10', NULL, NULL, 0),
(6, 4, 6, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:10', NULL, NULL, 0),
(7, 4, 7, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:10', NULL, NULL, 0),
(8, 4, 8, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:10', NULL, NULL, 0),
(9, 4, 9, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:10', NULL, NULL, 0),
(10, 4, 10, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:10', NULL, NULL, 0),
(11, 4, 11, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:10', NULL, NULL, 0),
(12, 5, 1, '2019-03-21', NULL, 0, 0, 1, '2019-03-05 12:30:19', NULL, NULL, 0),
(13, 5, 2, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:20', NULL, NULL, 0),
(14, 5, 3, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:20', NULL, NULL, 0),
(15, 5, 4, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:20', NULL, NULL, 0),
(16, 5, 5, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:20', NULL, NULL, 0),
(17, 5, 6, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:20', NULL, NULL, 0),
(18, 5, 7, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:20', NULL, NULL, 0),
(19, 5, 8, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:20', NULL, NULL, 0),
(20, 5, 9, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:20', NULL, NULL, 0),
(21, 5, 10, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:20', NULL, NULL, 0),
(22, 5, 11, NULL, NULL, 0, 0, 1, '2019-03-05 12:30:20', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_schedules`
--

CREATE TABLE `work_schedules` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `days` int(11) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_schedules`
--

INSERT INTO `work_schedules` (`id`, `name`, `days`, `model`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, 'Site Selection', NULL, 'SiteSelections', 1, '2019-02-03 04:48:22', NULL, '2019-02-06 16:35:59', 0),
(2, 'CIVIL', 10, 'Civils', 1, '2019-02-03 04:50:26', 1, '2019-02-11 05:29:07', 0),
(3, 'Shelter', 5, 'Shelters', 1, '2019-02-03 04:51:51', 1, '2019-02-11 05:29:10', 0),
(4, 'Plant', 5, 'PlantReceives', 1, '2019-02-03 04:51:58', 1, '2019-02-12 07:24:40', 0),
(5, 'Tanks', 2, 'TankReceives', 1, '2019-02-03 04:52:04', 1, '2019-02-15 03:50:05', 0),
(6, 'Glow Sign Board', 5, 'GlowSignBoards', 1, '2019-02-03 04:52:17', 1, '2019-02-11 10:51:04', 0),
(7, 'Installation', 20, 'Installations', 1, '2019-02-03 04:52:26', 1, '2019-02-12 07:24:52', 0),
(8, 'Commissioning', 10, 'Commissionings', 1, '2019-02-03 04:52:34', 1, '2019-02-12 07:25:07', 0),
(9, 'O&M', 20, NULL, 1, '2019-02-03 04:52:48', 1, '2019-02-11 05:29:31', 0),
(10, 'Inventory', 2, NULL, 1, '2019-02-03 04:52:55', 1, '2019-02-11 05:29:31', 0),
(11, 'Billing', 15, 'Billings', 1, '2019-02-03 04:53:02', 1, '2019-03-01 04:46:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_schedule_rows`
--

CREATE TABLE `work_schedule_rows` (
  `id` int(11) NOT NULL,
  `work_schedule_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_schedule_rows`
--

INSERT INTO `work_schedule_rows` (`id`, `work_schedule_id`, `name`, `created_by`, `created_on`, `edited_by`, `edited_on`, `is_deleted`) VALUES
(1, 2, 'Step - 1', 1, '2019-02-08 06:49:37', NULL, NULL, 0),
(2, 2, 'Step - 2', 1, '2019-02-08 06:49:46', NULL, NULL, 0),
(3, 7, 'Installation - 1', 1, '2019-02-11 11:37:33', NULL, NULL, 0),
(4, 7, 'Installation - 2', 1, '2019-02-11 11:37:44', NULL, NULL, 0),
(5, 8, 'Commissioning - 1', 1, '2019-02-11 11:38:08', NULL, NULL, 0),
(6, 8, 'Commissioning - 2', 1, '2019-02-11 11:38:19', NULL, NULL, 0),
(7, 2, 'Brick', 1, '2019-04-02 06:28:46', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_schedule_row_forms`
--

CREATE TABLE `work_schedule_row_forms` (
  `id` int(11) NOT NULL,
  `village_work_id` int(11) NOT NULL,
  `work_schedule_row_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `image` text NOT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(11) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_schedule_row_forms`
--

INSERT INTO `work_schedule_row_forms` (`id`, `village_work_id`, `work_schedule_row_id`, `start_date`, `end_date`, `image`, `is_complete`, `created_by`, `created_on`, `edited_by`, `edited_on`) VALUES
(7, 2, 1, '2019-02-15', '2019-02-15', 'documents/admin.png1554110423.PNG', 1, 5, '2019-04-01 09:20:23', NULL, NULL),
(8, 2, 1, '2019-02-15', '2019-02-15', 'documents/admin.png1554110492.PNG', 1, 5, '2019-04-01 09:21:33', NULL, NULL),
(9, 2, 1, '2019-02-15', '2019-02-15', 'documents/admin.png1554110528.PNG', 1, 5, '2019-04-01 09:22:08', NULL, NULL),
(10, 2, 1, '2019-02-15', '2019-02-15', 'documents/admin.png1554110566.PNG', 1, 5, '2019-04-01 09:22:46', NULL, NULL),
(11, 2, 1, '2019-02-15', '2019-02-15', 'documents/admin.png1554110614.PNG', 1, 5, '2019-04-01 09:23:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_verifications`
--

CREATE TABLE `work_verifications` (
  `id` int(11) NOT NULL,
  `village_work_id` int(11) NOT NULL,
  `work_schedule_row_id` int(11) NOT NULL,
  `is_satisfied` tinyint(1) NOT NULL,
  `image` text,
  `remarks` text,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_by` int(10) DEFAULT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting_entries`
--
ALTER TABLE `accounting_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounting_serials`
--
ALTER TABLE `accounting_serials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_versions`
--
ALTER TABLE `api_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_questions`
--
ALTER TABLE `billing_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `civils`
--
ALTER TABLE `civils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissionings`
--
ALTER TABLE `commissionings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_officers`
--
ALTER TABLE `department_officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `do_posts`
--
ALTER TABLE `do_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `do_villages`
--
ALTER TABLE `do_villages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_designations`
--
ALTER TABLE `employee_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_villages`
--
ALTER TABLE `employee_villages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glow_sign_boards`
--
ALTER TABLE `glow_sign_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `godowns`
--
ALTER TABLE `godowns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `godown_villages`
--
ALTER TABLE `godown_villages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gram_panchayats`
--
ALTER TABLE `gram_panchayats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installations`
--
ALTER TABLE `installations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mla_constituencies`
--
ALTER TABLE `mla_constituencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `om_employees`
--
ALTER TABLE `om_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `om_schedules`
--
ALTER TABLE `om_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `om_schedule_forms`
--
ALTER TABLE `om_schedule_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `om_schedule_masters`
--
ALTER TABLE `om_schedule_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plant_receives`
--
ALTER TABLE `plant_receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portals`
--
ALTER TABLE `portals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portal_users`
--
ALTER TABLE `portal_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_employees`
--
ALTER TABLE `project_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `punch_attendances`
--
ALTER TABLE `punch_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelters`
--
ALTER TABLE `shelters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_selections`
--
ALTER TABLE `site_selections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_godown_requests`
--
ALTER TABLE `sub_godown_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_godown_request_products`
--
ALTER TABLE `sub_godown_request_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tank_receives`
--
ALTER TABLE `tank_receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tank_sizes`
--
ALTER TABLE `tank_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_masters`
--
ALTER TABLE `vehicle_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_designations`
--
ALTER TABLE `vendor_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_villages`
--
ALTER TABLE `vendor_villages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_designation_id` (`vendor_designation_id`,`vendor_id`,`village_id`,`is_deleted`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `village_requests`
--
ALTER TABLE `village_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `village_request_products`
--
ALTER TABLE `village_request_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `village_works`
--
ALTER TABLE `village_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_schedules`
--
ALTER TABLE `work_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_schedule_rows`
--
ALTER TABLE `work_schedule_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_schedule_row_forms`
--
ALTER TABLE `work_schedule_row_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_verifications`
--
ALTER TABLE `work_verifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting_entries`
--
ALTER TABLE `accounting_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `accounting_serials`
--
ALTER TABLE `accounting_serials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `api_versions`
--
ALTER TABLE `api_versions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `billing_questions`
--
ALTER TABLE `billing_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `civils`
--
ALTER TABLE `civils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commissionings`
--
ALTER TABLE `commissionings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department_officers`
--
ALTER TABLE `department_officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `do_posts`
--
ALTER TABLE `do_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `do_villages`
--
ALTER TABLE `do_villages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employee_designations`
--
ALTER TABLE `employee_designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employee_villages`
--
ALTER TABLE `employee_villages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `glow_sign_boards`
--
ALTER TABLE `glow_sign_boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `godowns`
--
ALTER TABLE `godowns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `godown_villages`
--
ALTER TABLE `godown_villages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gram_panchayats`
--
ALTER TABLE `gram_panchayats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `installations`
--
ALTER TABLE `installations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `mla_constituencies`
--
ALTER TABLE `mla_constituencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `om_employees`
--
ALTER TABLE `om_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `om_schedules`
--
ALTER TABLE `om_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `om_schedule_forms`
--
ALTER TABLE `om_schedule_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `om_schedule_masters`
--
ALTER TABLE `om_schedule_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `plant_receives`
--
ALTER TABLE `plant_receives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `portals`
--
ALTER TABLE `portals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `portal_users`
--
ALTER TABLE `portal_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `project_employees`
--
ALTER TABLE `project_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `punch_attendances`
--
ALTER TABLE `punch_attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shelters`
--
ALTER TABLE `shelters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_selections`
--
ALTER TABLE `site_selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sub_godown_requests`
--
ALTER TABLE `sub_godown_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sub_godown_request_products`
--
ALTER TABLE `sub_godown_request_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tank_receives`
--
ALTER TABLE `tank_receives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tank_sizes`
--
ALTER TABLE `tank_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vehicle_masters`
--
ALTER TABLE `vehicle_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vendor_designations`
--
ALTER TABLE `vendor_designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vendor_villages`
--
ALTER TABLE `vendor_villages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `village_requests`
--
ALTER TABLE `village_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `village_request_products`
--
ALTER TABLE `village_request_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `village_works`
--
ALTER TABLE `village_works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `work_schedules`
--
ALTER TABLE `work_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `work_schedule_rows`
--
ALTER TABLE `work_schedule_rows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `work_schedule_row_forms`
--
ALTER TABLE `work_schedule_row_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `work_verifications`
--
ALTER TABLE `work_verifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

