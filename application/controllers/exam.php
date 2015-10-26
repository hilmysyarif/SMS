<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('exam_model');
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
/*grading function start........................................*/
function Grade($MM,$OB)
{	
	if($MM!=30 && $MM!=100 && $MM!=50 && $MM!=0)
	{
		if($MM!=0)
		{
		$OB=($OB/$MM)*100;
		$MM=100;
		}
	}
	
	if($MM==30)
	{
		if($OB>27)
		return("A1");
		elseif($OB>24)
		return("A2");
		elseif($OB>21)
		return("B1");
		elseif($OB>18)
		return("B2");
		elseif($OB>15)
		return("C1");
		elseif($OB>12)
		return("C2");
		elseif($OB>9)
		return("D");
		elseif($OB>5)
		return("E1");
		elseif($OB>=0)
		return("E2");
	}
	elseif($MM==100)
	{
		if($OB>90)
		return("A1");
		elseif($OB>80)
		return("A2");
		elseif($OB>70)
		return("B1");
		elseif($OB>60)
		return("B2");
		elseif($OB>50)
		return("C1");
		elseif($OB>40)
		return("C2");
		elseif($OB>32)
		return("D");
		elseif($OB>20)
		return("E1");
		elseif($OB>=0)
		return("E2");	
	}
	elseif($MM==50)
	{
		if($OB>45)
		return("A1");
		elseif($OB>40)
		return("A2");
		elseif($OB>35)
		return("B1");
		elseif($OB>30)
		return("B2");
		elseif($OB>25)
		return("C1");
		elseif($OB>20)
		return("C2");
		elseif($OB>15)
		return("D");
		elseif($OB>10)
		return("E1");
		elseif($OB>=0)
		return("E2");		
	}
	else
		return("-");
}


function GradeIndicator($PointIndicator,$MI,$OI)
{
	if($MI==0 || $MI=="")
	return("-");
	elseif($PointIndicator=="3")
	{
		$a=round((($OI/$MI)*100),2);
		if($a==0)
		return("-");
		elseif($a<33.33)
		return("B+");
		elseif($a<=66.66)
		return("A");
		else
		return("A+");
	}
	elseif($PointIndicator==="5")
	{
		$a=round((($OI/$MI)*100),2);
		if($a==0)
		return("-");
		elseif($a<=20)
		return("C");
		elseif($a<=40)
		return("B");
		elseif($a<=60)
		return("B+");
		elseif($a<=80)
		return("A");
		else
		return("A+");
	}
	else
	return("-");
}

function CGPA($Grade)
{
	if($Grade=="A1")
	return(10);
	elseif($Grade=="A2")
	return(9);
	elseif($Grade=="B1")
	return(8);
	elseif($Grade=="B2")
	return(7);
	elseif($Grade=="C1")
	return(6);
	elseif($Grade=="C2")
	return(5);
	elseif($Grade=="D")
	return(4);
	else
	return("-");
}
/*grading function end..........................................*/
	 
	
/*school management Scholastic Grade Load....................................................................................*/
	function markssetup($examid=false)
	{	
	if(Authority::checkAuthority('MarksSetUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Marks Setup', base_url().'exam/markssetup');
		
		if($examid !=''){
			$this->data['exam_id']=$examid;
			$sub=$this->data['marksetup_up']=$this->exam_model->marksetup_up($examid,$this->currentsession[0]->CurrentSession);
			$this->data['student']=$sub[0]->Student_Id;
			$this->data['subject']=$sub[0]->Subject_Id;
			$this->data['markssubstudent']=$this->exam_model->marksetup_up_sub($sub[0]->Student_Id,$sub[0]->Subject_Id);
			
		}	
		
		$this->data['exam'] = $this->exam_model->get_exam(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
		$this->data['class_info']=$this->exam_model->get_class(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
		$this->data['marksetup'] = $this->exam_model->get_markssetup(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('markssetup',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Scholastic Grade Load..............................................................................................................*/
	
/*school management Get Marks start .........................................................................................
	function get_markssetup()
	{	
	if(Authority::checkAuthority('MarksSetUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('examid') && $this->input->post('subjectid') !=''){
			$examid=$this->input->post('examid');
			$examid=explode("-",$examid);
			redirect('exam/markssetup/'.$examid[0]."/".$this->input->post('subjectid'));
		}else{
			redirect('exam/markssetup');
	}
	}
/*school management Get Marks start...............................................................................................*/


/*school management Get Marks start .........................................................................................*/
	function insert_marksetup()
	{	
	if(Authority::checkAuthority('MarksSetUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('save') !=''){
			$Exam_Type=$this->input->post('examtype');
			$Section_Id=$this->input->post('sectionid');
			$Student_Id=$this->input->post('student');
			$Subject_Id=$this->input->post('subjectid1');
			$Max_Marks=$this->input->post('maxmarks');
			$Marks_Obtain=$this->input->post('obtainmarks');
			$Grade=$this->input->post('grade');
			$Result=$this->input->post('result');
			$DateOfExam=strtotime($this->input->post('doe'));
			$Remarks=$this->input->post('remarks');
			$Evaluated_By=$this->input->post('evaluatedby');
			$Exam_Detail_Status='Active';
			$Session=$this->currentsession[0]->CurrentSession;
			if($Marks_Obtain>$Max_Marks){
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("marksetup").' Obtain Mark Is Not Greater Than Max Marks!!');
				redirect('exam/markssetup');
			}
			$data=array('Exam_Type'=>$Exam_Type,
						'Section_Id'=>$Section_Id,
						'Student_Id'=>$Student_Id,
						'Subject_Id'=>$Subject_Id,
						'Max_Marks'=>$Max_Marks,
						'Marks_Obtain'=>$Marks_Obtain,
						'Grade'=>$Grade,
						'Result'=>$Result,
						'DateOfExam'=>$DateOfExam,
						'Remarks'=>$Remarks,
						'Evaluated_By'=>$Evaluated_By,
						'Exam_Detail_Status'=>$Exam_Detail_Status,
						'Session'=>$Session);
			
			if($this->input->post('exam_id')){
					$filter=array('Exam_Detail_Id'=>$this->input->post('exam_id'));
					$this->exam_model->insert_exam_details('examdetails',$data,$filter);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("marksetup").' Marks Setup Updated Successfully');
			}else{
					$this->exam_model->insert_exam_details('examdetails',$data);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("marksetup").' Marks Setup Successfully');
			}
		}
			redirect('exam/markssetup');
	}
	
/*school management Get Marks start...............................................................................................*/
		
	
	/*school management Scholastic Grade Load.............................................................................................................*/
	function scmarkssetup()
	{	
		if(Authority::checkAuthority('ScMarksSetUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Co Scholastic Marks Setup', base_url().'exam/scmarkssetup');
		$this->data['exam'] = $this->exam_model->get_scmark_exam($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('scmarkssetup',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Scholastic Grade Load..............................................................................................................*/
	
	/*school management ExamReport Load.............................................................................................................*/
	function examreport()
	{	
		if(Authority::checkAuthority('ExamReport')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Exam Report', base_url().'exam/examreport');
		
		$this->data['class'] = $this->exam_model->get_report_class(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
		$this->data['exam'] = $this->exam_model->get_exam(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('examreport',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Exam Report Load..............................................................................................................*/
	

/*school management Print ExamReport ...............................................................................................*/
	function print_examreport($admissionid=false)
	{	
		if(Authority::checkAuthority('PrintExamReport')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if(!empty($this->input->post('examtype')))
		{	
							$filter=array('examdetails.Exam_Type'=>$this->input->post('examtype'));
							if(!empty($this->input->post('sectionid'))){
								$filter['Section_Id']=$this->input->post('sectionid');	
							}
							if(!empty($this->input->post('student'))){
								$filter['Student_Id']=$this->input->post('student');
							}
							if(!empty($this->input->post('subjectid1'))){
								$filter['Subject_Id']=$this->input->post('subjectid1');
							}
							
			$examreportprint= $this->exam_model->get_report_student_details($filter,$this->currentsession[0]->CurrentSession);
			$this->data['schoolinfo']=$this->exam_model->get_report_school_details();
			if(!empty($this->input->post('student')) && empty($this->input->post('subjectid1'))){
								$this->data['examreportprintmarksheet']=$examreportprint;
							}else{
								$this->data['examreportprint']=$examreportprint;
							}
			$count10=count($examreportprint);
			if($count10==0){
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("examreport").' No Report Is Found Regarding These Parameters!!');
				redirect('exam/examreport');
			}else
			{
				
			
			$this->load->view('printexamreport',$this->data);

			}
		}else{
			$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("examreport").' Please Select Exam Type!!');
			redirect('exam/examreport');
		}
	}
/*school management Print Exam Report.........................................................................................................*/
	
	
	/*school management Exam Delete start........................................................................*/	
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
/*school management Exam Delete End.............................................................................*/


	
}
