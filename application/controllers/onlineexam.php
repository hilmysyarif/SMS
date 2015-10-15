<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Onlineexam extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('onlineexam_model');
		$this->load->model('master_model');
		$this->load->model('authority_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		$this->load->library('authority');
		if (!$this->session->userdata('user_data')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
		$this->info= $this->session->userdata('user_data');
		$currentsession = $this->mhome->get_session();
		$this->session->set_userdata('currentsession',$currentsession);
		$currentsession=$this->currentsession = $this->session->userdata('currentsession');
	 }
	
	
	/*school management online Exam Delete start........................................................................*/	
	function delete($action=false,$on=false,$id=false)
	{
	if(Authority::checkAuthority('MarksSetUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		
		if($id){
			$filter=array($on=>$this->data['id']=$id);
			$this->master_model->delete($action,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("delete").' Deleted Successfully!!');
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	
	}
/*school management online Exam Delete End.............................................................................*/

// Online Exam Part Started Here..........................................................................................................................

/*school management Online Exam create view Load.............................................................................................................*/
	function onlineexamcreate($id=false)
	{	
		if(Authority::checkAuthority('ScMarksSetUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Online Exam SetUp', base_url().'onlineexam/onlineexamcreate');
		
		if($id !=''){
			$filter=array('online_exam_id'=>$id);
			$this->data['updateonlineexam']=$updateonlineexam = $this->onlineexam_model->select_for_update('online_exam_details',$filter);
			if($this->data['updateonlineexam'] !=''){
				$filter1=array('SubjectId'=>$updateonlineexam[0]->online_subject_id);
				$this->data['subject'] = $this->onlineexam_model->select_for_update('subject',$filter1);
			}
			$this->data['ol_exam_id']=$id;
			
		}
		
		$this->data['class_info']=$this->onlineexam_model->get_class($this->currentsession[0]->CurrentSession);
		$this->data['onlineexam'] = $this->onlineexam_model->get_exam_details($this->currentsession[0]->CurrentSession);
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('onlineexam',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management  Online Exam create view Load..............................................................................................................*/
	
/*school management Online exam create insert and update start .........................................................................................*/
	function insert_onlineexam()
	{	
	if(Authority::checkAuthority('MarksSetUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('save') !=''){
			$examname=$this->input->post('examname');
			$sectionid=$this->input->post('sectionid');
			$subjectid1=$this->input->post('subjectid1');
			$maxmarks=$this->input->post('maxmarks');
			$cuttoff=$this->input->post('cuttoff');
			$level=$this->input->post('level');
			$noofqustion=$this->input->post('noofqustion');
			$doe=strtotime($this->input->post('doe'));
			$remarks=$this->input->post('remarks');
			$duration=$this->input->post('duration');
			$durationqustion=$this->input->post('durationqustion');
			$examstatus=$this->input->post('examstatus');
			$Session=$this->currentsession[0]->CurrentSession;
			
		/*	if($Marks_Obtain>$Max_Marks){
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("marksetup").' Obtain Mark Is Not Greater Than Max Marks!!');
				redirect('exam/markssetup');
			}*/
			
			$data=array('exam_name'=>$examname,
						'online_section_id'=>$sectionid,
						'online_subject_id'=>$subjectid1,
						'online_max_marks'=>$maxmarks,
						'online_cuttoff'=>$cuttoff,
						'online_exam_level'=>$level,
						'no_of_qustion'=>$noofqustion,
						'online_exam_date'=>$doe,
						'remarks'=>$remarks,
						'online_ex_duration'=>$duration,
						'duration_per_qus'=>$durationqustion,
						'online_exam_status'=>$examstatus,
						'session'=>$Session);
			
			if($this->input->post('ol_exam_id')){
				
					$filter=array('online_exam_id'=>$this->input->post('ol_exam_id'));
					$this->onlineexam_model->insert_exam_details('online_exam_details',$data,$filter);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("onlineexamcreate")." Online Exam $examname Updated Successfully");
					
			}else{
					$this->onlineexam_model->insert_exam_details('online_exam_details',$data);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("onlineexamcreate")." Online Exam $examname Created Successfully");
			}
		}
			redirect('onlineexam/onlineexamcreate');
	}
	
/*school management Online exam create insert and update End .........................................................................................*/

	
	/*school management Online Exam Qustion Bank view Load.............................................................................................................*/
	function qustionbank($id=false)
	{	
		if(Authority::checkAuthority('ScMarksSetUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Qustion Bank', base_url().'onlineexam/qustionbank');
		
		if($id !=''){
			$filter=array('qust_id'=>$id);
			$this->data['qustionupdate']=$updatequstion = $this->onlineexam_model->select_for_update('qustion_ans_bank',$filter);
			$this->data['qustionid']=$id;
			if($this->data['qustionupdate'] !=''){
				$filter1=array('SubjectId'=>$updatequstion[0]->subject_id);
				$this->data['subject'] = $this->onlineexam_model->select_for_update('subject',$filter1);
				
				}
		}
	
		$this->data['class_info']=$this->onlineexam_model->get_class($this->currentsession[0]->CurrentSession);
		$this->data['qustionlist']=$updateonlineexam = $this->onlineexam_model->get_qustion();
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('qustionbank',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management  Online Exam Qustion Bank view Load.......................................................................................................*/
	
	/*school management Qustion bank insert and update start .........................................................................................*/
	function insert_qustionbank()
	{	
	if(Authority::checkAuthority('MarksSetUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('save') !=''){
			
			$sectionid=$this->input->post('sectionid');
			$subjectid1=$this->input->post('subjectid1');
			$level=$this->input->post('level');
			$qustion=strip_tags($this->input->post('qustion'));
			$option=$this->input->post('option');
			$optionstr='';
			$k=0;
			for($i=1;$i<=count($option)-1;$i++){
				$optionstr.="$i-$option[$k]";
				if($i<=count($option)-2){
					$optionstr.=",";
				}
				$k++;
			}
			$answer=$this->input->post('answer');
			$qusansdescription=strip_tags($this->input->post('qusansdescription'));
			$solution=strip_tags($this->input->post('solution'));
			$qustionstatus=$this->input->post('qustionstatus');
			$Session=$this->currentsession[0]->CurrentSession;
			
		/*	if($Marks_Obtain>$Max_Marks){
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("marksetup").' Obtain Mark Is Not Greater Than Max Marks!!');
				redirect('exam/markssetup');
			}*/
			
			$data=array(
						'class_id'=>$sectionid,
						'subject_id'=>$subjectid1,
						'qust_status'=>$qustionstatus,
						'qustion'=>$qustion,
						'qus_option'=>$optionstr,
						'answer'=>$answer,
						'qust_ans_description'=>$qusansdescription,
						'qust_solution'=>$solution,
						'qust_level'=>$level,
						'username'=>$this->info['usermailid'],
						'session'=>$Session);
			
			if($this->input->post('qustionid')){
				
					$filter=array('qust_id'=>$this->input->post('qustionid'));
					$this->onlineexam_model->insert_exam_details('qustion_ans_bank',$data,$filter);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("qustionbank")." Qustion Updated Successfully");
					
			}else{
					$this->onlineexam_model->insert_exam_details('qustion_ans_bank',$data);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("qustionbank")." Qustion Created Successfully");
			}
		}
			redirect('onlineexam/qustionbank');
	}
	
/*school management Qustion bank insert and update End .........................................................................................*/

	
	/*school management Online Exam Show Exam List view Load................................................................................................*/
	function olineexamlist()
	{	
		if(Authority::checkAuthority('ScMarksSetUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Online Exam List', base_url().'onlineexam/olineexamlist');
		
		$this->data['onlineexam'] = $this->onlineexam_model->get_exam_details($this->currentsession[0]->CurrentSession);
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('showonlineexam',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management  Online Exam Show Exam List view Load.......................................................................................................*/
	
	/*school management Online Exam Report view Load................................................................................................*/
	function onlineexamreport($id=false)
	{	
		if(Authority::checkAuthority('ScMarksSetUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Online Exam Report', base_url().'onlineexam/onlineexamreport');
		
			if(isset($_GET['search'])?$_GET['search']=="studentreport":''=="studentreport"){
							$filtersrch=array();
						
							if(!empty($this->input->post('resulttype'))){
								$filtersrch['online_student_status']=$this->input->post('resulttype');	
							}
							if(!empty($this->input->post('examid'))){
								$filtersrch['online_exam_id']=$this->input->post('examid');
							}
							if(!empty($this->input->post('studentname'))){
								$filtersrch['StudentName']=$this->input->post('studentname');
							}
							if(!empty($this->input->post('rollno'))){
								$filtersrch['AdmissionNo']=$this->input->post('rollno');
							}
							
							$this->data['onlineexamstudent']=$onlineexamstudent = $this->onlineexam_model->searchstudent($filtersrch,$this->input->post('marksfrom'),$this->input->post('marksto'));
			
							if($this->data['onlineexamstudent'] !=''){
							$filter1=array('online_exam_id'=>$id);
							$this->data['examname'] = $this->onlineexam_model->select_for_update('online_exam_details',$filter1);
							}
							$this->data['examid']=$id;
							
							
			}elseif(isset($_GET['search'])?$_GET['search']=="examreport":''=="examreport"){
				
							$filtersrch=array();
							if(!empty($this->input->post('class'))){ $filtersrch['online_section_id']=$this->input->post('class');}
							if(!empty($this->input->post('subjectid1'))){ $filtersrch['online_subject_id']=$this->input->post('subjectid1');}
							if(!empty($this->input->post('examname'))){ $filtersrch['exam_name']=$this->input->post('examname');}
							if(!empty($this->input->post('time'))){ $filtersrch['online_exam_date']=strtotime($this->input->post('time'));}
							if(!empty($this->input->post('level'))){ $filtersrch['online_exam_level']=$this->input->post('level');}
							
							$this->data['onlineexamreport'] = $this->onlineexam_model->searchexam($filtersrch);	
			}else{
				
			if($id){
			
			$filter=$id;
			$this->data['onlineexamstudent']=$onlineexamstudent = $this->onlineexam_model->get_student_report($filter);
			
			if($this->data['onlineexamstudent'] !=''){
				$filter1=array('online_exam_id'=>$id);
				$this->data['examname'] = $this->onlineexam_model->select_for_update('online_exam_details',$filter1);
			}
			$this->data['examid']=$id;
		}else{
			$this->data['onlineexamreport'] = $this->onlineexam_model->get_exam_report();
		}
		}
		$this->data['class_info']=$this->onlineexam_model->get_class($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('onlineexamreport',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management  Online Exam Report view Load.......................................................................................................*/
	
	/*school management Online Exam preview view Load................................................................................................*/
	function preview($studentid=false,$examid=false)
	{	
		if(!empty($_POST)){
		
		$timer=$this->input->post('timer');
		$studentinfo=$this->session->userdata('studentinfo');
		$studentinfo=array('AdmissionId'=>$studentinfo['AdmissionId'],
							   'AdmissionNo'=>$studentinfo['AdmissionNo'],
							   'StudentName'=>$studentinfo['StudentName'],
							   'ClassName'=>$studentinfo['ClassName'],
							   'SectionName'=>$studentinfo['SectionName'],
							   'SectionId'=>$studentinfo['SectionId'],
							   'examid'=>$studentinfo['examid'],
							   'examname'=>$studentinfo['examname'],
							   'level'=>$studentinfo['level'],
							   'subject'=>$studentinfo['subject'],
							   'class'=>$studentinfo['class'],
							   'online_cuttoff'=>$studentinfo['online_cuttoff'],
							   'totalquscount'=>$studentinfo['totalquscount'],
							   'quscount'=>$studentinfo['quscount'],
							   'examstudentid'=>$studentinfo['examstudentid'],
							   'sno'=>$studentinfo['sno'],
							   'timer'=>$timer);
							   
			$this->session->set_userdata('studentinfo',$studentinfo);
			$this->onlineexam=$this->session->userdata('studentinfo');
		
		}
		if(Authority::checkAuthority('ScMarksSetUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		
		if(isset($studentinfo['examstudentid'])!=0){
			
		}else{
		if($studentid && $examid){
			
			$studentdata=$this->onlineexam_model->getonlineexamstudent($studentid);
			
			$exfilter=array('online_exam_id'=>$examid);
			
			$checkexam=$this->onlineexam_model->checkexamonline($exfilter);
			
			if($studentdata && count($checkexam)>0){
				
				if($checkexam[0]->online_ex_duration !=''){
					
					$time=explode(":",$checkexam[0]->online_ex_duration);
					
					$h=$time[0];
					$m=$time[1];
					
					if($h==0 && $m !=0){
						$h=0;
						$m=$m-1;
						$s=59;
					}else{
						
						if($m==0){
							$h=$h-1;
							$m=59;
							$s=59;
						}else{
							$h=$h;
							$m=$m-1;
							$s=59;
						}
					}
					
				}else{
					$h=0;
					$m=0;
					$s=0;
				}
			$studentinfo=array('AdmissionId'=>$studentid,
							   'AdmissionNo'=>$studentdata[0]->AdmissionNo,
							   'StudentName'=>$studentdata[0]->StudentName,
							   'ClassName'=>$studentdata[0]->ClassName,
							   'SectionName'=>$studentdata[0]->SectionName,
							   'SectionId'=>$studentdata[0]->SectionId,
							   'examid'=>$examid,
							   'examname'=>$checkexam[0]->exam_name,
							   'level'=>$checkexam[0]->online_exam_level,
							   'subject'=>$checkexam[0]->online_subject_id,
							   'class'=>$checkexam[0]->online_section_id,
							   'totalquscount'=>$checkexam[0]->no_of_qustion,
							   'online_cuttoff'=>$checkexam[0]->online_cuttoff,
							   'quscount'=>0,
							   'examstudentid'=>0,
							   'sno'=>1,
							   'timer'=>$h.":".$m.":".$s);
							
			$this->session->set_userdata('studentinfo',$studentinfo);
			$this->onlineexam=$this->session->userdata('studentinfo');
			
			}
			redirect('onlineexam/preview');
		}}
		if(!empty($this->session->userdata('studentinfo'))){
			$check=$this->session->userdata('studentinfo');
		}
		if(!empty($check['examid'])){
			
			$this->data['studentinfo']=$studentinfo=$this->session->userdata('studentinfo');
			
			if($studentinfo['sno'] <= $studentinfo['totalquscount']){
				
				$filter=array('class_id'=>$studentinfo['class'],
							  'subject_id'=>$studentinfo['subject'],
							  'qust_level'=>$studentinfo['level']);
							  
				$this->data['qustion']=$qustion= $this->onlineexam_model->get_random_qus($studentinfo['quscount'],$studentinfo['class'],$studentinfo['subject'],$studentinfo['level']);
				
			}else{
					$this->data['completed']="ok";
					$this->data['stopcounter']="done";
					$this->session->unset_userdata('studentinfo');
					//$this->session->set_flashdata('message_type', 'success');
					//$this->session->set_flashdata('message', $this->config->item("onlineexamcreate")." Thank You For Participating In Exam!! ");
			}
			
		}else{
					$this->data['completed']="ok";
					$this->data['stopcounter']="done";
					$this->data['finish']="finish";
		}
		
		$this->load->view('onlinetest',$this->data);
	}
	/*school management  Online Exam preview view Load.......................................................................................................*/
	
	/*online exam insert qustion and ans start..............................................................*/
	function onlineexamsave(){
		
		
		if($this->input->post('qustionid') && $this->input->post('qus_option')){
			
			$studentinfo=$this->session->userdata('studentinfo');
			//print_r($studentinfo);die;
			$correctans=0;
			$wrongans=0;
			$status="Fail";
			
			if($this->input->post('qus_option')==$this->input->post('answer')){
				
				$correctans=1;
				$chit=1;
				$whit=0;
			}else{
				$wrongans=1;
				$chit=0;
				$whit=1;
			}
			$this->onlineexam_model->updatequsthit($this->input->post('qustionid'),$chit,$whit);
			if($studentinfo['examstudentid']!=0){
				$qustionansstrngdb=$this->onlineexam_model->get_qustionid($studentinfo['examstudentid']);	
				$ansstrng=$qustionansstrngdb[0]->online_qust_ans_id;
				
				if($studentinfo['online_cuttoff']  <= $qustionansstrngdb[0]->total_marks+$correctans){
					
				$status="Pass";
			}else{
				$status="Fail";
			}
				
			if($studentinfo['sno'] <= $studentinfo['totalquscount']){
				$ansstrng.=",";
			}
			$ansstrng.=$this->input->post('qustionid')."-".$this->input->post('qus_option');
			
			
			
			$this->onlineexam_model->updateexaminfo($studentinfo['examstudentid'],$ansstrng,$correctans,$wrongans,$status,$studentinfo['timer']);	
			
			$studentinfo=array('AdmissionId'=>$studentinfo['AdmissionId'],
							   'AdmissionNo'=>$studentinfo['AdmissionNo'],
							   'StudentName'=>$studentinfo['StudentName'],
							   'ClassName'=>$studentinfo['ClassName'],
							   'SectionName'=>$studentinfo['SectionName'],
							   'SectionId'=>$studentinfo['SectionId'],
							   'examid'=>$studentinfo['examid'],
							   'examname'=>$studentinfo['examname'],
							   'level'=>$studentinfo['level'],
							   'subject'=>$studentinfo['subject'],
							   'class'=>$studentinfo['class'],
							   'online_cuttoff'=>$studentinfo['online_cuttoff'],
							   'totalquscount'=>$studentinfo['totalquscount'],
							   'quscount'=>$studentinfo['quscount'].",".$this->input->post('qustionid'),
							   'examstudentid'=>$studentinfo['examstudentid'],
							   'sno'=>$studentinfo['sno']+1,
							   'timer'=>$studentinfo['timer']);
							   
			$this->session->set_userdata('studentinfo',$studentinfo);
			$this->onlineexam=$this->session->userdata('studentinfo');
				
			}else
			{
			$qustansstrng=$this->input->post('qustionid')."-".$this->input->post('qus_option');
			//$qustansstrng.=",";
			$data=array('online_exam_id'=>$studentinfo['examid'],
						 'online_student_id'=>$studentinfo['AdmissionId'],
						 'online_qust_ans_id'=>$qustansstrng,
						 'correct_ans'=>+$correctans,
						 'wrong_ans'=>+$wrongans,
						 'total_marks'=>+$correctans,
						 'online_student_status'=>$status,
						 'time_duration'=>$studentinfo['timer'],
						 'no_of_qus_attemp'=>+1);
			$examstudentid=$this->onlineexam_model->insert_exam_details("online_exam_student",$data);
			
			$studentinfo=array('AdmissionId'=>$studentinfo['AdmissionId'],
							   'AdmissionNo'=>$studentinfo['AdmissionNo'],
							   'StudentName'=>$studentinfo['StudentName'],
							   'ClassName'=>$studentinfo['ClassName'],
							   'SectionName'=>$studentinfo['SectionName'],
							   'SectionId'=>$studentinfo['SectionId'],
							   'examid'=>$studentinfo['examid'],
							   'examname'=>$studentinfo['examname'],
							   'level'=>$studentinfo['level'],
							   'subject'=>$studentinfo['subject'],
							   'class'=>$studentinfo['class'],
							   'online_cuttoff'=>$studentinfo['online_cuttoff'],
							   'totalquscount'=>$studentinfo['totalquscount'],
							   'quscount'=>$studentinfo['quscount'].",".$this->input->post('qustionid'),
							   'examstudentid'=>$examstudentid,
							   'sno'=>$studentinfo['sno']+1,
							   'timer'=>$studentinfo['timer']);
							    
			$this->session->set_userdata('studentinfo',$studentinfo);
			$this->onlineexam=$this->session->userdata('studentinfo');
			
			}
			
			
		}
		redirect('onlineexam/preview');
	}
	
	/*online exam Search Start..............................................................*/
	function search($action=false,$key=false){
		$action=$this->input->post('action');
		
		if($action !=''){
			$filter=array();
			if($action=="studentreport"){
				
				
				if(!empty($this->input->post('resulttype'))){
					$filter['online_student_status']=$this->input->post('resulttype');	
				}
				if(!empty($this->input->post('examid'))){
					$filter['online_exam_id']=$this->input->post('examid');
				}
				
				
				
				$this->data['onlineexamstudent']=$this->onlineexam_model->select_for_update('online_exam_student',$filter);
				print_r($this->data['onlineexamstudent']);die;
			}elseif($action=="examreport"){
				
				$class=$this->input->post('class');
				$subject=$this->input->post('subject');
				$examname=$this->input->post('examname');
				$time=$this->input->post('time');
				$level=$this->input->post('level');
				
				//$filter=array(''=>);
				$this->data['onlineexamreport']=$this->onlineexam_model->select_for_update('online_exam_details',$filter);	
				
			}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		
	}
	/*online exam Search End..............................................................*/
	
	/*online exam insert qustion and ans END..............................................................*/



	
}
