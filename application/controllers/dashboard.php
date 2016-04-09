<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('mhome');
		$this->load->model('Dashboard_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		$this->load->library('authority');
		if (!$this->session->userdata('user_data')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
		$this->info= $this->session->userdata('user_data');
		$currentsession = $this->mhome->get_session();
		if(!empty($currentsession)){
		$this->session->set_userdata('currentsession',$currentsession);
		$currentsession=$this->currentsession = $this->session->userdata('currentsession');
		}
	 }
	 
	

	 /*school management dashboard start...............................................................................*/
	public function index()
	{ /*new code...Nabeela....*/
	
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Dashboard', base_url());
		$pagename1=array();
		if($this->info['UserType']!=0){
			$permissionstr = $this->Dashboard_model->checkpermission($this->info['UserType']);
			if(!empty($permissionstr)){
			$pageid=explode(",",$permissionstr[0]->PermissionString);
			foreach($pageid as $permissionstr1){
				$pagename = $this->Dashboard_model->getpagename($permissionstr1);
				if(!empty($pagename)){
				$pagename1[]=$pagename[0]->PageName; }
			}
			}
			}
			
			$this->session->set_userdata('pagename',$pagename1);
			$this->session->userdata('pagename');
			
			
		//Pei Chart , Line Chart and calender Reports Start From there............................................
		
		// Line chart Income and Expense start.......
		$REPORTDAYS=isset($_SESSION['REPORTDAYS']) ? $_SESSION['REPORTDAYS'] : 15;
					$Date=date("Y-m-d");
					$DateddMMyyyy=date("d-m-Y",strtotime($Date));
					$TodayDate=$DateddMMyyyy;
					$ReportDate=date("d M Y", strtotime(date("Y-m-d", strtotime($TodayDate)) . " -$REPORTDAYS day"));
					
					$TodayDateStart="$TodayDate 00:00";
					$ReportDateEnd="$ReportDate 23:59";
					$TSTS=strtotime($TodayDateStart);
					$RETS=strtotime($ReportDateEnd);				
					//print_r($RETS); echo "<br>";print_r($TSTS); echo "<br>";
					for($i=$REPORTDAYS;$i>0;$i--)
					{
						$Income[$i]=0;
						$Expense[$i]=0;
					}
					
					$check1 = $this->Dashboard_model->getincomereportchart($RETS,$TSTS);
					$DayStart='';
					foreach($check1 as $row1)
					{
						$DayStart=strtotime($TodayDate);
						$TotalIncome=round($row1->TotalIncome,2);
						$IncomeDate=date("d M Y",$row1->TransactionDate);
						for($i=$REPORTDAYS;$i>0;$i--)
						{	
							$DayStartName=date("d M Y",$DayStart);
							if($DayStartName==$IncomeDate)
							{	
								$Income[$i]=$TotalIncome;
								break;
							}
							$DayStart=date("d M Y", strtotime(date("Y-m-d", strtotime($DayStartName)) . " -1 day"));
							$DayStart=strtotime($DayStart);
						}
					}
					
					$check2 = $this->Dashboard_model->getexpensereportchart($RETS,$TSTS);
					
					foreach($check2 as $row2)
					{
						$DayStart=strtotime($TodayDate);
						$TotalExpense=round($row2->TotalExpense,2);
						$ExpenseDate=date("d M Y",$row2->TransactionDate);
						for($i=$REPORTDAYS;$i>0;$i--)
						{	
							$DayStartName=date("d M Y",$DayStart);
							if($DayStartName==$ExpenseDate)
							{	
								$Expense[$i]=$TotalExpense;
								break;
							}
							$DayStart=date("d M Y", strtotime(date("Y-m-d", strtotime($DayStartName)) . " -1 day"));
							$DayStart=strtotime($DayStart);
						}
					}
					$testing='';
					if($DayStart !=''){
					$testing2=date("M Y",$DayStart);}
					$DayStart=strtotime($TodayDate);
					$IncomeSTR=$LabelContent=$ExpenseSTR=null;
					for($i=$REPORTDAYS;$i>0;$i--)
					{
						$DayStartName=date("d M Y",$DayStart);
						$IncomeSTR.="[$i,$Income[$i]]";
						if($i>1)
					//	$IncomeSTR.=",";
						$ExpenseSTR.="[$i,$Expense[$i]]";
						if($i>1)
						//$ExpenseSTR.=",";
						$DayStart=date("d M Y", strtotime(date("Y-m-d", strtotime($DayStartName)) . " -1 day"));
						$DayStart=strtotime($DayStart);
						$LabelContent.="[$i,\"$DayStartName\"]";
						if($i>1)
						$LabelContent.=",";
						$testing.="{ Day: $i  ,  Income:$Income[$i] , Expense:$Expense[$i] }";
						if($i !=1){
							$testing.=",";
						}
					}
					
					$this->data['testing']=$testing;
					$this->data['ExpenseSTR']=$ExpenseSTR;
					$this->data['LabelContent']=$LabelContent;
					/*print_r($IncomeSTR);echo "</br>"; 
					print_r($ExpenseSTR);echo "</br>"; */
					//print_r($IncomeSTR);echo "</br>"; 
					//die;
		// Line chart Income and Expense End.................................
		
		// Line Calendar Start.................................
		
			$check501 = $this->Dashboard_model->getcalendarevent($RETS,$TSTS);
			$count501=count($check501);

			$A501=$EVENTS="";
			if($count501>0)
			{
				foreach($check501 as $row501)
				{
					$Title=$row501->Title;
					$StartDate=date("Y-m-d",$row501->StartTime);
					$StartTime=date("H:i:s",$row501->StartTime);
					$StartDateTime=$StartDate."T".$StartTime;
					$EndDate=date("Y-m-d",$row501->EndTime);
					$EndTime=date("H:i:s",$row501->EndTime);
					$EndDateTime=$EndDate."T".$EndTime;
					$Color=$row501->Color;
					$A501++;
					$EVENTS.="{ title:'$Title', start:'$StartDateTime',end:'$EndDateTime',color:'$Color',allDay: false }";
					if($count501>$A501)
					$EVENTS.=",";
				}
				$this->data['EVENTS']=$EVENTS;
			}
		// Calendar Event End.................................
		
		// Pei chart admission report start...................................
		error_reporting(1);
		$check = $this->Dashboard_model->getstudentreport($this->currentsession[0]->CurrentSession);
		$sumofstudent=0;
		$AdmissionData=null;
		foreach($check as $row1)
					{ 
						$sumofstudent+=$row1->TotalStudent;
					}
					
		$count=count($check);
					foreach($check as $row)
					{ $count--;
						$TotalStudent=$row->TotalStudent;
						$TotalStudent= round(($TotalStudent/$sumofstudent)*100);
					//	$SectionName=$row->SectionName;
						$ClassName=$row->ClassName;
						$AdmissionData.="{ label: \"$ClassName \" ,  val:$TotalStudent }";
						if($count !=0){
							$AdmissionData.=",";
						}
					}
		$this->data['AdmissionData']=$AdmissionData;
		// Pei chart admission report End...................................
		
		//Pei Chart , Line Chart and calender Reports End  there............................................
		
		$generalsetting=$this->data['generalsetting']=$this->Dashboard_model->generalsetting();	
		
		$agreement_detail=$this->data['detail']=$this->Dashboard_model->agreement($this->info['user_id']);

		 if(((empty($generalsetting)) && $this->info['UserType']==0 ) || ((empty($agreement_detail)) && $this->info['UserType']!=0  ))
		{
			
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/header1',$this->data);
		
		$this->load->view('setup',$this->data);
		$this->parser->parse('include/footer',$this->data);
		
	}
	elseif((!empty($generalsetting)) && $this->info['UserType']==0)
	{
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('dashboard',$this->data);
		$this->parser->parse('include/footer',$this->data);
	
	}
	elseif((!empty($agreement_detail)) && $this->info['UserType']!=0)
	{
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('dashboard',$this->data);
		$this->parser->parse('include/footer',$this->data);
	
	}
	
	}
/*school management dashboard End...............................................................................*/

public function index1()
	{ 	
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Dashboard', base_url());
		$pagename1=array();
		if($this->info['UserType']!=0){
			$permissionstr = $this->Dashboard_model->checkpermission($this->info['UserType']);
			if(!empty($permissionstr)){
			$pageid=explode(",",$permissionstr[0]->PermissionString);
			foreach($pageid as $permissionstr1){
				$pagename = $this->Dashboard_model->getpagename($permissionstr1);
				if(!empty($pagename)){
				$pagename1[]=$pagename[0]->PageName; }
			}
			}
			}
			
			$this->session->set_userdata('pagename',$pagename1);
			$this->session->userdata('pagename');
				
		
		
		//Pei Chart , Line Chart and calender Reports Start From there............................................
		
		// Line chart Income and Expense start.......
		$REPORTDAYS=isset($_SESSION['REPORTDAYS']) ? $_SESSION['REPORTDAYS'] : 15;
					$Date=date("Y-m-d");
					$DateddMMyyyy=date("d-m-Y",strtotime($Date));
					$TodayDate=$DateddMMyyyy;
					$ReportDate=date("d M Y", strtotime(date("Y-m-d", strtotime($TodayDate)) . " -$REPORTDAYS day"));
					
					$TodayDateStart="$TodayDate 00:00";
					$ReportDateEnd="$ReportDate 23:59";
					$TSTS=strtotime($TodayDateStart);
					$RETS=strtotime($ReportDateEnd);				
					//print_r($RETS); echo "<br>";print_r($TSTS); echo "<br>";
					for($i=$REPORTDAYS;$i>0;$i--)
					{
						$Income[$i]=0;
						$Expense[$i]=0;
					}
					
					$check1 = $this->Dashboard_model->getincomereportchart($RETS,$TSTS);
					$DayStart='';
					foreach($check1 as $row1)
					{
						$DayStart=strtotime($TodayDate);
						$TotalIncome=round($row1->TotalIncome,2);
						$IncomeDate=date("d M Y",$row1->TransactionDate);
						for($i=$REPORTDAYS;$i>0;$i--)
						{	
							$DayStartName=date("d M Y",$DayStart);
							if($DayStartName==$IncomeDate)
							{	
								$Income[$i]=$TotalIncome;
								break;
							}
							$DayStart=date("d M Y", strtotime(date("Y-m-d", strtotime($DayStartName)) . " -1 day"));
							$DayStart=strtotime($DayStart);
						}
					}
					
					$check2 = $this->Dashboard_model->getexpensereportchart($RETS,$TSTS);
					
					foreach($check2 as $row2)
					{
						$DayStart=strtotime($TodayDate);
						$TotalExpense=round($row2->TotalExpense,2);
						$ExpenseDate=date("d M Y",$row2->TransactionDate);
						for($i=$REPORTDAYS;$i>0;$i--)
						{	
							$DayStartName=date("d M Y",$DayStart);
							if($DayStartName==$ExpenseDate)
							{	
								$Expense[$i]=$TotalExpense;
								break;
							}
							$DayStart=date("d M Y", strtotime(date("Y-m-d", strtotime($DayStartName)) . " -1 day"));
							$DayStart=strtotime($DayStart);
						}
					}
					$testing='';
					if($DayStart !=''){
					$testing2=date("M Y",$DayStart);}
					$DayStart=strtotime($TodayDate);
					$IncomeSTR=$LabelContent=$ExpenseSTR=null;
					for($i=$REPORTDAYS;$i>0;$i--)
					{
						$DayStartName=date("d M Y",$DayStart);
						$IncomeSTR.="[$i,$Income[$i]]";
						if($i>1)
					//	$IncomeSTR.=",";
						$ExpenseSTR.="[$i,$Expense[$i]]";
						if($i>1)
						//$ExpenseSTR.=",";
						$DayStart=date("d M Y", strtotime(date("Y-m-d", strtotime($DayStartName)) . " -1 day"));
						$DayStart=strtotime($DayStart);
						$LabelContent.="[$i,\"$DayStartName\"]";
						if($i>1)
						$LabelContent.=",";
						$testing.="{ Day: $i  ,  Income:$Income[$i] , Expense:$Expense[$i] }";
						if($i !=1){
							$testing.=",";
						}
					}
					
					$this->data['testing']=$testing;
					$this->data['ExpenseSTR']=$ExpenseSTR;
					$this->data['LabelContent']=$LabelContent;
					/*print_r($IncomeSTR);echo "</br>"; 
					print_r($ExpenseSTR);echo "</br>"; */
					//print_r($IncomeSTR);echo "</br>"; 
					//die;
		// Line chart Income and Expense End.................................
		
		// Line Calendar Start.................................
		
			$check501 = $this->Dashboard_model->getcalendarevent($RETS,$TSTS);
			$count501=count($check501);

			$A501=$EVENTS="";
			if($count501>0)
			{
				foreach($check501 as $row501)
				{
					$Title=$row501->Title;
					$StartDate=date("Y-m-d",$row501->StartTime);
					$StartTime=date("H:i:s",$row501->StartTime);
					$StartDateTime=$StartDate."T".$StartTime;
					$EndDate=date("Y-m-d",$row501->EndTime);
					$EndTime=date("H:i:s",$row501->EndTime);
					$EndDateTime=$EndDate."T".$EndTime;
					$Color=$row501->Color;
					$A501++;
					$EVENTS.="{ title:'$Title', start:'$StartDateTime',end:'$EndDateTime',color:'$Color',allDay: false }";
					if($count501>$A501)
					$EVENTS.=",";
				}
				$this->data['EVENTS']=$EVENTS;
			}
		// Calendar Event End.................................
		
		// Pei chart admission report start...................................
		error_reporting(1);
		$check = $this->Dashboard_model->getstudentreport($this->currentsession[0]->CurrentSession);
		$sumofstudent=0;
		$AdmissionData=null;
		foreach($check as $row1)
					{ 
						$sumofstudent+=$row1->TotalStudent;
					}
					
		$count=count($check);
					foreach($check as $row)
					{ $count--;
						$TotalStudent=$row->TotalStudent;
						$TotalStudent= round(($TotalStudent/$sumofstudent)*100);
					//	$SectionName=$row->SectionName;
						$ClassName=$row->ClassName;
						$AdmissionData.="{ label: \"$ClassName \" ,  val:$TotalStudent }";
						if($count !=0){
							$AdmissionData.=",";
						}
					}
		$this->data['AdmissionData']=$AdmissionData;
		// Pei chart admission report End...................................
		
		//Pei Chart , Line Chart and calender Reports End  there............................................
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('dashboard',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management dashboard End...............................................................................*/
	
/*school management help start...............................................................................*/
	public function help()
	{ 	
		$this->load->view('help',$this->data);
	}
/*school management help End...............................................................................*/
 
 public function insert1($checkid)
 {	 $agreement_detail=$this->data['detail']=$this->Dashboard_model->agreement($checkid);
	print_r( $agreement_detail);die;
	if (empty($agreement_detail))
{
	 $data=array('Terms'=>$this->input->post('terms'));
	 $this->Dashboard_model->insert1('registration',$data);
	 redirect('dashboard/index1');
 }
 else{

 	 redirect('dashboard/index1');
 
 }
 }
  public function insert()
 {	$generalsetting=$this->data['detail']=$this->Dashboard_model->generalsetting();	
 if (empty($generalsetting))
 {
	 $data=array('Terms'=>$this->input->post('terms'));
	 $this->Dashboard_model->insert('generalsetting',$data);
	 redirect('dashboard/setuppg');
 }
 else {
 	 redirect('dashboard/setuppg');
 }
 }  
 public function download()
 {

  header('Content-Type: application/download');
  header('Content-Disposition: attachment; filename="instruction.xlsx"');
  header("Content-Length: " . filesize("instruction.xlsx"));
  $fp = fopen("instruction.xlsx", "r");
  fpassthru($fp);
  fclose($fp);

 }
 public function setuppg()
 {
		
		$this->parser->parse('include/header',$this->data);
		
		$this->parser->parse('include/header1',$this->data);
		$this->load->view('setuppg',$this->data);
		$this->parser->parse('include/footer',$this->data); 
 }
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */