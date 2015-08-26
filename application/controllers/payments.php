<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('payment_model');
		$this->load->model('authority_model');
		$this->load->model('master_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		$this->load->library('authority');
		if (!$this->session->userdata('user_data')) show_error('Direct access is not allowed');
		$this->info= $this->session->userdata('user_data');
		$currentsession=$this->currentsession = $this->session->userdata('currentsession');
	 }
	 
/*school management Fee Payment View Load.........................................................................................*/
	function payment($admissionid=false)
	{	
	if(Authority::checkAuthority('FeePayment')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Payment', base_url().'payments/payment');
		if($admissionid !=''){
			$this->data['admission']=$admissionid;
			$get_fee_details=$this->data['get_fee_details']=$this->payment_model->get_fee_structure($this->currentsession[0]->CurrentSession,$admissionid);
			$this->data['fee_type']=explode(",",$get_fee_details[0]->FeeStructure);
			$this->data['get_transaction']=$this->payment_model->get_transaction($this->currentsession[0]->CurrentSession,$admissionid);
			$this->data['get_balance']=$this->payment_model->get_balance($this->currentsession[0]->CurrentSession,$admissionid);
			
		}
		$this->data['student_info'] = $this->payment_model->get_student($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('payment',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management Fee Payment View Load.........................................................................................*/
	
/*school management Get fee sturucture of student..............................................................................*/
	function get_fee()
	{	
	if(Authority::checkAuthority('FeePayment')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
	if($this->input->post('admission') !=''){
			$admission=$this->input->post('admission');
			redirect('payments/payment/'.$admission);
		}else{
			redirect('payments/payment');
		}
	}
/*school management Get fee sturucture of student................................................................................*/
	
	
}
