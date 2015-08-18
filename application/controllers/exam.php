<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('exam_model');
		$this->load->model('master_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		if (!$this->session->userdata('user_data')) show_error('Direct access is not allowed');
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
	function markssetup($examid=false,$subjectid=false)
	{	
		
		if($examid && $subjectid !=''){
			$this->data['examid']=$examid;
			$this->data['subjectid']=$subjectid;
			$this->data['exam_details']=$this->exam_model->get_exam_details($examid,$subjectid,$this->currentsession[0]->CurrentSession);
			$this->data['exam_class_details']=$this->exam_model->get_exam_class($examid,$this->currentsession[0]->CurrentSession);
			$this->data['student_details']=$this->exam_model->get_student_detail($subjectid,$this->currentsession[0]->CurrentSession);
		}	
		
		$this->data['exam'] = $this->exam_model->get_exam($this->currentsession[0]->CurrentSession);
		$this->data['subject'] = $this->exam_model->get_subject($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('markssetup',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Scholastic Grade Load..............................................................................................................*/
	
/*school management Get Marks start .........................................................................................*/
	function get_markssetup()
	{
		if($this->input->post('examid') && $this->input->post('subjectid') !=''){
			$examid=$this->input->post('examid');
			$examid=explode("-",$examid);
			redirect('exam/markssetup/'.$examid[0]."/".$this->input->post('subjectid'));
		}else{
			redirect('exam/markssetup');
	}
	}
/*school management Get Marks start...............................................................................................*/
	
	
	/*school management Scholastic Grade Load.............................................................................................................*/
	function scmarkssetup()
	{
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
		$this->data['class'] = $this->exam_model->get_report_class($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('examreport',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Exam Report Load..............................................................................................................*/
	
/*school management Get ExamReport ...............................................................................................*/
	function get_examreport()
	{
		if($this->input->post('student')  !=''){
			redirect('exam/print_examreport/'.$this->input->post('student'));
		}else{
			redirect('exam/examreport');
	}}
/*school management get Exam Report.........................................................................................................*/
	
/*school management Print ExamReport ...............................................................................................*/
	function print_examreport($admissionid=false)
	{
		if($admissionid){
			$this->data['student_details']=$student_details= $this->exam_model->get_report_student_details($this->currentsession[0]->CurrentSession,$admissionid);
		
			$count10=count($student_details);
			if($count10!=1){
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("examreport").' This is not a valid student!!');
				redirect('exam/examreport');
			}else
			{
				
			$this->data['exam_details']=$row0= $this->exam_model->get_report_exam_details($this->currentsession[0]->CurrentSession,$admissionid);
			$SectionId=$row0[0]->SectionId;
			$examid=$row0[0]->ExamId;
			
			$this->data['subject_details']=$subject= $this->exam_model->get_report_sub_details($this->currentsession[0]->CurrentSession,$SectionId);
			$subject_id='';
			if($subject){
			$subject_id=$subject[0]->SubjectId;}
			$this->data['marks_details']= $this->exam_model->get_report_marks_details($examid,$subject_id);
			$this->load->view('printexamreport',$this->data);

}
		}
	}
/*school management Print Exam Report.........................................................................................................*/
	
	
}
