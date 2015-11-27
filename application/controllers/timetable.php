<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timetable extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('homework_model');
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
	
	
	/*school management Home Work Delete start........................................................................*/	
	function delete($class=false,$section=false,$subject=false,$date=false)
	{
		if(!empty($class) && !empty($section) && !empty($subject) && !empty($date)){
			$filter=array('classid'=>$class,
						  'sectionid'=>$section,
						  'subjectid'=>$subject,
						  'dateofhomework'=>$date);
			$this->master_model->delete('homework',$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("delete").' Deleted Successfully!!');
		}else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("delete")." Can't Deleted Some Information Are missing!!");
		}
		header('Location: '. $_SERVER['HTTP_REFERER']);
	
	}
/*school management Home Work Delete End.............................................................................*/

// HomeWork Part Started Here..........................................................................................................................

/*school management HomeWork create view Load.............................................................................................................*/
	function createhomework($class=false,$section=false,$subject=false,$date=false)
	{	
		if(Authority::checkAuthority('onlineexamcreate')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if(empty($this->currentsession[0]->CurrentSession)){
			$this->session->set_flashdata('category_error', 'Please Select Session!!');        
            redirect($_SERVER['HTTP_REFERER']);
		}
		
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Create HomeWork <a href="'.base_url().'homework/viewhomework"><span class="badge badge-red ">View Home Work</span></a>', base_url().'homework/createhomework');
		
		
		if(!empty($class) && !empty($section) && !empty($subject) && !empty($date)){
			$filter=array('classid'=>$class,
						  'sectionid'=>$section,
						  'subjectid'=>$subject,
						  'dateofhomework'=>$date);
			$this->data['updatehomework']=$updatehomework = $this->homework_model->select_for_update('homework',$filter);
			if($this->data['updatehomework'] !=''){
				$filter1=array('SubjectId'=>$updatehomework[0]->subjectid);
				$this->data['subject'] = $this->homework_model->select_for_update('subject',$filter1);
			}
		}
		
		$this->data['class_info']=$this->homework_model->get_class(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('homeworkcreate',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management  Homework create view Load..............................................................................................................*/
	
/*school management Home Work create insert and update start .........................................................................................*/
	function insert_homework()
	{	
	if(Authority::checkAuthority('onlineexamcreate')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if(empty($this->currentsession[0]->CurrentSession)){
			$this->session->set_flashdata('category_error', 'Please Select Session!!');        
            redirect($_SERVER['HTTP_REFERER']);
		}
		
		if($this->input->post('save') !=''){
			
			$sectionid=$this->input->post('class');
			$subject=$this->input->post('subjectid1');
			$dow=($this->input->post('dow'));
			$homework=$this->input->post('homework');
			$dos=strtotime($this->input->post('dos'));
			$username=$this->info['usermailid'];
			$Session=$this->currentsession[0]->CurrentSession;
			
			$filter=array('SectionId'=>$sectionid);
			$classdetails=$this->homework_model->select_for_update('section',$filter);
			
			$filter0=array('classid'=>$classdetails[0]->ClassId,
							'sectionid'=>$sectionid,
							'subjectid'=>$subject,
							'dateofhomework'=>strtotime($dow));
			$check=$this->homework_model->select_for_update('homework',$filter0);
			
			if(count($check)>0){
				
					$data=array('classid'=>$classdetails[0]->ClassId,
						'sectionid'=>$sectionid,
						'subjectid'=>$subject,
						'dateofhomework'=>strtotime($dow),
						'homework'=>$homework,
						'dosubmission'=>$dos,
						'updatedby'=>$username,
						'session'=>$Session);
						
					$this->homework_model->insert_homework('homework',$data,$filter0);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("viewhomework")." Home Work On $dow Updated Successfully");
					
			}else{
					$data=array('classid'=>$classdetails[0]->ClassId,
						'sectionid'=>$sectionid,
						'subjectid'=>$subject,
						'dateofhomework'=>strtotime($dow),
						'homework'=>$homework,
						'dosubmission'=>$dos,
						'createdby'=>$username,
						'session'=>$Session);
						
					$this->homework_model->insert_homework('homework',$data);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("viewhomework")." Home Work On $dow Created Successfully");
			}
		}
			redirect('homework/viewhomework');
	}
	
/*school management Home Work create insert and update End .........................................................................................*/

/*school management Home Work List view Load................................................................................................*/
	function viewhomework()
	{	
		if(Authority::checkAuthority('OnlineExamList')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if(empty($this->currentsession[0]->CurrentSession)){
			$this->session->set_flashdata('category_error', 'Please Select Session!!');        
            redirect($_SERVER['HTTP_REFERER']);
		}
		
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Home List <a href="'.base_url().'homework/createhomework"><span class="badge badge-red ">Create Home Work</span></a>', base_url().'homework/viewhomework');
		
		$this->data['homework'] = $this->homework_model->get_homeworklist();
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('viewhomework',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management  Home Work List view Load.......................................................................................................*/
	

	/*online exam Search Start..............................................................*/
	function evaluationofhomework($action=false,$key=false){
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
	
		
}
