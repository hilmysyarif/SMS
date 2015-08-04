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
		//print_r($id);die;
		if($id){
		$filter = array('RegistrationId'=>$id
		);
		$registration_info = $this->admission_model->get_info($filter,'registration');
		//print_r($registration_info);die;
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
		 		'TerminationRemarks'=>$registration_info[0]->TerminationRemarks
		 		//'BoardUniversity'=>$registration_info[0]->BoardUniversity,
		 		//'Year'=>$registration_info[0]->Year,
		 		//'Remarks'=>$registration_info[0]->Remarks,
		 		//'Class'=>$registration_info[0]->Class,
		 		//'Marks'=>$registration_info[0]->Marks
		 		
		 			 		);
		// print_r( $this->data);die;
		 $this->data['RegistrationId']=$id;
		}
		else{
			$this->data['registration_info']='';
		}
			// print_r($v);die;
	 	$this->data['regis'] = $this->admission_model->get_registration_info();
	  $this->data['class_section'] = $this->admission_model->get_class_info('section');
	$this->data['gender'] = $this->admission_model->get_gender_info();
	 $this->data['caste'] = $this->admission_model->get_gender_info();
	 $this->data['category'] = $this->admission_model->get_gender_info();
	 $this->data['blood_grp'] = $this->admission_model->get_gender_info();
	 $this->data['termination'] = $this->admission_model->get_gender_info();
	 $this->data['photo'] = $this->admission_model->get_gender_info();
	 $this->data['doc'] = $this->admission_model->get_gender_info();
	// print_r( $this->data['doc']);die;
	 $this->data['RegistrationId']=$id;
	 $this->data['QualificationId']=$id;
	 
	 $this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('registration',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}

	
	function update_registration($RegistrationId=false,$QualificationId=false){
		//print_r($RegistrationId);die;
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
						'Gender'=>$this->input->post('gender')
				);
			$filter = array('RegistrationId'=>$RegistrationId);
			$val =	$this->admission_model->update_registration($info,$filter);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
				redirect('admission/registration');
			
		
		}
		if($this->input->post('submit1')){
			$info = array(
					
					'Mobile'=>$this->input->post('mobile'),
					'FatherMobile'=>$this->input->post('father_mobile'),
					'MotherMobile'=>$this->input->post('mother_mobile'),
					'PresentAddress'=>$this->input->post('present_address'),
					'Landline'=>$this->input->post('landline'),
					'PermanentAddress'=>$this->input->post('permanent_address'),
					'AlternateMobile'=>$this->input->post('alternate_mobile')
			);
			$filter = array('RegistrationId'=>$RegistrationId);
			$val =	$this->admission_model->update_registration($info,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
			redirect('admission/registration');
				
			
			
		}
		if($this->input->post('submit2')){
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
					'MotherOrganization'=>$this->input->post('MotherOrganization')
						
			);
			$filter = array('RegistrationId'=>$RegistrationId);
			$val =	$this->admission_model->update_registration($info,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
			redirect('admission/registration');
		}
		if($this->input->post('submit3')){
			$info = array(
					'BoardUniversity'=>$this->input->post('BoardUniversity'),
					'Year'=>$this->input->post('Year'),
					'Remarks'=>$this->input->post('Remarks'),
					'Class'=>$this->input->post('Class'),
					'Marks'=>$this->input->post('Marks')
		
			);
			//print_r($info);die;
			$filter = array('RegistrationId'=>$RegistrationId,
					'QualificationId'=>$QualificationId
			);
		
				//print_r($filter);die;
			$val =	$this->admission_model->update_qualification($info,$filter);
			//print_r($val);die;
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
			redirect('admission/registration');
		}
		if($this->input->post('submit4')){
			$info = array(
					'DateOfTermination'=>$this->input->post('DateOfTermination'),
					'TerminationReason'=>$this->input->post('TerminationReason'),
					'TerminationRemarks'=>$this->input->post('TerminationRemarks'),
			);
			//print_r($info);die;
			$filter = array('RegistrationId'=>$RegistrationId);
			$val =	$this->admission_model->update_registration($info,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
			redirect('admission/registration');
		}
		if($this->input->post('submit5')){
			print_r($RegistrationId);die; 
			$info = array(
					
					'Title'=>$this->input->post('Title'),
					'Path'=>$this->input->post('Path'),
					'Document'=>$this->input->post('Document'),
					//'Detail'=>$this->input->post('Detail'),
					//'Title'=>$this->input->post('DateOfTermination'),
					//'Title'=>$this->input->post('DateOfTermination'),
									);
			print_r($info);die;
			$filter = array('RegistrationId'=>$RegistrationId);
			$val =	$this->admission_model->update_photos($info,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
			redirect('admission/registration');
			
		}
		
		
	}

	function add_qualification($QalificationId=false){
		if($this->input->post('submit3')){
			$info = array(
						'BoardUniversity'=>$this->input->post('BoardUniversity'),
					'Year'=>$this->input->post('Year'),
					'Remarks'=>$this->input->post('Remarks'),
					'Class'=>$this->input->post('Class'),
					'Marks'=>$this->input->post('Marks')
				);
			$r_id=$this->admission_model->insert_qualification($info);
			//print_r($r_id);die;
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' Added successfully');
			redirect('admission/registration');
		}
	}
/*school management registration controller start...................................................................................................*/
	function add_registration($RegistrationId=false){
	
		if($this->input->post('submit')){
							$info = array(
						'StudentName'=>$this->input->post('student_name'),
						'FatherName'=>$this->input->post('father_name'),
						'MotherName'=>$this->input->post('mother_name'),
						'Mobile'=>$this->input->post('mobile'),
						'SectionId'=>$this->input->post('class'),
						'DOR'=>$this->input->post('DOR'),
						'Session'=>$currentsession,
						'Gender'=>$this->input->post('gender')
				);
				$r_id=$this->admission_model->insert_registration($info);
			  $this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("registration").' Added successfully');
				redirect('admission/registration');
		
		}
	}

	/*school management admission View Load.............................................................................................................*/
	function admission_student()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('admission',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management admission View Load..............................................................................................................*/
	
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
	function updatefee()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('updatefee',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Updatefee View Load..............................................................................................................*/
	
	/*school management Admission Report View Load.............................................................................................................*/
	function admissionreport()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('admissionreport',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Admission Report View Load..............................................................................................................*/
	
	/*school management Fee Payment View Load.............................................................................................................*/
	function payment()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('payment',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Fee Payment View Load..............................................................................................................*/
	
	/*school management Staff Attendence View Load.............................................................................................................*/
	function staffattendence()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('staffattendence',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Staff Attendence View Load..............................................................................................................*/
	
	/*school management Student Attendence View Load.............................................................................................................*/
	function studentattendence()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('studentattendence',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Student Attendence View Load..............................................................................................................*/
	
	
}
