<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('master_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		if (!$this->session->userdata('user_data')) show_error('Direct access is not allowed');
		$this->info= $this->session->userdata('user_data');
		
	 }
	 

/*school management generalsetting start........................................................................*/	
	function generalsetting()
	{	
		$this->data['school_info'] = $this->master_model->get_info('generalsetting');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('generalsetting',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management generalsetting End.............................................................................*/

/*school management generalsetting school details insert and update start........................................*/	
	function gs_insrt()
	{
		$data=array(	'SchoolName'=>$this->input->post('school_name'),
						'SchoolStartDate'=>$this->input->post('soft_date'),
						'State'=>$this->input->post('state'),
						'Board'=>$this->input->post('board'),
						'SchoolAddress'=>$this->input->post('address'),
						'Country'=>$this->input->post('country'),
						'AffiliatedBy'=>$this->input->post('affiliated'),
						'City'=>$this->input->post('city'),
						'Mobile'=>$this->input->post('mobile'),
						'RegistrationNo'=>$this->input->post('registration'),
						'District'=>$this->input->post('district'),
						'AlternateMobile'=>$this->input->post('alt_mobile'),
						'AffiliationNo'=>$this->input->post('affi_no'),
						'PIN'=>$this->input->post('pin'),
						'Landline'=>$this->input->post('landline'),
						'DateOfEstablishment'=>$this->input->post('doe'),
						'Email'=>$this->input->post('email'),
						'Fax'=>$this->input->post('fax')
						);		
		if($this->input->post('id')){
				$filter=array('Id'=>$this->input->post('id'));
				$this->master_model->insert_gen_setting('generalsetting',$data,$filter);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("generelsetting").' Setting Updated Successfully');
		} 
		else
		{
				$this->master_model->insert_gen_setting('generalsetting',$data);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("generelsetting").' Setting Save Successfully');
		}
			redirect('master/generalsetting');
	}
/*school management school details insert and update End..........................................................*/
	
/*school management master entry start...........................................................................*/	
	function masterentry($id=false)
	{	
		if($id){
		$filter=array('MasterEntryId'=>$this->data['id']=$id);
		$this->data['masterentry_update'] = $this->master_model->get_info('masterentry',$filter);
		}
		$this->data['masterentrycat'] = $this->master_model->get_info('masterentrycategory');
		$this->data['masterentry'] = $this->master_model->get_info('masterentry');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('masterentry',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management master entry End.............................................................................*/

/*school management master entry insert and update start.........................................................*/	
	function insert_masterentry()
	{	
		$data=array(	'MasterEntryName'=>$this->input->post('cat_name'),
						'MasterEntryValue'=>$this->input->post('cat_val'),
						'MasterEntryStatus'=>"Active");
						
		if($this->input->post('id'))
		{ 
				$filter=array('MasterEntryId'=>$this->input->post('id'));
				$this->master_model->insert_gen_setting('masterentry',$data,$filter);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("masterentry").' Master Entry Updated Successfully');
		} 
		else
		{
				$this->master_model->insert_gen_setting('masterentry',$data);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("masterentry").' Master Entry Save Successfully');
		}
			redirect('master/masterentry');
						
		
	}
/*school management master entry insert and update End..............................................................*/

/*school management manageuser start........................................................................*/	
	function manageuser($id=false)
	{	
		if($id){
		$filter=array('UserId'=>$this->data['id']=$id);
		$this->data['user_update'] = $this->master_model->get_info('user',$filter);
		}
		$this->data['user_info'] = $this->master_model->get_userinfo();
		$this->data['user_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('manageuser',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageuser End.............................................................................*/

/*school management adduser  start........................................................................*/	
	function adduser()
	{					
		if($this->input->post('id'))
		{ 	if($this->input->post('reset')){
			
				$data=array('UserType'=>$this->input->post('user_type'),
						'StaffId'=>$this->input->post('staff_name'),
						'Username'=>$this->input->post('user_name'),
						'Password'=>md5($this->input->post('password'))); 
						}else{
						$data=array('UserType'=>$this->input->post('user_type'),
						'StaffId'=>$this->input->post('staff_name'),
						'Username'=>$this->input->post('user_name'));
					}
						
				$filter=array('UserId'=>$this->input->post('id'));
				$this->master_model->insert_gen_setting('user',$data,$filter);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("user").' User Updated Successfully');
		} 
		else
		{
				$data=array('UserType'=>$this->input->post('user_type'),
						'StaffId'=>$this->input->post('staff_name'),
						'Username'=>$this->input->post('user_name'),
						'Password'=>md5($this->input->post('password')));
						
				if($this->master_model->insert_gen_setting('user',$data)==true){
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("user").' User Save Successfully'); 
				}else{
					$this->session->set_flashdata('message_type', 'error');        
                $this->session->set_flashdata('message', $this->config->item("user").' This Username is not available or Staff Id is already associated with one user!!');
				}
		}
			redirect('master/manageuser');
	}
/*school management adduser End.............................................................................*/


/*school management manageaccount start........................................................................*/	
	function manageaccount($id=false)
	{	
		if($id){
		$filter=array('AccountId'=>$this->data['id']=$id);
		$this->data['acc_update'] = $this->master_model->get_info('accounts',$filter);
		}
		$this->data['acc_info'] = $this->master_model->get_acc(' accounts');
		$this->data['acc_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('manageaccount',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageAccount End.............................................................................*/

/*school management manage acount insert and update start........................................................*/	
	function insert_account()
	{	
		$data=array(	'ManagedBy'=>$this->input->post('manage_by'),
						'AccountType'=>$this->input->post('account_type'),
						'OpeningBalance'=>$this->input->post('open_bal'),
						'DOE'=>$this->input->post('acc_start_date'),
						'AccountStatus'=>"Active");
						
		if($this->input->post('id'))
		{ 
				$filter=array('AccountId'=>$this->input->post('id'));
				$this->master_model->insert_gen_setting('accounts',$data,$filter);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("manageaccount").' Account Updated Successfully');
		} 
		else
		{
				$this->master_model->insert_gen_setting('accounts',$data);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("manageaccount").' Account Added Successfully');
		}
			redirect('master/manageaccount');
	}
/*school management manage acount insert and update End.............................................................*/


/*school management manageClass start........................................................................*/	
	function manageclass($type=false,$id=false)
	{	
		if($id){
		if($type=="class")
		{	
						$filter=array('ClassId'=>$this->data['id']=$id);
						$this->data['class_update'] = $this->master_model->get_info('class',$filter);
		}else{
						$filter=array('SectionId'=>$this->data['id']=$id);
						$this->data['section_update'] = $this->master_model->get_info('section',$filter);
		}
		}
		$this->data['class_info'] = $this->master_model->get_acc(' class');
		$this->data['section_info'] = $this->master_model->get_acc('section');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('manageclass',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageClass End.............................................................................*/

/*school management Class and section insert and update start....................................................*/	
	function insert_class($type=false)
	{	
		if($type=='class'){
		$data=array(	'ClassName'=>$this->input->post('class_name'),
						'Session'=>$this->input->post('sessoin'),
						'DOE'=>"16-7-2015",
						'ClassStatus'=>"Active");
						
		if($this->input->post('id'))
		{ 
				$filter=array('ClassId'=>$this->input->post('id'));
				$this->master_model->insert_gen_setting('class',$data,$filter);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("manageaccount").' Class Updated Successfully');
		} 
		else
		{
				$this->master_model->insert_gen_setting('class',$data);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("manageaccount").' Class Added Successfully');
		}}else{
			$data=array(	'ClassId'=>$this->input->post('class_name'),
							'SectionName'=>$this->input->post('section_name'),
							'DOE'=>"16-7-2015",
							'SectionStatus'=>"Active");
						
		if($this->input->post('id'))
		{ 
				$filter=array('SectionId'=>$this->input->post('id'));
				$this->master_model->insert_gen_setting('section',$data,$filter);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("manageclass").' Section Updated Successfully');
		} 
		else
		{
				$this->master_model->insert_gen_setting('section',$data);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("manageclass").' Section Added Successfully');
		}
		}
			redirect('master/manageclass');
	}
/*school management Class and section insert and update End.........................................................*/


/*school management modal start........................................................................*/	
	function modal($userid=false)
	{	
		$this->load->view('modal',$this->data);
	}
/*school management modal End.............................................................................*/

/*school management manageSubject start........................................................................*/	
	function managesubject($id=false)
	{	
		if($id){
		$filter=array('SubjectId'=>$this->data['id']=$id);
		$this->data['sub_update'] = $this->master_model->get_info('subject',$filter);
		}
		$this->data['sub_info'] = $this->master_model->get_acc('subject');
		$this->data['class_info'] = $this->master_model->get_acc('class');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('managesubject',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageSubject End.............................................................................*/

/*school management Subject insert and update start........................................................*/	
	function insert_subject()
	{	
		$class=$this->input->post('class');
		$class=explode(",",$class);
		$data=array(	'Session'=>"2015-2016",
						'SubjectName'=>$this->input->post('subject_name'),
						'SubjectAbb'=>$this->input->post('abbreviation'),
						'Class'=>$class,
						'DOE'=>"16-7-2015",
						'SubjectStatus'=>"Active");
						
		if($this->input->post('id'))
		{ 
				$filter=array('SubjectId'=>$this->input->post('id'));
				$this->master_model->insert_gen_setting('subject',$data,$filter);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("managesubject").' Subject Updated Successfully');
		} 
		else
		{
				$this->master_model->insert_gen_setting('subject',$data);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("managesubject").' Subject Added Successfully');
		}
			redirect('master/managesubject');
	}
/*school management Subject insert and update End.............................................................*/

/*school management manageExam start........................................................................*/	
	function manageexam($id=false)
	{	
		if($id){
			$filter=array('ExamId'=>$this->data['id']=$id);
			$this->data['exam_update'] = $this->master_model->get_info('exam',$filter);
		}
		$this->data['class_info'] = $this->master_model->get_acc(' class');
		$this->data['exam_info'] = $this->master_model->get_acc('exam');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('manageexam',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageExam End.............................................................................*/

/*school management Exam insert and update start........................................................*/
	function insert_exam()
	{
		$data=array('Session'=>"2015-2016",
				'ExamName'=>$this->input->post('exam_name'),
				'SectionId'=>$this->input->post('class_name'),
				'Weightage'=>$this->input->post('weightage'),
				'DOE'=>"16-7-2015",
				'ExamStatus'=>"Active");
	
		if($this->input->post('id'))
		{
			$filter=array('ExamId'=>$this->input->post('id'));
			$this->master_model->insert_gen_setting('exam',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("manageexam").' Exam Updated Successfully');
		}
		else
		{
			$this->master_model->insert_gen_setting('exam',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("manageexam").' Exam Added Successfully');
		}
		redirect('master/manageexam');
	}
/*school management Exam insert and update End.............................................................*/
	
	
/*school management manageSCAREA start........................................................................*/	
	function managescarea()
	{	
		$this->data['user_info'] = $this->master_model->get_userinfo();
		$this->data['user_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('managescarea',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageSCAREA End.............................................................................*/

/*school management manageSCIndicator start......................................................................*/	
	function managescindicator()
	{	
		$this->data['user_info'] = $this->master_model->get_userinfo();
		$this->data['user_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('managescindicator',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageSCIndicator End...........................................................................*/

/*school management manageFee start......................................................................*/	
	function managefee()
	{	
		$this->data['user_info'] = $this->master_model->get_userinfo();
		$this->data['user_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('managefee',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageFee End...........................................................................*/

/*school management SalaryHead start......................................................................*/	
	function salaryhead()
	{	
		$this->data['user_info'] = $this->master_model->get_userinfo();
		$this->data['user_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('salaryhead',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management SalaryHead End...........................................................................*/

/*school management SalaryStructure start......................................................................*/	
	function structuretemplate()
	{	
		$this->data['user_info'] = $this->master_model->get_userinfo();
		$this->data['user_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('structuretemplate',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management structuretemplate End...........................................................................*/

/*school management manageschoolmaterial start...................................................................*/	
	function manageschoolmaterial()
	{	
		$this->data['user_info'] = $this->master_model->get_userinfo();
		$this->data['user_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('manageschoolmaterial',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageschoolmaterial End........................................................................*/

/*school management manageLocation start.........................................................................*/	
	function managelocation()
	{	
		$this->data['user_info'] = $this->master_model->get_userinfo();
		$this->data['user_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('managelocation',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageLocation End..............................................................................*/

/*school management manageHeaderAndFooter start..................................................................*/	
	function manageheaderandfooter()
	{	
		$this->data['user_info'] = $this->master_model->get_userinfo();
		$this->data['user_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('manageheaderandfooter',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageHeaderAndFooter End.......................................................................*/

/*school management manageHeaderAndFooter start..................................................................*/	
	function printoption()
	{	
		$this->data['user_info'] = $this->master_model->get_userinfo();
		$this->data['user_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('printoption',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management printoption End.......................................................................*/

/*school management permission start..................................................................*/	
	function permission()
	{	
		$this->data['user_info'] = $this->master_model->get_userinfo();
		$this->data['user_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('permission',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management permission End.......................................................................*/

	
}

/* End of file Master.php */
/* Location: ./application/controllers/Master.php */