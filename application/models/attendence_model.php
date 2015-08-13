<?php
class Attendence_model extends CI_Model
{
	//variable initialize
	var $title   = '';
	var $content = '';
	var $date    = '';

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		//Load database connection
		$this->load->database();
	}
	
	function get_staff($table=false)
	{
			$qry = $this->db->query("select StaffName,StaffId,MasterEntryValue from staff,masterentry where 
								staff.StaffPosition=masterentry.MasterEntryId and staff.StaffStatus='Active' order by StaffName");	
			return $qry->Result();	
	}
	
	function get_staff_pl($StaffId=false,$DateTimeStamp=false)
	{
			$qry = $this->db->query("select StaffName,PaidLeave from staff,staffsalary where
			staff.StaffId=staffsalary.StaffId and 
			staff.StaffId='$StaffId' and
			EffectiveFrom<='$DateTimeStamp'
			order by CAST(EffectiveFrom as SIGNED) desc");	
			return $qry->Result();	
	}
	
	function get_staff_att($SessionStartinDateTS=false,$SessionEndingDateTS=false)
	{
			$qry = $this->db->query("select Attendance from staffattendance where Date>='$SessionStartinDateTS' and Date<='$SessionEndingDateTS'");	
			return $qry->Result();	
	}
	
	function get_staff_att_date($AttendanceDate=false)
	{
			$qry = $this->db->query("select Attendance from staffattendance where Date='$AttendanceDate' ");	
			return $qry->Result();	
	}
	 
	 function update_attendance($NewAttendance=false,$AttendanceDate=false)
	{
			$qry = $this->db->query("update staffattendance set Attendance='$NewAttendance' where Date='$AttendanceDate' ");	
				
	}
	
	function delete_attendance($AttendanceDate=false)
	{
			$qry = $this->db->query("delete from staffattendance where Date='$AttendanceDate'");	
			
	}
	
	function insert_attendance($AttendanceDate=false,$AttendanceString=false,$DateTimeStamp=false,$USERNAME=false)
	{
			$qry = $this->db->query("insert into staffattendance(Date,Attendance,DOL,DOLUsername) values('$AttendanceDate','$AttendanceString','$DateTimeStamp','$USERNAME')");	
	}
	
	function get_staff_attendance($date1timestamp=false,$date2timestamp=false)
	{
			$qry = $this->db->query("select Attendance,Date from staffattendance where Date>='$date1timestamp' and Date<='$date2timestamp'");
			return $qry->Result();
	}
	
	function get_staff_show()
	{
			$qry = $this->db->query("select StaffName,StaffMobile,StaffId,MasterEntryValue from staff,masterentry where
						staff.StaffPosition=masterentry.MasterEntryId and StaffStatus='Active'
						order by StaffName");
			return $qry->Result();
	}
	
	/*Student Attendance Coding For model Start...................................................................................*/
	
	function get_class($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select ClassName,SectionName,SectionId from class,section where 
					class.ClassId=section.ClassId and class.ClassStatus='Active' and
					section.SectionStatus='Active' and class.Session='$CURRENTSESSION' order by ClassName");
			return $qry->Result();
	}
	
	function get_student($CURRENTSESSION=false,$GETSectionId=false)
	{
			$qry = $this->db->query("select admission.AdmissionId,StudentName,FatherName from studentfee,registration,admission where 
				studentfee.AdmissionId=admission.AdmissionId and Status='Studying' and
				registration.RegistrationId=admission.RegistrationId and
				studentfee.Session='$CURRENTSESSION' and
				studentfee.Sectionid='$GETSectionId' 
				order by StudentName");
			return $qry->Result();
	}
	
	function get_student_attendance($AttendanceDate=false)
	{
			$qry = $this->db->query("select Attendance from studentattendance where Date='$AttendanceDate'");
			return $qry->Result();
	}
	
	function update_student_attendance($NewAttendance=false,$AttendanceDate=false)
	{
			$this->db->query("update studentattendance set Attendance='$NewAttendance' where Date='$AttendanceDate'");
	}
	
	function delete_student_attendance($AttendanceDate=false)
	{
			$this->db->query("delete from studentattendance where Date='$AttendanceDate'");
	}
	
	function insert_student_attendance($AttendanceDate=false,$AttendanceString=false,$DateTimeStamp=false,$USERNAME=false)
	{
			$this->db->query("insert into studentattendance(Date,Attendance,DOL,DOLUsername) values('$AttendanceDate','$AttendanceString','$DateTimeStamp','$USERNAME')");
	}
	
	function student_attendance_report($date1timestamp=false,$date2timestamp=false)
	{
			$qry = $this->db->query("select Attendance,Date from studentattendance where Date>='$date1timestamp' and Date<='$date2timestamp'");
			return $qry->Result();
	}
	
	function get_student_attendance_report($POSTSectionId=false)
	{
			$qry = $this->db->query("select StudentName,FatherName,Mobile,admission.AdmissionId from registration,admission,studentfee where
						registration.RegistrationId=admission.RegistrationId and
						admission.AdmissionId=studentfee.AdmissionId and
						studentfee.SectionId='$POSTSectionId'");
			return $qry->Result();
	}
	
}