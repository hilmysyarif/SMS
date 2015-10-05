-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2015 at 07:11 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
`AccountId` int(11) NOT NULL,
  `AccountStatus` varchar(10) NOT NULL,
  `ManagedBy` varchar(100) NOT NULL,
  `AccountName` varchar(100) NOT NULL,
  `BankAccountName` varchar(100) NOT NULL,
  `AccountType` int(11) NOT NULL,
  `BankName` varchar(100) NOT NULL,
  `BranchName` varchar(100) NOT NULL,
  `IFSCCode` varchar(10) NOT NULL,
  `OpeningBalance` decimal(10,2) NOT NULL,
  `AccountBalance` decimal(10,2) NOT NULL,
  `AccountDate` varchar(20) NOT NULL,
  `DOE` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AccountId`, `AccountStatus`, `ManagedBy`, `AccountName`, `BankAccountName`, `AccountType`, `BankName`, `BranchName`, `IFSCCode`, `OpeningBalance`, `AccountBalance`, `AccountDate`, `DOE`) VALUES
(1, 'Active', '47', '410201010714', 'JUNCTION SCHOOL', 2, 'SBI', 'AASHIMA MALL', '7845', '1000.00', '4562.00', '1435257000', '1435303380');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE IF NOT EXISTS `admission` (
`AdmissionId` int(11) NOT NULL,
  `AdmissionNo` varchar(100) NOT NULL,
  `RegistrationId` int(11) NOT NULL,
  `Remarks` text NOT NULL,
  `DOA` varchar(10) NOT NULL,
  `DOE` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`AdmissionId`, `AdmissionNo`, `RegistrationId`, `Remarks`, `DOA`, `DOE`) VALUES
(1, '', 2, 'no dues', '1435257000', '1435301160'),
(2, '', 3, '', '1435257000', '1435301220'),
(3, '', 1, '', '1435257000', '1435301220'),
(4, '', 4, '', '1435257000', '1435301220'),
(5, '', 5, '', '1438540200', '1438594440'),
(6, '', 7, '', '1438540200', '1438594440'),
(7, '', 10, '', '1438540200', '1438594560'),
(8, '', 6, '', '1438540200', '1438594560'),
(9, '', 9, '', '1438540200', '1438594620'),
(10, '', 8, '', '1438540200', '1438594620'),
(11, '', 16, '', '1438885800', '1438935420'),
(12, '', 17, '', '1438885800', '1438935600'),
(13, '', 12, '', '1438885800', '1438935660'),
(14, '', 14, '', '1438972200', '1438935660'),
(15, '', 11, '', '1438626600', '1438935660'),
(16, '', 13, '', '1438540200', '1438935720'),
(17, '', 15, '', '1438713000', '1438935720'),
(18, '122', 19, 'fdg', 'Tue, 25 Au', '');

-- --------------------------------------------------------

--
-- Table structure for table `backuprestore`
--

CREATE TABLE IF NOT EXISTS `backuprestore` (
`BackUpRestoreId` int(11) NOT NULL,
  `BackUpRestoreType` varchar(20) NOT NULL,
  `BackUpRestoreDate` varchar(20) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
`BookId` int(11) NOT NULL,
  `BookStatus` varchar(10) NOT NULL,
  `BookName` varchar(100) NOT NULL,
  `AuthorName` varchar(100) NOT NULL,
  `Publisher` varchar(100) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `Purpose` int(11) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `DOE` varchar(100) NOT NULL,
  `DOEUsername` varchar(100) NOT NULL,
  `DOL` varchar(10) NOT NULL,
  `DOLUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookId`, `BookStatus`, `BookName`, `AuthorName`, `Publisher`, `SubjectId`, `Purpose`, `Price`, `DOE`, `DOEUsername`, `DOL`, `DOLUsername`) VALUES
(1, 'Active', 'english vol-1', 'renu', 'shivani', 1, 5, '200', '1435310640', 'masteruser', '', ''),
(2, 'Active', 'samanya gyan', 'shakuntla', 'rk ', 2, 5, '500', '1435408080', 'masteruser', '', ''),
(3, 'Active', 'science vol1', 'sharma', 'G.K', 3, 5, '400', '1435409760', 'masteruser', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bookissue`
--

CREATE TABLE IF NOT EXISTS `bookissue` (
`BookIssueId` int(11) NOT NULL,
  `IRTo` varchar(10) NOT NULL,
  `IRToDetail` int(11) NOT NULL,
  `Books` text NOT NULL,
  `DOI` varchar(10) NOT NULL,
  `BookReturn` text NOT NULL,
  `BookIssueStatus` varchar(10) NOT NULL,
  `Remarks` text NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOEUsername` varchar(100) NOT NULL,
  `DOD` varchar(10) NOT NULL,
  `DODUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookissue`
--

INSERT INTO `bookissue` (`BookIssueId`, `IRTo`, `IRToDetail`, `Books`, `DOI`, `BookReturn`, `BookIssueStatus`, `Remarks`, `DOE`, `DOEUsername`, `DOD`, `DODUsername`) VALUES
(1, 'Student', 1, '1', '1435408560', '', 'Active', 'fd', '1435408560', 'masteruser', '', ''),
(2, 'Student', 2, '10', '1435409880', '', 'Active', 'fd', '1435409880', 'masteruser', '', ''),
(3, '1', 3, '9', '1435409940', '', 'Active', 'df', '1435409940', 'masteruser', '', ''),
(4, 'Student', 1, '2', '1435840140', '', 'Active', '', '1435840140', 'masteruser', '', ''),
(5, 'Student', 1, '3', '1438599180', '', 'Active', '.', '1438599180', 'masteruser', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
`CalendarId` int(11) NOT NULL,
  `CalendarStatus` varchar(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `StartTime` varchar(20) NOT NULL,
  `EndTime` varchar(20) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Color` varchar(7) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `DLU` varchar(20) NOT NULL,
  `DOD` varchar(20) NOT NULL,
  `DODUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`CalendarId`, `CalendarStatus`, `Username`, `StartTime`, `EndTime`, `Title`, `Color`, `Date`, `DLU`, `DOD`, `DODUsername`) VALUES
(1, 'Active', 'masteruser', '1435315980', '1437882780', ' testing calendar', '#123456', '1435315980', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `calling`
--

CREATE TABLE IF NOT EXISTS `calling` (
`CallId` int(11) NOT NULL,
  `CallStatus` varchar(10) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Landline` varchar(12) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `NoOfChild` int(11) NOT NULL,
  `CallResponse` int(11) NOT NULL,
  `ResponseDetail` text NOT NULL,
  `FollowUpDate` varchar(20) NOT NULL,
  `Remarks` text NOT NULL,
  `Address` text NOT NULL,
  `DOC` varchar(20) NOT NULL,
  `DOE` varchar(20) NOT NULL,
  `DOD` varchar(20) NOT NULL,
  `DLU` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calling`
--

INSERT INTO `calling` (`CallId`, `CallStatus`, `Mobile`, `Landline`, `Name`, `NoOfChild`, `CallResponse`, `ResponseDetail`, `FollowUpDate`, `Remarks`, `Address`, `DOC`, `DOE`, `DOD`, `DLU`) VALUES
(1, 'Active', '8817507649', '0755258547', 'palak', 2, 32, 'good', '1438466400', '', 'm.p nagar', '1440626400', '1435298100', '', ''),
(2, 'Active', '548798659', '4898989', 'ankit', 5, 33, 'good', '1438552800', '', 'rewa', '1439848800', '', '', ''),
(4, 'Active', '5435345345', '', 'gdfgdg', 3, 31, 'gdfgsdg', '0', '', 'gdfgsdg', '0', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `circular`
--

CREATE TABLE IF NOT EXISTS `circular` (
`CircularId` int(11) NOT NULL,
  `Title` varchar(10000) NOT NULL,
  `Circular` text NOT NULL,
  `DateReleased` varchar(10) NOT NULL,
  `CircularStatus` varchar(10) NOT NULL,
  `Username` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circular`
--

INSERT INTO `circular` (`CircularId`, `Title`, `Circular`, `DateReleased`, `CircularStatus`, `Username`) VALUES
(1, 'testing', '<p><span style="font-size:18px;"><strong>Hi this my circular............</strong></span></p>', '1435315920', 'Active', 'masteruser');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
`ClassId` int(11) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `ClassName` varchar(100) NOT NULL,
  `ClassStatus` varchar(10) NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassId`, `Session`, `ClassName`, `ClassStatus`, `DOE`, `DOL`) VALUES
(1, '2015-2016', '1st', 'Active', '1435299960', ''),
(2, '2015-2016', '2nd ', 'Active', '1435300020', ''),
(3, '2015-2016', '3rd', 'Active', '1435300020', ''),
(4, '2015-2016', '4th', 'Active', '1435300080', ''),
(5, '2015-2016', '5th', 'Active', '1435300080', ''),
(6, '2016-2017', '2nd ', 'Active', '1435301760', ''),
(7, '2015-2016', '6th', 'Active', '1435382160', ''),
(8, '2015-2016', '12 th', 'Active', '1438593600', ''),
(9, '2015-2016', '11th', 'Active', '1438593660', ''),
(10, '2015-2016', '10 th', 'Active', '1438593660', ''),
(11, '2016-2017', '1st', 'Active', '1442485080', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE IF NOT EXISTS `complaint` (
`ComplaintId` int(11) NOT NULL,
  `ComplaintStatus` varchar(10) NOT NULL,
  `ComplaintType` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Description` text NOT NULL,
  `Action` text NOT NULL,
  `DOC` varchar(10) NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOEUsername` varchar(100) NOT NULL,
  `DOL` varchar(10) NOT NULL,
  `DOLUsername` varchar(100) NOT NULL,
  `DOD` varchar(10) NOT NULL,
  `DODUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`ComplaintId`, `ComplaintStatus`, `ComplaintType`, `Name`, `Mobile`, `Description`, `Action`, `DOC`, `DOE`, `DOEUsername`, `DOL`, `DOLUsername`, `DOD`, `DODUsername`) VALUES
(1, 'Fresh', 40, 'jayadevi', '8817509443', '<p>Driver drink and drive...........</p>', '<p>fire right now</p>', '0', '1435299120', 'masteruser', '', '', '', ''),
(2, 'Fresh', 39, 'Mr.X', '45876598', 'xyz', 'abc', '0', '', 'masteruser', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `drregister`
--

CREATE TABLE IF NOT EXISTS `drregister` (
`Id` int(11) NOT NULL,
  `DRStatus` varchar(10) NOT NULL,
  `DRType` varchar(100) NOT NULL,
  `Reference` text NOT NULL,
  `Title` text NOT NULL,
  `AddressFrom` text NOT NULL,
  `AddressTo` text NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Remarks` text NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL,
  `DOD` varchar(10) NOT NULL,
  `DODUsername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
`EnquiryId` int(11) NOT NULL,
  `EnquiryStatus` varchar(10) NOT NULL,
  `EnquiryType` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `NoOfChild` int(11) NOT NULL,
  `EnquiryResponse` int(11) NOT NULL,
  `AlternateMobile` varchar(10) NOT NULL,
  `Address` text NOT NULL,
  `EnquiryDate` varchar(20) NOT NULL,
  `DOE` varchar(20) NOT NULL,
  `ResponseDetail` text NOT NULL,
  `Remarks` text NOT NULL,
  `Reference` int(11) NOT NULL,
  `DLU` varchar(20) NOT NULL,
  `DOD` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`EnquiryId`, `EnquiryStatus`, `EnquiryType`, `Name`, `Mobile`, `NoOfChild`, `EnquiryResponse`, `AlternateMobile`, `Address`, `EnquiryDate`, `DOE`, `ResponseDetail`, `Remarks`, `Reference`, `DLU`, `DOD`) VALUES
(1, 'Active', 34, 'vishal', '7896307894', 1, 32, '', 'shaket nagar bhopal', '1435298760', '1435298760', 'good', '', 36, '', ''),
(2, 'Active', 35, 'ankit', '8745874578', 5, 31, '5896966985', 'aashima mall', '0', '', 'very bad', '', 37, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
`ExamId` int(11) NOT NULL,
  `ExamStatus` varchar(10) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `ExamName` varchar(100) NOT NULL,
  `Weightage` decimal(10,2) NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ExamId`, `ExamStatus`, `Session`, `SectionId`, `ExamName`, `Weightage`, `DOE`, `DOL`) VALUES
(1, 'Active', '2015-2016', 1, 'unit test', '5.00', '1435305840', ''),
(2, 'Active', '2015-2016', 1, 'half yearly', '40.00', '1435305840', ''),
(3, 'Active', '2015-2016', 1, 'final eaxm', '60.00', '1435305900', ''),
(4, 'Active', '2015-2016', 7, 'MAIN', '100.00', '1438595400', ''),
(5, 'Active', '2015-2016', 9, 'MAIN', '100.00', '1438595460', ''),
(7, 'Active', '2015-2016', 1, 'main 1st', '40.00', '1439447340', ''),
(8, 'Active', '2015-2016', 2, 'final exam', '60.00', '1442308320', ''),
(9, 'Active', '2016-2017', 12, 'fsdf', '0.00', '16-7-2015', ''),
(10, 'Active', '2016-2017', 12, 'ghgfh', '5.00', '16-7-2015', ''),
(11, 'Active', '2016-2017', 13, 'tsest', '55.00', '16-7-2015', '');

-- --------------------------------------------------------

--
-- Table structure for table `examdetail`
--

CREATE TABLE IF NOT EXISTS `examdetail` (
`ExamDetailId` int(11) NOT NULL,
  `ExamDetailStatus` varchar(10) NOT NULL,
  `Locked` int(11) NOT NULL,
  `ExamId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `ExamActivityName` varchar(500) NOT NULL,
  `ExamActivityType` int(11) NOT NULL,
  `MaximumMarks` decimal(10,0) NOT NULL,
  `Marks` text NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examdetail`
--

INSERT INTO `examdetail` (`ExamDetailId`, `ExamDetailStatus`, `Locked`, `ExamId`, `SubjectId`, `ExamActivityName`, `ExamActivityType`, `MaximumMarks`, `Marks`, `DOE`, `DOL`) VALUES
(1, 'Active', 0, 3, 1, 'palak', 55, '60', '1-1.17,4-50', '1435306680', ''),
(2, 'Active', 0, 3, 2, 'pass', 55, '60', '80', '1438598760', ''),
(3, 'Active', 0, 1, 2, 'palak', 55, '10', '1-9,4-8', '1439447340', ''),
(4, 'Active', 0, 2, 2, 'testing2', 56, '40', '1-30,4-35', '1439447460', '');

-- --------------------------------------------------------

--
-- Table structure for table `examdetails`
--

CREATE TABLE IF NOT EXISTS `examdetails` (
`Exam_Detail_Id` int(11) NOT NULL,
  `Exam_Type` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Exam_Detail_Status` enum('Active','Inactive','Deleted') CHARACTER SET utf8 NOT NULL,
  `Section_Id` int(11) NOT NULL,
  `Student_Id` int(11) NOT NULL,
  `Session` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Marks_Obtain` float NOT NULL,
  `Max_Marks` float NOT NULL,
  `Result` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Grade` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Remarks` varchar(20) CHARACTER SET utf8 NOT NULL,
  `DateOfExam` varchar(10) CHARACTER SET utf8 NOT NULL,
  `DOC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Evaluated_By` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examdetails`
--

INSERT INTO `examdetails` (`Exam_Detail_Id`, `Exam_Type`, `Exam_Detail_Status`, `Section_Id`, `Student_Id`, `Session`, `Subject_Id`, `Marks_Obtain`, `Max_Marks`, `Result`, `Grade`, `Remarks`, `DateOfExam`, `DOC`, `DOU`, `Evaluated_By`) VALUES
(5, 'Final_exam', 'Active', 3, 2, '2015-2016', 2, 35, 50, '91', 'B', 'testing', 'Mon, 21 Se', '2015-09-21 10:30:25', '0000-00-00 00:00:00', 'rohit');

-- --------------------------------------------------------

--
-- Table structure for table `examtype`
--

CREATE TABLE IF NOT EXISTS `examtype` (
  `Exam_Type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Exam_Status` enum('Active','Inactive','Deleted') CHARACTER SET utf8 NOT NULL,
  `DOC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date OF Creation',
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date Of Modify',
  `Remarks` text CHARACTER SET utf8 NOT NULL,
  `Duration` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'Time Duration Of Exam'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examtype`
--

INSERT INTO `examtype` (`Exam_Type`, `Exam_Status`, `DOC`, `DOU`, `Remarks`, `Duration`) VALUES
('Final_exam', 'Active', '2015-09-19 08:30:59', '0000-00-00 00:00:00', 'tsesting exammm', '3:00 PM'),
('Half_yearly', 'Inactive', '2015-09-19 08:30:28', '0000-00-00 00:00:00', 'testing eaxamm 2', '1:00 PM'),
('unit_test', 'Active', '2015-09-19 08:29:56', '0000-00-00 00:00:00', 'testing exam', '2:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
`ExpenseId` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `ExpenseStatus` varchar(10) NOT NULL,
  `ExpenseAccountType` varchar(20) NOT NULL,
  `SupplierId` varchar(10) NOT NULL,
  `StaffId` varchar(10) NOT NULL,
  `SalaryMonthYear` varchar(20) NOT NULL,
  `SalaryPaymentType` varchar(10) NOT NULL,
  `ExpenseAmount` decimal(10,2) NOT NULL,
  `AmountPaid` decimal(10,2) NOT NULL,
  `ExpenseRemarks` text NOT NULL,
  `ExpenseDate` varchar(20) NOT NULL,
  `DOE` varchar(20) NOT NULL,
  `DLU` varchar(20) NOT NULL,
  `DOD` varchar(20) NOT NULL,
  `DODUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`ExpenseId`, `Username`, `ExpenseStatus`, `ExpenseAccountType`, `SupplierId`, `StaffId`, `SalaryMonthYear`, `SalaryPaymentType`, `ExpenseAmount`, `AmountPaid`, `ExpenseRemarks`, `ExpenseDate`, `DOE`, `DLU`, `DOD`, `DODUsername`) VALUES
(1, 'masteruser', 'Active', '49', '1', '', '', '', '120.00', '120.00', 'gh', '1435397220', '1435397220', '', '', ''),
(2, 'masteruser', 'Active', '48', '1', '', '', '', '7660.00', '6660.00', '', '1438578180', '1438595040', '', '', ''),
(3, 'masteruser', 'Active', '49', '1', '', '', '', '78.00', '50.00', '..', '1438598040', '1438598040', '', '', ''),
(4, 'masteruser', 'Active', '49', '1', '', '', '', '1000.00', '1000.00', '.......', '1439017380', '1439017380', '', '', ''),
(5, 'masteruser', 'Active', '48', '1', '', '', '', '50.00', '0.00', 'xyz', '1440143100', '1440143100', '', '', ''),
(6, 'masteruser', 'Active', '49', '1', '', '', '', '453.00', '0.00', 'gddfg', '1440143340', '1440143400', '', '', ''),
(7, 'masteruser', 'Active', '48', '1', '', '', '', '99999999.99', '324.00', 'asdasd', '1440143400', '1440143400', '', '', ''),
(8, 'masteruser', 'Active', '48', '1', '', '', '', '500.00', '20.00', 'sdad', '1440280800', '1439244000', '', '', ''),
(9, 'masteruser', 'Active', '48', '1', '', '', '', '500.00', '200.00', 'fdhs', '1440367200', '1440367200', '', '', ''),
(10, 'masteruser', 'Active', '48', '1', '', '', '', '1200.00', '200.00', 'dasda', '1440108000', '1440108000', '', '', ''),
(11, 'masteruser', 'Active', '48', '1', '', '', '', '12000.00', '200.00', 'dfssd', '1440108000', '1440108000', '', '', ''),
(12, 'masteruser', 'Active', '48', '1', '', '', '', '25000.00', '200.00', 'asdasd', '1440108000', '1440108000', '', '', ''),
(13, 'masteruser', 'Active', '48', '1', '', '', '', '20.00', '10.00', 'dsadasd', '1440799200', '1440540000', '', '', ''),
(14, 'masteruser', 'Active', '48', '1', '', '', '', '100.00', '50.00', 'hfgh', '1440108000', '1440108000', '', '', ''),
(15, 'masteruser', 'Active', '', '', '1', '1441045800', '89', '500.00', '500.00', 'fgdsgdg', '1442341800', '1442404380', '', '', ''),
(16, 'masteruser', 'Active', '', '', '6', '1441058400', '90', '500.00', '500.00', 'tsesting', '1442440800', '1442440800', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE IF NOT EXISTS `fee` (
`FeeId` int(11) NOT NULL,
  `FeeStatus` varchar(10) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `FeeType` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Distance` varchar(10) NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`FeeId`, `FeeStatus`, `Session`, `SectionId`, `FeeType`, `Amount`, `Distance`, `DOE`, `DOL`) VALUES
(1, 'Active', '2015-2016', 1, 43, 1000, '', '1435300920', ''),
(2, 'Active', '2015-2016', 1, 44, 600, '', '1435300980', ''),
(3, 'Active', '2015-2016', 2, 43, 1200, '', '1435300980', ''),
(4, 'Active', '2015-2016', 2, 44, 700, '', '1435300980', ''),
(5, 'Active', '2015-2016', 3, 43, 1300, '', '1435300980', ''),
(6, 'Active', '2015-2016', 3, 44, 800, '', '1435301040', ''),
(7, 'Active', '2015-2016', 4, 43, 1300, '', '1435301040', ''),
(8, 'Active', '2015-2016', 4, 44, 900, '', '1435301040', ''),
(9, 'Active', '2015-2016', 5, 43, 1400, '', '1435301040', ''),
(10, 'Active', '2015-2016', 5, 44, 1000, '', '1435301100', ''),
(11, 'Active', '2015-2016', 7, 43, 5000, '83', '1438594320', ''),
(12, 'Active', '2015-2016', 8, 43, 2500, '70', '1438594320', ''),
(13, 'Active', '2015-2016', 10, 43, 2000, '69', '1438594320', ''),
(14, 'Active', '2015-2016', 9, 44, 700, '', '1438594380', ''),
(16, 'Active', '2015-2016', 8, 43, 2500, '', '1438594500', ''),
(17, 'Active', '2015-2016', 8, 44, 700, '', '1438594560', ''),
(18, 'Active', '2015-2016', 11, 43, 2500, '83', '1438934700', '1438935300'),
(19, 'Active', '2015-2016', 11, 44, 700, '83', '1438934760', '1438935180'),
(20, 'Active', '2015-2016', 6, 43, 2000, '', '1439447580', ''),
(21, 'Active', '2015-2016', 6, 44, 1000, '', '1439447580', ''),
(22, 'Active', '2016-2017', 12, 43, 1000, '', '1440401160', ''),
(23, 'Active', '1', 3, 44, 555888, '83', '16-7-2015', ''),
(24, 'Active', '1', 8, 43, 445566, '69', '16-7-2015', ''),
(25, 'Active', '2016-2017', 13, 42, 600, '', '1442490960', ''),
(26, 'Active', '2016-2017', 12, 42, 600, '', '1442490960', ''),
(27, 'Active', '2016-2017', 13, 44, 45000, '', '1442491020', ''),
(28, 'Active', '2016-2017', 12, 44, 45000, '', '1442491020', ''),
(29, 'Active', '2015-2016', 9, 43, 568000, '', '16-7-2015', '');

-- --------------------------------------------------------

--
-- Table structure for table `feepayment`
--

CREATE TABLE IF NOT EXISTS `feepayment` (
`FeePaymentId` int(11) NOT NULL,
  `Token` varchar(200) NOT NULL,
  `FeeType` int(11) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `FeePaymentStatus` varchar(10) NOT NULL,
  `DOE` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feepayment`
--

INSERT INTO `feepayment` (`FeePaymentId`, `Token`, `FeeType`, `Amount`, `FeePaymentStatus`, `DOE`) VALUES
(1, 'va31y5x86rr21ITowW25bxkuRFAtVp', 3, '1200', 'Pending', ''),
(2, 'k7pJdCoKrPruYXMBQC2NLAqgKK79n', 3, '1200', 'Active', ''),
(3, 'URPmt6jXApUYB5DHxzRpN6NooBbRg', 4, '400', 'Active', ''),
(4, 'DryzCMR1eEKU7UkzlhhswxJ9Z2XCiG', 4, '200', 'Active', ''),
(5, '3cUul3XC76lio7Mc6vtngs0DlpDu67', 5, '1300', 'Active', ''),
(6, '5aBNEbk36HdpyOfJ28pJ2Eaw0HtN9', 1, '1000', 'Pending', ''),
(7, 'yqwssRnqNgeKrR7G8IYvWqgkGDC6ap', 1, '1000', 'Active', ''),
(8, 'kNk57ulSKlZWN9ZApZrz6kEsgJdELZ', 2, '600', 'Active', ''),
(9, 'abnycJM5jiBMC01u2zr3uvJLTWV8aC', 15, '700', 'Active', ''),
(10, 'OyZeOIwLFlRZFDuGfB7L3OHGu5uG4r', 1, '500', 'Active', ''),
(11, 'OyZeOIwLFlRZFDuGfB7L3OHGu5uG4r', 2, '600', 'Active', ''),
(12, 'zDItdxQvTf4NJvemJfVOMFmPi21aQ', 14, '600', 'Active', ''),
(13, 'wbS9AlBqqd2yf3l9BDEKgJALnMcP7d', 16, '1500', 'Active', ''),
(14, 'uLhv4IXB8zb1msXJUp8FOQzx6m1lDw', 16, '1500', 'Active', ''),
(15, 'P7283cmKZJy6LLEmARMjxffefUMnOz', 11, '3000', 'Pending', ''),
(16, 'ehWh7LkS92oIZjqbPJntFL0YuguUbH', 11, '3000', 'Pending', ''),
(17, 'ehWh7LkS92oIZjqbPJntFL0YuguUbH', 15, '550', 'Pending', ''),
(18, 'tsPBShty3qtKEWYaV3LXRUZk3WlKWg', 11, '3000', 'Pending', ''),
(19, 'CuWl9qiQaUVs0fi5ktBek7Jjr1CAo', 11, '3000', 'Pending', ''),
(20, 'uxqe9EOhJvx8Go8G75eZQKupg0hKR', 11, '3000', 'Pending', ''),
(21, '7IQmywz9fAWrW6CIzI0U2Vq0ntnmTy', 11, '3000', 'Active', ''),
(22, 'P89yzCyvn9VNPl0SeajYHAMlfEVo2w', 15, '200', 'Active', ''),
(23, 'oJSDKlUb785NuleQKFIymErsBxhFnp', 11, '500', 'Pending', ''),
(24, 'oJSDKlUb785NuleQKFIymErsBxhFnp', 15, '100', 'Pending', ''),
(25, 'lwR3MkZRF20rv0j3HyWHMnz3cZ6CIF', 11, '100', 'Pending', ''),
(26, 'lwR3MkZRF20rv0j3HyWHMnz3cZ6CIF', 15, '200', 'Pending', ''),
(27, '9f8bHQhjDU5ScfbwTM7LqhxFVIzgr', 11, '200', 'Pending', ''),
(28, 'u9qHRPuJ5j1XpsYoAhE8ufdHlW4WL', 11, '100', 'Active', ''),
(29, 'u9qHRPuJ5j1XpsYoAhE8ufdHlW4WL', 15, '50', 'Active', ''),
(30, 'kyxn2SrUB50pXyp2dGS0QgPmfI5ji', 11, '100', 'Pending', ''),
(31, 'HT8n7aphDtWLnsMMZjp1EIWXCo9CS', 11, '500', 'Pending', ''),
(32, 'lIHobdaeiXeFpr9Mg2BAXuoUynHKA', 11, '100', 'Pending', ''),
(33, 'lIHobdaeiXeFpr9Mg2BAXuoUynHKA', 15, '10', 'Pending', ''),
(34, '0A3ICkiJbGMoEd5XXOE6EjJhBmhuYn', 18, '400', 'Pending', ''),
(35, '0A3ICkiJbGMoEd5XXOE6EjJhBmhuYn', 19, '100', 'Pending', ''),
(36, 'WTzcVjOdH0IBLYOlmTQPwqUd2UHifT', 18, '400', 'Active', ''),
(37, '1aQ5OOpCUQmzKBq3pmENVMo6IU8mI', 18, '200', 'Pending', ''),
(38, 'zGoEvp0GFbjwYZkeXzxsMUVZLtRm', 18, '200', 'Pending', ''),
(39, 'ByuDxcBBWPvTyHVMClP8BglU2pnH0', 18, '200', 'Pending', ''),
(40, 'cmkJgAWYtsa6AnQcWeWAJQFMCLy0G', 11, '200', 'Pending', ''),
(41, 'DwCuWl9qiQaUVs0fi5ktBek7Jjr1C', 19, '200', 'Active', ''),
(42, 'V7mE0RC6IZAVVacxmRLQlLGUlWlqX', 18, '50', 'Pending', ''),
(43, 'P9Sy9Iq1otFYMnuI7StEfGPayUeBEp', 18, '200', 'Pending', ''),
(44, '0pXyp2dGS0QgPmfI5ji9sjeinAyK', 18, '200', 'Pending', ''),
(45, '0pXyp2dGS0QgPmfI5ji9sjeinAyK', 19, '200', 'Pending', ''),
(46, '46izn7tmxjztL6pKTo2xBEoYStti8', 11, '1100', 'Pending', ''),
(47, 'ZHDnTxCtFsLPdXhEEeQ8qjFQiBYxaJ', 20, '1100', 'Pending', ''),
(51, 'b040d338ec1945f900973e80734ffd31a4c623645f85d51f59d05800eb5a', 44, '20', 'Pending', ''),
(52, '92f2a9bd4da4f5e099b10dc101f562357c12ac5a1ae6e5fe2956047d92a9', 44, '20', 'Pending', ''),
(53, 'e3936e8617029ca3d726a6b1150ef71af7f1b9c0ac71ece2c777b5aa5e00', 44, '20', 'Pending', ''),
(54, '2908cf26608f4d28ba481e0bca5fe19673b1045dc866ba4b852bea57391c', 44, '20', 'Pending', ''),
(55, '163353103577d43152a80a6988c55322cfd271938a45269c7a960604f64a', 44, '20', 'Pending', ''),
(56, 'e2837495f61dc8b73a2b32f4a5f64191bc29de1633a07c386e0850f74fcf', 43, '100', 'Pending', ''),
(57, 'df5a716f95fd83524a4699e9caede7679abe111f4975e2be09af6d28086a', 43, '100', 'Pending', ''),
(58, '21472ffe14453550bc5f3d1f737228ed020b6291b208caad6d2c6dde7fe1', 43, '100', 'Pending', ''),
(59, '20a06605ffe42b20ea2799eed91102a6c7cc00ba6eb8b6a96f18f2c727e1', 43, '100', 'Pending', ''),
(60, '5d05a39cf120043577a41714bc2b318192105bae4715cc0f02088d58ae38', 43, '100', 'Pending', ''),
(61, 'c10c5c9682cd8a17130eeb4649d8915e68d23ab52d9f4472268746cabedd', 43, '100', 'Pending', ''),
(62, '81e101352ea52669a98b146115cd21792fbe8a33983c5c7c1f75dc4ad884', 43, '100', 'Pending', ''),
(63, 'c95ac132a9c81c5a415cab6aa0bc3acff39f98b64dc2d587fd61cc7340af', 43, '100', 'Pending', ''),
(64, '19a86fae0b5d6e9b7afdca494faf6b7e1abc674bba7fadc83fcc1fe5c3f3', 43, '100', 'Pending', ''),
(65, '4afe1e5c28b8176e32165bb49e732665ed3735e80dfa75b1815b9f71798a', 43, '100', 'Pending', ''),
(66, '566e3cdc8da56099d76e', 43, '100', 'Pending', ''),
(67, 'XbrGOL7AmSjC97eB74SVu5o2YXLQD9', 18, '20', 'Pending', ''),
(68, '8c80f85bb44d450f5055', 44, '25', 'Pending', ''),
(69, '2699cda41984a629c41c', 44, '12', 'Pending', ''),
(70, 'c5990a9f2297f2a9f800', 43, '20', 'Pending', ''),
(71, 'a92777486b80b9b4549e', 16, '20', 'Pending', ''),
(72, '8308b95594b9fc4470e3', 16, '20', 'Pending', ''),
(73, 'ec6e53ac71161b283ddd', 16, '20', 'Pending', ''),
(74, 'b16d3d302e8c69bcf88c', 16, '20', 'Pending', ''),
(75, '0cff5daf2aed8ae60d23', 16, '20', 'Pending', ''),
(76, '10e44e77fd2b6b5a4db0', 16, '20', 'Pending', ''),
(77, 'fe2d84889450d309b4ae', 16, '20', 'Pending', ''),
(78, 'd475d974f86f0dcc37f8', 16, '20', 'Pending', ''),
(79, 'f4cf34636614eef7bcf0', 16, '20', 'Pending', ''),
(80, 'df52dde96e66cbf1fc0b', 11, '100', 'Pending', ''),
(81, 'aaa061e81b9913bbe0d7', 3, '10', 'Pending', ''),
(82, '0118a74f3ba0e8bb243e', 4, '100', 'Pending', ''),
(83, '59944b69c75ab6b316c9', 4, '20', 'Pending', ''),
(84, '9d77cccc893224db9e96', 4, '20', 'Pending', ''),
(85, '985e9601237223a2bebc', 4, '500', 'Pending', ''),
(86, '9f36e098bbc96bf77559', 4, '20', 'Pending', ''),
(87, '658bdf7bad27d7627cb4', 4, '11', 'Pending', ''),
(88, 'b97f5dad675749bf4838', 4, '12', 'Active', ''),
(89, '742423850bf25931e203', 3, '45', 'Pending', ''),
(90, '475f6ea7c84291fcfa5e', 18, '200', 'Pending', ''),
(91, '91cfce4845f2eed48839', 18, '300', 'Pending', ''),
(92, '4464571067e6861aad31', 18, '200', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

CREATE TABLE IF NOT EXISTS `followup` (
`FollowUpId` int(11) NOT NULL,
  `FollowUpStatus` varchar(10) NOT NULL,
  `FollowUpType` varchar(10) NOT NULL,
  `FollowUpUniqueId` int(11) NOT NULL,
  `ResponseDetail` text NOT NULL,
  `Remarks` text NOT NULL,
  `NextFollowUpDate` varchar(20) NOT NULL,
  `DOF` varchar(20) NOT NULL,
  `DOD` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followup`
--

INSERT INTO `followup` (`FollowUpId`, `FollowUpStatus`, `FollowUpType`, `FollowUpUniqueId`, `ResponseDetail`, `Remarks`, `NextFollowUpDate`, `DOF`, `DOD`) VALUES
(1, 'Active', 'Call', 1, 'good', 'return fee issue', '0', '0', ''),
(2, 'Active', 'Call', 1, 'dsfsf', 'fdsfsdf', '1440367200', '1439157600', ''),
(3, 'Active', 'OCall', 1, 'very bad', 'poor guy.....\r\n', '1440972000', '1439848800', ''),
(4, 'Active', 'Enquiry', 1, 'good', 'xyz.............', '0', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `generalsetting`
--

CREATE TABLE IF NOT EXISTS `generalsetting` (
`Id` int(11) NOT NULL,
  `CurrentSession` varchar(10) NOT NULL,
  `BackUpPath` varchar(100) NOT NULL,
  `SchoolStartDate` varchar(20) NOT NULL,
  `SchoolName` varchar(500) NOT NULL,
  `SchoolAddress` text NOT NULL,
  `City` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `PIN` varchar(6) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `AlternateMobile` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Landline` varchar(12) NOT NULL,
  `Fax` varchar(12) NOT NULL,
  `DateOfEstablishment` varchar(100) NOT NULL,
  `Board` varchar(100) NOT NULL,
  `AffiliatedBy` varchar(100) NOT NULL,
  `RegistrationNo` varchar(100) NOT NULL,
  `AffiliationNo` varchar(100) NOT NULL,
  `DOE` varchar(20) NOT NULL,
  `DOEUsername` varchar(100) NOT NULL,
  `DOL` varchar(20) NOT NULL,
  `DOLUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalsetting`
--

INSERT INTO `generalsetting` (`Id`, `CurrentSession`, `BackUpPath`, `SchoolStartDate`, `SchoolName`, `SchoolAddress`, `City`, `District`, `PIN`, `State`, `Country`, `Mobile`, `AlternateMobile`, `Email`, `Landline`, `Fax`, `DateOfEstablishment`, `Board`, `AffiliatedBy`, `RegistrationNo`, `AffiliationNo`, `DOE`, `DOEUsername`, `DOL`, `DOLUsername`) VALUES
(1, '2015-2016', '', '1420153200', 'Junction School', 'aashima mall 5th floor ', 'bhopal', 'Bhopal', '462038', 'M.P', 'india', '8817507639', '', 'info@junctiontech.in', '0755258547', '', '1440540000', 'M.P ', 'AICT', '5256', '9865', '1435296180', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
`HeaderId` int(11) NOT NULL,
  `HRType` varchar(10) NOT NULL,
  `HeaderTitle` varchar(1000) NOT NULL,
  `HeaderContent` text NOT NULL,
  `HeaderDefault` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`HeaderId`, `HRType`, `HeaderTitle`, `HeaderContent`, `HeaderDefault`) VALUES
(1, '14', 'sadad', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE IF NOT EXISTS `house` (
`HouseId` int(11) NOT NULL,
  `HouseName` varchar(100) NOT NULL,
  `HouseStatus` varchar(10) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `Students` text NOT NULL,
  `HouseIncharge` text NOT NULL,
  `HouseCaptain` text NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOEUsername` varchar(100) NOT NULL,
  `DOL` varchar(10) NOT NULL,
  `DOLUsername` varchar(100) NOT NULL,
  `DOD` varchar(10) NOT NULL,
  `DODUsername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE IF NOT EXISTS `issue` (
`IssueId` int(11) NOT NULL,
  `IssueStatus` varchar(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `AdmissionId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `Session` varchar(12) NOT NULL,
  `MaterialType` varchar(100) NOT NULL,
  `Material` text NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Paid` decimal(10,2) NOT NULL,
  `PaidFrom` varchar(20) NOT NULL,
  `Remarks` text NOT NULL,
  `DOI` varchar(20) NOT NULL,
  `DOE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
`LanguageId` int(11) NOT NULL,
  `LanguageName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`LanguageId`, `LanguageName`) VALUES
(1, 'Hindi'),
(2, 'Dutch'),
(3, 'German'),
(4, 'Portuguese'),
(5, 'Spanish'),
(6, 'French'),
(7, 'urdu');

-- --------------------------------------------------------

--
-- Table structure for table `listbook`
--

CREATE TABLE IF NOT EXISTS `listbook` (
`ListBookId` int(11) NOT NULL,
  `Token` varchar(100) NOT NULL,
  `BookId` int(11) NOT NULL,
  `AccessionNo` varchar(100) NOT NULL,
  `IRStatus` varchar(10) NOT NULL,
  `ListBookStatus` varchar(10) NOT NULL,
  `ListBookCondition` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listbook`
--

INSERT INTO `listbook` (`ListBookId`, `Token`, `BookId`, `AccessionNo`, `IRStatus`, `ListBookStatus`, `ListBookCondition`) VALUES
(1, '7l6PIcuoQbz4kP3GLrOePnZQkYnpkn', 1, '2', 'Issued', 'Active', 2),
(2, 'kpIlsEIu9BfNHo1KXKmmBVI4JDQj9', 1, '1', 'Issued', 'Active', 3),
(3, '1', 1, '11', 'Issued', 'Active', 0),
(4, '1', 1, '45', '', 'Active', 0),
(5, 'FzcHDXIh9maKo6Fcw8he8OfCndydS', 1, '2', '', 'Pending', 0),
(6, 'FzcHDXIh9maKo6Fcw8he8OfCndydS', 1, '12', '', 'Pending', 0),
(7, 'nI5dDAC1eEqytl36oAbLbmLg1J6qY8', 1, '2', '', 'Pending', 0),
(8, '3l3mr5TDoSoLlNSm3QxNC0RXXYpqd', 2, '1', '', 'Pending', 0),
(9, 'GrBsN0t82j8Yp8zaHXezjFsmUtrnd', 1, '8', 'Issued', 'Active', 6),
(10, 'B9WWLnUUSz3w2f6tsPBShty3qtKEWY', 3, '90', 'Issued', 'Active', 0),
(11, '1', 3, '8987', '', 'Active', 0),
(12, 'e1KukweMTvIG6N7lnyPZPidv7uUu09', 2, '321', '', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `listbookconfirm`
--

CREATE TABLE IF NOT EXISTS `listbookconfirm` (
`ListBookConfirmId` int(11) NOT NULL,
  `Token` varchar(100) NOT NULL,
  `DOA` varchar(10) NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOEUsername` varchar(100) NOT NULL,
  `ListBookConfirmStatus` varchar(10) NOT NULL,
  `Remarks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listbookconfirm`
--

INSERT INTO `listbookconfirm` (`ListBookConfirmId`, `Token`, `DOA`, `DOE`, `DOEUsername`, `ListBookConfirmStatus`, `Remarks`) VALUES
(1, 'B9WWLnUUSz3w2f6tsPBShty3qtKEWY', '1435409880', '1435409880', 'masteruser', 'Active', ''),
(2, '1', '1439836200', '1438599120', 'masteruser', 'Active', ''),
(3, '1', '1438599420', '1438599420', 'masteruser', 'Active', ''),
(4, 'e1KukweMTvIG6N7lnyPZPidv7uUu09', '1438599480', '1438599480', 'masteruser', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`LocationId` int(11) NOT NULL,
  `LocationName` varchar(100) NOT NULL,
  `CalledAs` varchar(100) NOT NULL,
  `LocationStatus` varchar(10) NOT NULL,
  `DOD` varchar(20) NOT NULL,
  `DODUsername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masterentry`
--

CREATE TABLE IF NOT EXISTS `masterentry` (
`MasterEntryId` int(11) NOT NULL,
  `MasterEntryStatus` varchar(10) NOT NULL,
  `MasterEntryName` varchar(100) NOT NULL,
  `MasterEntryValue` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterentry`
--

INSERT INTO `masterentry` (`MasterEntryId`, `MasterEntryStatus`, `MasterEntryName`, `MasterEntryValue`) VALUES
(1, 'Active', 'AccountType', 'Cash'),
(2, 'Active', 'AccountType', 'Bank'),
(3, 'Active', 'AssignTo', 'Student'),
(4, 'Active', 'AssignTo', 'Staff'),
(5, 'Active', 'BookPurpose', 'Issue'),
(6, 'Active', 'BookPurpose', 'Reference'),
(7, 'Active', 'Gender', 'Male'),
(8, 'Active', 'Gender', 'Female'),
(9, 'Active', 'OtherAssignTo', 'Missing'),
(10, 'Active', 'OtherAssignTo', 'Damage'),
(11, 'Active', 'Resolution', '800x600'),
(12, 'Active', 'SalaryHeadType', 'Earning'),
(13, 'Active', 'SalaryHeadType', 'Deduction'),
(14, 'Active', 'HeaderFooter', 'Header'),
(15, 'Active', 'HeaderFooter', 'Footer'),
(16, 'Active', 'RouteTo', 'To Home'),
(17, 'Active', 'RouteTo', 'To School'),
(18, 'Active', 'AssignTo', 'Location'),
(19, 'Active', 'AssignTo', 'Other'),
(20, 'Active', 'GradingPoint', '1'),
(21, 'Active', 'GradingPoint', '2'),
(22, 'Active', 'GradingPoint', '3'),
(23, 'Active', 'GradingPoint', '4'),
(24, 'Active', 'GradingPoint', '5'),
(25, 'Active', 'GradingPoint', '6'),
(26, 'Active', 'GradingPoint', '7'),
(27, 'Active', 'GradingPoint', '8'),
(28, 'Active', 'GradingPoint', '9'),
(29, 'Active', 'GuestVistingPurpose', 'Enquiry'),
(30, 'Active', 'GuestVistingPurpose', 'Admission'),
(31, 'Active', 'EnquiryResponse', 'Bad'),
(32, 'Active', 'EnquiryResponse', 'Good'),
(33, 'Active', 'EnquiryResponse', 'Excellent'),
(34, 'Active', 'EnquiryType', 'Admission'),
(35, 'Active', 'EnquiryType', 'Fee Structure'),
(36, 'Active', 'Reference', 'STAFF'),
(37, 'Active', 'Reference', 'Students parents'),
(38, 'Active', 'ComplaintType', 'STAFF irresponsible'),
(39, 'Active', 'ComplaintType', 'Faculty '),
(40, 'Active', 'ComplaintType', 'Transport'),
(41, 'Active', 'ComplaintType', 'students'),
(42, 'Active', 'FeeType', 'registration fee'),
(43, 'Active', 'FeeType', 'admission fee'),
(44, 'Active', 'FeeType', 'tution fee'),
(45, 'Active', 'FeeType', 'Transport fee'),
(46, 'Active', 'IncomeAccount', 'STUDENTS'),
(47, 'Active', 'UserType', 'ACCOUNTANT'),
(48, 'Active', 'ExpenseAccount', 'Transport'),
(49, 'Active', 'ExpenseAccount', 'STAFF'),
(50, 'Active', 'StaffPosition', 'faculty'),
(51, 'Active', 'StockType', 'chocks and duster'),
(52, 'Active', 'RouteStoppage', 'boar office'),
(53, 'Active', 'RouteStoppage', 'cheatak bridge'),
(54, 'Active', 'RouteStoppage', 'BU university'),
(55, 'Active', 'ExamActivityType', 'Pass'),
(56, 'Active', 'ExamActivityType', 'Fail'),
(57, 'Active', 'CoScholasticPart', '50'),
(58, 'Active', 'CoScholasticPart', 'sc'),
(59, 'Active', 'Unit', 'dhozen'),
(60, 'Active', 'BloodGroup', 'o+'),
(61, 'Active', 'BloodGroup', 'AB+'),
(62, 'Active', 'BloodGroup', 'B+'),
(63, 'Active', 'Caste', 'sc'),
(64, 'Active', 'Caste', 'ST'),
(65, 'Active', 'Caste', 'OBC'),
(66, 'Active', 'Caste', 'GEN'),
(67, 'Active', 'Distance', '5km'),
(68, 'Active', 'Distance', '10km'),
(69, 'Active', 'Distance', '15km'),
(70, 'Active', 'Distance', '20km'),
(71, 'Active', 'StaffDocuments', 'PaaPort'),
(72, 'Active', 'StaffDocuments', 'Resume'),
(73, 'Active', 'StaffDocuments', 'UID'),
(74, 'Active', 'StudentsDocuments', 'UID'),
(75, 'Active', 'StudentsDocuments', 'TC'),
(76, 'Active', 'TerminationReason', 'Persional'),
(77, 'Active', 'TerminationReason', 'bad behavior'),
(78, 'Active', 'TerminationReason', 'Not Fit'),
(79, 'Active', 'Unit', 'Meter'),
(80, 'Active', 'UserType', 'STAFF'),
(81, 'Active', 'UserType', 'Parents'),
(82, 'Active', 'UserType', 'students'),
(83, 'Active', 'Distance', '50km'),
(84, 'Active', 'StaffPosition', 'driver'),
(85, 'Active', 'UserType', 'Transportor'),
(86, 'Active', 'UserType', 'Teacher'),
(87, 'Active', 'UserType', 'Manage Event'),
(88, 'Active', 'UserType', 'bus condactor'),
(89, 'Active', 'SalaryPaymentType', 'Cash'),
(90, 'Active', 'SalaryPaymentType', 'Check'),
(91, 'Active', 'Result', 'Pass'),
(92, 'Active', 'Result', 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `masterentrycategory`
--

CREATE TABLE IF NOT EXISTS `masterentrycategory` (
`MasterEntryCategoryId` int(11) NOT NULL,
  `MasterEntryCategoryName` varchar(100) NOT NULL,
  `MasterEntryCategoryValue` varchar(100) NOT NULL,
  `Permission` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterentrycategory`
--

INSERT INTO `masterentrycategory` (`MasterEntryCategoryId`, `MasterEntryCategoryName`, `MasterEntryCategoryValue`, `Permission`) VALUES
(1, 'Gender', 'Gender', 'Webmaster'),
(2, 'Account Type', 'AccountType', 'Webmaster'),
(3, 'User Type', 'UserType', ''),
(4, 'Fee Type', 'FeeType', ''),
(5, 'Distance', 'Distance', ''),
(7, 'Exam Activity Type', 'ExamActivityType', ''),
(8, 'Staff Position', 'StaffPosition', ''),
(9, 'Route Stoppage', 'RouteStoppage', ''),
(10, 'Enquiry Response', 'EnquiryResponse', ''),
(11, 'Reference', 'Reference', ''),
(12, 'Enquiry Type', 'EnquiryType', ''),
(13, 'Caste', 'Caste', ''),
(14, 'Category', 'Category', ''),
(15, 'Blood Group', 'BloodGroup', ''),
(16, 'Students Documents', 'StudentsDocuments', ''),
(17, 'Resolution', 'Resolution', 'Webmaster'),
(18, 'Complaint Type', 'ComplaintType', ''),
(19, 'Guest Visiting Purpose', 'GuestVistingPurpose', ''),
(20, 'Salary Head Type', 'SalaryHeadType', 'Webmaster'),
(21, 'Income Account', 'IncomeAccount', ''),
(22, 'Expense Account', 'ExpenseAccount', ''),
(23, 'Print Category', 'PrintCategory', 'Webmaster'),
(24, 'Book Purpose', 'BookPurpose', 'Webmaster'),
(25, 'Co Scholastic Part', 'CoScholasticPart', ''),
(26, 'Grading Point', 'GradingPoint', 'Webmaster'),
(27, 'Staff Documents', 'StaffDocuments', ''),
(28, 'Stock Type', 'StockType', ''),
(29, 'Unit', 'Unit', ''),
(30, 'Assign To', 'AssignTo', 'Webmaster'),
(31, 'Other Assign To', 'OtherAssignTo', 'Webmaster'),
(32, 'Header Footer', 'HeaderFooter', 'Webmaster'),
(33, 'Route To', 'RouteTo', 'Webmaster'),
(34, 'Termination Reason', 'TerminationReason', ''),
(35, 'SalaryPaymentType', 'SalaryPaymentType', ''),
(36, 'Result', 'Result', '');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
`NoteId` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `UniqueId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Content` text NOT NULL,
  `Date` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`NoteId`, `Username`, `UniqueId`, `Name`, `Content`, `Date`) VALUES
(2, 'masteruser', 3, 'Income', 'dsfsdfs', '1435392120'),
(3, 'masteruser', 3, 'Income', 'lkjl;jkl;', '1435392120');

-- --------------------------------------------------------

--
-- Table structure for table `ocalling`
--

CREATE TABLE IF NOT EXISTS `ocalling` (
`OCallId` int(11) NOT NULL,
  `CallStatus` varchar(10) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Landline` varchar(12) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `FollowUpDate` varchar(20) NOT NULL,
  `CallDuration` varchar(100) NOT NULL,
  `Remarks` text NOT NULL,
  `DOC` varchar(20) NOT NULL,
  `DOE` varchar(20) NOT NULL,
  `DOD` varchar(20) NOT NULL,
  `DLU` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ocalling`
--

INSERT INTO `ocalling` (`OCallId`, `CallStatus`, `Mobile`, `Landline`, `Name`, `FollowUpDate`, `CallDuration`, `Remarks`, `DOC`, `DOE`, `DOD`, `DLU`) VALUES
(1, 'Active', '9630709559', '0755258547', 'ankit', '1440540000', '5 min', '..', '1440540000', '1435298280', '', '1435298340');

-- --------------------------------------------------------

--
-- Table structure for table `pagename`
--

CREATE TABLE IF NOT EXISTS `pagename` (
`PageNameId` int(11) NOT NULL,
  `PageName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagename`
--

INSERT INTO `pagename` (`PageNameId`, `PageName`) VALUES
(1, 'MasterEntry'),
(2, 'ManageUser'),
(3, 'ManageAccounts'),
(4, 'ManageClass'),
(5, 'ManageSubject'),
(6, 'ManageExam'),
(7, 'ManageSCArea'),
(8, 'Payment'),
(9, 'StudentAttendanceReport'),
(10, 'ExamReport'),
(11, 'ManageSCIndicator'),
(12, 'ManageFee'),
(13, 'salaryhead'),
(14, 'salarystructure'),
(15, 'schoolmaterial'),
(16, 'ManageLocation'),
(17, 'ManageHeaderFooter'),
(18, 'PrintOption'),
(19, 'Permission'),
(20, 'Registration'),
(21, 'Admission'),
(22, 'Promotion'),
(23, 'UpdateFee'),
(24, 'UpdateClass'),
(25, 'AdmissionReport'),
(26, 'StaffAttendence'),
(27, 'StaffAttendenceReport'),
(28, 'StudentAttendence'),
(29, 'StudentAttendenceReport'),
(30, 'MarksSetUp'),
(31, 'ScMarksSetUp'),
(32, 'ExamReport'),
(33, 'PrintExamReport'),
(34, 'Call'),
(35, 'FollowUp'),
(36, 'OCall'),
(37, 'FollowUpOtherCall'),
(38, 'Enquiry'),
(39, 'FollowUpEnquiry'),
(40, 'Complaint'),
(41, 'Visitor'),
(42, 'ManageStaff'),
(43, 'FeePayment'),
(44, 'Expense'),
(45, 'Income'),
(46, 'Transport'),
(47, 'TransportRoute');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
`PermissionId` int(11) NOT NULL,
  `UserType` int(11) NOT NULL,
  `PermissionString` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`PermissionId`, `UserType`, `PermissionString`) VALUES
(1, 47, '44,43,45,3'),
(2, 80, '4,5'),
(3, 81, '10,43,9'),
(4, 82, '32,43,9'),
(5, 87, '21,25,17,16,18,15'),
(6, 86, '21,25,32,4,6,12,7,11,5,33,20,26,9,24,23'),
(7, 85, '46,47');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
`PhotoId` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Path` varchar(100) NOT NULL,
  `Document` int(11) NOT NULL,
  `Detail` varchar(100) NOT NULL,
  `UniqueId` int(11) NOT NULL,
  `DOE` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`PhotoId`, `Title`, `Path`, `Document`, `Detail`, `UniqueId`, `DOE`) VALUES
(12, 'image', 'image-StaffDocuments-1.jpg', 71, 'StaffDocuments', 1, '1440568500'),
(13, 'testing', '8452df2c902261073a842835cbc4ca723d31bd2214405709063.jpg', 71, 'StaffDocuments', 1, '1440540000'),
(14, 'testing2', '2360caf2992d2d569804b0cc926e17a6ff5fcaae14405710289.jpg', 72, 'StaffDocuments', 1, '1440540000'),
(15, 'testing 3', '987a9b2c872ca170f543814f68db96e760298f9514405710642.jpg', 73, 'StaffDocuments', 1, '1440540000'),
(16, 'testing4', 'bf985db725ae8b45c015baab1dea441297b6785d14405711421.jpg', 71, 'StaffDocuments', 1, '1440540000'),
(17, 'tsesting5', '8118173f6961cbfe79d7861da85d0dd35158492f14405711655.jpg', 72, 'StaffDocuments', 1, '1440540000'),
(18, 'testing6', 'da405a634b6e23353a86a1acdff0a847b16770ca14405711868.jpg', 72, 'StaffDocuments', 1, '1440540000'),
(19, 'testing', 'testing-StudentDocuments-6.jpg', 74, 'StudentDocuments', 6, '1441023360'),
(20, 'testing2', '8118173f6961cbfe79d7861da85d0dd35158492f14410250864.jpg', 75, 'StudentDocuments', 6, '1440972000'),
(21, 'testing3', '80d172edd16c3e72166685de9b3f3a4a671aea4c14410253952.jpg', 74, 'StudentDocuments', 6, '1440972000'),
(22, 'testing4', '2360caf2992d2d569804b0cc926e17a6ff5fcaae14410254299.jpg', 75, 'StudentDocuments', 6, '1440972000');

-- --------------------------------------------------------

--
-- Table structure for table `phrase`
--

CREATE TABLE IF NOT EXISTS `phrase` (
`PhraseId` int(11) NOT NULL,
  `Phrase` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phrase`
--

INSERT INTO `phrase` (`PhraseId`, `Phrase`) VALUES
(1, 'Front Office'),
(2, 'Call & Follow-up'),
(3, 'Other Call'),
(4, 'Enquiry'),
(5, 'Complaint'),
(6, 'Visitor Book'),
(7, 'Admission'),
(8, 'Registration'),
(9, 'Promotion'),
(10, 'Update Fee'),
(11, 'Reports'),
(12, 'Admission Report'),
(13, 'Fee Payment'),
(14, 'Transaction'),
(15, 'Expense'),
(16, 'Income'),
(17, 'Attendance'),
(18, 'Staff Attendance'),
(19, 'Student Attendance'),
(20, 'Staff Attendance Report'),
(21, 'Student Attendance Report'),
(22, 'Transport'),
(23, 'Transport Route'),
(24, 'Exam'),
(25, 'Scholastic Grade'),
(26, 'Co Scholastic Grade'),
(27, 'Exam Report'),
(28, 'Manage Staff'),
(29, 'Library'),
(30, 'Manage Books'),
(31, 'Issue & Return'),
(32, 'Dispatch & Receiving'),
(33, 'Dispatch'),
(34, 'Receiving'),
(35, 'Stock'),
(36, 'Manage Stock'),
(37, 'Stock Transfer'),
(38, 'Purchase Material'),
(39, 'Supplier'),
(40, 'Purchase'),
(41, 'Issue Material'),
(42, 'Stock Report'),
(43, 'School Material'),
(44, 'Issue Report'),
(45, 'Purchase Report'),
(46, 'SMS'),
(47, 'Setting'),
(48, 'General Setting'),
(49, 'Master Entry'),
(50, 'Manage User'),
(51, 'Manage Accounts'),
(52, 'Manage Class'),
(53, 'Manage Subject'),
(54, 'Manage Exam'),
(55, 'Manage SC Area'),
(56, 'Manage SC Indicator'),
(57, 'Manage Fee'),
(58, 'Salary Head'),
(59, 'Salary Structure'),
(60, 'School Material'),
(61, 'Manage Location'),
(62, 'Header & Footer'),
(63, 'Permission'),
(64, 'Current Session'),
(65, 'Navigation'),
(66, 'Graph Report'),
(67, 'Calendar');

-- --------------------------------------------------------

--
-- Table structure for table `printoption`
--

CREATE TABLE IF NOT EXISTS `printoption` (
`PrintOptionId` int(11) NOT NULL,
  `PrintCategory` int(11) NOT NULL,
  `Width` decimal(10,0) NOT NULL,
  `HeaderId` varchar(10) NOT NULL,
  `FooterId` varchar(10) NOT NULL,
  `PrintOptionStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
`PurchaseId` int(11) NOT NULL,
  `PurchaseStatus` varchar(10) NOT NULL,
  `Token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SupplierId` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Paid` decimal(10,2) NOT NULL,
  `DOP` varchar(20) NOT NULL,
  `DOE` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DOD` varchar(20) NOT NULL,
  `Remarks` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`PurchaseId`, `PurchaseStatus`, `Token`, `SupplierId`, `Total`, `Paid`, `DOP`, `DOE`, `DOD`, `Remarks`) VALUES
(1, 'Active', '4CuX77yOU7yG1d6bAT5Uf39T1drp7', 1, '10.00', '0.00', '1435315500', '1435315500', '', '....');

-- --------------------------------------------------------

--
-- Table structure for table `purchaselist`
--

CREATE TABLE IF NOT EXISTS `purchaselist` (
`PurchaseListId` int(11) NOT NULL,
  `Token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MaterialType` varchar(100) NOT NULL,
  `UniqueId` int(11) NOT NULL,
  `Quantity` decimal(10,2) NOT NULL,
  `PurchasePrice` decimal(10,2) NOT NULL,
  `OtherInfo` text NOT NULL,
  `Date` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaselist`
--

INSERT INTO `purchaselist` (`PurchaseListId`, `Token`, `MaterialType`, `UniqueId`, `Quantity`, `PurchasePrice`, `OtherInfo`, `Date`) VALUES
(1, '4CuX77yOU7yG1d6bAT5Uf39T1drp7', 'Stock', 1, '1.00', '10.00', '...,', '1435315500');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
`QualificationId` int(11) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `UniqueId` int(11) NOT NULL,
  `BoardUniversity` varchar(200) NOT NULL,
  `Class` varchar(100) NOT NULL,
  `Year` varchar(100) NOT NULL,
  `Marks` varchar(100) NOT NULL,
  `Remarks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`QualificationId`, `Type`, `UniqueId`, `BoardUniversity`, `Class`, `Year`, `Marks`, `Remarks`) VALUES
(1, 'Staff', 1, 'RGPV', 'BE,CSE', '2013', '75', 'good'),
(2, 'Staff', 1, 'CBSE', '12th', '2009', '82.22', 'good'),
(3, 'Student', 6, 'mp board', '8th', '2011', '66.60', 'testing'),
(4, 'Student', 6, 'm.p board', '9th', '2012', '75.8', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
`RegistrationId` int(11) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `FatherMobile` varchar(10) NOT NULL,
  `FatherDateOfBirth` varchar(10) NOT NULL,
  `FatherEmail` varchar(100) NOT NULL,
  `FatherQualification` varchar(100) NOT NULL,
  `FatherOccupation` varchar(100) NOT NULL,
  `FatherDesignation` varchar(100) NOT NULL,
  `FatherOrganization` varchar(100) NOT NULL,
  `MotherName` varchar(100) NOT NULL,
  `MotherMobile` varchar(10) NOT NULL,
  `MotherDateOfBirth` varchar(10) NOT NULL,
  `MotherEmail` varchar(100) NOT NULL,
  `MotherQualification` varchar(100) NOT NULL,
  `MotherOccupation` varchar(100) NOT NULL,
  `MotherDesignation` varchar(100) NOT NULL,
  `MotherOrganization` varchar(100) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `DOR` varchar(20) NOT NULL,
  `DOE` varchar(20) NOT NULL,
  `Landline` varchar(12) NOT NULL,
  `AlternateMobile` varchar(10) NOT NULL,
  `PresentAddress` text NOT NULL,
  `PermanentAddress` text NOT NULL,
  `BloodGroup` int(11) NOT NULL,
  `Caste` int(11) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Gender` int(11) NOT NULL,
  `Nationality` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `ParentsPassword` varchar(100) NOT NULL,
  `StudentsPassword` varchar(100) NOT NULL,
  `DOL` varchar(10) NOT NULL,
  `DOLUsername` varchar(100) NOT NULL,
  `DOD` varchar(10) NOT NULL,
  `DODUsername` varchar(100) NOT NULL,
  `DateOfTermination` varchar(10) NOT NULL,
  `TerminationReason` varchar(10) NOT NULL,
  `TerminationRemarks` text NOT NULL,
  `DOT` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`RegistrationId`, `Session`, `Status`, `StudentName`, `FatherName`, `FatherMobile`, `FatherDateOfBirth`, `FatherEmail`, `FatherQualification`, `FatherOccupation`, `FatherDesignation`, `FatherOrganization`, `MotherName`, `MotherMobile`, `MotherDateOfBirth`, `MotherEmail`, `MotherQualification`, `MotherOccupation`, `MotherDesignation`, `MotherOrganization`, `Mobile`, `SectionId`, `DOB`, `DOR`, `DOE`, `Landline`, `AlternateMobile`, `PresentAddress`, `PermanentAddress`, `BloodGroup`, `Caste`, `Category`, `Gender`, `Nationality`, `Username`, `ParentsPassword`, `StudentsPassword`, `DOL`, `DOLUsername`, `DOD`, `DODUsername`, `DateOfTermination`, `TerminationReason`, `TerminationRemarks`, `DOT`) VALUES
(1, '2015-2016', 'Studying', 'mohan', 'sumit', '', '', '', '', '', '', '', 'preety', '', '', '', '', '', '', '', '7894881750', 1, '', '1435300320', '1435300320', '', '', '', '', 0, 0, '', 7, 0, 'masteruser', '237576', '955834', '', '', '', '', '', '', '', ''),
(2, '2015-2016', 'Studying', 'geeta', 'rajesh', '', '', '', '', '', '', '', 'sita', '', '', '', '', '', '', '', '7788994455', 2, '1433097000', '1435300380', '1435300380', '', '', '', '', 61, 66, '', 8, 0, 'masteruser', '711471', '458319', '', '', '', '', '', '', '', ''),
(3, '2015-2016', 'Studying', 'john', 'petor', '', '', '', '', '', '', '', 'aena', '', '', '', '', '', '', '', '1122334455', 3, '', '1435300440', '1435300440', '', '', '', '', 0, 0, '', 7, 0, 'masteruser', '717349', '953527', '', '', '', '', '', '', '', ''),
(4, '2015-2016', 'Studying', 'ramesh', 'shyam', '', '', '', '', '', '', '', 'shivwati', '', '', '', '', '', '', '', '8847956845', 1, '', '1435300440', '1435300500', '', '', '', '', 0, 0, '', 7, 0, 'masteruser', '856381', '159820', '', '', '', '', '', '', '', ''),
(5, '2015-2016', 'Studying', 'munna pal', 'rajesh pal', '', '', '', '', '', '', '', 'mala pal', '', '', '', '', '', '', '', '8967678956', 9, '', '1438577280', '1438593840', '', '', '', '', 0, 0, '', 7, 0, 'masteruser', '277072', '515228', '', '', '', '', '', '', '', ''),
(6, '2015-2016', 'Terminated', 'amar singh', 'narsingh singh', '7865786798', '1440990379', 'narsingh@gmail.com', 'MBBS', 'doctor', 'senior doctor', 'private hospital', 'suseela', '7689098767', '1440997579', 'mother@gmail.com', 'BSC.', 'Home maker', 'nill', 'self', '7689785600', 7, '1092853800', '1438567080', '1438593900', '0755456788', '6598875487', '10 no. stop bhopal', 'bhopal', 62, 65, '', 7, 0, 'masteruser', '909088', '230874', '', '', '', '', '1440972000', '77', 'testing', '1441021260'),
(7, '2015-2016', 'Studying', 'raam sharma', 'mohan sharma', '', '', '', '', '', '', '', 'neeta', '', '', '', '', '', '', '', '8978677898', 7, '', '1438571100', '1438593960', '', '', '', '', 0, 0, '', 7, 0, 'masteruser', '442910', '516491', '', '', '', '', '', '', '', ''),
(8, '2015-2016', 'Studying', 'rahul gupta', 'ramesh gupta', '', '', '', '', '', '', '', 'juhi gupta', '', '', '', '', '', '', '', '9898789089', 8, '', '1438649760', '1438594080', '', '', '', '', 0, 0, '', 7, 0, 'masteruser', '303027', '401547', '', '', '', '', '', '', '', ''),
(9, '2015-2016', 'Studying', 'seema tiwari', 'om tiwari', '', '', '', '', '', '', '', 'veenita tiwari', '', '', '', '', '', '', '', '7865788987', 8, '', '1438671720', '1438594140', '', '', '', '', 0, 0, '', 8, 0, 'masteruser', '277841', '958526', '', '', '', '', '', '', '', ''),
(10, '2015-2016', 'Studying', 'rushada khan', 'wasim khan', '', '', '', '', '', '', '', 'sakila khan', '', '', '', '', '', '', '', '8970896789', 8, '', '1438668660', '1438594200', '', '', '', '', 0, 0, '', 8, 0, 'masteruser', '426019', '519046', '', '', '', '', '', '', '', ''),
(11, '2015-2016', 'Studying', 'amrish sharma', 'ritesh sharma', '', '', '', '', '', '', '', 'mala sharma', '', '', '', '', '', '', '', '9867567890', 7, '', '1438934100', '1438934100', '', '', '', '', 0, 0, '', 7, 0, 'masteruser', '414923', '551455', '', '', '', '', '', '', '', ''),
(12, '2015-2016', 'Studying', 'rajnish mehta', 'dinesh mehta', '', '', '', '', '', '', '', 'priya mehta', '', '', '', '', '', '', '', '7898897876', 9, '', '1438934220', '1438934220', '', '', '', '', 0, 0, '', 7, 0, 'masteruser', '467520', '302038', '', '', '', '', '', '', '', ''),
(13, '2015-2016', 'Studying', 'shyam chourasiya', 'ram singh chourasiya', '', '', '', '', '', '', '', 'vimla chourasiya', '', '', '', '', '', '', '', '9878908990', 9, '', '1438934280', '1438934280', '', '', '', '', 0, 0, '', 7, 0, 'masteruser', '953198', '650057', '', '', '', '', '', '', '', ''),
(14, '2015-2016', 'Studying', 'Rooma singh thakur', 'Roop singh thakur', '', '', '', '', '', '', '', 'payal singh thakur', '', '', '', '', '', '', '', '8978980987', 8, '', '1438934400', '1438934400', '', '', '', '', 0, 0, '', 8, 0, 'masteruser', '161825', '940948', '', '', '', '', '', '', '', ''),
(15, '2015-2016', 'Studying', 'tinku verma', 'Amit verma', '', '', '', '', '', '', '', 'Reeta verma', '', '', '', '', '', '', '', '7889988778', 8, '', '1438649760', '1438934460', '', '', '', '', 0, 0, '', 7, 0, 'masteruser', '631463', '400173', '', '', '', '', '', '', '', ''),
(16, '2015-2016', 'Studying', 'amit yadav', 'mahesh yadav', '8978768989', '', '', '', '', '', '', 'sushila yadav', '9876890987', '', '', '', '', '', '', '9987867566', 11, '1442581815', '1442540880', '1438934520', '0755457683', '', 'ashok garden h.no. 234 bank colony', '', 0, 0, '', 7, 0, 'masteruser', '660769', '610864', '', '', '', '', '', '', '', ''),
(17, '2015-2016', 'Studying', 'nidhi sisodiya', 'rajesh sisodiya', '', '', '', '', '', '', '', 'kamla sisodiya', '', '', '', '', '', '', '', '8909787898', 8, '', '1438664820', '1438934640', '', '', '', '', 0, 0, '', 8, 0, 'masteruser', '683703', '234225', '', '', '', '', '', '', '', ''),
(22, '2016-2017', 'NotAdmitted', 'simmy', 'kaur', '', '', '', '', '', '', '', 'kaur', '', '', '', '', '', '', '', '5698874578', 12, '', '1440959400', '1441002720', '', '', '', '', 0, 0, '', 8, 0, 'masteruser', '583700', '350323', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `salaryhead`
--

CREATE TABLE IF NOT EXISTS `salaryhead` (
`SalaryHeadId` int(11) NOT NULL,
  `SalaryHeadType` int(11) NOT NULL,
  `SalaryHead` varchar(100) NOT NULL,
  `Code` varchar(100) NOT NULL,
  `DailyBasis` int(1) NOT NULL,
  `SalaryHeadStatus` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaryhead`
--

INSERT INTO `salaryhead` (`SalaryHeadId`, `SalaryHeadType`, `SalaryHead`, `Code`, `DailyBasis`, `SalaryHeadStatus`) VALUES
(1, 13, 'GH', '2', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `salarystructure`
--

CREATE TABLE IF NOT EXISTS `salarystructure` (
`SalaryStructureId` int(11) NOT NULL,
  `SalaryStructureName` varchar(100) NOT NULL,
  `FixedSalaryHead` text NOT NULL,
  `SalaryStructureStatus` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salarystructure`
--

INSERT INTO `salarystructure` (`SalaryStructureId`, `SalaryStructureName`, `FixedSalaryHead`, `SalaryStructureStatus`) VALUES
(1, 'xyz', '1', 'Active'),
(2, 'nidhi', '1', 'Active'),
(3, 'sandeep', '1', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `salarystructuredetail`
--

CREATE TABLE IF NOT EXISTS `salarystructuredetail` (
`SalaryStructureDetailId` int(11) NOT NULL,
  `SalaryStructureId` int(11) NOT NULL,
  `SalaryHeadId` int(11) NOT NULL,
  `Expression` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scarea`
--

CREATE TABLE IF NOT EXISTS `scarea` (
`SCAreaId` int(11) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `SCPartId` int(11) NOT NULL,
  `GradingPoint` int(11) NOT NULL,
  `SCAreaName` varchar(100) NOT NULL,
  `SCAreaClass` text NOT NULL,
  `SCAreaStatus` varchar(10) NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scarea`
--

INSERT INTO `scarea` (`SCAreaId`, `Session`, `SCPartId`, `GradingPoint`, `SCAreaName`, `SCAreaClass`, `SCAreaStatus`, `DOE`, `DOL`) VALUES
(1, '2015-2016', 58, 28, 'xyz', '1,8', 'Active', '16-7-2015', ''),
(2, '2015-2016', 57, 28, 'abc', '1,2', 'Active', '1435307520', ''),
(3, '2015-2016', 57, 28, 'testing', '6,9', 'Active', '16-7-2015', ''),
(5, '2016-2017', 57, 26, 'gvsdfgs', '13,12', 'Active', '16-7-2015', ''),
(6, '2015-2016', 58, 26, 'hfgghfh', '7,1,2,4,5', 'Active', '16-7-2015', '');

-- --------------------------------------------------------

--
-- Table structure for table `scexamdetail`
--

CREATE TABLE IF NOT EXISTS `scexamdetail` (
`SCExamDetailId` int(11) NOT NULL,
  `ExamId` int(11) NOT NULL,
  `SCAreaId` int(11) NOT NULL,
  `Marks` text NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL,
  `DOLUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scexamdetail`
--

INSERT INTO `scexamdetail` (`SCExamDetailId`, `ExamId`, `SCAreaId`, `Marks`, `DOE`, `DOL`, `DOLUsername`) VALUES
(1, 1, 3, '65', '', '', ''),
(2, 1, 1, '', '1439536140', '', ''),
(3, 1, 2, '3-1,4-1', '1439537340', '', ''),
(4, 2, 2, '3-1,4-1', '1439553720', '1439553840', 'masteruser');

-- --------------------------------------------------------

--
-- Table structure for table `schoolmaterial`
--

CREATE TABLE IF NOT EXISTS `schoolmaterial` (
`SchoolMaterialId` int(11) NOT NULL,
  `SchoolMaterialStatus` varchar(10) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `SchoolMaterialType` varchar(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `BranchPrice` decimal(10,2) NOT NULL,
  `SellingPrice` decimal(10,2) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `DLU` varchar(20) NOT NULL,
  `DOD` varchar(20) NOT NULL,
  `DODUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolmaterial`
--

INSERT INTO `schoolmaterial` (`SchoolMaterialId`, `SchoolMaterialStatus`, `Session`, `SchoolMaterialType`, `ClassId`, `Name`, `Quantity`, `BranchPrice`, `SellingPrice`, `Date`, `DLU`, `DOD`, `DODUsername`) VALUES
(2, 'Active', '2016-2017', 'Books', 6, 'fdgd', 0, '56.00', '45.00', '1442491740', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `scindicator`
--

CREATE TABLE IF NOT EXISTS `scindicator` (
`SCIndicatorId` int(11) NOT NULL,
  `SCAreaId` int(11) NOT NULL,
  `SCIndicatorName` varchar(100) NOT NULL,
  `SCIndicatorStatus` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scindicator`
--

INSERT INTO `scindicator` (`SCIndicatorId`, `SCAreaId`, `SCIndicatorName`, `SCIndicatorStatus`) VALUES
(1, 2, 'xyz', 'Active'),
(2, 3, 'testing1', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
`SectionId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `SectionName` varchar(100) NOT NULL,
  `SectionStatus` varchar(10) NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`SectionId`, `ClassId`, `SectionName`, `SectionStatus`, `DOE`, `DOL`) VALUES
(1, 1, 'section A', 'Active', '1435300020', ''),
(2, 2, 'section A', 'Active', '1435300020', ''),
(3, 3, 'section A', 'Active', '1435300080', ''),
(4, 4, 'section A', 'Active', '1435300080', ''),
(5, 5, 'section A', 'Active', '1435300080', ''),
(6, 7, 'section A', 'Active', '1435382220', ''),
(7, 8, 'A', 'Active', '1438593660', ''),
(8, 9, 'A', 'Active', '1438593720', ''),
(9, 8, 'B', 'Active', '1438593720', ''),
(10, 10, 'A', 'Active', '1438593720', ''),
(11, 9, 'B', 'Active', '1438593780', ''),
(12, 6, 'A', 'Active', '1440401100', ''),
(13, 11, 'A', 'Active', '1442485080', '');

-- --------------------------------------------------------

--
-- Table structure for table `sibling`
--

CREATE TABLE IF NOT EXISTS `sibling` (
`SiblingId` int(11) NOT NULL,
  `RegistrationId` int(11) NOT NULL,
  `SName` varchar(100) NOT NULL,
  `SDOB` varchar(10) NOT NULL,
  `SClass` varchar(100) NOT NULL,
  `SSchool` text NOT NULL,
  `SRemarks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sibling`
--

INSERT INTO `sibling` (`SiblingId`, `RegistrationId`, `SName`, `SDOB`, `SClass`, `SSchool`, `SRemarks`) VALUES
(1, 6, 'sohan', '1440959400', '9th', 'red rose', 'testing'),
(2, 6, 'Roma', '1438725600', '8th', 'Maharishi', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`StaffId` int(11) NOT NULL,
  `StaffStatus` varchar(10) NOT NULL,
  `StaffPosition` int(11) NOT NULL,
  `StaffName` varchar(100) NOT NULL,
  `StaffMobile` varchar(10) NOT NULL,
  `StaffEmail` varchar(100) NOT NULL,
  `StaffAlternateMobile` varchar(10) NOT NULL,
  `StaffFName` varchar(10) NOT NULL,
  `StaffMName` varchar(10) NOT NULL,
  `StaffDOJ` varchar(20) NOT NULL,
  `StaffDOB` varchar(20) NOT NULL,
  `StaffPresentAddress` text NOT NULL,
  `StaffPermanentAddress` text NOT NULL,
  `StaffRemarks` text NOT NULL,
  `DOE` varchar(20) NOT NULL,
  `DLU` varchar(20) NOT NULL,
  `DOD` varchar(20) NOT NULL,
  `DODUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffId`, `StaffStatus`, `StaffPosition`, `StaffName`, `StaffMobile`, `StaffEmail`, `StaffAlternateMobile`, `StaffFName`, `StaffMName`, `StaffDOJ`, `StaffDOB`, `StaffPresentAddress`, `StaffPermanentAddress`, `StaffRemarks`, `DOE`, `DLU`, `DOD`, `DODUsername`) VALUES
(1, 'Active', 50, 'harshlata', '5456987821', 'harshlata@junctiontech.in', '9887546598', '0', '0', '1434479400', '1440441000', 'aashima mall bhopal', 'indore', '0', '1440453600', '1440489240', '', ''),
(2, 'Active', 50, 'sanu sir', '5447859656', '', '', '', '', '1435257000', '', '', '', '', '1435310280', '', '', ''),
(3, 'Active', 50, 'sandeep ', '5869475896', '', '', '', '', '1435343400', '', '', '', '', '1435397700', '', '', ''),
(4, 'Active', 84, 'ramesh', '4587895698', '', '', '', '', '1439231400', '1440441000', '', '', '', '1439288280', '1440503400', '', ''),
(5, 'Active', 84, 'Rakesh', '8754986578', 'rakesh@junctiontech.in', '6598784521', '0', '0', '1440453600', '1439935200', 'indore', 'bhopal', '0', '1440453600', '', '', ''),
(6, 'Active', 84, 'kamal', '5456987821', 'kamal@gmail.com', '6598875412', '0', '0', '1434479400', '605314800', 'aashima mall bhopal', 'karond bhopal', '0', '1442440800', '', '', ''),
(7, 'Active', 84, 'ramaa', '5698875478', '', '', '', '', '1442268000', '', '', '', '', '1442268000', '', '', ''),
(8, 'Active', 50, 'simmi', '2365898754', '', '', '', '', '1442255400', '', '', '', '', '1442315760', '', '', ''),
(9, 'Active', 84, 'ramlakhan', '5478986565', '', '', '', '', '1442268000', '', '', '', '', '1442268000', '', '', ''),
(10, 'Active', 0, '', '', '', '', '', '', '0', '', '', '', '', '1442354400', '', '', ''),
(11, 'Active', 50, 'testing', '8817507639', '', '', '', '', '1442354400', '', '', '', '', '1442354400', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `staffattendance`
--

CREATE TABLE IF NOT EXISTS `staffattendance` (
`StaffAttendanceId` int(11) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Attendance` text NOT NULL,
  `DOL` varchar(10) NOT NULL,
  `DOLUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffattendance`
--

INSERT INTO `staffattendance` (`StaffAttendanceId`, `Date`, `Attendance`, `DOL`, `DOLUsername`) VALUES
(50, '1439762400', '1-P-1439330400-1439815810-1439803500,3-P-1439330400-1439815810-1439803500,4-A-1439330400-1439815810-1439803500,2-A-1439330400-1439815810-1439803500', '1439330400', 'masteruser'),
(51, '1438552800', '4-P-1439330400-1438606510-1438593900,2-P-1439330400-1438606510-1438593900,1-A-1439330400-1438606510-1438593900,3-A-1439330400-1438606510-1438593900', '1439330400', 'masteruser'),
(52, '1442181600', '---1442236510-1442222700,1-P-1442181600-1442236510-1442222700,6-A-1442181600-1442236510-1442222700,5-A-1442181600-1442236510-1442222700,4-A-1442181600-1442236510-1442222700', '1442181600', ''),
(53, '1442268000', '1-P-1442181600-1442322955-1442309100,6-P-1442181600-1442322955-1442309100,5-P-1442181600-1442322955-1442309100,4-P-1442181600-1442322955-1442309100,3-A-1442181600-1442322955-1442309100,2-A-1442181600-1442322955-1442309100', '1442181600', ''),
(54, '1442169000', '1-P-1442223900-1442223900-1442224980,6-P-1442223900-1442223900-1442224980,5-A-1442223900-1442223900-1442224980,4-A-1442223900-1442223900-1442224980,3-A-1442223900-1442223900-1442224980,2-A-1442223900-1442223900-1442224980', '1442223900', 'masteruser'),
(55, '1442959200', '1-P-1442181600-1443014400-1443000300,6-P-1442181600-1443014400-1443000300,5-P-1442181600-1443014400-1443000300,4-P-1442181600-1443014400-1443000300,3-P-1442181600-1443014400-1443000300,2-P-1442181600-1443014400-1443000300', '1442181600', ''),
(56, '1444687200', '1-P-1442181600-1444742420-1444728300,6-P-1442181600-1444742420-1444728300,5-P-1442181600-1444742420-1444728300,4-P-1442181600-1444742420-1444728300,3-P-1442181600-1444742420-1444728300,2-P-1442181600-1444742420-1444728300', '1442181600', ''),
(57, '1444082400', '6-P-1442181600-1444137955-1444123500,1-A-1442181600-1444137955-1444123500,5-A-1442181600-1444137955-1444123500,4-A-1442181600-1444137955-1444123500,3-A-1442181600-1444137955-1444123500,2-A-1442181600-1444137955-1444123500', '1442181600', ''),
(58, '1441490400', '1-P-1442181600-1441545905-1441531500,6-A-1442181600-1441545905-1441531500,5-A-1442181600-1441545905-1441531500,4-A-1442181600-1441545905-1441531500,3-A-1442181600-1441545905-1441531500,2-A-1442181600-1441545905-1441531500', '1442181600', ''),
(59, '1443650400', '1-P-1442181600-1443705950-1443691500,6-A-1442181600-1443705950-1443691500,5-A-1442181600-1443705950-1443691500,4-A-1442181600-1443705950-1443691500,3-A-1442181600-1443705950-1443691500,2-A-1442181600-1443705950-1443691500', '1442181600', '');

-- --------------------------------------------------------

--
-- Table structure for table `staffsalary`
--

CREATE TABLE IF NOT EXISTS `staffsalary` (
`StaffSalaryId` int(11) NOT NULL,
  `StaffSalaryStatus` varchar(10) NOT NULL,
  `StaffId` int(11) NOT NULL,
  `SalaryStructureId` int(11) NOT NULL,
  `FixedSalary` text NOT NULL,
  `StaffPaidLeave` int(11) NOT NULL,
  `EffectiveFrom` varchar(20) NOT NULL,
  `DOE` varchar(20) NOT NULL,
  `Remarks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffsalary`
--

INSERT INTO `staffsalary` (`StaffSalaryId`, `StaffSalaryStatus`, `StaffId`, `SalaryStructureId`, `FixedSalary`, `StaffPaidLeave`, `EffectiveFrom`, `DOE`, `Remarks`) VALUES
(1, 'Active', 5, 1, '1-1', 2, '1440527400', '1440498540', 'testing'),
(2, 'Active', 1, 1, '1-5', 1, '1440613800', '1440572160', 'xyz'),
(3, 'Active', 7, 2, '1-12', 1, '1443551400', '1442323920', 'fdgf'),
(4, 'Active', 7, 3, '1-11', 2, '1443551400', '1442323980', 'bcb'),
(5, 'Active', 1, 2, '1-2', 2, '1442354400', '1442354400', 'dfgdfg'),
(6, 'Active', 6, 3, '1-122', 2, '1442440800', '1442440800', ''),
(7, 'Active', 6, 2, '1-12', 5, '1442440800', '1442440800', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
`StockId` int(11) NOT NULL,
  `StockStatus` varchar(10) NOT NULL,
  `StockType` int(11) NOT NULL,
  `StockName` varchar(500) NOT NULL,
  `Unit` int(11) NOT NULL,
  `OpeningStock` decimal(10,2) NOT NULL,
  `CurrentStock` decimal(10,2) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `DLU` varchar(20) NOT NULL,
  `DOD` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`StockId`, `StockStatus`, `StockType`, `StockName`, `Unit`, `OpeningStock`, `CurrentStock`, `Date`, `DLU`, `DOD`) VALUES
(1, 'Active', 51, 'xyz', 59, '2.00', '1.00', '1435315200', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stockassign`
--

CREATE TABLE IF NOT EXISTS `stockassign` (
`StockAssignId` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `StockAssignStatus` varchar(10) NOT NULL,
  `StockId` int(11) NOT NULL,
  `Quantity` decimal(10,2) NOT NULL,
  `Returning` decimal(10,2) NOT NULL,
  `AssignTo` varchar(100) NOT NULL,
  `AssignToDetail` varchar(100) NOT NULL,
  `DOT` varchar(20) NOT NULL,
  `Remarks` text NOT NULL,
  `DOE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentattendance`
--

CREATE TABLE IF NOT EXISTS `studentattendance` (
`StudentAttendanceId` int(11) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Attendance` text NOT NULL,
  `DOL` varchar(10) NOT NULL,
  `DOLUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentattendance`
--

INSERT INTO `studentattendance` (`StudentAttendanceId`, `Date`, `Attendance`, `DOL`, `DOLUsername`) VALUES
(27, '1439244000', '12-P-1439330400,10-P-1439330400,14-P-1439330400,7-P-1439330400,9-P-1439330400,17-A-1439330400', '1439330400', ''),
(28, '1440972000', '12-P-1439330400,10-P-1439330400,14-P-1439330400,7-P-1439330400,17-P-1439330400,9-A-1439330400', '1439330400', ''),
(29, '1442181600', '--,14-P-1442181600,7-P-1442181600,9-P-1442181600,17-P-1442181600,12-A-1442181600', '1442181600', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentfee`
--

CREATE TABLE IF NOT EXISTS `studentfee` (
`StudentFeeId` int(11) NOT NULL,
  `StudentFeeStatus` varchar(10) NOT NULL,
  `AdmissionNo` varchar(10) NOT NULL,
  `AdmissionId` int(11) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `FeeStructure` text NOT NULL,
  `Distance` varchar(10) NOT NULL,
  `Remarks` text NOT NULL,
  `Date` varchar(20) NOT NULL,
  `DOE` varchar(20) NOT NULL,
  `Username` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentfee`
--

INSERT INTO `studentfee` (`StudentFeeId`, `StudentFeeStatus`, `AdmissionNo`, `AdmissionId`, `Session`, `SectionId`, `FeeStructure`, `Distance`, `Remarks`, `Date`, `DOE`, `Username`) VALUES
(1, '', '1', 1, '2015-2016', 2, '3-1200,4-700', '', '', '1435257000', '1435301160', 'masteruser'),
(2, '', '2', 2, '2015-2016', 3, '5-1300,6-800', '', '', '1435257000', '1435301220', 'masteruser'),
(3, '', '3', 3, '2015-2016', 1, '1-1000,2-600', '', '', '1435257000', '1435301220', 'masteruser'),
(4, '', '4', 4, '2015-2016', 1, '1-1000,2-600', '', '', '1435257000', '1435301220', 'masteruser'),
(5, '', '4565', 5, '2015-2016', 9, '14-700', '69', '', '1438540200', '1438594440', 'masteruser'),
(6, '', '876', 6, '2015-2016', 7, '15-700', '70', '', '1438540200', '1438594440', 'masteruser'),
(7, '', '4556', 7, '2015-2016', 8, '16-2500,17-700', '', '', '1438540200', '1438594560', 'masteruser'),
(8, 'Terminated', '4532', 8, '2015-2016', 7, '15-700', '', '', '1438540200', '1438594560', 'masteruser'),
(9, '', '4532', 9, '2015-2016', 8, '16-2500,17-700', '', '', '1438540200', '1438594620', 'masteruser'),
(10, '', '6543', 10, '2015-2016', 6, '20-2000,21-1000', '68', '....', '1438540200', '1438594620', 'masteruser'),
(11, '', '7865', 11, '2015-2016', 11, '18-1000,19-600', '83', 'gdsfgdsfg', '1438639200', '1438935420', 'masteruser'),
(12, '', '7889', 12, '2015-2016', 8, '16-4000,17-3000', '83', 'gfdsg', '1438799400', '1438935600', 'masteruser'),
(13, '', '6778', 13, '2015-2016', 9, '14-700', '83', '', '1438885800', '1438935660', 'masteruser'),
(14, '', '4567', 14, '2015-2016', 8, '16-2500,17-700', '83', '', '1438972200', '1438935660', 'masteruser'),
(15, '', '5647', 15, '2015-2016', 7, '11-5000,15-700', '83', '', '1438626600', '1438935660', 'masteruser'),
(16, '', '7657', 16, '2015-2016', 9, '14-700', '83', '', '1438540200', '1438935720', 'masteruser'),
(17, '', '9876', 17, '2015-2016', 8, '16-2500,17-700', '83', '', '1438713000', '1438935720', 'masteruser');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`SubjectId` int(11) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectAbb` varchar(100) NOT NULL,
  `Class` text NOT NULL,
  `SubjectStatus` varchar(10) NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectId`, `Session`, `SubjectName`, `SubjectAbb`, `Class`, `SubjectStatus`, `DOE`, `DOL`) VALUES
(1, '2015-2016', 'english', 'en', '1,2,3,4,5', 'Active', '1435305960', ''),
(2, '2015-2016', 'Hindi', 'HIN', '1,2,3,4,5', 'Active', '1435306260', ''),
(3, '2015-2016', 'science', 'REGULER', '2,3,4,5,6', 'Active', '1435382280', ''),
(4, '2015-2016', 'testing22', 'TN', '1,2,3,4', 'Active', '16-7-2015', ''),
(5, '2015-2016', 'fdsfdsf', 'sdf', '10,11,2', 'Active', '16-7-2015', ''),
(6, '2015-2016', 'vxcvxcv', 'xcvxv', '3', 'Active', '16-7-2015', ''),
(7, '2015-2016', 'dfsgdfsg', 'gdfgdsg', '7,3,4', 'Active', '16-7-2015', ''),
(8, '2016-2017', 'fghfh', 'ghf', '12', 'Active', '16-7-2015', ''),
(9, '2015-2016', 'jhgjhg', 'ghj', '3', 'Active', '16-7-2015', ''),
(10, '2016-2017', 'gfdgdg', 'gdg', '13,12', 'Active', '16-7-2015', ''),
(11, '2015-2016', 'tytryrtyry', 'rtyrtyry', '3,4,6', 'Active', '16-7-2015', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`SupplierId` int(11) NOT NULL,
  `SupplierStatus` varchar(10) NOT NULL,
  `SupplierName` varchar(100) NOT NULL,
  `SupplierMobile` varchar(10) NOT NULL,
  `SupplierAddress` text NOT NULL,
  `SupplierRemarks` text NOT NULL,
  `Date` varchar(20) NOT NULL,
  `DLU` varchar(20) NOT NULL,
  `DOD` varchar(20) NOT NULL,
  `DODUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierId`, `SupplierStatus`, `SupplierName`, `SupplierMobile`, `SupplierAddress`, `SupplierRemarks`, `Date`, `DLU`, `DOD`, `DODUsername`) VALUES
(1, 'Active', 'mohan', '8798655421', 'roshanpura', '', '1435315440', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tablename`
--

CREATE TABLE IF NOT EXISTS `tablename` (
  `TableName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablename`
--

INSERT INTO `tablename` (`TableName`) VALUES
('accounts'),
('admission'),
('backuprestore'),
('book'),
('bookissue'),
('calendar'),
('calling'),
('class'),
('complaint'),
('drregister'),
('enquiry'),
('exam'),
('examdetail'),
('expense'),
('fee'),
('feepayment'),
('followup'),
('generalsetting'),
('header'),
('house'),
('issue'),
('listbook'),
('listbookconfirm'),
('location'),
('masterentry'),
('masterentrycategory'),
('pagename'),
('permission'),
('photos'),
('printoption'),
('purchase'),
('purchaselist'),
('qualification'),
('registration'),
('salaryhead'),
('salarystructure'),
('salarystructuredetail'),
('scarea'),
('scexamdetail'),
('schoolmaterial'),
('scindicator'),
('section'),
('sibling'),
('staff'),
('staffattendance'),
('staffsalary'),
('stock'),
('stockassign'),
('studentattendance'),
('studentfee'),
('subject'),
('supplier'),
('transaction'),
('user'),
('vehicle'),
('vehiclefuel'),
('vehiclereading'),
('vehicleroute'),
('vehicleroutedetail'),
('visitorbook');

-- --------------------------------------------------------

--
-- Table structure for table `timezone`
--

CREATE TABLE IF NOT EXISTS `timezone` (
`TimezoneId` int(11) NOT NULL,
  `TimezoneName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=420 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timezone`
--

INSERT INTO `timezone` (`TimezoneId`, `TimezoneName`) VALUES
(1, 'Africa/Abidjan'),
(2, 'Africa/Accra'),
(3, 'Africa/Addis_Ababa'),
(4, 'Africa/Algiers'),
(5, 'Africa/Asmara'),
(6, 'Africa/Asmera'),
(7, 'Africa/Bamako'),
(8, 'Africa/Bangui'),
(9, 'Africa/Banjul'),
(10, 'Africa/Bissau'),
(11, 'Africa/Blantyre'),
(12, 'Africa/Brazzaville'),
(13, 'Africa/Bujumbura'),
(14, 'Africa/Cairo'),
(15, 'Africa/Casablanca'),
(16, 'Africa/Ceuta'),
(17, 'Africa/Conakry'),
(18, 'Africa/Dakar'),
(19, 'Africa/Dar_es_Salaam'),
(20, 'Africa/Djibouti'),
(21, 'Africa/Douala'),
(22, 'Africa/El_Aaiun'),
(23, 'Africa/Freetown'),
(24, 'Africa/Gaborone'),
(25, 'Africa/Harare'),
(26, 'Africa/Johannesburg'),
(27, 'Africa/Juba'),
(28, 'Africa/Kampala'),
(29, 'Africa/Khartoum'),
(30, 'Africa/Kigali'),
(31, 'Africa/Kinshasa'),
(32, 'Africa/Lagos'),
(33, 'Africa/Libreville'),
(34, 'Africa/Lome'),
(35, 'Africa/Luanda'),
(36, 'Africa/Lubumbashi'),
(37, 'Africa/Lusaka'),
(38, 'Africa/Malabo'),
(39, 'Africa/Maputo'),
(40, 'Africa/Maseru'),
(41, 'Africa/Mbabane'),
(42, 'Africa/Mogadishu'),
(43, 'Africa/Monrovia'),
(44, 'Africa/Nairobi'),
(45, 'Africa/Ndjamena'),
(46, 'Africa/Niamey'),
(47, 'Africa/Nouakchott'),
(48, 'Africa/Ouagadougou'),
(49, 'Africa/Porto-Novo'),
(50, 'Africa/Sao_Tome'),
(51, 'Africa/Timbuktu'),
(52, 'Africa/Tripoli'),
(53, 'Africa/Tunis'),
(54, 'Africa/Windhoek'),
(55, 'America/Adak'),
(56, 'America/Anchorage'),
(57, 'America/Anguilla'),
(58, 'America/Antigua'),
(59, 'America/Araguaina'),
(60, 'America/Argentina/Buenos_Aires'),
(61, 'America/Argentina/Catamarca'),
(62, 'America/Argentina/ComodRivadavia'),
(63, 'America/Argentina/Cordoba'),
(64, 'America/Argentina/Jujuy'),
(65, 'America/Argentina/La_Rioja'),
(66, 'America/Argentina/Mendoza'),
(67, 'America/Argentina/Rio_Gallegos'),
(68, 'America/Argentina/Salta'),
(69, 'America/Argentina/San_Juan'),
(70, 'America/Argentina/San_Luis'),
(71, 'America/Argentina/Tucuman'),
(72, 'America/Argentina/Ushuaia'),
(73, 'America/Aruba'),
(74, 'America/Asuncion'),
(75, 'America/Atikokan'),
(76, 'America/Atka'),
(77, 'America/Bahia'),
(78, 'America/Bahia_Banderas'),
(79, 'America/Barbados'),
(80, 'America/Belem'),
(81, 'America/Belize'),
(82, 'America/Blanc-Sablon'),
(83, 'America/Boa_Vista'),
(84, 'America/Bogota'),
(85, 'America/Boise'),
(86, 'America/Buenos_Aires'),
(87, 'America/Cambridge_Bay'),
(88, 'America/Campo_Grande'),
(89, 'America/Cancun'),
(90, 'America/Caracas'),
(91, 'America/Catamarca'),
(92, 'America/Cayenne'),
(93, 'America/Cayman'),
(94, 'America/Chicago'),
(95, 'America/Chihuahua'),
(96, 'America/Coral_Harbour'),
(97, 'America/Cordoba'),
(98, 'America/Costa_Rica'),
(99, 'America/Creston'),
(100, 'America/Cuiaba'),
(101, 'America/Curacao'),
(102, 'America/Danmarkshavn'),
(103, 'America/Dawson'),
(104, 'America/Dawson_Creek'),
(105, 'America/Denver'),
(106, 'America/Detroit'),
(107, 'America/Dominica'),
(108, 'America/Edmonton'),
(109, 'America/Eirunepe'),
(110, 'America/El_Salvador'),
(111, 'America/Ensenada'),
(112, 'America/Fort_Wayne'),
(113, 'America/Fortaleza'),
(114, 'America/Glace_Bay'),
(115, 'America/Godthab'),
(116, 'America/Goose_Bay'),
(117, 'America/Grand_Turk'),
(118, 'America/Grenada'),
(119, 'America/Guadeloupe'),
(120, 'America/Guatemala'),
(121, 'America/Guayaquil'),
(122, 'America/Guyana'),
(123, 'America/Halifax'),
(124, 'America/Havana'),
(125, 'America/Hermosillo'),
(126, 'America/Indiana/Indianapolis'),
(127, 'America/Indiana/Knox'),
(128, 'America/Indiana/Marengo'),
(129, 'America/Indiana/Petersburg'),
(130, 'America/Indiana/Tell_City'),
(131, 'America/Indiana/Vevay'),
(132, 'America/Indiana/Vincennes'),
(133, 'America/Indiana/Winamac'),
(134, 'America/Indianapolis'),
(135, 'America/Inuvik'),
(136, 'America/Iqaluit'),
(137, 'America/Jamaica'),
(138, 'America/Jujuy'),
(139, 'America/Juneau'),
(140, 'America/Kentucky/Louisville'),
(141, 'America/Kentucky/Monticello'),
(142, 'America/Knox_IN'),
(143, 'America/Kralendijk'),
(144, 'America/La_Paz'),
(145, 'America/Lima'),
(146, 'America/Los_Angeles'),
(147, 'America/Louisville'),
(148, 'America/Lower_Princes'),
(149, 'America/Maceio'),
(150, 'America/Managua'),
(151, 'America/Manaus'),
(152, 'America/Marigot'),
(153, 'America/Martinique'),
(154, 'America/Matamoros'),
(155, 'America/Mazatlan'),
(156, 'America/Mendoza'),
(157, 'America/Menominee'),
(158, 'America/Merida'),
(159, 'America/Metlakatla'),
(160, 'America/Mexico_City'),
(161, 'America/Miquelon'),
(162, 'America/Moncton'),
(163, 'America/Monterrey'),
(164, 'America/Montevideo'),
(165, 'America/Montreal'),
(166, 'America/Montserrat'),
(167, 'America/Nassau'),
(168, 'America/New_York'),
(169, 'America/Nipigon'),
(170, 'America/Nome'),
(171, 'America/Noronha'),
(172, 'America/North_Dakota/Beulah'),
(173, 'America/North_Dakota/Center'),
(174, 'America/North_Dakota/New_Salem'),
(175, 'America/Ojinaga'),
(176, 'America/Panama'),
(177, 'America/Pangnirtung'),
(178, 'America/Paramaribo'),
(179, 'America/Phoenix'),
(180, 'America/Port_of_Spain'),
(181, 'America/Port-au-Prince'),
(182, 'America/Porto_Acre'),
(183, 'America/Porto_Velho'),
(184, 'America/Puerto_Rico'),
(185, 'America/Rainy_River'),
(186, 'America/Rankin_Inlet'),
(187, 'America/Recife'),
(188, 'America/Regina'),
(189, 'America/Resolute'),
(190, 'America/Rio_Branco'),
(191, 'America/Rosario'),
(192, 'America/Santa_Isabel'),
(193, 'America/Santarem'),
(194, 'America/Santiago'),
(195, 'America/Santo_Domingo'),
(196, 'America/Sao_Paulo'),
(197, 'America/Scoresbysund'),
(198, 'America/Shiprock'),
(199, 'America/Sitka'),
(200, 'America/St_Barthelemy'),
(201, 'America/St_Johns'),
(202, 'America/St_Kitts'),
(203, 'America/St_Lucia'),
(204, 'America/St_Thomas'),
(205, 'America/St_Vincent'),
(206, 'America/Swift_Current'),
(207, 'America/Tegucigalpa'),
(208, 'America/Thule'),
(209, 'America/Thunder_Bay'),
(210, 'America/Tijuana'),
(211, 'America/Toronto'),
(212, 'America/Tortola'),
(213, 'America/Vancouver'),
(214, 'America/Virgin'),
(215, 'America/Whitehorse'),
(216, 'America/Winnipeg'),
(217, 'America/Yakutat'),
(218, 'America/Yellowknife'),
(219, 'Antarctica/Casey'),
(220, 'Antarctica/Davis'),
(221, 'Antarctica/DumontDUrville'),
(222, 'Antarctica/Macquarie'),
(223, 'Antarctica/Mawson'),
(224, 'Antarctica/McMurdo'),
(225, 'Antarctica/Palmer'),
(226, 'Antarctica/Rothera'),
(227, 'Antarctica/South_Pole'),
(228, 'Antarctica/Syowa'),
(229, 'Antarctica/Vostok'),
(230, 'Arctic/Longyearbyen'),
(231, 'Asia/Aden'),
(232, 'Asia/Amman'),
(233, 'Asia/Anadyr'),
(234, 'Asia/Aqtau'),
(235, 'Asia/Aqtobe'),
(236, 'Asia/Ashkhabad'),
(237, 'Asia/Baghdad'),
(238, 'Asia/Bahrain'),
(239, 'Asia/Baku'),
(240, 'Asia/Beirut'),
(241, 'Asia/Bishkek'),
(242, 'Asia/Brunei'),
(243, 'Asia/Calcutta'),
(244, 'Asia/Chongqing'),
(245, 'Asia/Chungking'),
(246, 'Asia/Colombo'),
(247, 'Asia/Dacca'),
(248, 'Asia/Dhaka'),
(249, 'Asia/Dili'),
(250, 'Asia/Dubai'),
(251, 'Asia/Dushanbe'),
(252, 'Asia/Harbin'),
(253, 'Asia/Hebron'),
(254, 'Asia/Ho_Chi_Minh'),
(255, 'Asia/Hong_Kong'),
(256, 'Asia/Irkutsk'),
(257, 'Asia/Istanbul'),
(258, 'Asia/Jakarta'),
(259, 'Asia/Jayapura'),
(260, 'Asia/Kabul'),
(261, 'Asia/Kamchatka'),
(262, 'Asia/Karachi'),
(263, 'Asia/Kashgar'),
(264, 'Asia/Katmandu'),
(265, 'Asia/Khandyga'),
(266, 'Asia/Kolkata'),
(267, 'Asia/Krasnoyarsk'),
(268, 'Asia/Kuching'),
(269, 'Asia/Kuwait'),
(270, 'Asia/Macao'),
(271, 'Asia/Macau'),
(272, 'Asia/Makassar'),
(273, 'Asia/Manila'),
(274, 'Asia/Muscat'),
(275, 'Asia/Nicosia'),
(276, 'Asia/Novosibirsk'),
(277, 'Asia/Omsk'),
(278, 'Asia/Oral'),
(279, 'Asia/Phnom_Penh'),
(280, 'Asia/Pyongyang'),
(281, 'Asia/Qatar'),
(282, 'Asia/Qyzylorda'),
(283, 'Asia/Rangoon'),
(284, 'Asia/Saigon'),
(285, 'Asia/Sakhalin'),
(286, 'Asia/Samarkand'),
(287, 'Asia/Seoul'),
(288, 'Asia/Singapore'),
(289, 'Asia/Taipei'),
(290, 'Asia/Tashkent'),
(291, 'Asia/Tbilisi'),
(292, 'Asia/Tel_Aviv'),
(293, 'Asia/Thimbu'),
(294, 'Asia/Thimphu'),
(295, 'Asia/Tokyo'),
(296, 'Asia/Ulaanbaatar'),
(297, 'Asia/Ulan_Bator'),
(298, 'Asia/Urumqi'),
(299, 'Asia/Ust-Nera'),
(300, 'Asia/Vladivostok'),
(301, 'Asia/Yakutsk'),
(302, 'Asia/Yekaterinburg'),
(303, 'Asia/Yerevan'),
(304, 'Atlantic/Azores'),
(305, 'Atlantic/Canary'),
(306, 'Atlantic/Cape_Verde'),
(307, 'Atlantic/Faeroe'),
(308, 'Atlantic/Faroe'),
(309, 'Atlantic/Madeira'),
(310, 'Atlantic/Reykjavik'),
(311, 'Atlantic/South_Georgia'),
(312, 'Atlantic/St_Helena'),
(313, 'Australia/ACT'),
(314, 'Australia/Brisbane'),
(315, 'Australia/Broken_Hill'),
(316, 'Australia/Canberra'),
(317, 'Australia/Currie'),
(318, 'Australia/Eucla'),
(319, 'Australia/Hobart'),
(320, 'Australia/LHI'),
(321, 'Australia/Lindeman'),
(322, 'Australia/Melbourne'),
(323, 'Australia/North'),
(324, 'Australia/NSW'),
(325, 'Australia/Perth'),
(326, 'Australia/South'),
(327, 'Australia/Sydney'),
(328, 'Australia/Tasmania'),
(329, 'Australia/Victoria'),
(330, 'Australia/Yancowinna'),
(331, 'Europe/Amsterdam'),
(332, 'Europe/Athens'),
(333, 'Europe/Belfast'),
(334, 'Europe/Belgrade'),
(335, 'Europe/Berlin'),
(336, 'Europe/Brussels'),
(337, 'Europe/Bucharest'),
(338, 'Europe/Budapest'),
(339, 'Europe/Busingen'),
(340, 'Europe/Copenhagen'),
(341, 'Europe/Dublin'),
(342, 'Europe/Gibraltar'),
(343, 'Europe/Guernsey'),
(344, 'Europe/Isle_of_Man'),
(345, 'Europe/Istanbul'),
(346, 'Europe/Jersey'),
(347, 'Europe/Kaliningrad'),
(348, 'Europe/Lisbon'),
(349, 'Europe/Ljubljana'),
(350, 'Europe/London'),
(351, 'Europe/Luxembourg'),
(352, 'Europe/Malta'),
(353, 'Europe/Mariehamn'),
(354, 'Europe/Minsk'),
(355, 'Europe/Monaco'),
(356, 'Europe/Nicosia'),
(357, 'Europe/Oslo'),
(358, 'Europe/Paris'),
(359, 'Europe/Podgorica'),
(360, 'Europe/Riga'),
(361, 'Europe/Rome'),
(362, 'Europe/Samara'),
(363, 'Europe/San_Marino'),
(364, 'Europe/Simferopol'),
(365, 'Europe/Skopje'),
(366, 'Europe/Sofia'),
(367, 'Europe/Stockholm'),
(368, 'Europe/Tirane'),
(369, 'Europe/Tiraspol'),
(370, 'Europe/Uzhgorod'),
(371, 'Europe/Vaduz'),
(372, 'Europe/Vienna'),
(373, 'Europe/Vilnius'),
(374, 'Europe/Volgograd'),
(375, 'Europe/Warsaw'),
(376, 'Europe/Zaporozhye'),
(377, 'Europe/Zurich'),
(378, 'Indian/Antananarivo'),
(379, 'Indian/Christmas'),
(380, 'Indian/Cocos'),
(381, 'Indian/Comoro'),
(382, 'Indian/Kerguelen'),
(383, 'Indian/Maldives'),
(384, 'Indian/Mauritius'),
(385, 'Indian/Mayotte'),
(386, 'Indian/Reunion'),
(387, 'Pacific/Apia'),
(388, 'Pacific/Chatham'),
(389, 'Pacific/Chuuk'),
(390, 'Pacific/Easter'),
(391, 'Pacific/Efate'),
(392, 'Pacific/Fakaofo'),
(393, 'Pacific/Fiji'),
(394, 'Pacific/Funafuti'),
(395, 'Pacific/Galapagos'),
(396, 'Pacific/Guadalcanal'),
(397, 'Pacific/Guam'),
(398, 'Pacific/Honolulu'),
(399, 'Pacific/Johnston'),
(400, 'Pacific/Kosrae'),
(401, 'Pacific/Kwajalein'),
(402, 'Pacific/Majuro'),
(403, 'Pacific/Marquesas'),
(404, 'Pacific/Nauru'),
(405, 'Pacific/Niue'),
(406, 'Pacific/Norfolk'),
(407, 'Pacific/Noumea'),
(408, 'Pacific/Palau'),
(409, 'Pacific/Pitcairn'),
(410, 'Pacific/Pohnpei'),
(411, 'Pacific/Ponape'),
(412, 'Pacific/Rarotonga'),
(413, 'Pacific/Saipan'),
(414, 'Pacific/Samoa'),
(415, 'Pacific/Tahiti'),
(416, 'Pacific/Tongatapu'),
(417, 'Pacific/Truk'),
(418, 'Pacific/Wake'),
(419, 'Pacific/Wallis');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`TransactionId` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Token` varchar(100) NOT NULL,
  `TransactionSession` varchar(10) NOT NULL,
  `TransactionAmount` varchar(100) NOT NULL,
  `TransactionType` varchar(100) NOT NULL,
  `TransactionFrom` varchar(100) NOT NULL,
  `TransactionHead` varchar(100) NOT NULL,
  `TransactionSubHead` varchar(10) NOT NULL,
  `TransactionHeadId` varchar(100) NOT NULL,
  `TransactionRemarks` text NOT NULL,
  `TransactionDate` varchar(20) NOT NULL,
  `TransactionDOE` varchar(20) NOT NULL,
  `TransactionDLU` varchar(20) NOT NULL,
  `TransactionDOD` varchar(20) NOT NULL,
  `TransactionIP` varchar(50) NOT NULL,
  `TransactionStatus` varchar(10) NOT NULL,
  `TransactionDODUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionId`, `Username`, `Token`, `TransactionSession`, `TransactionAmount`, `TransactionType`, `TransactionFrom`, `TransactionHead`, `TransactionSubHead`, `TransactionHeadId`, `TransactionRemarks`, `TransactionDate`, `TransactionDOE`, `TransactionDLU`, `TransactionDOD`, `TransactionIP`, `TransactionStatus`, `TransactionDODUsername`) VALUES
(1, 'masteruser', 'k7pJdCoKrPruYXMBQC2NLAqgKK79n', '2015-2016', '1200', '1', '1', 'Fee', '', '1', '', '1435303440', '1435303440', '', '', '', 'Active', ''),
(2, 'masteruser', 'URPmt6jXApUYB5DHxzRpN6NooBbRg', '2015-2016', '400', '1', '1', 'Fee', '', '1', '', '1435303440', '1435303440', '', '', '', 'Active', ''),
(3, 'masteruser', '', '', '5000', '1', '1', 'Income', '', '46', 'from cm donation', '1435304400', '1435304400', '', '', '::1', 'Active', ''),
(4, 'masteruser', 'DryzCMR1eEKU7UkzlhhswxJ9Z2XCiG', '2015-2016', '200', '1', '1', 'Fee', '', '1', '', '1435381920', '1435381920', '', '', '', 'Active', ''),
(5, 'masteruser', '', '', '120', '0', '1', 'Expense', '', '1', 'jh<br />\r\n', '1435397220', '1435397220', '', '', '::1', 'Active', ''),
(6, 'masteruser', '', '', '5000', '1', '1', 'Income', '', '46', 'gh', '1435397280', '1435397280', '', '', '::1', 'Active', ''),
(7, 'masteruser', '3cUul3XC76lio7Mc6vtngs0DlpDu67', '2015-2016', '1300', '1', '1', 'Fee', '', '2', 'gh', '1435398540', '1435398540', '', '', '', 'Active', ''),
(8, 'masteruser', 'yqwssRnqNgeKrR7G8IYvWqgkGDC6ap', '2015-2016', '1000', '1', '1', 'Fee', '', '4', '', '1438218840', '1438251900', '', '', '', 'Active', ''),
(9, 'masteruser', 'kNk57ulSKlZWN9ZApZrz6kEsgJdELZ', '2015-2016', '600', '1', '1', 'Fee', '', '4', '', '1438229460', '1438251960', '', '', '', 'Active', ''),
(10, 'masteruser', 'abnycJM5jiBMC01u2zr3uvJLTWV8aC', '2015-2016', '700', '1', '1', 'Fee', '', '8', '', '1438597260', '1438594680', '', '', '', 'Active', ''),
(11, 'masteruser', 'OyZeOIwLFlRZFDuGfB7L3OHGu5uG4r', '2015-2016', '1100', '1', '1', 'Fee', '', '3', '', '1438668840', '1438594800', '', '', '', 'Active', ''),
(12, 'masteruser', '', '', '6000', '0', '1', 'Expense', '', '2', '', '1438600680', '1438595040', '', '', '::1', 'Active', ''),
(13, 'masteruser', '', '', '700', '1', '1', 'Income', '', '46', '..', '1438597920', '1438597920', '', '', '::1', 'Active', ''),
(14, 'masteruser', '', '', '50', '0', '1', 'Expense', '', '3', '..', '1438598100', '1438598100', '', '', '::1', 'Active', ''),
(15, 'masteruser', 'zDItdxQvTf4NJvemJfVOMFmPi21aQ', '2015-2016', '600', '1', '1', 'Fee', '', '5', '..', '1438598280', '1438598280', '', '', '', 'Active', ''),
(16, 'masteruser', 'wbS9AlBqqd2yf3l9BDEKgJALnMcP7d', '2015-2016', '1500', '1', '1', 'Fee', '', '7', '', '1438940700', '1438940700', '', '', '', 'Active', ''),
(17, 'masteruser', 'uLhv4IXB8zb1msXJUp8FOQzx6m1lDw', '2015-2016', '1500', '1', '1', 'Fee', '', '12', '', '1438940940', '1438940940', '', '', '', 'Active', ''),
(18, 'masteruser', '', '', '7000', '1', '1', 'Income', '', '46', '........', '1439017260', '1439017260', '', '', '::1', 'Active', ''),
(19, 'masteruser', '', '', '1000', '0', '1', 'Expense', '', '4', '...........', '1439017380', '1439017380', '', '', '::1', 'Active', ''),
(20, 'masteruser', '', '', '660', '0', '1', 'Expense', '', '2', '............', '1439017560', '1439017560', '', '', '::1', 'Active', ''),
(21, 'masteruser', '7IQmywz9fAWrW6CIzI0U2Vq0ntnmTy', '2015-2016', '3000', '1', '1', 'Fee', '', '15', '........', '1439193540', '1439193540', '', '', '', 'Active', ''),
(22, 'masteruser', 'P89yzCyvn9VNPl0SeajYHAMlfEVo2w', '2015-2016', '200', '1', '1', 'Fee', '', '15', '..........', '1439193600', '1439193600', '', '', '', 'Active', ''),
(23, 'masteruser', 'u9qHRPuJ5j1XpsYoAhE8ufdHlW4WL', '2015-2016', '150', '1', '1', 'Fee', '', '15', '............', '1439202300', '1439202300', '', '', '', 'Active', ''),
(24, 'masteruser', 'WTzcVjOdH0IBLYOlmTQPwqUd2UHifT', '2015-2016', '400', '1', '1', 'Fee', '', '11', '<..................>', '1439270520', '1439270520', '', '', '', 'Active', ''),
(25, 'masteruser', '', '', '324', '0', '1', 'Expense', '', '7', 'dsfsdf', '1440143400', '1440143400', '', '', '::1', 'Active', ''),
(26, 'masteruser', '', '', '', '0', '', 'Expense', '', '9', 'fkldsjfkl', '', '1440108000', '', '', '', 'Active', ''),
(27, 'masteruser', '', '', '200', '0', '1', 'Expense', '', '10', 'sdadasd', '1440108000', '1440108000', '', '', '', 'Active', ''),
(28, 'masteruser', '', '', '200', '0', '1', 'Expense', '', '11', 'fsdfs', '1440108000', '1440108000', '', '', '', 'Active', ''),
(29, 'masteruser', '', '', '200', '0', '1', 'Expense', '', '12', 'dasdad', '1440108000', '1440108000', '', '', '', 'Active', ''),
(30, 'masteruser', '', '', '100', '0', '1', 'Expense', '', '10', 'dfsafasdf', '1440108000', '1440108000', '', '', '', 'Active', ''),
(31, 'masteruser', '', '', '20', '0', '1', 'Expense', '', '10', 'gfdg', '1440159120', '1440159120', '', '', '::1', 'Active', ''),
(32, 'masteruser', '', '', '30', '0', '1', 'Expense', '', '10', 'sdffdsf', '1440108000', '1440108000', '', '', '', 'Active', ''),
(33, 'masteruser', '', '', '30', '0', '1', 'Expense', '', '10', 'jhgjhgj', '1440108000', '1440108000', '', '', '', 'Active', ''),
(34, 'masteruser', '', '', '10', '0', '1', 'Expense', '', '13', 'asdadad', '1440540000', '1440108000', '', '', '', 'Active', ''),
(35, 'masteruser', '', '', '20', '0', '1', 'Expense', '', '10', 'gfdgd', '1440021600', '1440108000', '', '', '', 'Active', ''),
(36, 'masteruser', '', '', '20', '0', '1', 'Expense', '', '10', 'hjfhf', '1440108000', '1440108000', '', '', '', 'Active', ''),
(37, 'masteruser', '', '', '20', '0', '1', 'Expense', '', '10', 'fdsfs', '1440108000', '1440108000', '', '', '', 'Active', ''),
(38, 'masteruser', '', '', '20', '0', '1', 'Expense', '', '10', 'saadad', '1440108000', '1440108000', '', '', '', 'Active', ''),
(39, 'masteruser', '', '', '20', '0', '1', 'Expense', '', '10', 'fghgf', '1440108000', '1440108000', '', '', '', 'Active', ''),
(40, 'masteruser', '', '', '20', '0', '1', 'Expense', '', '10', 'jkghj', '1440021600', '1440108000', '', '', '', 'Active', ''),
(41, 'masteruser', '', '', '20', '0', '1', 'Expense', '', '10', 'sasa', '1440540000', '1440108000', '', '', '', 'Active', ''),
(42, 'masteruser', '', '', '20', '0', '1', 'Expense', '', '10', 'fdgdfg', '1440108000', '1440108000', '', '', '', 'Active', ''),
(43, 'masteruser', '', '', '100', '0', '1', 'Expense', '', '10', 'hgjfghf', '1440108000', '1440108000', '', '', '', 'Active', ''),
(44, 'masteruser', '', '', '100', '0', '1', 'Expense', '', '10', 'ghhfhf', '1440108000', '1440108000', '', '', '', 'Active', ''),
(45, 'masteruser', '', '', '100', '0', '1', 'Expense', '', '10', 'fgdsgd', '1440108000', '1440108000', '', '', '', 'Active', ''),
(46, 'masteruser', '', '', '100', '0', '1', 'Expense', '', '10', 'gfhgfh', '1440108000', '1440108000', '', '', '', 'Active', ''),
(47, 'masteruser', '', '', '100', '0', '1', 'Expense', '', '10', 'ffdgdfg', '1439935200', '1440108000', '', '', '', 'Active', ''),
(48, 'masteruser', '', '', '100', '0', '1', 'Expense', '', '10', 'gjghj', '1440021600', '1440108000', '', '', '', 'Active', ''),
(49, 'masteruser', '', '', '100', '0', '1', 'Expense', '', '10', 'fgdgdf', '1440108000', '1440108000', '', '', '', 'Active', ''),
(50, 'masteruser', '', '', '100', '0', '1', 'Expense', '', '10', 'fdgdfg', '1440108000', '1440108000', '', '', '', 'Active', ''),
(51, 'masteruser', '', '', '100', '0', '1', 'Expense', '', '10', 'ghfhfg', '1440108000', '1440108000', '', '', '', 'Active', ''),
(52, 'masteruser', '', '', '50', '0', '1', 'Expense', '', '14', 'fdgdsf', '1440108000', '1440108000', '', '', '', 'Active', ''),
(53, 'masteruser', '', '', '5000', '1', '1', 'Income', '', '46', 'tsesting\r\n', '1440235500', '1440194400', '', '', '', 'Active', ''),
(54, 'masteruser', '', '', '5000', '1', '1', 'Income', '', '46', 'testing2', '1440235500', '1440194400', '', '', '', 'Active', ''),
(55, 'masteruser', '', '', '10000', '1', '1', 'Income', '', '46', 'testing3', '1440235500', '1440194400', '', '', '', 'Active', ''),
(56, 'masteruser', 'DwCuWl9qiQaUVs0fi5ktBek7Jjr1C', '2015-2016', '200', '1', '1', 'Fee', '', '11', 'hj', '1441967820', '1441967820', '', '', '', 'Active', ''),
(57, 'masteruser', 'b97f5dad675749bf4838', '2015-2016', '12', '1', '1', 'Fee', '', '1', 'tseting', '1442181600', '1442181600', '', '', '', 'Active', ''),
(58, 'masteruser', '', '', '500', '0', '1', 'Expense', '', '15', 'fgdsgdg', '1442341800', '1442404380', '', '', '::1', 'Active', ''),
(59, 'masteruser', '', '', '500', '0', '1', 'Expense', '', '16', 'tsesting', '1442440800', '1442440800', '', '', '123456', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `translate`
--

CREATE TABLE IF NOT EXISTS `translate` (
`TranslateId` int(11) NOT NULL,
  `LanguageId` int(11) NOT NULL,
  `Translation` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `translate`
--

INSERT INTO `translate` (`TranslateId`, `LanguageId`, `Translation`) VALUES
(1, 1, '1**&#2347;&#2381;&#2352;&#2306;&#2335; &#2321;&#2347;&#2367;&#2360; \r||2**&#2325;&#2377;&#2354; &#2324;&#2352; &#2309;&#2344;&#2369;&#2357;&#2352;&#2381;&#2340;&#2368; \r||3**&#2309;&#2344;&#2381;&#2351; &#2325;&#2377;&#2354; \r||4**&#2346;&#2370;&#2331;&#2340;&#2366;&#2331; \r||5**&#2358;&#2367;&#2325;&#2366;&#2351;&#2340; \r||6**&#2357;&#2367;&#2332;&#2367;&#2335;&#2352; &#2348;&#2369;&#2325; \r||7**&#2319;&#2337;&#2350;&#2367;&#2358;&#2344; \r||8**&#2346;&#2306;&#2332;&#2368;&#2325;&#2352;&#2339; \r||9**&#2346;&#2342;&#2379;&#2344;&#2381;&#2344;&#2340;&#2367; \r||10**&#2309;&#2342;&#2381;&#2351;&#2340;&#2344; &#2358;&#2369;&#2354;&#2381;&#2325; \r||11**&#2352;&#2367;&#2346;&#2379;&#2352;&#2381;&#2335; \r||12**&#2319;&#2337;&#2350;&#2367;&#2358;&#2344; &#2325;&#2368; &#2352;&#2367;&#2346;&#2379;&#2352;&#2381;&#2335; \r||13**&#2358;&#2369;&#2354;&#2381;&#2325; &#2349;&#2369;&#2327;&#2340;&#2366;&#2344; \r||14**&#2335;&#2381;&#2352;&#2366;&#2306;&#2332;&#2376;&#2325;&#2381;&#2358;&#2344; \r||15**&#2357;&#2381;&#2351;&#2351; \r||16**&#2310;&#2351; \r||17**&#2313;&#2346;&#2360;&#2381;&#2341;&#2367;&#2340;&#2367; \r||18**&#2360;&#2381;&#2335;&#2366;&#2347; &#2313;&#2346;&#2360;&#2381;&#2341;&#2367;&#2340;&#2367; \r||19**&#2331;&#2366;&#2340;&#2381;&#2352; &#2313;&#2346;&#2360;&#2381;&#2341;&#2367;&#2340;&#2367; \r||20**&#2360;&#2381;&#2335;&#2366;&#2347; &#2313;&#2346;&#2360;&#2381;&#2341;&#2367;&#2340;&#2367; &#2352;&#2367;&#2346;&#2379;&#2352;&#2381;&#2335; \r||21**&#2331;&#2366;&#2340;&#2381;&#2352; &#2313;&#2346;&#2360;&#2381;&#2341;&#2367;&#2340;&#2367; &#2352;&#2367;&#2346;&#2379;&#2352;&#2381;&#2335; \r||22**&#2346;&#2352;&#2367;&#2357;&#2361;&#2344; \r||23**&#2346;&#2352;&#2367;&#2357;&#2361;&#2344; &#2335;&#2381;&#2352;&#2375;&#2344; \r||24**&#2346;&#2352;&#2368;&#2325;&#2381;&#2359;&#2366; \r||25**&#2358;&#2376;&#2325;&#2381;&#2359;&#2367;&#2325; &#2327;&#2381;&#2352;&#2375;&#2337; \r||26**&#2360;&#2361; &#2358;&#2376;&#2325;&#2381;&#2359;&#2367;&#2325; &#2327;&#2381;&#2352;&#2375;&#2337; \r||27**&#2346;&#2352;&#2368;&#2325;&#2381;&#2359;&#2366; &#2352;&#2367;&#2346;&#2379;&#2352;&#2381;&#2335; \r||28**&#2325;&#2352;&#2381;&#2350;&#2330;&#2366;&#2352;&#2367;&#2351;&#2379;&#2306; &#2325;&#2366; &#2346;&#2381;&#2352;&#2348;&#2306;&#2343;&#2344; \r||29**&#2354;&#2366;&#2311;&#2348;&#2381;&#2352;&#2375;&#2352;&#2368; \r||30**&#2346;&#2369;&#2360;&#2381;&#2340;&#2325;&#2375;&#2306; &#2346;&#2381;&#2352;&#2348;&#2306;&#2343;&#2367;&#2340; &#2325;&#2352;&#2375;&#2306; \r||31**&#2309;&#2306;&#2325; &#2324;&#2352; &#2357;&#2366;&#2346;&#2360;&#2368; \r||32**&#2337;&#2367;&#2360;&#2381;&#2346;&#2376;&#2330; &#2357; &#2346;&#2381;&#2352;&#2366;&#2346;&#2381;&#2340; \r||33**&#2337;&#2367;&#2360;&#2381;&#2346;&#2376;&#2330; \r||34**&#2346;&#2381;&#2352;&#2366;&#2346;&#2381;&#2340; \r||35**&#2358;&#2375;&#2351;&#2352; \r||36**&#2360;&#2381;&#2335;&#2377;&#2325; &#2346;&#2381;&#2352;&#2348;&#2306;&#2343;&#2367;&#2340; \r||37**&#2358;&#2375;&#2351;&#2352; &#2335;&#2381;&#2352;&#2366;&#2306;&#2360;&#2347;&#2352; \r||38**&#2325;&#2381;&#2352;&#2351; &#2360;&#2366;&#2350;&#2327;&#2381;&#2352;&#2368; \r||39**&#2346;&#2381;&#2352;&#2342;&#2366;&#2351;&#2325; \r||40**&#2326;&#2352;&#2368;&#2342; \r||41**&#2350;&#2369;&#2342;&#2381;&#2342;&#2366; &#2360;&#2366;&#2350;&#2327;&#2381;&#2352;&#2368; \r||42**&#2360;&#2381;&#2335;&#2377;&#2325; &#2352;&#2367;&#2346;&#2379;&#2352;&#2381;&#2335; \r||43**&#2360;&#2381;&#2325;&#2370;&#2354; &#2360;&#2366;&#2350;&#2327;&#2381;&#2352;&#2368; \r||44**&#2350;&#2366;&#2350;&#2354;&#2375; &#2325;&#2368; &#2352;&#2367;&#2346;&#2379;&#2352;&#2381;&#2335; \r||45**&#2325;&#2381;&#2352;&#2351; &#2352;&#2367;&#2346;&#2379;&#2352;&#2381;&#2335; \r||46**&#2319;&#2360;&#2319;&#2350;&#2319;&#2360; \r||47**&#2360;&#2375;&#2335;&#2367;&#2306;&#2327; \r||48**&#2360;&#2366;&#2350;&#2366;&#2344;&#2381;&#2351; &#2360;&#2375;&#2335;&#2367;&#2306;&#2327; \r||49**&#2350;&#2366;&#2360;&#2381;&#2335;&#2352; &#2319;&#2306;&#2335;&#2381;&#2352;&#2368; \r||50**&#2313;&#2346;&#2351;&#2379;&#2327;&#2325;&#2352;&#2381;&#2340;&#2366; &#2346;&#2381;&#2352;&#2348;&#2306;&#2343;&#2367;&#2340; \r||51**&#2326;&#2366;&#2340;&#2379;&#2306; &#2325;&#2366; &#2346;&#2381;&#2352;&#2348;&#2306;&#2343;&#2344; \r||52**&#2325;&#2325;&#2381;&#2359;&#2366; &#2346;&#2381;&#2352;&#2348;&#2306;&#2343;&#2367;&#2340; \r||53**&#2357;&#2367;&#2359;&#2351; &#2346;&#2381;&#2352;&#2348;&#2306;&#2343;&#2367;&#2340; \r||54**&#2346;&#2352;&#2368;&#2325;&#2381;&#2359;&#2366; &#2325;&#2366; &#2346;&#2381;&#2352;&#2348;&#2306;&#2343;&#2344; \r||55**&#2309;&#2344;&#2369;&#2360;&#2370;&#2330;&#2367;&#2340; &#2332;&#2366;&#2340;&#2367; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352; &#2346;&#2381;&#2352;&#2348;&#2306;&#2343;&#2367;&#2340; &#2325;&#2352;&#2375;&#2306; \r||56**&#2309;&#2344;&#2369;&#2360;&#2370;&#2330;&#2367;&#2340; &#2332;&#2366;&#2340;&#2367; &#2360;&#2370;&#2330;&#2325; &#2346;&#2381;&#2352;&#2348;&#2306;&#2343;&#2367;&#2340; \r||57**&#2358;&#2369;&#2354;&#2381;&#2325; &#2346;&#2381;&#2352;&#2348;&#2306;&#2343;&#2367;&#2340; \r||58**&#2357;&#2375;&#2340;&#2344; &#2361;&#2375;&#2337; \r||59**&#2357;&#2375;&#2340;&#2344; &#2360;&#2306;&#2352;&#2330;&#2344;&#2366; \r||60**&#2360;&#2381;&#2325;&#2370;&#2354; &#2360;&#2366;&#2350;&#2327;&#2381;&#2352;&#2368; \r||61**&#2360;&#2381;&#2341;&#2366;&#2344; &#2346;&#2381;&#2352;&#2348;&#2306;&#2343;&#2367;&#2340; &#2325;&#2352;&#2375;&#2306; \r||62**&#2361;&#2376;&#2337;&#2352; &#2324;&#2352; &#2346;&#2366;&#2342; \r||63**&#2309;&#2344;&#2369;&#2350;&#2340;&#2367; \r||64**&#2357;&#2352;&#2381;&#2340;&#2350;&#2366;&#2344; &#2360;&#2340;&#2381;&#2352; \r||65**&#2344;&#2375;&#2357;&#2367;&#2327;&#2375;&#2358;&#2344; \r||66**&#2327;&#2381;&#2352;&#2366;&#2347; &#2352;&#2367;&#2346;&#2379;&#2352;&#2381;&#2335; \r||67**&#2325;&#2376;&#2354;&#2375;&#2306;&#2337;&#2352;'),
(2, 6, '1**Front Office \r||2**Call & Suivi \r||3**autre appel \r||4**Demande de renseignements \r||5**plainte \r||6**livre d''\r||7**admission \r||8**inscription \r||9**promotion \r||10**Mise à jour Fee \r||11**rapports \r||12**admission rapport \r||13**Paiement des droits \r||14**transaction \r||15**frais \r||16**revenu \r||17**présence \r||18**Participation du personnel \r||19**Participation des étudiants \r||20**Rapport du personnel de présence \r||21**Rapport de l''assiduité des élèves \r||22**transport \r||23**Transport Route \r||24**exam \r||25**Scholastic année \r||26**Co Scholastic année \r||27**Rapport d''examen \r||28**gérer du personnel \r||29**bibliothèque \r||30**gérer les livres \r||31**Question et de retour \r||32**Envoi et réception \r||33**dépêche \r||34**recevoir \r||35**stock \r||36**gérer Stock \r||37**Transfert de stock \r||38**Matériau achat \r||39**fournisseur \r||40**achat \r||41**problème Matériel \r||42**Rapport sur l''action \r||43**Matériel scolaire \r||44**Rapport d''émission \r||45**Rapport achat \r||46**SMS \r||47**Cadre \r||48**Cadre général \r||49**maître d''entrée \r||50**gérer l''utilisateur \r||51**gérer les comptes \r||52**gérer classe \r||53**gérer Sujet \r||54**gérer examen \r||55**Gérer Zone SC \r||56**Gérer SC Indicateur \r||57**gérer Fee \r||58**salaire chef \r||59**Structure des salaires \r||60**Matériel scolaire \r||61**gérer Lieu \r||62**En-tête et pied de page \r||63**autorisation \r||64**session en cours \r||65**navigation \r||66**Rapport graphique \r||67**calendrier'),
(3, 5, '1**Front Office \r||2**Call & Seguimiento \r||3**otro Call \r||4**Consulta \r||5**Queja \r||6**libro de Visitantes \r||7**Admisión \r||8**registro \r||9**Promoción \r||10**Tarifa de Actualización \r||11**Informes \r||12**Informe de Admisión \r||13**Cargo por pago \r||14**Transacción \r||15**gastos \r||16**Ingresos \r||17**Asistencia \r||18**El personal de asistencia \r||19**Asistencia Estudiantil \r||20**Personal Informe de asistencia \r||21**Informe de Asistencia Estudiantil \r||22**Transporte \r||23**Ruta de Transporte \r||24**examen \r||25**Scholastic Grado \r||26**Co Scholastic Grado \r||27**Informe de examen \r||28**Gestionar personal \r||29**Biblioteca \r||30**administrar libros \r||31**Edición y vuelta \r||32**Envío y recepción \r||33**Despacho \r||34**Recibir \r||35**Stock \r||36**Gestionar Stock \r||37**Stock Transfer \r||38**material de Compra \r||39**Proveedor \r||40**Compra \r||41**material Issue \r||42**Stock Informe \r||43**material de la Escuela \r||44**Informe de Cuestiones \r||45**Informe Compra \r||46**sMS \r||47**ajuste \r||48**Configuración general \r||49**Entrada Maestro \r||50**Gestionar usuario \r||51**administrar cuentas \r||52**Gestionar Clase \r||53**Gestionar Asunto \r||54**Gestionar Exam \r||55**Gestionar Area SC \r||56**Gestionar SC Indicador \r||57**Gestionar Fee \r||58**Jefe Salario \r||59**Estructura salarial \r||60**material de la Escuela \r||61**Gestionar Ubicación \r||62**Encabezado y pie de página \r||63**permiso \r||64**Sesión actual \r||65**Navegación \r||66**Gráfico Informe \r||67**Calendario'),
(4, 2, '1**Front Office \r||2**Bel & Follow-up \r||3**andere Call \r||4**Aanvraag \r||5**klacht \r||6**bezoeker Boek \r||7**toelating \r||8**registratie \r||9**promotie \r||10**Fee-update \r||11**rapporten \r||12**toelating Report \r||13**vergoeding betalen \r||14**transactie \r||15**Expense \r||16**inkomen \r||17**Aanwezigheid \r||18**personeel Aanwezigheid \r||19**Aanwezigheid \r||20**Personeel Rapport Aanwezigheid \r||21**Student Rapport Aanwezigheid \r||22**Transport \r||23**Transport Route \r||24**examen \r||25**Scholastic Grade \r||26**Co Scholastic Grade \r||27**examen Report \r||28**Beheer Personeel \r||29**bibliotheek \r||30**Boeken beheren \r||31**Kwestie & Return \r||32**Dispatch & ontvangen \r||33**Dispatch \r||34**ontvangende \r||35**voorraad \r||36**Beheer Stock \r||37**Stock Transfer \r||38**aankoop Material \r||39**Leverancier \r||40**aankoop \r||41**kwestie Materiaal \r||42**Stock Report \r||43**School Materiaal \r||44**issue Report \r||45**aankoop Report \r||46**SMS \r||47**instelling \r||48**algemene instelling \r||49**Master Entry \r||50**Beheer Gebruiker \r||51**Accounts beheren \r||52**Beheer Class \r||53**Beheer Onderwerp \r||54**Beheer Examen \r||55**Beheer SC Area \r||56**Beheer SC Indicator \r||57**Beheer Fee \r||58**salaris Hoofd \r||59**salarisstructuur \r||60**School Materiaal \r||61**Beheer Locatie \r||62**Koptekst en voettekst \r||63**toestemming \r||64**huidige sessie \r||65**Navigatie \r||66**grafiek Report \r||67**Kalender'),
(5, 3, '1**Front Office \r||2**Call & Follow-up \r||3**andere Anruf \r||4**Anfrage \r||5**Beschwerde \r||6**Besucher buchen \r||7**Eintritt \r||8**Anmeldung \r||9**Förderung \r||10**Update Fee \r||11**Berichte \r||12**Eintritt Bericht \r||13**Gebührenzahlung \r||14**Transaktion \r||15**Ausgabe \r||16**Einkommen \r||17**Teilnahme \r||18**Personal Teilnahme \r||19**Schülerzahl \r||20**Mitarbeiter Anwesenheitsbericht \r||21**Schülerzahl Bericht \r||22**Transport \r||23**Transportroute \r||24**Prüfung \r||25**Scholastic Grade \r||26**Co Scholastic Grade \r||27**Untersuchungsbericht \r||28**Mitarbeiter verwalten \r||29**Bibliothek \r||30**Bücher verwalten \r||31**Frage & Return \r||32**Versand & Empfang \r||33**Versand \r||34**Empfang \r||35**Lager \r||36**Auf verwalten \r||37**Umlagerung \r||38**Kauf-Material \r||39**Lieferant \r||40**Kauf \r||41**Ausgabe-Material \r||42**stock Report \r||43**Schulmaterial \r||44**Problem melden \r||45**Kauf Bericht \r||46**SMS \r||47**Einstellung \r||48**Allgemeine Einstellung \r||49**Master-Eintrag \r||50**Benutzer verwalten \r||51**Konten verwalten \r||52**Klasse verwalten \r||53**Betreff verwalten \r||54**Exam verwalten \r||55**Verwalten SC Umgebung \r||56**SC-Anzeige verwalten \r||57**Fee verwalten \r||58**Gehalt Leiter \r||59**Gehaltsstruktur \r||60**Schulmaterial \r||61**Ort verwalten \r||62**Kopf-und Fußzeile \r||63**Erlaubnis \r||64**aktuelle Sitzung \r||65**Navigation \r||66**Graph Bericht \r||67**Kalender'),
(6, 4, '1**Front Office \r||2**Ligue e Acompanhamento \r||3**outros Chamada \r||4**Inquérito \r||5**queixa \r||6**Livro de Visitas \r||7**admissão \r||8**Inscrição \r||9**promoção \r||10**Taxa de atualização \r||11**relatórios \r||12**Relatório de admissão \r||13**taxa de pagamento \r||14**transação \r||15**despesa \r||16**renda \r||17**Presença \r||18**Atendimento pessoal \r||19**comparecimento do Aluno \r||20**Relatório do Corpo Técnico de Atendimento \r||21**Relatório de Frequência Student \r||22**transporte \r||23**Itinerários \r||24**exame \r||25**Scholastic Grade \r||26**Co Scholastic Grade \r||27**Relatório de exame \r||28**Gerenciar equipe \r||29**biblioteca \r||30**Gerenciar livros \r||31**Emissão & Return \r||32**Despacho e Recebimento \r||33**Despacho \r||34**receber \r||35**Banco \r||36**Controle Stock \r||37**Transferência de estoque \r||38**compra de materiais \r||39**fornecedor \r||40**compra \r||41**Emissão de materiais \r||42**Relatório de estoque \r||43**material escolar \r||44**Reportagem Edição \r||45**Relatório de Compra \r||46**SMS \r||47**definição \r||48**Ajustes Gerais \r||49**Mestre entrada \r||50**Gerenciar usuário \r||51**Gerenciar Contas \r||52**Gerenciar Classe \r||53**Gerenciar Assunto \r||54**Gerenciar Exame \r||55**Gerenciar Área SC \r||56**Gerenciar Indicador SC \r||57**Gerenciar Fee \r||58**salário Cabeça \r||59**Estrutura salarial \r||60**material escolar \r||61**Gerenciar Localização \r||62**Cabeçalho e Rodapé \r||63**permissão \r||64**Sessão Atual \r||65**Navegação \r||66**gráfico Relatório \r||67**Calendário'),
(7, 7, '**||1**/&*^*^%&%||2**./././;.//||3**.//.//.||4**.//.../.||5**./././>,lj,,,../.||6**./||7**''.?||8**?.?.||9**>?..||10**.||11**.||12**>||13**/''/[||14**''[''||15**''][||16**''][''[||17**||18**||19**||20**||21**||22**||23**||24**||25**||26**||27**||28**||29**||30**||31**||32**||33**||34**||35**||36**||37**||38**||39**||40**||41**||42**||43**||44**||45**||46**||47**||48**||49**||50**||51**||52**||53**||54**||55**||56**||57**||58**||59**||60**||61**||62**||63**||64**||65**||66**||67**');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`UserId` int(11) NOT NULL,
  `StaffId` varchar(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UserType` int(11) NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL,
  `DOLUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `StaffId`, `Username`, `Password`, `UserType`, `DOE`, `DOL`, `DOLUsername`) VALUES
(1, '', 'webmaster', '50a9c7dbf0fa09e8969978317dca12e8', 0, '', '', ''),
(2, '', 'masteruser', 'e10adc3949ba59abbe56e057f20f883e', 0, '', '', ''),
(3, '1', 'students', 'e10adc3949ba59abbe56e057f20f883e', 82, '1435321200', 'masteruser', ''),
(4, '2', 'parents', 'e10adc3949ba59abbe56e057f20f883e', 81, '1435381980', '', ''),
(5, '6', 'manageEvents', 'e10adc3949ba59abbe56e057f20f883e', 87, '1440997920', '', ''),
(6, '5', 'teachers', 'e10adc3949ba59abbe56e057f20f883e', 86, '1440997980', '', ''),
(7, '4', 'transportors', 'e10adc3949ba59abbe56e057f20f883e', 85, '1440998040', '', ''),
(8, '3', 'accountants', 'e10adc3949ba59abbe56e057f20f883e', 47, '1440998040', '', ''),
(9, '7', 'sdfsdf', 'e10adc3949ba59abbe56e057f20f883e', 87, '1442315580', 'masteruser', ''),
(10, '8', 'khfdkjsfh', 'e9abc6354e23f7afd071773837be0bf9', 82, '', '', ''),
(11, '8', 'sdhfjksdhf', '9e1a95136bec22eba997f378cec0e025', 81, '', '', ''),
(12, '8', 'fhdskjf', '202cb962ac59075b964b07152d234b70', 47, '', '', ''),
(13, '9', 'dfgdfg', '29c37d6f631beeadb5fd63b63e7c4acd', 47, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
`VehicleId` int(11) NOT NULL,
  `VehicleStatus` varchar(10) NOT NULL,
  `VehicleNumber` varchar(100) NOT NULL,
  `VehicleName` varchar(100) NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VehicleId`, `VehicleStatus`, `VehicleNumber`, `VehicleName`, `DOE`, `DOL`) VALUES
(1, 'Active', 'MP04CA5508', 'BUS', '1440194400', ''),
(2, 'Active', 'PM04CM3423', 'BUS 2', '1438595220', ''),
(3, 'Active', 'mp 04 ss 2712', 'racer', '1440194400', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclefuel`
--

CREATE TABLE IF NOT EXISTS `vehiclefuel` (
`FuelId` int(11) NOT NULL,
  `FuelStatus` varchar(10) NOT NULL,
  `VehicleId` int(11) NOT NULL,
  `ReceiptNo` varchar(100) NOT NULL,
  `Quantity` decimal(10,2) NOT NULL,
  `Rate` decimal(10,2) NOT NULL,
  `DOF` varchar(20) NOT NULL,
  `DOE` varchar(20) NOT NULL,
  `DOL` varchar(20) NOT NULL,
  `DOD` varchar(20) NOT NULL,
  `DODUsername` varchar(100) NOT NULL,
  `Remarks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiclefuel`
--

INSERT INTO `vehiclefuel` (`FuelId`, `FuelStatus`, `VehicleId`, `ReceiptNo`, `Quantity`, `Rate`, `DOF`, `DOE`, `DOL`, `DOD`, `DODUsername`, `Remarks`) VALUES
(1, 'Active', 1, '123456', '10.00', '60.00', '0', '1440194400', '', '', '', 'jhkj'),
(2, 'Active', 2, '9776', '10.00', '51.00', '1438585620', '1438595220', '', '', '', ''),
(3, 'Active', 1, '112', '10.00', '20.00', '1440228720', '1440228720', '', '', '', 'jgjhg'),
(4, 'Active', 3, '2323', '10.00', '20.00', '1440194400', '1440194400', '', '', '', 'jhfsdhf'),
(5, 'Active', 3, '4565', '45.00', '56.00', '1440194400', '1440194400', '', '', '', 'gfhdf');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclereading`
--

CREATE TABLE IF NOT EXISTS `vehiclereading` (
`VehicleReadingId` int(11) NOT NULL,
  `VehicleReadingStatus` varchar(10) NOT NULL,
  `VehicleId` int(11) NOT NULL,
  `Reading` int(11) NOT NULL,
  `DOR` varchar(20) NOT NULL,
  `Remarks` text NOT NULL,
  `DOE` varchar(20) NOT NULL,
  `DOL` varchar(20) NOT NULL,
  `DOD` varchar(20) NOT NULL,
  `DODUsername` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiclereading`
--

INSERT INTO `vehiclereading` (`VehicleReadingId`, `VehicleReadingStatus`, `VehicleId`, `Reading`, `DOR`, `Remarks`, `DOE`, `DOL`, `DOD`, `DODUsername`) VALUES
(1, 'Active', 1, 50, '1435304940', '', '1435304940', '', '', ''),
(2, 'Active', 2, 78, '1438574760', '', '1438595280', '', '', ''),
(3, 'Active', 3, 450, '1440194400', 'fdsfsd', '1440194400', '', '', ''),
(4, 'Active', 3, 12, '1440194400', 'ghjgj', '1440194400', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicleroute`
--

CREATE TABLE IF NOT EXISTS `vehicleroute` (
`VehicleRouteId` int(11) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `VehicleRouteStatus` varchar(10) NOT NULL,
  `VehicleRouteName` varchar(100) NOT NULL,
  `VehicleId` int(11) NOT NULL,
  `Route` text NOT NULL,
  `RouteTo` int(11) NOT NULL,
  `VehicleRouteRemarks` text NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicleroute`
--

INSERT INTO `vehicleroute` (`VehicleRouteId`, `Session`, `VehicleRouteStatus`, `VehicleRouteName`, `VehicleId`, `Route`, `RouteTo`, `VehicleRouteRemarks`, `DOE`, `DOL`) VALUES
(1, '2015-2016', 'Active', 'board office chouraha', 1, '52,53,54', 17, 'testing\r\n\r\n', '1440367200', ''),
(2, '2015-2016', 'Active', 'm.p nagar', 3, '52,53,54', 16, 'tetsing', '1440367200', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicleroutedetail`
--

CREATE TABLE IF NOT EXISTS `vehicleroutedetail` (
`VehicleRouteDetailId` int(11) NOT NULL,
  `VehicleRouteDetailStatus` varchar(10) NOT NULL,
  `VehicleRouteId` int(11) NOT NULL,
  `RouteStoppageId` int(11) NOT NULL,
  `Students` text NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicleroutedetail`
--

INSERT INTO `vehicleroutedetail` (`VehicleRouteDetailId`, `VehicleRouteDetailStatus`, `VehicleRouteId`, `RouteStoppageId`, `Students`, `DOE`, `DOL`) VALUES
(1, 'Active', 0, 52, '8', '1440367200', ''),
(2, 'Active', 2, 53, '8', '1440367200', ''),
(3, 'Active', 2, 52, '11', '1440367200', ''),
(4, 'Active', 1, 53, '12', '1440453600', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitorbook`
--

CREATE TABLE IF NOT EXISTS `visitorbook` (
`VisitorBookId` int(11) NOT NULL,
  `VisitorBookStatus` varchar(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `NoOfPeople` int(11) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Address` text NOT NULL,
  `Purpose` text NOT NULL,
  `Description` text NOT NULL,
  `InDateTime` varchar(10) NOT NULL,
  `OutDateTime` varchar(10) NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOEUsername` varchar(100) NOT NULL,
  `DOL` varchar(10) NOT NULL,
  `DOLUsername` varchar(100) NOT NULL,
  `DOD` varchar(10) NOT NULL,
  `DODUsername` varchar(100) NOT NULL,
  `Remarks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitorbook`
--

INSERT INTO `visitorbook` (`VisitorBookId`, `VisitorBookStatus`, `Name`, `NoOfPeople`, `Mobile`, `Address`, `Purpose`, `Description`, `InDateTime`, `OutDateTime`, `DOE`, `DOEUsername`, `DOL`, `DOLUsername`, `DOD`, `DODUsername`, `Remarks`) VALUES
(1, 'Active', 'sagar', 2, '8756988745', '', '30', 'admission enquiry', '1435406700', '1435406700', '1435406700', 'masteruser', '1435406700', 'masteruser', '', '', ''),
(2, 'Active', 'nidhi', 3, '9826448899', '', '29', 'admission enquiry', '1435783260', '1435790940', '1435839000', 'masteruser', '1435839960', 'masteruser', '', '', ''),
(3, 'Active', 'Rushda', 1, '9827556789', '', '30', 'admission enquiry', '1435792140', '1435798620', '1435839840', 'masteruser', '1435839840', 'masteruser', '', '', ''),
(4, 'Active', 'sandeep', 2, '8989161488', '', '29', '', '1438582380', '', '1438596060', 'masteruser', '', '', '', '', ''),
(5, 'Fresh', 'xyz', 5, '2154875487', '', '30', 'abcd', '1439848800', '1439244000', '', 'masteruser', '', '', '', '', ''),
(6, 'Fresh', '', 0, '', '', '', '', '0', '', '', 'masteruser', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
 ADD PRIMARY KEY (`AccountId`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
 ADD PRIMARY KEY (`AdmissionId`);

--
-- Indexes for table `backuprestore`
--
ALTER TABLE `backuprestore`
 ADD PRIMARY KEY (`BackUpRestoreId`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `bookissue`
--
ALTER TABLE `bookissue`
 ADD PRIMARY KEY (`BookIssueId`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
 ADD PRIMARY KEY (`CalendarId`);

--
-- Indexes for table `calling`
--
ALTER TABLE `calling`
 ADD PRIMARY KEY (`CallId`);

--
-- Indexes for table `circular`
--
ALTER TABLE `circular`
 ADD PRIMARY KEY (`CircularId`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`ClassId`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
 ADD PRIMARY KEY (`ComplaintId`);

--
-- Indexes for table `drregister`
--
ALTER TABLE `drregister`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
 ADD PRIMARY KEY (`EnquiryId`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
 ADD PRIMARY KEY (`ExamId`);

--
-- Indexes for table `examdetail`
--
ALTER TABLE `examdetail`
 ADD PRIMARY KEY (`ExamDetailId`);

--
-- Indexes for table `examdetails`
--
ALTER TABLE `examdetails`
 ADD PRIMARY KEY (`Exam_Detail_Id`);

--
-- Indexes for table `examtype`
--
ALTER TABLE `examtype`
 ADD PRIMARY KEY (`Exam_Type`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
 ADD PRIMARY KEY (`ExpenseId`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
 ADD PRIMARY KEY (`FeeId`);

--
-- Indexes for table `feepayment`
--
ALTER TABLE `feepayment`
 ADD PRIMARY KEY (`FeePaymentId`);

--
-- Indexes for table `followup`
--
ALTER TABLE `followup`
 ADD PRIMARY KEY (`FollowUpId`);

--
-- Indexes for table `generalsetting`
--
ALTER TABLE `generalsetting`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
 ADD PRIMARY KEY (`HeaderId`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
 ADD PRIMARY KEY (`HouseId`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
 ADD PRIMARY KEY (`IssueId`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
 ADD PRIMARY KEY (`LanguageId`);

--
-- Indexes for table `listbook`
--
ALTER TABLE `listbook`
 ADD PRIMARY KEY (`ListBookId`);

--
-- Indexes for table `listbookconfirm`
--
ALTER TABLE `listbookconfirm`
 ADD PRIMARY KEY (`ListBookConfirmId`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`LocationId`);

--
-- Indexes for table `masterentry`
--
ALTER TABLE `masterentry`
 ADD PRIMARY KEY (`MasterEntryId`);

--
-- Indexes for table `masterentrycategory`
--
ALTER TABLE `masterentrycategory`
 ADD PRIMARY KEY (`MasterEntryCategoryId`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
 ADD PRIMARY KEY (`NoteId`);

--
-- Indexes for table `ocalling`
--
ALTER TABLE `ocalling`
 ADD PRIMARY KEY (`OCallId`);

--
-- Indexes for table `pagename`
--
ALTER TABLE `pagename`
 ADD PRIMARY KEY (`PageNameId`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
 ADD PRIMARY KEY (`PermissionId`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
 ADD PRIMARY KEY (`PhotoId`);

--
-- Indexes for table `phrase`
--
ALTER TABLE `phrase`
 ADD PRIMARY KEY (`PhraseId`);

--
-- Indexes for table `printoption`
--
ALTER TABLE `printoption`
 ADD PRIMARY KEY (`PrintOptionId`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
 ADD PRIMARY KEY (`PurchaseId`);

--
-- Indexes for table `purchaselist`
--
ALTER TABLE `purchaselist`
 ADD PRIMARY KEY (`PurchaseListId`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
 ADD PRIMARY KEY (`QualificationId`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`RegistrationId`);

--
-- Indexes for table `salaryhead`
--
ALTER TABLE `salaryhead`
 ADD PRIMARY KEY (`SalaryHeadId`);

--
-- Indexes for table `salarystructure`
--
ALTER TABLE `salarystructure`
 ADD PRIMARY KEY (`SalaryStructureId`);

--
-- Indexes for table `salarystructuredetail`
--
ALTER TABLE `salarystructuredetail`
 ADD PRIMARY KEY (`SalaryStructureDetailId`);

--
-- Indexes for table `scarea`
--
ALTER TABLE `scarea`
 ADD PRIMARY KEY (`SCAreaId`);

--
-- Indexes for table `scexamdetail`
--
ALTER TABLE `scexamdetail`
 ADD PRIMARY KEY (`SCExamDetailId`);

--
-- Indexes for table `schoolmaterial`
--
ALTER TABLE `schoolmaterial`
 ADD PRIMARY KEY (`SchoolMaterialId`);

--
-- Indexes for table `scindicator`
--
ALTER TABLE `scindicator`
 ADD PRIMARY KEY (`SCIndicatorId`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
 ADD PRIMARY KEY (`SectionId`);

--
-- Indexes for table `sibling`
--
ALTER TABLE `sibling`
 ADD PRIMARY KEY (`SiblingId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`StaffId`);

--
-- Indexes for table `staffattendance`
--
ALTER TABLE `staffattendance`
 ADD PRIMARY KEY (`StaffAttendanceId`);

--
-- Indexes for table `staffsalary`
--
ALTER TABLE `staffsalary`
 ADD PRIMARY KEY (`StaffSalaryId`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
 ADD PRIMARY KEY (`StockId`);

--
-- Indexes for table `stockassign`
--
ALTER TABLE `stockassign`
 ADD PRIMARY KEY (`StockAssignId`);

--
-- Indexes for table `studentattendance`
--
ALTER TABLE `studentattendance`
 ADD PRIMARY KEY (`StudentAttendanceId`);

--
-- Indexes for table `studentfee`
--
ALTER TABLE `studentfee`
 ADD PRIMARY KEY (`StudentFeeId`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`SubjectId`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`SupplierId`);

--
-- Indexes for table `timezone`
--
ALTER TABLE `timezone`
 ADD PRIMARY KEY (`TimezoneId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`TransactionId`);

--
-- Indexes for table `translate`
--
ALTER TABLE `translate`
 ADD PRIMARY KEY (`TranslateId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
 ADD PRIMARY KEY (`VehicleId`);

--
-- Indexes for table `vehiclefuel`
--
ALTER TABLE `vehiclefuel`
 ADD PRIMARY KEY (`FuelId`);

--
-- Indexes for table `vehiclereading`
--
ALTER TABLE `vehiclereading`
 ADD PRIMARY KEY (`VehicleReadingId`);

--
-- Indexes for table `vehicleroute`
--
ALTER TABLE `vehicleroute`
 ADD PRIMARY KEY (`VehicleRouteId`);

--
-- Indexes for table `vehicleroutedetail`
--
ALTER TABLE `vehicleroutedetail`
 ADD PRIMARY KEY (`VehicleRouteDetailId`);

--
-- Indexes for table `visitorbook`
--
ALTER TABLE `visitorbook`
 ADD PRIMARY KEY (`VisitorBookId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
MODIFY `AdmissionId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `backuprestore`
--
ALTER TABLE `backuprestore`
MODIFY `BackUpRestoreId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bookissue`
--
ALTER TABLE `bookissue`
MODIFY `BookIssueId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
MODIFY `CalendarId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `calling`
--
ALTER TABLE `calling`
MODIFY `CallId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `circular`
--
ALTER TABLE `circular`
MODIFY `CircularId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `ClassId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
MODIFY `ComplaintId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `drregister`
--
ALTER TABLE `drregister`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
MODIFY `EnquiryId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
MODIFY `ExamId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `examdetail`
--
ALTER TABLE `examdetail`
MODIFY `ExamDetailId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `examdetails`
--
ALTER TABLE `examdetails`
MODIFY `Exam_Detail_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
MODIFY `ExpenseId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
MODIFY `FeeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `feepayment`
--
ALTER TABLE `feepayment`
MODIFY `FeePaymentId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `followup`
--
ALTER TABLE `followup`
MODIFY `FollowUpId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `generalsetting`
--
ALTER TABLE `generalsetting`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
MODIFY `HeaderId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
MODIFY `HouseId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
MODIFY `IssueId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
MODIFY `LanguageId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `listbook`
--
ALTER TABLE `listbook`
MODIFY `ListBookId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `listbookconfirm`
--
ALTER TABLE `listbookconfirm`
MODIFY `ListBookConfirmId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `LocationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `masterentry`
--
ALTER TABLE `masterentry`
MODIFY `MasterEntryId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `masterentrycategory`
--
ALTER TABLE `masterentrycategory`
MODIFY `MasterEntryCategoryId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
MODIFY `NoteId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ocalling`
--
ALTER TABLE `ocalling`
MODIFY `OCallId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pagename`
--
ALTER TABLE `pagename`
MODIFY `PageNameId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
MODIFY `PermissionId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
MODIFY `PhotoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `phrase`
--
ALTER TABLE `phrase`
MODIFY `PhraseId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `printoption`
--
ALTER TABLE `printoption`
MODIFY `PrintOptionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
MODIFY `PurchaseId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `purchaselist`
--
ALTER TABLE `purchaselist`
MODIFY `PurchaseListId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
MODIFY `QualificationId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
MODIFY `RegistrationId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `salaryhead`
--
ALTER TABLE `salaryhead`
MODIFY `SalaryHeadId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `salarystructure`
--
ALTER TABLE `salarystructure`
MODIFY `SalaryStructureId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salarystructuredetail`
--
ALTER TABLE `salarystructuredetail`
MODIFY `SalaryStructureDetailId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scarea`
--
ALTER TABLE `scarea`
MODIFY `SCAreaId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `scexamdetail`
--
ALTER TABLE `scexamdetail`
MODIFY `SCExamDetailId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `schoolmaterial`
--
ALTER TABLE `schoolmaterial`
MODIFY `SchoolMaterialId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `scindicator`
--
ALTER TABLE `scindicator`
MODIFY `SCIndicatorId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
MODIFY `SectionId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sibling`
--
ALTER TABLE `sibling`
MODIFY `SiblingId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `StaffId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `staffattendance`
--
ALTER TABLE `staffattendance`
MODIFY `StaffAttendanceId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `staffsalary`
--
ALTER TABLE `staffsalary`
MODIFY `StaffSalaryId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
MODIFY `StockId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stockassign`
--
ALTER TABLE `stockassign`
MODIFY `StockAssignId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentattendance`
--
ALTER TABLE `studentattendance`
MODIFY `StudentAttendanceId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `studentfee`
--
ALTER TABLE `studentfee`
MODIFY `StudentFeeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `SupplierId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `timezone`
--
ALTER TABLE `timezone`
MODIFY `TimezoneId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=420;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `TransactionId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `translate`
--
ALTER TABLE `translate`
MODIFY `TranslateId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
MODIFY `VehicleId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vehiclefuel`
--
ALTER TABLE `vehiclefuel`
MODIFY `FuelId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vehiclereading`
--
ALTER TABLE `vehiclereading`
MODIFY `VehicleReadingId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vehicleroute`
--
ALTER TABLE `vehicleroute`
MODIFY `VehicleRouteId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vehicleroutedetail`
--
ALTER TABLE `vehicleroutedetail`
MODIFY `VehicleRouteDetailId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `visitorbook`
--
ALTER TABLE `visitorbook`
MODIFY `VisitorBookId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
