<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
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
	 
	 /*school management Set School Session start........................................*/	
	function set_session($session=false)
	{
		if($session){
			$data=array('CurrentSession'=>$session);		
			$this->master_model->set_session('generalsetting',$data);
			$this->session->set_flashdata('set_session', 'Session set as '.$session.' successfully!!');
			$currentsession = $this->mhome->get_session();
			$this->session->set_userdata('currentsession',$currentsession);
			$this->currentsession = $this->session->userdata('currentsession');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
		redirect('dashboard'); 
		}
	}
/*school management Set School Session End..........................................................*/
	 

/*school management generalsetting start........................................................................*/	
	function generalsetting()
	{	if(Authority::checkAuthority('GeneralSetting')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('General Setting', base_url().'master/generalsetting');
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
		if(Authority::checkAuthority('GeneralSetting')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('id')){
			$data=array('SchoolName'=>$this->input->post('school_name'),
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
						'DateOfEstablishment'=>strtotime($this->input->post('doe')),
						'Email'=>$this->input->post('email'),
						'Fax'=>$this->input->post('fax')
						);		
				$filter=array('Id'=>$this->input->post('id'));
				$this->master_model->insert_gen_setting('generalsetting',$data,$filter);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("generelsetting").' Setting Updated Successfully');
		} 
		else
		{
			$data=array('SchoolName'=>$this->input->post('school_name'),
						'SchoolStartDate'=>strtotime($this->input->post('soft_date')),
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
						'DateOfEstablishment'=>strtotime($this->input->post('doe')),
						'Email'=>$this->input->post('email'),
						'Fax'=>$this->input->post('fax')
						);		
				$this->master_model->insert_gen_setting('generalsetting',$data);
				$this->session->set_flashdata('message_type', 'success');        
                $this->session->set_flashdata('message', $this->config->item("generelsetting").' Setting Save Successfully');
		}
			redirect('master/generalsetting');
	}
/*school management school details insert and update End..........................................................*/
	
/*school management master entry start...........................................................................*/	
	function masterentry($id=false)
	{	if(Authority::checkAuthority('MasterEntry')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		Authority::checkAuthority('MasterEntry');
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Master Entry', base_url().'master/masterentry');
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
	if(Authority::checkAuthority('MasterEntry')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
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
	if(Authority::checkAuthority('ManageUser')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage User', base_url().'master/manageuser');
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
if(Authority::checkAuthority('ManageUser')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}	
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
	if(Authority::checkAuthority('ManageAccounts')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage Accounts', base_url().'master/manageaccount');
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
	if(Authority::checkAuthority('ManageAccounts')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
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
	if(Authority::checkAuthority('ManageClass')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage Class And Section', base_url().'master/manageclass');
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
	if(Authority::checkAuthority('ManageClass')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($type=='class'){
		$data=array(	'ClassName'=>$this->input->post('class_name'),
						'Session'=>$this->currentsession[0]-CurrentSession,
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
	if(Authority::checkAuthority('ManageSubject')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage Subjects', base_url().'master/managesubject');
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
	if(Authority::checkAuthority('ManageSubject')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$class=$this->input->post('class');
		$class=explode(",",$class);
		$data=array(	'Session'=>$this->currentsession[0]-CurrentSession,
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
	if(Authority::checkAuthority('ManageExam')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage Exams', base_url().'master/manageexam');
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
	if(Authority::checkAuthority('ManageExam')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$data=array('Session'=>$this->currentsession[0]-CurrentSession,
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
	function managescarea($id=false)
	{	
	if(Authority::checkAuthority('ManageSCArea')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage Scholastic Co-Scholastic Area', base_url().'master/managescarea');
		if($id){
			$filter=array('SCAreaId'=>$this->data['id']=$id);
			$this->data['scarea_update'] = $this->master_model->get_info('scarea',$filter);
			
		}
		$this->data['scarea_info'] = $this->master_model->get_scarea('scarea');
		$this->data['class_info'] = $this->master_model->get_acc('class');
		$filter=array('MasterEntryName'=>'GradingPoint');
		$this->data['scarea_gradingpoint'] = $this->master_model->get_info('masterentry',$filter);
		$filter1=array('MasterEntryName'=>'CoScholasticPart');
		$this->data['scarea_part'] = $this->master_model->get_info('masterentry',$filter1);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('managescarea',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageSCAREA End.............................................................................*/

	/*school management SCarea insert and update start........................................................*/
	function insert_scarea()
	{	
	if(Authority::checkAuthority('ManageSCArea')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$data=array('Session'=>$this->currentsession[0]-CurrentSession,
				'SCAreaName'=>$this->input->post('area_name'),
				'SCPartId'=>$this->input->post('part'),
				'SCAreaClass'=>$this->input->post('class'),
				'GradingPoint'=>$this->input->post('grading_point'),
				'DOE'=>"16-7-2015",
				'SCAreaStatus'=>"Active");
	
		if($this->input->post('id'))
		{
			$filter=array('SCAreaId'=>$this->input->post('id'));
			$this->master_model->insert_gen_setting('scarea',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("managescarea").' ScArea Updated Successfully');
		}
		else
		{
			$this->master_model->insert_gen_setting('scarea',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("managescarea").' ScArea Added Successfully');
		}
		redirect('master/managescarea');
	}
	/*school management SCarea insert and update End.............................................................*/
	
	
/*school management manageSCIndicator start......................................................................*/	
	function managescindicator($id=false)
	{	
	if(Authority::checkAuthority('ManageSCIndicator')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage Scholastic Co-Scholastic Indicators', base_url().'master/managescindicator');
		if($id){
			$filter=array('SCIndicatorId'=>$this->data['id']=$id);
			$this->data['scindicator_update'] = $this->master_model->get_info('scindicator',$filter);
				
		}
		$this->data['scindicator_info'] = $this->master_model->get_acc('scindicator');
		$this->data['scarea_info'] = $this->master_model->get_scarea('scarea');
		$this->data['user_info'] = $this->master_model->get_userinfo();
		$this->data['user_type'] = $this->master_model->get_selectstaff();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('managescindicator',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageSCIndicator End...........................................................................*/

	/*school management Indicatorscarea insert and update start........................................................*/
	function insert_scindicator($id=false)
	{	
	if(Authority::checkAuthority('ManageSCIndicator')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$data=array(
				'SCAreaId'=>$this->input->post('area'),
				'SCIndicatorName'=>$this->input->post('indicator_name'),
				'SCIndicatorStatus'=>"Active");
	
		if($this->input->post('id'))
		{
			$filter=array('SCIndicatorId'=>$this->input->post('id'));
			$this->master_model->insert_gen_setting('scindicator',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("manageSCIndicator").' ScIndicator Updated Successfully');
		}
		else
		{
			$this->master_model->insert_gen_setting('scindicator',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("manageSCIndicator").' Scindicator Added Successfully');
		}
		redirect('master/managescindicator');
	}
	/*school management Indicatorscarea insert and update End.............................................................*/
	
	
/*school management manageFee start......................................................................*/	
	function managefee($id=false)
	{	
	if(Authority::checkAuthority('ManageFee')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage Fee', base_url().'master/managefee');
		if($id){
			$filter=array('FeeId'=>$this->data['id']=$id);
			$this->data['fee_update'] = $this->master_model->get_info('fee',$filter);
		}
		$filter=array('MasterEntryName'=>'FeeType');
		$this->data['fee_type'] = $this->master_model->get_info('masterentry',$filter);
		$filter1=array('MasterEntryName'=>'Distance');
		$this->data['distance'] = $this->master_model->get_info('masterentry',$filter1);
		$this->data['class_info'] = $this->master_model->get_acc('class');
		$this->data['fee_info'] = $this->master_model->get_fee('fee');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('managefee',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
    /*school management manageFee End...........................................................................*/

	/*school management Indicatorscarea insert and update start........................................................*/
	function insert_fee($id=false)
	{	
	if(Authority::checkAuthority('ManageFee')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('yes')){
		$data=array(
				'SectionId'=>$this->input->post('class'),
				'FeeType'=>$this->input->post('fee_type'),
				'Amount'=>$this->input->post('amount'),
				'Distance'=>$this->input->post('distance'),
				'Session'=>$this->currentsession[0]-CurrentSession,
				'DOE'=>"16-7-2015",
				'FeeStatus'=>"Active");
		}else{
			
			$data=array(
					'SectionId'=>$this->input->post('class'),
					'FeeType'=>$this->input->post('fee_type'),
					'Amount'=>$this->input->post('amount'),
					'Session'=>$this->currentsession[0]-CurrentSession,
					'DOE'=>"16-7-2015",
					'FeeStatus'=>"Active");
		}
	
		if($this->input->post('id'))
		{
			$filter=array('FeeId'=>$this->input->post('id'));
			$this->master_model->insert_gen_setting('fee',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("managefee").' Fee Updated Successfully');
		}
		else
		{
			$this->master_model->insert_gen_setting('fee',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("managefee").' Fee Added Successfully');
		}
		redirect('master/managefee');
	}
	/*school management Indicatorscarea insert and update End.............................................................*/
	
	
/*school management SalaryHead start......................................................................*/	
	function salaryhead($id=false)
	{	
	if(Authority::checkAuthority('salaryhead')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Salary Head', base_url().'master/salaryhead');
		if($id){
			$filter=array('SalaryHeadId'=>$this->data['id']=$id);
			$this->data['salaryhead_update'] = $this->master_model->get_info('salaryhead',$filter);
		}
		
		$filter=array('MasterEntryName'=>'SalaryHeadType');
		$this->data['salary_type'] = $this->master_model->get_info('masterentry',$filter);
		$this->data['salaryhead_info'] = $this->master_model->get_salaryhead();
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('salaryhead',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management SalaryHead End...........................................................................*/

	/*school management salaryhead insert and update start........................................................*/
	function insert_salaryhead($id=false)
	{	
	if(Authority::checkAuthority('salaryhead')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$data=array(
					'SalaryHeadType'=>$this->input->post('type'),
					'SalaryHead'=>$this->input->post('salaryhead'),
					'code'=>$this->input->post('code'),
					'DailyBasis'=>$this->input->post('dailybase'),
					'SalaryHeadStatus'=>$this->input->post('status'));
			
		if($this->input->post('id'))
		{
			$filter=array('SalaryHeadId'=>$this->input->post('id'));
			$this->master_model->insert_gen_setting('salaryhead',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("salaryhead").' Salary Head Updated Successfully');
		}
		else
		{
			$this->master_model->insert_gen_setting('salaryhead',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("salaryhead").' Salary Head Added Successfully');
		}
		redirect('master/salaryhead');
	}
	/*school management salaryhead insert and update End.............................................................*/
	
	
/*school management SalaryStructure start......................................................................*/	
	function structuretemplate($id=false)
	{	
	if(Authority::checkAuthority('salarystructure')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Salary Structure Template', base_url().'master/structuretemplate');
		if($id){
			$filter=array('SalaryStructureId'=>$this->data['id']=$id);
			$this->data['salarystructure_update'] = $this->master_model->get_info('salarystructure',$filter);
		}
		
		$filter=array('SalaryHeadId !='=>'');
		$this->data['fixedsalary'] = $this->master_model->get_info('salaryhead',$filter);
		$this->data['salarystructure_info'] = $this->master_model->get_salary();
		
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('structuretemplate',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management structuretemplate End...........................................................................*/

/*school management salary structure insert and update start........................................................*/
	function insert_salarystructure($id=false)
	{
	if(Authority::checkAuthority('salarystructure')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$data=array(
				'SalaryStructureName'=>$this->input->post('templatename'),
				'FixedSalaryHead'=>$this->input->post('fixedsalary'),
				'SalaryStructureStatus'=>'Active');
			
		if($this->input->post('id'))
		{
			$filter=array('SalaryStructureId'=>$this->input->post('id'));
			$this->master_model->insert_gen_setting('salarystructure',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("structuretemplate").' Salary Structure Updated Successfully');
		}
		else
		{
			$this->master_model->insert_gen_setting('salarystructure',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("structuretemplate").' Salary Structure Added Successfully');
		}
		redirect('master/structuretemplate');
	}
/*school management Salary Structure insert and update End.............................................................*/
	
	
/*school management manageschoolmaterial start...................................................................*/	
	function manageschoolmaterial($id=false)
	{		
	if(Authority::checkAuthority('schoolmaterial')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage School Material', base_url().'master/manageschoolmaterial');
		if($id){
			$filter=array('SchoolMaterialId'=>$this->data['id']=$id);
			$this->data['material_update'] = $this->master_model->get_info('schoolmaterial',$filter);
		}
		$filter=array('SchoolMaterialType'=>'Books');
			$this->data['material'] = $this->master_model->get_info('schoolmaterial',$filter);
			$this->data['class_info'] = $this->master_model->get_acc('class');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('manageschoolmaterial',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageschoolmaterial End........................................................................*/

	/*school management material insert and update start........................................................*/
	function insert_material($id=false)
	{	
	if(Authority::checkAuthority('schoolmaterial')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$data=array(
				'SchoolMaterialType'=>'Books',
				'ClassId'=>$this->input->post('class'),
				'Name'=>$this->input->post('name'),
				'BranchPrice'=>$this->input->post('branch_price'),
				'SellingPrice'=>$this->input->post('selling_price'),
				'SchoolMaterialStatus'=>"Active",
				'Session'=>$this->currentsession[0]-CurrentSession,
				'Date'=>"18-7-2015",
		);
			
		if($this->input->post('id'))
		{
			$filter=array('LocationId'=>$this->input->post('id'));
			$this->master_model->insert_gen_setting('schoolmaterial',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("manageschoolmaterial").' Material Updated Successfully');
		}
		else
		{
			$this->master_model->insert_gen_setting('schoolmaterial',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("manageschoolmaterial").' Material Added Successfully');
		}
		redirect('master/manageschoolmaterial');
	}
	/*school management material insert and update End.............................................................*/
	
	
/*school management manageLocation start.........................................................................*/	
	function managelocation($id=false)
	{	
	if(Authority::checkAuthority('ManageLocation')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage Location', base_url().'master/managelocation');
		if($id){
			$filter=array('LocationId'=>$this->data['id']=$id);
			$this->data['location_update'] = $this->master_model->get_info('location',$filter);
		}
		$this->data['location'] = $this->master_model->get_acc('location');
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('managelocation',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageLocation End..............................................................................*/

/*school management location insert and update start........................................................*/
	function insert_location($id=false)
	{	
	if(Authority::checkAuthority('ManageLocation')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$data=array(
				'LocationName'=>$this->input->post('name'),
				'CalledAs'=>$this->input->post('calledas'),
				'LocationStatus'=>"Active",
				'DOD'=>"18-7-2015",
				);
			
		if($this->input->post('id'))
		{
			$filter=array('LocationId'=>$this->input->post('id'));
			$this->master_model->insert_gen_setting('location',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("managelocation").' Location Updated Successfully');
		}
		else
		{
			$this->master_model->insert_gen_setting('location',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("managelocation").' Location Added Successfully');
		}
		redirect('master/managelocation');
	}
/*school management location insert and update End.............................................................*/
	
	
	
/*school management manageHeaderAndFooter start..................................................................*/	
	function manageheaderandfooter($id=false)
	{	
	if(Authority::checkAuthority('ManageHeaderFooter')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage Header & Footer', base_url().'master/manageheaderandfooter');
		if($id){
			$filter=array('HeaderId'=>$this->data['id']=$id);
			$this->data['header_update'] = $this->master_model->get_info('header',$filter);
		}
		$this->data['header'] = $this->master_model->get_header();
		$filter=array('MasterEntryName'=>'HeaderFooter');
		$this->data['header_type'] = $this->master_model->get_info('masterentry',$filter);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('manageheaderandfooter',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management manageHeaderAndFooter End.......................................................................*/

/*school management header and footer insert and update start........................................................*/
	function insert_header($id=false)
	{	
	if(Authority::checkAuthority('ManageHeaderFooter')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$data=array(
				'HRType'=>$this->input->post('type'),
				'HeaderTitle'=>$this->input->post('title'),
				'HeaderContent'=>$this->input->post('content'));
			
		if($this->input->post('id'))
		{
			$filter=array('HeaderId'=>$this->input->post('id'));
			$this->master_model->insert_gen_setting('header',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("manageHeaderAndFooter").' Header And Footer Updated Successfully');
		}
		else
		{
			$this->master_model->insert_gen_setting('header',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("manageHeaderAndFooter").' Header And Footer Added Successfully');
		}
		redirect('master/manageheaderandfooter');
	}
/*school management header and footer insert and update End.............................................................*/
	
	
/*school management printoption start..................................................................*/	
	function printoption($id=false)
	{	
	if(Authority::checkAuthority('PrintOption')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Print Option', base_url().'master/printoption');
		if($id){
			$filter=array('PrintOptionId'=>$this->data['id']=$id);
			$this->data['printoption_update'] = $this->master_model->get_info('printoption',$filter);
		}
		$this->data['printoption'] = $this->master_model->get_printoption();
		$this->data['header'] = $this->master_model->get_printheader();
		$this->data['footer'] = $this->master_model->get_printfooter();
		$filter=array('MasterEntryName'=>'PrintCategory');
		$this->data['print_category'] = $this->master_model->get_info('masterentry',$filter);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('printoption',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management printoption End.......................................................................*/

	/*school management header and footer insert and update start........................................................*/
	function insert_printoption($id=false)
	{	
	if(Authority::checkAuthority('PrintOption')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$data=array(
				'PrintCategory'=>$this->input->post('print_cat'),
				'Width'=>$this->input->post('width'),
				'HeaderId'=>$this->input->post('header'),
				'FooterId'=>$this->input->post('footer'),
				'PrintOptionStatus'=>'Active'
		);
			
		if($this->input->post('id'))
		{
			$filter=array('PrintOptionId'=>$this->input->post('id'));
			$this->master_model->insert_gen_setting('printoption',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("printoption").' Print Option Updated Successfully');
		}
		else
		{
			$this->master_model->insert_gen_setting('printoption',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("printoption").' Print Option Added Successfully');
		}
		redirect('master/printoption');
	}
	/*school management header and footer insert and update End.............................................................*/
	
	
/*school management permission start..................................................................*/	
	function permission($id=false)
	{	
	if(Authority::checkAuthority('Permission')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Permission', base_url().'master/permission');
		if($this->data['user_type']=$this->input->post('user_type')){
			$filter=array('PageNameId !='=>'');
			$this->data['page_name'] = $this->master_model->get_info('pagename',$filter);
			$filter=array('UserType'=>$this->input->post('user_type'));
			$this->data['permission_page'] = $this->master_model->get_info('permission',$filter);
		}
		
		$filter=array('MasterEntryName'=>'UserType');
		$this->data['usertype'] = $this->master_model->get_info('masterentry',$filter);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('permission',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management permission End.......................................................................*/

/*school management header and footer insert and update start........................................................*/
	function insert_permission($id=false)
	{	
	if(Authority::checkAuthority('Permission')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$pages=$this->input->post('pages');
		$pages=implode(',',$pages);
		
		$data=array(
				'UserType'=>$this->input->post('usertype'),
				'PermissionString'=>$pages);
			
		if($this->input->post('id'))
		{
			$filter=array('PermissionId'=>$this->input->post('id'));
			$this->master_model->insert_gen_setting('permission',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("permission").' Permission Updated Successfully');
		}
		else
		{
			$this->master_model->insert_gen_setting('permission',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("permission").' Permission Added Successfully');
		}
		redirect('master/permission');
	}
/*school management header and footer insert and update End.............................................................*/
	
	
	
}

/* End of file Master.php */
/* Location: ./application/controllers/Master.php */