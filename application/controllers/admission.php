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
		
	 }
	 /*school management registration controller start*/	
	function registration($id=false)
	{	
		
		if($id){
			$filter=array('RegistrationId'=>$this->data['id']=$id);
			 $this->data['registration_update'] = $this->admission_model->get_registration_info('registration',$filter);
			
		}
	 	$this->data['regis'] = $this->admission_model->get_registration_info();
	//	print_r($dev);die;
	  $this->data['class_section'] = $this->admission_model->get_class_info('section');
	//print_r($this->data['class_section']);die;
	$this->data['gender'] = $this->admission_model->get_gender_info('masterentry');
	//print_r($this->data['gender']);die;	
		//print_r($v);die;
		//$this->data['school_info'] = $this->master_model->get_info('generalsetting');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('registration',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management registration controller start*/
	function insert_registration()
	{	//print_r($_POST);die;
		$data=array(	
				'StudentName'=>$this->input->post('student_name'),
				'FatherName'=>$this->input->post('father_name'),
				'MotherName'=>$this->input->post('mother_name'),
				'Gender'=>$this->input->post('gender'),
				'SectionId'=>$this->input->post('class'),
				'DOR'=>$this->input->post('DOR'),
				'Mobile'=>$this->input->post('mobile')
								);
		
		//print_r($data);die;
		//print_r($data);die;
		
		if($this->input->post('id'))
		{
			$filter=array('RegistrationId'=>$this->input->post('id')
			);
			
			$this->admission_model->insert_registration('registration',$data,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' entry  Updated Successfully');
		}
		else
		{
			$this->admission_model->insert_registration('registration',$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").'  Entry added Successfully');
		}
		redirect('admission/registration');
	
	
	}
}