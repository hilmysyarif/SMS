-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2015 at 07:15 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `DateOfExam` varchar(25) CHARACTER SET utf8 NOT NULL,
  `DOC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DOU` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Evaluated_By` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `examtype`
--

CREATE TABLE IF NOT EXISTS `examtype` (
  `Exam_Type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Exam_Status` enum('Active','Inactive','Deleted') CHARACTER SET utf8 NOT NULL,
  `DOC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date OF Creation',
  `DOU` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date Of Modify',
  `Remarks` text CHARACTER SET utf8 NOT NULL,
  `Duration` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'Time Duration Of Exam'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE IF NOT EXISTS `homework` (
`homeworkid` int(11) NOT NULL,
  `sectionid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `homework` text CHARACTER SET utf8 NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dosubmission` datetime NOT NULL,
  `studentstatus` text CHARACTER SET utf8 NOT NULL,
  `createdby` varchar(20) CHARACTER SET utf8 NOT NULL,
  `updatedon` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updatedby` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masterentrycategory`
--

CREATE TABLE IF NOT EXISTS `masterentrycategory` (
`MasterEntryCategoryId` int(11) NOT NULL,
  `MasterEntryCategoryName` varchar(100) NOT NULL,
  `MasterEntryCategoryValue` varchar(100) NOT NULL,
  `Permission` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

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
(36, 'Result', 'Result', ''),
(37, 'Level', 'Level', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_details`
--

CREATE TABLE IF NOT EXISTS `online_exam_details` (
`online_exam_id` int(11) NOT NULL,
  `online_exam_status` enum('Active','Inactive','Postpond','Remove','Done') CHARACTER SET utf8 NOT NULL,
  `online_exam_date` varchar(10) CHARACTER SET utf8 NOT NULL,
  `online_subject_id` int(10) NOT NULL,
  `online_section_id` int(10) NOT NULL,
  `session` varchar(10) CHARACTER SET utf8 NOT NULL,
  `exam_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `online_max_marks` float NOT NULL,
  `online_cuttoff` float NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dou` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `online_exam_level` enum('Tough','Medium','Eaisy') CHARACTER SET utf8 NOT NULL,
  `no_of_qustion` int(10) NOT NULL,
  `online_ex_duration` time NOT NULL,
  `duration_per_qus` time NOT NULL,
  `remarks` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_student`
--

CREATE TABLE IF NOT EXISTS `online_exam_student` (
`online_exam_st_id` int(10) NOT NULL,
  `online_exam_id` int(10) NOT NULL,
  `online_student_id` int(10) NOT NULL,
  `online_qust_ans_id` varchar(200) CHARACTER SET utf8 NOT NULL,
  `correct_ans` int(10) NOT NULL,
  `wrong_ans` int(10) NOT NULL,
  `total_marks` float NOT NULL,
  `online_student_status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `time_duration` time NOT NULL,
  `no_of_qus_attemp` int(10) NOT NULL,
  `date_of_ex_taken` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phrase`
--

CREATE TABLE IF NOT EXISTS `phrase` (
`PhraseId` int(11) NOT NULL,
  `Phrase` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qustion_ans_bank`
--

CREATE TABLE IF NOT EXISTS `qustion_ans_bank` (
`qust_id` int(10) NOT NULL,
  `qust_status` varchar(20) CHARACTER SET utf8 NOT NULL,
  `qustion` text CHARACTER SET utf8 NOT NULL,
  `qus_option` varchar(500) CHARACTER SET utf8 NOT NULL,
  `answer` text CHARACTER SET utf8 NOT NULL,
  `qust_ans_description` text CHARACTER SET utf8 NOT NULL,
  `qust_solution` text CHARACTER SET utf8 NOT NULL,
  `toal_count_hit` int(10) NOT NULL,
  `wrong_hit` int(10) NOT NULL,
  `correct_hit` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `qust_level` enum('Tough','Medium','Eaisy') CHARACTER SET utf8 NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dou` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `session` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salarystructure`
--

CREATE TABLE IF NOT EXISTS `salarystructure` (
`SalaryStructureId` int(11) NOT NULL,
  `SalaryStructureName` varchar(100) NOT NULL,
  `FixedSalaryHead` text NOT NULL,
  `SalaryStructureStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scindicator`
--

CREATE TABLE IF NOT EXISTS `scindicator` (
`SCIndicatorId` int(11) NOT NULL,
  `SCAreaId` int(11) NOT NULL,
  `SCIndicatorName` varchar(100) NOT NULL,
  `SCIndicatorStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
`timetableid` int(11) NOT NULL,
  `sectionid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `datetime` text CHARACTER SET utf8 NOT NULL,
  `remarks` text CHARACTER SET utf8 NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dou` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `createdby` varchar(20) CHARACTER SET utf8 NOT NULL,
  `updatedby` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `translate`
--

CREATE TABLE IF NOT EXISTS `translate` (
`TranslateId` int(11) NOT NULL,
  `LanguageId` int(11) NOT NULL,
  `Translation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`UserId` int(11) NOT NULL, auto_increment,
  `StaffId` varchar(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UserType` int(11) NOT NULL,
  `DOE` varchar(10) NOT NULL,
  `DOL` varchar(10) NOT NULL,
  `DOLUsername` varchar(100) NOT NULL
  PRIMARY KEY  (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `homework`
--
ALTER TABLE `homework`
 ADD PRIMARY KEY (`homeworkid`), ADD KEY `sectionid` (`sectionid`,`subjectid`);

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
-- Indexes for table `online_exam_details`
--
ALTER TABLE `online_exam_details`
 ADD PRIMARY KEY (`online_exam_id`);

--
-- Indexes for table `online_exam_student`
--
ALTER TABLE `online_exam_student`
 ADD PRIMARY KEY (`online_exam_st_id`);

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
-- Indexes for table `qustion_ans_bank`
--
ALTER TABLE `qustion_ans_bank`
 ADD PRIMARY KEY (`qust_id`);

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
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
 ADD PRIMARY KEY (`timetableid`), ADD KEY `classid` (`sectionid`,`subjectid`,`staffid`);

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
MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
MODIFY `AdmissionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `backuprestore`
--
ALTER TABLE `backuprestore`
MODIFY `BackUpRestoreId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookissue`
--
ALTER TABLE `bookissue`
MODIFY `BookIssueId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
MODIFY `CalendarId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `calling`
--
ALTER TABLE `calling`
MODIFY `CallId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `circular`
--
ALTER TABLE `circular`
MODIFY `CircularId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `ClassId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
MODIFY `ComplaintId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drregister`
--
ALTER TABLE `drregister`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
MODIFY `EnquiryId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
MODIFY `ExamId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examdetail`
--
ALTER TABLE `examdetail`
MODIFY `ExamDetailId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examdetails`
--
ALTER TABLE `examdetails`
MODIFY `Exam_Detail_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
MODIFY `ExpenseId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
MODIFY `FeeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feepayment`
--
ALTER TABLE `feepayment`
MODIFY `FeePaymentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `followup`
--
ALTER TABLE `followup`
MODIFY `FollowUpId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `generalsetting`
--
ALTER TABLE `generalsetting`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
MODIFY `HeaderId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
MODIFY `homeworkid` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `ListBookId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `listbookconfirm`
--
ALTER TABLE `listbookconfirm`
MODIFY `ListBookConfirmId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `LocationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `masterentry`
--
ALTER TABLE `masterentry`
MODIFY `MasterEntryId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `masterentrycategory`
--
ALTER TABLE `masterentrycategory`
MODIFY `MasterEntryCategoryId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
MODIFY `NoteId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ocalling`
--
ALTER TABLE `ocalling`
MODIFY `OCallId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `online_exam_details`
--
ALTER TABLE `online_exam_details`
MODIFY `online_exam_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `online_exam_student`
--
ALTER TABLE `online_exam_student`
MODIFY `online_exam_st_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagename`
--
ALTER TABLE `pagename`
MODIFY `PageNameId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
MODIFY `PermissionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
MODIFY `PhotoId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phrase`
--
ALTER TABLE `phrase`
MODIFY `PhraseId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `printoption`
--
ALTER TABLE `printoption`
MODIFY `PrintOptionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
MODIFY `PurchaseId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchaselist`
--
ALTER TABLE `purchaselist`
MODIFY `PurchaseListId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
MODIFY `QualificationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qustion_ans_bank`
--
ALTER TABLE `qustion_ans_bank`
MODIFY `qust_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
MODIFY `RegistrationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salaryhead`
--
ALTER TABLE `salaryhead`
MODIFY `SalaryHeadId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salarystructure`
--
ALTER TABLE `salarystructure`
MODIFY `SalaryStructureId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salarystructuredetail`
--
ALTER TABLE `salarystructuredetail`
MODIFY `SalaryStructureDetailId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scarea`
--
ALTER TABLE `scarea`
MODIFY `SCAreaId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scexamdetail`
--
ALTER TABLE `scexamdetail`
MODIFY `SCExamDetailId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schoolmaterial`
--
ALTER TABLE `schoolmaterial`
MODIFY `SchoolMaterialId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scindicator`
--
ALTER TABLE `scindicator`
MODIFY `SCIndicatorId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
MODIFY `SectionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sibling`
--
ALTER TABLE `sibling`
MODIFY `SiblingId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `StaffId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staffattendance`
--
ALTER TABLE `staffattendance`
MODIFY `StaffAttendanceId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staffsalary`
--
ALTER TABLE `staffsalary`
MODIFY `StaffSalaryId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
MODIFY `StockId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stockassign`
--
ALTER TABLE `stockassign`
MODIFY `StockAssignId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentattendance`
--
ALTER TABLE `studentattendance`
MODIFY `StudentAttendanceId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentfee`
--
ALTER TABLE `studentfee`
MODIFY `StudentFeeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `SupplierId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
MODIFY `timetableid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timezone`
--
ALTER TABLE `timezone`
MODIFY `TimezoneId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=420;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `TransactionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `translate`
--
ALTER TABLE `translate`
MODIFY `TranslateId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
MODIFY `VehicleId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehiclefuel`
--
ALTER TABLE `vehiclefuel`
MODIFY `FuelId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehiclereading`
--
ALTER TABLE `vehiclereading`
MODIFY `VehicleReadingId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicleroute`
--
ALTER TABLE `vehicleroute`
MODIFY `VehicleRouteId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicleroutedetail`
--
ALTER TABLE `vehicleroutedetail`
MODIFY `VehicleRouteDetailId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visitorbook`
--
ALTER TABLE `visitorbook`
MODIFY `VisitorBookId` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
