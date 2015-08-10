<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admission extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('admission_model');
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

	 /*school management registration controller start*/	
	function registration($id=false)
	{	
		if($id){
		$filter = array('RegistrationId'=>$id);
		
		$registration_info = $this->admission_model->get_info($filter,'registration');
		$this->data['registration_update'] = $this->admission_model->get_info($filter,'registration');
		 $this->data = array(
		 		'RegistrationId'=>$registration_info[0]->RegistrationId,
		 		'StudentName'=>$registration_info[0]->StudentName,
		 		'FatherName'=>$registration_info[0]->FatherName,
		 		'MotherName'=>$registration_info[0]->MotherName,
		 		'Gender'=>$registration_info[0]->Gender,
		 		'DOB'=>$registration_info[0]->DOB,
		 		'Caste'=>$registration_info[0]->Caste,
		 		'Category'=>$registration_info[0]->Category,
		 		'BloodGroup'=>$registration_info[0]->BloodGroup,
		 		'SectionId'=>$registration_info[0]->SectionId,
		 		'DOR'=>$registration_info[0]->DOR,
		 		'Mobile'=>$registration_info[0]->Mobile,
		 		'MotherMobile'=>$registration_info[0]->MotherMobile,
		 		'FatherMobile'=>$registration_info[0]->FatherMobile,
		 		'PresentAddress'=>$registration_info[0]->PresentAddress,
		 		'Landline'=>$registration_info[0]->Landline,
		 		'PermanentAddress'=>$registration_info[0]->PermanentAddress,
		 		'AlternateMobile'=>$registration_info[0]->AlternateMobile,
		 		'FatherDateOfBirth'=>$registration_info[0]->FatherDateOfBirth,
		 		'MotherDateOfBirth'=>$registration_info[0]->MotherDateOfBirth,
		 		'FatherDesignation'=>$registration_info[0]->FatherDesignation,
		 		'FatherEmail'=>$registration_info[0]->FatherEmail,
		 		'MotherEmail'=>$registration_info[0]->MotherEmail,
		 		'FatherOrganization'=>$registration_info[0]->FatherOrganization,
		 		'FatherQualification'=>$registration_info[0]->FatherQualification,
		 		'MotherQualification'=>$registration_info[0]->MotherQualification,
		 		'MotherDesignation'=>$registration_info[0]->MotherDesignation,
		 		'FatherOccupation'=>$registration_info[0]->FatherOccupation,
		 		'MotherOccupation'=>$registration_info[0]->MotherOccupation,
		 		'MotherOrganization'=>$registration_info[0]->MotherOrganization,
		 		'DateOfTermination'=>$registration_info[0]->DateOfTermination,
		 		'TerminationReason'=>$registration_info[0]->TerminationReason,
		 		'TerminationRemarks'=>$registration_info[0]->TerminationRemarks);
		 
				 $this->data['RegistrationId']=$id;
				}
				else{
					$this->data['registration_info']='';
				}
		
				/* $this->breadcrumb->clear();
				 $this->breadcrumb->add_crumb('Deshboard', base_url());
				 $this->breadcrumb->add_crumb('Registration', base_url().'registration');
				 $this->breadcrumb->add_crumb('Registration', '');*/
				 
				 $this->data['regis'] = $this->admission_model->get_registration_info();
				 $this->data['class_section'] = $this->admission_model->get_class_info('section');
				 $this->data['gender'] = $this->admission_model->get_gender_info();
				 $this->data['caste'] = $this->admission_model->get_gender_info();
				 $this->data['category'] = $this->admission_model->get_gender_info();
				 $this->data['blood_grp'] = $this->admission_model->get_gender_info();
				 $this->data['termination'] = $this->admission_model->get_gender_info();
				 $this->data['photo'] = $this->admission_model->get_gender_info();
				 $this->data['doc'] = $this->admission_model->get_gender_info();
				
				 $this->data['RegistrationId']=$id;
				 $this->data['QualificationId']=$id;
				 
				 $this->parser->parse('include/header',$this->data);
				 $this->parser->parse('include/topheader',$this->data);
				 $this->parser->parse('include/leftmenu',$this->data);
				 $this->load->view('registration',$this->data);
				 $this->parser->parse('include/footer',$this->data);
	}

	
	function update_registration($RegistrationId=false,$QualificationId=false)
	{
		if($this->input->post('submit')){
				$info = array(
						'StudentName'=>$this->input->post('student_name'),
						'FatherName'=>$this->input->post('father_name'),
						'MotherName'=>$this->input->post('mother_name'),
						'SectionId'=>$this->input->post('class'),
						'DOB'=>$this->input->post('DOB'),
						'DOR'=>$this->input->post('DOR'),
						'BloodGroup'=>$this->input->post('BloodGroup'),
						'Caste'=>$this->input->post('Caste'),
						'Category'=>$this->input->post('Category'),
						'Gender'=>$this->input->post('gender'));
				
		$filter = array('RegistrationId'=>$RegistrationId);
		$val =	$this->admission_model->update_registration($info,$filter);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
				redirect('admission/registration');
		}
		if($this->input->post('submit1'))
		{
					$info = array(
					'Mobile'=>$this->input->post('mobile'),
					'FatherMobile'=>$this->input->post('father_mobile'),
					'MotherMobile'=>$this->input->post('mother_mobile'),
					'PresentAddress'=>$this->input->post('present_address'),
					'Landline'=>$this->input->post('landline'),
					'PermanentAddress'=>$this->input->post('permanent_address'),
					'AlternateMobile'=>$this->input->post('alternate_mobile'));
					
			$filter = array('RegistrationId'=>$RegistrationId);
			$val =	$this->admission_model->update_registration($info,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
			redirect('admission/registration');
		}
		if($this->input->post('submit2'))
		{
			$info = array(
					'FatherDateOfBirth'=>$this->input->post('FatherDateOfBirth'),
					'MotherDateOfBirth'=>$this->input->post('MotherDateOfBirth'),
					'FatherDesignation'=>$this->input->post('FatherDesignation'),
					'FatherEmail'=>$this->input->post('FatherEmail'),
					'MotherEmail'=>$this->input->post('MotherEmail'),
					'FatherOrganization'=>$this->input->post('FatherOrganization'),
					'FatherQualification'=>$this->input->post('FatherQualification'),
					'MotherQualification'=>$this->input->post('MotherQualification'),
					'MotherDesignation'=>$this->input->post('MotherDesignation'),
					'FatherOccupation'=>$this->input->post('FatherOccupation'),
					'MotherOccupation'=>$this->input->post('MotherOccupation'),
					'MotherOrganization'=>$this->input->post('MotherOrganization'));
			
			$filter = array('RegistrationId'=>$RegistrationId);
			$val =	$this->admission_model->update_registration($info,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
			redirect('admission/registration');
		}
		if($this->input->post('submit3'))
		{
			$info = array(
					'BoardUniversity'=>$this->input->post('BoardUniversity'),
					'Year'=>$this->input->post('Year'),
					'Remarks'=>$this->input->post('Remarks'),
					'Class'=>$this->input->post('Class'),
					'Marks'=>$this->input->post('Marks'));
			$filter = array('RegistrationId'=>$RegistrationId,
					'QualificationId'=>$QualificationId);
		
			$val =	$this->admission_model->update_qualification($info,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
			redirect('admission/registration');
		}
		if($this->input->post('submit4'))
		{
			$info = array(
					'DateOfTermination'=>$this->input->post('DateOfTermination'),
					'TerminationReason'=>$this->input->post('TerminationReason'),
					'TerminationRemarks'=>$this->input->post('TerminationRemarks'));
			$filter = array('RegistrationId'=>$RegistrationId);
			$val =	$this->admission_model->update_registration($info,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
			redirect('admission/registration');
		}
		if($this->input->post('submit5'))
		{
			$info = array(
					'Title'=>$this->input->post('Title'),
					'Path'=>$this->input->post('Path'),
					'Document'=>$this->input->post('Document'));
			$filter = array('RegistrationId'=>$RegistrationId);
			$val =	$this->admission_model->update_photos($info,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
			redirect('admission/registration');
		}
	}

	function add_qualification($QalificationId=false)
	{
		if($this->input->post('submit3'))
		{
			$info = array(
					'BoardUniversity'=>$this->input->post('BoardUniversity'),
					'Year'=>$this->input->post('Year'),
					'Remarks'=>$this->input->post('Remarks'),
					'Class'=>$this->input->post('Class'),
					'Marks'=>$this->input->post('Marks'));
			$r_id=$this->admission_model->insert_qualification($info);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' Added successfully');
			redirect('admission/registration');
		}
	}
	
/*school management registration controller start...................................................................................................*/
	function add_registration($RegistrationId=false)
	{ 
		if($this->input->post('submit')){
							$info = array(
									'StudentName'=>$this->input->post('student_name'),
									'FatherName'=>$this->input->post('father_name'),
									'MotherName'=>$this->input->post('mother_name'),
									'Mobile'=>$this->input->post('mobile'),
									'SectionId'=>$this->input->post('class'),
									'DOR'=>$this->input->post('DOR'),
									'Session'=>$this->currentsession[0]->CurrentSession,
									'Gender'=>$this->input->post('gender'),
									'Status'=>'NotAdmitted');
				$r_id=$this->admission_model->insert_registration($info);
			 	$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("registration").' Registration Done successfully');
				redirect('admission/registration');
		}
	}

	/*school management admission View Load.............................................................................................................*/
	function admission_student()
	{ 
		if($this->input->post('id')){
			if($this->input->post('student')){
				$info=explode(',',$this->input->post('student'));
				$id=$info[0];
				$class=$info[1];
				$section=$info[2];
			}
			$this->data = array(
					'id'=>$id,
					'transport'=>$this->input->post('transport'),
					'distance'=>$this->input->post('distance'),
					'class'=>$class,
					'section'=>$section);
			$this->data['fee_info']=$this->admission_model->get_admission_class($section,$this->input->post('distance'),$this->currentsession[0]->CurrentSession);
		}
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('admission',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management admission View Load..............................................................................................................*/
	
	/*school management admission Insert.............................................................................................................*/
	function insert_admission()
	{
		$data=array('AdmissionNo'=>$this->input->post('admission_no'),
				'RegistrationId'=>$this->input->post('id'),
				'Remarks'=>$this->input->post('remarks'),
				'DOA'=>$this->input->post('DOA'));
		$this->admission_model->insert_admission($data,'admission');
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("admission_student").' Admission Done successfully');
		redirect('admission/admission_student');
	}
	/*school management admission Insert..............................................................................................................*/
	
	
	/*school management Promotion View Load.............................................................................................................*/
	function promotion()
	{
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('promotion',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Promotion View Load..............................................................................................................*/

	/*school management Updatefee View Load.............................................................................................................*/
	function updatefee($sectionid=false,$admissionid=false)
	{
		if($sectionid && $admissionid !=''){
			$this->data['section']=$sectionid;
			$this->data['admission']=$admissionid;
			$this->data['class_info2']=$this->admission_model->get_class2($sectionid,$this->currentsession[0]->CurrentSession);
			$feetype=$this->data['get_fee_structure']=$this->admission_model->get_fee_structure($sectionid,$this->currentsession[0]->CurrentSession,$admissionid);
			$this->data['get_fee_details']=$this->admission_model->get_fee_details($admissionid);
			$this->data['fee_type']=explode(",",$feetype[0]->FeeStructure);
		}
		$this->data['class_info']=$this->admission_model->get_class($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('updatefee',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Updatefee View Load..............................................................................................................*/
	
	/*school management get fee for update start...................................................................................................*/
	function get_fee()
	{
		if($this->input->post('class') && $this->input->post('student') !=''){
			$section=$this->input->post('class');
			$admission=$this->input->post('student');
			redirect('admission/updatefee/'.$section."/".$admission);
		}
	}
	/*school management get fee for update end.................................................................................................*/

	/*school management update Class start...................................................................................................*/
	function updateclass()
	{ //print_r($_POST);die;
		if($this->input->post('class_name') !=''){
			$section=$this->input->post('class_name');
			$admission=$this->input->post('student');
			$feetype=$this->input->post('type');
			$feeamount=$this->input->post('amount');
			redirect('admission/updatefee/'.$section."/".$admission);
		}
	}
	/*school management update Class end.................................................................................................*/

	/*school management Admission Report View Load.............................................................................................................*/
	function admissionreport($section=false)
	{	$status='';
		$section='';
			if($this->input->post('class')){
			$section=$this->data['section']=$this->input->post('class');
			$section="and studentfee.SectionId='$section' ";
			}
			if($this->input->post('terminate')){
				$this->data['terminate']=$status='Terminated';
			}
			if($this->input->post('login')){
			$this->data['login']='login';
			}
		$this->data['class_info']=$this->admission_model->get_class($this->currentsession[0]->CurrentSession);
		$this->data['student_info']=$this->admission_model->get_student_details($status,$section,$this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('admissionreport',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management Admission Report View Load.....................................................................................................*/
	
	/*school management get Admission report start...................................................................................................*/
/*	function get_ad_report()
	{
		if($this->input->post('class') ){
			$section=$this->input->post('class');
			if($this=>input->post('terminate')){
				
			}
			if($this->input->post('login')){
				
			}
			if($this->input->post('terminate') && $this->input->post('login') !=''){
				
			}
			redirect('admission/admissionreport/'.$section);
		}
	}*/
	/*school management get Admission report end.................................................................................................*/
}
