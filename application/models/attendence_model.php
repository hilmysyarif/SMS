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
}