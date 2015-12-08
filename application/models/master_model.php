<?php
/* Model for Master entries   */

class Master_model extends CI_Model 
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
	
	/* function for insert_gen_setting...............................................................................  */
	function set_session($table=false,$data=false)
   {
	     if($data){
			$this->db->update($table,$data);
			return true;
		}   return false;
		 }
  /* function for insert_gen_setting end.........................................................................  */ 
  
    
/* function show school info start...............................................................................  */
 function get_info($table=false,$filter=false)
   {	
		if($filter){
			$query = $this->db->get_where($table,$filter);
		return $query->Result();
		}
	    $query = $this->db->get_where($table);
		return $query->Result();
   }
 /* function show school info end.........................................................................  */ 
  
	
 /* function for insert_gen_setting...............................................................................  */
 function insert_gen_setting($table=false,$data=false,$filter=false)
   {
    if($filter){
			$this->db->where($filter);
			$this->db->update($table,$data);
		} else {
			if($table=='user'){
			$field=array ('StaffId'=>$data['StaffId']);
			$ql=$this->db->select('StaffId')->from($table)->where($field)->get();
			if ($ql->num_rows()>0)
    	{   return false;
			}else{
			$this->db->insert($table,$data);
			return true;
			}}else{
				$this->db->insert($table,$data);
			return true;
			}
		}
   }
  /* function for insert_gen_setting end.........................................................................  */ 
  
/* function show school userinfo start..........................................................................  */
 function get_userinfo($table=false,$filter=false)
   {	
		$query=$this->db->query("SELECT * from user,masterentry,staff where 
				user.UserType=masterentry.MasterEntryId and
				user.StaffId=staff.StaffId and
				UserType!='0' 
				order by Username");
				return $query->Result();
   }
 /* function show school userinfo end.........................................................................  */ 

/* function show school selectstaff start.........................................................................  */
 function get_selectstaff($table=false,$filter=false)
   {	
		$query=$this->db->query("select StaffName,StaffId,StaffMobile,MasterEntryValue  from staff,masterentry where 
													StaffStatus='Active' and
													staff.StaffPosition=masterentry.MasterEntryId and MasterEntryId!='1' and MasterEntryId!='2'
													order by MasterEntryValue,StaffName");
		return $query->Result();
   }
 /* function show school selectstaff end.........................................................................  */ 

 /* function show school account start..........................................................................  */
 function get_acc($table=false,$CURRENTSESSION=false)
   {	
	if($CURRENTSESSION){
		$query=$this->db->query("SELECT * from ".$table." where $table.Session='$CURRENTSESSION'");
	}else{
		$query=$this->db->query("SELECT * from ".$table."");
	}
		
				return $query->Result();
   }
 /* function show school account end.........................................................................  */ 

   /* function show school selectstaff start.........................................................................  */
   function get_scarea($CURRENTSESSION=false)
   {
   	$query=$this->db->query("select SCAreaName,SCAreaClass,SCAreaId,MasterEntryValue,GradingPoint from scarea,masterentry where 
						SCAreaStatus='Active' and
						scarea.SCPartId=masterentry.MasterEntryId and
						scarea.Session='$CURRENTSESSION'
						order by SCAreaName");
   	return $query->Result();
   }
   /* function show school selectstaff end.........................................................................  */

   /* function show school selectstaff start.........................................................................  */
   function get_fee($CURRENTSESSION=false)
   {
   	$query=$this->db->query("select MasterEntryValue,ClassName,SectionName,Amount,FeeId,Distance from fee,section,class,masterentry where 
		fee.SectionId=section.SectionId and
		section.ClassId=class.ClassId and 
		fee.FeeType=masterentry.MasterEntryId and 
		fee.Session='$CURRENTSESSION' and
		FeeStatus='Active' order by ClassName,SectionName");
   	return $query->Result();
   }
   /* function show school selectstaff end.........................................................................  */

   /* function show school selectstaff start.........................................................................  */
   function get_salaryhead($table=false,$filter=false)
   {
   	$query=$this->db->query("select * from salaryhead,masterentry where salaryhead.SalaryHeadType=masterentry.MasterEntryId order by SalaryHead");
   	return $query->Result();
   }
   /* function show school selectstaff end.........................................................................  */

   /* function show school selectstaff start.........................................................................  */
   function get_header($table=false,$filter=false)
   {
   	$query=$this->db->query("select * from header,masterentry where header.HRType=masterentry.MasterEntryId and MasterEntryName='HeaderFooter' order by HeaderTitle");
   	return $query->Result();
   }
   /* function show school selectstaff end.........................................................................  */

   
   /* function show school selectstaff start.........................................................................  */
   function get_printoption($table=false,$filter=false)
   {
   	$query=$this->db->query("select * from printoption,masterentry where 
						printoption.PrintCategory=masterentry.MasterEntryId and 
						PrintOptionStatus='Active' ");
   	return $query->Result();
   }
   /* function show school selectstaff end.........................................................................  */
     
   
   /* function show school selectstaff start.........................................................................  */
   function get_printheader($table=false,$filter=false)
   {
   	$query=$this->db->query("select * from header,masterentry where header.HRType=masterentry.MasterEntryId and MasterEntryValue='Header' order by HeaderTitle");
   	return $query->Result();
   }
   /* function show school selectstaff end.........................................................................  */
     
   /* function show school selectstaff start.........................................................................  */
   function get_printfooter($table=false,$filter=false)
   {
   	$query=$this->db->query("select * from header,masterentry where header.HRType=masterentry.MasterEntryId and MasterEntryValue='Footer' order by HeaderTitle");
   	return $query->Result();
   }
   /* function show school selectstaff end.........................................................................  */

   /* function show school selectstaff start.........................................................................  */
   function get_salary($table=false,$filter=false)
   {
   	$query=$this->db->query("select * from salarystructure,salaryhead where salarystructure.FixedSalaryHead=salaryhead.SalaryHeadId  order by SalaryStructureId");
   	return $query->Result();
   }
   /* function show school selectstaff end.........................................................................  */
     
	function get_class_info($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select ClassName,SectionName,SectionId from class,section where 
						class.ClassId=section.ClassId and class.ClassStatus='Active' and
						section.SectionStatus='Active' and class.Session='$CURRENTSESSION' order by ClassName ");	
			return $qry->Result();	
	}
	
	/* function Delete start.........................................................................  */
   function delete($table=false,$filter=false)
   {
		$this->db->delete($table,$filter);
   }
   /* function Delete end.........................................................................  */
     
    function get_student_details($StudentStatus=false,$SectionQuery=false,$CURRENTSESSION=false)
   {
   	$query=$this->db->query("select ParentsPassword,StudentsPassword,PresentAddress,studentfee.AdmissionNo,StudentName,FatherName,Mobile,Date,DOB,ClassName,SectionName from registration,admission,studentfee,class,section where
					registration.RegistrationId=admission.RegistrationId and
					admission.AdmissionId=studentfee.AdmissionId and
					studentfee.StudentFeeStatus='$StudentStatus' and class.ClassId=section.ClassId and section.SectionId=studentfee.SectionId and 
					studentfee.Session='$CURRENTSESSION' $SectionQuery");
   	return $query->Result();
   }
   
   function get_staff_show()
	{
			$qry = $this->db->query("select StaffName,StaffMobile,StaffId,MasterEntryValue from staff,masterentry where
						staff.StaffPosition=masterentry.MasterEntryId and StaffStatus='Active'
						order by StaffName");
			return $qry->Result();
	}
	
	function get_staff_attendance($date1timestamp=false,$date2timestamp=false)
	{
			$qry = $this->db->query("select Attendance,Date from staffattendance where Date>='$date1timestamp' and Date<='$date2timestamp'");
			return $qry->Result();
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
	function printfee($TransactionId=false)
	{
			$qry = $this->db->query("select TransactionDate,Token,StudentName,TransactionSession,FatherName,MotherName,Mobile,ClassName,SectionName from transaction,studentfee,registration,admission,class,section where
	TransactionId='$TransactionId' and
	TransactionHead='Fee' and
	TransactionStatus='Active' and
	transaction.TransactionHeadId=admission.AdmissionId and
	studentfee.AdmissionId=admission.AdmissionId and
	registration.RegistrationId=admission.RegistrationId and
	studentfee.SectionId=section.SectionId and 
	class.ClassId=section.ClassId and
	ClassStatus='Active' and
	SectionStatus='Active'");
			return $qry->Result();
	}
	function printfeenam($Token=false)
	{
			$qry = $this->db->query("Select MasterEntryValue as FeeName,feepayment.Amount as Paid from fee,feepayment,masterentry where
				feepayment.Token='$Token' and
				fee.FeeId=feepayment.FeeType and
				fee.FeeType=masterentry.MasterEntryId");
			return $qry->Result();
	}
	function get_route_list($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select VehicleRouteId,VehicleRouteName,VehicleName,VehicleNumber,Route,MasterEntryValue from vehicle,vehicleroute,masterentry where
		VehicleRouteStatus='Active' and
		vehicleroute.VehicleId=vehicle.VehicleId and
		vehicleroute.RouteTo=masterentry.MasterEntryId and
		vehicleroute.Session='$CURRENTSESSION' 
		order by VehicleRouteName");	
			return $qry->Result();	
	}
	function get_route_details($UniqueId=false)
	{
			$qry = $this->db->query("Select VehicleRouteDetailId,RouteStoppageId,MasterEntryValue,Students,DOE from vehicleroutedetail,masterentry where
		vehicleroutedetail.RouteStoppageId=masterentry.MasterEntryId and
		VehicleRouteId='$UniqueId' and
		VehicleRouteDetailStatus='Active'");	
			return $qry->Result();	
	}
	function get_route_single($UniqueId=false,$CURRENTSESSION=false)
	{
			$qry = $this->db->query("select * from vehicleroute where VehicleRouteId='$UniqueId' and Session='$CURRENTSESSION'");	
			return $qry->Result();	
	}
	function get_staff($table=false)
	{
			$qry = $this->db->query("select * from staff,masterentry where staff.StaffPosition=masterentry.MasterEntryId order by StaffDOJ ");	
			return $qry->Result();	
	}
	function getprintbook()
	{
			$qry = $this->db->query("Select BookId,BookName,AuthorName,Publisher,MasterEntryValue,SubjectName from book,masterentry,subject where 
			book.Purpose=masterentry.MasterEntryId and
			book.SubjectId=subject.SubjectId and
					BookStatus='Active'");	
			return $qry->Result();	
		
	}
   
   
}