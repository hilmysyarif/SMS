<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendences extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('attendence_model');
		$this->load->model('master_model');
		$this->load->model('authority_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		$this->load->library('authority');
		if (!$this->session->userdata('user_data')) show_error('Direct access is not allowed');
		$this->info= $this->session->userdata('user_data');
		$currentsession = $this->mhome->get_session();
		$this->session->set_userdata('currentsession',$currentsession);
		$currentsession=$this->currentsession = $this->session->userdata('currentsession');
	 }

	 
	
	/*school management Staff Attendence View Load.....................................................................................................*/
	function staffattendence()
	{	
	if(Authority::checkAuthority('StaffAttendence')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Staff Attendance', base_url().'attendence/staffattendence');
		$this->data['get_staff']=$this->attendence_model->get_staff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('staffattendence',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Staff Attendence View Load..............................................................................................................*/
	
	/*school management Add Staff Attendence .....................................................................................................*/
	function add_attendence()
	{	
	if(Authority::checkAuthority('StaffAttendence')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
	if($this->input->post('intime') && $this->input->post('date') && $this->input->post('outtime') !=''){
		
	$Date= date("Y-m-d");
	$USERNAME=$this->info[0]->usermailid;	
	$Attendance=$_POST['staff'];
	$Attendance1=$_POST['absent'];
	$AttendanceDate=$_POST['date'];
	$InTime=$_POST['intime'];
	$OutTime=$_POST['outtime'];
	$CurrentSessionArray=explode("-",$this->currentsession[0]->CurrentSession);
	$StartingYear=$CurrentSessionArray[0];
	$EndingYear=$CurrentSessionArray[1];
	$SessionStartingDate="01-04-$StartingYear 00:00am";
	$SessionEndingDate="31-03-$EndingYear 23:59am";
	$SessionStartinDateTS=strtotime($SessionStartingDate);
	$SessionEndingDateTS=strtotime($SessionEndingDate);
	$CountStaff=count($Attendance);
	if($_POST['Present']!=""){
	$Att="P";
	}
	elseif($_POST['Absent']!=""){
	$Att="A";}
	elseif($_POST['HalfDay']!=""){
	$Att="H"; }
	elseif($_POST['Holiday']!=""){
	$Att="HD"; }
	elseif($_POST['OnDuty']!=""){
	$Att="OD"; }
	elseif($_POST['PaidLeave']!=""){
	$Att="PL"; }
	elseif($_POST['Blank']!=""){
	$Att=""; }
	$DateTimeStamp=strtotime($Date);
	
	if($CountStaff==1 && $Att=="PL")
	{
		foreach($box2View as $Staff)
		$StaffId=$Staff;
		$row2=$this->data['get_staff']=$this->attendence_model->get_staff_pl($StaffId,$DateTimeStamp);
		$count2=count($row2);
		if($count2>0)
		{
			$PaidLeave=$row2['PaidLeave'];
		}
		$row1=$this->data['get_staff']=$this->attendence_model->get_staff_att($SessionStartinDateTS,$SessionEndingDateTS);
		
		while($row1=$row1)
			$MarkedAttendance[]=$row1['Attendance'];
		
		foreach($MarkedAttendance as $MarkedAttendanceValue)
		{
			$StaffAttAttendance=explode("-",$MarkedAttendanceValue);
			$MarkedStaffId=$StaffAttAttendance[0];
			$MarkedAtt=$StaffAttAttendance[1];
			
			if($MarkedStaffId==$StaffId && $MarkedAtt=="PL")
			$UsedPL++;
		}
	}
	
	$CountStaff=count($Attendance);
	
	if($Attendance=="" || $AttendanceDate=="" || $InTime=="" || $OutTime=="")
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("staffattendence").' All the fields are mandatory!!');
	}
	elseif($InTime==$OutTime)
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("staffattendence").' In time & out time cannot be same!!');
	}
	elseif($CountStaff>1 && $Att=="PL")
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("staffattendence").' In case of Paid leave please select only one staff at a time!!');
	}
	elseif($Att=="PL" && $count2==0)
	{
		
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("staffattendence").' Paid leave is not set yet for selected employee!!');
	}	
	elseif($Att=="PL" && $UsedPL==$PaidLeave)
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("staffattendence").' Selected staff has used all its paid leave!!"');
	}
	else
	{
		$InDateTime="$AttendanceDate $InTime";
		$OutDateTime="$AttendanceDate $OutTime";
		$ITS=strtotime($InDateTime);
		$OTS=strtotime($OutDateTime);
		$AttendanceDate=strtotime($AttendanceDate);
		$row=$this->attendence_model->get_staff_att_date($AttendanceDate);
		
		$AlreadyMarked=count($row);
		if($AlreadyMarked>0)
		{
			$row=$row;
			$LastAttendance=explode(",",$row['Attendance']);
			foreach($LastAttendance as $LastAttendanceValue)
			{
				$LastStaffAttAttendance=explode("-",$LastAttendanceValue);
				$LastStaffId=$LastStaffAttAttendance[0];
				$LastStaffAtt=$LastStaffAttAttendance[1];
				$LastStaffTime=$LastStaffAttAttendance[2];
				$Search=array_search($LastStaffId,$Attendance);
				if($Search===FALSE)
				$NewAttendance[]="$LastStaffId-$LastStaffAtt-$LastStaffTime-$ITS-$OTS";
				elseif($Att!="")
				$NewAttendance[]="$LastStaffId-$Att-$DateTimeStamp-$ITS-$OTS";
				$Marked[]=$LastStaffId;
			}
			
			foreach($Attendance as $AttendanceValue)
			{
				$SearchForMarkedIndex=array_search($AttendanceValue,$Marked);
				if($SearchForMarkedIndex===FALSE && $Att!="")
				$NewAttendance[]="$AttendanceValue-$Att-$DateTimeStamp-$ITS-$OTS";
			}
			foreach($Attendance1 as $AttendanceValue)
			{
				if($SearchForMarkedIndex===FALSE && $Att!="")
				$NewAttendance[]="$AttendanceValue-A-$DateTimeStamp-$ITS-$OTS";
			}
			$NewAttendance=implode(",",$NewAttendance);
			if($NewAttendance!="")
			$this->attendence_model->update_attendance($NewAttendance,$AttendanceDate);
			else
			$this->attendence_model->delete_attendance($AttendanceDate);
		}
		else
		{
			foreach($Attendance as $AttendanceValue)
				if($Att!="")
				$AttendanceString[]="$AttendanceValue-$Att-$DateTimeStamp-$ITS-$OTS";
			foreach($Attendance1 as $AttendanceValue2)
				if($Att!="")
				$AttendanceString[]="$AttendanceValue2-A-$DateTimeStamp-$ITS-$OTS";
				$AttendanceString=implode(",",$AttendanceString);
			if($AttendanceString!="")
			{
				$this->attendence_model->insert_attendance($AttendanceDate,$AttendanceString,$DateTimeStamp,$USERNAME);
			}
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("staffattendence").' Attendance updated successfully!!');
		}
	}
	redirect('attendences/staffattendence');
	}
	$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("staffattendence").' All the fields are mandatory!!');
		redirect('attendences/staffattendence');
	}
	/*school management Add Staff Attendence ..............................................................................................................*/
	
	
	/*school management staff Attendance report View Load.............................................................................................................*/
	function staffattendancereport()
	{	
	if(Authority::checkAuthority('StaffAttendenceReport')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
				$this->breadcrumb->clear();
				$this->breadcrumb->add_crumb('Staff Attendance Report', base_url().'attendence/staffattendancereport');
				$Sessions=explode("-",$this->currentsession[0]->CurrentSession);
				$StartingYear=$Sessions[0];
				$EndingYear=$Sessions[1];
				$MonthYear=$count1=$ShowMonth=$Valid=$u=$STRHeading="";
				$STR=array();
				$DateArray=array();
				$MonthYearComb=array();
				for($i=$StartingYear;$i<$EndingYear;$i++)
				{ 
					$k=4;
					$i1=$StartingYear;
					for($j=1;$j<=12;$j++)
					{
						if($k>=13)
						{
						$k=1;
						$i1=$EndingYear;
						}
						$k1=str_pad($k,2,"0",STR_PAD_LEFT);
						$MonthYearComb[$j]="$k1-$i1";
						
						$k++;
					}
				}
				$this->data['month']=$MonthYearComb;
		if($this->input->post('month')){
			$POSTMonthYear=$this->data['attendance']=$this->input->post('month');
			$MonthYearArray=explode("-",$POSTMonthYear);
					$this->data['SelectedMonth']=$SelectedMonth=$MonthYearArray[0];
					$this->data['SelectedYear']=$SelectedYear=$MonthYearArray[1];
					
					$DaysInMonth=cal_days_in_month(CAL_GREGORIAN,$SelectedMonth,$SelectedYear);
					
					$this->data['DaysInMonth']=$DaysInMonth;
					
					$date1="$SelectedYear-$SelectedMonth-01";
					$date2="$SelectedYear-$SelectedMonth-$DaysInMonth";
					$date1timestamp=strtotime($date1);
					$date2timestamp=strtotime($date2);
					$this->data['row']=$this->data['staff_attendance']=$this->attendence_model->get_staff_attendance($date1timestamp,$date2timestamp);
				/*	print_r($POSTMonthYear); echo"<br>";
					print_r($SelectedMonth); echo"<br>";
					print_r($SelectedYear); echo"<br>";
					print_r($DaysInMonth); echo"<br>";
					print_r($date1); echo"<br>";
					print_r($date2); echo"<br>";
					print_r($date1timestamp); echo"<br>";
					print_r($date2timestamp); echo"<br>";
					print_r($this->data['row']);die;*/
					$this->data['row1']=$row1=$this->data['staff']=$this->attendence_model->get_staff_show();
					//print_r($this->data['staff_attendance']);die;
		}
				
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('staffattendencereport',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management staff Attendance report View Load..............................................................................................................*/
	
	/*school management Student Attendence View Load.............................................................................................................*/
	function studentattendence($sectionid=false)
	{	
	if(Authority::checkAuthority('StudentAttendence')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Student Attendance', base_url().'attendence/studentattendence');
		if($sectionid !=''){
			$this->data['sectionid']=$sectionid;
			$this->data['students']=$this->attendence_model->get_student($this->currentsession[0]->CurrentSession,$sectionid);
		}
		$this->data['class_section']=$this->attendence_model->get_class($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('studentattendence',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Student Attendence View Load..............................................................................................................*/
	
	/*school management Get Student For Attendance................................................................................*/
	function get_student()
	{	
	if(Authority::checkAuthority('StudentAttendence')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('class') !=''){
			redirect('attendences/studentattendence/'.$this->input->post('class'));
		}else{
			redirect('attendences/studentattendence');
	}}
	/*school management Get Student For Attendance................................................................................*/
	
	/*school management Add Student Attendance................................................................................*/
	function add_student_att()
	{		
	if(Authority::checkAuthority('StudentAttendence')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
			$USERNAME=$this->info[0]->usermailid;
			$Date= date("Y-m-d");
			$Attendance=$_POST['addmissionid'];
			$Attendance1=$_POST['absent'];
			$AttendanceDate=$_POST['date'];
			$SectionId=$_POST['sectionid'];
			$CurrentSessionArray=explode("-",$this->currentsession[0]->CurrentSession);
			$StartingYear=$CurrentSessionArray[0];
			$EndingYear=$CurrentSessionArray[1];
			$SessionStartingDate="01-04-$StartingYear 00:00am";
			$SessionEndingDate="31-03-$EndingYear 23:59am";
			$SessionStartinDateTS=strtotime($SessionStartingDate);
			$SessionEndingDateTS=strtotime($SessionEndingDate);
			
			if($_POST['Present']!="")
			$Att="P";
			elseif($_POST['Absent']!="")
			$Att="A";
			elseif($_POST['HalfDay']!="")
			$Att="H";
			elseif($_POST['Holiday']!="")
			$Att="HD";
			elseif($_POST['Blank']!="")
			$Att="";
			$DateTimeStamp=strtotime($Date);

			
			$CountStudent=count($Attendance);
			
			if($Attendance=="" || $AttendanceDate=="")
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("studentattendence").' All the fields are mandatory!!"');
			}
			elseif($TOKEN!=$RandomNumber)
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("studentattendence").' Illegal data posted!!"');
			}
			else
			{
				$AttendanceDate=strtotime($AttendanceDate);
				$row=$this->attendence_model->get_student_attendance($AttendanceDate);
				$AlreadyMarked=count($row);
				if($AlreadyMarked>0)
				{
					$LastAttendance=explode(",",$row['Attendance']);
					foreach($LastAttendance as $LastAttendanceValue)
					{
						$LastAttAttendance=explode("-",$LastAttendanceValue);
						$LastAdmissionIdId=$LastAttAttendance[0];
						$LastAtt=$LastAttAttendance[1];
						$LastTime=$LastAttAttendance[2];
						$Search=array_search($LastAdmissionIdId,$Attendance);
						if($Search===FALSE)
						$NewAttendance[]="$LastAdmissionIdId-$LastAtt-$LastTime";
						elseif($Att!="")
						$NewAttendance[]="$LastAdmissionIdId-$Att-$DateTimeStamp";
						$Marked[]=$LastAdmissionIdId;
					}
					
					foreach($Attendance as $AttendanceValue)
					{
						$SearchForMarkedIndex=array_search($AttendanceValue,$Marked);
						if($SearchForMarkedIndex===FALSE && $Att!="")
						$NewAttendance[]="$AttendanceValue-$Att-$DateTimeStamp";
					}
					foreach($Attendance1 as $AttendanceValue)
					{
						if($SearchForMarkedIndex===FALSE && $Att!="")
						$NewAttendance[]="$AttendanceValue-A-$DateTimeStamp";
					}
					
					$NewAttendance=implode(",",$NewAttendance);
					
					if($NewAttendance!="")
					$this->attendence_model->update_student_attendance($NewAttendance,$AttendanceDate);
					else
					$this->attendence_model->delete_student_attendance($AttendanceDate);
				}
				else
				{	$AttendanceString='';
					foreach($Attendance as $AttendanceValue)
						if($Att!="")
						$AttendanceString[]="$AttendanceValue-$Att-$DateTimeStamp";
					foreach($Attendance1 as $AttendanceValue)
						if($Att!="")
						$AttendanceString[]="$AttendanceValue-A-$DateTimeStamp";
						$AttendanceString=implode(",",$AttendanceString);
					if($AttendanceString!="")
					{
						$this->attendence_model->insert_student_attendance($AttendanceDate,$AttendanceString,$DateTimeStamp,$USERNAME);
					}
				}
		
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("studentattendence").' Attendance Updated Successfully"');		
	}
				redirect('attendences/studentattendence');
	}
	/*school management Add Student Attendance................................................................................*/
	
	
	/*school management Student Attendance report View Load.............................................................................................................*/
	function studentattendancereport()
	{		
	if(Authority::checkAuthority('StudentAttendenceReport')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Student Attendance Report', base_url().'attendence/studentattendancereport');
				$Sessions=explode("-",$this->currentsession[0]->CurrentSession);
				$StartingYear=$Sessions[0];
				$EndingYear=$Sessions[1];
				$MonthYear=$count1=$ShowMonth=$Valid=$u=$STRHeading="";
				$STR=array();
				$DateArray=array();
				$MonthYearComb=array();
				for($i=$StartingYear;$i<$EndingYear;$i++)
				{ 
					$k=4;
					$i1=$StartingYear;
					for($j=1;$j<=12;$j++)
					{
						if($k>=13)
						{
						$k=1;
						$i1=$EndingYear;
						}
						$k1=str_pad($k,2,"0",STR_PAD_LEFT);
						$MonthYearComb[$j]="$k1-$i1";
						
						$k++;
					}
				}
				$this->data['month']=$MonthYearComb;
				
				$this->data['class_section']=$this->attendence_model->get_class($this->currentsession[0]->CurrentSession);
		
				if($this->input->post('class') && $this->input->post('month') !=''){
					
					$POSTSectionId=$this->data['sectionid']=$this->input->post('class');
					$POSTMonthYear=$this->data['attendance']=$this->input->post('month');
					$MonthYearArray=explode("-",$POSTMonthYear);
					$this->data['SelectedMonth']=$SelectedMonth=$MonthYearArray[0];
					$this->data['SelectedYear']=$SelectedYear=$MonthYearArray[1];
					
					$DaysInMonth=cal_days_in_month(CAL_GREGORIAN,$SelectedMonth,$SelectedYear);
					
					$this->data['DaysInMonth']=$DaysInMonth;
					
					$date1="$SelectedYear-$SelectedMonth-01";
					$date2="$SelectedYear-$SelectedMonth-$DaysInMonth";
					$date1timestamp=strtotime($date1);
					$date2timestamp=strtotime($date2);
					$this->data['row']=$this->data['student_attendance']=$this->attendence_model->student_attendance_report($date1timestamp,$date2timestamp);
					$this->data['row1']=$row1=$this->data['student']=$this->attendence_model->get_student_attendance_report($POSTSectionId);
				}
				$this->parser->parse('include/header',$this->data);
				$this->parser->parse('include/topheader',$this->data);
				$this->parser->parse('include/leftmenu',$this->data);
				$this->load->view('studentattendencereport',$this->data);
				$this->parser->parse('include/footer',$this->data);
	}
	/*school management Student Attendance report View Load..............................................................................................................*/

}
